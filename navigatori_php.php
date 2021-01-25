<?php 
    require 'db_connect.php';
    $navigatori = mysqli_query($db, "SELECT * FROM navigatori;");
    $navigatori = mysqli_fetch_all($navigatori, MYSQLI_ASSOC);

    $id=0;
    $jmeno='';
    $prijmeni='';
    $editovat = false;
    
    if (isset($_POST["vlozit"])) {
        $jmeno=$_POST["jmeno"];
        $prijmeni=$_POST["prijmeni"];
        mysqli_query($db,"INSERT INTO navigatori(jmeno,prijmeni) VALUES('$jmeno','$prijmeni')");
        $_SESSION['zprava']="Nový navigátor byl vložen";
        header("Location: navigatori.php");
        
    }
    if (isset($_GET["odstranit"])) {
        $id=$_GET["odstranit"];
        mysqli_query($db,"DELETE FROM navigatori WHERE ID_navigatori='$id'");
        
        header("Location: navigatori.php");
        $_SESSION["zprava"]="Navigátor $id byl odstraněn";
        
    }

    if (isset($_GET["editovat"])) {
        $id = $_GET["editovat"];
        $result = mysqli_query($db,"SELECT * FROM navigatori WHERE ID_navigatori='$id'");
        $result = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $jmeno = $result["jmeno"];
        $prijmeni = $result["prijmeni"];
        $editovat = true;
     
    if (isset($_POST["editovat"])) {
        $jmeno = $_POST["jmeno"];
        $prijmeni = $_POST["prijmeni"];
    
        mysqli_query($db,"UPDATE navigatori SET jmeno='$jmeno',prijmeni='$prijmeni' WHERE ID_navigatori='$id'");
        
        header("Location: navigatori.php");
        $_SESSION["zprava"]="Navigátor $id byl upraven";
        
    }}
    
?>