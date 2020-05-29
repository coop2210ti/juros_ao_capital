<?php
ob_start();
session_start();

sleep(1);

include('../connect/connect.php'); 

$user = $_POST['user'];
$password = $_POST['password'];


$_SESSION["adminSobrasUser"] = '';
$_SESSION["adminSobrasPassword"] = '';
$_SESSION["adminSobrasNome"] = '';
$_SESSION["adminSobrasUltimoAcesso"] = '';
$_SESSION["adminSobrasHoraUltimoAcesso"] = '';


$query = mysqli_query($con,"SELECT * FROM adminusers WHERE usuario = '$user' ");
$num = mysqli_num_rows($query);
$resul = mysqli_fetch_assoc($query);

$token = $resul['senha'];


$_SESSION['time'] = '';
$_SESSION['limite'] = '';

if ($num == 0) {

    unset ($_SESSION["adminSobrasUser"]);
    unset ($_SESSION["adminSobrasPassword"]);
    unset ($_SESSION["adminSobrasNome"]);
    unset ($_SESSION["adminSobrasUltimoAcesso"]);
    unset ($_SESSION["adminSobrasHoraUltimoAcesso"]);
    session_destroy();

    echo 0;


}
else {

if (crypt($password, $token) === $token) {


//---------------SETA AS CONFIGURA��ES DE TEMPO DE INATIVIDADE DA SESS�O-------------------//
  date_default_timezone_set("America/Recife");
  $tempolimite = 20000;

  $_SESSION['time'] = time(); // armazena o momento em que o usu�rio � autenticado
  $_SESSION['limite'] = $tempolimite; // armazena o tempo limite sem atividade


  $_SESSION["adminSobrasUser"] = $resul['usuario'];
  $_SESSION["adminSobrasPassword"] = $resul['senha'];
  $_SESSION["adminSobrasNome"] = $resul['nome'];
  $_SESSION["adminSobrasUltimoAcesso"] = $resul['ultimoAcesso'];
  $_SESSION["adminSobrasHoraUltimoAcesso"] = $resul['horaUltimoAcesso'];

  echo 1;


} 
else {

echo 'nothing';


}




}

?>