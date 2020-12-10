<?php
/* Informa o n?vel dos erros que ser?o exibidos */
error_reporting(E_ALL);
 
/* Habilita a exibi??o de erros */
ini_set("display_errors", 1);
//
//include_once("../inc/formatatudo.class.php");
include_once("./functions.php");
//
//
$nome = (isset($_POST["nome"])) ? $_POST['nome'] : '';
$cpfcnpj = (isset($_POST["ecpfcnpj"])) ? $_POST['ecpfcnpj'] : '';
$rg = (isset($_POST["erg"])) ? $_POST['erg'] : '';
$org_emissor = (isset($_POST["org_emissor"])) ? strtoupper($_POST['org_emissor']) : '';
$oab = (isset($_POST["eoab"])) ? $_POST['eoab'] : '';
//
$cep = (isset($_POST["cep"])) ? $_POST['cep'] : '';
$uf = (isset($_POST["uf"])) ? $_POST['uf'] : '';
$cidade = (isset($_POST["cidade"])) ? $_POST['cidade'] : '';
$rua = (isset($_POST["rua"])) ? $_POST['rua'] : '';
$numero = (isset($_POST["numero"])) ? $_POST['numero'] : '';
$bairro = (isset($_POST["bairro"])) ? $_POST['bairro'] : '';
$complemento = (isset($_POST["complemento"])) ? $_POST['complemento'] : '';
//
$email = (isset($_POST['eemail'])) ? $_POST['eemail'] : '';
$celular = (isset($_POST["celular"])) ? $_POST['celular'] : '';
$telefone = (isset($_POST["telefone"])) ? $_POST['telefone'] : '';
//
$perfil = (isset($_POST["perfil"])) ? $_POST['perfil'] : '';
$active = (isset($_POST["active"])) ? $_POST['active'] : '';
//
$operadora = (isset($_POST["org"])) ? $_POST['org'] : '';
$endip = (isset($_POST["ip"])) ? $_POST['ip'] : '';
$modified = date('Y-m-d H:i:s');
$id = (isset($_POST["id"])) ? $_POST['id'] : '';
//
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
//-------------------------------------------------------------------------------------------------------------------------------------------------------------
//
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['recaptcha_response']) && isset($_POST['action'])):
    $token = $_POST['recaptcha_response'];
    $action = $_POST['action'];
else:
    $retorno = array(
        'codigo' => '0',
        'alerta' => 'danger',
        'iconem' => '<i class="fas fa-times"></i>',
        'mensagem' => 'Erro ao efetuar atualização.',
        'debug' => ''
    );
    $strJSON = json_encode($retorno);
    echo $strJSON;
    exit();
endif;
//
// call curl to POST request
// Ingresa tu clave secreta.....
$RECAPTCHA_V3_SECRET_KEY = '6LfzeuoUAAAAAGi6bgPuX-pjg3HOE9jfC2nTv5-8';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"https://www.google.com/recaptcha/api/siteverify");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array('secret' => $RECAPTCHA_V3_SECRET_KEY, 'response' => $token)));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);
//$arrResponse = json_decode($response, true);
$responseData = json_decode($response);
//Com a requisição enviada, só nos falta tratar a resposta:
// verificar la respuesta
//if($arrResponse["success"] == '1' && $arrResponse["action"] == $action && $arrResponse["score"] > 0.5) {
if ($responseData->success == true && $responseData->action == $action && $responseData->score > 0.5):
//
//-------------------------------------------------------------------------------------------------------------------------------------------------------------
//
 $adv = adv::conectar(Conexao::conectar());
 $usuarios = $adv->update($nome, $cpfcnpj, $rg, $org_emissor, $oab, $cep, $uf, $cidade, $rua, $numero, $bairro, $complemento, $email, $celular, $telefone, $perfil, $active, $operadora, $endip, $modified, $id);
//
//-------------------------------------------------------------------------------------------------------------------------------------------------------------
//
else:
    // Si entra aqui, es un robot....
    header('Content-type: application/json');
    $retorno = array(
        'codigo' => '0',
        'alerta' => 'danger',
        'iconem' => '<i class="fas fa-times"></i>',
        'mensagem' => 'Usuário mal intencionado detectado!',
        'debug' => $response
    );
    $strJSON = json_encode($retorno);
    echo $strJSON;
    exit();
    //
endif;
//

?>