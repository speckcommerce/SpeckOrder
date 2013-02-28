<?php
return array(
    'router' => array(
        'routes' => array(
            'zfcadmin' => array(
                'child_routes' => array(
                    'manage-orders' => array(
                        'type'    => 'Literal',
                        'options' => array(
                            'route'    => '/manage-orders',
                            'defaults' => array(
                                'controller' => 'order_management',
                                'action'     => 'index',
                            ),
                        ),
                    ),
                    'manage-customers' => array(
                        'type'    => 'Literal',
                        'options' => array(
                            'route'    => '/manage-customers',
                            'defaults' => array(
                                'controller' => 'order_management',
                                'action'     => 'customers',
                            ),
                        ),
                    ),
                    'manage-order' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/manage-order/:orderId[/:actionName]',
                            'defaults' => array(
                                'controller' => 'order_management',
                                'action'     => 'order',
                            ),
                        ),
                    ),
                    'manage-customer' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/manage-customer/:orderId[/:actionName]',
                            'defaults' => array(
                                'controller' => 'order_management',
                                'action'     => 'customer',
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
);
