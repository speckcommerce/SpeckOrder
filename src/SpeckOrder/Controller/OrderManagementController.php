<?php

namespace SpeckOrder\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class OrderManagementController extends AbstractActionController
{
    protected $view;
    protected $orderService;

    public function indexAction()
    {
        $view = new ViewModel(array('orders' => array('foo', 'bar')));
        return $view;
    }

    public function orderAction()
    {
        $postParams = $this->params()->fromPost();
        if (count($postParams)) {
        }

        $number  = $this->params('orderNumber');
        //$service = $this->getOrderService();
        //$order   = $orderService->getOrder($number);
        $order = 'asdf';
        $view    = $this->getView(false, array('order' => $order));
        return $view;
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
        if (!$this->view instanceOf ViewModel) {
            $this->view = new ViewModel();
        }
        if ($layout === false) {
            $this->view->setTerminal(true);
        }
        if (is_array($vars)) {
            $this->view->setVariables($vars);
        }

        return $this->view;
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
