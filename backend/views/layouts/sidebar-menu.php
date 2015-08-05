<?php
use common\widgets\Menu;

echo Menu::widget([
    'options' => [
        'class' => 'sidebar-menu'
    ],
    'items' => [
        [
            'label' => Yii::t('app', 'Dashboard'),
            'url' => Yii::$app->homeUrl,
            'icon' => 'fa-dashboard',
            'active' => Yii::$app->request->url === Yii::$app->homeUrl
        ],
        [
            'label' => Yii::t('app', 'System'),
            'url' => [
                '#'
            ],
            'icon' => 'fa fa-cog',
            'options' => [
                'class' => 'treeview'
            ],
            'visible' => Yii::$app->user->can('admin'),
            'items' => [
                [
                    'label' => Yii::t('app', 'User'),
                    'url' => [
                        '/user/index'
                    ],
                    'icon' => 'fa fa-user'
                ],
                // 'visible' => (Yii::$app->user->identity->username == 'admin'),
                [
                    'label' => Yii::t('app', 'Role'),
                    'url' => [
                        '/role/index'
                    ],
                    'icon' => 'fa fa-lock'
                ]
            ]
        ],
        [
            'label' => '模特管理',
            'url' => [
                '#'
            ],
            'icon' => 'fa fa-users',
            'options' => [
                'class' => 'treeview'
            ],
            'visible' => Yii::$app->user->can('admin'),
            'items' => [
                [
                    'label' => '模特分类',
                    'url' => [
                        '/mt-cat/index'
                    ],
                    'icon' => 'fa fa-align-justify'
                ],
                [
                    'label' => '模特管理',
                    'url' => [
                        '/mt/index'
                    ],
                    'icon' => 'fa fa-user'
                ]
            ]
        ],
        [
            'label' => '留言管理',
            'url' => [
                '#'
            ],
            'icon' => 'fa fa-comments',
            'options' => [
                'class' => 'treeview'
            ],
            'visible' => Yii::$app->user->can('admin'),
            'items' => [
                [
                    'label' => '留言管理',
                    'url' => [
                        '/message/index'
                    ],
                    'icon' => 'fa fa-comment'
                ]
            ]
        ]
    ]
]);