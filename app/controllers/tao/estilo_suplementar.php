<?php

require_once("app/controllers/core.php");

function _estilo_suplementar() {

	$core=new Core(); 
	$data = $core->getData($id="1",$idcat="0");

	$data["tema"] = $data["config_site"][0]->tema;

if(isset($_POST["update"])) {
	$myfile = fopen("app/views/" . $data["tema"] . "/estilo_suplementar.css", "w") or die("Unable to open file!");
	fwrite($myfile, $_POST["texto"]);
	fclose($myfile);
}

	$data["conteudo"] .= "";

	View::do_dump(VIEW_PATH. 'tao/estilo_suplementar.php',$data);

}

?>