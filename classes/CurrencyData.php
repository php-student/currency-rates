<?php
class CurrencyData {
    const TABLE_NAME = 'currency';
    protected $_connect;
    /*------------------------------------------------*/
    public function __construct() {
        $this->_connect = DB::getConnection();
    }
    /*------------------------------------------------*/
    public function getArrCurrencies() {
        $result = array();
        $data = $this->_connect->query('SELECT * FROM ' . self::TABLE_NAME);
        while( $r = $data->fetch() ) {
            $result[] = $r['code'];
        }
        return $result;
    }
}