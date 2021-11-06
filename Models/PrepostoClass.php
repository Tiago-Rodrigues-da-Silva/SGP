<?php
require_once __DIR__."/../config.php";


class PrepostoClass{
    private $id_preposto;
    private $nome;
    private $cpf;
 
  public function inserir($nome, $cpf) {
    try {
      require SITE_ROOT.'/conexao.php';

      $sql = "INSERT INTO prepostos(nome, cpf) 
            VALUES (:nome, :cpf)";
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

  public function alterar($id_preposto, $nome, $cpf) {
    try {
      require SITE_ROOT.'/conexao.php';
  
      $sql = "UPDATE prepostos SET nome=:nome, 
                                  cpf=:cpf
                                  WHERE id_preposto=:id_preposto";
      $sql = $pdo->prepare($sql);
  
      $sql->bindParam(':id_preposto', $id_preposto);
      $sql->bindParam(':nome', $nome);
      $sql->bindParam(':cpf', $cpf);
      $sql->execute();
      return true;
    } 
    catch(PDOException $e) {
      return 'Error: ' . $e->getMessage();
    }
  }

  public function deletar($id_preposto) {
    try {
        require SITE_ROOT.'/conexao.php';
  
        $sql = $pdo->prepare("DELETE FROM prepostos WHERE id_preposto = :id_preposto");
        $sql->bindParam(':id_preposto', $id_preposto);
        $sql->execute();
        return true;
    } 
    catch(PDOException $e) {
        return 'Error: ' . $e->getMessage();
    }
  }

 public function listar() {

  require SITE_ROOT.'/conexao.php';
  $sql = "SELECT id_preposto, nome, cpf FROM prepostos";
  $sql = $pdo->prepare($sql);
  $sql->execute();


  while ($linha = $sql->fetch(PDO::FETCH_ASSOC))
  {    
    $preposto = new PrepostoClass();
    $preposto->setId_preposto($linha['id_preposto']);
    $preposto->setNome($linha['nome']);
    $preposto->setCpf($linha['cpf']);
    $listaPrepostos[] = $preposto;
  }

  return $listaPrepostos;
 }


    /**
     * Get the value of id_preposto
     *
     * @return  mixed
     */
    public function getId_preposto()
    {
        return $this->id_preposto;
    }

    /**
     * Set the value of id_preposto
     *
     * @param   mixed  $id_preposto  
     *
     * @return  self
     */
    public function setId_preposto($id_preposto)
    {
        $this->id_preposto = $id_preposto;

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