<?php 

require('includes/config.php');

session_start();

$id = $_SESSION['id'];

// If form submitted, insert values into the database.
if (isset($_REQUEST['titulo'])){

    // removes backslashes
	$titulo = stripslashes($_REQUEST['titulo']);
    //escapes special characters in a string
	$titulo = mysqli_real_escape_string($con,$titulo); 
	$conteudo = stripslashes($_REQUEST['conteudo']);
	$conteudo = mysqli_real_escape_string($con,$conteudo);
	$data = date("Y-m-d H:i:s");
    $query = "INSERT into `avisos` (`crdr_id`, `titulo`, `conteudo`, `data`) VALUES ('$id', '$titulo', '$conteudo', '$data')";
    $result = mysqli_query($con,$query);
    if($result){
        header("Location: avisos.php");
    } 

}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include 'includes/components/header.php'; ?>
    <div class="content">
    <div class="form">
            <h1>Inserir aviso</h1>
            <form name="registration" action="" method="post">
                <input type="text" name="titulo" placeholder="Título" required />
                <input type="text" name="conteudo" placeholder="Conteúdo" required />
                <input type="submit" name="submit" value="Inserir" />
            </form>
    </div>
    </div>
</body>
</html>