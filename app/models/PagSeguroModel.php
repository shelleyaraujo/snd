<?php

class PagSeguroModel extends PersistModelAbstract
{
  private $id_pedido;
  private $codigo_pagseguro; //CODIGO PAGSEGURO
  private $status;

  public function setIdPedido( $id_pedido )
  {
    $this->id_pedido = $id_pedido;
    return $this;
  }

  public function getIdPedido()
  {
    return $this->id;
  }

  public function setIdPagseguro( $id_pagseguro )
  {
    $this->id_pagseguro = $id_pagseguro;
    return $this;
  }

  public function getIdPagseguro()
  {
    return $this->id_pagseguro;
  }

  public function setStatus( $status )
  {
    $this->status = $status;
    return $this;
  }

  public function getStatus()
  {
    return $this->status;
  }

  public function setCodigoPagseguro( $codigo_pagseguro )
  {
    $this->codigo_pagseguro = $codigo_pagseguro;
    return $this;
  }

  public function getCodigoPagseguro()
  {
    return $this->codigo_pagseguro;
  }



  function __construct()
  {
    parent::__construct();
  }

  public function updatePagSeguro()
  {

    if(!is_null($this->id_pagseguro))
    {
      $st_query = "
      UPDATE pagseguro
      SET
      idpedido = '$this->id_pedido',
      status = 1,
      WHERE
      idpagseguro = $this->id_pagseguro";
      
      try
      {
        if($this->o_db->exec($st_query) > 0)
        {
          $this->o_db->getAttribute(PDO::ATTR_DRIVER_NAME) === 'sqlite';
        }
      }
      catch (PDOException $e)
      {
        throw $e;
      }
    }

    return false;

  }

     public function updatePedido()
      {
          $st_query = "
          UPDATE pedidos
          SET
          codigopagamento = '$this->codigo_pagseguro',
          pagamento = 'PagSeguro',
          status = $this->status
          WHERE
          id = $this->id_pedido
          ";      
          try
          {
            if($this->o_db->exec($st_query) > 0)
            {
              $this->o_db->getAttribute(PDO::ATTR_DRIVER_NAME) === 'sqlite';
            }
          }
          catch (PDOException $e)
          {
            throw $e;
          }
        
        return false;
      }


}
?>