<div class="panelUzivatele">
<?php 

    require 'login_php.php';

    if (isset($_SESSION['zprava-login'])) {
        echo $_SESSION['zprava-login'];   
        unset($_SESSION['zprava-login']);
    }?>
    <?php if (isset($_SESSION['prihlasenyUzivatel'])) { 
       echo $_SESSION['prihlasenyUzivatel']['login'].' '.$_SESSION['prihlasenyUzivatel']['admin'];     ?>
       <button><a href="logout_php.php">Odhlásit se</a></button>
    <?php }else{?>
        <form method="POST" class="form-login">
                <input type="text" name="login" placeholder="Login" required>
            
                <input type="password" name="heslo" placeholder="Heslo" required>
            
                <input type="submit" name="prihlasit" value="Přihlásit">
                
        </form>
        <button><a href="registrace.php">Registrovat se</a></button>

        <?php }?>
</div>