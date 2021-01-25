<div class="navigace">
<nav>
    <ul>
        <li><a href="uzivatele.php">Uživatelé</a></li>
        <li><a href="jezdci.php">Jezdci</a></li>
        <li><a href="navigatori.php">Navigátoři</a></li>
        <li><a href="zavody.php">Závody</a></li>
        <?php if (isset($_SESSION['prihlasenyUzivatel'])) { ?>
            <li><a href="muj-ucet.php">Můj účet</a></li>
        <?php } ?>
        
    </ul>
</nav>
</div>