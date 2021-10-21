<?php

class LinksModel extends PersistModelAbstract
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
    
    /**
     * Setters e Getters date(format)
     * classe TelefoneModel
     */

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
        FROM links
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

    public function readItens($ln, $x, $y, $ordem)
    {
        $i = 0;
        $l=0;
        $totallinhas = 0;
        $linhas = $ln;
        $paginas = 0;

        $totallinhas = current($this->o_db->query("select count(*) from links WHERE idcategoria=$this->idcategoria")->fetch());
        $paginas = $totallinhas / $linhas;

        $st_query = "
        SELECT id,
        dma,
        idcategoria,
        url,
        descricao,
        ordem
        FROM links
        WHERE idcategoria = $this->idcategoria
        ORDER BY $ordem";
        
        $r = array();   
        $r[3][0] = "";
        try
        {
            $o_data = $this->o_db->query($st_query);
            $r = array();
            $i=0;
            while($o_ret = $o_data->fetchObject())
            {
                if ($i >= $x) {
                    $r[$l][0] = $o_ret->id;
                    $r[$l][1] = $o_ret->dma;
                    $r[$l][2] = $o_ret->idcategoria;
                    $r[$l][3] = $o_ret->url;
                    $r[$l][4] = $o_ret->descricao;
                    $r[$l][6] = $o_ret->ordem;
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
        $r[$l][1] .= "<li class='pag-prev'><a href='?controle=page&acao=open&id=" . 
        $this->id . "&idcategoria=" . 
        $this->idcategoria . "&x=" . $a . "&y=" . $b . "'>...</a></li>";
    }
    for ($i = 1; $i < 11; $i++) {
        $p++;
        $x = $p * $linhas - $linhas;
        $r[$l][0] = "#p#";
        if ($x < $totallinhas) {
            $r[$l][1] .= "<li class='pag-now'>";
            $r[$l][1] .= "<a href='?controle=page&acao=open&id=" . 
            $this->id . "&idcategoria=" . 
            $this->idcategoria . "&x=" . $x . "&y=" . $y . "'>" . $p . "</a>";
            $r[$l][1] .= "</li>";
        }
    }

        //$r[$l][2] .= "<div class='paginacao-itens'>" .$totallinhas . " itens</div>"; // $paginas;

    if ($x < $totallinhas) {
        $x = $x + $linhas;
        $y = $y + 10;
        $r[$l][1] .= "<li class='pag-next'><a href='?controle=page&acao=open&id=" . 
        $this->id . "&idcategoria=" . 
        $this->idcategoria . "&x=" . $x . "&y=" . $y . "'>...</a></li>";
    }


    $r[$l][1] .= "</ul>" . $r[$l][2];

    if($totallinhas <= $ln)
    {
      $r[$l][1] = "";
  }

       // and flow rows

  return $r;
}   

}
?>