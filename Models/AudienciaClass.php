<?php
class AudienciaClass{
    private $id_audiencia;
    private $data;
    private $horario;
    private $id_modalidade;
    private $id_tipo;
    private $id_processo;

  public function inserir($data, $horario, $id_modalidade, $id_tipo, $id_processo) {
    try {
        require SITE_ROOT.'/conexao.php';

        $sql = "INSERT INTO audiencias(data, horario, id_modalidade, id_tipo, id_processo) VALUES (:data, :horario, :id_modalidade, :id_tipo, :id_processo)";
        $sql = $pdo->prepare($sql);
        $sql->bindParam(':data', $data);
        $sql->bindParam(':horario', $horario);
        $sql->bindParam(':id_modalidade', $id_modalidade);
        $sql->bindParam(':id_tipo', $id_tipo);
        $sql->bindParam(':id_processo', $id_processo);
        $sql->execute();
        return $sql->rowCount();
    } 
    catch(PDOException $e) {
        return 'Error: ' . $e->getMessage();
    }

}
  
public function alterar($id_audiencia, $data, $horario, $id_modalidade, $id_tipo, $id_processo) {
  try {
    require SITE_ROOT.'/conexao.php';

    $sql = "UPDATE audiencias SET data=:data, 
                                horario=:horario, 
                                id_modalidade=:id_modalidade,
                                id_tipo=:id_tipo,
                                id_processo=:id_processo 
                                WHERE id_audiencia=:id_audiencia";
    $sql = $pdo->prepare($sql);

    $sql->bindParam(':id_audiencia', $id_audiencia);
    $sql->bindParam(':data', $data);
    $sql->bindParam(':horario', $horario);
    $sql->bindParam(':id_modalidade', $id_modalidade);
    $sql->bindParam(':id_tipo', $id_tipo);
    $sql->bindParam(':id_processo', $id_processo);
    $sql->execute();
    return true;
  } 
  catch(PDOException $e) {
    return 'Error: ' . $e->getMessage();
  }
}

 public function deletar($id_audiencia) {
  try {
      require SITE_ROOT.'/conexao.php';

      $sql = $pdo->prepare("DELETE FROM audiencias WHERE id_audiencia = :id_audiencia");
      $sql->bindParam(':id_audiencia', $id_audiencia);
      $sql->execute();
      return true;
  } 
  catch(PDOException $e) {
      return 'Error: ' . $e->getMessage();
  }
}

 public function listar() {

  require SITE_ROOT.'/conexao.php';
  $sql = "SELECT id_audiencia, data, horario, id_modalidade, id_tipo, id_processo FROM audiencias";
  $sql = $pdo->prepare($sql);
  $sql->execute();


  while ($linha = $sql->fetch(PDO::FETCH_ASSOC))
  {    
    $audiencia = new AudienciaClass();
    $audiencia->setId_audiencia($linha['id_audiencia']);
    $audiencia->setData($linha['data']);
    $audiencia->setHorario($linha['horario']);
    $audiencia->setId_modalidade($linha['id_modalidade']);
    $audiencia->setId_tipo($linha['id_tipo']);
    $audiencia->setId_processo($linha['id_processo']);
    $lista_audiencias[] = $audiencia;
  }

  return $lista_audiencias;
 }
 
  //getters e setters

    

    /**
     * Get the value of id_audiencia
     *
     * @return  mixed
     */
    public function getId_audiencia()
    {
        return $this->id_audiencia;
    }

    /**
     * Set the value of id_audiencia
     *
     * @param   mixed  $id_audiencia  
     *
     * @return  self
     */
    public function setId_audiencia($id_audiencia)
    {
        $this->id_audiencia = $id_audiencia;

        return $this;
    }

    /**
     * Get the value of data
     *
     * @return  mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set the value of data
     *
     * @param   mixed  $data  
     *
     * @return  self
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Get the value of horario
     *
     * @return  mixed
     */
    public function getHorario()
    {
        return $this->horario;
    }

    /**
     * Set the value of horario
     *
     * @param   mixed  $horario  
     *
     * @return  self
     */
    public function setHorario($horario)
    {
        $this->horario = $horario;

        return $this;
    }

    /**
     * Get the value of id_modalidade
     *
     * @return  mixed
     */
    public function getId_modalidade()
    {
        return $this->id_modalidade;
    }

    /**
     * Set the value of id_modalidade
     *
     * @param   mixed  $id_modalidade  
     *
     * @return  self
     */
    public function setId_modalidade($id_modalidade)
    {
        $this->id_modalidade = $id_modalidade;

        return $this;
    }

    /**
     * Get the value of id_tipo
     *
     * @return  mixed
     */
    public function getId_tipo()
    {
        return $this->id_tipo;
    }

    /**
     * Set the value of id_tipo
     *
     * @param   mixed  $id_tipo  
     *
     * @return  self
     */
    public function setId_tipo($id_tipo)
    {
        $this->id_tipo = $id_tipo;

        return $this;
    }

    /**
     * Get the value of id_processo
     *
     * @return  mixed
     */
    public function getId_processo()
    {
        return $this->id_processo;
    }

    /**
     * Set the value of id_processo
     *
     * @param   mixed  $id_processo  
     *
     * @return  self
     */
    public function setId_processo($id_processo)
    {
        $this->id_processo = $id_processo;

        return $this;
    }
}

?>