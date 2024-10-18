<?php 
    namespace App\persistence;

    class ConnectionFactory{

        private static $connection = null;

        public static function getConnection(){
            if (self::$connection == null){
                $hostname = "localhost";
                $bancodedados = "Teste"; // Nome do banco de dados que será criado
                $usuario = "root"; 
                $senha = "";

                self::$connection = new \mysqli($hostname, $usuario, $senha, $bancodedados);
            }    
            
            return self::$connection;
        }  
    }