<?php

require_once("app/controllers/core.php");

function _editar_modulo() {

  $core=new Core(); 
  $data = $core->getData($id="1",$idcat="0");

  $idconteudo = $_GET["idconteudo"];
  
  if(isset($_POST["update_modulo"])) {
     $idconteudo=$idconteudo;
    /*tabela conteudo*/
    $titulo = $_POST["titulo"];
    $texto = $_POST["editor1"];  
    /*tabela modulo*/
    $title = $_POST["title"]; 
    $titulo_menu = $_POST["titulo_menu"];  
    $description = $_POST["description"];  
    $keywords = $_POST["keywords"];  
    $modulo = $_POST["modulo"];  
    $url_externo = ""; 

    if(isset($_POST["url_externo"])) {
    $url_externo = $_POST["url_externo"]; 
    }

    $sliders = "";

    if(isset($_POST["id_sliders"])) {
      for($iii=0; $iii < count($_POST["id_sliders"]); $iii++)
        $sliders .= $_POST["id_sliders"][$iii] . ",";
    }

    $id_container_caixa_texto_flex =  "0"; // $_POST["destaques_flex"]; 

    $texto = str_replace("'", "´", $texto); 

    $o_modulo = new ModulosModel(); 
    $o_modulo->setIdConteudo($idconteudo);
    $o_modulo->setTitulo($titulo_menu);
    $o_modulo->setTitle($title);
    $o_modulo->setDescription($description);
    $o_modulo->setKeywords($keywords);
    $o_modulo->setModulo($modulo);
    $o_modulo->setUrl($url_externo);
    $o_modulo->setIdContainerCaixaTextoFlex($id_container_caixa_texto_flex);
    $o_modulo->setSliders($sliders);
    $o_modulo->setTituloTexto($titulo);
    $o_modulo->setTexto($texto);

    $modulo = $o_modulo->update_modulo();

  }

  $o_modulo = new ModulosModel(); 
  $o_modulo->setIdConteudo($idconteudo );
  $modulo = $o_modulo->getRowById($idconteudo);

  $data["idmodulo"] = $idconteudo;
  $data["idconteudo"] = $idconteudo;
  $data["titulo"] = $modulo[11];
  $data["conteudo"] = $modulo[12];
  $data["titulo_menu"] = $modulo["2"];
  $data["title"] = $modulo["3"];
  $data["description"] = $modulo["4"];
  $data["keywords"] = $modulo["5"];
  $data["modulo"] = $modulo["6"];
  $data["id_container_caixa_texto_flex"] = $modulo["7"];
  $data["ativo"] = $modulo["8"];
  $data["url_externo"] = $modulo["9"];
  $data["ids_sliders"] = $modulo["10"];
  $data["ar"] = $modulo["13"];
  $data["menu1"] = $modulo["14"];
  $data["menu2"] = $modulo["15"];
  $data["menu3"] = $modulo["16"];

  $Modulos = new ModulosModel();
  $data['ondeestou_tao'] = "<ul class='onde-estou'><li>Onde Estou: </li>" . $Modulos->onde_estou_tao($modulo[0]) . "</ul>";

  /* DESTAQUES FLEX */
  $o_destaques_flex = new ContainersCaixaTextoFlexModel(); 
  $dr_destaques_flex = $o_destaques_flex->getRows();
  $i=0;
  $s_destaques_flex  = "<select name='destaques_flex'>";

  $s_destaques_flex .= "<option value='0'>";
  $s_destaques_flex .= "Nenhum destaque flex selecionado";
  $s_destaques_flex .= "</option>";

  foreach ($dr_destaques_flex as $rowf[]) {

    if($rowf[$i][0] == $data["id_container_caixa_texto_flex"]) {
      $s_destaques_flex .= "<option selected value='". $rowf[$i][0] ."'>";
      $s_destaques_flex .= $rowf[$i][1];
      $s_destaques_flex .= "</option>";
    } else {
      $s_destaques_flex .= "<option value='". $rowf[$i][0] ."'>";
      $s_destaques_flex .= $rowf[$i][1];
      $s_destaques_flex .= "</option>";
    }

    $i++;
  }
  $s_destaques_flex .= "</select>";
  $data["destaques_flex"] = $s_destaques_flex;

  /* MODULOS */

  $dr_modulos = $o_modulo->getModulos();
  $i=0;
  $s_modulos  = "<select name='modulo'>";


  foreach ($dr_modulos as $row[]) {
    if($row[$i][2] != "Index") {
      if(strtolower($row[$i][2]) ==  strtolower($data["modulo"])) {
        $s_modulos .= "<option value='". $row[$i][2] ."' selected>";
        $s_modulos .= $row[$i][1];
        $s_modulos .= "</option>";
      } else {
        $s_modulos .= "<option value='". $row[$i][2] ."'>";
        $s_modulos .= $row[$i][1];
        $s_modulos .= "</option>";
      }
    }
    
    $i++;
  }
  $s_modulos .= "</select>";

  if($_GET["idconteudo"]=="1") {
    $s_modulos  = "<select name='modulo'>";
    $s_modulos .= "<option>";
    $s_modulos .= "Index";
    $s_modulos .= "</option>";
    $s_modulos .= "</select>";
  }

  $data["destaques"] = getContainersCaixaTextoFixo($data["idmodulo"]);

  $dr_containers = $o_modulo->readModuloContainers($modulo[0]);

  $data["containers"] = "<div id='cnt-menu' class='cnt-menu'>";

  $i=0;

  foreach ($dr_containers as $row_c[]) {

    $data["containers"] .= "<div class='column' draggable='true'>";
    $data["containers"] .= "<div id='". $row_c[$i][0] ."' data-id_container='". $row_c[$i][2] ."' >";
    $data["containers"] .= get_containers($row_c[$i][2]);
    $data["containers"] .= "</div>";
    $data["containers"] .= "</div>";

    $i++;
  }

  $data["containers"] .= "</div>";



$o_sliders = new SlidersModel();
$dr_sliders = $o_sliders->getRows("1000", "0", "0", "", "dma");

$sliders = "<ul>";
$iii=0;

$c = "";

foreach ($dr_sliders as $row_sliders[]) {
  if($row_sliders[$iii][0] != "#p#") {
    if(isset($row_sliders[$iii][4])) {
    $c = verificar_slider($row_sliders[$iii][0],$data["ids_sliders"]);
    $sliders .= "<li style='width: 100px;height: 50px; overflow: hidden; font-size: 10px'><input " . $c . " name='id_sliders[]' type='checkbox' value='". $row_sliders[$iii][0]  ."'>". $row_sliders[$iii][3] . "<img src='". myUrl("ImageImagens.php?&imagem=" . $row_sliders[$iii][4] . "&w=100&h=30") . "'></li>";

    // $sliders .= "<li style=width: 50px; overflow: hidden><input " . $c . " name='id_sliders[]' type='checkbox' value='".$row_sliders[$iii][0]  ."'><img src='". myUrl("ImageImagens.php?&imagem=" . $row_sliders[$iii][4] . "&w=100&h=30") ." style='height:30px!important'><br><span style='font-size: 10px'>" .$row_sliders[$iii][3] . "</span></li>";

  }
}
  $iii++;
}
$sliders .= "</ul>";

$data["modulos"] = $s_modulos;
$data["galeria_imagens"] = getImagens();
$data["sliders"] = $sliders;

$data["itens_filhos"] = "";

if($data["modulo"] == "Categorias" || $data["modulo"] == "Index") {
  $data["itens_filhos"] = "";
} else {
  $data["itens_filhos"] = "<td><a class='xlink-total-itens' href='". myUrl("tao/itens_modulo/?idmodulo=". $data["idmodulo"] ."&modulo=" . $data["modulo"] ) ."'><span class='icone_edit_itens'></span>". getTotal($data["modulo"], $data["idmodulo"]) ." itens</a>";     
}

View::do_dump(VIEW_PATH. 'tao/editar_modulo.php',$data);

}

function get_containers($container) {

 $o_containers = new ContainersModel(); 
 $o_containers->setId($container);
 $dr_containers = $o_containers->readItens("id");

 $containers = "";

 $i=0;

 foreach ($dr_containers as $row[]) {
   $containers .= "<div>";
   $containers .= $row[$i][1];
   $containers .= "</div>";

   $i++; 
 }

 return $containers;
}


function getImagens()
{

  $o_imagens = new FilesModel();
  $drimagens = $o_imagens->openDir("imagens/");
  $r = $drimagens;

  $r = "<ul class='imagens'>";

  foreach ($drimagens as $key => $value) {
   //   $r .= "<img src='" . myUrl("ImageImagens.php?imagem=" . $value) . "'><br>";
    $r .= "<img src='" . myUrl("ImageImagens.php?imagem=" . $value . "&w=100&h=25&dir=conteudo") . "' onclick=passarImagem('". $value ."')>";
  }

  $r .= "</ul>";

/*
  http://127.0.0.1:8888/tao/ImageImagens.php?imagem=04-03-2019-02-33-37.jpg&w=100&h=25&dir=conteudo
      $r .= "<li>";
      $r .= "<img src='" . myUrl("ImageImagens.php?imagem=" . $row[$i][5] . "&w=300&h=225&dir=conteudo") . "' onclick=passarImagem('". $row[$i][5] ."')>";
      $r .= "</li>";
      $i++;

*/

      return $r;
    }


    function getContainersCaixaTextoFixo($idmodulo) {

      $cnt="";
      $c=""; 

      $ic=0;
      $xxx="";

      $o_containers = new ContainersModel();
      $dr_con=$o_containers->readContainers("ordem");
     // echo $dr_con[0][2];
      $ix=0;
      foreach ($dr_con as $row[]) {
        $xxx .= "<div class='cnt-container'>";
        $xxx .= "<div>";
        $c =  verificaModulo($dr_con[$ix][0]);
        $xxx .= "<input id='".$ix."' type='checkbox' ". $c ." name='containers[]' value='".$row[$ix][0]."' onclick='set_container(".$ix.",".$row[$ix][0].",". $idmodulo .")' />";
        $xxx .= "</div>";
        $xxx .= "<div>";
        $xxx .= $dr_con[$ix][1] . " <a href='". myUrl("tao") ."/editar_container_fixo/?idcontainer=". $dr_con[$ix][0] ."'>Editar</a>";
        $xxx .= "</div>";
        $xxx .="</div>";
        $ix++; 
        $c = "";
      }

      return $xxx;
    }

    function verificaModulo($x) {

      $c="";
      $i=0;
      $c = "";

      $o_modulo = new ModulosModel();
      $o_modulo->setIdConteudo($_GET["idconteudo"]);
      $dr_modulo=$o_modulo->getRowById($_GET["idconteudo"]);
      $idmodulo=$dr_modulo[0];

     // echo $idmodulo;
      $dr_cnt = $o_modulo->readModuloContainers($idmodulo);
      $i=0;

      foreach ($dr_cnt as $row[]) {
       if($x == $row[$i][2]) {
        $c = "checked";
      }
     //   echo $row[$i][2] . "<br>";
      $i++;

    }

    return $c;

  }


  function verificar_slider($ss,$s) {
    $c="";
    $i=0;
    $c = "";

    $dr_slider = array();
    $dr_slider = explode(",", $s);

    foreach ($dr_slider as $row[]) {
      if($ss == $row[$i]) {
        $x = $row[$i];
        $c = "checked";
      }
      $i++;
    }

    return $c;

  }

  function getTotal($modulo, $idcategoria) {

    switch ($modulo) {
      case 'Catalogo':
      $o_catalogo = new CatalogoModel();
      $total = $o_catalogo->getTotalRegistrosCategoria($idcategoria);
      break;
      case 'Galeria':
      $o_catalogo = new GaleriaModel();
      $total = $o_catalogo->getTotalRegistrosCategoria($idcategoria);
      break; 
      case 'Downloads':
      $o_catalogo = new DownloadsModel();
      $total = $o_catalogo->getTotalRegistrosCategoria($idcategoria);
      break;      
      case 'ImoveisAlugar':
      $o_catalogo = new ImoveisModel();
      $total = $o_catalogo->getTotalRegistrosCategoria($idcategoria);
      break;  
      case 'ImoveisComprar':
      $o_catalogo = new ImoveisModel();
      $total = $o_catalogo->getTotalRegistrosCategoria($idcategoria);
      break; 
      case 'Blog':
      $o_catalogo = new BlogModel();
      $total = $o_catalogo->getTotalRegistrosCategoria($idcategoria);
      break; 
      case 'InstitucionalAr':
      $o_catalogo = new InstitucionalArModel();
      $total = $o_catalogo->getTotalRegistrosCategoria($idcategoria);
      break;       
      default:
      $o_catalogo = new InstitucionalModel();
      $total = $o_catalogo->getTotalRegistrosCategoria($idcategoria);
      break;    
  }
    
    return $total;
  }

  ?>


