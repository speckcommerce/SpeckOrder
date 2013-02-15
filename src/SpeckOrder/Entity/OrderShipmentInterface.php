<?php

namespace SpeckOrder\Entity;

use SpeckShipment\Entity\ShipmentInterface;

interface OrderShipmentInterface
{
    public function getOrder();

    public function setOrder(OrderInterface $order);

    public function setShipment(ShipmentInterface $shipment);

    public function setShippedOrderLineQty(OrderLineInterface $orderLine, $qty);

    public function getShippedOrderLineQty($orderLine);

    public function getShippedOrderLines();
}

