<?php
class CadastrosModel extends Model
{
	/** 
	 * [$id description]
	 * @var [type]
	 */
	
	
	private $id;
	private $dma;
	private $idcategoria;
	private $nome;
	private $endereco;
	private $bairro;
	private $complemento;
	private $ddd;
	private $telefone;
	private $cidade;
	private $estado;
	private $cep;
	private $email;
	private $site;
	private $senha;
	private $credencial;
	private $imagem;
	private $descricao;

	function __construct()
	{
		parent::__construct();
	}
	
	/**
	 * Setters e Getters date(format)
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

	public function setIdCategoria( $idcategoria )
	{
		$this->idcategoria = $idcategoria;
		return $this;
	}

	public function getIdCategoria()
	{
		return $this->idcategoria;
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

	public function setDdd( $ddd )
	{
		$this->ddd = $ddd;
		return $this;
	}

	public function getDdd()
	{
		return $this->ddd;
	}

	public function setTelefone( $telefone )
	{
		$this->telefone = $telefone;
		return $this;
	}

	public function getTelefone()
	{
		return $this->telefone;
	}

	public function setEndereco( $endereco )
	{
		$this->endereco = $endereco;
		return $this;
	}

	public function getEndereco()
	{
		return $this->endereco;
	}

	public function setBairro( $bairro )
	{
		$this->bairro = $bairro;
		return $this;
	}

	public function getBairro()
	{
		return $this->bairro;
	}

	public function setComplemento( $complemento )
	{
		$this->complemento = $complemento;
		return $this;
	}

	public function getComplemento()
	{
		return $this->complemento;
	}

	public function setCidade( $cidade )
	{
		$this->cidade = $cidade;
		return $this;
	}

	public function getCidade()
	{
		return $this->cidade;
	}


	public function setEstado( $estado )
	{
		$this->estado = $estado;
		return $this;
	}

	public function getEstado()
	{
		return $this->estado;
	}


	public function setCep( $cep )
	{
		$this->cep = $cep;
		return $this;
	}

	public function getCep()
	{
		return $this->cep;
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

	public function setDescricao( $descricao )
	{
		$this->descricao = $descricao;
		return $this;
	}

	public function getDescricao()
	{
		return $this->descricao;
	}

	public function readCadastro()
	{
		$st_query = "
		SELECT *
		FROM cadastros 
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
				$dr[2] = $o_ret->idcategoria;	
				$dr[3] = $o_ret->nome;
				$dr[4] = $o_ret->endereco;
				$dr[5] = $o_ret->ddd;	
				$dr[6] = $o_ret->telefone;		
				$dr[7] = $o_ret->bairro;					
				$dr[8] = $o_ret->complemento;	
				$dr[9] = $o_ret->cidade;	
				$dr[10] = $o_ret->estado;	
				$dr[11] = $o_ret->cep;
				$dr[12] = $o_ret->email;	
				$dr[13] = $o_ret->site;	
				$dr[14] = $o_ret->imagem;	
				$dr[15] = $o_ret->descricao;	
				$i++;
			}
		}
		catch(PDOException $e)
		{}	
		return $dr;
	} 	

	public function addCadastro()
	{
		$dma = date("Y/m/d");
		$st_query = "
		INSERT INTO	cadastros
		(
		dma,
		nome,
		email,
		idcategoria
		)
		VALUES
		(
		'$dma',
		'$this->nome',
		'$this->email',
		$this->idcategoria
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
	
	public function deleteCadastro()
	{
		if(!is_null($this->id))
		{
			$st_query = "
			DELETE FROM	cadastros
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
	
	public function updateCadastro()
	{
		if(!is_null($this->id))
		{
			$st_query = "
			UPDATE cadastros
			SET
			nome = '$this->nome',
			ddd = '$this->ddd',
			telefone = '$this->telefone',
			endereco = '$this->endereco',
			bairro = '$this->bairro',
			complemento = '$this->complemento',
			cidade = '$this->cidade',
			estado = '$this->estado',
			cep = '$this->cep',
			email = '$this->email',
			descricao = '$this->descricao'
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

	public function getTotalRegistrosCadastros()
	{
		$r = current($this->o_db->query("select count(*) from cadastros")->fetch());
		return $r;
	}




	public function readItens($ln, $x, $y, $ordenar)
	{
		$i = 0;
		$l=0;
		$totallinhas = 0;
		$linhas = $ln;
		$paginas = 0;

		$totallinhas = current($this->o_db->query("select count(*) from cadastros WHERE idcategoria=". $this->idcategoria)->fetch());
		$paginas = $totallinhas / $linhas;

		$st_query = "
		SELECT id,
		dma,
		idcategoria,
		nome,
		endereco,
		bairro,
		complemento,
		cidade,
		estado,
		cep,
		ddd,
		telefone,
		email,
		site,
		imagem,
		descricao
		FROM cadastros
		WHERE idcategoria =  $this->idcategoria
		ORDER BY $ordenar";

		$r = array();   
		$r[3][0] = "";
		try
		{
			$o_data = $this->o_db->query($st_query);
			$r = array();
			$i=0;
			while($o_ret = $o_data->fetchObject())
			{
				if ($i >= $x) {
					$r[$l][0] = $o_ret->id;
					$r[$l][1] = $o_ret->dma;
					$r[$l][2] = $o_ret->idcategoria;
					$r[$l][3] = $o_ret->nome;
					$r[$l][4] = $o_ret->endereco;
					$r[$l][5] = $o_ret->bairro;
					$r[$l][6] = $o_ret->complemento;
					$r[$l][7] = $o_ret->cidade;
					$r[$l][8] = $o_ret->estado;
					$r[$l][9] = $o_ret->cep;
					$r[$l][10] = $o_ret->ddd;
					$r[$l][11] = $o_ret->telefone;
					$r[$l][12] = $o_ret->email;
					$r[$l][13] = $o_ret->site;
					$r[$l][14] = $o_ret->imagem;
					$r[$l][15] = $o_ret->descricao;
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


// create flow rows
    $p = $y;
        $r[$l][1] .= "<ul class='paginacao'>";

    if ($y > 0) {
    	$a = $y * $linhas;
    	$a = $a - $linhas;
    	$b = $y - 10;
    	$r[$l][1] .= "<li><a href='?controle=page&acao=open&x=" . $a . "&y=" . $b . "&id=". $this->id . "&idcategoria=". $this->idcategoria . "'>...</a></li>";
    }
    for ($i = 1; $i < 11; $i++) {
    	$p++;
    	$x = $p * $linhas - $linhas;
    	$r[$l][0] = "#p#";
    	if ($x < $totallinhas) {
    		$r[$l][1] .= "<li class='pag-now'>";
    		$r[$l][1] .= "<a href='?controle=page&acao=open&x=" . $x . "&y=" . $y . "&id=". $this->id . "&idcategoria=". $this->idcategoria . "'>" . $p . "</a>";
    		$r[$l][1] .= "</li>";
    	}
    }
        $r[$l][2] .= $totallinhas . " itens"; // $paginas;

        if ($x < $totallinhas) {
        	$x = $x + $linhas;
        	$y = $y + 10;
        	$r[$l][1] .= "<li class='pag-next'>&nbsp;<a href='?controle=page&acao=open&x=" . $x . "&y=" . $y . "&id=". $this->id . "&idcategoria=". $this->idcategoria . "'>...</a></li></ul>";
        }
        // and flow rows

        return $r;
    }   



}
?>