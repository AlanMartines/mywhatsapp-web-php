<?php
//
function logMsg( $msg = null, $nivel = null, $alteracaoDe = null, $alteracaoPara = null )
{
    // variável que vai armazenar o nível do log (INFO, WARNING ou ERROR)
    $levelStr = '';
 
    // verifica o nível do log
    switch ( $nivel )
    {
        case 'info':
            // nível de informação
            $levelStr = 'INFORMAÇÃO';
            break;
 
        case 'warning':
            // nível de aviso
            $levelStr = 'ATENÇÃO';
            break;
            
        case 'sistema':
            // nível de erro
            $levelStr = 'SISTEMA';
            break;
 
        case 'update':
            // nível de erro
            $levelStr = 'ATUALIZAÇÃO';
            break;
 
        case 'delete':
            // nível de erro
            $levelStr = 'APAGADO';
            break;
 
        case 'select':
            // nível de erro
            $levelStr = 'CONSULTADO';
            break;
 
        case 'login':
            // nível de erro
            $levelStr = 'LOGADO';
            break;
 
        case 'logout':
            // nível de erro
            $levelStr = 'DESLOGADO';
            break;
            
        case 'error':
            // nível de erro
            $levelStr = 'ERRO';
            break;
    }
 
    // data atual
    $date = date( 'Y-m-d H:i:s' );
 
    // formata a mensagem do log
    // 1o: data atual
    // 2o: nível da mensagem (INFO, WARNING ou ERROR)
    // 3o: a mensagem propriamente dita
    // 4o: uma quebra de linha
    $msg = "[".date('d/m/Y H:i:s',strtotime($date))."] [$levelStr]: ".$msg.PHP_EOL;
 
    // escreve o log no arquivo
    // é necessário usar FILE_APPEND para que a mensagem seja escrita no final do arquivo, preservando o conteúdo antigo do arquivo
    //file_put_contents( $file, $msg, FILE_APPEND );
    print "<pre>".$msg."</pre>";
}
//
//logMsg( "A operação X pode falhar...", 'info' );
//
?>