<!-- Onde irá ficar a NAVBAR -->  
<header>
    <nav id="navbar">
        <a href="../Controller/AppController.php?rota=UserCrudController.php&action=index"><i class="fa-solid fa-leaf" id="nav_logo"><br>SUSTENTA<BR>FOOD</i></a>

        <ul id="nav_list">
            <li class="nav-item active">
                <a href="../Controller/AppController.php?rota=UserCrudController.php&action=index">Início</a>
            </li>
            <li class="nav-item">
                <a href="../Controller/AppController.php?rota=UserCrudController.php&action=cardapio">Cardápio</a>
            </li>
            <li class="nav-item">
                <a href="#testimonials">Avaliações</a>
            </li>
            <li class="nav-item">
                <a href="../Controller/AppController.php?rota=UserCrudController.php&action=perfil">Perfil</a>
            </li>
        </ul>

        <button class="btn-default">
            Faça sua reserva aqui
        </button>

        <button id="mobile_btn">
            <i class="fa-solid fa-bars"></i>
        </button>
    </nav>

    <div id="mobile_menu">
        <ul id="mobile_nav_list">
            <li class="nav-item">
                <a href="../Controller/AppController.php?rota=UserCrudController.php&action=index">Início</a>
            </li>
            <li class="nav-item">
                <a href="../Controller/AppController.php?rota=UserCrudController.php&action=cardapio">Cardápio</a>
            </li>
            <li class="nav-item">
                <a href="#testimonials">Avaliações</a>
            </li>
            <li class="nav-item">
                <a href="../Controller/AppController.php?rota=UserCrudController.php&action=perfil">Perfil</a>
            </li>
        </ul>
    <!-- ESSE BOTÃO FICA NO MODO "MOBILE" -->
        <button class="btn-default"> 
            RESERVA
        </button>
    </div>
</header>    