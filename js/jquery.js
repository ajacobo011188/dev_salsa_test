/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function echo() {

    $.ajax({
        type: 'GET',
        url: "../test_dev_salsa/DB/connection.php",
        success: function (data) {
            $("#login").html(data);
        }
    });

}

$(document).ready(function () {
    // $("#formRegister").validate();
});

function isEmail() {
    var email = $('#emailNew').val();
    var regex = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    if (!regex.test(email)) {
        $("#invalid_email").html('<div class="alert alert-danger mt-1"><strong>Error!</strong> Formato de correo electrónico invalido </div>');
        $("#btnRegister").attr("disabled", true);
    } else {
        $('#invalid_email').html('<div class="alert alert-success mt-1"><strong>Éxito!</strong>Correo ingresado correctamente</div>');
        $("#btnRegister").attr("disabled", false);
    }
}


function login() {
    $.ajax({
        url: '../test_dev_salsa/login/signin.php',
        dataType: 'json',
        type: 'post',
        //contentType: 'application/json',
        data: $("#formLogin").serialize(),
        cache: false,
        success: function (response) {

            if (response == "success") {
                location.href = 'admin.php';
            } else {
                $("#error_message").html('<div class="alert alert-danger"><strong>Error!</strong> ' + response + ' </div>');
            }

        }
    });
}

function register() {
    $.ajax({
        url: '../test_dev_salsa/user/register.php',
        dataType: 'json',
        type: 'post',
        //contentType: 'application/json',
        data: $("#formRegister").serialize(),
        cache: false,
        success: function (response) {

            if (response == "success") {
                $('#formRegister')[0].reset();
                $('#success_message').html('<div class="alert alert-success"><strong>Éxito!</strong> Se registro correctamente el usuario, Gracias</div>');
                setTimeout(
                        function ()
                        {
                            location.reload();
                        }, 3000);
            } else {
                $("#error_message").html('<div class="alert alert-danger"><strong>Error!</strong> ' + response + ' </div>');
            }

        }
    });
}

function changePass() {
    $.ajax({
        url: '../test_dev_salsa/user/change_password.php',
        dataType: 'json',
        type: 'post',
        //contentType: 'application/json',
        data: $("#formChangePass").serialize(),
        cache: false,
        success: function (response) {
            if (response == "success") {
                $('#success_message').html('<div class="alert alert-success"><strong>Éxito!</strong> Su contraseña se modifico con éxito <a class="nav-link" style="color: red" href="../DevSalsa/login/logout.php">Cerrar Sesión</a></div>');
            } else {
                $("#error_message").html('<div class="alert alert-danger"><strong>Error!</strong> ' + response + ' </div>');
            }

        }
    });
}


