<?php
/**
 * Created by PhpStorm.
 * User: LIS
 * Date: 17.10.2015
 * Time: 17:04
 */
session_start();

function __autoload($class_name) {
    $arPath = array(
        __DIR__ . "/../classes",
        __DIR__ . "/../migrate",
    );
    foreach( $arPath as $path ) {
        $class_file = "{$path}/{$class_name}.php";
        if( file_exists($class_file) ) {
            require($class_file);
            break;
        }
    }
}
