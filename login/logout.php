<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


session_start();
unset($_SESSION['sessionUser']);
session_destroy();
header("location:../index.php");
