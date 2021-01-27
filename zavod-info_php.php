<?php 
    require 'db_connect.php';
    
    $id=$_GET['id'];
    $actual_link =  "//{$_SERVER['HTTP_HOST']}{$_SERVER['PHP_SELF']}?id=$id";
    $editovat = false;
    $poradi='';
    $startovky = mysqli_query($db, "SELECT *
                                    FROM jezdci  JOIN startovky ON jezdci.ID_jezdci = startovky.jezdec 
                                    WHERE zavod='$id';");
    $startovky = mysqli_fetch_all($startovky,MYSQLI_ASSOC);

    $startovky_navigator = mysqli_query($db, "SELECT jmeno,prijmeni
                                    FROM navigatori JOIN startovky ON navigatori.ID_navigatori = startovky.navigator
                                    WHERE zavod='$id';");
    $startovky_navigator = mysqli_fetch_all($startovky_navigator,MYSQLI_ASSOC);

    $startovky_auto = mysqli_query($db, "SELECT nazev,skupina
                                    FROM auta JOIN startovky ON auta.ID_auta = startovky.auto
                                    WHERE zavod='$id';");
    $startovky_auto = mysqli_fetch_all($startovky_auto,MYSQLI_ASSOC);

    $sql = mysqli_query($db,"SELECT * FROM startovky WHERE zavod='$id';");
    $pocet = mysqli_num_rows($sql);

    for ($i=0; $i<$pocet;$i++){
        $startovky[$i]['navigator_jmeno']=$startovky_navigator[$i]['jmeno'];   
        $startovky[$i]['navigator_prijmeni']=$startovky_navigator[$i]['prijmeni'];
        $startovky[$i]['nazev_auto']=$startovky_auto[$i]['nazev'];  
        $startovky[$i]['skupina_auto']=$startovky_auto[$i]['skupina'];  
    }   

    if (isset($_POST["vlozit"])) {
        $posadka=$_POST['posadka'];
        $result = mysqli_query($db,"SELECT * FROM startovky WHERE ID_startovky='$posadka'");
        $result = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $jezdec = $result['jezdec'];
        $navigator = $result['navigator'];
        $poradi = $_POST['poradi'];
        $auto = $result['auto'];
        $zavod = $id;
        mysqli_query($db,"INSERT INTO vysledky(jezdec,navigator,zavod,poradi,auto) VALUES('$jezdec','$navigator','$zavod','$poradi','$auto')");
        $_SESSION['zprava']="Nový výsledek byl vložen"; 
        header("Refresh: 0");
    }

    if (isset($_GET["odstranit"])) {
        $id_odstranit = $_GET['odstranit'];
        mysqli_query($db,"DELETE FROM vysledky WHERE ID_vysledky='$id_odstranit'");
        
        $_SESSION["zprava"]="Výsledek $id_odstranit byl odstraněn";    
    }

    if (isset($_GET["editovat"])) {
        $id_editovat = $_GET["editovat"];
        $result = mysqli_query($db,"SELECT * FROM vysledky WHERE ID_vysledky='$id_editovat'");
        $result = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $editovat = true;
        $poradi = $result['poradi'];
        $jezdec = $result['jezdec'];
        $vysledky_jezdec_edit = mysqli_query($db, "SELECT *
                                    FROM jezdci JOIN startovky ON jezdci.ID_jezdci = startovky.jezdec 
                                    WHERE ID_jezdci = $jezdec;");
        $vysledky_jezdec_edit = mysqli_fetch_assoc($vysledky_jezdec_edit);

        $navigator = $result['navigator'];
        $vysledky_navigator_edit = mysqli_query($db, "SELECT *
                                    FROM navigatori JOIN startovky ON navigatori.ID_navigatori = startovky.navigator
                                    WHERE ID_navigatori = $navigator;");
        $vysledky_navigator_edit = mysqli_fetch_assoc($vysledky_navigator_edit);

        $auto = $result['auto'];
        $vysledky_auto_edit = mysqli_query($db, "SELECT *
                                    FROM auta
                                    WHERE ID_auta=$auto");
        $vysledky_auto_edit = mysqli_fetch_assoc($vysledky_auto_edit);
     
        if (isset($_POST["editovat"])) {
            $poradi = $_POST["poradi"];
            mysqli_query($db,"UPDATE vysledky SET poradi='$poradi' WHERE ID_vysledky='$id_editovat'");
            $_SESSION["zprava"]="Výsledek $id_editovat byl upraven"; 
            header("Location:$actual_link"); 
                
        }
    }

    $zavod = mysqli_query($db, "SELECT * FROM zavody WHERE ID_zavody='$id';");
    $zavod = mysqli_fetch_row($zavod);

    $vysledky = mysqli_query($db, "SELECT *
                                    FROM jezdci  JOIN vysledky ON jezdci.ID_jezdci = vysledky.jezdec 
                                    WHERE zavod='$id';");
    $vysledky = mysqli_fetch_all($vysledky,MYSQLI_ASSOC);

    $vysledky_navigator = mysqli_query($db, "SELECT *
                                    FROM navigatori JOIN vysledky ON navigatori.ID_navigatori = vysledky.navigator
                                    WHERE zavod='$id';");
    $vysledky_navigator = mysqli_fetch_all($vysledky_navigator,MYSQLI_ASSOC);

    $sql = mysqli_query($db,"SELECT * FROM vysledky WHERE zavod='$id';");
    $pocet = mysqli_num_rows($sql);

    for ($i = 0; $i<$pocet;$i++){
        $vysledky[$i]['navigator_jmeno'] = $vysledky_navigator[$i]['jmeno'];   
        $vysledky[$i]['navigator_prijmeni'] = $vysledky_navigator[$i]['prijmeni']; 
        $auto=$vysledky[$i]['auto'];
        $vysledky_auto[$i] = mysqli_query($db, "SELECT *
                                    FROM auta 
                                    WHERE ID_auta = $auto");
        $vysledky_auto[$i] = mysqli_fetch_assoc($vysledky_auto[$i]);
        $vysledky[$i]['auto_nazev'] = $vysledky_auto[$i]['nazev'];
    }
?>
    