<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        require 'muj-ucet_php.php';
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
    <h1>Můj účet</h1>
    <div class="vlozeni">
    <form method="POST" class="form-vlozeni">
            <input type="hidden" name="ID_uzivatele" value="">
            <div>
                <input type="text" name="jmeno" placeholder="Jméno" value="<?= $uzivatele['jmeno'] ?>" required>
            </div>
            <div>
                <input type="text" name="prijmeni" placeholder="Příjmení" value="<?= $uzivatele['prijmeni'] ?>" required>
            </div>
            <div>
                <input type="text" name="login" placeholder="Login" value="<?= $uzivatele['login'] ?>" required>
            </div>
            <div>
                <input type="password" name="heslo" placeholder="Heslo">
            </div>
            <div>
                <input type="submit" name="editovat" value="Editovat">
            </div>
    </form>    
    </div>
</body>
</html>


    