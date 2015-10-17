<?php

class CurrencyRepo
{
    const TABLE_NAME = 'currency';
    protected $_conn;
    public function __construct(){
        $this->_conn = DB::getConnection();
    }

    public function getCurrency(){
        $table=self::TABLE_NAME;
        $currency = array();
        $query = $this->_conn->query("SELECT * from {$table}");
        $query->setFetchMode(PDO::FETCH_ASSOC);
        while( $result = $query->fetch() ) {
            $currency[] = new Currency($result['currency']);
        }
        return $currency;
    }

    public function CurrencyAdd($currency){
        $currency=strtoupper($currency);
        $all_currency_repo=$this->getCurrency();
        foreach($all_currency_repo as $curr){
            if($curr->currency==$currency){
                $_SESSION['error']='Такая валюта уже есть!';
               return false;
            }
        }
        $all_currency = (new ApiRepo())->getAllCurrency();
        if (in_array($currency, $all_currency)) {
            $table = self::TABLE_NAME;
                //echo "INSERT INTO {$table} ('currency') VALUES ('{$currency}')";
            try {
                $this->_conn->query("INSERT INTO {$table} (currency) VALUES ('{$currency}')");
            } catch (Exception $e) {
                return false;
            }
        } else {
            $_SESSION['error']='Такой валюты нет в API!';
            return false;
        }
    }

}