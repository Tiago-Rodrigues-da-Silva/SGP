<?php
    require_once __DIR__."/../config.php";
    include_once SITE_ROOT.'/Models/ClienteClass.php';

class ClienteController {
	
    public function listar() {

        $clientes = (new ClienteClass())->listar();
        $_POST["listar"] = $clientes;

}

public function inserir(){
    if(isset($_POST['cnpj'])){
        $nome = $_POST['nome'];
        $cnpj = $_POST['cnpj'];
        $isInserted = (new ClienteClass())->inserir($nome, $cnpj);
        $_POST['acao'] = 'listar';
        $_POST['confirma'] = true;
    } else {
        echo "Inserção de dados inválida";
    }
    ClienteController::listar();
}

public function alterar(){
    if(isset($_POST['id_cliente'])){
        $id_cliente = $_POST['id_cliente'];
        $nome = $_POST['nome'];
        $cnpj = $_POST['cnpj'];
        $isUpdated = (new ClienteClass())->alterar($id_cliente, $nome, $cnpj);
        $_POST['acao'] = 'listar';
        ClienteController::listar();
    } else {
        echo "Alteração de dados da pessoa inválido";
    }
}

public function excluir(){

    if(isset($_POST['id_cliente'])){
        $id_cliente = $_POST['id_cliente'];
        $isDeleted = (new ClienteClass())->deletar($id_cliente);
        $_POST['acao'] = 'listar';
        ClienteController::listar();
    } else {
        echo "Deleção de dados da pessoa inválido";
    }

}
}