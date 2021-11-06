    <?php
    header('Content-Type: application/json');
    require_once __DIR__."/../config.php";
    require SITE_ROOT.'/conexao.php';

    $pesquisarPHP = $_GET['pesquisaPHP'];

    $sql = "SELECT A.id_audiencia, A.data, A.horario, MA.id_modalidade, T.id_tipo, V.nome_vara_abrev as vara, C.nome as cliente, P.numero_proc as processo, R.nome as reclamante, PR.nome as preposto, A.id_processo
    FROM audiencias A, modalidades_audiencia MA, tipos_audiencia T, varas V, clientes C, processos P, reclamantes R, prepostos PR
    WHERE A.id_modalidade = MA.id_modalidade AND A.id_tipo = T.id_tipo AND P.id_vara = V.id_vara AND P.id_cliente = C.id_cliente AND P.id_reclamante = R.id_reclamante AND P.id_preposto = PR.id_preposto AND A.id_processo = P.id_processo AND A.id_audiencia = $pesquisarPHP";
    $sql = $pdo->prepare($sql);
    $sql->execute();
    
    if($sql->rowCount() >=1){
        echo json_encode($sql->fetch(PDO::FETCH_ASSOC));
    } else {
        echo json_encode('false');
    }
    






