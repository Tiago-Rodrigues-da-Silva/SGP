function procurar(pesquisaCnpj){
    var encontrou = false;
    $('table tbody').find('tr').each(function() {
        var conteudoCelula = $(this).find('td:nth-child(3)').text();

        if (pesquisaCnpj == conteudoCelula){
            encontrou = true;
        } 
    });

    return encontrou;
}


function incluir() {
    var pesquisaCnpj = document.getElementById("pesquisaCnpj").value;

    if (!validaCampo()){
        addAlert("Campo inválido, favor conferir o número!");
        return false;
    }

    if (procurar(pesquisaCnpj)){        
        addAlert("Cadastro já existe!");
        return false;
    } else{
        var resposta = confirm("Registro não encontrado, deseja incluir?");
        if (resposta){
            $('#inserir').modal('show');
            document.getElementById("modal-cnpj-inclui").value = pesquisaCnpj;
        }
    }
}

function alterar(id_cliente) {
    //função que abre a modal Altera e preenche com os dados a serem alterados

    document.getElementById("modal-id_cliente-altera").value = id_cliente;

    var pessoa = "nome" + id_cliente;
    pessoa = document.getElementById(pessoa).innerText;
    document.getElementById("modal-nome-altera").value = pessoa;

    var cnpj = "cnpj" + id_cliente;
    cnpj = document.getElementById(cnpj).innerText;
    document.getElementById("modal-cnpj-altera").value = cnpj;

    $('#alterar').modal('show');
}
function excluir(id_cliente) {
    //função que abre a modal Altera e preenche com os dados a serem alterados
    document.getElementById("modal-id_cliente-exclui").value = id_cliente;

    var pessoa = "nome" + id_cliente;
    pessoa = document.getElementById(pessoa).innerText;
    document.getElementById("modal-nome-exclui").value = pessoa;

    var cnpj = "cnpj" + id_cliente;
    cnpj = document.getElementById(cnpj).innerText;
    document.getElementById("modal-cnpj-exclui").value = cnpj;

    $('#excluir').modal('show');
}