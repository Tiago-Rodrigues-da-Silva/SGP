<?php
  require_once __DIR__."/../../config.php";
  require_once("../../Controllers/PrepostoController.php");  

  //verifica "acao", se null, é a primeira entrada, então seta "acao" para lista. Depois atribui à
  //variável $acao 
  if(!isset($_POST['acao'])) {
    $_POST['acao'] = 'listar';
    $acao = $_POST['acao'];
  }else{
    $acao = $_POST['acao'];
  }

  //view chama o controller para executar a acao
  switch ($acao) {
    case 'listar':
      (new PrepostoController)->listar();
      break;
    case 'inserir':
      (new PrepostoController)->inserir();
      break;
    case 'alterar':
      (new PrepostoController)->alterar();
      break;
    case 'excluir':
      (new PrepostoController)->excluir();
      break;
  }

  $prepostos = $_POST["listar"];

  $conteudo = '  
  <div class="col-10">
    <div class="conteudo-administrativo" >

      <div class = "row">
        <div class = "col-1">
          <button type="button" class="btn btn-primary btn-incluir" onclick="return incluir()">Incluir</button>
        </div> 
        <div class = "col-3">
          <input type="hidden" id="tipo" value="cpf">
          <input type="text" class="form-control procura-superior" placeholder="Digite o nº do cpf" id="pesquisaCpf" maxlength="14">
        </div>        
        <div class = "col-5"> 
          <div id="alerts"></div>
        </div>  
      </div>

      <h3 class="text-center">Lista de Prepostos</h3>
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">CPF</th>
            <th scope="col"></th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
      ';

      foreach($prepostos as $obj){
        $id_preposto = $obj->getId_preposto();
        $nome = $obj->getNome();
        $cpf = $obj->getCpf();

        $conteudo = $conteudo.
      '
      <tr>
        <th id="id_preposto'.$id_preposto.'" scope="row">'.$id_preposto.'</th>
        <td id="nome'.$id_preposto.'">'.$nome.'</td>
        <td id="cpf'.$id_preposto.'">'.$cpf.'</td>
        <td><img src= "img/edite.png" onclick="alterar('.$id_preposto.')" class="botoes-listas"></td>                              
        <td><img src= "img/delete.png" onclick="excluir('.$id_preposto.')" class="botoes-listas"></td> 
      </tr>
      ';
      }

      $conteudo = $conteudo.'
        </tbody>
      </table>
    </div>
  </div>
  ';
  echo $conteudo;

