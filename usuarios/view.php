<?php 
  require_once('../config.php');
  //http://rafaelcouto.com.br/envio-de-formulario-sem-refresh-com-jquery-php/
include(HEADER_TEMPLATE); 

?>
<header>
	<div class="row">
		<div class="col-sm-6">
			<legend>Informações</legend>
		</div>
		<div class="col-sm-6 text-right">
	    	<a class="btn btn-sm btn-primary" href="add.php"><i class="fa fa-plus"></i> Novo Cliente</a>
	        <a class="btn btn-sm btn-secondary" href="./"><i class="fa fa-list"></i> Lista de clientes</a>
	    </div>
	</div>
</header>
  <div class="p-2 mb-2 bg-white rounded shadow">
    <!-- Rounded tabs -->
    <ul id="myTab" role="tablist" class="nav nav-tabs nav-pills flex-column flex-sm-row text-center bg-light rounded-nav">
      <li class="nav-item flex-sm-fill">
        <a id="Cliente-tab" data-toggle="tab" href="#Cliente" role="tab" aria-controls="Cliente" aria-selected="true" class="nav-link border-0 active"><i class="fas fa-user-tie"></i> Cliente</a>
      </li>
      <li class="nav-item flex-sm-fill">
        <a id="Processos-tab" data-toggle="tab" href="#Processos" role="tab" aria-controls="Processos" aria-selected="false" class="nav-link"><i class="fab fa-elementor"></i> Processos</a>
      </li>
      <li class="nav-item flex-sm-fill">
        <a id="Beneficiarios-tab" data-toggle="tab" href="#Beneficiarios" role="tab" aria-controls="Beneficiarios" aria-selected="false" class="nav-link"><i class="fas fa-baby"></i> Beneficiários</a>
      </li>
      <li class="nav-item flex-sm-fill">
        <a id="Documentos-tab" data-toggle="tab" href="#Documentos" role="tab" aria-controls="Documentos" aria-selected="false" class="nav-link"><i class="fas fa-file-contract"></i> Documentos</a>
      </li>
      <li class="nav-item flex-sm-fill">
        <a id="Agendamentos-tab" data-toggle="tab" href="#Agendamentos" role="tab" aria-controls="Agendamentos" aria-selected="false" class="nav-link"><i class="far fa-calendar-check"></i> Agendamentos</a>
      </li>
      <li class="nav-item flex-sm-fill">
        <a id="Interacoes-tab" data-toggle="tab" href="#Interacoes" role="tab" aria-controls="Interacoes" aria-selected="false" class="nav-link"><i class="fas fa-phone-volume"></i> Interações</a>
      </li>
      <li class="nav-item flex-sm-fill">
        <a id="Financeiro-tab" data-toggle="tab" href="#Financeiro" role="tab" aria-controls="Financeiro" aria-selected="false" class="nav-link"><i class="fas fa-hand-holding-usd"></i> Financeiro</a>
      </li>
    </ul>
    <div id="myTabContent" class="tab-content">
      <div id="Cliente" role="tabpanel" aria-labelledby="Cliente-tab" class="tab-pane fade px-4 py-5 show active">
        <p class="text-muted mb-0">
            Cliente
        </p>
      </div>
      <div id="Processos" role="tabpanel" aria-labelledby="Processos-tab" class="tab-pane fade px-4 py-5">
        <p class="text-muted mb-0">
            Processos
        </p>
      </div>
      <div id="Beneficiarios" role="tabpanel" aria-labelledby="Beneficiarios-tab" class="tab-pane fade px-4 py-5">
        <p class="text-muted mb-0">
            Beneficiários
        </p>
      </div>
      <div id="Documentos" role="tabpanel" aria-labelledby="Documentos-tab" class="tab-pane fade px-4 py-5">
        <p class="text-muted mb-0">
            Documentos
        </p>
      </div>
      <div id="Agendamentos" role="tabpanel" aria-labelledby="Agendamentos-tab" class="tab-pane fade px-4 py-5">
        <p class="text-muted mb-0">
            Agendamentos
        </p>
      </div>
      <div id="Interacoes" role="tabpanel" aria-labelledby="Interacoes-tab" class="tab-pane fade px-4 py-5">
        <p class="text-muted mb-0">
            Interações
        </p>
      </div>
      <div id="Financeiro" role="tabpanel" aria-labelledby="Financeiro-tab" class="tab-pane fade px-4 py-5">
        <p class="text-muted mb-0">
            Financeiro
        </p>
      </div>
    </div>
    <!-- End rounded tabs -->
  </div>
  
<?php include(FOOTER_TEMPLATE); ?>