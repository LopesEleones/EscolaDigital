<?php

require('./includes/config.php');

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./includes/css/style.css">
</head>
<body>
    <div class="header" id="header">
        <a id="logo" href=""><?php echo $appname; ?></a>
        <nav id="nav">
            <p><?php echo $_SESSION["nome"]; ?></p>
            <button id="btn-menu" aria-label="Abrir Menu" aria-haspopup="true" aria-controls="menu" aria-expanded="false">
                <span id="hamburger"></span>
            </button>
            <ul id="menu" role="menu">
                <li>
                    <?php echo $_SESSION['nome']; ?>
                </li>
                <li><a href="/">Configurações</a></li>
                <li><a href="/">Ajuda</a></li>
                <li><a href="logout.php">Sair</a></li>
            </ul>
        </nav>
    </div>
</body>

<script src="./includes/js/script.js"></script>
</html>