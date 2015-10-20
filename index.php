<?php
require( __DIR__ . '/app/core.php');
//var_dump(strtolower($baseCurrency));
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
        include "data/base.php";
        ?>
        <br>
        Текущий курс:
        <ul class="list-group">
            <?php
            foreach($currenses as $c) {
                if($c == $baseCurrency){
                    continue;
                }
                ?>
                <li class="list-group-item">
                    1<span class="glyphicon glyphicon-<?=strtolower($baseCurrency)?>" aria-hidden="true"></span> = <?=currencyExchange($baseCurrency, $c)?><span
                        class="glyphicon glyphicon-<?=strtolower($c)?>" aria-hidden="true"></span>
                    <br><a href="/history.php?thisCurrency=<?=$c?>">курс за последние 5 дней</a>
                </li>
                <?php
            }
            ?>
        </ul>

        <br>

    </div>


    <div class="row">
        Онлайн конвертация в рубли:<br>
        <form method="post" action="/">
            <div class="col-xs-2">
                <div class="input-group">
                    <input type="text" id="count-value" class="form-control" name="value" placeholder="<?=$_POST['value']?>">
                    <span class="input-group-addon">
                       <span class="glyphicon glyphicon-<?=strtolower($baseCurrency)?>" aria-hidden="true"></span>
                    </span>
                </div>
            </div>
            <div class="col-xs-1" align="center">
                 =
            </div>
            <div class="col-xs-2">
                <div class="input-group">
                    <input type="text" class="form-control" id="result" disabled>
                    <span class="input-group-addon">

                        <span class="glyphicon glyphicon-rub" aria-hidden="true"></span>
                    </span>
                </div>
            </div>
            <div class="col-xs-5">
                <input id="count-button" type="submit" class="btn btn-default" value="Посчитать">
            </div>
        </form>
        <script>
            $('#count-button').click(function(){
                $.post("/data/count.php?baseCurrency=<?=$baseCurrency?>",{value: $('#count-value').val()},function( data ) {
                    $('#result').val(data);
                });
                return false;
            });
        </script>
    </div>
</div>
</body>
</html>