<?php

//session_start();

$localhost = "localhost";
$user = "root";
$passw = "";
$banco = "test";

// $localhost = "localhost";
// $user = "u521616646_root";
// $passw = "Re237086!";
// $banco = "u521616646_bd_sgp";

global $pdo;

try {
    //PDO
    $pdo = new PDO("mysql:dbname=".$banco.";host=".$localhost, $user, $passw);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    //echo "ERRO: ".$e->get_message();
    throw new PDOException($e);
    exit;
}
?>