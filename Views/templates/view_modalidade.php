<?php
  require_once __DIR__."/../../config.php";
  require_once("../../Controllers/ModalidadeAudienciaController.php");  

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
      (new ModalidadeAudienciaController)->listar();
      break;
    case 'inserir':
      (new ModalidadeAudienciaController)->inserir();
      break;
    case 'alterar':
      (new ModalidadeAudienciaController)->alterar();
      break;
    case 'excluir':
      (new ModalidadeAudienciaController)->excluir();
      break;
  }
  //recebe a lista
  $modalidades_audiencias = $_POST["listar"];
  $conteudo = ' 
  <div class="col-10">
    <div class="conteudo-administrativo" >
      <button type="button" class="btn btn-primary btn-incluir" onclick="incluir()">Incluir</button>
      <h3 class="text-center">Lista de Modalidades</h3>
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Modalidade da audiência</th>
            <th scope="col"></th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
  ';

      foreach($modalidades_audiencias as $obj){
        $id_modalidade = $obj->getId_modalidade();
        $modalidade = $obj->getModalidade_audiencia();
        $conteudo = $conteudo.
        '
        <tr>
          <th id="id_modalidade'.$id_modalidade.'" scope="row">'.$obj->getId_modalidade().'</th>
          <td id="modalidade'.$id_modalidade.'">'.$obj->getModalidade_audiencia().'</td> 
          <td><img src= "img/edite.png" onclick="alterar('.$id_modalidade.')" class="botoes-listas"></td>                              
          <td><img src= "img/delete.png" onclick="excluir('.$id_modalidade.')" class="botoes-listas"></td> 
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

  //Modais (incluir, alterar e excluir)
  $conteudo = $conteudo.file_get_contents(SITE_ROOT.'/Views\templates\modalidade.modal.html');
  echo $conteudo;
  ?>
