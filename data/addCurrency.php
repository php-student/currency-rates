<?php
require(__DIR__ . '/../app/core.php');

$currency_obj=new CurrencyRepo();
//$currency_repo=$currency_obj->getAllCurrency();

//unset($_POST['currency']);
unset($_SESSION['error']);
unset($_SESSION['message']);
if(isset($_POST['newCurrency'])){
    //echo $_POST['currency'];
    if($currency_obj->AddCurrency($_POST['newCurrency'])){
        $_SESSION['message'] = "Валюта {$_POST['newCurrency']} добавлена!";
//        echo $_SESSION['message'];
//        if(isset($_SESSION)){
//            $error=$_SESSION;
//            unset($_SESSION['error']);
//        }
    }
    else echo $_SESSION['error'];
}
echo $_SESSION['message'];
echo $_SESSION['error'];
//echo $_POST['newCurrency'];
//header('Location: /');
