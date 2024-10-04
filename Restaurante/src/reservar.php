<?php 

require __DIR__ . "/../vendor/autoload.php";
use App\persistence\ConnectionFactory;

$conn = ConnectionFactory::getConnection();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Captura os dados enviados pelo formulário
    $data = $_POST['data'];
    $hora = $_POST['hora'];
    $quantidade_cadeiras = $_POST['quantidade_cadeiras'];

    // Verifica se a opção "mais" foi selecionada
    if ($quantidade_cadeiras == "mais") {
        $quantidade_cadeiras = isset($_POST['custom_assentos']) ? intval($_POST['custom_assentos']) : 0;
    }

    // Prepara a consulta SQL
    $stmt = $conn->prepare("INSERT INTO reservas_restaurante (data, hora, quantidade_cadeiras) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $data, $hora, $quantidade_cadeiras); // 'ssi' para string, string, integer

    // Executa a consulta
    if ($stmt->execute()) {
        
        header("Location: /view/pages/confirmacao.php");
        exit();
    } else {
        echo "Erro: " . $stmt->error;
    }

    $stmt->close();
} else {
   
    header("Location: ./view/pages/reserva.php");
    exit();
}

$conn->close();
?>