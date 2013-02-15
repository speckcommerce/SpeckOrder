<?php

namespace SpeckOrder\Entity;

use DateTime;
use SpeckCart\Entity\LineItemInterface;

interface OrderLineInterface extends LineItemInterface
{
    /**
     * get orderid
     *
     * @return integer
     */
    public function getOrderId();

    /**
     * set order id
     *
     * @param integer $order
     * @return OrderLineInterface provides fluent interface
     */
    public function setOrderId($orderId);

    /**
     *
     * @return integer
     */
    public function getInvoicedQty();

    public function setInvoicedQty($qty);

    public function getRefundedQty();

    public function setRefundedQty($qty);

    public function getShippedQty();

    public function setShippedQty($qty);

    public function getIsInvoiceable();

    /**
     *
     * @param bool $flag
     * @return OrderLineInterface
     */
    public function setIsInvoiceable($flag);
}
