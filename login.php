<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Jekyll v3.8.6">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" href="./css/login.css">

  <title>Login</title>
</head>
<body class="text-center">
  <form class="form-signin" method="post" action="verificaLogin.php">
    <h1 class="h3 mb-3 font-weight-normal">Login</h1>
    <?php if (isset($_GET['msg']) && $_GET['msg'] == "erro"): ?>
    <div class="alert alert-danger" role="alert">
      Ocorreu um erro no seu login!
    </div>
    <?php elseif (isset($_GET['msg']) && $_GET['msg'] == "incorreto"): ?>
    <div class="alert alert-warning" role="alert">
      A senha não corresponde com o e-mail informado.
    </div>
    <?php endif; ?>
    <label for="inputEmail" class="sr-only">E-mail</label>
    <input type="email" id="inputEmail" name="email" class="form-control" placeholder="E-mail" required autofocus>
    <label for="inputPassword" class="sr-only">Senha</label>
    <input type="password" id="inputPassword" name="senha" class="form-control" placeholder="Senha" required>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2019</p>
  </form>
</body>
</html>
