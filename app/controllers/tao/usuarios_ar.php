<?php

function _usuarios_ar() { 

    $ln=1000;
    $x=0;
    $y=10;
    $i=0;
    $ordem = "nome";

    $r ="";

    $o_usuarios = new UsuariosModel();
    $dr_usuarios = $o_usuarios->get_rows($ln, $x, $y, $ordem);

    foreach ($dr_usuarios as $row[])
    {
        if ($row[$i][0] == "#p#") {
            $pg = str_replace("page","Usuarios",$row[$i][1]);
        } else if ($row[$i][0] > 0) {  

            $r .= "<a href='javascript:void(0)' onclick=getIdUsuario('". $row[$i][0]  ."')><span style='color: green; font-size: 12px'>" . $row[$i][5] . "</span> | " . $row[$i][3] . "</a><br>";
        }

        $i++;
    }

    $r.= $pg;


    echo $r;
}

?>
