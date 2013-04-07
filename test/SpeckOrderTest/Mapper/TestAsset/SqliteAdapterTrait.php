<?php

namespace SpeckOrderTest\Mapper\TestAsset;

use Zend\Db\Adapter\Adapter;

trait SqliteAdapterTrait
{
    protected $dbSchema;
    protected $dbAdapter;

    public function getDbAdapter()
    {
        if(null === $this->dbAdapter) {
            $this->dbAdapter = new Adapter(array(
                'driver' => 'pdo',
                'dsn' => "sqlite::memory:",
                'driver_options' => array(
                    1002 => 'SET NAMES \'UTF8\'',
                ),
            ));
        }
        return $this->dbAdapter;
    }

    public function prepareSchema()
    {
        if (null === $this->dbSchema) {
            $this->dbSchema = include __DIR__ . '/../../../_files/schema.sqlite.php';
        }
        foreach ($this->dbSchema as $table => $statement) {
            $this->getDbAdapter()->query("DROP TABLE IF EXISTS `{$table}`")->execute();
            $this->getDbAdapter()->query($statement)->execute();
        }
    }
}
