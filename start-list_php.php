<?php 
    require 'db_connect.php';
    /*$id = $_GET['id'];
    $zavod = mysqli_query($db, "SELECT * FROM zavody WHERE ID_zavody='$id';");
    $zavod = mysqli_fetch_row($zavod);*/

    $id = $_GET['id'];

    $navigatori = mysqli_query($db, "SELECT * FROM navigatori;");
    $navigatori = mysqli_fetch_all($navigatori, MYSQLI_ASSOC);

    $jezdci = mysqli_query($db, "SELECT * FROM jezdci;");
    $jezdci = mysqli_fetch_all($jezdci, MYSQLI_ASSOC);

    $zavod = mysqli_query($db, "SELECT * FROM zavody WHERE ID_zavody='$id';");
    $zavod = mysqli_fetch_row($zavod);

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
?>