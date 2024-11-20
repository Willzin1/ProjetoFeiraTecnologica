<?php
    require_once __DIR__ . '/../../vendor/autoload.php';

    use App\persistence\DBConnection;
    use App\Controller\UserCrudController;
    use App\Controller\ReservaCrudController;

    $rota = $_REQUEST['rota'];
    $action = $_REQUEST['action'];
    $request_method = $_SERVER['REQUEST_METHOD'];

    // Conexão com o banco
    $conn = DBConnection::getInstance();

    // Criando o objeto do CRUD. Irá receber uma conexão como parâmetro.
    $usuarioCrudController = new UserCrudController($conn);
    $reservaCrudController = new ReservaCrudController($conn);

        /* PARTE DOS REDIRECIONAMENTOS */
    switch($action){
        case 'index': 
            header('Location: ./../../index.php');
            break;
        case 'reserva':
            header('Location: ./../views/part_view_reserva.php');
            break;
        case 'cardapio':
            header('Location: ./../views/part_view_cardapio.php');
            break;
        case 'tela-login': 
            header('Location: ./../views/part_view_login.php'); 
            break;   
        case 'tela-cadastro':
            header('Location: ./../views/part_view_cadastro.php');
            break;    
        case 'perfil':
            header('Location: ./../views/part_view_perfil.php');
            break;
            
        case 'sair':
            $usuarioCrudController->logout();
            break;

        default:
            header('Location: ./../../index.php');
            break;
    }
    
        /* PARTE DO PERFIL */
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
        
        if ($email === 'admin' && $senha === 'admin123'){
            header('Location: ./../views/part_view_gerente.php');
            exit();
        }

        $usuario = $usuarioCrudController->login($email, $senha);
    }

    if($action === 'update' && $request_method === 'POST'){
        $novoNome = $_POST['nome'];
        $novoTelefone = $_POST['telefone'];
        $email = $_POST['email'];

        $usuarioCrudController->update($novoNome, $novoTelefone, $email);
    }

    if($action === 'deletarPerfil'){
        $email = $_POST['email'];
        $usuarioCrudController->delete($email);
    }

        /* PARTE DAS RESERVAS */
    if($action === 'createReserva' && $request_method === 'POST'){
        $dataReserva = $_POST['data'];
        $horaReserva = $_POST['hora'];
        $pessoasReserva = $_POST['quantidade_cadeiras'];

        if($pessoasReserva === 'mais') $pessoasReserva = $_POST['custom_assentos'];

        $reservaCrudController->create($dataReserva, $horaReserva, $pessoasReserva);
    }

    if($action === 'deletarReserva' && $request_method === 'POST'){
        $id_usuario = $_POST['id'];
        $id_reserva = $_POST['id_reserva'];

        $reservaCrudController->delete($id_usuario, $id_reserva);
    }

    if($action === 'updateReserva' && $request_method === 'POST'){
        $id_usuario = $_POST['id'];
        $id_reserva = $_POST['id_reserva'];
        $novaData = $_POST['data'];
        $novaHora = $_POST['hora'];
        $novaPessoas = $_POST['quantidade_cadeiras'];

        if($novaPessoas === 'mais') $novaPessoas = $_POST['custom_assentos'];

        $reservaCrudController->update($id_usuario, $id_reserva, $novaData, $novaHora, $novaPessoas);
    }
?>        