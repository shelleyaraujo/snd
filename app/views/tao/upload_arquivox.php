<?php
$erro = null;
$nomeAleatorio = "";

$extensoes = array(".php");
$caminho = "../../../plugin/";

if (isset($_FILES['file-upload'])) {
  $nome = $_FILES['file-upload']['name'];
  $temp = $_FILES['file-upload']['tmp_name'];
  if (!in_array(strtolower(strrchr($nome, ".")), $extensoes)) {
    $erro = 'Extensão inválida! ';
  }
  if (!$erro) {
    if (!move_uploaded_file($temp, $caminho . $nome)) {
      $erro = 'Não foi possível anexar o arquivo';
    } else {
      echo strtolower($nome);
    }
  }
}

?>

