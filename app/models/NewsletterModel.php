<?php

class NewsletterModel extends PersistModelAbstract
{
	private $id;
	private $dma;
	private $nome;
	private $email;
	private $enviado;

	function __construct()
	{
		parent::__construct();
	}
	
	public function setId( $id )
	{
		$this->id = $id;
		return $this;
	}

	public function getId()
	{
		return $this->id;
	}	

	public function setNome( $nome )
	{
		$this->nome = $nome;
		return $this;
	}

	public function getNome()
	{
		return $this->nome;
	}

	public function setEmail( $email )
	{
		$this->email = $email;
		return $this;
	}

	public function getEmail()
	{
		return $this->email;
	}

	public function setEnviado( $enviado )
	{
		$this->enviado = $enviado;
		return $this;
	}

	public function getEnviado()
	{
		return $this->enviado;
	}

	public function getEmailId() {
		
		$st_query = "
		SELECT id, dma, nome, email
		FROM newsletter 
		WHERE id = $this->id";
		
		$dr = array();	

		try
		{
			$o_data = $this->o_db->query($st_query);
			$i=0;
			while($o_ret = $o_data->fetchObject())
			{
				$dr[0] = $o_ret->id;
				$dr[1] = $o_ret->dma;	
				$dr[2] = $o_ret->nome;	
				$dr[3] = $o_ret->email;
				$i++;
			}
		}
		catch(PDOException $e)
		{}	
		return $dr;
	} 	


	public function addEmail()	{
		$dma = gmdate("Y") . "-";
		$dma .= gmdate("m") . "-";
		$dma .= gmdate("d") . " ";
		$dma .= gmdate("H"). ":";
		$dma .= gmdate("i") . ":";
		$dma .= gmdate("s");
		
		$st_query = "
		INSERT INTO	newsletter
		(
		dma,
		nome,
		email
		)
		VALUES
		(
		'$dma',
		'$this->nome',
		'$this->email'
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
	
	public function updateEmail()
	{
		if(!is_null($this->id))
		{
			$st_query = "
			UPDATE menus
			SET
			email = '$this->email',
			pagina = '$this->pagina'
			WHERE
			id = $this->id";
			
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

	public function getTotalRegistrosnewsletter() {
		$r = current($this->o_db->query("select count(*) from newsletter")->fetch());
		return $r;
	}

	public function getTotalRegistrosEmail() {
		$r = current($this->o_db->query("select count(*) from newsletter WHERE email='$this->email'")->fetch());
		return $r;
	}

	public function getUltimoRegsitro()	{
		$v_Textos = array();

		$st_query = "SELECT id, nome, email FROM newsletter WHERE id=(SELECT MAX(id) FROM newsletter)";
		$o_data = $this->o_db->query($st_query);
		$o_ret = $o_data->fetchObject();

		$dr = array();
		$r[0] = $o_ret->id;
		$r[1] = $o_ret->nome;
		$r[2] = $o_ret->email;

		return $r;
	}


	
}
?>