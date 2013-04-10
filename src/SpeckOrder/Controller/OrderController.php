<?php

namespace SpeckOrder\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class OrderController extends AbstractActionController
{
    public function indexAction()
    {
        die('<h2>Thanks for your order</h2><Br/>
            <h4> (under development) </h4>
            <p>After persistence is completed for speck-order, this will generate an order that can be viewed in the order management section of the admin area.</p>
            <a href="/admin">Go to the admin area</a>
            ');
    }
}
