<?php

session_start();

include('src/connect/connect.php');

if ((!isset ($_SESSION["sobrasCpfcnpj"]) == true ) AND (!isset ($_SESSION["sobrasPassword"]) == true)) {

    unset($_SESSION['sobrasCpfcnpj']);
    unset($_SESSION['sobrasPassword']);

    session_destroy();

    echo "<script>alert('Tempo esgotado de sessão! Faça o login novamente.');</script>";
    echo "<script>window.location.replace('index.php');</script>";

}

else {


$time = $_SESSION['time'];
$limite = $_SESSION['limite'];
$segundos = time()-$time;

if($segundos>$limite) {

    session_destroy();
    
    echo "<script>alert('Tempo esgotado de sessão! Faça o login novamente.');</script>";
    echo "<script>window.location.replace('index.php');</script>";

}
else {
    $_SESSION['time'] = time();
}

}

?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Page title -->
    <title>Juros ao Capital | Sicredi Pernambucred</title>

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <link rel="shortcut icon" href="src/img/catavento_sicredi.ico" />


    <!-- Vendor styles -->
    <link rel="stylesheet" href="vendor/laravel-bootstrap-homer/vendor/fontawesome/css/font-awesome.css" />
    <link rel="stylesheet" href="vendor/laravel-bootstrap-homer/vendor/metisMenu/dist/metisMenu.css" />
    <link rel="stylesheet" href="vendor/laravel-bootstrap-homer/vendor/animate.css/animate.css" />
    <link rel="stylesheet" href="vendor/laravel-bootstrap-homer/vendor/bootstrap/dist/css/bootstrap.min.css" />

    <!-- App styles -->
    <link rel="stylesheet" href="vendor/laravel-bootstrap-homer/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css" />
    <link rel="stylesheet" href="vendor/laravel-bootstrap-homer/fonts/pe-icon-7-stroke/css/helper.css" />
    <link rel="stylesheet" href="vendor/laravel-bootstrap-homer/styles/style.css">
    <link href="vendor/alertify/css/alertify.min.css" rel="stylesheet" />
    <link href="vendor/alertify/css/themes/default.rtl.min.css" rel="stylesheet"/>

    <link rel="stylesheet" href="vendor/toastr/toastr.min.css"/>

    <link rel="stylesheet" href="vendor/laravel-bootstrap-homer/vendor/datatables.net-bs/css/dataTables.bootstrap.min.css" />



    <style type="text/css" media="print">
    * { display: none; }
    </style>

    <style>

    .divContent{
     /*width: 50%;    */
	 border: 1px solid #62C435;
     padding:8px;
     margin-left: 12px;
     margin-bottom: 12px;
    }

    #moreInfo:hover{
    text-decoration:underline;
    }

    ::-webkit-scrollbar-track {
    background-color: white;
}
::-webkit-scrollbar {
    width: 6px;
    background: #F4F4F4;
}
::-webkit-scrollbar-thumb {
    background: #62C435;
}

#toast-container > div {
  opacity: 1 !important; 
}

@media (max-width: 920px) {
    .textSicredi {
        display:none;
    }
}

hr {
    display: block;
    height: 1px;
    border: 0;
    border-top: 1px solid #ccc;
    margin: 2em 0;
    padding: 0;
}
    </style>

</head>
<body class="fixed-navbar sidebar-scroll">


<!-- Simple splash screen-->
<!--[if lt IE 7]>
<p class="alert alert-danger">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<!-- Header -->
<div id="header">
    <div class="color-line">
    </div>
    <div id="logo" class="light-version">
        <span>
            Juros ao Capital
        </span>
    </div>
    <nav role="navigation">
        <div class="header-link hide-menu"><img style="height:18px;" src="src/img/menu.png"></div>
        <div class="small-logo">
            <span class="text-primary">Juros ao Capital</span>
        </div>

        <div style="padding-top:13px;">
        
            <div class="col-lg-3 col-md-3 col-sm-3 textSicredi" style="padding-top:6px;">
                <span style="font-family:Exo 2;color:#64C832;font-weight:700;font-size:18px;line-height:1em;">Sicredi Pernambucred</span>
            </div>

            <div class="pull-right" class="col-lg-3 col-md-1 col-sm-1" style="padding-right:25px;">
                <img src="src/img/logo_sicredi.png" style="width:120px;" alt="logo"><br>
            </div>  

        </div>


    </nav>
</div>

<!-- Navigation -->
<aside id="menu">
    <div id="navigation">

        <ul class="nav" id="side-menu">

            <li onclick='javascript:window.open("src/assets/print.php", "popupsobras", "width=800, height=750, left=500, scrollbars=auto, location=no, directories=no, status=no, menubar=no, toolbar=no, resizable=no");'>
                <a href="#"><span class="nav-label"><i style="color:#62C435;" class="fa fa-print"></i> I<span style="text-transform:lowercase;">mprimir</span></span> </a>
            </li>
            
            <li class="">
                <a href="src/engine/logout.php"><span class="nav-label"><i style="color:#62C435;" class="fa fa-sign-out"></i> S<span style="text-transform:lowercase;">air</span></span> </a>
            </li>

        </ul>
    </div>
    <footer>
        <span style="position: absolute;bottom: 80px;width: 100%;height: 20px;padding-left:10px"><b>Dúvidas: </b>81 3117 9110 (Recife e Região Metropolitana) e <br>0800 400 9110 (Demais localidades).</span>
    </footer>
</aside>


<!-- Main Wrapper -->
<div id="wrapper">

<div id="content">

<div class="content animate-panel">
        <div class="row">
            <div class="col-lg-12 text-center m-t-md">
            
            </div>
        </div>
        <!-- <div class="row" style="max-height:600px;overflow:auto;"> -->
        <div class="row">
            <div class="col-lg-12">
                <div class="hpanel">
                    
                <div class="panel-body">
                        
                    <div class="row" style="padding-left:8px;">

                    <span>&nbsp;&nbsp;Bem vindo:&nbsp;&nbsp;<b><?php echo utf8_encode(utf8_decode($_SESSION["sobrasNome"]));?></b></span>
                              
                    </div>

                    <div class="row" style="padding-left:8px;">

                    <span>&nbsp;&nbsp;CPF/CNPJ:&nbsp;&nbsp;<b><?php echo $_SESSION["sobrasCpfcnpj"];?></b></span>
                              
                    </div>

                    <div class="row" style="padding-left:8px;">

                    <span>&nbsp;&nbsp;Conta Corrente:&nbsp;&nbsp;<b><?php echo $_SESSION["sobrasCC"];?></b></span>
                              
                    </div>

                    <br><br>

<?php
$cpfcnpj = $_SESSION["sobrasCpfcnpj"];

//PAGAMENTO DE JUROS AO CAPITAL 
$check = mysqli_query($con, "SELECT * FROM valores WHERE cpf_cnpj = '$cpfcnpj' ");

$resul = mysqli_fetch_assoc($check);

$ccAssociado = $resul['cc'];

$dataDia = date('Y-m-d');


if($resul['valor_resgate'] != '') {
?>




               <div id="contentValue" class="col-lg-6 col-md-12 col-sm-12">

                    <div class="row" style="text-align:justify;padding:8px;">
                     
                    <span>Solicitação enviada com sucesso!<br>
                    O valor solicitado até às 15:00 hrs, será creditado em sua conta corrente até 02 (dois) dias úteis.<br><br>
                    Valor Solicitado: <b style="color:#006922">R$ <?php echo number_format($resul['valor_resgate'], 2, ',', '.');?></b><br>
                    Data Solicitação: <b style="color:#006922"><?php echo $resul['data_resgate'].' às '.$resul['hora_resgate']?></b>
                    </span>   

                    </div>


                </div>

<?php 
}

else{

?>

                <div id="contentValue" class="col-lg-12 col-md-12 col-sm-12">

                <!-- Imagem carta verde -->
                <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12">
                <img src="src/img/bannercartaverde_2020_rc.jpg" style="width:100%;">
                </div>  
                </div>

                <br><br>

                    <div class="row">
                      <div class="col-lg-6 col-md-12 col-sm-12" style="text-align:justify;">

                    <span>Associado, <br><br>

                    Estamos vivendo um momento de adversidade nunca vivido pelos brasileiros. Em vista disso nossa Assembléia Geral Ordinária na qual é analisada a prestação de contas do exercício, que estava agendada para o dia 30/03/20, por força do Decreto Estadual nº 48.809/2020 que impôs o distanciamento social foi suspensa, tendo o BACEN flexibilizado,  em virtude da pandemia do COVID-19 , o prazo final que anteriormente era até 30 de abril para até o dia 31 de julho de 2020. Em razão disso, a distribuição dos resultados aos associados referente ao exercício de 2019 ficou, da mesma forma, suspensa até a data da realização da referida AGO.
<br><br>O Conselho de Administração da Sicredi Pernambucred, sensibilizado pelo momento em que a economia está passando, deliberou por antecipar a disponibilidade de resgate dos Juros ao Capital Social, creditados no dia 30/01/2020, na conta capital de cada associado, referentes ao exercício de 2019, antes da distribuição dos resultados referente ao mesmo exercício, em conformidade com a Resolução do BACEN 4.797/2020 que limitou os resgates na Conta Capital.
<br><br>

Veja abaixo os valores destinados a você:</span>   
                      </div>       
                    </div>


                    <br><br>

                    <div class="row">

                    <div class="divContent col-lg-6 col-md-6 col-sm-3">
                    <img style="width:50px;" src="src/img/sicredi/cifrao_verde.ico">
                    <span style="font-weight:bold;">&nbsp;&nbsp;Juros ao Capital Social</b></span>
                    <br><br>
                    <span>O saldo médio do Capital Social que você manteve na sua cooperativa durante o exercício de 2019, continua sendo corrigido em 100% do valor da Selic e, gerou juros. Vale ressaltar que os 15% de IR incidente já foram retidos na fonte.</span>
                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-3" style="padding-top:5%;">
                    <img style="height:21px;" src="src/img/seta2.png">
                    <span style="padding-left:10px;font-weight:bold;">R$ <?php echo number_format($resul['juros_liquido'], 2, ',', '.');?></span>

                    </div>

                    </div>

                    <br>

                    <div class="row">

                    <div class="divContent col-lg-6 col-md-6 col-sm-3">
                    <img style="width:50px;" src="src/img/sicredi/caixa_eletronico_verde.ico">
                    <span style="font-weight:bold;">&nbsp;&nbsp;Valor líquido para resgate</span>
                    <br><br>
                    <span>Valor do resgate líquido creditados em sua conta capital.</span>
                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-3" style="padding-top:5%;">
                    <img style="height:21px;" src="src/img/seta2.png">
                    <span style="padding-left:10px;font-weight:bold;color:#006922;">R$ <?php echo number_format($resul['juros_liquido'], 2, ',', '.');?></span>
                    </div>

                    </div>

                    <br>

                    <div class="row" style="text-align:justify;padding:8px;">
                
                    <span>&nbsp;&nbsp;Gente que coopera, cuida!</span>  

                    </div>
                    
                    <br>

                    <div class="row">
                    <div class="form-group col-lg-6 col-md-1 col-sm-1">
                        <input type="checkbox" id="confirm" value="sim" class="i-checks form-control">
                        <label style="width:10px;">&nbsp;Estou&nbsp;ciente&nbsp;das&nbsp;condições&nbsp;estabelecidas.</label>

                    </div>
                    </div>

                    <br><br>

                    <div class="row" style="margin-left: 5px;">
                    <button class="btn btn-success" id="getModal" type="button" data-toggle="modal" data-target="#modalConfirm"><i class="fa fa-check"></i> <span class="bold">&nbsp;Resgatar</span></button>
                    </div>
                    

                    <input type="hidden" id="liquidoResgate" value="<?php echo $resul['juros_liquido']?>">
                    <input type="hidden" id="cpfcnpj" value="<?php echo $_SESSION["sobrasCpfcnpj"]?>">


                    </div>

                <!-- FIM DA VID contentValue -->
                </div>

                <?php }?>
                  
                </div>
            </div>
        </div>
       
    </div>


</div>
    <!-- Right sidebar -->
    <div id="right-sidebar" class="animated fadeInRight">
      

    </div>

    <!-- Footer-->
    <footer class="footer">
    <span class="pull-left">
            <!--<strong>Dúvidas: (81) 3117-9110</strong>-->
        </span>
        <span class="pull-right">
            © Sicredi Pernambucred 2020
        </span>
    </footer>



</div>


<div class="modal fade hmodal-success" id="modalConfirm" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="color-line"></div>
                            <div class="modal-header">
                                <h4 class="modal-title">Confirmação:</h4>
                                <span class="font-bold">Informe o valor que deseja resgatar:</span>
                            </div>
                            <div class="modal-body">
                                
                            <div class="row form-inline">
                   
                               <div class="form-group">
                                    <div class="col-lg-1">
                                    <label style="width:10px;">Valor&nbsp;resgate:</label>
                                    <input style="width:150px;" type="text" id="valorSolicitado" class="form-control">
                                </div>
                                </div>

                                </div>

                                <br>

                                <div id="divAplicacao" class="row" style="padding-left:15px;">


                                 </div>


                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                <button type="button" id="enviaSolicitacao" class="btn btn-success">Enviar</button>
                            </div>
                        </div>
                    </div>
                </div>            



</body>

<!-- Vendor scripts -->
<script src="vendor/laravel-bootstrap-homer/vendor/jquery/dist/jquery.min.js"></script>
<script src="vendor/laravel-bootstrap-homer/vendor/jquery-ui/jquery-ui.min.js"></script>
<script src="vendor/laravel-bootstrap-homer/vendor/slimScroll/jquery.slimscroll.min.js"></script>
<script src="vendor/laravel-bootstrap-homer/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="vendor/laravel-bootstrap-homer/vendor/jquery-flot/jquery.flot.js"></script>
<script src="vendor/laravel-bootstrap-homer/vendor/jquery-flot/jquery.flot.resize.js"></script>
<script src="vendor/laravel-bootstrap-homer/vendor/jquery-flot/jquery.flot.pie.js"></script>
<script src="vendor/laravel-bootstrap-homer/vendor/flot.curvedlines/curvedLines.js"></script>
<script src="vendor/laravel-bootstrap-homer/vendor/jquery.flot.spline/index.js"></script>
<script src="vendor/laravel-bootstrap-homer/vendor/metisMenu/dist/metisMenu.min.js"></script>
<script src="vendor/laravel-bootstrap-homer/vendor/iCheck/icheck.min.js"></script>
<script src="vendor/laravel-bootstrap-homer/vendor/peity/jquery.peity.min.js"></script>
<script src="vendor/laravel-bootstrap-homer/vendor/sparkline/index.js"></script>

<!-- App scripts -->
<script src="vendor/laravel-bootstrap-homer/scripts/homer.js"></script>
<script src="vendor/laravel-bootstrap-homer/scripts/charts.js"></script>
<script src="vendor/alertify/alertify.min.js" type="text/javascript"></script>
<script src="vendor/maskmoney/jquery.maskMoney.min.js" type="text/javascript"></script>
<script src="vendor/toastr/toastr.min.js"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>



<script>

$("#getModal").on('click', function(){

    if($("#confirm").is(':checked') == false){
        toastr.error('Você precisa aceitar as condições antes de solicitar!');
        return false;
    }

});

$('#valorSolicitado').maskMoney({ thousands: '.', decimal: ',' });

  jQuery(document).bind("keyup keydown", function(e){
    if(e.ctrlKey && e.keyCode == 80){
        return false;
    }
});


$("#enviaSolicitacao").on('click', function(){

let cpfcnpj = $("#cpfcnpj").val();
let liquidoResgate = parseFloat($("#liquidoResgate").val());
let valorSolicitado = parseFloat($("#valorSolicitado").val().replace('.','').replace(',','.'));

if(valorSolicitado == '' || isNaN(valorSolicitado) == true){
        toastr.error('Por favor, informe o valor que deseja resgatar!');
        return false;
}

if(valorSolicitado > liquidoResgate){
        toastr.error('Valor informado é maior que o disponível para resgate!');
        return false;
}

                    $.ajax({  
                    type:'post', 
                    data: {'cpfcnpj':cpfcnpj, 'valorSolicitado':valorSolicitado},
                    dataType: 'html',
                    url: 'src/sendSolicitation.php',
                    beforeSend: function(){
                        $('#modalConfirm').modal('hide');
                    },
                    success: function(data){
                       if(data == 1){
                            setTimeout(function(){ 
                                swal("Solicitação enviada!", "O valor Solicitado até às 15:00 hrs será creditado em sua conta corrente até 02 (dois) dias úteis.", "success").then(() => {location.reload(true)});
                            }, 1000);
                      }
                      else{
                          alert('ERRO NA CONEXÃO COM O SISTEMA! CONTATE O SUPORTE.');

                      } 
                      
                    },
                    error: function(){
                        alert('Erro no servidor! Procure o administrador do sistema!');
                    }
                    });

});

toastr.options = {
  "closeButton": true,
  "debug": false,
  "progressBar": false,
  "preventDuplicates": true,
  "positionClass": "toast-top-right",
  "onclick": null,
  "showDuration": "400",
  "hideDuration": "2000",
  "timeOut": "4000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
</script>


<script>

var modalInstance = $modal.open({
       templateUrl: 'views/modal/modal_example2.html',
       controller: ModalInstanceCtrl,
       windowClass: "hmodal-success"
}); 

</script>



<html>