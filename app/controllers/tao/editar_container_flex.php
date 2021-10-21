<?php

require_once("app/controllers/core.php");

function _editar_container_flex() {

  $core=new Core(); 
  $data = $core->getData($id="1",$idcat="0");

  $o_ContainersCaixaTextoFlex = new ContainersCaixaTextoFlexModel();

  if(isset($_POST["update_container_flex"])) {
    $id=$_POST["id"];
    $titulo=$_POST["titulo"];
    $classe=$_POST["classe"];
    $o_ContainersCaixaTextoFlex->update_container($id,$titulo,$classe);
  }

  if(isset($_POST["update_conteudo"])) {
    $id=$_POST["idconteudo"];
    $titulo=$_POST["titulo"];
    $classe=$_POST["classe"];
    $texto=$_POST["editor1"];
    $o_ContainersCaixaTextoFlex->update_conteudo($id,$titulo,$classe,$texto);
  }

  if(isset($_POST["add_conteudo"])) {
    $id=$_POST["id"];
    $o_ContainersCaixaTextoFlex->add_conteudo($id);
  }

  $idcontainer=$_GET["idcontainer"];
  $dr_container = $o_ContainersCaixaTextoFlex->getRow($idcontainer);
  $data["idcontainer"]=$idcontainer;
  
  $data["titulo"]="";
  $data["classe"]="";

  if(isset($dr_container[2])) {
    $data["titulo"]=$dr_container[1];
    $data["classe"]=$dr_container[2];
  }

  $dr_conteudo = $o_ContainersCaixaTextoFlex->getRowsConteudos($idcontainer);
  $i=0;
  $data["conteudo"] = "<div class='cnt-dst-flex' id='destino' ondrop='drop(event)' ondragover='allowDrop(event)'>";
  
  foreach ($dr_conteudo as $row[]) {
    $data["conteudo"] .= "<div id='". $dr_conteudo[$i][0] ."' class='w".$dr_conteudo[$i][2]."' ";
    $data["conteudo"] .= " draggable='true' ondragstart='drag(event)'>";
    $data["conteudo"] .= "<div>";
    $data["conteudo"] .= "<a class='excluir' href='javascript:void(0)' onclick='excluir_item(".$row[$i][0].")'>";
    $data["conteudo"] .= "X";
    $data["conteudo"] .="</a>";
    $data["conteudo"] .= "<h2>";
    $data["conteudo"] .= "<a href='". myUrl("tao/editar_conteudo_destaque_flex/?idconteudo=".$row[$i][0] ."&idcontainer=".$idcontainer ."") ."'>".$dr_conteudo[$i][1]."</a>";
    $data["conteudo"] .= "</h2>";
    $data["conteudo"] .= "</div>";
    $data["conteudo"] .= "</div>";
    $i++;
  }

  $data["conteudo"] .= "</div>";


  View::do_dump(VIEW_PATH. 'tao/editar_containers_flex.php',$data);

}

function get_container_flex() {

  $r="";

  $o_ContainersCaixaTextoFlex = new ContainersCaixaTextoFlexModel();
  $drcontainer = $o_ContainersCaixaTextoFlex->readContainers("id");

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
    $r .= "<a href='javascript:void[0]' onclick=excluir_container('". $row[$i][0] ."')><img src='template/icones/lixeira.svg' width='12' height='12'>Excluir</a>";
    $r .= "</td>";
    $r .= "</tr>";
    $i++;

  }

  $r.="</table>";

  return $r;
}

?>