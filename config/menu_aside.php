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
            "submenu" =>[
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
            'page' => '/feature',
            'new-tab' => false,
        ],
        [
            'title' => 'Clients',
            'root' => true,
            'icon' => 'media/svg/icons/Code/Compiling.svg', // or can be 'flaticon-home' or any flaticon-*
            'page' => '/client',
            'new-tab' => false,
        ],
    ]
];
