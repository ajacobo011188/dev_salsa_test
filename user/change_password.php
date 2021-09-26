<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include '../DB/connection.php';

session_start();
if (isset($_SESSION["sessionUser"])) {

    try {

        $passNew = $_POST['password'];
        $passRepead = $_POST['password_repead'];


        if (!empty($passNew) && !empty($passRepead)) {

            if ($_POST['password'] == $passRepead) {

                $sql = "UPDATE user set password='" . md5($passNew) . "' WHERE email='" . $_SESSION['sessionUser'] . "'";

                if ($conn->query($sql) === TRUE) {
                    echo json_encode("success");
                } else {
                    echo json_encode("Error: " . $sql . "<br>" . $conn->error);
                }

                $conn->close();
            } else {
                echo json_encode("Las constreaseñas no coinciden, por favor ingresé de nuevo las contraseñas");
            }
        } else {
            echo json_encode("Ocurrio un error al modificar la contraseña, por favor verifiqué que los campos esten llenos correctamente");
        }
    } catch (Exception $ex) {
        echo json_encode("Error: " . $exc->getTraceAsString());
    }
} else {
    echo json_encode("No cuenta con los permisos para modificar la contraseña");
}