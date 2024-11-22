<header>
    <a href="./" class="logo" id="logo-text">
        <i class="fa fa-server"></i> IT atbalsts
    </a>
    <div class="apply">
        <a href="./" class="btn">Sākums</a>
        <a href="./pieteikumi.php" class="btn">Pieteikumi</a>
        <a href="./" class="btn">PRO īpašnieki</a>
        <?php if ($_SESSION['loma']=="admin"):?>
            <a href="./users.php" class="btn">Lietotāji</a>
        <?php endif; ?>
        <a href="logout.php" class="btn"><i class="fas fa-power-off"></i></a>
    </div>

</header>