<?php

require_once("app/controllers/core.php");

function _containers_flex() {

	$core=new Core(); 
	$data = $core->getData($id="1",$idcat="0");

	if(isset($_POST["add_container"])) {
    $titulo=$_POST["titulo"];

    $o_ContainersCaixaTextoFlex = new ContainersCaixaTextoFlexModel();
    $o_ContainersCaixaTextoFlex->add_container($titulo);
  }

  $data["idcontainer"]="";
  $data["titulo"]="";

  $data["containers_flex"] = get_container_flex();

    if(isset($_POST["update_conteudo"])) {
    $idconteudo=$_POST["idconteudo"];
    /*tabela conteudo*/
    $titulo = $_POST["titulo"];
    $classe = $_POST["classe"];
    echo $classe;
    $texto = $_POST["editor1"];  
    $o_ContainersCaixaTextoFlex = new ContainersCaixaTextoFlexModel();
    $o_ContainersCaixaTextoFlex->update_conteudo($idconteudo,$titulo,$classe,$texto);
  }

  View::do_dump(VIEW_PATH. 'tao/containers_flex.php',$data);

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
    $r .= "<a href='". myUrl("tao/editar_container_flex/?idcontainer=".$row[$i][0] ."") ."'>" . $row[$i][1] . "</a>";
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