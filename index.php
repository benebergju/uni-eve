<?php
    $header_title = "Startseite - Initiative 4.0";
?>

<!DOCTYPE html>
<html class="home">
    <?php include('comp/header.php'); ?>
    <body>
        <?php include('comp/navbar.php'); ?>
        <div class="hero">
            <div class="wrapper flex">
                <div class="hero_text">
                    Dich stört etwas?<br>
                    Ändere es!
                </div>
                <div class="hero_signup">
                    <form action="">
                        <h2>Registriere dich jetzt!</h2>
                        <label for="hero_signup_email">Email</label>
                        <input type="email" name="email" id="hero_signup_email" autocomplete="off">
                        <label for="hero_signup_password">Passwort</label>
                        <input type="password" name="password" id="hero_signup_password">

                        <div class="flex">
                            <div class="hero_login_call">
                                Du hast schon einen Account? <a href="/login.php">Jetzt anmelden</a>
                            </div>
                            <div class="hero_submit_wrapper">
                                <input type="submit" value="Registrieren" class="hero_submit">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
