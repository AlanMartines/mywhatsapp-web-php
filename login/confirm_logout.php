<?php
if (session_status() == PHP_SESSION_NONE) :
    session_start();
endif;
//
if(!isset($_SESSION['logado']) && $_SESSION['logado'] !== true):
	header("Location: ../login/");
endif;
//
include_once ('../config.php');

include_once(HEADER_TEMPLATE);
//
?>
<div class="text-center">
   <div id="mensagem"></div>
   <img class="mb-4 img-fluid" src="<?php echo BASEURL; ?>images/LogoPreta.png" alt="" width="290" height="290">
</div>
<form class="form-signin text-center" id="login-form" method="post" action="javascript:void(0)">
   <div class="row row-centered justify-content-md-center">
      <div class="col-sm-6 text-center">
         <center>
            <div class="form-group col-md-12">
               <a href="./logout.php?tokenout=<?php print md5(session_id()); ?>" class="btn btn-danger" role="button"><i class="fas fa-sign-out-alt"></i>&#32;Logout</a>
            </div>
         </center>
      </div>
   </div>
  <input type="hidden" name="recaptcha_response" id="recaptchaResponse">
</form>
</p>
<?php include_once(FOOTER_TEMPLATE); ?>