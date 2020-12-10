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
function Hashes($username, $password) 
{ 
    $one = $username;
    $two = $password;
    $thr = $one . $two;
    $fou = $thr . $one;
    $fiv = $fou . $one; 
    $six = $thr . $thr;$sev = $one . $two . $thr . $one; 
    $md1 = md5( $sev . $two . md5($one . $fiv . md5($sev . strrev( $sev)))); 
    $md2 = md5( $md1 . md5( $one . $thr . $fou . md5( $sev . $md1))); 
    $md3 = md5( $md2 . md5($md1)); 
    $md4 = md5( $md3 . $md1 . $md2 . md5($sev)); 
    return $md2 . $md1. $md4 . md5($md3 . $md2); 
}
//
$old_senha = (isset($_POST["old_senha"])) ? $_POST['old_senha'] : '';
$old_senha_hash = Hashes('' , $old_senha);
//
$nova_senha = (isset($_POST["senha"])) ? $_POST['senha'] : '';
$nova_senha_hash = Hashes('' , $nova_senha);
//
$id = (isset($_POST["id"])) ? $_POST['id'] : '';
//
$conexao = Conexao::conectar();
//
$sql = 'SELECT * FROM usuarios WHERE ID=? LIMIT 1';
$stm = $conexao->prepare($sql);
$stm->bindValue(1, $id);
$stm->execute();
$retorno = $stm->fetch(PDO::FETCH_OBJ);
//
// Dica 6 - Válida a senha utlizando a API Password Hash
if(!empty($retorno) && ($retorno->senha != $old_senha_hash)):
    $retorno = array(
        'codigo' => '0',
        'alerta' => 'danger',
        'iconem' => '<i class="fas fa-times"></i>',
        'mensagem' => 'Por favor, informe sua senha atual. '
    );
    $strJSON = json_encode($retorno);
    echo $strJSON;
    exit;
elseif(!empty($retorno) && ($retorno->senha == $nova_senha_hash)):
    $retorno = array(
        'codigo' => '0',
        'alerta' => 'danger',
        'iconem' => '<i class="fas fa-times"></i>',
        'mensagem' => 'A nova senha não pode ser a mesma que a atual.'
    );
    $strJSON = json_encode($retorno);
    echo $strJSON;
    exit;
endif;
// Function to get the client IP address
function get_client_ip()
{
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP')) $ipaddress = getenv('HTTP_CLIENT_IP');
    else if (getenv('HTTP_X_FORWARDED_FOR')) $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if (getenv('HTTP_X_FORWARDED')) $ipaddress = getenv('HTTP_X_FORWARDED');
    else if (getenv('HTTP_FORWARDED_FOR')) $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if (getenv('HTTP_FORWARDED')) $ipaddress = getenv('HTTP_FORWARDED');
    else if (getenv('REMOTE_ADDR')) $ipaddress = getenv('REMOTE_ADDR');
    else $ipaddress = '0.0.0.0';
    return $ipaddress;
}
//
$endip = get_client_ip();
//
/**
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['recaptcha_response'])):
    $captcha_data = $_POST['recaptcha_response'];
endif;
// Se nenhum valor foi recebido, o usuário não realizou o captcha
if (!$captcha_data):
//echo "Usuário mal intencionado detectado. A mensagem não foi enviada.";
    $retorno = array(
        'codigo' => '0',
        'alerta' => 'danger',
        'iconem' => '<i class="fas fa-times"></i>',
        'mensagem' => 'Usuário mal intencionado detectado.'
    );
    $strJSON = json_encode($retorno);
    echo $strJSON;
    exit;
endif;
//
$operadora = file_get_contents("https://ipapi.co/$endip/org/");
// Requisição para a API do reCAPTCHA, utilizando o file_get_contents
$secret = '6LfzeuoUAAAAAGi6bgPuX-pjg3HOE9jfC2nTv5-8';
//$remoteip = file_get_contents("https://ipapi.co/ip/");
$siteverify = 'https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $captcha_data . '&remoteip=' . $endip;
$resposta = file_get_contents($siteverify);
//$responseData = json_decode($resposta);
$responseData = json_decode($resposta);
//Com a requisição enviada, só nos falta tratar a resposta:
if ($responseData->success == true && $responseData->score > 0.6):
//
$adv = adv::conectar(Conexao::conectar());
$upadteSenha = $adv->updateSenha($nova_senha_hash, $id);
//
else:
//echo "Usuário mal intencionado detectado. A mensagem não foi enviada.";
header('Content-type: application/json');
    $retorno = array(
        'codigo' => '0',
        'alerta' => 'danger',
        'iconem' => '<i class="fas fa-times"></i>',
        'mensagem' => 'Usuário mal intencionado detectado.'
    );
    $strJSON = json_encode($retorno);
    echo $strJSON;
    exit;
endif;
**/
//
$adv = adv::conectar(Conexao::conectar());
$upadteSenha = $adv->updateSenha($nova_senha_hash, $id);
//
?>