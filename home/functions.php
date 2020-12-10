<?php
/* Informa o nível dos erros que serão exibidos */
error_reporting(E_ALL);
ini_set("display_errors", 1);
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
  public function clientesTotal(){
   try{   
    $sql = "SELECT * FROM clientes"; 
    //print $sql;
    $stm = $this->pdo->prepare($sql);   
    $stm->execute();   
    $linha = $stm->rowCount(PDO::FETCH_OBJ);
    return $linha;   
   }catch(PDOException $erro){   
    //echo "<script>alert('Erro na linha: {$erro->getLine()}')</script>";
    //echo json_encode(array('isError' => false,'isSms' => "Erro na linha: {$erro->getLine()}"));
    //
    $strJSON = json_encode($retorno);
    echo $strJSON;
    //
   }   
  }
  //
  public function clientesTotalUSerID($valor=null){
   try{   
    $sql = "SELECT * FROM clientes WHERE id_usuario = '$valor'"; 
    //print $sql;
    $stm = $this->pdo->prepare($sql);   
    $stm->execute();   
    $linha = $stm->rowCount(PDO::FETCH_OBJ);
    return $linha;   
   }catch(PDOException $erro){   
    //echo "<script>alert('Erro na linha: {$erro->getLine()}')</script>";
    //echo json_encode(array('isError' => false,'isSms' => "Erro na linha: {$erro->getLine()}"));
    //
    $strJSON = json_encode($retorno);
    echo $strJSON;
    //
   }   
  }
//
  public function preContratoTotal(){
   try{   
    $sql = "SELECT * FROM status WHERE id_status = '5'"; 
    //print $sql;
    $stm = $this->pdo->prepare($sql);   
    $stm->execute();   
    $linha = $stm->rowCount(PDO::FETCH_OBJ);
    return $linha;   
   }catch(PDOException $erro){   
    //echo "<script>alert('Erro na linha: {$erro->getLine()}')</script>";
    //echo json_encode(array('isError' => false,'isSms' => "Erro na linha: {$erro->getLine()}"));
    //
    $strJSON = json_encode($retorno);
    echo $strJSON;
    //
   }   
  }
//
  public function analiseTotal(){
   try{   
    $sql = "SELECT * FROM status WHERE id_status = '1'"; 
    //print $sql;
    $stm = $this->pdo->prepare($sql);   
    $stm->execute();   
    $linha = $stm->rowCount(PDO::FETCH_OBJ);
    return $linha;   
   }catch(PDOException $erro){   
    //echo "<script>alert('Erro na linha: {$erro->getLine()}')</script>";
    //echo json_encode(array('isError' => false,'isSms' => "Erro na linha: {$erro->getLine()}"));
    //
    $strJSON = json_encode($retorno);
    echo $strJSON;
    //
   }   
  }
//
  public function seguimentoTotal(){
   try{   
    $sql = "SELECT * FROM status WHERE id_status = '6'"; 
    //print $sql;
    $stm = $this->pdo->prepare($sql);   
    $stm->execute();   
    $linha = $stm->rowCount(PDO::FETCH_OBJ);
    return $linha;   
   }catch(PDOException $erro){   
    //echo "<script>alert('Erro na linha: {$erro->getLine()}')</script>";
    //echo json_encode(array('isError' => false,'isSms' => "Erro na linha: {$erro->getLine()}"));
    //
    $strJSON = json_encode($retorno);
    echo $strJSON;
    //
   }   
  }
//
  public function pendenteTotal(){
   try{   
    $sql = "SELECT * FROM status WHERE id_status = '4'"; 
    //print $sql;
    $stm = $this->pdo->prepare($sql);   
    $stm->execute();   
    $linha = $stm->rowCount(PDO::FETCH_OBJ);
    return $linha;   
   }catch(PDOException $erro){   
    //echo "<script>alert('Erro na linha: {$erro->getLine()}')</script>";
    //echo json_encode(array('isError' => false,'isSms' => "Erro na linha: {$erro->getLine()}"));
    //
    $strJSON = json_encode($retorno);
    echo $strJSON;
    //
   }   
  }
//
  public function exigenciaTotal(){
   try{   
    $sql = "SELECT * FROM status WHERE id_status = '3'"; 
    //print $sql;
    $stm = $this->pdo->prepare($sql);   
    $stm->execute();   
    $linha = $stm->rowCount(PDO::FETCH_OBJ);
    return $linha;   
   }catch(PDOException $erro){   
    //echo "<script>alert('Erro na linha: {$erro->getLine()}')</script>";
    //echo json_encode(array('isError' => false,'isSms' => "Erro na linha: {$erro->getLine()}"));
    //
    $strJSON = json_encode($retorno);
    echo $strJSON;
    //
   }   
  }
//
  public function andamentoTotal(){
   try{   
    $sql = "SELECT * FROM status WHERE id_status = '2'"; 
    //print $sql;
    $stm = $this->pdo->prepare($sql);   
    $stm->execute();   
    $linha = $stm->rowCount(PDO::FETCH_OBJ);
    return $linha;   
   }catch(PDOException $erro){   
    //echo "<script>alert('Erro na linha: {$erro->getLine()}')</script>";
    //echo json_encode(array('isError' => false,'isSms' => "Erro na linha: {$erro->getLine()}"));
    //
    $strJSON = json_encode($retorno);
    echo $strJSON;
    //
   }   
  }
  //
 }
 ?>