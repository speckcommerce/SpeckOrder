<?php

namespace SpeckOrder\Entity;

use DateTime;
use SpeckCart\Entity\LineItemCollectionTrait;

class Order implements OrderInterface
{
    use LineItemCollectionTrait;

    protected $orderId;
    protected $refNum;
    protected $status;
    protected $flags  = array();
    protected $createdTime;
    protected $billingAddress;
    protected $shippingAddress;
    protected $quoteId;
    protected $customerId;
    protected $currencyCode;

    public function getOrderId()
    {
        return $this->orderId;
    }

    public function setOrderId($id)
    {
        $this->orderId = $id;
        return $this;
    }

    public function getRefNum()
    {
        return $this->refNum;
    }

    public function setRefNum($refNum)
    {
        $this->refNum = $refNum;
        return $this;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    public function hasFlag($flag)
    {
        return array_key_exists((string)$flag, $this->flags);
    }

    public function setFlag($flag)
    {
        $flag = (string)$flag;
        $this->flags[$flag] = $flag;
        return $this;
    }

    public function unsetFlag($flag)
    {
        if (array_key_exists($flag, $this->flags)) {
            unset($this->flags[$flag]);
        }
        return $this;
    }

    public function getFlags()
    {
        return $this->flags;
    }

    public function setFlags($flags)
    {
        $this->flags = array();
        foreach ($flags as $flag) {
            $this->setFlag($flag);
        }
        return $this;
    }

    /**
     *
     * @return DateTime
     */
    public function getCreatedTime()
    {
        return $this->createdTime;
    }

    /**
     *
     * @param DateTime $date
     * @return self
     */
    public function setCreatedTime(DateTime $date)
    {
        $this->createdTime = $date;
        return $this;
    }

    public function getBillingAddress()
    {
        return $this->billingAddress;
    }

    public function setBillingAddress(Address $address)
    {
        $this->billingAddress = $address;
        return $this;
    }

    public function getShippingAddress()
    {
        return $this->shippingAddress;
    }

    public function setShippingAddress(Address $address)
    {
        $this->shippingAddress = $address;
        return $this;
    }

    public function getQuoteId()
    {
        return $this->quoteId;
    }

    public function setQuoteId($id)
    {
        $this->quoteId = $id;
        return $this;
    }

    public function getCustomerId()
    {
        return $this->customerId;
    }

    public function setCustomerId($id)
    {
        $this->customerId = $id;
        return $this;
    }

    public function getCurrencyCode()
    {
        return $this->currencyCode;
    }

    public function setCurrencyCode($code)
    {
        $this->currencyCode = $code;
        return $this;
    }
}
