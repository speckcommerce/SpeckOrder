<?php

namespace SpeckOrder\Event;

use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\View\Model\ViewModel;

class PlaceHolder implements ServiceLocatorAwareInterface
{
    protected $serviceLocator;

    public function orderView($e)
    {
        $vars = $e->getParam('vars');
        $views = $e->getParam('views');

        $placeHolders = $this->getConfig('view_order_placeholders');

        foreach($placeHolders as $key => $template) {
            $view = new ViewModel($vars);
            $view->setTemplate($template);
            $views[$key] = $view;
        }

        return $views;
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
