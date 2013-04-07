<?php

namespace SpeckOrderTest\Mapper\TestAsset;

trait OrderZendDbTestTrait
{
    public function testPersistNewOrderInsertsRow()
    {
        $query = $this->getDbAdapter()->query('SELECT count(*) as `c` FROM `order`');
        $count = $query->execute()->current()['c'];
        $this->assertEquals($count, 0);

        $order = $this->order;
        $this->mapper->persist($order);
        $this->assetEquals($order->getOrderId(), 1);

        $count = $query->execute()->current()['c'];
        $this->assertEquals($count, 1);

        $savedOrder = $this->mapper->findById($order->getOrderId());
        $this->assertEquals($savedOrder, $order);
    }

    public function testPersistExistingOrderUpdatesRow()
    {
        $order = $this->order;
        $this->mapper->persist($order);

        $query = $this->getDbAdapter()->query('SELECT count(*) as `c` FROM `order`');
        $count = $query->execute()->current()['c'];
        $this->assertEquals($count, 1);

        $order->setRefNum('test_ref_num');
        $this->mapper->persist($order);

        $count = $query->execute()->current()['c'];
        $this->assertEquals($count, 1);

        $savedOrder = $this->mapper->findById($order->getOrderId());
        $this->assertEquals($savedOrder, $order);
    }
}
