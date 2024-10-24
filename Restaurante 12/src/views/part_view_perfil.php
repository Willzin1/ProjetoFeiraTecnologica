<?php
session_start();

if (!isset($_SESSION['nome']) || !isset($_SESSION['email']) || !isset($_SESSION['telefone'])) {
    header("Location: part_view_login.php");
    exit();
}
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
                    <?= "<h3>" . $_SESSION['nome'] . "</h3>"; ?>
                    <?= "<p><strong>Email: </strong>" . $_SESSION['email'] . "</p>" ?>
                    <?= "<p><strong>Telefone: </strong>" . $_SESSION['telefone'] . "</p>" ?>
                    <p><strong>Localização:</strong> São Paulo, SP</p>
                    <!-- Botão para editar perfil -->
                    <button class="profile-button" id="edit-profile-btn" onclick="editarPerfil()">Editar Perfil</button>
                    <a href="./../Controller/AppController.php?rota=UserCrudController&action=deletar"><button class="profile-button" id="edit-profile-btn" >Deletar Perfil</button></a>

                    <a href="./../Controller/AppController.php?rota=UserCrudController&action=sair"><button class="profile-button">Sair</button></a>
                </div>
            </div>
        </section>

        <!-- Formulário para editar perfil -->
        
        <!-- Modal Overlay -->
        <div class="modal-overlay" id="modalOverlay"></div>
        <!-- Modal com o formulário de edição -->
        <div class="modal" id="modalEditarPerfil">
            <button class="close-btn" onclick="fecharModal()">X</button>
            <h3>Editar Perfil</h3>
            <form action="./../Controller/AppController.php?rota=UserCrudController&action=update" method="POST">
                <input type="hidden" name="email" value="<?= $_SESSION['email'] ?>">
                <div class="grupo-formulario">
                    <label for="nome">Novo nome:</label>
                    <input type="text" id="nome" name="nome"  value="<?= $_SESSION['nome'] ?>" required>
                </div>

                <div class="grupo-formulario">
                    <label for="telefone">Novo telefone:</label>
                    <input type="tel" id="telefone" name="telefone" value="<?= $_SESSION['telefone'] ?>" required>
                </div>
                <button type="submit" class="profile-button">Salvar Alterações</button>
            </form>
        </div>

        <!-- PARTE DAS RESERVAS -->
        <section id="minhasReservas">
            <h2 class="section-subtitle">Minhas Reservas</h2>
            <div class="reservations">
                <article class="reservation">
                    <p><b>Data:</b> 20/10/2024</p>
                    <p><b>Hora:</b> 19:00</p>
                    <p><b>Quantidade de Pessoas:</b> 4</p>
                    <button class="profile-button" id="cancelarReserva">Cancelar Reserva</button>
                </article>

                <article class="reservation">
                    <p><b>Data:</b> 25/10/2024</p>
                    <p><b>Hora:</b> 20:00</p>
                    <p><b>Quantidade de Pessoas:</b> 2</p>
                    <button class="profile-button" id="cancelarReserva">Cancelar Reserva</button>
                </article>
            </div>
            <button class="btn-default" id="make-reservation"><a href="./../Controller/AppController.php?rota=reservaCrudController.php&action=reserva">Fazer Nova Reserva</a></button>
        </section>
    </main>

    <!-- FOOTER -->
    <?php include 'part_view_footer.php'; ?>
</body>
</html>