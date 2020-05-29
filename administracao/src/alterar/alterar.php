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
<br><br><br>

<div class="row form-inline">

<div class="form-group">
<div class="col-lg-1">
<label style="width:10px;">CPF/CNPJ:*</label>
<input style="width:170px;" type="text" id="cpfcnpj" class="form-control" maxlength="18" onkeypress="mascaraMutuario(this,cpfCnpj)">
</div>
</div>

<div class="form-group">
<div class="col-lg-1">
<label style="width:10px;">C/C:*</label>
<input style="width:100px;" type="text" id="cc" class="form-control">
</div>
</div>

<button class="btn btn-success" id="buscarAssociado" type="button" style="cursor:pointer;border-radius:50%;"><i class="fa fa-search"></i></button>


</div>


<div id="dadosAssociado">


</div>


                  
                </div>
            </div>
        </div>
       
    </div>




<script>

const formatter = new Intl.NumberFormat('pt-BR', {
  style: 'currency',
  currency: 'BRL',
  minimumFractionDigits: 2
});

$("#buscarAssociado").on('click', function(){


var cpfcnpj = $("#cpfcnpj").val();
var cc = $("#cc").val();

if(cpfcnpj == '' && cc == ''){
    toastr.error('Por favor, preencha um campo de busca!');
    return false;
}

if(cpfcnpj != '' && cc != ''){
    toastr.error('Por favor, escolha apenas um método de busca!');
    return false;
}

$.ajax({


        type:"POST", 
        url:"src/alterar/getAssociado.php", 
        data:{cpfcnpj:cpfcnpj,cc:cc},  
        beforeSend:function(){
            $('#dadosAssociado').empty();
            $('#dadosAssociado').append("<br><br><br><img src='src/img/bars.svg' style='height:50px;display:block;margin:auto;'/>");

        },    
        success:function(response){
            if(response==0){
                $('#dadosAssociado').empty(); 
                toastr.error('Nenhum resultado encontrado!');
                return false;
            } 
            else {

                $("#dadosAssociado").empty();
                for(var i=0;i<response.length;i++){

                    var disabled = 'disabled';

                    if(response[i].inadimplente == 'sim'){
                        disabled = '';
                    }

                    var dataHora = '';
                    if(response[i].dataResgate != '' && response[i].horaResgate != ''){
                        dataHora = response[i].dataResgate+' às '+response[i].horaResgate;
                    }

                    $('#dadosAssociado').append('<hr/>  <div class="row" style="padding-left:15px;padding-bottom:5px;font-size:14px;"><b>CPF: </b>'+response[i].cpf+'</div> <div class="row" style="padding-left:15px;padding-bottom:5px;font-size:14px;"><b>Nome:</b> '+response[i].nome+'</div> <div class="row" style="padding-left:15px;padding-bottom:5px;font-size:14px;"><b>Liquido Resgate:</b> '+formatter.format(response[i].liquidoResgate)+'</div> <div class="row" style="padding-left:15px;padding-bottom:5px;font-size:14px;"><b>Data Resgate:</b> '+dataHora+'</div> <div class="row" style="padding-left:15px;padding-bottom:5px;font-size:14px;"><b>Valor Resgatado:</b> '+formatter.format(response[i].valorResgate)+'</div> <div class="row" style="padding-left:15px;padding-bottom:5px;font-size:14px;"><b>Valor Aplicado:</b> '+formatter.format(response[i].valorAplicado)+'</div>  <hr/>  <div class="row" style="padding-left:15px;padding-bottom:5px;font-size:14px;"><b>Inadimplência Integralização: </b><span style="color:red;">'+response[i].inadimplenteIntegralizacao+'</span></div>  <div class="row" style="padding-left:15px;padding-bottom:5px;font-size:14px;"><b>Inadimplência Cartão:</b> <span style="color:red;">'+response[i].inadimplenteCartao+'</span></div>  <div class="row" style="padding-left:15px;padding-bottom:5px;font-size:14px;"><b>Inadimplências Empréstimo:</b> <span style="color:red;">'+response[i].inadimplenteEmprestimo+'</span></div>  <div class="row" style="padding-left:15px;padding-bottom:5px;font-size:14px;"><b>Inadimplência Consórcio:</b> <span style="color:red;">'+response[i].inadimplenteConsorcio+'</span></div>  <div class="row" style="padding-left:15px;padding-bottom:5px;font-size:14px;"><b>Inadimplência Situação:</b> <span style="color:red;">'+response[i].inadimplenteSituacao+'</span></div> <br><br>  <button class="btn btn-success" id="liberar" type="button" value="'+response[i].cpf+'" '+disabled+'><i class="fa fa-check"></i> <span class="bold">&nbsp;Liberar</span></button>');


                    $("#liberar").on('click', function(){

                        var cpfcnpj = $(this).val();

                        $.ajax({
                            type:"POST", 
                            url:"src/alterar/liberar.php", 
                            data:{cpfcnpj:cpfcnpj},
                            success:function(response){
                                if(response==1){
                                $('#dadosAssociado').empty(); 
                                    toastr.success('Associado liberado com sucesso!');
                                    $("#content").empty();
                                    $("#content").load('src/alterar/alterar.php');
                                }
                                else{
                                     toastr.error('Ocorreu um erro ao processar sua solicitação!');
                                     return false;
                                }
                            }
                        });

                    });
                }
            }
        }
});


});

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


</script>