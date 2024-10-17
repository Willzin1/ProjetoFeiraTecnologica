<?php
session_start();  // Iniciar sessão para armazenar dados do usuário logado

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sustenta_food";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

$email = $_POST['email'];
$senha = $_POST['senha'];

// Verificar se o email existe no banco de dados
$sql = "SELECT * FROM usuarios WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Email encontrado, agora verificar a senha
    $usuario = $result->fetch_assoc();
    if (password_verify($senha, $usuario['senha'])) {
        // Senha correta, iniciar sessão para o usuário
        $_SESSION['usuario_id'] = $usuario['id'];  // Armazena o ID do usuário na sessão
        $_SESSION['usuario_nome'] = $usuario['nome'];  // Armazena o nome do usuário na sessão
        
        // Redirecionar para a página do perfil ou dashboard
        header("Location: perfil.php");
        exit();
    } else {
        // Senha incorreta
        header("Location: login.html?status=error");
        exit();
    }
} else {
    // Email não encontrado
    header("Location: login.html?status=error");
    exit();
}

$conn->close();
?>
