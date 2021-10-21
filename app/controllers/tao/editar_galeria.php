<?php

require_once("app/controllers/core.php");

function _editar_galeria() {

  $core=new Core(); 
  $data = $core->getData($id="1",$idcat="0");

  if(isset($_POST["update_galeria"])) {
    $idgaleria=$_GET["idgaleria"];
    /*tabela galeria*/
    $titulo = $_POST["titulo"];
    $texto = $_POST["editor1"];  
    $texto = str_replace("'", "´", $texto); 
    $imagem = $_POST["imagem"]; 

    $o_galerias = new GaleriaModel(); 
    $galeria = $o_galerias->update_galeria($idgaleria,$titulo,$texto,$imagem);
  }

  $o_galeria = new GaleriaModel(); 
  $galeria = $o_galeria->getRow($_GET["idgaleria"]);

  $data["titulo"] = $galeria[3];
  $data["descricao"] = $galeria[5];
  $data["imagem"] = $galeria[4];

  $_SESSION["voltar_itens"] = $_SERVER['REQUEST_URI'];

  View::do_dump(VIEW_PATH. 'tao/editar_galeria.php',$data);

}


?>
