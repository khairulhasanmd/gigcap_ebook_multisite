<?php

/**
 * @package Admin sidebar general setting menu
 * @author TechVillage <mailto:support@techvill.org>
 * @contributor Md. Mostafijur Rahman <[mailto:mostafijur.techvill@gmail.com]>
 * @created 12-10-2023
 */

namespace App\Lib\Menus\Admin;

use App\Models\Permission;
use Illuminate\Support\Facades\{
    Auth,
    Route
};
use Modules\Addons\Entities\Addon;

class GeneralSettings
{

    /**
     * Get menu items
     *
     * @return array
     */
    public static function get(): array
    {
        $prms = Permission::getAuthUserPermission(optional(Auth::user())->id);
        $items = [
            [
                'label' => __('System Setup'),
                'name' => 'system_setup',
                'href' => route('companyDetails.setting'),
                'position' => '10',
                'visibility' => in_array('App\Http\Controllers\CompanySettingController@index', $prms),
            ],
            [
                'label' => __('Preference'),
                'name' => 'preference',
                'href' => route('preferences.index'),
                'position' => '20',
                'visibility' => true,
            ],
            [
                'label' => __('Maintenance Mode'),
                'name' => 'maintenance',
                'href' => route('maintenance.enable'),
                'position' => '30',
                'visibility' => in_array('App\Http\Controllers\MaintenanceModeController@enable', $prms),
            ],
            [
                'label' => __('Language'),
                'name' => 'language',
                'href' => route('language.index'),
                'position' => '40',
                'visibility' => in_array('App\Http\Controllers\LanguageController@index', $prms),
            ],
            [
                'label' => __('GDPR'),
                'name' => 'gdpr-config',
                'href' => Route::has('gdpr.config') ? route('gdpr.config') : '#',
                'position' => '50',
                'visibility' => Addon::findByAlias('gdpr')?->isEnabled() && in_array('Modules\Gdpr\Http\Controllers\GdprController@create', $prms),
            ],
            [
                'label' => __('Redirect Link'),
                'name' => 'redirect_link',
                'href' => route('setting.setRedirectLink'),
                'position' => '60',
                'visibility' => in_array('App\Http\Controllers\CompanySettingController@setRedirectLink', $prms),
            ],
        ];

        // Sort items based on position, placing items without a position at the beginning
        usort($items, function ($a, $b) {
            $positionA = isset($a['position']) ? $a['position'] : -1;
            $positionB = isset($b['position']) ? $b['position'] : -1;

            return $positionA <=> $positionB;
        });

        return $items;
    }
}
