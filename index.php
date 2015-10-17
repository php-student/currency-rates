<?php
require(__DIR__ . '/application/core.php');

//$a=new ApiRepo();
//print_r($a->getCurrencyHistory(5,'RUB'));

$base_currency=Helper::get_base_currency();
Helper::set_currency($base_currency);

$api_repo=(new ApiRepo())->getCurrency($base_currency);
$currency_repo=(new CurrencyRepo())->getCurrency();

?>


<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
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
            <?php foreach($currency_repo as $curr){
                $cur_symbol=(Helper::isCurrencySymbol($curr->currency));?>
            <li role="presentation" class="active">
                <a href="/?base_curr=<?=$curr->currency?>">
                    <?if($cur_symbol){?><span class="glyphicon glyphicon-<?=$cur_symbol?>" aria-hidden="true"></span><?}else{echo $curr->currency;}?>
                </a>
            </li>
            <?}?>
        </ul>

        <br>
        <a href="/new_currency.php">Добавить валюту</a>
        <br><br>

        Текущий курс:
        <ul class="list-group">
        <?php
        $base_symbol=(Helper::isCurrencySymbol($base_currency));
        foreach($api_repo as $curr_api){
            if($curr_api->currency=='RUB'){
                $rub=$curr_api->value;
            }
            $cur_symbol=(Helper::isCurrencySymbol($curr_api->currency));?>

            <li class="list-group-item">
                1<?if($base_symbol){?><span class="glyphicon glyphicon-<?=$base_symbol?>" aria-hidden="true"></span><?}else{ echo $base_currency;}?> = <?=$curr_api->value?><?if($cur_symbol){?><span class="glyphicon glyphicon-<?=$cur_symbol?>" aria-hidden="true"></span><?}else{ echo $curr_api->currency;}?>
                <br><a href="/history.php/?cur=<?=$curr_api->currency?>&days=5">курс за последние 5 дней</a>
            </li>
        <?php
        } ?>
        </ul>

        <br>

    </div>


    <div class="row">

        Онлайн конвертация в рубли:<br>
            <div class="col-xs-2">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="1" name="count_base" id="count_base">
                    <span class="input-group-addon">
                       <?if($base_symbol){?><span class="glyphicon glyphicon-<?=$base_symbol?>" aria-hidden="true"></span><?}else{ echo $base_currency;}?>
                    </span>
                </div>
            </div>
            <div class="col-xs-1" align="center">
                =
            </div>
            <div class="col-xs-2">
                <div class="input-group">
                    <input type="text" class="form-control" disabled value="<?=$rub?>"  name="rub" id="rub">
                    <span class="input-group-addon">

                        <span class="glyphicon glyphicon-rub" aria-hidden="true"></span>
                    </span>
                </div>
            </div>
            <div class="col-xs-5">
                <input type="submit" class="btn btn-default" value="Посчитать" id="submit">
            </div>
    </div>

    <script>
        $('#submit').click(function(){
            $.post("/result.php",{count_base:$('#count_base').val(),rub:<?=$rub?>},function( data ) {
             $('#rub').val(data);
             });
        });
    </script>
</div>
</body>
</html>
