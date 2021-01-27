<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        require 'zavody_php.php';
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
    <h1>Závody</h1>
    <?php if (isset($_SESSION['prihlasenyUzivatel'])) {
            if ($_SESSION['prihlasenyUzivatel']['admin']==1){ ?>
                <div class="vlozeni">
                    <form method="GET" class="form-vlozeni">
                        <input type="hidden" name="ID_zavody" value="">
                        <div>
                            <input type="text" name="nazev" placeholder="Jméno" value="<?= $nazev ?>" required>
                        </div>
                        <div>
                            <input type="date" name="datum_od"  value="<?= $datum_od ?>" required>
                        </div>
                        <div>
                            <input type="date" name="datum_do"  value="<?= $datum_do ?>" required>
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
    <?php }} ?>
    <table id="vypis" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Název</th>
                <th>Od</th>
                <th>Do</th>
                <?php if (isset($_SESSION['prihlasenyUzivatel'])) {
                    if ($_SESSION['prihlasenyUzivatel']['admin']==1){ ?>
                        <th>Administrace</th>
                <?php }} ?>   
            </tr>
        </thead>
        <tbody>
            <?php foreach ($zavody as $zavod) { ?>
            <tr>
                <td><?= $zavod["ID_zavody"] ?></td> 
                <td><a href="zavod-info.php?id=<?php echo $zavod["ID_zavody"];?>"><?= $zavod["nazev"] ?></a></td>  
                <td><?= $zavod["datum_od"] ?></td>
                <td><?= $zavod["datum_do"] ?></td>
                <?php if (isset($_SESSION['prihlasenyUzivatel'])) {
                    if ($_SESSION['prihlasenyUzivatel']['admin']==1){ ?>
                        <td>
                            <a href="zavody.php?editovat=<?php echo $zavod["ID_zavody"];?>">Editovat</a>
                            <a href="zavody.php?odstranit=<?php echo $zavod["ID_zavody"];?>">Odstranit</a>
                        </td> 
                    <?php }} ?>      
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

