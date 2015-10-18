<?php
require(__DIR__ . '/application/core.php');

$base_currency=Helper::get_base_currency();
Helper::set_currency($base_currency);

$currency_repo=(new CurrencyRepo())->getCurrency();

if(isset($_GET['days']) && isset($_GET['cur'])){
    $days=$_GET['days'];
    $cur=$_GET['cur'];
    $curr_history=(new ApiRepo())->getCurrencyHistory($_GET['days'],$_GET['cur'],$base_currency);
}
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
            <?php foreach($currency_repo as $curr){
                if($curr->currency!==$cur){
                $cur_symbol=(Helper::isCurrencySymbol($curr->currency));?>
                <li role="presentation" class="active">
                    <a href="/history.php/?base_curr=<?=$curr->currency?>&days=<?=$days?>&cur=<?=$cur?>">
                        <?if($cur_symbol){?><span class="glyphicon glyphicon-<?=$cur_symbol?>" aria-hidden="true"></span><?}else{echo $curr->currency;}?>
                    </a>
                </li>
            <?}}?>
        </ul>

        <br>

        Курс за последние 5 дней:
        <ul class="list-group">
            <?php
            $base_symbol=(Helper::isCurrencySymbol($base_currency));
            foreach($curr_history as $ar){
                foreach($ar as $curr){
                    $cur_symbol=(Helper::isCurrencySymbol($curr->currency));?>
            <li class="list-group-item">
                <strong><?=$curr->date?></strong>:<br>
                1<?if($base_symbol){?><span class="glyphicon glyphicon-<?=$base_symbol?>" aria-hidden="true"></span><?}else{ echo $base_currency;}?> = <?=$curr->value?><?if($cur_symbol){?><span class="glyphicon glyphicon-<?=$cur_symbol?>" aria-hidden="true"></span><?}else{ echo $curr->currency;}?>
            </li>
            <?}}?>
        </ul>

        <br>

        <a href="/">на главную</a>
    </div>
</div>
</body>
</html>
