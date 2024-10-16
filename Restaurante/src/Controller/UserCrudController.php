<?php
    namespace App\Controller;

    class UserCrudController{

        private $pdo;

        public function __construct (\PDO $pdo){
            $this->pdo = $pdo;
        }

        public function index(){
            header("Location: /../views/user_crud_create.php");
        }

        public function cardapio(){
            header("Location: /../views/part_view_cardapio.php");
        }

        public function create($nome, $email, $senha){
            $stmt = $this->pdo->prepare("INSERT INTO usuario (nome, email, senha) values ($nome, $email, $senha)");
            $stmt->execute(['nome' => $nome, 'email' => $email, 'senha' => password_hash()]);
            return $this->read($email);
        }

        public function read($email){
            $stmt = $this->pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
            $stmt->execute(['email' => $email]);
            $stmt->setFetchMode(PDO::FETCH_CLASS, Usuario::Class);  
            return $stmt->fetch();
        }

        public function update($email, $novoNome, $novoEmail, $novaSenha){
            $stmt = $this->pdo->prepare("UPDATE usuarios SET nome = :nome, email = :newEmail, senha = :senha");
           // $stmt->execute('nome' => $novoNome, 'novoEmail' => $novoEmail, 'senha' => password_hash($novaSenha));
            return $this->read($novoEmail);
        }

        public function delete($email){
            $stmt = $this->pdo->prepare("DELETE FROM usuarios WHERE email = :email");
            return $stmt->execute(['email' => $email]);
        }

        public function list(){
            $stmt = $this->pdo->query("SELECT * FROM usuarios");
            return $stmt->fetchAll(PDO::FETCH_CLASS, Usuario::Class);
        }
    }