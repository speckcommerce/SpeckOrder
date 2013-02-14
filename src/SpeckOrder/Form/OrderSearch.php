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
                'label' => 'Order Number',
            ),
        ));
        $text->add(array(
            'name' => 'ref_num',
            'type' => '\Zend\Form\Element\Text',
            'options' => array(
                'label' => 'Reference Number',
            ),
        ));
        $text->add(array(
            'name' => 'status',
            'type' => '\Zend\Form\Element\Text',
            'options' => array(
                'label' => 'Status',
            ),
        ));
        $text->add(array(
            'name' => 'created_time[start]',
            'type' => '\Zend\Form\Element\Text',
            'options' => array(
                'label' => 'Created: Start',
            ),
            'attributes' => array(
                'id' => 'order_search_created_time_start'
            ),
        ));
        $text->add(array(
            'name' => 'created_time[end]',
            'type' => '\Zend\Form\Element\Text',
            'options' => array(
                'label' => 'Created: End',
            ),
            'attributes' => array(
                'id' => 'order_search_created_time_end'
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
