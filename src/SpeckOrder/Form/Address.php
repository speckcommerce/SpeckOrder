<?php

namespace SpeckOrder\Form;

use SpeckAddress\Form\Address as BaseAddress;

class Address extends BaseAddress
{
    public function __construct()
    {
        parent::__construct();

        $this->add(array(
            'name' => 'first_name',
            'type' => 'Zend\Form\Element\Text',
            'options' => array(
                'label' => 'First Name'
            ),
        ));
        $this->add(array(
            'name' => 'middle_name',
            'type' => 'Zend\Form\Element\Text',
            'options' => array(
                'label' => 'Middle Name'
            ),
        ));
        $this->add(array(
            'name' => 'last_name',
            'type' => 'Zend\Form\Element\Text',
            'options' => array(
                'label' => 'Last Name'
            ),
        ));
        $this->add(array(
            'name' => 'company',
            'type' => 'Zend\Form\Element\Text',
            'options' => array(
                'label' => 'Company'
            ),
        ));
        $this->add(array(
            'name' => 'street_address_2',
            'type' => 'Zend\Form\Element\Text',
            'options' => array(
                'label' => 'Street Address 2'
            ),
        ));
        $this->add(array(
            'name' => 'phone',
            'type' => 'Zend\Form\Element\Text',
            'options' => array(
                'label' => 'Phone'
            ),
        ));
    }
}
