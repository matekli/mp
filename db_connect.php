<?php    
    session_start();
    $server = "localhost"; 
    $user = "root";
    $heslo = "";
    $databaze = "mp";
    $db = mysqli_connect($server, $user, $heslo, $databaze);

    mysqli_query($db, "SET NAMES UTF8");
?>