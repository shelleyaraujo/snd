<?php
$erro = null;
$nomeAleatorio = $_GET["img"];

$extensoes = array(".png");
$caminho = "../../../imagens/";

if (isset($_FILES['file-upload'])) {
  $nome = $_FILES['file-upload']['name'];
  $temp = $_FILES['file-upload']['tmp_name'];
  if (!in_array(strtolower(strrchr($nome, ".")), $extensoes)) {
    $erro = 'Extensão inválida! Apenas png';
  }
  if (!$erro) {
    $nomeAleatorio = $nomeAleatorio . strrchr($nome, ".");
  //  $nomeAleatorio = str_replace(".", "-", gmdate("d.m.Y-H.i.s")) . strrchr($nome, ".");

    if (!move_uploaded_file($temp, $caminho . $nomeAleatorio))
      $erro = 'Não foi possível anexar o arquivo';
  }
}

?>