<?php
class CurrencyData {
    const TABLE_NAME = 'currency';
    protected $_connect;
    
    public function __construct() {
        $this->_connect = DB::getConnection();
    }

    public function getArrCurrencies() {
        $result = array();
        $data = $this->_connect->query('SELECT * FROM ' . self::TABLE_NAME);
        while( $r = $data->fetch() ) {
            $result[] = $r['code'];
        }
        return $result;
    }
    public function addCurrency($currencyCode) {
        //$data = $this->_connect->query("INSERT INTO '".self::TABLE_NAME."' (`code`, `name`) VALUES ('".$currencyCode."', '')");
        $data = $this->_connect->query("INSERT INTO ".self::TABLE_NAME." (`code`, `name`) VALUES ('".$currencyCode."', '')");

    }
    public function delCurrency($currencyCode) {
        $data = $this->_connect->query("DELETE FROM ".self::TABLE_NAME." WHERE `code` = '".$currencyCode."'");
    }
}