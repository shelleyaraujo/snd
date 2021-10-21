<?php
$erro = null;
$nomeAleatorio = "";
/*
$aextensao1 = "";
$aextensao2 = "";
$aextensao3 = "";
$config_site = readItensXmlConfig();
$aextensao1 = "." . $config_site[0]->aextensao1;
$aextensao2 = "." . $config_site[0]->aextensao2;
$aextensao3 = "." . $config_site[0]->aextensao3;
$extensoes = array($aextensao1,$aextensao2,$aextensao3);
*/

$extensoes = array(".exe",".bat",".ini");


$caminho = "../../../downloads/";

if (isset($_FILES['file-upload'])) {
  $nome = $_FILES['file-upload']['name'];
  $temp = $_FILES['file-upload']['tmp_name'];

  if (in_array(strtolower(strrchr($nome, ".")), $extensoes)) {
   $erro = 'Tenta colocar o arquivo na extensão zip';
  }

  //$nome = iconv('UTF-8', 'ASCII//TRANSLIT', $nome);
  $nome = tratar_arquivo_upload(utf8_decode($nome));
  $nomeAleatorio = str_replace(".","",gmdate("d.m.Y.H.i.s"));
  $nomeAleatorio .= "_" . $nome;
  $nomeAleatorio = str_replace(" ","",$nomeAleatorio);

  if (!$erro) {
    if (!move_uploaded_file($temp, $caminho . $nomeAleatorio)) {
      $erro = 'Não foi possível anexar o arquivo';
    } else {
      echo strtolower($nomeAleatorio);
    }
  }
}

function tratar_arquivo_upload($string){
  // pegando a extensao do arquivo
  $partes 	= explode(".", $string);
  $extensao 	= $partes[count($partes)-1];	
  // somente o nome do arquivo
  $nome	= preg_replace('/\.[^.]*$/', '', $string);	
  // removendo simbolos, acentos etc
  $a = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýýþÿŔŕ?';
  $b = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuuyybyRr-';
  $nome = strtr($nome, utf8_decode($a), $b);
  $nome = str_replace(".","-",$nome);
  $nome = preg_replace( "/[^0-9a-zA-Z\.]+/",'-',$nome);
  return utf8_decode(strtolower($nome.".".$extensao));
}


function readItensXmlConfig()
{
  $dr = array();
  $path_xml = "../../../app/config/config.xml";
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



?>



