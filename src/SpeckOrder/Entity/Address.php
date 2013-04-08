<?php

namespace SpeckOrder\Entity;

use SpeckAddress\Entity\Address as BaseAddress;

class Address extends BaseAddress
{
    protected $firstName;
    protected $middleName;
    protected $lastName;
    protected $company;
    protected $streetAddress2;
    protected $phone;

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setFirstName($name)
    {
        $this->firstName = $name;
        return $this;
    }

    public function getMiddleName()
    {
        return $this->middleName;
    }

    public function setMiddleName($name)
    {
        $this->middleName = $name;
        return $this;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function setLastName($name)
    {
        $this->lastName = $name;
        return $this;
    }

    public function getCompany()
    {
        return $this->company;
    }

    public function setCompany($companyName)
    {
        $this->company = $companyName;
        return $this;
    }

    public function getStreetAddress2()
    {
        return $this->streetAddress2;
    }

    public function setStreetAddress2($streetAddress)
    {
        $this->streetAddress2 = $streetAddress;
        return $this;
    }

    public function getPhone()
    {
        return $this->public;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
        return $this;
    }
}
