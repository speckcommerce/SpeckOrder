<?php

namespace SpeckOrder\Form;

use Zend\Form\Form as ZendForm;
use Zend\Form\FieldSet;
use Zend\Form\Element;

class OrderTags extends ZendForm
{
    public function __construct($opts = array())
    {
        parent::__construct();

        if (isset($opts['tags'])) {
            $this->setTags($opts['tags']);
        }
        $this->add(array(
            'name' => 'order_number',
            'type' => '\Zend\Form\Element\Hidden',
        ));
        $this->add(array(
            'name' => 'submit',
            'type' => '\Zend\Form\Element\Submit',
            'attributes' => array(
                'value' => 'Update Tags',
            ),
        ));
    }

    public function setTags(array $tags)
    {
        $el = new Element\MultiCheckbox('tags');
        $el->setValueOptions($tags);
        $this->add($el);
    }
}
