<?php
session_start();
unset($_SESSION['cname']);
unset($_SESSION['mname']);
unset($_SESSION['sname']);
 echo '<script>location.href="index.html";alert("Thanks for Login");</script>';

?>

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

