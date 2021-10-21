<?php

require_once("app/controllers/core.php");

function _resumo_geral() {

	$core=new Core(); 
	$data = $core->getData($id="1",$idcat="0");

	$Config = new ConfigModel();
	$config = $Config->readItensXmlConfig();	

	$data["config"] = configuracaoGeral($config);
	$data["modulos"] = getmodulos();
	$data["resgistros"] = registrosTabelas();	
	$data["paginacaoos"] = configuracaoPaginacao($config);

	View::do_dump(VIEW_PATH. 'tao/resumo_geral.php',$data);

}

function getmodulos() {

	$r="";
	$r .= "<table class='tabela-modulos'>";
	$r .= "<thead>";
	$r .= "<tr>";
	$r .= "<th></th>";
	$r .= "<th>Módulo</th>";
	$r .= "<th>Comportamento</th>";
	$r .= "</tr>";
	$r .= "</thead>";
	$r .= "<tbody>";

	$Modulos = new ModulosModel();
	$modulos = $Modulos -> readModulosTipo();

	foreach ($modulos as $key => $value) {
		$r .= '<tr>';
		$r .= '<td>' . $value[0] . '</td>';
		$r .= '<td>' . $value[1] . '</td>';
		$r .= '<td>' . $value[2] . '</td>';		
		$r .= '</tr>';
	}

	$r .= '</table>';
	return $r;

}

function registrosTabelas() {

	$Modulos = new ModulosModel();
	$modulos = $Modulos -> getTotalRegistros();	
	$Destaques = new DestaquesModel();
	$destaques = $Destaques -> getTotalRegistrosFixos();
	$containers = $Destaques -> getTotalRegistrosContainers();	
	
	$Catalogo = new CatalogoModel();
	$catalogo = $Catalogo -> getTotalRegistros();

	$o_imoveis = new ImoveisModel();
	$imoveis = $o_imoveis -> getTotalRegistros();
	$Galeria = new GaleriaModel();
	$galeria = $Galeria -> getTotalRegistros();	
	$Sliders = new SlidersModel();
	$sliders = $Sliders -> getTotalRegistros();
	$SlidersLogos = new SliderLogosModel();
	$sliders_logos = $SlidersLogos -> getTotalRegistros();
	$Conteudos = new ConteudosModel();
	$conteudos = $Conteudos -> getTotalRegistros(1);
	$Usuarios = new UsuariosModel();
	$usuarios = $Usuarios -> getTotalRegistrosUsuarios();
	
	//$ContainersCaixaTextoFlex = new ContainersCaixaTextoFlexModel();
	//$caixatextoflex = $ContainersCaixaTextoFlex -> getTotalRegistros();
	//$Cadastros = new CadastrosModel();
	//$cadastros = $Cadastros -> getTotalRegistros();
	//$Downloads = new DownloadsModel();
	//$downloads = $Downloads -> getTotalRegistros();
	//$Glossario = new ConteudosModel();	
	//$glossario = $Glossario -> getTotalRegistros(5);
	//$Links = new LinksModel();
	//$links = $Links -> getTotalRegistros();
	//$VideosFacebook = new ConteudosModel();
	//$videos_facebook = $VideosFacebook -> getTotalRegistros(14);
	////$VideosYoutube = new ConteudosModel();
	//$videos_youtube = $VideosYoutube -> getTotalRegistros(3);
	//$VideosYoutubeChannel = new ConteudosModel();
	//$videos_youtube_channel = $VideosYoutubeChannel -> getTotalRegistros(4);

	$total_geral=0;
	$total_geral 
	//= $containers 
	= $destaques
	+ $containers
	//+ $caixatextoflex
	//+ $cadastros 
	+ $catalogo
	//+ $downloads
	+ $galeria
	//+ $glossario
	//+ $links
	+ $sliders
	+ $conteudos
	//+ $textosaccordion 
	+ $usuarios;
	//+ $videos_youtube
	//+ $videos_youtube_channel;

	$r = "";
	$r .= "<table class='tabela-registros'>";
	$r .= "<thead>";
	$r .= "<tr>";
	$r .= "<th></th>";
	$r .= "<th>Tabela</th>";
	$r .= "<th>Quant.</th>";
	$r .= "</tr>";
	$r .= "</thead>";
	$r .= "<tbody>";

	$r .= "<tr>";
	$r .= "<td>";
	$r .= "1";
	$r .= "</td>";
	$r .= "<td>";
	$r .= "modulos";
	$r .= "</td>";
	$r .= "<td>";
	$r .= $modulos;
	$r .= "</td>";	

	$r .= "</tr>";

	$r .= "<tr>";
	$r .= "<td>";
	$r .= "2";
	$r .= "</td>";
	$r .= "<td>";
	$r .= "containers";
	$r .= "</td>";
	$r .= "<td>";
	$r .= $containers;
	$r .= "</td>";		
	$r .= "</tr>";

	$r .= "<tr>";
	$r .= "<td>";
	$r .= "3";
	$r .= "</td>";
	$r .= "<td>";
	$r .= "destaques";
	$r .= "</td>";
	$r .= "<td>";
	$r .= $destaques;
	$r .= "</td>";		
	$r .= "</tr>";

	$r .= "<tr>";
	$r .= "<td>";
	$r .= "4";
	$r .= "</td>";
	$r .= "<td>";
	$r .= "conteudos";
	$r .= "</td>";
	$r .= "<td>";
	$r .= $conteudos;
	$r .= "</td>";		
	$r .= "</tr>";


	$r .= "<tr>";
	$r .= "<td>";
	$r .= "5";
	$r .= "</td>";
	$r .= "<td>";
	$r .= "catalogo";
	$r .= "</td>";
	$r .= "<td>";
	$r .= $catalogo;
	$r .= "</td>";		
	$r .= "</tr>";

	$r .= "<tr>";
	$r .= "<td>";
	$r .= "6";
	$r .= "</td>";
	$r .= "<td>";
	$r .= "galeria";
	$r .= "</td>";
	$r .= "<td>";
	$r .= $galeria;
	$r .= "</td>";		
	$r .= "</tr>";

	$r .= "<tr>";
	$r .= "<td>";
	$r .= "7";
	$r .= "</td>";
	$r .= "<td>";
	$r .= "sliders";
	$r .= "</td>";
	$r .= "<td>";
	$r .= $sliders;
	$r .= "</td>";		
	$r .= "</tr>";

	$r .= "<tr>";
	$r .= "<td>";
	$r .= "8";
	$r .= "</td>";
	$r .= "<td>";
	$r .= "sliderslogos";
	$r .= "</td>";
	$r .= "<td>";
	$r .= $sliders_logos;
	$r .= "</td>";		
	$r .= "</tr>";

	$r .= "<tr>";
	$r .= "<td>";
	$r .= "9";
	$r .= "</td>";
	$r .= "<td>";
	$r .= "imoveis";
	$r .= "</td>";
	$r .= "<td>";
	$r .= $imoveis;
	$r .= "</td>";		
	$r .= "</tr>";

	$r .= "<tr>";
	$r .= "<td>";
	$r .= "10";
	$r .= "</td>";
	$r .= "<td>";
	$r .= "usuarios";
	$r .= "</td>";
	$r .= "<td>";
	$r .= $usuarios;
	$r .= "</td>";		
	$r .= "</tr>";

	$r .= "<tr>";
	$r .= "<td>";
	$r .= "11";
	$r .= "</td>";
	$r .= "<td>";
	$r .= "Registros Total";
	$r .= "</td>";
	$r .= "<td>";
	$r .= $total_geral;
	$r .= "</td>";		
	$r .= "</tr>";
	$r .= "</table>";

/*
	$r .= "<tr>";
	$r .= "<td>";
	$r .= "<a href='?controle=Modulos&acao=open&modulo=Glossario'>Glossário</a>";
	$r .= "</td>";
	$r .= "<td>";
	$r .= $glossario;
	$r .= "</td>";		
	$r .= "</tr>";

	$r .= "<tr>";
	$r .= "<td>";
	$r .= "<a href='?controle=Modulos&acao=open&modulo=Links'>Links</a>";
	$r .= "</td>";
	$r .= "<td>";
	//$r .= $links;
	$r .= "</td>";	
	$r .= "</tr>";
	*/
/*
	$r .= "<tr>";
	$r .= "<td>";
	$r .= "<a href='?controle=Modulos&acao=open&modulo=Texto'>Textos Único</a>";
	$r .= "</td>";
	$r .= "<td>";
	$r .= $texto;
	$r .= "</td>";		
	$r .= "</tr>";
	*/


/*
	$r .= "<tr>";
	$r .= "<td>";
	$r .= "<a href='?controle=Modulos&acao=open&modulo=VideosFacebook'>Videos Facebook</a>";
	$r .= "</td>";
	$r .= "<td>";
	$r .= $videos_facebook;
	$r .= "</td>";		
	$r .= "</tr>";

	$r .= "<tr>";
	$r .= "<td>";
	$r .= "<a href='?controle=Modulos&acao=open&modulo=VideosYoutube'>Videos Youtube</a>";
	$r .= "</td>";
	$r .= "<td>";
	$r .= $videos_youtube;
	$r .= "</td>";		
	$r .= "</tr>";

	$r .= "<tr>";
	$r .= "<td>";
	$r .= "<a href='?controle=Modulos&acao=open&modulo=VideosYoutubeChanel'>Videos Youtube Chanel</a>";
	$r .= "</td>";
	$r .= "<td>";
	$r .= $videos_youtube_channel;
	$r .= "</td>";		
	$r .= "</tr>";
	*/

/*
	$r .= "<tr>";
	$r .= "<td>";
	$r .= "<a href='?controle=Modulos&acao=open&modulo=Cadastros'>Cadastros</a>";
	$r .= "</td>";
	$r .= "<td>";
	//$r .= $cadastros;
	$r .= "</td>";		
	$r .= "</tr>";	
	*/	

/*
	$r .= "<tr>";
	$r .= "<td>";
	$r .= "<a href='?controle=Modulos&acao=open&modulo=Downloads'>Downloads</a>";
	$r .= "</td>";
	$r .= "<td>";
	$r .= $downloads;
	$r .= "</td>";		
	$r .= "</tr>";
*/

	return $r;
}

function configuracaoGeral($config) {

	$r ="";
	$r .= "<table class='tabela-config'>";
	$r .= "<thead>";
	$r .= "<tr>";
	$r .= "<th></th>";
	$r .= "<th>Tipo</th>";
	$r .= "<th>Valor</th>";
	$r .= "</tr>";		
	$r .= "</thead>";
	$r .= "<tbody>";

	$r .= "<tr><td>1</td><td>Marca</td><td>" . $config[0]->marca . "</td></tr>";
	$r .= "<tr><td>2</td><td>DNS Dominio</td><td>" . $config[0]->dns . "</td></tr>";
	$r .= "<tr><td>3</td><td>Copyright</td><td>" . $config[0]->copyright . "</td></tr>";
	$r .= "<tr><td>4</td><td>UA Google Analitics</td><td>" . $config[0]->ua . "</td></tr>";
	$r .= "<tr><td>5</td><td>Email Remetente</td><td>" . $config[0]->email_remetente . "</td></tr>";
	$r .= "<tr><td>6</td><td>Email Destinatário</td><td>" . $config[0]->email_destinatario . "</td></tr>";
	$r .= "<tr><td>7</td><td>Cep Loja</td><td>" . $config[0]->cep_loja . "</td></tr>";
	$r .= "<tr><td>8</td><td>Email Loja</td><td>" . $config[0]->email_loja . "</td></tr>";
	$r .= "<tr><td>9</td><td>Moeda</td><td>" . $config[0]->currency . "</td></tr>";
	$r .= "<tr><td>10</td><td>Token Pagseguro</td><td>" . $config[0]->token_pagseguro . "</td></tr>";
	$r .= "<tr><td>11</td><td>Medida das Imagens do Banner</td><td>" . $config[0]->crop_imagem_w_slider . " x " . $config[0]->crop_imagem_h_slider .  "</td></tr>";
	$r .= "<tr><td>12</td><td>Medida das Imagens do Catalogo</td><td>" . $config[0]->crop_imagem_w_catalogo . " x " . $config[0]->crop_imagem_h_catalogo ."</td></tr>";
	$r .= "<tr><td>13</td><td>Medida das Imagens da Galeria</td><td>" . $config[0]->crop_imagem_w_galeria . " x " . $config[0]->crop_imagem_h_galeria . "</td></tr>";
	$r .= "<tr><td>14</td><td>Medida das Imagens da Imóveis</td><td>" . $config[0]->crop_imagem_w_imoveis . " x " . $config[0]->crop_imagem_h_imoveis . "</td></tr>";
	$r .= "<tr><td>15</td><td>Extensão dos Arquivos do Download</td><td>" . $config[0]->aextensao1 . " - " . $config[0]->aextensao2 . " - " . $config[0]->aextensao3 . "</td></tr>";
	$r .= "<tr><td>16</td><td>Tema</td><td>" . $config[0]->tema . "</td></tr>";
	//$r .= "<tr><td>10</td><td>Altura Logos</td><td>" . $config[0]->crop_imagem_w_slider_logos . " x " . $config[0]->crop_imagem_h_slider_logos . "</td></tr>";
	//$r .= "<tr><td>13</td><td>Slider Logos Expandido</td><td>" . $config[0]->slider_logos_expandido . "</td></tr>";
	//$r .= "<tr><td>8</td><td>Slider Expandido</td><td>" . $config[0]->slider_expandido . "</td></tr>";
	//$r .= "<tr><td>19</td><td>Landing Page</td><td>" . $config[0]->onepage . "</td></tr>";
	//$r .= "<tr><td>20</td><td>Taxa Compressão</td><td>" . $config[0]->taxa_compressao_imagem . "</td></tr>";




	$r .= "</table>";

	return $r;
}

function configuracaoOrdem($config) {

	$r ="";
	$r .= "<table class=''>";
	$r .= "<thead>";
	$r .= "<tr>";
	$r .= "<th></th>";
	$r .= "<th>Tipo</th>";
	$r .= "<th>Valor</th>";
	$r .= "</tr>";		
	$r .= "</thead>";
	$r .= "<tbody>";

	$r .= "<tr><td>1</td><td>Ordem Cadastros</td><td>" . $config[0]->ordem_cadastros . "</td></tr>";
	$r .= "<tr><td>2</td><td>Ordem Catalogo</td><td>" . $config[0]->ordem_catalogo . "</td></tr>";
	$r .= "<tr><td>3</td><td>Ordem Downloads</td><td>" . $config[0]->ordem_downloads . "</td></tr>";
	$r .= "<tr><td>4</td><td>Ordem Galeria</td><td>" . $config[0]->ordem_galeria . "</td></tr>";
	$r .= "<tr><td>5</td><td>Ordem Glossário</td><td>" . $config[0]->ordem_glossario . "</td></tr>";
	$r .= "<tr><td>6</td><td>Ordem Links</td><td>" . $config[0]->ordem_links . "</td></tr>";
	$r .= "<tr><td>7</td><td>Ordem Sliders</td><td>" . $config[0]->ordem_sliders . "</td></tr>";
	$r .= "<tr><td>8</td><td>Ordem Textos</td><td>" . $config[0]->ordem_textos . "</td></tr>";
	$r .= "<tr><td>9</td><td>Ordem Textos Accordion</td><td>" . $config[0]->ordem_textos_accordion . "</td></tr>";
	$r .= "<tr><td>10</td><td>Ordem Textos Empilhados</td><td>" . $config[0]->ordem_textos_empilhados . "</td></tr>";
	$r .= "<tr><td>11</td><td>Ordem Usuarios</td><td>" . $config[0]->ordem_usuarios . "</td></tr>";
	$r .= "<tr><td>12</td><td>Ordem Vídeos Facebook</td><td>" . $config[0]->ordem_videosfacebook . "</td></tr>";
	$r .= "<tr><td>13</td><td>Ordem Vídeos Youtube</td><td>" . $config[0]->ordem_videosyoutube . "</td></tr>";
	$r .= "<tr><td>14</td><td>Ordem Vídeos Youtube Channel</td><td>" . $config[0]->ordem_videosyoutubechannel . "</td></tr>";
	$r .= "</table>";

		return $r=""; //$r;
	}


	function configuracaoPaginacao($config) {

		$r ="";
		$r .= "<table class='tabela-paginacao'>";
		$r .= "<thead>";
		$r .= "<tr>";
		$r .= "<th></th>";
		$r .= "<th>Módulo</th>";
		$r .= "<th>Quant. Itens</th>";
		$r .= "</tr>";		
		$r .= "</thead>";
		$r .= "<tbody>";


		$r .= "<tr><td>1</td><td>Pad</td><td>" . $config[0]->itens_textos_empilhados . "</td></tr>";	
		$r .= "<tr><td>2</td><td>TextosLinks</td><td>" . $config[0]->itens_textos . "</td></tr>";
		$r .= "<tr><td>3</td><td>TextosAccordion</td><td>" . $config[0]->itens_textos_accordion . "</td></tr>";
		$r .= "<tr><td>4</td><td>Blogs</td><td>" . $config[0]->itens_blog . "</td></tr>";
		$r .= "<tr><td>5</td><td>Galeria</td><td>" . $config[0]->itens_galeria . "</td></tr>";
		$r .= "<tr><td>6</td><td>Catalogo</td><td>" . $config[0]->itens_catalogo . "</td></tr>";
		$r .= "<tr><td>7</td><td>Imóveis</td><td>" . $config[0]->itens_imoveis . "</td></tr>";
		$r .= "<tr><td>8</td><td>Sliders</td><td>" . $config[0]->itens_sliders . "</td></tr>";
		$r .= "<tr><td>9</td><td>Usuarios</td><td>" . $config[0]->itens_usuarios . "</td></tr>";
		$r .= "<tr><td>10</td><td>VídeosYoutube</td><td>" . $config[0]->itens_videosyoutube . "</td></tr>";
		//$r .= "<tr><td>12</td><td>Vídeos Facebook</td><td>" . $config[0]->itens_videosfacebook . "</td></tr>";
		//$r .= "<tr><td>14</td><td>Vídeos Youtube Channel</td><td>" . $config[0]->itens_videosyoutubechannel . "</td></tr>";
		//$r .= "<tr><td>1</td><td>Cadastros</td><td>" . $config[0]->itens_cadastros . "</td></tr>";
		//$r .= "<tr><td>3</td><td>Downloads</td><td>" . $config[0]->itens_downloads . "</td></tr>";
		//$r .= "<tr><td>5</td><td>Glossário</td><td>" . $config[0]->itens_glossario . "</td></tr>";
		//$r .= "<tr><td>6</td><td>Links</td><td>" . $config[0]->itens_links . "</td></tr>";		

		$r .= "</table>";

		return $r;
	}


	?>
