<?php

class Currency {
    public $name; # for example USD

    public function __construct($name) {
        //$this->code = $code;
        $this->name = $name;
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
        $base = $this->name;
        $api = "http://api.fixer.io/latest?base={$base}";
        $json_string = file_get_contents($api);
        $ar = json_decode($json_string, true);
        return $ar['rates'][$currencyCode];
    }
    public function calculate($sum, $currencyCode) {
        $rates = $this->getRatesTo($currencyCode);
        return ($sum * $rates);
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

