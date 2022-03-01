<?php

require('includes/config.php');

//include 'includes/components/splash.php';

?>

<html>
<head>
	<title>Animated Login Form</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="includes/css/login.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
</head>
<body>
<?php

session_start();

// If form submitted, insert values into the database.
if (isset($_POST['emailoura'])){

    require "includes/sqls/login.php";

} else{

?>
	<img class="wave" src="includes/img/wave.png">
	<div class="container">
		<div class="img">
			<img src="includes/img/bg.svg">
		</div>
		<div class="login-content">
			<form action="" method="post" name="login">
				<img src="includes/img/avatar.svg">
				<h2 class="title">Welcome</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Email</h5>
           		   		<!--<input type="text" class="input">-->
						<input type="text"  class="input" name="emailoura">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i">
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<!--<input type="password" class="input">-->
						<input type="password" class="input" name="senha">
            	   </div>
            	</div>
            	<a href="#">Forgot Password?</a>
            	<input name="submit" type="submit" class="btn" value="Login">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="includes/js/main.js"></script>
<?php 

} 

?>
</body>
</html>
