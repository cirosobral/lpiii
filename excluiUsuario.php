<?php

require_once 'usuario.php';
require_once 'guard.php';

if (empty($_GET['id']))
  header('Location: listagem.php?msg=erroExclusao');

$usuario = Usuario::buscaPor('id', $_GET['id']);

$usuario->delete();

header('Location: index.php');
