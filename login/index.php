<?php
if (session_status() !== PHP_SESSION_ACTIVE) { //Verificar se a sessão não já está aberta.
   session_start();
}
//
if (isset($_SESSION['logado']) && !empty($_SESSION['logado']) && $_SESSION['logado'] == true) :
   header("Location: ../home/");
endif;
//
include_once('../config.php');
include_once(HEADER_TEMPLATE);
//
?>
<div class="text-center">
   <div id="mensagem"></div>
   <img class="img-fluid" src="../images/whatsapp-bot.png" alt="" width="230" />
</div>
<form class="form-signin text-center" id="login-form" method="post" action="javascript:void(0)">
   <div class="row row-centered justify-content-md-center">
      <div class="col-sm-7 text-center">
         <div class="form-row">
            <div class="form-group col-md-4">
               <input type="hidden" name="recaptcha_response" id="recaptchaResponse">
            </div>
            <div class="form-group col-md-4">
               <input type="hidden" name="action" value="login">
            </div>
         </div>
         <div class="form-row">
            <div class="form-group col-md-6">
               <div class="input-group">
                  <div class="input-group-prepend">
                     <div class="input-group-text">
                        <i class="fas fa-envelope"></i>
                     </div>
                  </div>
                  <input type="txt" class="form-control" name="email" id="email" placeholder="Informe seu E-Mail" />
               </div>
               <span class="help-block r" id="error"></span>
            </div>
            <div class="form-group col-md-6">
               <div class="input-group" id="show_login_password">
                  <div class="input-group-prepend">
                     <div class="input-group-text">
                        <i class="fas fa-key"></i>
                     </div>
                  </div>
                  <input type="password" class="rounded form-control" name="pwd" id="pwd" placeholder="Informe sua Senha" />
                  <div class="input-group-append">
                     <span class="input-group-text">
                        <i class="fas fa-eye-slash"></i>
                     </span>
                  </div>
               </div>
               <span class="help-block r" id="error"></span>
            </div>
         </div>

         <center>
            <div class="form-group col-md-12">
               <button type="submit" name="send_form" id="send_form" class="btn btn-primary"><i class="fas fa-paper-plane"></i>&#32;Logar</button>
            </div>
         </center>
      </div>
   </div>
</form>
<?php include_once(FOOTER_TEMPLATE); ?>