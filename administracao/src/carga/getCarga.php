<?php

sleep(1);

include ('../connect/connect.php');

function inverteData($data){

    $ex = explode('/',$data);
    return $ex[2].$ex[1].$ex[0];
}

function insertInPosition($str, $pos, $c){
    return substr($str, 0, $pos) . $c . substr($str, $pos);
}

$dataIndicada = inverteData($_GET['data']);
$diaAnterior = date('Y-m-d',strtotime("-1 day", strtotime($dataIndicada)));

$dataCarga = inverteData(date('d/m/Y',strtotime("+1 day")));

$query = mysqli_query($con, "SELECT * FROM valores WHERE date_formated BETWEEN ('2020-06-03 15:01:00') AND ('2020-06-05 15:00:59')");
$num = mysqli_num_rows($query);

if($num == 0){

    echo "<script>alert('Nenhuma solicitação foi encontrada no período!');window.location.href(main.php);</script>";
    echo "<script>window.location.href = '../../main.php'</script>";
}

else{

$fp = fopen(getcwd().'/fileOutput.txt', 'w');


for($x=0;$x<$num;$x++) {

$resul = mysqli_fetch_assoc($query);
$cpf = $resul['cpf'];

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
?>