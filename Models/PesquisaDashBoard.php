    <?php
    header('Content-Type: application/json');
    require_once __DIR__."/../config.php";
    require SITE_ROOT.'/conexao.php';

    $tipoPesquisa = $_GET['tipoPesquisa'];

    if($tipoPesquisa == "arrayMeses"){
        $sql = "SELECT SQL_NO_CACHE YEAR(data) as ano, MONTH(data) as mes, COUNT(*) as total
        FROM audiencias
        GROUP BY DATE_FORMAT(data, '%Y%m')";
    
        $sql = $pdo->prepare($sql);
        $sql->execute();
    
        if($sql->rowCount() >=1){
            echo json_encode($sql->fetchALL(PDO::FETCH_ASSOC));
        } else {
            echo json_encode('false');
        }
    }

//contar processos

if($tipoPesquisa == "totalProcessos"){
    $sql = "SELECT COUNT(*) as totalProcessos
    FROM processos";

    $sql = $pdo->prepare($sql);
    $sql->execute();

    if($sql->rowCount() >=1){
        echo json_encode($sql->fetch(PDO::FETCH_ASSOC));
    } else {
        echo json_encode('false');
    }
}

//contar audiências
if($tipoPesquisa == "totalAudiencias"){
    $sql = "SELECT COUNT(*) as totalAudiencias
    FROM audiencias";

    $sql = $pdo->prepare($sql);
    $sql->execute();

    if($sql->rowCount() >=1){
        echo json_encode($sql->fetch(PDO::FETCH_ASSOC));
    } else {
        echo json_encode('false');
    }
}

//contar audiências três prepostos
