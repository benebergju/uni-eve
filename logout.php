<?php
    if(isset($_COOKIE["jwt"])){
        setcookie("jwt", "", time() - 3600);
    }
    header("Location: index.php");
?>