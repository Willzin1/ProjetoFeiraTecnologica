<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sustenta_food";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

$sql_check = "SELECT * FROM usuarios WHERE email = '$email'";
$result = $conn->query($sql_check);

if ($result->num_rows > 0) {
    // Redirecionar com erro
    header("Location: cadastro.html?status=error");
} else {
    $sql = "INSERT INTO usuarios (nome, email, telefone, senha) VALUES ('$nome', '$email', '$telefone', '$senha')";

    if ($conn->query($sql) === TRUE) {
        // Redirecionar com sucesso
        header("Location: perfil.html?status=success");
    } else {
        // Redirecionar com erro
        header("Location: cadastro.html?status=error");
    }
}

$conn->close();
?>
