<?php

require_once("app/controllers/core.php");

function _containers_fixo() {

	$core=new Core(); 
	$data = $core->getData($id="1",$idcat="0");

  $popup = "0";

  if(isset($_GET["popup"])) {
    $popup = $_GET["popup"];
  }

	if(isset($_POST["add_container"])) {
    $titulo=$_POST["titulo"];
    $popup=$_POST["popup"];

    $o_ContainersCaixaTextoFixo = new ContainersCaixaTextoFixoModel();
   
    if($popup == "1") {
    $o_ContainersCaixaTextoFixo->add_container($titulo,"popup");
    } else {
    $o_ContainersCaixaTextoFixo->add_container($titulo,"flex-stretch");
    }
  }

  $data["idcontainer"]="";
  $data["titulo"]="";
  $data["popup"]=$popup;

  $data["containers_fixo"] = get_container_fixo($popup);

    if(isset($_POST["update_conteudo"])) {
    $idconteudo=$_POST["idconteudo"];
    /*tabela conteudo*/
    $titulo = $_POST["titulo"];
    $classe = $_POST["classe"];
    echo $classe;
    $texto = $_POST["editor1"];  
    $o_ContainersCaixaTextoFixo = new ContainersCaixaTextoFixoModel();
    $o_ContainersCaixaTextoFixo->update_conteudo($idconteudo,$titulo,$classe,$texto);
  }

  View::do_dump(VIEW_PATH. 'tao/containers_fixo.php',$data);

}

function get_container_fixo($popup) {

  $r="";

  $o_ContainersCaixaTextoFixo = new ContainersCaixaTextoFixoModel();
  $drcontainer = $o_ContainersCaixaTextoFixo->readContainers("id desc", $popup);

  $i=0; 
  $r="<table class='cnt-tabela'>";

  $r.="<thead>";
  $r.="<tr>";
  $r.="<th width='100%' colspan='2'>";
  $r.="Containers";
  $r.="</th>";
  $r.="</tr>";
  $r.="</thead>";

  foreach ($drcontainer as $key => $row[]) {

    $r .= "<tr id='row". $row[$i][0] ."'>";
    $r .= "<td style='text-align: left'>";
    $r .= "<a href='". myUrl("tao/editar_container_fixo/?idcontainer=".$row[$i][0] ."") ."'><span class='icone_lapis'></span>" . $row[$i][1] . "</a>";
    $r .= "</td>";
    $r .= "<td style='text-align: right'>";
    $r .= "<a class='trash icon' href='javascript:void[0]' onclick=excluir_container('". $row[$i][0] ."')></a>";
    $r .= "</td>";
    $r .= "</tr>";
    $i++;

  }

  $r.="</table>";

  return $r;
}

?>