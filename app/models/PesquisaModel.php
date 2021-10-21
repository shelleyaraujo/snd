<?php
class PesquisaModel extends Model
{
	function __construct()
	{
		parent::__construct();
	}

	public function pesquisar($x, $y, $busca) {

		$dbh=getdbh();

		$busca=str_replace("  ", " ", $busca);

		$st_query = "SELECT id, idcategoria, titulo, texto, modulo 
		FROM modulos AS m 
		WHERE titulo LIKE '%$busca%' OR texto LIKE '%%$busca%%'
		UNION 
		SELECT id, idcategoria, titulo, descricao as texto, id as modulo
		FROM catalogo 
		WHERE titulo LIKE '%$busca%' OR descricao LIKE '%$busca%'		
		UNION 
		SELECT id, idcategoria, titulo, texto, id as modulo
		FROM institucional 
		WHERE titulo LIKE '%$busca%' OR texto LIKE '%$busca%'
		UNION 
		SELECT id, idcategoria, titulo, texto, id as modulo
		FROM blog 
		WHERE titulo LIKE '%$busca%' OR texto LIKE '%$busca%'
		UNION 
		SELECT id, idcategoria, titulo, descricao as texto, id as modulo
		FROM galeria 
		WHERE titulo LIKE '%$busca%' OR descricao LIKE '%$busca%'
		";

		$r = "";  

		$i=0;
		$cat=array();
		$modulo="";
		$url= "";
		$doc = new DOMDocument();
		$texto="";
		$elements = "";
		$imagem="";
		$im=0;
		$img="";

		try  {

			$stmt = $dbh->query($st_query);

			while ($row = $stmt->fetch()) {

						
				if($i >= $x && $i <= $y) {

					$r .= ""; 

					$modulo = strtolower($row["modulo"]);
					$url = myUrl() . strtolower($row["modulo"]) . "/0/" .$row["id"] ."/" . $row["id"] . "/" . str_replace(" ", "+", $row["titulo"]);


					$cat = $this->get_categoria($row["idcategoria"]);

					if($row["idcategoria"] == $cat["id"]) {
						$modulo = strtolower($cat["modulo"]);

						
						switch ($modulo) {
							case 'catalogo':
							$url = myUrl() . "catalogo/detalhes/0/" .$row["idcategoria"] ."/" . $row["id"]. "/" . str_replace(" ", "+", $row["titulo"]);
							$img=$this->set_imagem($modulo,$imagem,$row["id"]);
							break;
							case 'institucional':
							$url = myUrl() . "institucional/0/" .$row["idcategoria"] ."/" . $row["id"]. "/" . str_replace(" ", "+", $row["titulo"]) . "?idtexto=" .  $row["id"];
							break;	

							case 'blog':
							$url = myUrl() . "blog/0/" .$row["idcategoria"] ."/" . $row["id"]. "/" . str_replace(" ", "+", $row["titulo"]) . "?idtexto=" .  $row["id"];
							break;	
							case 'galeria':
							$url = myUrl() . "galeria/0/" .$row["idcategoria"] ."/" . $row["id"]. "/" . str_replace(" ", "+", $row["titulo"]) . "?idtexto=" .  $row["id"];
							break;
							case 'pad':
							$url = myUrl() . "Pad/index/0/" .$row["idcategoria"] ."/0/" . str_replace(" ", "+", $row["titulo"]) . "?idtexto=" .  $row["id"];
							break;
							default:
							$url = myUrl();
							break;
						}				
					}

					if($row["texto"] != "") {

						$r .= $this->catch_that_image($row["texto"]);
					}
			

					$r 
					.= "<div>"
					. "<a href='" . $url  . "'>" 
					. $img
					."<h2>" . $row["titulo"]  . "</h2>" 
					. "<p>" . strip_tags(substr($row["texto"], 0, 200)) . "..."  . "</p>" 
					. "</a>"
					. "</div>";	

					$imagem="";			

				} 

				$i++;
			}
		}
		catch(PDOException $e)
		{

		}  


		return $r;

	} 


function catch_that_image($conteudo) {

  $doc = new DOMDocument();
   $imagem = "";
   $i=0;

  if($conteudo != "") {
    $doc->loadHTML($conteudo);
    $elements = $doc->getElementsByTagName('img');
    foreach($elements as $element) {
      if($i == 0) {
        $imagem = $element->getAttribute('src');
      } 
      $i++;
    }
  }

  $img = pathinfo($imagem);
  $imagem = $img['basename'];

  if($imagem != "") {
    $imagem = "<img src='" . myUrl("ImageImagens.php?imagem=" . $imagem . "&w=100&h=50&dir=conteudo") . "'>";

  }



  return $imagem;
  echo $imagem;
}

	public function set_imagem($modulo, $img,$id) {

		$dir="conteudo";

		switch ($modulo) {
			case 'catalogo':
			$dir = "catalogo";
			$img = $this->get_imagem_catalogo($id,$modulo);
			break;
			case 'blog':
			$dir = "conteudo";
			break;	
			case 'galeria':
			$dir = "galeria";
			break;
			case 'pad':
			$dir = "conteudo";
			break;
			default:
			$dir = "conteudo";
			break;
		}	

		$imagem = "<img src='" . myUrl("ImageImagens.php?imagem=" . $img . "&w=100&h=50&dir=" . $dir) . "'>";

		if(strpos($imagem, "imagem=&") !== false){
			$imagem = "";
		} 

		return $imagem;
	}


	public function get_imagem_catalogo($id,$modulo) {

			if($modulo="catalogo") {
		$dbh=getdbh();

		$st_query = "
		SELECT imagem
		FROM catalogoimagens WHERE idcatalogo = $id
		ORDER BY ordem
		";
		$imagem=array();
		$imagem["img"] = "";
		$i=0;
		try  {
			$stmt = $dbh->query($st_query);
			while ($row = $stmt->fetch()) {
				if($row["imagem"] != "") {
					if($i == 0) {
						$imagem["img"] = $row["imagem"];	
					}
				}
				$i++;
			}
		}
		catch(PDOException $e)
		{

		}  
		return $imagem["img"];
	}
	else {
		return "";
	}


	}


		public function get_categoria($c) {

			$dbh=getdbh();

			$st_query = "
			SELECT id, idcategoria, modulo
			FROM modulos WHERE id = $c
			";

			$r=array( "id"=>"","modulo"=>"", "titulo"=>"");

			try  {
				if($c!="") {
				$stmt = $dbh->query($st_query);
				while ($row = $stmt->fetch()) {
					$r["id"] = $row["id"];	
					$r["modulo"] = $row["modulo"];	
				}
			}
			}
			catch(PDOException $e)
			{

			}  

			return $r;
		} 

		public function read_pesquisa($x, $y, $busca) {

			$dbh=getdbh();

			$st_query = "
			SELECT id, idconteudo, titulo, modulo
			FROM modulos WHERE titulo LIKE '%%$busca%%'
			";

			$r = "";
			$catalogo = "";
			$modulos = "";  
			$imagem = "";

			$i=0;

			try  {

				$stmt = $dbh->query($st_query);
				while ($row = $stmt->fetch()) {
					if($i >= $x && $i <= $y) {
						$modulos .= "xxx<a href='". myUrl("". strtolower($row["modulo"])  ."/index/". $row["idconteudo"]  ."/". $row["id"]  ."")  ."'>" . $row["modulo"] . " -> " . $row["titulo"] . "</a>";
					}
					$i++;
				}
			}
			catch(PDOException $e)
			{

			}  

			$catalogo  = $this->read_pesquisa_catalogo($x, $y, $busca);
			$conteudos = $this->read_pesquisa_conteudo($x, $y, $busca);

			$r  = "<div>" . $catalogo . "</div>";
		//$r .= "<div>" . $modulos . "</div>";
		//$r .= "<div>" . $conteudos . "</div>";

			return $r;
		} 


		public function read_pesquisa_conteudo($x, $y, $busca) {

			$dbh=getdbh();

			$st_query = "
			SELECT id, titulo, texto
			FROM conteudos WHERE titulo LIKE '%%$busca%%'
			OR texto LIKE '%%$busca%%'
			";

			$r = "";  

			$i=0;

			try  {

				$stmt = $dbh->query($st_query);
				while ($row = $stmt->fetch()) {
					if($i >= $x && $i <= $y) {
						$r .= $this->get_pai($row["id"]) . "<br>";
					}
					$i++;
				}
			}
			catch(PDOException $e)
			{

			}  

			return $r;
		} 

		public function get_pai($idconteudo) {

			$dbh=getdbh();

			$st_query = "
			SELECT id, titulo, modulo, idconteudo
			FROM modulos WHERE idconteudo = $idconteudo
			";

			$r = "";  

			$i=0;

			try  {

				$stmt = $dbh->query($st_query);
				while ($row = $stmt->fetch()) {
					$r .= "<a href='". myUrl("". strtolower($row["modulo"])  ."/index/". $row["idconteudo"]  ."/". $row["id"]  ."")  ."'>" . $row["titulo"] . "</a>";
					$i++;
				}
			}
			catch(PDOException $e)
			{

			}  

			return $r;
		} 

		public function xxxxread_pesquisa_catalogo($x, $y, $busca) {

			$dbh=getdbh();

			$st_query = "

			SELECT
			a.id,
			a.id AS idcatalogo,
			a.idcategoria AS idcategoria,
			b.id,
			b.titulo,
			b.dma,
			a.titulo,
			a.idcategoria,
			a.dma,
			b.modulo,
			b.id AS idmodulo,
			b.idconteudo AS idconteudo,
			b.modulo AS modulo
			FROM catalogo AS a
			INNER JOIN modulos AS b ON a.idcategoria = b.id AND b.modulo = 'Catalogo'
			WHERE a.titulo LIKE '$busca%%' OR a.descricao LIKE '$busca%%' 

			";

			$r = "";  
			$imagem = "";

			$i=0;

			try  {

				$stmt = $dbh->query($st_query);
				while ($row = $stmt->fetch()) {
					if($i >= $x && $i <= $y) {
						$r .= $row["modulo"] . $row["idcatalogo"] . " - " . $row["idmodulo"] . " - " .$row["id"] . " - " . $row["titulo"] . " - idconteudo:" . $row["idconteudo"] . "<br>";
					//$r .= "<a href='" . myUrl() . "blog/index/". $row["idconteudo"] ."/". $row["id"]."/?idtexto=". $row["idblog"] . "'>" . $row["titulo"] . "<br>";
					}

					$i++;
				}
			}
			catch(PDOException $e)
			{

			}  

			return $r;
		} 



		public function read_pesquisa_catalogo($x, $y, $busca) {

			$dbh=getdbh();

			$st_query = "


			select t2.id,
			t2.idcategoria,
			t2.titulo,
			t2.modulo AS modulo,
			t2.idconteudo AS xxx,
			t2.titulotexto AS titulotexto
			from modulos t2
			where (t2.titulo LIKE '$busca%%')

			";

			$r = "";  
			$imagem = "";

			$i=0;

			try  {

				$stmt = $dbh->query($st_query);
				while ($row = $stmt->fetch()) {
					if($i >= $x && $i <= $y) {

						if($row["modulo"] == "Catalogo") {
							$r .= "<a href='". myUrl("". strtolower( str_replace("Index", "", $row["modulo"]))  ."/index/". $row["xxx"]  ."/". $row["id"]  ."")  ."'>" . $row["titulo"] . " - " . $row["titulotexto"] . "</a>";
						} else {
							$r .= "<a href='" . myUrl("catalogo/detalhes/". $this->get_id_conteudo($row["idcategoria"]) ."/".$row["idcategoria"] ."/". $row["id"]."/") ."'><img src='" . myUrl("imagens/imagem.php?&dir=catalogo&w=50&h=30&imagem=" . $this->catalogo_miniaturas($row["id"])) . "' style='padding-right:'>" . $row["titulo"] . " (" . $this->get_pai_catalogo($row["idcategoria"]) . ")<br>" . $row["titulotexto"] . "</a>";
						}
					}

					$i++;
				}
			}
			catch(PDOException $e)
			{

			}  

			return $r;
		} 

		public function read_pesquisa_blog($x, $y, $busca) {

			$dbh=getdbh();

			$st_query = "

			SELECT
			a.id,
			a.id AS idblog,
			a.texto,
			a.idcategoria AS idcategoria,
			b.id,
			b.titulo,
			b.dma,
			a.titulo,
			a.idcategoria,
			a.dma,
			b.modulo,
			b.idconteudo AS idconteudo
			FROM conteudos AS a
			INNER JOIN modulos AS b ON a.idcategoria = b.id AND b.modulo = 'Blog'
			WHERE a.titulo LIKE '$busca%%' OR a.texto LIKE '$busca%%' 
			";

			$r = "";  
			$imagem = "";

			$i=0;

			try  {

				$stmt = $dbh->query($st_query);
				while ($row = $stmt->fetch()) {
					if($i >= $x && $i <= $y) {
						$r .= "<a href='" . myUrl() . "blog/index/". $row["idconteudo"] ."/". $row["id"]."/?idtexto=". $row["idblog"] . "'>" . $row["titulo"] . "<br>";
					}

					$i++;
				}
			}
			catch(PDOException $e)
			{

			}  

			return $r;
		} 


		public function get_pesquisa_galeria($x, $y, $busca) {

			$dbh=getdbh();

			$st_query = "

			SELECT
			a.id,
			a.id AS idblog,
			a.descricao,
			a.idcategoria AS idcategoria,
			b.id,
			b.titulo,
			b.dma,
			a.titulo,
			a.idcategoria,
			a.dma,
			b.modulo,
			b.idconteudo AS idconteudo
			FROM galeria AS a
			INNER JOIN modulos AS b ON a.idcategoria = b.id AND b.modulo = 'Galeria'
			WHERE a.titulo LIKE '$busca%%' OR a.descricao LIKE '$busca%%' 

			";

			$r = "";  
			$imagem = "";

			$i=0;

			try  {

				$stmt = $dbh->query($st_query);
				while ($row = $stmt->fetch()) {
					if($i >= $x && $i <= $y) {
						$r .= "<a href='" . myUrl() . "galeria/index/". $row["idconteudo"] ."/". $row["id"]."/?idtexto=". $row["idblog"] . "'>" . $row["titulo"] . "<br>";
					}

					$i++;
				}
			}
			catch(PDOException $e)
			{

			}  

			return $r;
		} 

		public function get_pai_blog($idcategoria) {

			$dbh=getdbh();

			$st_query = "
			SELECT id
			FROM conteudos WHERE id = $idcategoria
			";

			$r = "";  

			$i=0;

			try  {

				$stmt = $dbh->query($st_query);
				while ($row = $stmt->fetch()) {
					$r .= $row["id"];
					$i++;
				}
			}
			catch(PDOException $e)
			{

			}  

			return $r;
		}


		public function get_pai_catalogo($id) {

			$dbh=getdbh();

			$st_query = "
			SELECT id, titulo, modulo, idconteudo
			FROM modulos WHERE id = $id
			";

			$r = "";  

			$i=0;

			try  {

				$stmt = $dbh->query($st_query);
				while ($row = $stmt->fetch()) {
					$r .= $row["titulo"];
					$i++;
				}
			}
			catch(PDOException $e)
			{

			}  

			return $r;
		}

		public function get_id_conteudo($id) {

			$dbh=getdbh();

			$st_query = "
			SELECT id, titulo, modulo, idconteudo
			FROM modulos WHERE id = $id
			";

			$r = "";  

			$i=0;

			try  {

				$stmt = $dbh->query($st_query);
				while ($row = $stmt->fetch()) {
					$r .= $row["idconteudo"];
					$i++;
				}
			}
			catch(PDOException $e)
			{

			}  

			return $r;
		}

		public function catalogo_miniaturas($idcatalogo)
		{
			$st_query = "
			SELECT imagem
			FROM catalogoimagens
			WHERE idcatalogo = $idcatalogo";

			$r = array();
			$i=0;
			$dbh=getdbh();

			try  {

				$stmt = $dbh->query($st_query);
				while ($row = $stmt->fetch()) {
					$r[0] = $row["imagem"];
					$i++;
				}
			}
			catch(PDOException $e)
			{

			} 

			if(isset($r[0])) {
				return $r[0];
			} else{
				return "";
			}
		} 

	}

	?>