<?php

function _modulos_trocar() { 

  $ln=10000;
  $x=0;
  $y=0;
  $pg="";
  $modulo="Catalogo";
  $ordem="titulo";
  $relacionado="0";
  $checked = "";

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
  $o_modulos = new ModulosModel(); 
  $dr_modulos = $o_modulos->getRowsTodos($ln, $x, $y, $modulo, $ordem);

  $r = "<ul>";

  for ($i=0; $i <= count($dr_modulos); $i++) {

    if(isset($dr_modulos[$i][0])) {

      if($dr_modulos[$i][0] > 0) {

     //  $relacionado = $o_modulos->existe_relacionado($_POST['id'],$dr_modulos[$i][0]);
     //  if($relacionado == 1) {
     //   $checked = "checked";
     //  }
       $r .= "<li>";
       $r .= "<input ".$checked." id='modulo". $dr_modulos[$i][0] ."' type='radio' name='modulo' value='0' onclick=trocar_modulo(".$dr_modulos[$i][0].")>";
       $r .= $dr_modulos[$i][3];
       $r .= "</li>";
       $checked = "";
     }

     if($dr_modulos[$i][0] == "#p#") {
      //$pg = str_replace("?controle=page&acao=open&id=",myUrl("galeria/index/"),$dr_modulos[$i][1]);
      //$pg = str_replace("page","_modulos",$dr_modulos[$i][1]);
      //$pg = str_replace("?controle=page&acao=open&id=",myUrl("galeria/index/".$id),$dr_modulos[$i][1]);
      //$pg = str_replace("&idcategoria=","/" . "",$pg);
      //$pg = str_replace("&x=","/?x=", $pg);
      //$pg = str_replace("&y=","&y=", $pg);
     }
   }

  $r .= "</ul>";
 }

echo $r;
}



 ?>
