<?php
class DB {
    const DB_HOST = 'localhost';
    const DB_NAME = 'currency_rates';
    const DB_USER = 'root';
    const DB_PASS = 'root';
    /**
     * @return false|PDO
     */
    public static function getConnection() {
        $host = self::DB_HOST;
        $name = self::DB_NAME;
        try {
            $pdo = new PDO("mysql:host={$host};dbname={$name}", self::DB_USER, self::DB_PASS);
        } catch( Exception $e ) {
            echo $e->getMessage();
        }
        return $pdo;
    }
}