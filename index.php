<?php
/*$useragent=$_SERVER['HTTP_USER_AGENT'];
if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
header('Location: mobileError.php');*/
?>

<?php
session_start();

if ((isset ($_SESSION["sobrasCpfcnpj"]) == true ) AND (isset ($_SESSION["sobrasPassword"]) == true)) {

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
    <title>Juros ao Capital | Sicredi Pernambucred</title>

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <link rel="shortcut icon" href="favicon.ico" />

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
                <h4 style="font-weight:bold;">Solicitação de Juros ao Capital</h4>
            </div>
            <br>
            <div class="hpanel">
                <div class="panel-body">
                        <form id="loginForm">
                            <div class="form-group">
                                <label class="control-label" for="username">CPF/CNPJ:</label>
                                <input type="text" title="Informe seu CPF ou CNPJ" id="cpfcnpj" name="cpfcnpj" maxlength="18" onkeypress="mascaraMutuario(this,cpfCnpj)" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Senha:</label>
                                <input type="password" title="Informe sua senha" id="password" class="form-control" maxlength="10" placeholder="ddmmaaaa">
                            </div>
                        </form>
                        <button id="login" class="btn btn-success btn-block">Acessar</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-center">
            <strong>Dúvidas</strong>: 81 3117 9110 (Recife e Região Metropolitana) e <br>0800 400 9110 (Demais localidades).
        </div>
    </div>
    
    <br><br>

    <div id="tempo" class="col-md-12 text-center" style="color:#62C435;font-weight:bold;font-size:16px;">
    </div>

</div>

<br><br>
<div id="spinner">

</div>


    <!-- Footer-->
    <footer class="footer">
        <span class="pull-right">
            © Sicredi Pernambucred 2020
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

$(document).ready(function(){

// Set the date we're counting down to
var countDownDate = new Date("May 11, 2019 00:00:00").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get todays date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  if(days != 0){
  document.getElementById("tempo").innerHTML = "As solicitações começam em "+days +" dias " + hours + ":"
  + minutes + ":" + seconds;
  }
  else{
  document.getElementById("tempo").innerHTML = "As solicitações começam em "+hours + ":"
  + minutes + ":" + seconds;
  }
  // If the count down is finished, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("tempo").innerHTML = "";
  }
}, 1000);

});

$(document).keypress(function(e) {
    if(e.which == 13){
         
var cpfcnpj = $("#cpfcnpj").val(); 
var password = $("#password").val().replace(/\//g,'');

if(cpfcnpj == '' || password == ''){
        toastr.error('Por favor, preencha todos os campos!');
        return false;
    }

 else{   



$.ajax({


        type:"POST", 
        url:"src/engine/login.php", 
        data:{cpfcnpj:cpfcnpj,password:password},  
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

    var cpfcnpj = $("#cpfcnpj").val(); 
    var password = $("#password").val().replace(/\//g,'');

if(cpfcnpj == '' || password == ''){
        toastr.error('Por favor, preencha todos os campos!');
        return false;
    }

 else{   



$.ajax({


        type:"POST", 
        url:"src/engine/login.php", 
        data:{cpfcnpj:cpfcnpj,password:password},  
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



//=====================================================================//

function mascaraMutuario(o,f){
    v_obj=o
    v_fun=f
    setTimeout('execmascara()',1)
}
 
function execmascara(){
    v_obj.value=v_fun(v_obj.value)
}

function cpfCnpj(v){
 
    //Remove tudo o que não é dígito
    v=v.replace(/\D/g,"")
 
    if (v.length <= 11) { //CPF
 
        //Coloca um ponto entre o terceiro e o quarto dígitos
        v=v.replace(/(\d{3})(\d)/,"$1.$2")
 
        //Coloca um ponto entre o terceiro e o quarto dígitos
        //de novo (para o segundo bloco de números)
        v=v.replace(/(\d{3})(\d)/,"$1.$2")
 
        //Coloca um hífen entre o terceiro e o quarto dígitos
        v=v.replace(/(\d{3})(\d{1,2})$/,"$1-$2")
 
    } else { //CNPJ
 
        //Coloca ponto entre o segundo e o terceiro dígitos
        v=v.replace(/^(\d{2})(\d)/,"$1.$2")
 
        //Coloca ponto entre o quinto e o sexto dígitos
        v=v.replace(/^(\d{2})\.(\d{3})(\d)/,"$1.$2.$3")
 
        //Coloca uma barra entre o oitavo e o nono dígitos
        v=v.replace(/\.(\d{3})(\d)/,".$1/$2")
 
        //Coloca um hífen depois do bloco de quatro dígitos
        v=v.replace(/(\d{4})(\d)/,"$1-$2")
 
    }
 
    return v
 
}

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