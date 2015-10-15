<?php
function __autoload($class_name) {
    $arPath = array(
        __DIR__ . "/../classes",
        __DIR__ . "/../migrations",
    );
    foreach( $arPath as $path ) {
        $class_file = "{$path}/{$class_name}.php";
        if( file_exists($class_file) ) {
            require($class_file);
            break;
        }
    }
}