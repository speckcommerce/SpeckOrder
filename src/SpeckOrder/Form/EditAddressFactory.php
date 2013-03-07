<?php

namespace SpeckOrder\Form;

use SpeckAddress\Form\AddressFactory as SpeckAddressFactory;

class EditAddressFactory extends SpeckAddressFactory
{
    public function getForm()
    {
        return new EditAddress();
    }
}
