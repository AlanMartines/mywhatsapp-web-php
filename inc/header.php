<?php
//
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
//
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <title>EletroInfo - My whats</title>
  <meta property='og:title' content='Alan Martines' />
  <meta charset="utf-8" />
  <meta name='content-language' content='pt-br' />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <link rel="icon" href="../public/imagens/whatsapp-bot.png" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!--- --------------------------------------------------------------------------------------------------------------------------- --->
  <meta name="description" content="Alan Martines" />
  <meta name="author" content="Alan Martines" />
  <meta name="keywords" content="Alan Martines" />
  <meta name="robots" content="noindex, nofollow" />
  <!--- --------------------------------------------------------------------------------------------------------------------------- --->
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="../public/page/css/style.css" />
  <link rel="stylesheet" type="text/css" href="../public/bootstrap/css/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="../public/fontawesome-free/css/all.min.css" />
  <link rel="stylesheet" type="text/css" href="../public/intl-tel-input/css/intlTelInput.min.css">
  <!--- --------------------------------------------------------------------------------------------------------------------------- --->
  <!--- JS --->
</head>

<body>

  <!-- Inicio - Image and text -->
  <nav class="navbar navbar-dark navbar-expand-lg">
    <a class="navbar-brand" href="../home/">
      <img src="../images/favicon.png" height="32" class="img-fliud d-inline-block align-top" />
      Eletroinfo
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" id="navbar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-text-height"></i>&#32;Enviar Texto
          </a>
          <div class="dropdown-menu dropdown-menu-right dropdown-default" aria-labelledby="navbar">
            <a class="dropdown-item" href="../pages/sendText.php"><i class="fas fa-user"></i>&#32;Enviar Texto - Simples
              Contato</a>
            <a class="dropdown-item" href="../pages/sendTextMult.php"><i class="fas fa-users"></i>&#32;Enviar Texto - Multiplos
              Contatos</a>
            <a class="dropdown-item" href="../pages/sendTextGrupo.php"><i class="fas fa-user"></i>&#32;Enviar Texto - Grupo</a>
          </div>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" id="navbar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-file-image"></i>&#32;Enviar Imagem
          </a>
          <div class="dropdown-menu dropdown-menu-right dropdown-default" aria-labelledby="navbar">
            <a class="dropdown-item" href="../pages/sendImage.php"><i class="fas fa-user"></i>&#32;Enviar Imagem - Simples
              Contato</a>
            <a class="dropdown-item" href="../pages/sendImageMult.php"><i class="fas fa-users"></i>&#32;Enviar Imagem -
              Multiplos Contatos</a>
            <a class="dropdown-item" href="../pages/sendImgGrupo.php"><i class="fas fa-user"></i>&#32;Enviar Imagem - Grupo</a>
          </div>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" id="navbar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-phone-alt"></i>&#32;Checar Numero
          </a>
          <div class="dropdown-menu dropdown-menu-right dropdown-default" aria-labelledby="navbar">
            <a class="dropdown-item" href="../pages/checkNumberStatus.php"><i class="fas fa-user"></i>&#32;Checar Simples
              Contato</a>
            <a class="dropdown-item" href="../pages/checkNumberStatusMult.php"><i class="fas fa-users"></i>&#32;Checar Multiplos
              Contatos</a>
          </div>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="../pages/getData.php">Recuperando Dados</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container">
    <div class="content">