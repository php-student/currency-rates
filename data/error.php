<?php
/**
 * Created by PhpStorm.
 * User: LIS
 * Date: 16.10.2015
 * Time: 22:32
 */

$message = isset($_GET['404'])?'Случилось страшное и мы ничего не нашли!. <br> . Ищите по новой':'';
$message = isset($_GET['500'])?'Что то не работает и мы не знаем что, но обязательно узнаем. <br>':'';
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
        Ошибка!!!
        <ul class="nav nav-pills">
                <li role="presentation" class="active" >
                    <a href="../">
                        <span class="glyphicon" aria-hidden="true"><?php echo 'Случилось страшное и мы ничего не нашли! <br><br><br> Возвращайтесь на главную!';?></span>
                    </a>
                </li>
            <!--
            <li role="presentation">
                <a href="#">
                    <span class="glyphicon glyphicon-<?=$c?>" aria-hidden="true"></span>
                </a>
            </li>
            <li role="presentation">
                <a href="#">
                    <span class="glyphicon glyphicon-<?=$c?>" aria-hidden="true"></span>
                </a>
            </li>
            -->
        </ul>