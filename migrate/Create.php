<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 18.10.2015
 * Time: 14:58
 */

class CreateAndFillCityMigration implements IMigration
{
    public function up() {
        DB::getConnection()->exec("
        CREATE TABLE IF NOT EXISTS `city` (
          `code` varchar(10) NOT NULL,
          `name` varchar(256) NOT NULL,
          `lat` float NOT NULL,
          `long` float NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
        ");

        DB::getConnection()->exec("
        INSERT INTO `city` (`code`, `name`, `lat`, `long`) VALUES
        ('nsk', '�����������', 55.1, 82.55),
        ('krsk', '����������', 56.01, 93.04),
        ('brnl', '�������', 53.2, 83.46),
        ('tsk', '�����', 56.29, 84.57),
        ('nzsk', '������������', 53.44, 87.05);
        ");

        return true;
    }

    public function down() {
        DB::getConnection()->exec("
        DROP TABLE IF EXISTS `city`
        ");

        return true;
    }
}