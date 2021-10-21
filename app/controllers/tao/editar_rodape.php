<?php

require_once("app/controllers/core.php");

function _editar_rodape() {

  $core=new Core(); 
  $data = $core->getData($id="1",$idcat="0");

  if(isset($_POST["update_rodape"])) {

    $descricao = str_replace("\n","<p>",$_POST["descricao"]);
    $telefones = $_POST["telefones"];
    $redes_sociais = $_POST["redes_sociais"];
    $emails = ""; //$_POST["emails"];
    $enderecos = $_POST["enderecos"];


    $o_conteudos = new DestaquesFixoModel(); 
    $conteudo = $o_conteudos->update_rodape("11",$descricao);
    $conteudo = $o_conteudos->update_rodape("12",$telefones);
    $conteudo = $o_conteudos->update_rodape("13",$redes_sociais);
    $conteudo = $o_conteudos->update_rodape("14",$emails);
    $conteudo = $o_conteudos->update_rodape("15",$enderecos);

  }
  
  $o_Conteudos = new DestaquesFixoModel(); 
  $descricao = $o_Conteudos->readConteudoIdDestaqueFixo("11");
  $telefones = $o_Conteudos->readConteudoIdDestaqueFixo("12");
  $redes_sociais = $o_Conteudos->readConteudoIdDestaqueFixo("13");
  $emails = $o_Conteudos->readConteudoIdDestaqueFixo("14");
  $enderecos = $o_Conteudos->readConteudoIdDestaqueFixo("15");

  $data["descricao"] =  $descricao[2];
  $data["telefones"] = $telefones[2];
  $data["redes_sociais"] = $redes_sociais[2];
  $data["emails"] = ""; //$emails[2];
  $data["enderecos"] = $enderecos[2];

  View::do_dump(VIEW_PATH. 'tao/editar_rodape.php',$data);
  
}

?>
