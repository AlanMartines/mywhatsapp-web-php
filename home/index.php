<?php
if (session_status() !== PHP_SESSION_ACTIVE) { //Verificar se a sessão não já está aberta.
    session_start();
}
//
require_once('../login/verifica_sessao.php');
require_once('../config.php');
require_once(HEADER_TEMPLATE);
//
?>
<div class="row d-flex justify-content-center">
    <div class="col-sm-3">
        <div class="card border-secondary mb-3">
            <div class="card-header text-white bg-secondary font-weight-bold text-center">Usuários</div>
            <div class="card-body text-secondary text-center align-items-center">
                <h5 class="card-title">00</h5>
                <p class="card-text">Lista de usuários.</p>
                <a href="../usuarios/add.php" class="btn btn-secondary btn-block btn-sm"><i class="fas fa-plus"></i> Cadastrar</a>
                <a href="../usuarios/" class="btn btn-secondary btn-block btn-sm"><i class="fas fa-list"></i> Lista</a>
            </div>
            <div class="card-footer text-muted text-center"> </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="card border-info mb-3">
            <div class="card-header text-white bg-info font-weight-bold text-center">Produtos</div>
            <div class="card-body text-info text-center align-items-center">
                <h5 class="card-title">00</h5>
                <p class="card-text">Lista de produtos.</p>
                <a href="../produtos/add.php" class="btn btn-info btn-block btn-sm"><i class="fas fa-plus"></i> Cadastrar</a>
                <a href="../produtos/" class="btn btn-info btn-block btn-sm"><i class="fas fa-list"></i> Lista</a>
            </div>
            <div class="card-footer text-muted text-center"> </div>
        </div>
    </div>
</div>
<?php
include_once(FOOTER_TEMPLATE);
?>