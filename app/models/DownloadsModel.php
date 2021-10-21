<?php
class DownloadsModel extends Model
{
  private $id;
  private $idcategoria;
  private $titulo;
  private $imagem;
  private $descricao;

  public function setId( $id )
  {
    $this->id = $id;
    return $this;
  }

  public function getId()
  {
    return $this->id;
  } 

  public function setIdCategoria( $idcategoria )
  {
    $this->idcategoria = $idcategoria;
    return $this;
  }

  public function getIdCategoria()
  {
    return $this->idcategoria;
  }

  public function setDescricao( $descricao )
  {
    $this->descricao = $descricao;
    return $this;
  }

  public function getDescricao()
  {
    return $this->descricao;
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

  public function setImagem( $imagem )
  {
    $this->imagem = $imagem;
    return $this;
  }

  public function getImagem()
  {
    return $this->imagem;
  }

  public function readItem()
  {
    $st_query = "
    SELECT id,
    dma,
    idcategoria,
    titulo,
    imagem,
    descricao,
    ordem
    FROM downloads
    WHERE id = $this->id";

    $r = array();   

    try
    {
      $o_data = $this->o_db->query($st_query);
      $r = array();
      $i=0;
      while($o_ret = $o_data->fetchObject())
      {
        $r[0] = $row["id"];
        $r[1] = $row["dma"];
        $r[2] = $row["idcategoria"];
        $r[3] = $row["titulo"];
        $r[4] = $row["imagem"];
        $r[5] = $row["descricao"];
        $r[6] = $row["ordem"];
        $i++;
      }
    }
    catch(PDOException $e)
    {}  
    return $r;
  }   


  public function readItens($ln, $x, $y, $ordem)
  {
    $i = 0;
    $l=0;
    $totallinhas = 0;
    $linhas = $ln;
    $paginas = 0;

    $dbh=getdbh();
    $totallinhas = current($dbh->query("select count(*) from downloads WHERE idcategoria=".$this->idcategoria)->fetch());
    $paginas = $totallinhas / $linhas;

    $r = array();   
    $i=0;
    $r[3][0] = "";

    $st_query = "
    SELECT
    id,
    dma,
    idcategoria,
    titulo,
    arquivo,
    arquivo1,
    arquivo2,
    arquivo3,
    descricao,
    ordem
    FROM downloads
    WHERE idcategoria = $this->idcategoria
    ORDER BY $ordem";

    try  {
     $dbh=getdbh();
     $stmt = $dbh->query($st_query);
     while ($row = $stmt->fetch()) {
      if ($i >= $x) {
        $r[$l][0] = $row["id"];
        $r[$l][1] = $row["dma"];
        $r[$l][2] = $row["idcategoria"];
        $r[$l][3] = $row["titulo"];
        $r[$l][4] = $row["arquivo"];
        $r[$l][5] = $row["arquivo1"];
        $r[$l][6] = $row["arquivo2"];
        $r[$l][7] = $row["arquivo3"];
        $r[$l][7] = $row["descricao"];
        $r[$l][9] = $row["ordem"];
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
 $r[$l][4] = "";
 $r[$l][5] = "";
 $r[$l][6] = "";

 $r[$l][1] .= "<ul class='paginacao'>";

        // create flow rows

 $p = $y;
 if ($y > 0) {
  $a = $y * $linhas;
  $a = $a - $linhas;
  $b = $y - 10;
  $r[$l][1] .= "<li class='pag-prev'><a href='?controle=page&acao=open&id=". $this->id ."&idcategoria=" . 
  $this->idcategoria . "&x=" . $a . "&y=" . $b . "'>...</a></li>";
}
for ($i = 1; $i < 11; $i++) {
  $p++;
  $x = $p * $linhas - $linhas;
  $r[$l][0] = "#p#";
  if ($x < $totallinhas) {
   $r[$l][1] .= "<li class='pag-now'>";
   $r[$l][1] .= "<a href='?controle=page&acao=open&id=". $this->id ."&idcategoria=" . 
   $this->idcategoria . "&x=" . $x . "&y=" . $y . "'>" . $p . "</a>";
   $r[$l][1] .= "</li>";
 }
}

        // $r[$l][2] .= "<div class='paginacao-itens'>" .$totallinhas . " itens</div>"; // $paginas;

if ($x < $totallinhas) {
  $x = $x + $linhas;
  $y = $y + 10;
  $r[$l][1] .= "<li class='pag-next'>&nbsp;<a href='?controle=page&acao=open&id=". $this->id ."&idcategoria=" . 
  $this->idcategoria . "&x=" . $x . "&y=" . $y . "'>...</a></li>";
}
        // and flow rows

$r[$l][1] .= "</ul>" . $r[$l][2];

if($totallinhas <= $ln)
{
  $r[$l][1] = "";
}

return $r;
}  

/* TAO */

public function getRow($iddownload)
{
  $st_query = "
  SELECT id,
  dma,
  idcategoria,
  titulo,
  arquivo,
  arquivo1,
  arquivo2,
  arquivo3,
  descricao,
  ordem
  FROM downloads
  WHERE id = $iddownload";

  $r = array();   
  $i=0;

  try
  {
    $dbh=getdbh();
    $stmt = $dbh->query($st_query);
    while ($row = $stmt->fetch()) {
      $r[0] = $row["id"];
      $r[1] = $row["dma"];
      $r[2] = $row["idcategoria"];
      $r[3] = $row["titulo"];
      $r[4] = $row["arquivo"];
      $r[5] = $row["arquivo1"];
      $r[6] = $row["arquivo2"];
      $r[7] = $row["arquivo3"];
      $r[8] = $row["descricao"];
      $r[9] = $row["ordem"];
      $i++;
    }
  }
  catch(PDOException $e)
  {}  
  return $r;
}   

public function update_downloads($id,$titulo,$descricao) 
{
  $st_query = "
  UPDATE downloads
  SET
  titulo = '$titulo',
  descricao = '$descricao'
  WHERE
  id = $id
  ";  

  $dbh=getdbh();
  $stmt = $dbh->prepare($st_query);
  try
  {
    $stmt->execute();
  }
  catch (PDOException $e)
  {
    throw $e;
  }

  return false;
}


public function delete_downloads($id)
{

  $st_query = "
  DELETE FROM downloads
  WHERE id = $id";
  $dbh=getdbh();
  try
  {
    if($dbh->exec($st_query) > 0)
    {
      $dbh->getAttribute(PDO::ATTR_DRIVER_NAME) === 'sqlite';
    }
  }
  catch (PDOException $e)
  {
    throw $e;
  }

  return false;
}

    public function getTotalRegistros() {

     $dbh=getdbh();
     $r = current($dbh->query("select count(*) from downloads")->fetch());
     return $r;
   }

       public function getTotalRegistrosCategoria($idcategoria) {

     $dbh=getdbh();
     $r = current($dbh->query("select count(*) from downloads WHERE idcategoria = " . $idcategoria)->fetch());
     return $r;
   }


public function trocar_modulo($id,$idmodulo)
{
  $st_query = "
  UPDATE downloads
  SET
  idcategoria = $idmodulo
  WHERE
  id = $id
  ";  

  $dbh=getdbh();
  $stmt = $dbh->prepare($st_query);
  try
  {
    $stmt->execute();
  }
  catch (PDOException $e)
  {
    throw $e;
  }

  return false;
}


public function update_ordem($id, $ordem)
  {
    $st_query = "
    UPDATE downloads
    SET
    ordem = $ordem
    WHERE
    id = $id";

    $dbh=getdbh();


    try
    {
      if($dbh->exec($st_query) > 0)
      {
        $dbh->getAttribute(PDO::ATTR_DRIVER_NAME) === 'sqlite';
      }
    }
    catch (PDOException $e)
    {
      throw $e;
    }
    return false;
  }

  
public function update_arquivo($id, $arquivo)
{
  $st_query = "
  UPDATE downloads
  SET
  arquivo = '$arquivo'
  WHERE
  id = $id";

  $dbh=getdbh();


  try
  {
    if($dbh->exec($st_query) > 0)
    {
      $dbh->getAttribute(PDO::ATTR_DRIVER_NAME) === 'sqlite';
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