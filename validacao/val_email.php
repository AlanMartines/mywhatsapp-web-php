<?php
//
header('Content-type:application/json;charset=utf-8');
//
if(isset($_POST["email"]) && !empty($_POST["email"]))
{
#Recebe
$email = $_POST["email"];
	//verifica se e-mail esta no formato correto de escrita
	if (!preg_match("/^([0-9,a-z,A-Z]+)([.,_]([0-9,a-z,A-Z]+))*[@]([0-9,a-z,A-Z]+)([.,_,-]([0-9,a-z,A-Z]+))*[.]([0-9,a-z,A-Z]){2}([0-9,a-z,A-Z])?$/",$email)){
		//$mensagem='E-mail Inv&aacute;lido!';
		print json_encode(array('isError' => false,'isMsg' => 'E-mail invalido!'));
    }
    else{
		//Valida o dominio
		$dominio=explode('@',$email);
		if(!checkdnsrr($dominio[1],'A')){
			//$mensagem='E-mail Inv&aacute;lido!';
			print json_encode(array('isError' => false,'isMsg' => 'Dominio do e-mail invalido!'));
		}
		else{print json_encode(array('isError' => true,'isMsg' => 'E-mail valido!'));} // Retorno true para indicar que o e-mail é valido
	}
}
//
?>