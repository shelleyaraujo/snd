<?php
 
class Imagens2Model extends Model {

	function __construct()
	{
		parent::__construct();
	}
 
	public function readItens($config,$controle) {

		if($controle == "main") {
			$controle = "Index";
		}

		if($controle == "") {
			$controle = "Index";
		}		

		$expandido=$config[0]->banner_expandido;
		$st_query = "
		SELECT id, titulo, imagem, texto, classe
		FROM sliders 
		WHERE visivel LIKE '%%$controle%%'
		ORDER BY ordem";
		
		try	{
			$dbh=getdbh();
			$stmt = $dbh->query($st_query);

			$i=0;

			$sliders = "";
			$classe = "";

			while ($row = $stmt->fetch()) {
				{
					if($row["texto"] != "")
					{
						$classe = $row["classe"];
					}

					$sliders .= "<div id=slider". $i .">";
					$sliders .= "<div class='". $classe ."'>";
					$sliders .= $row["texto"];
					if(isset($_SESSION["credencial"])) {
						if($_SESSION["credencial"] == "0" || $_SESSION["credencial"] == "1") {
							$sliders .= "<p style='border:500px!importa'>";
							$sliders .= "<a href='". myUrl("tao/editar_slider/?idslider=") . $row["id"] ."' class='editar'>Editar Slider</a>";
							$sliders .= "</p>";
						}
					}
		 			$sliders .= "</div>";
					$sliders .= "<img src='". myUrl("imagens/sliders/" . $row["imagem"]) ."' alt='". $row["titulo"] ."' title='". $row["titulo"] ."' style='width:100%;height:auto' width='1400' height='350' />";
					$sliders .= "</div>";

					$i++;
				}

			}
		} catch (PDOException $e) {

		}

		switch ($config[0]->banner_expandido) {
			case '1':
			$expandido="expanded";
			break;

			default:
			$expandido="not-expanded";
			break;
		}

		$r  = "<div class='". $expandido ."'>";
		$r .= "<div id='mySwipe' class='swipe'>";
		$r .= "<div class='swipe-wrap'>";
		$r .= $sliders;
		$r .= " </div>";
		$r .= "</div>";
		$r .= "</div>";

		return $r;
	} 	


/*TAO*/


public function getRow($id)
{
  $st_query = "
  SELECT id, titulo, texto, imagem, visivel
  FROM sliders 
  WHERE id = $id";
  $r = array(); 

  try
  {
   $dbh=getdbh();
   $stmt = $dbh->query($st_query);
   while ($row = $stmt->fetch()) {
    $r[0] = $row["id"];
    $r[1] = $row["titulo"];
    $r[2] = $row["texto"];
    $r[3] = $row["imagem"];
    $r[4] = $row["visivel"];

  }
}
catch(PDOException $e)
{}  
return $r;
}


public function update_slider($id,$titulo,$texto,$imagem,$visivel)
{
  $st_query = "
  UPDATE sliders
  SET
  titulo = '$titulo',
  texto = '$texto',
  imagem = '$imagem',
  visivel = '$visivel'
  WHERE
  id = $id
  ";  

  $dbh=getdbh();
  $stmt = $dbh->prepare($st_query);
  try
  {
    $stmt->execute();
  }
  catch (PDOException $e)
  {
    throw $e;
  }

  return false;
}


public function get_rows($ln, $x, $y, $modulo, $ordem)
{
  $i = 0;
  $l=0;
  $totallinhas = 0;
  $linhas = $ln;
  $paginas = 0;

  $dbh=getdbh();
  $totallinhas = current($dbh->query("select count(*) from imagens WHERE modulo = '". $modulo ."' ")->fetch());
  $paginas = $totallinhas / $linhas;

  $r = array();   
  $i=0;
  $r[3][0] = "";

  $st_query = "
  SELECT
  id,
  dma,
  imagem
  FROM imagens
  WHERE modulo = '". $modulo ."'
  ORDER BY $ordem";

  try  {
   $dbh=getdbh();
   $stmt = $dbh->query($st_query);
   while ($row = $stmt->fetch()) {
    if ($i >= $x) {
      $r[$l][0] = $row["id"];
      $r[$l][1] = $row["dma"];
      $r[$l][2] = $row["imagem"];
      $l++;
    }
    $i++;
    if ($i == $x + $linhas) {
       $l = $l + 1; // for create pages
       break;
     }

   }

 }
 catch(PDOException $e)
 {}  

 $r[$l][0] = "";
 $r[$l][1] = "";
 $r[$l][2] = "";
 $r[$l][3] = "";
 $r[$l][4] = "";
 $r[$l][5] = "";
 $r[$l][6] = "";

 $r[$l][1] .= "<ul class='paginacao'>";

 $p = $y;
 if ($y > 0) {
  $a = $y * $linhas;
  $a = $a - $linhas;
  $b = $y - 10;
  $r[$l][1] .= "<li class='pag-prev'><a href='" . 
  $modulo . "?x=" . $a . "&y=" . $b . "'>...</a></li>";
}
for ($i = 1; $i < 11; $i++) {
  $p++;
  $x = $p * $linhas - $linhas;
  $r[$l][0] = "#p#";
  if ($x < $totallinhas) {
   $r[$l][1] .= "<li class='pag-now'>";
   $r[$l][1] .= "<a href='" . 
   $modulo . "?x=" . $x . "&y=" . $y . "'>" . $p . "</a>";
   $r[$l][1] .= "</li>";
 }
}

 // $r[$l][2] .= "<div class='paginacao-itens'>" .$totallinhas . " itens</div>"; // $paginas;

if ($x < $totallinhas) {
  $x = $x + $linhas;
  $y = $y + 10;
  $r[$l][1] .= "<li class='pag-next'>&nbsp;<a href='" . 
  $modulo . "?x=" . $x . "&y=" . $y . "'>...</a></li>";
}
        // and flow rows

$r[$l][1] .= "</ul>" . $r[$l][2];

if($totallinhas <= $ln)
{
  $r[$l][1] = "";
}

return $r;
}  


public function delete_imagem($imagem)
{
  $st_query = "
  DELETE FROM imagens
  WHERE imagem = '$imagem' ";
  $dbh=getdbh();
  try
  {
    if($dbh->exec($st_query) > 0)
    {
      $dbh->getAttribute(PDO::ATTR_DRIVER_NAME) === 'sqlite';
    }
  }
  catch (PDOException $e)
  {
    throw $e;
  }

  return false;
}


public function add_imagem($imagem,$modulo)  {
  $dma = date("Y-m-d H:i:s");
  $st_query = "
  INSERT INTO imagens
  (
  dma,
  modulo,
  imagem
  )
  VALUES
  (
  '$dma',
  '$modulo',
  '$imagem'
);";

$dbh=getdbh();

try
{
  if($dbh->exec($st_query) > 0)
  {
    $dbh->getAttribute(PDO::ATTR_DRIVER_NAME) === 'sqlite';
  }
}
catch (PDOException $e)
{
  throw $e;
}
return false;       
} 



}

?>