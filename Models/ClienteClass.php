<?php
class ClienteClass{
    private $id_cliente;
    private $nome;
    private $cnpj;

  public function inserir($nome, $cnpj) {
    try {
        require SITE_ROOT.'/conexao.php';

        $sql = "INSERT INTO clientes (nome, cnpj) VALUES (:nome, :cnpj)";
        $sql = $pdo->prepare($sql);
        $sql->bindParam(':nome', $nome);
        $sql->bindParam(':cnpj', $cnpj);
        $sql->execute();
        return $sql->rowCount();
    } 
    catch(PDOException $e) {
        return 'Error: ' . $e->getMessage();
    }

}
  
public function alterar($id_cliente, $nome, $cnpj) {
  try {
    require SITE_ROOT.'/conexao.php';

    $sql = "UPDATE clientes SET nome=:nome, cnpj=:cnpj WHERE id_cliente=:id_cliente";
    $sql = $pdo->prepare($sql);
    $sql->bindParam(':id_cliente', $id_cliente);
    $sql->bindParam(':nome', $nome);
    $sql->bindParam(':cnpj', $cnpj);
    $sql->execute();
    return true;
  } 
  catch(PDOException $e) {
    return 'Error: ' . $e->getMessage();
  }
}

 public function deletar($id_cliente) {
  try {
      require SITE_ROOT.'/conexao.php';

      $sql = $pdo->prepare("DELETE FROM clientes WHERE id_cliente = :id_cliente");
      $sql->bindParam(':id_cliente', $id_cliente);
      $sql->execute();
      return true;
  } 
  catch(PDOException $e) {
      return 'Error: ' . $e->getMessage();
  }
}

 public function listar() {

  require SITE_ROOT.'/conexao.php';
  $sql = "SELECT id_cliente, nome, cnpj FROM clientes";
  $sql = $pdo->prepare($sql);
  $sql->execute();


  while ($linha = $sql->fetch(PDO::FETCH_ASSOC))
  {    
    $cliente = new ClienteClass();
    $cliente->setId_cliente($linha['id_cliente']);
    $cliente->setNome($linha['nome']);
    $cliente->setCnpj($linha['cnpj']);
    $lista_clientes[] = $cliente;
  }

  return $lista_clientes;
 }


    /**
     * Get the value of id_cliente
     *
     * @return  mixed
     */
    public function getId_cliente()
    {
        return $this->id_cliente;
    }

    /**
     * Set the value of id_cliente
     *
     * @param   mixed  $id_cliente  
     *
     * @return  self
     */
    public function setId_cliente($id_cliente)
    {
        $this->id_cliente = $id_cliente;

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
     * Get the value of cnpj
     *
     * @return  mixed
     */
    public function getCnpj()
    {
        return $this->cnpj;
    }

    /**
     * Set the value of cnpj
     *
     * @param   mixed  $cnpj  
     *
     * @return  self
     */
    public function setCnpj($cnpj)
    {
        $this->cnpj = $cnpj;

        return $this;
    }
}


?>