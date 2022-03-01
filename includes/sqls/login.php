<?php

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
        $sclid = $data["scl_id"];
        $_SESSION['scl_id'] = $sclid;
        setcookie($id);
        // Redirect user to index.php
	    header("Location: index.php");

    } else{

	    echo "<div class='form'>
              <h3>Nome/senha incorreto.</h3>
              <br/><a href='login.php'>Voltar</a></div>";

	}

?>