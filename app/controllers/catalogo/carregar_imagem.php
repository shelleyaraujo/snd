<?php

function _carregar_imagem() { 

    $imagem =  $_POST["imagem"];

    echo "<img onclick=carrega_imagem_grande('".$imagem."') src='" . myUrl("imagens/imagem.php?&imagem=" . $imagem . "&w=800&h=600&dir=catalogo") . "'>";

}
