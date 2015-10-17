<?php
require( __DIR__ . '/app/core.php');
$thisCurrency = getCurrency();
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
            foreach($currenses as $c){
                if($c == $thisCurrency){
                    continue;
                }
                $a = '';
                $a = $c==$baseCurrency ? 'active' : '';
                ?>
                <li role="presentation" class="<?=$a?>" >
                    <a href="/history.php?baseCurrency=<?=$c?>">
                        <span class="glyphicon glyphicon-<?=$c?>" aria-hidden="true"></span>
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

            foreach(last5days() as $lastday) {
                ?>
                <li class="list-group-item">
                    <strong><?=$lastday?></strong>:<br>
                    1<span class="glyphicon glyphicon-<?=$baseCurrency ?>" aria-hidden="true"></span><?=lastCurrencyExchange($baseCurrency,$thisCurrency,$lastday)?><span
                        class="glyphicon glyphicon-<?=$thisCurrency?>" aria-hidden="true"></span>
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