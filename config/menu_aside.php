<?php
// Aside menu
return [

    'items' => [
        // Dashboard
        [
            'title' => 'Dashboard',
            'root' => true,
            'icon' => 'media/svg/icons/Design/Layers.svg', // or can be 'flaticon-home' or any flaticon-*
            'page' => '/',
            'new-tab' => false,
        ],
        // Layout
        [
            'section' => 'Layout',
        ],
        [
            'title' => 'Categories',
            'desc' => '',
            'icon' => 'media/svg/icons/Code/Compiling.svg',
            'bullet' => 'dot',
            'root' => true,
            'submenu' => [
                [
                    'title' => 'Group',
                    'page' => '/group'
                ],
                [
                    'title' => 'Category',
                    'page' => 'category'
                ],
                [
                    'title' => 'Type',
                    'page' => 'type'
                ],
                [
                    'title' => 'Feature',
                    'page' => 'feature'
                ]
            ]
        ],
        [
            'title' => 'Users',
            'desc' => '',
            'icon' => 'media/svg/icons/Code/Compiling.svg',
            'bullet' => 'dot',
            'root' => true,
            'submenu' => [
                [
                    'title' => 'Client',
                    'page' => '/client'
                ],
            ]
        ],
        [
            'title' => 'General',
            'icon' => 'media/svg/icons/General/Settings-1.svg',
            'bullet' => 'dot',
            'root' => true,
            'submenu' => [
                [
                    'title' => 'Fixed Content',
                    'page' => 'layout/general/fixed-content'
                ],
                [
                    'title' => 'Minimized Aside',
                    'page' => 'layout/general/minimized-aside'
                ],
                [
                    'title' => 'No Aside',
                    'page' => 'layout/general/no-aside'
                ],
                [
                    'title' => 'Empty Page',
                    'page' => 'layout/general/empty-page'
                ],
                [
                    'title' => 'Fixed Footer',
                    'page' => 'layout/general/fixed-footer'
                ],
                [
                    'title' => 'No Header Menu',
                    'page' => 'layout/general/no-header-menu'
                ]
            ]
        ],
        [
            'title' => 'Builder',
            'root' => true,
            'icon' => 'media/svg/icons/Home/Library.svg',
            'page' => '#',
            'visible' => 'preview',
        ],
    ]

];
