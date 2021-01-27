<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        require 'start-list_php.php';
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
    <h1>Startovní listina <?= $zavod[1] ?></h1>
    <a href="start-list.php?id=<?php echo $zavod["ID_zavody"];?></a>"></a>

    <table id="vypis" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Posádka</th>
                <th>Auto</th>
                <th>Skupina</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($startovky as $startovka) { ?>
            <tr>
                <td><?= $startovka["cislo"] ?></td>
                <td><?= $startovka["jmeno"].' '.$startovka["prijmeni"].' - '.$startovka["navigator_jmeno"].' '.$startovka["navigator_prijmeni"] ?></td>
                <td><?= $startovka["nazev_auto"] ?></td>
                <td><?= $startovka["skupina_auto"] ?></td>
            <?php } ?> 
            </tr>
        </tbody>     
    </table> 
    
</body>
</html>