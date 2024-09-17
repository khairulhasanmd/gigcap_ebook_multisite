<?php

namespace App\Lib;

class AiProviderManager 
{
    private $providers = [];

    /**
     * Add a provider to the collection.
     *
     * @param string $provider The fully qualified class name of the provider.
     * @param string|null $alias The alias for the provider.
     * @throws \Exception If the class does not exist.
     * @return void
     */
    public function add(string $provider, ?string $alias = null): void
    {
        if (! class_exists($provider)) {
            throw new \Exception("Class '$provider' does not exist.");
        }

        // Determine the alias for the provider
        $alias = $alias ? strtolower($alias) : strtolower(class_basename($provider));
        
        $providerInstance = new $provider($alias);

        if (! $providerInstance instanceof AiProvider) {
            throw new \Exception("Class $provider must need to extends the \App\Lib\AiProvider class.");
        }

        $this->providers[$alias] = $providerInstance;
    }

    /**
     * Get all providers.
     *
     * @return array The array containing all providers.
     */
    public function get(): array
    {
        return $this->providers;
    }

    /**
     * Get all providers.
     *
     * @return array The array containing all providers.
     */
    public function all(): array
    {
       return $this->providers;
    }

    /**
     * Get all providers.
     *
     * @return array The array containing all providers.
     */
    public function providers(): array
    {
        return $this->providers;
    }

    /**
     * Find a provider by its alias.
     *
     * @param string $alias The alias of the provider to find.
     * @return object|null The provider object if found, or null if not found.
     */
    public function find(string $alias): ?object
    {
        return $this->providers[strtolower($alias)] ?? null;
    }

    /**
     * Returns an array of class names with space-separated words.
     *
     * @return array The array of class names.
     */
    public function names(): array
    {
        return array_map(function($aiProvider) {
            return \Str::replaceMatches('/(?<!\s)([A-Z])/', ' $1', class_basename($aiProvider));
        }, $this->providers);
    }

    /**
     * Retrieve details of features.
     *
     * @param string|null $name Optional. If specified, returns details only for the feature with the given name.
     * @return array|array[] Returns an array containing details of features. If $name is specified, returns only that value.
     */
    public function features(?string $name = null): array
    {
        return collect($this->providers)
            ->flatMap(fn ($instance) => class_implements($instance))
            ->map(function ($feature) {
                return [
                    'key' => strtolower(preg_replace('/[^a-zA-Z0-9]/', '', basename(str_replace('\\', '/', str_replace(['Contract', 'contract'], '', $feature))))),
                    'name' => trim(preg_replace('/(?<=\w)(?=[A-Z])/', ' ', preg_replace('/[^a-zA-Z0-9]/', '', basename(str_replace('\\', '/', str_replace(['Contract', 'contract'], '', $feature)))))),
                    'base_name' => basename(str_replace('\\', '/', $feature)),
                    'file_path' => $feature,
                ];
            })
            ->when($name, fn ($collection) => $collection->pluck($name)->values()->all(), fn ($collection) => $collection->values()->all());
    }

    /**
     * Retrieve all features provided by the AI providers.
     *
     * @param string|null $provider Optional. If specified, returns features only for the given provider.
     * @return array|array[] Returns an array containing features provided by AI providers. If $provider is specified, returns features only for that provider.
     */
    public function providerSupportedFeatures(?string $provider = null): array
    {
        foreach ($this->providers as $key => $instance) {
            $features = array_values(class_implements($instance));
           
            foreach($features as $k => $feature) {
                $allFeatures[$key][$k]['name'] = preg_replace('/(?<=\w)(?=[A-Z])/', ' ', str_replace(['_', 'Contract'], '', basename(str_replace('\\', '/', $feature))));
                $allFeatures[$key][$k]['base_name'] = basename(str_replace('\\', '/', $feature));
                $allFeatures[$key][$k]['file_path'] = $feature;
            }
        }

        return !is_null($provider) && isset($allFeatures[$provider]) ? $allFeatures[$feature] : $allFeatures;
    }

    /**
     * Retrieve the providers that support a given feature, or return all the providers along with the feature if no feature is specified.
     *
     * @param string|null $feature The name of the feature to check for support.
     * @return array|array[] Returns an array of providers supporting the specified feature if provided, or an array containing all providers along with their respective providers.
     */
    public function featureSupportedProviders(?string $feature = null): array
    {
        $aiFeatureProviders = [];

        foreach ($this->providers as $provider) {
            $interfaces = (new \ReflectionClass($provider))->getInterfaces();
            
            foreach ($interfaces as $reflectionClass) {
                $interfaceName = str_replace('Contract', '', basename(str_replace('\\', '/', $reflectionClass->getName())));
                
                if (!$feature || strtolower($interfaceName) == strtolower($feature)) {
                    $aiFeatureProviders[$feature ?: strtolower($interfaceName)][] = $provider;
                    break; // Break loop after finding the first interface
                }
            }
        }
        
        return !is_null($feature) && isset($aiFeatureProviders[strtolower($feature)]) ? $aiFeatureProviders[strtolower($feature)] : $aiFeatureProviders;
    }

    public function databaseOptions(string $feature): array
    {
        $providers = \App\Models\Preference::where('category', $feature)->pluck('value', 'field')->toArray();

        $aiProviders = array_map(function ($provider) {
            $decodedProvider = json_decode($provider, true);
            if (!$decodedProvider) {
                return [];
            }
            foreach ($decodedProvider as $setting) {
                if (isset($setting['name']) && isset($setting['value']) && $setting['name'] === 'status' && $setting['value'] === 'on') {
                    return $decodedProvider;
                }
            }
            return [];
        }, $providers);

        return array_filter($aiProviders, function ($value, $key) {
            $provider = explode('_', $key, 2)[1];

            $addon = \Modules\Addons\Entities\Addon::find($provider);

            if ($addon) {
                return !empty($value) && $addon->isEnabled();
            }

            return !empty($value);
            
        }, ARRAY_FILTER_USE_BOTH);
    }

    public function rules(string $feature): array
    {
        $rules = [];

        foreach ($this->providers as $key => $provider) {
           $rules[$key] = $provider->{$feature . 'Rules'}();
        }

        return $rules;
    }

    /**
     * Check if the provider is active for the specified feature.
     *
     * @param string $alias The alias (name) of the provider.
     * @param string $featureName The name of the feature to check against.
     * @return object|null Returns the provider object if active, or null if not found.
     */
    public function isActive(string $alias, string $featureName): object|null
    {
        $providers = array_keys($this->databaseOptions($featureName));
        $filteredProviders = array_map(function($provider) use ($featureName) {
            return explode($featureName . '_', $provider)[1];
        }, $providers);
    
        if (in_array($alias, $filteredProviders)) {
            return $this->find($alias);
        }

        return null;
    }

}
