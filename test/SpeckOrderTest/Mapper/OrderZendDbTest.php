<?php

namespace SpeckOrderTest\Mapper;

use PHPUnit_Framework_TestCase as TestCase;
use SpeckOrder\Entity\Order as OrderEntity;
use SpeckOrder\Mapper\Order as OrderMapper;
use SpeckOrder\Mapper\OrderHydrator;

class OrderZendDbTest extends TestCase
{
    use TestAsset\SqliteAdapterTrait;
    use TestAsset\OrderZendDbTestTrait;

    public function setUp()
    {
        $this->prepareSchema();
        $this->order = new OrderEntity;
        $this->mapper = new OrderMapper;
        $this->mapper->setDbAdapter($this->getDbAdapter());
        $this->mapper->setHydrator(new OrderHydrator);
        $this->mapper->setEntityPrototype(new OrderEntity);
        //$this->markTestSkipped();
    }
}
