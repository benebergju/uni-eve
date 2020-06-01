<?php
require __DIR__.'/vendor/autoload.php';

use Firebase\JWT\JWT;

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $error = null;
    if(!isset($_POST['email'])){
        $error = "email_required";
    } else {
        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $error = "email_invalid";
        }
    }
    if($error === null) {
        if (!isset($_POST['password'])) {
            $error = "password_required";
        }
    }
    if($error === null) {
        try {
            $db = new SQLite3('data.sqlite');
            $select_where_email = "SELECT email, password FROM user WHERE email=:email";
            $stmt = $db->prepare($select_where_email);

            $stmt->bindValue(':email', $_POST['email']);
            $result = $stmt->execute()->fetchArray();
            if ($result == null) {
                $error =  "email_notfound";
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    if($error === null) {
        if(password_verify($_POST["password"], $result[1])){
            $key = "ThisShouldNeverBeInProductionLikeThis"; // TODO Private Key
            $payload = array("user" => $result[0],
            );
            $jwt = JWT::encode($payload, $key, time()+60*60*24*7);
            setcookie("jwt", $jwt);
            header("Location: index.php");
            exit;
        }else {
            $error = "password_wrong";
        }
    }
}
?>

<?php
define("dacProtect", "");
$header_title = "Anmelden - Initiative 4.0";
?>

<!DOCTYPE html>
<html class="login">
<?php include('comp/header.php'); ?>
    <body>
        <div class="login_form">
            <form action="./login.php" method="POST">
                <h2>Anmelden</h2>
                <?php if($error=="email_invalid"):?>
                    <div class="login_error">Email ungültig</div>
                <?php elseif ($error == "password_invalid"):?>
                    <div class="login_error">Password darf nicht leer sein</div>
                <?php elseif ($error == "email_notfound"):?>
                    <div class="login_error">Email-Adresse konnte nicht gefunden werden</div>
                <?php elseif ($error == "password_wrong"):?>
                    <div class="login_error">Passwort inkorrekt</div>
                <?php endif; ?>
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

