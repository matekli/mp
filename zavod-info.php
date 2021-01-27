<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        require 'zavod-info_php.php';
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
    <h1><?= $zavod[1] ?></h1>
    <a href="start-list.php?id=<?php echo $id;?>">Startovní listina</a>
    <?php if (isset($_SESSION['prihlasenyUzivatel'])) {
            if ($_SESSION['prihlasenyUzivatel']['admin']==1){ ?>
    <div class="vlozeni">
        <form method="POST" class="form-vlozeni">
            <input type="hidden" name="ID_vysledky" value="">
            <div>
                <input type="number" name="poradi" min="1" value="<?= $poradi ?>">
            </div>
            <?php if ($editovat == false) { ?>
                <div>
                    <select name="posadka">
                        <option></option>
                        <?php foreach ($startovky as $startovka) { ?>
                            <option value="<?= $startovka["ID_startovky"]?>"><?= $startovka["jmeno"].' '
                                            .$startovka["prijmeni"].' - '.$startovka["navigator_jmeno"]
                                            .' '.$startovka["navigator_prijmeni"].' ('.$startovka["nazev_auto"].')' ?></option>
                        <?php } ?>
                    </select>   
                </div>
                <div>
                    <input type="submit" name="vlozit" value="Vložit">   
                </div>
            <?php }else {?> 
                <div>
                    <input type="text" value="<?= $vysledky_jezdec_edit["jmeno"].' '.$vysledky_jezdec_edit["prijmeni"].' - '
                                                .$vysledky_navigator_edit["jmeno"].' '.$vysledky_navigator_edit["prijmeni"]
                                                .' ('.$vysledky_auto_edit['nazev'] ?>" readonly>
                </div>
                <div>
                    <input type="submit" name="editovat" value="Editovat">
                </div>
            <?php }?> 
            </div>
        </form>
    </div>
    <?php }} ?>
    <table id="vypis" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Pořadí</th>
                <th>Posádka</th>
                <th>Auto</th>
                <?php if (isset($_SESSION['prihlasenyUzivatel'])) {
                    if ($_SESSION['prihlasenyUzivatel']['admin']==1){ ?>
                        <th>Administrace</th>
                <?php }} ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($vysledky as $vysledek) { ?>
            <tr>
                <td><?= $vysledek["poradi"].'.' ?></td> 
                <td><?= $vysledek["jmeno"].' '.$vysledek["prijmeni"].' - '.$vysledek['navigator_jmeno'].' '.$vysledek['navigator_prijmeni'] ?></td>
                <td><?= $vysledek["auto_nazev"] ?></td> 
                <?php if (isset($_SESSION['prihlasenyUzivatel'])) {
                    if ($_SESSION['prihlasenyUzivatel']['admin']==1){ ?>
                        <td><a href="zavod-info.php?id=<?php echo $id;?>&editovat=<?php echo $vysledek['ID_vysledky'];?>">Editovat</a> 
                        <a href="zavod-info.php?id=<?php echo $id;?>&odstranit=<?php echo $vysledek['ID_vysledky'];?>">Odstranit</a></td>  
                <?php }} ?>
            <?php } ?> 
            </tr>
        </tbody>     
    </table> 
    <?php function pre_r($array){
            echo '<pre>';
            print_r($array);
            echo '</pre>';
        }
    ?>
</body>
</html>