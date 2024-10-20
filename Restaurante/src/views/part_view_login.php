<!DOCTYPE html>
<html lang="pt-Br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SUSTENTA FOOD | Faça Login</title>
    <?php include 'part_view_header.php'; ?>
</head>

<body>

    <?php
    session_start();
    include 'part_view_header_nav.php';
    ?>
    <main>
        <div id="menu">
            <div class="login-container">
                <h1>Faça seu login.</h1>

                <!-- Lógica para caso o email ou senha não exista ou esteja incorreta -->
                <?php if (isset($_SESSION['error'])): ?>
                    <p class="msg-erro"><?php echo $_SESSION['error'];
                                        unset($_SESSION['error']); ?></p>
                <?php endif; ?>

                <form action="./../Controller/AppController.php?rota=UserCrudController.php&action=login" method="POST">
                    <div class="grupo-formulario">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required>
                    </div>

                    <div class="grupo-formulario">
                        <label for="senha">Senha:</label>
                        <input type="password" id="senha" name="senha" required>
                    </div>
                    <button type="submit" class="shadow__btn">Entrar</button>
                </form>

                <div class="linha-separacao">
                    <p>Ainda não tem uma conta? <a href="../Controller/AppController.php?rota=UserCrudController.php&action=tela-cadastro" class="link-login"><br>Cadastre-se</a></p>
                </div>
            </div>
        </div>
    </main>

    <?php include 'part_view_footer.php'; ?>

</body>

</html>