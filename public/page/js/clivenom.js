//
String.prototype.capitalize = function() { return this.charAt(0).toUpperCase() + this.substr(1); }
//
function cliStatus(){
        var SessionName = $("#SessionName").val();
        $.ajax({
            type: 'POST',
            url: 'http://localhost:9000/sistem/Status',
            data: {
                SessionName: SessionName
            },
	        dataType: 'json',
            beforeSend: function() {
            },
            success: function(response) {
            console.log(response);
            if (response.result == "error" && response.state == "NOTFOUND") {
                $("#qrcodeVenon").html('<img src="../public/imagens/whatsapp-logo-off.png" class="img-fluid" width="160px" alt="Erro">');
                $("#startVenom").html("Desconectado");
                $("#statusVenon").html("Rodando");
                //
            	$("#contatoVenon").html("----------");
            	$("#waversaoVenon").html("----------");
                $("#bateriaVenon").html("----------");
                $("#sistemaVenon").html("----------");
                $("#carregadorVenon").html("----------");
            } else if (response.result == "info" && response.state == "STARTING") {
                $("#qrcodeVenon").html('<img src="../public/imagens/whatsapp-bot.png" class="img-fluid" width="160px" alt="Info">');
                $("#statusVenon").html("Rodando");
                $("#startVenom").html("Iniciando");
                getHostDevice();
            } else if (response.result == "warning" && response.state == "QRCODE") {
                qrcodeVenon();
                $("#statusVenon").html("Rodando");
                $("#startVenom").html("Ler QR-Code");
                getHostDevice();
            } else if (response.result == "success" && response.state == "CONNECTED" && response.status == "inChat") {
                $("#qrcodeVenon").html('<img src="../public/imagens/whatsapp-bot.png" class="img-fluid" width="160px" alt="Info">');
                $("#statusVenon").html("Rodando");
                $("#startVenom").html("Conectado");
                getHostDevice();
            }  else if (response.result == "success" && response.state == "CONNECTED" && response.status == "isLogged") {
                $("#qrcodeVenon").html('<img src="../public/imagens/whatsapp-bot.png" class="img-fluid" width="160px" alt="Info">');
                $("#statusVenon").html("Rodando");
                $("#startVenom").html("Conectado");
                getHostDevice();
            } else if (response.result == "info" && response.state == "CLOSED" && response.status == "notLogged") {
                $("#qrcodeVenon").html('<img src="../public/imagens/whatsapp-logo-off.png" class="img-fluid" width="160px" alt="Info">');
                $("#statusVenon").html("Rodando");
                $("#startVenom").html("Desconectado");
                //
            	$("#contatoVenon").html("----------");
            	$("#waversaoVenon").html("----------");
                $("#bateriaVenon").html("----------");
                $("#sistemaVenon").html("----------");
                $("#carregadorVenon").html("----------");
            } else  {
                $("#qrcodeVenon").html('<img src="../public/imagens/whatsapp-logo-off.png" class="img-fluid" width="160px" alt="Erro">');
                $("#statusVenon").html("Parado");
                $("#startVenom").html("Desconectado");
                //
            	$("#contatoVenon").html("----------");
            	$("#waversaoVenon").html("----------");
                $("#bateriaVenon").html("----------");
                $("#sistemaVenon").html("----------");
                $("#carregadorVenon").html("----------");
            }
            },
			error: function(xhr, textStatus, error){
                $("#qrcodeVenon").html('<img src="../public/imagens/whatsapp-logo-off.png" class="img-fluid" width="160px" alt="Erro">');
                $("#statusVenon").html("Parado");
                $("#startVenom").html("Desconectado");
                //
            	$("#contatoVenon").html("----------");
            	$("#waversaoVenon").html("----------");
                $("#bateriaVenon").html("----------");
                $("#sistemaVenon").html("----------");
                $("#carregadorVenon").html("----------");
			}
    	});
    //
}
//
function startVenon() {
	var SessionName = $("#SessionName").val();
    $.ajax({
        method: "POST",
        url: 'http://localhost:9000/sistem/Start',
        data: {
            SessionName: SessionName
        },
        dataType: 'json',
        beforeSend: function () {
        },
        success: function (response) {
            if (response.result == "info" && response.state == "STARTING") {
                $("#qrcodeVenon").html('<img src="../public/imagens/whatsapp-bot.png" class="img-fluid" width="160px" alt="Info">');
                $("#statusVenon").html("Rodando");
                $("#startVenom").html("Iniciando");
                //
            	$("#contatoVenon").html("----------");
            	$("#waversaoVenon").html("----------");
                $("#bateriaVenon").html("----------");
                $("#sistemaVenon").html("----------");
                $("#carregadorVenon").html("----------");
            } else {
                $("#qrcodeVenon").html('<img src="../public/imagens/whatsapp-logo-off.png" class="img-fluid" width="160px" alt="Erro">');
                $("#statusVenon").html("Parado");
                $("#startVenom").html("Desconectado");
                //
            	$("#contatoVenon").html("----------");
            	$("#waversaoVenon").html("----------");
                $("#bateriaVenon").html("----------");
                $("#sistemaVenon").html("----------");
                $("#carregadorVenon").html("----------");
            }
        },
		error: function(xhr, textStatus, error){
            $("#qrcodeVenon").html('<img src="../public/imagens/whatsapp-logo-off.png" class="img-fluid" width="160px" alt="Erro">');
            $("#statusVenon").html("Parado");
            $("#startVenom").html("Desconectado");
            //
            $("#contatoVenon").html("----------");
            $("#waversaoVenon").html("----------");
            $("#bateriaVenon").html("----------");
            $("#sistemaVenon").html("----------");
            $("#carregadorVenon").html("----------");
		}
    }).fail(function (jqXHR, textStatus, msg) {
        $("#qrcodeVenon").html('<img src="../public/imagens/whatsapp-logo-off.png" class="img-fluid" width="160px" alt="Erro">');
        $("#statusVenon").html("Rodando");
        $("#startVenom").html("Desconectado");
        //
        $("#contatoVenon").html("----------");
        $("#waversaoVenon").html("----------");
        $("#bateriaVenon").html("----------");
        $("#sistemaVenon").html("----------");
        $("#carregadorVenon").html("----------");
    });
}
//
function closeVenon() {
	var SessionName = $("#SessionName").val();
    $.ajax({
        method: "POST",
        url: 'http://localhost:9000/sistem/Close',
        data: {
            SessionName: SessionName
        },
        dataType: 'json',
        beforeSend: function () {
        },
        success: function (response) {
            if (response.result == "success" && response.state == "CLOSED") {
                $("#qrcodeVenon").html('<img src="../public/imagens/whatsapp-logo-off.png" class="img-fluid" width="160px" alt="Erro">');
                $("#startVenom").html("Desconectando");
                //
            	$("#contatoVenon").html("----------");
            	$("#waversaoVenon").html("----------");
                $("#bateriaVenon").html("----------");
                $("#sistemaVenon").html("----------");
                $("#carregadorVenon").html("----------");
            } else {
                $("#qrcodeVenon").html('<img src="../public/imagens/whatsapp-bot.png" class="img-fluid" width="160px" alt="Sucesso">');
                $("#startVenom").html(response.state);
                //
            	$("#contatoVenon").html("----------");
            	$("#waversaoVenon").html("----------");
                $("#bateriaVenon").html("----------");
                $("#sistemaVenon").html("----------");
                $("#carregadorVenon").html("----------");
            }
        }
    }).fail(function (jqXHR, textStatus, msg) {
        $("#qrcodeVenon").html('<img src="../public/imagens/whatsapp-logo-off.png" class="img-fluid" width="160px" alt="Erro">');
        $("#statusVenon").html("Parado");
        $("#startVenom").html("Desconectado");
        //
        $("#contatoVenon").html("----------");
        $("#waversaoVenon").html("----------");
        $("#bateriaVenon").html("----------");
        $("#sistemaVenon").html("----------");
        $("#carregadorVenon").html("----------");
    });
}
//
function qrcodeVenon() {
	var SessionName = $("#SessionName").val();
    $.ajax({
        method: "POST",
        url: 'http://localhost:9000/sistem/QRCode',
        data: {
            SessionName: SessionName,
            View: false
        },
        dataType: 'json',
        beforeSend: function () {

        },
        success: function (response) {
            if (response.result == "warning" && response.state == "QRCODE" || response.state == "UNPAIRED" || response.state == "UNPAIRED_IDLE") {
                $("#qrcodeVenon").html('<img src="' + response.qrcode + '" class="img-fluid" width="160px" alt="QR-Code">');
            } else {
                $("#qrcodeVenon").html('<img src="../public/imagens/whatsapp-bot.png" class="img-fluid" width="160px" alt="Sucesso">');
            }
        }
    });
}
//
function getHostDevice() {
	var SessionName = $("#SessionName").val();
    $.ajax({
        method: "POST",
        url: 'http://localhost:9000/sistem/getHostDevice',
        data: {
            SessionName: SessionName
        },
        dataType: 'json',
        beforeSend: function () {

        },
        success: function (response) {
            if (response.connected === true) {
            	$("#contatoVenon").html(response.wid.user);
            	$("#waversaoVenon").html(response.phone.wa_version);
                $("#bateriaVenon").html(response.battery+' %');
                $("#sistemaVenon").html(response.platform.capitalize()+' '+response.phone.os_version);
                var carregador = '';
                if(response.plugged === true){
                	carregador = 'Conectado';
                }else{
                	carregador = 'Desonectado';
                }
                $("#carregadorVenon").html(carregador);
            } else {
                
            }
        }
    });
}
//
function RestartService() {
	var SessionName = $("#SessionName").val();
    $.ajax({
        method: "POST",
        url: 'http://localhost:9000/sistem/restartService',
        data: {
            SessionName: SessionName
        },
        dataType: 'json',
        beforeSend: function () {

        },
        success: function (response) {
            if (response.RestartService === true) {
                $("#qrcodeVenon").html('<img src="../public/imagens/whatsapp-bot.png" class="img-fluid" width="160px" alt="Info">');
                $("#statusVenon").html("Rodando");
                $("#startVenom").html("Reiniciando");
            } else {
                
            }
        }
    });
}
//
// A $( document ).ready() block.
$(document).ready(function() {
    //
    //---------------------------------------------------------------------------------------------------------------------------------------------------//
    // Onde estou
    var ResponseURL = window.location.href;
    var domain = ResponseURL.split('/');
    var dir_local = domain[domain.length - 2];
    console.log('Local: '+dir_local);
    //
    //---------------------------------------------------------------------------------------------------------------------------------------------------//
    //
    //
    setInterval(function() {
        if(dir_local == "pages"){
            cliStatus();
        }
    }, 2000);
    //
    $("#starVenon").on("click", function() {
        startVenon();
    });
    //
    $("#restarVenon").on("click", function() {
        RestartService();
    });
    //
    $("#desconectarVenon").on("click", function() {
        closeVenon();
    });
    //
});