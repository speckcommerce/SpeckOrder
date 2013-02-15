<?php

namespace SpeckOrder\Mapper;

use SpeckOrder\Entity\OrderInterface as OrderEntityInterface;

interface OrderInterface
{
    public function persist(OrderEntityInterface $order);

    public function findById($id);
}
