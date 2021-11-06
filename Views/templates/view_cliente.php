<?php
  require_once __DIR__."/../../config.php";
  require_once("../../Controllers/ClienteController.php");  

  if(!isset($_POST['acao'])) {
      $_POST['acao'] = 'listar';
      $acao = $_POST['acao'];
  }else{
      $acao = $_POST['acao'];
  }

  switch ($acao) {
    case 'listar':
      (new ClienteController)->listar();
      break;
    case 'inserir':
      (new ClienteController)->inserir();
      break;
    case 'alterar':
      (new ClienteController)->alterar();
      break;
    case 'excluir':
      (new ClienteController)->excluir();
      break;
  }
  //recebe a lista
  $clientes = $_POST["listar"];
  $conteudo = ' 
  <div class="col-10">
    <div class="conteudo-administrativo" >
      <div class = "row">
        <div class = "col-1">
          <button type="button" class="btn btn-primary btn-incluir" onclick="return incluir()">Incluir</button>
        </div> 
        <div class = "col-3">
          <input type="hidden" id="tipo" value="cnpj">
          <input type="text" name= "pesquisa" class="form-control procura-superior" placeholder="Digite o nº do CNPJ" id="pesquisaCnpj" maxlength="18" required>
        </div>        
        <div class = "col-6"> 
          <div id="alerts"></div>
        </div> 
 
      </div>
      <h3 class="text-center">Lista de Clientes</h3>
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Cliente</th>
            <th scope="col">CNPJ</th>
            <th scope="col"></th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
      ';

      foreach($clientes as $obj){
        $id_cliente = $obj->getId_cliente();
        $nome = $obj->getNome();
        $cnpj = $obj->getCnpj();
        $conteudo = $conteudo.
        '
        <tr>
          <th id="id_cliente'.$id_cliente.'" scope="row">'.$id_cliente.'</th>
          <td id="nome'.$id_cliente.'">'.$nome.'</td>
          <td id="cnpj'.$id_cliente.'">'.$cnpj.'</td>     
          <td><img src= "img/edite.png" onclick="alterar('.$id_cliente.')" class="botoes-listas"></td>                              
          <td><img src= "img/delete.png" onclick="excluir('.$id_cliente.')" class="botoes-listas"></td> 
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
  $conteudo = $conteudo.file_get_contents(SITE_ROOT.'/Views\templates\cliente.modal.html');
  echo $conteudo;
  ?>
