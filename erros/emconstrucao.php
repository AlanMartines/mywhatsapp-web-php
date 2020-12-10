<?php
if (session_status() !== PHP_SESSION_ACTIVE) {//Verificar se a sessão não já está aberta.
  session_start();
}
//
require_once('../config.php');
require_once(HEADER_TEMPLATE);
//
?>
    <div class="container text-center">
			<img class="img-fluid" src="../images/PgConstrucao.png" width="100%" alt="Eletro Info">
	</div>
</p>
<?php
include_once(FOOTER_TEMPLATE); 
?>