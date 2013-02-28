<?php

namespace SpeckOrder\Form;

use Zend\Form\Form as ZendForm;
use Zend\Form\FieldSet;
use Zend\Form\Element;

class OrderSearch extends ZendForm
{
    public function __construct()
    {
        parent::__construct();

        $text = new FieldSet('text');
        $text->add(array(
            'name' => 'order_number',
            'type' => '\Zend\Form\Element\Text',
            'options' => array(
                'label' => 'Order #',
            ),
            'attributes' => array(
                'placeholder' => 'Order #',
                'class' => 'span12'
            ),
        ));
        $text->add(array(
            'name' => 'ref_num',
            'type' => '\Zend\Form\Element\Text',
            'options' => array(
                'label' => 'Reference #',
            ),
            'attributes' => array(
                'placeholder' => 'Reference #',
                'class' => 'span12'
            ),
        ));
        $text->add(array(
            'name' => 'status',
            'type' => '\Zend\Form\Element\Text',
            'options' => array(
                'label' => 'Status',
            ),
            'attributes' => array(
                'placeholder' => 'Status',
                'class' => 'span12'
            ),
        ));
        $text->add(array(
            'name' => 'created_time[start]',
            'type' => '\Zend\Form\Element\Text',
            'options' => array(
                'label' => 'Created: Start',
            ),
            'attributes' => array(
                'placeholder' => 'Created: Start',
                'class' => 'span12 datepicker',
            ),
        ));
        $text->add(array(
            'name' => 'created_time[end]',
            'type' => '\Zend\Form\Element\Text',
            'options' => array(
                'label' => 'Created: End',
            ),
            'attributes' => array(
                'placeholder' => 'Created: End',
                'class' => 'span12 datepicker',
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
            $filter = new Element\Text($name);
            $filter->setLabel($label);
            $filter->setAttribute('class', 'multivalue');
            $filter->setAttribute('value', 'ignore');
            $filter->setAttribute('data-values', "ignore,hide,show");
            $this->get('filters')->add($filter);
        }
    }
}
