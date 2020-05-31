<?php
    require_once(dirname(__FILE__).'/../lib/block_direct_access.php');
?>
<head>
    <meta charset="UTF-8">
    <title><?php if (isset($header_title)) {
            echo $header_title;
        } else {
            echo "Initiative 4.0";
        } ?></title>
    <link href='https://fonts.googleapis.com/css?family=Cantarell' rel='stylesheet' type='text/css'><?php # TODO Better font delivery ?>
    <link rel="stylesheet" href="style.css">
</head>