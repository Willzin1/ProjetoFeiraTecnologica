<?php
    require_once __DIR__ . '/../../vendor/autoload.php';

    use App\persistence\DBConnection;
    use App\Controller\UserCrudController;

    $rota = $_REQUEST['rota'] ?? 'home';
    $action = $_REQUEST['action'] ?? 'index';
    $request_method = $_SERVER['REQUEST_METHOD'];

    $conn = DBConnection::getInstance(); // Conexão com o banco
    $usuarioCrudController = new UserCrudController($conn);
    if ($action === "index"){
        $usuarioCrudController->index();
    }