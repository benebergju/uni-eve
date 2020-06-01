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
<html lang="de">
    <head>
        <?php include('comp/header.php'); ?>
        <style>
            body{
                background: url(assets/img/hero.jpg) no-repeat center center;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
                display: flex;
                justify-content: center;
            }
            .login_form h2{
                font-size:1.5rem;
                margin-bottom: 40px;
            }
            input{
                box-sizing: border-box;
                width:100%;
                border:solid 1px #777;
                transition: border-color 0.1s ease-in-out;
                padding: 15px;
                margin:12px 0 35px 0;
                font-size: 1.1rem;
            }
            input:focus{
                border-color:#ff1a00;
                outline: none;
            }
            .register_call{
                text-align: left;
                color:#888;
                flex:1;
                font-size: 0.8rem;
                align-self: center;
            }
            .login_submit_wrapper{
                flex:1;
                text-align: right;
            }
            .login_submit{
                display:inline-block;
                width:auto;
                background:#ff1a00;
                border-width: 0;
                color:#fff;
                font-weight: bold;
                font-size: 1.1rem;
                margin:0;
                cursor: pointer;
                transition: background-color 0.1s ease-in-out;

            }
            .login_submit:hover{
                background: #df0000;
            }
            .login_form{
                align-self: center;
                max-width:300px;
                flex:1;
                background:#fff;
                margin:40px;
                min-height:400px;
                padding:30px;
                box-shadow: 0 0 5px rgba(20, 20, 20, .3);
            }
            .login_error{
                padding:16px;
                background:rgba(255,0,0,.3);
                margin:0 0 20px;
            }
        </style>
    </head>
    <body>
        <div class="login_form">
            <form action="./login.php" method="POST">
                <h2>Anmelden</h2>
                <?php if($error=="email_required"):?>
                    <div class="login_error">Email darf nicht leer sein</div>
                <?php elseif($error=="email_invalid"):?>
                    <div class="login_error">Email ungültig</div>
                <?php elseif ($error == "password_invalid"):?>
                    <div class="login_error">Passwort darf nicht leer sein</div>
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
                        Noch keinen Account? <a href="/register.php">Jetzt registrieren</a>
                    </div>
                    <div class="login_submit_wrapper">
                        <input type="submit" value="Anmelden" class="login_submit">
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>

