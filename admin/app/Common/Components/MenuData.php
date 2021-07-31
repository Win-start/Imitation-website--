<?php

namespace App\Common\Components;

class MenuData {

    public static $_data = [
        // 'index' => [
        //     'title' => '首页',
        //     'url' => [
        //         'href' => '/admin/index'
        //     ],
        //     'current' => false,
        //     'enabled' => false,
        //     'prefix' => '<i class="fa fa-home"></i>',
        //     'maps' => ['/admin/index'],
        // ],
        'goods' => [
            'title' => '商品管理',
            'url' => [
                'href' => '#'
            ],
            'current' => false,
            'enabled' => false,
            'prefix' => '<i class="fa fa-table"></i>',
            'maps' => [],
            'items' => [
                'goods-category' => [
                    'title' => '商品分类管理',
                    'url' => [
                        'href' => '/admin/category'
                    ],
                    'current' => false,
                    'enabled' => false,
                    'prefix' => '',
                    'maps' => ['/admin/category','/admin/category_add','/admin/category_edit'],
                ],
                'goods-detail' => [
                    'title' => '商品详情管理',
                    'url' => [
                        'href' => '/admin/product'
                    ],
                    'current' => false,
                    'enabled' => false,
                    'prefix' => '',
                    'maps' => ['/admin/product','/admin/product_add','/admin/product_edit','/admin/attributes','/admin/attributes_list','/admin/attributes_edit'],
                ],
                'goods-sku' => [
                    'title' => '商品规格管理',
                    'url' => [
                        'href' => '/admin/format'
                    ],
                    'current' => false,
                    'enabled' => false,
                    'prefix' => '',
                    'maps' => ['/admin/format','/admin/format_add','/admin/format_edit','/admin/format_view','/admin/format_value','/admin/format_valueEdit']
                ],
                'goods-comment' => [
                    'title' => '商品评论管理',
                    'url' => [
                        'href' => '/admin/comment'
                    ],
                    'current' => false,
                    'enabled' => false,
                    'prefix' => '',
                    'maps' => ['/admin/comment']
                ],
            ]
        ],
        'orders' => [
            'title' => '订单管理',
            'url' => [
                'href' => '#'
            ],
            'current' => false,
            'enabled' => false,
            'prefix' => '<i class="fa fa-folder"></i>',
            'maps' => [],
            'items' => [
                'order-list' => [
                    'title' => '订单列表',
                    'url' => [
                        'href' => '/admin/order'
                    ],
                    'current' => false,
                    'enabled' => false,
                    'prefix' => '',
                    'maps' => ['/admin/order','/admin/order_detail'],
                ],              
            ]
        ],  
        'links' => [
            'title' => '友情链接',
            'url' => [
                'href' => '#'
            ],
            'current' => false,
            'enabled' => false,
            'prefix' => '<i class="fa fa-folder"></i>',
            'maps' => [],
            'items' => [
                'order-list' => [
                    'title' => '友情链接列表',
                    'url' => [
                        'href' => '/admin/link'
                    ],
                    'current' => false,
                    'enabled' => false,
                    'prefix' => '',
                    'maps' => ['/admin/link','/admin/link_add'],
                ],             
            ]
        ],           
        'articles' => [
            'title' => '公告管理',
            'url' => [
                'href' => '#'
            ],
            'current' => false,
            'enabled' => false,
            'prefix' => '<i class="fa fa-calendar"></i>',
            'maps' => [],
            'items' => [
                'articlecategory' => [
                    'title' => '公告分类管理',
                    'url' => [
                        'href' => '/admin/articlecategory'
                    ],
                    'current' => false,
                    'enabled' => false,
                    'prefix' => '',
                    'maps' => ['/admin/articlecategory','/admin/articlecategory_add','/admin/articlecategory_edit'],
                ],   
                'article' => [
                    'title' => '公告详情管理',
                    'url' => [
                        'href' => '/admin/article'
                    ], 
                    'current' => false,
                    'enabled' => false,
                    'prefix' => '',
                    'maps' => ['/admin/article','/admin/article_add','/admin/article_edit'],
                ],                            
            ]
        ],  
        'advert' => [
            'title' => '广告管理',
            'url' => [
                'href' => '#'
            ],
            'current' => false,
            'enabled' => false,
            'prefix' => '<i class="fa fa-laptop"></i>',
            'maps' => [],
            'items' => [
                'advert' => [
                    'title' => '广告详情管理',
                    'url' => [
                        'href' => '/admin/advert'
                    ],
                    'current' => false,
                    'enabled' => false,
                    'prefix' => '',
                    'maps' => ['/admin/advert','/admin/advert_add','/admin/advert_edit'],
                ],                             
            ]
        ], 
        'note' => [
            'title' => '动态管理',
            'url' => [
                'href' => '#'
            ],
            'current' => false,
            'enabled' => false,
            'prefix' => '<i class="fa fa-book"></i>',
            'maps' => [],
            'items' => [
                'note_list' => [
                    'title' => '动态详情管理',
                    'url' => [
                        'href' => '/admin/note'
                    ],
                    'current' => false,
                    'enabled' => false,
                    'prefix' => '',
                    'maps' => ['/admin/note'],
                ],                             
            ]
        ], 
        'user' => [
            'title' => '用户管理',
            'url' => [
                'href' => '#'
            ],
            'current' => false,
            'enabled' => false,
            'prefix' => '<i class="fa fa-files-o"></i>',
            'maps' => [],
            'items' => [
                'user_list' => [
                    'title' => '用户详情管理',
                    'url' => [
                        'href' => '/admin/user'
                    ],
                    'current' => false,
                    'enabled' => false,
                    'prefix' => '',
                    'maps' => ['/admin/user','/admin/user_edit','/admin/user_add'],
                ],                
                'user_pwd' => [
                    'title' => '修改密码',
                    'url' => [
                        'href' => '/admin/user_pwd'
                    ],
                    'current' => false,
                    'enabled' => false,
                    'prefix' => '',
                    'maps' => ['/admin/user_pwd'],
                ],                                               
            ]
        ],                                     
        // 'admin-system' => [
        //     'title' => '系统设置',
        //     'url' => [],
        //     'current' => false,
        //     'enabled' => false,
        //     'prefix' => '<i class="fa fa-gear"></i>',
        //     'maps' => [''],
        //     'items' => [
        //         'base-setting' => [
        //             'title' => '站内地图',
        //             'url' => [
        //                 'href' => '/base-set/base-site/index'
        //             ],
        //             'current' => false,
        //             'enabled' => false,
        //             'prefix' => '',
        //             'maps' => ['b_system_map']
        //         ],
        //     ]
        // ],
    ];

    public static function getData()
    {
        $userInfo = session()->get('admin');
        if (!$userInfo) {
            return [];
        }
        $route = \Request::path();

        foreach (static::$_data as $dataKey => $data) {
            if (empty($data['items'])) {
                if (!empty($data['maps']) && in_array(trim($route, '/'), static::filterArr($data['maps']))) {
                    static::$_data[$dataKey]['current'] = true;
                    static::$_data[$dataKey]['enabled'] = true;
                    break;
                }
            } else {
                foreach ($data['items'] as $itemkey => $items) {
                    if (!empty($items['maps']) && in_array(trim($route, '/'), static::filterArr($items['maps']))) {
                        static::$_data[$dataKey]['current'] = true;
                        static::$_data[$dataKey]['enabled'] = true;
                        static::$_data[$dataKey]['items'][$itemkey]['current'] = true;
                        static::$_data[$dataKey]['items'][$itemkey]['enabled'] = true;
                        break;
                    }
                }
            }
        }
        return static::$_data;
    }

    protected static function filterArr($data)
    {
        return array_map(function($val) {
            return trim($val, '/');
        }, $data);
    }

//    public static function setCurrent($key, &$items = null)
//    {
//        if (!$items) {
//            $items = &self::$_data;
//        }
//        foreach ($items as $k => $d) {
//            if ($k == $key) {
//                $items[$k]['current'] = true;
//                return true;
//            } else if (!empty($d['items'])) {
//                if (self::setCurrent($key, $items[$k]['items'])) {
//                    $items[$k]['current'] = true;
//                    return true;
//                }
//            }
//        }
//        return false;
//    }
}
