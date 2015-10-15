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
    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">

    <div class="row">
        Базовая валюта:
        <ul class="nav nav-pills">
        <?php
        foreach ($allCurrencies as $currency) {
              if ( $currency['name'] ==  $baseCurrency) $class = 'class="active"';
              else $class = '';
            ?>
            <li role="presentation" <?=$class?>>
                <a href="/?currency=<?=$currency['name']?>">
                    <span class="glyphicon glyphicon-<?=$currency['code']?>" aria-hidden="true"></span>
                </a>
            </li>
        <?php
        }
        ?>
        </ul>
        <br>

        Текущий курс:
        <ul class="list-group">
            <li class="list-group-item">
                1<span class="glyphicon glyphicon-usd" aria-hidden="true"></span> = 62.21<span class="glyphicon glyphicon-rub" aria-hidden="true"></span>
                <br><a href="#">курс за последние 5 дней</a>
            </li>
            <li class="list-group-item">
                1<span class="glyphicon glyphicon-usd" aria-hidden="true"></span> = 0.92<span class="glyphicon glyphicon-eur" aria-hidden="true"></span>
                <br><a href="#">курс за последние 5 дней</a>
            </li>
        </ul>

        <br>

    </div>


    <div class="row">
        Онлайн конвертация в рубли:<br>
        <form>
            <div class="col-xs-2">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="1">
                    <span class="input-group-addon">
                       <span class="glyphicon glyphicon-usd" aria-hidden="true"></span>
                    </span>
                </div>
            </div>
            <div class="col-xs-1" align="center">
                 =
            </div>
            <div class="col-xs-2">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="62.32" disabled>
                    <span class="input-group-addon">

                        <span class="glyphicon glyphicon-rub" aria-hidden="true"></span>
                    </span>
                </div>
            </div>
            <div class="col-xs-5">
                <input type="submit" class="btn btn-default" value="Посчитать">
            </div>
        </form>
    </div>
</div>
</body>
</html>