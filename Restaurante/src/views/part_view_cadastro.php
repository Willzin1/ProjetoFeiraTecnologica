    <?php
    include 'part_view_header.php';
    include 'part_view_header_nav.php';

    ?>

    <div id="menu">
        <div class="login-container">
            <h1>Crie sua conta.</h1>
            <form action="./../Controller/AppController.php?rota=UserCrudController.php&action=create" method="post">
                <div class="grupo-formulario">
                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="nome" required>
                </div>
                <div class="grupo-formulario">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="grupo-formulario">
                    <label for="telefone">Telefone:</label>
                    <input type="tel" name="telefone" id="telefone" required>
                </div>
                <div class="grupo-formulario">
                    <label for="senha">Senha:</label>
                    <input type="password" id="senha" name="senha" required>
                </div>

                <button type="submit" class="shadow__btn">Cadastrar</button>
                <BR>
            </form>
            <div class="linha-separacao">
                <p>Já tem uma conta? <a href="../Controller/AppController.php?rota=UserCrudController.php&action=tela-login" class="link-login">Faça login</a></p>
            </div>
        </div>
    </div>

    <?php include 'part_view_footer.php'; ?>