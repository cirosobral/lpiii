<?php

require_once 'usuario.php';
require_once 'guard.php';

if (empty($_POST))
  header('Location: adicionar.php?msg=erro');

// Cria um novo objeto da classe usuário
$usuario = new Usuario();

// Atribui os valores vindos do formulário ao objeto usuario
$usuario->nome = $_POST['nome'];
$usuario->email = $_POST['email'];
$usuario->nascimento = $_POST['nascimento'];

// Como o atributo senha é privado, deve ser acessado pelo método setSenha
$usuario->setSenha($_POST['senha']);

// Executa a operação no banco de dados
$usuario->salva();

header('Location: index.php');
