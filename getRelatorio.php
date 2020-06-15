<?php

//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

sleep(1);

include ('src/connect/connect.php');

function inverteData($data){

    $ex = explode('/',$data);
    return $ex[2].$ex[1].$ex[0];
}

function inverteDataToDatabase($data){

    $ex = explode('/',$data);
    return $ex[2].'-'.$ex[1].'-'.$ex[0];
}

function inverteDataNameFile($data){

    $ex = explode('-',$data);
    return $ex[2].$ex[1].$ex[0];
}

function insertInPosition($str, $pos, $c){
    return substr($str, 0, $pos) . $c . substr($str, $pos);
}

//*************************************  //  *************************************//

function getData($connect,$sqlquery){

    $data = array();
    $result = mysqli_query($connect,$sqlquery) or trigger_error(mysqli_error().$sqlquery);
    if ($result)
    {
        while($row = mysqli_fetch_assoc($result))
        {
            $data[] = $row;
        }
    }
    return $data;
}

function array2csv(array &$array){

   if (count($array) == 0) {
     return null;
   }
   ob_start();
   $df = fopen("php://output", 'w');
   fputs($df, $bom = chr(0xEF) . chr(0xBB) . chr(0xBF));
   fputcsv($df, array_keys(reset($array)),';');
   foreach ($array as $row) {
      fputcsv($df, $row,';');
   }
   fclose($df);
   return ob_get_clean();
}

function download_send_headers($filename) {
    // disable caching
    $now = gmdate("D, d M Y H:i:s");
    header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
    header("Cache-Control: max-age=0, no-cache, must-revalidate, proxy-revalidate");
    header("Last-Modified: {$now} GMT");

    // force download  
    header("Content-Type: application/force-download");
    header("Content-Type: application/octet-stream");
    header("Content-Type: application/download");

    // disposition / encoding on response body
    header("Content-Disposition: attachment;filename={$filename}");
    header("Content-Transfer-Encoding: binary");
}

/*$dataIndicada = inverteData($_GET['data']);
$diaAnterior = date('Y-m-d',strtotime("-1 day", strtotime($dataIndicada)));

$dataCarga = inverteData(date('d/m/Y',strtotime("+1 day")));*/

//$password           = $_GET['senha'];
$password_interno   = 'sobras@2020';

$tipo               = $_GET['tipo'];

$dataCarga          = inverteData($_GET['data_carga']);

$data_inicial       = inverteDataToDatabase($_GET['data_inicial']);
$data_final         = inverteDataToDatabase($_GET['data_final']);


/*if($password != $password_interno){

    echo 'Senha inválida!';
    exit;
}
elseif($data_inicial > $data_final){

    echo 'Data inicial não pode ser maior que data final!';
    exit;
}*/

$query  = mysqli_query($con, "SELECT * FROM valores WHERE date_formated BETWEEN ('$data_inicial 15:01:00') AND ('$data_final 15:00:59')");
$num    = mysqli_num_rows($query);

$sql    = "SELECT cc, cpf_cnpj, associado, juros_liquido, status_cc, valor_resgate, data_resgate, hora_resgate, ip_resgate ";
$sql    .="FROM valores WHERE date_formated BETWEEN ('$data_inicial 15:01:00') AND ('$data_final 15:00:59')";

if($num == 0){

    //echo "<script>alert('Nenhuma solicitação foi encontrada no período!');window.location.href(main.php);</script>";
    //echo "<script>window.location.href = '../../main.php'</script>";
    echo 'Nenhuma solicitação foi encontrada no período!';
    exit;
}

else{

if($tipo == 'txt'){

    $fp = fopen(getcwd().'/fileOutput.txt', 'w');


    for($x=0;$x<$num;$x++) {

        $resul = mysqli_fetch_assoc($query);

        //$cc = str_pad(insertInPosition($resul['cc'], -1, '-'), 7, '0', STR_PAD_LEFT);
        $cc = str_pad($resul['cc'], 7, '0', STR_PAD_LEFT);
        $valor = str_pad(number_format($resul['valor_resgate'], 2, '', ''), 15, '0', STR_PAD_LEFT);

        $contentLine = $dataCarga.$valor."13".$cc."0000000000"."00000000"."JUROCP19";


        fwrite($fp, $contentLine."\r\n");
    }

    $dataFile = date('dmy');
    $fileName = 'CAP'.$dataFile.'.txt';
    $Nomeantigo = getcwd().'/fileOutput.txt';

    $read = file_get_contents($Nomeantigo);

    $download = $read;header('Content-type: text/plain');header("Content-Disposition: attachment; filename=\"" . $fileName . "\"");ob_clean();
    echo $download;
    exit;
}

if($tipo == 'csv'){
    download_send_headers("REL_JUROS_CAPITAL_" .inverteDataNameFile($data_inicial)."_".inverteDataNameFile($data_final).".csv");
    echo array2csv(getData($con,$sql));
    exit;
}

}

?>