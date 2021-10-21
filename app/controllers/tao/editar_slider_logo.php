<?php

require_once("app/controllers/core.php");

function _editar_slider_logo() {

  $core=new Core(); 
  $data = $core->getData($id="1",$idcat="0");

  if(isset($_POST["update_slider"])) {
    $idslider=$_GET["idslider"];
    $titulo = $_POST["titulo"];
    $texto = $_POST["editor1"];  
    $imagem = $_POST["imagem"]; 
    $i=0;
    $o_sliders = new SliderLogosModel(); 
    $slider = $o_sliders->update_slider($idslider,$titulo,$texto,$imagem);
  }

  $o_Sliders = new SliderLogosModel(); 
  $slider = $o_Sliders->getRow($_GET["idslider"]);

  $data["titulo"] = $slider[1];
  $data["texto"] = $slider[2];
  $data["imagem"] = $slider[3];

  $o_modulos = new ModulosModel(); 
  $dr_modulos = $o_modulos->getModulos();
  $modulos = "";
  $i=0;
  $iv=0;

  $c = "";

    $modulos .= "<div class='cnt-modulos'>";
    $modulos .= "<div>";
    $modulos .= "</div>";
    $modulos .= "<div>";
    $modulos .= "Home";
    $modulos .= "</div>";
    $modulos .="</div>";

  foreach ($dr_modulos as $row[]) {
    $modulos .= "<div class='cnt-modulos'>";
    $modulos .="</div>";
    $i++; 
    $c = "";
  }

  $data["modulos"] =  $modulos;

  View::do_dump(VIEW_PATH. 'tao/editar_slider_logo.php',$data);

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
