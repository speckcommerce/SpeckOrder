<?php

namespace SpeckOrder\Service;

use SpeckOrder\Entity\InvoiceInterface;
use SpeckOrder\Entity\OrderInterface as OrderEntityInterface;
use SpeckOrder\Entity\OrderLineInterface;

interface OrderInterface
{
    /**
     * findById
     *
     * @param int $id
     * @return OrderEntityInterface|null
     */
    public function findById($id);

    /**
     * persist
     *
     * @param OrderEntityInterface $order
     * @return OrderInterface
     */
    public function persist(OrderEntityInterface $order);

    /**
     * getAllFlags
     *
     * @return array list of flags
     */
    public function getAllFlags();
}

