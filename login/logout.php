<?php
if (session_status() !== PHP_SESSION_ACTIVE) {//Verificar se a sessão não já está aberta.
  session_start();
}
//
$tokenout = md5(session_id());
if(isset($_GET['tokenout']) && $_GET['tokenout'] === $tokenout) {
   // limpe tudo que for necessário na saída.
   // Eu geralmente não destruo a seção, mas invalido os dados da mesma
   // para evitar algum "necromancer" recuperar dados. Mas simplifiquemos:
    //
	unset($_SESSION['id']);
	unset($_SESSION['nome']);
	unset($_SESSION['nome_usuario']);
	unset($_SESSION['email']);
    unset($_SESSION['perfil']);
	unset($_SESSION['active']);
	unset($_SESSION['status']);
	unset($_SESSION['nivel']);
	unset($_SESSION['tentativas']);
	unset($_SESSION['logado']);
	unset($_SESSION['timeout']);
	//
   session_destroy();
   header("location: ../login/");
   exit();
} else {
   header("location: ../login/confirm_logout.php");
}
?>