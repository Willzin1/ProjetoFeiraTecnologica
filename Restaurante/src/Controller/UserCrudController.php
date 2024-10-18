<?php

namespace App\Controller;

use PDO;
use App\model\Usuario;

class UserCrudController{

    private $pdo;

    public function __construct(PDO $pdo){
        $this->pdo = $pdo;
    }

    public function cadastro(){
        header("Location: /../views/part_view_cadastro.php");
    }

    public function login(){
        header("Location: /../views/part_view_login.php");
    }

    public function index(){
        header("Location: /../index.php");
    }

    public function cardapio(){
        header("Location: /../views/part_view_cardapio.php");
    }

    public function create($nome, $email, $telefone, $senha){
        $hash = password_hash($senha, PASSWORD_DEFAULT);
        $stmt = $this->pdo->prepare("INSERT INTO usuario (nome, email, telefone, senha) values (:nome, :email, :telefone, :senha)");
        if($stmt->execute(['nome' => $nome, 'email' => $email, 'telefone' => $telefone, 'senha' => $hash])){
            //$usuario = new Usuario();
            //$usuario->setNome($nome);
            //$usuario->setEmail($email);
            //$usuario->setSenha($senha);
        }

        if ($stmt){
            header("Location: /../views/part_view_login.php");
        }
    }
/*
    public function read($email){
        $stmt = $this->pdo->prepare("SELECT * FROM usuario WHERE email = :email");
        $stmt->execute(['email' => $email]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, Usuario::class);
        return $stmt->fetch();
    }

    public function update($email, $novoNome, $novoEmail, $novaSenha){
        $stmt = $this->pdo->prepare("UPDATE usuario SET nome = :nome, email = :newEmail, senha = :senha");
        // $stmt->execute('nome' => $novoNome, 'novoEmail' => $novoEmail, 'senha' => password_hash($novaSenha));
        return $this->read($novoEmail);
    }

    public function delete($email){
        $stmt = $this->pdo->prepare("DELETE FROM usuario WHERE email = :email");
        return $stmt->execute(['email' => $email]);
    }

    public function list(){
        $stmt = $this->pdo->query("SELECT * FROM usuario");
        return $stmt->fetchAll(PDO::FETCH_CLASS, Usuario::class);
    }
    */

    /*public function logar($email, $senha) {
    // Prepara a consulta SQL
    $stmt = $this->pdo->prepare("SELECT * FROM usuario WHERE email = :email");
    $stmt->execute([':email' => $email]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);


    // ARRUMAR, CREIO QUE O HASH ESTEJA CONFLITANDO COM A SENHA INFORMADA
    if($usuario){
        
        echo"email existe";
    } else{
        echo"email não encontrado";
    }
}
   */
  
   public function logar($email, $senha) {
    // Prepara a consulta SQL
    $stmt = $this->pdo->prepare("SELECT * FROM usuario WHERE email = :email");
    $stmt->execute([':email' => $email]);
    $usuario = $stmt->fetchObject(Usuario::class);

    // Verifica se o usuário existe
    if ($usuario && $senha === $usuario->getSenha()) {
        session_start();
        $_SESSION['id'] = $usuario->getId();
        $_SESSION['nome'] = $usuario->getNome();
        header("Location: /../index.php");
        exit;
    }else{
        echo"nao logado!";
    }
}
    

    public function perfil(){
        header("Location: ./../views/part_view_perfil.php");
    }
}
