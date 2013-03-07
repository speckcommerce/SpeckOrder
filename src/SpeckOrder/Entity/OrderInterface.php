<?php

namespace SpeckOrder\Entity;

use DateTime;
use SpeckCart\Entity\LineItemCollectionInterface;

interface OrderInterface extends LineItemCollectionInterface
{
    public function getOrderId();

    public function setOrderId($id);

    /**
     * Order reference number
     *
     * @return string
     */
    public function getRefNum();

    /**
     *
     * @param string $refNum
     * @return self
     */
    public function setRefNum($refNum);

    /**
     * @todo add UUID support
     */
    //public function getUuid();

    //public function setUuid(Uuid $uuid);

    /**
     *
     * @return string
     */
    public function getStatus();

    /**
     *
     * @param string $status
     * @return self Provides fluent interface
     */
    public function setStatus($status);

    /**
     *
     * @param string $flag
     * @return boolean
     */
    public function hasFlag($flag);

    /**
     *
     * @param string $flag
     * @return self
     */
    public function setFlag($flag);

    /**
     *
     * @param string $flag
     * @return self
     */
    public function unsetFlag($flag);

    /**
     *
     * @return array
     */
    public function getFlags();

    /**
     * Overrides order flags with flags in array
     *
     * @param string[] $flags
     * @return self
     */
    public function setFlags($flags);

    /**
     *
     * @return DateTime
     */
    public function getCreatedTime();

    /**
     *
     * @param DateTime $date
     * @return self
     */
    public function setCreatedTime(DateTime $date);

    public function getBillingAddress();

    public function setBillingAddress(Address $address);

    public function getShippingAddress();

    public function setShippingAddress(Address $address);

    public function getQuoteId();

    public function setQuoteId($id);

    public function getCustomerId();

    public function setCustomerId($id);

    public function getCurrencyCode();

    public function setCurrencyCode($code);
}
