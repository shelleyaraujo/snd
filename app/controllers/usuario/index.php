<?php

function _index($username='',$x='') { 

  $menus=new Menus();
  $menu_catalogo = $menus->menuCatalogo();

  $data['menu_catalogo']=$menu_catalogo;
  $data['menu_institucional']=$dr["menu_institucional"];
  $data['menu_lateral']=$dr["menu_lateral"];
  $data['body'][]='<h2>'. $menu_catalogo .'</h2><br />';
  $data['body'][]=View::do_fetch(VIEW_PATH.'main/login_form.php',array('username' => $username));
  $data['body'][]='<p>You can login with username="admin" and password="pass".<br />If that doesnt work try resetting the user database first.</p>';
  
  $tema = $dr["config_site"][0]->tema;
  View::do_dump(VIEW_PATH. $tema . '/default.php',$data);
}

function _getUsuarios() {

  $user=new User();
  $usuarios = $user->readItensPaginacao(100, 0, 0, "id",1);
  $r = "<div class=''>";
  $i=0;
  $pg = "";

  foreach ($usuarios as $row[])
  {
    if ($row[$i][0] == "#p#") {

      $pg = str_replace("page","Conteudos",$row[$i][1]);

    } else if ($row[$i][0] > 0) {

      $r .= "<div id='item". $row[$i][0] . "'  class='tabela-flex'>";
      
      $r .= "<div class='w90'>";

      $r .= "<a href='?controle=Conteudos&acao=getConteudo&idconteudo=".$row[$i][0]."'>";
      $r .= "[Editar Textos Adicionais]";
      $r .= "</a>";
      $r .= "<h2>";
      $r .= $row[$i][3];
      $r .= "</h2>";
      $r .= str_replace("imagens/","../imagens/",$row[$i][4]);

      $r .= "</div>";

      $r .= "<div class='w10'>";
      $r .= "<div class='box-2'><a href='javascript:void[0]' onclick=deleteItem('". $row[$i][0] ."','VideosYoutube')><img src='template/icones/lixeira.svg' width='10' height='10'></a></div>";
      $r .= "</div>";
      $r .= "</div>";
    }

    $i++;
  }

  return $r;

}