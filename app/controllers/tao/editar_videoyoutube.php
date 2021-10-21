<?php

require_once("app/controllers/core.php");

function _editar_videoyoutube() {

  $core=new Core(); 
  $data = $core->getData($id="1",$idcat="0");

  if(isset($_POST["update_conteudo"])) {

        // quebra a url da string que contem o video

        $v= "";
        $vex = explode("v=", $_POST["url_video"]); 

        if(isset($vex[1]))
        {
          $vex2 = explode("&", $vex[1]); 

          $v = str_replace("<p>", "", $vex2[0]);
          $v = str_replace("</p>", "", $v);
          $v = trim($v);
        }
          // fim da quebra


    $idconteudo=$_GET["idconteudo"];
    /*tabela conteudo*/
    $titulo = $_POST["titulo"];
    $texto = $_POST["editor1"];  
    $texto = str_replace("'", "´", $texto); 

    $o_conteudos = new ConteudosModel(); 
    $conteudo = $o_conteudos->update_conteudo_videoyoutube($idconteudo,$titulo,$texto,$v);
  }

  $o_Conteudos = new ConteudosModel(); 
  $conteudo = $o_Conteudos->getRow($_GET["idconteudo"]);

  $post_na_home = "";
  $checked= "";
  $vitrine = $conteudo[6];

  if($conteudo[0] != 1) {

    if($vitrine == 1) {
      $checked= "checked";
    }

    $post_na_home = "Post na Home ";
    $post_na_home .= "<label class='switch'>";
    $post_na_home .= "<input id='vitrine' type='checkbox' ". $checked ."  name='vitrine' value='". $vitrine ."' onclick=ativar_post('". $conteudo[0] ."')>";
    $post_na_home .= "<label for='vitrine'>Check Box</label>";
    $post_na_home .= " <span class='slider'></span>";
    $post_na_home .= "</label>";
  }

  $data["titulo"] = $conteudo[1];
  $data["conteudo"] = $conteudo[2];
  $data["post_na_home"] = $post_na_home;
  $data["url_video"] = $conteudo[5];

  View::do_dump(VIEW_PATH. 'tao/editar_videoyoutube.php',$data);

}


?>
