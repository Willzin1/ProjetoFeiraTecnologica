<?php
    require __DIR__ . "/../vendor/autoload.php";
    use App\persistence\ConnectionFactory;

    $conn = ConnectionFactory::getConnection();

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Prepara a consulta SQL para verificar as credenciais
    $stmt = $conn->prepare("SELECT id FROM usuarios WHERE email = ? AND senha = ?");
    $stmt->bind_param("ss", $email, $senha); // 'ss' para string, string
    $stmt->execute();
    $stmt->store_result();

    // Verifica se as credenciais estão corretas
    if ($stmt->num_rows > 0) {
        // Armazena o ID do usuário na sessão
        $stmt->bind_result($usuario_id);
        $stmt->fetch();
        $_SESSION['usuario_id'] = $usuario_id;

        // Redireciona para o painel do usuário
        header("Location: ./view/pages/usuario.php");
        exit();
    } else {
        $erro = "Email ou senha incorretos.";
    }

    $stmt->close();
}

$conn->close();
?>
