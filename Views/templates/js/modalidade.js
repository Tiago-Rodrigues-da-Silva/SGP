function incluir() {
    $('#inserir').modal('show');
}

function alterar(idModalidade) {
    //função que abre a modal Altera e preenche com os dados a serem alterados
    document.getElementById("modal-id-modalidade-altera").value = idModalidade;
    var modalidade = "modalidade" + idModalidade;
    modalidade = document.getElementById(modalidade).innerText;
    document.getElementById("modal-modalidade-altera").value = modalidade;
    $('#alterar').modal('show');
}
function excluir(idModalidade) {
    //função que abre a modal Altera e preenche com os dados a serem alterados
    document.getElementById("modal-id-modalidade-exclui").value = idModalidade;
    var modalidade = "modalidade" + idModalidade;
    modalidade = document.getElementById(modalidade).innerText;
    document.getElementById("modal-modalidade-exclui").value = modalidade;
    $('#excluir').modal('show');
}