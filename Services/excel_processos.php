<?php

require_once __DIR__."/../config.php";
require_once("../Controllers/ProcessoController.php");  

(new ProcessoController)->listar();
$processos = $_POST["listar"];

$html = "
<table width='90%' border='1'>
    <thead>
        <tr>
            <th scope='col'>Processo</th>
            <th scope='col'>Cliente</th>
            <th scope='col'>Reclamante</th>
            <th scope='col'>Preposto</th>
            <th scope='col'>Vara</th>
        </tr>
    </thead>
    <tbody>
    ";
    
    foreach($processos as $obj){
        $id_processo = $obj->getId_processo();
        $numero_proc = $obj->getNumero_proc();
        $cliente = $obj->getId_cliente();
        $reclamante = $obj->getId_reclamante();
        $id_preposto = $obj->getId_preposto();
        $id_vara = $obj->getId_vara();
        
        $html = $html.
        '
        <tr>
          <td id="numero_proc'.$id_processo.'">'.$numero_proc.'</td>
          <td id="cliente'.$id_processo.'">'.$cliente.'</td>
          <td id="reclamante'.$id_processo.'">'.$reclamante.'</td>
          <td id="id_preposto'.$id_processo.'">'.$id_preposto.'</td>
          <td id="id_vara'.$id_processo.'">'.$id_vara.'</td>
        </tr>
        ';
        }
    
    $html = $html."
    </tbody>

</table>
";

?>

<?php
   // Determina que o arquivo é uma planilha do Excel
   header("Content-type: application/vnd.ms-excel");   

   // Força o download do arquivo
   header("Content-type: application/force-download");  

   // Seta o nome do arquivo
   header("Content-Disposition: attachment; filename=file.xls");

   header("Pragma: no-cache");

   // Imprime o conteúdo da nossa tabela no arquivo que será gerado
   echo $html;
?>