    //combobox
    geraComboBox('inclui', 'clientes');
    geraComboBox('inclui', 'reclamantes');
    geraComboBox('inclui', 'prepostos');
    geraComboBox('inclui', 'varas');

    geraComboBox('altera', 'clientes');
    geraComboBox('altera', 'reclamantes');
    geraComboBox('altera', 'prepostos');
    geraComboBox('altera', 'varas');

    function geraComboBox(acao, _tabela){
        $.ajax({
            url: '../../Models/ComboBox.php',
            method: 'GET',
            data: {tabela: _tabela},
            dataType: 'json'
        }).done(function(resultado){
            console.log(resultado);
    
            for (var i = 0; i < resultado.length; i++){
                var obj = resultado[i];
                var opt;
                var texto;
                var modalHtml;
    
                if(_tabela == 'clientes'){
                    opt = obj.id_cliente;
                    texto = obj.nome;
                    modalHtml = "cliente";
                } else if (_tabela == 'reclamantes'){
                    opt = obj.id_reclamante;
                    texto = obj.nome;
                    modalHtml = "reclamante";
                } else if (_tabela == 'prepostos'){
                    opt = obj.id_preposto;
                    texto = obj.nome;
                    modalHtml = "preposto";
                } else if (_tabela == 'varas'){
                    opt = obj.id_vara;
                    texto = obj.nome_vara_abrev;
                    modalHtml = "vara";
                }

                var el = document.createElement("option");
                el.textContent = texto;
                el.value = opt;
                var selectTipo = document.getElementById("modal-" + modalHtml + "-" + acao);
                selectTipo.appendChild(el);
              }
        });
    
    }


function getDados(pesquisaProcesso, acao){
    //preenche os dados a partir de um numero de processo
    $.ajax({
        url: '../../Models/PesquisaProcesso.php',
        method: 'GET',
        data: {pesquisaPHP: pesquisaProcesso,
                tipoPesquisa: acao
                },
        dataType: 'json'
    }).done(function(resultado){
        if (resultado=="false"){
            alert("Processo não encontado!");
            return false;
        }else {
            console.log(resultado);

            $("#modal-id_processo-" + acao).val(resultado.id_processo);
            $("#modal-cliente-" + acao).val(resultado.id_cliente);
            $("#modal-numero_proc-" + acao).val(resultado.numero);            
            $("#modal-reclamante-" + acao).val(resultado.id_reclamante);
            $("#modal-preposto-" + acao).val(resultado.id_preposto);
            $("#modal-vara-" + acao).val(resultado.id_vara);
        }
    });

}



function procurar(pesquisaProcesso){
    var encontrou = false;
    $('table tbody').find('tr').each(function() {
        var conteudoCelula = $(this).find('td:nth-child(1)').text();
        if (pesquisaProcesso == conteudoCelula){
            encontrou = true;
        } 
    });

    return encontrou;
}

function incluir() {
    var pesquisaProcesso = document.getElementById("pesquisaProcesso").value;

    if (!validaCampo()){
        addAlert("Campo inválido, favor conferir o número!");
        return false;
    }

    if (procurar(pesquisaProcesso)){        
        addAlert("Cadastro já existe!");
        return false;
    } else{
        var resposta = confirm("Registro não encontrado, deseja incluir?");
        if (resposta){
            $('#inserir').modal('show');
            document.getElementById("modal-numero_proc-inclui").value = pesquisaProcesso;
        }
    }
}

function alterar(idProcesso) {
    var acao = "altera";
    $('#alterar').modal('show');
    getDados(idProcesso, acao);
}


function excluir(idProcesso) {
    //função que abre a modal Exclui e preenche com os dados a serem excluidos
    document.getElementById("modal-id-processo-exclui").value = idProcesso;

    var numero_proc = "numero_proc" + idProcesso;
    numero_proc = document.getElementById(numero_proc).innerText;
    document.getElementById("modal-numero_proc-exclui").value = numero_proc;

    var cliente = "cliente" + idProcesso;
    cliente = document.getElementById(cliente).innerText;
    document.getElementById("modal-cliente-exclui").value = cliente;

    var reclamante = "reclamante" + idProcesso;
    reclamante = document.getElementById(reclamante).innerText;
    document.getElementById("modal-reclamante-exclui").value = reclamante;

    var id_preposto = "id_preposto" + idProcesso;
    id_preposto = document.getElementById(id_preposto).innerText;
    document.getElementById("modal-id_preposto-exclui").value = id_preposto;

    var id_vara = "id_vara" + idProcesso;
    id_vara = document.getElementById(id_vara).innerText;
    document.getElementById("modal-id_vara-exclui").value = id_vara;

    $('#excluir').modal('show');
}



//---------------------------------------------------------------------------------------//
$('#pesqProcesso').keyup(function() {
    var nomeFiltro = $(this).val().toLowerCase();
    $('table tbody').find('tr').each(function() {
        var conteudoCelula = $(this).find('td:nth-child(1)').text();
        var corresponde = conteudoCelula.toLowerCase().indexOf(nomeFiltro) >= 0;
        $(this).css('display', corresponde ? '' : 'none');
    });
});

$('#pesqCliente').keyup(function() {
    var nomeFiltro = $(this).val().toLowerCase();
    $('table tbody').find('tr').each(function() {
        var conteudoCelula = $(this).find('td:nth-child(2)').text();
        var corresponde = conteudoCelula.toLowerCase().indexOf(nomeFiltro) >= 0;
        $(this).css('display', corresponde ? '' : 'none');
    });
});

$('#pesqReclamante').keyup(function() {
    var nomeFiltro = $(this).val().toLowerCase();
    $('table tbody').find('tr').each(function() {
        var conteudoCelula = $(this).find('td:nth-child(3)').text();
        var corresponde = conteudoCelula.toLowerCase().indexOf(nomeFiltro) >= 0;
        $(this).css('display', corresponde ? '' : 'none');
    });
});

$('#pesqPreposto').keyup(function() {
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


//-----------------------------------------------------------------//
