<!DOCTYPE html>
<html lang="pt-br">

<head>
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

    <link rel="stylesheet" type="text/css" href="src/assets/layout.css"/>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juros ao Capital</title>
</head>
<body>

    <header>
        


    </header>
  



    <div class="login-container">
    <div class="row">
        <div class="col-md-12">
        <img src="src/img/logo_sicredi.png ">
        
        <br><br><br>
            <div class="text-center m-b-md">
                
                <span style="font-family:Exo 2;color:#64C832;font-weight:700;font-size:35px;line-height:1em">Sicredi Pernambucred</span>
                <br><br>
              
                <h4 style="font-weight:bold;">Emissão de arquivo - Juros ao Capital</h4>
            </div>
            <br>
    <div class="hpanel">
                <div class="panel-body">
                        <form id="loginForm">
                            <div class="form-group">
                                <label class="control-label" for="username">Data Inicial:</label>
                                <input type="text" title="Informe a data inicial" id="data_inicial" name="data_inicial"  class="form-control data">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="data_final">Data Final:</label>
                                <input type="text" title="Informe a data final" id="data_final" class="form-control data" >
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="data_final">Data Carga:</label>
                                <input type="text" title="Informe a data final" id="data_carga" class="form-control  data">
                            </div>
                            <div class="select">    
            <select id="tipo"> 
                 <option class="op" value="txt">TXT</option>
                 <option class="op" value="csv">CSV</option>
             </select>
     </div>
                        </form>
                        <button id="gerarArquivo" class="btn btn-success btn-block">Gerar Arquivo</button>
                </div>
            </div>
        </div>
</div>







</form>
</body>

<script src="vendor/laravel-bootstrap-homer/vendor/jquery/dist/jquery.min.js"></script>
<script src="vendor/maskedInput/maskedInput.js"></script>

<script>

$(".data").mask('99/99/9999');

$("#gerarArquivo").on('click', function(){

    let data_inicial    = $("#data_inicial").val();
    let data_final      = $("#data_final").val();
    let data_carga      = $("#data_carga").val();
    let tipo            = $("#tipo").val();

    window.location.href = "getRelatorio.php?data_inicial="+data_inicial+"&data_final="+data_final+"&data_carga="+data_carga+"&tipo="+tipo;


});

</script>

</html>