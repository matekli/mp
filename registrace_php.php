<?php 
    require 'db_connect.php';

    if (isset($_POST["registrovat"])) {
        $jmeno=$_POST["jmeno"];
        $prijmeni=$_POST["prijmeni"];
        $login=$_POST["login"];
        $heslo=hash("sha256",$_POST["heslo"]);
        mysqli_query($db,"INSERT INTO uzivatele(jmeno,prijmeni,login,heslo) VALUES('$jmeno','$prijmeni','$login','$heslo')");
        $_SESSION['zprava']="Nový uživatel byl vložen";
        header("Location: uzivatele.php");
        
    }
?>