<!-- Formulário para editar perfil -->
        
        <!-- Modal Overlay -->
        <div class="modal-overlay" id="modalOverlay"></div>
        <!-- Modal com o formulário de edição -->
        <div class="modal" id="modalEditarPerfil">
            <button class="close-btn" onclick="fecharModal()">X</button>
            <h3>Editar Perfil</h3>
            <form action="./../Controller/AppController.php?rota=UserCrudController&action=update" method="POST">
                <input type="hidden" name="email" value="<?= $_SESSION['email'] ?>">
                <div class="grupo-formulario">
                    <label for="nome">Novo nome:</label>
                    <input type="text" id="nome" name="nome"  value="<?= $_SESSION['nome'] ?>" required>
                </div>

                <div class="grupo-formulario">
                    <label for="telefone">Novo telefone:</label>
                    <input type="tel" id="telefone" name="telefone" value="<?= $_SESSION['telefone'] ?>" required>
                </div>
                <button type="submit" class="profile-button">Salvar Alterações</button>
            </form>
        </div>

        <div id="deleteModal" class="modal">
            <div class="modal-content">
                <h3>Confirmar Exclusão</h3>
                <p>Tem certeza de que deseja deletar seu perfil? Essa ação não pode ser desfeita.</p>
                <form action="./../Controller/AppController.php?rota=UserCrudController&action=deletarReserva" method="POST">
                        <input type="hidden" name="email" value="<?= $_SESSION['email'] ?>">
                        <button type="submit" class="profile-button">Deletar Perfil</button>
                </form> 
                <button type="button" class="profile-button" onclick="fecharModalDelete()">Cancelar</button>
            </div>
        </div>
