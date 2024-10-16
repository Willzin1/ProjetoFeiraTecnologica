<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva de Restaurante</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="./../CSS/estiloreserva.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        let totalAssentos = 90; 
        let reservas = []; 

        document.addEventListener('DOMContentLoaded', function() {
            flatpickr("#data", {
                disable: [
                    function(date) {
                        return (date.getDay() === 1); 
                    }
                ],
                minDate: "today" 
            });

            // Configura o campo de hora
            const horaInput = document.getElementById('hora');
            for (let h = 11; h <= 21; h++) {
                for (let m = 0; m < 60; m += 30) {
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

            if (parseInt(quantidadeCadeirasInput) + cadeirasOcupadas > totalAssentos) {
                alert('Número total de assentos excede a disponibilidade.');
                return false;
            }

            return true;
        }

        function adicionarReserva() {
            const dataInput = document.getElementById('data').value;
            const horaInput = document.getElementById('hora').value;
            const quantidadeCadeirasInput = document.getElementById('quantidade_cadeiras').value;

            reservas.push({
                data: dataInput,
                hora: horaInput,
                quantidade_cadeiras: parseInt(quantidadeCadeirasInput)
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
</head>
<body>
    <div class="container">
        <h1>Reserva de Mesa</h1>
        <form action="./../../reservar.php" method="POST" onsubmit="return validarReserva();">
            <div class="grupo-formulario">
                <label for="data">Data:</label>
                <input type="text" id="data" name="data" required>
            </div>
            <div class="grupo-formulario">
                <label for="hora">Hora:</label>
                <select id="hora" name="hora" required></select>
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
    </div>
</body>
</html>