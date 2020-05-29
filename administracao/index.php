<?php
session_start();

if ((isset ($_SESSION["adminSobrasUser"]) == true ) AND (isset ($_SESSION["adminSobrasPassword"]) == true)) {

    echo "<script>window.location.replace('main.php');</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
<frame name="main" src="https://sobras.sicredipernambucred.com.br">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="sb.validation_hash" content="BLI-DzClZoExhiAwBFvCSsFhevjIepPOdSiehLnVgJrRxMaiSnLDSDICBPBaBHHtoPwREsIhPoJzfOcnuLmmoRAAOTFSkViETcRB" /> 

    <!-- Page title -->
    <title>Resultados | Sicredi Pernambucred</title>

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <link rel="shorcut icon" href="src/img/catavento_sicredi.ico" />
    

    <!-- Vendor styles -->
    <link rel="stylesheet" href="vendor/laravel-bootstrap-homer/vendor/fontawesome/css/font-awesome.css" />
    <link rel="stylesheet" href="vendor/laravel-bootstrap-homer/vendor/metisMenu/dist/metisMenu.css" />
    <link rel="stylesheet" href="vendor/laravel-bootstrap-homer/vendor/animate.css/animate.css" />
    <link rel="stylesheet" href="vendor/laravel-bootstrap-homer/vendor/bootstrap/dist/css/bootstrap.min.css" />

    <!-- App styles -->
    <link rel="stylesheet" href="vendor/laravel-bootstrap-homer/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css" />
    <link rel="stylesheet" href="vendor/laravel-bootstrap-homer/fonts/pe-icon-7-stroke/css/helper.css" />
    <link rel="stylesheet" href="vendor/laravel-bootstrap-homer/styles/style.css">
    <link rel="stylesheet" href="vendor/toastr/toastr.min.css"/>



    <style>

    .loading{
	position:absolute;
	top:0;
	left:0;
	z-index:11;
	background-color:#000;
	width:100%;
	height:100%;
	opacity: .50;
	filter: alpha(opacity=65);
    visibility:hidden;
}

#toast-container > div {
    opacity: 1 !important; 
    }

    </style>

</head>
<body  class="content animate-panel" style="background:#F1F3F6;">


    <div class="color-line">
    </div>

        


<div class="login-container">
    <div class="row">
        <div class="col-md-12">
            <div class="text-center m-b-md">
                <span style="font-family:Exo 2;color:#64C832;font-weight:700;font-size:35px;line-height:1em">Sicredi Pernambucred</span>

                <br><br><br>
                <h4 style="font-weight:bold;">Administração Interna de Resultados</h4>
            </div>
            <br>
            <div class="hpanel">
                <div class="panel-body">
                        <form id="loginForm">
                            <div class="form-group">
                                <label class="control-label" for="username">Usuário*:</label>
                                <input type="text" title="Informe seu usuário" id="user" name="user" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Senha*:</label>
                                <input type="password" title="Informe sua senha" id="password" class="form-control">
                            </div>
                        </form>
                        <button id="login" class="btn btn-success btn-block">Acessar</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-center">
        </div>
    </div>
</div>

<br><br>
<div id="spinner">

</div>


    <!-- Footer-->
    <footer class="footer">
        <span class="pull-right">
            © Sicredi Pernambucred 2019
        </span>
    </footer>




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
<script src="vendor/laravel-bootstrap-homer/scripts/charts.js"></script>
<script src="vendor/toastr/toastr.min.js"></script>


<script>

$(document).keypress(function(e) {
    if(e.which == 13){
         
var user = $("#user").val(); 
    var password = $("#password").val();

if(user == '' || password == ''){
        toastr.error('Por favor, preencha todos os campos!');
        return false;
    }

 else{   



$.ajax({


        type:"POST", 
        url:"src/engine/login.php", 
        data:{user:user,password:password},  
        beforeSend:function(){
            $('#spinner').empty();
            $('#spinner').append("<img src='src/img/bars.svg' style='height:50px;display:block;margin:auto;'/>");

        },    
        success:function(response){
            if(response==1){ 
                window.location.href='main.php'
            } 
            else {
                
                toastr.error('Usuário ou senha inválidos!');
                $("#spinner").empty();
            }
        }

     });
}


}
});

$("#login").on('click', function(){

    var user = $("#user").val(); 
    var password = $("#password").val();

if(user == '' || password == ''){
        toastr.error('Por favor, preencha todos os campos!');
        return false;
    }

 else{   



$.ajax({


        type:"POST", 
        url:"src/engine/login.php", 
        data:{user:user,password:password},  
        beforeSend:function(){
            $('#spinner').empty();
            $('#spinner').append("<img src='src/img/bars.svg' style='height:50px;display:block;margin:auto;'/>");

        },    
        success:function(response){
            if(response==1){ 
                window.location.href='main.php'
            } 
            else {
                
                toastr.error('Usuário ou senha inválidos!');
                $("#spinner").empty();
            }
        }

     });
}
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



</html>