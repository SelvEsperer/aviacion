<?php
return [
    'index' => [
        'type' => 2,
    ],
    'member' => [
        'type' => 1,
        'ruleName' => 'userGroup',
    ],
    'admin' => [
        'type' => 1,
        'ruleName' => 'userGroup',
        'children' => [
            'member',
            'index',
        ],
    ],
];
