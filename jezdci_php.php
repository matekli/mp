<?php 
    require 'db_connect.php';
    $jezdci = mysqli_query($db, "SELECT * FROM jezdci;");
    $jezdci = mysqli_fetch_all($jezdci, MYSQLI_ASSOC);

    $id=0;
    $jmeno='';
    $prijmeni='';
    $editovat = false;
    
    if (isset($_POST["vlozit"])) {
        $jmeno=$_POST["jmeno"];
        $prijmeni=$_POST["prijmeni"];
        mysqli_query($db,"INSERT INTO jezdci(jmeno,prijmeni) VALUES('$jmeno','$prijmeni')");
        $_SESSION['zprava']="Nový jezdec byl vložen";
        header("Location: jezdci.php");
        
    }
    if (isset($_GET["odstranit"])) {
        $id=$_GET["odstranit"];
        mysqli_query($db,"DELETE FROM jezdci WHERE ID_jezdci='$id'");
        
        header("Location: jezdci.php");
        $_SESSION["zprava"]="Jezdec $id byl odstraněn";
        
    }

    if (isset($_GET["editovat"])) {
        $id = $_GET["editovat"];
        $result = mysqli_query($db,"SELECT * FROM jezdci WHERE ID_jezdci='$id'");
        $result = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $jmeno = $result["jmeno"];
        $prijmeni = $result["prijmeni"];
        $editovat = true;
     
    if (isset($_POST["editovat"])) {
        $jmeno = $_POST["jmeno"];
        $prijmeni = $_POST["prijmeni"];
    
        mysqli_query($db,"UPDATE jezdci SET jmeno='$jmeno',prijmeni='$prijmeni' WHERE ID_jezdci='$id'");
        
        header("Location: jezdci.php");
        $_SESSION["zprava"]="Jezdec $id byl upraven";
        
    }}
    
?>