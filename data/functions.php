<?php
/**
 * Created by PhpStorm.
 * User: LIS
 * Date: 16.10.2015
 * Time: 13:08
 */
session_start();
function getBaseCurrency(){
    if( isset($_GET['baseCurrency']) ) {
        $baseCurrency = $_GET['baseCurrency'];
    } else {
        if( isset($_COOKIE['baseCurrency']) ) {
            $baseCurrency = $_COOKIE['baseCurrency'];
        } else {
            $baseCurrency = 'USD';
        }
    }
    return $baseCurrency;
}
    function setBaseCurrency($baseCurrency){
    setcookie('baseCurrency', $baseCurrency, time()+ 60*60*24*30, '/');
}

function currencyExchange($baseCurrency, $currency){
    if($currency !=$baseCurrency) {
        $api = 'http://api.fixer.io/latest?base=';
        $json = file_get_contents($api . $baseCurrency);
        $data = json_decode($json, 1);
        return round($data['rates'][$currency], 2);
    }
    else return 1;
}
function lastCurrencyExchange($baseCurrency, $currency,$lastday){
    if($currency !=$baseCurrency) {
        $api = 'http://api.fixer.io/';
        $json = file_get_contents($api . $lastday . '?base=' . $baseCurrency);
        $data = json_decode($json, 1);
        return round($data['rates'][$currency], 2);
    }
    else return 1;
}
function last5days(){
    return array(Date("Y-m-d",strtotime("-1 day")),
               Date("Y-m-d",strtotime("-2 day")),
               Date("Y-m-d",strtotime("-3 day")),
               Date("Y-m-d",strtotime("-4 day")),
               Date("Y-m-d",strtotime("-5 day")));
}
function getCurrency(){
    if(isset($_GET['thisCurrency'])){
        $_SESSION['thisCurrency'] = $_GET['thisCurrency'];
        return $_GET['thisCurrency'];
    }
    if(isset($_SESSION['thisCurrency'])){
        return $_SESSION['thisCurrency'];
    }
        else return 'USD';
}