<?php
require( __DIR__ . '/app/core.php');
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
        <?php
        include "data/base.txt";
        ?>

        <br>

        Текущий курс:
        <?php
        $currency = 'eur';
echo currencyExchange($baseCurrency, $currency);
?>
        <ul class="list-group">
            <?php
            foreach($currenses as $c) {
                if($c == $baseCurrency){
                    continue;
                }
                ?>
                <li class="list-group-item">
                    1<span class="glyphicon glyphicon-<?= $baseCurrency ?>" aria-hidden="true"></span> = <?=currencyExchange($baseCurrency, $c)?><span
                        class="glyphicon glyphicon-<?= $c ?>" aria-hidden="true"></span>
                    <br><a href="/history.php?thisCurrency=<?=$c?>">курс за последние 5 дней</a>
                </li>
                <?php
            }
            ?>
            <!--
            <li class="list-group-item">
                1<span class="glyphicon glyphicon-<?=$baseCurrency?>" aria-hidden="true"></span> = 0.92<span class="glyphicon glyphicon-eur" aria-hidden="true"></span>
                <br><a href="#">курс за последние 5 дней</a>
            </li>
            -->
        </ul>

        <br>

    </div>


    <div class="row">
        Онлайн конвертация в рубли:<br>
        <form method="post" action="/">
            <div class="col-xs-2">
                <div class="input-group">
                    <input type="text" class="form-control" name="value" placeholder="<?=$_POST['value']?>">
                    <span class="input-group-addon">
                       <span class="glyphicon glyphicon-<?=$baseCurrency?>" aria-hidden="true"></span>
                    </span>
                </div>
            </div>
            <div class="col-xs-1" align="center">
                 =
            </div>
            <div class="col-xs-2">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="<?=$_POST['value']*currencyExchange($baseCurrency, 'RUB')?>" disabled>
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