<div class="header">
    <div class="left">
        <img src="images/Rally-logo.jpg" width="100%">
    </div>
    <div class="right">
        <div class="panelUzivatele">
        <?php 

            require 'login_php.php';

            if (isset($_SESSION['zprava-login'])) {
                echo $_SESSION['zprava-login'];   
                unset($_SESSION['zprava-login']);
            }?>
            <?php if (isset($_SESSION['prihlasenyUzivatel'])) { 
            echo $_SESSION['prihlasenyUzivatel']['login']; ?>
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
        <div class="navigace">
            <nav>
                <ul>
                    <li><a href="index.php">Domů</a></li>
                    <?php if (isset($_SESSION['prihlasenyUzivatel'])) {
                        if ($_SESSION['prihlasenyUzivatel']['admin']==1){ ?>
                            <li><a href="uzivatele.php">Uživatelé</a></li>
                    <?php }} ?>
                    <li><a href="jezdci.php">Jezdci</a></li>
                    <li><a href="navigatori.php">Navigátoři</a></li>
                    <li><a href="zavody.php">Závody</a></li>
                    <?php if (isset($_SESSION['prihlasenyUzivatel'])) { ?>
                        <li><a href="muj-ucet.php">Můj účet</a></li>
                    <?php } ?>
                    
                </ul>
            </nav>
        </div>
    </div>
</div>