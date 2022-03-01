<?php

require('includes/config.php');

session_start();

$id = $_SESSION['id'];
$sclid = $_SESSION['scl_id'];
$tipo = $_SESSION['tipo'];

require "includes/sqls/avisos.php";

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avisos</title>
</head>
<body>
    <?php include 'includes/components/header.php'; ?>
    <div class="content">
    <h1>Avisos</h1>
    <?php if($tipo == 3 || 4) {
        ?> <a href="inseriraviso.php">Inserir aviso</a> <?php
    } else {
        // Nada
    } ?>

    <div class="card">
        <div class="container">
            <h4><b><?php echo $titulo; ?></b></h4><p><?php echo $data; ?> por <?php echo $criador ?></p>
            <p><?php echo $conteudo; ?><br></p>
        </div>
    </div>
    </div>
</body>
</html>