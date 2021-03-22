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
                    'title' => 'Ads',
                    'page' => 'admin/ads',
                ],
                [
                    'title' => 'Create Ads',
                    'page' => 'admin/ads/create',
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
