<?php 
if (session_status() !== PHP_SESSION_ACTIVE) {//Verificar se a sessão não já está aberta.
  session_start();
}
//
require_once('./functions.php');
//
if (isset($_POST['ID']) && !empty($_POST['ID'])){
$adv = adv::conectar(Conexao::conectar());
$clientes = $adv->delete($_POST['ID']);
//
$_SESSION['msg'] = '
<div class="alert alert-success md-6" role="alert">
  <i class="fas fa-times"></i> Registro excluido com sucesso!
</div>
';
//
} else {
//
$_SESSION['msg'] = '
<div class="alert alert-success md-6" role="alert">
  <i class="fas fa-check"></i> Erro ao excluir registro!
</div>
';
//
}
?>