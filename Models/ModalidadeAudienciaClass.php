<?php
  require_once __DIR__."/../config.php";


class ModalidadeAudienciaClass{
    private $id_modalidade;
    private $modalidade_audiencia;


  //getters e setters

  public function getId_modalidade() {
    return $this->id_modalidade;
  }

  public function setId_modalidade($id_modalidade) {
    $this->id_modalidade= $id_modalidade;
  }
  
  public function getModalidade_audiencia() {
    return $this->modalidade_audiencia;
  }

  public function setModalidade_audiencia($modalidade_audiencia) {
    $this->modalidade_audiencia= $modalidade_audiencia;
  }

  public function inserir($modalidade) {
    try {
        require SITE_ROOT.'/conexao.php';

        $sql = "INSERT INTO modalidades_audiencia (modalidade_audiencia) VALUES (:modalidade_audiencia)";
        $sql = $pdo->prepare($sql);
        $sql->bindParam(':modalidade_audiencia', $modalidade);
        $sql->execute();
        return $sql->rowCount();
    } 
    catch(PDOException $e) {
        return 'Error: ' . $e->getMessage();
    }

}
  
public function alterar($id_modalidade, $modalidade ) {
  try {
    require SITE_ROOT.'/conexao.php';

    $sql = "UPDATE modalidades_audiencia SET modalidade_audiencia=:modalidade_audiencia WHERE id_modalidade=:id_modalidade";
    $sql = $pdo->prepare($sql);
    $sql->bindParam(':id_modalidade', $id_modalidade);
    $sql->bindParam(':modalidade_audiencia', $modalidade);
    $sql->execute();
    return true;
  } 
  catch(PDOException $e) {
    return 'Error: ' . $e->getMessage();
  }
}

 public function deletar($id_modalidade) {
  try {
      require SITE_ROOT.'/conexao.php';

      $sql = $pdo->prepare("DELETE FROM modalidades_audiencia WHERE id_modalidade = :id_modalidade");
      $sql->bindParam(':id_modalidade', $id_modalidade);
      $sql->execute();
      return true;
  } 
  catch(PDOException $e) {
      return 'Error: ' . $e->getMessage();
  }
}

 public function listAll() {

  require SITE_ROOT.'/conexao.php';
  $sql = "SELECT id_modalidade, modalidade_audiencia FROM modalidades_audiencia";
  $sql = $pdo->prepare($sql);
  $sql->execute();


  while ($linha = $sql->fetch(PDO::FETCH_ASSOC))
  {    
    $modalidade_audiencia = new ModalidadeAudienciaClass();
    $modalidade_audiencia->setId_modalidade($linha['id_modalidade']);
    $modalidade_audiencia->setmodalidade_audiencia($linha['modalidade_audiencia']);
    $listaModalidades[] = $modalidade_audiencia;
  }

  return $listaModalidades;
 }

}

?>