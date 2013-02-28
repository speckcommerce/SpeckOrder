<?php

namespace SpeckOrder\Event;

use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\View\Model\ViewModel;

class Order implements ServiceLocatorAwareInterface
{
    protected $serviceLocator;

    public function orderActions($e)
    {
        $vars = $e->getParam('order');
        $orderNum = '123456';

        //if ($order->hasFlag('paid')) {
        if(true) {
            $actions['receipt']['uri']   = '/manage-order/{order_id}/receipt';
        }

        return array(
            'actions' => isset($actions) ? $actions : array(),
            //'search' => array(),
            //'replace' => array()
        );
    }

    public function getConfig($key = null)
    {
        $config = $this->getServiceLocator()->get('speckorder_config');
        if(null === $key) {
            return $config;
        }
        if ($key && isset($config[$key])) {
            return $config[$key];
        }
    }

    /**
     * @return serviceLocator
     */
    public function getServiceLocator()
    {
        return $this->serviceLocator;
    }

    /**
     * @param $serviceLocator
     * @return self
     */
    public function setServiceLocator(ServiceLocatorInterface $serviceLocator)
    {
        $this->serviceLocator = $serviceLocator;
        return $this;
    }
}
