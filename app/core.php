<?php
/**
 * Created by PhpStorm.
 * User: LIS
 * Date: 17.10.2015
 * Time: 17:04
 */
session_start();
require( __DIR__ . '/../data/functions.php');
$baseCurrency = getBaseCurrency();
setBaseCurrency($baseCurrency);
//echo $baseCurrency;
$currenses = array('USD','EUR','RUB');
function __autoload($class_name) {
    $class_file = __DIR__ . "/../classes/{$class_name}.php";
    if( file_exists($class_name) ) {
        require($class_name);
    }
}
