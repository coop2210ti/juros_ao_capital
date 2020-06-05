<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

ob_start();
session_start();

sleep(1);

include('../connect/connect.php'); 

$cpfcnpj = $_POST['cpfcnpj'];
$password = $_POST['password'];


$_SESSION["sobrasCpfcnpj"] = '';
$_SESSION["sobrasPassword"] = '';
$_SESSION["sobrasNome"] = '';
$_SESSION["sobrasCC"] = '';

function formatCnpjCpf($value){

  $cnpj_cpf = preg_replace("/\D/", '', $value);
  
  if (strlen($cnpj_cpf) === 11) {
    return preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $cnpj_cpf);
  } 
  
  return preg_replace("/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/", "\$1.\$2.\$3/\$4-\$5", $cnpj_cpf);
}

if (strlen($cpfcnpj) === 11 OR strlen($cpfcnpj) === 14) {

	$cpfcnpj = formatCnpjCpf($cpfcnpj);

}


if(strlen($cpfcnpj) > 14) {

//PAGAMENTO DE JUROS AO CAPITAL 
$password = ltrim($password,'0');
$query    = mysqli_query($con,"SELECT * FROM valores WHERE cpf_cnpj = '$cpfcnpj' AND senha = '$password' AND bloqueio = 'nao' ");

$num = mysqli_num_rows($query);
$resul = mysqli_fetch_assoc($query);

$_SESSION['time'] = '';
$_SESSION['limite'] = '';

if ($num == 0) {

    unset ($_SESSION["sobrasCpfcnpj"]);
    unset ($_SESSION["sobrasPassword"]);
    unset ($_SESSION["sobrasNome"]);
    unset ($_SESSION["sobrasCC"]);
    session_destroy();

    echo 0;


}

else{
//---------------SETA AS CONFIGURA��ES DE TEMPO DE INATIVIDADE DA SESS�O-------------------//
  date_default_timezone_set("America/Recife");
  $tempolimite = 1000;

  $_SESSION['time'] = time(); // armazena o momento em que o usu�rio � autenticado
  $_SESSION['limite'] = $tempolimite; // armazena o tempo limite sem atividade

  //PAGAMENTO DE JUROS AO CAPITAL 
  $_SESSION["sobrasCpfcnpj"] = $resul['cpf_cnpj'];
  $_SESSION["sobrasPassword"] = $resul['senha'];
  $_SESSION["sobrasNome"] = $resul['associado'];
  $_SESSION["sobrasCC"] = $resul['cc'];

  echo 1;

}

}


else{


//PAGAMENTO DE JUROS AO CAPITAL 
$password = ltrim($password,'0');
$query = mysqli_query($con,"SELECT * FROM valores WHERE cpf_cnpj = '$cpfcnpj' AND senha = '$password' AND bloqueio = 'nao' ");

$num = mysqli_num_rows($query);
$resul = mysqli_fetch_assoc($query);

$_SESSION['time'] = '';
$_SESSION['limite'] = '';

if ($num == 0) {

    unset ($_SESSION["sobrasCpfcnpj"]);
    unset ($_SESSION["sobrasPassword"]);
    unset ($_SESSION["sobrasNome"]);
    unset ($_SESSION["sobrasCC"]);
    session_destroy();

    echo 0;


}

else{  

//---------------SETA AS CONFIGURA��ES DE TEMPO DE INATIVIDADE DA SESS�O-------------------//
  date_default_timezone_set("America/Recife");
  $tempolimite = 1000;

  $_SESSION['time'] = time(); // armazena o momento em que o usu�rio � autenticado
  $_SESSION['limite'] = $tempolimite; // armazena o tempo limite sem atividade

  //PAGAMENTO DE JUROS AO CAPITAL 
  $_SESSION["sobrasCpfcnpj"] = $resul['cpf_cnpj'];
  $_SESSION["sobrasPassword"] = $resul['senha'];
  $_SESSION["sobrasNome"] = $resul['associado'];
  $_SESSION["sobrasCC"] = $resul['cc'];

  echo 1;

}

}





?>