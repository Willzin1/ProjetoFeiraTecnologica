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