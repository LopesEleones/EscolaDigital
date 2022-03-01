<?php

$sql = "SELECT * FROM avisos WHERE sr_id='$srid'";
$buscar = mysqli_query($con,$sql);
$dados = mysqli_fetch_array($buscar);

$result = mysqli_num_rows($buscar);

if ($result==1) {

    $titulo = $dados["titulo"];
    $conteudo = $dados["conteudo"];
    $criadorid = $dados["crdr_id"];
    $sqlcriador = "SELECT * FROM usuarios WHERE id='$criadorid'";
    $buscarcriador = mysqli_query($con,$sqlcriador);
    $dadoscriador = mysqli_fetch_array($buscarcriador);
    $criador = $dadoscriador["nome_completo"];
    $data = $dados["data"];

}

?>