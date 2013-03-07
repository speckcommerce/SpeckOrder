<?php

namespace SpeckOrder\Entity;

interface InvoiceInterface
{
    public function getOrder();
    public function setOrder(OrderInterface $order);

}
