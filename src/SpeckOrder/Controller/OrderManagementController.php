<?php

namespace SpeckOrder\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Stdlib\ArrayUtils;
use SpeckOrder\Util;

class OrderManagementController extends AbstractActionController
{
    protected $orderService;
    protected $eventManager;

    public function init()
    {
        $renderer = $this->getServiceLocator()->get('zendviewrendererphprenderer');
        $renderer->plugin('headScript')->appendFile('/js/data-tables.js');
        $renderer->plugin('headScript')->appendFile('/js/manage-orders.js');
        $renderer->plugin('headLink')->appendStylesheet('/css/manage-orders.css');
        $renderer->plugin('headLink')->appendStylesheet('/css/bootstrap-datatables.css');
    }

    public function indexAction()
    {
        $this->init();

        $view = new ViewModel(array(
            'orders' => array(
                'foo', 'bar', 'baz', 'baz',
                'baz', 'baz', 'baz', 'baz',
                'baz', 'foo', 'bar', 'baz',
                'baz', 'baz', 'baz', 'baz',
                'foo', 'bar', 'baz', 'baz',
                'baz', 'baz', 'baz', 'baz',
                'baz', 'foo', 'bar', 'baz',
                'baz', 'baz', 'baz', 'baz',
                'foo', 'bar', 'baz', 'baz',
                'baz', 'baz', 'baz', 'baz',
                'baz', 'foo', 'bar', 'baz',
                'baz', 'baz', 'baz', 'baz',
                'foo', 'bar', 'baz', 'baz',
                'baz', 'baz', 'baz', 'baz',
                'baz', 'foo', 'bar', 'baz',
                'baz', 'baz', 'baz', 'baz',
                'foo', 'bar', 'baz', 'baz',
                'baz', 'baz', 'baz', 'baz',
                'baz', 'foo', 'bar', 'baz',
                'baz', 'baz', 'baz', 'baz',
            )
        ));
        return $view;
    }

    public function invoice()
    {
        $params = $this->params('orderNumber');
        var_dump($params); die('asdf');
    }

    public function getOrder()
    {
        //$number  = $this->params('orderNumber');
        //$service = $this->getOrderService();
        //$order   = $orderService->getOrder($number);

        //mock up
        $address = <<<address

123 S St
Gilbert AZ 85297
address;

        $order = array(
            'order_number' => 'S123456',
            'ship_address' => $address,
            'bill_address' => $address,
            'items'        => array('', '', '', ''),
            'notes'        => array('note1', 'note2'),
            'payment'      => array(
                0 => array(
                    'amount'   => 99.99,
                    'type'     => 'credit-card',
                    'last_4'   => '1234',
                    'name'     => 'joe schmo'
                ),
            ),
            'flags' => array(
                'foo', 'bar', 'baz',
            ),
        );
        return $order;
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

    public function orderAction()
    {
        $actionName = $this->params('actionName');
        if ($actionName && method_exists($this, $actionName))  {
            return $this->$actionName();
        }

        $postParams = $this->params()->fromPost();
        if (count($postParams)) {
        }

        $nav = $this->getConfig('order_actions');
        $order = $this->getOrder();
        $orderNum = 123456;


        $search  = array('{order_num}');
        $replace = array($orderNum);
        $vars    = array('order' => $order, 'search' => $search, 'replace' => $replace);

        $response = $this->getEventManager()->trigger(__FUNCTION__, $this, $vars);
        if(count($response)) {
            foreach ($response as $return) {
                if(isset($return['actions'])) {
                    $nav = ArrayUtils::Merge($nav, $return['actions']);
                }
                if(isset($return['search'])) {
                    $search = ArrayUtils::Merge($search, $return['search']);
                }
                if(isset($return['replace'])) {
                    $replace = ArrayUtils::Merge($replace, $return['replace']);
                }
            }
        }
        $nav = Util\Misc::arrayStrReplace($search, $replace, $nav);
        $nav = new \Zend\Navigation\Navigation($nav);

        $viewVars = array(
            'order'        => $order,
            'placeHolders' => $this->renderOrderPlaceHolders(array('order' => $order, 'actions' => $nav)),
        );

        $view  = $this->getView(false, $viewVars);

        return $view;
    }

    public function renderOrderPlaceHolders($vars, array $views = array())
    {
        $response = $this->getEventManager()->trigger(__FUNCTION__, $this,
            array('vars' => $vars, 'views' => $views));
        foreach ($response as $return) {
            $views = ArrayUtils::Merge($views, $return);
        }

        $placeHolders = array();
        $renderer = $this->getServiceLocator()->get('zendviewrendererphprenderer');
        foreach ($views as $name => $view) {
            if($view instanceOf ViewModel) {
                $placeHolders[$name] = $renderer->render($view);
            } else {
                $placeHolders[$name] = $view;
            }
        }
        return $placeHolders;
    }

    public function orderFlagsAction()
    {
        $postParams = $this->params()->fromPost();
        if (count($postParams)) {
        }

        $number  = $this->params('orderNubmer');
        //$service = $this->getOrderService();
        //$flags   = $orderService->getFlags($number);
        $flags   = array('foo', 'bar');
        $view    = $this->getView(false, array('flags' => $flags));
        return $view;
    }

    public function orderNotesAction()
    {
        $postParams = $this->params()->fromPost();
        if (count($postParams)) {
        }

        $number  = $this->params('orderNumber');
        //$service = $this->getOrderService();
        //$notes   = $orderService->getNotes($number);
        $notes   = array('note1', 'note2');
        $view    = $this->getView(false, array('notes' => $notes));
        return $view;
    }

    public function searchOrderAction()
    {
        $postParams = $this->params()->fromPost();
        if (count($postParams)) {
        }

    }

    public function getView($layout=true, array $vars = null)
    {
        $view = new ViewModel();
        if ($layout === false) {
            $view->setTerminal(true);
        }
        if (is_array($vars)) {
            $view->setVariables($vars);
        }

        return $view;
    }

    /**
     * @return orderService
     */
    public function getOrderService()
    {
        if (null === $this->orderService()) {
            $this->orderService = $this->getServiceLocator()->get('\SpeckOrder\Service\Order');
        }
        return $this->orderService;
    }

    /**
     * @param $orderService
     * @return self
     */
    public function setOrderService($orderService)
    {
        $this->orderService = $orderService;
        return $this;
    }
}
