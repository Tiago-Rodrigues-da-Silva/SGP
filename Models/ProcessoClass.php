<?php
class ProcessoClass{
    private $id_processo;
    private $numero_proc;
    private $id_cliente;
    private $id_reclamante;
    private $id_preposto;
    private $id_vara;

  public function inserir($numero_proc, $id_cliente, $id_reclamante, $id_preposto, $id_vara) {
    try {
        require SITE_ROOT.'/conexao.php';

        $sql = "INSERT INTO processos (numero_proc, id_cliente, id_reclamante, id_preposto, id_vara) VALUES (:numero_proc, :id_cliente, :id_reclamante, :id_preposto, :id_vara)";
        $sql = $pdo->prepare($sql);
        $sql->bindParam(':numero_proc', $numero_proc);
        $sql->bindParam(':id_cliente', $id_cliente);
        $sql->bindParam(':id_reclamante', $id_reclamante);
        $sql->bindParam(':id_preposto', $id_preposto);
        $sql->bindParam(':id_vara', $id_vara);
        $sql->execute();
        return $sql->rowCount();
    } 
    catch(PDOException $e) {
        return 'Error: ' . $e->getMessage();
    }

}
  
public function alterar($id_processo, $numero_proc, $id_cliente, $id_reclamante, $id_preposto, $id_vara) {
  try {
    require SITE_ROOT.'/conexao.php';

    $sql = "UPDATE processos SET numero_proc=:numero_proc, 
                                id_cliente=:id_cliente, 
                                id_reclamante=:id_reclamante,
                                id_preposto=:id_preposto,
                                id_vara=:id_vara 
                                WHERE id_processo=:id_processo";
    $sql = $pdo->prepare($sql);

    $sql->bindParam(':id_processo', $id_processo);
    $sql->bindParam(':numero_proc', $numero_proc);
    $sql->bindParam(':id_cliente', $id_cliente);
    $sql->bindParam(':id_reclamante', $id_reclamante);
    $sql->bindParam(':id_preposto', $id_preposto);
    $sql->bindParam(':id_vara', $id_vara);
    $sql->execute();
    return true;
  } 
  catch(PDOException $e) {
    return 'Error: ' . $e->getMessage();
  }
}

 public function deletar($id_processo) {
  try {
      require SITE_ROOT.'/conexao.php';

      $sql = $pdo->prepare("DELETE FROM processos WHERE id_processo = :id_processo");
      $sql->bindParam(':id_processo', $id_processo);
      $sql->execute();
      return true;
  } 
  catch(PDOException $e) {
      return 'Error: ' . $e->getMessage();
  }
}

 public function listar() {

  require SITE_ROOT.'/conexao.php';
  $sql = "SELECT P.id_processo, P.numero_proc, C.nome as cliente, R.nome as reclamante, PR.nome as preposto, V.nome_vara_abrev as vara
  FROM processos P, clientes C, reclamantes R, prepostos PR, varas V
  WHERE P.id_cliente = C.id_cliente AND P.id_reclamante = R.id_reclamante AND P.id_preposto = PR.id_preposto AND P.id_vara = V.id_vara";
  $sql = $pdo->prepare($sql);
  $sql->execute();


  while ($linha = $sql->fetch(PDO::FETCH_ASSOC))
  {    
    $processo = new ProcessoClass();
    $processo->setId_processo($linha['id_processo']);
    $processo->setNumero_proc($linha['numero_proc']);
    $processo->setId_cliente($linha['cliente']);
    $processo->setId_reclamante($linha['reclamante']);
    $processo->setId_preposto($linha['preposto']);
    $processo->setId_vara($linha['vara']);
    $lista_processos[] = $processo;
  }

  return $lista_processos;
 }

 public function pesquisaNumProcesso($numProcesso) {

    require SITE_ROOT.'/conexao.php';
    $sql = "SELECT * FROM processos WHERE numero_proc = '$numProcesso'";
    $sql = $pdo->prepare($sql);
    $sql->execute();
    $linha = $sql->fetch();

    if(isset($linha)) {
        $processo = new ProcessoClass();
        $processo->setId_processo($linha['id_processo']);
        $processo->setNumero_proc($linha['numero_proc']);
        $processo->setId_cliente($linha['cliente']);
        $processo->setId_reclamante($linha['reclamante']);
        $processo->setId_preposto($linha['preposto']);
        $processo->setId_vara($linha['vara']);    

        return $processo;
    } else{
        return false;
    }


   }


   public function listarJson($numProcesso) {

    require 'conexao.php';
    $sql = "SELECT * FROM processos WHERE numero_proc = '$numProcesso'";
    $sql = $pdo->prepare($sql);
    $sql->execute();
    $linha = $sql->fetch();

    if(isset($linha)) {
        $processo = new ProcessoClass();
        $processo->setId_processo($linha['id_processo']);
        $processo->setNumero_proc($linha['numero_proc']);
        $processo->setId_cliente($linha['id_cliente']);
        $processo->setId_reclamante($linha['id_reclamante']);
        $processo->setId_preposto($linha['id_preposto']);
        $processo->setId_vara($linha['id_vara']);    

        // return $processo;
        return json_encode($processo, JSON_FORCE_OBJECT);
    } else{
        return false;
    }
  


   }





  //getters e setters

    public function getId_processo()
    {
        return $this->id_processo;
    }

    public function setId_processo($id_processo)
    {
        $this->id_processo = $id_processo;

        return $this;
    }

    public function getNumero_proc()
    {
        return $this->numero_proc;
    }

    public function setNumero_proc($numero_proc)
    {
        $this->numero_proc = $numero_proc;

        return $this;
    }

    public function getId_cliente()
    {
        return $this->id_cliente;
    }


    public function setId_cliente($id_cliente)
    {
        $this->id_cliente = $id_cliente;

        return $this;
    }

    public function getId_reclamante()
    {
        return $this->id_reclamante;
    }


    public function setId_reclamante($id_reclamante)
    {
        $this->id_reclamante = $id_reclamante;

        return $this;
    }


    public function getId_preposto()
    {
        return $this->id_preposto;
    }

 
    public function setId_preposto($id_preposto)
    {
        $this->id_preposto = $id_preposto;

        return $this;
    }

    public function getId_vara()
    {
        return $this->id_vara;
    }

    public function setId_vara($id_vara)
    {
        $this->id_vara = $id_vara;

        return $this;
    }
}

?>