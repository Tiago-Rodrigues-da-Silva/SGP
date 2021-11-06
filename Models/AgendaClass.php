<?php
class AgendaClass{
    private $id_audiencia;
    private $data;
    private $horario;
    private $modalidade;
    private $tipo;
    private $vara;
    private $cliente;
    private $processo;
    private $reclamante;
    private $preposto;

    
 public function listar() {

  require SITE_ROOT.'/conexao.php';
  $sql = "SELECT A.id_audiencia, A.data, A.horario, MA.modalidade_audiencia, T.tipo_audiencia, V.nome_vara_abrev, C.nome as cliente, P.numero_proc, R.nome as reclamante, PR.nome as preposto
  FROM audiencias A, modalidades_audiencia MA, tipos_audiencia T, varas V, clientes C, processos P, reclamantes R, prepostos PR
  WHERE A.id_modalidade = MA.id_modalidade AND A.id_tipo = T.id_tipo AND P.id_vara = V.id_vara AND P.id_cliente = C.id_cliente AND P.id_reclamante = R.id_reclamante AND P.id_preposto = PR.id_preposto AND A.id_processo = P.id_processo
  ORDER BY A.data, A.horario ASC";
  $sql = $pdo->prepare($sql);
  $sql->execute();


  while ($linha = $sql->fetch(PDO::FETCH_ASSOC))
  {    
    $audiencia = new AgendaClass();
    $audiencia->setId_audiencia($linha['id_audiencia']);    
    $audiencia->setData(date('d/m/Y', strtotime($linha['data'])));
    $audiencia->setHorario(date('H:i', strtotime($linha['horario'])));
    $audiencia->setModalidade($linha['modalidade_audiencia']);
    $audiencia->setTipo($linha['tipo_audiencia']);
    $audiencia->setVara($linha['nome_vara_abrev']);
    $audiencia->setCliente($linha['cliente']);
    $audiencia->setProcesso($linha['numero_proc']);
    $audiencia->setReclamante($linha['reclamante']);
    $audiencia->setPreposto($linha['preposto']);  
    $agenda[] = $audiencia;
  }

  return $agenda;
 }
 
  //getters e setters
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
     * Get the value of modalidade
     *
     * @return  mixed
     */
    public function getModalidade()
    {
        return $this->modalidade;
    }

    /**
     * Set the value of modalidade
     *
     * @param   mixed  $modalidade  
     *
     * @return  self
     */
    public function setModalidade($modalidade)
    {
        $this->modalidade = $modalidade;

        return $this;
    }

    /**
     * Get the value of tipo
     *
     * @return  mixed
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set the value of tipo
     *
     * @param   mixed  $tipo  
     *
     * @return  self
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get the value of vara
     *
     * @return  mixed
     */
    public function getVara()
    {
        return $this->vara;
    }

    /**
     * Set the value of vara
     *
     * @param   mixed  $vara  
     *
     * @return  self
     */
    public function setVara($vara)
    {
        $this->vara = $vara;

        return $this;
    }

    /**
     * Get the value of cliente
     *
     * @return  mixed
     */
    public function getCliente()
    {
        return $this->cliente;
    }

    /**
     * Set the value of cliente
     *
     * @param   mixed  $cliente  
     *
     * @return  self
     */
    public function setCliente($cliente)
    {
        $this->cliente = $cliente;

        return $this;
    }

    /**
     * Get the value of processo
     *
     * @return  mixed
     */
    public function getProcesso()
    {
        return $this->processo;
    }

    /**
     * Set the value of processo
     *
     * @param   mixed  $processo  
     *
     * @return  self
     */
    public function setProcesso($processo)
    {
        $this->processo = $processo;

        return $this;
    }

    /**
     * Get the value of reclamante
     *
     * @return  mixed
     */
    public function getReclamante()
    {
        return $this->reclamante;
    }

    /**
     * Set the value of reclamante
     *
     * @param   mixed  $reclamante  
     *
     * @return  self
     */
    public function setReclamante($reclamante)
    {
        $this->reclamante = $reclamante;

        return $this;
    }

    /**
     * Get the value of preposto
     *
     * @return  mixed
     */
    public function getPreposto()
    {
        return $this->preposto;
    }

    /**
     * Set the value of preposto
     *
     * @param   mixed  $preposto  
     *
     * @return  self
     */
    public function setPreposto($preposto)
    {
        $this->preposto = $preposto;

        return $this;
    }

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
}

?>