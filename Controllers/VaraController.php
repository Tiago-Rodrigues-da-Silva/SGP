<?php
    include_once '../../Models/VaraClass.php';
    include_once '../../Views/templates/view_vara.php';

class VaraController {

    public function listar() {

        $varas = (new VaraClass())->listar();
        $_POST["listar"]=$varas;
            
    }

    public function inserir(){
        if(isset($_POST['nome_vara']) && isset($_POST['nome_vara_abrev']) && isset($_POST['trt'])){
            $nome_vara = $_POST['nome_vara'];
            $nome_vara_abrev = $_POST['nome_vara_abrev'];
            $trt = $_POST['trt'];
            $isInserted = (new VaraClass())->inserir($nome_vara, $nome_vara_abrev, $trt);
            $_POST['acao'] = 'listar';
            VaraController::listar();
        } else {
            echo "Inserção de dados da vara inválido";
        }
    }

    public function alterar(){
        if(isset($_POST['nome_vara']) && isset($_POST['nome_vara_abrev']) && isset($_POST['trt'])){
            $id_vara = $_POST['id_vara'];
            $nome_vara = $_POST['nome_vara'];
            $nome_vara_abrev = $_POST['nome_vara_abrev'];
            $trt = $_POST['trt'];
            $isUpdated = (new VaraClass())->alterar($id_vara, $nome_vara, $nome_vara_abrev, $trt);
            $_POST['acao'] = 'listar';
            VaraController::listar();
        } else {
            echo "Alteração de dados da vara inválido";
        }
    }

    public function excluir(){

        if(isset($_POST['id_vara'])){
            $id_vara = $_POST['id_vara'];
            $isDeleted = (new VaraClass())->deletar($id_vara);
            $_POST['acao'] = 'listar';
            VaraController::listar();
        } else {
            echo "Deleção de dados da vara inválido";
        }

    }

}