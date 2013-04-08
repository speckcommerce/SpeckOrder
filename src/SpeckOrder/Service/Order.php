<?php

namespace SpeckOrder\Service;

use SpeckOrder\Exception;
use SpeckOrder\Entity\OrderInterface as OrderEntityInterface;
use SpeckOrder\Mapper\OrderInterface as OrderMapperInterface;
use Zend\EventManager\EventManagerAwareInterface;
use Zend\EventManager\EventManagerAwareTrait;

class Order implements OrderInterface, EventManagerAwareInterface
{
    use EventManagerAwareTrait;

    protected $orderMapper;

    /**
     * findById
     *
     * @param int $id
     * @return OrderEntityInterface|null
     */
    public function findById($id)
    {
        return $this->getOrderMapper()->findById($id);
    }

    public function populate(Order $order)
    {
        $id = $order->getOrderId();
        $flags = $this->getOrderFlagService()->getByOrderId($id);
        $order->setFlags($flags);
        $billing = $this->getOrderAddressService()->getById($id);
        $order->setBillingAddress($billing);
        $shipping = $this->getOrderAddressService()->getById($id);
        $order->setShippingAddress($shipping);

        return $order;
    }

    /**
     * persist
     *
     * @param OrderEntityInterface $order
     * @return OrderInterface
     */
    public function persist(OrderEntityInterface $order)
    {
        $this->getEventManager()->trigger(OrderEvent::EVENT_ORDER_PERSIST, $this, array('order' => $order));
        $this->getOrderMapper()->persist($order);
        $this->getEventManager()->trigger(
            OrderEvent::EVENT_ORDER_PERSIST . '.post',
            $this,
            array('order' => $order)
        );
    }

    public function getOrderMapper()
    {
        if (!$this->orderMapper) {
            throw new Exception\MissingDependencyException('Order mapper');
        }
        return $this->orderMapper;
    }

    public function setOrderMapper(OrderMapperInterface $orderMapper)
    {
        $this->orderMapper = $orderMapper;
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
}
