<?php

require_once("app/controllers/core.php");

function _editar_institucional() {

  $core=new Core(); 
  $data = $core->getData($id="1",$idcat="0");

  if(isset($_POST["update_conteudo"])) {
    $idconteudo=$_GET["idconteudo"];
    /*tabela conteudo*/
    $titulo = $_POST["titulo"];
    $texto = $_POST["editor1"]; 
    $texto = str_replace("'", "´", $texto); 
 
    $o_conteudos = new InstitucionalModel(); 
    $conteudo = $o_conteudos->update_conteudo($idconteudo,$titulo,$texto);
  }

  $o_Institucional = new InstitucionalModel(); 
  $conteudo = $o_Institucional->getRow($_GET["idconteudo"]);

  $post_na_home = "";
  $checked= "";
  $ativo = $conteudo[3];

  if($conteudo[0] != 1) {

    if($ativo == 1) {
      $checked= "checked";
    }

    $post_na_home = "<label class='switch'>";
    $post_na_home .= "<input id='ativo' type='checkbox' ". $checked ."  name='ativo' value='". $ativo ."' onclick=ativar_post('". $conteudo[0] ."')>";
    $post_na_home .= " <span class='slider'></span>";
    $post_na_home .= "Destaque na Home   ";
    $post_na_home .= "</label>";
  }

  $data["titulo"] = $conteudo[1];
  $data["conteudo"] = $conteudo[2];
  $data["post_na_home"] = $post_na_home;

  View::do_dump(VIEW_PATH. 'tao/editar_institucional.php',$data);

}


?>
