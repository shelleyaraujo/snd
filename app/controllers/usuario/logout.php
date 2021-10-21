<?php

function _logout() { 

	unset($_SESSION['id_usuario']);
	unset($_SESSION['email']);
	unset($_SESSION["logado"]);

	echo "<a href='". myUrl("") ."'>Usuário desconectado do sistema - Clique aqui para continuar...</a>"; 

}

?>