<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php
session_start();
if (!isset($_SESSION["sessionUser"])) {
    header("location:index.php");
} else {
    ?>

    <html>
    <head>
        <meta charset="UTF-8">
        <title>Admin</title>

            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

        </head>
    <body>
            <div class="container mr-1">
                <ul class="nav">
                    <li class="nav-item">
                            <a class="nav-link disabled" aria-disabled="true" href="#"><?= $_SESSION['sessionUser']; ?></a>
                        </li>
                    <li class="nav-item">
                            <a class="nav-link" href="#" tabindex="-1" data-toggle="collapse" data-target="#collapseChange" aria-expanded="false" aria-controls="collapseChange">Cambiar contraseña</a>
                        </li>
                    <li class="nav-item">
                            <a class="nav-link" style="color: red" href="login/logout.php">Cerrar Sesión</a>
                        </li>
                    </ul>

                    <div class="collapse col-lg-5 mt-5" id="collapseChange">
                        <h2>Modificar contraseña</h2>
                            <form method="POST" id="formChangePass">

                                <div class="form-group">
                                        <label for="password">Nueva contraseña:</label>
                                            <input type="password" class="form-control" id="password" placeholder="Contraseña" name="password" required="">
                                    </div>

                                <div class="form-group">
                                        <label for="password">Ingrese de nuevo la contraseña:</label>
                                        <input type="password" class="form-control" id="password" placeholder="Contraseña" name="password_repead" required="">
                                    </div>
                                    <button type="button" class="btn btn-primary" onclick="changePass()">Modificar</button>
                                </form>
                </div>


                    <div class="mt-5" id="error_message"></div>

                    <div class="mt-5" id="success_message"></div>

                </div>
        </body>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
            <script type="text/javascript" src="js/jquery.js"></script>


        </html>
    <?php } ?>