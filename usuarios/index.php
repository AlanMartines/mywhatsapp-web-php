<?php
if (session_status() !== PHP_SESSION_ACTIVE) {//Verificar se a sessão não já está aberta.
  session_start();
}
//
require_once('../login/verifica_sessao.php');
//
include_once ('../config.php');
include_once ('./functions.php');
include_once (HEADER_TEMPLATE);
//
$adv = adv::conectar(Conexao::conectar());
$clientes = $adv->getAll();
//
?>
<div class="row justify-content-center">
<div class="col-auto">
    <div class="row">
        <div class="col text-left">
          <legend>Usuário</legend>
    </div>
    <div class="col text-right">
	    	<a class="btn btn-sm btn-primary" href="add.php"><i class="fas fa-plus"></i> Novo Usuário</a>
	    	<a class="btn btn-sm btn-secondary" href="index.php"><i class="fas fa-sync-alt"></i> Atualizar</a>
    </div>
    </div>
<?php
if(isset($_SESSION['msg'])){
print  $_SESSION['msg'];
unset($_SESSION['msg']);
}
?>
<table id="org_tabela" class="table table-hover table-responsive">
  <thead class="thead-dark">
    <tr>
      <th scope="col" class="text-left">Usuário</th>
      <th scope="col">Celular</th>
      <th scope="col">Ação</th>
    </tr>
  </thead>
  <tbody>
<?php if ($clientes) : ?>
<?php foreach ($clientes as $cliente) : ?>
	<tr>
		<td class="text-left"><?php echo $cliente->nome; ?></td>
		<td class="text-center"><?php print $cliente->celular; ?></td>
		<td class="text-center">
			<a href="./info.php?id=<?php echo $cliente->ID; ?>" class="btn btn-sm btn-dark" title="Informações" ><i class="fas fa-info-circle"></i></a>
			<a href="edit.php?id=<?php echo $cliente->ID; ?>" class="btn btn-sm btn-warning" title="Editar" ><i class="fa fa-pencil"></i></a>
		    <a class="btn btn-sm btn-danger text-white show-alert-delete-user" data-iduser="<?php echo $cliente->ID; ?>" data-nomeuser="<?php echo $cliente->nome; ?>" title="Apagar" ><i class="fas fa-trash"></i></a>
		</td>
	</tr>
<?php endforeach; ?>
<?php else : ?>
<div class="alert alert-info text-center">
  <strong>Atenção!</strong> Nenhum registro encontrado.
</div>	
<?php endif; ?>
</tbody>
</table>
</div>
</div>
<?php include_once (FOOTER_TEMPLATE); ?>