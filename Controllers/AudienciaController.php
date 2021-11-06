<?php
    // include_once '../../Models/AudienciaClass.php';
    // include_once '../../Models/AgendaClass.php';

    require_once __DIR__."/../config.php";
    include_once SITE_ROOT.'/Models/AudienciaClass.php';
    include_once SITE_ROOT.'/Models/AgendaClass.php';

class AudienciaController {

    public function listar() {

        $audiencias = (new AgendaClass())->listar();
        $_POST["listar"]=$audiencias;
            
    }

    public function inserir(){
        if(isset($_POST['data']) && isset($_POST['horario'])){
            $data = $_POST['data'];
            $horario = $_POST['horario'];
            $id_modalidade = $_POST['id_modalidade'];
            $id_tipo = $_POST['id_tipo'];
            $id_processo = $_POST['id_processo'];
            $isInserted = (new AudienciaClass())->inserir($data, $horario, $id_modalidade, $id_tipo, $id_processo);
            $_POST['acao'] = 'listar';
            AudienciaController::listar();
        } else {
            echo "Inserção de dados da vara inválido";
        }
    }

    public function alterar(){
        if(isset($_POST['data']) && isset($_POST['horario'])){
            $id_audiencia = $_POST['id_audiencia'];
            $data = $_POST['data'];
            $horario = $_POST['horario'];
            $id_modalidade = $_POST['id_modalidade'];
            $id_tipo = $_POST['id_tipo'];
            $id_processo = $_POST['id_processo'];
            $isUpdated = (new AudienciaClass())->alterar($id_audiencia, $data, $horario, $id_modalidade, $id_tipo, $id_processo);
            $_POST['acao'] = 'listar';
            AudienciaController::listar();
        } else {
            echo "Alteração de dados da vara inválido";
        }
    }

    public function excluir(){

        if(isset($_POST['id_audiencia'])){
            $id_audiencia = $_POST['id_audiencia'];
            $isDeleted = (new AudienciaClass())->deletar($id_audiencia);
            $_POST['acao'] = 'listar';
            AudienciaController::listar();
        } else {
            echo "Deleção de dados da vara inválido";
        }

    }

}