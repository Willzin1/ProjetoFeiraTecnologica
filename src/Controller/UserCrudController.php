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
        $usuExiste = $this->read($email);
        session_start();
        // Condição para se caso o email já existir. Chamo o método e passo o parâmetro do email que foi inserido no formulário.
        if ($usuExiste) {
            $_SESSION['error'] = "E-mail já cadastrado, tente novamente!"; 
            header("Location: ./../../src/views/part_view_cadastro.php");
            exit();
        }

        $hash = password_hash($senha, PASSWORD_DEFAULT);
        $stmt = $this->pdo->prepare("INSERT INTO usuario (nome, email, telefone, senha) values (:nome, :email, :telefone, :senha)");
        if ($stmt->execute(['nome' => $nome, 'email' => $email, 'telefone' => $telefone, 'senha' => $hash])) {
            header("Location: ./../../src/views/part_view_login.php");
            exit();
        }
    }

    // Busca um usuário do banco de dados com base no email fornecido.
    public function read($email)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM usuario WHERE email = :email");
        $stmt->execute(['email' => $email]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, Usuario::class);
        return $stmt->fetch();
    }
    
    // Método para fazer o update do usuário.
    public function update($novoNome, $novoTelefone, $email){
        $usuExiste = $this->read($email);
        session_start();

        if($usuExiste){
        $stmt = $this->pdo->prepare("UPDATE usuario SET nome = :novoNome, telefone = :novoTelefone WHERE email = :email");
        $stmt->execute(['novoNome' => $novoNome, 'novoTelefone' => $novoTelefone, 'email' => $email]);

        $_SESSION['nome'] = $novoNome;
        $_SESSION['telefone'] = $novoTelefone;

        header("Location: ./../../src/views/part_view_perfil.php");
        exit();
        }
    }
    
    // Método para deletar um usuário.
    public function delete($email){
        $usuExiste = $this->read($email);
        session_start();
        
        if($usuExiste){
        $stmt = $this->pdo->prepare("DELETE FROM usuario WHERE email = :email");
            if($stmt->execute(['email' => $email])){
                session_unset(); // Remove todas as variáveis de sessão
                session_destroy(); // Destroi a sessão
                header("Location: ./../../src/views/part_view_cadastro.php");
                exit();
            }
        }
    }

    // Método para fazer o login do usuário. Irá receber um email e uma senha que virão do formulário de login.
    public function login($email, $senha)
    {
        $usuario = $this->read($email);
        session_start();

        // Condição para verificar se o email existe no banco de dados.
        if ($usuario) {
            // Condição para verificar se a senha existe no banco de dados.
            if (password_verify($senha, $usuario->getSenha())) {
                $_SESSION['id'] = $usuario->getId();
                $_SESSION['nome'] = $usuario->getNome();
                $_SESSION['email'] = $usuario->getEmail();
                $_SESSION['telefone'] = $usuario->getTelefone();
                unset($__SESSION['error']);
                header("Location: ./../../src/views/part_view_perfil.php");
                exit();
            } else { // Condição para caso a senha não exista.
                $_SESSION['error'] = "E-mail ou Senha incorretos!";
                header("Location: ./../../src/views/part_view_login.php");
                exit();
            }
        } else { // Condição para caso o email não exista.
            $_SESSION['error'] = "E-mail ou Senha incorretos!";
            header("Location: ./../../src/views/part_view_login.php");
            exit();
        }
    }

    // Método para sair da sessão do usuário.
    public function logout()
    {
        session_start();
        session_unset(); // Remove todas as variáveis de sessão
        session_destroy(); // Destroi a sessão
        header("Location: ./../../src/views/part_view_login.php"); // Redireciona para a tela de login
        exit();
    }

}