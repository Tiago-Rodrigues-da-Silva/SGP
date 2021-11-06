<?php
    require_once __DIR__."/../config.php";
    include_once SITE_ROOT.'/Models/ProcessoClass.php';

class ProcessoController {

    public function listar() {

        $processos = (new ProcessoClass())->listar();
        $_POST["listar"]=$processos;
            
    }

    public function inserir(){
        if(isset($_POST['numero_proc']) && isset($_POST['cliente']) && isset($_POST['reclamante'])){
            $numero_proc = $_POST['numero_proc'];
            $cliente = $_POST['cliente'];
            $reclamante = $_POST['reclamante'];
            $id_preposto = $_POST['id_preposto'];
            $id_vara = $_POST['id_vara'];
            $isInserted = (new ProcessoClass())->inserir($numero_proc, $cliente, $reclamante, $id_preposto, $id_vara);
            $_POST['acao'] = 'listar';
            ProcessoController::listar();
        } else {
            echo "Inserção de dados da vara inválido";
        }
    }

    public function alterar(){
        if(isset($_POST['numero_proc']) && isset($_POST['cliente']) && isset($_POST['reclamante'])){
            $id_processo = $_POST['id_processo'];
            $numero_proc = $_POST['numero_proc'];
            $cliente = $_POST['cliente'];
            $reclamante = $_POST['reclamante'];
            $id_preposto = $_POST['id_preposto'];
            $id_vara = $_POST['id_vara'];

            $isUpdated = (new ProcessoClass())->alterar($id_processo, $numero_proc, $cliente, $reclamante, $id_preposto, $id_vara);
            $_POST['acao'] = 'listar';
            ProcessoController::listar();
        } else {
            echo "Alteração de dados da vara inválido";
        }
    }

    public function excluir(){

        if(isset($_POST['id_processo'])){
            $id_processo = $_POST['id_processo'];
            $isDeleted = (new ProcessoClass())->deletar($id_processo);
            $_POST['acao'] = 'listar';
            ProcessoController::listar();
        } else {
            echo "Deleção de dados da vara inválido";
        }

    }

    public function procurarNumero(){
        if(isset($_POST['processo'])){
            $processo = $_POST['processo'];            
            return (new ProcessoClass())->procurarNumero($processo);
        } else {
            echo "Deleção de dados da vara inválido";
        }
    }

}