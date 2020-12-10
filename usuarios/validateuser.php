<?php
 // Resultado da confirmação de e-mail que é recebido pelo utilizador.
 include('configdb.php');
 $passkey = $_GET['passkey'];
$sql = "UPDATE joana.users SET ativo=1 WHERE com_code='$passkey'";
$result = mysqli_query($mysqli,$sql) or die(mysqli_error());
if($result)
{
echo '<div>A sua conta está activa. Já pode <a href="entrar.php">entrar.
</a></div>';
}
else
{
echo "Ocorreu um erro.";
}
//
//
//
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
if(!empty($id)):
//
 $adv = adv::conectar(Conexao::conectar());
 $upadteEmail = $adv->confirmEmail($novo_email);
//
else:
    //
    $retorno = array(
        'codigo' => '0',
        'alerta' => 'danger',
        'iconem' => '<i class="fas fa-times"></i>',
        'mensagem' => 'Erro ao efetuar confirmação do e-mail.'
    );
    $strJSON = json_encode($retorno);
    echo $strJSON;
    //
endif;
?>