<?php include 'part_view_header.php';
      include 'part_view_header_nav.php';
?>

<form action="./../Controller/AppController.php?rota=UserCrudController.php&action=create" method="POST">
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
                <input type="text" id="telefone" name="telefone" required>
            </div>
            <div class="grupo-formulario">
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" required>
            </div>
            <button type="submit" class="shadow__btn">Cadastrar</button>
</form>

<?php include 'part_view_footer.php'; ?>