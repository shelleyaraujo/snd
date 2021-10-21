<?php

class ConfigModel extends Model {

   private $path_xml;

	function __construct()
	{
		parent::__construct();
	}
	
	public function setPathXml( $path_xml )
	{
		$this->path_xml = $path_xml;
		return $this;
	}
	
	public function getPathXml()
	{
		return $this->path_xml;
	}
	
	public function readItensXmlConfig()
	{
		$path_xml = "app/config/config.xml";
		$dr = array();
		$xml = simplexml_load_file($path_xml);
		if ($xml === false) {
			echo "Failed loading XML: ";
			foreach(libxml_get_errors() as $error) {
				echo "<br>", $error->message;
			}
		} else {
			$xml=simplexml_load_file($path_xml) or die("Error: Cannot create object");

			$dr[0] = $xml->config[0];
		}

		return $dr;
	} 

	public function readItensXmlConfigPlugin()
	{
		$path_xml = "../config/config.xml";
		$dr = array();
		$xml = simplexml_load_file($path_xml);
		if ($xml === false) {
			echo "Failed loading XML: ";
			foreach(libxml_get_errors() as $error) {
				echo "<br>", $error->message;
			}
		} else {
			$xml=simplexml_load_file($path_xml) or die("Error: Cannot create object");

			$dr[0] = $xml->config[0];
		}

		return $dr;
	} 

	public function updateItemXmlConfig($node, $valor)
	{
		//load xml file to edit
		$path_xml = "app/config/config.xml";
		$xml = simplexml_load_file($path_xml);
		$xml->config[0]->$node = $valor;
		$xml->asXML($path_xml);
	} 	
	
}

?>