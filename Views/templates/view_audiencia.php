<?php
  require_once __DIR__."/../../config.php";
  require_once("../../Controllers/AudienciaController.php");  

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
        (new AudienciaController)->listar();
        break;
      case 'inserir':
        (new AudienciaController)->inserir();
        break;
      case 'alterar':
        (new AudienciaController)->alterar();
        break;
      case 'excluir':
        (new AudienciaController)->excluir();
        break;
    }

  $audiencias = $_POST["listar"];

  $conteudo = ' 
  <div class="col-10">
    <div class="conteudo-audiencia" >
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
      <a href="../../Services/excel_audiencias.php"><img src="img/excel.png" class="icon-excel"></a>
    </div>

    </div>

      <h3 class="text-center">Agenda de Audiências</h3>
      <table class="table table-striped table-sm" id="tab-audiencias">
        <colgroup>
          <col style="width:6rem">
          <col style="width:4rem">
          <col style="width:6rem">
          <col style="width:6rem">
          <col style="">
          <col style="width:8rem">
          <col style="">
          <col style="width:9rem">
          <col style="width:6rem">
        </colgroup>  
        <thead>
          <tr>
            <th scope="col">Data</th>
            <th scope="col">Hora</th>
            <th scope="col">Modalidade</th>
            <th scope="col">Tipo</th>
            <th scope="col">Vara</th>  
            <th scope="col">Cliente</th>          
            <th scope="col">Processo</th>            
            <th scope="col">Reclamante</th>
            <th scope="col">Preposto</th>       
            <th scope="col"></th>
            <th scope="col"></th>
          </tr>

          <tr>
          <th scope="col">
            <input type="text" class="form-control form-control-sm mb-2" id="pesqData">
          </th>
          <th scope="col">
            <input type="text" class="form-control form-control-sm mb-2" id="pesqHora">
          </th>
          <th scope="col">
            <input type="text" class="form-control form-control-sm mb-2" id="pesqModalidade">
          </th>
          <th scope="col">
            <input type="text" class="form-control form-control-sm mb-2" id="pesqTipo">
          </th>
          <th scope="col">
            <input type="text" class="form-control form-control-sm mb-2" id="pesqVara">
          </th>
          <th scope="col">
            <input type="text" class="form-control form-control-sm mb-2" id="pesqCliente">
          </th>
          <th scope="col">
            <input type="text" class="form-control form-control-sm mb-2" id="pesqProcesso">
          </th>
          <th scope="col">
            <input type="text" class="form-control form-control-sm mb-2" id="pesqReclamante">
          </th>
          <th scope="col">
            <input type="text" class="form-control form-control-sm mb-2" id="pesqPreposto">
          </th>
          <th scope="col"></th>
          <th scope="col"></th>
        </tr>

        </thead>
        <tbody>
    ';




    foreach($audiencias as $obj){
      $id_audiencia = $obj->getId_audiencia();
      $data = $obj->getData();
      $horario = $obj->getHorario();
      $modalidade = $obj->getModalidade();
      $tipo = $obj->getTipo();
      $vara = $obj->getVara();
      $cliente = $obj->getCliente();
      $processo = $obj->getProcesso();
      $reclamante = $obj->getReclamante();
      $preposto = $obj->getPreposto();
  
      $conteudo = $conteudo.
      '
      <tr>
        <td id="data'.$id_audiencia.'">'.$data.'</td>
        <td id="horario'.$id_audiencia.'">'.$horario.'</td>
        <td id="modalidade'.$id_audiencia.'">'.$modalidade.'</td>
        <td id="tipo'.$id_audiencia.'">'.$tipo.'</td>
        <td id="vara'.$id_audiencia.'">'.$vara.'</td>
        <td id="cliente'.$id_audiencia.'">'.$cliente.'</td>
        <td id="processo'.$id_audiencia.'">'.$processo.'</td>
        <td id="reclamante'.$id_audiencia.'">'.$reclamante.'</td>
        <td id="preposto'.$id_audiencia.'">'.$preposto.'</td>
        <td><img src= "img/edite.png" onclick="alterar('.$id_audiencia.')" class="botoes-listas"></td>                              
        <td><img src= "img/delete.png" onclick="excluir('.$id_audiencia.')" class="botoes-listas"></td> 
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