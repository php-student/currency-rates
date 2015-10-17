<?php

class Currency {
    public $code; # for example USD

    public function __construct($code) {
        $this->code = $code;
    }
    public static function setBaseCurrency() {
        if ( isset($_GET['currency']) ) {
            $baseCurrency = $_GET['currency'];
        } else {
            if ( isset($_COOKIE['currency']) ) {
                $baseCurrency = $_COOKIE['currency'];
            } else $baseCurrency = 'USD';
        }
        setcookie('currency', $baseCurrency, time()+ 60*60*24*30, '/');
        return $baseCurrency;
    }
    public function getRatesTo($currencyCode) {
        $code = $this->code;
        $api = "http://api.fixer.io/latest?base={$code}";
        $json_string = file_get_contents($api);
        $ar = json_decode($json_string, true);
        return $ar['rates'][$currencyCode];
    }
    public function validatePOSTdata($value) {
        if ( preg_match("/^[.,0-9]{1,30}$/", $value) ) {
            return true;
        } else return false;
    }
    public function calculate($sum, $currencyCode) {
        if ( $this->validatePOSTdata($sum) ) {
            $rates = $this->getRatesTo($currencyCode);
            return ($sum * $rates);
        } else return 'Ошибка ввода!';
    }
    public static function getArrCurrenciesFromApi() {
        $result = array();
        $api = 'http://api.fixer.io/latest';
        $json_string = file_get_contents($api);
        $ar = json_decode($json_string, true);
        foreach ($ar['rates'] as $key => $value) {
            $result[] = $key;
        }
        return $result;
    }
}
