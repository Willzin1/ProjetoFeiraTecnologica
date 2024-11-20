<?php session_start(); ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'part_view_header.php'; ?>
    <title>SUSTENTA FOOD | Reserva</title>
    <style>
        .hidden { display: none; }
    </style>
</head>
<body>

    <?php include 'part_view_header_nav.php'; ?>
 
    <main id="content-reserva">
        <div class="container-reserva">
            <h1>Reserva de Mesa</h1>
            <form action="./../Controller/AppController.php?rota=ReservaCrudController&action=createReserva" method="POST" onsubmit="return validarReserva();">
                <div class="grupo-formulario-reserva">
                    <label for="data">Data:</label>
                    <input type="text" id="data" name="data" required>
                </div>
                
                <div class="grupo-formulario-reserva">
                    <label for="hora">Hora:</label>
                    <select id="hora" name="hora" required>
                        <option value="">Selecione a Hora</option>
                    </select>
                </div>
                
                <div class="grupo-formulario-reserva">
                    <label for="quantidade_cadeiras">Quantidade de Assentos:</label>
                    <select id="quantidade_cadeiras" name="quantidade_cadeiras" onchange="mostrarInputCustomizado()">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="mais">+ Mais</option>
                    </select>
                    <input type="number" id="custom_assentos" name="custom_assentos" class="hidden" placeholder="Quantidade personalizada" min="5">
                </div>
                
                <div class="button-container">
                    <button type="submit" id="button-reserva" class="shadow__btn" onclick="adicionarReserva()">Reservar</button>
                    <a href="../Controller/AppController.php?rota=UserCrudController.php&action=perfil">
                        <button type="button" id="button-reserva" class="shadow__btn"> Voltar ao perfil</button>
                    </a>
                </div>
            </form>
        </div>
    </main>

    <?php include 'part_view_footer.php'; ?>

</body>
</html>
