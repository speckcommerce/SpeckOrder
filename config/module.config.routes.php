<?php
return array(
    'router' => array(
        'routes' => array(
            'order' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/order',
                ),
                'may_terminate' => false,
                'child_routes' => array(
          				'process' => array(
	                        'type'    => 'Literal',
	                        'options' => array(
	                            'route'    => '/process',
	                            'defaults' => array(
	                                'controller' => 'order',
	                                'action'     => 'index',
	                            ),
	                        ),
	                    ),
                  ),
            ),
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
                    'order' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/order/:orderId',
                            'defaults' => array(
                                'controller' => 'order_management',
                                'action'     => 'order',
                            ),
                        ),
                    ),
                    'manage-order' => array(
                        'type'  => 'Literal',
                        'options' => array(
                            'route' => '/manage-order',
                            'defaults' => array(
                                'controller' => 'order_management',
                            ),
                        ),
                        'may_terminate' => false,
                        'child_routes' => array(
                            'edit-address' => array(
                                'type'    => 'Segment',
                                'options' => array(
                                    'route' => '/edit-address/:orderId',
                                    'defaults' => array(
                                        'action' => 'editAddress',
                                    ),
                                ),
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
