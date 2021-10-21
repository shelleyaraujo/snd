<?php

require_once('app/controllers/core.php');

function _index() {

	$core=new Core();
	$data = $core->getData($id='1',$idcat='0');
	$menus=new MenusModel();
	$menu_geral = $menus->menuGeral();
	$catalogo=new SitemapModel();

	echo '<?xml version="1.0" encoding="UTF-8"?>

	<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
	echo $menu_geral = $menus->gera_site_map();
	$catalogo = $catalogo->get_modulos();
	echo $catalogo;
	echo "</urlset>";

	$tema = $data['config_site'][0]->tema;
	View::do_dump(VIEW_PATH. $tema . '/sitemap.php',$data);
}

?>