<?php

require_once("app/controllers/core.php");

function _editar_conteudo_destaque_flex() {

  $core=new Core(); 
  $data = $core->getData($id="1",$idcat="0");

  $o_Conteudos = new ConteudosModel(); 
  $conteudo = $o_Conteudos->getRow($_GET["idconteudo"]);

  $post_na_home = "";
  $checked= "";
  $vitrine = $conteudo[6];

  if($conteudo[0] != 1) {
  $data["titulo"] = $conteudo[1];
  $data["conteudo"] = $conteudo[2];
  $data["classe"] = $conteudo[3];
}

  View::do_dump(VIEW_PATH. 'tao/editar_conteudo_destaque_flex.php',$data);

}


?>
