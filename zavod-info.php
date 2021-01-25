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
    <div class="vlozeni">
        <form method="POST" class="form-vlozeni">
            <div>
                <input type="number" name="poradi" min="1">
            </div>
            <div>
                <select name="jezdec">
                    <label for="jezdec">Jezdec</label>
                    <option></option>
                    <?php foreach ($jezdci as $jezdec) { ?>
                        <option value="<?= $jezdec['ID_jezdci'] ?>"><?= $jezdec['jmeno'].' '.$jezdec['prijmeni'] ?></option>
                    <?php } ?>
                </select>   
            </div>
            <div>
                <select name="navigator">
                    <label for="navigator">Navigátor</label>
                    <option></option>
                    <?php foreach ($navigatori as $navigator) { ?>
                        <option value="<?= $navigator['ID_navigatori'] ?>"><?= $navigator['jmeno'].' '.$navigator['prijmeni'] ?></option>
                    <?php } ?>
                </select>
            </div>  
            <div>
                <input type="submit" name="vlozit" value="Vložit">
            </div>
        </form>
    </div>
    <table id="vypis" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Pořadí</th>
                <th>Posádka</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($vysledky as $vysledek) { ?>
            <tr>
                <td><?= $vysledek["poradi"] ?></td> 
                <td><?= $vysledek["jmeno"].' '.$vysledek["prijmeni"].' - '.$vysledek['navigator_jmeno'].' '.$vysledek['navigator_prijmeni'] ?></td>
                <td><a href="zavod-info.php?id=<?php echo $zavod["ID_zavody"];?>&odstranit=<?php echo $vysledek["ID_vysledky"];?>">Odstranit</a></td>  
            <?php } ?> 
            </tr>
        </tbody>     
    </table> 
    
</body>
</html>