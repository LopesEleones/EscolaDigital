<?php

require('includes/config.php');

session_start();

$id = $_SESSION['id'];

$sql = "SELECT * FROM avisos WHERE crdr_id='$id'";
$buscar = mysqli_query($con,$sql);
$dados = mysqli_fetch_array($buscar);

$result = mysqli_num_rows($buscar);

if ($result==1) {

    $titulo = $dados["titulo"];
    $conteudo = $dados["conteudo"];
    $data = $dados["data"];

}

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
    <h1>Avisos</h1>
    <a href="inseriraviso.php">Inserir aviso</a>

    <div class="card">
        <div class="container">
            <h4><b><?php echo $titulo; ?></b></h4><p><?php echo $data; ?></p>
            <p><?php echo $conteudo; ?><br></p>
        </div>
    </div>
</body>
</html>