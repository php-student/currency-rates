<?php
require(__DIR__ . '/../app/core.php');

$currency_obj=new CurrencyRepo();
$currency_repo=$currency_obj->getAllCurrency();

//unset($_POST['currency']);
unset($_SESSION['error']);
unset($_SESSION['message']);
if(isset($_POST['newCurrency'])){

    //echo $_POST['currency'];
    if(!$currency_obj->AddCurrency($_POST['newCurrency'])){
        $_SESSION['message'] = "Валюта {$_POST['newCurrency']} добавлена!";
        echo $_SESSION['message'];
//        if(isset($_SESSION)){
//            $error=$_SESSION;
//            unset($_SESSION['error']);
//        }
    }
    else echo $_SESSION['message'];
}
//header('Location: /');
/*
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
                    <a href="/new_currency.php/?base_curr=<?=$curr->currency?>">
                        <?if($cur_symbol){?><span class="glyphicon glyphicon-<?=$cur_symbol?>" aria-hidden="true"></span><?}else{echo $curr->currency;}?>
                    </a>
                </li>
            <?}?>
        </ul>

        <br>

        <span style="color:red"><? if(isset($error)) {
                foreach ($error as $er) {
                    echo $er;
                }
            } ?></span>
        <br><br>
        <form action="" method="post">
            <input type="text" name="currency" id="currency">
            <input type="submit" value="Создать" id="submit">
        </form>

        <br>

        <a href="/">на главную</a>
    </div>


</div>
</body>
</html>
*/
