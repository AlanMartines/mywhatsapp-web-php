<?php
//
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL);
//
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
//
include_once('../config.php');
include_once(HEADER_TEMPLATE);
//
?>
<div class="row d-flex justify-content-center">
	<div class="col-sm-12">
		<center><img class="img-fluid" src="../images/PgConstrucao.png" style="max-width: 450px;"></center>
	</div>
</div>
<?php include(FOOTER_TEMPLATE); ?>