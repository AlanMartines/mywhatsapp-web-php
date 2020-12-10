<?php
//
//https://pt.stackoverflow.com/questions/3571/qual-a-melhor-maneira-de-criar-um-sistema-de-login-com-php
//
// Time zone
setlocale(LC_TIME, 'pt_BR.utf8');
date_default_timezone_set('America/Sao_Paulo');
//
//RECAPTCHA_V3_SECRET_KEY
if (!defined('RECAPTCHA_V3_SECRET_KEY'))
	define('RECAPTCHA_V3_SECRET_KEY', '6LceYwEaAAAAAHc_7sKnBAQXddFMXk-s5HVVu-hg');
//
/** pasta absoluta do sistema **/
if (!defined('ABSPAST'))
	define('ABSPAST', basename(__DIR__));
//	
/** caminho absoluto para a pasta do sistema **/
if (!defined('ABSPATH'))
	define('ABSPATH', dirname(__FILE__) . '/');
//
/** caminho no server para o sistema **/
if (!defined('BASEURL'))
	define('BASEURL', '/dpvat/');
//
/** caminho do arquivo de banco de dados **/
if (!defined('DBAPI'))
	define('DBAPI', ABSPATH . 'inc/conexao.php');
//
//
/** caminho do arquivo de log **/
if (!defined('LOGAPI'))
	define('LOGAPI', ABSPATH . 'logs/log.php');
//
/** caminhos dos templates de header e footer **/
define('HEADER_TEMPLATE', ABSPATH . 'inc/header.php');
define('FOOTER_TEMPLATE', ABSPATH . 'inc/footer.php');
//
