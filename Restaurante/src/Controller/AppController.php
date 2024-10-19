<?php
    require_once __DIR__ . '/../../vendor/autoload.php';

    use App\persistence\DBConnection;
    use App\Controller\UserCrudController;

    $rota = $_REQUEST['rota'] ?? 'home';
    $action = $_REQUEST['action'] ?? 'index';
    $request_method = $_SERVER['REQUEST_METHOD'];

    $conn = DBConnection::getInstance(); // Conexão com o banco
    $usuarioCrudController = new UserCrudController($conn);
    
    if($action === 'index') $usuarioCrudController->index();

    if($action === 'cardapio') $usuarioCrudController->cardapio();

    if($action === 'create' && $request_method === 'POST'){
        $nome = $_POST['nome'] ?? null;
        $email = $_POST['email'] ?? null;
        $telefone = $_POST['telefone'] ?? null;
        $senha = $_POST['senha'] ?? null;
        
        $usuarioCrudController->create($nome, $email, $telefone, $senha);
    }

    if($action === 'tela-cadastro') $usuarioCrudController->cadastro();
    
    if($action === 'tela-login') $usuarioCrudController->login();

    if($action === 'perfil') $usuarioCrudController->perfil();
    
    
    if($action === 'logar' && $request_method === 'POST') {
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $usuario = $usuarioCrudController->logar($email, $senha);
        
    }

    if($action === 'sair'){
        $usuarioCrudController->sair();
    }
        