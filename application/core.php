<?php

//header('Content-Type: text/html; charset=utf-8');
session_start();

function __autoload($className){
    require(__DIR__."/../classes/{$className}.php");
}