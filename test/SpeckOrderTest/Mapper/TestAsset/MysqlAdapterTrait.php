<?php

namespace SpeckOrderTest\Mapper\TestAsset;

use SpeckOrderTest\Bootstrap;

trait MysqlAdapterTrait
{
    protected $dbTables = ['order', 'order_line'];
    protected $dbAdapter;

    public function getDbAdapter()
    {
        if(null === $this->dbAdapter) {
            $this->dbAdapter = Bootstrap::getServiceManager()->get('speckorder_db');
        }
        return $this->dbAdapter;
    }

    public function prepareSchema()
    {
        $this->getDbAdapter()->query("SET FOREIGN_KEY_CHECKS = 0")->execute();
        foreach ($this->dbTables as $table) {
            // @todo add check that table exists, otherwise throw exeception
            $this->getDbAdapter()->query("TRUNCATE TABLE {$table}")->execute();
        }
        $this->getDbAdapter()->query("SET FOREIGN_KEY_CHECKS = 1")->execute();
    }
}
