<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include '../DB/connection.php';

header('Content-type: application/json');

const ACTIVE = 1;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    try {

        $email = $_POST['email'];
        $pass = md5($_POST['password']);

        if (!empty($email) && !empty($pass)) {

            $sql = "SELECT * FROM user WHERE email = '$email' and password = '$pass' and statusId = '" . ACTIVE . "'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                session_start();
                $_SESSION['sessionUser'] = $email;
                echo json_encode("success");
            } else {
                echo json_encode("Sus datos son incorrectos para iniciar sesión");
            }
        } else {
            echo json_encode("Sus credenciales son incorrectas");
        }
    } catch (Exception $ex) {
        echo json_encode("Error: " . $exc->getTraceAsString());
    }
}