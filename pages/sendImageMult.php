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
		<form class="text-center" id="sendFileImgMassa-form" method="post" action="javascript:void(0)">
			<div class="card border-warning mb-3">
				<div class="card-header text-white bg-warning font-weight-bold text-center">Enviar Imagem / Contato em
					massa</div>
				<div class="card-body text-warning text-center ">
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
								<i class="fas fa-phone"></i>
							</div>
						</div>
						<div class="custom-file">
							<input type="file" accept=".txt, .csv" class="rounded form-control custom-file-input"
								name="sendImageMassaContato" id="sendImageMassaContato" />
							<label class="custom-file-label" for="sendImageMassaContato"
								id="sendImageMassaContato-label">Selecione o arquivo de contatos...</label>
						</div>
						<br>
						<input type="hidden" name="fileNamesendImageMassaContato" id="fileNamesendImageMassaContato" />
						<div class="valid-feedback feedback-icon">
							<i class="fas fa-check"></i>
						</div>
						<div class="invalid-feedback feedback-icon">
							<i class="fas fa-times"></i>
						</div>
					</div>
					<span class="help-block r" id="error"></span>
				</div>
				<div class="form-group col-12">
					<div class="input-group">
						<div class="input-group-prepend">
							<div class="input-group-text">
								<i class="fas fa-file-import"></i>
							</div>
						</div>
						<div class="custom-file">
							<input type="file" accept="image/*" class="rounded form-control custom-file-input"
								name="FileImageMassa" id="FileImageMassa" />
							<label class="custom-file-label" for="FileImageMassa" id="FileImageMassa-label">Selecione o
								arquivo...</label>
						</div>
						<br>
						<input type="hidden" name="FileNameImageMassa" id="FileNameImageMassa" />
						<div class="valid-feedback feedback-icon">
							<i class="fas fa-check"></i>
						</div>
						<div class="invalid-feedback feedback-icon">
							<i class="fas fa-times"></i>
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
						<textarea class="rounded form-control" name="msgimgmass" id="msgimgmass" rows="3"
							placeholder="Menssagem"></textarea>
					</div>
					<span class="help-block r" id="error"></span>
				</div>

			</div>
			<div class="card-footer text-muted text-center">
				<button type="submit" name="sendFileImgMassa" id="sendFileImgMassa" class="btn btn-sm btn-primary"><i
						class="fas fa-paper-plane"></i> Enviar</button>
			</div>
	</div>
	</form>
</div>
</div>
<!-- Modal -->
<div class="modal fade" id="sendImageMassaModalCentralizado" tabindex="-1" role="dialog"
	aria-labelledby="TituloModalCentralizado" data-keyboard="false" data-backdrop="static" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header bg-success">
				<h5 class="modal-title" id="TituloModalCentralizado">Resumo dos envios</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<legend>Success</legend>
				<table class="table table-striped table-hover">
					<thead class="thead-dark">
						<tr>
							<th scope="col">Numero</th>
							<th scope="col">Status</th>
						</tr>
					</thead>
					<tbody id='table_success'></tbody>
				</table>
				<br>
				<legend>Erros</legend>
				<table class="table table-striped table-hover">
					<thead class="thead-dark">
						<tr>
							<th scope="col">Numero</th>
							<th scope="col">Status</th>
						</tr>
					</thead>
					<tbody id='table_error'></tbody>
				</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
			</div>
		</div>
	</div>
</div>