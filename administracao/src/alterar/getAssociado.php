<?php
include('../connect/connect.php');
header('Content-Type: application/json');
sleep(1);


$cpfcnpj = $_POST['cpfcnpj'];
$cc = $_POST['cc'];

$query = '';
$num = '';

if($cpfcnpj != ''){

    $query = mysqli_query($con, "SELECT * FROM valores WHERE cpf = '$cpfcnpj' ");
    $num = mysqli_num_rows($query);
    $resulQuery = mysqli_fetch_assoc($query);

    $ccAssociado = $resulQuery['cc'];

    $dataDia = date('Y-m-d');
    $dataCorte = '2019-05-13';

    $queryIntegr = mysqli_query($con, "SELECT * FROM ultima_intregalizacao WHERE TIMESTAMPDIFF(DAY,data,'$dataCorte') >= 90 AND cc = '$ccAssociado' ");
    $numIntegr = mysqli_num_rows($queryIntegr);

    $queryPqdn = mysqli_query($con, "SELECT * FROM pqdn WHERE cpf = '$cpfcnpj' ");
    $resulPqdn = mysqli_fetch_assoc($queryPqdn);
    $renda = $resulPqdn['renda'];
    $saldoCapital = $resulPqdn['saldocapital'];
    $carteira = $resulPqdn['carteira'];

    $queryCartao = mysqli_query($con, "SELECT * FROM cartaoatraso WHERE cpf = '$cpfcnpj' AND diasAtraso > 5 ");
    $numCartao = mysqli_num_rows($queryCartao);
    $resulCartao = mysqli_fetch_assoc($queryCartao);

    $queryEmprestimo = mysqli_query($con, "SELECT * FROM ultimo_pag_emprestimo WHERE cpf = '$cpfcnpj' AND TIMESTAMPDIFF(DAY,data,'$dataDia') > 5");
    $numEmprestimo = mysqli_num_rows($queryEmprestimo);
    $resulEmprestimo = mysqli_fetch_assoc($queryEmprestimo);

    $queryConsorcio = mysqli_query($con, "SELECT * FROM consorcioatraso WHERE cpf = '$cpfcnpj' AND diasAtraso > 5 ");
    $numConsorcio = mysqli_num_rows($queryConsorcio);
    $resulConsorcio = mysqli_fetch_assoc($queryConsorcio);

    $queryBaixaTotalCP = mysqli_query($con, "SELECT * FROM baixatotalcp WHERE cc = '$ccAssociado' ");
    $numBaixaTotalCP = mysqli_num_rows($queryBaixaTotalCP);

    $queryLp = mysqli_query($con, "SELECT * FROM lp WHERE cc = '$ccAssociado' ");
    $numLp = mysqli_num_rows($queryLp);

    $queryVencidos = mysqli_query($con, "SELECT * FROM vencidos WHERE cc = '$ccAssociado' ");
    $numVencidos = mysqli_num_rows($queryVencidos);

    $queryInadimplente1Ano = mysqli_query($con, "SELECT EXISTS(SELECT 1 FROM ultima_intregalizacao WHERE cc = '$ccAssociado') AS cc");
    $resulInadimplente1Ano = mysqli_fetch_assoc($queryInadimplente1Ano);

    $inadimplenteSituacao = '';
    $inadimplenteCartao = ''; 
    $inadimplenteConsorcio = ''; 
    $inadimplenteEmprestimo = ''; 
    $inadimplenteIntegralizacao = ''; 

    if($carteira == '641' OR $carteira == '642' OR $carteira == '643'){
        $inadimplenteSituacao = utf8_encode('Associado não faz mais parte da cooperativa');
    }
    elseif($numCartao != 0){
        $inadimplenteCartao = 'R$ '.$resulCartao['valor'];
    }
    elseif($numEmprestimo != 0){
        $inadimplenteEmprestimo = 'R$ '.$resulEmprestimo['valor'];
    }
    elseif($numConsorcio != 0){
         $inadimplenteConsorcio = $resulConsorcio['diasAtraso'].'dias em atraso';
    }
    elseif($numBaixaTotalCP != 0){
        $inadimplenteSituacao = 'Associado com baixa total de capital.';
    }
    elseif($numLp != 0){
        $resulLp = mysqli_fetch_assoc($queryLp);
        $inadimplenteSituacao = 'Associado em LP no produto '.$resulLp['produto'];
    }
    elseif($numVencidos != 0){
        $resulVencidos = mysqli_fetch_assoc($queryVencidos);
        $inadimplenteSituacao = 'Associado com status de vencido no produto '.$resulVencidos['produto'];
    }
    elseif($resulInadimplente1Ano['cc'] == 0){
        $inadimplenteIntegralizacao = 'Associado sem integralizar.';
    }
    elseif( ($numIntegr != 0) AND ($saldoCapital < 15000) ){
        $inadimplenteIntegralizacao = 'Associado sem integralizar.';
    }
    elseif( ($renda == 0) AND ($numIntegr != 0) AND ($saldoCapital < 15000) ){
        $inadimplenteIntegralizacao = 'Associado sem integralizar.';
    }

    if( ($numIntegr != 0) AND ($saldoCapital < 15000) AND ($saldoCapital >= $renda) AND $renda != 0){
        $inadimplenteIntegralizacao = '';

    }
    

}
if($cc != ''){

    $queryCC = mysqli_query($con, "SELECT * FROM acesso WHERE cc = '$cc' ");
    $resulCC = mysqli_fetch_assoc($queryCC);
    $cpfcnpj = $resulCC['cpfCnpj'];

    $query = mysqli_query($con, "SELECT * FROM valores WHERE cpf = '$cpfcnpj' ");
    $num = mysqli_num_rows($query);
    $resulQuery = mysqli_fetch_assoc($query);

    $ccAssociado = $resulQuery['cc'];

    $dataDia = date('Y-m-d');
    $dataCorte = '2019-05-13';

    $queryIntegr = mysqli_query($con, "SELECT * FROM ultima_intregalizacao WHERE TIMESTAMPDIFF(DAY,data,'$dataCorte') >= 90 AND cc = '$ccAssociado' ");
    $numIntegr = mysqli_num_rows($queryIntegr);

    $queryPqdn = mysqli_query($con, "SELECT * FROM pqdn WHERE cpf = '$cpfcnpj' ");
    $resulPqdn = mysqli_fetch_assoc($queryPqdn);
    $renda = $resulPqdn['renda'];
    $saldoCapital = $resulPqdn['saldocapital'];
    $carteira = $resulPqdn['carteira'];

    $queryCartao = mysqli_query($con, "SELECT * FROM cartaoatraso WHERE cpf = '$cpfcnpj' AND diasAtraso > 5 ");
    $numCartao = mysqli_num_rows($queryCartao);
    $resulCartao = mysqli_fetch_assoc($queryCartao);

    $queryEmprestimo = mysqli_query($con, "SELECT * FROM ultimo_pag_emprestimo WHERE cpf = '$cpfcnpj' AND TIMESTAMPDIFF(DAY,data,'$dataDia') > 5");
    $numEmprestimo = mysqli_num_rows($queryEmprestimo);
    $resulEmprestimo = mysqli_fetch_assoc($queryEmprestimo);

    $queryConsorcio = mysqli_query($con, "SELECT * FROM consorcioatraso WHERE cpf = '$cpfcnpj' AND diasAtraso > 5 ");
    $numConsorcio = mysqli_num_rows($queryConsorcio);
    $resulConsorcio = mysqli_fetch_assoc($queryConsorcio);

    $queryBaixaTotalCP = mysqli_query($con, "SELECT * FROM baixatotalcp WHERE cc = '$ccAssociado' ");
    $numBaixaTotalCP = mysqli_num_rows($queryBaixaTotalCP);

    $queryLp = mysqli_query($con, "SELECT * FROM lp WHERE cc = '$ccAssociado' ");
    $numLp = mysqli_num_rows($queryLp);

    $queryVencidos = mysqli_query($con, "SELECT * FROM vencidos WHERE cc = '$ccAssociado' ");
    $numVencidos = mysqli_num_rows($queryVencidos);

    $queryInadimplente1Ano = mysqli_query($con, "SELECT EXISTS(SELECT 1 FROM ultima_intregalizacao WHERE cc = '$ccAssociado') AS cc");
    $resulInadimplente1Ano = mysqli_fetch_assoc($queryInadimplente1Ano);

    $inadimplenteSituacao = '';
    $inadimplenteCartao = ''; 
    $inadimplenteConsorcio = ''; 
    $inadimplenteEmprestimo = ''; 
    $inadimplenteIntegralizacao = ''; 

    if($carteira == '641' OR $carteira == '642' OR $carteira == '643'){
        $inadimplenteSituacao = 'Associado não faz mais parte da cooperativa';
    }
    elseif($numCartao != 0){
        $inadimplenteCartao = 'R$ '.$resulCartao['valor'];
    }
    elseif($numEmprestimo != 0){
        $inadimplenteEmprestimo = 'R$ '.$resulEmprestimo['valor'];
    }
    elseif($numConsorcio != 0){
         $inadimplenteConsorcio = $resulConsorcio['diasAtraso'].'dias em atraso';
    }
    elseif($numBaixaTotalCP != 0){
        $inadimplenteSituacao = 'Associado com baixa total de capital.';
    }
    elseif($numLp != 0){
        $resulLp = mysqli_fetch_assoc($queryLp);
        $inadimplenteSituacao = 'Associado em LP no produto '.$resulLp['produto'];
    }
    elseif($numVencidos != 0){
        $resulVencidos = mysqli_fetch_assoc($queryVencidos);
        $inadimplenteSituacao = 'Associado com status de vencido no produto '.$resulVencidos['produto'];
    }
    elseif($resulInadimplente1Ano['cc'] == 0){
        $inadimplenteIntegralizacao = 'Associado sem integralizar.';
    }
    elseif( ($numIntegr != 0) AND ($saldoCapital < 15000) ){
        $inadimplenteIntegralizacao = 'Associado sem integralizar.';
    }
    elseif( ($renda == 0) AND ($numIntegr != 0) AND ($saldoCapital < 15000) ){
        $inadimplenteIntegralizacao = 'Associado sem integralizar.';
    }

    if( ($numIntegr != 0) AND ($saldoCapital < 15000) AND ($saldoCapital >= $renda) AND $renda != 0){
        $inadimplenteIntegralizacao = '';

    }


    

}


if($num == 0){
    echo $num;
}

else{


$vetor = array();

for($x=0;$x<$num;$x++){

$resul = $resulQuery;

 $vetor[$x] = array_map('utf8_encode', $resul);

}

        array_push($vetor[0]['inadimplenteSituacao']);
        array_push($vetor[0]['inadimplenteCartao']);
        array_push($vetor[0]['inadimplenteEmprestimo']);
        array_push($vetor[0]['inadimplenteConsorcio']);
        array_push($vetor[0]['inadimplenteIntegralizacao']);

        $vetor[0]['inadimplenteSituacao'] = $inadimplenteSituacao;
        $vetor[0]['inadimplenteCartao'] = $inadimplenteCartao;
        $vetor[0]['inadimplenteEmprestimo'] = $inadimplenteEmprestimo;
        $vetor[0]['inadimplenteConsorcio'] = $inadimplenteConsorcio;
        $vetor[0]['inadimplenteIntegralizacao'] = $inadimplenteIntegralizacao;

        echo utf8_decode(json_encode($vetor,JSON_UNESCAPED_UNICODE));

    
}



?>