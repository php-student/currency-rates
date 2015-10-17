<?php
require( __DIR__ . '/data/functions.php');
$baseCurrency = getBaseCurrency();
setBaseCurrency($baseCurrency);
echo $baseCurrency;
$currenses = array('USD','EUR','RUB');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Currency Rates</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
</head>
<body>
<div class="container">
    <div class="row">
        Базовая валюта:
        <ul class="nav nav-pills">
            <li role="presentation" class="active">
                <a href="#">
                    <span class="glyphicon glyphicon-usd" aria-hidden="true"></span>
                </a>
            </li>
            <li role="presentation">
                <a href="#">
                    <span class="glyphicon glyphicon-eur" aria-hidden="true"></span>
                </a>
            </li>
            <li role="presentation">
                <a href="#">
                    <span class="glyphicon glyphicon-rub" aria-hidden="true"></span>
                </a>
            </li>
        </ul>

        <br>

        Курс за последние 5 дней:
        <ul class="list-group">
            <li class="list-group-item">
                <strong>13.10.2015</strong>:<br>
                1<span class="glyphicon glyphicon-usd" aria-hidden="true"></span> = 62.21<span class="glyphicon glyphicon-rub" aria-hidden="true"></span>
            </li>
            <li class="list-group-item">
                <strong>12.10.2015</strong>:<br>
                1<span class="glyphicon glyphicon-usd" aria-hidden="true"></span> = 62.21<span class="glyphicon glyphicon-rub" aria-hidden="true"></span>
            </li>
            <li class="list-group-item">
                <strong>11.10.2015</strong>:<br>
                1<span class="glyphicon glyphicon-usd" aria-hidden="true"></span> = 62.21<span class="glyphicon glyphicon-rub" aria-hidden="true"></span>
            </li>
            <li class="list-group-item">
                <strong>10.10.2015</strong>:<br>
                1<span class="glyphicon glyphicon-usd" aria-hidden="true"></span> = 62.21<span class="glyphicon glyphicon-rub" aria-hidden="true"></span>
            </li>
            <li class="list-group-item">
                <strong>09.10.2015</strong>:<br>
                1<span class="glyphicon glyphicon-usd" aria-hidden="true"></span> = 62.21<span class="glyphicon glyphicon-rub" aria-hidden="true"></span>
            </li>
        </ul>

        <br>

        <a href="/">на главную</a>
    </div>
</div>
</body>
</html>