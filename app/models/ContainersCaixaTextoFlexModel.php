<?php
/*
* @author TAO  
* @version 0.1.1
*/
class ContainersCaixaTextoFlexModel extends Model
{
	private $in_id;

	function __construct()
	{
		parent::__construct();
	}

	public function setId( $in_id )
	{
		$this->in_id = $in_id;
		return $this;
	}
	
	public function getId()	{
		return $this->in_id;
	}
	
	public function readContainersById() {
		$st_query = "
		SELECT id, titulo, classe, ordem
		FROM containerscaixatextoflex
		WHERE id = $this->in_id";
		
		$dr = array();	

		try
		{
			$o_data = $this->o_db->query($st_query);
			$r = array();
			while($o_ret = $o_data->fetchObject())	{
				$dr[0] = $o_ret->id;
				$dr[1] = $o_ret->titulo;
				$dr[2] = $o_ret->classe;
				$dr[3] = $o_ret->ordem;
			}
		}
		catch(PDOException $e)
		{}	
		return $dr;
	} 	


	public function readContainerById() {
		$st_query = "
		SELECT id, titulo, classe, ordem
		FROM containerscaixatextoflex
		WHERE id = $this->in_id";
		
		$dr = array();	

		try
		{
			$o_data = $this->o_db->query($st_query);
			$r = array();
			while($o_ret = $o_data->fetchObject())	{
				$dr[0] = $o_ret->id;
				$dr[1] = $o_ret->titulo;
				$dr[2] = $o_ret->classe;
				$dr[3] = $o_ret->ordem;
			}
		}
		catch(PDOException $e)
		{}	
		return $dr;
	} 	

	/*TAO*/

	public function getRows() {
		$st_query = "
		SELECT id, titulo, classe, ordem
		FROM containerscaixatextoflex
		ORDER BY titulo";
		$dr = array();	
		$r = array();
		$i=0;

		try
		{
			$dbh=getdbh();
			$stmt = $dbh->query($st_query);
			while ($row = $stmt->fetch()) {
				$dr[$i][0] = $row["id"];
				$dr[$i][1] = $row["titulo"];
				$dr[$i][2] = $row["classe"];
				$dr[$i][3] = $row["ordem"];
				$i++;
			}
		}
		catch(PDOException $e)
		{}	
		return $dr;
	} 	

	/* TAO */

	
	public function readContainers($ordenar)
	{
		$st_query = "
		SELECT id, titulo, idmodulo, classe, ordem
		FROM containerscaixatextoflex
		ORDER BY titulo";
		
		$dr = array();	
		$r = array();
		$i=0;

		try
		{
			$dbh=getdbh();
			$stmt = $dbh->query($st_query);
			while ($row = $stmt->fetch()) {
				$dr[$i][0] = $row["id"];
				$dr[$i][1] = $row["titulo"];
				$dr[$i][2] = $row["idmodulo"];
				$dr[$i][3] = $row["classe"];
				$dr[$i][4] = $row["ordem"];
				$i++;
			}
		}
		catch(PDOException $e)
		{}	
		return $dr;
	} 

	public function add_container($titulo)  {

		$dbh=getdbh();
		$totallinhas = current($dbh->query("select count(*) from containerscaixatextoflex")->fetch());

		$st_query = "
		INSERT INTO containerscaixatextoflex
		(
		titulo,
		classe,
		ordem
		)
		VALUES
		(
		'$titulo',
		'100',
		ordem = $totallinhas + 1
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


public function delete_container($id)
{

	$st_query = "
	DELETE FROM containerscaixatextoflex
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


public function getRow($id)
{
	$st_query = "
	SELECT id, titulo, classe
	FROM containerscaixatextoflex 
	WHERE id = $id";
	$r = array(); 

	try
	{
		$dbh=getdbh();
		$stmt = $dbh->query($st_query);
		while ($row = $stmt->fetch()) {
			$r[0] = $row["id"];
			$r[1] = $row["titulo"];
			$r[2] = $row["classe"];
		}
	}
	catch(PDOException $e)
	{}  
	$r = str_replace("-iframe","<iframe",$r);
	$r = str_replace("-/iframe-","></iframe>",$r);
	return $r;
}



public function update_container($id,$titulo,$classe)
{
	$st_query = "
	UPDATE containerscaixatextoflex
	SET
	titulo = '$titulo',
	classe = '$classe'
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


public function add_conteudo($idcontainerscaixatextoflex)  {
	$dma = date("Y-m-d H:i:s");
	$st_query = "
	INSERT INTO conteudos
	(
	dma,
	idcontainerscaixatextoflex,
	titulo,
	classe,
	texto
	)
	VALUES
	(
	'$dma',
	$idcontainerscaixatextoflex,
	'Titulo do conteúdo',
	'25',
	'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
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


	public function getRowsConteudos($idcontainerscaixatextoflex) {
		$st_query = "
		SELECT id, titulo, classe, texto
		FROM conteudos
		WHERE idcontainerscaixatextoflex = $idcontainerscaixatextoflex
		ORDER BY ordem";
		$dr = array();	
		$r = array();
		$i=0;

		try
		{
			$dbh=getdbh();
			$stmt = $dbh->query($st_query);
			while ($row = $stmt->fetch()) {
				$dr[$i][0] = $row["id"];
				$dr[$i][1] = $row["titulo"];
				$dr[$i][2] = $row["classe"];
				$dr[$i][3] = $row["texto"];
				$i++;
			}
		}
		catch(PDOException $e)
		{}	
		return $dr;
	} 	

public function update_conteudo($id,$titulo,$classe,$texto)
{
  $st_query = "
  UPDATE conteudos
  SET
  titulo = '$titulo',
  texto = '$texto',
  classe = '$classe'
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


}


?>