<?php

namespace SpeckOrder\Mapper;

use SpeckOrder\Entity\OrderInterface as OrderEntityInterface;
use Zend\Db\Sql\Where;
use ZfcBase\Mapper\AbstractDbMapper;

class Order extends AbstractDbMapper implements OrderInterface
{
    protected $orderIdField = 'order_id';
    protected $tableName = 'order';

    public function persist(OrderEntityInterface $order)
    {
        if($order->getOrderId() > 0) {
            $where = new Where;
            $where->equalTo($this->orderIdField, $order->getOrderId());
            $this->update($order, $where);
        } else {
            $result = $this->insert($order);
            $order->setOrderId($result->getGeneratedValue());
        }

        return $order;
    }

    public function findById($id)
    {
        $select = $this->getSelect();

        $where = new Where;
        $where->equalTo($this->orderIdField, $id);

        $resultSet = $this->select($select->where($where));
        return $resultSet->current();
    }
}
