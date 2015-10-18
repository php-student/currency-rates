<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 18.10.2015
 * Time: 14:33
 */

class Migrate
{
    public static function run($name, $action) {
        $m = new $name();
        if( $m->$action() ) {
            echo "{$name} {$action} success <br>";
        } else {
            echo "{$name} {$action} fail <br>";
        }
    }
}