<?php
/**
 * Created by PhpStorm.
 * User: LIS
 * Date: 21.10.2015
 * Time: 8:14
 */

class CurrencyRepo{
    const TABLE_NAME = 'currency';
    protected $_conn;
    public function __construct(){
        $this->_conn = DB::getConnection();
    }
    public function getCurrency(){
        $table=self::TABLE_NAME;
        $currencies=array();
        $quary=$this->_conn->query("SELECT * FROM {$table}")
    }
}