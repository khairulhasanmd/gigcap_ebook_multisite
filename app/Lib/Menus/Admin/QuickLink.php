<?php

/**
 * @package Admin quick link
 * @author TechVillage <mailto:support@techvill.org>
 * @contributor Md. Mostafijur Rahman <[mailto:mostafijur.techvill@gmail.com]>
 * @created 20-01-2024
 */

namespace App\Lib\Menus\Admin;

class QuickLink
{
    /**
     * Get quick link menu
     *
     * @return string
     */
    public static function getQuickLinkMenu()
    {
        $quickLinks = self::getQuickLinks();
        
        $quickLinkMenu = '<div class="dropdown quick-dropdown">
            <a class="dropdown-toggle" data-bs-toggle="dropdown" href="javascript:" title="' . __('Quick Links') . '">
                <i class="feather icon-sliders"></i>
                <span class="ltr:ms-2 rtl:me-2 ml-2 list-curent-color">' .  __('Quick Links')  .'</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right profile-notification quick-link" data-bs-popper="static">
                <ul class="pro-body">';
        
        foreach ($quickLinks as $itemLink) {
            if (isset($itemLink['visibility']) && $itemLink['visibility'] === false) {
                continue;
            }

            if (isset($itemLink['divider']) && $itemLink['divider'] === true) {
                $quickLinkMenu .= '<li class="dropdown-divider"></li>';
            }

            $quickLinkMenu .= '<li>';
            $quickLinkMenu .= '<a href="' . ($itemLink['href'] ?? '') . '" class="dropdown-item text-decoration-none" target="' . ($itemLink['target'] ?? '_self') . '">';
            $quickLinkMenu .= $itemLink['icon'] ?? '';
            $quickLinkMenu .= $itemLink['name'] ?? '';
            $quickLinkMenu .= '</a>';
            $quickLinkMenu .= '</li>';
        }

        $quickLinkMenu .= '</ul>
            </div>
        </div>';

        return $quickLinkMenu;
    }

    /**
     * Get quick links
     *
     * @param int $type
     * @return array
     */
    public static function getQuickLinks()
    {
        $quickLinks = [
            [
                'name' => __('Add User'),
                'icon' => '<i class="feather icon-user-plus"></i>',
                'href' => route('users.create'),
                'position' => '10',
                'visibility' => true,
            ],
            [
                'name' => __('Add Plan'),
                'icon' => '<i class="feather icon-box"></i>',
                'href' => route('package.create'),
                'position' => '20',
                'visibility' => true,
            ],
            [
                'name' => __('Content'),
                'icon' => '<i class="feather icon-file-text"></i>',
                'href' => route('admin.features.contents'),
                'position' => '30',
                'visibility' => true,
            ],
            [
                'name' => __('Image'),
                'icon' => '<i class="feather icon-image"></i>',
                'href' => route('admin.features.imageList'),
                'position' => '40',
                'visibility' => true,
            ],
            [
                'name' => __('Codes'),
                'icon' => '<i class="feather icon-codepen"></i>',
                'href' => route('admin.features.code.list'),
                'position' => '50',
                'visibility' => true,
            ],
            [
                'name' => __('Coupons'),
                'icon' => '<i class="feather icon-tag"></i>',
                'href' => route('coupon.index'),
                'position' => '70',
                'visibility' => true,
            ],
            [
                'name' => __('Add Blog'),
                'icon' => '<i class="feather icon-file-text"></i>',
                'href' => route('blog.create'),
                'position' => '80',
                'visibility' => true,
            ],
            [
                'name' => __('Tickets'),
                'icon' => '<i class="feather icon-message-circle"></i>',
                'href' => route('admin.tickets'),
                'position' => '90',
                'visibility' => true,
            ],
            [
                'name' => __('Reports'),
                'icon' => '<i class="feather icon-bar-chart-2"></i>',
                'href' => route('reports'),
                'position' => '100',
                'visibility' => true,
            ],
            [
                'name' => __('Clear Cache'),
                'icon' => '<i class="feather icon-trash"></i>',
                'href' => route('clear-cache'),
                'position' => '110',
                'visibility' => true,
            ],
        ];

        // Sort the quick links based on position, placing items without a position at the beginning
        usort($quickLinks, function ($a, $b) {
            $positionA = isset($a['position']) ? $a['position'] : -1;
            $positionB = isset($b['position']) ? $b['position'] : -1;

            return $positionA <=> $positionB;
        });

        return $quickLinks;
    }

}
