<?php 
    namespace App\model;

    class Usuario{
        private $id;
        private $nome;
        private $email;
        private $telefone;
        private $senha;

       // public function __construct($nome, $email, $senha){
       //     $this->nome = $nome;
       //     $this->email = $email;
         //   $this->senha = $senha;
        //} 

        public function getNome(){
            return $this->nome;
        }

        public function getEmail(){
            return $this->email;
        }

        public function getSenha(){
            return $this->senha;
        }

        public function setNome($nome){
            $this->nome = $nome;
        }

        public function setEmail($email){
            $this->email = $email;
        }

        public function setSenha($senha){
            $this->senha = $senha;
        }
    }