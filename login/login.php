<?php
if (session_status() == PHP_SESSION_NONE) :
    session_start();
endif;
//
if (isset($_SESSION['logado']) && !empty($_SESSION['logado']) && $_SESSION['logado'] == true) :
    header("Location: ../home/");
endif;
//
// Constante com a quantidade de tentativas aceitas
define('TENTATIVAS_ACEITAS', 5);
//
// Constante com a quantidade minutos para bloqueio
define('MINUTOS_BLOQUEIO', 30);
//
// Require da classe de conexão
require_once('../config.php');
require_once(DBAPI);
require_once(LOGAPI);
//
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
$endip = get_client_ip();
$operadora = file_get_contents("https://ipapi.co/$endip/org/");
//
function Hashes($username, $password)
{
    $one = $username;
    $two = $password;
    $thr = $one . $two;
    $fou = $thr . $one;
    $fiv = $fou . $one;
    $six = $thr . $thr;
    $sev = $one . $two . $thr . $one;
    $md1 = md5($sev . $two . md5($one . $fiv . md5($sev . strrev($sev))));
    $md2 = md5($md1 . md5($one . $thr . $fou . md5($sev . $md1)));
    $md3 = md5($md2 . md5($md1));
    $md4 = md5($md3 . $md1 . $md2 . md5($sev));
    return $md2 . $md1 . $md4 . md5($md3 . $md2);
}
//
// Dica 1 - Verifica se a origem da requisição é do mesmo domínio da aplicação
if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') :
    $link = "https";
else :
    $link = "http";
endif;
$link .= "://";
$link .= $_SERVER['HTTP_HOST'];
$link .= $_SERVER['REQUEST_URI'];
//echo $link.'<br>'; 
$UrlUm = 'https://sirleilima.tk/login/login.php';
$UrlDois = 'https://www.sirleilima.tk/login/login.php';
//
if (isset($link) && $link != $UrlUm && $link != $UrlDois) :
    //
    header('Content-type: application/json');
    $retorno = array(
        'codigo' => '0',
        'alerta' => 'danger',
        'iconem' => '<i class="fas fa-times"></i>',
        'mensagem' => 'Origem da requisição não autorizada!',
        'debug' => ''
    );
    $strJSON = json_encode($retorno);
    echo $strJSON;
    exit();
//
endif;
//
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['recaptcha_response']) && isset($_POST['action'])) :
    $token = $_POST['recaptcha_response'];
    $action = $_POST['action'];
else :
    header('Content-type: application/json');
    $retorno = array(
        'codigo' => '0',
        'alerta' => 'danger',
        'iconem' => '<i class="fas fa-times"></i>',
        'mensagem' => 'Erro ao efetuar login.',
        'debug' => ''
    );
    $strJSON = json_encode($retorno);
    echo $strJSON;
    exit();
endif;
//
// call curl to POST request
// Ingresa tu clave secreta.....
$RECAPTCHA_V3_SECRET_KEY = '<chave_aqui>';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
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
if ($responseData->success == true && $responseData->action == $action && $responseData->score > 0.5) :
    //
    //-------------------------------------------------------------------------------------------------------------------------------------------------------------
    //
    // Instancia Conexão PDO
    $conexao = Conexao::conectar();
    //
    // Recebe os dados do formulário
    $email = (isset($_POST['email'])) ? $_POST['email'] : '';
    $senha = (isset($_POST['pwd'])) ? $_POST['pwd'] : '';
    $senha_hash = Hashes('', $senha);
    $endip = get_client_ip();
    $lastlogin = date('Y-m-d H:i:s');
    //
    //Verifica se o usuário já excedeu a quantidade de tentativas erradas do dia
    $sql = "SELECT count(*) AS tentativas, MINUTE(TIMEDIFF(NOW(), MAX(data_hora))) AS minutos ";
    $sql .= "FROM log_tentativa WHERE ip = ? and DATE_FORMAT(data_hora,'%Y-%m-%d') = ? AND bloqueado = ?";
    $stm = $conexao->prepare($sql);
    $stm->bindValue(1, $endip);
    $stm->bindValue(2, date('Y-m-d'));
    $stm->bindValue(3, 'SIM');
    $stm->execute();
    $retorno = $stm->fetch(PDO::FETCH_OBJ);
    //
    if (!empty($retorno->tentativas) && intval($retorno->minutos) <= MINUTOS_BLOQUEIO) :
        $_SESSION['tentativas'] = '0';
        //
        header('Content-type: application/json');
        $retorno = array(
            'codigo' => '0',
            'alerta' => 'danger',
            'iconem' => '<i class="fas fa-times"></i>',
            'mensagem' => 'Você excedeu o limite de ' . TENTATIVAS_ACEITAS . ' tentativas, login bloqueado por ' . MINUTOS_BLOQUEIO . ' minutos!',
            'debug' => $response
        );
        $strJSON = json_encode($retorno);
        echo $strJSON;
        exit();
    //
    endif;
    //
    //Válida os dados do usuário com o banco de dados
    $sql = 'SELECT id, nome, senha, email, perfil, active, status FROM usuarios WHERE email = ? AND status = ? LIMIT 1';
    $stm = $conexao->prepare($sql);
    $stm->bindValue(1, $email);
    $stm->bindValue(2, 'A');
    $stm->execute();
    $retorno = $stm->fetch(PDO::FETCH_OBJ);
    //
    //Válida a senha utlizando a API Password Hash
    if (!empty($retorno) && ($senha_hash == $retorno->senha)) :
        //
        session_regenerate_id();
        //
        $_SESSION['id_user'] = $retorno->id;
        //
        $words = explode(" ", $retorno->nome);
        // Primeira palavra:
        $primeiraPalavra = $words[0];
        // Última palavra
        $ultimaPalavra = $words[count($words) - 1];
        //
        $_SESSION['nome'] = $retorno->nome;
        $_SESSION['nome_usuario'] = $primeiraPalavra . ' ' . $ultimaPalavra;
        $_SESSION['email'] = $retorno->email;
        $_SESSION['perfil'] = $retorno->perfil;
        $_SESSION['active'] = $retorno->active;
        $_SESSION['status'] = $retorno->status;
        $_SESSION['tentativas'] = '0';
        $_SESSION['logado'] = true;
        $_SESSION['start'] = time();
        $_SESSION['timeout'] = $_SESSION['start'] + (30 * 60);
        //Grava a data e hora do ultimo logon
        $sql = "UPDATE usuarios SET lastlogin=? WHERE ID=?";
        //print $sql;
        $stm = $conexao->prepare($sql);
        $stm->bindValue(1, $lastlogin);
        $stm->bindValue(2, $_SESSION['id_user']);
        $stm->execute();
    else :
        $_SESSION['logado'] = false;
        $_SESSION['tentativas'] = (isset($_SESSION['tentativas'])) ? $_SESSION['tentativas'] += 1 : 1;
        $bloqueado = ($_SESSION['tentativas'] == TENTATIVAS_ACEITAS) ? 'SIM' : 'NAO';
        //
        //Grava a tentativa independente de falha ou não
        $sql = 'INSERT INTO log_tentativa (ip, email, senha, origem, bloqueado) VALUES (?, ?, ?, ?, ?)';
        $stm = $conexao->prepare($sql);
        $stm->bindValue(1, $endip);
        $stm->bindValue(2, $email);
        $stm->bindValue(3, $senha_hash);
        $stm->bindValue(4, $link);
        $stm->bindValue(5, $bloqueado);
        $stm->execute();
    endif;
    //
    // Se logado envia código 1, senão retorna mensagem de erro para o login
    if ($_SESSION['logado'] == true) :
        //
        header('Content-type: application/json');
        $retorno = array(
            'codigo' => '1',
            'alerta' => 'success',
            'iconem' => '<i class="fas fa-check"></i>',
            'mensagem' => 'Logado com sucesso!',
            'debug' => $response
        );
        $strJSON = json_encode($retorno);
        echo $strJSON;
        exit();
    //
    else :
        if ($_SESSION['tentativas'] == TENTATIVAS_ACEITAS) :
            //
            header('Content-type: application/json');
            $retorno = array(
                'codigo' => '0',
                'alerta' => 'danger',
                'iconem' => '<i class="fas fa-check"></i>',
                'mensagem' => 'Você excedeu o limite de ' . TENTATIVAS_ACEITAS . ' tentativas, login bloqueado por ' . MINUTOS_BLOQUEIO . ' minutos!',
                'debug' => $response
            );
            $strJSON = json_encode($retorno);
            echo $strJSON;
            exit();
        //
        else :
            //
            header('Content-type: application/json');
            $retorno = array(
                'codigo' => '0',
                'alerta' => 'danger',
                'iconem' => '<i class="fas fa-check"></i>',
                'mensagem' => 'Usuário ou senha incoreto, você tem mais ' . (TENTATIVAS_ACEITAS - $_SESSION['tentativas']) . ' tentativa(s) antes do bloqueio!',
                'debug' => $response
            );
            $strJSON = json_encode($retorno);
            echo $strJSON;
            exit();
        //
        endif;
    endif;
//
//-------------------------------------------------------------------------------------------------------------------------------------------------------------
//
else :
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
