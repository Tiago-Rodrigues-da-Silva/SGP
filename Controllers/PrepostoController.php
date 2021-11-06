<?php
    require_once __DIR__."/../config.php";
    include_once SITE_ROOT.'/Models/PrepostoClass.php';
    

class PrepostoController {
	
    public function listar() {
        $prepostos = (new PrepostoClass())->listar();
        $_POST["listar"] = $prepostos;
}

public function inserir(){
    if(isset($_POST['cpf'])){
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $isInserted = (new PrepostoClass())->inserir($nome, $cpf);
        $_POST['acao'] = 'listar';
        PrepostoController::listar();       
    } else {
        echo "Inserção de dados inválida";
    }
    PrepostoController::listar();
}

public function alterar(){
    if(isset($_POST['id_preposto'])){
        $id_preposto = $_POST['id_preposto'];
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $isUpdated = (new PrepostoClass())->alterar($id_preposto, $nome, $cpf);
        $_POST['acao'] = 'listar';
        PrepostoController::listar();
    } else {
        echo "Alteração de dados da pessoa inválido";
    }
}

public function excluir(){

    if(isset($_POST['id_preposto'])){
        $id_preposto = $_POST['id_preposto'];
        $isDeleted = (new PrepostoClass())->deletar($id_preposto);
        $_POST['acao'] = 'listar';
        PrepostoController::listar();
    } else {
        echo "Deleção de dados da pessoa inválido";
    }

}
}