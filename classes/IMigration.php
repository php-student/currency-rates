<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 18.10.2015
 * Time: 14:33
 */

interface IMigration
{
    public function up();
    public function down();
}