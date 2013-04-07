<?php

namespace SpeckOrderTest\Mapper;

use PHPUnit_Framework_TestCase as TestCase;

class OrderZendDbMysqlTest extends TestCase
{
    use TestAsset\MysqlAdapterTrait;
    use TestAsset\OrderZendDbTestTrait;

    public function setUp()
    {
        try {
            $this->getDbAdapter();
        } catch (\Exception $e) {
            $this->markTestSkipped('Mysql adapter was not provided. Skip.');
        }
    }
}
