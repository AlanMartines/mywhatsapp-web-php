<?php
if (session_status() !== PHP_SESSION_ACTIVE) {//Verificar se a sessão não já está aberta.
  session_start();
}
//
require_once ('../config.php');
include(HEADER_TEMPLATE);
//
?>
<div class="text-center">
   <div id="mensagem"></div>
   <img class="mb-4 img-fluid" src="../images/eletro_info_matriz_250.png" alt="" width="250"/>
</div>
<form class="form-signin text-center" id="login-form" method="post" action="javascript:void(0)">
   <div class="row row-centered justify-content-md-center">
      <div class="col-sm-6 text-center">
         <center>
            <div class="form-group col-md-12">
            	<div class="alert alert-danger" role="alert" style="font-size:14px">
            		<strong>Sua sessão expirou!</strong>
            	</div>
               <a href="./index.php" class="btn btn-info" role="button"><i class="fas fa-sign-in-alt"></i>&#32;Entre aqui</a>
            </div>
         </center>
      </div>
   </div>
  <input type="hidden" name="recaptcha_response" id="recaptchaResponse">
</form>
</p>
<?php include(FOOTER_TEMPLATE); ?>