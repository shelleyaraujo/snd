<?php

require_once("app/controllers/core.php");

function _index() {

	$core=new Core(); 
	$data = $core->getData($id="1",$idcat="0");

	if(isset($_POST["update_usuario"])) {
		update_usuario();
	}

	if(isset($_SESSION["logado"])) {

	$data["usuario"] = "Olá " . $_SESSION["usuario"];
	$data["usuario"] .= "<br>";
	$data["usuario"] .= "Você esta na Área Administrativa da sua conta.";
	$data["usuario"] .= "<br>";
	$data["usuario"] .= "Dúvidas ou sugestões envie email para:";
	$data["usuario"] .= "<br>";
	$data["usuario"] .= "shelleyaraujo@gmail.com";

	$o_usuarios = new UsuariosModel();
	$o_usuarios->setId($_SESSION["id"]);
	$dr_usuarios = $o_usuarios->readUsuario();

	$data["id"] =$dr_usuarios[0];
	$data["dma"] =$dr_usuarios[1]; 
	$data["dmanascimento"] =$dr_usuarios[2]; 
	$data["nome"] =$dr_usuarios[3];
	$data["endereco"] =$dr_usuarios[4];
	$data["numero"] =  $dr_usuarios[5];
	$data["telefone"] =  $dr_usuarios[6];    
	$data["bairro"] =  $dr_usuarios[7]; 
	$data["complemento"] =  $dr_usuarios[8]; 
	$data["cidade"] =  $dr_usuarios[9];  
	$data["estado"] =  $dr_usuarios[10];  
	$data["cep"] =  $dr_usuarios[11];  
	$data["cpfcnpj"] =  $dr_usuarios[12];  
	$data["rg"] =  $dr_usuarios[13]; 
	$data["email"] =  $dr_usuarios[14];
	$data["site"] =  $dr_usuarios[15]; 
	$data["status"] = $dr_usuarios[16]; 
	$data["credencial"] = $dr_usuarios[17]; 
	$data["imagem"] = $dr_usuarios[18];

	View::do_dump(VIEW_PATH. 'tao/usuario.php',$data);

} else {
	View::do_dump(VIEW_PATH. 'tao/logar.php',$data);
}

}


 function update_usuario() {

  $Usuarios = new UsuariosModel();
  $Usuarios->setId($_POST["id"]);
  $Usuarios->setNome($_POST["nome"]);
  $Usuarios->setEndereco($_POST["endereco"]);
  $Usuarios->setNumero($_POST["numero"]);
  $Usuarios->setTelefone($_POST["telefone"]);
  $Usuarios->setBairro($_POST["bairro"]);
  $Usuarios->setComplemento($_POST["complemento"]);
  $Usuarios->setCidade($_POST["cidade"]);
  $Usuarios->setEstado($_POST["estado"]);
  $Usuarios->setCep($_POST["cep"]);
  $Usuarios->setCpfCnpj($_POST["cpfcnpj"]);
  //$Usuarios->setRg($_POST["rg"]);
  $Usuarios->setEmail($_POST["email"]);

  $Usuarios->update_usuario();

  if(isset($_POST['excluir']))
  {
    $Usuarios->setId($_POST['id']);
    $Usuarios->deleteUsuario();
  }
  else{
        if(isset($_POST["usuario_ativo"])) {
   }  else {
   }
 }  

}

?>

