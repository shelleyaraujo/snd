<?php

require_once("app/controllers/core.php");

function _usuarios($x="0",$y="0") { 

	$core=new Core(); 
	$data = $core->getData($id="1",$idcat="0");

	$data["usuarios"] = "";

	$buscar="";
	$tipo="email";

	if(isset($_GET["buscar"])) {
		$buscar = $_GET["buscar"];
		$tipo = $_GET["tipo"];
	}

	if(isset($_POST["email"])) {
		$email = $_POST["email"];
		$senha = $_POST["senha"];
		$senha2 = $_POST["senha2"];

		if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
			if($senha == $senha2) {
				if(strlen($senha) > 7) {
					$usuarios = new UsuariosModel();
					$usuarios->setEmail($_POST["email"]);
					$usuarios->setNome("Nome de Usuário");
					$usuarios->setCredencial("1");
					$usuarios->setSenha(sha1($_POST["senha"]));
					if($usuarios->existeUsuario($_POST["email"])==0){
						$usuarios->add_usuario();
					} else {
						$data["usuarios"] = "<div id='info2' onclick='close_info2(this)'>Usuário já cadastrado com este email !</div>";
					}
				}
			} else {
				$data["usuarios"] = "<div id='info2' onclick='close_info2(this)'>Senhas não Conferem !</div>";
			}
		} else {
			$data["usuarios"] = "<div id='info2' onclick='close_info2(this)'>Email inválido !</div>";
		}
	} 



	$data["usuarios"] .= users($buscar,$tipo,$x,$y);

	View::do_dump(VIEW_PATH. 'tao/usuarios.php',$data);

}


function users($buscar,$tipo,$xx,$yy)
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

	$drUsuarios = array();
	$Usuarios = new UsuariosModel();
	
	$drUsuarios = $Usuarios->get_rows($config[0]->itens_usuarios, $x, $y, "id desc", $buscar, $tipo);

	$r = "Itens: " . $config[0]->itens_usuarios;

	$r .= "<table>";
	$r.="<thead>";
	$r.="<tr>";

	$r.="<th class='w5'>";
	$r.="Id";
	$r.="</th>";

	$r.="<th class='w5'>";
	$r.="AR";
	$r.="</th>";

	$r.="<th class='w15'>";
	$r.="Data";
	$r.="</th>";

	$r.="<th class='w30'>";
	$r.="Nome";
	$r.="</th>";

	$r.="<th class='w25'>";
	$r.="Email";
	$r.="</th>";

	$r.="<th class='w15'>";
	$r.="Credencial";
	$r.="</th>";

	$r.="<th class='w10'>";
	$r.="Excluir";
	$r.="</th>";  
	$r.="</thead>";

	$i=0;
	$credencial = "";
	$selected = "";

	foreach ($drUsuarios as $row[])
	{
		if ($row[$i][0] == "#p#") {
			$pg = str_replace("page","Usuarios",$row[$i][1]);
			$pg = str_replace("?controle=page&acao=open&id=","/tao/usuarios",$row[$i][1]);
			$pg = str_replace("&x=","/",$pg);
			$pg = str_replace("&y=","/",$pg);

		} else if ($row[$i][0] > 0) {   

			switch ($row[$i][4]) {
				case '0':
				$credencial = "Admin geral";
				break;
				case '1':
				$credencial = "Editor de Conteúdo";
				break;
				default:
				$credencial = "Assinante do Site";
				break;
			}

			$r .= "<tr id='row".$row[$i][0]."'>";

			$r .= "<td>";
			$r .= "<a href=". myUrl() ."tao/usuario/?id=". $row[$i][0] .">" . $row[$i][0] . "</a>";
			$r .= "</td>";

			$r .= "<td>";
			$r .= $row[$i][5];
			$r .= "</td>";

			$r .= "<td>";
			$r .= "<small style='color: skyblue'>" .$row[$i][1] . "</small>";
			$r .= "</td>";

			$r .= "<td>";
			$r .= $row[$i][2];
			$r .= "</td>";

			$r .= "<td>";
			$r .= $row[$i][3];
			$r .= "</td>";

			$r .= "<td>";
			$r .=  "<select name='credencial' id='credencial".$row[$i][0]."' onchange=set_credencial('". $row[$i][0] ."')>";
			if($row[$i][4]=="0"){$selected="selected"; }
			$r .=  "<option value='0' $selected>";
			$r .=  "Admim Geral";
			$r .=  "</option>";
			$selected="";
			if($row[$i][4]=="1"){$selected="selected"; }
			$r .=  "<option value='1' $selected>";
			$r .=  "Editor de Conteudo";
			$r .=  "</option>";
			$selected="";
			if($row[$i][4]=="2"){$selected="selected"; }
			$r .=  "<option value='2' $selected>";
			$r .=  "Assinante do Site";
			$r .=  "</option>";
			$selected="";
			$r .=  "</select>";
			$r .= "</td>";

			$r .= "<td>";
			$r .= "<a class='trash icon' href='javascript:void(0)' onclick='excluir_usuario(".$row[$i][0].")'>";
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

