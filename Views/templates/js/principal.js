
getDados("arrayMeses");
getTotalProcessos("totalProcessos");
gettotalAudiencias("totalAudiencias");



function getDados(_tipoPesquisa){
    //preenche os dados a partir de um numero de processo
    $.ajax({
        url: '../../Models/PesquisaDashBoard.php',
        method: 'GET',
        data: {
                tipoPesquisa: _tipoPesquisa
                },
        dataType: 'json'
    }).done(function(resultado){
        if (resultado=="false"){
            alert("Dados não encontados!");
            return false;
        }else {
            console.log(resultado);
            chart.data.labels.push(09 + "/" + 2021);
            chart.data.datasets[0].data.push(0);

            for (let i = 0; i < resultado.length; i++) {
                chart.data.labels.push(resultado[i].mes + "/" + resultado[i].ano);
                chart.data.datasets[0].data.push(resultado[i].total);
              }

            chart.update();
        }
    });

}

function getTotalProcessos(_tipoPesquisa){
    $.ajax({
        url: '../../Models/PesquisaDashBoard.php',
        method: 'GET',
        data: {
                tipoPesquisa: _tipoPesquisa
                },
        dataType: 'json'
    }).done(function(resultado){
        if (resultado=="false"){
            alert("Dados não encontados!");
            return false;
        }else {
            console.log(resultado);
            $("#totalProcessos").text(resultado.totalProcessos);
        }
    });
}

function gettotalAudiencias(_tipoPesquisa){
    $.ajax({
        url: '../../Models/PesquisaDashBoard.php',
        method: 'GET',
        data: {
                tipoPesquisa: _tipoPesquisa
                },
        dataType: 'json'
    }).done(function(resultado){
        if (resultado=="false"){
            alert("Dados não encontados!");
            return false;
        }else {
            console.log(resultado);
            $("#totalAudiencias").text(resultado.totalAudiencias);
        }
    });

}