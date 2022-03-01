<?php

require('includes/config.php');

session_start();

$id = $_SESSION['id'];
$tipo = $_SESSION['tipo'];

require "includes/sqls/sobremim.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include 'includes/components/header.php'; ?>
    <div class="content">
    <h1>Sobre Mim</h1>
    <h3>Nome: <?php echo $nome_completo ?></h3>
    <h3>Email Institucional: <?php echo $email ?></h3>
    <h3>RA: <?php echo $ra ?></h3>
    <h3>Data de Nascimento: <?php echo $nasc ?></h3>

    <h1>Sobre Minha Escola</h1>
    <h3>Nome: <?php echo $nomeescola ?></h3>
    <h3>Endereço: <?php echo $enderecoescola ?></h3>
    <h3>Cidade: <?php echo $cidadeescola ?></h3>
    <h3>Estado: <?php echo $estadoescola ?></h3>
    <h3>Telefone 1: <?php echo $telefoneescola1 ?></h3>
    <h3>Telefone 2: <?php echo $telefoneescola2 ?></h3>
    </div>
</body>
</html>