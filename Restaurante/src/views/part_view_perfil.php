<?php
session_start();
if (!isset($_SESSION['nome']) || !isset($_SESSION['email']) || !isset($_SESSION['telefone'])) {
    header("Location: part_view_login.php");
    exit();
}else{
    $usuNome = $_SESSION['nome'];
    $usuEmail = $_SESSION['email'];
    $usuTelefone = $_SESSION['telefone'];
}

include 'part_view_header.php';
include 'part_view_header_nav.php';
?>

<main id="container">
    <section id="profile">
        <h2 class="section-title">Meu Perfil</h2>
        <div class="profile-container">
            <div class="profile-picture">
                <img src="./Assets/Imagens/avatar.png" alt="Foto do Usuário">
            </div>
            <div class="profile-info">
                <?php echo"<h3>$usuNome</h3>" ?>
                <?php echo"<p><strong>Email:</strong> $usuEmail</p>"?>
                <?php echo"<p><strong>Telefone:</strong> $usuTelefone</p>"?>
                <p><strong>Localização:</strong> São Paulo, SP</p>
                <button class="btn-default">
                    Editar Perfil
                </button>

                <a href="./../Controller/AppController.php?rota=UserCrudController&action=sair"> <button class="btn-default">Sair</button></a>
            </div>
        </div>
    </section>

    <section id="minhasReservas">
        <h2 class="section-subtitle">Minhas Reservas</h2>
        <div class="reservations">
            <article class="reservation">
                <p><b>Data:</b> 20/10/2024</p>
                <p><b>Hora:</b> 19:00</p>
                <p><b>Quantidade de Pessoas:</b> 4</p>
                <button class="btn-default" id="cancelarReserva">Cancelar Reserva</button>
            </article>
            <article class="reservation">
                <p><b>Data:</b> 25/10/2024</p>
                <p><b>Hora:</b> 20:00</p>
                <p><b>Quantidade de Pessoas:</b> 2</p>
                <button class="btn-default" id="cancelarReserva">Cancelar Reserva</button>
            </article>
        </div>
        <button class="btn-default" id="make-reservation">Fazer Nova Reserva</button>
    </section>
</main>

<?php
include 'part_view_footer.php';
?>