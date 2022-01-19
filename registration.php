<?php

require('includes/config.php');

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css" />
    <title>Registrar - <?php echo $appname; ?></title>
</head>
<body>

<?php

session_start();

// If form submitted, insert values into the database.
if (isset($_REQUEST['nome'])){

        // removes backslashes
	$nome = stripslashes($_REQUEST['nome']);
        //escapes special characters in a string
	$nome = mysqli_real_escape_string($con,$nome); 
	$email = stripslashes($_REQUEST['email']);
	$email = mysqli_real_escape_string($con,$email);
	$senha = stripslashes($_REQUEST['senha']);
	$senha = mysqli_real_escape_string($con,$senha);
        $ra = stripslashes($_REQUEST['ra']);
        $ra = mysqli_real_escape_string($con,$ra);
	$data = date("Y-m-d H:i:s");
        $query = "INSERT into `usuarios` (`nome`, `senha`, `email`, `ra`, `data`) VALUES ('$nome', '".md5($senha)."', '$email', '$ra', '$data')";
        $result = mysqli_query($con,$query);
        if($result){
            echo "<div class='form'>
                      <h3>You are registered successfully.</h3>
                      <br/>Click here to <a href='login.php'>Login</a>
                  </div>";
            $_SESSION['nome'] = $nome;
            header("Location: index.php");
        } 

} else{

?>

    <div class="form">
            <h1>Registration</h1>
            <form name="registration" action="" method="post">
                <input type="text" name="nome" placeholder="Username" required />
                <input type="email" name="email" placeholder="Email" required />
                <input type="password" name="senha" placeholder="senha" required />
                <input type="text" name="ra" placeholder="RA" required />
                <input type="submit" name="submit" value="Register" />
            </form>
    </div>

<?php 

}

?>

</body>
</html>