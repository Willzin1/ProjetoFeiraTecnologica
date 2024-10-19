<?php

namespace App\Controller;

use PDO;
use App\model\Usuario;

class UserCrudController
{

    private $pdo;

    // Método para fazer a conexão com o banco de dados;
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    // Método para criar um usuário e inserir no banco de dados. Irá receber um nome, email, telefone e senha do formulário de cadastro.
    public function create($nome, $email, $telefone, $senha)
    {
        $hash = password_hash($senha, PASSWORD_DEFAULT);
        $stmt = $this->pdo->prepare("INSERT INTO usuario (nome, email, telefone, senha) values (:nome, :email, :telefone, :senha)");
        if ($stmt->execute(['nome' => $nome, 'email' => $email, 'telefone' => $telefone, 'senha' => $hash])) {
            $usuario = new Usuario();
            $usuario->setNome($nome);
            $usuario->setEmail($email);
            $usuario->setTelefone($telefone);
            $usuario->setSenha($senha);
        }

        if ($stmt) header("Location: /../views/part_view_login.php");
    }
    /*
    // 
    public function read($email){
        $stmt = $this->pdo->prepare("SELECT * FROM usuario WHERE email = :email");
        $stmt->execute(['email' => $email]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, Usuario::class);
        return $stmt->fetch();
    }

    // Método para fazer o update do usuário.
    public function update($email, $novoNome, $novoEmail, $novaSenha){
        $stmt = $this->pdo->prepare("UPDATE usuario SET nome = :nome, email = :newEmail, senha = :senha");
        // $stmt->execute('nome' => $novoNome, 'novoEmail' => $novoEmail, 'senha' => password_hash($novaSenha));
        return $this->read($novoEmail);
    }

    // Método para deletar um usuário.
    public function delete($email){
        $stmt = $this->pdo->prepare("DELETE FROM usuario WHERE email = :email");
        return $stmt->execute(['email' => $email]);
    }

    public function list(){
        $stmt = $this->pdo->query("SELECT * FROM usuario");
        return $stmt->fetchAll(PDO::FETCH_CLASS, Usuario::class);
    }
   */

   // Método para fazer o login do usuário. Irá receber um email e uma senha que virão do formulário de login.
    public function login($email, $senha)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM usuario WHERE email = :email");
        $stmt->execute([':email' => $email]);
        $usuario = $stmt->fetchObject(Usuario::class);

        if ($usuario) {
            if (password_verify($senha, $usuario->getSenha())) {
                if (!isset($_SESSION)) {
                    session_start();
                    $_SESSION['id'] = $usuario->getId();
                    $_SESSION['nome'] = $usuario->getNome();
                    $_SESSION['email'] = $usuario->getEmail();
                    $_SESSION['telefone'] = $usuario->getTelefone();
                    header("Location: /../index.php");
                    exit;
                }
            } else{ //Falta arrumar
                $_SESSION['error'] = "Email incorreta!";
                header("Location: /../views/part_view_login.php");
                exit();
            }
        } else { //Falta arrumar
            $_SESSION['error'] = "Senha incorreta!";
            header("Location: /../views/part_view_login.php");
            exit();
        }
    }

    // Método para sair da sessão do usuário.
    public function sair()
    {
        session_start();
        session_unset(); // Remove todas as variáveis de sessão
        session_destroy(); // Destroi a sessão
        header("Location: /../views/part_view_login.php"); // Redireciona para a tela de login
        exit;
    }

    public function perfil()
    {
        header("Location: ./../views/part_view_perfil.php");
    }
}
