<?php

require_once("app/controllers/core.php");

function _area_restrita() {

	$core=new Core(); 
	$data = $core->getData($id="1",$idcat="0");


	$data["usuarios"] = "";
	$data["usuarios"] .= get_rows() . $_GET["idpagina"];

		View::do_dump(VIEW_PATH. 'tao/usuarios.php',$data);

	}


	function get_rows()
	{

		$x = "0";
		$y = "0";
		$pg="";
		$idpagina=15;

		if(isset($_GET["x"]))
		{
			$x = $_GET["x"];
		}

		if(isset($_GET["y"]))
		{
			$y = $_GET["y"];
		}

		$dr = array();
		$drusuarios = array();
		$usuarios = new UsuariosModel();

		$drusuarios = $usuarios->get_rows("100", $x, $y, "nome");

		$r="<table>";
		$r.="<thead>";
		$r.="<tr>";

		$r.="<th class='w5'>";
		$r.="Ativar";
		$r.="</th>";

		$r.="<th class='w5'>";
		$r.="Id";
		$r.="</th>";

		$r.="<th class='w40'>";
		$r.="Nome";
		$r.="</th>";

		$r.="<th class='w50'>";
		$r.="Email";
		$r.="</th>";


		$r.="</thead>";

		$credencial = "";
		$selected = "";

		for ($x=0; $x <= count($drusuarios); $x++) {

			if(isset($drusuarios[$x][0])) {

				if($drusuarios[$x][0] > 0) {

					switch ($drusuarios[$x][4]) {
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

					$r .= "<tr id='row".$drusuarios[$x][0]."'>";

					$r .= "<td class='w5'>";
					$r .= "<input type='checkbox' value='". $drusuarios[$x][0] ."' onclick=alert(". $drusuarios[$x][0] .","x")>";
					$r .= "</td>";

					$r .= "<td class='w5'>";
					$r .= $drusuarios[$x][0];
					$r .= "</td>";

					$r .= "<td class='w45'>";
					$r .= $drusuarios[$x][2];
					$r .= "</td>";

					$r .= "<td class='w45'>";
					$r .= $drusuarios[$x][3];
					$r .= "</td>";

					$r .= "</tr>";
				}

				if($drusuarios[$x][0] == "#p#") {
					$pg = str_replace("page","Usuarios",$drusuarios[$x][1]);
					$pg = str_replace("?controle=page&acao=open&id=",myUrl("tao/usuarios/?x=". $x . "&y=". $y . ""),$drusuarios[$x][1]);
					$pg = str_replace("&idcategoria=","",$pg);
				}
			}
		}


		$r .= "</table>";


		$r .= "<div>";
		$r .= $pg;
		$r .= "</div>";

		return $r;

	}

	?>

