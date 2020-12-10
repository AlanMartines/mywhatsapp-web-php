$('document').ready(function() {
    //
    //---------------------------------------------------------------------------------------------------------------------------------------------------//
    // Onde estou
    var ResponseURL = window.location.href;
    var domain = ResponseURL.split('/');
    var dir_local = domain[domain.length - 3];
    console.log('Local: '+dir_local);
    //
    //---------------------------------------------------------------------------------------------------------------------------------------------------//
    //
    // valid email pattern
    var eregex = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    jQuery.validator.addMethod("validemail", function(value, element) {
        // allow any non-whitespace characters as the host part
        return this.optional(element) || eregex.test(value);
    });
//
    jQuery.validator.addMethod("checkemail", function(email, element) {
        var Url = "../validacao/val_email.php";
        //let result = false;
        $.ajax({
            type: "POST",
            url: Url,
            data: {
                email: email
            },
            dataType: "JSON",
            dataFilter: function(data) {
                console.log(data);
                var json = JSON.parse(data);
                if (json.isError === false) {
                    console.log(json.isError + ': '+ json.isMsg);
                    result = false;
                } else {
                    console.log(json.isError + ': '+ json.isMsg);
                    result = true;
                }
            },
            async: false
        });
        console.log(result);
        return result;
    }, "Endereço de e-mail invalido!");
//
    $("#login-form").validate({
        rules: {
            email: {
                required: true,
                checkemail: true
            },
            pwd: {
                required: true
            }
        },
        messages: {
            email: {
                required: "Informe seu e-mail!",
                checkemail: "Informe um e-mail valido!"
            },
            pwd: {
                required: "Informe sua senha!"
            }
        },
        errorPlacement: function(error, element) {
            $(element).closest('.form-group').find('.help-block').html(error.html());
        },
        highlight: function(element) {
            $(element).closest('.form-control').removeClass('is-valid').addClass('is-invalid');
            $(element).closest('.custom-select').removeClass('is-valid').addClass('is-invalid');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).closest('.form-group').find('.help-block').html('');
            $(element).closest('.form-control').removeClass('is-invalid').addClass('is-valid');
            $(element).closest('.custom-select').removeClass('is-invalid').addClass('is-valid');
        },
        submitHandler: function() {
            //event.preventDefault();
            grecaptcha.ready(function() {
                grecaptcha.execute('<CHabe_Aqui>', {
                    action: 'login'
                }).then(function(token) {
                    //$('#login-form').prepend('<input type="hidden" name="recaptchaResponse" value="' + token + '">');
                    //$('#login-form').prepend('<input type="hidden" name="action" value="login">');
                    var recaptchaResponse = document.getElementById('recaptchaResponse');
                    recaptchaResponse.value = token;
                    console.log('Token: ' + token);
                    //
                    var data = $("#login-form").serialize();
                    $.ajax({
                        type: 'POST',
                        url: './login.php',
                        data: data,
                        dataType: 'json',
                        beforeSend: function() {
                            $("#send_form").html('<i class="fas fa-spinner fa-spin"></i> Logando ...');
                        },
                        success: function(response) {
                            if (response.codigo == "1") {
                                $("#send_form").html('Logar');
                                $("#login-alert").css('display', 'none');
                                window.location.href = "../home/";
                            } else {
                                $("#send_form").html('Logar');
                                console.log('Menssagem: ' + response.mensagem);
                                console.log('Debug: ' + response.debug);
                                $("#mensagem").html('<center>' +
                                    '<div class="panel-body padding-top-md" >' +
                                    '<div id="login-alert" class="alert alert-' + response.alerta + ' col-sm-6">' +
                                    response.iconem + '&#32;' + response.mensagem +
                                    '</div>' +
                                    '</div>' +
                                    '</center>');
                                $("#login-alert").css('display', 'block');
                                window.scrollTo(0, 0);
                            }
                        }
                    });
                });
            });

        }
    });
    //
    //---------------------------------------------------------------------------------------------------------------------------------------------------//
    //
    // https://github.com/elboletaire/password-strength-meter
    // https://elboletaire.github.io/password-strength-meter/
    // https://adri-sorribas.github.io/passtrength/
    //
    $("#show_login_password i").on('click', function(event) {
        event.preventDefault();
        if ($("#show_login_password input").attr("type") === "text") {
            $("#show_login_password input").attr('type', 'password');
            $("#show_login_password i").addClass("fa-eye-slash");
            $("#show_login_password i").removeClass("fa-eye");

        } else if ($("#show_login_password input").attr("type") === "password") {
            $("#show_login_password input").attr('type', 'text');
            $("#show_login_password i").removeClass("fa-eye-slash");
            $("#show_login_password i").addClass("fa-eye");
        }
    });
    //
    // Data Tables
    //---------------------------------------------------------------------------------------------------------------------------------------------------//
    //
    var org_usuarios = $('.org_usuarios').DataTable({
        lengthMenu: [
            [50, 100, 200, -1],
            [50, 100, 200, "All"]
        ],
        fixedHeader: true,
        order: [
            [0, 'asc']
        ],
        language: {
            lengthMenu: "Exibir _MENU_ registros por pagina",
            zeroRecords: "Nada encontrado",
            info: "Mostrando pagina _PAGE_ de _PAGES_",
            infoEmpty: "Nenhum registro disponível",
            infoFiltered: "(filtrado de _MAX_ total de registros)",
            decimal: ",",
            thousands: ".",
            loadingRecords: "Carregando...",
            processing: "Processando...",
            search: "Pesquisar:",
            paginate: {
                first: "Primeira",
                last: "Última",
                next: "Próxima",
                previous: "Anterior"
            }
        }
    });
    //
    //---------------------------------------------------------------------------------------------------------------------------------------------------//
    //
});