<?php

function _usuario_dados() { 

    $r ="Sem Dados!";

    if(isset($_POST['idusuario'])) {

        $o_usuarios = new UsuariosModel();
        $o_usuarios->setId($_POST['idusuario']);
        $dr_usuarios = $o_usuarios->readUsuario();

        $dma = "xx";

   }

        if(isset($dr_usuarios[1])) {
        $dma = date('d/m/Y H:i:s', strtotime($dr_usuarios[1]));
        $r = "ID:" . $dr_usuarios[0] . "<br/>";
        $r .= "Data: " . $dma . "<br/>"; 
        $r .= "Nome: " . $dr_usuarios[3] . "<br/>";
        $r .= "Endereco: " . $dr_usuarios[4] . ", ";
        $r .= "Numero: " .   $dr_usuarios[5] . "<br/>";
        $r .= "Telefone: " .   $dr_usuarios[6] . "<br/>";    
        $r .= "Bairro: " .   $dr_usuarios[7] . " - "; 
        $r .= "Complemento: " .   $dr_usuarios[8] . "<br/>"; 
        $r .= "Cidade: " .   $dr_usuarios[9] . " - ";  
        $r .= "Estado: " .   $dr_usuarios[10] . " - ";  
        $r .= "Cep: " .   $dr_usuarios[11] . "<br/>";  
        $r .= "CPF: " .   $dr_usuarios[12] . "<br/>";  
        $r .= "CNPJ: " .   $dr_usuarios[20] . "<br/>";  
        $r .= "RG: " .   $dr_usuarios[13] . "<br/>"; 
        $r .= "Email: " .  "<a style='color:red' href='mailto:". $dr_usuarios[14] ."'>" . $dr_usuarios[14] . "</a>" . "<br/>";
       // $r .= "Site: " .   $dr_usuarios[15] . "<br/>"; 
    }

    echo $r;
}

?>
