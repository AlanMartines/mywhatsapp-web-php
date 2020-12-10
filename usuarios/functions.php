<?php
/* Informa o nível dos erros que serão exibidos */
error_reporting(E_ALL);
 
/* Habilita a exibição de erros */
ini_set("display_errors", 1);
// http://www.devwilliam.com.br/php/crud-no-php-com-pdo-e-mysql
// http://bootboxjs.com/
require_once('../config.php');
require_once(DBAPI);
/*  
 * Classe para operações CRUD na tabela ARTIGO   
 */
class adv{
 
  /*  
   * Atributo para conexão com o banco de dados   
   */  
  private $pdo = null;  
 
  /*  
   * Atributo estático para instância da própria classe    
   */  
  private static $crudAdv = null; 
  
  /*  
   * Atributo estático para instância da tabela    
   */  
  private static  $strTabela = null;
  
  /*  
   * Construtor da classe como private  
   * @param $conexao - Conexão com o banco de dados  
   */  
  private function __construct($conexao){  
    $this->pdo = $conexao;  
  }

  /*
  * Método estático para retornar um objeto crudBlog    
  * Verifica se já existe uma instância desse objeto, caso não, instância um novo    
  * @param $conexao - Conexão com o banco de dados   
  * @return $crudAdv - Instancia do objeto crudBlog    
  */   
  public static function conectar($conexao){   
   if (!isset(self::$crudAdv)):    
    self::$crudAdv = new adv($conexao);   
   endif;   
   return self::$crudAdv;    
  }
  
  /*   
  * Metodo para inclusão de novos registros   
  * @param $categoria - Valor para o campo categoria   
  * @param $titulo - Valor para o campo titulo   
  * @param autor  - Valor para o campo autor   
  */   
  public function insert($nome, $cpfcnpj, $rg, $org_emissor, $oab, $cep, $uf, $cidade, $rua, $numero, $bairro, $complemento, $email, $senha, $token, $keymaster, $celular, $telefone, $perfil, $active, $operadora, $endip, $created, $modified){

   if (!empty($nome) && !empty($cpfcnpj) && !empty($rg) && !empty($oab) && !empty($cep) && !empty($email) && !empty($senha) && !empty($celular)):   
    try{   
     $sql = "INSERT INTO usuarios (nome, cpfcnpj, rg, org_emissor, oab, cep, uf, cidade, rua, numero, bairro, complemento, email, senha, token, keymaster, celular, telefone, perfil, active, operadora, endip, created, modified) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    //print $sql;
    $stm = $this->pdo->prepare($sql);   
    $stm->bindValue(1, $nome);
    $stm->bindValue(2, $cpfcnpj);
    $stm->bindValue(3, $rg);
    $stm->bindValue(4, $org_emissor);
    $stm->bindValue(5, $oab);
    $stm->bindValue(6, $cep);
    $stm->bindValue(7, $uf);
    $stm->bindValue(8, $cidade);
    $stm->bindValue(9, $rua);
    $stm->bindValue(10, $numero);
    $stm->bindValue(11, $bairro);
    $stm->bindValue(12, $complemento);
    $stm->bindValue(13, $email);
    $stm->bindValue(14, $senha);
    $stm->bindValue(15, $token);
    $stm->bindValue(16, $keymaster);
    $stm->bindValue(17, $celular);
    $stm->bindValue(18, $telefone);
    $stm->bindValue(19, $perfil);
    $stm->bindValue(20, $active);
    $stm->bindValue(21, $operadora);
    $stm->bindValue(22, $endip);
    $stm->bindValue(23, $created);
    $stm->bindValue(24, $modified);
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
 
  /*   
  * Metodo para edição de registros   
  * @param $categoria - Valor para o campo categoria   
  * @param $titulo - Valor para o campo titulo   
  * @param autor  - Valor para o campo autor   
  * @param id   - Valor para o campo id
  * Ex: $sql = "UPDATE tabela SET categoria=?, titulo=?, autor=? WHERE idArtigo=?";
  */   
  public function update($nome, $cpfcnpj, $rg, $org_emissor, $oab, $cep, $uf, $cidade, $rua, $numero, $bairro, $complemento, $email, $celular, $telefone, $perfil, $active, $operadora, $endip, $modified, $id){

   if (!empty($id) && !empty($nome) && !empty($cpfcnpj) && !empty($rg) && !empty($oab) && !empty($cep) && !empty($email) && !empty($celular)):   
    try{  
     $sql = "UPDATE usuarios SET nome=?, cpfcnpj=?, rg=?, org_emissor=?, oab=?, cep=?, uf=?, cidade=?, rua=?, numero=?, bairro=?, complemento=?, email=?, celular=?, telefone=?, perfil=?, active=?, operadora=?, endip=?, modified=? WHERE ID=?";
    //print $sql;
    $stm = $this->pdo->prepare($sql);   
    $stm->bindValue(1, $nome);
    $stm->bindValue(2, $cpfcnpj);
    $stm->bindValue(3, $rg);
    $stm->bindValue(4, $org_emissor);
    $stm->bindValue(5, $oab);
    $stm->bindValue(6, $cep);
    $stm->bindValue(7, $uf);
    $stm->bindValue(8, $cidade);
    $stm->bindValue(9, $rua);
    $stm->bindValue(10, $numero);
    $stm->bindValue(11, $bairro);
    $stm->bindValue(12, $complemento);
    $stm->bindValue(13, $email);
    $stm->bindValue(14, $celular);
    $stm->bindValue(15, $telefone);
    $stm->bindValue(16, $perfil);
    $stm->bindValue(17, $active);
    $stm->bindValue(18, $operadora);
    $stm->bindValue(19, $endip);
    $stm->bindValue(20, $modified);
    $stm->bindValue(21, $id); 
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
 
  /*   
  * Metodo para exclusão de registros   
  * @param id - Valor para o campo id   
  */   
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
 
  /*   
  * Metodo para consulta de artigos   
  * @return $dados - Array com os registros retornados pela consulta   
  */   
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
  /*   
  * Metodo para consulta de artigos   
  * @return $dados - Array com os registros retornados pela consulta   
  */   
  public function getFind($tabela=null, $valor=null){

   try{   
    $sql = "SELECT * FROM usuarios WHERE $valor";
    //print $sql;
    $stm = $this->pdo->prepare($sql);   
    $stm->execute();   
    $dados = $stm->fetchAll(PDO::FETCH_OBJ);   
    return $dados;   
   }catch(PDOException $erro){   
    //echo "<script>alert('Erro na linha: {$erro->getLine()}')</script>"; 
   }   
  } 
  /*   
  * Metodo para consulta de artigos   
  * @return $dados - Array com os registros retornados pela consulta   
  */   
  public function getCount(){

   try{   
    $sql = "SELECT * FROM usuarios"; 
    //print $sql;
    $stm = $this->pdo->prepare($sql);   
    $stm->execute();   
    $linha = $stm->rowCount(PDO::FETCH_OBJ);
    return $linha;   
   }catch(PDOException $erro){   
    //echo "<script>alert('Erro na linha: {$erro->getLine()}')</script>"; 
   }   
  }
  /*   
  * Metodo para consulta de artigos   
  * @return $dados - Array com os registros retornados pela consulta   
  */   
  public function getCountSelect($valor=null){

   try{   
    $sql = "SELECT * FROM usuarios WHERE $valor"; 
    //print $sql;
    $stm = $this->pdo->prepare($sql);   
    $stm->execute();   
    $linha = $stm->rowCount(PDO::FETCH_OBJ);
    return $linha;
    //echo "<script>alert('Registros: {$linha}')</script>";
   }catch(PDOException $erro){   
    //echo "<script>alert('Erro na linha: {$erro->getLine()}')</script>"; 
   }   
  }
  public function updateSenha($senha, $id){
      
   if (!empty($id) && !empty($senha)):   
    try{  
     $sql = "UPDATE usuarios SET senha=? WHERE ID=?";
    //print $sql;
    $stm = $this->pdo->prepare($sql);   
    $stm->bindValue(1, $senha);
    $stm->bindValue(2, $id); 
    $stm->execute();   
     //echo "<script>alert('Registro atualizado com sucesso')</script>";
     //echo json_encode(array('isError' => true,'isSms' => "Registro atualizado com sucesso",'isID' => "$id"));
    //
    $retorno = array(
        'codigo' => '0',
        'alerta' => 'success',
        'iconem' => '<i class="fas fa-check"></i>',
        'mensagem' => 'Senha atualizada com sucesso!'
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
        'iconem' => '<i class="fas fa-times"></i>',
        'mensagem' => 'Erro ao atualizar senha.'
        //'mensagem' => "ID: ".$id."/ Erro na linha: {$erro->getLine()}"." / Erro SQL: ".$erro->getMessage()
    );
    $strJSON = json_encode($retorno);
    echo $strJSON;
    //
    }
   endif;   
  }
//
  public function updateEmail($novo_email, $id){
      
   if (!empty($id) && !empty($novo_email)):   
    try{  
    $sql = "UPDATE usuarios SET email=? WHERE ID=?";
    //print $sql;
    $stm = $this->pdo->prepare($sql);   
    $stm->bindValue(1, $novo_email);
    $stm->bindValue(2, $id); 
    $stm->execute();   
     //echo "<script>alert('Registro atualizado com sucesso')</script>";
     //echo json_encode(array('isError' => true,'isSms' => "Registro atualizado com sucesso",'isID' => "$id"));
    //
    $retorno = array(
        'codigo' => '0',
        'alerta' => 'success',
        'iconem' => '<i class="fas fa-check"></i>',
        'mensagem' => 'E-mail atualizado com sucesso!'
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
        'iconem' => '<i class="fas fa-times"></i>',
        'mensagem' => 'Erro ao atualizar e-mail'
        //'mensagem' => "ID: ".$id."/ Erro na linha: {$erro->getLine()}"." / Erro SQL: ".$erro->getMessage()
    );
    $strJSON = json_encode($retorno);
    echo $strJSON;
    //
    }
   endif;   
  }
 }
 ?>