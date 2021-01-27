<?php 
    require 'db_connect.php';
    $id = $_SESSION['prihlasenyUzivatel']['id'];
    $uzivatele = mysqli_query($db, "SELECT * FROM uzivatele WHERE ID_uzivatele=$id");
    $uzivatele = mysqli_fetch_array($uzivatele, MYSQLI_ASSOC);

    if (isset($_POST["editovat"])) {
        $result = mysqli_query($db,"SELECT * FROM uzivatele WHERE ID_uzivatele=$id");
        $result = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $jmeno = $_POST['jmeno'];
        $prijmeni = $_POST['prijmeni'];
        $login = $_POST['login'];
        $heslo = $result['heslo'];
        if (!empty($_POST["heslo"])) {
            $heslo = hash("sha256",$_POST['heslo']);
        }
        mysqli_query($db,"UPDATE uzivatele SET jmeno='$jmeno',prijmeni='$prijmeni',login='$login',heslo='$heslo' WHERE ID_uzivatele=$id");
        
        header("Location: uzivatele.php");
        $_SESSION["zprava"]="Uživatel $id byl upraven";
        
    }
?>