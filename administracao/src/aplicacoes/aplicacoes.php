<?php 
sleep(1);
session_start();
include('../connect/connect.php');

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


 <table id="example1" class="table table-striped table-bordered table-hover" width="100%">
                        <thead>
                        <tr>
                            <th>CPF</th>
                            <th>Associado</th>
                            <th>Valor</th>
                            <th>Data</th>
                            <th>Hora</th>
                        </tr>
                        </thead>
                        <tbody>
                    
                    <?php $preencheTable = mysqli_query($con, "SELECT * FROM aplicacoes");
                    $numPreencheTable = mysqli_num_rows($preencheTable);
                    for($x=0;$x<$numPreencheTable;$x++){
                        $resulPreencheTable = mysqli_fetch_assoc($preencheTable);?>    
                <tr>
                    <td><?php echo $resulPreencheTable['cpf'];?></td>
                    <td><?php echo $resulPreencheTable['nome'];?></td>
                    <td><?php echo 'R$ '.$resulPreencheTable['valor'];?></td>
                    <td><?php echo $resulPreencheTable['data'];?></td>
                    <td><?php echo $resulPreencheTable['hora'];?></td>
                </tr>
                
                    <?php }?>
                        </tbody>
                    </table>






<!-- END TABLE -->
                  
                </div>
            </div>
        </div>
       
    </div>




<script>

$('#example1').dataTable( {
           // "ajax": 'api/datatables.json',
            dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>tp",
            "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
            buttons: [
                {extend: 'copy',className: 'btn-sm'},
                {extend: 'csv',title: 'SOBRAS - APLICAÇÕES', className: 'btn-sm'},
                {extend: 'pdf', title: 'SOBRAS - APLICAÇÕES', className: 'btn-sm'},
                {extend: 'print',className: 'btn-sm'}
            ]
        });



</script>