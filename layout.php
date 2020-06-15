<!DOCTYPE html>
<html lang="pt-br">

<head>

    <link rel="stylesheet" type="text/css" href="src/assets/layout.css"/>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juros ao Capital</title>
</head>
<body>

    <header>
    <img src="src/img/logo_sicredi.png">
        <h1 >Emissão de arquivo - Juros ao Capital</h1>
    </header>
   
<form method="POST">
    <fieldset>  
         <label for="data_inicial">Data Inicial </label></br>
         <input type="text" class="data" name="data_inicial"  id="data_inicial" /><br></br>

         <label for="data_final">Data Final </label><br>
         <input type="text" class="data" name="data_final" id="data_final"><br></br>

         <label for="data_carga">Data Carga </label><br>
         <input type="text" class="data" name="data_carga" id="data_carga"></br></br>
        <div class="select">    
            <select id="tipo"> 
                 <option class="op" value="txt">TXT</option>
                 <option class="op" value="csv">CSV</option>
             </select>
     </div>
</br>
        <input id="gerarArquivo" type="button"  value="Gerar arquivo"  onclick="return gerarArquivo();" >
    </fieldset>


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