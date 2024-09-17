<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static AiProviderInstance find(string $alias)
 * @method static array get()
 * @method static array all()
 * @method static void add()
 * @method static array names()
 * @method static array features()
 * @method static array providerSupportedFeatures()
 * @method static array featureSupportedProviders()
 * @method static array featureSupportedProviders()
 * @method static array databaseOptions()
 * @method static array rules()
 *
 * @see \App\Lib\AiProviderManager
 */

class AiProviderManager extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'aiprovidermanager';
    }
}
