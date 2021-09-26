<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include 'user/userList.php';
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Prueba de Dev Salsa</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">



    </head>
    <body>

        <div class="container mt-5 mr-1">
            <p>
                <a class="btn btn-primary col-lg-2" data-toggle="collapse" href="#collapseRegister" role="button" aria-expanded="false" aria-controls="collapseLogin">
                    Registro
                </a>
                <button class="btn btn-success col-lg-2" type="button" data-toggle="collapse" data-target="#collapseLogin" aria-expanded="false" aria-controls="collapseRegister">
                    Iniciar sesión
                </button>
                <button class="btn btn-info col-lg-2" type="button" data-toggle="collapse" data-target="#collapsListUser" aria-expanded="false" aria-controls="collapsListUser">
                    Listado de usuarios
                </button>
            </p>
            <div class="collapse col-lg-5" id="collapseLogin">
                <h2>Iniciar sesión</h2>
                <form method="POST" id="formLogin">
                    <div class="form-group">
                        <label for="email">Correo Electrónico:</label>
                        <input type="email" class="form-control" id="email" placeholder="Ingresé su correo" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña:</label>
                        <input type="password" class="form-control" id="password" placeholder="Ingresé su contraseña" name="password" required>
                    </div>
                    <button type="button" class="btn btn-primary" onclick="login()">Iniciar</button>
                </form>
            </div>

            <div class="collapse col-lg-5" id="collapseRegister">
                <h2>Register</h2>
                <form method="POST" id="formRegister">

                    <div class="form-group">
                        <label for="email">Nombre:</label>
                        <input type="text" class="form-control" placeholder="Ingresa el nombre" name="name" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Apellido:</label>
                        <input type="text" class="form-control" placeholder="Ingresa el apellido" name="lastname" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Correo Electrónico:</label>
                        <input type="email" class="form-control" id="emailNew" placeholder="Ingresa un correo" name="email" required onkeyup="isEmail()">
                        <span class="form_error" id="invalid_email"></span>
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña:</label>
                        <input type="password" class="form-control" id="pwd" placeholder="Ingresa la contraseña" name="password" required>
                    </div>
                    <button type="button" id="btnRegister" class="btn btn-primary" onclick="register()">Registrar</button>
                </form>
            </div>

            <div class="collapse col-lg-7" id="collapsListUser">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Correo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = $result->fetch_assoc()) { ?>
                            <tr>
                                    <td><?php echo $row["id"] ?></td>
                                    <td><?php echo $row["name"] ?></td>
                                    <td><?php echo $row["lastname"] ?></td>
                                    <td><?php echo $row["email"] ?></td>
                                </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Correo</th>
                        </tr>
                    </tfoot>
                </table>
            </div>



            <div class="mt-5" id="error_message"></div>

            <div class="mt-5" id="success_message"></div>

            <div class="mt-5" id="login"></div>

        </div>

    </body>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript" src="js/jquery.js"></script>


    <script type="text/javascript">
//echo();

    

    </script>


</html>
