<?php

namespace App\persistence;

use PDO;
use PDOException;

class DBConnection
{
    private static $instance = null;

    private function __construct() {}

    public static function getInstance(): PDO
    {
        if (self::$instance === null) {
            try {
                //$dsn = 'mysql:host=localhost;dbname=Testando;charset=utf8';
                $host = 'localhost';
                $dbName = 'Testando';
                $username = 'root';
                $password = '';
                $charset = 'utf8';
                self::$instance = new PDO('mysql:host=' . $host . ';dbname=' . $dbName . ';charset=' . $charset, $username, $password);
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Conexão falhou: " . $e->getMessage());
            }
        }
        return self::$instance;
    }
}
