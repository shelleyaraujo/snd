<?php

class SliderLogosModel extends Model {

	function __construct()
	{
		parent::__construct();
	}

	public function readItens($config) {

		$st_query = "
		SELECT id, titulo, imagem, texto, url
		FROM sliderslogos
		ORDER BY id desc";
		
		try	{

			$dbh=getdbh();
			$stmt = $dbh->query($st_query);

			$i=0;
			$url = "#";
			$sliders = "";

			while ($row = $stmt->fetch()) {
				{

					$sliders .= "<div class='swiper-slide' id=sliderlogos". $i .">";
					$sliders .= "<a href='". $url."'>";
					$sliders .= "</span><img src='". myUrl("imagens/" . $row["imagem"]) . "' title='". $row["titulo"] ."' />";
					$sliders .= "</a>";
					$sliders .= "</div>";
					
					$i++;
				}

			}
		} catch (PDOException $e) {

		}

		return $sliders;
	} 	


	/*TAO*/


	public function getRow($id)
	{
		$st_query = "
		SELECT id, titulo, texto, imagem
		FROM sliderslogos
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
			}
		}
		catch(PDOException $e)
		{}  
		return $r;
	}


	public function update_slider($id,$titulo,$texto,$imagem)
	{
		$st_query = "
		UPDATE sliderslogos
		SET
		titulo = '$titulo',
		texto = '$texto',
		imagem = '$imagem'
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


	public function getRows($ln, $x, $y, $modulo, $ordem)
	{
		$i = 0;
		$l=0;
		$totallinhas = 0;
		$linhas = $ln;
		$paginas = 0;

		$dbh=getdbh();
		$totallinhas = current($dbh->query("select count(*) from sliderslogos")->fetch());
		$paginas = $totallinhas / $linhas;

		$r = array();   
		$i=0;
		$r[3][0] = "";

		$st_query = "
		SELECT
		id,
		dma,
		titulo,
		imagem,
		texto
		FROM sliderslogos
		ORDER BY $ordem";

		try  {
			$dbh=getdbh();
			$stmt = $dbh->query($st_query);
			while ($row = $stmt->fetch()) {
				if ($i >= $x) {
					$r[$l][0] = $row["id"];
					$r[$l][1] = $row["dma"];
					$r[$l][3] = $row["titulo"];
					$r[$l][4] = $row["imagem"];
					$r[$l][5] = $row["texto"];

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


public function delete_slider($id)
{

	$st_query = "
	DELETE FROM sliderslogos
	WHERE id = $id";
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


public function add_slider($titulo)  {
	$dma = date("Y-m-d H:i:s");
	$st_query = "
	INSERT INTO sliderslogos
	(
	dma,
	titulo
	)
	VALUES
	(
	'$dma',
	'$titulo'
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



public function getTotalRegistros() {

	$dbh=getdbh();
	$r = current($dbh->query("select count(*) from sliderslogos")->fetch());
	return $r;
}
}

?>