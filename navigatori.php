<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php 
        require 'navigatori_php.php';
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
    <h1>Navigátoři</h1>
    <div class="vlozeni">
        <form method="POST" class="form-vlozeni">
            <input type="hidden" name="ID_navigatori" value="">
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
            <?php foreach ($navigatori as $navigator) { ?>
            <tr>
                <td><?= $navigator["ID_navigatori"] ?></td> 
                <td><?= $navigator["jmeno"] ?></td>  
                <td><?= $navigator["prijmeni"] ?></td>
                <td>
                    <a href="navigatori.php?editovat=<?php echo $navigator["ID_navigatori"];?>">Editovat</a>
                    <a href="navigatori.php?odstranit=<?php echo $navigator["ID_navigatori"];?>">Odstranit</a>
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
