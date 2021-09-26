<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include 'DB/connection.php';


try {
    $sql = "SELECT id, name, lastname, email FROM user";
    $result = $conn->query($sql);
} catch (Exception $ex) {
        echo "Error: " . $exc->getTraceAsString();
    }