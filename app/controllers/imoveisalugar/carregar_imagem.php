<?php

function _carregar_imagem() { 

    $imagem =  $_POST["imagem"];

    echo "<img src='" . myUrl("ImageImagens.php?imagem=" . $imagem . "&w=800&h=600&dir=imoveis") . "'>";

}
