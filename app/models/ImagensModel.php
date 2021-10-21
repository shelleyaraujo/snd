<?php

class ImagensModel extends Model
{
    private $id;
    private $idcategoria;
    private $titulo;
    private $imagem;
    private $descricao;

    function __construct()
    {
        parent::__construct();
    }
    
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

    public function setDescricao( $descricao )
    {
        $this->descricao = $descricao;
        return $this;
    }

    public function getDescricao()
    {
        return $this->descricao;
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
        FROM imagens
        WHERE id = $this->id";
        
        $r = array();   

        try
        {
            $o_data = $this->o_db->query($st_query);
            $r = array();
            $i=0;
            while($o_ret = $o_data->fetchObject())
            {
                $r[0] = $o_ret->id;
                $r[1] = $o_ret->dma;
                $r[2] = $o_ret->idcategoria;
                $r[3] = $o_ret->titulo;
                $r[4] = $o_ret->imagem;
                $r[5] = $o_ret->descricao;
                $r[6] = $o_ret->ordem;
                $i++;
            }
        }
        catch(PDOException $e)
        {}  
        return $r;
    }   

    public function readItens()
    {
        $st_query = "
        SELECT id,
        dma,
        idcategoria,
        titulo,
        imagem,
        descricao,
        ordem
        FROM imagens
        WHERE idcategoria = $this->idcategoria
        ORDER BY dma desc";
        
        $r = array();   

        try
        {
            $o_data = $this->o_db->query($st_query);
            $r = array();
            $i=0;
            while($o_ret = $o_data->fetchObject())
            {
                $r[$i][0] = $o_ret->id;
                $r[$i][1] = $o_ret->dma;
                $r[$i][2] = $o_ret->idcategoria;
                $r[$i][3] = $o_ret->titulo;
                $r[$i][4] = $o_ret->descricao;
                $r[$i][5] = $o_ret->imagem;
                $r[$i][6] = $o_ret->ordem;
                $i++;
            }
        }
        catch(PDOException $e)
        {}  
        return $r;
    } 

    public function readItensPaginacao($ln, $x, $y)
    {

        $i = 0;
        $l=0;
        $totallinhas = 0;
        $linhas = $ln;
        $paginas = 0;

        $dbh=getdbh();
        $totallinhas = current($dbh->query("select count(*) from imagens")->fetch());
        $paginas = $totallinhas / $linhas;  $paginas = $totallinhas / $linhas;

        $st_query = "
        SELECT id,
        dma,
        idcategoria,
        titulo,
        imagem,
        descricao,
        ordem
        FROM imagens
        ORDER BY dma desc";
        
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
                $r[$l][2] = $row["idcategoria"];
                $r[$l][3] = $row["titulo"];
                $r[$l][4] = $row["descricao"];
                $r[$l][5] = $row["imagem"];
                $r[$l][6] = $row["ordem"];
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


// create flow rows
    $p = $y;
    if ($y > 0) {
        $a = $y * $linhas;
        $a = $a - $linhas;
        $b = $y - 10;
        $r[$l][1] .= "<ul class='paginacao'><li><a href='?controle=Imagens&acao=open&idcategoria=" . 
        $this->idcategoria . "&x=" . $a . "&y=" . $b . "'>...</a></li>";
    }
    for ($i = 1; $i < 11; $i++) {
        $p++;
        $x = $p * $linhas - $linhas;
        $r[$l][0] = "#p#";
        if ($x < $totallinhas) {
            $r[$l][1] .= "<li class='pag-now'>";
            $r[$l][1] .= "<a href='?controle=Imagens&acao=open&idcategoria=" . 
            $this->idcategoria . "&x=" . $x . "&y=" . $y . "'>" . $p . "</a>";
            $r[$l][1] .= "</li>";
        }
    }
        $r[$l][2] .= $totallinhas . " itens"; // $paginas;

        if ($x < $totallinhas) {
            $x = $x + $linhas;
            $y = $y + 10;
            $r[$l][1] .= "<li class='pag-next'>&nbsp;<a href='?controle=Imagens&acao=open&idcategoria=" . 
            $this->idcategoria . "&x=" . $x . "&y=" . $y . "'>...</a></li></ul>";
        }
        // and flow rows

        return $r;
    }   


    public function addItem()
    {

        $dma = gmdate("y/m/d G.i:", time());

        $st_query = "
        INSERT INTO imagens
        (
        dma,
        idcategoria,
        titulo,
        imagem,
        descricao
        )
        VALUES
        (
        '$dma',
        $this->idcategoria,
        '$this->titulo',
        '$this->imagem',
        '$this->descricao'
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

public function deleteItem()
{
    if(!is_null($this->id))
    {
        $st_query = "
        DELETE FROM imagens
        WHERE id = $this->id";

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

public function updateItem()
{
    if(!is_null($this->id))
    {
        $st_query = "
        UPDATE imagens
        SET
        titulo = '$this->titulo',
        descricao = '$this->descricao'         
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

public function updateImagem()
{
    if(!is_null($this->id))
    {
        $st_query = "
        UPDATE imagens
        SET
        imagem = '$this->imagem'
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


public function getTotalRegistros()
{
    $r = current($this->o_db->query("select count(*) from imagens")->fetch());
    return $r;
}


}
?>