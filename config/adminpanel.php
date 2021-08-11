<?php

return [
    'menu' => [
        [
            'name' => 'الفواتير',
            'type' => 'single',
            'icon' => 'dollar-sign',
            'route' => 'admin.bill.index',
        ],
        [
            'name' => 'المدفوعات',
            'type' => 'single',
            'icon' => 'dollar-sign',
            'route' => 'admin.payment.index',
        ],
        [
            'name' => 'المستخدمين',
            'type' => 'single',
            'icon' => 'users',
            'route' => 'admin.user.index',
        ]
    ]
];
