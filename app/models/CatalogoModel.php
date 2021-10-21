<?php
class CatalogoModel extends Model
{
  private $id;
  private $idcategoria;
  private $titulo;
  private $codigo;
  private $imagem;
  private $preco;
  private $precocusto;
  private $estoque;
  private $descricao;
  private $codigofornecedor;
  private $idfornecedor;
  private $cor;
  private $tamanho;
  private $modelo;
  private $peso;
  private $vitrine;
  private $idminiatura;
  private $quantidade;
  private $descricao_simplificada;

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

  public function setProduto( $titulo )
  {
    $this->titulo = $titulo;
    return $this;
  }

  public function getProduto()
  {
    return $this->titulo;
  }

  public function setCodigo( $codigo )
  {
    $this->codigo = $codigo;
    return $this;
  }

  public function getCodigo()
  {
    return $this->codigo;
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

  public function setPreco( $preco )
  {
    $this->preco = $preco;
    return $this;
  }

  public function getPreco()
  {
    return $this->preco;
  }

  public function setPrecoCusto( $precocusto )
  {
    $this->precocusto = $precocusto;
    return $this;
  }

  public function getPrecoCusto()
  {
    return $this->precocusto;
  }

  public function setEstoque( $estoque )
  {
    $this->estoque = $estoque;
    return $this;
  }

  public function getEstoque()
  {
    return $this->estoque;
  }  

  public function setCodigoFornecedor( $codigofornecedor )
  {
    $this->codigofornecedor = $codigofornecedor;
    return $this;
  }

  public function getCodigoFornecedor()
  {
    return $this->codigofornecedor;
  }  


  public function setIdFornecedor( $idfornecedor )
  {
    $this->idfornecedor = $idfornecedor;
    return $this;
  }

  public function idfornecedor()
  {
    return $this->idfornecedor;
  } 

  public function setCor( $cor )
  {
    $this->cor = $cor;
    return $this;
  }

  public function getCor()
  {
    return $this->cor;
  } 

  public function setTamanho( $tamanho )
  {
    $this->tamanho = $tamanho;
    return $this;
  }

  public function getTamanho()
  {
    return $this->tamanho;
  } 

  public function setModelo( $modelo )
  {
    $this->modelo = $modelo;
    return $this;
  }

  public function getModelo()
  {
    return $this->modelo;
  } 

  public function setPeso( $peso )
  {
    $this->peso = $peso;
    return $this;
  }

  public function getPeso()
  {
    return $this->peso;
  } 

  public function setVitrine( $vitrine )
  {
    $this->vitrine = $vitrine;
    return $this;
  }

  public function getVitrine()
  {
    return $this->vitrine;
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

  public function setDescricaoSimplificada( $descricao_simplificada )
  {
    $this->descricao_simplificada = $descricao_simplificada;
    return $this;
  }

  public function getDescricaoSimplificada()
  {
    return $this->descricao_simplificada;
  } 

  public function setIdMiniatura( $idminiatura )
  {
    $this->idminiatura = $idminiatura;
    return $this;
  }

  public function getIdMiniatura()
  {
    return $this->idminiatura;
  } 

  public function setQuantidade( $quantidade )
  {
    $this->quantidade = $quantidade;
    return $this;
  }

  public function getQuantidade()
  {
    return $this->quantidade;
  } 

  public function readItem()
  {
    $st_query = "
    SELECT id,
    dma,
    idcategoria,
    codigo,
    titulo,
    preco,
    precocusto,
    estoque,
    imagem,
    descricao,
    codigofornecedor,
    idfornecedor,
    cor,
    peso,
    vitrine,
    ordem,
    descricao_simplificada
    FROM catalogo
    WHERE id = $this->id";

    $r = array();	
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
      $r[3] = $row["codigo"];
      $r[4] = $row["titulo"];
      $r[5] = $row["preco"];
      $r[6] = $row["precocusto"];
      $r[7] = $row["estoque"];
      $r[8] = $row["imagem"];
      $r[9] = $row["ordem"];
      $r[10] = $row["descricao"];
      $r[11] = $row["codigofornecedor"];
      $r[12] = $row["idfornecedor"];
      $r[13] = $row["peso"];
      $r[14] = $row["vitrine"];
      $r[15] = $row["descricao_simplificada"];

      $i++;
    }
  }
  catch(PDOException $e)
  {}	
  return $r;
} 	


public function readItens($ln, $x, $y, $ordem)
{

  if($ordem=="data") {
    $ordem="dma";
  }
  if($ordem=="idcontainerscaixatex") {
    $ordem="idcontainerscaixatextoflex";
  }

  $i = 0;
  $l=0;
  $totallinhas = 0;
  $linhas = $ln;
  $paginas = 0;

  $dbh=getdbh();
  $totallinhas = current($dbh->query("select count(*) from catalogo 
    WHERE idcategoria=".$this->idcategoria . " AND ativo=1")->fetch());
  $paginas = $totallinhas / $linhas;

  $r = array();   
  $i=0;
  $r[3][0] = "";

  $st_query = "
  SELECT
  id,
  dma,
  idcategoria,
  codigo,
  titulo,
  preco,
  precocusto,
  estoque,
  imagem,
  ordem,
  vitrine,
  descricao_simplificada
  FROM catalogo
  WHERE idcategoria = $this->idcategoria
  AND ativo = 1
  /*AND estoque > 0*/
  ORDER BY $ordem";
  try  {
   $dbh=getdbh();
   $stmt = $dbh->query($st_query);
   while ($row = $stmt->fetch()) {
    if ($i >= $x) {
      $r[$l][0] = $row["id"];
      $r[$l][1] = $row["dma"];
      $r[$l][2] = $row["idcategoria"];
      $r[$l][3] = $row["codigo"];
      $r[$l][4] = $row["titulo"];
      $r[$l][5] = $row["preco"];
      $r[$l][6] = $row["precocusto"];
      $r[$l][7] = $row["estoque"];
      $r[$l][8] = $row["imagem"];
      $r[$l][9] = $row["ordem"];
      $r[$l][10] = $row["vitrine"];
      $r[$l][11] = $row["descricao_simplificada"];

  //  echo $row["id"] . "<br>";

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
  $r[$l][1] .= "<li class='pag-next'><a href='?controle=page&acao=open&id=". $this->id ."&idcategoria=" . 
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


public function readItensVitrine($ln, $x, $y, $ordem)
{

  if($ordem=="data") {
    $ordem="dma";
  }
  if($ordem=="idcontainerscaixatex") {
    $ordem="idcontainerscaixatextoflex";
  }


  $i = 0;
  $l=0;
  $totallinhas = 0;
  $linhas = $ln;
  $paginas = 0;

  $dbh=getdbh();
  $totallinhas = current($dbh->query("select count(*) from catalogo WHERE vitrine=1")->fetch());
  $paginas = $totallinhas / $linhas;

  $r = array();   
  $i=0;
  $r[3][0] = "";

  $st_query = "
  SELECT
  id,
  dma,
  idcategoria,
  codigo,
  titulo,
  preco,
  precocusto,
  estoque,
  imagem,
  ordem,
  vitrine,
  descricao_simplificada
  FROM catalogo
  WHERE vitrine = 1
  /*AND estoque > 0*/
  ORDER BY $ordem";

  try  {
   $dbh=getdbh();
   $stmt = $dbh->query($st_query);
   while ($row = $stmt->fetch()) {
    if ($i >= $x) {
      $r[$l][0] = $row["id"];
      $r[$l][1] = $row["dma"];
      $r[$l][2] = $row["idcategoria"];
      $r[$l][3] = $row["codigo"];
      $r[$l][4] = $row["titulo"];
      $r[$l][5] = $row["preco"];
      $r[$l][6] = $row["precocusto"];
      $r[$l][7] = $row["estoque"];
      $r[$l][8] = $row["imagem"];
      $r[$l][9] = $row["ordem"];
      $r[$l][10] = $row["vitrine"];
      $r[$l][11] = $row["descricao_simplificada"];

  //  echo $row["id"] . "<br>";

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

public function readItensDesativados($ln, $x, $y, $ordem)
{

  if($ordem=="data") {
    $ordem="dma";
  }
  if($ordem=="idcontainerscaixatex") {
    $ordem="idcontainerscaixatextoflex";
  }


  $i = 0;
  $l=0;
  $totallinhas = 0;
  $linhas = $ln;
  $paginas = 0;

  $dbh=getdbh();
  $totallinhas = current($dbh->query("select count(*) from catalogo WHERE ativo=0")->fetch());
  $paginas = $totallinhas / $linhas;

  $r = array();   
  $i=0;
  $r[3][0] = "";

  $st_query = "
  SELECT
  id,
  dma,
  idcategoria,
  codigo,
  titulo,
  preco,
  precocusto,
  estoque,
  imagem,
  ordem,
  vitrine,
  descricao_simplificada
  FROM catalogo
  WHERE ativo = 0
  /*AND estoque > 0*/
  ORDER BY $ordem";

  try  {
   $dbh=getdbh();
   $stmt = $dbh->query($st_query);
   while ($row = $stmt->fetch()) {
    if ($i >= $x) {
      $r[$l][0] = $row["id"];
      $r[$l][1] = $row["dma"];
      $r[$l][2] = $row["idcategoria"];
      $r[$l][3] = $row["codigo"];
      $r[$l][4] = $row["titulo"];
      $r[$l][5] = $row["preco"];
      $r[$l][6] = $row["precocusto"];
      $r[$l][7] = $row["estoque"];
      $r[$l][8] = $row["imagem"];
      $r[$l][9] = $row["ordem"];
      $r[$l][10] = $row["vitrine"];
      $r[$l][11] = $row["descricao_simplificada"];

  //  echo $row["id"] . "<br>";

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


  //MINIATURAS //

public function readItemMiniaturas()
{
 $st_query = "
 SELECT id,
 idcatalogo,
 imagem
 FROM catalogoimagens
 WHERE idcatalogo = $this->id
 ORDER BY ordem";

 $r = array();	
 $i=0;

 try
 {
   $dbh=getdbh();
   $stmt = $dbh->query($st_query);
   while ($row = $stmt->fetch()) {

     $r[$i][0] = $row["id"];
     $r[$i][1] = $row["idcatalogo"];
     $r[$i][2] = $row["imagem"];
     $i++;
   }
 }
 catch(PDOException $e)
 {}	
 return $r;
} 		

public function get_imagem_by_name($imagem)
{
 $st_query = "
 SELECT imagem FROM catalogoimagens
 ";

 $r = ""; 
 $i=0;

 try
 {
   $dbh=getdbh();
   $stmt = $dbh->query($st_query);
   while ($row = $stmt->fetch()) {
    if(TRIM($row["imagem"]) == $imagem) {
      $r = $row["imagem"];
    }
    $i++;
  }
}
catch(PDOException $e)
{} 
return $r;
}     

public function readItemImagem($idcatalogo) {

 $st_query = "
 SELECT id,
 idcatalogo,
 imagem, ordem
 FROM catalogoimagens
 WHERE idcatalogo = $idcatalogo
 ORDER BY ordem desc"
 ;

 $r = array();

 try
 {
  $r[0][0] = "";
  $r[0][1] = "";
  $r[0][2] = "";
  $r[0][3] = "";
  $dbh=getdbh();
  $stmt = $dbh->query($st_query);
  while ($row = $stmt->fetch()) {

   $r[0][0] = $row["id"];
   $r[0][1] = $row["idcatalogo"];
   $r[0][2] = $row["imagem"];
   $r[0][3] = $row["ordem"];				
 }
}
catch(PDOException $e)
{}	



return $r;
} 	


public function getCores()
{

 $st_query = "
 SELECT id,
 idcatalogo,
 cor
 FROM catalogocores
 WHERE idcatalogo =  $this->id
 AND quantidade <> 0
 ORDER BY id";
 $i=0;
 $r = "<ul>";

 try
 {
   $dbh=getdbh();
   $stmt = $dbh->query($st_query);
   while ($row = $stmt->fetch()) {

     $i++;
     $r .= "<li id='c". $row["id"] ."' onclick=setCor('c". $row["id"] ."','". $row["cor"] ."') style='background-color:#". $row["cor"]  ."'>". $row["cor"] ."</li>";
   }
 }
 catch(PDOException $e)
 {}	


 $r.'</ul>';

 if($i == 0){
  $r =  "";
}
return $r;
} 

public function getTamanhos()
{

 $st_query = "
 SELECT id,
 idcatalogo,
 tamanho
 FROM catalogotamanhos
 WHERE idcatalogo =  $this->id
 AND quantidade <> 0
 ORDER BY id";

 $i=0;

 $r = "<ul>";

 try
 {
   $dbh=getdbh();
   $stmt = $dbh->query($st_query);
   while ($row = $stmt->fetch()) {

     $i++;
     $r .= "<li id='t". $row["id"] ."' onclick=setTamanho('t". $row["id"] ."','". str_replace(" ","-",$row["tamanho"]) ."')>". $row["tamanho"] ."</li>";
   }
 }
 catch(PDOException $e)
 {}	

 $r.'</ul>';

 if($i == 0){
  $r =  "";
}

return $r;
} 


public function getModelos()
{

  $st_query = "
  SELECT id,
  idcatalogo,
  modelo
  FROM catalogomodelos
  WHERE idcatalogo =  $this->id
  AND quantidade <> 0
  ORDER BY id";

  $i=0;
  $r = "<ul class=''>";

  try
  {
   $dbh=getdbh();
   $stmt = $dbh->query($st_query);
   while ($row = $stmt->fetch()) {

     $i++;
     $r .= "<li id='modelo". $i ."' onclick=setModelo('modelo". $i ."','". str_replace(" ","-",$row["modelo"]) ."')>". $row["modelo"] ."</li>";
   }
 }
 catch(PDOException $e)
 {}	


 $r .= '</ul>'; 

 if($i == 0){
  $r =  "";
}

return $r;
} 



public function xxx($ln, $x, $y, $ordem)
{
  $i = 0;
  $l=0;
  $totallinhas = 0;
  $linhas = $ln;
  $paginas = 0;

  $totallinhas = current($stmt->query("select count(*) from catalogo WHERE vitrine=1")->fetch());
  $paginas = $totallinhas / $linhas;

  $st_query = "
  SELECT 
  id,
  dma,
  idcategoria,
  codigo,
  titulo,
  preco,
  precocusto,
  estoque,
  imagem,
  ordem,
  vitrine
  FROM catalogo
  WHERE vitrine = 1
  ORDER BY $ordem";

  $r = array();   
  $r[3][0] = "";
  $r = array();
  $i=0;
  try
  {
   $dbh=getdbh();
   $stmt = $dbh->query($st_query);
   while ($row = $stmt->fetch()) {

     if ($i >= $x) {
      $r[$l][0] = $o_ret->id;
      $r[$l][1] = $o_ret->dma;
      $r[$l][2] = $o_ret->idcategoria;
      $r[$l][3] = $o_ret->codigo;
      $r[$l][4] = $o_ret->titulo;
      $r[$l][5] = $o_ret->preco;
      $r[$l][6] = $o_ret->precocusto;
      $r[$l][7] = $o_ret->estoque;
      $r[$l][8] = $o_ret->imagem;
      $r[$l][9] = $o_ret->ordem;
      $r[$l][10] = $o_ret->vitrine;

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
      $r[$l][2] .= $totallinhas . " itens"; // $paginas;


      if ($x < $totallinhas) {
      	$x = $x + $linhas;
      	$y = $y + 10;
      	$r[$l][1] .= "<li class='pag-next'>&nbsp;<a href='?controle=page&acao=open&id=". $this->id ."&idcategoria=" . 
      	$this->idcategoria . "&x=" . $x . "&y=" . $y . "'>...</a></li>";
      }
      // and flow rows

      $r[$l][1] .= "</ul><div class='paginacao-itens'>" . $r[$l][2] . "</div>";


      return $r;
    } 	

    public function get_relacionados($ordem_catalogo)
    {

      $st_query = "
      SELECT id,
      idcatalogo,
      idmodulo
      FROM catalogorelacionados
      WHERE idmodulo =  $this->idcategoria
      ORDER BY 'titulo'
      ";

      $i=0;
      $r = array();

      try
      {
       $dbh=getdbh();
       $stmt = $dbh->query($st_query);
       while ($row = $stmt->fetch()) {

         $r[$i] = $this->get_catalogo_relacionados($row["idcatalogo"], $ordem_catalogo);
         $i++;
       }            
     }
     catch(PDOException $e)
     {}  

     return $r;
   } 

   public function get_catalogo_relacionados($id, $ordem)
   {

    $st_query = "
    SELECT id,
    dma,
    idcategoria,
    codigo,
    titulo,
    preco,
    precocusto,
    estoque,
    imagem,
    ordem,
    vitrine
    FROM catalogo
    WHERE id =  $id;
    ORDER BY $ordem";

    $i=0;
    $r = array();
    $r[0][0] = "";

    try
    {
     $dbh=getdbh();
     $stmt = $dbh->query($st_query);
     while ($row = $stmt->fetch()) {

      $r[$i][0] = $row["id"];
      $r[$i][1] = $row["dma"];
      $r[$i][2] = $row["idcategoria"];
      $r[$i][3] = $row["codigo"];
      $r[$i][4] = $row["titulo"];
      $r[$i][5] = $row["preco"];
      $r[$i][6] = $row["precocusto"];
      $r[$i][7] = $row["estoque"];
      $r[$i][8] = $row["imagem"];
      $r[$i][9] = $row["ordem"];
      $r[$i][10] = $row["vitrine"];
      $i++;
    }
  }
  catch(PDOException $e)
  {}  


  return $r;
} 

public function readItensBusca($ln, $x, $y, $busca)
{
  $i = 0;
  $l=0;

  $totallinhas = 0;
  $linhas = $ln;
  $paginas = 0;

  $totallinhas = current(
    $stmt->query("
      SELECT count(*) 
      FROM
      catalogo 
      WHERE titulo 
      LIKE '%%$busca%%'
      ")->fetch());

  $paginas = $totallinhas / $linhas;

  $st_query = "
  SELECT 
  id,
  dma,
  idcategoria,
  codigo,
  titulo,
  preco,
  precocusto,
  estoque,
  imagem,
  ordem,
  vitrine
  FROM catalogo
  WHERE titulo 
  LIKE '%%$busca%%'
  ORDER BY titulo";

  $r = array();   
  $r = array();
  $i=0;
  $r[3][0] = "";
  try
  {
   $dbh=getdbh();
   $stmt = $dbh->query($st_query);
   while ($row = $stmt->fetch()) {

    if ($i >= $x) {
      $r[$l][0] = $o_ret->id;
      $r[$l][1] = $o_ret->dma;
      $r[$l][2] = $o_ret->idcategoria;
      $r[$l][3] = $o_ret->codigo;
      $r[$l][4] = $o_ret->titulo;
      $r[$l][5] = $o_ret->preco;
      $r[$l][6] = $o_ret->precocusto;
      $r[$l][7] = $o_ret->estoque;
      $r[$l][8] = $o_ret->imagem;
      $r[$l][9] = $o_ret->ordem;
      $r[$l][10] = $o_ret->vitrine;

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
      //$r[$l][2] .= $totallinhas . " itens"; // $paginas;


        if ($x < $totallinhas) {
         $x = $x + $linhas;
         $y = $y + 10;
         $r[$l][1] .= "<li class='pag-next'>&nbsp;<a href='?controle=page&acao=open&id=". $this->id ."&idcategoria=" . 
         $this->idcategoria . "&x=" . $x . "&y=" . $y . "'>...</a></li>";
       }
      // and flow rows

       $r[$l][1] .= "</ul><div class='paginacao-itens'>" . $r[$l][2] . "</div>";

       return $r;
     }  

     public function getTotalCores()
     {

      $dbh=getdbh();
      $total = current($dbh->query("
       SELECT SUM(quantidade) 
       FROM 
       catalogocores
       WHERE 
       idcatalogo=$this->id
       AND 
       cor='$this->cor'
       ")->fetch());

      return  $total;
    } 

    public function getTotalTamanhos()
    {
      $dbh=getdbh();
      $total = current($dbh->query("
        SELECT SUM(quantidade) 
        FROM 
        catalogotamanhos
        WHERE 
        idcatalogo=$this->id
        AND 
        tamanho='$this->tamanho'
        ")->fetch()
    );

      return  $total;
    } 

    public function getTotalModelos()
    {
      $dbh=getdbh();
      $total = current($dbh->query("
        SELECT SUM(quantidade) 
        FROM 
        catalogomodelos
        WHERE 
        idcatalogo=$this->id
        AND 
        modelo='$this->modelo'
        ")->fetch()
    );

      return  $total;
    } 


    public function updateQuntidadeCor()
    {
      $st_query = "
      UPDATE catalogocores
      SET
      quantidade = quantidade - $this->quantidade
      WHERE
      idcatalogo = $this->id
      AND 
      cor = '$this->cor'
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




    public function updateQuntidadeTamanho()
    {
      $st_query = "
      UPDATE catalogotamanhos
      SET
      quantidade = quantidade - $this->quantidade
      WHERE
      idcatalogo = $this->id
      AND 
      tamanho = '$this->tamanho'
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

    public function updateQuntidadeModelo()
    {
      $st_query = "
      UPDATE catalogomodelos
      SET
      quantidade = quantidade - $this->quantidade
      WHERE
      idcatalogo = $this->id
      AND 
      modelo = '$this->modelo'
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

    public function updateEstoque()
    {
      $st_query = "
      UPDATE catalogo
      SET
      estoque = estoque - $this->quantidade
      WHERE
      id = $this->id
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

    /*TAO*/

    public function getTotalRegistros() {

     $dbh=getdbh();
     $r = current($dbh->query("select count(*) from catalogo")->fetch());
     return $r;
   }


   public function getTotalRegistrosCategoria($idcategoria) {

     $dbh=getdbh();
     $r = current($dbh->query("select count(*) from catalogo WHERE idcategoria = " . $idcategoria)->fetch());
     return $r;
   }


   public function delete_catalogo($id)
   {

    $st_query = "
    DELETE FROM catalogo
    WHERE id = $id";
    $dbh=getdbh();
    try
    {
      if($dbh->exec($st_query) > 0)
      {
        $dbh->getAttribute(PDO::ATTR_DRIVER_NAME) === 'sqlite';
        $this->delete_imagem($id);
      }
    }
    catch (PDOException $e)
    {
      throw $e;
    }

    return false;
  }


  public function getRow()
  {
    $st_query = "
    SELECT *
    FROM catalogo 
    WHERE id= $this->id";

    $r = array(); 

    try
    {
     $dbh=getdbh();
     $stmt = $dbh->query($st_query);
     while ($row = $stmt->fetch()) {
      $r[0] = $row["id"];
      $r[1] = $row["dma"];    
      $r[2] = $row["idcategoria"];    
      $r[4] = $row["codigo"];
      $r[3] = $row["titulo"];
      $r[6] = $row["descricao"];
      $r[5] = $row["descricao_simplificada"];
      $r[7] = $row["imagem"];
      $r[8] = $row["ordem"];
      $r[9] = $row["estoque"];  
      $r[10] = $row["preco"];  
      $r[11] = $row["precocusto"];  
      $r[12] = $row["codigofornecedor"];  
      $r[13] = $row["idfornecedor"];  
      $r[14] = $row["cor"];  
      $r[15] = $row["tamanho"];  
      $r[16] = $row["peso"];  
      $r[17] = $row["vitrine"];  
      $r[18] = $row["ativo"];        
    }
  }
  catch(PDOException $e)
  {}  

  return $r;
}

public function update_item_catalogo()
{
  $st_query = "
  UPDATE catalogo
  SET
  titulo = '$this->titulo',
  descricao_simplificada = '$this->descricao_simplificada',
  preco = $this->preco,
  precocusto = $this->precocusto,
  peso = $this->peso,
  estoque = $this->estoque,
  codigo = '$this->codigo',
  idfornecedor = '$this->idfornecedor',
  codigofornecedor = '$this->codigofornecedor',
  descricao = '$this->descricao'
  WHERE
  id = $this->id
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



public function readItemImagems()
{
  $st_query = "
  SELECT id,
  idcatalogo,
  imagem, ordem
  FROM catalogoimagens
  WHERE idcatalogo = $this->id
  ORDER BY ordem
  ";

  $r = array(); 
  $i=0;

  try
  {
   $dbh=getdbh();
   $stmt = $dbh->query($st_query);
   while ($row = $stmt->fetch()) {
    $r[$i][0] = $row["id"];
    $r[$i][1] = $row["idcatalogo"];
    $r[$i][2] = $row["imagem"];
    $r[$i][3] = $row["ordem"];        
    $i++;
  }
}
catch(PDOException $e)
{}  
return $r;
}   


public function add_imagem($idcatalogo,$imagem) {
//   $ordem = $this->getUltimoRegistroOrdem() + 1; // PEGA A ORDEM DO ULTIMO REGISTRO E SOMA MAIS 1
//   
 $imagem =TRIM($imagem);

 $st_query = "
 INSERT INTO catalogoimagens
 (
 idcatalogo,
 imagem,
 ordem
)
VALUES
(
  $idcatalogo,
  '$imagem',
  1
);";

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



public function add_modelo($idcatalogo,$modelo) {

  $st_query = "
  INSERT INTO catalogomodelos
  (
  idcatalogo,
  modelo,
  quantidade
)
VALUES
(
  $idcatalogo,
  '$modelo',
  9999
);";

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



public function add_tamanho($idcatalogo,$tamanho) {

  $st_query = "
  INSERT INTO catalogotamanhos
  (
  idcatalogo,
  tamanho,
  quantidade
)
VALUES
(
  $idcatalogo,
  '$tamanho',
  9999
);";

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


public function add_cor($idcatalogo,$cor) {

  $st_query = "
  INSERT INTO catalogocores
  (
  idcatalogo,
  cor,
  quantidade
)
VALUES
(
  $idcatalogo,
  '$cor',
  9999
);";

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

public function delete_imagem($id)
{
  $st_query = "
  SELECT id, idcatalogo, imagem
  FROM catalogoimagens
  WHERE idcatalogo = $id
  ";

  $r = array(); 
  $i=0;
  $imagem ="";
  $imagemp = "";

  try
  {
   $dbh=getdbh();
   $stmt = $dbh->query($st_query);
   while ($row = $stmt->fetch()) {
    $imagem = "imagens/" . trim($row["imagem"]);
    $imagemp = "imagens/mini_/" . trim($row["imagem"]);
    if(trim($row["imagem"]) != "") {
      unlink($imagem);
      unlink($imagemp);
    }
    $this->delete_imagem_id($row["idcatalogo"]);
  }
}
catch(PDOException $e)
{}  


return $r;
}   

public function delete_imagem_id($idcatalogo)
{

  $st_query = "
  DELETE FROM catalogoimagens
  WHERE idcatalogo = $idcatalogo";
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


public function delete_imagem_unica($id)
{

  $st_query = "
  DELETE FROM catalogoimagens
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


public function delete_modelo($id)
{

  $st_query = "
  DELETE FROM catalogomodelos
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



public function delete_tamanho($id)
{

  $st_query = "
  DELETE FROM catalogotamanhos
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


public function delete_cor($id)
{

  $st_query = "
  DELETE FROM catalogocores
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



public function get_Modelos()
{

  $st_query = "
  SELECT id,
  idcatalogo,
  modelo
  FROM catalogomodelos
  WHERE idcatalogo =  $this->id
  AND quantidade <> 0
  ORDER BY id";

  $i=0;
  $r = "<ul id='list-modelos'>";

  try
  {
   $dbh=getdbh();
   $stmt = $dbh->query($st_query);
   while ($row = $stmt->fetch()) {

     $i++;
     $r .= "<li><a href=javascript:void(0) onclick=excluir_modelo('". $row["id"] ."')>X</a>". $row["modelo"] ."</li>";
   }
 }
 catch(PDOException $e)
 {}  


 $r.'</ul>';

 if($i == 0){
  $r =  "<input type='hidden' name='modelo' id='modelo' value='0'>";
}

return $r;
} 



public function get_Tamanhos()
{

 $st_query = "
 SELECT id,
 idcatalogo,
 tamanho
 FROM catalogotamanhos
 WHERE idcatalogo =  $this->id
 AND quantidade <> 0
 ORDER BY id";

 $i=0;

 $r = "<ul id='list-tamanhos'>";

 try
 {
   $dbh=getdbh();
   $stmt = $dbh->query($st_query);
   while ($row = $stmt->fetch()) {

     $i++;

     $r .= "<li><a href=javascript:void(0) onclick=excluir_tamanho('". $row["id"] ."')>X</a>". $row["tamanho"] ."</li>";


   }
 }
 catch(PDOException $e)
 {} 

 $r.'</ul>';

 if($i == 0){
  $r =  "<input type='hidden' name='tamanho' id='tamanho' value='0'>";
}

return $r;
} 



public function get_Cores()
{

 $st_query = "
 SELECT id,
 idcatalogo,
 cor
 FROM catalogocores
 WHERE idcatalogo =  $this->id
 AND quantidade <> 0
 ORDER BY id";
 $i=0;

 $r = "<ul id='list-cores'>";

 try
 {
   $dbh=getdbh();
   $stmt = $dbh->query($st_query);
   while ($row = $stmt->fetch()) {

     $i++;
     $r .= "<li><a href=javascript:void(0) onclick=excluir_cor('". $row["id"] ."')>X</a><span style=padding-left:15px;background-color:#". $row["cor"] .">&nbsp;</span>&nbsp;". $row["cor"] ."</li>";
   }
 }
 catch(PDOException $e)
 {} 


 $r.'</ul>';

 if($i == 0){
  $r =  "<input type='hidden' name='cor' id='cor' value='0'>";
}
return $r;
} 

public function set_vitrine($id,$vitrine)
{
  $st_query = "
  UPDATE catalogo
  SET
  vitrine = $vitrine
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


public function set_ativo($id,$ativo)
{
  $st_query = "
  UPDATE catalogo
  SET
  ativo = $ativo
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

public function update_ordem_imagem($id,$ordem)
{
  $st_query = "
  UPDATE catalogoimagens
  SET
  ordem = $ordem
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

public function trocar_modulo($id,$idmodulo)
{
  $st_query = "
  UPDATE catalogo
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
  UPDATE catalogo
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

}

?>