<?php
    require_once __DIR__ . '/../../vendor/autoload.php';

    use App\persistence\DBConnection;
    use App\Controller\UserCrudController;
    use App\Controller\ReservaCrudController;

    $rota = $_REQUEST['rota'] ?? 'home';
    $action = $_REQUEST['action'] ?? 'index';
    $request_method = $_SERVER['REQUEST_METHOD'];

    // Conexão com o banco
    $conn = DBConnection::getInstance();

    // Criando o objeto do CRUD. Irá receber uma conexão como parâmetro.
    $usuarioCrudController = new UserCrudController($conn);
    $reservaCrudController = new ReservaCrudController($conn);
    
    if($action === 'index') header('Location: ./../index.php');
    if($action === 'reserva') header('Location: ./../views/part_view_reserva.php');
    if($action === 'cardapio') header('Location: ./../views/part_view_cardapio.php');
    if($action === 'tela-login') header('Location: ./../views/part_view_login.php');
    if($action === 'tela-cadastro') header('Location: ./../views/part_view_cadastro.php');
    if($action === 'perfil') header('Location: ./../views/part_view_perfil.php');
    
    if($action === 'create' && $request_method === 'POST'){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $senha = $_POST['senha'];
        
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

    /* PARTE DAS RESERVAS */

    if($action === 'createReserva' && $request_method === 'POST'){
        $dataReserva = $_POST['data'];
        $horaReserva = $_POST['hora'];
        $pessoasReserva = $_POST['quantidade_cadeiras'];

        $reservaCrudController->create($dataReserva, $horaReserva, $pessoasReserva);
    }
?>        