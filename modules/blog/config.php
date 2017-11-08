<?php

return [
    'components' => [
        'user' => [
            'class' => 'app\modules\blog\models\User',
            'enableAutoLogin' => true,
            'loginUrl' => ['blog/auth/login']
        ],
    ]
];