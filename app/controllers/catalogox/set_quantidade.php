<?php

function _set_quantidade() { 

    $cor = 9999999; 
    $tamanho = 9999999;
    $modelo = 9999999;

    $Catalogos = new CatalogoModel();
    $Catalogos->setId($_POST["idcatalogo"]);
    $Catalogos->setCor($_POST["cor"]);
    $Catalogos->setTamanho($_POST["tamanho"]);
    $Catalogos->setModelo($_POST["modelo"]);

    $cor = $Catalogos->getTotalCores(); 
    $tamanho = $Catalogos->getTotalTamanhos(); 
    $modelo = $Catalogos->getTotalModelos();

    if($cor == "") {
      $cor = 9999999;
    }

    if($tamanho == "") {
      $tamanho = 9999999;
    }

    if($modelo == "") {
      $modelo = 9999999;
    }

    //echo $cor . " - " . $tamanho . " - " . $modelo; 

    $total = min($cor,$tamanho,$modelo);

    $r = "";

    $r .= "<select name='quantidade'>";

    for ($i = 1; $i <= $total; $i++) {
      $r .= "<option value='" . $i . "'>" . $i . "</option>";   
      if($i==5){
        break;
      }   
    }

    $r .= "</select>";

    echo $r;
  }
