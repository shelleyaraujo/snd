<?php

require_once("app/controllers/core.php");

function _editar_cabecalho() {

  $core=new Core(); 
  $data = $core->getData($id="1",$idcat="0");

  if(isset($_POST["update_cabecalho"])) {

    $descricao = str_replace("\n","<p>",$_POST["descricao"]);
    $telefones = $_POST["telefones"];
    $redes_sociais = $_POST["redes_sociais"];
    $emails = ""; //$_POST["emails"];
    $enderecos = ""; //$_POST["enderecos"];


    $o_conteudos = new DestaquesFixoModel(); 
    $conteudo = $o_conteudos->update_cabecalho("1",$descricao);
    $conteudo = $o_conteudos->update_cabecalho("2",$telefones);
    $conteudo = $o_conteudos->update_cabecalho("3",$redes_sociais);
    $conteudo = $o_conteudos->update_cabecalho("4",$emails);
    $conteudo = $o_conteudos->update_cabecalho("5",$enderecos);

  }
  

  $o_Conteudos = new DestaquesFixoModel(); 
  $descricao = $o_Conteudos->readConteudoIdDestaqueFixo("1");
  $telefones = $o_Conteudos->readConteudoIdDestaqueFixo("2");
  $redes_sociais = $o_Conteudos->readConteudoIdDestaqueFixo("3");
  $emails = $o_Conteudos->readConteudoIdDestaqueFixo("4");
  $enderecos = $o_Conteudos->readConteudoIdDestaqueFixo("5");

  $data["descricao"] =  $descricao[2];
  $data["telefones"] = $telefones[2];
  $data["redes_sociais"] = $redes_sociais[2];
  $data["emails"] = ""; //$emails[2];
  $data["enderecos"] = ""; // $enderecos[2];

  View::do_dump(VIEW_PATH. 'tao/editar_cabecalho.php',$data);
  
}

?>
