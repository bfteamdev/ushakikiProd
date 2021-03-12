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
            'title' => 'Group',
            'root' => true,
            'icon' => 'media/svg/icons/Code/Compiling.svg', // or can be 'flaticon-home' or any flaticon-*
            'page' => '/group',
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
                    'page' => '/category',
                ],
                [
                    'title' => 'Sub-category',
                    'page' => '/sub-category',
                ],
            ],
        ],
        [
            'title' => 'Features',
            'root' => true,
            'icon' => 'media/svg/icons/Code/Compiling.svg', // or can be 'flaticon-home' or any flaticon-*
            'page' => '/features',
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
                    'page' => '/client',
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
                    'title' => 'Ads',
                    'page' => '/ads',
                ],
                [
                    'title' => 'Create Ads',
                    'page' => '/ads/create',
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
                    'page' => '/category',
                ],
                [
                    'title' => 'Order pending',
                    'page' => '',
                ],
                [
                    'title' => 'Order deleted',
                    'page' => '',
                ],
            ],
        ],
    ]
];
