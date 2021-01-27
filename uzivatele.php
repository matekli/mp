<!DOCTYPE html>
<html lang="en">
<head>

    <?php 
        require 'uzivatele_php.php';
    ?>
    
    <?php 
        require 'tabulky.php';
    ?>
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script>
      $(document).ready(function(){
        $("#vypis").DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Czech.json"
            }
        });
      });
    
    
    </script>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
-->

    <link rel="stylesheet" href="style.css">
    <title>RallyeMag</title>
</head>
<body>
    <?php 
        require 'login.php';
    ?>
    <?php   
        require 'navigace.php';
    ?>
    <?php if (isset($_SESSION['prihlasenyUzivatel'])) {
            if ($_SESSION['prihlasenyUzivatel']['admin']==1){ ?>
    <h1>Uživatelé</h1>
    <div class="vlozeni">
        <form method="POST" class="form-vlozeni">
            <input type="hidden" name="ID_uzivatele" value="">
            <div>
                <input type="text" name="jmeno" placeholder="Jméno" value="<?= $jmeno ?>" required>
            </div>
            <div>
                <input type="text" name="prijmeni" placeholder="Příjmení" value="<?= $prijmeni ?>" required>
            </div>
            <div>
                <input type="text" name="login" placeholder="Login" value="<?= $login ?>" required>
            </div>
            <?php if ($editovat == false) { ?>
                <div>
                    <input type="password" name="heslo" placeholder="Heslo" required>
                </div>
                <div>
                    <input type="submit" name="vlozit" value="Vložit">
                </div>
            <?php }else{ ?>
                <div>
                    <input type="password" name="hesloEdit" placeholder="Heslo">
                </div>
                <div>
                    <input type="submit" name="editovat" value="Editovat">
                </div>
            <?php } ?> 

            <?php   /*if (isset($_SESSION['zprava'])){
                        echo $_SESSION['zprava'];           
                    } */
            ?>  
        </form>
    </div>
    <table id="vypis" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Jméno</th>
                <th>Příjmení</th>
                <th>Login</th>
                <th>Administrace</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($uzivatele as $uzivatel) { ?>
            <tr>
                <td><?= $uzivatel["ID_uzivatele"] ?></td> 
                <td><?= $uzivatel["jmeno"] ?></td>  
                <td><?= $uzivatel["prijmeni"] ?></td>  
                <td><?= $uzivatel["login"] ?></td>   
                <td>
                    <a href="uzivatele.php?editovat=<?php echo $uzivatel["ID_uzivatele"];?>">Editovat</a>
                    <a href="uzivatele.php?odstranit=<?php echo $uzivatel["ID_uzivatele"];?>">Odstranit</a>
                </td>       
      <?php } ?> 
            </tr>
        </tbody>     
    </table> 
    <?php 
        /*function pre_r($array){
            echo '<pre>';
            print_r($array);
            echo '</pre>';
        }
        pre_r($result);*/
    ?>
</body>
</html>
<?php }} ?>