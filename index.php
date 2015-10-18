<?php

$api = require(__DIR__ . '/data/api.php');
$currency = require(__DIR__ . '/data/dbCurrency.php');
$CurrentValue = 'USD';
if(isset($_GET['curr'])){
     $CurrentValue = $_GET['curr'];
} else
    if(isset($_COOKIE['curr'])){
         $CurrentValue = $_COOKIE['curr'];
    } else
        if (isset($_POST['curr'])) {
             $CurrentValue = $_POST['curr'];
        } else{
             $CurrentCity = 'USD';
        }
setcookie('curr', $CurrentValue, time()+ 36000 * 60 * 60, '/');
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

        Базовая валюта: <?=$curr = 'RUB'?>
                <?php
                foreach($currency as $icon => $Current){
                if ($CurrentValue == $Current) {
                    //$icon[] = $key;
                    $active = 'active';
                } else {
                    $active = '';
                }
                ?>
        <ul class="nav nav-pills">
            <li role="presentation" class="<?=$active?>">
                <a href="?curr=<?=$Current?>">
                    <span class="<?=$icon[0]?>" aria-hidden="true"><?=$Current?></span>
                </a>
            </li>
            <?php
            }
            ?>
            <!--<li role="presentation">
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
            -->
        <br>
            Текущий курс:
            <ul class="list-group">
                <li class="list-group-item">
                    1<span class="" aria-hidden="true"></span>
                    <?php
                    //$curr = 'RUB';
                    ?>
                    =<?= currencyExchange($CurrentValue, 'RUB') ?>;<span class="glyphicon glyphicon-rub"
                                                                         aria-hidden="true"></span>

                    <br><a href="/history.php">курс за последние 5 дней</a>
                </li>
                <li class="list-group-item">
                    <?php
                    //$curr = 'RUB';
                    ?>
                    1<span class="" aria-hidden="true"></span> = <?= currencyExchange($CurrentValue, 'EUR') ?><span class="glyphicon glyphicon-eur"
                                                                                                        aria-hidden="true"></span>

                    <br><a href="/history.php">курс за последние 5 дней</a>
                </li>
            </ul>

            <br>

    </div>


    <div class="row">
        Онлайн конвертация в рубли:<br>
        <form action="/" method="post">
            <div class="col-xs-2">
                <div class="input-group">
                    <input type="text" id="form-control" name = "value" placeholder="<?=$_POST['value']?>">
                    <span class="input-group-addon">
                       <span class="<?=$CurrentValue?>" aria-hidden="true"></span>
                    </span>
                </div>
            </div>
            <div class="col-xs-1" align="center">
                 =
            </div>
            <div class="col-xs-2">
                <div class="input-group">
                    <input type="text" id="form-control" name = "result" placeholder="<?=$_POST['value']*currencyExchange($CurrentValue, 'RUB')?>" disabled>
                    <span class="input-group-addon">

                        <span class="glyphicon glyphicon-rub" aria-hidden="true"></span>
                    </span>
                </div>
            </div>
            <div class="col-xs-5">
                <input type="submit" id="btn btn-default" nsme = "action" value="Посчитать">
            </div>
        </form>
    </div>
</div>
</body>
</html>