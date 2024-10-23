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
    <title>SUSTENTA FOOD | Reserva</title>
</head>
<body>
    
    <main id="content-reserva">
        <div class="container">
            <h1>Reserva de Mesa</h1>
            <form action="./../Controller/AppController.php?rota=ReservaCrudController&action=createReserva" method="POST" onsubmit="return validarReserva();">
                <div class="grupo-formulario">
                    <label for="data">Data:</label>
                    <input type="date" id="data" name="data" required>
                </div>
                <div class="grupo-formulario">
                    <label for="hora">Hora:</label>
                    <select id="hora" name="hora" required>
                        <option value="12:00">12:00</option>
                    </select>
                </div>
                <div class="grupo-formulario">
                    <label for="quantidade_cadeiras">Quantidade de Assentos:</label>
                    <select id="quantidade_cadeiras" name="quantidade_cadeiras" onchange="mostrarInputCustomizado()">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="8">8</option>
                        <option value="mais">+ Mais</option>
                    </select>
                    <input type="number" id="custom_assentos" name="custom_assentos" class="hidden" placeholder="Quantidade personalizada" min="1">
                </div>
                <button type="submit" class="shadow__btn" onclick="adicionarReserva()">Reservar</button>
            </form>
            <a href="../Controller/AppController.php?rota=UserCrudController.php&action=perfil"><button type="submit" class="shadow__btn">Voltar para perfil</button></a>
        </div>
    </main>
    
</body>
</html>