<?php
class LayoutModel extends PersistModelAbstract
{
	private $copyright;
	
	function __construct()
	{
		parent::__construct();
	}
	
	/**
	 * Setters e Getters da
	 * classe TelefoneModel
	 */
	
	public function ano()
	{
		$ano = "";
		$ano .= gmdate("Y");

		return $ano;
	} 	

	public function setCopyright($config)
	{
		$ano = "";
		$ano .= gmdate("Y");
		$r = "@";
		$r .= $ano . " - " . $config->marca . " - <a href='http://" . $config->dns . "'>" . $config->dns . "</a> - " . $config->copyright;
		$r .= " - Desenvolvido por: <a href='http://www.portalprojetos.com.br'>Portal Projetos</a>";
              return $r;
	} 	

}
?>