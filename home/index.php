<?php
if (session_status() !== PHP_SESSION_ACTIVE) { //Verificar se a sessão não já está aberta.
    session_start();
}
//
require_once('../login/verifica_sessao.php');
require_once('../config.php');
require_once(HEADER_TEMPLATE);
//
?>
<div class="row d-flex justify-content-center">
    <div class="col-sm-3">

    </div>
    <div class="col-sm-3">

    </div>
</div>
<?php
include_once(FOOTER_TEMPLATE);
?>