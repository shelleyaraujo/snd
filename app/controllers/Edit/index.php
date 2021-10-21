<?php

require_once("app/controllers/core.php");

function _index($id="0",$idcategoria="0",$x="0",$y="0") { 

  $core=new Core();
  $dr = $core->getData($id,$idcategoria);

  $data['menu_catalogo']=$dr["menu_catalogo"];
  $data['menu_institucional']=$dr["menu_institucional"];
  $data['menu_lateral']=$dr["menu_lateral"];
  $data['meta_tag']=$dr["meta_tag"];
  $data['config_site']=$dr["config_site"];
  $data['destaques_fixos']=$dr["destaques_fixos"];
  $data['sliders']=$dr["sliders"];
  $data['conteudo_titulo']=$dr["conteudo_titulo"];
  $data['conteudo_texto']=$dr["conteudo_texto"];
  $data['destaques']=$dr["destaques"];

  $data['modulo'] = getCategorias($id,$idcategoria,$dr["ordem_registros"]);

  $tema = $dr["config_site"][0]->tema;
  View::do_dump(VIEW_PATH. $tema . '/categorias.php',$data);

}

  function getCategorias($id,$idcategoria,$ordem_registros)
  {
    $Modulos = new MenusModel();
    $r = $Modulos->readItensCategorias($idcategoria,$ordem_registros);
    return $r;
  }
?>
