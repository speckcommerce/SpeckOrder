<?php

namespace SpeckOrder\Service;

use SpeckOrder\Entity\InvoiceInterface;
use SpeckOrder\Entity\InvoiceLineInterface;
use SpeckOrder\Entity\OrderInterface;

interface InvoiceServiceInterface
{
    /**
     * findById
     *
     * @param int $id
     * @return InvoiceServiceInterface|null
     */
    public function findById($id);

    /**
     * findInvoiceLineById
     *
     * @param int $id
     * @return InvoiceLineInterface|null
     */
    public function findLineById($id);

    /**
     * findByOrder
     *
     * @param OrderInterface $order
     * @return InvoiceInterface[]
     */
    public function findByOrder(OrderInterface $order);

    /**
     * findLinesByOrderLine
     *
     * @param OrderLineInterface $orderLine
     * @return InvoiceLineInterface[]
     */
    public function findLinesByOrderLine(OrderLineInterface $orderLine);
}


