<?php
if (session_status() == PHP_SESSION_NONE) :
    session_start();
endif;
//
//if(!isset($_SESSION['logado']) && $_SESSION['logado'] !== true):
//	header("Location: ../login/");
//endif;
//
include_once ('../config.php');
include_once (HEADER_TEMPLATE);
//
?>
<form class="text-center" id="usuarios-form" method="post" action="javascript:void(0)">
<div class="row d-flex justify-content-center">
		<div class="col-md-12 text-center">
			<legend>Alterar senha</legend>
		</div>
            <div class="col-md-4 text-left">
            	
			<div class="form-group col-md-12">
				<label class="control-label" for="nome">Sua senha: </label>
				<span class="r">*</span>
				<div class="input-group" id="show_hide_password">
					<div class="input-group-prepend">
						<div class="input-group-text">
							<i class="fas fa-key"></i>
						</div>
					</div>
					<input type="password" class="rounded form-control" name="old_senha" id="old_senha" placeholder="Senha atual" />
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <i class="fas fa-eye-slash"></i>
                            </span>
                        </div>
				</div>
				<span class="help-block r" id="error"></span>
			</div>
			<div class="form-group col-md-12">
				<label class="control-label" for="nome">Nova senha: </label>
				<span class="r">*</span>
				<div class="input-group" id="show_hide_new">
					<div class="input-group-prepend">
						<div class="input-group-text">
							<i class="fas fa-lock"></i>
						</div>
					</div>
					<input type="password" class="rounded form-control" name="senha" id="senha" placeholder="Nova senha" />
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <i class="fas fa-eye-slash"></i>
                            </span>
                        </div>
				</div>
				<span class="help-block r" id="error"></span>
			</div>
			    <div class="form-group col-md-6">
					    <input type="hidden" class="form-control" name="id" id="id" value="<?php print $_SESSION['id_user']; ?>" readonly="readonly" />
			    </div>
			    <div class="form-group col-md-6">
					    <input type="hidden" class="form-control" name="action" id="action" value="TrocarSenha" readonly="readonly" />
			    </div>

			<center>
				<div class="form-group col-md-12">
					<button type="submit" name="send_form" id="send_form" class="btn btn-success">Alterar senha</button>
				</div>
			</center>
		</div>
    </div>
</form>
<?php include_once(FOOTER_TEMPLATE); ?>