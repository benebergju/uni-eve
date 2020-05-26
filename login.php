<?php
$header_title = "Anmelden - Initiative 4.0";
?>

<!DOCTYPE html>
<html class="login">
<?php include('comp/header.php'); ?>
    <body>
        <div class="login_form">
            <form action="">
                <h2>Anmelden</h2>
                <label for="login_email">Email</label>
                <input type="email" name="email" id="login_email" autocomplete="off">
                <label for="login_password">Passwort</label>
                <input type="password" name="password" id="login_password">

                <div class="flex">
                    <div class="register_call">
                        Noch keinen Account? <a href="/signup.php">Jetzt registrieren</a>
                    </div>
                    <div class="login_submit_wrapper">
                        <input type="submit" value="Anmelden" class="login_submit">
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>

