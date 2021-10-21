<?php

require_once("app/controllers/core.php");

function _editar_blog() {

  $core=new Core(); 
  $data = $core->getData($id="1",$idcat="0");

  if(isset($_POST["update_conteudo"])) {
    $idconteudo=$_GET["idconteudo"];
    /*tabela conteudo*/
    $titulo = $_POST["titulo"];
    $texto = $_POST["editor1"]; 
    $texto = str_replace("'", "´", $texto); 

    $o_conteudos = new BlogModel(); 
    $conteudo = $o_conteudos->update_blog($idconteudo,$titulo,$texto);
  }

  $o_Institucional = new BlogModel(); 
  $conteudo = $o_Institucional->getRow($_GET["idconteudo"]);

  $post_na_home = "";
  $checked= "";
  $vitrine = $conteudo[6];

    if($vitrine == 1) {
      $checked = "checked";
    }

  $post_na_home  = "<label class='switch'>";
  $post_na_home .= "<input id='vitrine' type='checkbox' ". $checked ."  name='vitrine' value='". $vitrine ."' onclick=ativar_post('". $conteudo[0] ."')>";
  $post_na_home .= "</label>";

  $data["titulo"] = $conteudo[1];
  $data["conteudo"] = $conteudo[2];
  $data["post_na_home"] = $post_na_home;

  View::do_dump(VIEW_PATH. 'tao/editar_blog.php',$data);

}


?>
