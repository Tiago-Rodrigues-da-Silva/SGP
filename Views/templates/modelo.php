<?php
  require_once __DIR__."/../../config.php";
  $pagina = $_GET['pagina'];
  $conteudo = "";
  $col_menu = 'col-2';
  $col_conteudo = 'col-10';
  if($pagina == 'login' || $pagina == 'principal' || $pagina == 'processo' || $pagina == 'audiencia'){
    $col_menu = "";
    $col_conteudo = 'col-12';
  }
?>


<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="css/header.css" rel="stylesheet">
    <link href="css/footer.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/geral.css" rel="stylesheet">    


    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="  crossorigin="anonymous"></script>
    <script src="http://jqueryvalidation.org/files/dist/jquery.validate.js"></script>
    

    <title>SGP - Sistema de Gerenciamento de Processos</title>
  </head>
  <body>

    <header>
      <div class="container">
        <div class="row">
          <div class="col-sm-8">
            Sistema Gerenciador de Processos
          </div>
          <div class="col-sm-3">
          </div>
          <div class="col-sm-1">
          <a href="../../index.php">Sair</a>
          </div>
        </div>
      </div>
    </header>

    <div id="navbar">
      <?php
        if($pagina!='login'){
          include 'geral.nav.html';
        }
      ?>
    </div>

    <main>
      <div class="container-fluid area-principal sombra">
        <div class = "row">
          <div class = <?php echo $col_menu;?> >
            <?php
              if ($pagina != 'login' && $pagina != 'principal' && $pagina != 'processo' && $pagina != 'audiencia') {
                include 'adm.menu.html';
              }                   
            ?>
          </div>
          <div class = <?php echo $col_conteudo;?> >
            <?php
              $nomeDoArquivo = 'view_'.$pagina.'.php';
              if (file_exists($nomeDoArquivo)) {
                include $nomeDoArquivo;
              }        
            ?>
          </div>
        </div> 
      </div>


      <div class="modais">
        <?php
          $nomeDoArquivo = $pagina.'.modal.html';
          if (file_exists($nomeDoArquivo)) {
            include $nomeDoArquivo;
          }                   
        ?>
      </div>

        
    </main>
    <footer class="fixed-bottom">
    </footer>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!-- <script src="js/pesquisa.js"></script> -->
    <script src="js/validacao.js"></script>
    <script src="js/msg_alerta.js"></script>

    <?php 
      if($pagina == "processo"){
        // include 'geraComboBox.php';
      }
    ?>
    
    <!-- Carrega o arquivo javascript de acordo com a página a ser exibida -->
    <?php
      $nomeDoArquivo = 'js/'.$pagina.'.js';
      if (file_exists($nomeDoArquivo)) {
        echo '<script type="text/javascript" src="'.$nomeDoArquivo.'"></script>';
      }                   
    ?>
  </body>
</html>