<?php
   namespace App\persistence;
   
   use PDO;
   use PDOException;
   
   class DBConnection {
       private static $instance = null;
   
       private function __construct() {}
   
       public static function getInstance(): PDO {
           if (self::$instance === null) {
               try {
                   $dsn = 'mysql:host=localhost;dbname=Testando;charset=utf8';
                   $username = 'root';
                   $password = '';
                   self::$instance = new PDO($dsn, $username, $password);
                   self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
               } catch (PDOException $e) {
                   die("Connection failed: " . $e->getMessage());
               }
           }
           return self::$instance;
       }
   }
   