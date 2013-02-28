<?php

namespace SpeckOrder\Service;

use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
//use SpeckOrder\Entity\InvoiceInterface;
//use SpeckOrder\Entity\OrderInterface;
//use SpeckOrder\Entity\OrderLineInterface;

class OrderService implements ServiceLocatorAwareInterface// ,OrderServiceInterface
{
    protected $serviceLocator;

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

    public function getAllFlags()
    {
        //$flags = $this->getMapper()->getAllFlags();
        $flags = array(
            1 => 'International',
            2 => 'Shipped',
            3 => 'Canceled',
            4 => 'Archived',
            5 => 'Fraud',
            6 => 'Paid',
            7 => 'Completed',
            8 => 'Follow Up',
            9 => 'Rma Request',
        );
        return $flags;
    }

    public function getAllTags()
    {
        //$tags = $this->getMapper()->getAllTags();
        $tags = array(
            1 => 'International',
            2 => 'Shipped',
            3 => 'Canceled',
            4 => 'Archived',
            5 => 'Fraud',
            6 => 'Paid',
            7 => 'Completed',
            8 => 'Follow Up',
            9 => 'Rma Request',
        );
        return $tags;
    }

//    /**
//     * findById
//     *
//     * @param int $id
//     * @return OrderInterface|null
//     */
//    public function findById($id){}
//
//    /**
//     * fundByCustomerId
//     *
//     * @param mixed $id
//     * @return OrderInterface[]
//     */
//    public function findByCustomerId($id){}
//
//    /**
//     * findByInvoice
//     *
//     * @param InvoiceInterface $invoice
//     * @return OrderInterface|null
//     */
//    public function findByInvoice(InvoiceInterface $invoice){}
//
//    /**
//     * findByOrderLine
//     *
//     * @param OrderLineInterface $orderLine
//     * @return OrderLineInterface|null
//     */
//    public function findByOrderLine(OrderLineInterface $orderLine){}
//
//    /**
//     * persist
//     *
//     * @param OrderInterface $order
//     * @return OrderServiceInterface
//     */
//    public function persist(OrderInterface $order){}
//
//    /**
//     * persistLine
//     *
//     * @param OrderLineInterface $orderLine
//     * @return OrderServiceInterface
//     */
//    public function persistLine(OrderLineInterface $orderLine){}
}
