<?php

require_once("app/controllers/core.php");

function _config_avancadas() {

	$core=new Core(); 
	$data = $core->getData($id="1",$idcat="0");

   $Config = new ConfigModel();
   $config = $Config->readItensXmlConfig();

   if(isset($_POST["update_config"])) {
    updateItem();
 }

 $drconfig[0] = get_config($config);
 $data["config_geral"] = $drconfig[0];

 $drconfig[3] = config_catalogo($config);
 $data["config_catalogo"] =$drconfig[3];


 View::do_dump(VIEW_PATH. 'tao/config_avancadas.php',$data);

}

function get_config($config) {

	$Config = new ConfigModel();
	$config = $Config->readItensXmlConfig();
	
	$r = "";

   $r = "<h2>Padrão</h2>";
   $r .= "<table class='tabela'>";

   $r .= "<tbody>";

   $r .= "<tr>";
   $r .= "<td>";
   $r .= "Email Remetente do Contato";
   $r .= "</td>";
   $r .= "<td colspan='2'>";
   $r .= "<input type='text' id='email_remetente' name='email_remetente' value='". $config[0]->email_remetente ."'>";       
   $r .= "</td>";
   $r .= "</tr>";
   
   $r .= "<tr>";
   $r .= "<td>";
   $r .= "Domínio do Site";
   $r .= "</td>";
   $r .= "<td colspan='3'>";
   $r .= "<input type='text' id='dns' name='dns' value='" . $config[0]->dns . "'>";
   $r .= "</td>";
   $r .= "</tr>";

   $r .= "<tr>";
   $r .= "<td>";
   $r .= "Cep da Loja";
   $r .= "</td>";
   $r .= "<td colspan='3'>";
   $r .= "<input type='text' id='cep_loja' name='cep_loja' value='" . $config[0]->cep_loja . "'>";
   $r .= "</td>";
   $r .= "</tr>";

   $r .= "<tr>";
   $r .= "<td>";
   $r .= "Token (pagseguro)";
   $r .= "</td>";
   $r .= "<td colspan='3'>";
   $r .= "<input type='text' id='token_pagseguro' name='token_pagseguro' value='" . $config[0]->token_pagseguro . "'>";
   $r .= "</td>";
   $r .= "</tr>";

   $r .= "<tr>";
   $r .= "<td>";
   $r .= "Currency (pagseguro)";
   $r .= "</td>";
   $r .= "<td colspan='3'>";
   $r .= "<input type='text' id='currency' name='currency' value='" . $config[0]->currency . "'>";
   $r .= "</td>";
   $r .= "</tr>";

   $r .= "<tr>";
   $r .= "<td>";
   $r .= "Email da Loja";
   $r .= "</td>";
   $r .= "<td colspan='3'>";
   $r .= "<input type='text' id='email_loja' name='email_loja' value='" . $config[0]->email_loja . "'>";
   $r .= "</td>";
   $r .= "</tr>";

   $r .= "<tr>";
   $r .= "<td>";
   $r .= "UA (Google Analitics)";
   $r .= "</td>";
   $r .= "<td colspan='3'>";
   $r .= "<input type='text' id='ua' name='ua' value='" . $config[0]->ua . "'>";
   $r .= "</td>";
   $r .= "</tr>";

   $r .= "</table>";




 $r .= "<h2>Corte das Imagens</h2>";

   $r .= "<table class='tabela'>";

   $r .= "<tbody>";

   $r .= "<tr>";
   $r .= "<td>";
   $r .= "Banner";
   $r .= "</td>";
   $r .= "<td>";
   $r .= "Grande: W <input style='width: 80px' id='w_slider' type='text' id='crop_imagem_w_slider' name='crop_imagem_w_slider' value='". $config[0]->crop_imagem_w_slider ."'>";       
   $r .= "H<input style='width: 80px' type='text' id='h_slider' name='crop_imagem_h_slider' value='". $config[0]->crop_imagem_h_slider ."'>";       
   $r .= "</td>";
   $r .= "<td>";
   $r .= "Pequeno: W <input style='width: 80px' type='text' id='w_sliderp' name='crop_imagem_w_sliderp' value='". $config[0]->crop_imagem_w_sliderp ."'>";       
   $r .= "H <input style='width: 80px' type='text' id='h_sliderp' name='crop_imagem_h_sliderp' value='". $config[0]->crop_imagem_h_sliderp ."'>";       
   $r .= "</td>";
   $r .= "</tr>";

   $r .= "<tr>";
   $r .= "<td>";
   $r .= "Catalogo";
   $r .= "</td>";
   $r .= "<td>";
   $r .= "Grande: W <input style='width: 80px' type='text' id='crop_imagem_w_catalogo' name='crop_imagem_w_catalogo' value='". $config[0]->crop_imagem_w_catalogo ."'>";       
   $r .= "H<input style='width: 80px' type='text' id='crop_imagem_w_catalogo' name='crop_imagem_h_catalogo' value='". $config[0]->crop_imagem_h_catalogo ."'>";       
   $r .= "</td>";
   $r .= "<td>";
   $r .= "Pequeno: W <input style='width: 80px' type='text' id='crop_imagem_w_catalogop' name='crop_imagem_w_catalogop' value='". $config[0]->crop_imagem_w_catalogop ."'>";       
   $r .= "H <input style='width: 80px' type='text' id='crop_imagem_w_catalogop' name='crop_imagem_h_catalogop' value='". $config[0]->crop_imagem_h_catalogop ."'>";       
   $r .= "</td>";
   $r .= "</tr>";
   
   $r .= "<tr>";
   $r .= "<td>";
   $r .= "Galeria";
   $r .= "</td>";
   $r .= "<td>";
   $r .= "Grande: W <input style='width: 80px' type='text' id='crop_imagem_w_galeria' name='crop_imagem_w_galeria' value='". $config[0]->crop_imagem_w_galeria ."'>";       
   $r .= "H<input style='width: 80px' type='text' id='crop_imagem_w_galeria' name='crop_imagem_h_galeria' value='". $config[0]->crop_imagem_h_galeria ."'>";       
   $r .= "</td>";
   $r .= "<td>";
   $r .= "Pequeno: W <input style='width: 80px' type='text' id='crop_imagem_w_galeriap' name='crop_imagem_w_galeriap' value='". $config[0]->crop_imagem_w_galeriap ."'>";       
   $r .= "H <input style='width: 80px' type='text' id='crop_imagem_w_galeriap' name='crop_imagem_h_galeriap' value='". $config[0]->crop_imagem_h_galeriap ."'>";       
   $r .= "</td>";
   $r .= "</tr>";

   $r .= "<tr>";
   $r .= "<td>";
   $r .= "Imóveis";
   $r .= "</td>";
   $r .= "<td>";
   $r .= "Grande: W <input style='width: 80px' type='text' id='crop_imagem_w_galeria' name='crop_imagem_w_imoveis' value='". $config[0]->crop_imagem_w_imoveis ."'>";       
   $r .= "H<input style='width: 80px' type='text' id='crop_imagem_w_imoveis' name='crop_imagem_h_imoveis' value='". $config[0]->crop_imagem_h_imoveis ."'>";       
   $r .= "</td>";
   $r .= "<td>";
   $r .= "Pequeno: W <input style='width: 80px' type='text' id='crop_imagem_w_imoveisp' name='crop_imagem_w_imoveisp' value='". $config[0]->crop_imagem_w_imoveisp ."'>";       
   $r .= "H <input style='width: 80px' type='text' id='crop_imagem_w_imoveisp' name='crop_imagem_h_imoveisp' value='". $config[0]->crop_imagem_h_imoveisp ."'>";       
   $r .= "</td>";
   $r .= "</tr>";

   $r .= "<tr>";
   $r .= "<td>";
   $r .= "Parceiros / Clientes";
   $r .= "</td>";
   $r .= "<td>";
   $r .= "Largura: <input type='text' id='w_slider_logos' name='crop_imagem_w_slider_logos' value='". $config[0]->crop_imagem_w_slider_logos ."'>";       
   $r .= "</td>";
   $r .= "<td>";
   $r .= "Altura: <input type='text' id='h_slider_logos' name='crop_imagem_h_slider_logos' value='". $config[0]->crop_imagem_h_slider_logos ."'>";       
   $r .= "</td>";
   $r .= "</tr>";


   $r .= "</table>";

   return $r;

}


function config_catalogo($config) {

   $Config = new ConfigModel();
   $config = $Config->readItensXmlConfig();

   $checked = "";

   $r = "";
   $r = "<h2>Vizualizar no Catálogo</h2>";

   if ($config[0]->cat_codigo == "1") {
      $checked = "checked";
   }

   $r .= "<input type='checkbox' name='cat_codigo' $checked><p>Código</p>";
   $checked = "";

   if ($config[0]->preco == "1") {
      $checked = "checked";
   }
   $r .= "<input type='checkbox' name='preco' $checked><p>Preço R$ 00.00</p>";
   $checked = "";

   if ($config[0]->promocao == "1") {
      $checked = "checked";
   }
   $r .= "<input type='checkbox' name='promocao' $checked><p>Promoção R$ 00.00</p>";
   $checked = "";

   if ($config[0]->cat_cor == "1") {
      $checked = "checked";
   }
   $r .= "<input type='checkbox' name='cat_cor' $checked><p>Cores</p>";
   $checked = "";

   if ($config[0]->cat_tamanho == "1") {
      $checked = "checked";
   }
   $r .= "<input type='checkbox' name='cat_tamanho' $checked><p>Tamanhos</p>";
   $checked = "";

   if ($config[0]->cat_modelo == "1") {
      $checked = "checked";
   }

   $r .= "<input type='checkbox' name='cat_modelo' $checked><p>Modelos</p>";
   $checked = "";

   if ($config[0]->cat_descricao_simplificada == "1") {
      $checked = "checked";
   }
   
   $r .= "<input type='checkbox' name='cat_descricao_simplificada' $checked><p>Descrição Simplificada</p>";
   $checked = ""; 

   if ($config[0]->cat_vitrine == "1") {
      $checked = "checked";
   }
   $r .= "<input type='checkbox' name='cat_vitrine' $checked><p>Vitrine na Home</p>";
   $checked = "";

   $r .= "Defina o tipo para o módulo  Catálogo: " . cat_botao_comprar($config[0]->cat_botao_comprar);

   return $r;
}

function updateItem() {

   $Config = new ConfigModel();
   $Config->updateItemXmlConfig("email_remetente", $_POST['email_remetente']);      
   $Config->updateItemXmlConfig("dns", str_replace("http://", "", $_POST['dns']));
   $Config->updateItemXmlConfig("cep_loja", $_POST['cep_loja']);
   $Config->updateItemXmlConfig("token_pagseguro", $_POST['token_pagseguro']);
   $Config->updateItemXmlConfig("email_loja", $_POST['email_loja']);
   $Config->updateItemXmlConfig("currency", $_POST['currency']);
   $Config->updateItemXmlConfig("ua", $_POST['ua']);
   //$Config->updateItemXmlConfig("aextensao1", str_replace(".", "", $_POST['aextensao1']));
   //$Config->updateItemXmlConfig("aextensao2", str_replace(".", "", $_POST['aextensao2']));
   //$Config->updateItemXmlConfig("aextensao3", str_replace(".", "", $_POST['aextensao3']));
   $Config->updateItemXmlConfig("cat_botao_comprar", $_POST['cat_botao_comprar']);

   $Config->updateItemXmlConfig("crop_imagem_w_catalogo", $_POST['crop_imagem_w_catalogo']);
   $Config->updateItemXmlConfig("crop_imagem_h_catalogo", $_POST['crop_imagem_h_catalogo']);
   $Config->updateItemXmlConfig("crop_imagem_w_catalogop", $_POST['crop_imagem_w_catalogop']);
   $Config->updateItemXmlConfig("crop_imagem_h_catalogop", $_POST['crop_imagem_h_catalogop']);

   $Config->updateItemXmlConfig("crop_imagem_w_galeria", $_POST['crop_imagem_w_galeria']);
   $Config->updateItemXmlConfig("crop_imagem_h_galeria", $_POST['crop_imagem_h_galeria']);
   $Config->updateItemXmlConfig("crop_imagem_w_galeriap", $_POST['crop_imagem_w_galeriap']);
   $Config->updateItemXmlConfig("crop_imagem_h_galeriap", $_POST['crop_imagem_h_galeriap']);

   $Config->updateItemXmlConfig("crop_imagem_w_slider", $_POST['crop_imagem_w_slider']);
   $Config->updateItemXmlConfig("crop_imagem_h_slider", $_POST['crop_imagem_h_slider']);
   $Config->updateItemXmlConfig("crop_imagem_w_sliderp", $_POST['crop_imagem_w_sliderp']);
   $Config->updateItemXmlConfig("crop_imagem_h_sliderp", $_POST['crop_imagem_h_sliderp']);

   $Config->updateItemXmlConfig("crop_imagem_w_slider_logos", $_POST['crop_imagem_w_slider_logos']);
   $Config->updateItemXmlConfig("crop_imagem_h_slider_logos", $_POST['crop_imagem_h_slider_logos']);

   $Config->updateItemXmlConfig("crop_imagem_w_imoveis", $_POST['crop_imagem_w_imoveis']);
   $Config->updateItemXmlConfig("crop_imagem_h_imoveis", $_POST['crop_imagem_h_imoveis']);
   $Config->updateItemXmlConfig("crop_imagem_w_imoveisp", $_POST['crop_imagem_w_imoveisp']);
   $Config->updateItemXmlConfig("crop_imagem_h_imoveisp", $_POST['crop_imagem_h_imoveisp']);

   if (isset($_POST['email_remetente'])) {
     $Config->updateItemXmlConfig("email_remetente", $_POST['email_remetente']);
  }

  $checked = "0";
  if (isset($_POST['cat_codigo'])) {
   $checked = "1";
}

$Config->updateItemXmlConfig("cat_codigo", $checked);
$checked = "0";

if (isset($_POST['preco'])) {
   $checked = "1";
}
$Config->updateItemXmlConfig("preco", $checked);
$checked = "0";

if (isset($_POST['promocao'])) {
   $checked = "1";
}
$Config->updateItemXmlConfig("promocao", $checked);
$checked = "0";

if (isset($_POST['cat_cor'])) {
   $checked = "1";
}
$Config->updateItemXmlConfig("cat_cor", $checked);
$checked = "0";

if (isset($_POST['cat_tamanho'])) {
   $checked = "1";
}

$Config->updateItemXmlConfig("cat_tamanho", $checked);
$checked = "0";

if (isset($_POST['cat_modelo'])) {
   $checked = "1";
}

$Config->updateItemXmlConfig("cat_modelo", $checked);
$checked = "0";

if (isset($_POST['cat_descricao_simplificada'])) {
   $checked = "1";
}

$Config->updateItemXmlConfig("cat_descricao_simplificada", $checked);
$checked = "0";



if (isset($_POST['cat_vitrine'])) {
   $checked = "1";
}
$Config->updateItemXmlConfig("cat_vitrine", $checked);
$checked = "0";

}

function cat_botao_comprar($valor) {

   $r = "";
   $dr = array();
   $dr[0][0] = "0";
   $dr[1][0] = "1";
   $dr[2][0] = "2";

   $dr[0][1] = "Lista para Orçamento";
   $dr[1][1] = "Loja Virtual";
   $dr[2][1] = "Apenas Catálogo demonstrativo";

   $r .= "<select name='cat_botao_comprar'>";

   for ($i = 0; $i < count($dr); $i++) {

      $r .= $dr[$i][1];
      if ($dr[$i][0] == $valor) {
         $r .= "<option value='" . $dr[$i][0] . "' selected>" . $dr[$i][1] . "</option>";
      } else {
         $r .= "<option value='" . $dr[$i][0] . "'>" . $dr[$i][1] . "</option>";
      }
   }

   $r .= "</select>";

   return $r;
}

function onepage($valor) {

   $r = "";
   $dr = array();
   $dr[0][0] = "0";
   $dr[1][0] = "1";

   $dr[0][1] = "Não";
   $dr[1][1] = "Sim";

   $r .= "<select name='onepage'>";

   for ($i = 0; $i < count($dr); $i++) {

      $r .= $dr[$i][1];
      if ($dr[$i][0] == $valor) {
         $r .= "<option value='" . $dr[$i][0] . "' selected>" . $dr[$i][1] . "</option>";
      } else {
         $r .= "<option value='" . $dr[$i][0] . "'>" . $dr[$i][1] . "</option>";
      }
   }

   $r .= "</select>";

   return $r;
}

function cropImagem() {

   if (isset($_POST['crop_imagem_catalogo'])) {
      $w = $_POST['crop_imagem_w_catalogo'] + 0;
      $h = $_POST['crop_imagem_h_catalogo'] + 0;
      $wp = $_POST['crop_imagem_w_catalogop'] + 0;
      $hp = $_POST['crop_imagem_h_catalogop'] + 0;

      $dr = array();
      $Catalogo = new CatalogoModel();
      $catalogo = $Catalogo->readTodosItens();

      for ($i = 0; $i < count($catalogo); $i++) {

         if ($catalogo[$i][8] != "" && $catalogo[$i][8] != "") {
            $resizeObj = new resize('./../imagens/' . $catalogo[$i][8]);
            $resizeObj->resizeImage($w, $h, 'crop');
            $resizeObj->saveImage('./../imagens//' . $catalogo[$i][8], 100);
         }

         $Catalogo->setId($catalogo[$i][0]);

         $drCatalogoImagems = $Catalogo->readItemImagems();
         $ii = 0;

         for ($ii = 0; $ii < count($drCatalogoImagems); $ii++) {

            $resizeObj = new resize('./../imagens/' . $drCatalogoImagems[$ii][2]);
            $resizeObj->resizeImage($w, $h, 'crop');
            $resizeObj->saveImage('./../imagens//' . $drCatalogoImagems[$ii][2], 100);
         }
      }
   }

   if (isset($_POST['crop_imagem_galeria'])) {
      $w = $_POST['crop_imagem_w_galeria'] + 0;
      $h = $_POST['crop_imagem_h_galeria'] + 0;

      $dr = array();
      $Galeria = new GaleriaModel();
      $galeria = $Galeria->readTodosItens();

      for ($i = 0; $i < count($galeria); $i++) {
         if ($galeria[$i][5] != "" && $galeria[$i][5] != "") {
            $resizeObj = new resize('./../imagens/' . $galeria[$i][5]);
            $resizeObj->resizeImage($w, $h, 'crop');
            $resizeObj->saveImage('./../imagens/galeria/' . $galeria[$i][5], 100);
         }
      }
   }

   if (isset($_POST['crop_imagem_slider'])) {
      $w = $_POST['crop_imagem_w_slider'] + 0;
      $h = $_POST['crop_imagem_h_slider'] + 0;

      $dr = array();
      $Slider = new SlidersModel();
      $slider = $Slider->readSliders("id");

      for ($i = 0; $i < count($slider); $i++) {
         if ($slider[$i][2] != "" && $slider[$i][2] != "") {
            $resizeObj = new resize('./../imagens/' . $slider[$i][2]);
            $resizeObj->resizeImage($w, $h, 'crop');
            $resizeObj->saveImage('./../imagens/sliders/' . $slider[$i][2], 100);
         }
      }
   }

   if (isset($_POST['xcrop_imagem_slider_logos'])) {
      $w = $_POST['crop_imagem_w_slider_logos'] + 0;
      $h = $_POST['crop_imagem_h_slider_logos'] + 0;

      $dr = array();
      $SliderLogos = new SlidersLogosModel();
      $slider_logos = $SliderLogos->readSliders("id");

      for ($i = 0; $i < count($slider_logos); $i++) {            
         if ($slider_logos[$i][2] != "" && $slider_logos[$i][2] != "") {
            $resizeObj = new resize('./../imagens/' . $slider_logos[$i][2]);
            $resizeObj->resizeImage($w, $h, 'crop');
            $resizeObj->saveImage('./../imagens/sliderslogos/' . $slider_logos[$i][2], 100);
         }
      }
   }

   if (isset($_POST['crop_imagem_imoveis'])) {
      $w = $_POST['crop_imagem_w_imoveis'] + 0;
      $h = $_POST['crop_imagem_h_imoveis'] + 0;

      $imoveis = array();
      $Imoveis = new ImoveisModel();
      $imoveis = $Imoveis->readItemImagemTodos();

      $x=0;

      for ($i = 0; $i < count($imoveis); $i++) {

         if ($imoveis[$i][2] != "" && $imoveis[$i][2] != "") {
            $resizeObj = new resize('./../imagens/' . $imoveis[$i][2]);
            $resizeObj->resizeImage($w, $h, 'crop');
            $resizeObj->saveImage('./../imagens/imoveis/' . $imoveis[$i][2], 100);
         }
      }
   }


}