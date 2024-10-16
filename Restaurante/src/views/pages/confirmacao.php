<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmação de Reserva</title>
    <link rel="stylesheet" href="./../CSS/estiloreserva.css"> 
</head>
<body>
    <div class="container">
        <h1>Confirmação de Reserva</h1>
        <p><strong>Data:</strong> <?php echo htmlspecialchars($_GET['data']); ?></p>
        <p><strong>Hora:</strong> <?php echo htmlspecialchars($_GET['hora']); ?></p>
        <p><strong>Quantidade de Assentos:</strong> <?php echo htmlspecialchars($_GET['quantidade_cadeiras']); ?></p>

        <a href="reserva.php" class="shadow__btn">Editar Reserva</a>
    </div>
</body>
</html>