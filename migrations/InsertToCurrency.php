<?php
class InsertToCurrency {
    public function up() {
        $rrr = DB::getConnection()->query("
        INSERT INTO `currency` (`code`, `name`) VALUES
        ('eur', 'EUR'),
        ('usd', 'USD');
        ");
        return true;
    }
}
