<?php
class CreateCurrencyTable {
    public function up() {
        $rrr = DB::getConnection()->query("
        CREATE TABLE `currency` (
        `code` varchar(10) NOT NULL,
        `name` varchar(256) NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
        ALTER TABLE `currency`
        ADD UNIQUE KEY `code` (`code`);
        ");
        return true;
    }

    public function down() {
        DB::getConnection()->exec("
        DROP TABLE IF EXISTS `currency`
        ");
        return true;
    }
}
