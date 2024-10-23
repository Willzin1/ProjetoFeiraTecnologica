<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'part_view_header.php'; ?>
    <title>SUSTENTA FOOD | Reserva</title>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/pt.js"></script> <!-- Importa o idioma em português -->
    <script>
        let totalAssentos = 90;
        let reservas = [];
 
        document.addEventListener('DOMContentLoaded', function() {
            flatpickr("#data", {
                locale: "pt", // Define o idioma como português
                disable: [
                    function(date) {
                        return (date.getDay() === 1); // Desabilita segundas-feiras
                    }
                ],
                minDate: "today"
            });
 
            // Configura o campo de hora
            const horaInput = document.getElementById('hora');
            for (let h = 9; h <= 20; h++) { // Hora de 9h até 20h30
                for (let m = 0; m <= 30; m += 30) {
                    const timeOption = `${h}:${m.toString().padStart(2, '0')}`;
                    const option = document.createElement('option');
                    option.value = timeOption;
                    option.textContent = timeOption;
                    horaInput.appendChild(option);
                }
            }
        });
 
        function validarReserva() {
            const dataInput = document.getElementById('data').value;
            const horaInput = document.getElementById('hora').value;
            const quantidadeCadeirasInput = document.getElementById('quantidade_cadeiras').value;
 
            const reservasDataHora = reservas.filter(reserva => reserva.data === dataInput && reserva.hora === horaInput);
            const cadeirasOcupadas = reservasDataHora.reduce((total, reserva) => total + reserva.quantidade_cadeiras, 0);
 
            const quantidadeSolicitada = quantidadeCadeirasInput === 'mais' ? parseInt(document.getElementById('custom_assentos').value) : parseInt(quantidadeCadeirasInput);
 
            if (quantidadeSolicitada + cadeirasOcupadas > totalAssentos) {
                alert('Número total de assentos excede a disponibilidade.');
                return false;
            }
 
            return true;
        }
 
        function adicionarReserva() {
            const dataInput = document.getElementById('data').value;
            const horaInput = document.getElementById('hora').value;
            const quantidadeCadeirasInput = document.getElementById('quantidade_cadeiras').value;
 
            const quantidadeSolicitada = quantidadeCadeirasInput === 'mais' ? parseInt(document.getElementById('custom_assentos').value) : parseInt(quantidadeCadeirasInput);
 
            reservas.push({
                data: dataInput,
                hora: horaInput,
                quantidade_cadeiras: quantidadeSolicitada
            });
        }
 
        function mostrarInputCustomizado() {
            const quantidadeCadeirasSelect = document.getElementById('quantidade_cadeiras');
            const customInput = document.getElementById('custom_assentos');
 
            if (quantidadeCadeirasSelect.value === 'mais') {
                customInput.classList.remove('hidden');
            } else {
                customInput.classList.add('hidden');
                customInput.value = "";
            }
        }
    </script>
    <style>
        .hidden { display: none; }
    </style>
</head>
<body>
 
    <?php
    session_start();
    include 'part_view_header_nav.php';
    ?>
 
    <main id="content-reserva">
        <div class="container-reserva">
            <h1>Reserva de Mesa</h1>
            <form action="./../Controller/AppController.php?rota=ReservaCrudController&action=createReserva" method="POST" onsubmit="return validarReserva();">
                <div class="grupo-formulario-reserva">
                    <label for="data">Data:</label>
                    <input type="text" id="data" name="data" required>
                </div>
                <div class="ggrupo-formulario-reserva">
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
                        <option value="8">8</option>
                        <option value="mais">+ Mais</option>
                    </select>
                    <input type="number" id="custom_assentos" name="custom_assentos" class="hidden" placeholder="Quantidade personalizada" min="8">
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