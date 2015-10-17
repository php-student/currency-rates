<?php

class Helper
{
    public static function get_base_currency() {
        if( isset($_GET['base_curr']) ) {
            $baseCurrency = $_GET['base_curr'];
        } else {
            if( isset($_COOKIE['base_curr']) ) {
                $baseCurrency = $_COOKIE['base_curr'];
            } else {
                $baseCurrency = 'USD';
            }
        }
        return $baseCurrency;
    }

    public static function set_currency( $currency ) {
        setcookie('base_curr', $currency, time()+ 60*60*24*30, '/');
    }

    public static function isCurrencySymbol($cur){
        switch($cur){
            case 'RUB':
                return 'rub';
            case 'EUR':
                return 'eur';
            case 'USD':
                return 'usd';
            default:
                return false;
        }
    }
}