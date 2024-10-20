<?php
    require_once __DIR__ . '/../../vendor/autoload.php';

    use App\persistence\DBConnection;
    use App\Controller\UserCrudController;

    $rota = $_REQUEST['rota'] ?? 'home';
    $action = $_REQUEST['action'] ?? 'index';
    $request_method = $_SERVER['REQUEST_METHOD'];

    // Conexão com o banco
    $conn = DBConnection::getInstance();

    // Criando o objeto do CRUD. Irá receber uma conexão como parâmetro.
    $usuarioCrudController = new UserCrudController($conn);
    
    if($action === 'index') header('Location: ./../index.php');
    if($action === 'cardapio') header('Location: ./../views/part_view_cardapio.php');
    if($action === 'tela-login') header('Location: ./../views/part_view_login.php');
    if($action === 'tela-cadastro') header('Location: ./../views/part_view_cadastro.php');
    if($action === 'perfil') header('Location: ./../views/part_view_perfil.php');
    
    if($action === 'create' && $request_method === 'POST'){
        $nome = $_POST['nome'] ?? null;
        $email = $_POST['email'] ?? null;
        $telefone = $_POST['telefone'] ?? null;
        $senha = $_POST['senha'] ?? null;
        
        $usuarioCrudController->create($nome, $email, $telefone, $senha);
    }

    if($action === 'login' && $request_method === 'POST') {
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $usuario = $usuarioCrudController->login($email, $senha);
    }

    if($action === 'sair'){
        $usuarioCrudController->logout();
    }
?>        