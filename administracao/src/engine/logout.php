<?php
date_default_timezone_set("America/Recife");
session_start();
include('../connect/connect.php'); 

sleep(1);

$user = $_SESSION["adminSobrasUser"];
$data = date('d/m/Y');
$hora = date('H:i');

mysqli_query($con, "UPDATE adminusers SET ultimoAcesso = '$data', horaUltimoAcesso = '$hora' WHERE usuario = '$user' ");


header("Location: ../../");
session_destroy();
?>