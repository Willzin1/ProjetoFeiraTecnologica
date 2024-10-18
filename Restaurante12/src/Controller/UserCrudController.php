<?php
    namespace App\Controller;


    use App\model\Usuario;

    class UserCrudController{

        private $conn;

        public function __construct ($conn){
            $this->conn = $conn;
        }

    }