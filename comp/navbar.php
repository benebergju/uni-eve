<?php
include_once '../lib/block_direct_access.php';
?>
<nav>
    <div class="wrapper flex">
        <div class="nav_left">
            <a href="/" class="logo">
                Initiative 4.0
            </a>
            <a href="/">
                Startseite
            </a>
            <a href="/regions.php">
                Regionen
            </a>
            <a href="/new.php">
                Neuste Initiativen
            </a>
        </div>
        <div class="nav_right">
            <?php if(isset($_COOKIE["jwt"])): ?>
            <a class="logout_button" href="/logout.php">Abmelden</a>
            <?php else: ?>
            <a class="login_button" href="/login.php">Anmelden</a>
            <?php endif; ?>
        </div>
    </div>
</nav>