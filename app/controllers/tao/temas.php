<?php

require_once("app/controllers/core.php");

function _temas() {

	$core=new Core(); 
	$data = $core->getData($id="1",$idcat="0");

   $Config = new ConfigModel();
   $config = $Config->readItensXmlConfig();

   if(isset($_GET["tema"])) {
      $Config->updateItemXmlConfig("tema", $_GET['tema']);
  }

  $data["temas"] = temas();

  View::do_dump(VIEW_PATH. 'tao/temas.php',$data);

}

 function temas() {

      $Config = new ConfigModel();
      $config = $Config->readItensXmlConfig();

      $r = "";
      $raiz = "app/views/";
      $Files = new FilesModel();
      $files = $Files->openDir($raiz);

      $i=0;
      $ii=0;
      $dr_tema=array();
      $dr_tema[0][0] = "0";
      $dr_tema[0][1] = "0";
      $selecionado ="aliceblue";

      $r = "<div class='cnt-temas'>";

      foreach ($files as $key => $value) {

         if($config[0]->tema == $value) {
            $selecionado ="#264653";               
         }

         if(strstr($value,"tema_")) {
            $r .= "<div class='temas' style='background-color: ". $selecionado ."'>";
            $r .= "<div>";
            $r .= str_replace("tema_"," ", $value);
            $r .= "</div>";
            $r .= "<div>";
            $r .= "<a class='button-vazado' href='". myUrl("tao/temas/?tema=" . $value) ."'>Ativar</a>";
            $r .= "</div>";
            $r .= "</div>";
         }

               $selecionado ="aliceblue";

         
      }

      $r .= "</div>";

      return $r;

      

   }


