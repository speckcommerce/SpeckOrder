<?php

namespace SpeckOrderTest\Service;

use Mockery;
use PHPUnit_Framework_TestCase as TestCase;
use SpeckOrder\Service\Order;

class OrderTest extends TestCase
{
    public function setUp()
    {
        $this->orderService = new Order;
    }


    public function testSetOrderMapper()
    {
        $mapper = Mockery::mock('SpeckOrder\\Mapper\\OrderInterface');
        $orderService = new Order;
        $orderService->setOrderMapper($mapper);
        $mapper2 = $orderService->getOrderMapper();
        $this->assertSame($mapper2, $mapper);
    }

    public function testMissingOrderMapper()
    {
        $orderService = new Order;
        $this->setExpectedException('SpeckOrder\\Exception\\MissingDependencyException');
        $orderService->getOrderMapper();
    }
}

