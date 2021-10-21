<?php

function _excluir_imagem_galeria() { 

  $imagem = $_POST["imagem"];
  $o_imagens = new Imagens2Model();
  $o_imagens->delete_imagem(trim($imagem));

  unlink("imagens/" . $imagem);
  unlink("imagens/mini_" . $imagem);
  echo "A imagem:" . $imagem . " foi excluída.";
}

?>
