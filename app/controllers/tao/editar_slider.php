<?php

require_once("app/controllers/core.php");

function _editar_slider() {

  $core=new Core(); 
  $data = $core->getData($id="1",$idcat="0");

  if(isset($_POST["update_slider"])) {
    $idslider=$_GET["idslider"];
    /*tabela sliders*/
    $titulo = $_POST["titulo"];
    $texto = $_POST["editor1"];  
    $imagem = $_POST["imagem"]; 
    $classe = $_POST["classe"]; 
    $url_pagina = $_POST["url_pagina"]; 

    $visivel="";    
    $i=0;
    if(isset($_POST["modulos"])) {
      foreach ($_POST["modulos"] as $row[]) {
        $visivel .= $_POST["modulos"][$i] . ",";  
        $i++; 
      }
    }

    $o_sliders = new SlidersModel(); 
    $slider = $o_sliders->update_slider($idslider,$titulo,$texto,$imagem,$visivel,$classe,$url_pagina);
  }

  $o_Sliders = new SlidersModel(); 
  $slider = $o_Sliders->getRow($_GET["idslider"]);

  $data["titulo"] = $slider[1];
  $data["texto"] = $slider[2];
  $data["imagem"] = $slider[3];
  $data["visivel"] = $slider[4];
  $data["classe"] = $slider[5];
  $data["url_pagina"] = $slider[6];
 
  $o_modulos = new ModulosModel(); 
  $dr_modulos = $o_modulos->getModulos();
  $modulos = "";
  $i=0;
  $iv=0;

  $c = "";

    $modulos .= "<div class='cnt-modulos'>";
    $modulos .= "<div>";
    $c =  verificaModulo($data["visivel"],"Index");
    $modulos .= "<input id='home' type='checkbox' ". $c ." name='modulos[]' value='Index' />";
    $modulos .= "<label for='home'></label>";
    $modulos .= "</div>";
    $modulos .= "<div>";
    $modulos .= "Home";
    $modulos .= "</div>";
    $modulos .="</div>";

  foreach ($dr_modulos as $row[]) {
    $modulos .= "<div class='cnt-modulos'>";
    $modulos .= "<div>";
    $c =  verificaModulo($data["visivel"],$dr_modulos[$i][2]);
    $modulos .= "<input id='".$dr_modulos[$i][0]."' type='checkbox' ". $c ." name='modulos[]' value='".$dr_modulos[$i][2]."' />";
    $modulos .= "<label for='".$dr_modulos[$i][0]."'></label>";
    $modulos .= "</div>";
    $modulos .= "<div>";
    $modulos .= $dr_modulos[$i][1];
    $modulos .= "</div>";
    $modulos .="</div>";
    $i++; 
    $c = "";
  }

  $data["modulos"] =  $modulos;
  $data["tema"] =$data["config_site"][0]->tema;

  View::do_dump(VIEW_PATH. 'tao/editar_slider.php',$data);

}


function verificaModulo($visivel,$modulos) {
  $c="";
  $i=0;
  $c = "";

  $dr_visivel = array();
  $dr_visivel = explode(",", $visivel);

  foreach ($dr_visivel as $row[]) {
    if($modulos == $row[$i]) {
      $x = $row[$i];
      $c = "checked";
    }
   $i++;
  }

      return $c;

}

?>
