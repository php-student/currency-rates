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
            } else $baseCurrency = 'usd';
        }
        setcookie('currency', $baseCurrency, time()+ 60*60*24*30, '/');
        return $baseCurrency;
    }
    public function getRatesTo($overCurrency) {
        $base = $this->name;
        $api = "http://api.fixer.io/latest?base={$base}";
        $json_string = file_get_contents($api);
        $ar = json_decode($json_string, true);
        return $ar['rates'][$overCurrency];
    }
    public function calculate($sum) {
        $rates = $this->getRatesTo('RUB');
        return ($sum * $rates);
    }
}

