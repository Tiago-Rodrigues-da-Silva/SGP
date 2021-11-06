<?php
class ReclamanteClass{
    private $id_reclamante;
    private $nome;
    private $cpf;

  public function inserir($nome, $cpf) {
    try {
        require SITE_ROOT.'/conexao.php';

        $sql = "INSERT INTO reclamantes (nome, cpf) VALUES (:nome, :cpf)";
        $sql = $pdo->prepare($sql);
        $sql->bindParam(':nome', $nome);
        $sql->bindParam(':cpf', $cpf);
        $sql->execute();
        return $sql->rowCount();
    } 
    catch(PDOException $e) {
        return 'Error: ' . $e->getMessage();
    }

}
  
public function alterar($id_reclamante, $nome, $cpf) {
  try {
    require SITE_ROOT.'/conexao.php';

    $sql = "UPDATE reclamantes SET nome=:nome, cpf=:cpf WHERE id_reclamante=:id_reclamante";
    $sql = $pdo->prepare($sql);
    $sql->bindParam(':id_reclamante', $id_reclamante);
    $sql->bindParam(':nome', $nome);
    $sql->bindParam(':cpf', $cpf);
    $sql->execute();
    return true;
  } 
  catch(PDOException $e) {
    return 'Error: ' . $e->getMessage();
  }
}

 public function deletar($id_reclamante) {
  try {
      require SITE_ROOT.'/conexao.php';

      $sql = $pdo->prepare("DELETE FROM reclamantes WHERE id_reclamante = :id_reclamante");
      $sql->bindParam(':id_reclamante', $id_reclamante);
      $sql->execute();
      return true;
  } 
  catch(PDOException $e) {
      return 'Error: ' . $e->getMessage();
  }
}

 public function listar() {

  require SITE_ROOT.'/conexao.php';
  $sql = "SELECT id_reclamante, nome, cpf FROM reclamantes";
  $sql = $pdo->prepare($sql);
  $sql->execute();


  while ($linha = $sql->fetch(PDO::FETCH_ASSOC))
  {    
    $reclamante = new ReclamanteClass();
    $reclamante->setId_reclamante($linha['id_reclamante']);
    $reclamante->setNome($linha['nome']);
    $reclamante->setCpf($linha['cpf']);
    $lista_reclamantes[] = $reclamante;
  }

  return $lista_reclamantes;
 }


    /**
     * Get the value of id_reclamante
     *
     * @return  mixed
     */
    public function getId_reclamante()
    {
        return $this->id_reclamante;
    }

    /**
     * Set the value of id_reclamante
     *
     * @param   mixed  $id_reclamante  
     *
     * @return  self
     */
    public function setId_reclamante($id_reclamante)
    {
        $this->id_reclamante = $id_reclamante;

        return $this;
    }

    /**
     * Get the value of nome
     *
     * @return  mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     *
     * @param   mixed  $nome  
     *
     * @return  self
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of cpf
     *
     * @return  mixed
     */
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * Set the value of cpf
     *
     * @param   mixed  $cpf  
     *
     * @return  self
     */
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;

        return $this;
    }
}


?>