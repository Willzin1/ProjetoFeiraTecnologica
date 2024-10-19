<?php
session_start();
session_unset(); // Remove todas as variáveis de sessão
session_destroy(); // Destroi a sessão
header("Location: part_view_login.php"); // Redireciona para a tela de login
exit;
