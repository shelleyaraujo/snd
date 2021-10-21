<?php
$erro = null;
$nomeAleatorio = "";

$extensoes = array(".png",".jpg");
$caminho = "../../../imagens/fornecedores/";

if (isset($_FILES['file-upload'])) {
  $nome = $_FILES['file-upload']['name'];
  $temp = $_FILES['file-upload']['tmp_name'];
  if (!in_array(strtolower(strrchr($nome, ".")), $extensoes)) {
    $erro = 'Extensão inválida! Apenas png';
  }
  if (!$erro) {
    $nomeAleatorio = str_replace(strrchr($nome, "."),"-",$nome) . str_replace(".","",gmdate("H.i.s"))  . strrchr($nome, ".");
    $nomeAleatorio = str_replace(" ","", $nomeAleatorio);
    $nomeAleatorio = str_replace("JPG","jpg", $nomeAleatorio);
    $nomeAleatorio = str_replace("PNG","png", $nomeAleatorio);
    $nomeAleatorio = trim($nomeAleatorio);
    $nomeAleatorio = strtolower($nomeAleatorio);

    echo $nomeAleatorio;

    if (!move_uploaded_file($temp, $caminho . $nomeAleatorio))
      $erro = 'Não foi possível anexar o arquivo';
  }
}

?>