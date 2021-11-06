<?php
  require_once __DIR__."/../../config.php";
  require_once("../../Controllers/VaraController.php");  

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
      (new VaraController)->listar();
      break;
    case 'inserir':
      (new VaraController)->inserir();
      break;
    case 'alterar':
      (new VaraController)->alterar();
      break;
    case 'excluir':
      (new VaraController)->excluir();
      break;
  }
  //recebe a lista
  $varas = $_POST["listar"];
  $conteudo = ' 
  <div class="col-10">
    <div class="conteudo-administrativo" >
      <button type="button" class="btn btn-primary btn-incluir" onclick="incluir()">Incluir</button>
      <h3 class="text-center">Lista de Varas</h3>
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Varas</th>
            <th scope="col">Vara Abreviada</th>
            <th scope="col">TRT</th>
            <th scope="col"></th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
  ';

      foreach($varas as $obj){
        $id_vara = $obj->getId_vara();
        $nome_vara = $obj->getNome_vara();
        $nome_vara_abrev = $obj->getNome_vara_abrev();
        $trt = $obj->getTrt();

        $conteudo = $conteudo.
        '
        <tr>
          <th id="id_vara'.$id_vara.'" scope="row">'.$obj->getId_vara().'</th>
          <td id="nome_vara'.$id_vara.'">'.$obj->getNome_vara().'</td>
          <td id="nome_vara_abrev'.$id_vara.'">'.$obj->getNome_vara_abrev().'</td>
          <td id="trt'.$id_vara.'">'.$obj->getTrt().'</td>
          <td><img src= "img/edite.png" onclick="alterar('.$id_vara.')" class="botoes-listas"></td>                              
          <td><img src= "img/delete.png" onclick="excluir('.$id_vara.')" class="botoes-listas"></td> 
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
  ?>