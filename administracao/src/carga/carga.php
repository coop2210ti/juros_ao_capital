<?php 
sleep(1);
session_start();

?>

<style>

hr {
    display: block;
    height: 1px;
    border: 0;
    border-top: 1px solid #ccc;
    margin: 2em 0;
    padding: 0;
}

</style>

<!-- <div id="contentValue" class="col-lg-6 col-md-12 col-sm-12">

<div class="row form-inline">

<div class="form-group">
<div class="col-lg-1">
<label style="width:10px;">Valor:*</label>
<input style="width:150px;" type="text" id="valorSolicitado" class="form-control">
</div>
</div>



</div>


</div> -->


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

<hr/>

<div class="row form-inline">

<div class="form-group">
<div class="col-lg-1">
<label style="width:10px;">Dia&nbsp;emissão:*</label>
<input style="width:150px;" type="text" id="diaEmissao" class="form-control" value="<?php echo date('d/m/Y');?>">
</div>
</div>

<button class="btn btn-success" id="emitirCarga" type="button" style="cursor:pointer;border-radius:50%;"><i class="fa fa-search"></i></button>


</div>
             
                </div>
            </div>
        </div>
       
    </div>




<script>

$('#diaEmissao').mask('99/99/9999');



$("#emitirCarga").on('click', function(){

var diaEmissao = $("#diaEmissao").val();

if(diaEmissao == ''){
    toastr.error('Por favor, informe o dia da emissão!');
    return false;
}

window.location='src/carga/getCarga.php?data='+diaEmissao;

});


</script>