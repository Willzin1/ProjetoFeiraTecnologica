<?php include 'part_view_header.php';
      include 'part_view_header_nav.php';
?>

<form action="./../Controller/AppController.php?rota=UserCrudController.php&action=login" method="POST">
            <div class="grupo-formulario">
                <label for="nome">Email:</label>
                <input type="text" id="email" name="email" required>
            </div>
            <div class="grupo-formulario">
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" required>
            </div>
            <button type="submit" class="shadow__btn">Entrar</button>
</form>

<?php include 'part_view_footer.php'; ?>