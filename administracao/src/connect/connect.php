<?php
$serv="localhost"; //nome do servidor
$user="sobras"; //usuário que vai conectar no database
$password="P@ssw0rd"; //aqui você deve especificar a senha do usuário
$dbname="resultados_2020_jc"; //especifique o nome da base que você criou
$con=mysqli_connect($serv,$user,$password,$dbname) or die ("Erro ao conectar a base de dados, entre em contato com o administrador do sistema!");
mysqli_set_charset($con,"utf8"); 

?>
