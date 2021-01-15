<?php
//
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL);
//
/* Redirect browser */
header("Location: ./home/");
//die('Não ignore meu cabeçalho...');
exit();
