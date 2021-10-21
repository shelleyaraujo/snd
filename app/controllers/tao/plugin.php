<?php

require_once("app/controllers/core.php");

function _plugin() {

	$core=new Core(); 
	$data = $core->getData($id="1",$idcat="0");

	$Files = new FilesModel();
	$o_Plugin = new PluginModel();

	if(isset($_POST["update"])) {
		$o_Plugin->setId($_POST["id"]);
		$o_Plugin->setTitulo($_POST["titulo"]);
		$o_Plugin->update_plugin();
	}

	if(isset($_POST["delete"])) {
		$o_Plugin->setId($_POST["id"]);
		$o_Plugin->delete_plugin();
	}

	if(isset($_POST["add"])) {
		if($_POST["titulo"] != "") {
		$o_Plugin->setTitulo($_POST["titulo"]);
		$o_Plugin->add_plugin();
	}
	}

	$r="";
	$data["plugin"] = "";
	$data["plugins"] = "";

	$v_Plugin = $o_Plugin->readItens();

	if (count($v_Plugin) > 0) {
		$r .= "<ul class='plugins'>";
		for ($i = 0; $i < count($v_Plugin); $i++) {
			$r .= "<li>";
			$r .= "<a href='". myUrl("tao/plugin/?id=") . $v_Plugin[$i][0] ."'>" . $v_Plugin[$i][1] . "</a>";
			$r .= "</li>";
		}
		$r .= "</ul>";
	} else {
           // $this->AddPluginCabecalhoAction();
	} 

	$dr_plugin=array();
			$data["id"] = "0";
		$data["titulo"] = "";
		$data["plugin"] = "";

	if(isset($_GET["id"])) {
		$dr_plugin = $v_Plugin = $o_Plugin->readPluginById($_GET["id"]);
		$data["id"] = $dr_plugin[0];
		$data["titulo"] = $dr_plugin[1];
		$data["plugin"] = $dr_plugin[2];
	}

	$data["plugins"] = $r;
	$i=0;

	$files = $Files->openDir("./../plugin");
	foreach($files as $row[]) {
		$data["plugin"] .= "<a href='?controle=Plugin&acao=open&excluir_arquivo=". $row[$i]  ."' style='color: lightblue'>Excluir<a/> - " . $row[$i] . "<br/>";
		$i++;
	}

	View::do_dump(VIEW_PATH. 'tao/plugin.php',$data);

}

function addPluginAction() {
	$o_dst = new PluginModel();

	$id=$_POST["id"];
	$titulo = $_POST["titulo"];

	if($titulo != "") {
		$o_dst->setId($id);
		$o_dst->setTitulo($titulo);

		if($id !="") {
			$o_dst->updateTituloPlugin();
		}
		else{
			$o_dst->addPlugin();
		}
	}

	if (isset($_POST['excluir'])) {
		$o_dst->deletePlugin();

		header("Location: ?controle=Plugin&acao=open");
	}

}


?>