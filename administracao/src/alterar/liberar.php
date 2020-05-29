<?php
include('../connect/connect.php');
sleep(1);


$cpfcnpj = $_POST['cpfcnpj'];


mysqli_query($con, "UPDATE valores SET inadimplente = 'nao' WHERE cpf = '$cpfcnpj' ");

$check = mysqli_query($con, "SELECT cpf, inadimplente FROM valores WHERE cpf = '$cpfcnpj' AND inadimplente = 'nao' ");
$numCheck = mysqli_num_rows($check);

if($numCheck != 0){
    echo 1;
}
else{
    echo 0;
}
?>