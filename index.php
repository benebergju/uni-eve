<?php
    define("dacProtect", "");
    $header_title = "Startseite - Initiative 4.0";
?>

<!DOCTYPE html>
<html lang="de">
    <head>
        <?php include('comp/header.php'); ?>
        <style>
            .hero{
                background: url(assets/img/hero.jpg) no-repeat center center;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
            }
            .hero_text{
                align-self: center;
                flex:2;
                font-size: 4rem;
                color:#fff;
                text-shadow: 0 0 10px rgba(20, 20, 20, 0.5);
                line-height: 6.4rem;
                margin-top:40px;
            }
            .hero_signup{
                box-sizing: border-box;
                width:100%;
                flex:1;
                background:#fff;
                margin:40px;
                min-height:400px;
                padding:30px;
                box-shadow: 0 0 5px rgba(20, 20, 20, .3);
            }
            .hero_signup h2{
                font-size:1.5rem;
                margin-bottom: 40px;
            }
            .hero input{
                box-sizing: border-box;
                width:100%;
                border:solid 1px #777;
                transition: border-color 0.1s ease-in-out;
                padding: 15px;
                margin:12px 0 35px 0;
                font-size: 1.1rem;
            }
            .hero input:focus{
                border-color:#ff1a00;
                outline: none;
            }
            .hero_login_call{
                text-align: left;
                color:#888;
                flex:1;
                font-size: 0.8rem;
                align-self: center;
            }
            .hero_submit_wrapper{
                flex:1;
                text-align: right;
            }
            .hero .hero_submit{
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
            .hero .hero_submit:hover{
                background: #df0000;
            }

            .popular h1{
                font-size:3rem;
                margin:80px 0;
            }

        </style>
    </head>
    <body>
        <?php include('comp/navbar.php'); ?>
        <main>
            <section class="hero">
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
            </section>
            <section class="wrapper popular">
                <h1>Beliebte Initiativen</h1>
                <?php # TODO Add content ?>
            </section>
        </main>
        <?php include('comp/footer.php'); ?>
    </body>
</html>
