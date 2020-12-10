<?php
if (session_status() !== PHP_SESSION_ACTIVE) { //Verificar se a sessão não já está aberta.
  session_start();
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <title>My Whatsapp</title>
  <meta property='og:title' content='Alan Martines' />
  <meta charset="utf-8" />
  <meta name='content-language' content='pt-br' />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <link rel="icon" href="../images/whatsapp-bot.png" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!--- --------------------------------------------------------------------------------------------------------------------------- --->
  <meta name="description" content="Alan Martines" />
  <meta name="author" content="Alan Martines" />
  <meta name="keywords" content="Alan Martines" />
  <meta name="robots" content="noindex, nofollow" />
  <!--- --------------------------------------------------------------------------------------------------------------------------- --->
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="../packages/page/css/style.css" />
  <link rel="stylesheet" type="text/css" href="../packages/bootstrap/css/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="../packages/fontawesome-free/css/all.min.css" />
  <link rel="stylesheet" type="text/css" href="../packages/passtrength/css/passtrength.css" />
  <link rel="stylesheet" type="text/css" href="../packages/datatables/css/dataTables.bootstrap4.min.css" />
  <link rel="stylesheet" type="text/css" href="../packages/datatables/css/responsive.bootstrap4.min.css" />
  <link rel="stylesheet" type="text/css" href="../packages/lobibox/css/lobibox.min.css" />
  <!--- --------------------------------------------------------------------------------------------------------------------------- --->
  <!-- JS -->
  <!--- <script src="https://www.google.com/recaptcha/api.js?render=<CHabe_Aqui>"></script> --->
</head>

<body>
  <!-- Inicio - Image and text -->
  <nav class="navbar navbar-dark navbar-expand-lg">
    <a class="navbar-brand" href="../home/">
      <img src="../images/favicon.png" height="32" class="img-fliud d-inline-block align-top" />
      My whatsapp
    </a>
    <?php if (isset($_SESSION['logado']) && !empty($_SESSION['logado']) && $_SESSION['logado'] === true) : ?>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link waves-effect waves-light" href="#">
              <i class="fas fa-user"></i>&#32;Teste
            </a>
          </li>
        </ul>

        <ul class="navbar-nav ml-auto nav-flex-icons">

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-user"></i>&#32;<?php print $_SESSION['nome_usuario']; ?></a>
            <div class="dropdown-menu dropdown-menu-right dropdown-default" aria-labelledby="navbar">
              <a class="dropdown-item" href="#"><i class="fas fa-address-card"></i>&#32;Meus dados</a>
              <a class="dropdown-item" href="../usuarios/trocar_email.php"><i class="fas fa-envelope"></i>&#32; Alterar e-mail</a>
              <a class="dropdown-item" href="../usuarios/trocar_senha.php"><i class="fas fa-key"></i>&#32; Alterar senha</a>
              <a class="dropdown-item" href="../login/logout.php?tokenout=<?php print md5(session_id()); ?>"><i class="fas fa-sign-out-alt"></i>&#32;Sair</a>
            </div>
          </li>

        </ul>
      </div>
    <?php endif; ?>
  </nav>
  <!-- Fim - Image and text -->
  <div class="container">