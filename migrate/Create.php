<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 18.10.2015
 * Time: 14:58
 */

class CreateAndFillCurrencyMigration implements IMigration
{
    public function up() {
        DB::getConnection()->exec("CREATE TABLE IF NOT EXISTS `curency` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `name` varchar(4) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;
        ");

        DB::getConnection()->exec("INSERT INTO `curency` (`id`, `name`) VALUES
(2, 'EUR'),
(3, 'RUB'),
(1, 'USD');
        ");

        return true;
    }

    public function down() {
        DB::getConnection()->exec("
        DROP TABLE IF EXISTS `curency`
        ");

        return true;
    }
}