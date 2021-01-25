<?php 
    require 'db_connect.php';
    $navigatori = mysqli_query($db, "SELECT * FROM navigatori;");
    $navigatori = mysqli_fetch_all($navigatori, MYSQLI_ASSOC);

    $jezdci = mysqli_query($db, "SELECT * FROM jezdci;");
    $jezdci = mysqli_fetch_all($jezdci, MYSQLI_ASSOC);
    
    $id=$_GET['id'];

    if (isset($_POST["vlozit"])) {
        $jezdec=$_POST['jezdec'];
        $navigator=$_POST['navigator'];
        $poradi=$_POST["poradi"];
        mysqli_query($db,"INSERT INTO vysledky(jezdec,navigator,zavod,poradi) VALUES('$jezdec','$navigator','$id','$poradi')");
        $_SESSION['zprava']="Nový výsledek byl vložen"; 
    }
    if (isset($_GET["odstranit"])) {
        $odstranit = $_GET['odstranit'];
        mysqli_query($db,"DELETE FROM zavody WHERE ID_zavody='$odstranit'");
        
        header("Location: zavody.php");
        $_SESSION["zprava"]="Závod $id byl odstraněn";
        
    }

    $zavod = mysqli_query($db, "SELECT * FROM zavody WHERE ID_zavody='$id';");
    $zavod = mysqli_fetch_row($zavod);

    $vysledky = mysqli_query($db, "SELECT poradi,jmeno,prijmeni
                                    FROM jezdci  JOIN vysledky ON jezdci.ID_jezdci = vysledky.jezdec 
                                    WHERE zavod='$id';");
    $vysledky = mysqli_fetch_all($vysledky,MYSQLI_ASSOC);

    $vysledky_navigator = mysqli_query($db, "SELECT jmeno,prijmeni
                                    FROM navigatori JOIN vysledky ON navigatori.ID_navigatori = vysledky.navigator
                                    WHERE zavod='$id';");
    $vysledky_navigator = mysqli_fetch_all($vysledky_navigator,MYSQLI_ASSOC);

    $sql = mysqli_query($db,"SELECT * FROM vysledky WHERE zavod='$id';");
    $pocet = mysqli_num_rows($sql);

    for ($i=0; $i<$pocet;$i++){
        $vysledky[$i]['navigator_jmeno']=$vysledky_navigator[$i]['jmeno'];   
        $vysledky[$i]['navigator_prijmeni']=$vysledky_navigator[$i]['prijmeni']; 
    }
    
?>
