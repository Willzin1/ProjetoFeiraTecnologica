<!-- Modal Overlay -->
<div class="modal-overlay" id="modalOverlay"></div>

<!-- Modal com o formulário de edição de perfil -->
<div class="modal" id="modalEditarPerfil">
    <button class="close-btn" onclick="fecharModal()">X</button>
    <h3>Editar Perfil</h3>
    <form action="./../Controller/AppController.php?rota=UserCrudController&action=update" method="POST">
        <input type="hidden" name="email" value="<?= $_SESSION['email'] ?>">
        <div class="grupo-formulario">
            <label for="nome">Novo nome:</label>
            <input type="text" id="nome" name="nome" value="<?= $_SESSION['nome'] ?>" required>
        </div>

        <div class="grupo-formulario">
            <label for="telefone">Novo telefone:</label>
            <input type="tel" id="telefone" name="telefone" value="<?= $_SESSION['telefone'] ?>" required>
        </div>
        <button type="submit" class="profile-button">Salvar Alterações</button>
    </form>
</div>

<!-- Modal com o formulário de exclusão de perfil -->
<div id="deleteModal" class="modal">
    <div class="modal-content">
    <button class="close-btn" onclick="fecharModalDelete()">X</button>
        <h3>Confirmar Exclusão</h3>
        <p>
            Você está prestes a excluir sua conta e todas as reservas. 
            Tem certeza de que deseja prosseguir? Essa ação não pode ser desfeita.
        </p>
        <form action="./../Controller/AppController.php?rota=UserCrudController&action=deletarPerfil" method="POST">
            <input type="hidden" name="email" value="<?= $_SESSION['email'] ?>">
            <button type="submit" class="profile-button btn-red">Deletar Perfil</button>
        </form>
        <button type="button" class="profile-button" onclick="fecharModalDelete()">Cancelar</button>
    </div>
</div>

<!-- Modal com o formulário de alteração de reserva -->
<div class="modal" id="modalEditarReserva">
    <button class="close-btn" onclick="fecharModalReservas()">X</button>
    <h3>Editar Reserva</h3>
    <form action="./../Controller/AppController.php?rota=ReservaCrudController&action=updateReserva" method="POST">
        <input type="hidden" name="id" value="<?= $_SESSION['id'] ?>">
        <input type="hidden" name="id_reserva" value="<?= $_SESSION['id_reserva'] ?>">

        <div class="grupo-formulario-reserva">
            <label for="data">Data:</label>
            <input type="text" id="data" name="data" required>
        </div>
        <div class="grupo-formulario-reserva">
            <label for="hora">Hora:</label>
            <select id="hora" name="hora" required>
                <option value="">Selecione a Hora</option>
                <!-- Adicionar opções de horas disponíveis -->
            </select>
        </div>
        <div class="grupo-formulario-reserva">
            <label for="quantidade_cadeiras">Quantidade de Assentos:</label>
            <select id="quantidade_cadeiras" name="quantidade_cadeiras" onchange="mostrarInputCustomizado()">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="mais">+ Mais</option>
            </select>
            <input type="number" id="custom_assentos" name="custom_assentos" class="hidden" placeholder="Quantidade personalizada" min="5">
        </div>
        <button type="submit" class="profile-button">Salvar Alterações</button>
    </form>
</div>
