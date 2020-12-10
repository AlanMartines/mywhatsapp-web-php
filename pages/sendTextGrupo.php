<center>
	<div class="card border-secondary text-center mb-3" style="max-width: 32rem;">
		<div class="card-header text-white bg-secondary font-weight-bold text-center">My Whats</div>
		<div class="card-body text-secondary text-center align-items-center">
			<div class="row d-flex justify-content-center">
				<div class="col-md-5 text-center">
					<span id="qrcodeVenon"></span>
				</div>
				<div class="col-md-5 text-left">
					<strong>Serviço....: </strong><span id="statusVenon"></span>
					<br>
					<strong>Status......: </strong><span id="startVenom"></span>
					<br>
					<strong>Contatos.: </strong>
					<br>
					<strong>Grupos....: </strong>
					<br>
					<strong>Chat.........: </strong>
				</div>
			</div>
		</div>
		<div class="card-footer text-muted text-center">
			<form class="text-center" id="venombot-form" method="post" enctype="multipart/form-data"
				action="javascript:void(0)">
				<button id="starVenon" type="button" class="btn btn-sm btn-success">Iniciar</button>
				<button id="restarVenon" type="button" class="btn btn-sm btn-warning">Reiniciar</button>
				<button id="closeVenon" type="button" class="btn btn-sm btn-danger">Sair</button>
			</form>
		</div>

	</div>
</center>
<div class="row d-flex justify-content-center">
	<div class="col-sm-10">
		<form class="text-center" id="sendTextGrupo-form" method="post" action="javascript:void(0)">
			<div class="card border-primary mb-3">
				<div class="card-header text-white bg-primary font-weight-bold text-center">Enviar Texto / Grupo</div>
				<div class="card-body text-warning text-center ">
					<div class="col-md-12 text-center">
						<div class="form-group col-12 text-center">
							<div class="input-group">
								<div class="input-group-prepend">
									<div class="input-group-text">
										<i class="fas fa-user-secret"></i>
									</div>
								</div>
								<input type="text" class="rounded form-control text-center" name="SessionName"
									id="SessionName" value="BotClient" readonly="true" />
							</div>
						</div>
					</div>
					<div class="form-group col-12">
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text">
									<i class="fas fa-layer-group"></i>
								</div>
							</div>
							<select class="custom-select rounded form-control" name="TextGrupo" id="TextGrupo">
							</select>
							<div class="input-group-append">
								<button type="button" class="rounded btn btn-dark" id="BotaoGrupoText"
									name="BotaoGrupoText">Carregar Grupos</button>
							</div>
						</div>
						<span class="help-block r" id="error"></span>
					</div>
					<div class="form-group col-12">
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text">
									<i class="fas fa-comment-alt"></i>
								</div>
							</div>
							<textarea class="rounded form-control" name="TextGrupoMsg" id="TextGrupoMsg" rows="5"
								placeholder="Menssagem"></textarea>
						</div>
						<span class="help-block r" id="error"></span>
					</div>
				</div>
				<div class="card-footer text-muted text-center">
					<button type="submit" name="sendTextGrupo" id="sendTextGrupo" class="btn btn-sm btn-primary"><i
							class="fas fa-paper-plane"></i> Enviar</button>
				</div>
			</div>
		</form>
	</div>

</div>