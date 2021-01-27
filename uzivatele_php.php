
<?php 


    require 'db_connect.php';
    if (isset($_SESSION['prihlasenyUzivatel'])) {
        if ($_SESSION['prihlasenyUzivatel']['admin']==1){
    $uzivatele = mysqli_query($db, "SELECT * FROM uzivatele;");
    $uzivatele = mysqli_fetch_all($uzivatele, MYSQLI_ASSOC);

    $id=0;
    $jmeno='';
    $prijmeni='';
    $login='';
    $heslo='';
    $editovat = false;
    
    if (isset($_POST["vlozit"])) {
        $jmeno=$_POST["jmeno"];
        $prijmeni=$_POST["prijmeni"];
        $login=$_POST["login"];
        $heslo=hash("sha256",$_POST["heslo"]);
        mysqli_query($db,"INSERT INTO uzivatele(jmeno,prijmeni,login,heslo) VALUES('$jmeno','$prijmeni','$login','$heslo')");
        $_SESSION['zprava']="Nový uživatel byl vložen";
        header("Location: uzivatele.php");
        
    }
    if (isset($_GET["odstranit"])) {
        $id=$_GET["odstranit"];
        mysqli_query($db,"DELETE FROM uzivatele WHERE ID_uzivatele=$id");
        
        header("Location: uzivatele.php");
        $_SESSION["zprava"]="Uživatel $id byl odstraněn";
        
    }

    if (isset($_GET["editovat"])) {
        $id = $_GET["editovat"];
        $result = mysqli_query($db,"SELECT * FROM uzivatele WHERE ID_uzivatele=$id");
        $result = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $jmeno = $result["jmeno"];
        $prijmeni = $result["prijmeni"];
        $login = $result["login"];
        $heslo = hash("sha256",$result["heslo"]); 
        $editovat = true;
     
    if (isset($_POST["editovat"])) {
        $jmeno = $_POST["jmeno"];
        $prijmeni = $_POST["prijmeni"];
        $login = $_POST["login"];
        if (isset($_POST["hesloEdit"])) {
            $heslo = hash("sha256",$_POST["hesloEdit"]);
        }
        mysqli_query($db,"UPDATE uzivatele SET jmeno='$jmeno',prijmeni='$prijmeni',login='$login',heslo='$heslo' WHERE ID_uzivatele=$id");
        
        header("Location: uzivatele.php");
        $_SESSION["zprava"]="Uživatel $id byl upraven";
        
    }}
    }}
?>