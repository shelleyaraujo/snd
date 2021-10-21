<?php

class CatalogoComentariosModel extends Model
{
  private $id;
  private $idcatalogo;
  private $titulo;
  private $pergunta;

  public function setId( $id )
  {
    $this->id = $id;
    return $this;
  }

  public function getId()
  {
    return $this->id;
  }

  public function setIdCatalogo( $idcatalogo )
  {
    $this->idcatalogo = $idcatalogo;
    return $this;
  }

  public function getIdCatalogo()
  {
    return $this->idcatalogo;
  }

  public function setTitulo( $titulo )
  {
    $this->titulo = $titulo;
    return $this;
  }

  public function getTitulo()
  {
    return $this->titulo;
  }


  public function setTexto( $pergunta )
  {
    $this->pergunta = $pergunta;
    return $this;
  }

  public function getTexto()
  {
    return $this->pergunta;
  }

  function __construct()
  {
    parent::__construct();
  }

  public function readItens($ln, $x, $y, $ordem)
  {
    $i = 0;
    $l=0;
    $totallinhas = 0;
    $linhas = $ln;
    $paginas = 0;
    
    $dbh=getdbh();
    $totallinhas = current($dbh->query("select count(*) from catalogocomentarios WHERE idcatalogo=$this->idcatalogo")->fetch());
    $paginas = $totallinhas / $linhas;

    $st_query = "
    SELECT id,
    dma,
    pergunta,
    resposta
    FROM catalogocomentarios
    WHERE idcatalogo = $this->idcatalogo
    ORDER BY $ordem";

    $r = array();   
    $r[3][0] = "";
    $i=0;
    
    try
    {
      $dbh=getdbh();
      $stmt = $dbh->query($st_query);
      while ($row = $stmt->fetch()) {      
        if ($i >= $x) {
          $r[$l][0] = $row["id"];
          $r[$l][1] = $row["dma"];
          $r[$l][2] = $row["pergunta"];
          $r[$l][3] = $row["resposta"];
          $l++;
        }
        $i++;
        if ($i == $x + $linhas) {
                $l = $l + 1; // for create pages

                break;
              }

            }

          }
          catch(PDOException $e)
          {}  

          $r[$l][0] = "";
          $r[$l][1] = "";
          $r[$l][2] = "";
          $r[$l][3] = "";

          $r[$l][1] .= "<ul class='paginacao'>";


          $p = $y;
          if ($y > 0) {
            $a = $y * $linhas;
            $a = $a - $linhas;
            $b = $y - 10;
            $r[$l][1] .= "<li class='pag-prev'><a href='?controle=page&acao=open&id=". $this->id ."&idcatalogo=" . 
            $this->idcatalogo . "&x=" . $a . "&y=" . $b . "'>...</a></li>";
          }
          for ($i = 1; $i < 11; $i++) {
            $p++;
            $x = $p * $linhas - $linhas;
            $r[$l][0] = "#p#";
            if ($x < $totallinhas) {
              $r[$l][1] .= "<li class='pag-now'>";
              $r[$l][1] .= "<a href='?controle=page&acao=open&id=". $this->id ."&idcatalogo=" . 
              $this->idcatalogo . "&x=" . $x . "&y=" . $y . "'>" . $p . "</a>";
              $r[$l][1] .= "</li>";
            }
          }


        $r[$l][2] .= "<div class='paginacao-itens'>" .$totallinhas . " itens</div>"; // $paginas;


        if ($x < $totallinhas) {
          $x = $x + $linhas;
          $y = $y + 10;
          $r[$l][1] .= "<li class='pag-next'>&nbsp;<a href='?controle=page&acao=open&id=". $this->id ."&idcatalogo=" . 
          $this->idcatalogo . "&x=" . $x . "&y=" . $y . "'>...</a></li>";
        }
        // and flow rows

        $r[$l][1] .= "</ul>" . $r[$l][2];

        if($totallinhas <= $ln)
        {
          $r[$l][1] = "";
        }

        return $r;
      }   

      public function addItem()
      {
        $st_query = "
        INSERT INTO catalogocomentarios
        (
        idcatalogo,
        pergunta
        )
        VALUES
        (
        $this->idcatalogo,
        '$this->pergunta'
      );";

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

    public function updateItem()
    {
      if(!is_null($this->id))
      {
        $st_query = "
        UPDATE catalogocomentarios
        SET
        resposta = '$this->pergunta'
        WHERE
        id = $this->id";      
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

  }
  ?>