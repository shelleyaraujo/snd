<?php
class ImoveisModel extends Model
{
  private $id;
  private $idcategoria;
  private $perfil;
  private $codigo; 
  private $imagem;
  private $preco;
  private $suites;
  private $descricao;
  private $dormitorios;
  private $area;

  private $forma;
  private $bairro; 
  private $cidade;
  private $estado; 
  private $vitrine;
  private $idimagem;
  private $ativo;

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

  public function setPerfil( $perfil )
  {
    $this->perfil = $perfil;
    return $this;
  }

  public function getPerfil()
  {
    return $this->perfil;
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

  public function setForma( $forma )
  {
    $this->forma = $forma;
    return $this;
  }

  public function getForma()
  {
    return $this->forma;
  }

  public function setDormitorios( $dormitorios )
  {
    $this->dormitorios = $dormitorios;
    return $this;
  }

  public function getDormitorios()
  {
    return $this->dormitorios;
  }  

  public function setArea( $area )
  {
    $this->area = $area;
    return $this;
  }

  public function getArea()
  {
    return $this->area;
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

  public function setSuites( $suites )
  {
    $this->suites = $suites;
    return $this;
  }

  public function getSuites()
  {
    return $this->suites;
  } 

  public function setBairro( $bairro )
  {
    $this->bairro = $bairro;
    return $this;
  }

  public function getBairro()
  {
    return $this->bairro;
  } 

  public function setCidade( $cidade )
  {
    $this->cidade = $cidade;
    return $this;
  }

  public function getCidade()
  {
    return $this->cidade;
  } 

  public function setEstado( $estado )
  {
    $this->estado = $estado;
    return $this;
  }

  public function getEstado()
  {
    return $this->estado;
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

  public function setIdImagem( $idimagem )
  {
    $this->idimagem = $idimagem;
    return $this;
  }

  public function getIdImagem()
  {
    return $this->idimagem;
  } 

  public function setAtivo( $ativo )
  {
    $this->ativo = $ativo;
    return $this;
  }

  public function getAtivo()
  {
    return $this->ativo;
  } 

  public function readItem()
  {
    $st_query = "
    SELECT
    id,
    dma,
    idcategoria,
    codigo,
    perfil,
    forma,
    preco,
    area,
    dormitorios,
    suites,
    bairro,
    cidade,
    estado,
    status,
    descricao,
    idusuario    
    FROM imoveis
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
      $r[4] = $row["perfil"];
      $r[5] = $row["forma"];
      $r[6] = $row["preco"];
      $r[7] = $row["area"];
      $r[8] = $row["dormitorios"];
      $r[9] = $row["suites"];
      $r[10] = $row["bairro"];
      $r[11] = $row["cidade"];
      $r[12] = $row["estado"];
      $r[13] = $row["status"];
      $r[14] = $row["idusuario"];
      $r[15] = $row["descricao"];

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

  $i = 0;
  $l=0;
  $totallinhas = 0;
  $linhas = $ln;
  $paginas = 0;

  $dbh=getdbh();
  $totallinhas = current($dbh->query("select count(*) from imoveis 
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
  perfil,
  forma,
  preco,
  area,
  dormitorios,
  suites,
  bairro,
  cidade,
  estado,
  status,
  descricao,
  idusuario
  FROM imoveis
  WHERE idcategoria = $this->idcategoria
  AND ativo = 1
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
      $r[$l][4] = $row["perfil"];
      $r[$l][5] = $row["forma"];
      $r[$l][6] = $row["preco"];
      $r[$l][7] = $row["area"];
      $r[$l][8] = $row["dormitorios"];
      $r[$l][9] = $row["suites"];
      $r[$l][10] = $row["bairro"];
      $r[$l][11] = $row["cidade"];
      $r[$l][12] = $row["estado"];
      $r[$l][13] = $row["status"];
      $r[$l][14] = $row["idusuario"];
      $r[$l][15] = $row["descricao"];
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


public function readItensVitrine($ln, $x, $y, $ordem) {

  $i = 0;
  $l=0;
  $totallinhas = 0;
  $linhas = $ln;
  $paginas = 0;

  $dbh=getdbh();
  $totallinhas = current($dbh->query("select count(*) from imoveis WHERE vitrine = 1")->fetch());
  $paginas = $totallinhas / $linhas;

  $st_query = "
  SELECT 
  id,
  dma,
  idcategoria,
  codigo,
  perfil,
  forma,
  preco,
  area,
  dormitorios,
  suites,
  bairro,
  cidade,
  estado,
  status,
  descricao,
  vitrine,
  idusuario,
  ativo
  FROM imoveis
  WHERE vitrine = 1
  ORDER BY id desc";

  try  {
   $dbh=getdbh();
   $stmt = $dbh->query($st_query);
   while ($row = $stmt->fetch()) {
    if ($i >= $x) {
      $r[$l][0] = $row["id"];
      $r[$l][1] = $row["dma"];
      $r[$l][2] = $row["idcategoria"];
      $r[$l][3] = $row["codigo"];
      $r[$l][4] = $row["perfil"];
      $r[$l][5] = $row["forma"];
      $r[$l][6] = $row["preco"];
      $r[$l][7] = $row["area"];
      $r[$l][8] = $row["dormitorios"];
      $r[$l][9] = $row["suites"];
      $r[$l][10] = $row["bairro"];
      $r[$l][11] = $row["cidade"];
      $r[$l][12] = $row["estado"];
      $r[$l][13] = $row["status"];
      $r[$l][14] = $row["idusuario"];
      $r[$l][15] = $row["descricao"];
      $r[$l][16] = $row["vitrine"];
      $r[$l][17] = $row["idusuario"];
      $r[$l][18] = $row["ativo"];
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


public function readItensDesativados($ln, $x, $y, $ordem) {

  $i = 0;
  $l=0;
  $totallinhas = 0;
  $linhas = $ln;
  $paginas = 0;

  $dbh=getdbh();
  $totallinhas = current($dbh->query("select count(*) from imoveis WHERE ativo=0")->fetch());
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
  perfil,
  forma,
  preco,
  area,
  dormitorios,
  suites,
  bairro,
  cidade,
  estado,
  status,
  descricao,
  vitrine,
  idusuario,
  ativo
  FROM imoveis
  WHERE ativo = 0
  ORDER BY dma";


  try  {
   $dbh=getdbh();
   $stmt = $dbh->query($st_query);
   while ($row = $stmt->fetch()) {
    if ($i >= $x) {
      $r[$l][0] = $row["id"];
      $r[$l][1] = $row["dma"];
      $r[$l][2] = $row["idcategoria"];
      $r[$l][3] = $row["codigo"];
      $r[$l][4] = $row["perfil"];
      $r[$l][5] = $row["forma"];
      $r[$l][6] = $row["preco"];
      $r[$l][7] = $row["area"];
      $r[$l][8] = $row["dormitorios"];
      $r[$l][9] = $row["suites"];
      $r[$l][10] = $row["bairro"];
      $r[$l][11] = $row["cidade"];
      $r[$l][12] = $row["estado"];
      $r[$l][13] = $row["status"];
      $r[$l][14] = $row["idusuario"];
      $r[$l][15] = $row["descricao"];
      $r[$l][16] = $row["vitrine"];
      $r[$l][17] = $row["idusuario"];
      $r[$l][18] = $row["ativo"];
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
 idimovel,
 imagem
 FROM imoveisimagens
 WHERE idimovel = $this->id
 ORDER BY ordem";

 $r = array();	
 $i=0;

 try
 {
   $dbh=getdbh();
   $stmt = $dbh->query($st_query);
   while ($row = $stmt->fetch()) {

     $r[$i][0] = $row["id"];
     $r[$i][1] = $row["idimovel"];
     $r[$i][2] = $row["imagem"];

     $sliders = "";
     $classe = "";

     $sliders .= "<div class='swiper-slide' id=slider". $i .">";
     $sliders .= "<div>";
     $sliders .= "<div>";
     $sliders .= "<div>";
     $sliders .= $row["imagem"];
     $sliders .= "</div>";
     $sliders .= "</div>";
     $sliders .= "</div>";
     $sliders .= "<img src='". myUrl("imagens/sliders/" . $row["imagem"]) ."' alt='". $row["imagem"] ."' title='". $row["imagem"] ."' style='width:100%;height:auto' width='1400' height='350' />";
     $sliders .= "</div>";

     $i++;
   }
 }
 catch(PDOException $e)
 {}	
 return $r;
} 		

public function readItemMiniaturas2()
{
 $st_query = "
 SELECT id,
 idimovel,
 imagem
 FROM imoveisimagens
 WHERE idimovel = $this->id
 ORDER BY ordem";

 $r = array();  
 $i=0;

 try
 {
   $dbh=getdbh();
   $stmt = $dbh->query($st_query);
   while ($row = $stmt->fetch()) {

     $sliders .= "<div class='swiper-slide' id=slider". $i .">";
     $sliders .= "<div>";
     $sliders .= "<div class=''>";
     $sliders .= "</div>";
     $sliders .= "</div>";
     $sliders .= "<img src='". myUrl("imagens/imoveis/" . $row["imagem"]) ."' alt='". $row["imagem"] ."' title='". $row["titulo"] ."' style='width:100%;height:auto' width='1400' height='350' />";
     $sliders .= "</div>";

     $i++;
   }
 }
 catch(PDOException $e)
 {} 
 return $r;
}     

public function readItemImagem($idimovel)
{

 $st_query = "
 SELECT id,
 idimovel,
 imagem, ordem
 FROM imoveisimagens
 WHERE idimovel = $idimovel
 ORDER BY id desc"
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
   $r[0][1] = $row["idimovel"];
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
 idimoveis,
 cor
 FROM imoveiscores
 WHERE idimoveis =  $this->id
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
  $r =  "<input type='hidden' name='cor' id='cor' value='0'>";
}
return $r;
} 

public function getTamanhos()
{

 $st_query = "
 SELECT id,
 idimoveis,
 tamanho
 FROM imoveistamanhos
 WHERE idimoveis =  $this->id
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
  $r =  "<input type='hidden' name='tamanho' id='tamanho' value='0'>";
}

return $r;
} 


public function getModelos()
{

  $st_query = "
  SELECT id,
  idimoveis,
  modelo
  FROM imoveismodelos
  WHERE idimoveis =  $this->id
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


 $r.'</ul>';

 if($i == 0){
  $r =  "<input type='hidden' name='modelo' id='modelo' value='0'>";
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

  $totallinhas = current($stmt->query("select count(*) from imoveis WHERE vitrine=1")->fetch());
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
  FROM imoveis
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

    public function get_relacionados($ordem_imoveis)
    {

      $st_query = "
      SELECT id,
      idimoveis,
      idmodulo
      FROM imoveisrelacionados
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

         $r[$i] = $this->get_imoveis_relacionados($row["idimoveis"], $ordem_imoveis);
         $i++;
       }            
     }
     catch(PDOException $e)
     {}  

     return $r;
   } 

   public function get_imoveis_relacionados($id, $ordem)
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
    FROM imoveis
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
      imoveis 
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
  FROM imoveis
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




     public function read_itens_perfil($ln, $x, $y, $busca) {
      $i = 0;
      $l=0;
      $totallinhas = 0;
      $linhas = $ln;
      $paginas = 0;

      $dbh=getdbh();
      $totallinhas = current($dbh->query("
        SELECT count(*) 
        FROM imoveis 
        WHERE perfil 
        LIKE '$busca%%'
        AND ativo=1")->fetch());
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
      perfil,
      forma,
      preco,
      area,
      dormitorios,
      suites,
      bairro,
      cidade,
      estado,
      status,
      descricao,
      idusuario
      FROM imoveis
      WHERE perfil
      LIKE '$busca%%'
      AND ativo = 1
      ORDER BY id desc";

      try  {
       $dbh=getdbh();
       $stmt = $dbh->query($st_query);
       while ($row = $stmt->fetch()) {
        if ($i >= $x) {
          $r[$l][0] = $row["id"];
          $r[$l][1] = $row["dma"];
          $r[$l][2] = $row["idcategoria"];
          $r[$l][3] = $row["codigo"];
          $r[$l][4] = $row["perfil"];
          $r[$l][5] = $row["forma"];
          $r[$l][6] = $row["preco"];
          $r[$l][7] = $row["area"];
          $r[$l][8] = $row["dormitorios"];
          $r[$l][9] = $row["suites"];
          $r[$l][10] = $row["bairro"];
          $r[$l][11] = $row["cidade"];
          $r[$l][12] = $row["estado"];
          $r[$l][13] = $row["status"];
          $r[$l][14] = $row["idusuario"];
          $r[$l][15] = $row["descricao"];
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



public function busca_imoveis($ln, $x, $y, $busca) {

  $i = 0;
  $l=0;
  $totallinhas = 0;
  $linhas = $ln;
  $paginas = 0;

  $dbh=getdbh();
  $totallinhas = current($dbh->query("
    SELECT count(*) 
    FROM imoveis
    WHERE descricao
    LIKE '%%$busca%%'
    OR codigo
    LIKE '%%$busca%%'
    OR perfil
    LIKE '%%$busca%%'
    OR cidade
    LIKE '%%$busca%%'
    OR bairro
    LIKE '%%$busca%%'
    OR preco
    LIKE '%%$busca%%'
    OR forma
    LIKE '%%$busca%%'

    ")->fetch());

  $paginas = $totallinhas / $linhas;

  $st_query = "
  SELECT 
  id,
  dma,
  idcategoria,
  codigo,
  perfil,
  forma,
  preco,
  area,
  dormitorios,
  suites,
  bairro,
  cidade,
  estado,
  status,
  descricao,
  idusuario    
  FROM imoveis
  WHERE descricao
  LIKE '%%$busca%%'
  OR codigo
  LIKE '%%$busca%%'
  OR perfil
  LIKE '%%$busca%%'
  OR cidade
  LIKE '%%$busca%%'
  OR bairro
  LIKE '%%$busca%%'
  OR preco
  LIKE '%%$busca%%'
  ORDER BY dma";

  $r = array();   
  $i=0;
  $r[3][0] = "";

  try  {
   $dbh=getdbh();
   $stmt = $dbh->query($st_query);
   while ($row = $stmt->fetch()) {
    if ($i >= $x) {
      $r[$l][0] = $row["id"];
      $r[$l][1] = $row["dma"];
      $r[$l][2] = $row["idcategoria"];
      $r[$l][3] = $row["codigo"];
      $r[$l][4] = $row["perfil"];
      $r[$l][5] = $row["forma"];
      $r[$l][6] = $row["preco"];
      $r[$l][7] = $row["area"];
      $r[$l][8] = $row["dormitorios"];
      $r[$l][9] = $row["suites"];
      $r[$l][10] = $row["bairro"];
      $r[$l][11] = $row["cidade"];
      $r[$l][12] = $row["estado"];
      $r[$l][13] = $row["status"];
      $r[$l][14] = $row["idusuario"];
      $r[$l][15] = $row["descricao"];
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


/*TAO*/

public function getTotalRegistros() {

 $dbh=getdbh();
 $r = current($dbh->query("select count(*) from imoveis")->fetch());
 return $r;
}


public function getTotalRegistrosCategoria($idcategoria) {

 $dbh=getdbh();
 $r = current($dbh->query("select count(*) from imoveis WHERE idcategoria = " . $idcategoria)->fetch());
 return $r;
}

public function delete_imovel($id)
{

  $st_query = "
  DELETE FROM imoveis
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
  FROM imoveis 
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
    $r[3] = $row["codigo"];
    $r[4] = $row["perfil"];
    $r[5] = $row["forma"];
    $r[6] = $row["preco"];
    $r[7] = $row["area"];
    $r[8] = $row["dormitorios"];
    $r[9] = $row["suites"];
    $r[10] = $row["bairro"];
    $r[11] = $row["cidade"];
    $r[12] = $row["estado"];
    $r[13] = $row["status"];
    $r[14] = $row["idusuario"];
    $r[15] = $row["descricao"];
    $r[16] = $row["vitrine"];
    $r[17] = $row["ativo"];
  }
}
catch(PDOException $e)
{}  

return $r;
}

public function update_item_imovel()
{
  $st_query = "
  UPDATE imoveis
  SET
  codigo = '$this->codigo',
  perfil = '$this->perfil',
  forma = '$this->forma',
  preco = $this->preco,
  area = '$this->area',
  suites = $this->suites,
  dormitorios = $this->dormitorios,
  bairro = '$this->bairro',
  cidade = '$this->cidade',
  estado = '$this->estado',
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
  idimovel,
  imagem, ordem
  FROM imoveisimagens
  WHERE idimovel = $this->id
  ORDER BY ordem
  ";

  $r = array(); 
  $r = array();
  $i=0;

  try
  {
   $dbh=getdbh();
   $stmt = $dbh->query($st_query);
   while ($row = $stmt->fetch()) {
    $r[$i][0] = $row["id"];
    $r[$i][1] = $row["idimovel"];
    $r[$i][2] = $row["imagem"];
    $r[$i][3] = $row["ordem"];        
    $i++;
  }
}
catch(PDOException $e)
{}  
return $r;
}   


public function add_imagem($idimovel,$imagem) {

//   $ordem = $this->getUltimoRegistroOrdem() + 1; // PEGA A ORDEM DO ULTIMO REGISTRO E SOMA MAIS 1

  $imagem = TRIM($imagem);

  $st_query = "
  INSERT INTO imoveisimagens
  (
  idimovel,
  imagem,
  ordem
)
VALUES
(
  $idimovel,
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


public function delete_imagem($id)
{
  $st_query = "
  SELECT id, idimovel, imagem
  FROM imoveisimagens
  WHERE idimovel = $id
  ";

  $r = array(); 
  $i=0;
  $imagem ="";

  try
  {
   $dbh=getdbh();
   $stmt = $dbh->query($st_query);
   while ($row = $stmt->fetch()) {
    $imagem = "imagens/imoveis/" . trim($row["imagem"]);
    if(trim($row["imagem"] != "") {
      unlink($imagem);
    }
    $this->delete_imagem_id($row["idimovel"]);
  }
}
catch(PDOException $e)
{}  


return $r;
}   

public function delete_imagem_id($idimovel)
{

  $st_query = "
  DELETE FROM imoveisimagens
  WHERE idimovel = $idimovel";
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

public function xxdelete_imagem($id)
{

  $st_query = "
  DELETE FROM imoveisimagens
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



public function set_vitrine($id,$vitrine)
{
  $st_query = "
  UPDATE imoveis
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
  UPDATE imoveis
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
  UPDATE imoveisimagens
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
  UPDATE imoveis
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

}

?>