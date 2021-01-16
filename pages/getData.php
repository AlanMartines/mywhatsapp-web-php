<?php
require_once('../config.php');
require_once(HEADER_TEMPLATE);
//
?>

<center>
	<div class="card border-secondary text-center mb-3" style="max-width: 32rem;">
		<div class="card-header text-white bg-secondary font-weight-bold text-center">My Whats</div>
		<div class="card-body text-secondary text-center align-items-center">
			<div class="row d-flex justify-content-center">
				<div class="col-md-6 text-center">
					<span id="qrcodeVenon"></span>
				</div>
				<div class="col-md-6 text-left">
					<strong>Serviço.........: </strong><span id="statusVenon"></span>
					<br>
					<strong>Status...........: </strong><span id="startVenom"></span>
					<br>
					<strong>Contato.......: </strong><span id="contatoVenon"></span>
					<br>
					<strong>Wa Versão...: </strong><span id="waversaoVenon"></span>
					<br>
					<strong>Plataforma..: </strong><span id="sistemaVenon"></span>
					<br>
					<strong>Bateria.........: </strong><span id="bateriaVenon"></span>
					<br>
					<strong>Carregador..: </strong><span id="carregadorVenon"></span>
				</div>
			</div>
		</div>
		<div class="card-footer text-muted text-center">
			<div class="row d-flex justify-content-center">
				<div class="col-md-4 text-center">
					<button id="starVenon" type="button" class="btn btn-sm btn-success">Iniciar</button>
				</div>
				<div class="col-md-4 text-center">
					<button id="restarVenon" type="button" class="btn btn-sm btn-warning">Reiniciar</button>
				</div>
				<div class="col-md-4 text-center">
					<button id="desconectarVenon" type="button" class="btn btn-sm btn-danger">Desconectar</button>
				</div>
			</div>
		</div>
	</div>
</center>
<div class="row d-flex justify-content-center">
	<div class="col-sm-12">
		<div class="card border-info mb-3">
			<div class="card-header text-white bg-info font-weight-bold text-center">
				<button id="getBlockList" type="button" class="btn btn-sm btn-success"><i class="fas fa-paper-plane"></i> Listar Bloqueados</button>
				<button id="getAllContacts" type="button" class="btn btn-sm btn-warning"><i class="fas fa-paper-plane"></i> Listar Contatos</button>
				<button id="getAllGroups" type="button" class="btn btn-sm btn-danger"><i class="fas fa-paper-plane"></i>
					Listar Grupos</button>
			</div>
			<div class="card-body text-secondary text-center align-items-center">
				<div class="col-md-12 text-center">
					<div class="form-group col-12 text-center">
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text">
									<i class="fas fa-user-secret"></i>
								</div>
							</div>
							<input type="text" class="rounded form-control text-center" name="SessionName" id="SessionName" value="BotClient" readonly="true" />
						</div>
					</div>
				</div>
				<span id="table_success"></span>
				<br>
			</div>
			<div class="card-footer text-muted text-center"></div>
		</div>
	</div>

</div>

<?php
include_once(FOOTER_TEMPLATE);
?>