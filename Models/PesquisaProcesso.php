    <?php
    header('Content-Type: application/json');
    require_once __DIR__."/../config.php";
    require SITE_ROOT.'/conexao.php';

    $pesquisarPHP = $_GET['pesquisaPHP'];
    $tipoPesquisa = $_GET['tipoPesquisa'];

    if($tipoPesquisa == 'inclui'){
        $sql = "SELECT P.id_processo, V.nome_vara_abrev AS vara, P.numero_proc AS numero, C.nome AS cliente, R.nome AS reclamante, PR.nome as preposto
        FROM processos P, varas V, clientes C, reclamantes R, prepostos PR
        WHERE P.id_vara = V.id_vara AND P.id_cliente = C.id_cliente AND P.id_reclamante = R.id_reclamante AND P.id_preposto = PR.id_preposto AND P.numero_proc = '$pesquisarPHP'";

    } else{
        $sql = "SELECT P.id_processo, V.nome_vara_abrev AS vara, V.id_vara, P.numero_proc AS numero, C.nome AS cliente, C.id_cliente, R.nome AS reclamante, R.id_reclamante, PR.nome as preposto, PR.id_preposto
        FROM processos P, varas V, clientes C, reclamantes R, prepostos PR
        WHERE P.id_vara = V.id_vara AND P.id_cliente = C.id_cliente AND P.id_reclamante = R.id_reclamante AND P.id_preposto = PR.id_preposto AND P.id_processo = '$pesquisarPHP'";
    }

    $sql = $pdo->prepare($sql);
    $sql->execute();

    if($sql->rowCount() >=1){
        echo json_encode($sql->fetch(PDO::FETCH_ASSOC));
    } else {
        echo json_encode('false');
    }



