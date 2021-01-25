<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        require 'jezdci_php.php';
    ?>
    <?php 
        require 'tabulky.php';
    ?>
    <meta charset="UTF-8">
    
    
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
    <h1>Jezdci</h1>
    <div class="vlozeni">
        <form method="POST" class="form-vlozeni">
            <input type="hidden" name="ID_jezdci" value="">
            <div>
                <input type="text" name="jmeno" placeholder="Jméno" value="<?= $jmeno ?>" required>
            </div>
            <div>
                <input type="text" name="prijmeni" placeholder="Příjmení" value="<?= $prijmeni ?>" required>
            </div>
            <?php if ($editovat == false) { ?>
                <div>
                    <input type="submit" name="vlozit" value="Vložit">
                </div>
            <?php }else{ ?>
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
                <th>Administrace</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($jezdci as $jezdec) { ?>
            <tr>
                <td><?= $jezdec["ID_jezdci"] ?></td> 
                <td><?= $jezdec["jmeno"] ?></td>  
                <td><?= $jezdec["prijmeni"] ?></td>
                <td>
                    <a href="jezdci.php?editovat=<?php echo $jezdec["ID_jezdci"];?>">Editovat</a>
                    <a href="jezdci.php?odstranit=<?php echo $jezdec["ID_jezdci"];?>">Odstranit</a>
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