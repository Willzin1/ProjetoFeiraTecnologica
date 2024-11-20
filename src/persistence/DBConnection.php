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
                // Se precisar testar no localhost, só colocar as informações que estão comentadas.
                $host = 'sustentafood-flex-server.mysql.database.azure.com'; // 'localhost';
                $dbName = 'restaurante'; // 'restaurante';
                $username = 'william'; // 'root';
                $password = 'Heitor1805'; // '';
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
