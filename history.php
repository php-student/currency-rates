<?php
session_start();
require(__DIR__ . '/apps/core.php');
//$allCurrencies = require(__DIR__ . '/data/dbCurrencies.php');
//$baseCurrency = Currency::setBaseCurrency();
$currencyData = new CurrencyData;
$arrCurrencies = $currencyData->getArrCurrencies();
$baseCurrencyCode = Currency::setBaseCurrency();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Currency Rates</title>
    <script src="http://code.jquery.com/jquery-2.1.2.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        Базовая валюта:
        <ul class="nav nav-pills">
            <?php
            foreach ($arrCurrencies as $currencyCode) {
              if ( $currencyCode ==  $baseCurrencyCode) $class = 'class="active"';
              else $class = '';
            ?>
                <li role="presentation" <?=$class?>>
                    <a href="/history.php?currency=<?=$currencyCode?>">
                    <span class="glyphicon glyphicon-<?=strtolower($currencyCode)?>" aria-hidden="true"></span>
                    </a>
                </li>
            <?php
            }
            ?>
        </ul>
        <br>
        <?php
        $selectedCurrency = new History($baseCurrencyCode, 5);
        $inCurrency = $_SESSION['in_currency'];
        if ( isset($_GET['in_currency']) ) {
            $inCurrency = $_GET['in_currency'];
            $_SESSION['in_currency'] = $inCurrency;
        }
        ?>
        Курс <?=strtoupper($baseCurrencyCode)?>/<?=strtoupper($inCurrency)?> за последние 5 дней:
        <ul class="list-group">
        <?php
            $historyArr = $selectedCurrency->getHistoryArr(strtoupper($inCurrency));
            foreach ($historyArr as $date => $value) {
                ?>
                <li class="list-group-item">
                    <strong><?= $date ?></strong>:<br>
                    1<span class="glyphicon glyphicon-<?=strtolower($baseCurrencyCode)?>" aria-hidden="true"></span> = <?=$value?>
                    <span class="glyphicon glyphicon-<?=strtolower($inCurrency)?>" aria-hidden="true"></span>
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