<?php

$sql = "SELECT * FROM usuarios WHERE id='$id'";
$buscar = mysqli_query($con,$sql);
$dados = mysqli_fetch_array($buscar);

$result = mysqli_num_rows($buscar);

if ($result==1) {

    $nome = $dados["nome"];
    $nome_completo = $dados["nome_completo"];
    $email = $dados["email"];
    $ra = $dados["ra"];
    $nasc = $dados["nasc"];
    $scl_id = $dados['scl_id'];

}

$sqlescola = "SELECT * FROM escolas WHERE id='$scl_id'";
$buscarescola = mysqli_query($con,$sqlescola);
$dadosescola = mysqli_fetch_array($buscarescola);

$resultescola = mysqli_num_rows($buscarescola);

if ($resultescola==1) {

    $nomeescola = $dadosescola["nome"];
    $enderecoescola = $dadosescola["endereco"];
    $cidadeescola = $dadosescola["cidade"];
    $estadoescola = $dadosescola["estado"];
    $telefoneescola1 = $dadosescola["telefone_1"];
    $telefoneescola2 = $dadosescola["telefone_2"];

}

?>