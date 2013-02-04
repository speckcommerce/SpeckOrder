<?php
return array(
    'router' => array(
        'routes' => array(
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
            'manage-order' => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '/manage-order/:orderNumber',
                    'defaults' => array(
                        'controller' => 'order_management',
                        'action'     => 'order',
                    ),
                ),
            ),
        ),
    ),
);
