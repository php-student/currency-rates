<?php
class InsertToCurrency {
    public function up() {
        $rrr = DB::getConnection()->query("
        INSERT INTO `currency` (`code`, `name`) VALUES
        ('EUR', 'Евро'),
        ('USD', 'Доллар США');
        ");
        return true;
    }
}
