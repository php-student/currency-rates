<?php
require( __DIR__ . '/app/core.php');
$baseCurrency = Currency::getBaseCurrency();
Currency::setBaseCurrency($baseCurrency);
$currencies = new CurrencyRepo();
$currencies = $currencies->getAllCurrency();
$thisCurrency = Currency::getCurrency();
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
            <?php
            foreach($currencies as $c){
                if($c->currency == strtoupper($thisCurrency)){
                    continue;
                }
                $a = '';
                $a = $c->currency==$baseCurrency ? 'active' : '';
                ?>
                <li role="presentation" class="<?=$a?>" >
                    <a href="/history.php?baseCurrency=<?=$c->currency?>">
                        <span class="glyphicon glyphicon-<?=strtolower($c->currency)?>" aria-hidden="true"></span>
                    </a>
                </li>
                <?php
            }
            ?>
        </ul>
        <br>

        Курс за последние 5 дней:
        <ul class="list-group">
            <?php

            foreach(Currency::last5days() as $lastDay) {
                ?>
                <li class="list-group-item">
                    <strong><?=$lastDay?></strong>:<br>
                    1<span class="glyphicon glyphicon-<?=strtolower($baseCurrency)?>" aria-hidden="true"></span><?=Currency::lastCurrencyExchange(strtoupper($baseCurrency),strtoupper($thisCurrency),$lastDay)?><span
                        class="glyphicon glyphicon-<?=strtolower($thisCurrency)?>" aria-hidden="true"></span>
                </li>
                <?php
            }
            ?>
        </ul>

        <br>

        <a href="/">на главную</a>
    </div>
</div>
</body>
</html>