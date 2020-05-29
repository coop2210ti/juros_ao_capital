<?php

session_start();

include('src/connect/connect.php');

if ((!isset ($_SESSION["adminSobrasUser"]) == true ) AND (!isset ($_SESSION["adminSobrasPassword"]) == true)) {

    unset($_SESSION['adminSobrasUser']);
    unset($_SESSION['adminSobrasPassword']);

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
    <link href="vendor/alertify/css/alertify.min.css" rel="stylesheet" />
    <link href="vendor/alertify/css/themes/default.rtl.min.css" rel="stylesheet"/>
    <link href="vendor/toastr/toastr.min.css" rel="stylesheet"/>

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
            RESULTADOS
        </span>
    </div>
    <nav role="navigation">
        <div class="header-link hide-menu"><i class="fa fa-bars"></i></div>
        <div class="small-logo">
            <span class="text-primary">RESULTADOS</span>
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

            <li id="alterar">
                <a href="#"><span class="nav-label"><i style="color:#62C435;" class="fa fa-edit"></i> Alterar</span> </a>
            </li>

            <li id="aplicacoes">
                <a href="#"><span class="nav-label"><i style="color:#62C435;" class="fa fa-dollar"></i> Aplicações</span> </a>
            </li>

            <li id="buscar">
                <a href="#"><span class="nav-label"><i style="color:#62C435;" class="fa fa-search"></i> Buscar</span> </a>
            </li>

            <li id="carga">
                <a href="#"><span class="nav-label"><i style="color:#62C435;" class="fa fa-cloud-download"></i> Carga</span> </a>
            </li>

            <li id="relatorios">
                <a href="#"><span class="nav-label"><i style="color:#62C435;" class="fa fa-bar-chart"></i> Relatórios</span> </a>
            </li>
            
            <li class="">
                <a href="src/engine/logout.php"><span class="nav-label"><i style="color:#62C435;" class="fa fa-sign-out"></i> Sair</span> </a>
            </li>

        </ul>
    </div>
</aside>


<!-- Main Wrapper -->
<div id="wrapper">

<div id="content">

 <div class="content animate-panel">
        <div class="row">
            <div class="col-lg-12 text-center m-t-md">
                <!-- <h3>Solicitação de Resultados</h3> -->
            
            </div>
        </div>
        <!-- <div class="row" style="max-height:600px;overflow:auto;"> -->
        <div class="row">
            <div class="col-lg-12">
                <div class="hpanel">
                    
                <div class="panel-body">
                        
                        
                        
                    <div class="row">

                    <span>&nbsp;&nbsp;Bem vindo:&nbsp;&nbsp;<b><?php echo $_SESSION["adminSobrasNome"];?></b></span>
                              
                    </div>

                    <div class="row">

                    <span>&nbsp;&nbsp;Último acesso:&nbsp;&nbsp;<b><?php echo $_SESSION["adminSobrasUltimoAcesso"].' ás '.$_SESSION["adminSobrasHoraUltimoAcesso"];?></b></span>
                              
                    </div>

                    <br><br>


                  
                </div>
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
        <span class="pull-right">
            © Sicredi Pernambucred 2019
        </span>
    </footer>



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
<script src="src/assets/js/router.js"></script>
<script src="vendor/toastr/toastr.min.js"></script>

<!-- DataTables -->
<script src="vendor/laravel-bootstrap-homer/vendor/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="vendor/laravel-bootstrap-homer/vendor/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<!-- DataTables buttons scripts -->
<script src="vendor/laravel-bootstrap-homer/vendor/pdfmake/build/pdfmake.min.js"></script>
<script src="vendor/laravel-bootstrap-homer/vendor/pdfmake/build/vfs_fonts.js"></script>
<script src="vendor/laravel-bootstrap-homer/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="vendor/laravel-bootstrap-homer/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="vendor/laravel-bootstrap-homer/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="vendor/laravel-bootstrap-homer/vendor/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>

<script type="text/javascript" src="vendor/maskedInput/maskedInput.js"></script>



<script>

var user = "<?php echo $_SESSION["adminSobrasUser"]; ?>";

if(user == 'sede' || user == 'sanrafael' || user == 'joanabezerra'  || user == 'juizados' || user == 'imperador' || user == 'jaboatao' || user == 'caruaru' || user == 'petrolina' || user == 'salgueiro' || user == 'santoantonio'){
    $("#aplicacoes").hide();
    $("#alterar").hide();
    $("#carga").hide();
    $("#relatorios").hide();
}

else if(user == 'crp'){
    $("#alterar").hide();
    $("#carga").hide();
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


<html>