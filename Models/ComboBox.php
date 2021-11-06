<?php
    header('Content-Type: application/json');
    require_once __DIR__."/../config.php";
    require SITE_ROOT.'/conexao.php';

    $tabela = $_GET['tabela'];

    $sql = "SELECT * FROM $tabela";
    $sql = $pdo->prepare($sql);
    $sql->execute();
    
    if($sql->rowCount() >=1){
        echo json_encode($sql->fetchAll(PDO::FETCH_ASSOC));
    } else {
        echo json_encode('false');
    }
    