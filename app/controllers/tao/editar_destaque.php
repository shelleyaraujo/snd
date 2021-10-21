<?php

require_once("app/controllers/core.php");

function _editar_destaque() {

  $core=new Core(); 
  $data = $core->getData($id="1",$idcat="0");

  if(isset($_POST["update_conteudo"])) {
    $idconteudo=$_GET["idconteudo"];
    /*tabela conteudo*/
    $titulo = $_POST["titulo"];
    $texto = $_POST["editor1"];  

    $o_conteudos = new ConteudosModel(); 
    $conteudo = $o_conteudos->update_destaque($idconteudo,$titulo,$texto);
  }

  $o_Conteudos = new ConteudosModel(); 
  $conteudo = $o_Conteudos->getRow($_GET["idconteudo"]);

  $data["titulo"] = $conteudo[1];
  $data["conteudo"] = $conteudo[2];

  View::do_dump(VIEW_PATH. 'tao/editar_destaque.php',$data);
  
}

?>
