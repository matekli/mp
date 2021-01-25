<!DOCTYPE html>
<html lang="en">
<head>
    <?php   
        require 'registrace_php.php'
    ?>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <title>RallyeMag</title>
</head>
<body>
    <?php       
        require 'navigace.php'
    ?>
    <h1>Registrace</h1>
    <form method="POST" class="vlozeni">
        <input type="hidden" name="ID_uzivatele" value="">
        <div>
            <input type="text" name="jmeno" placeholder="Jméno" required>
        </div>
        <div>
            <input type="text" name="prijmeni" placeholder="Příjmení" required>
        </div>
        <div>
            <input type="text" name="login" placeholder="Login" required>
        </div>
        <div>
            <input type="password" name="heslo" placeholder="Heslo" required>
        </div>
        <div>
            <input type="submit" name="registrovat" value="Registrovat">
        </div>    
</body>
</html>

        