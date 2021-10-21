<?php

require_once("app/controllers/core.php");

function _index($id="0",$idcategoria="0",$x="0",$y="0") { 

  $core=new Core();
  $data = $core->getData($id,$idcategoria);

  $data['modulo'] = getCategorias($id,$idcategoria,$data["ordem_registros"]);

  $tema = $data["config_site"][0]->tema;
  View::do_dump(VIEW_PATH. $tema . '/categorias.php',$data);

}

  function getCategorias($id,$idcategoria,$ordem_registros)
  {
    $Modulos = new MenusModel();
    $r = $Modulos->readItensCategorias($idcategoria,$ordem_registros);
    return $r;
  }
?>
