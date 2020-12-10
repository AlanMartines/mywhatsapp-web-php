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
  
  public function getConfiguracao(){
   try{   
    $sql = "SELECT * FROM configuracao";
    //print $sql;
    $stm = $this->pdo->prepare($sql);   
    $stm->execute();   
    $dados = $stm->fetch(PDO::FETCH_OBJ);   
    return $dados;   
   }catch(PDOException $erro){   
    //echo "<script>alert('Erro na linha: {$erro->getLine()}')</script>"; 
   }   
  } 

 }
 ?>