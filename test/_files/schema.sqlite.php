<?php

$return['order'] = <<<sqlite
CREATE TABLE IF NOT EXISTS `order` (
    `order_id`      INTEGER PRIMARY KEY AUTOINCREMENT,
    `ref_num`       VARCHAR(255),
    `status`        VARCHAR(255),
    `created_time`  DATETIME
);
sqlite;

return $return;
