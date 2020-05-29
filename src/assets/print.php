<?php
sleep(1);
include('../connect/connect.php');
session_start();
$cpfcnpj = $_SESSION["sobrasCpfcnpj"];
$check = mysqli_query($con, "SELECT * FROM valores WHERE cpf = '$cpfcnpj' ");
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

<?php 
if($resul['inadimplente'] == 'Sim'){

?>

<div id="printable">

<div class="row" style="text-align:justify;width:50%;padding:8px;">
                     
                    <span>Caro associado,<br>
                    Você encontra-se com pendências financeiras junto à Sicredi Pernambucred.<br>
                    Entre em contato com a cooperativa para regularizar sua situação.
                    </span>   

                    </div>


</div>

<?php
}

else{

?>

<div id="printable">

                    <div class="row">

                    <span>&nbsp;&nbsp;Bem vindo:&nbsp;&nbsp;<b><?php echo $_SESSION["sobrasNome"];?></b></span>
                              
                    </div>

                    <div class="row">

                    <span>&nbsp;&nbsp;CPF/CNPJ:&nbsp;&nbsp;<b><?php echo $_SESSION["sobrasCpfcnpj"];?></b></span>
                              
                    </div>
                    <br><br>


                    <div class="row">

                    <div class="divContent">
                    <img style="width:50px;" src="../img/sicredi/cofre_porco_verde.ico">
                    <span>&nbsp;&nbsp;Aplicações: <b>R$ <?php echo number_format($resul['aplicacoes'], 2, ',', '.');?></b></span>
                    <br><br>
                    <?php if($resul['aplicacoes'] == '0.00' OR $resul['aplicacoes'] == '0'){?>
                    <span>Que pena! Você não possui aplicação financeira na Sicredi Pernambucred. Aqui o ganho é sensacional. Pense nisso para o próximo ano.</span>
                    <?php } else{?>
                    <span>Parabéns! Na Sicredi Pernambucred você ganha duas vezes. Além da excelente rentabilidade da sua aplicação, você ainda recebe expressivos rendimentos em forma de resultados.</span>
                    <?php }?>
                    </div>

                    </div>

                    <br>

                    <div class="row">

                    <div class="divContent">
                    <img style="width:50px;" src="../img/sicredi/cartao_credito_verde.ico">
                    <span>&nbsp;&nbsp;Cartão de Crédito: <b>R$ <?php echo number_format($resul['cartoesCredito'], 2, ',', '.');?></b></span>
                    <br><br>
                    <?php if($resul['cartoesCredito'] == '0.00' OR $resul['cartoesCredito'] == '-'){?>
                    <span>Que pena! Você não possui cartão de crédito na Sicredi Pernambucred. Nossos cartões possuem inúmeras vantagens, além de você poder contar com programa de milhagem. Pense nisso para o próximo ano.</span>
                    <?php } else{?>
                    <span>Ter cartão de crédito na Sicredi Pernambucred é muito mais vantajoso! Além de você poder contar com programa de milhagem, também recebe parte do que gastou, através dos resultados.</span>
                    <?php }?>
                    </div>
                    </div>

                    <br>

                    <div class="row">

                    <div class="divContent">
                    <img style="width:50px;" src="../img/sicredi/cracha_verde.ico">
                    <span>&nbsp;&nbsp;Conta Corrente: <b>R$ <?php echo number_format($resul['contaCorrente'], 2, ',', '.');?></b></span>
                    <br><br>
                    <span>O dinheiro que você deixou parado na sua conta corrente lhe garante parte dos resultados.</span>
                    </div>
                    </div>

                    <br>

                    <div class="row">

                    <div class="divContent">
                    <img style="width:50px;" src="../img/sicredi/documento_cifrao_verde.ico">
                    <span>&nbsp;&nbsp;Operações de Crédito: <b>R$ <?php echo number_format($resul['operacoesCredito'], 2, ',', '.');?></b></span>
                    <br><br>
                    <?php if($resul['operacoesCredito'] == '0.00' OR $resul['operacoesCredito'] == '-'){?>
                    <span>Você não realizou operações de crédito ao longo do ano na Sicredi Pernambucred. No momento em que precisar, realize sua operação de crédito, contamos com taxas diferenciadas.</span>
                    <?php } else{?>
                    <span>Aqui você ganha duas vezes! Além de ter contado com taxas diferenciadas para operações de crédito, você também recebe parte dos resultados.</span>
                    <?php }?>                    
                    </div>
                    </div>

                     <br>

                    <div class="row">

                    <div class="divContent">
                    <img style="width:50px;" src="../img/sicredi/cifrao_verde.ico">
                    <span>&nbsp;&nbsp;Juros ao Capital: <b>R$ <?php echo number_format($resul['jurosCapital'], 2, ',', '.');?></b></span>
                    <br><br>
                    <span>O seu capital na cooperativa continua a proporcionar ótima rentabilidade. Vale ressaltar que 15% de IR já foi retido na fonte. Valor creditado em sua conta capital em 28/12/2017.</span>
                    </div>
                    </div>

                    <br><br><br><br><br><br>

                    <div class="row">

                    <div class="divContent">
                    <img style="width:50px;" src="../img/sicredi/lapis_verde.ico">
                    <span>&nbsp;&nbsp;Ação Declaratória: <b style="color:#E74C3C;">- R$ <?php echo number_format($resul['acaoDeclaratoria'], 2, ',', '.');?></b></span>
                    <br><br>
                    <span>Foi deduzido do resultado o percentual de 15% em função do ingresso de ação declaratória. <br>Para mais informações,<button type="button" id="moreInfo" data-toggle="modal" data-target="#modalMoreInfo" style="background:none!important;color:#626768;border:none;cursor:pointer;text-align:center;"><i>clique aqui.</i></button></span>
                    </div>
                    </div>

                    <br>

                    <div class="row">

                    <div class="divContent">
                    <img style="width:50px;" src="../img/sicredi/grafico_verde.ico">
                    <span>&nbsp;&nbsp;Valor do Resultado Líquido: <b>R$ <?php echo number_format($resul['totalSobras'], 2, ',', '.');?></b></span>
                    <br><br>
                    <span>Valor do resultado líquido creditados em sua conta capital.</span>
                    </div>
                    </div>

                   

                    <div class="row">

                    <div class="divContent">
                    <img style="width:50px;" src="../img/sicredi/caixa_eletronico_verde.ico">
                    <span>&nbsp;&nbsp;Valor Total Para Resgate: <b><span style="color:#006922;">R$ <?php echo number_format($resul['liquidoResgate'], 2, ',', '.');?></span></b></span>
                    <br><br>
                    <span>Total do Resultado + Juros ao Capital.</span>
                    </div>
                    </div>

</div>

<?php } ?>