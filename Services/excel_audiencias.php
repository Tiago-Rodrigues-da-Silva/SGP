<?php

require_once __DIR__."/../config.php";
require_once("../Controllers/AudienciaController.php");  

(new AudienciaController)->listar();
$audiencias = $_POST["listar"];

$html = "
<table width='90%' border='1'>
    <thead>
        <tr>
        <th scope='col'>Data</th>
        <th scope='col'>Hora</th>
        <th scope='col'>Modalidade</th>
        <th scope='col'>Tipo</th>
        <th scope='col'>Vara</th>  
        <th scope='col'>Cliente</th>          
        <th scope='col'>Processo</th>            
        <th scope='col'>Reclamante</th>
        <th scope='col'>Preposto</th> 
        </tr>
    </thead>
    <tbody>
    ";
    
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
        
        $html = $html.
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