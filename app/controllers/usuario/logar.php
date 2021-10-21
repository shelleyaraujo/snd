<?php
function _logar() { 

  $Config = new ConfigModel();
  $config = $Config->readItensXmlConfig();

  $_SESSION["email"] = $_POST["email"];

  $Usuarios = new UsuariosModel();
  $Usuarios->setEmail($_POST["email"]);
  $Usuarios->setSenha(sha1($_POST["senha"]));
  $resultado = $Usuarios->logar();
  $_SESSION["id_usuario"] = $resultado["id"];


  if($resultado["email"] == $_POST["email"]) {
    echo myUrl('pagamento/forma_pagamento/');
  } else {
    echo "0";
  }

}

?>