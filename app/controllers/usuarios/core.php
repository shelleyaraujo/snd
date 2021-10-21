<?php

class Core { 

	function getData($id,$idcat) {

		// DEFINE AS VARIAVEIS
		$idconteudo = $id;
		$controle = "Index";
		$dst="";
		$destaques = "";
		$idcategoria = $idcat;
		$conteudo = "";
		$menu="";
		$menutao ="";
		$menu_institucional ="";
		$menu_geral ="";
		$menu_catalogo="";
		$menu_especial ="";
		$menu_rodape ="";
		$view="";
		$ordem_registros = "id";
		$imagens_contedo="";
		$controle_tao = "";
		$exibir_slider = "";
		$ondeestou = "";

		$menustao=new MenusModel(); // colocar  acredencial
		$menus=new MenusModel();
		$config=new ConfigModel();
		$mDestaques=new DestaquesModel();
		$Sliders = new SlidersModel();
		$SliderLogos = new SliderLogosModel();
		$Conteudos = new ConteudosModel();
		$Modulos = new ModulosModel();
		
		$url = explode("/",$_SERVER['REQUEST_URI']);
		$controle="index";

		##ATENCAO: SE O BANNER NAO APARECER MUDAR O NUMERO 2 PARA 1 OU ...
		if(isset($url[3])) {
			$controle = $url[3];
		}

		if(isset($url[3])) {
			$controle_tao = $url[3];
		}

		$credencial = 10000;
		if(isset($_SESSION["credencial"])) {
		$credencial = $_SESSION["credencial"];
		}

		/*PEGA O ID DO MODULO PARA CARREGAR OS DESTAQUES*/
		$idmodulo = $Modulos->readModuloByIdConteudo($idcat);

		$exibir_slider = $Modulos->exibir_slider($idmodulo[0]);

		$menutao = $menustao->read_menutao($credencial);
		$menu_catalogo = $menus->menuCatalogo();
		$menu_institucional = $menus->menuInstitucional();
		$menu_geral = $menus->menuGeral();
		$menu_lateral = $menus->menuLateral();
		$menu_especial = $menus->menuEspecial();
		$menu_rodape = $menus->menu_rodape();
		$meta_tag = array("titulo"=>"titulod a pagina");
		$config_site = $config->readItensXmlConfig();
		$dr_destaques_fixos = $mDestaques->readItensDestaquesFixo(0);
		$sliders = $Sliders->readItens($config_site[0],$controle,$exibir_slider);
		$slider_logos = $SliderLogos->readItens($config_site[0]);
		$conteudo = $Conteudos->readConteudoById($idconteudo);
		$conteudo_titulo = $Conteudos->readConteudoByIdTitulo($idconteudo);
		$conteudo_texto = $Conteudos->readConteudoByIdTexto($idconteudo);

		$dst = $Modulos->readModuloContainers($idmodulo[0]);
		for($i=0;$i<count($dst);$i++) {
			$destaques .= $mDestaques->readItens((int)$dst[$i][2]);
		}

		$destaques = $this->getContainerCaixaTextoFlex($idcat) . $destaques;
		$ordem_registros = $Modulos->getOrdemRegistrosModulo($idcategoria);

		$dst = array(
			"descricao"=>$dr_destaques_fixos[0],
			"telefones"=>$dr_destaques_fixos[1],
			"redesSociais"=>$dr_destaques_fixos[2],
			"emails"=>$dr_destaques_fixos[3],
			"enderecos"=>$dr_destaques_fixos[4],
			"descricao_rodape"=>$dr_destaques_fixos[5],
			"telefones_rodape"=>$dr_destaques_fixos[6],
			"redesSociais_rodape"=>$dr_destaques_fixos[7],
			"emails_rodape"=>$dr_destaques_fixos[8],
			"enderecos_rodape"=>$dr_destaques_fixos[9],
		);

		$dr = array(
			"menutao" => $menutao,			
			"menu_catalogo" => $menu_catalogo,
			"menu_institucional" => $menu_institucional,
			"menu_geral" => $menu_geral,
			"menu_lateral" => $menu_lateral,
			"menu_especial" => $menu_especial,
			"menu_rodape" => $menu_rodape,
			"meta_tag" => $meta_tag,
			"config_site" => $config_site,
			"destaques_fixos" => $dst,
			"sliders" => $sliders,
			"slider_logos" => $slider_logos,
			"conteudo_titulo" => $conteudo_titulo,
			"conteudo_texto" => $conteudo_texto,
			"destaques" => $destaques,
			"ordem_registros" => $ordem_registros
		);

		$data['ondeestou'] = "<ul class='onde-estou'><li>Onde Estou: </li>" . $Modulos->onde_estou($idcat) . "</ul>";
		$data['menutao']=$dr["menutao"];
		$data['menu_catalogo']=$dr["menu_catalogo"];
		$data['menu_institucional']=$dr["menu_institucional"];
		$data['menu_geral']=$dr["menu_geral"];
		$data['menu_especial']=$dr["menu_especial"];
		$data['menu_rodape']=$dr["menu_rodape"];
		$data['meta_tag']=$dr["meta_tag"];
		$data['config_site']=$dr["config_site"];
		$data['destaques_fixos']=$dr["destaques_fixos"];
		$data['sliders']=$dr["sliders"];
		$data['slider_logos']=$dr["slider_logos"];
		$data['conteudo_titulo']=$dr["conteudo_titulo"];
		$data['conteudo_texto']=$dr["conteudo_texto"];
		$data['destaques']=$dr["destaques"];
		$data['ordem_registros']=$dr["ordem_registros"];
		$data['description']=$idmodulo[6];
		$data['keywords']=$idmodulo[7];
		$data['title']=$idmodulo[8];
		$data['ua']=$dr["config_site"][0]->ua;
		$data['itens_galeria']=$dr["config_site"][0]->itens_galeria;
		$data['itens_catalogo']=$dr["config_site"][0]->itens_catalogo;
		$data['itens_imoveis']=$dr["config_site"][0]->itens_imoveis;
		$data['itens_downloads']=$dr["config_site"][0]->itens_downloads;
		$data['exibir_slider'] = $exibir_slider;

		if($idcat == 0) { $idcat = 1; };

		$modulo_titulo = $Modulos->get_conteudo_titulo($idcat);
		$data['titulotextomodulo'] = $modulo_titulo;
		$modulo_texto = $Modulos->get_conteudo_texto($idcat);
		$data['textomodulo'] = $modulo_texto;

		//$destaques_lateral15 .= $mDestaques->readItensEspeciais(15);
		//$data['destaques_lateral15']=$destaques_lateral15;

		$dst_contato = $mDestaques->readItensEspeciais(3);
		$data['dst_contato']=$dst_contato;


		switch ($controle_tao) {
			case 'textos_accordion':
			$data['itens_conteudo']=$dr["config_site"][0]->itens_textos_accordion;
			break;	
			case 'textos':
			$data['itens_conteudo']=$dr["config_site"][0]->itens_textos;
			break;	
			case 'textos_links':
			$data['itens_conteudo']=$dr["config_site"][0]->itens_textos;
			break;	
			case 'videosyoutube':
			$data['itens_conteudo']=$dr["config_site"][0]->itens_videosyoutube;
			break;	
			default:
			$data['itens_conteudo']=$dr["config_site"][0]->itens_textos_empilhados;
			break;
		}

		return $data;	
	}


	/* CARREGA OS CONTAINERS DO TEXTO FLEX  */

	function getContainerCaixaTextoFlex($id) {

		$idconteudo = $id;
		$r="";
		if($idconteudo > 0) {
			$dr = array();
			$Modulos = new ModulosModel();
			$dr = $Modulos->readModuloByIdConteudo($idconteudo);
			$r = $this->getConteudoCaixaTextoFlex($dr[9]);
		}

		return $r;
	}

	/* CARREGA OS CONTAINERS DO TEXTO FLEX PELO ID DO CONTAINER */

	function getContainerCaixaTextoFlexByIdContainer() {
		$idcontainer = "3";
		$r = getConteudoCaixaTextoFlex($idcontainer);
		return $r;
	}

	/* CARREGA OS CONTEUDOS DO TEXTO FLEX  */

	function getConteudoCaixaTextoFlex($idcontainercaixatextoflex) {
		$r="";
		$conteudo=array();
		$Conteudos = new ConteudosModel();
		$conteudo = $Conteudos->readConteudoByContainerCaixaTextoFlex($idcontainercaixatextoflex);
		$i=0;

		if($conteudo != "") {
			$r .= "<div class='container-flex container-flex-". $idcontainercaixatextoflex ." ''>";
			$r .= $conteudo;
			$r .= "</div>";
		}

		return $r;
	}

}

?>
