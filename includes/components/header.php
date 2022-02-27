<?php

require('./includes/config.php');

$id = $_SESSION['id'];

$sql = "SELECT * FROM usuarios WHERE id='$id'";
$buscar = mysqli_query($con,$sql);
$dados = mysqli_fetch_array($buscar);

$result = mysqli_num_rows($buscar);

if ($result==1) {

    $nome = $dados["nome"];
    $nome_completo = $dados["nome_completo"];
    $ra = $dados["ra"];
    $img = $dados["avatar"];

}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./includes/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="header" id="header">
        <a id="logo" href="index.php"><?php echo $appname; ?></a>
        <nav id="nav">
            <p><?php echo $_SESSION["nome"]; ?></p>
            <button id="btn-menu" aria-label="Abrir Menu" aria-haspopup="true" aria-controls="menu" aria-expanded="false">
                <span id="hamburger"></span>
            </button>
            <ul id="menu" role="menu">
                <li id="info">
                    <form class="form" id="form" action="" enctype="multipart/form-data" method="post">
                        <div class="upload">
                            <img src="./includes/img/<?php echo $img; ?>" width="125" height="125" title="<?php echo $img; ?>">
                            <div class="round">
                                <form method="POST" enctype="multipart/form-data"> 
                                    <input type="file" name="pic" id="imagem" accept="image/*">
                                    <i class="fa fa-camera" style="color: #fff;"></i>    
                                </form>
                            </div>
                        </div>
                    </form>
                    <h3><?php echo $nome_completo ?></h3>
                    <h3>RA: <?php echo $ra ?></h3>
                </li>
                <!--<li><a href="/">Configurações</a></li>
                <li><a href="/">Ajuda</a></li>-->
                <li><a href="logout.php">Sair</a></li>
            </ul>
        </nav>
    </div>
</body>

<script src="./includes/js/script.js"></script>

<?php 

if(isset($_FILES['pic']))
{
    $ext = strtolower(substr($_FILES['pic']['name'],-4)); //Pegando extensão do arquivo
    $new_name = $nome . "-" . date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
    $dir = './includes/img/'; //Diretório para uploads 
    move_uploaded_file($_FILES['pic']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
    $query = "UPDATE usuarios SET avatar='$new_name' WHERE id='$id'";
    mysqli_query($con,$query);
    //echo("Imagen enviada com sucesso!");
    header('Location: index.php');
} 

?>
</html>