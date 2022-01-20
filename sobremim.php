<?php

require('includes/config.php');

session_start();

$id = $_SESSION['id'];
$tipo = $_SESSION['tipo'];

$sql = "SELECT * FROM usuarios WHERE id='$id'";
$buscar = mysqli_query($con,$sql);
$dados = mysqli_fetch_array($buscar);

$result = mysqli_num_rows($buscar);

if ($result==1) {

    $nome = $dados["nome"];
    $email = $dados["email"];
    $ra = $dados["ra"];

}

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
    <h1>Sobre Mim</h1>
    <h3>Nome: <?php echo $nome ?></h3>
    <h3>Email Institucional: <?php echo $email ?></h3>
    <h3>RA: <?php echo $ra ?></h3>
</body>
</html>