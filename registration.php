<?php

require('includes/config.php');

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="includes/css/style.css" />
    <title>Registrar - <?php echo $appname; ?></title>
</head>
<body>

<?php

session_start();

// If form submitted, insert values into the database.
/*if (isset($_REQUEST['nome'])){

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
        $query = "INSERT into `usuarios` (`sr_id`, `nome`, `senha`, `email`, `ra`, `data`) VALUES ('$nome', '".md5($senha)."', '$email', '$ra', '$data')";
        $result = mysqli_query($con,$query);
        if($result){
            echo "<div class='form'>
                      <h3>You are registered successfully.</h3>
                      <br/>Click here to <a href='login.php'>Login</a>
                  </div>";
            $_SESSION['nome'] = $nome;
            header("Location: index.php");
        } 

} else{*/

?>

    <div class="form">
            <h1>Registration</h1>
            <form name="registration" action="" method="post">
                <input type="text" name="nome" placeholder="Username" />
                <input type="email" name="email" placeholder="Email" />
                <input type="password" name="senha" placeholder="senha" />
                <input type="text" name="ra" placeholder="RA" />
                <input type="text" id="series" placeholder="Série" list="serie">
                <datalist id="serie">
                  <option data-value="2" value="">1ºA</option>
                  <option data-value="3" value="">1ºB</option>
                  <option data-value="4" value="">1ºB</option>
                  <option data-value="5" value="">1ºB</option>
                  <option data-value="6" value="">1ºB</option>
                  <option data-value="7" value="">1ºB</option>
                  <option data-value="8" value="">1ºB</option>
                  <option data-value="9" value="">1ºB</option>
                  <option data-value="10" value="">1ºB</option>
                  <option data-value="11" value="">1ºB</option>
                  <option data-value="12" value="">1ºB</option>
                  <option data-value="13" value="">1ºB</option>
                  <option data-value="14" value="">1ºB</option>
                  <option data-value="15" value="">1ºB</option>
                  <option data-value="16" value="">1ºB</option>
                  <option data-value="17" value="">1ºB</option>
                  <option data-value="18" value="">1ºB</option>
                  <option data-value="19" value="">1ºB</option>
                  <option data-value="20" value="">1ºB</option>
                  <option data-value="21" value="">1ºB</option>
                  <option data-value="22" value="">1ºB</option>
                  <option data-value="23" value="">1ºB</option>
                  <option data-value="24" value="">1ºB</option>
                  <option data-value="25" value="">1ºB</option>
                  <option data-value="26" value="">1ºB</option>
                  <option data-value="27" value="">1ºB</option>
                  <option data-value="28" value="">1ºB</option>
                  <option data-value="29" value="">1ºB</option>
                  <option data-value="30" value="">1ºB</option>
                  <option data-value="31" value="">1ºB</option>
                  <option data-value="32" value="">1ºB</option>
                  <option data-value="33" value="">1ºB</option>
                  <option data-value="34" value="">1ºB</option>
                  <option data-value="35" value="">1ºB</option>
                  <option data-value="36" value="">1ºB</option>
                  <option data-value="37" value="">1ºB</option>
                </datalist>
                <input type="submit" name="submit" value="Register" />
            </form>
    </div>

<?php 

//}

?>

</body>

<script src="includes/js/script.js"></script>
</html>