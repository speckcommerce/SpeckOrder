<?php

namespace SpeckOrder\Mapper;

use Zend\Db\Sql\Where;
use ZfcBase\Mapper\AbstractDbMapper;

class OrderAddressMapper extends AbstractDbMapper
{
    protected $tableName = 'order_address';

    public function persist(OrderEntityInterface $order)
    {
    }

    public function findById($id)
    {
    }
}
