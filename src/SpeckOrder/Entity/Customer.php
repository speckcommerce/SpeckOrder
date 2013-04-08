<?php

namespace SpeckOrder;

use ZfcUser\Entity\User;

class Customer extends User
{
    protected $orders;

    /**
     * @return orders
     */
    public function getOrders()
    {
        return $this->orders;
    }

    public function addOrder(Order $order)
    {
        $this->orders[] = $order;
        return $this;
    }

    /**
     * @param $orders
     * @return self
     */
    public function setOrders(array $orders)
    {
        $this->orders = array();
        foreach ($orders as $order) {
            $this->addOrder($order);
        }
        return $this;
    }
}
