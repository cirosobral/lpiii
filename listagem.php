<?php

require_once 'usuario.php';
require_once 'guard.php';

// Se existir uma busca, a posição "q" da variável GET conterá algum valor
if (isset($_GET['q']))
  // Então, deve-se realizar a busca de uma lista com base nesse valor
  $usuarios = Usuario::buscaLista($_GET['q']);
else
  // Caso contrário, recupera uma lista com todos os usuários do banco de dados
  $usuarios = Usuario::lista();

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

  <title>Listagem de usuários<?php echo (isset($_GET['q']) ? ": '{$_GET['q']}'" : ''); ?></title>
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
      <h1>Olá, <?php echo $_SESSION['usuario']->nome; ?></h1>
      <h2>Lista de clientes</h2>
      <?php if (isset($_GET['msg']) && $_GET['msg'] == "erroExclusao"): ?>
      <div class="alert alert-danger" role="alert">
        Ocorreu um erro na exclusão do usuário
      </div>
    <?php elseif (isset($_GET['msg']) && $_GET['msg'] == "erroEdicao"): ?>
      <div class="alert alert-danger" role="alert">
        Ocorreu um erro na edição do usuário
      </div>
      <?php endif; ?>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Nome</th>
              <th>E-mail</th>
              <th>Nascimento</th>
              <th>Opções</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($usuarios as $usuario): ?>
            <tr>
              <td><?php echo $usuario->nome; ?></td>
              <td><?php echo $usuario->email; ?></td>
              <td><?php echo date("d/m/Y", strtotime($usuario->nascimento)); ?></td>
              <td>
                <div class="btn-group btn-group-sm" role="group">
                  <a href="editar.php?id=<?php echo $usuario->id; ?>" class="btn btn-warning">Editar</a>
                  <a href="excluiUsuario.php?id=<?php echo $usuario->id; ?>" class="btn btn-danger btn-excluir">Excluir</a>
                </div>
              </td>
            </tr>
          <?php endforeach; ?>
          </tbody>
        </table>
        <hr class="mb-4">
        <a href="adicionar.php" class="btn btn-primary btn-lg btn-block" type="submit">Adicionar cliente</a>
      </div>
    </main>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script type="text/javascript">
  $('.btn-excluir').click(function(e) {
    let c = confirm("Tem certeza que deseja excluir esse usuário?");
    if (!c)
      e.preventDefault();
  });
  </script>
</body>
</html>
