<?php

require_once("app/controllers/core.php");

function _itens_modulo() {

  $core=new Core(); 
  $data = $core->getData($id="1",$idcat="0");

  if(isset($_POST["update_ordem"])) {
   $o_modulos = new ModulosModel();
   $o_modulos->setId($_GET["idmodulo"]);
   $o_modulos->update_ordem($_POST["ordem_registros"]);
 }

 $modulo=$_GET["modulo"];
 $idmodulo=$_GET["idmodulo"];

 $itens_galeria = $data['itens_galeria'];
 $itens_catalogo = $data['itens_catalogo'];
 $itens_imoveis = $data['itens_imoveis'];
 $itens_downloads = $data['itens_downloads'];
 $itens_blog = $data['itens_blog'];
 $itens_landingpage = $data['itens_landingpage'];
 $itens_institucional = $data['itens_institucional'];
 $itens_institucionalar = $data['itens_institucionalar'];

 switch ($modulo) {

  case 'Catalogo':
  $pagina="catalogo";
  $data['itens'] = MontaCatalogo($idmodulo, $itens_catalogo);
  break;

  case 'Galeria':
  $pagina="galeria";
  $data['itens'] = MontaGaleria($idmodulo, $itens_galeria);
  break; 

  case 'Landingpage':
  $pagina="landingpage";
  $data['itens'] = MontaLandingpage($idmodulo, $itens_landingpage, $modulo);
  break;

  case 'ImoveisComprar':
  $pagina="imoveis";
  $data['itens'] = MontaImoveis($idmodulo, $itens_imoveis);
  break;

  case 'ImoveisAlugar':
  $pagina="imoveis";
  $data['itens'] = MontaImoveis($idmodulo, $itens_imoveis);
  break;

  case 'Blog':
  $pagina="blog";
  $data['itens'] = MontaBlog($idmodulo, $itens_blog);
  break; 

  case 'Downloads':
  $pagina="downloads";
  $data['itens'] = MontaDownloads($idmodulo, $itens_downloads);
  break; 

  case 'Institucional':
  $pagina="institucional";
  $data['itens'] = MontaInstitucional($idmodulo, $itens_institucional, $modulo);
  break;

  case 'institucional':
  $pagina="institucional";
  $data['itens'] = MontaInstitucional($idmodulo, $itens_institucional, $modulo);
  break;

  case 'Institucionalar':
  $pagina="institucionalar";
  $data['itens'] = MontaInstitucionalAr($idmodulo, $itens_institucionalar, $modulo);
  break;

}

$Modulos = new ModulosModel();

$data['ondeestou_tao'] = "<ul class='onde-estou'><li>Onde Estou: </li>" . $Modulos->onde_estou_tao($_GET["idmodulo"]) . "</ul>";

View::do_dump(VIEW_PATH. 'tao/itens_'. $pagina .'.php',$data);

}

function MontaCatalogo($idcategoria, $itens_catalogo)
{
  $Config = new ConfigModel();
  $config = $Config->readItensXmlConfig();

  $x = "0";
  $y = "0";

  if(isset($_GET["x"]))
  {
    $x = $_GET["x"];
  }

  if(isset($_GET["y"]))
  {
    $y = $_GET["y"];
  }

  $dr = array();
  $drCatalogos = array();
  $Catalogos = new CatalogoModel();
  $Catalogos->setIdCategoria($idcategoria);
  $o_modulos = new ModulosModel(); 
  $dr_modulos = $o_modulos->get_ordem_registros($idcategoria);
  $ordem_registro=$dr_modulos[1];

  $drCatalogos = $Catalogos->readItens($itens_catalogo, $x, $y, $ordem_registro);

  $imagem = "semimagem.png";

  $r="<table id='cnt-menu' class='cnt-catalogo'>";
  $r.="<thead>";
  $r.="<tr>";
  $r.="<th>Imagem</th>";
  $r.="<th>Titulo</th>";
  $r.="<th>";
  $r.="Data/Hora";
  $r.="</th>";
  $r.="<th width='30'>";
  $r.="";
  $r.="</th>";  
  $r.="</thead>";

  $_SESSION["voltar_itens_catalogo"] = $_SERVER['REQUEST_URI'];

  for ($x=0; $x <= count($drCatalogos); $x++) {

    if(isset($drCatalogos[$x][0])) {

      if($drCatalogos[$x][0] > 0) {
       $drx=$Catalogos->readItemImagem($drCatalogos[$x][0]);
       $imagem=$drx[0][2];

       if($imagem==""){$imagem="semimagem.jpg";}
       
       $r .= "<tr id='row".$drCatalogos[$x][0]."' class='column' draggable='true'>";

       $r .= "<td>";
       $r .= "<input type='hidden' value='".$drCatalogos[$x][0]."'>";
       $r .= "<a href='" . myUrl("tao/catalogo_detalhes/?idcatalogo=". $drCatalogos[$x][0]) . "'>";
       $r .= "<img src='" . myUrl("ImageImagens.php?imagem=" . $imagem . "&w=50&h=225&dir=catalogo") . "'>";
       $r .= "</a>";
       $r .= "</td>";
       
       $r .= "<td style='text-align: left'>";
       $r .= "<a href='" . myUrl("tao/catalogo_detalhes/?idcatalogo=". $drCatalogos[$x][0]) . "'><span class='icone_lapis'></span>";
       $r .= $drCatalogos[$x][4];
       $r .= "</a>";
       $r .= "</td>";

       $r .= "<td>";
       $dma = new DateTime($drCatalogos[$x][1]);
       $r .= "<spam style='color:skyblue'>" . $dma->format('d/m/Y h:i:s') . "</spam>";
       $r .= "</td>";

       $r .= "<td>";
       $r .= "<a class='trash icon' href='javascript:void(0)' onclick='excluir_item(".$drCatalogos[$x][0].")'>";
       $r .= "";
       $r .= "</a>";
       $r .= "</td>";

       $r .= "</tr>";
     }

     if($drCatalogos[$x][0] == "#p#") {
      $pg = str_replace("page","Catalogo",$drCatalogos[$x][1]);
      $pg = str_replace("?controle=page&acao=open&id=",myUrl("tao/itens_modulo/?idmodulo=".$idcategoria."&modulo=Catalogo&x=". $x . "&y=". $y . ""),$drCatalogos[$x][1]);
      $pg = str_replace("&idcategoria=","",$pg);
    }
  }
}


$r .= "</table>";


$r .= "<div>";
$r .= $pg;
$r .= "</div>";

return ordemRegistrosCatalogo() . $r;

}


function MontaGaleria($idcategoria,$itens_galeria)
{
  $Config = new ConfigModel();
  $config = $Config->readItensXmlConfig();

  $x = "0";
  $y = "0";
  $pg="";

  if(isset($_GET["x"]))
  {
    $x = $_GET["x"];
  }

  if(isset($_GET["y"]))
  {
    $y = $_GET["y"];
  }

  $dr = array();
  $drGaleria = array();
  $Galeria = new GaleriaModel();
  $Galeria->setIdCategoria($idcategoria);
  $o_modulos = new ModulosModel(); 
  $dr_modulos = $o_modulos->get_ordem_registros($idcategoria);
  $ordem_registro=$dr_modulos[1];
  $drGaleria = $Galeria->readItens($itens_galeria, $x, $y, $ordem_registro);

  $imagem = "semimagem.png";

  $r="<table id='cnt-menu'>";
  $r.="<thead>";
  $r.="<tr>";

  $r.="<th width='50'>";
  $r.="Imagem";
  $r.="</th>";

  $r.="<th>";
  $r.="Titulo";
  $r.="</th>";

  $r.="<th>";
  $r.="Data/hora";
  $r.="</th>";

  $r.="<th>";
  $r.="Excluir";
  $r.="</th>";  

  $r.="</thead>";

  $_SESSION["voltar_itens_galeria"] = $_SERVER['REQUEST_URI'];

  for ($x=0; $x <= count($drGaleria); $x++) {

    if(isset($drGaleria[$x][0])) {

      if($drGaleria[$x][0] > 0) {
       $imagem=$drGaleria[$x][4];

       if($imagem==""){$imagem="semimagem.jpg";}

       $r .= "<tr id='row".$drGaleria[$x][0]."' class='column' draggable='true'>";

       $r .= "<td width='50'>";
       $r .= "<input type='hidden' value='".$drGaleria[$x][0]."'>";
       $r .= "<a  href='" . myUrl("tao/editar_galeria/?idgaleria=". $drGaleria[$x][0]) . "'>";
       $r .= "<img src='" . myUrl("ImageImagens.php?imagem=" . $imagem . "&w=50&h=225&dir=galeria") . "'>";
       $r .= "</a>";
       $r .= "</td>";

       $r .= "<td style='text-align: left'>";
       $r .= "<a href='" . myUrl("tao/editar_galeria/?idgaleria=". $drGaleria[$x][0]) . "'><span class='icone_lapis'></span>";
       $r .= $drGaleria[$x][3];
       $r .= "</a>";
       $r .= "</td>";

       $r .= "<td>";
       $dma = new DateTime($drGaleria[$x][1]);
       $r .= "<spam style='color:skyblue'>" . $dma->format('d/m/Y h:i:s') . "</spam>";
       $r .= "</td>";

       $r .= "<td>";
       $r .= "<a class='icone-lixo' href='javascript:void(0)' onclick='excluir_item(".$drGaleria[$x][0].")'>";
       $r .= "";
       $r .= "</a>";
       $r .= "</td>";

       $r .= "</tr>";
     }

     if($drGaleria[$x][0] == "#p#") {
      $pg = str_replace("page","Galeria",$drGaleria[$x][1]);
      $pg = str_replace("?controle=page&acao=open&id=",myUrl("tao/itens_modulo/?idmodulo=".$idcategoria."&modulo=Galeria&x=". $x . "&y=". $y . ""),$drGaleria[$x][1]);
      $pg = str_replace("&idcategoria=","",$pg);
    }
  }
}


$r .= "</table>";


$r .= "<div>";
$r .= $pg;
$r .= "</div>";

return ordemRegistrosGaleria() . $r;

}

function MontaLandingpage($idcategoria, $itens_landingpage,$modulo) {
  $Config = new ConfigModel();
  $config = $Config->readItensXmlConfig();

  $x = "0";
  $y = "0";
  $pg="";

  if(isset($_GET["x"]))
  {
    $x = $_GET["x"];
  }

  if(isset($_GET["y"]))
  {
    $y = $_GET["y"];
  }

  $dr = array();
  $dr_modulos = array();
  $drCatalogos = array();
  $Conteudo = new LandingpageModel(); 
  $Conteudo->setIdCategoria($idcategoria);
  $o_modulos = new ModulosModel(); 
  $dr_modulos = $o_modulos->get_ordem_registros($idcategoria);
  $ordem_registro=$dr_modulos[1];

  $dr_conteudo = $Conteudo->readItens($itens_landingpage, $x, $y, $ordem_registro);

  $r="<table id='cnt-menu'>";
  
  $r.="<thead>";
  $r.="<tr id='0'>";
  $r.="<th>Titulo</th>";
  $r.="<th>Data/Hora</th>";
  $r.="<th>Excluir</th>";  
  $r.="</tr>";
  $r.="</thead>";

  $i=0;

  $_SESSION["voltar_itens"] = $_SERVER['REQUEST_URI'];

  for ($x=0; $x <= count($dr_conteudo); $x++) {

    if(isset($dr_conteudo[$x][0])) {

      if($dr_conteudo[$x][0] > 0) {

       $r .= "<tr id='row".$dr_conteudo[$x][0]."' class='column' draggable='true'>";
       $r .= "<td style='text-align: left'>";
       $r .= "<input type='hidden' value='".$dr_conteudo[$x][0]."'>";
       $r .= "<a href='" . myUrl("tao/editar_institucional/?idconteudo=". $dr_conteudo[$x][0]) . "&modulo=".$modulo."'><span class='icone_lapis'></span>";
       $r .= $dr_conteudo[$x][3];
       $r .= "</a>";
       $r .= "</td>";
       $r .= "<td>";
       $dma = new DateTime($dr_conteudo[$x][1]);
       $r .= "<spam style='color:skyblue'>" . $dma->format('d/m/Y h:i:s') . "</spam>";
       $r .= "</td>";
       $r .= "<td><a class='icone-lixo' href='javascript:void(0)' onclick='excluir_item(".$dr_conteudo[$x][0].")'></a></td>";

       $r .= "</tr>";

     }

     if($dr_conteudo[$x][0] == "#p#") {
      $pg = str_replace("page","Pad",$dr_conteudo[$x][1]);
      $pg = str_replace("?controle=page&acao=open&id=",myUrl("tao/itens_modulo/?idmodulo=".$idcategoria."&modulo=Pad&x=". $x . "&y=". $y . ""),$dr_conteudo[$x][1]);
      $pg = str_replace("&idcategoria=","",$pg);
    }
  }
}

$r .= "</table>";

$r .= "<div>";
$r .= $pg;
$r .= "</div>";

return ordemRegistrosLandingpage() . $r;

}

function MontaInstitucional($idcategoria, $itens_institucional,$modulo) {
  $Config = new ConfigModel();
  $config = $Config->readItensXmlConfig();

  $x = "0";
  $y = "0";
  $pg="";

  if(isset($_GET["x"]))
  {
    $x = $_GET["x"];
  }

  if(isset($_GET["y"]))
  {
    $y = $_GET["y"];
  }

  $dr = array();
  $dr_modulos = array();
  $drCatalogos = array();
  $Conteudo = new InstitucionalModel(); 
  $Conteudo->setIdCategoria($idcategoria);
  $o_modulos = new ModulosModel(); 
  $dr_modulos = $o_modulos->get_ordem_registros($idcategoria);
  $ordem_registro=$dr_modulos[1];

  $dr_conteudo = $Conteudo->readItens($itens_institucional, $x, $y, $ordem_registro);

  $r="<table id='cnt-menu'>";
  
  $r.="<thead>";
  $r.="<tr id='0'>";
  $r.="<th>Titulo</th>";
  $r.="<th>Data/Hora</th>";
  $r.="<th>Excluir</th>";  
  $r.="</tr>";
  $r.="</thead>";

  $i=0;

  $_SESSION["voltar_itens"] = $_SERVER['REQUEST_URI'];

  for ($x=0; $x <= count($dr_conteudo); $x++) {

    if(isset($dr_conteudo[$x][0])) {

      if($dr_conteudo[$x][0] > 0) {

       $r .= "<tr id='row".$dr_conteudo[$x][0]."' class='column' draggable='true'>";
       $r .= "<td style='text-align: left'>";
       $r .= "<input type='hidden' value='".$dr_conteudo[$x][0]."'>";
       $r .= "<a href='" . myUrl("tao/editar_institucional/?idconteudo=". $dr_conteudo[$x][0]) . "&modulo=".$modulo."'><span class='icone_lapis'></span>";
       $r .= $dr_conteudo[$x][3];
       $r .= "</a>";
       $r .= "</td>";
       $r .= "<td>";
       $dma = new DateTime($dr_conteudo[$x][1]);
       $r .= "<spam style='color:skyblue'>" . $dma->format('d/m/Y h:i:s') . "</spam>";
       $r .= "</td>";
       $r .= "<td><a class='icone-lixo' href='javascript:void(0)' onclick='excluir_item(".$dr_conteudo[$x][0].")'></a></td>";

       $r .= "</tr>";

     }

     if($dr_conteudo[$x][0] == "#p#") {
      $pg = str_replace("page","Pad",$dr_conteudo[$x][1]);
      $pg = str_replace("?controle=page&acao=open&id=",myUrl("tao/itens_modulo/?idmodulo=".$idcategoria."&modulo=Pad&x=". $x . "&y=". $y . ""),$dr_conteudo[$x][1]);
      $pg = str_replace("&idcategoria=","",$pg);
    }
  }
}

$r .= "</table>";

$r .= "<div>";
$r .= $pg;
$r .= "</div>";

return ordemRegistrosInstitucional() . $r;

}


function MontaInstitucionalAr($idcategoria, $itens_institucionalar,$modulo) {

  $Config = new ConfigModel();
  $config = $Config->readItensXmlConfig();

  $x = "0";
  $y = "0";
  $pg="";

  if(isset($_GET["x"]))
  {
    $x = $_GET["x"];
  }

  if(isset($_GET["y"]))
  {
    $y = $_GET["y"];
  }

  $dr = array();
  $dr_modulos = array();
  $drCatalogos = array();
  $Conteudo = new InstitucionalArModel(); 
  $Conteudo->setIdCategoria($idcategoria);
  $o_modulos = new ModulosModel(); 
  $dr_modulos = $o_modulos->get_ordem_registros($idcategoria);
  $ordem_registro=$dr_modulos[1];

  $dr_conteudo = $Conteudo->readItens($itens_institucionalar, $x, $y, $ordem_registro);

  $r="<table id='cnt-menu'>";
  
  $r.="<thead>";
  $r.="<tr id='0'>";
  $r.="<th>Titulo</th>";
  $r.="<th>Data/Hora</th>";
  $r.="<th>Excluir</th>";  
  $r.="</tr>";
  $r.="</thead>";

  $i=0;

  $_SESSION["voltar_itens"] = $_SERVER['REQUEST_URI'];

  for ($x=0; $x <= count($dr_conteudo); $x++) {

    if(isset($dr_conteudo[$x][0])) {

      if($dr_conteudo[$x][0] > 0) {

       $r .= "<tr id='row".$dr_conteudo[$x][0]."' class='column' draggable='true'>";
       $r .= "<td style='text-align: left'>";
       $r .= "<input type='hidden' value='".$dr_conteudo[$x][0]."'>";
       $r .= "<a href='" . myUrl("tao/editar_institucionalar/?idconteudo=". $dr_conteudo[$x][0]) . "&modulo=".$modulo."'><span class='icone_lapis'></span>";
       $r .= $dr_conteudo[$x][3];
       $r .= "</a>";
       $r .= "</td>";
       $r .= "<td>";
       $dma = new DateTime($dr_conteudo[$x][1]);
       $r .= "<spam style='color:skyblue'>" . $dma->format('d/m/Y h:i:s') . "</spam>";
       $r .= "</td>";
       $r .= "<td><a class='icone-lixo' href='javascript:void(0)' onclick='excluir_item(".$dr_conteudo[$x][0].")'></a></td>";

       $r .= "</tr>";

     }

     if($dr_conteudo[$x][0] == "#p#") {
      $pg = str_replace("page","Pad",$dr_conteudo[$x][1]);
      $pg = str_replace("?controle=page&acao=open&id=",myUrl("tao/itens_modulo/?idmodulo=".$idcategoria."&modulo=Pad&x=". $x . "&y=". $y . ""),$dr_conteudo[$x][1]);
      $pg = str_replace("&idcategoria=","",$pg);
    }
  }
}

$r .= "</table>";

$r .= "<div>";
$r .= $pg;
$r .= "</div>";

return ordemRegistrosInstitucionalAr() . $r;

}

function MontaBlog($idcategoria, $itens_blog) {
  $Config = new ConfigModel();
  $config = $Config->readItensXmlConfig();

  $x = "0";
  $y = "0";
  $pg="";

  if(isset($_GET["x"]))
  {
    $x = $_GET["x"];
  }

  if(isset($_GET["y"]))
  {
    $y = $_GET["y"];
  }

  $dr = array();
  $dr_modulos = array();
  $drCatalogos = array();
  $Conteudo = new BlogModel(); 
  $Conteudo->setIdCategoria($idcategoria);
  $o_modulos = new ModulosModel(); 
  $dr_modulos = $o_modulos->get_ordem_registros($idcategoria);
  $ordem_registro=$dr_modulos[1];

  $dr_conteudo = $Conteudo->readItens($itens_blog, $x, $y, $ordem_registro);

  $r="<table id='cnt-menu'>";
  
  $r.="<thead>";
  $r.="<tr id='0'>";
  $r.="<th>Titulo</th>";
  $r.="<th>Data/Hora</th>";
  $r.="<th>Excluir</th>";  
  $r.="</tr>";
  $r.="</thead>";

  $i=0;

  $_SESSION["voltar_itens"] = $_SERVER['REQUEST_URI'];

  for ($x=0; $x <= count($dr_conteudo); $x++) {

    if(isset($dr_conteudo[$x][0])) {

      if($dr_conteudo[$x][0] > 0) {

       $r .= "<tr id='row".$dr_conteudo[$x][0]."' class='column' draggable='true'>";
       $r .= "<td style='text-align: left'>";
       $r .= "<input type='hidden' value='".$dr_conteudo[$x][0]."'>";
       $r .= "<a href='" . myUrl("tao/editar_blog/?idconteudo=". $dr_conteudo[$x][0]) . "&modulo='><span class='icone_lapis'></span>";
       $r .= $dr_conteudo[$x][3];
       $r .= "</a>";
       $r .= "</td>";
       $r .= "<td>";
       $dma = new DateTime($dr_conteudo[$x][1]);
       $r .= "<spam style='color:skyblue'>" . $dma->format('d/m/Y h:i:s') . "</spam>";
       $r .= "</td>";
       $r .= "<td><a class='icone-lixo' href='javascript:void(0)' onclick='excluir_item(".$dr_conteudo[$x][0].")'></a></td>";

       $r .= "</tr>";

     }

     if($dr_conteudo[$x][0] == "#p#") {
      $pg = str_replace("page","Pad",$dr_conteudo[$x][1]);
      $pg = str_replace("?controle=page&acao=open&id=",myUrl("tao/itens_modulo/?idmodulo=".$idcategoria."&modulo=Pad&x=". $x . "&y=". $y . ""),$dr_conteudo[$x][1]);
      $pg = str_replace("&idcategoria=","",$pg);
    }
  }
}

$r .= "</table>";

$r .= "<div>";
$r .= $pg;
$r .= "</div>";

return ordemRegistrosBlog() . $r;

}

function ordemRegistrosInstitucional() {

  $s = "";
  $i=0;
  $ii=0;
  $sdesc = "";

  $rdst ="<ul class='ordem-dos-textos'>";

  if(isset($_GET["modulo"])){

    $o_Modulo = new ModulosModel();
    $o_Modulo->setId($_GET['idmodulo']);

    $s_ordem = "<select id='ordem_registros' name='ordem_registros'>";

    $ids_dst = $o_Modulo->readModulosOrdem_Registros("institucional");
    $xxx = $o_Modulo->readModuloById($_GET['idmodulo']);

    foreach ($ids_dst as $key => $value) {

      for ($ii=0; $ii < count($xxx); $ii++) { 
        if($xxx[$ii][12] == $value){
          $s = "selected";
          $sdesc = "";
        }
        if($xxx[$ii][12] == $value . " desc"){
          $sdesc = "selected";
          $s = "";
        }

      }

      $s_ordem .= "<option ".$s.">";
      $s_ordem .= $value;
      $s_ordem .= "</option>";

      $s_ordem .= "<option ". $sdesc .">";
      $s_ordem .= $value . " desc";
      $s_ordem .= "</option>";

      $s="";
      $sdesc="";

    } 

  } 

  $r  = "<form id='form-ordem' method='POST' action='" . 
  myUrl("tao/itens_modulo/?idmodulo=". $_GET["idmodulo"] ."&modulo=". $_GET["modulo"] ."") . "''>";
  $r .= "<label>Ordenação dos Itens </label>";
  $r .= $s_ordem;
  $r .= "<input type='hidden' name='update_ordem' value='update'>";
  $r .= "<button type='submit'>Aplicar</button>";
  $r .= "</form>";

  return $r;

}

function ordemRegistrosInstitucionalAr() {

  $s = "";
  $i=0;
  $ii=0;
  $sdesc = "";

  $rdst ="<ul class='ordem-dos-textos'>";

  if(isset($_GET["modulo"])){

    $o_Modulo = new ModulosModel();
    $o_Modulo->setId($_GET['idmodulo']);

    $s_ordem = "<select id='ordem_registros' name='ordem_registros'>";

    $ids_dst = $o_Modulo->readModulosOrdem_Registros("institucional");
    $xxx = $o_Modulo->readModuloById($_GET['idmodulo']);

    foreach ($ids_dst as $key => $value) {

      for ($ii=0; $ii < count($xxx); $ii++) { 
        if($xxx[$ii][12] == $value){
          $s = "selected";
          $sdesc = "";
        }
        if($xxx[$ii][12] == $value . " desc"){
          $sdesc = "selected";
          $s = "";
        }

      }

      $s_ordem .= "<option ".$s.">";
      $s_ordem .= $value;
      $s_ordem .= "</option>";

      $s_ordem .= "<option ". $sdesc .">";
      $s_ordem .= $value . " desc";
      $s_ordem .= "</option>";

      $s="";
      $sdesc="";

    } 

  } 

  $r  = "<form id='form-ordem' method='POST' action='" . 
  myUrl("tao/itens_modulo/?idmodulo=". $_GET["idmodulo"] ."&modulo=". $_GET["modulo"] ."") . "''>";
  $r .= "<label>Ordenação dos Itens </label>";
  $r .= $s_ordem;
  $r .= "<input type='hidden' name='update_ordem' value='update'>";
  $r .= "<button type='submit'>Aplicar</button>";
  $r .= "</form>";

  return $r;

}


function ordemRegistrosCatalogo() {

  $s = "";
  $sdesc = "";

  $i=0;
  $ii=0;

  $rdst ="<ul class='ordem-dos-textos'>";

  if(isset($_GET["modulo"])){

    $o_Modulo = new ModulosModel();
    $o_Modulo->setId($_GET['idmodulo']);

    $s_ordem = "<select id='ordem_registros' name='ordem_registros'>";

    $ids_dst = $o_Modulo->readModulosOrdem_Registros("catalogo");
    $xxx = $o_Modulo->readModuloById($_GET['idmodulo']);

    foreach ($ids_dst as $key => $value) {

      for ($ii=0; $ii < count($xxx); $ii++) { 
        if($xxx[$ii][12] == $value){
          $s = "selected";
          $sdesc = "";
        }
        if($xxx[$ii][12] == $value . " desc"){
          $sdesc = "selected";
          $s = "";
        }

      }

      $s_ordem .= "<option ".$s.">";
      $s_ordem .= $value;
      $s_ordem .= "</option>";

      $s_ordem .= "<option ". $sdesc .">";
      $s_ordem .= $value . " desc";
      $s_ordem .= "</option>";

      $s="";
      $sdesc="";

    } 

  } 

  $s_ordem .= "</select>";

  $r  = "<form id='form-ordem' method='POST' action='" . 
  myUrl("tao/itens_modulo/?idmodulo=". $_GET["idmodulo"] ."&modulo=". $_GET["modulo"] ."") . "''>";
  $r .= "<label>Ordenação dos Itens </label>";
  $r .= $s_ordem;
  $r .= "<input type='hidden' name='update_ordem' value='update'>";
  $r .= "<button type='submit'>Aplicar</button>";
  $r .= "</form>";

  return $r;

}



function ordemRegistrosGaleria() {

  $s = "";
  $sdesc = "";

  $i=0;
  $ii=0;

  $rdst ="<ul class='ordem-dos-textos'>";

  if(isset($_GET["modulo"])){

    $o_Modulo = new ModulosModel();
    $o_Modulo->setId($_GET['idmodulo']);

    $s_ordem = "<select id='ordem_registros' name='ordem_registros'>";

    $ids_dst = $o_Modulo->readModulosOrdem_Registros("galeria");
    $xxx = $o_Modulo->readModuloById($_GET['idmodulo']);

    foreach ($ids_dst as $key => $value) {

      for ($ii=0; $ii < count($xxx); $ii++) { 
        if($xxx[$ii][12] == $value){
          $s = "selected";
          $sdesc = "";
        }
        if($xxx[$ii][12] == $value . " desc"){
          $sdesc = "selected";
          $s = "";
        }

      }

      $s_ordem .= "<option ".$s.">";
      $s_ordem .= $value;
      $s_ordem .= "</option>";

      $s_ordem .= "<option ". $sdesc .">";
      $s_ordem .= $value . " desc";
      $s_ordem .= "</option>";

      $s="";
      $sdesc="";

    } 
  } 

  $s_ordem .= "</select>";

  $r  = "<form id='form-ordem' method='POST' action='" . 
  myUrl("tao/itens_modulo/?idmodulo=". $_GET["idmodulo"] ."&modulo=". $_GET["modulo"] ."") . "''>";
  $r .= "<label>Ordenação dos Itens </label>";
  $r .= $s_ordem;
  $r .= "<input type='hidden' name='update_ordem' value='update'>";
  $r .= "<button type='submit'>Aplicar</button>";
  $r .= "</form>";

  return $r;

}

function ordemRegistrosImoveis() {

  $s = "";
  $sdesc = "";

  $i=0;
  $ii=0;

  $rdst ="<ul class='ordem-dos-textos'>";

  if(isset($_GET["modulo"])){

    $o_Modulo = new ModulosModel();
    $o_Modulo->setId($_GET['idmodulo']);

    $s_ordem = "<select name='ordem_registros'>";

    $ids_dst = $o_Modulo->readModulosOrdem_Registros("imoveis");
    $xxx = $o_Modulo->readModuloById($_GET['idmodulo']);

    foreach ($ids_dst as $key => $value) {

      for ($ii=0; $ii < count($xxx); $ii++) { 
        if($xxx[$ii][12] == $value){
          $s = "selected";
          $sdesc = "";
        }
        if($xxx[$ii][12] == $value . " desc"){
          $sdesc = "selected";
          $s = "";
        }

      }

      $s_ordem .= "<option ".$s.">";
      $s_ordem .= $value;
      $s_ordem .= "</option>";

      $s_ordem .= "<option ". $sdesc .">";
      $s_ordem .= $value . " desc";
      $s_ordem .= "</option>";

      $s="";
      $sdesc="";

    } 

  } 

  $s_ordem .= "</select>";

  $r  = "<form id='form-ordem' method='POST' action='" . 
  myUrl("tao/itens_modulo/?idmodulo=". $_GET["idmodulo"] ."&modulo=". $_GET["modulo"] ."") . "''>";
  $r .= "<label>Ordenação dos Itens </label>";
  $r .= $s_ordem;
  $r .= "<input type='hidden' name='update_ordem' value='update'>";
  $r .= "<button type='submit'>Aplicar</button>";
  $r .= "</form>";

  return $r;

}

function MontaImoveis($idcategoria, $itens_imoveis)
{
  $Config = new ConfigModel();
  $config = $Config->readItensXmlConfig();

  $x = "0";
  $y = "0";

  if(isset($_GET["x"]))
  {
    $x = $_GET["x"];
  }

  if(isset($_GET["y"]))
  {
    $y = $_GET["y"];
  }

  $dr = array();
  $drImoveis = array();
  $Imoveis = new ImoveisModel();
  $Imoveis->setIdCategoria($idcategoria);
  $o_modulos = new ModulosModel(); 
  $dr_modulos = $o_modulos->get_ordem_registros($idcategoria);
  $ordem_registro=$dr_modulos[1];

  $drImoveis = $Imoveis->readItens($itens_imoveis, $x, $y, $ordem_registro);

  $imagem = "semimagem.png";
  $r="<table class='cnt-imoveis'>";

  $r.="<thead>";
  $r.="<tr>";
  $r.="<th>Imagem</th>";
  $r.="<th>Código</th>";
  $r.="<th>";
  $r.="Perfil";
  $r.="</th>";
  $r.="<th>Bairro</th>";

  $r.="<th>";
  $r.="Data/Hora";
  $r.="</th>";  

  $r.="<th>";
  $r.="Exc";
  $r.="</th>";  

  $r.="</thead>";

  $_SESSION["voltar_itens_imoveis"] = $_SERVER['REQUEST_URI'];

  for ($x=0; $x <= count($drImoveis); $x++) {

    if(isset($drImoveis[$x][0])) {

      if($drImoveis[$x][0] > 0) {
       $drx=$Imoveis->readItemImagem($drImoveis[$x][0]);
       $imagem=$drx[0][2];

       if($imagem==""){$imagem="semimagem.jpg";}
       $r .= "<tr id='row".$drImoveis[$x][0]."'>";

       $r .= "<td>";
       $r .= "<a href='" . myUrl("tao/imoveis_detalhes/?idimovel=". $drImoveis[$x][0]) . "'>";
       $r .= "<img src='" . myUrl("ImageImagens.php?imagem=" . $imagem . "&w=50&h=225&dir=imoveis") . "'>";
       $r .= "</a>";
       $r .= "</td>";

       $r .= "<td>";
       $r .= "<a href='" . myUrl("tao/imoveis_detalhes/?idimovel=". $drImoveis[$x][0]) . "'><span class='icone_lapis'></span>";
       $r .= $drImoveis[$x][3];
       $r .= "</a>";
       $r .= "</td>";

       $r .= "<td>";
       $r .= "<a href='" . myUrl("tao/imoveis_detalhes/?idimovel=". $drImoveis[$x][0]) . "'>";
       $r .= $drImoveis[$x][4];
       $r .= "</a>";
       $r .= "</td>";

       $r .= "<td>";
       $r .= "<a href='" . myUrl("tao/imoveis_detalhes/?idimovel=". $drImoveis[$x][0]) . "'>";
       $r .= $drImoveis[$x][10];
       $r .= "</a>";
       $r .= "</td>";


       $r .= "<td>";
       $dma = new DateTime($drImoveis[$x][1]);
       $r .= "<spam style='color:skyblue'>" . $dma->format('d/m/Y h:i:s') . "</spam>";
       $r .= "</td>";


       $r .= "<td>";
       $r .= "<a class='trash icon' href='javascript:void(0)' onclick='excluir_item(".$drImoveis[$x][0].")'>";
       $r .= "";
       $r .= "</a>";
       $r .= "</td>";     
       $r .= "</tr>";
     }

     if($drImoveis[$x][0] == "#p#") {
      $pg = str_replace("page","ImoveisComprar",$drImoveis[$x][1]);
      $pg = str_replace("?controle=page&acao=open&id=",myUrl("tao/itens_modulo/?idmodulo=".$idcategoria."&modulo=ImoveisComprar&x=". $x . "&y=". $y . ""),$drImoveis[$x][1]);
      $pg = str_replace("&idcategoria=","",$pg);
    }
  }
}


$r .= "</table>";


$r .= "<div>";
$r .= $pg;
$r .= "</div>";

return ordemRegistrosImoveis() . $r;

}

function MontaDownloads($idcategoria,$itens_downloads) {

  $Config = new ConfigModel();
  $config = $Config->readItensXmlConfig();

  $x = "0";
  $y = "0";
  $pg="";

  if(isset($_GET["x"]))
  {
    $x = $_GET["x"];
  }

  if(isset($_GET["y"]))
  {
    $y = $_GET["y"];
  }

  $dr = array();
  $drDownloads = array();
  $Downloads = new DownloadsModel();
  $Downloads->setIdCategoria($idcategoria);
  $o_modulos = new ModulosModel(); 
  $dr_modulos = $o_modulos->get_ordem_registros($idcategoria);
  $ordem_registro=$dr_modulos[1];
  $drDownloads = $Downloads->readItens($itens_downloads, $x, $y, $ordem_registro);

  $imagem = "semimagem.png";

  $r="<table id='cnt-menu'>";
  $r.="<thead>";
  $r.="<tr>";

  $r.="<th>";
  $r.="Titulo / Arquivo";
  $r.="</th>";

  $r.="<th>";
  $r.="Data/hora";
  $r.="</th>";

  $r.="<th>";
  $r.="Excluir";
  $r.="</th>";  

  $r.="</thead>";

  $_SESSION["voltar_itens_fownloads"] = $_SERVER['REQUEST_URI'];

  for ($x=0; $x <= count($drDownloads); $x++) {

    if(isset($drDownloads[$x][0])) {

      if($drDownloads[$x][0] > 0) {
       $imagem=$drDownloads[$x][4];

       if($imagem==""){$imagem="semimagem.jpg";}

       $r .= "<tr id='row".$drDownloads[$x][0]."' class='column' draggable='true'>";
       
       $r .= "<td style='text-align: left'>";
       $r .= "<input type='hidden' value='".$drDownloads[$x][0]."'>";
       $r .= "<a href='" . myUrl("tao/editar_downloads/?iddownload=". $drDownloads[$x][0]) . "'><span class='icone_lapis'></span>";
       $r .= $drDownloads[$x][3];
       $r .= "</a>";
       $r .= "<br>";
       $r .= "<small>" . $drDownloads[$x][4] . "</small>";
       $r .= "</td>";

       $r .= "<td style='text-align: center'>";
       $dma = new DateTime($drDownloads[$x][1]);
       $r .= "<spam style='color:skyblue'>" . $dma->format('d/m/Y h:i:s') . "</spam>";
       $r .= "</td>";

       $r .= "<td style='text-align: center'>";
       $r .= "<a class='trash icon' href='javascript:void(0)' onclick='excluir_item(".$drDownloads[$x][0].")'>";
       $r .= "";
       $r .= "</a>";
       $r .= "</td>";

       $r .= "</tr>";
     }

     if($drDownloads[$x][0] == "#p#") {
      $pg = str_replace("page","Galeria",$drDownloads[$x][1]);
      $pg = str_replace("?controle=page&acao=open&id=",myUrl("tao/itens_modulo/?idmodulo=".$idcategoria."&modulo=Galeria&x=". $x . "&y=". $y . ""),$drDownloads[$x][1]);
      $pg = str_replace("&idcategoria=","",$pg);
    }
  }
}


$r .= "</table>";


$r .= "<div>";
$r .= $pg;
$r .= "</div>";

return ordemRegistrosDownloads() . $r;

}


function ordemRegistrosDownloads() {

  $s = "";
  $sdesc = "";

  $i=0;
  $ii=0;

  $rdst ="<ul class='ordem-dos-textos'>";

  if(isset($_GET["modulo"])){

    $o_Modulo = new ModulosModel();
    $o_Modulo->setId($_GET['idmodulo']);

    $s_ordem = "<select id='ordem_registros' name='ordem_registros'>";

    $ids_dst = $o_Modulo->readModulosOrdem_Registros("downloads");
    $xxx = $o_Modulo->readModuloById($_GET['idmodulo']);

    foreach ($ids_dst as $key => $value) {

      for ($ii=0; $ii < count($xxx); $ii++) { 
        if($xxx[$ii][12] == $value){
          $s = "selected";
          $sdesc = "";
        }
        if($xxx[$ii][12] == $value . " desc"){
          $sdesc = "selected";
          $s = "";
        }

      }

      $s_ordem .= "<option ".$s.">";
      $s_ordem .= $value;
      $s_ordem .= "</option>";

      $s_ordem .= "<option ". $sdesc .">";
      $s_ordem .= $value . " desc";
      $s_ordem .= "</option>";

      $s="";
      $sdesc="";

    } 
  } 

  $s_ordem .= "</select>";

  $r  = "<form id='form-ordem' method='POST' action='" . 
  myUrl("tao/itens_modulo/?idmodulo=". $_GET["idmodulo"] ."&modulo=". $_GET["modulo"] ."") . "''>";
  $r .= "<label>Ordenação dos Itens </label>";
  $r .= $s_ordem;
  $r .= "<input type='hidden' name='update_ordem' value='update'>";
  $r .= "<button type='submit'>Aplicar</button>";
  $r .= "</form>";

  return $r;

}


function ordemRegistrosBlog() {

  $s = "";
  $i=0;
  $ii=0;
  $sdesc = "";

  $rdst ="<ul class='ordem-dos-textos'>";

  if(isset($_GET["modulo"])){

    $o_Modulo = new ModulosModel();
    $o_Modulo->setId($_GET['idmodulo']);

    $s_ordem = "<select id='ordem_registros' name='ordem_registros'>";

    $ids_dst = $o_Modulo->readModulosOrdem_Registros("blog");
    $xxx = $o_Modulo->readModuloById($_GET['idmodulo']);

    foreach ($ids_dst as $key => $value) {

      for ($ii=0; $ii < count($xxx); $ii++) { 
        if($xxx[$ii][12] == $value){
          $s = "selected";
          $sdesc = "";
        }
        if($xxx[$ii][12] == $value . " desc"){
          $sdesc = "selected";
          $s = "";
        }

      }

      $s_ordem .= "<option ".$s.">";
      $s_ordem .= $value;
      $s_ordem .= "</option>";

      $s_ordem .= "<option ". $sdesc .">";
      $s_ordem .= $value . " desc";
      $s_ordem .= "</option>";

      $s="";
      $sdesc="";

    } 

  } 

  $r  = "<form id='form-ordem' method='POST' action='" . 
  myUrl("tao/itens_modulo/?idmodulo=". $_GET["idmodulo"] ."&modulo=". $_GET["modulo"] ."") . "''>";
  $r .= "<label>Ordenação dos Itens </label>";
  $r .= $s_ordem;
  $r .= "<input type='hidden' name='update_ordem' value='update'>";
  $r .= "<button type='submit'>Aplicar</button>";
  $r .= "</form>";

  return $r;

}


?>

