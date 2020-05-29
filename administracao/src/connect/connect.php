<?php
$serv="localhost"; //nome do servidor
$user="sobras"; //usuário que vai conectar no database
$password="P@ssw0rd"; //aqui você deve especificar a senha do usuário
$dbname="resultados_2019"; //especifique o nome da base que você criou
$con=mysqli_connect($serv,$user,$password) or die ("Erro ao conectar a base de dados, entre em contato com o administrador do sistema!");
$db = mysqli_select_db($con,$dbname );
mysqli_set_charset($con,"utf8"); 

?>
