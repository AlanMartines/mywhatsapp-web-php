<?php
if (session_status() == PHP_SESSION_NONE) :
    session_start();
endif;
//
// https://stackoverflow.com/questions/520237/how-do-i-expire-a-php-session-after-30-minutes
// https://dbeaver.io/download/
// https://stackoverflow.com/questions/41035992/jquery-countdown-timer-for-minutes-and-seconds
//
$timeout = 1800; // Tempo da sessao em segundos
// Verifica se existe o parametro timeout
if(isset($_SESSION['timeout'])):
    // Calcula o tempo que ja se passou desde a cricao da sessao
    $duracao = time() - (int) $_SESSION['timeout'];
	//
  	// Verifica se ja expirou o tempo da sessao
    if($duracao > $timeout):
    // Destroi a sessao e cria uma nova
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
    header("Location: ../login/session_expired.php");
    endif;
endif;
// Atualiza o timeout.
$_SESSION['timeout'] = time();
//
?>