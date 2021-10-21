<?php

class ModulosModel extends Model {

 function __construct() {
  parent::__construct();
} 

private $id;
private $idconteudo;
private $titulo;
private $title;
private $description;
private $keywords;
private $url;
private $modulo;
private $idcontainercaixatextoflex;
private $sliders;
private $titulotexto;
private $texto;


public function setId( $id )
{
  $this->id = $id;
  return $this;
}

public function getId()
{
  return $this->id;
}

public function setIdConteudo( $idconteudo )
{
  $this->idconteudo = $idconteudo;
  return $this;
}

public function getIdConteudo()
{
  return $this->idconteudo;
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


public function setTitle( $title )
{
  $this->title = $title;
  return $this;
}

public function getTitle()
{
  return $this->title;
}

public function setKeywords( $keywords )
{
  $this->keywords = $keywords;
  return $this;
}

public function getKeywords()
{
  return $this->keywords;
}

public function setDescription( $description )
{
  $this->description = $description;
  return $this;
}

public function getDescription()
{
  return $this->description;
}


public function setModulo( $modulo )
{
  $this->modulo = $modulo;
  return $this;
}

public function getModulo()
{
  return $this->modulo;
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

public function setSliders( $sliders )
{
  $this->sliders = $sliders;
  return $this;
}

public function getSliders()
{
  return $this->sliders;
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

public function setTituloTexto( $titulotexto )
{
  $this->titulotexto = $titulotexto;
  return $this;
}

public function getTituloTexto()
{
  return $this->titulotexto;
}


public function setIdContainerCaixaTextoFlex( $idcontainercaixatextoflex )
{
  $this->idcontainercaixatextoflex = $idcontainercaixatextoflex;
  return $this;
}

public function getIdContainerCaixaTextoFlex()
{
  return $this->idcontainercaixatextoflex;
}

public function readModuloByIdConteudo($id) {
  $st_query = "
  SELECT id, titulo, idcategoria, modulo, idconteudo, ordem, description, keywords, title, idcontainercaixatextoflex
  FROM modulos 
  WHERE id = $id";

  $dr = array();

  try {
   $r = array();
   $i = 0;
   $dbh=getdbh();
   $stmt = $dbh->query($st_query);
   while ($row = $stmt->fetch()) {
    $dr[0] = $row["id"];
    $dr[1] = $row["titulo"];
    $dr[2] = $row["idcategoria"];
    $dr[3] = $row["modulo"];
    $dr[4] = $row["idconteudo"];
    $dr[5] = $row["ordem"];
    $dr[6] = $row["description"];
    $dr[7] = $row["keywords"];
    $dr[8] = $row["title"];
    $dr[9] = $row["idcontainercaixatextoflex"];
    $i++;
  }
} catch (PDOException $e) {

}
return $dr;
}

public function exibir_slider($idmodulo) {
  $st_query = "
  SELECT * 
  FROM modulos 
  WHERE id = $idmodulo
  ";

  $r = 0;

  try {
   $i = 0;
   $dbh=getdbh();
   $stmt = $dbh->query($st_query);
   while ($row = $stmt->fetch()) {
    $r = $row["sliders"];
    $i++;
  }
} catch (PDOException $e) {

}
return $r;
}

public function readItensCategorias($idcategoria,$ordem_registros) {
  $st_query = "
  SELECT id, titulo, modulo, idcategoria, idconteudo, ordem, url
  FROM modulos
  WHERE idcategoria=$idcategoria 
  ORDER BY $ordem_registros";

  $r = "";
  $url = "";
  $i = 1;

  $modulos = "<ul id='sm-categorias' class=''>";

  try {

   $dbh=getdbh();
   $stmt = $dbh->query($st_query);
   
   while ($row = $stmt->fetch()) {

    $url = $this->montaUrl($row["modulo"], $row["idconteudo"], $row["id"], $row["url"]);

    $modulos .= "<li>";

    if ($this->numItens($row["id"]) > 0) {
     $modulos .= "<a class='' href='#'>" . $row["titulo"] . "</a>";
       $modulos .= $this->nivel1($row["id"]); // SE PRECISAR FAZER NOVOS SUBMENUS //
     } else {
       $modulos .= "<a class='' href='" . $url . "' title='" . $row["titulo"] . "'>" . $i . " - " . $row["titulo"] . "</a>";
     }

     $modulos .= "</li>";
     $i++;
   }
 } catch (PDOException $e) {

 }

 $modulos .= "</ul>";

 return $modulos;
}

   /**
    * 
    * @return type
    */
   public function readItensOnePage() {
    $st_query = "
    SELECT id, titulo, modulo, idcategoria, idconteudo, ordem, url
    FROM modulos
    WHERE idcategoria=0 and ativo = 1
    ORDER BY ordem";

    $r = "";
    $url = "";

    $dr = array();
    $conteudo = array();

    $modulos = "<ul class='sm-tao sm sm-tao links'>";
    $i = 0;

    try {
     $o_data = $this->o_db->query($st_query);
     $i = 0;
     while ($o_ret = $o_data->fetchObject()) {
      $modulos .= "<li>";

      if ($this->numItens($row["id"]) > 0) {
       $modulos .= "<a class='' href='javascript:goConteudo(" . $row["idconteudo"] . ")'>" . $row["titulo"] . "</a>";
     } else {
       $modulos .= "<a class='' href='javascript:goConteudo(" . $row["idconteudo"] . ")'>" . $row["titulo"] . "</a>";
     }

     $modulos .= "</li>";
     $conteudo[$i] = $row["idconteudo"];
     $i++;
   }
 } catch (PDOException $e) {

 }

 $modulos .= "</ul>";

 $dr[0] = $modulos;
 $dr[1] = $conteudo;

 return $dr;
}

public function readItensGeral() {
  $st_query = "
  SELECT id, titulo, modulo, idcategoria, idconteudo, ordem, url
  FROM modulos
  WHERE idcategoria=0
  AND ativo = 1
  ORDER BY ordem";

  $r = "";
  $url = "";

  $modulos = "<ul class='sm sm-institucional links'>";

  try {
   $o_data = $this->o_db->query($st_query);
   $i = 0;
   while ($o_ret = $o_data->fetchObject()) {
    $url = $this->montaUrl($row["modulo"], $row["idconteudo"], $row["id"], $row["url"]);

    $modulos .= "<li>";

    if ($this->numItens($row["id"]) > 0) {
      $modulos .= "<a class='' href='" . $url . "' title='" . $row["titulo"] . "'>" . $row["titulo"] . "</a>";
      $modulos .= $this->nivel1($row["id"]); // SE PRECISAR FAZER NOVOS SUBMENUS //
    } else {
      $modulos .= "<a class='' href='" . $url . "' title='" . $row["titulo"] . "'>" . $row["titulo"] . "</a>";
    }

    $modulos .= "</li>";
  }
} catch (PDOException $e) {

}

$modulos .= "</ul>";

return $modulos;
}

public function readItensInstitucional() {
  $st_query = "
  SELECT id, titulo, modulo, idcategoria, idconteudo, ordem, url
  FROM modulos
  WHERE idcategoria=0
  AND ativo = 1
  AND modulo <> 'Catalogo'
  AND modulo <> 'CatalogoCategorias'
  ORDER BY ordem";

  $r = "";
  $url = "";

  $modulos = "<ul id='smmenu' class='sm sm-institucional links'>";

  try {
    $o_data = $this->o_db->query($st_query);
    $i = 0;
    while ($o_ret = $o_data->fetchObject()) {
      $url = $this->montaUrl($row["modulo"], $row["idconteudo"], $row["id"], $row["url"]);

      $modulos .= "<li>";

      if ($this->numItens($row["id"]) > 0) {
        $modulos .= "<a class='' href='" . $url . "' title='" . $row["titulo"] . "'>" . $row["titulo"] . "</a>";
      $modulos .= $this->nivel1($row["id"]); // SE PRECISAR FAZER NOVOS SUBMENUS //
    } else {
      $modulos .= "<a class='' href='" . $url . "' title='" . $row["titulo"] . "'>" . $row["titulo"] . "</a>";
    }

    $modulos .= "</li>";
  }
} catch (PDOException $e) {

}

$modulos .= "</ul>";

return $modulos;
}

public function readItensLateral() {
  $st_query = "
  SELECT id, titulo, modulo, idcategoria, idconteudo, ordem, url
  FROM modulos
  WHERE idcategoria=0
  ORDER BY ordem";

  $r = "";
  $url = "";

  $modulos = "<ul class='sm sm-tao sm-vertical'>";

  try {
    $o_data = $this->o_db->query($st_query);
    $i = 0;
    while ($o_ret = $o_data->fetchObject()) {
      $url = $this->montaUrl($row["modulo"], $row["idconteudo"], $row["id"], $row["url"]);

      $modulos .= "<li>";

      if ($this->numItens($row["id"]) > 0) {
        $modulos .= "<a class='' href='" . $url . "' title='" . $row["titulo"] . "'>" . $row["titulo"] . "</a>";
      $modulos .= $this->nivel1($row["id"]); // SE PRECISAR FAZER NOVOS SUBMENUS //
    } else {
      $modulos .= "<a class='' href='" . $url . "' title='" . $row["titulo"] . "'>" . $row["titulo"] . "</a>";
    }

    $modulos .= "</li>";
  }
} catch (PDOException $e) {

}

$modulos .= "</ul>";

return $modulos;
}




      /**
      * readItensProdutosLateral()
      * @return string
      */



      public function readItensProdutosLateral() {
        $st_query = "
        SELECT id, titulo, modulo, idcategoria, idconteudo, ordem, url
        FROM modulos
        WHERE idcategoria=0
        AND ativo = 1
        AND modulo = 'Catalogo'
        OR modulo = 'CatalogoCategorias'
        ORDER BY ordem";

        $r = "";
        $url = "";

        $modulos = "<ul class='sm-produtos sm sm-tao sm-vertical'>";

        try {
          $o_data = $this->o_db->query($st_query);
          $i = 0;
          while ($o_ret = $o_data->fetchObject()) {
            $url = $this->montaUrl($row["modulo"], $row["idconteudo"], $row["id"], $row["url"]);

            $modulos .= "<li>";

            if ($this->numItens($row["id"]) > 0) {
              $modulos .= "<a class='' href='" . $url . "' title='" . $row["titulo"] . "'>" . $row["titulo"] . "</a>";
      $modulos .= $this->nivel1($row["id"]); // SE PRECISAR FAZER NOVOS SUBMENUS //
    } else {
      $modulos .= "<a class='' href='" . $url . "' title='" . $row["titulo"] . "'>" . $row["titulo"] . "</a>";
    }

    $modulos .= "</li>";
  }
} catch (PDOException $e) {

}

$modulos .= "</ul>";

return $modulos;
}

      /**
      *  readItensProdutos()
      * @return string
      */
      public function readItensProdutos() {
        $st_query = "
        SELECT id, titulo, modulo, idcategoria, idconteudo, ordem, url
        FROM modulos
        WHERE idcategoria=0
        AND ativo = 1
        AND modulo = 'Catalogo'
        OR modulo = 'CatalogoCategorias'
        ORDER BY ordem";

        $r = "";
        $url = "";

        $modulos = "<ul id='menu'>";

        try {
          $o_data = $this->o_db->query($st_query);
          $i = 0;
          while ($o_ret = $o_data->fetchObject()) {
            $url = $this->montaUrl($row["modulo"], $row["idconteudo"], $row["id"], $row["url"]);

            $modulos .= "<li>";

            if ($this->numItens($row["id"]) > 0) {
              $modulos .= "<a class='' href='" . $url . "' title='" . $row["titulo"] . "'>" . $row["titulo"] . "</a>";
      $modulos .= $this->nivel1($row["id"]); // SE PRECISAR FAZER NOVOS SUBMENUS //
    } else {
      $modulos .= "<a class='' href='" . $url . "' title='" . $row["titulo"] . "'>" . $row["titulo"] . "</a>";
    }

    $modulos .= "</li>";
  }
} catch (PDOException $e) {

}

$modulos .= "</ul>";

return $modulos;
}

      /**
      * readItens()
      * @return string
      */
      public function readItens() {
        $st_query = "
        SELECT id, titulo, modulo, idcategoria, idconteudo, ordem, url
        FROM modulos
        WHERE idcategoria=0 and ativo = 1
        ORDER BY ordem";

        $r = "";
        $url = "";

        $modulos = "<ul class='sm-tao sm sm-tao links'>";

        try {
          $o_data = $this->o_db->query($st_query);
          $i = 0;
          while ($o_ret = $o_data->fetchObject()) {
            $url = $this->montaUrl($row["modulo"], $row["idconteudo"], $row["id"], $row["url"]);

            $modulos .= "<li>";

            if ($this->numItens($row["id"]) > 0) {
              $modulos .= "<a class='' href='" . $url . "' title='" . $row["titulo"] . "'>" . $row["titulo"] . "</a>";
      $modulos .= $this->nivel1($row["id"]); // SE PRECISAR FAZER NOVOS SUBMENUS //
    } else {
      $modulos .= "<a class='' href='" . $url . "' title='" . $row["titulo"] . "'>" . $row["titulo"] . "</a>";
    }

    $modulos .= "</li>";
  }
} catch (PDOException $e) {

}

$modulos .= "</ul>";

return $modulos;
}

      /**
      * 
      * @param type $idcategoria
      * @return string
      */
      public function nivel1($idcategoria) {
        $url = "";
        $dr = array();

        $dr = $this->readItensByIdCategoria($idcategoria, "ordem");

        $modulos = "<ul>";
        for ($i = 0; $i < count($dr); $i++) {
          $url = $this->montaUrl($dr[$i][3], $dr[$i][4], $dr[$i][0], $dr[$i][6]);

          $modulos .= "<li>";

          $modulos .= "<a class='' href='" . $url . "' title='" . $dr[$i][1] . "'>" . $dr[$i][1] . "</a>";


          if ($this->numItens($dr[$i][0]) > 0) {
      $modulos .= $this->nivel2($dr[$i][0]); // SE PRECISAR FAZER NOVOS SUBMENUS //
    }


    $modulos .= "</li>";
  }
  $modulos .= "</ul>";

  $dr [0] = $modulos;

  return $modulos;
}

      /**
      * 
      * @param type $idcategoria
      * @return string
      */
      public function nivel2($idcategoria) {
        $url = "";
        $dr = array();
        $modulos = "";
        $dr = $this->readItensByIdCategoria($idcategoria, "ordem");
        $modulos .= "<ul>";

        for ($i = 0; $i < count($dr); $i++) {
          $url = $this->montaUrl($dr[$i][3], $dr[$i][4], $dr[$i][0], $dr[$i][6]);

          $modulos .= "<li>";
          $modulos .= "<a class='' href='" . $url . "' title='" . $dr[$i][3] . "'>" . $dr[$i][1] . "</a>";
          if ($this->numItens($dr[$i][0]) > 0) {
      $modulos .= $this->nivel3($dr[$i][0]); // SE PRECISAR FAZER NOVOS SUBMENUS //
    }
    $modulos .= "</li>";
  }
  $modulos .= "</ul>";

  $dr [0] = $modulos;

  return $modulos;
}

      /**
      * 
      * @param type $idcategoria
      * @return string
      */
      public function nivel3($idcategoria) {
        $url = "";
        $dr = array();
        $modulos = "";
        $dr = $this->readItensByIdCategoria($idcategoria, "ordem");
        $modulos .= "<ul>";

        for ($i = 0; $i < count($dr); $i++) {
          $url = $this->montaUrl($dr[$i][3], $dr[$i][4], $dr[$i][0], $dr[$i][6]);

          $modulos .= "<li>";
          $modulos .= "<a class='' href='" . $url . "' title='" . $dr[$i][3] . "'>" . $dr[$i][1] . "</a>";
          if ($this->numItens($dr[$i][0]) > 0) {
      $modulos .= $this->nivel4($dr[$i][0]); // SE PRECISAR FAZER NOVOS SUBMENUS //
    }
    $modulos .= "</li>";
  }
  $modulos .= "</ul>";

  $dr [0] = $modulos;

  return $modulos;
}

public function nivel4($idcategoria) {
  $url = "";
  $dr = array();
  $modulos = "";
  $dr = $this->readItensByIdCategoria($idcategoria, "ordem");
  $modulos .= "<ul>";

  for ($i = 0; $i < count($dr); $i++) {
    $url = $this->montaUrl($dr[$i][3], $dr[$i][4], $dr[$i][0], $dr[$i][6]);

    $modulos .= "<li>";
    $modulos .= "<a class='' href='" . $url . "' title='" . $dr[$i][3] . "'>" . $dr[$i][1] . "</a>";
    if ($this->numItens($dr[$i][0]) > 0) {
      $modulos .= $this->nivel5($dr[$i][0]); // SE PRECISAR FAZER NOVOS SUBMENUS //
    }
    $modulos .= "</li>";
  }
  $modulos .= "</ul>";

  $dr [0] = $modulos;

  return $modulos;
}

public function nivel5($idcategoria) {
  $url = "";
  $dr = array();
  $modulos = "";
  $dr = $this->readItensByIdCategoria($idcategoria, "ordem");
  $modulos .= "<ul>";

  for ($i = 0; $i < count($dr); $i++) {
    $url = $this->montaUrl($dr[$i][3], $dr[$i][4], $dr[$i][0], $dr[$i][6]);

    $modulos .= "<li>";
    $modulos .= "<a class='' href='" . $url . "' title='" . $dr[$i][3] . "'>" . $dr[$i][1] . "</a>";
    if ($this->numItens($dr[$i][0]) > 0) {
      $modulos .= $this->nivel6($dr[$i][0]); // SE PRECISAR FAZER NOVOS SUBMENUS //
    }
    $modulos .= "</li>";
  }
  $modulos .= "</ul>";

  $dr [0] = $modulos;

  return $modulos;
}

public function nivel6($idcategoria) {
  $url = "";
  $dr = array();
  $modulos = "";
  $dr = $this->readItensByIdCategoria($idcategoria, "ordem");
  $modulos .= "<ul>";

  for ($i = 0; $i < count($dr); $i++) {
    $url = $this->montaUrl($dr[$i][3], $dr[$i][4], $dr[$i][0], $dr[$i][6]);

    $modulos .= "<li>";
    $modulos .= "<a class='' href='" . $url . "' title='" . $dr[$i][3] . "'>" . $dr[$i][1] . "</a>";
    if ($this->numItens($dr[$i][0]) > 0) {
      //$modulos .= $this -> nivel5	($dr[$i][0]); // SE PRECISAR FAZER NOVOS SUBMENUS //
    }
    $modulos .= "</li>";
  }
  $modulos .= "</ul>";

  $dr [0] = $modulos;

  return $modulos;
}

public function readItensByIdCategoria($idcategoria, $ordenar) {
  $st_query = "
  SELECT id, titulo, modulo, idcategoria, idconteudo, ordem, url
  FROM modulos
  WHERE idcategoria=$idcategoria  and ativo = 1
  ORDER BY $ordenar";
  $dr = array();
  try {
    $o_data = $this->o_db->query($st_query);
    $i = 0;
    while ($o_ret = $o_data->fetchObject()) {
      $dr[$i][0] = $row["id"];
      $dr[$i][1] = $row["titulo"];
      $dr[$i][2] = $row["idcategoria"];
      $dr[$i][3] = $row["modulo"];
      $dr[$i][4] = $row["idconteudo"];
      $dr[$i][5] = $row["ordem"];
      $dr[$i][6] = $row["url"];

      $i++;
    }
  } catch (PDOException $e) {

  }

  return $dr;
}

public function numItens($idcategoria) {
  $st_query = "
  SELECT * FROM modulos WHERE idcategoria=$idcategoria and ativo=1";

  try {
    $o_data = $this->o_db->query($st_query);
    $r = array();
    $i = 0;
    while ($o_ret = $o_data->fetchObject()) {
      $i++;
    }
  } catch (PDOException $e) {

  }
  return $i;
}

public function montaUrl($c, $id, $ididcategoria, $url) {
  $r = "";
  $acao = "open";

  if ($c == "Index") {
    $acao = "index";
  }

  if ($url != "") {
    $r = $url;
  } else {
    $r = "?controle=" . $c . "&acao=" . $acao . "&id=" . $id . "&idcategoria=" . $ididcategoria . "#top";
  }

  return $r;
}

public function readModuloContainers($idmodulo) {
  $st_query = "
  SELECT id, idmodulo, idcontainer
  FROM moduloscontainers
  WHERE idmodulo = $idmodulo
  ORDER BY ordem
  ";

  $dr = array();

  try {
    $r = array();
    $i = 0;
    $dbh=getdbh();
    $stmt = $dbh->query($st_query);
    while ($row = $stmt->fetch()) {      
      $dr[$i][0] = $row["id"];
      $dr[$i][1] = $row["idmodulo"];
      $dr[$i][2] = $row["idcontainer"];

      $i++;
    }
  } catch (PDOException $e) {

  }
  return $dr;
}

public function getView($idmodulo) {
  $st_query = "
  SELECT view
  FROM modulos
  WHERE id = $idmodulo
  ";

  $dr = array();

  try {
    $o_data = $this->o_db->query($st_query);
    $r = "";
    $i = 0;
    while ($o_ret = $o_data->fetchObject()) {
      $r = $row["view"];
    }
  } catch (PDOException $e) {

  }
  return $r;
}

public function getOrdemRegistrosModulo($idmodulo) {
  $st_query = "
  SELECT ordem_registros
  FROM modulos
  WHERE id = $idmodulo
  ";

  $dr = array();
  $r = "";
  $i = 0;

  try { 
   $dbh=getdbh();
   $stmt = $dbh->query($st_query);
   while ($row = $stmt->fetch()) {
    $r = $row["ordem_registros"];
  }
} catch (PDOException $e) {

}
return $r;
}

public function readItensEspecial() {
  $st_query = "
  SELECT id, titulo, modulo, idcategoria, idconteudo, ordem, url
  FROM modulos
  WHERE idcategoria=0
  AND ativo = 1
  AND modulo <> 'Catalogo'
  AND modulo <> 'CatalogoCategorias'
  ORDER BY ordem";

  $r = "";
  $url = "";

  $modulos = "<ul class='sm sm-tao'>";

  try {
    $o_data = $this->o_db->query($st_query);
    $i = 0;
    while ($o_ret = $o_data->fetchObject()) {
      $url = $this->montaUrl($row["modulo"], $row["idconteudo"], $row["id"], $row["url"]);

      $modulos .= "<li>";

      if ($this->numItens($row["id"]) > 0) {
        $modulos .= "<a class='' href='" . $url . "' title='" . $row["titulo"] . "'>" . $row["titulo"] . "</a>";
      $modulos .= $this->nivel1($row["id"]); // SE PRECISAR FAZER NOVOS SUBMENUS //
    } else {
      $modulos .= "<a class='' href='" . $url . "' title='" . $row["titulo"] . "'>" . $row["titulo"] . "</a>";
    }

    $modulos .= "</li>";
  }
} catch (PDOException $e) {

}

$modulos .= "</ul>";

return $modulos;
}

public function onde_estou($id) {
  $st_query = "
  SELECT *
  FROM modulos
  WHERE id = $id";

  $r = ""; 

  try
  {
    $dbh=getdbh();
    $stmt = $dbh->query($st_query);
    while ($row = $stmt->fetch()) {
      $r = $this->onde_estou($row["idcategoria"]) . "<li><a href='". myUrl("catalogo/index/". $row["idconteudo"] ."/". $row["id"] ."") ."'>" . $row["titulo"] . "</a></li>";
    }
  }
  catch(PDOException $e)
  {}  

  return $r;
}  

#### TAO ####

public function update_modulo()
{
  $st_query = "
  UPDATE modulos
  SET
  titulo = '$this->titulo',
  title = '$this->title',
  description = '$this->description',
  keywords = '$this->keywords',
  modulo = '$this->modulo',
  url = '$this->url',
  idcontainercaixatextoflex = $this->idcontainercaixatextoflex,
  sliders = '$this->sliders',
  titulotexto = '$this->titulotexto',
  texto = '$this->texto'
  WHERE
  id = $this->idconteudo
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



public function getRowById($idconteudo)
{
  $st_query = "
  SELECT id, idconteudo, titulo, titulotexto, texto, title, description, keywords, modulo, idcontainercaixatextoflex, ativo, url, sliders, ar, menu1, menu2, menu3
  FROM modulos 
  WHERE id = $idconteudo";
  $r = array(); 

  try
  {
   $dbh=getdbh();
   $stmt = $dbh->query($st_query);
   while ($row = $stmt->fetch()) {
    $r[0] = $row["id"];
    $r[1] = $row["idconteudo"];    
    $r[2] = $row["titulo"];
    $r[3] = $row["title"];
    $r[4] = $row["description"];
    $r[5] = $row["keywords"];
    $r[6] = $row["modulo"];
    $r[7] = $row["idcontainercaixatextoflex"];
    $r[8] = $row["ativo"];
    $r[9] = $row["url"];
    $r[10] = $row["sliders"];
    $r[11] = $row["titulotexto"];
    $r[12] = $row["texto"];
    $r[13] = $row["ar"];
    $r[14] = $row["menu1"];
    $r[15] = $row["menu2"];
    $r[16] = $row["menu3"];


  }
}
catch(PDOException $e)
{}  
$r = str_replace("-iframe","<iframe",$r);
$r = str_replace("-/iframe-","></iframe>",$r);
return $r;
}


public function getRow()
{
  $st_query = "
  SELECT id, idconteudo, titulo, titulotexto, texto, title, description, keywords, modulo, idcontainercaixatextoflex, ativo, url, sliders
  FROM modulos 
  WHERE idconteudo = $this->idconteudo";
  $r = array(); 

  try
  {
   $dbh=getdbh();
   $stmt = $dbh->query($st_query);
   while ($row = $stmt->fetch()) {
    $r[0] = $row["id"];
    $r[1] = $row["idconteudo"];    
    $r[2] = $row["titulo"];
    $r[3] = $row["title"];
    $r[4] = $row["description"];
    $r[5] = $row["keywords"];
    $r[6] = $row["modulo"];
    $r[7] = $row["idcontainercaixatextoflex"];
    $r[8] = $row["ativo"];
    $r[9] = $row["url"];
    $r[10] = $row["sliders"];
    $r[11] = $row["titulotexto"];
    $r[12] = $row["texto"];

  }
}
catch(PDOException $e)
{}  
$r = str_replace("-iframe","<iframe",$r);
$r = str_replace("-/iframe-","></iframe>",$r);
return $r;
}

public function getTotalRegistrosBlog() {
 $dbh=getdbh();
 $r = current($dbh->query("select count(*) from modulos WHERE modulo='Blog' ")->fetch());
 return $r;
}


public function getTotalRegistros() {

 $dbh=getdbh();
 $r = current($dbh->query("select count(*) from modulos")->fetch());
 return $r;
}

public function getRows($ln, $x, $y, $modulo, $ordem,$idcategoria)
{
  $i = 0;
  $l=0;
  $totallinhas = 0;
  $linhas = $ln;
  $paginas = 0;

  $dbh=getdbh();
  $totallinhas = current($dbh->query("select count(*) from modulos WHERE modulo = '$modulo' AND idcategoria=$idcategoria")->fetch());
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
  modulo,
  ativo,
  idconteudo
  FROM modulos
  WHERE modulo = '$modulo'
  AND idcategoria = $idcategoria
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
      $r[$l][4] = $row["modulo"];
      $r[$l][5] = $row["ativo"];
      $r[$l][6] = $row["idconteudo"];

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

 $p = $y;
 if ($y > 0) {
  $a = $y * $linhas;
  $a = $a - $linhas;
  $b = $y - 10;
  $r[$l][1] .= "<li class='pag-prev'><a class='ativo". $a ."' href='" . 
  $modulo . "?x=" . $a . "&y=" . $b . "'>...</a></li>";
}
for ($i = 1; $i < 11; $i++) {
  $p++;
  $x = $p * $linhas - $linhas;
  $r[$l][0] = "#p#";
  if ($x < $totallinhas) {
   $r[$l][1] .= "<li class='pag-now'>";
   $r[$l][1] .= "<a class='ativo". $x."' href='" . 
   $modulo . "?x=" . $x . "&y=" . $y . "'>" . $p . "</a>";
   $r[$l][1] .= "</li>";
 }
}

 // $r[$l][2] .= "<div class='paginacao-itens'>" .$totallinhas . " itens</div>"; // $paginas;

if ($x < $totallinhas) {
  $x = $x + $linhas;
  $y = $y + 10;
  $r[$l][1] .= "<li class='pag-next'>&nbsp;<a href='" . 
  $modulo . "?x=" . $x . "&y=" . $y . "'>...</a></li>";
}
        // and flow rows

$r[$l][1] .= "</ul>" . $r[$l][2];

if($totallinhas <= $ln)
{
  $r[$l][1] = "";
}

return $r;
}  


public function getRowsTodos($ln, $x, $y, $modulo, $ordem)
{
  $i = 0;
  $l=0;
  $totallinhas = 0;
  $linhas = $ln;
  $paginas = 0;

  $dbh=getdbh();
  $totallinhas = current($dbh->query("select count(*) from modulos WHERE modulo = '$modulo'")->fetch());
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
  modulo,
  ativo,
  idconteudo
  FROM modulos
  WHERE modulo = '$modulo'
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
      $r[$l][4] = $row["modulo"];
      $r[$l][5] = $row["ativo"];
      $r[$l][6] = $row["idconteudo"];

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

 $p = $y;
 if ($y > 0) {
  $a = $y * $linhas;
  $a = $a - $linhas;
  $b = $y - 10;
  $r[$l][1] .= "<li class='pag-prev'><a class='ativo". $a ."' href='" . 
  $modulo . "?x=" . $a . "&y=" . $b . "'>...</a></li>";
}
for ($i = 1; $i < 11; $i++) {
  $p++;
  $x = $p * $linhas - $linhas;
  $r[$l][0] = "#p#";
  if ($x < $totallinhas) {
   $r[$l][1] .= "<li class='pag-now'>";
   $r[$l][1] .= "<a class='ativo". $x."' href='" . 
   $modulo . "?x=" . $x . "&y=" . $y . "'>" . $p . "</a>";
   $r[$l][1] .= "</li>";
 }
}

 // $r[$l][2] .= "<div class='paginacao-itens'>" .$totallinhas . " itens</div>"; // $paginas;

if ($x < $totallinhas) {
  $x = $x + $linhas;
  $y = $y + 10;
  $r[$l][1] .= "<li class='pag-next'>&nbsp;<a href='" . 
  $modulo . "?x=" . $x . "&y=" . $y . "'>...</a></li>";
}
        // and flow rows

$r[$l][1] .= "</ul>" . $r[$l][2];

if($totallinhas <= $ln)
{
  $r[$l][1] = "";
}

return $r;
}  

public function getRowsPesquisa($ln, $x, $y, $modulo, $ordem, $busca)
{
  $i = 0;
  $l=0;
  $totallinhas = 0;
  $linhas = $ln;
  $paginas = 0;

  $dbh=getdbh();
  $totallinhas = current($dbh->query("select count(*) from modulos WHERE 
    titulo LIKE '$busca%%' AND modulo = '$modulo'   ")->fetch());
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
  modulo,
  ativo,
  idconteudo
  FROM modulos
  WHERE titulo LIKE '$busca%%'
  ORDER BY titulo";

  try  {
   $dbh=getdbh();
   $stmt = $dbh->query($st_query);
   while ($row = $stmt->fetch()) {
    if ($i >= $x) {
      $r[$l][0] = $row["id"];
      $r[$l][1] = $row["dma"];
      $r[$l][2] = $row["idcategoria"];
      $r[$l][3] = $row["titulo"];
      $r[$l][4] = $row["modulo"];
      $r[$l][5] = $row["ativo"];
      $r[$l][6] = $row["idconteudo"];

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

 $p = $y;
 if ($y > 0) {
  $a = $y * $linhas;
  $a = $a - $linhas;
  $b = $y - 10;
  $r[$l][1] .= "<li class='pag-prev'><a href='" . 
  $modulo . "?x=" . $a . "&y=" . $b . "'>...</a></li>";
}
for ($i = 1; $i < 11; $i++) {
  $p++;
  $x = $p * $linhas - $linhas;
  $r[$l][0] = "#p#";
  if ($x < $totallinhas) {
   $r[$l][1] .= "<li class='pag-now'>";
   $r[$l][1] .= "<a href='" . 
   $modulo . "?x=" . $x . "&y=" . $y . "'>" . $p . "</a>";
   $r[$l][1] .= "</li>";
 }
}

 // $r[$l][2] .= "<div class='paginacao-itens'>" .$totallinhas . " itens</div>"; // $paginas;

if ($x < $totallinhas) {
  $x = $x + $linhas;
  $y = $y + 10;
  $r[$l][1] .= "<li class='pag-next'>&nbsp;<a href='" . 
  $modulo . "?x=" . $x . "&y=" . $y . "'>...</a></li>";
}
        // and flow rows

$r[$l][1] .= "</ul>" . $r[$l][2];

if($totallinhas <= $ln)
{
  $r[$l][1] = "";
}

return $r;
}  
public function add_modulo($titulo,$modulo,$idconteudo)  {
  $dma = date("Y-m-d H:i:s");
  $st_query = "
  INSERT INTO modulos
  (
  dma,
  titulo,
  modulo,
  idconteudo,
  ordem_registros,
  ativo,
  ordem
  )
  VALUES
  (
  '$dma',
  '$titulo',
  '$modulo',
  $idconteudo,
  'id',
  0,
  10000
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


public function delete_modulo($id)
{
  $st_query = "
  SELECT modulo
  FROM modulos
  WHERE id = $id";

  $r = "0";
  try
  {
    $dbh=getdbh();
    $stmt = $dbh->query($st_query);
    while ($row = $stmt->fetch()) {
      $r = $this->delete_itens_modulo($id, strtolower($row["modulo"]));
    }
  }
  catch(PDOException $e)
  {}  

  $st_query = "
  DELETE FROM modulos
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

  return $r;
}   

public function delete_itens_modulo($idmodulo,$modulo)
{
  $st_query = "
  DELETE FROM $modulo
  WHERE idcategoria = $idmodulo";
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


public function ativar_modulo($id,$ativo,$menu)
{

  $st_query = "UPDATE modulos SET menu$menu = $ativo  WHERE id = $id";  

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


public function getModulos()
{
  $st_query = "
  SELECT id, titulo, modulo
  FROM modulostipo
  ORDER BY titulo";

  $dr = array();  
  $r = array();
  $i=0;

  try
  {

    $dbh=getdbh();
    $stmt = $dbh->query($st_query);
    while ($row = $stmt->fetch()) {
      $dr[$i][0] = $row["id"];
      $dr[$i][1] = $row["titulo"];
      $dr[$i][2] = $row["modulo"];
      $i++;
    }
  }
  catch(PDOException $e)
  {}  
  return $dr;
}   



public function addItemModulo($idmodulo,$modulo,$titulo)  {

  $dma = date("Y-m-d H:i:s");

  $st_query = "
  INSERT INTO $modulo
  (
  dma,
  titulo,
  idcategoria
  )
  VALUES
  (
  '$dma',
  '$titulo',
  $idmodulo
);";

if($modulo == "catalogo") {
  $st_query = "
  INSERT INTO $modulo
  (
  dma,
  titulo,
  idcategoria,
  estoque,
  ativo
  )
  VALUES
  (
  '$dma',
  '$titulo',
  $idmodulo,
  9999,
  1
);";
}


if($modulo == "imoveis") {
  $st_query = "
  INSERT INTO $modulo
  (
  dma,
  codigo,
  idcategoria,
  ativo
  )
  VALUES
  (
  '$dma',
  '$titulo',
  $idmodulo,
  1
);";
}


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


public function xreadModulosOrdem_Registros($modulo) {

  $modulo = strtolower($modulo);
  $st_query = "SHOW COLUMNS FROM $modulo";
  $dr = array();  
  $i=0;
  try
  {
   $dbh=getdbh();
   $stmt = $dbh->query($st_query);
   while ($row = $stmt->fetch()) {
    $dr[$i] = $row[0];
    $i++;
  }
}
catch(PDOException $e)
{}  

return $dr;

}   

public function readModulosOrdem_Registros($modulo) {

  switch ($modulo) {

    case 'catalogo':
    $dr[0] = "id";
    $dr[1] = "dma";
    $dr[2] = "titulo";
    $dr[3] = "ordem";
    $dr[4] = "preco";
    $dr[5] = "precocusto";
    break;

    case 'galeria':
    $dr[0] = "id";
    $dr[1] = "dma";
    $dr[2] = "titulo";
    $dr[3] = "ordem";
    break;

    case 'imoveis':
    $dr[0] = "id";
    $dr[1] = "dma";
    $dr[2] = "codigo";
    $dr[3] = "perfil";
    $dr[4] = "forma";
    $dr[5] = "preco";
    $dr[6] = "bairro";
    $dr[7] = "cidade";
    $dr[8] = "estado";
    $dr[9] = "dormitorios";
    $dr[10] = "suites";
    break;  

    case 'downloads':
    $dr[0] = "id";
    $dr[1] = "dma";
    $dr[2] = "titulo";
    $dr[3] = "ordem";
    $dr[4] = "arquivo";
    $dr[5] = "descricao";
    break;

    case 'institucional':
    $dr[0] = "id";
    $dr[1] = "dma";
    $dr[2] = "titulo";
    $dr[3] = "ordem";
    $dr[4] = "idcategoria";
    $dr[5] = "texto";
    break;

    case 'blog':
    $dr[0] = "id";
    $dr[1] = "dma";
    $dr[2] = "titulo";
    $dr[3] = "ordem";
    $dr[4] = "idcategoria";
    $dr[5] = "texto";
    break;

    default:
    $dr[0] = "id";
    $dr[1] = "dma";
    $dr[2] = "titulo";
    $dr[3] = "ordem";
    break;
  }


  return $dr;

}  
public function readModuloById($id_menu)
{
  $st_query = "
  SELECT id, titulo, idcategoria, modulo, idconteudo, ordem, description, keywords, title, ativo, url, view, ordem_registros
  FROM modulos 
  WHERE id = $id_menu";

  $dr = array();  
  $r = array();
  $i=0;

  try
  {
   $dbh=getdbh();
   $stmt = $dbh->query($st_query);
   while ($row = $stmt->fetch()) {
    $dr[$i][0] = $row["id"];
    $dr[$i][1] = $row["titulo"];
    $dr[$i][2] = $row["idcategoria"];
    $dr[$i][3] = $row["modulo"];    
    $dr[$i][4] = $row["idconteudo"];    
    $dr[$i][5] = $row["ordem"]; 
    $dr[$i][6] = $row["description"]; 
    $dr[$i][7] = $row["keywords"];  
    $dr[$i][8] = $row["title"]; 
    $dr[$i][9] = $row["ativo"]; 
    $dr[$i][10] = $row["url"];  
    $dr[$i][11] = $row["view"];       
    $dr[$i][12] = $row["ordem_registros"]; 
    $i++;
  }
}
catch(PDOException $e)
{}  
return $dr;
}   


public function update_ordem($ordem)
{
  $st_query = "
  UPDATE modulos
  SET
  ordem_registros = '$ordem'
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


public function get_ordem_registros($id) {
  $st_query = "
  SELECT id, ordem_registros
  FROM modulos 
  WHERE id = $id";

  $dr = array();

  try {
   $r = array();
   $i = 0;
   $dbh=getdbh();
   $stmt = $dbh->query($st_query);
   while ($row = $stmt->fetch()) {
    $dr[0] = $row["id"];
    $dr[1] = $row["ordem_registros"];
    $i++;
  }
} catch (PDOException $e) {

}
return $dr;
}

public function get_conteudo_titulo($id) {
  $st_query = "
  SELECT titulotexto
  FROM modulos 
  WHERE id = $id";

  $r = "";

  try {
   $dbh=getdbh();
   $stmt = $dbh->query($st_query);
   while ($row = $stmt->fetch()) {
    $r = $row["titulotexto"];
  }
} catch (PDOException $e) {

}
return $r;
}


public function get_conteudo_texto($id) {
  $st_query = "
  SELECT id, texto
  FROM modulos 
  WHERE id = $id";

  $r = "";

  try {
   $dbh=getdbh();
   $stmt = $dbh->query($st_query);
   while ($row = $stmt->fetch()) {
    $r = $row["texto"];
          if(isset($_SESSION["credencial"])) {
        if($_SESSION["credencial"] == "0" || $_SESSION["credencial"] == "1") {
          $r .= "<a href='". myUrl("tao/editar_modulo/?idconteudo=") . $row["id"] ."' class='editar'>Editar</a>";
        }
      }
  }
} catch (PDOException $e) {

}

$r = str_replace("../../imagens/",myUrl() . "imagens/",$r);

return $r;
}


public function set_relacionado($idcatalogo,$idmodulo)
{

  $st_query = "
  INSERT INTO catalogorelacionados
  (
  idcatalogo,
  idmodulo
  )
  VALUES
  (
  $idcatalogo,
  $idmodulo
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

public function existe_relacionado($idcatalogo,$idmodulo) {
  $dbh=getdbh();
  $r = current($dbh->query("select count(*) from catalogorelacionados WHERE idcatalogo = ". $idcatalogo ." AND idmodulo = ". $idmodulo ." ")->fetch());
  return $r;
}


public function out_relacionado($idcatalogo,$idmodulo) {

  $st_query = "
  DELETE FROM catalogorelacionados
  WHERE idcatalogo = $idcatalogo
  AND idmodulo = $idmodulo
  "
  ;
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


public function readModulosTipo()
{
  $st_query = "
  SELECT id, titulo, modulo
  FROM modulostipo 
  ORDER BY id";

  $dr = array();  
  $r = array();
  $i=0;

  try
  {
   $dbh=getdbh();
   $stmt = $dbh->query($st_query);
   while ($row = $stmt->fetch()) {
    $dr[$i][0] = $row["id"];
    $dr[$i][1] = $row["titulo"];
    $dr[$i][2] = $row["modulo"];

    $i++;
  }
}
catch(PDOException $e)
{}  
return $dr;
}   

public function update_container($id, $ordem) {
  $st_query = "
  UPDATE moduloscontainers
  SET
  ordem = $ordem
  WHERE
  id = " . $id;

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


public function get_categoria_pai($id) {
  $st_query = "
  SELECT idcategoria
  FROM modulos
  WHERE id = $id";

  $r = "";  
  $i=0;

  try
  {

    $dbh=getdbh();
    $stmt = $dbh->query($st_query);
    while ($row = $stmt->fetch()) {
      $r = $this->get_categoria_pai_($row["idcategoria"]);
      $i++;
    }
  }
  catch(PDOException $e)
  {}  
  return $r;
} 

public function onde_estou_tao($id) {
  $st_query = "
  SELECT *
  FROM modulos
  WHERE id = $id";

  $r = ""; 

  try
  {
    $dbh=getdbh();
    $stmt = $dbh->query($st_query);
    while ($row = $stmt->fetch()) {
      $r = $this->onde_estou_tao($row["idcategoria"]) . "<li><a href='". myUrl("tao/editar_modulo/?idconteudo=". $row["idconteudo"]) ."'>". $row["titulo"] ."</a></li>";
    }
  }
  catch(PDOException $e)
  {}  

  return $r;
}  

public function get_total($idcategoria) {

  $dbh=getdbh();
  $totallinhas = current($dbh->query("select count(*) from modulos WHERE idcategoria=".$idcategoria)->fetch());

  return $totallinhas;
}

public function mudar_categorias($idcategoria) {

  $Config = new ConfigModel();
  $config = $Config->readItensXmlConfig();
  $ordem_menu_catalogo = $config[0]->ordem_menu_catalogo;

  $st_query = "
  SELECT id, idcategoria, titulo
  FROM modulos
  WHERE idcategoria = 0
  ORDER BY $ordem_menu_catalogo";


  $r = "<div id='fechar_mudar_categoria' onclick='fechar_mudar_categoria()'></div>"; 
  $r .= "<ol>"; 
  $r .= "<li style='font-weight: bold; color: skyblue'><span><a href='javascript:void(0)' onclick=passar_para_categoria('" . $idcategoria . "','0')></a></span>Raiz/Primeiro Nível</li>"; 

  try
  {
    $dbh=getdbh();
    $stmt = $dbh->query($st_query);
    while ($row = $stmt->fetch()) {
     $r .= "<li id='pai". $row["id"] ."' onclick=open_filhos('pai". $row["id"] ."') ondblclick=close_filhos('pai". $row["id"] ."')>". $row["titulo"] . "<span><a href='javascript:void(0)' onclick=passar_para_categoria('" . $idcategoria . "','". $row["id"] ."')>x</a></span>";
     $r .= "<ol>"; 
     $r .= $this->mudar_categorias_niveis($row["id"],$idcategoria);
     $r .= "</ol>"; 
     $r .= "</li>";
   }
 }
 catch(PDOException $e)
 {}  

 $r .= "</ol>"; 

 return $r;
}  

public function mudar_categorias_niveis($id,$idcategoria) {
  $st_query = "
  SELECT id, idcategoria, titulo
  FROM modulos
  WHERE idcategoria = $id
  ORDER BY ordem";

  $r = ""; 

  try
  {
    $dbh=getdbh();
    $stmt = $dbh->query($st_query);
    while ($row = $stmt->fetch()) {

     $r .= "<li id='pai". $row["id"] ."' onclick=open_filhos('pai". $row["id"] ."') ondblclick=close_filhos('pai". $row["id"] ."')>". $row["titulo"] . "<span><a href='javascript:void(0)' onclick=passar_para_categoria('" . $idcategoria . "','". $row["id"] ."')>x</a></span>";
     $r .= "<ol>"; 
     $r .= $this->mudar_categorias_niveis($row["id"],$idcategoria);
     $r .= "</ol>"; 
     $r .= "</li>";

   }
 }
 catch(PDOException $e)
 {}  


 return $r;
} 



public function passar_para_categoria($id,$idcategoria)
{
  $st_query = "
  UPDATE modulos
  SET
  idcategoria = $idcategoria
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



public function SetAr($id, $ar)
{
  $st_query = "
  UPDATE modulos
  SET
  ar = '$ar'
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