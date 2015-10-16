<?php
require(__DIR__ . '/../apps/core.php');

$migration_name = $_SERVER['argv'][1]; # create_table_city
$migration_action = $_SERVER['argv'][2]; # up
//$migration_name = 'CreateCityTable';
//$migration_action = 'up';



if ( !empty($migration_name) ) {
    $m = new $migration_name();
    $m->$migration_action();
}
/*if (class_exists('DB')) {
    echo 'ok!';
}*/

