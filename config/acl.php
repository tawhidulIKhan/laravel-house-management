<?php

return  [
        'roles' => [
            'admin',
            'manager',
            'general_member',
            'renter'
        ],
    'permissions' =>
        [
        'user.index' => ['admin'],
        'user.show' => ['admin'],
        'user.create' => ['admin'],
        'user.edit' => ['admin'],
        'user.delete' => ['admin'],

        'house.index' => ['admin'],
        'house.show' => ['admin'],
        'house.create' => ['admin'],
        'house.edit' => ['admin'],
        'house.delete' => ['admin'],

        'room.index' => ['admin'],
        'room.show' => ['admin'],
        'room.create' => ['admin'],
        'room.edit' => ['admin'],
        'room.delete' => ['admin'],

        'renter.index' => ['admin'],
        'renter.show' => ['admin'],
        'renter.create' => ['admin'],
        'renter.edit' => ['admin'],
        'renter.delete' => ['admin'],

        'transaction.index' => ['admin', 'manager', 'general_member', 'renter'],
        'transaction.show' => ['admin', 'manager', 'general_member'],
        'transaction.create' => ['admin', 'manager'],
        'transaction.edit' => ['admin', 'manager'],
        'transaction.delete' => ['admin', 'manager']
    ]

];
