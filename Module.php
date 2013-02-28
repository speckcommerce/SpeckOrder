<?php

namespace SpeckOrder;

class Module
{
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getConfig()
    {
        $config = array();
        $configFiles = array(
            __DIR__ . '/config/module.config.php',
            __DIR__ . '/config/module.config.routes.php',
        );
        foreach($configFiles as $configFile) {
            $config = \Zend\Stdlib\ArrayUtils::merge($config, include $configFile);
        }
        return $config;
    }

    public function onBootstrap($e)
    {
        if($e->getRequest() instanceof \Zend\Console\Request){
            return;
        }

        $app = $e->getParam('application');
        $em  = $app->getEventManager()->getSharedManager();

        $placeHolder = $app->getServiceManager()->get('speckorder_event_placeholder');
        $em->attach(
            'SpeckOrder\Controller\OrderManagementController',
            'renderOrderPlaceHolders',
            array($placeHolder, 'orderView')
        );

        $orderActions = $app->getServiceManager()->get('speckorder_event_order');
        $em->attach(
            'SpeckOrder\Controller\OrderManagementController',
            'orderAction.pre',
            array($orderActions, 'orderActions')
        );
    }

}
