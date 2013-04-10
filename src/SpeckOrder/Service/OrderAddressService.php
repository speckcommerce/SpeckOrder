<?php

namespace SpeckOrder\Service;

use SpeckOrder\Form\AddressForm;
use SpeckOrder\Entity\AddressEntity;

class OrderAddressService
{
    protected $mapper;

    public function findById($addressId)
    {
        return $this->getMapper()->findById($addressId);
    }

    public function persistForm(AddressForm $form)
    {
        $hydrator = $this->getMapper()->getHydrator();
        $entity   = $this->getMapper()->getEntity();
        $address  = $hydrator->hydrate($form->getData(), $entity);

        return $this->persistEntity($address);
    }

    public function persistEntity(AddressEntity $address)
    {
        return $this->getMapper()->persist($address);
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
