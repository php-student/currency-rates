<?php
$api = require(__DIR__ . '/data/api.php');
$currency = require(__DIR__ . '/data/dbCurrency.php');
$CurrentValue = 'USD';
if(isset($_GET['curr'])){
    $CurrentValue = $_GET['curr'];
} else
    if(isset($_COOKIE['curr'])){
        $CurrentValue = $_COOKIE['curr'];
    } else {
        //if (isset($_POST['curr'])) {
            //$CurrentValue = $_POST['curr'];
        //} else{
            $CurrentCity = 'USD';
        }
setcookie('curr', $CurrentValue, time()+ 36000 * 60 * 60, '/');
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
        <?php
        foreach($currency as $icon => $Current){
        if ($CurrentValue == $Current) {
            $active = 'active';
        } else {
            $active = '';
        }
        ?>
        <ul class="nav nav-pills">
            <li role="presentation" class="<?= $active ?>">
                <a href="?curr=<?= $Current ?>">
                    <span class="<?=$icon?>" aria-hidden="true"></span>
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
            </li>-->
        </ul>

        <br>

        Курс за последние 5 дней:
        <ul class="list-group">
            <li class="list-group-item">
                <strong><?=$date = '2015-10-15'?></strong>:<br>
                1<span class="" aria-hidden="true"></span> = <?=currencyExchange5($CurrentValue, 'RUB', $date)?><span class="glyphicon glyphicon-rub" aria-hidden="true"></span>
            </li>
            <li class="list-group-item">
                <strong><?=$date = '2015-10-14'?></strong>:<br>
                1<span class="" aria-hidden="true"></span> = <?=currencyExchange5($CurrentValue, 'RUB', $date)?><span class="glyphicon glyphicon-rub" aria-hidden="true"></span>
            </li>
            <li class="list-group-item">
                <strong><?=$date = '2015-10-13'?></strong>:<br>
                1<span class="" aria-hidden="true"></span> = <?=currencyExchange5($CurrentValue, 'RUB', $date)?><span class="glyphicon glyphicon-rub" aria-hidden="true"></span>
            </li>
            <li class="list-group-item">
                <strong><?=$date = '2015-10-12'?></strong>:<br>
                1<span class="" aria-hidden="true"></span> = <?=currencyExchange5($CurrentValue, 'RUB', $date)?><span class="glyphicon glyphicon-rub" aria-hidden="true"></span>
            </li>
            <li class="list-group-item">
                <strong><?=$date = '2015-10-11'?></strong>:<br>
                1<span class="" aria-hidden="true"></span> = <?=currencyExchange5($CurrentValue, 'RUB', $date)?><span class="glyphicon glyphicon-rub" aria-hidden="true"></span>
            </li>
        </ul>

        <br>

        <a href="/">на главную</a>
    </div>
</div>
</body>
</html>