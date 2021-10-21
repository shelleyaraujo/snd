<?php

function _carregar_imagem() { 

    $imagem =  $_POST["imagem"];

    //echo "<img src='" . myUrl("ImageImagens.php?imagem=" . $imagem . "&w=600&h=400&dir=galeria") . "'>";
    echo $imagem;

}
