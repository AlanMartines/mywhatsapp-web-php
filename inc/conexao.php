<?php
//
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL);
//
/*   
  * Constantes de parâmetros para configuração da conexão
  */
define('HOST', 'localhost');
define('DBNAME', 'mywhats');
define('CHARSET', 'utf8');
define('USER', 'mywhats');
define('PASSWORD', '1234567890');
//
class Conexao
{
  /*   
   * Atributo estático para instância do PDO   
   */
  private static $pdo;

  /*Método construtor do banco de dados*/
  private function __construct()
  {
  }

  /*Evita que a classe seja clonada*/
  private function __clone()
  {
  }

  /*Método que destroi a conexão com banco de dados e remove da memória todas as variáveis setadas*/
  public function __destruct()
  {
    $this->disconnect();
    foreach ($this as $key => $value) {
      unset($this->$key);
    }
  }
  /*   
   * Método estático para retornar uma conexão válida   
   * Verifica se já existe uma instância da conexão, caso não, configura uma nova conexão   
   */
  public static function conectar()
  {
    if (!isset(self::$pdo)) {
      try {
        $opcoes = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8', PDO::ATTR_PERSISTENT => TRUE);
        self::$pdo = new PDO("mysql:host=" . HOST . "; dbname=" . DBNAME . "; charset=" . CHARSET . ";", USER, PASSWORD, $opcoes);
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch (PDOException $e) {
        print "Erro: " . $e->getMessage();
      }
    }
    return self::$pdo;
  }
  private function disconnect()
  {
    self::$pdo = null;
  }
}
