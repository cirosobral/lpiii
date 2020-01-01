<?php

session_start();

if (!isset($_SESSION['usuario']))
  $pagina = "login.php";
else
  $pagina = "listagem.php";

header("Location: $pagina");
