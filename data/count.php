<?php
/**
 * Created by PhpStorm.
 * User: LIS
 * Date: 18.10.2015
 * Time: 1:29
 */
require( __DIR__ . '/../data/functions.php');
echo $_POST['value']*currencyExchange($_GET['baseCurrency'], 'RUB');