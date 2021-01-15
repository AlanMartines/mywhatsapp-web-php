<?php
//
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL);
//
if (session_status() !== PHP_SESSION_ACTIVE) {//Verificar se a sessão não já está aberta.
  session_start();
}
//
require_once('../config.php');
require_once(DBAPI);
//
class adv{
  private $pdo = null;  
  private static $crudAdv = null; 
  private static  $strTabela = null;
  private function __construct($conexao){  
    $this->pdo = $conexao;  
  }
  //
  public static function conectar($conexao){   
   if (!isset(self::$crudAdv)):    
    self::$crudAdv = new adv($conexao);   
   endif;   
   return self::$crudAdv;    
  }
  //
  public function getAll(){
   try{   
    $sql = "SELECT * FROM usuarios ORDER BY nome ASC";
    //print $sql;
    $stm = $this->pdo->prepare($sql);   
    $stm->execute();   
    $dados = $stm->fetchAll(PDO::FETCH_OBJ);   
    return $dados;   
     //echo "<script>alert('Registro carregado com sucesso')</script>";
    }catch(PDOException $erro){   
     //echo "<script>alert('Erro na linha: {$erro->getLine()}')</script>";
    }   
  }
  //
  public function getDadosUser($id_user=null){
   try{   
    $sql = "SELECT * FROM usuarios WHERE ID = $id_user ORDER BY nome ASC";
    //print $sql;
    $stm = $this->pdo->prepare($sql);   
    $stm->execute();   
    $dados = $stm->fetch(PDO::FETCH_OBJ);
    return $dados;
    //
     //echo "<script>alert('Registro carregado com sucesso')</script>";
    //
    }catch(PDOException $erro){   
     echo "<script>alert('Erro na linha: {$erro->getLine()}')</script>";
    //
    $retorno = array(
        'error' => true,
        'alerta' => 'danger',
        'iconem' => '<i class="fas fa-check"></i>',
        'mensagem' => "Erro na linha: {$erro->getLine()}"
    );
    $strJSON = json_encode($retorno);
    header('Content-Type: application/json');
    print $strJSON;
    //
    }   
  }
  //
 }
