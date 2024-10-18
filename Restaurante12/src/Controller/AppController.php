<?php
    require_once __DIR__ . '/../../vendor/autoload.php';

    use App\persistence\ConnectionFactory;
    use App\Controller\UserCrudController;

    $rota = $_REQUEST['rota'] ?? 'home';
    $action = $_REQUEST['action'] ?? 'index';
    $request_method = $_SERVER['REQUEST_METHOD'];

    $conn = ConnectionFactory::getConnection(); // Conexão com o banco
    $usuarioCrudController = new UserCrudController($conn);
    
    if($action === 'index'){ 
        $usuarioCrudController->index();
    }
    if($action === 'cardapio'){ 
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