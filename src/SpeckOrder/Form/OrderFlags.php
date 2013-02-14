<?php

namespace SpeckOrder\Form;

use Zend\Form\Form as ZendForm;
use Zend\Form\FieldSet;
use Zend\Form\Element;

class OrderFlags extends ZendForm
{
    public function __construct($opts = array())
    {
        parent::__construct();

        if (isset($opts['flags'])) {
            $this->setFlags($opts['flags']);
        }
        $this->add(array(
            'name' => 'order_number',
            'type' => '\Zend\Form\Element\Hidden',
        ));
        $this->add(array(
            'name' => 'submit',
            'type' => '\Zend\Form\Element\Submit',
            'attributes' => array(
                'value' => 'Update Flags',
            ),
        ));
    }

    public function setFlags(array $flags)
    {
        $el = new Element\MultiCheckbox('flags');
        $el->setValueOptions($flags);
        $this->add($el);
    }
}
