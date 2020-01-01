<?php

require_once 'usuario.php';
require_once 'guard.php';

// Caso não tenha sido informado o ID por GET, retorna a listagem indicando erro
// na edição do usuário
if (empty($_GET['id']))
  header('Location: listagem.php?msg=erroEdicao');

// Recupera o usuário com base no ID passado por GET
$usuario = Usuario::buscaPor('id', $_GET['id']);

// Caso não exista o usuário, retorna para a listagem com uma mensagem de erro
if (!$usuario)
  header('Location: listagem.php?msg=erroEdicao');

// Atualiza os valores no objeto usuario
$usuario->nome = $_POST['nome'];
$usuario->email = $_POST['email'];
$usuario->nascimento = $_POST['nascimento'];

// Caso alguma senha tenha sido informada no campo "senha" do formulário
if (!empty($_POST['senha']))
  // Como o atributo senha é privado, deve ser acessado pelo método setSenha
  $usuario->setSenha($_POST['senha']);

// Faz a atualização
$usuario->salva();

// Retorna à página inicial
header('Location: index.php');
