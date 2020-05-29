<?php
date_default_timezone_set('America/Sao_Paulo');
session_start();

include('connect/connect.php');

if ((!isset ($_SESSION["sobrasCpfcnpj"]) == true ) AND (!isset ($_SESSION["sobrasPassword"]) == true)) {

    unset($_SESSION['sobrasCpfcnpj']);
    unset($_SESSION['sobrasPassword']);

    session_destroy();

    echo "<script>alert('Tempo esgotado de sessão! Faça o login novamente.');</script>";
    echo "<script>window.location.replace('index.php');</script>";

}

else {


$time = $_SESSION['time'];
$limite = $_SESSION['limite'];
$segundos = time()-$time;

if($segundos>$limite) {

    session_destroy();
    
    echo "<script>alert('Tempo esgotado de sessão! Faça o login novamente.');</script>";
    echo "<script>window.location.replace('index.php');</script>";

}
else {
    $_SESSION['time'] = time();
}

}

?>

<?php

$cpfcnpj = $_POST['cpfcnpj'];
$valorSolicitado = $_POST['valorSolicitado'];
$aplicacao = $_POST['aplicacao'];
$valorAplicacao = $_POST['valorAplicacao'];
$valorAplicado = '';

$dataAgora = date('d/m/Y');
$horaAgora = date('H:i:s');


if($aplicacao == 'sim'){
    $valorAplicado = $valorAplicacao;
}

$ip = $_SERVER["REMOTE_ADDR"];
$data = date('d/m/Y');
$hora = date('H:i:s');
$dateFormated = date('Y-m-d')." ".$hora;
$nome = $_SESSION["sobrasNome"];


if($aplicacao == 'sim' ){
mysqli_query($con, "UPDATE valores SET valorResgate = '$valorSolicitado', dataResgate = '$data', horaResgate = '$hora', ipResgate = '$ip', valorAplicado = '$valorAplicado', dateFormated = '$dateFormated' WHERE cpf = '$cpfcnpj'  ");
mysqli_query($con, "INSERT INTO aplicacoes (cpf, nome, valor, data, hora) VALUES ('$cpfcnpj', '$nome', '$valorAplicado', '$dataAgora', '$horaAgora')  ");
}
else{
mysqli_query($con, "UPDATE valores SET valorResgate = '$valorSolicitado', dataResgate = '$data', horaResgate = '$hora', ipResgate = '$ip', dateFormated = '$dateFormated' WHERE cpf = '$cpfcnpj'  ");
}

$checkQuery = mysqli_query($con, "SELECT * FROM valores WHERE cpf = '$cpfcnpj' AND valorResgate != '' AND dataResgate != '' AND horaResgate != '' AND ipResgate != '' ");
$numCheckQuery  = mysqli_num_rows($checkQuery);

if($numCheckQuery > 0){
echo 1;
}
else{
echo 0;
}

?>