<?php
require(__DIR__ . '/../apps/core.php');
$currencyData = new CurrencyData;
$arrCurrencies = $currencyData->getArrCurrencies();
$arrCurrenciesFromApi = Currency::getArrCurrenciesFromApi();

$addDel = new CurrencyData;
if ( isset($_GET['add']) && !empty($_GET['add']) ) {
    if ( $addDel->addCurrency($_GET['add']) ) {
        header('location: /admin/index.php');
    } else echo 'Ошибка добавления';
}
elseif ( isset($_GET['del']) && !empty($_GET['del']) ) {
    if ( $addDel->delCurrency($_GET['del']) ) {
        setcookie( "currency", '', time() - 10, '/');
        header('location: /admin/index.php');
    } else echo 'Ошибка удаления';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Currency Rates</title>
    <script src="http://code.jquery.com/jquery-2.1.2.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <h4>Добавленные валюты:</h4>
        <h5>кликни, чтобы удалить</h5>
        <ul class="nav nav-pills">
            <?php
            foreach ($arrCurrencies as $currencyCode) {

                $getCurrencyCode = $currencyCode;

                if ($currencyCode !== 'EUR' && $currencyCode !== 'USD' && $currencyCode !== 'RUB') $link="/admin/index.php?del={$getCurrencyCode}";
                else $link='#';

                if ( $currencyCode ==  $baseCurrencyCode) $class = 'class="active"';
                else $class = '';

                if ($currencyCode == 'RUB' || $currencyCode == 'USD' || $currencyCode == 'EUR' || $currencyCode == 'GBP') {
                    $glyphicon = $currencyCode;
                    $currencyCode = '';
                } else $glyphicon = '';
            ?>
            <li role="presentation">
                <a href="<?=$link?>">
                    <span class="glyphicon glyphicon-<?=strtolower($glyphicon)?>" aria-hidden="true"><?=$currencyCode?></span>
                </a>
            </li>
        <?php
        }
        ?>
        </ul>
        <br>
    </div>
    <div class="row">
        <h4>Остальные валюты:</h4>
        <h5>кликни, чтобы добавить</h5>
        <ul class="nav nav-pills">
            <?php
            $arrResult = array_diff($arrCurrenciesFromApi, $arrCurrencies);
            foreach ($arrResult as $currencyCode) {

                $getCurrencyCode = $currencyCode;

                if ($currencyCode == 'RUB' || $currencyCode == 'USD' || $currencyCode == 'EUR' || $currencyCode == 'GBP') {
                    $glyphicon = $currencyCode;
                    $currencyCode = '';
                } else $glyphicon = '';
            ?> 
            <li role="presentation">
                <a href="/admin/index.php?add=<?=$getCurrencyCode?>">
                    <span class="glyphicon glyphicon-<?=strtolower($glyphicon)?>" aria-hidden="true"><?=$currencyCode?></span>
                </a>
            </li>
        <?php
        }
        ?>
        </ul>
        <br>
    </div>
</div>
</body>
</html>