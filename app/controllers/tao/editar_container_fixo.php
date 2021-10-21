<?php

require_once("app/controllers/core.php");

function _editar_container_fixo() {

  $core=new Core(); 
  $data = $core->getData($id="1",$idcat="0");

  $o_ContainersCaixaTextoFixo = new ContainersCaixaTextoFixoModel();

  if(isset($_POST["update_container_fixo"])) {
    $id=$_POST["id"];
    $titulo=$_POST["titulo"]; 
    $classe=$_POST["classe"];
    $o_ContainersCaixaTextoFixo->update_container($id,$titulo,$classe);
  }

  if(isset($_POST["update_conteudo"])) {
    $id=$_POST["iddestaque"];
    $titulo=$_POST["titulo"];
    $classe=$_POST["classe"];
    $texto=$_POST["editor1"];
    $texto = str_replace("'", "´", $texto); 

    $o_ContainersCaixaTextoFixo->update_classe_destaque($id,$classe);
    $o_ContainersCaixaTextoFixo->update_conteudo($id,$titulo,$classe,$texto);
  }

  if(isset($_POST["add_conteudo"])) {
    $id=$_POST["id"];
    $o_ContainersCaixaTextoFixo->add_destaque($id);
  }

  $idcontainer=$_GET["idcontainer"];
  $dr_container = $o_ContainersCaixaTextoFixo->getRow($idcontainer);
  $data["idcontainer"]=$idcontainer;
  
  $data["titulo"]="";
  $data["classe"]="";
  $editar_titulo = "Sem Titulo ";

  if(isset($dr_container[2])) {
    $data["titulo"]=$dr_container[1];
    $data["classe"]=$dr_container[2];
  }

  $dr_conteudo = $o_ContainersCaixaTextoFixo->getRowsConteudos($idcontainer);
  $i=0;
  $data["conteudo"] = "<div id='cnt-menu'>";
  
  foreach ($dr_conteudo as $row[]) {

    if($dr_conteudo[$i][1] != "") {
  $editar_titulo = $dr_conteudo[$i][1];
}

    $data["conteudo"] .= "<div class='column w". $dr_conteudo[$i][2] ."' draggable='true'>";
    $data["conteudo"] .= "<div id='". $dr_conteudo[$i][0] ."' >";
    $data["conteudo"] .= "<a  class='excluir' href='javascript:void(0)' onclick='excluir_item(".$row[$i][0].")'>";
    $data["conteudo"] .= "X";
    $data["conteudo"] .="</a>";
    $data["conteudo"] .= "<a style='padding: 0' href='". myUrl("tao/editar_conteudo_destaque_fixo/?iddestaque=".$row[$i][0] ."&idcontainer=".$idcontainer ."") ."'>";
    $data["conteudo"] .= "<p style='margin: 0'><strong>" . $editar_titulo . "</strong></p>";
    $data["conteudo"] .= strip_tags($dr_conteudo[$i][4]);
    $data["conteudo"] .= "</a>";

    $data["conteudo"] .= "</div>";
    $data["conteudo"] .= "</div>";
    $i++;
  }

  $data["conteudo"] .= "</div>";
  $data["tema"] = $data["config_site"][0]->tema;


  View::do_dump(VIEW_PATH. 'tao/editar_containers_fixo.php',$data);

}

function get_container_fixo() {

  $r="";

  $o_ContainersCaixaTextoFixo = new ContainersCaixaTextoFixoModel();
  $drcontainer = $o_ContainersCaixaTextoFixo->readContainers("id");

  $i=0; 
  $r="<table class='cnt-tabela'>";

  $r.="<thead>";
  $r.="<tr>";
  $r.="<th width='90%'>";
  $r.="Titulo";
  $r.="</th>";
  $r.="<th width='10%'>";
  $r.="Excluir";
  $r.="</th>";

  $r.="</thead>";

  foreach ($drcontainer as $key => $row[]) {

    $r .= "<tr id='row". $row[$i][0] ."'>";
    $r .= "<td>";
    $r .= "<a href=''>" . $row[$i][1] . "</a>";
    $r .= "</td>";
    $r .= "<td>";
    $r .= "<a class='trash icon' href='javascript:void[0]' onclick=excluir_container('". $row[$i][0] ."')><img src='template/icones/lixeira.svg' width='12' height='12'></a>";
    $r .= "</td>";
    $r .= "</tr>";
    $i++;

  }

  $r.="</table>";

  return $r;
}


?>