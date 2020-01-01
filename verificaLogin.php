<?php

session_start();

require_once 'usuario.php';

if (!isset($_POST['email']) || !isset($_POST['senha']))
  header('Location: login.php?msg=erro');

$usuario = Usuario::buscaPor('email', $_POST['email']);

if ($usuario && $usuario->login($_POST['senha'])) {
  $_SESSION['usuario'] = $usuario;
  $pagina = "listagem.php";
} else {
  $pagina = "login.php?msg=incorreto";
}

header("Location: $pagina");
