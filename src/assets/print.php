<?php
sleep(1);
include('../connect/connect.php');
session_start();
$cpfcnpj = $_SESSION["sobrasCpfcnpj"];
$check = mysqli_query($con, "SELECT * FROM valores WHERE cpf_cnpj = '$cpfcnpj' ");
$resul = mysqli_fetch_assoc($check);

?>

<style>
.divContent{
     width: 50%;   
	 border: 1px solid #62C435;
     padding:8px;
     margin-left: 12px;
     margin-bottom: 12px;
    }
</style>

    <!-- CSS para impressão -->
    <!-- <link rel="stylesheet" type="text/css" href="print.css" media="print" /> -->

<link rel="stylesheet" href="../../vendor/laravel-bootstrap-homer/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css" />
<link rel="stylesheet" href="../../vendor/laravel-bootstrap-homer/fonts/pe-icon-7-stroke/css/helper.css" />

<div id="printable">

                    <div class="row">

                    <span>&nbsp;&nbsp;Bem vindo:&nbsp;&nbsp;<b><?php echo $_SESSION["sobrasNome"];?></b></span>
                              
                    </div>

                    <div class="row">

                    <span>&nbsp;&nbsp;CPF/CNPJ:&nbsp;&nbsp;<b><?php echo $_SESSION["sobrasCpfcnpj"];?></b></span>
                              
                    </div>

                    <div class="row">

                    <span>&nbsp;&nbsp;Conta Corrente:&nbsp;&nbsp;<b><?php echo $_SESSION["sobrasCC"];?></b></span>
                              
                    </div>

                    <br><br>


                    <div class="row">

                    <div class="divContent">
                    <img style="width:50px;" src="../img/sicredi/cifrao_verde.ico">
                    <span>&nbsp;&nbsp;Juros ao Capital Social: <b>R$ <?php echo number_format($resul['juros_liquido'], 2, ',', '.');?></b></span>
                    <br><br>
                    <span>O saldo médio do Capital Social que você manteve na sua cooperativa durante o exercício de 2019, continua sendo corrigido em 100% do valor da Selic e, gerou juros. Vale ressaltar que os 15% de IR incidente já foram retidos na fonte.</span>
                    </div>
                    </div>
                    
                    <br>

                    <div class="row">

                    <div class="divContent">
                    <img style="width:50px;" src="../img/sicredi/caixa_eletronico_verde.ico">
                    <span>&nbsp;&nbsp;Valor líquido para resgate: <b><span style="color:#006922;">R$ <?php echo number_format($resul['juros_liquido'], 2, ',', '.');?></span></b></span>
                    <br><br>
                    <span>Valor do resgate líquido creditados em sua conta capital.</span>
                    </div>
                    </div>

</div>