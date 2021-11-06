<?php
  require_once __DIR__."/../../config.php";
  require_once("../../Models/ClienteClass.php"); 
  require_once("../../Models/ReclamanteClass.php");
  require_once("../../Models/PrepostoClass.php"); 
  require_once("../../Models/VaraClass.php"); 


  $pagina = $_GET['pagina'];  
  

//busca clientes
$listaIdsClientes[] = null;
$listaClientes[] = null;
array_pop($listaIdsClientes);
array_pop($listaClientes);

$lista = (new ClienteClass())->listar();

foreach ($lista as $obj) {
array_push($listaIdsClientes, $obj->getId_cliente());
array_push($listaClientes, $obj->getNome());
} 

asort($listaIdsClientes);
asort($listaClientes);

//busca reclamante
$listaIdsReclamantes[] = null;
$listaReclamantes[] = null;
array_pop($listaIdsReclamantes);
array_pop($listaReclamantes);
$lista = (new ReclamanteClass())->listar();

foreach ($lista as $obj) {
array_push($listaIdsReclamantes, $obj->getId_reclamante());
array_push($listaReclamantes, $obj->getNome());
} 

asort($listaIdsReclamantes);
asort($listaReclamantes);

//busca prepostos
$listaIdsPrepostos[] = null;
$listaPrepostos[] = null;
array_pop($listaIdsPrepostos);
array_pop($listaPrepostos);
$lista = (new PrepostoClass())->listar();


foreach ($lista as $obj) {
array_push($listaIdsPrepostos, $obj->getId_preposto());
array_push($listaPrepostos, $obj->getNome());
} 

asort($listaIdsPrepostos);
asort($listaPrepostos);

//busca varas
$listaIdsVaras[] = null;
$listaVaras[] = null;
array_pop($listaIdsVaras);
array_pop($listaVaras);
$lista = (new VaraClass())->listar();

foreach ($lista as $obj) {
array_push($listaIdsVaras, $obj->getId_vara());
array_push($listaVaras, $obj->getNome_vara());
} 

asort($listaIdsVaras);
asort($listaVaras);

?>


<script type='text/javascript'>
    <?php

        $js_idClientes = json_encode($listaIdsClientes);
        $js_clientes = json_encode($listaClientes);
        echo "var js_idClientes = ". $js_idClientes . ";\n";
        echo "var js_clientes = ". $js_clientes . ";\n";

        $js_idReclamantes = json_encode($listaIdsReclamantes);
        $js_reclamantes = json_encode($listaReclamantes);
        echo "var js_idReclamantes = ". $js_idReclamantes . ";\n";
        echo "var js_reclamantes = ". $js_reclamantes . ";\n";

        $js_idPrepostos = json_encode($listaIdsPrepostos);
        $js_prepostos = json_encode($listaPrepostos);
        echo "var js_idPrepostos = ". $js_idPrepostos . ";\n";
        echo "var js_prepostos = ". $js_prepostos . ";\n";

        $js_idVaras = json_encode($listaIdsVaras);
        $js_varas = json_encode($listaVaras);
        echo "var js_idVaras = ". $js_idVaras . ";\n";
        echo "var js_varas = ". $js_varas . ";\n";


    ?>

    var selectCliente = document.getElementById("modal-cliente-inclui");
    var selectReclamante = document.getElementById("modal-reclamante-inclui");
    var selectPreposto = document.getElementById("modal-id_preposto-inclui");
    var selectVara = document.getElementById("modal-id_vara-inclui"); 

    for(var i = 0; i < js_idClientes.length; i++) {
        var opt = js_idClientes[i];
        var texto = js_clientes[i];
        var el = document.createElement("option");
        el.textContent = texto;
        el.value = opt;
    
        selectCliente.appendChild(el);
    }

    for(var i = 0; i < js_idReclamantes.length; i++) {
        var opt = js_idReclamantes[i];
        var texto = js_reclamantes[i];
        var el = document.createElement("option");
        el.textContent = texto;
        el.value = opt;
    
        selectReclamante.appendChild(el);
    }

    for(var i = 0; i < js_idPrepostos.length; i++) {
        var opt = js_idPrepostos[i];
        var texto = js_prepostos[i];
        var el = document.createElement("option");
        el.textContent = texto;
        el.value = opt;
    
        selectPreposto.appendChild(el);
    }

    for(var i = 0; i < js_idVaras.length; i++) {
        var opt = js_idVaras[i];
        var texto = js_varas[i];
        var el = document.createElement("option");
        el.textContent = texto;
        el.value = opt;
    
        selectVara.appendChild(el);
    }


    var selectCliente = document.getElementById("modal-cliente-altera");
    var selectReclamante = document.getElementById("modal-reclamante-altera");
    var selectPreposto = document.getElementById("modal-id_preposto-altera");
    var selectVara = document.getElementById("modal-id_vara-altera"); 

    for(var i = 0; i < js_idClientes.length; i++) {
        var opt = js_idClientes[i];
        var texto = js_clientes[i];
        var el = document.createElement("option");
        el.textContent = texto;
        el.value = opt;
    
        selectCliente.appendChild(el);
    }

    for(var i = 0; i < js_idReclamantes.length; i++) {
        var opt = js_idReclamantes[i];
        var texto = js_reclamantes[i];
        var el = document.createElement("option");
        el.textContent = texto;
        el.value = opt;
    
        selectReclamante.appendChild(el);
    }

    for(var i = 0; i < js_idPrepostos.length; i++) {
        var opt = js_idPrepostos[i];
        var texto = js_prepostos[i];
        var el = document.createElement("option");
        el.textContent = texto;
        el.value = opt;
    
        selectPreposto.appendChild(el);
    }

    for(var i = 0; i < js_idVaras.length; i++) {
        var opt = js_idVaras[i];
        var texto = js_varas[i];
        var el = document.createElement("option");
        el.textContent = texto;
        el.value = opt;
    
        selectVara.appendChild(el);
    }

</script>