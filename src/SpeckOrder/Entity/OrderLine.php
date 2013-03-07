<?php

namespace SpeckOrder\Entity;

use DateTime;
use SpeckCart\Entity\AbstractLineItem;
use SpeckOrder\Exception;

class OrderLine extends AbstractLineItem implements OrderLineInterface
{
    protected $order;
    protected $orderId;

    /**
     * Returns order id. Proxies to order entity if present.
     *
     * @return null|integer
     */
    public function getOrderId()
    {
        if ($this->order) {
            return $this->order->getOrderId();
        }
        return $this->orderId;
    }

    /**
     * Sets order id, if parent entity is not present.
     *
     * @param integer|null $id
     * @return OrderLineInterface Provides fluent interface
     *
     * @throws RuntimeException If order entity is set and have different id
     */
    public function setOrderId($id)
    {
        if ($id === null) {
            $this->order = null;
        }

        if ($this->order && $this->order->getOrderId() != $id) {
            throw new Exception\RuntimeException('Ambiguous assignment. Order entity is set and have different id.');
        }

        $this->orderId = $id;
        return $this;
    }

    /**
     * Get the order entity
     *
     * @return OrderInterface|null
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * set order
     *
     * @param OrderInterface $order
     * @return LineItemInterface provides fluent interface
     */
    public function setOrder(OrderInterface $order = null)
    {
        $this->order = $order;
        if ($order === null) {
            $this->orderId = null;
        }
        return $this;
    }

}
