<?php

namespace SpeckOrder\Form;

use SpeckAddress\Form\AddressFactory as SpeckAddressFactory;

class AddressFactory extends SpeckAddressFactory
{
    public function getForm()
    {
        return new Address();
    }
}
