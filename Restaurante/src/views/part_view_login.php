<?php 
session_start();
include 'part_view_header.php';
include 'part_view_header_nav.php';

?>

<main>
    <div id="menu">
        <div class="login-container">
            <h1>Faça seu login.</h1>
            
            <form action="./../Controller/AppController.php?rota=UserCrudController.php&action=login" method="POST">
                <div class="grupo-formulario">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="grupo-formulario">
                    <label for="senha">Senha:</label>
                    <input type="password" id="senha" name="senha" required>
                </div>
<!--FALTA CRIAR EU(will) A PARTE CASO O USUÁRIO INSIRA UM EMAIL/SENHA INEXISTENTE OU INCORRETA-->
                <button type="submit" class="shadow__btn">Entrar</button>

            </form>

            <div class="linha-separacao">
                <p>Ainda não tem uma conta? <a href="../Controller/AppController.php?rota=UserCrudController.php&action=tela-cadastro" class="link-login">Cadastre-se</a></p>
            </div>
        </div>
    </div>
</main>

<?php include 'part_view_footer.php'; ?>