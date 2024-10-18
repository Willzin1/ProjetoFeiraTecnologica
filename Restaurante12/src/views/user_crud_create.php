<!-- ALGO -->  
    <div class="container">
        <h1>Login</h1>
        <form action="./../Controller/AppController.php?" method="post">
            <input type="hidden" name="rota" value="UserCrudController">
            <input type="hidden" name="action" value="create">

            <div class="grupo-formulario">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required>
            </div>
            <div class="grupo-formulario">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="grupo-formulario">
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" required>
            </div>
            </div>
            <?php if (isset($erro)) { echo "<p style='color: red;'>$erro</p>"; } ?>
            <button type="submit" class="shadow__btn">Entrar</button>
        </form>

        <div class="linha-separacao">
            <p>Não tem uma conta? <a href="cadastro.php" class="link-cadastro">Cadastre-se</a></p>
        </div>
    </div>
<?php include "part_view_footer.php"; ?>
