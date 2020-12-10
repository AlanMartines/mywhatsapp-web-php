<?php
if (session_status() !== PHP_SESSION_ACTIVE) {//Verificar se a sessão não já está aberta.
  session_start();
}
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>

    <title>Sessões</title>
  </head>
  <body>
<div class="container">
<?php
//
if(isset($_SESSION)):
print "<p></p>";
print "<div  style='background-color: powderblue; font-family:courier; margin: 0 auto; width: 50%;'>";
print "<strong>ID Usuário.........:</strong> ".$_SESSION['id_user']."<br>";
print "<strong>Nome Usuário.......:</strong> ".$_SESSION['nome']."<br>";
print "<strong>E-Mail Usuário.....:</strong> ".$_SESSION['email']."<br>";
print "<strong>Perfil Usuário.....:</strong> ".$_SESSION['perfil']."<br>";
print "<strong>Ativo Usuário......:</strong> ".$_SESSION['active']."<br>";
print "<strong>Status Usuário.....:</strong> ".$_SESSION['status']."<br>";
print "<strong>Tentativas.........:</strong> ".$_SESSION['tentativas']."<br>";
print "<strong>Logado.............:</strong> ".$_SESSION['logado']."<br>";
print "<strong>Time start.........:</strong> ".$_SESSION['start']."<br>";
print "<strong>Time out...........:</strong> ".$_SESSION['timeout']."<br>";
print "</div>";
endif;
//
?>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  </body>
</html>