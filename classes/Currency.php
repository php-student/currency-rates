<?php

class Currency {
    public $code; # usd
    public $name; # USD

    public function __construct($code, $name) {
        $this->code = $code;
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

}
