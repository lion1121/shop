<?php



class Db
{
    public static function getConnection()
    {

        // Указываем путь для параметров подключения к БД
        $paramsPath = ROOT . '/config/db_params.php';
        $params = include($paramsPath);

        $opt = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        $dsn = "mysql:host=localhost;dbname=super_mag;charset=utf8";
        $db = new PDO($dsn, 'root', '', $opt);

        return $db;

    }
}