$("#buscar").on('click', function () {

    $("#content").empty();
    $("#content").load('src/buscar/buscar.php');

});

$("#aplicacoes").on('click', function () {

    $("#content").empty();
    $("#content").load('src/aplicacoes/aplicacoes.php');

});

$("#alterar").on('click', function () {

    $("#content").empty();
    $("#content").load('src/alterar/alterar.php');

});

$("#carga").on('click', function () {

    $("#content").empty();
    $("#content").load('src/carga/carga.php');

});
