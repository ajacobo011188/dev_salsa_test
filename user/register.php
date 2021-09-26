<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include '../DB/connection.php';
const ACTIVE = 1;
const RolAdmin = 1;
const RolUser = 2;

header('Content-type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    try {
        $name = $_POST['name'];
        $lastName = $_POST['lastname'];
        $email = $_POST['email'];
        $pass = md5($_POST['password']);

        $constActive = ACTIVE;
        

        if (!empty($name) && !empty($lastName) && !empty($email) && !empty($pass)) {

            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

                $statusSql = "SELECT * FROM status";
                $resultStatuSql = $conn->query($statusSql);

                $rolSql = "SELECT * FROM rol";
                $resultRolSql = $conn->query($rolSql);

                if ($resultStatuSql->num_rows > 0 && $resultRolSql->num_rows > 0) {

                    $userRolAdmin = "SELECT * FROM user WHERE rolId = '" . RolAdmin . "'";
                    $resultSql = $conn->query($userRolAdmin);

                    $constRol = $resultSql->num_rows > 0 ? RolUser : RolAdmin;

                    $selectSql = "SELECT * FROM user WHERE email = '$email'";
                    $result = $conn->query($selectSql);

                    if ($result->num_rows < 1) {

                        $insert = "INSERT INTO user (name, lastname, email, password, rolId, statusId) VALUES ('$name', '$lastName', '$email', '$pass', '$constRol', '$constActive')";

                        if ($conn->query($insert) === true) {
                            $conn->close();
                            echo json_encode("success");
                        } else {
                            echo json_encode("Error: " . $sql . "<br>" . $conn->error);
                        }
                    } else {
                        echo json_encode("El correo ya existe, por favor ingrese uno distinto");
                    }
                } else {
                    echo json_encode("Verifiqué que las tablas Rol y Status contenga sus registros correspondientes para poder proceder a el registro de usuario");
                }
            } else {
                echo json_encode("El correo electrónico no es valido");
            }
        } else {
            echo json_encode("Ocurrio un error al momento de registra el usuario");
        }
    } catch (Exception $exc) {
        echo json_encode("Error: " . $exc->getTraceAsString());
    }
}


