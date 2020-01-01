<?php

require_once 'usuario.php';
require_once 'guard.php';

?>
<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" href="./css/master.css">

  <title>Adicionar usuário</title>
</head>
<body>
  <div class="container">
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand d-none d-md-block col-md-2 mr-0" href="index.php">Registro de clientes</a>
      <form class="col w-100" action="listagem.php" method="get">
        <input class="form-control form-control-dark w-100" type="text" placeholder="Busca" name="q" aria-label="Search">
      </form>
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="logout.php">Sair</a>
        </li>
      </ul>
    </nav>
    <main>
      <a class="btn btn-secondary float-right" href="listagem.php">Voltar</a>
      <h4 class="mb-3">Adicionar cliente</h4>
      <?php if (isset($_GET['msg']) && $_GET['msg'] == "erro"): ?>
      <div class="alert alert-danger" role="alert">
        Ocorreu um erro na adição do usuário
      </div>
      <?php endif; ?>
      <form method="post" action="adicionaUsuario.php">

        <div class="mb-3">
          <label for="nome">Nome</label>
          <input type="text" class="form-control" name="nome" id="nome" required>
        </div>

        <div class="mb-3">
          <label for="email">E-mail</label>
          <input type="email" class="form-control" name="email" id="email" required>
        </div>

        <div class="row">

          <div class="col-md-6 mb-3">
            <label for="nascimento">Nascimento</label>
            <input type="date" class="form-control" name="nascimento" id="nascimento" required>
          </div>

          <div class="col-md-6 mb-3">
            <label for="senha">Senha</label>
            <input type="password" class="form-control" name="senha" id="senha" required>
          </div>

        </div>

        <hr class="mb-4">
        <button class="btn btn-primary btn-lg btn-block" type="submit">Inserir cliente</button>

      </form>

    </main>
  </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
