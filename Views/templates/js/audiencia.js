    //combobox
    geraComBoxTipo('inclui', 'tipos_audiencia');
    geraComBoxTipo('inclui', 'modalidades_audiencia');
    geraComBoxTipo('altera', 'tipos_audiencia');
    geraComBoxTipo('altera', 'modalidades_audiencia');
    geraComBoxTipo('exclui', 'tipos_audiencia');
    geraComBoxTipo('exclui', 'modalidades_audiencia');

function getDados(pesquisaProcesso, acao){
    //preenche os dados a partir de um numero de processo
    $.ajax({
        url: '../../Models/PesquisaProcesso.php',
        method: 'GET',
        data: {
            pesquisaPHP: pesquisaProcesso,
            tipoPesquisa: acao
        },
        dataType: 'json'
    }).done(function(resultado){
        if (resultado=="false"){
            alert("Processo não encontado!");
            return false;
        }else {
            console.log(resultado);
            document.getElementById("modal-vara-" + acao).value = resultado.vara;
            document.getElementById("modal-id_processo-" + acao).value = resultado.id_processo;
            document.getElementById("modal-processo-" + acao).value = resultado.numero;
            document.getElementById("modal-cliente-" + acao).value = resultado.cliente;
            document.getElementById("modal-reclamante-" + acao).value = resultado.reclamante;
            document.getElementById("modal-preposto-" + acao).value = resultado.preposto;
        }
    });

}

function getDadosAudiencia(idAudiencia, acao){
    //preenche os dados a partir de um numero de processo
    $.ajax({
        url: '../../Models/PesquisaAudiencia.php',
        method: 'GET',
        data: {pesquisaPHP: idAudiencia},
        dataType: 'json'
    }).done(function(resultado){
        if (resultado=="false"){
            alert("Processo não encontado!");
            return false;
        }else {
            console.log(resultado);
            $("#modal-data-" + acao).val(resultado.data);
            $("#modal-horario-" + acao).val(resultado.horario);
            $("#modal-modalidade-" + acao).val(resultado.id_modalidade);
            $("#modal-tipo-" + acao).val(resultado.id_tipo);
            $("#modal-vara-" + acao).val(resultado.vara);
            $("#modal-id_audiencia-" + acao).val(resultado.id_audiencia);
            $("#modal-processo-" + acao).val(resultado.processo);
            $("#modal-id_processo-" + acao).val(resultado.id_processo);
            $("#modal-cliente-" + acao).val(resultado.cliente);
            $("#modal-reclamante-" + acao).val(resultado.reclamante);
            $("#modal-preposto-" + acao).val(resultado.preposto);
        }
    });

}

function geraComBoxTipo(acao, _tabela){
    $.ajax({
        url: '../../Models/ComboBox.php',
        method: 'GET',
        data: {tabela: _tabela},
        dataType: 'json'
    }).done(function(resultado){
        console.log(resultado);
        var selectTipo = document.getElementById("modal-tipo-" + acao);

        for (var i = 0; i < resultado.length; i++){
            var obj = resultado[i];
            var opt;
            var texto;
            var modalHtml;

            if(_tabela == 'tipos_audiencia'){
                opt = obj.id_tipo;
                texto = obj.tipo_audiencia;
                modalHtml = "tipo";
            } else if (_tabela == 'modalidades_audiencia'){
                opt = obj.id_modalidade;
                texto = obj.modalidade_audiencia;
                modalHtml = "modalidade";
            }
            var el = document.createElement("option");
            el.textContent = texto;
            el.value = opt;
            var selectTipo = document.getElementById("modal-" + modalHtml + "-" + acao);
            selectTipo.appendChild(el);
          }
    });

}


function procurar(pesquisaProcesso){
    var encontrou = false;
    $('table tbody').find('tr').each(function() {
        var conteudoCelula = $(this).find('td:nth-child(7)').text();
        if (pesquisaProcesso == conteudoCelula){
            encontrou = true;
        } 
    });

    return encontrou;
}

function incluir() {
    var pesquisaProcesso = document.getElementById("pesquisaProcesso").value;
    var acao = "inclui";

    if (!validaCampo()){
        addAlert("Campo inválido, favor conferir o número!");
        return false;
    }
    
    $('#inserir').modal('show');
    getDados(pesquisaProcesso, acao);
}

function alterar(idAudiencia) {
    //função que abre a modal Altera e preenche com os dados a serem alterados
    document.getElementById("modal-id_audiencia-altera").value = idAudiencia;
    var acao = "altera";
    $('#alterar').modal('show');
    getDadosAudiencia(idAudiencia, acao);
}

function excluir(idAudiencia) {
    //função que abre a modal Exclui e preenche com os dados a serem excluidos
    document.getElementById("modal-id_audiencia-exclui").value = idAudiencia;
    var acao = "exclui";
    $('#excluir').modal('show');
    getDadosAudiencia(idAudiencia, acao);
 
}


//-----------------------------------------------------------------------------------//
$('#pesqData').keyup(function() {
    var nomeFiltro = $(this).val().toLowerCase();
    $('table tbody').find('tr').each(function() {
        var conteudoCelula = $(this).find('td:nth-child(1)').text();
        var corresponde = conteudoCelula.toLowerCase().indexOf(nomeFiltro) >= 0;
        $(this).css('display', corresponde ? '' : 'none');
    });
});

$('#pesqHora').keyup(function() {
    var nomeFiltro = $(this).val().toLowerCase();
    $('table tbody').find('tr').each(function() {
        var conteudoCelula = $(this).find('td:nth-child(2)').text();
        var corresponde = conteudoCelula.toLowerCase().indexOf(nomeFiltro) >= 0;
        $(this).css('display', corresponde ? '' : 'none');
    });
});

$('#pesqModalidade').keyup(function() {
    var nomeFiltro = $(this).val().toLowerCase();
    $('table tbody').find('tr').each(function() {
        var conteudoCelula = $(this).find('td:nth-child(3)').text();
        var corresponde = conteudoCelula.toLowerCase().indexOf(nomeFiltro) >= 0;
        $(this).css('display', corresponde ? '' : 'none');
    });
});

$('#pesqTipo').keyup(function() {
    var nomeFiltro = $(this).val().toLowerCase();
    $('table tbody').find('tr').each(function() {
        var conteudoCelula = $(this).find('td:nth-child(4)').text();
        var corresponde = conteudoCelula.toLowerCase().indexOf(nomeFiltro) >= 0;
        $(this).css('display', corresponde ? '' : 'none');
    });
});

$('#pesqVara').keyup(function() {
    var nomeFiltro = $(this).val().toLowerCase();
    $('table tbody').find('tr').each(function() {
        var conteudoCelula = $(this).find('td:nth-child(5)').text();
        var corresponde = conteudoCelula.toLowerCase().indexOf(nomeFiltro) >= 0;
        $(this).css('display', corresponde ? '' : 'none');
    });
});

$('#pesqCliente').keyup(function() {
    var nomeFiltro = $(this).val().toLowerCase();
    $('table tbody').find('tr').each(function() {
        var conteudoCelula = $(this).find('td:nth-child(6)').text();
        var corresponde = conteudoCelula.toLowerCase().indexOf(nomeFiltro) >= 0;
        $(this).css('display', corresponde ? '' : 'none');
    });
});

$('#pesqProcesso').keyup(function() {
    var nomeFiltro = $(this).val().toLowerCase();
    $('table tbody').find('tr').each(function() {
        var conteudoCelula = $(this).find('td:nth-child(7)').text();
        var corresponde = conteudoCelula.toLowerCase().indexOf(nomeFiltro) >= 0;
        $(this).css('display', corresponde ? '' : 'none');
    });
});

$('#pesqReclamante').keyup(function() {
    var nomeFiltro = $(this).val().toLowerCase();
    $('table tbody').find('tr').each(function() {
        var conteudoCelula = $(this).find('td:nth-child(8)').text();
        var corresponde = conteudoCelula.toLowerCase().indexOf(nomeFiltro) >= 0;
        $(this).css('display', corresponde ? '' : 'none');
    });
});

$('#pesqPreposto').keyup(function() {
    var nomeFiltro = $(this).val().toLowerCase();
    $('table tbody').find('tr').each(function() {
        var conteudoCelula = $(this).find('td:nth-child(9)').text();
        var corresponde = conteudoCelula.toLowerCase().indexOf(nomeFiltro) >= 0;
        $(this).css('display', corresponde ? '' : 'none');
    });
});


//----------------------------------------------------------------------------------------------
