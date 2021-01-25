<?php 
    session_start();
    /*unset($_SESSION["id"]);
    unset($_SESSION["login"]);
    unset($_SESSION["admin"]);
    unset($_SESSION["zprava-login"]);*/
    unset($_SESSION['prihlasenyUzivatel']);
    header("Location: jezdci.php");
?>
