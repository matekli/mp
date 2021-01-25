<?php 
    require 'db_connect.php';
    class Db{
        public function vypisVsechny($tabulka){
            $result = mysqli_query($db, "SELECT * FROM ?");
            $uzivatele = mysqli_fetch_all($uzivatele, MYSQLI_ASSOC);    
        }    
    }
?>