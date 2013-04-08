<?php

namespace SpeckOrder\Service;

class OrderAddressService
{
    protected $mapper;

    public function getById($addressId)
    {
        return $this->getMapper()->getById($addressId);
    }

    /**
     * @return mapper
     */
    public function getMapper()
    {
        if (null === $this->mapper) {
            $this->mapper = $this->getServiceLocator()->get('SpeckOrder\Mapper\OrderAddressMapper');
        }
        return $this->mapper;
    }

    /**
     * @param $mapper
     * @return self
     */
    public function setMapper($mapper)
    {
        $this->mapper = $mapper;
        return $this;
    }
}
