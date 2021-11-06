<?php
  require_once __DIR__."/../config.php";

class VaraClass{
    private $id_vara;
    private $nome_vara;
    private $nome_vara_abrev;
    private $trt;


  //getters e setters

  public function getId_vara() {
    return $this->id_vara;
  }

  public function setId_vara($id_vara) {
    $this->id_vara= $id_vara;
  }
  
  public function getNome_vara() {
    return $this->nome_vara;
  }

  public function setNome_vara($nome_vara) {
    $this->nome_vara= $nome_vara;
  }

  public function getNome_vara_abrev() {
    return $this->nome_vara_abrev;
  }

  public function setNome_vara_abrev($nome_vara_abrev) {
    $this->nome_vara_abrev= $nome_vara_abrev;
  }

  public function getTrt() {
    return $this->trt;
  }

  public function setTrt($trt) {
    $this->trt= $trt;
  }
  
public function inserir($nome_vara, $nome_vara_abrev, $trt) {
    try {
        require SITE_ROOT.'/conexao.php';


        $sql = "INSERT INTO varas (nome_vara, nome_vara_abrev, trt)
        VALUES (:nome_vara, :nome_vara_abrev, :trt)";
        $sql = $pdo->prepare($sql);

        $sql->bindParam(':nome_vara', $nome_vara);
        $sql->bindParam(':nome_vara_abrev', $nome_vara_abrev);
        $sql->bindParam(':trt', $trt);

        $sql->execute();

        return $sql->rowCount();
    } 
    catch(PDOException $e) {
        return 'Error: ' . $e->getMessage();
    }

}

public function alterar($id_vara, $nome_vara, $nome_vara_abrev, $trt) {
    try {
        require SITE_ROOT.'/conexao.php';

        $sql = "UPDATE varas SET nome_vara=:nome_vara, 
                nome_vara_abrev=:nome_vara_abrev, 
                trt=:trt 
                WHERE id_vara=:id_vara";
        $sql = $pdo->prepare($sql);

        $sql->bindParam(':nome_vara', $nome_vara);
        $sql->bindParam(':nome_vara_abrev', $nome_vara_abrev);
        $sql->bindParam(':trt', $trt);
        $sql->bindParam(':id_vara', $id_vara);

        $sql->execute();

        return true;
    } 
    catch(PDOException $e) {
        return 'Error: ' . $e->getMessage();
    }
}

public function deletar($id_vara) {
    try {
        require SITE_ROOT.'/conexao.php';

        $sql = $pdo->prepare("DELETE FROM varas WHERE id_vara = :id_vara");
        $sql->bindParam(':id_vara', $id_vara);
        $sql->execute();

        echo "excluído".$id_vara;

        return true;
    } 
    catch(PDOException $e) {
        return 'Error: ' . $e->getMessage();
    }
}

 public function listar() {

  require SITE_ROOT.'/conexao.php';
  $sql = "SELECT id_vara, nome_vara, nome_vara_abrev, trt FROM varas";
  $sql = $pdo->prepare($sql);
  $sql->execute();


  while ($linha = $sql->fetch(PDO::FETCH_ASSOC))
  {    
    $nome_vara = new VaraClass();
    $nome_vara->setId_vara($linha['id_vara']);
    $nome_vara->setNome_vara($linha['nome_vara']);
    $nome_vara->setNome_vara_abrev($linha['nome_vara_abrev']);
    $nome_vara->setTrt($linha['trt']);
    $listaVaras[] = $nome_vara;
  }

  return $listaVaras;
 }

}

?>