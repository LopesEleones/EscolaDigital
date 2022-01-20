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
    $img = $dados["img"];

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
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <input type="hidden" name="nome" <?php echo $nome; ?>>
                                <input type="file" name="imagem" id="imagem" accept=".jpg, .jpeg, .png">
                                <i class="fa fa-camera" style="color: #fff;"></i>
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

if(isset($_FILES["imagem"]["nome"])) {
    $id = $_POST["id"];
    $nome = $_POST["nome"];

    $imageName = $_FILES["imagem"]["nome"];
    $imageSize = $_FILES["imagem"]["size"];
    $tmpName = $_FILES["imagem"]["tmp_name"];

    // Image validation
    $validImageExtension = ['jpg', 'jpeg', 'png'];
    $imageExtension = explode('.', $imageName);
    $imageExtension = strtolower(end($imageExtension));
    if(!in_array($imageExtension, $validImageExtension)) {
        echo "<script>alert('Invalid Image Extension');</script>";
    } elseif ($imageSize > 1200) {
        echo "<script>alert('Image Too Large');</script>";
    } else {
        $newImageName = $name . " - " . date("Y.m.d") . " - " . date("h.i.sa"); // Generate new image name
        $newImageName .= "." . $imageExtension;
        $query = "UPDATE alunos SET img='$newImageName' WHERE id='$id'";
        mysqli_query($con,$query);
        move_uploaded_file($tmpName, './includes/img/' . $newImageName);
    }
}

?>
</html>