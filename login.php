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
if (isset($_POST['nomeoura'])){

    // removes backslashes
	$nomeoura = stripslashes($_REQUEST['nomeoura']);
    //escapes special characters in a string
	$nomeoura = mysqli_real_escape_string($con,$nomeoura);
	$senha = stripslashes($_REQUEST['senha']);
	$senha = mysqli_real_escape_string($con,$senha);
	//Checking is user existing in the database or not
    $query = "SELECT * FROM `usuarios` WHERE nome='$nomeoura' or ra='$nomeoura' and senha='".md5($senha)."'";
	$result = mysqli_query($con,$query) or die(mysql_error());
    $data = mysqli_fetch_array($result);
	$rows = mysqli_num_rows($result);

    if($rows == 1){

        $id = $data["id"];
        $_SESSION['id'] = $id;
        $nome = $data["nome"];
	    $_SESSION['nome'] = $nome;
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
    <div class="form">
        <h1>Log In</h1>
        <form action="" method="post" name="login">
            <input type="text" name="nomeoura" placeholder="Username" required />
            <input type="password" name="senha" placeholder="Password" required />
            <br>
            <input name="submit" type="submit" value="Login" />
        </form>
        <p>Not registered yet? <a href='registration.php'>Register Here</a></p>
    </div>

<?php 

} 

?>

</body>
</html>