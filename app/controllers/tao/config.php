<?php

require_once("app/controllers/core.php");

function _config() {

	$core=new Core(); 
	$data = $core->getData($id="1",$idcat="0");

   $Config = new ConfigModel();
   $config = $Config->readItensXmlConfig();

   if(isset($_POST["update_config"])) {
    updateItem();
 }

 $drconfig[0] = get_config($config);
 $drconfig[3] = config_catalogo($config);

 $data["config_geral"] = $drconfig[0];
 $data["config_catalogo"] =$drconfig[3];
 $data["config_paginacao"] = configPaginacao($config);

 View::do_dump(VIEW_PATH. 'tao/config.php',$data);

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
   $r .= "<input type='text' id='email_remetente' name='email_remetente' disabled value='". $config[0]->email_remetente ."'>";       
   $r .= "</td>";
   $r .= "</tr>";

   $r .= "<tr>";
   $r .= "<td>";
   $r .= "Email Destinatátio do Contato";
   $r .= "</td>";
   $r .= "<td colspan='2'>";
   $r .= "<input type='text' id='email_destinatario' name='email_destinatario' value='". $config[0]->email_destinatario ."'>";       
   $r .= "</td>";
   $r .= "</tr>";

   $r .= "<tr>";
   $r .= "<td>";
   $r .= "Domínio do Site";
   $r .= "</td>";
   $r .= "<td colspan='3'>";
   $r .= "<input type='text' id='dns' name='dns' disabled value='"  . $config[0]->dns . "'>";
   $r .= "</td>";
   $r .= "</tr>";

   $r .= "<tr>";
   $r .= "<td>";
   $r .= "Nome do Site";
   $r .= "</td>";
   $r .= "<td colspan='3'>";
   $r .= "<input type='text' id='marca' name='marca' value='"  . $config[0]->marca . "'>";
   $r .= "</td>";
   $r .= "</tr>";

   $r .= "<tr>";
   $r .= "<td>";
   $r .= "Tema";
   $r .= "</td>";
   $r .= "<td colspan='3'>";
   $r .= "<input type='text' id='tema' name='tema' disabled value='"  . str_replace("tema_","",$config[0]->tema) . "'>";
   $r .= "</td>";
   $r .= "</tr>";

   $r .= "<tr>";
   $r .= "<td>";
   $r .= "Ordem Menu Catalogo";
   $r .= "</td>";
   $r .= "<td colspan='3'>";
   $r .= config_ordem_catalogo($config);
   $r .= "</td>";
   $r .= "</tr>";
   $r .= "</table>";

   return $r;

}


function config_catalogo($config) {

   $Config = new ConfigModel();
   $config = $Config->readItensXmlConfig();

   $checked = "";

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

   if ($config[0]->cat_vitrine == "1") {
      $checked = "checked";
   }
   $r .= "<input type='checkbox' name='cat_vitrine' $checked><p>Vitrine na Home</p>";
   $checked = "";



   return $r;
}

function updateItem() {

   $Config = new ConfigModel();
   $Config->updateItemXmlConfig("email_destinatario", $_POST['email_destinatario']);      
   // $Config->updateItemXmlConfig("aextensao1", str_replace(".", "", $_POST['aextensao1']));
   //$Config->updateItemXmlConfig("aextensao2", str_replace(".", "", $_POST['aextensao2']));
   //$Config->updateItemXmlConfig("aextensao3", str_replace(".", "", $_POST['aextensao3']));
   //$Config->updateItemXmlConfig("cat_botao_comprar", $_POST['cat_botao_comprar']);
   $Config->updateItemXmlConfig("marca", $_POST['marca']);
   $Config->updateItemXmlConfig("ordem_menu_catalogo", $_POST['ordem_menu_catalogo']);

   $Config->updateItemXmlConfig("itens_catalogo", $_POST['itens_catalogo']);
   $Config->updateItemXmlConfig("itens_galeria", $_POST['itens_galeria']);
   $Config->updateItemXmlConfig("itens_glossario", $_POST['itens_glossario']);
   $Config->updateItemXmlConfig("itens_links", $_POST['itens_links']);
   $Config->updateItemXmlConfig("itens_sliders", $_POST['itens_sliders']);
   $Config->updateItemXmlConfig("itens_textos", $_POST['itens_textos']);
   $Config->updateItemXmlConfig("itens_textos_accordion", $_POST['itens_textos_accordion']);
   $Config->updateItemXmlConfig("itens_textos_empilhados", $_POST['itens_textos_empilhados']);
   $Config->updateItemXmlConfig("itens_blog", $_POST['itens_blog']);
   $Config->updateItemXmlConfig("itens_usuarios", $_POST['itens_usuarios']);
   $Config->updateItemXmlConfig("itens_videosfacebook", $_POST['itens_videosfacebook']);
   $Config->updateItemXmlConfig("itens_videosyoutube", $_POST['itens_videosyoutube']);
   $Config->updateItemXmlConfig("itens_videosyoutubechannel", $_POST['itens_videosyoutubechannel']);
   $Config->updateItemXmlConfig("itens_cadastros", $_POST['itens_cadastros']);
   $Config->updateItemXmlConfig("itens_imoveis", $_POST['itens_imoveis']);
   $Config->updateItemXmlConfig("itens_downloads", $_POST['itens_downloads']);

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

   $dr[0][1] = "Orçamento";
   $dr[1][1] = "Compra";
   $dr[2][1] = "Catalogo";

   $r .= "<select id='cat_botao_comprar' name='cat_botao_comprar'>";

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
            $resizeObj->saveImage('./../imagens/' . $galeria[$i][5], 100);
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

   if (isset($_POST['crop_imagem_slider_logos'])) {
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


function configPaginacao($config) {

   $r="";

   $r = "<h2>Paginação dos Módulos</h2>";

   $r .= "<table class='tabela-1'>";

   $r .= "<tr>";
   $r .= "<td>";
   $r .= "Módulo Catalogo";
   $r .= "</td>";
   $r .= "<td>";
   $r .= paginacao('itens_catalogo', $config[0]->itens_catalogo);          
   $r .= "</td>";
   $r .= "</tr>"; 

   $r .= "<tr>";
   $r .= "<td>";
   $r .= "Blog";
   $r .= "</td>";
   $r .= "<td>";
   $r .= paginacao('itens_blog', $config[0]->itens_links);          
   $r .= "</td>";
   $r .= "</tr>"; 

   $r .= "<tr>";
   $r .= "<td>";
   $r .= "Módulo Downloads";
   $r .= "</td>";
   $r .= "<td>";
   $r .= paginacao('itens_downloads', $config[0]->itens_downloads);          
   $r .= "</td>";
   $r .= "</tr>"; 

   $r .= "<tr>";
   $r .= "<td>";
   $r .= "Módulo Galeria";
   $r .= "</td>";
   $r .= "<td>";
   $r .= paginacao('itens_galeria', $config[0]->itens_galeria);          
   $r .= "</td>";
   $r .= "</tr>"; 

   $r .= "<tr>";
   $r .= "<td>";
   $r .= "Módulo Glossário";
   $r .= "</td>";
   $r .= "<td>";
   $r .= paginacao('itens_glossario', $config[0]->itens_glossario);          
   $r .= "</td>";
   $r .= "</tr>"; 

   $r .= "<tr>";
   $r .= "<td>";
   $r .= "Módulo Links";
   $r .= "</td>";
   $r .= "<td>";
   $r .= paginacao('itens_links', $config[0]->itens_links);          
   $r .= "</td>";
   $r .= "</tr>"; 

   $r .= "<tr>";
   $r .= "<td>";
   $r .= "Módulo Sliders";
   $r .= "</td>";
   $r .= "<td>";
   $r .= paginacao('itens_sliders', $config[0]->itens_sliders);          
   $r .= "</td>";
   $r .= "</tr>"; 

   $r .= "<tr>";
   $r .= "<td>";
   $r .= "Módulo Blog";
   $r .= "</td>";
   $r .= "<td>";
   $r .= paginacao('itens_blog', $config[0]->itens_blog);         
   $r .= "</td>";
   $r .= "</tr>"; 

   $r .= "<tr>";
   $r .= "<td>";
   $r .= "Módulo Textos Links";
   $r .= "</td>";
   $r .= "<td>";
   $r .= paginacao('itens_textos', $config[0]->itens_textos);          
   $r .= "</td>";
   $r .= "</tr>";      

   $r .= "<tr>";
   $r .= "<td>";
   $r .= "Módulo Textos Accordion";
   $r .= "</td>";
   $r .= "<td>";
   $r .= paginacao('itens_textos_accordion', $config[0]->itens_textos_accordion);         
   $r .= "</td>";
   $r .= "</tr>"; 

   $r .= "<tr>";
   $r .= "<td>";
   $r .= "Módulo Textos Empilhados";
   $r .= "</td>";
   $r .= "<td>";
   $r .= paginacao('itens_textos_empilhados', $config[0]->itens_textos_empilhados);         
   $r .= "</td>";
   $r .= "</tr>"; 

   $r .= "<tr>";
   $r .= "<td>";
   $r .= "Módulo Usuarios";
   $r .= "</td>";
   $r .= "<td>";
   $r .= paginacao('itens_usuarios', $config[0]->itens_usuarios);          
   $r .= "</td>";
   $r .= "</tr>"; 

   $r .= "<tr>";
   $r .= "<td>";
   $r .= "Módulo Videos Facebook";
   $r .= "</td>";
   $r .= "<td>";
   $r .= paginacao('itens_videosfacebook', $config[0]->itens_videosfacebook);          
   $r .= "</td>";
   $r .= "</tr>"; 

   $r .= "<tr>";
   $r .= "<td>";
   $r .= "Módulo Videos Youtube";
   $r .= "</td>";
   $r .= "<td>";
   $r .= paginacao('itens_videosyoutube', $config[0]->itens_videosyoutube);          
   $r .= "</td>";
   $r .= "</tr>"; 

   $r .= "<tr>";
   $r .= "<td>";
   $r .= "Módulo Videos Youtube Channel";
   $r .= "</td>";
   $r .= "<td>";
   $r .= paginacao('itens_videosyoutubechannel', $config[0]->itens_videosyoutubechannel);          
   $r .= "</td>";
   $r .= "</tr>"; 

   $r .= "<tr>";
   $r .= "<td>";
   $r .= "Módulo Cadastros";
   $r .= "</td>";
   $r .= "<td>";
   $r .= paginacao('itens_cadastros', $config[0]->itens_cadastros);          
   $r .= "</td>";
   $r .= "</tr>";

   $r .= "<tr>";
   $r .= "<td>";
   $r .= "Módulo Imoveis";
   $r .= "</td>";
   $r .= "<td>";
   $r .= paginacao('itens_imoveis', $config[0]->itens_imoveis);          
   $r .= "</td>";
   $r .= "</tr>"; 

   $r .= "<tr>";
   $r .= "<td>";
   $r .= "Módulo Downloads";
   $r .= "</td>";
   $r .= "<td>";
   $r .= paginacao('itens_downloads', $config[0]->itens_downloads);          
   $r .= "</td>";
   $r .= "</tr>"; 

   $r .= "</table>";

   return $r;
}

function paginacao($modulo, $valor){
   $r = "";
   $dr = array();

   for($i=0; $i<1000; $i++) {
      $dr[$i][0] = $i;
   }

   for($i=0; $i<1000; $i++) {
      $dr[$i][1] = $i;
   }

   $r .= "<select name='" . $modulo. "'>";

   for ($i=0; $i < count($dr); $i++) {

      $r .= $dr[$i][1];
      if($dr[$i][0] == $valor)
      {
         $r .= "<option value='". $dr[$i][0] ."' selected>". $dr[$i][1] ."</option>";
      }
      else
      {
         $r .= "<option value='". $dr[$i][0] ."'>". $dr[$i][1] ."</option>";
      }
   }

   $r .= "</select>";

   return $r;
}

function config_ordem_catalogo($config) {

   $valor = $config[0]->ordem_menu_catalogo;          

   $r = "";
   $dr = array();
   $dr[0][0] = "id";
   $dr[1][0] = "titulo";
   $dr[2][0] = "ordem";

   $dr[0][1] = "Id";
   $dr[1][1] = "Alfabética";
   $dr[2][1] = "Manual";

   $ordem = "<select id='ordem_menu_catalogo' name='ordem_menu_catalogo'>";

   for ($i = 0; $i < count($dr); $i++) {

      $ordem .= $dr[$i][1];
      if ($dr[$i][0] == $valor) {
         $ordem .= "<option value='" . $dr[$i][0] . "' selected>" . $dr[$i][1] . "</option>";
      } else {
         $ordem .= "<option value='" . $dr[$i][0] . "'>" . $dr[$i][1] . "</option>";
      }
   }

   $ordem .= "</select>";
   
   $r .= $ordem;

   return $r;
}