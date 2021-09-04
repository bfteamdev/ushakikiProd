<?php
// Aside menu
return [

    'items' => [
        // Dashboard
        [
            'title' => 'Dashboard',
            'root' => true,
            'icon' => 'media/svg/icons/Design/Layers.svg', // or can be 'flaticon-home' or any flaticon-*
            'page' => 'admin',
            'new-tab' => false,
        ],
        // Layout
        [
            'section' => 'Layout',
        ],
        [
            'title' => 'Group',
            'root' => true,
            'icon' => 'media/svg/icons/Code/Compiling.svg', // or can be 'flaticon-home' or any flaticon-*
            'page' => 'admin/group',
            'new-tab' => false,
        ],
        [
            'title' => 'Categories',
            'root' => true,
            'icon' => 'media/svg/icons/Code/Compiling.svg', // or can be 'flaticon-home' or any flaticon-*
            "bullet" => "dot",
            'new-tab' => false,
            "submenu" => [
                [
                    'title' => 'Category',
                    'page' => 'admin/category',
                ],
                [
                    'title' => 'Sub-category',
                    'page' => 'admin/sub-category',
                ],
            ],
        ],
        [
            'title' => 'Features',
            'root' => true,
            'icon' => 'media/svg/icons/Code/Compiling.svg', // or can be 'flaticon-home' or any flaticon-*
            'page' => 'admin/features',
            'new-tab' => false,
        ],
        [
            'title' => 'Users',
            'root' => true,
            'icon' => 'media/svg/icons/Code/Compiling.svg', // or can be 'flaticon-home' or any flaticon-*
            "bullet" => "dot",
            'new-tab' => false,
            "submenu" => [
                [
                    'title' => 'Clients',
                    'page' => 'admin/client',
                ],
                // [
                //     'title' => 'Organisation',
                //     'page' => '',
                // ],
            ],
        ],
        [
            'title' => 'All ads',
            'root' => true,
            'icon' => 'media/svg/icons/Code/Compiling.svg', // or can be 'flaticon-home' or any flaticon-*
            "bullet" => "dot",
            'new-tab' => false,
            "submenu" => [
                [
                    'title' => 'Immobilier',
                    'page' => 'admin/ads/immobilier',
                ],
                [
                    'title' => 'Voiture',
                    'page' => 'admin/ads/voiture',
                ],
                [
                    'title' => 'Trucs',
                    'page' => 'admin/ads/truc',
                ],
                [
                    'title' => 'Service',
                    'page' => 'admin/ads/service',
                ],
            ],
        ],
        [
            'title' => 'All orders',
            'root' => true,
            'icon' => 'media/svg/icons/Code/Compiling.svg', // or can be 'flaticon-home' or any flaticon-*
            "bullet" => "dot",
            'new-tab' => false,
            "submenu" => [
                [
                    'title' => 'Order',
                    'page' => 'admin/order',
                ],
                
            ],
        ],
        [
            'title' => 'Settings',
            'root' => true,
            'icon' => 'media/svg/icons/Code/Compiling.svg', // or can be 'flaticon-home' or any flaticon-*
            'page' => 'admin/group',
            "bullet" => "dot",
            'new-tab' => false,
            "submenu" => [
                [
                    'title' => 'Faq',
                    'page' => 'admin/faq',
                ],
                
            ],
        ],
    ]
];
