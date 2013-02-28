<?php

namespace SpeckOrder\Form;

use Zend\Form\Form as ZendForm;
use Zend\Form\FieldSet;
use Zend\Form\Element;

class CustomerSearch extends ZendForm
{
    public function __construct()
    {
        parent::__construct();

        $text = new FieldSet('text');
        $text->add(array(
            'name' => 'name',
            'type' => '\Zend\Form\Element\Text',
            'options' => array(
                'label' => 'Name',
            ),
            'attributes' => array(
                'class' => 'span12',
                'placeholder' => 'Name',
            ),
        ));
        $text->add(array(
            'name' => 'email',
            'type' => '\Zend\Form\Element\Text',
            'options' => array(
                'label' => 'Email',
            ),
            'attributes' => array(
                'class' => 'span12',
                'placeholder' => 'Email',
            ),
        ));
        $text->add(array(
            'name' => 'phone',
            'type' => '\Zend\Form\Element\Text',
            'options' => array(
                'label' => 'Phone',
            ),
            'attributes' => array(
                'class' => 'span12',
                'placeholder' => 'Phone',
            ),
        ));

        $this->add($text);

        $this->add(new FieldSet('filters'));

        $buttons = new FieldSet('buttons');
        $buttons->add(array(
            'name' => 'submit',
            'type' => '\Zend\Form\Element\Submit',
            'attributes' => array(
                'value' => 'Search',
                'class' => 'span12',
            ),
        ));
        $this->add($buttons);
    }

    public function setFilters(array $filters)
    {
        foreach ($filters as $flagId => $label) {
            $name  = 'filters[' . $flagId . ']';
            $radio = new Element\Radio($name);
            $radio->setLabel($label);
            $radio->setValueOptions(
                array('ignore' => 'ignore','show' => 'show', 'hide' => 'hide')
            );
            $this->get('filters')->add($radio);
        }
    }
}
