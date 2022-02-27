<?php

require('includes/config.php');

include 'includes/components/splash.php';

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<link rel="stylesheet" href="includes/css/style.css">
    <title>Entrar - <?php echo $appname; ?></title>
</head>
<body>

<?php

session_start();

// If form submitted, insert values into the database.
if (isset($_POST['emailoura'])){

    // removes backslashes
	$emailoura = stripslashes($_REQUEST['emailoura']);
    //escapes special characters in a string
	$emailoura = mysqli_real_escape_string($con,$emailoura);
	$senha = stripslashes($_REQUEST['senha']);
	$senha = mysqli_real_escape_string($con,$senha);
	//Checking is user existing in the database or not
    $query = "SELECT * FROM `usuarios` WHERE email='$emailoura' or ra='$emailoura' and senha='".md5($senha)."'";
	$result = mysqli_query($con,$query) or die(mysql_error());
    $data = mysqli_fetch_array($result);
	$rows = mysqli_num_rows($result);

    if($rows == 1){

        $id = $data["id"];
        $_SESSION['id'] = $id;
        $nome = $data["nome"];
	    $_SESSION['nome'] = $nome;
        $nome_compelto = $data["nome_completo"];
	    $_SESSION['nome_completo'] = $nome_completo;
        $tipo = $data["tipo"];
        $_SESSION['tipo'] = $tipo;
        setcookie($id);
        // Redirect user to index.php
	    header("Location: index.php");

    } else{

	    echo "<div class='form'>
              <h3>Nome/senha incorreto.</h3>
              <br/><a href='login.php'>Voltar</a></div>";

	}

} else{

?>
    <div class="form" id="formlogin">
        <h1>Entrar</h1>
        <form action="" method="post" name="login">
            <input type="text" name="emailoura" placeholder="Email Institucional ou RA" required />
            <input type="password" name="senha" placeholder="Senha" required />
            <br>
            <input name="submit" type="submit" value="Entrar" />
        </form>
        <p>Precisa de uma conta? <a href='registration.php' style="color: blue;">Crie uma</a></p>
    </div>

<?php 

} 

?>

</body>
</html>