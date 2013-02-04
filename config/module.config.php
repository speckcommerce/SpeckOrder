<?php

$config = array(
    'controllers' => array(
        'invokables' => array(
            'order_management'  => 'SpeckOrder\Controller\OrderManagementController',
        ),
    ),
    'view_helpers' => array(
        'shared' => array(
            //'speckCatalogForm' => false,
        ),
        'invokables' => array(
            //'speckCatalogRenderChildren' => 'SpeckCatalog\View\Helper\ChildViewRenderer',
        ),
    ),
    'asset_manager' => array(
        'resolver_configs' => array(
            'paths' => array(
                __DIR__ . '/../public',
            ),
        ),
    ),
    'navigation' => array(
        'admin' => array(
            'manage-orders' => array(
                'label' => 'Order Management',
                'route' => 'manage-orders',
            ),
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view'
        ),
    ),
);
return $config;

