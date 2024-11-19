<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-Br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'part_view_header.php'; ?>
    <title>SUSTENTA FOOD | Gerenciamento de Reservas</title>
</head>
<body>
<?php include 'part_view_header_nav.php'; ?>
 <!--bnb -->

 <div class="containerGerente">
    <aside class="barra-lateral">
        <h2>Reservas</h2>
        <ul>
            <li><a href="#reservas-dia">Reservas do Dia</a></li>
            <li><a href="#reservas-futuras">Próximas Reservas</a></li>
            <li><a href="#alterar-menu">Editar menu</a></li>
        </ul>
    </aside>

    <main>
        <!--  Reservas do Dia -->
        <section id="reservas-dia">
            <h2>Reservas do Dia</h2>
            <div class="reservas-tabela">
                <?php if (empty($reservas['dia'])): ?>
                    <p>Não há reservas para hoje.</p>
                <?php else: ?>
                    <table>
                        <thead>
                            <tr>
                                <th>Data</th>
                                <th>Hora</th>
                                <th>Assentos</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($reservas['dia'] as $reserva): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($reserva['data']); ?></td>
                                    <td><?php echo htmlspecialchars($reserva['hora']); ?></td>
                                    <td><?php echo htmlspecialchars($reserva['quantidade_cadeiras']); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
        </section>

        <!-- Reservas Futuras -->
        <section id="reservas-futuras">
            <h2>Próximas Reservas</h2>
            <div class="reservas-tabela">
                <?php if (empty($reservas['futuras'])): ?>
                    <p>Não há reservas futuras.</p>
                <?php else: ?>
                    <table>
                        <thead>
                            <tr>
                                <th>Data</th>
                                <th>Hora</th>
                                <th>Assentos</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($reservas['futuras'] as $reserva): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($reserva['data']); ?></td>
                                    <td><?php echo htmlspecialchars($reserva['hora']); ?></td>
                                    <td><?php echo htmlspecialchars($reserva['quantidade_cadeiras']); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
        </section>

        <!--Alteração do Menu -->
        <section id="alterar-menu">
            <h2>Editar Menu</h2>
            <div class="alterar-menu">
                <p>Você pode editar o menu aqui.</p>
                <!-- Formulário ou interface para editar o menu -->
            </div>
        </section>
    </main>
 </div>
   <!-- COLOCAR PARA APARECER AS RESENHAS  -->

  <!-- FOOTER -->
  <?php include 'part_view_footer.php'; ?>


</body>
</html>
