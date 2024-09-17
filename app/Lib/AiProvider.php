<?php

namespace App\Lib;

use App\Facades\AiProviderManager;

abstract class AiProvider
{
    private $alias;

    public function __construct(string $alias) 
    {
        $this->alias = $alias;
    }

    /**
     * Get the generated outlines.
     *
     * @return array The generated outlines.
     *
     * @example 
     *  [
     *      'title' => 'OpenAi',
     *      'description' => 'OpenAI pioneers AI breakthroughs in chat, image, voice, and text processing. With cutting-edge models, we excel in natural language understanding, image recognition, and voice synthesis, shaping the future of AI.',
     *      'image' => 'Modules/OpenAI/Resources/assets/image/ai_provider.jpg',
     *  ]
     */
    public abstract function description(): array;


    /**
     * Retrieve all features provided by the AI providers.
     *
     * @param string|null $provider Optional. If specified, returns features only for the given provider.
     * @return array|array[] Returns an array containing features provided by AI providers. If $provider is specified, returns features only for that provider.
     * 
     * @example
     * 
     * [
     *   "openai" =>  [
     *     [
     *        "name" => "Long Article"
     *        "base_name" => "LongArticleContract"
     *        "file_path" => "Modules\OpenAI\Contracts\Resources\LongArticleContract"
     *     ], 
     *     [
     *       "name" => "Image"
     *       "base_name" => "ImageContract"
     *       "file_path" => "Modules\OpenAI\Contracts\Resources\ImageContract"
     *      ]
     * ],
     * 
     */
    public function providerSupportedFeatures(?string $name = null): array
    {
        return AiProviderManager::providerSupportedFeatures($name);
    }

    /**
     * Retrieve the providers that support a given feature, or return all the providers along with the feature if no feature is specified.
     *
     * @param string|null $feature The name of the feature to check for support.
     * @return array|array[] Returns an array of providers supporting the specified feature if provided, or an array containing all providers along with their respective providers.
     * 
     * @example
     * 
     * [
     *   "longarticle" => [
     *      Modules\OpenAI\AiProviders\OpenAi\OpenAiProvider 
     *    ],
     *   "image" => [
     *      Modules\OpenAI\AiProviders\StabilityAi\StabilityAiProvider
     *      Modules\OpenAI\AiProviders\Clipdrop\ClipdropProvider
     *    ]
     * ]
     * 
     */
    public function featureSupportedProviders($feature = null)
    {
        return AiProviderManager::featureSupportedProviders($feature);
    }

    /**
     * Retrieve details of features.
     *
     * @param string|null $name Optional. If specified, returns details only for the feature with the given name.
     * @return array|array[] Returns an array containing details of features. If $name is specified, returns only that value.
     * 
     * @example
     * 
     * [
     *    [
     *       "key" => "longarticle",
     *       "name" => "Long Article",
     *       "base_name" => "LongArticleContract",
     *       "file_path" => "Modules\OpenAI\Contracts\Resources\LongArticleContract"
     *    ],
     *    [
     *       "key" => "image",
     *       "name" => "Image",
     *       "base_name" => "ImageContract",
     *       "file_path" => "Modules\OpenAI\Contracts\Resources\ImageContract"
     *    ]
     * ]
     * 
     */
    public function features(string $name = null): array
    {
        return AiProviderManager::features($name);
    }

    public function alias()
    {
        return $this->alias;
    }
}