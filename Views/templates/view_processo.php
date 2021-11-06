<?php
  require_once __DIR__."/../../config.php";
  require_once("../../Controllers/ProcessoController.php");  

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
      (new ProcessoController)->listar();
      break;
    case 'inserir':
      (new ProcessoController)->inserir();
      break;
    case 'alterar':
      (new ProcessoController)->alterar();
      break;
    case 'excluir':
      (new ProcessoController)->excluir();
      break;
  }

  $processos = $_POST["listar"];

  $conteudo = '  <div class="col-10">
  <div class="conteudo-processo" >

    <div class = "row">
      <div class = "col-1">
        <button type="button" class="btn btn-primary btn-incluir" onclick="return incluir()">Incluir</button>
      </div> 
      <div class = "col-3">
        <input type="hidden" id="tipo" value="processo">
        <input type="text" class="form-control procura-superior" placeholder="Digite o nº do processo" id="pesquisaProcesso" maxlength="25">
      </div>        
      <div class = "col-6"> 
        <div id="alerts"></div>
      </div>  
      <div class = "col-1"> 
      </div>
      <div class = "col-1"> 
      <a href="../../Services/excel_processos.php"><img src="img/excel.png" class="icon-excel"></a>
    </div>
    </div>

    <h3 class="text-center">Lista de Processos</h3>

    <div id="listaProcessos">
    </div>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">Processo</th>
          <th scope="col">Cliente</th>
          <th scope="col">Reclamante</th>
          <th scope="col">Preposto</th>
          <th scope="col">Vara</th>
          <th scope="col"></th>
          <th scope="col"></th>
        </tr>
        <tr>
        <th scope="col">
          <input type="text" class="form-control form-control-sm mb-2" id="pesqProcesso">
        </th>
        <th scope="col">
          <input type="text" class="form-control form-control-sm mb-2" id="pesqCliente">
        </th>
        <th scope="col">
          <input type="text" class="form-control form-control-sm mb-2" id="pesqReclamante">
        </th>
        <th scope="col">
          <input type="text" class="form-control form-control-sm mb-2" id="pesqPreposto">
        </th>
        <th scope="col">
          <input type="text" class="form-control form-control-sm mb-2" id="pesqVara">
        </th>
        <th scope="col"></th>
        <th scope="col"></th>
      </tr>
      </thead>
      <tbody>
  ';

  foreach($processos as $obj){
    $id_processo = $obj->getId_processo();
    $numero_proc = $obj->getNumero_proc();
    $cliente = $obj->getId_cliente();
    $reclamante = $obj->getId_reclamante();
    $id_preposto = $obj->getId_preposto();
    $id_vara = $obj->getId_vara();

    $conteudo = $conteudo.
    '
    <tr>
      <td id="numero_proc'.$id_processo.'">'.$numero_proc.'</td>
      <td id="cliente'.$id_processo.'">'.$cliente.'</td>
      <td id="reclamante'.$id_processo.'">'.$reclamante.'</td>
      <td id="id_preposto'.$id_processo.'">'.$id_preposto.'</td>
      <td id="id_vara'.$id_processo.'">'.$id_vara.'</td>
      <td><img src= "img/edite.png" onclick="alterar('.$id_processo.')" class="botoes-listas"></td>                              
      <td><img src= "img/delete.png" onclick="excluir('.$id_processo.')" class="botoes-listas"></td> 
    </tr>
    ';
  }

  $conteudo = $conteudo.
  '
      </tbody>
    </table>
  </div>
  </div>
  ';
  echo $conteudo;

