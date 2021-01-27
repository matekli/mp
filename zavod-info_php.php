<?php 
    require 'db_connect.php';
    /*$navigatori = mysqli_query($db, "SELECT * FROM navigatori;");
    $navigatori = mysqli_fetch_all($navigatori, MYSQLI_ASSOC);

    $jezdci = mysqli_query($db, "SELECT * FROM jezdci;");
    $jezdci = mysqli_fetch_all($jezdci, MYSQLI_ASSOC);
    
    $id=$_GET['id'];
    $edit_jezdec='';
    $edit_navigator='';
    $edit_zavod='';
    $edit_poradi='';
    $editovat = false;
    if (isset($_POST["vlozit"])) {
        $jezdec=$_POST['jezdec'];
        $navigator=$_POST['navigator'];
        $poradi=$_POST["poradi"];
        mysqli_query($db,"INSERT INTO vysledky(jezdec,navigator,zavod,poradi) VALUES('$jezdec','$navigator','$id','$poradi')");
        $_SESSION['zprava']="Nový výsledek byl vložen"; 
    }
    if (isset($_GET["odstranit"])) {
        $id_odstranit = $_GET['odstranit'];
        mysqli_query($db,"DELETE FROM vysledky WHERE ID_vysledky='$id_odstranit'");
        
        $_SESSION["zprava"]="Výsledek $id_odstranit byl odstraněn";
        
    }

    if (isset($_GET["editovat"])) {
        $id_edit = $_GET["editovat"];
        $result = mysqli_query($db,"SELECT * FROM vysledky WHERE ID_vysledky='$id_edit'");
        $result = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $edit_jezdec = $result["jezdec"];
        $edit_navigator = $result["navigator"];
        $edit_zavod = $result["zavod"];
        $edit_poradi = $result["poradi"];
        $editovat = true;
     
    if (isset($_POST["editovat"])) {
        $edit_jezdec = $_POST["jezdec"];
        $edit_navigator = $_POST["navigator"];
        $edit_zavod = $_POST["zavod"];
        $edit_poradi = $_POST["poradi"];
    
        mysqli_query($db,"UPDATE vysledky SET jezdec='$edit_jezdec',navigator='$edit_navigator',zavod='$edit_zavod',poradi='$edit_poradi' WHERE ID_vysledky='$id_edit'");
        
        $_SESSION["zprava"]="Výsledek $id_edit byl upraven";
        
    }}

    $zavod = mysqli_query($db, "SELECT * FROM zavody WHERE ID_zavody='$id';");
    $zavod = mysqli_fetch_row($zavod);

    $vysledky = mysqli_query($db, "SELECT *
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
    }*/

    $id=$_GET['id'];

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
    }

    if (isset($_GET["odstranit"])) {
        $id_odstranit = $_GET['odstranit'];
        mysqli_query($db,"DELETE FROM vysledky WHERE ID_vysledky='$id_odstranit'");
        
        $_SESSION["zprava"]="Výsledek $id_odstranit byl odstraněn";    
    }

    $zavod = mysqli_query($db, "SELECT * FROM zavody WHERE ID_zavody='$id';");
    $zavod = mysqli_fetch_row($zavod);

    $vysledky = mysqli_query($db, "SELECT *
                                    FROM jezdci  JOIN vysledky ON jezdci.ID_jezdci = vysledky.jezdec 
                                    WHERE zavod='$id';");
    $vysledky = mysqli_fetch_all($vysledky,MYSQLI_ASSOC);

    $vysledky_navigator = mysqli_query($db, "SELECT jmeno,prijmeni
                                    FROM navigatori JOIN vysledky ON navigatori.ID_navigatori = vysledky.navigator
                                    WHERE zavod='$id';");
    $vysledky_navigator = mysqli_fetch_all($vysledky_navigator,MYSQLI_ASSOC);

    /*$vysledky_auta = mysqli_query($db, "SELECT nazev,skupina
                                    FROM auta INNER JOIN vysledky ON auta.ID_auta = vysledky.auto
                                    WHERE zavod='$id';");
    $vysledky_auta = mysqli_fetch_all($vysledky_auta,MYSQLI_ASSOC);*/

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
