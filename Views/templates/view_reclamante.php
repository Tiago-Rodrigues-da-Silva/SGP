<?php
  require_once __DIR__."/../../config.php";
  require_once("../../Controllers/ReclamanteController.php");  

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
      (new ReclamanteController)->listar();
      break;
    case 'inserir':
      (new ReclamanteController)->inserir();
      break;
    case 'alterar':
      (new ReclamanteController)->alterar();
      break;
    case 'excluir':
      (new ReclamanteController)->excluir();
      break;
  }
  //recebe a lista
  $reclamantes = $_POST["listar"];
  $conteudo = ' 
  <div class="col-10">
    <div class="conteudo-administrativo" >
      <div class = "row">
        <div class = "col-1">
          <button type="button" class="btn btn-primary btn-incluir" onclick="return incluir()">Incluir</button>
        </div> 
        <div class = "col-3">
          <input type="hidden" id="tipo" value="cpf">
          <input type="text" name= "pesquisa" class="form-control procura-superior" placeholder="Digite o nº do CPF" id="pesquisaCpf" maxlength="14" required>
        </div>        
        <div class = "col-6"> 
          <div id="alerts"></div>
        </div> 
 
      </div>
      <h3 class="text-center">Lista de Reclamantes</h3>
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Reclamante</th>
            <th scope="col">CPF</th>
            <th scope="col"></th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
      ';

      foreach($reclamantes as $obj){
        $id_reclamante = $obj->getId_reclamante();
        $nome = $obj->getNome();
        $cpf = $obj->getCpf();
        $conteudo = $conteudo.
        '
        <tr>
          <th id="id_reclamante'.$id_reclamante.'" scope="row">'.$id_reclamante.'</th>
          <td id="nome'.$id_reclamante.'">'.$nome.'</td>
          <td id="cpf'.$id_reclamante.'">'.$cpf.'</td> 
          <td><img src= "img/edite.png" onclick="alterar('.$id_reclamante.')" class="botoes-listas"></td>                              
          <td><img src= "img/delete.png" onclick="excluir('.$id_reclamante.')" class="botoes-listas"></td> 
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
  $conteudo = $conteudo.file_get_contents(SITE_ROOT.'/Views\templates\reclamante.modal.html');
  echo $conteudo;
  ?>
