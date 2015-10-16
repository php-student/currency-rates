<?php
require(__DIR__ . '/apps/core.php');
$allCurrencies = require(__DIR__ . '/data/dbCurrencies.php');
$baseCurrency = Currency::setBaseCurrency();
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
            foreach ($allCurrencies as $currency) {
                if ( $currency['code'] ==  $baseCurrency) $class = 'class="active"';
                else $class = '';
                ?>
                <li role="presentation" <?=$class?>>
                    <a href="/history.php?currency=<?=$currency['code']?>">
                        <span class="glyphicon glyphicon-<?=$currency['code']?>" aria-hidden="true"></span>
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
        $fromCurrency = new History($baseCurrency, 5);
        $inCurrency = 'usd';
        if ( isset($_GET['in_currency']) ) $inCurrency = $_GET['in_currency'];
            $historyArr = $fromCurrency->getHistoryArr(mb_strtoupper($inCurrency));
            foreach ($historyArr as $date => $value) {
                ?>
                <li class="list-group-item">
                    <strong><?= $date ?></strong>:<br>
                    1<span class="glyphicon glyphicon-<?=$baseCurrency?>" aria-hidden="true"></span> = <?=$value?>
                    <span class="glyphicon glyphicon-<?=$inCurrency?>" aria-hidden="true"></span>
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