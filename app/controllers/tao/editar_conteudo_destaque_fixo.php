<?php

require_once("app/controllers/core.php");

function _editar_conteudo_destaque_fixo() {

  $core=new Core(); 
  $data = $core->getData($id="1",$idcat="0");

  $o_Conteudos = new DestaquesModel(); 
  $conteudo = $o_Conteudos->getRowDestaque($_GET["iddestaque"]);

  $ContainersCaixaTextoFixo = new ContainersCaixaTextoFixoModel(); 
  $dr_destaque = $ContainersCaixaTextoFixo->getRowDestaque($_GET["iddestaque"]);


  $plugin=$conteudo[4];

    $data["titulo"] = $conteudo[1];
$data["conteudo"] = $conteudo[2];
  $data["classe"] = $conteudo[3];


  $i=0;
  $o_plugin = new DestaquesModel(); 
  $dr_plugin = $o_plugin->get_plugins();
  $data["plugin"] = "<select name='plugin' id='plugin' onchange=set_plugin('". $conteudo[0] ."')>";
  $selected="";
  $data["plugin"] .= "<option value=''>";
  $data["plugin"] .= "Sem Plugin";
  $data["plugin"] .= "</option>";



  foreach ($dr_plugin as $row[])  {
    if($row[$i][2] == $plugin) {
      $selected = "selected";
    }
    $data["plugin"] .= "<option value='". $row[$i][2] ."' $selected>";
    $data["plugin"] .= $row[$i][1];
    $data["plugin"] .= "</option>";
    $i++;
    $selected = "";
  }
  $data["plugin"] .= "</select>";

  $data["tema"] =$data["config_site"][0]->tema;
  $data["tema"] = $data["config_site"][0]->tema;

  View::do_dump(VIEW_PATH. 'tao/editar_conteudo_destaque_fixo.php',$data);

}


?>
