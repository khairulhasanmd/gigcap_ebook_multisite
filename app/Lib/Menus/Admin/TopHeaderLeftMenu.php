<?php

/**
 * @author TechVillage <mailto:support@techvill.org>
 *
 * @contributor Md. Mostafijur Rahman <[mailto:mostafijur.techvill@gmail.com]>
 *
 * @created 20-01-2024
 */

namespace App\Lib\Menus\Admin;
use Modules\Addons\Entities\Addon;

class TopHeaderLeftMenu
{
    /**
     * Get menu items
     */

    public static function get(): array
    {
        $addons = Addon::find('Affiliate');
        $isVisibile = false;
        $route = '#';
        if ($addons && $addons->isEnabled()) {
            $isVisibile = true;
            $route = route('admin.affiliate.dashboard');
        }
        $items = [
            'full_screen' => [
                'item' => '<a href="javascript:" class="full-screen text-decoration-none ltr:ps-2 rtl:pe-2" onclick="javascript:toggleFullScreen()"><i class="feather icon-maximize"></i></a>',
                'position' => '10',
                'visibility' => true,
            ],
            'visit_site' => [
                'item' => '<a class="d-flex align-items-center text-decoration-none" href="'. route('home') . '" target="_blank">
                <i class="feather icon-globe"></i><span class="list-curent-color ml-2 ltr:ms-2 rtl:me-2">'.__('Visit Site').'</span></a>',
                'position' => '20',
                'visibility' => true,
            ],
            'affiliate' => [
                'item' => '<a class="d-flex align-items-center text-decoration-none" href="' . $route . '" target="_blank">
                <i class="feather icon-external-link"></i><span class="list-curent-color ltr:ms-2 rtl:me-2">' . __('Affiliate Panel') . '<small class="badge badge-primary ms-1 mt-0">' . __('Addon') . '</small>' . '</span></a>',
                'position' => '40',
                'visibility' => $isVisibile,
            ],
            'customer_panel' => [
                'item' => '<a class="d-flex align-items-center text-decoration-none" href="'. route('user.dashboard') .'" target="_blank">
                <i class="feather icon-external-link"></i><span class="ltr:ms-2 rtl:me-2 ml-2 list-curent-color">'.__('Customer Panel').'</span></a>',
                'position' => '30',
                'visibility' => true,
            ],
            'quick_link' => [
                'item' => QuickLink::getQuickLinkMenu(),
                'position' => '50',
                'visibility' => true,
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
