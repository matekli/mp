<?php 
    if (isset($_POST['prihlasit'])) {
        $login = $_POST['login'];
        $heslo = hash("sha256",$_POST['heslo']);
        $result = mysqli_query($db,"SELECT * FROM uzivatele WHERE login='$login'");
        $row=mysqli_fetch_assoc($result);
          if(isset($row)){
          if ($row['heslo']==$heslo) {
            /*$_SESSION['id']=$row['ID_uzivatele'];
            $_SESSION['jmeno']=$row['jmeno'];
            $_SESSION['prijmeni']=$row['prijmeni'];
            $_SESSION['login']=$login;
            $_SESSION['admin']=$row['admin'];*/
            $uzivatel = array(
                              "id" => $row['ID_uzivatele'],
                              "jmeno" => $row['jmeno'],
                              "prijmeni" => $row['prijmeni'],
                              "login" => $row['login'],
                              "admin" => $row['admin']
            );
            $_SESSION['prihlasenyUzivatel']=$uzivatel;
            header("Location: index.php");
            exit();
          }
          else $_SESSION['zprava-login'] = "Špatné heslo";
        }
        else $_SESSION['zprava-login'] = "Špatné uživatelské jméno";
    }
?>