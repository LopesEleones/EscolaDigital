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

    require "includes/sqls/login.php";

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