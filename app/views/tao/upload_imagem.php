<?php

$config_site = readItensXmlConfig();

$w_sliders = $config_site[0]->crop_imagem_w_slider+0;
$h_sliders = $config_site[0]->crop_imagem_h_slider+0;

$w_sliders_celular = $config_site[0]->crop_imagem_w_sliderp+0;
$h_sliders_celular = $config_site[0]->crop_imagem_h_sliderp+0;

$w_catalogo = $config_site[0]->crop_imagem_w_catalogo+0;
$h_catalogo = $config_site[0]->crop_imagem_h_catalogo+0;
$w_catalogop = $config_site[0]->crop_imagem_w_catalogop+0;
$h_catalogop = $config_site[0]->crop_imagem_h_catalogop+0;

$w_galeria = $config_site[0]->crop_imagem_w_galeria+0;
$h_galeria = $config_site[0]->crop_imagem_h_galeria+0;
$w_galeriap = $config_site[0]->crop_imagem_w_galeriap+0;
$h_galeriap = $config_site[0]->crop_imagem_h_galeriap+0;

$w_imoveis = $config_site[0]->crop_imagem_w_imoveis+0;
$h_imoveis = $config_site[0]->crop_imagem_h_imoveis+0;
$w_imoveisp = $config_site[0]->crop_imagem_w_imoveisp+0;
$h_imoveisp = $config_site[0]->crop_imagem_h_imoveisp+0;

$erro = null;
$nomeAleatorio = "";
$dir=$_GET["dir"];

$extensoes = array(".jpg");
$caminho = "../../../imagens/";
$caminho = "../../../imagens/";
$caminhop = "../../../imagens/mini_";

if (isset($_FILES['file-upload'])) {
  $nome = $_FILES['file-upload']['name'];
  $temp = $_FILES['file-upload']['tmp_name'];
  if (!in_array(strtolower(strrchr($nome, ".")), $extensoes)) {
    $erro = 'Extensão inválida! Apenas jpg';
  }
  if (!$erro) {

    $comAcentos = array('à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ü', 'ú', 'ÿ', 'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'O', 'Ù', 'Ü', 'Ú');
    $semAcentos = array('a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'y', 'A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'N', 'O', 'O', 'O', 'O', 'O', '0', 'U', 'U', 'U');

    $nomeAleatorio = date("dmy") . date("hisa") . date("l") . strrchr($nome, ".");
    $nomeAleatorio = str_replace($comAcentos,$semAcentos,$nomeAleatorio);
    $nomeAleatorio = str_replace(" ","", $nomeAleatorio);
    $nomeAleatorio = str_replace("(","y", $nomeAleatorio);
    $nomeAleatorio = str_replace(")","y", $nomeAleatorio);
    $nomeAleatorio = str_replace("JPG","jpg", $nomeAleatorio);
    $nomeAleatorio = trim($nomeAleatorio);
    $nomeAleatorio = strtolower($nomeAleatorio);

    if (!move_uploaded_file($temp, $caminho . $nomeAleatorio)) {
      $erro = 'Não foi possível anexar o arquivo';
    } else {

      echo strtolower($nomeAleatorio);

      list($width, $height, $type, $attr) = getimagesize($caminho . $nomeAleatorio);

      if($_GET["dir"] == "conteudo") {
        if($width > 800) {
         $prop = $width / 800;
         $w = 800;
         $h = $height / $prop;
         $resizeObj = new resize($caminho . $nomeAleatorio);
         $resizeObj -> resizeImage($w, $h, 'crop');
         $resizeObj -> saveImage($caminho . $nomeAleatorio, 100);
       }
     }

   if($_GET["dir"] == "sliders") {

     $w = $w_sliders;
     $h = $h_sliders;

     if($width > $w_sliders) {
       $resizeObj = new resize($caminho . $nomeAleatorio);
       $resizeObj -> resizeImage($w, $h, 'crop');
       $resizeObj -> saveImage($caminho . $nomeAleatorio, 100);
     }

   }

   if($_GET["dir"] == "sliders_celular") {

     $w = $w_sliders_celular;
     $h = $h_sliders_celular;

     if($width > $w_sliders_celular) {
       $resizeObj = new resize($caminho . $nomeAleatorio);
       $resizeObj -> resizeImage($w, $h, 'crop');
       $resizeObj -> saveImage($caminho . $nomeAleatorio, 100);
     }
     
   }

   if($_GET["dir"] == "catalogo") {

     $w = $w_catalogo;
     $h = $h_catalogo;
     $wp = $w_catalogop;
     $hp = $h_catalogop;

     if($width > $w_catalogo) {
     //$prop = $width / 800;
     //$w = 800;
     //$h = $height / $prop;
       $resizeObj = new resize($caminho . $nomeAleatorio);
       $resizeObj -> resizeImage($w, $h, 'crop');
       $resizeObj -> saveImage($caminho . $nomeAleatorio, 100);
     }

     $resizeObj = new resize($caminho . $nomeAleatorio);
     $resizeObj -> resizeImage($w_catalogop, $h_catalogop, 'crop');
     $resizeObj -> saveImage($caminhop . $nomeAleatorio, 100);
   }


   if($_GET["dir"] == "galeria") {

     $w = $w_galeria;
     $h = $h_galeria;
     $wp = $w_galeriap;
     $hp = $h_galeriap;

     if($width > $w_galeria) {
     //$prop = $width / 800;
     //$w = 800;
     //$h = $height / $prop;
       $resizeObj = new resize($caminho . $nomeAleatorio);
       $resizeObj -> resizeImage($w, $h, 'crop');
       $resizeObj -> saveImage($caminho . $nomeAleatorio, 100);
     }

     $resizeObj = new resize($caminho . $nomeAleatorio);
     $resizeObj -> resizeImage($w_galeriap, $h_galeriap, 'crop');
     $resizeObj -> saveImage($caminhop . $nomeAleatorio, 100);

   }

   if($_GET["dir"] == "imoveis") {

     $w = $w_imoveis;
     $h = $h_imoveis;
     $wp = $w_imoveisp;
     $hp = $h_imoveisp;

     if($width > $w_imoveis) {
     //$prop = $width / 800;
     //$w = 800;
     //$h = $height / $prop;
       $resizeObj = new resize($caminho . $nomeAleatorio);
       $resizeObj -> resizeImage($w, $h, 'crop');
       $resizeObj -> saveImage($caminho . $nomeAleatorio, 100);
     }

     $resizeObj = new resize($caminho . $nomeAleatorio);
     $resizeObj -> resizeImage($w_imoveisp, $h_imoveisp, 'crop');
     $resizeObj -> saveImage($caminhop . $nomeAleatorio, 100);
   }


 }

}

}


function readItensXmlConfig()
{
  $dr = array();
  $path_xml = "../../../app/config/config.xml";
  $xml = simplexml_load_file($path_xml);
  if ($xml === false) {
    echo "Failed loading XML: ";
    foreach(libxml_get_errors() as $error) {
      echo "<br>", $error->message;
    }
  } else {
    $xml=simplexml_load_file($path_xml) or die("Error: Cannot create object");

    $dr[0] = $xml->config[0];
  }

  return $dr;
} 




Class resize

{

      // *** Class variables

  private $image;

  private $width;

  private $height;

  private $imageResized;



  function __construct($fileName)

  {

        // *** Open up the file

    $this->image = $this->openImage($fileName);



          // *** Get width and height

    $this->width  = imagesx($this->image);

    $this->height = imagesy($this->image);

  }



      ## --------------------------------------------------------



  private function openImage($file)

  {

        // *** Get extension

    $extension = strtolower(strrchr($file, '.'));



    switch($extension)

    {

      case '.jpg':

      case '.jpeg':

      $img = @imagecreatefromjpeg($file);

      break;

      case '.gif':

      $img = @imagecreatefromgif($file);

      break;

      case '.png':

      $img = @imagecreatefrompng($file);

      break;

      default:

      $img = false;

      break;

    }

    return $img;

  }



      ## --------------------------------------------------------



  public function resizeImage($newWidth, $newHeight, $option="auto")

  {

        // *** Get optimal width and height - based on $option

    $optionArray = $this->getDimensions($newWidth, $newHeight, $option);



    $optimalWidth  = $optionArray['optimalWidth'];

    $optimalHeight = $optionArray['optimalHeight'];





        // *** Resample - create image canvas of x, y size

    $this->imageResized = imagecreatetruecolor($optimalWidth, $optimalHeight);

    imagecopyresampled($this->imageResized, $this->image, 0, 0, 0, 0, $optimalWidth, $optimalHeight, $this->width, $this->height);





        // *** if option is 'crop', then crop too

    if ($option == 'crop') {

      $this->crop($optimalWidth, $optimalHeight, $newWidth, $newHeight);

    }

  }



      ## --------------------------------------------------------

  

  private function getDimensions($newWidth, $newHeight, $option)

  {



   switch ($option)

   {

    case 'exact':

    $optimalWidth = $newWidth;

    $optimalHeight= $newHeight;

    break;

    case 'portrait':

    $optimalWidth = $this->getSizeByFixedHeight($newHeight);

    $optimalHeight= $newHeight;

    break;

    case 'landscape':

    $optimalWidth = $newWidth;

    $optimalHeight= $this->getSizeByFixedWidth($newWidth);

    break;

    case 'auto':

    $optionArray = $this->getSizeByAuto($newWidth, $newHeight);

    $optimalWidth = $optionArray['optimalWidth'];

    $optimalHeight = $optionArray['optimalHeight'];

    break;

    case 'crop':

    $optionArray = $this->getOptimalCrop($newWidth, $newHeight);

    $optimalWidth = $optionArray['optimalWidth'];

    $optimalHeight = $optionArray['optimalHeight'];

    break;

  }

  return array('optimalWidth' => $optimalWidth, 'optimalHeight' => $optimalHeight);

}



      ## --------------------------------------------------------



private function getSizeByFixedHeight($newHeight)

{

  $ratio = $this->width / $this->height;

  $newWidth = $newHeight * $ratio;

  return $newWidth;

}



private function getSizeByFixedWidth($newWidth)

{

  $ratio = $this->height / $this->width;

  $newHeight = $newWidth * $ratio;

  return $newHeight;

}



private function getSizeByAuto($newWidth, $newHeight)

{

  if ($this->height < $this->width)

        // *** Image to be resized is wider (landscape)

  {

    $optimalWidth = $newWidth;

    $optimalHeight= $this->getSizeByFixedWidth($newWidth);

  }

  elseif ($this->height > $this->width)

        // *** Image to be resized is taller (portrait)

  {

    $optimalWidth = $this->getSizeByFixedHeight($newHeight);

    $optimalHeight= $newHeight;

  }

  else

        // *** Image to be resizerd is a square

  {

    if ($newHeight < $newWidth) {

      $optimalWidth = $newWidth;

      $optimalHeight= $this->getSizeByFixedWidth($newWidth);

    } else if ($newHeight > $newWidth) {

      $optimalWidth = $this->getSizeByFixedHeight($newHeight);

      $optimalHeight= $newHeight;

    } else {

            // *** Sqaure being resized to a square

      $optimalWidth = $newWidth;

      $optimalHeight= $newHeight;

    }

  }



  return array('optimalWidth' => $optimalWidth, 'optimalHeight' => $optimalHeight);

}



      ## --------------------------------------------------------



private function getOptimalCrop($newWidth, $newHeight)

{



  $heightRatio = $this->height / $newHeight;

  $widthRatio  = $this->width /  $newWidth;



  if ($heightRatio < $widthRatio) {

    $optimalRatio = $heightRatio;

  } else {

    $optimalRatio = $widthRatio;

  }



  $optimalHeight = $this->height / $optimalRatio;

  $optimalWidth  = $this->width  / $optimalRatio;



  return array('optimalWidth' => $optimalWidth, 'optimalHeight' => $optimalHeight);

}



      ## --------------------------------------------------------



private function crop($optimalWidth, $optimalHeight, $newWidth, $newHeight)

{

        // *** Find center - this will be used for the crop

  $cropStartX = ( $optimalWidth / 2) - ( $newWidth /2 );

  $cropStartY = ( $optimalHeight/ 2) - ( $newHeight/2 );



  $crop = $this->imageResized;

        //imagedestroy($this->imageResized);



        // *** Now crop from center to exact requested size

  $this->imageResized = imagecreatetruecolor($newWidth , $newHeight);

  imagecopyresampled($this->imageResized, $crop , 0, 0, $cropStartX, $cropStartY, $newWidth, $newHeight , $newWidth, $newHeight);

}



      ## --------------------------------------------------------



public function saveImage($savePath, $imageQuality="100")

{

        // *** Get extension

  $extension = strrchr($savePath, '.');

  $extension = strtolower($extension);



  switch($extension)

  {

    case '.jpg':

    case '.jpeg':

    if (imagetypes() & IMG_JPG) {

      imagejpeg($this->imageResized, $savePath, $imageQuality);

    }

    break;



    case '.gif':

    if (imagetypes() & IMG_GIF) {

      imagegif($this->imageResized, $savePath);

    }

    break;



    case '.png':

            // *** Scale quality from 0-100 to 0-9

    $scaleQuality = round(($imageQuality/100) * 9);



            // *** Invert quality setting as 0 is best, not 9

    $invertScaleQuality = 9 - $scaleQuality;



    if (imagetypes() & IMG_PNG) {

     imagepng($this->imageResized, $savePath, $invertScaleQuality);

   }

   break;



          // ... etc



   default:

            // *** No extension - No save.

   break;

 }



 imagedestroy($this->imageResized);

}





      ## --------------------------------------------------------



}

?>

