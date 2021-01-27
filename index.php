<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <?php 
        require 'db_connect.php';
    ?>
    <?php 
        require 'tabulky.php';
    ?>
    <link rel="stylesheet" href="style.css">
    <title>RallyeMag</title>
</head>
<body>
    <?php 
        require 'login.php';
    ?>
    <?php   
        require 'navigace.php';    
        /*function pre_r($array){
            echo '<pre>';
            print_r($array);
            echo '</pre>';
        }
        pre_r($_SESSION['prihlasenyUzivatel']);*/
    ?>
  
    <h1>Úvod</h1>
</body>
</html>
