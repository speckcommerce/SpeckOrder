<?php

namespace SpeckOrderTest\Entity;

use PHPUnit_Framework_TestCase as TestCase;
use SpeckOrder\Entity\Order;
use SpeckOrder\Entity\OrderInterface;

class OrderTest extends TestCase
{
    public function setUp()
    {
        $this->order = new Order;
    }

    public function testSetId()
    {
        $order = $this->order;
        $this->assertNull($order->getOrderId());
        $retval = $order->setOrderId(123);
        $this->assertEquals(123, $order->getOrderId());

        // assert fluent interface
        $this->assertSame($order, $retval);
    }

    public function testSetRefNum()
    {
        $order = $this->order;
        $this->assertNull($order->getRefNum());
        $retval = $order->setRefNum('ref123');
        $this->assertEquals('ref123', $order->getRefNum());

        // assert fluent interface
        $this->assertSame($order, $retval);
    }

    public function testSetStatus()
    {
        $order = $this->order;
        $retval = $order->setStatus('complete');
        $this->assertEquals('complete', $order->getStatus());

        // assert fluent interface
        $this->assertSame($order, $retval);
    }

    public function testSetFlags()
    {
        $order = $this->order;
        $this->assertEmpty($order->getFlags());

        $flags = array('international', 'shipped');
        $retval = $order->setFlags($flags);
        $this->assertEquals($flags, array_values($order->getFlags()));

        // assert fluent interface
        $this->assertSame($order, $retval);
    }

    public function testSetFlagsResetsFlags()
    {
        $order = $this->order;
        $order->setFlags(array('international', 'shipped'));
        $this->assertCount(2, $order->getFlags());
        $order->setFlags(array());
        $this->assertEmpty($order->getFlags());
    }

    public function testSetFlag()
    {
        $order = $this->order;
        $this->assertFalse($order->hasFlag('test_flag'));
        $retval = $order->setFlag('test_flag');
        $this->assertTrue($order->hasFlag('test_flag'));
        $this->assertContains('test_flag', $order->getFlags());

        // assert fluent interface
        $this->assertSame($order, $retval);
    }

    public function testUnsetFlag()
    {
        $order = $this->order;
        $order->setFlag('test_flag');
        $retval = $order->unsetFlag('test_flag');
        $this->assertFalse($order->hasFlag('test_flag'));

        // assert fluent interface
        $this->assertSame($order, $retval);
    }

    public function testSetCreatedTime()
    {
        $order = $this->order;
        $date = new \DateTime('now');
        $retval = $order->setCreatedTime($date);
        $this->assertSame($date, $order->getCreatedTime());

        // assert fluent interface
        $this->assertSame($order, $retval);
    }
}
