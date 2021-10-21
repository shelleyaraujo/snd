<?php

require_once("app/controllers/core.php");

function _clientes($x="0",$y="0") { 

	$core=new Core(); 
	$data = $core->getData($id="1",$idcat="0");

	$data["clientes"] = "";

	$buscar="";
	$tipo="email";

	if(isset($_GET["buscar"])) {
		$buscar = $_GET["buscar"];
	}

	if(isset($_POST["nome"])) {
		$clientes = new ClientesModel();
		$clientes->setNome($_POST["nome"]);
		if($clientes->existeCliente($_POST["nome"])==0){
			$clientes->add_cliente();
		} else {
			$data["clientes"] = "<div id='info2' onclick='close_info2(this)'>Cliente já cadastrado com este email !</div>";
		}
	} 

	$data["clientes"] .= users($buscar,$tipo,$x,$y);

	View::do_dump(VIEW_PATH. 'tao/clientes.php',$data);

}


function users($buscar,$xx,$yy)
{
	$Config = new ConfigModel();
	$config = $Config->readItensXmlConfig();

	$x=0;
	$y=0;

	if(isset($x))
	{
		$x = (int)$xx;
	}

	if(isset($yy))
	{
		$y = $yy;
	}

	$drClientes = array();
	$Clientes = new ClientesModel();
	
	$drClientes = $Clientes->get_rows($config[0]->itens_clientes, $x, $y, "id desc", $buscar);

	$r = "Itens: " . $config[0]->itens_clientes;

	$r .= "<table>";
	$r.="<thead>";
	$r.="<tr>";

	$r.="<th class='w5'>";
	$r.="Id";
	$r.="</th>";

	$r.="<th class='w5'>";
	$r.="Data";
	$r.="</th>";

	$r.="<th class='w25'>";
	$r.="Nome";
	$r.="</th>";

	$r.="<th class='w25'>";
	$r.="Email";
	$r.="</th>";

	$r.="<th class='w15'>";
	$r.="CPF";
	$r.="</th>";

	$r.="<th class='w15'>";
	$r.="CNPJ";
	$r.="</th>";

	$r.="<th class='w10'>";
	$r.="Excluir";
	$r.="</th>";  
	$r.="</thead>";

	$i=0;
	$credencial = "";
	$selected = "";
	$pg ="";

	foreach ($drClientes as $row[])
	{
		if ($row[$i][0] == "#p#") {
			$pg = str_replace("page","Clientes",$row[$i][1]);
			$pg = str_replace("?controle=page&acao=open&id=","/tao/clientes",$row[$i][1]);
			$pg = str_replace("&x=","/",$pg);
			$pg = str_replace("&y=","/",$pg);

		} else if ($row[$i][0] > 0) {   

			$r .= "<tr id='row".$row[$i][0]."'>";

			$r .= "<td>";
			$r .= "<a href=". myUrl() ."tao/cliente/?id=". $row[$i][0] .">" . $row[$i][0] . "</a>";
			$r .= "</td>";

			$r .= "<td>";
			$r .= "<small style='color: blue'>" .$row[$i][1] . "</small>";
			$r .= "</td>";

			$r .= "<td>";
			$r .= $row[$i][2];
			$r .= "</td>";

			$r .= "<td>";
			$r .= $row[$i][3];
			$r .= "</td>";

			$r .= "<td>";
			$r .= $row[$i][4];
			$r .= "</td>";

			$r .= "<td>";
			$r .= $row[$i][5];
			$r .= "</td>";

			$r .= "<td>";
			$r .= "<a class='trash icon' href='javascript:void(0)' onclick='excluir_cliente(".$row[$i][0].")'>";
			$r .= "";
			$r .= "</a>";
			$r .= "</td>";

			$r .= "</tr>";

			$i++;
		}
	}

	$r.="</table>";

	$r .= "<div>";
	$r .= $pg;
	$r .= "</div>";

	return $r;

}

?>

