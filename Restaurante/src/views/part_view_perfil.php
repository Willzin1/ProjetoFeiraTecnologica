<?php
include 'part_view_header.php';
include 'part_view_header_nav.php';

if (!isset($_SESSION)){
    die("Você não está logado!" . "<a href=\"../Controller/AppController.php?rota=UserCrudController.php&action=tela-login\">Fazer login</a>");
}
?>

<main id="container">
    <section id="profile">
        <h2 class="section-title">Meu Perfil</h2>
        <div class="profile-container">
            <div class="profile-picture">
                <img src="./Assets/Imagens/avatar.png" alt="Foto do Usuário">
            </div>
            <div class="profile-info">
                <h3>Nome do Usuário</h3>
                <p><strong>Email:</strong> usuario@example.com</p>
                <p><strong>Telefone:</strong> (11) 94002-8922</p>
                <p><strong>Localização:</strong> São Paulo, SP</p>
                <button class="btn-default">
                    Editar Perfil
                </button>
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