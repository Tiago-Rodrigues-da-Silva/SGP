<?php
class TipoAudienciaClass{
    private $id_tipo;
    private $tipo_audiencia;

  //getters e setters

  public function getId_tipo() {
    return $this->id_tipo;
  }

  public function setId_tipo($id_tipo) {
    $this->id_tipo= $id_tipo;
  }
  
  public function getTipo_audiencia() {
    return $this->tipo_audiencia;
  }

  public function setTipo_audiencia($tipo_audiencia) {
    $this->tipo_audiencia= $tipo_audiencia;
  }

  public function inserir($tipo) {
    try {
        require SITE_ROOT.'/conexao.php';

        $sql = "INSERT INTO tipos_audiencia (tipo_audiencia) VALUES (:tipo_audiencia)";
        $sql = $pdo->prepare($sql);
        $sql->bindParam(':tipo_audiencia', $tipo);
        $sql->execute();
        return $sql->rowCount();
    } 
    catch(PDOException $e) {
        return 'Error: ' . $e->getMessage();
    }

}
  
public function alterar($id_tipo, $tipo ) {
  try {
    require SITE_ROOT.'/conexao.php';

    $sql = "UPDATE tipos_audiencia SET tipo_audiencia=:tipo_audiencia WHERE id_tipo=:id_tipo";
    $sql = $pdo->prepare($sql);
    $sql->bindParam(':id_tipo', $id_tipo);
    $sql->bindParam(':tipo_audiencia', $tipo);
    $sql->execute();
    return true;
  } 
  catch(PDOException $e) {
    return 'Error: ' . $e->getMessage();
  }
}

 public function deletar($id_tipo) {
  try {
      require SITE_ROOT.'/conexao.php';

      $sql = $pdo->prepare("DELETE FROM tipos_audiencia WHERE id_tipo = :id_tipo");
      $sql->bindParam(':id_tipo', $id_tipo);
      $sql->execute();
      return true;
  } 
  catch(PDOException $e) {
      return 'Error: ' . $e->getMessage();
  }
}

 public function listAll() {

  require SITE_ROOT.'/conexao.php';
  $sql = "SELECT id_tipo, tipo_audiencia FROM tipos_audiencia";
  $sql = $pdo->prepare($sql);
  $sql->execute();


  while ($linha = $sql->fetch(PDO::FETCH_ASSOC))
  {    
    $tipo_audiencia = new TipoAudienciaClass();
    $tipo_audiencia->setId_tipo($linha['id_tipo']);
    $tipo_audiencia->settipo_audiencia($linha['tipo_audiencia']);
    $lista_tipos[] = $tipo_audiencia;
  }

  return $lista_tipos;
 }
 
}

?>