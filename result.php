<?php

$count_base = isset($_POST['count_base']) && !empty($_POST['count_base']) ? $_POST['count_base'] : '1';
$rub = isset($_POST['rub']) && !empty($_POST['rub']) ? $_POST['rub'] : '1';

echo $count_base*$rub;