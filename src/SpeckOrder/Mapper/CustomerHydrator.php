<?php

namespace SpeckOrder\Mapper;

use Zend\Stdlib\Hydrator\ClassMethods;

class OrderHydrator extends ClassMethods
{
    public function extract($object)
    {
        $array = parent::extract($object);
        return $array;
    }
}
