<?php

    require __DIR__ . "/../vendor/autoload.php";
    use App\persistence\ConnectionFactory;

    try {
        // Conectar ao banco de dados
        $conn = ConnectionFactory::getConnection();  // Usando o método criado para fazer a conexão
        
        // Verificar conexão
        if ($conn->connect_errno) {
            throw new Exception("Falha ao conectar: (" . $conn->connect_errno . ") " . $conn->connect_error);
        }
        
        // Receber os dados do formulário
        $nome = $conn->real_escape_string($_POST['nome']);
        $email = $conn->real_escape_string($_POST['email']);
        $telefone = $conn->real_escape_string($_POST['telefone']);
        $senha1 = $_POST['senha'];
        $senha2 = $_POST['confirmar'];

        // Verificar se as senhas são iguais
        if ($senha1 !== $senha2) {
            throw new Exception("As senhas não coincidem.");
        }

        // Inserir dados no banco de dados
        $sql = "INSERT INTO usuarios (nome, email, telefone, senha) VALUES ('$nome', '$email', '$telefone', '$senha1')";
        
        if ($conn->query($sql) === TRUE) {
            echo "Cadastro realizado com sucesso!";
        } else {
            throw new Exception("Erro ao cadastrar: " . $conn->error);
        }

    } catch (Exception $e) {
        echo "DEU RUIM: " . $e->getMessage();
    } finally {
        // Fechar a conexão
        if (isset($conn) && $conn) {
            $conn->close();
        }
    }
?>
