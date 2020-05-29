<?php
date_default_timezone_set('America/Recife');
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

$dataAgora = date('d/m/Y');
$horaAgora = date('H:i:s');


$ip = $_SERVER["REMOTE_ADDR"];
$data = date('d/m/Y');
$hora = date('H:i:s');
$dateFormated = date('Y-m-d')." ".$hora;
$nome = $_SESSION["sobrasNome"];

mysqli_query($con, "UPDATE valores SET valor_resgate = '$valorSolicitado', data_resgate = '$data', hora_resgate = '$hora', ip_resgate = '$ip', date_formated = '$dateFormated' WHERE cpf_cnpj = '$cpfcnpj'  ");

$checkQuery = mysqli_query($con, "SELECT * FROM valores WHERE cpf_cnpj = '$cpfcnpj' AND valor_resgate != '' AND data_resgate != '' AND hora_resgate != '' AND ip_resgate != '' ");
$numCheckQuery  = mysqli_num_rows($checkQuery);

if($numCheckQuery > 0){
echo 1;
}
else{
echo 0;
}

?>