<?php 
    require 'db_connect.php';
    $zavody = mysqli_query($db, "SELECT * FROM zavody;");
    $zavody = mysqli_fetch_all($zavody, MYSQLI_ASSOC);

    $id=0;
    $nazev='';
    $datum_od='';
    $datum_do='';
    $editovat = false;
    
    if (isset($_POST["vlozit"])) {
        $nazev=$_POST["nazev"];
        $datum_od=$_POST["datum_od"];
        $datum_do=$_POST["datum_do"];
        mysqli_query($db,"INSERT INTO zavody(nazev,datum_od,datum_do) VALUES('$nazev','$datum_od','$datum_do')");
        $_SESSION['zprava']="Nový závod byl vložen";
        header("Location: zavody.php");
        
    }
    if (isset($_GET["odstranit"])) {
        $id=$_GET["odstranit"];
        mysqli_query($db,"DELETE FROM zavody WHERE ID_zavody='$id'");
        
        header("Location: zavody.php");
        $_SESSION["zprava"]="Závod $id byl odstraněn";
        
    }

    if (isset($_GET["editovat"])) {
        $id = $_GET["editovat"];
        $result = mysqli_query($db,"SELECT * FROM zavody WHERE ID_zavody='$id'");
        $result = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $nazev = $result["nazev"];
        $datum_od = $result["datum_od"];
        $datum_do = $result["datum_do"];
        $editovat = true;
     
    if (isset($_POST["editovat"])) {
        $nazev = $_POST["nazev"];
        $datum_od = $_POST["datum_od"];
        $datum_do = $_POST["datum_do"];
    
        mysqli_query($db,"UPDATE zavody SET nazev='$nazev',datum_od='$datum_od',datum_do='$datum_do' WHERE ID_zavody='$id'");
        
        header("Location: zavody.php");
        $_SESSION["zprava"]="Závod $id byl upraven";
        
    }}
    
?>