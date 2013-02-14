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
            'speckOrderSearchFilterRadio' => 'SpeckOrder\Form\View\Helper\SearchFilterRadio',
        ),
        'factories' => array(
            'speckOrder' => function ($sm) {
                $sm = $sm->getServiceLocator();
                $helper = new \SpeckOrder\View\Helper\SpeckOrder;
                return $helper;
            }
        ),
    ),
    'service_manager' => array(
        'shared' => array(
            'speckorder_form_orderflags' => false,
        ),
        'invokables' => array(
            'speckorder_service_orderservice' => 'SpeckOrder\Service\OrderService',
            'speckorder_event_placeholder'    => 'SpeckOrder\Event\PlaceHolder',
            'speckorder_event_order'          => 'SpeckOrder\Event\Order',
        ),
        'factories' => array(
            'speckorder_form_orderflags' => function ($sm) {
                $orderService = $sm->get('speckorder_service_orderservice');
                $opts['flags'] = $orderService->getAllFlags();
                $form = new \SpeckOrder\Form\OrderFlags($opts);
                return $form;
            },
            'speckorder_form_ordersearch' => function ($sm) {
                $orderService = $sm->get('speckorder_service_orderservice');
                $opts['flags'] = $orderService->getAllFlags();
                $form = new \SpeckOrder\Form\OrderSearch($opts);
                return $form;
            },
            'speckorder_config' => function ($sm) {
                $config = array(
                    'view_order_placeholders' => array(
                        //relative to view directory
                        'header'    => '/speck-order/order-management/order/placeholder/header',
                        'content_1' => '/speck-order/order-management/order/placeholder/content-1',
                        'content_2' => '/speck-order/order-management/order/placeholder/content-2',
                        'content_3' => '/speck-order/order-management/order/placeholder/content-3',
                        'footer'    => '/speck-order/order-management/order/placeholder/footer',
                    ),
                    'search_form_fieldset_partials' => array(
                        //relative to view directory
                        'filters' => '/speck-order/order-management/order/search/partial/search-filters',
                        'default' => '/speck-order/order-management/order/search/partial/search-fieldset',
                    ),
                    'order_actions' => array(
                        'invoice' => array(
                            'type'  => 'uri',
                            'uri'   => '/manage-order/{order_num}/invoice',
                            'label' => 'View Invoice',
                            'title' => 'Invoice - Payment Due',
                        ),
                        'receipt' => array(
                            'type' => 'uri',
                            'label' => 'View Receipt',
                            'title' => 'Payment Not Received',
                        ),
                    ),
                );
                $smConfig = $sm->get('Config');
                if($smConfig['speckorder']) {
                    $config = \Zend\Stdlib\ArrayUtils::merge($config, $smConfig['speckorder']);
                }
                return $config;
            },
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

