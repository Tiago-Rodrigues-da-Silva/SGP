function procurar(pesquisaCpf){
    var encontrou = false;
    $('table tbody').find('tr').each(function() {
        var conteudoCelula = $(this).find('td:nth-child(3)').text();

        if (pesquisaCpf == conteudoCelula){
            encontrou = true;
        } 
    });

    return encontrou;
}


function incluir() {
    var pesquisaCpf = document.getElementById("pesquisaCpf").value;

    if (!validaCampo()){
        addAlert("Campo inválido, favor conferir o número!");
        return false;
    }

    if (procurar(pesquisaCpf)){        
        addAlert("Cadastro já existe!");
        return false;
    } else{
        var resposta = confirm("Registro não encontrado, deseja incluir?");
        if (resposta){
            $('#inserir').modal('show');
            document.getElementById("modal-cpf-inclui").value = pesquisaCpf;
        }
    }
}

function alterar(id) {
    //função que abre a modal Altera e preenche com os dados a serem alterados
    document.getElementById("modal-id_reclamante-altera").value = id;

    var reclamante = "nome" + id;
    reclamante = document.getElementById(reclamante).innerText;
    document.getElementById("modal-nome-altera").value = reclamante;

    var cpf = "cpf" + id;
    cpf = document.getElementById(cpf).innerText;
    document.getElementById("modal-cpf-altera").value = cpf;

    $('#alterar').modal('show');
}
function excluir(id) {
    //função que abre a modal Altera e preenche com os dados a serem alterados
    document.getElementById("modal-id_reclamante-exclui").value = id;

    var reclamante = "nome" + id;
    reclamante = document.getElementById(reclamante).innerText;
    document.getElementById("modal-nome-exclui").value = reclamante;

    var cpf = "cpf" + id;
    cpf = document.getElementById(cpf).innerText;
    document.getElementById("modal-cpf-exclui").value = cpf;

    $('#excluir').modal('show');
}