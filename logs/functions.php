<?php
/* Informa o nível dos erros que serão exibidos */
error_reporting(E_ALL);
 
/* Habilita a exibição de erros */
ini_set("display_errors", 1);
// http://www.devwilliam.com.br/php/crud-no-php-com-pdo-e-mysql
// http://bootboxjs.com/
require_once('../config.php');
require_once(DBAPI);

class adv{
  private $pdo = null;  
  private static $crudAdv = null; 
  private static  $strTabela = null;
  private function __construct($conexao){  
    $this->pdo = $conexao;  
  }
  
  public static function conectar($conexao){   
   if (!isset(self::$crudAdv)):    
    self::$crudAdv = new adv($conexao);   
   endif;   
   return self::$crudAdv;    
  }
 
  public function insert($nome, $cpfcnpj, $rg, $created, $modified){
   if (!empty($nome) && !empty($cpfcnpj) && !empty($rg)):   
    try{   
     $sql = "INSERT INTO usuarios (nome, cpfcnpj, rg, created, modified) VALUES (?, ?, ?, ?, ?)";
    //print $sql;
    $stm = $this->pdo->prepare($sql);   
    $stm->bindValue(1, $nome);
    $stm->bindValue(2, $cpfcnpj);
    $stm->bindValue(3, $rg);
    $stm->bindValue(4, $created);
    $stm->bindValue(5, $modified);
    $stm->execute();
    $newId = $this->pdo->lastInsertId();
    //echo "<script>alert('Registro inserido com sucesso')</script>";
    //echo json_encode(array('isError' => true,'isSms' => "Registro inserido com sucesso",'isID' => "$newId"));
    //
    $retorno = array(
        'codigo' => '0',
        'alerta' => 'success',
        'iconem' => '<i class="fas fa-check"></i>',
        'mensagem' => 'Registro inserido com sucesso'
    );
    $strJSON = json_encode($retorno);
    echo $strJSON;
    //
    }catch(PDOException $erro){   
    //echo "<script>alert('Erro na linha: {$erro->getLine()}')</script>";
    //echo json_encode(array('isError' => false,'isSms' => "Erro na linha: {$erro->getLine()}"));
    //
    $retorno = array(
        'codigo' => '0',
        'alerta' => 'danger',
        'iconem' => '<i class="fas fa-check"></i>',
        'mensagem' => "Erro ao inserido registro"
        //'mensagem' => "Erro na linha: {$erro->getLine()}"." / Erro SQL: ".$erro->getMessage()
    );
    $strJSON = json_encode($retorno);
    echo $strJSON;
    //
    }   
   endif;   
  } 

  public function update($nome, $cpfcnpj, $rg, $modified, $id){

   if (!empty($id) && !empty($nome) && !empty($cpfcnpj) && !empty($rg) && !empty($oab) && !empty($cep) && !empty($email) && !empty($celular)):   
    try{  
     $sql = "UPDATE usuarios SET nome=?, cpfcnpj=?, rg=?, modified=? WHERE ID=?";
    //print $sql;
    $stm = $this->pdo->prepare($sql);   
    $stm->bindValue(1, $nome);
    $stm->bindValue(2, $cpfcnpj);
    $stm->bindValue(3, $rg);
    $stm->bindValue(4, $modified);
    $stm->bindValue(5, $id); 
    $stm->execute();   
     //echo "<script>alert('Registro atualizado com sucesso')</script>";
     //echo json_encode(array('isError' => true,'isSms' => "Registro atualizado com sucesso",'isID' => "$id"));
    //
    $retorno = array(
        'codigo' => '0',
        'alerta' => 'success',
        'iconem' => '<i class="fas fa-check"></i>',
        'mensagem' => 'Registro atualizado com sucesso!'
    );
    $strJSON = json_encode($retorno);
    echo $strJSON;
    //
    }catch(PDOException $erro){
     //echo "<script>alert('Erro na linha: {$erro->getLine()}')</script>";
     //echo json_encode(array('isError' => false,'isSms' => "Erro na linha: {$erro->getLine()}"));
    //
    $retorno = array(
        'codigo' => '0',
        'alerta' => 'danger',
        'iconem' => '<i class="fas fa-check"></i>',
        'mensagem' => 'Erro ao atualizar registro'
        //'mensagem' => "ID: ".$id."/ Erro na linha: {$erro->getLine()}"." / Erro SQL: ".$erro->getMessage()
    );
    $strJSON = json_encode($retorno);
    echo $strJSON;
    //
    }
   endif;   
  }  
  
  public function delete($id){

   if (!empty($id)):   
    try{   
     $sql = "DELETE FROM usuarios WHERE ID=?";
    //print $sql;
    $stm = $this->pdo->prepare($sql);   
    $stm->bindValue(1, $id);   
    $stm->execute();
    //echo "<script>alert('Registro excluido com sucesso')</script>";
    //echo json_encode(array('isError' => true,'isSms' => "Registro excluido com sucesso",'isID' => "$id"));
    //
    $retorno = array(
        'codigo' => '0',
        'alerta' => 'success',
        'iconem' => '<i class="fas fa-check"></i>',
        'mensagem' => 'Registro excluido com sucesso!'
    );
    $strJSON = json_encode($retorno);
    echo $strJSON;
    //
    }catch(PDOException $erro){ 
    //
    //echo "<script>alert('Erro na linha: {$erro->getLine()}')</script>";
    //echo json_encode(array('isError' => false,'isSms' => "Erro na linha: {$erro->getLine()}"));
    //
    $retorno = array(
        'codigo' => '0',
        'alerta' => 'danger',
        'iconem' => '<i class="fas fa-check"></i>',
        'mensagem' => 'Erro ao excluir registro!'
        //'mensagem' => "Erro na linha: {$erro->getLine()}"." / Erro SQL: ".$erro->getMessage()
    );
    $strJSON = json_encode($retorno);
    echo $strJSON;
    //
    }   
   endif;   
  } 
  //
  public function getAllProdutos($inicio=null, $maximo=null, $pesquisa=null){
   try{
    $sql = "SELECT * FROM produtos WHERE produto LIKE '%$pesquisa%' ORDER BY produto ASC LIMIT $inicio, $maximo";
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
  //
  public function getTotalProdutos($pesquisa=null){
   try{
    $sql = "SELECT * FROM produtos WHERE produto LIKE '%$pesquisa%'";
    //print $sql;
    $stm = $this->pdo->prepare($sql);   
    $stm->execute();   
    $linha = $stm->rowCount(PDO::FETCH_OBJ);
    return $linha;   
   }catch(PDOException $erro){   
    //echo "<script>alert('Erro na linha: {$erro->getLine()}')</script>"; 
   }   
  }
  //
  public function getFind($valor=null){
   try{   
    $sql = "SELECT * FROM lista_de_produtos WHERE $valor";
    //print $sql;
    $stm = $this->pdo->prepare($sql);   
    $stm->execute();   
    $dados = $stm->fetchAll(PDO::FETCH_OBJ);   
    return $dados;   
   }catch(PDOException $erro){   
    //echo "<script>alert('Erro na linha: {$erro->getLine()}')</script>"; 
   }   
  } 
//
 }
 ?>