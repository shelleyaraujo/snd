<?php

function _excluir_imagem() { 

  $imagem = $_POST["imagem"];
  unlink("imagens/" . $imagem);
  echo "A imagem:" . $imagem . " foi excluída.";
}

?>
