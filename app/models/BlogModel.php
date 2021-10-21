<?php

class BlogModel extends Model
{
  private $idcategoria;
  private $id;
  private $titulo;
  private $texto;
  private $classe; 
  private $plugin;
  private $url;

  public function setIdCategoria( $idcategoria )
  {
    $this->idcategoria = $idcategoria;
    return $this;
  }

  public function getIdCategoria()
  {
    return $this->idcategoria;
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


  public function setTitulo( $titulo )
  {
    $this->titulo = $titulo;
    return $this;
  }

  public function getTitulo()
  {
    return $this->titulo;
  }

  public function setTexto( $texto )
  {
    $this->texto = $texto;
    return $this;
  }

  public function getTexto()
  {
    return $this->texto;
  }

  public function setPlugin( $plugin )
  {
    $this->plugin = $plugin;
    return $this;
  }

  public function getPlugin()
  {
    return $this->plugin;
  }

  public function setClasse( $classe )
  {
    $this->classe = $classe;
    return $this;
  }

  public function getClasse()
  {
    return $this->classe;
  }

  public function setUrl( $url )
  {
    $this->url = $url;
    return $this;
  }

  public function getUrl()
  {
    return $this->url;
  }

  function __construct()
  {
    parent::__construct();
  }


  public function readConteudoById($id) {

    $st_query = "
    SELECT id, titulo, texto, idcategoria
    FROM blog 
    WHERE id = $id";

    $r = "";  
    $url_sem_replace = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . '%26categoria=0';
    $url = str_replace("?", "%3F", $url);
    $url = str_replace("&", "%26", $url);
    $url = str_replace("/", "%2F", $url);
    $url = str_replace(":", "%3A", $url);
    //$url .= "%26idcategoria=0";

    $v="0";

    try {
     $dbh=getdbh();
     $stmt = $dbh->query($st_query);
     while ($row = $stmt->fetch()) {
      $vex = explode("v=", $row["url"]); // quebra a url da string que contem o video
      if(isset($vex[1])) {
        $vex2 = explode("&", $vex[1]); 
        $v = str_replace("<p>", "", $vex2[0]);
        $v = str_replace("</p>", "", $v);
        $v = str_replace("&", "%26", $v);
        $v = trim($v);
      } // fim da quebra

      $r .= "<div id='ctd-". $row["id"] ."' class='ctd'>";



      if(isset($_SESSION["credencial"])) {
        if($_SESSION["credencial"] == "0" || $_SESSION["credencial"] == "1") {
          $r .= "<a href='". myUrl("tao/editar_blog/?idblog=") . $row["id"] ."' class='editar'>Editar</a>";
        }
      }

      $r .= "<h1>" . $row["titulo"] . "</h1>";
      
      if($row["url"] != "") {
        $r .= "<a href='?controle=VideosYoutube&acao=open&id=". $o_ret->idcategoria ."&idcategoria=".  $row["idcategoria"] ."&video=". $v ."'>";
        $r .= "<img src='http://i1.ytimg.com/vi/". $v ."/default.jpg' />";
        $r .= "</a>";
      }

      $r .= str_replace("../../imagens/",myUrl() . "imagens/",$row["texto"]);
      $r .= "</div>";
      if($row["plugin"] !=""){
        $array = file("plugin/" . $row["plugin"]  . ".php");
        foreach($array as $line)        {
          $r .= str_replace("url-plugin",$url,$line);          
        }
      }  
    }
  }
  catch(PDOException $e) {
  }  
  $r = str_replace("<h1></h1>","",$r);
  $r = str_replace("url_sem_replace",$url_sem_replace,$r);
  $r = str_replace("-iframe","<iframe",$r);
  $r = str_replace("-/iframe-","></iframe>",$r);
  return $r;
}


public function readConteudoByIdTexto($id) {
  $st_query = "
  SELECT id, titulo, texto, classe, plugin, url, idcategoria
  FROM blog 
  WHERE id = $id";

  $r = "";  
  $url_sem_replace = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
  $url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . '%26categoria=0';
  $url = str_replace("?", "%3F", $url);
  $url = str_replace("&", "%26", $url);
  $url = str_replace("/", "%2F", $url);
  $url = str_replace(":", "%3A", $url);
  //$url .= "%26idcategoria=0";
  $v="0";

  try {
   $dbh=getdbh();
   $stmt = $dbh->query($st_query);
   while ($row = $stmt->fetch()) {
    $vex = explode("v=", $row["url"]); // quebra a url da string que contem o video 
    if(isset($vex[1])) {
      $vex2 = explode("&", $vex[1]); 
      $v = str_replace("<p>", "", $vex2[0]);
      $v = str_replace("</p>", "", $v);
      $v = str_replace("&", "%26", $v);
      $v = trim($v);
    } // fim da quebra


    $r .= "<div id='ctd-". $row["id"] ."' class='ctd'>";

    if(isset($_SESSION["credencial"])) {
      if($_SESSION["credencial"] == "0" || $_SESSION["credencial"] == "1") {
        $r .= "<a href='". myUrl("tao/editar_modulo/?idblog=") . $row["id"] ."' class='editar'>Editar</a>";
      }
    }

    if($row["url"] != "") {
      $r .= "<a href='?controle=VideosYoutube&acao=open&id=". $row["idcategoria"] ."&idcategoria=".  $row["idcategoria"] ."&video=". $v ."'>";
      $r .= "<img src='http://i1.ytimg.com/vi/". $v ."/default.jpg' />";
      $r .= "</a>";
    }

    $r .= str_replace("../../imagens/",myUrl() . "imagens/",$row["texto"]);
    $r .= "</div>";
    if($row["plugin"] !=""){
      $array = file("plugin/" . $row["plugin"]  . ".php");
      foreach($array as $line)        {
        $r .= str_replace("url-plugin",$url,$line);          
      }
    }  
  }
}
catch(PDOException $e)
{}  

$r = str_replace("<h1></h1>","",$r);

$r = str_replace("url_sem_replace",$url_sem_replace,$r);

$r = str_replace("-iframe","<iframe",$r);
$r = str_replace("-/iframe-","></iframe>",$r);

return $r;
}

public function readConteudoByIdTitulo($id) {
  $st_query = "
  SELECT id, titulo
  FROM blog 
  WHERE id = $id";

  $r = "";  
  try {
   $dbh=getdbh();
   $stmt = $dbh->query($st_query);
   while ($row = $stmt->fetch()) {
    $r .= "<h1>" . $row["titulo"] . "</h1>";
  }
}
catch(PDOException $e)
{}  

$r = str_replace("<h1></h1>","",$r);
return $r;
}


public function readConteudoIdDestaque($ididdestaque) {
  $st_query = "
  SELECT id, titulo, texto, classe, plugin
  FROM blog 
  WHERE iddestaque = $ididdestaque";

  $r = array();  

  try {
   $dbh=getdbh();
   $stmt = $dbh->query($st_query);
   while ($row = $stmt->fetch()) {
    $r[0] = $row["id"];  
    $r[1] = $row["titulo"];  
    $r[2] = $row["texto"];  
  }
}
catch(PDOException $e)
{}  
return $r;
}

public function readConteudoIdDestaqueFixo($ididdestaque) {
  $st_query = "
  SELECT id, titulo, texto
  FROM blogfixo
  WHERE iddestaque = $ididdestaque";

  $r = array();  

  try {
   $dbh=getdbh();
   $stmt = $dbh->query($st_query);
   while ($row = $stmt->fetch()) {
    $r[0] = $row["id"];  
    $r[1] = $row["titulo"];  
    $r[2] = $row["texto"];  
  }
}
catch(PDOException $e)
{}  
return $r;
}

public function getRow($id)
{
  $st_query = "
  SELECT id, titulo, texto, vitrine
  FROM blog 
  WHERE id = $id";
  $r = array(); 

  try
  {
   $dbh=getdbh();
   $stmt = $dbh->query($st_query);
   while ($row = $stmt->fetch()) {
    $r[0] = $row["id"];
    $r[1] = $row["titulo"];
    $r[2] = $row["texto"];
    $r[6] = $row["vitrine"];

  }
}
catch(PDOException $e)
{}  
$r = str_replace("-iframe","<iframe",$r);
$r = str_replace("-/iframe-","></iframe>",$r);
return $r;
}


public function getRowDestaque($iddestaque)
{
  $st_query = "
  SELECT id, titulo, texto, classe, plugin, url, vitrine
  FROM blog 
  WHERE iddestaque = $iddestaque";
  $r = array(); 

  try
  {
   $dbh=getdbh();
   $stmt = $dbh->query($st_query);
   while ($row = $stmt->fetch()) {
    $r[0] = $row["id"];
    $r[1] = $row["titulo"];
    $r[2] = $row["texto"];
    $r[6] = $row["vitrine"];

  }
}
catch(PDOException $e)
{}  
$r = str_replace("-iframe","<iframe",$r);
$r = str_replace("-/iframe-","></iframe>",$r);
return $r;
}


public function readConteudosByIdDestaque($iddestaque)
{
  $st_query = "
  SELECT id, titulo, texto 
  FROM blog 
  WHERE iddestaque = $iddestaque
  ORDER BY ordem";

  $r = "";  

  try
  {
   $o_data = $this->o_db->query($st_query);
   $i=0;
   while($o_ret = $o_data->fetchObject())
   {

    $r .= "<div id='dst-". $o_ret->id ."' class='dst'>";
    $r .= "<h3>";
    $r .= $o_ret->titulo;
    $r .= "</h3>";
    $r .= $o_ret->texto;
    $r .= "</div>";

    $url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $url = str_replace("?", "%3F", $url);
    $url = str_replace("&", "%26", $url);
    $url = str_replace("/", "%2F", $url);
    $url = str_replace(":", "%3A", $url);
    
    $array = file("plugin/" . $o_ret->plugin  . ".php");
    foreach($array as $line)
    {
      $r .= str_replace("url-plugin",$url,$line);
    }

    $i++;
  }
}
catch(PDOException $e)
{}  

$r = str_replace("<h3></h3>","",$r);

$r = str_replace("-iframe","<iframe",$r);
$r = str_replace("-/iframe-","></iframe>",$r);


$r = $r;
}   




public function readConteudosIdDestaque($iddestaque)
{
  $st_query = "
  SELECT id, titulo, texto, classe, plugin
  FROM blog 
  WHERE iddestaque = $iddestaque
  ORDER BY ordem";

  $r = "";
  $dr = array();  

  try
  {
    $dbh=getdbh();
    $stmt = $dbh->query($st_query);
    while ($row = $stmt->fetch()) { 

      if(isset($_SESSION["credencial"])) {
        if($_SESSION["credencial"] == "0" || $_SESSION["credencial"] == "1") {
          $r .= "<a href='". myUrl("tao/editar_blog/?idblog=") . $row["id"] ."' class='editar'>Editar</a>";
        }
      }

      $r .= "<h3>" . $row["titulo"]. "</h3>";
      $r .= str_replace("../../imagens/",myUrl() . "imagens/",$row["texto"]);   

      $url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
      $url = str_replace("?", "%3F", $url);
      $url = str_replace("&", "%26", $url);
      $url = str_replace("/", "%2F", $url);
      $url = str_replace(":", "%3A", $url);

      if($row["plugin"] !=""){
        $array = file("plugin/" . $row["plugin"]  . ".php");
        foreach($array as $line)
        {
          $r .= str_replace("url-plugin",$url,$line);
        }       
      } 

    }
  }
  catch(PDOException $e)
  {}  

  $r = str_replace("-iframe","<iframe",$r);
  $r = str_replace("-/iframe-","></iframe>",$r);


  $r = str_replace("<h3></h3>","",$r);

  return $r;

}   

public function readConteudosIdDestaqueFixo($iddestaque)
{
  $st_query = "
  SELECT id, titulo, texto
  FROM blogfixo 
  WHERE iddestaque = $iddestaque
";

  $r = "";

  try
  {
   $dbh=getdbh();
   $stmt = $dbh->query($st_query);
   while ($row = $stmt->fetch()) {
     {
      $r .= $row["texto"];
    }
  }
} catch (PDOException $e) {

} 

$r = str_replace("-iframe","<iframe",$r);
$r = str_replace("-/iframe-","></iframe>",$r);

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
  $totallinhas = current($dbh->query("select count(*) from blog WHERE idcategoria=".$this->idcategoria)->fetch());
  $paginas = $totallinhas / $linhas;

  // die($paginas);

  $r = array();   
  $i=0;
  $r[3][0] = "";

  $st_query = "
  SELECT id,
  dma,
  idcategoria,
  titulo,
  texto,
  ordem
  FROM blog 
  WHERE idcategoria = $this->idcategoria
  ORDER BY $ordem";

  $texto ="";

  try  {
   $dbh=getdbh();
   $stmt = $dbh->query($st_query);
   while ($row = $stmt->fetch()) {

    if ($i >= $x) {
      $r[$l][0] = $row["id"];
      $r[$l][1] = $row["dma"];
      $r[$l][2] = $row["idcategoria"];
      $r[$l][3] = $row["titulo"];

      $texto = str_replace("-iframe","<iframe",$row["texto"]);
      $texto = str_replace("-/iframe-","></iframe>",$texto);

      $r[$l][4] = str_replace("../../imagens/",myUrl() . "imagens/",$texto);
      $r[$l][5] = $row["ordem"];

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

public function readConteudoByContainerCaixaTextoFlex($idcontainerscaixatextoflex) {

  $r =  ""; 
  $i=0; 

  if($idcontainerscaixatextoflex > 0) {

    $st_query = "
    SELECT id, titulo, texto, classe, plugin, url
    FROM blog 
    WHERE idcontainerscaixatextoflex = $idcontainerscaixatextoflex
    ORDER BY ordem";

    $url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $url = str_replace("?", "%3F", $url);
    $url = str_replace("&", "%26", $url);
    $url = str_replace("/", "%2F", $url);
    $url = str_replace(":", "%3A", $url);

    try  {
     $dbh=getdbh();
     $stmt = $dbh->query($st_query);
     while ($row = $stmt->fetch()) {


      $r .= "<div id='ctd-". $row["id"] ."' class='ctd w" . $row["classe"] ."'>";

      if(isset($_SESSION["credencial"])) {
        if($_SESSION["credencial"] == "0" || $_SESSION["credencial"] == "1") {
          $r .= "<a href='". myUrl("tao/editar_blog/?idblog=") . $row["id"] ."' class='editar'>Editar</a>";
        }
      }
      $r .= "<div>";
      $r .= "<h3>" . $row["titulo"] . "</h3>";
      $r .= str_replace("../../imagens/",myUrl() . "imagens/",$row["texto"]);

      if($row["plugin"] !=""){
        $array = file("plugin/" . $row["plugin"]  . ".php");
        foreach($array as $line)        {
          $r .= str_replace("url-plugin",$url,$line);          
        }
      }  
      $r .= "</div>";
      $r .= "</div>";
    }
  }
  catch(PDOException $e)
  {} 

}


$r = str_replace("-iframe","<iframe",$r);
$r = str_replace("-/iframe-","></iframe>",$r);


return $r;

} 

public function readConteudosVitrine($ordenar)  {
  $st_query = "
  SELECT id, dma, titulo, texto, ordem, vitrine, idcategoria
  FROM blog 
  WHERE vitrine = 1
  ORDER BY $ordenar";

  $r = "";  
  $r = array();
  $i=0;
  $r = "<div class='blog-vitrine'>";

  try
  {
   $dbh=getdbh();
   $stmt = $dbh->query($st_query);
   while ($row = $stmt->fetch()) {

    if($row["vitrine"] == "1") {
      $vitrine = "lightblue";
    }

    $idcategoria = $this->readModuloByIdConteudo($row["idcategoria"]);

    if(isset($idcategoria[0]) == "") {
      $idcategoria[0] = "1";
      $idcategoria[1] = "1";
    }

    $r .= "<div>";
    $r .= "<div>";
    $r .= "<h3>" . $row["titulo"] . "</h3>";
    if($row["texto"] != "") {
      $r .=  substr($row["texto"], 0, 200) . "...";
      $r .= "<br>";

      $r .= "<a class='leia-mais' href='" . myUrl("textoslinks/index/". $idcategoria[1] ."/". $idcategoria[0] ."/?idtexto=". $row["id"] ."'>Leia mais</a>");
    } else {
      $r .= $row["texto"];
    }
    $r .= "</div>";
    $r .= "</div>";
    $i++;

  }
}
catch(PDOException $e)
{}  

$r .= "</div>";

$r = str_replace("-iframe","<iframe",$r);
$r = str_replace("-/iframe-","></iframe>",$r);
return  $r;
}   

public function read_posts_home($ordenar)  {
  $st_query = "
  SELECT id, dma, titulo, texto, ordem, vitrine, idcategoria
  FROM blog 
  WHERE vitrine = 1
  ORDER BY $ordenar";

  $r = "";  
  $r = array();
  $i=0;
  $r = "<div class='blog-vitrine'>";

  try
  {
   $dbh=getdbh();
   $stmt = $dbh->query($st_query);
   while ($row = $stmt->fetch()) {

    if($row["vitrine"] == "1") {
      $vitrine = "lightblue";
    }

    $idcategoria = $this->readModuloByIdConteudo($row["idcategoria"]);

    if(isset($idcategoria[0]) == "") {
      $idcategoria[0] = "1";
      $idcategoria[1] = "1";
    }

    $r .= "<div>";
    $r .= "<div>";
    $r .= "<h3>" . $row["titulo"] . "</h3>";
    if($row["texto"] != "") {

     $r .= $this->get_first_img($row["texto"]);


      $r .=  substr(strip_tags($row["texto"]), 0, 200) . "...";
      $r .= "<br>";

      $r .= "<a class='leia-mais' href='" . myUrl("textoslinks/index/". $idcategoria[1] ."/". $idcategoria[0] ."/?idtexto=". $row["id"] ."'>Leia mais</a>");
    } else {
      //$r .= $row["texto"];
    }
    $r .= "</div>";
          if(isset($_SESSION["credencial"])) {
        if($_SESSION["credencial"] == "0" || $_SESSION["credencial"] == "1") {
          $r .= "<a href='". myUrl("tao/editar_blog/?idblog=") . $row["id"]."' class='editar'>Editar</a>";
        }
      }
    $r .= "</div>";
    $i++;

  }
}
catch(PDOException $e)
{}  

$r .= "</div>";

$r = str_replace("-iframe","<iframe",$r);
$r = str_replace("-/iframe-","></iframe>",$r);

return  $r;

}   


public function get_first_img($idblog) {
$doc = new DOMDocument();
$doc->loadHTML($idblog);
$elements = $doc->getElementsByTagName('img');
$i=0;
$img= "";

foreach($elements as $element) {

  if($i==0) {
     $img = str_replace("../../imagens/","",$element->getAttribute('src'));
     $img = "<img src='" . myUrl("ImageImagens.php?imagem=" . $img . "&w=100&h=80&dir=blog") . "'>";

  } 
    $i++;
}

return $img;
}


public function readModuloByIdConteudo($idblog) {
  $st_query = "
  SELECT id, titulo, idblog
  FROM modulos 
  WHERE id = $idblog";

  $dr = array();
  $i = 0;

  try {
   $dbh=getdbh();
   $stmt = $dbh->query($st_query);
   while ($row = $stmt->fetch()) {

    $dr[0] = $row["id"];
    $dr[1] = $row["idblog"];

    $i++;
  }
} catch (PDOException $e) {

}
return $dr;
}



public function readConteudosBlog($idcategoria)  {
  $st_query = "
  SELECT id, dma, titulo, texto, ordem, vitrine, idcategoria
  FROM blog 
  WHERE idcategoria=$idcategoria
  ORDER BY id desc LIMIT 25";

  $dr = array();
  $i=0;
  try
  {
   $dbh=getdbh();
   $stmt = $dbh->query($st_query);
   while ($row = $stmt->fetch()) {
    $dr[$i][0] = $row["id"];
    $dr[$i][1] = $row["dma"];
    $dr[$i][2] = $row["idcategoria"];
    $dr[$i][3]= $row["titulo"];
    $i++;
  }
}
catch(PDOException $e)
{}  


return  $dr;
}   


#### TAO ####

public function update_cabecalho($iddestaque,$texto)
{
  $st_query = "
  UPDATE blogfixo
  SET
  texto = '$texto'
  WHERE
  iddestaque = $iddestaque
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

public function update_rodape($iddestaque,$texto)
{
  $st_query = "
  UPDATE blogfixo
  SET
  texto = '$texto'
  WHERE
  iddestaque = $iddestaque
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

public function update_blog($id,$titulo,$texto)
{

  $texto = str_replace("&", "%26", $texto);

  $st_query = "
  UPDATE blog
  SET
  titulo = '$titulo',
  texto = '$texto'
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


public function update_blog_videoyoutube($id,$titulo,$texto,$url)
{

  $texto = str_replace("&", "%26", $texto);

  $st_query = "
  UPDATE blog
  SET
  titulo = '$titulo',
  texto = '$texto',
  url = '$url'
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




public function update_destaque($iddestaque,$titulo,$texto)
{
  $st_query = "
  UPDATE blog
  SET
  titulo = '$titulo',
  texto = '$texto'
  WHERE
  iddestaque = $iddestaque
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


public function add_blog()  {
  $dma = date("Y-m-d H:i:s");
  $st_query = "
  INSERT INTO blog
  (
  dma,
  titulo
  )
  VALUES
  (
  '$dma',
  'Titulo da página'
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


public function getUltimoRegsitro()
{
  $r = "0";
  $st_query = "SELECT id FROM blog WHERE id=(SELECT MAX(id) FROM blog)";

  $dbh=getdbh();

  $o_data = $dbh->query($st_query);
  $o_ret = $o_data->fetchObject();
  $dr = array();
  $r = $o_ret->id;
  return $r;
}


public function ativar_post($id,$vitrine)
{
  $st_query = "
  UPDATE blog
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

public function getRowsPosts($ln, $x, $y, $ordem)
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
  $totallinhas = current($dbh->query("select count(*) from blog WHERE vitrine=1")->fetch());
  $paginas = $totallinhas / $linhas;

  $r = array();   
  $i=0;
  $r[3][0] = "";

  $st_query = "
  SELECT id,
  dma,
  idcategoria,
  titulo,
  texto,
  ordem
  FROM blog 
  WHERE vitrine = 1
  ORDER BY dma";
  try  {
   $dbh=getdbh();
   $stmt = $dbh->query($st_query);
   while ($row = $stmt->fetch()) {

    if ($i >= $x) {
      $r[$l][0] = $row["id"];
      $r[$l][1] = $row["dma"];
      $r[$l][2] = $row["idcategoria"];
      $r[$l][3] = $row["titulo"];
      $r[$l][4] = str_replace("../../imagens/",myUrl() . "imagens/",$row["texto"]);
      $r[$l][5] = $row["ordem"];

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


public function delete_blog($id)
{

  $st_query = "
  SELECT texto
  FROM blog
  WHERE id = $id";
  $r = "";
  try
  {
    $dbh=getdbh();
    $stmt = $dbh->query($st_query);
    while ($row = $stmt->fetch()) {
      $r = $row["texto"];
    }
  }
  catch(PDOException $e)
  {}  

  if($r){

  $htmlContent = $r;
  preg_match_all('/<img[^>]+>/i',$htmlContent, $imgTags); 
  for ($i = 0; $i < count($imgTags[0]); $i++) {
    preg_match('/src="([^"]+)/i',$imgTags[0][$i], $imgage);
    $origImageSrc[] = str_ireplace( 'src="', '',  $imgage[0]);
  }
  $i=0;
  $img = "";
  foreach ($origImageSrc as $key => $value[]) {
    $imagem = str_replace("../../imagens/","",$value[$i]);
    $img = "imagens/" . trim($imagem);
    unlink($img);
    $i++;
  }
}

  $this->delete_id_blog($id);

  return false;
}


public function delete_id_blog($id) {
  $st_query = "
  DELETE FROM blog
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

public function update_blog_destaque($id,$ordem)
{
  $st_query = "
  UPDATE blog
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


public function get_plugins() {

  $st_query = "
  SELECT id,
  titulo,
  plugin
  FROM plugin 
  ORDER BY titulo";
  $r = array();   
  $i=0;

  try  {
   $dbh=getdbh();
   $stmt = $dbh->query($st_query);

   while ($row = $stmt->fetch()) {
    $r[$i][0] = $row["id"];
    $r[$i][1] = $row["titulo"];
    $r[$i][2] = $row["plugin"];

    $i++;
  }

}
catch(PDOException $e)
{}  

return $r;

}  



public function set_plugin($id,$plugin)
{
  $st_query = "
  UPDATE blog
  SET
  plugin = '$plugin'
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


public function getTotalRegistros() {

 $dbh=getdbh();
 $r = current($dbh->query("select count(*) from blog")->fetch());
 return $r;
}


public function getTotalRegistrosCategoria($idcategoria) {

 $dbh=getdbh();
 $r = current($dbh->query("select count(*) from blog WHERE idcategoria=".$idcategoria )->fetch());
 return $r;
}

public function getTotalRegistrosVitrine() {

 $dbh=getdbh();
 $r = current($dbh->query("select count(*) from blog WHERE vitrine = 1")->fetch());
 return $r;
}




public function readConteudoBlog($id) {

  $st_query = "
  SELECT id, dma, titulo, texto, classe, plugin, url, idcategoria
  FROM blog 
  WHERE id = $id";

  $r = "";  
  $url_sem_replace = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
  $url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . '%26categoria=0';
  $url = str_replace("?", "%3F", $url);
  $url = str_replace("&", "%26", $url);
  $url = str_replace("/", "%2F", $url);
  $url = str_replace(":", "%3A", $url);
    //$url .= "%26idcategoria=0";

  $v="0";

  try {
   $dbh=getdbh();
   $stmt = $dbh->query($st_query);
   while ($row = $stmt->fetch()) {
      $vex = explode("v=", $row["url"]); // quebra a url da string que contem o video
      if(isset($vex[1])) {
        $vex2 = explode("&", $vex[1]); 
        $v = str_replace("<p>", "", $vex2[0]);
        $v = str_replace("</p>", "", $v);
        $v = str_replace("&", "%26", $v);
        $v = trim($v);
      } // fim da quebra

      $r .= "<div id='ctd-". $row["id"] ."' class='ctd'>";



      if(isset($_SESSION["credencial"])) {
        if($_SESSION["credencial"] == "0" || $_SESSION["credencial"] == "1") {
          $r .= "<a href='". myUrl("tao/editar_blog/?idblog=") . $row["id"] ."' class='editar'>Editar</a>";
        }
      }




      $r .= "<h1>" . $row["titulo"] . "</h1>";

      $date=date_create($row["dma"]);
      $r .= "<small>" . date_format($date,"d/m/Y") . "</small>";


      if($row["url"] != "") {
        $r .= "<a href='?controle=VideosYoutube&acao=open&id=". $o_ret->idcategoria ."&idcategoria=".  $row["idcategoria"] ."&video=". $v ."'>";
        $r .= "<img src='http://i1.ytimg.com/vi/". $v ."/default.jpg' />";
        $r .= "</a>";
      }

      $r .= str_replace("../../imagens/",myUrl() . "imagens/",$row["texto"]);
      $r .= "</div>";
      if($row["plugin"] !=""){
        $array = file("plugin/" . $row["plugin"]  . ".php");
        foreach($array as $line)        {
          $r .= str_replace("url-plugin",$url,$line);          
        }
      }  
    }
  }
  catch(PDOException $e) {
  }  
  $r = str_replace("<h1></h1>","",$r);
  $r = str_replace("url_sem_replace",$url_sem_replace,$r);
  $r = str_replace("-iframe","<iframe",$r);
  $r = str_replace("-/iframe-","></iframe>",$r);
  return $r;
}



public function update_ordem($id, $ordem)
{
  $st_query = "
  UPDATE blog
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