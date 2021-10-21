<?php

function _lista_classes() { 

  $classe = $_POST["classe"];

	if($classe == "destaques") {

echo "
<p>titulo-centralizado</p>
<p>titulo-branco</p>
<p>titulo-vermelho</p>
<p>titulo-vermelho</p>
<p>titulo-amarelo</p>
<p>titulo-chumbo</p>
<hr>
<p>texto-centralizado</p>
<p>texto-branco</p>
<p>texto-amarelo</p>
<p>texto-chumbo</p>
<hr>
<p>fundo-verde </p>
<p>fundo-amarelo </p>
<p>fundo-azul</p>
<p>fundo-vermelho</p>
<p>fundo-tomate</p>
<p>fundo-tomate</p>
<p>fundo-chumbo</p>
<p>fundo-prata</p>
<p>fundo-#264653</p>
<p>fundo-#e9ecef</p>
<p>fundo-transparent </p>
<p>fundo-branco </p>
<p>fundo-azul-claro</p>
<p>fundo-mediumskyblue</p>
<hr>
<p>bloco-verde</p>
<p>bloco-amarelo</p>
<p>bloco-vermelho</p>
<p>bloco-chumbo </p>
 ";
}



if($classe == "sliders") {

echo 
"

<p>topo-equerda</p>
<p>topo-direita</p>
<p>base-equerda </p>
<p>base-direita </p>
<hr>
<p>texto-vermelho </p>
<p>texto-vermelho </p>
<p>texto-amarelo </p>
<p>texto-amarelo </p>
<p>texto-azul</p>
<p>texto-azul</p>
<p>texto-branco</p>
<p>texto-branco</p>
<p>texto-verde</p>
<p>texto-verde</p>
<hr>
<p>texto-fundo-transparente </p>
<p>texto-fundo-branco</p>
<p>texto-fundo-vermelho</p>
<p>texto-fundo-azul</p>
<p>texto-fundo-preto </p>
<p>texto-fundo-verde</p>


";

}

}

?>
