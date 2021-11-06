<?php
    require_once __DIR__."/../config.php";
    include_once SITE_ROOT.'/Models/TipoAudienciaClass.php';

class TipoAudienciaController {
	
    public function listar() {

        $tipos_audiencias = (new TipoAudienciaClass())->listAll();
        $_POST["listar"] = $tipos_audiencias;
}

public function inserir(){
    if(isset($_POST['id_tipo'])){
        $id_tipo = $_POST['id_tipo'];
        $tipo_audiencia = $_POST['tipo_audiencia'];
        $isInserted = (new TipoAudienciaClass())->inserir($tipo_audiencia);
        $_POST['acao'] = 'listar';
        TipoAudienciaController::listar();
    } else {
        echo "Inserção de dados da vara inválido";
    }
}

public function alterar(){
    if(isset($_POST['id_tipo'])){
        $id_tipo = $_POST['id_tipo'];
        $tipo_audiencia = $_POST['tipo_audiencia'];
        $isUpdated = (new TipoAudienciaClass())->alterar($id_tipo, $tipo_audiencia);
        $_POST['acao'] = 'listar';
        TipoAudienciaController::listar();
    } else {
        echo "Alteração de dados da tipo_audiencia inválido";
    }
}

public function excluir(){

    if(isset($_POST['id_tipo'])){
        $id_tipo = $_POST['id_tipo'];
        $isDeleted = (new TipoAudienciaClass())->deletar($id_tipo);
        $_POST['acao'] = 'listar';
        TipoAudienciaController::listar();
    } else {
        echo "Deleção de dados da tipo_audiencia inválido";
    }

}
}