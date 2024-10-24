<?php
// Antes de mostrar as reservas, certifique-se de que a sessão está iniciada
session_start();

if (!isset($_SESSION['nome']) || !isset($_SESSION['email']) || !isset($_SESSION['telefone'])) {
    header("Location: part_view_login.php");
    exit();
}

// Conectar ao banco de dados e instanciar o controlador de reservas
require_once __DIR__ . '/../../vendor/autoload.php';
use App\persistence\DBConnection;
use App\Controller\ReservaCrudController;

$conn = DBConnection::getInstance();
$reservaCrudController = new ReservaCrudController($conn);

// Obter as reservas do usuário
$id_usuario = $_SESSION['id']; // Supondo que você tenha o ID do usuário na sessão
$reservas = $reservaCrudController->read($id_usuario);
?>

<!DOCTYPE html>
<html lang="pt-Br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'part_view_header.php'; ?>
    <title>SUSTENTA FOOD | Perfil</title>
</head>

<body>
    <?php include 'part_view_header_nav.php'; ?>

    <!-- CONTEÚDO DO PERFIL -->
    <main id="container">
        <section id="profile">
            <h2 class="section-title">Meu Perfil</h2>
            <div class="profile-container">
                <div class="profile-picture">
                    <img src="./Assets/Imagens/avatar.png" alt="Foto do Usuário">
                </div>

                <div class="profile-info">
                    <h3><?= $_SESSION['nome']; ?></h3>
                    <p><strong>Email: </strong><?= $_SESSION['email']; ?></p> 
                    <p><strong>Telefone: </strong><?= $_SESSION['telefone'];?></p>
                    <p><strong>Localização:</strong> São Paulo, SP</p>
                    <!-- Botão para editar perfil -->
                    <button class="profile-button" id="edit-profile-btn" onclick="editarPerfil()">Editar Perfil</button>
                    <button type="button" class="profile-button" onclick="abrirModalDelete()">Deletar Perfil</button>

                    <a href="./../Controller/AppController.php?rota=UserCrudController&action=sair"><button class="profile-button">Sair</button></a>
                </div>
            </div>
        </section>

        <?php include_once 'part_view_modal.php'; ?>

        <!-- PARTE DAS RESERVAS -->
        <section id="minhasReservas">
            <h2 class="section-subtitle">Minhas Reservas</h2>
            <div class="reservations">
                <?php if (!empty($reservas)): ?>
                    <?php foreach ($reservas as $reserva): ?>
                        <article class="reservation">
                            <p><b>Data:</b> <?= date('d/m/Y', strtotime($reserva->getDataReserva())); ?></p>
                            <p><b>Hora:</b> <?= (new DateTime($reserva->getHoraReserva()))->format('H:i'); ?></p>
                            <p><b>Quantidade de Pessoas:</b> <?= $reserva->getNumeroPessoas(); ?></p>
                            <form action="./../Controller/AppController.php?rota=ReservaCrudController&action=deletarReserva" method="POST">
                                <input type="hidden" name="id" value="<?= $_SESSION['id'] ?>">
                                <input type="hidden" name="id_reserva" value="<?= $_SESSION['id_reserva'] = $reserva->getIdReserva() ?>">
                                <button type="submit" class="profile-button">Deletar Reserva</button>
                            </form> 
                        </article>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Nenhuma reserva encontrada.</p>
                <?php endif; ?>
            </div>
            <button class="btn-default" id="make-reservation"><a href="./../Controller/AppController.php?rota=reservaCrudController.php&action=reserva">Fazer Nova Reserva</a></button>
        </section>
    </main>

    <!-- FOOTER -->
    <?php include 'part_view_footer.php'; ?>
</body>
</html>