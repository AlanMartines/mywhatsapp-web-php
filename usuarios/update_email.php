<?php
if (session_status() == PHP_SESSION_NONE) :
    session_start();
endif;
/* Informa o n?vel dos erros que ser?o exibidos */
error_reporting(E_ALL);
 
/* Habilita a exibi??o de erros */
ini_set("display_errors", 1);
//
//include_once("../inc/formatatudo.class.php");
include_once("./functions.php");
//
// Require da classe de conexão
require_once('../config.php');
require_once(DBAPI);
//
$novo_email = (isset($_POST["email"])) ? $_POST['email'] : '';
$id = (isset($_POST["id"])) ? $_POST['id'] : '';
//
if(!empty($id) && !empty($novo_email)):
//
 $adv = adv::conectar(Conexao::conectar());
 $upadteEmail = $adv->updateEmail($novo_email, $id);
//
else:
    //
    $retorno = array(
        'codigo' => '0',
        'alerta' => 'danger',
        'iconem' => '<i class="fas fa-times"></i>',
        'mensagem' => 'Erro ao atualizar e-mail'
    );
    $strJSON = json_encode($retorno);
    echo $strJSON;
    //
endif;
?>