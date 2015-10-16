<?php
require(__DIR__ . '/apps/core.php');
//$allCurrencies = require(__DIR__ . '/data/dbCurrencies.php');
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
                <a href="/?currency=<?=$currencyCode?>">
                    <span class="glyphicon glyphicon-<?=$currencyCode?>" aria-hidden="true"></span>
                </a>
            </li>
        <?php
        }
        ?>
        </ul>
        <br>
        Текущий курс:
        <ul class="list-group">
        <?php
        $selectedCurrency = new Currency(strtoupper($baseCurrencyCode));
        foreach ($arrCurrencies as $currencyCode) {
            if ( $currencyCode !== $baseCurrencyCode ) {
        ?>
                <li class="list-group-item">
                    1<span class="glyphicon glyphicon-<?=$baseCurrencyCode?>" aria-hidden="true">
                    </span> = <?=$selectedCurrency->getRatesTo(strtoupper($currencyCode))?>
                    <span class="glyphicon glyphicon-<?=$currencyCode?>" aria-hidden="true"></span>
                    <br><a href="history.php?in_currency=<?=$currencyCode?>">курс за последние 5 дней</a>
                </li>

        <?php }
        }
        ?>
        </ul>
        <br>
    </div>

    <div class="row">
        <?php
        if ( isset($baseCurrencyCode) && $baseCurrencyCode !== 'rub') {
            //$selectedCurrency = new Currency($baseCurrencyCode);
            $rate = $selectedCurrency->getRatesTo('RUB');
            $placeholder1 = '1';
            $placeholder2 = $rate;
            if ( isset($_POST['sum']) && !empty($_POST['sum']) ) {
                $exchangeSum = $selectedCurrency->calculate($_POST['sum'], 'RUB');
                $placeholder1 = $_POST['sum'];
                $placeholder2 = $exchangeSum;
            }
            ?>
            Онлайн конвертация в рубли:<br>
            <form method="POST" action="/">
                <div class="col-xs-2">
                    <div class="input-group">
                        <input name="sum" type="text" class="form-control" placeholder="<?=$placeholder1?>">
                    <span class="input-group-addon">
                       <span class="glyphicon glyphicon-<?=$baseCurrencyCode?>" aria-hidden="true"></span>
                    </span>
                    </div>
                </div>
                <div class="col-xs-1" align="center">
                    =
                </div>
                <div class="col-xs-2">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="<?=$placeholder2?>" disabled>
                    <span class="input-group-addon">

                        <span class="glyphicon glyphicon-rub" aria-hidden="true"></span>
                    </span>
                    </div>
                </div>
                <div class="col-xs-5">
                    <input type="submit" class="btn btn-default" value="Посчитать">
                </div>
            </form>
        <?php
        }
        ?>
    </div>
</div>
</body>
</html>