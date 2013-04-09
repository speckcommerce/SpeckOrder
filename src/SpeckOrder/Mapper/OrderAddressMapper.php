<?php

namespace SpeckOrder\Mapper;

use Zend\Db\Sql\Where;
use ZfcBase\Mapper\AbstractDbMapper;
use SpeckOrder\Entity\Address;

class OrderAddressMapper extends AbstractDbMapper
{
    protected $tableName = 'order_address';
    protected $addressIdField = 'address_id';

    public function persist(Address $address)
    {
        if($address->getAddressId() > 0) {
            $where = new Where;
            $where->equalTo($this->addressIdField, $address->getAddressId());
            $this->update($address, $where);
        } else {
            $result = $this->insert($address);
            $address->setAddressId($result->getGeneratedValue());
        }

        return $address;
    }

    public function findById($id)
    {
        $select = $this->getSelect();

        $where = new Where;
        $where->equalTo($this->addressIdField, $id);

        $resultSet = $this->select($select->where($where));
        return $resultSet->current();
    }
}
