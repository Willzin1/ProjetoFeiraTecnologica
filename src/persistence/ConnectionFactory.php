<?php 
    namespace App\persistence;

    class ConnectionFactory{

        private static $connection = null;

        public static function getConnection(){
            if (self::$connection == null){
                $hostname = "localhost";
                $dbName = "Testando"; // Nome do banco de dados que será criado
                $usuario = "root"; 
                $senha = "";

                self::$connection = new \mysqli($hostname, $usuario, $senha, $dbName);
            }    
            
            return self::$connection;
        }  
    }