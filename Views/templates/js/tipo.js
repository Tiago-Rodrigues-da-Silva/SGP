function incluir() {
    $('#inserir').modal('show');
}

function alterar(id_tipo) {
    //função que abre a modal Altera e preenche com os dados a serem alterados
    document.getElementById("modal-id-tipo-altera").value = id_tipo;
    var tipo = "tipo" + id_tipo;
    tipo = document.getElementById(tipo).innerText;
    document.getElementById("modal-tipo-altera").value = tipo;
    $('#alterar').modal('show');
}
function excluir(id_tipo) {
    //função que abre a modal Altera e preenche com os dados a serem alterados
    document.getElementById("modal-id-tipo-exclui").value = id_tipo;
    var tipo = "tipo" + id_tipo;
    tipo = document.getElementById(tipo).innerText;
    document.getElementById("modal-tipo-exclui").value = tipo;
    $('#excluir').modal('show');
}