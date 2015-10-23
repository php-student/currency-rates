<?php
/**
 * Created by PhpStorm.
 * User: LIS
 * Date: 18.10.2015
 * Time: 1:29
 */
require( __DIR__ . '/../app/core.php');
//$value = intval($_POST['value']);
//$format = isset($_POST['date_format']) && !empty($_POST['date_format']) ? $_POST['date_format'] : 'Y-m-d';
//if($value) {
    echo $_POST['value'] * Currency::currencyExchange($_GET['baseCurrency'], 'RUB');
//}