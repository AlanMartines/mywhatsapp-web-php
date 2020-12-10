<?php
    require_once('../config.php');
    require_once('./functions.php');
    $strPasta = basename(__DIR__);
    
    $adv = adv::conectar(Conexao::conectar());
    $strID = $_GET["id"];
    $usuarios = $adv->getFind("usuarios", "ID='$strID'");
    include(HEADER_TEMPLATE);
?>

<?php if ($usuarios) : ?>
<?php foreach ($usuarios as $usuario) : ?>
<form class="text-center" id="usuarios-form" method="post" action="javascript:void(0)">
<div class="row d-flex justify-content-center">
		<div class="col-md-6 text-center">
			<legend>Cadastro</legend>
		</div>
		<div class="col-md-6 text-center">
			<a class="btn btn-sm btn-secondary" href="./">
				<i class="fas fa-list"></i> Lista de Usiários
			</a>
		</div>
        </div>
        <div id="mensagem"></div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-6 text-left">
			<div class="form-group">
				<label class="control-label" for="nome">Nome Completo: </label>
				<span class="r">*</span>
				<div class="input-group">
					<div class="input-group-prepend">
						<div class="input-group-text">
							<i class="fas fa-user"></i>
						</div>
					</div>
					<input type="text" class="form-control" name="nome" id="nome" value="<?php print $usuario->nome; ?>" />
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
				<div class="form-group col-md-5">
					<label class="control-label">CPF/CNPJ: </label>
					<span class="r">*</span>
					<div class="input-group">
						<div class="input-group-prepend">
							<div class="input-group-text">
								<i class="fas fa-id-card"></i>
							</div>
						</div>
						<input type="text" class="mask-cpfcnpj form-control" name="ecpfcnpj" id="ecpfcnpj" value="<?php print $usuario->cpfcnpj; ?>" readonly />
						<div class="valid-feedback feedback-icon">
							<i class="fas fa-check"></i>
						</div>
						<div class="invalid-feedback feedback-icon">
							<i class="fas fa-times"></i>
						</div>
					</div>
					<span class="help-block r" id="error"></span>
				</div>
				<div class="form-group col-md-4">
					<label class="control-label">RG: </label>
					<span class="r">*</span>
					<div class="input-group">
						<div class="input-group-prepend">
							<div class="input-group-text">
								<i class="far fa-id-card"></i>
							</div>
						</div>
						<input type="text" class="mask-rg form-control" name="erg" id="erg" value="<?php print $usuario->rg; ?>" readonly />
						<div class="valid-feedback feedback-icon">
							<i class="fas fa-check"></i>
						</div>
						<div class="invalid-feedback feedback-icon">
							<i class="fas fa-times"></i>
						</div>
					</div>
					<span class="help-block r" id="error"></span>
				</div>
				<div class="form-group col-md-3">
					<label class="control-label">Orgão Emissor: </label>
					<span class="r">*</span>
					<div class="input-group">
						<div class="input-group-prepend">
							<div class="input-group-text">
								<i class="far fa-id-card"></i>
							</div>
						</div>
						<input type="text" class="form-control" name="org_emissor" id="org_emissor" style="text-transform:uppercase;" value="<?php print $usuario->org_emissor; ?>" />
						<div class="valid-feedback feedback-icon">
							<i class="fas fa-check"></i>
						</div>
						<div class="invalid-feedback feedback-icon">
							<i class="fas fa-times"></i>
						</div>
					</div>
						<span class="help-block r" id="error"></span>
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label class="control-label">OAB: </label>
					<span class="r">*</span>
					<div class="input-group">
						<div class="input-group-prepend">
							<div class="input-group-text">
								<i class="fas fa-flag"></i>
							</div>
						</div>
						<input type="text" class="mask-oab form-control" name="eoab" id="eoab" value="<?php print $usuario->oab; ?>" readonly />
						<div class="valid-feedback feedback-icon">
							<i class="fas fa-check"></i>
						</div>
						<div class="invalid-feedback feedback-icon">
							<i class="fas fa-times"></i>
						</div>
					</div>
					<span class="help-block r" id="error"></span>
				</div>
				<div class="form-group col-md-6">
					<label class="control-label">CEP: </label>
					<span class="r">*</span>
					<div class="input-group">
						<div class="input-group-prepend">
							<div class="input-group-text">
								<i class="fas fa-home"></i>
							</div>
						</div>
						<input type="text" class="mask-cep form-control" name="cep" id="cep" value="<?php print $usuario->cep; ?>" />
						<div class="valid-feedback feedback-icon">
							<i class="fas fa-check"></i>
						</div>
						<div class="invalid-feedback feedback-icon">
							<i class="fas fa-times"></i>
						</div>
					</div>
					<span class="help-block r" id="error"></span>
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label class="control-label">Estado: </label>
					<span class="r">*</span>
					<div class="input-group">
						<div class="input-group-prepend">
							<div class="input-group-text">
								<i class="fas fa-home"></i>
							</div>
						</div>
						<input type="text" class="form-control" name="uf" id="uf" value="<?php print $usuario->uf; ?>" />
						<div class="valid-feedback feedback-icon">
							<i class="fas fa-check"></i>
						</div>
						<div class="invalid-feedback feedback-icon">
							<i class="fas fa-times"></i>
						</div>
					</div>
					<span class="help-block r" id="error"></span>
				</div>
				<div class="form-group col-md-6">
					<label class="control-label">Cidade: </label>
					<span class="r">*</span>
					<div class="input-group">
						<div class="input-group-prepend">
							<div class="input-group-text">
								<i class="fas fa-home"></i>
							</div>
						</div>
						<input type="text" class="form-control" name="cidade" id="cidade" value="<?php print $usuario->cidade; ?>" />
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
				<div class="form-group col-md-8">
					<label class="control-label">Endere&ccedil;o: </label>
					<span class="r">*</span>
					<div class="input-group">
						<div class="input-group-prepend">
							<div class="input-group-text">
								<i class="fas fa-home"></i>
							</div>
						</div>
						<input type="text" class="form-control" name="rua" id="rua" value="<?php print $usuario->rua; ?>" />
						<div class="valid-feedback feedback-icon">
							<i class="fas fa-check"></i>
						</div>
						<div class="invalid-feedback feedback-icon">
							<i class="fas fa-times"></i>
						</div>
					</div>
					<span class="help-block r" id="error"></span>
				</div>
				<div class="form-group col-md-4">
					<label class="control-label">N&uacute;mero: </label>
					<span class="r">*</span>
					<div class="input-group">
						<div class="input-group-prepend">
							<div class="input-group-text">
								<i class="fas fa-home"></i>
							</div>
						</div>
						<input type="text" class="form-control" name="numero" id="numero" value="<?php print $usuario->numero; ?>" />
						<div class="valid-feedback feedback-icon">
							<i class="fas fa-check"></i>
						</div>
						<div class="invalid-feedback feedback-icon">
							<i class="fas fa-times"></i>
						</div>
					</div>
					<span class="help-block r" id="error"></span>
				</div>
			</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-8">
					<label class="control-label">Bairro: </label>
					<span class="r">*</span>
					<div class="input-group">
						<div class="input-group-prepend">
							<div class="input-group-text">
								<i class="fas fa-home"></i>
							</div>
						</div>
						<input type="text" class="form-control" name="bairro" id="bairro" value="<?php print $usuario->bairro; ?>" />
						<div class="valid-feedback feedback-icon">
							<i class="fas fa-check"></i>
						</div>
						<div class="invalid-feedback feedback-icon">
							<i class="fas fa-times"></i>
						</div>
					</div>
					<span class="help-block r" id="error"></span>
				</div>
				<div class="form-group col-md-4">
					<label class="control-label">Complemento: </label>
					<div class="input-group">
						<div class="input-group-prepend">
							<div class="input-group-text">
								<i class="fas fa-home"></i>
							</div>
						</div>
						<input type="text" class="form-control" name="complemento" id="complemento" value="<?php print $usuario->complemento; ?>" />
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label">E-Mail: </label>
				<span class="r">*</span>
				<div class="input-group">
					<div class="input-group-prepend">
						<div class="input-group-text">
							<i class="fas fa-envelope"></i>
						</div>
					</div>
					<input type="email" class="form-control" name="eemail" id="eemail" value="<?php print $usuario->email; ?>" readonly />
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
					<label class="control-label">Telefone Celular: </label>
					<span class="r">*</span>
					<div class="input-group">
						<div class="input-group-prepend">
							<div class="input-group-text">
								<i class="fas fa-mobile"></i>
							</div>
						</div>
						<input type="text" class="mask-cel form-control" name="celular" id="celular" value="<?php print $usuario->celular; ?>" />
						<div class="valid-feedback feedback-icon">
							<i class="fas fa-check"></i>
						</div>
						<div class="invalid-feedback feedback-icon">
							<i class="fas fa-times"></i>
						</div>
					</div>
					<span class="help-block r" id="error"></span>
				</div>
				<div class="form-group col-md-6">
					<label class="control-label">Telefone Fixo: </label>
					<div class="input-group">
						<div class="input-group-prepend">
							<div class="input-group-text">
								<i class="fas fa-phone"></i>
							</div>
						</div>
						<input type="text" class="mask-telefone form-control" name="telefone" id="telefone" value="<?php print $usuario->telefone; ?>" />
					</div>
				</div>
			</div>
			
            <div class="form-row">
				<div class="form-group col-md-6">
					<label class="control-label">Perfil: </label>
					<span class="r">*</span>
					<div class="input-group">
						<div class="input-group-prepend">
							<div class="input-group-text">
								<i class="fas fa-id-card-alt"></i>
							</div>
						</div>
						<select for="perfil" class="custom-select" name="perfil" id="perfil">
							<option value="" selected="selected">-- Selecione --</option>
							<option value="adm" <?php if($usuario->perfil == "adm"){ print 'selected="selected"'; } ?>>Administrativo</option>
							<option value="con" <?php if($usuario->perfil == "con"){ print 'selected="selected"'; } ?>>Consultor</option>
							<option value="jur" <?php if($usuario->perfil == "jur"){ print 'selected="selected"'; } ?>>Jurídico</option>
							<option value="mst" <?php if($usuario->perfil == "mst"){ print 'selected="selected"'; } ?>>Master</option>
							
						</select>
						<div class="valid-feedback feedback-icon">
							<i class="fas fa-check"></i>
						</div>
						<div class="invalid-feedback feedback-icon">
							<i class="fas fa-times"></i>
						</div>
					</div>
					<span class="help-block r" id="error"></span>
				</div>
				<div class="form-group col-md-6">
					<label class="control-label">Ativo: </label>
					<span class="r">*</span>
					<div class="input-group">
						<div class="input-group-prepend">
							<div class="input-group-text">
								<i class="fas fa-link"></i>
							</div>
						</div>
						<select for="active" class="custom-select" name="active" id="active">
							<option value="" <?php if($usuario->active == ""){ print 'selected="selected"'; } ?> >-- Selecione --</option>
							<option value="1" <?php if($usuario->active == "1"){ print 'selected="selected"'; } ?> >Sim</option>
							<option value="0" <?php if($usuario->active == "0"){ print 'selected="selected"'; } ?> >Não</option>
						</select>
						<div class="valid-feedback feedback-icon">
							<i class="fas fa-check"></i>
						</div>
						<div class="invalid-feedback feedback-icon">
							<i class="fas fa-times"></i>
						</div>
					</div>
					<span class="help-block r" id="error"></span>
				</div>
			</div>
			
			<div class="form-row">
			    <div class="form-group col-md-4">
					    <input type="hidden" class="form-control" name="acao" id="acao" value="Atualizar" />
			    </div>
			    <div class="form-group col-md-4">
					    <input type="hidden" class="form-control" name="id" id="id" value="<?php print $usuario->ID; ?>" />
				</div>

			</div>
			
          <div class="form-row">
            <div class="form-group col-md-4">
                    <input type="hidden" name="recaptcha_response" id="recaptchaResponse">
            </div>
            <div class="form-group col-md-4">
                    <input type="hidden" name="action" value="clientes">
            </div>
         </div>
			<center>
				<div class="form-group col-md-12">
						<span style="font-size: 11px">
							<span class="r">*</span>
							<i>Campos de preenchimento obrigat&oacute;rio</i>
						</span>
					</p>
					<button type="submit" name="send_form" id="send_form" class="btn btn-success">Atualizar</button>
				</div>
			</center>
		</div>
    </div>
</form>
<?php endforeach; ?>
<?php else : ?>
<div class="alert alert-info text-center" role="alert">
  Nenhum registro encontrado.
</div>
<?php endif; ?>
<?php include(FOOTER_TEMPLATE); ?>