<?php
/*
* @author TAO 
* @version 0.1.1
*/
class PluginModel extends Model
{
	private $id;
	private $titulo;
	private $plugin;
	private $arquivo;

	function __construct()
	{
		parent::__construct();
	}
	
	/**
	 * Setters e Getters da
	 * classe TelefoneModel
	 */
	public function setId( $id )
	{
		$this->id = $id;
		return $this;
	}
	
	public function getId()
	{
		return $this->id;
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
	
	public function setPlugin( $plugin )
	{
		$this->plugin = $plugin;
		return $this;
	}
	
	public function getPlugin()
	{
		return $this->plugin;
	}

	public function setArquivo( $arquivo )
	{
		$this->arquivo = $arquivo;
		return $this;
	}
	
	public function getArquivo()
	{
		return $this->arquivo;
	}


	public function readPluginById($id)
	{
		$st_query = "
		SELECT id, titulo, plugin
		FROM plugin
		WHERE id = $id";
		
		$dr = array();	
		$r = array();
		$i=0;

		try
		{
			$dbh=getdbh();
			$stmt = $dbh->query($st_query);
			while ($row = $stmt->fetch()) {
				$dr[0] = $row["id"];
				$dr[1] = $row["titulo"];
				$dr[2] = $row["plugin"];
				$i++;
			}
		}
		catch(PDOException $e)
		{}	
		return $dr;
	} 	
	
	public function readItens()
	{
		$st_query = "
		SELECT id,
		titulo,
		plugin
		FROM plugin
		ORDER BY titulo";

		$r = array();   
		$r = array();
		$i=0;

		try
		{
			$dbh=getdbh();
			$stmt = $dbh->query($st_query);
			while ($row = $stmt->fetch()) {
				$r[$i][0] = $row["id"];
				$r[$i][1] = $row["titulo"];
				$r[$i][2] = $row["plugin"];
				$i++;
			}
		}
		catch(PDOException $e)
		{}  
		return $r;
	} 

	public function existePlugin($titulo)
	{
		$r = current($this->o_db->query("select count(*) from plugin WHERE titulo = '". $titulo ."' ")->fetch());
		return $r;
	}

	public function addPlugin()
	{
		$st_query = "
		INSERT INTO	plugin
		(
		titulo, plugin
		)
		VALUES
		(
		'$this->titulo',
		'$this->plugin'		
	);";

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
	return false;				
}

public function deletePlugin()
{
	if(!is_null($this->id))
	{
		$st_query = "
		DELETE FROM	plugin
		WHERE id = $this->id";

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

public function update_plugin()
{
	$st_query = "
	UPDATE plugin
	SET
	titulo = '$this->titulo'
	WHERE
	id = $this->id";


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

public function update_arquivo($arquivo)
{
	$st_query = "
	UPDATE plugin
	SET
	plugin = '$arquivo'
	WHERE
	id = $this->id";

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




public function delete_plugin()
{

	$st_query = "
	DELETE FROM plugin
	WHERE id = $this->id";
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



public function add_plugin()  {

	$st_query = "
	INSERT INTO plugin
	(
	titulo
	)
	VALUES
	(
	'$this->titulo'
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