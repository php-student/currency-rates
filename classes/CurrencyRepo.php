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
    public function getAllCurrency(){
        $table=self::TABLE_NAME;
        $currencies=array();
        $q=$this->_conn->query("SELECT * FROM {$table}",PDO::FETCH_ASSOC);
 //       $query->setFetchMode(PDO::FETCH_ASSOC);
        while($result = $q->fetch()){
            $currencies[$result['id']] = new Currency($result['name']);
        }
        return $currencies;
    }
}