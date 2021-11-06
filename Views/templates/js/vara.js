function incluir() {
    $('#inserir').modal('show');
}

function alterar(idVara) {
    //função que abre a modal Altera e preenche com os dados a serem alterados
    document.getElementById("modal-id-vara-altera").value = idVara;

    var nome_vara = "nome_vara" + idVara;
    nome_vara = document.getElementById(nome_vara).innerText;
    document.getElementById("modal-vara-altera").value = nome_vara;

    var nome_vara_abrev = "nome_vara_abrev" + idVara;
    nome_vara_abrev = document.getElementById(nome_vara_abrev).innerText;
    document.getElementById("modal-vara-abrev-altera").value = nome_vara_abrev;

    var trt = "trt" + idVara;
    trt = document.getElementById(trt).innerText;
    document.getElementById("modal-trt-altera").value = trt;

    $('#alterar').modal('show');
}
function excluir(idVara) {
    //função que abre a modal Exclui e preenche com os dados a serem excluidos
    document.getElementById("modal-id-vara-exclui").value = idVara;

    var nome_vara = "nome_vara" + idVara;
    nome_vara = document.getElementById(nome_vara).innerText;
    document.getElementById("modal-vara-exclui").value = nome_vara;

    var nome_vara_abrev = "nome_vara_abrev" + idVara;
    nome_vara_abrev = document.getElementById(nome_vara_abrev).innerText;
    document.getElementById("modal-vara-abrev-exclui").value = nome_vara_abrev;

    var trt = "trt" + idVara;
    trt = document.getElementById(trt).innerText;
    document.getElementById("modal-trt-exclui").value = trt;

    $('#excluir').modal('show');
}