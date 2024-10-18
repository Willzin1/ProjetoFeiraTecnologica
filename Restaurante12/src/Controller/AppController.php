<?php
    require_once __DIR__ . '/../../vendor/autoload.php';

    use App\persistence\DBConnection;
    use App\Controller\UserCrudController;

    $rota = $_REQUEST['rota'] ?? 'home';
    $action = $_REQUEST['action'] ?? 'index';
    $request_method = $_SERVER['REQUEST_METHOD'];

    $conn = DBConnection::getInstance(); // Conexão com o banco
    $usuarioCrudController = new UserCrudController($conn);
    
    if($action === 'index'){ 
        $usuarioCrudController->index();
    }else if($action === 'cardapio'){ 
        $usuarioCrudController->cardapio();
    }else if($action === 'create' && $request_method === 'POST'){
        $nome = $_POST['nome'] ?? null;
        $email = $_POST['email'] ?? null;
        $telefone = $_POST['telefone'] ?? null;
        $senha = $_POST['senha'] ?? null;
        
        $teste = $usuarioCrudController->create($nome, $email, $telefone, $senha);
    } else if($action === 'tela-cadastro'){
        $usuarioCrudController->cadastro();
    }else if($action === 'tela-login'){
        $usuarioCrudController->login();
    }
    
    
     else if($action === 'logar' && $request_method === 'POST') {
        $email = $_POST['email'] ?? null;
        $senha = $_POST['senha'] ?? null;
        $usuario = $usuarioCrudController->logar($email, $senha);
    
        var_dump($usuarioCrudController->getNome());
    }
        