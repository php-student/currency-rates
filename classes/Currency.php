<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 18.10.2015
 * Time: 14:29
 */

class Currency
{
    public $currency;

    public function __construct($currency)
    {
        $this->currency = $currency;
    }

    public static function getBaseCurrency()
    {
        if (isset($_GET['baseCurrency'])) {
            $baseCurrency = $_GET['baseCurrency'];
        } else {
            if (isset($_COOKIE['baseCurrency'])) {
                $baseCurrency = $_COOKIE['baseCurrency'];
            } else {
                $baseCurrency = 'USD';
            }
        }
        return $baseCurrency;
    }

    public static function setBaseCurrency($baseCurrency)
    {
        setcookie('baseCurrency', $baseCurrency, time() + 60 * 60 * 24 * 30, '/');
    }

    public static function currencyExchange($baseCurrency, $currency)
    {
        if ($currency != $baseCurrency) {
            $api = 'http://api.fixer.io/latest?base=';
            $json = file_get_contents($api . $baseCurrency);
            $data = json_decode($json, 1);
            return round($data['rates'][$currency], 2);
        } else return 1;
    }

    public static function lastCurrencyExchange($baseCurrency, $currency, $lastday)
    {
        if ($currency != $baseCurrency) {
            $api = 'http://api.fixer.io/';
            $json = file_get_contents($api . $lastday . '?base=' . $baseCurrency);
            $data = json_decode($json, 1);
            return round($data['rates'][$currency], 2);
        } else return 1;
    }

    public static function last5days()
    {
        return array(Date("Y-m-d", strtotime("-1 day")),
            Date("Y-m-d", strtotime("-2 day")),
            Date("Y-m-d", strtotime("-3 day")),
            Date("Y-m-d", strtotime("-4 day")),
            Date("Y-m-d", strtotime("-5 day")));
    }

    public static function getCurrency()
    {
        if (isset($_GET['thisCurrency'])) {
            $_SESSION['thisCurrency'] = $_GET['thisCurrency'];
            return $_GET['thisCurrency'];
        }
        if (isset($_SESSION['thisCurrency'])) {
            return $_SESSION['thisCurrency'];
        } else return 'USD';
    }

    public static function isCurrencySymbol($cur)
    {
        switch ($cur) {
            case 'RUB':
                return 'rub';
            case 'EUR':
                return 'eur';
            case 'USD':
                return 'usd';
            case 'GBP':
                return 'gbp';
            case 'YEN':
                return 'yen';
            default:
                return false;
        }
    }
}