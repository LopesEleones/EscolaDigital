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
if (isset($_POST['nome'])){

    // removes backslashes
	$nome = stripslashes($_REQUEST['nome']);
    //escapes special characters in a string
	$nome = mysqli_real_escape_string($con,$nome);
	$senha = stripslashes($_REQUEST['senha']);
	$senha = mysqli_real_escape_string($con,$senha);
	//Checking is user existing in the database or not
    $query = "SELECT * FROM `usuarios` WHERE nome='$nome' and senha='".md5($senha)."'";
	$result = mysqli_query($con,$query) or die(mysql_error());
	$rows = mysqli_num_rows($result);

    if($rows == 1){

	    $_SESSION['nome'] = $nome;
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
            <input type="text" name="nome" placeholder="Username" required />
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