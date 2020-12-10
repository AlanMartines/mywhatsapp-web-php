<?php
if (session_status() == PHP_SESSION_NONE) :
    session_start();
endif;
//
if(!isset($_SESSION['logado']) && $_SESSION['logado'] !== true):
	header("Location: ../login/");
endif;
//
include_once('../config.php');
include_once(HEADER_TEMPLATE);
//
?>

<form class="text-center" id="usuarios-form" method="post" action="javascript:void(0)">
<div class="row d-flex justify-content-center">
		<div class="col-md-12 text-center">
			<legend>Alterar email</legend>
		</div>
        </div>
        <div id="mensagem"></div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-4 text-left">
			<div class="form-group">
				<label class="control-label" for="nome">Novo email: </label>
				<span class="r">*</span>
				<div class="input-group">
					<div class="input-group-prepend">
						<div class="input-group-text">
							<i class="fas fa-envelope"></i>
						</div>
					</div>
					<input type="text" class="form-control" name="email" id="email" placeholder="Digite seu novo email" />
					<div class="valid-feedback feedback-icon">
						<i class="fas fa-check"></i>
					</div>
					<div class="invalid-feedback feedback-icon">
						<i class="fas fa-times"></i>
					</div>
				</div>
				<span class="help-block r" id="error"></span>
			</div>
			<div class="form-group">
				<label class="control-label" for="nome">Confirmar novo email: </label>
				<span class="r">*</span>
				<div class="input-group">
					<div class="input-group-prepend">
						<div class="input-group-text">
							<i class="fas fa-envelope"></i>
						</div>
					</div>
					<input type="text" class="form-control" name="cemail" id="cemail" placeholder="Confirme seu novo email" />
					<div class="valid-feedback feedback-icon">
						<i class="fas fa-check"></i>
					</div>
					<div class="invalid-feedback feedback-icon">
						<i class="fas fa-times"></i>
					</div>
				</div>
				<span class="help-block r" id="error"></span>
			</div>
			<div class="form-row">
			    <div class="form-group col-md-6">
					    <input type="hidden" class="form-control" name="id" id="id" value="<?php print $_SESSION['id_user']; ?>" readonly="readonly" />
			    </div>
			</div>
			    <div class="form-group col-md-6">
					    <input type="hidden" class="form-control" name="action" id="action" value="TrocarEmail" readonly="readonly" />
			    </div>
			<center>
				<div class="form-group col-md-12">
					<button type="submit" name="send_form" id="send_form" class="btn btn-success">Alterar email</button>
				</div>
			</center>
		</div>
    </div>
</div>
</form>
<?php include_once(FOOTER_TEMPLATE); ?>