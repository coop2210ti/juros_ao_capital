<?php
ob_start();
session_start();

sleep(1);

include('../connect/connect.php'); 

$cpfcnpj = $_POST['cpfcnpj'];
$password = $_POST['password'];


$_SESSION["sobrasCpfcnpj"] = '';
$_SESSION["sobrasPassword"] = '';
$_SESSION["sobrasNome"] = '';

if(strlen($cpfcnpj) > 14) {

$query = mysqli_query($con,"SELECT * FROM acesso WHERE cpfCnpj = '$cpfcnpj' AND cc = '$password' ");
$num = mysqli_num_rows($query);
$resul = mysqli_fetch_assoc($query);

$_SESSION['time'] = '';
$_SESSION['limite'] = '';

if ($num == 0) {

    unset ($_SESSION["sobrasCpfcnpj"]);
    unset ($_SESSION["sobrasPassword"]);
    unset ($_SESSION["sobrasNome"]);
    session_destroy();

    echo 0;


}
else{

if($resul['liberado'] == 'nao'){

    unset ($_SESSION["sobrasCpfcnpj"]);
    unset ($_SESSION["sobrasPassword"]);
    unset ($_SESSION["sobrasNome"]);
    session_destroy();

    echo 'nao';
}
else{
//---------------SETA AS CONFIGURA��ES DE TEMPO DE INATIVIDADE DA SESS�O-------------------//
  date_default_timezone_set("America/Recife");
  $tempolimite = 1000;

  $_SESSION['time'] = time(); // armazena o momento em que o usu�rio � autenticado
  $_SESSION['limite'] = $tempolimite; // armazena o tempo limite sem atividade


  $_SESSION["sobrasCpfcnpj"] = $resul['cpfCnpj'];
  $_SESSION["sobrasPassword"] = $resul['dataNascimento'];
  $_SESSION["sobrasNome"] = $resul['nome'];

  echo 1;

}

}


}

else{


$query = mysqli_query($con,"SELECT * FROM acesso WHERE cpfCnpj = '$cpfcnpj' AND dataNascimento = '$password' ");
$num = mysqli_num_rows($query);
$resul = mysqli_fetch_assoc($query);

$_SESSION['time'] = '';
$_SESSION['limite'] = '';

if ($num == 0) {

    unset ($_SESSION["sobrasCpfcnpj"]);
    unset ($_SESSION["sobrasPassword"]);
    unset ($_SESSION["sobrasNome"]);
    session_destroy();

    echo 0;


}
else{

if($resul['liberado'] == 'nao'){

    unset ($_SESSION["sobrasCpfcnpj"]);
    unset ($_SESSION["sobrasPassword"]);
    unset ($_SESSION["sobrasNome"]);
    session_destroy();

    echo 'nao';
}
else{  

//---------------SETA AS CONFIGURA��ES DE TEMPO DE INATIVIDADE DA SESS�O-------------------//
  date_default_timezone_set("America/Recife");
  $tempolimite = 1000;

  $_SESSION['time'] = time(); // armazena o momento em que o usu�rio � autenticado
  $_SESSION['limite'] = $tempolimite; // armazena o tempo limite sem atividade


  $_SESSION["sobrasCpfcnpj"] = $resul['cpfCnpj'];
  $_SESSION["sobrasPassword"] = $resul['dataNascimento'];
  $_SESSION["sobrasNome"] = $resul['nome'];

  echo 1;

}

}


}






?>