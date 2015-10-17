<?php
/**
 * Created by PhpStorm.
 * User: LIS
 * Date: 17.10.2015
 * Time: 17:04
 */
require( __DIR__ . '/../data/functions.php');
$baseCurrency = getBaseCurrency();
setBaseCurrency($baseCurrency);
echo $baseCurrency;
$currenses = array('USD','EUR','RUB');
session_start();