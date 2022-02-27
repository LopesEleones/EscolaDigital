<?php

require('includes/config.php');

session_start();

if(!isset($_SESSION["nome"])){
    header("Location: login.php");
    exit(); 
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="includes/css/style.css">
    <title><?php echo $appname; ?></title>
</head>
<body>
    <?php
        //include 'includes/components/splash.php';
        include 'includes/components/header.php';
    ?>
    <div class="content">
    <a href="avisos.php" class="index-card container">Avisos</a>
    <a href="sobremim.php" class="index-card container">Sobre Mim</a>
    </div>

</body>

<script src="includes/js/script.js"></script>
</html>