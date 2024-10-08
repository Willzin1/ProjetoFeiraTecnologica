<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./../CSS/estilos.css">
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        <form action="./../../index.php" method="post">
            <div class="grupo-formulario">
                <label for="email-login">Email:</label>
                <input type="email" id="email-login" name="email" required>
            </div>
            <div class="grupo-formulario">
                <label for="senha-login">Senha:</label>
                <input type="password" id="senha-login" name="senha" required>
            </div>
            <?php if (isset($erro)) { echo "<p style='color: red;'>$erro</p>"; } ?>
            <button type="submit" class="shadow__btn">Entrar</button>
        </form>

        <div class="linha-separacao">
            <p>Não tem uma conta? <a href="cadastro.php" class="link-cadastro">Cadastre-se</a></p>
        </div>
    </div>
</body>
</html>
