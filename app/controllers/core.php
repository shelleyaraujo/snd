<?php
class Core { 

	function getData($id,$idcat) {

		// DEFINE AS VARIAVEIS
		if($idcat == 0) {
			$idcat=1;
		}

		$idconteudo = $id;
		$controle = "Index";
		$dst="";
		$destaques = "";
		$idcategoria = $idcat;
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
		$Destaques=new DestaquesModel();
		$mDestaques=new DestaquesFixoModel();
		$Sliders = new SlidersModel();
		$SliderLogos = new SliderLogosModel();
		$Modulos = new ModulosModel();
		
		$url = explode("/",$_SERVER['REQUEST_URI']);
		$controle="index";

		##ATENCAO: SE O BANNER NAO APARECER MUDAR O NUMERO 2 PARA 1 OU ...
		if(isset($url[1])) {
			$controle = $url[1];
		}

		if(isset($url[1])) {
			$controle_tao = $url[1];
		}

		$credencial = 10000;
		if(isset($_SESSION["credencial"])) {
			$credencial = $_SESSION["credencial"];
		}

		/*PEGA O ID DO MODULO PARA CARREGAR OS DESTAQUES*/

		$idmodulo = $Modulos->readModuloByIdConteudo($idcat);

		$exibir_slider = $Modulos->exibir_slider($idcat);

		$menutao = $menustao->read_menutao($credencial);
		$menu_catalogo = $menus->menuCatalogo();
		$menu_institucional = $menus->menuInstitucional();
		$menu_geral = $menus->menuGeral();
		$menu_lateral = $menus->menuLateral();
		$menu_especial = $menus->menuEspecial();
		$menu_rodape = $menus->menu_rodape();
		$meta_tag = array("titulo"=>"titulo da pagina");
		$config_site = $config->readItensXmlConfig();
		//$dr_destaques_fixos = $mDestaques->readItensDestaquesFixo(0);

		$sliders = $Sliders->readItens($config_site[0],$controle,$exibir_slider,0);
		$sliders_celular = $Sliders->readItens($config_site[0],$controle,$exibir_slider,1);
		$sliders_logos = $SliderLogos->readItens($config_site[0]);

		//$conteudo = $Conteudos->readConteudoById($idconteudo);
		$conteudo_titulo = "titulo xxxxxxxxxxxxxxxx";
		$conteudo_texto = "texto xxxxxxxxxxxxxxxx";
		
		$dst = $Modulos->readModuloContainers($idcat);

		$popup = "";

		for($i=0;$i<count($dst);$i++) {
			$destaques .= $Destaques->readItens((int)$dst[$i][2], "0");
			$popup .= $Destaques->readItens((int)$dst[$i][2], "1");
		}

		$destaques = $this->getContainerCaixaTextoFlex($idcat) . $destaques;

	
		$ordem_registros = $Modulos->getOrdemRegistrosModulo($idcategoria);

		$dst_fixo = new DestaquesFixoModel(); 
		$descricao= $dst_fixo->readConteudoIdDestaqueFixo("1");
		$telefones = $dst_fixo->readConteudoIdDestaqueFixo("2");
		$redesSociais = $dst_fixo->readConteudoIdDestaqueFixo("3");
		$emails = $dst_fixo->readConteudoIdDestaqueFixo("4");
		$enderecos = $dst_fixo->readConteudoIdDestaqueFixo("5");
		$descricao_rodape = $dst_fixo->readConteudoIdDestaqueFixo("11");
		$telefones_rodape = $dst_fixo->readConteudoIdDestaqueFixo("12");
		$redesSociais_rodape = $dst_fixo->readConteudoIdDestaqueFixo("13");
		$emails_rodape = $dst_fixo->readConteudoIdDestaqueFixo("14");
		$enderecos_rodape = $dst_fixo->readConteudoIdDestaqueFixo("15");

		$dst = array(
			"descricao"=>$descricao[2],
			"telefones"=>$telefones[2],
			"redesSociais"=>$redesSociais[2],
			"emails"=>$emails[2],
			"enderecos"=>$enderecos[2],
			"descricao_rodape"=>$descricao_rodape[2],
			"telefones_rodape"=>$telefones_rodape[2],
			"redesSociais_rodape"=>$redesSociais_rodape[2],
			"emails_rodape"=>$emails_rodape[2],
			"enderecos_rodape"=>$enderecos_rodape[2],
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
			"sliders_celular" => $sliders_celular,
			"sliders_logos" => $sliders_logos,
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
		$data['sliders_celular']=$dr["sliders_celular"];
		$data['sliders_logos']=$dr["sliders_logos"];
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
		$data['itens_institucional']=$dr["config_site"][0]->itens_institucional;
		$data['itens_landingpage']=$dr["config_site"][0]->itens_landingpage;
		$data['itens_blog']=$dr["config_site"][0]->itens_blog;
		$data['itens_clientes']=$dr["config_site"][0]->itens_clientes;

		$data['botao_comprar']=$dr["config_site"][0]->cat_botao_comprar;
		$data['exibir_slider'] = $exibir_slider;
		$data['itens_institucionalar']=$dr["config_site"][0]->itens_institucionalar;
	    $data['popup']=$popup;


		if($idcat == 0) { $idcat = 1; };

		$modulo_titulo = $Modulos->get_conteudo_titulo($idcat);
		$data['titulotextomodulo'] = $modulo_titulo;
		$modulo_texto = $Modulos->get_conteudo_texto($idcat);
		$data['textomodulo'] = $modulo_texto;

		//$destaques_lateral15 .= $mDestaques->readItensEspeciais(15);
		//$data['destaques_lateral15']=$destaques_lateral15;
		//$dst_contato = $mDestaques->readItensEspeciais(3);
		//$data['dst_contato']=$dst_contato;

		//die($modulo_texto . "teste");

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
		}

		return $r;
	}

}

?>
