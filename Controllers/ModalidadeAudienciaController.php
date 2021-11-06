<?php
    include_once '../../Models/ModalidadeAudienciaClass.php';
    include_once '../../Views/templates/view_modalidade.php';

class ModalidadeAudienciaController {
	
    public function listar() {

            $modalidades_audiencias = (new ModalidadeAudienciaClass())->listAll();
            $_POST["listar"]=$modalidades_audiencias;
    }

    public function inserir(){
        if(isset($_POST['id_modalidade'])){
            $id_modalidade = $_POST['id_modalidade'];
            $modalidade = $_POST['modalidade'];
            $isInserted = (new ModalidadeAudienciaClass())->inserir($modalidade);
            $_POST['acao'] = 'listar';
            ModalidadeAudienciaController::listar();
        } else {
            echo "Inserção de dados da vara inválido";
        }
    }

    public function alterar(){
        if(isset($_POST['id_modalidade'])){
            $id_modalidade = $_POST['id_modalidade'];
            $modalidade = $_POST['modalidade'];
            $isUpdated = (new ModalidadeAudienciaClass())->alterar($id_modalidade, $modalidade);
            $_POST['acao'] = 'listar';
            ModalidadeAudienciaController::listar();
        } else {
            echo "Alteração de dados da modalidade inválido";
        }
    }

    public function excluir(){

        if(isset($_POST['id_modalidade'])){
            $id_modalidade = $_POST['id_modalidade'];
            $isDeleted = (new ModalidadeAudienciaClass())->deletar($id_modalidade);
            $_POST['acao'] = 'listar';
            ModalidadeAudienciaController::listar();
        } else {
            echo "Deleção de dados da modalidade inválido";
        }

    }

}