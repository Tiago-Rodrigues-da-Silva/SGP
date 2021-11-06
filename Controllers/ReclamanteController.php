<?php
    require_once __DIR__."/../config.php";
    include_once SITE_ROOT.'/Models/ReclamanteClass.php';

class ReclamanteController {
	
    public function listar() {

        $reclamantes = (new ReclamanteClass())->listar();
        $_POST["listar"] = $reclamantes;
}

public function inserir(){
    if(isset($_POST['cpf'])){
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $isInserted = (new ReclamanteClass())->inserir($nome, $cpf);
        $_POST['acao'] = 'listar';
        $_POST['confirma'] = true;
    } else {
        echo "Inserção de dados inválida";
    }
    ReclamanteController::listar();
}

public function alterar(){
    if(isset($_POST['id_reclamante'])){
        $id_reclamante = $_POST['id_reclamante'];
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $isUpdated = (new ReclamanteClass())->alterar($id_reclamante, $nome, $cpf);
        $_POST['acao'] = 'listar';
        ReclamanteController::listar();
    } else {
        echo "Alteração de dados da pessoa inválido";
    }
}

public function excluir(){

    if(isset($_POST['id_reclamante'])){
        $id_reclamante = $_POST['id_reclamante'];
        $isDeleted = (new ReclamanteClass())->deletar($id_reclamante);
        $_POST['acao'] = 'listar';
        ReclamanteController::listar();
    } else {
        echo "Deleção de dados da pessoa inválido";
    }

}
}