<?php

require_once("app/controllers/core.php");

function _editar_downloads() {

  $core=new Core(); 
  $data = $core->getData($id="1",$idcat="0");

  if(isset($_POST["update_downloads"])) {
    $iddownload=$_GET["iddownload"];
    /*tabela downloads*/
    $titulo = $_POST["titulo"];
    $texto = $_POST["editor1"];  
    $texto = str_replace("'", "´", $texto); 

    $o_downloads = new DownloadsModel(); 
    $downloads = $o_downloads->update_downloads($iddownload,$titulo,$texto);
  }

  $o_downloads = new DownloadsModel(); 
  $downloads = $o_downloads->getRow($_GET["iddownload"]);

  $data["titulo"] = $downloads[3];
  $data["descricao"] = $downloads[8];
  $data["arquivo"] = $downloads[4];

  $_SESSION["voltar_itens"] = $_SERVER['REQUEST_URI'];

  View::do_dump(VIEW_PATH. 'tao/editar_downloads.php',$data);

}


?>
