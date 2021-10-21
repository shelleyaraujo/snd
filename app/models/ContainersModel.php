<?php 
/*
* @author TAO 
* @version 0.1.1
*/
class ContainersModel extends Model
{
	private $in_id;
	private $titulo;
	private $classe;
	private $tipo;
	private $id_container;
	private $containervisivel;

	function __construct()
	{
		parent::__construct();
	}
	
	/**
	 * Setters e Getters da
	 * classe TelefoneModel
	 */
	public function setId( $in_id )
	{
		$this->in_id = $in_id;
		return $this;
	}
	
	public function getId()
	{
		return $this->in_id;
	}

	public function setIdContainer( $id_container )
	{
		$this->id_container = $id_container;
		return $this;
	}
	
	public function getIdContainer()
	{
		return $this->id_container;
	}
	
	public function setClasse( $classe )
	{
		$this->classe = $classe;
		return $this;
	}
	
	public function getClasse()
	{
		return $this->classe;
	}

	public function setTipo( $tipo )
	{
		$this->tipo = $tipo;
		return $this;
	}
	
	public function getTipo()
	{
		return $this->tipo;
	}
	
	public function setTitulo( $titulo )
	{
		$this->titulo = $titulo;
		return $this;
	}
	
	public function getTitulo()
	{
		return $this->titulo;
	}

	public function setContainerVisivel( $containervisivel )
	{
		$this->containervisivel = $containervisivel;
		return $this;
	}
	
	public function getContainerVisivel()
	{
		return $this->containervisivel;
	}



	public function readContainers($ordenar)
	{
		$st_query = " 
		SELECT id, titulo, classe, ordem
		FROM containers
		ORDER BY $ordenar";
		
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

	public function readItens($ordenar)
	{
		$st_query = "
		SELECT id, titulo, classe, ordem
		FROM containers
		WHERE id = $this->in_id
		ORDER BY $ordenar";
		
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

	public function updateOrdem($id, $ordem)
	{
		$st_query = "
		UPDATE containers
		SET
		ordem = $ordem
		WHERE
		id = $id";

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

public function get_titulo($id_container) {


	return $id_container;

}



	public function readContainersById($id_container)
	{
		$st_query = "
		SELECT id, titulo, classe, ordem, visivel
		FROM containers
		WHERE id = $id_container";
		
		$dr = array();	
		$r = array();
		$v = array();
		$i=0;

		try
		{
			$dbh=getdbh();
			$stmt = $dbh->query($st_query);
			while ($row = $stmt->fetch()) {
				$dr[0] = $o_ret->id;
				$dr[1] = $o_ret->titulo;
				$dr[2] = $o_ret->classe;
				$dr[3] = $o_ret->ordem;
				$dr[4] = $o_ret->visivel;
				$i++;
			}
		}
		catch(PDOException $e)
		{}	
		return $dr;
	} 	

	public function updateContainer()
	{
		if(!is_null($this->in_id))
		{
			$x=array();
			$x = $this->containervisivel;
			$st_query = "
			UPDATE containers
			SET
			titulo = '$this->titulo',
			classe = '$this->classe',
			visivel = '$this->containervisivel'
			WHERE
			id = $this->in_id";
			
			try
			{
				if($this->o_db->exec($st_query) > 0)
				{
					$this->o_db->getAttribute(PDO::ATTR_DRIVER_NAME) === 'sqlite';
				}
			}
			catch (PDOException $e)
			{
				throw $e;
			}
		}

		return false;
	}

    ## DELETE CONTAINER
	public function deleteContainer()
	{
		if(!is_null($this->in_id))
		{
			$st_query = "
			DELETE FROM	containers
			WHERE id = $this->in_id";
			
			try
			{
				if($this->o_db->exec($st_query) > 0)
				{
					$this->o_db->getAttribute(PDO::ATTR_DRIVER_NAME) === 'sqlite';
				}
			}
			catch (PDOException $e)
			{
				throw $e;
			}
		}

		return false;
	}

	public function getTotalRegistros()
	{
		$r = current($this->o_db->query("select count(*) from containers")->fetch());
		return $r;
	}

	
	public function add_container_destaque($idcontainer,$idmodulo)  {

		if($this->existe_container($idcontainer,$idmodulo) == 0) {
			$st_query = "
			INSERT INTO moduloscontainers
			(
			idcontainer,
			idmodulo
			)
			VALUES
			(
			$idcontainer,
			$idmodulo
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

}

	return false;       
} 

public function delete_container_destaque($idcontainer,$idmodulo) {

	$st_query = "
	DELETE FROM moduloscontainers
	WHERE idmodulo = $idmodulo
	AND idcontainer = $idcontainer
	";
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

public function existe_container($idcontainer,$idmodulo) {
  $dbh=getdbh();
  $r = current($dbh->query("select count(*) from moduloscontainers WHERE idcontainer = ". $idcontainer . " AND idmodulo = " . $idmodulo)->fetch());
  return $r;
}


}

?>