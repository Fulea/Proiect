<?php 
    $cnx = mysqli_connect("localhost","aplimobn_admin","xxxxxxxxxx", "aplimobn_PROIECT"); 
// Se verifica conexiunea 
    if ($cnx->connect_error) { 
        die("Conectare nereusita: " . $cnx->connect_error); 
    } 
?>