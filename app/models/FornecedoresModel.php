<?php

class FornecedoresModel extends Model
{
	private $id;
	private $dma;
	private $nome;
	private $imagem;
	private $email;

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

	public function setImagem( $imagem )
	{
		$this->imagem = $imagem;
		return $this;
	}

	public function getImagem()
	{
		return $this->imagem;
	}

	public function getFornecedoreById() {
		
		$st_query = "
		SELECT *
		FROM fornecedores 
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
				$dr[2] = $o_ret->dmanascimento;	
				$dr[3] = $o_ret->nome;
				$dr[4] = $o_ret->endereco;
				$dr[5] = $o_ret->numero;	
				$dr[6] = $o_ret->telefone;		
				$dr[7] = $o_ret->bairro;					
				$dr[8] = $o_ret->complemento;	
				$dr[9] = $o_ret->cidade;	
				$dr[10] = $o_ret->estado;	
				$dr[11] = $o_ret->cep;
				$dr[12] = $o_ret->cpfcnpj;	
				$dr[13] = $o_ret->rg;	
				$dr[14] = $o_ret->email;	
				$dr[15] = $o_ret->site;	
				$dr[16] = $o_ret->status;	
				$dr[17] = $o_ret->credencial;	
				$dr[18] = $o_ret->imagem;	
				$dr[19] = $o_ret->numero;	
				$i++;
			}
		}
		catch(PDOException $e)
		{}	
		return $dr;
	} 	

	public function addFornecedor()
	{
		$dma = gmdate("Y") . "-";
		$dma .= gmdate("m") . "-";
		$dma .= gmdate("d") . " ";
		$dma .= gmdate("H"). ":";
		$dma .= gmdate("i") . ":";
		$dma .= gmdate("s");
		
		$st_query = "
		INSERT INTO	fornecedores
		(
		dma,
		dmanascimento,
		nome,
		endereco,
		telefone,
		bairro,
		complemento,
		cidade,
		estado,
		cep,
		cpfcnpj,
		email,
		senha,
		credencial,
		numero
		)
		VALUES
		(
		'$dma',
		'$this->dmanascimento',
		'$this->nome',
		'$this->endereco',
		'$this->telefone',
		'$this->bairro',
		'$this->complemento',
		'$this->cidade',
		'$this->estado',
		'$this->cep',
		'$this->cpfcnpj',
		'$this->email',
		'$this->senha',
		2,
		'$this->numero'
	);";

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

public function updateFornecedore()
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

public function getTotalRegistrosFornecedores()
{
	$dbh=getdbh();
	$r = current($dbh->query("select count(*) from fornecedores")->fetch());
	return $r;
}

public function getTotalRegistrosFornecedore()
{
	$dbh=getdbh();
	$totallinhas = current($dbh->query("select count(*) from fornecedores WHERE email=".$this->email)->fetch());
	return $r;
}

public function getUltimoRegsitro()
{
	$v_Textos = array();

	$st_query = "SELECT id, nome, email FROM fornecedores WHERE id=(SELECT MAX(id) FROM fornecedores)";

	$dbh=getdbh();
	$o_data = $dbh->query($st_query);
	$stmt = $o_data->fetchObject();

	$dr = array("id"=>"0","nome"=>"","email"=>"");

	$dr["id"] = $stmt->id;
	$dr["nome"] = $stmt->nome;
	$dr["email"] = $stmt->email;

	return $dr;
}

public function verificaEmail()	{

	$email = addslashes($this->email);

	$st_query = "
	SELECT id, nome, email
	FROM fornecedores 
	WHERE email = '$email'";

	$r = array("id"=>"0","nome"=>"0","email"=>"0");

	try
	{
		$dbh=getdbh();
		$stmt = $dbh->query($st_query);
		while ($row = $stmt->fetch()) {
			$r = array("id"=>$row["id"],"nome"=>$row["nome"],"email"=>$row["email"]);
		}
	}
	catch(PDOException $e)
	{}	
	return $r;
} 

public function readFornecedor()
{
	$st_query = "
	SELECT *
	FROM fornecedores 
	WHERE id = $this->id";

	$dr = array();	
	$i=0;
	try
	{
		$dbh=getdbh();
		$stmt = $dbh->query($st_query);
		while ($row = $stmt->fetch()) {
			$dr[0] = $row["id"];
			$dr[1] = $row["dma"];
			$dr[2] = $row["nome"];
			$dr[3] = $row["email"];	
			$dr[4] = $row["imagem"];	
			$i++;
		}
	}
	catch(PDOException $e)
	{}	
	return $dr;
} 	

public function update_fornecedor()
{
	if(!is_null($this->id))
	{
		$st_query = "
		UPDATE fornecedores
		SET
		nome = '$this->nome',
		email = '$this->email',
		imagem = '$this->imagem'
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

}


public function get_rows($ln, $x, $y, $ordem) {

	$i = 0;
	$l=0;
	$totallinhas = 0;
	$linhas = $ln;
	$paginas = 0;

	$dbh=getdbh();
	$totallinhas = current($dbh->query("select count(*) from fornecedores")->fetch());
	$paginas = $totallinhas / $linhas;

	$r = array();   
	$i=0;
	$r[3][0] = "";

	$st_query = "
	SELECT
	id,
	dma,
	nome,
	email,
	imagem
	FROM fornecedores
	ORDER BY nome";

	try  {
		$dbh=getdbh();
		$stmt = $dbh->query($st_query);
		while ($row = $stmt->fetch()) {
			if ($i >= $x) {
				$r[$l][0] = $row["id"];
				$r[$l][1] = $row["dma"];
				$r[$l][2] = $row["nome"];
				$r[$l][3] = $row["email"];
				$r[$l][4] = $row["imagem"];     
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

        // create flow rows

$p = $y;
if ($y > 0) {
	$a = $y * $linhas;
	$a = $a - $linhas;
	$b = $y - 10;
	$r[$l][1] .= "<li class='pag-prev'><a href='?controle=page&acao=open&x=" . $a . "&y=" . $b . "'>...</a></li>";
}
for ($i = 1; $i < 11; $i++) {
	$p++;
	$x = $p * $linhas - $linhas;
	$r[$l][0] = "#p#";
	if ($x < $totallinhas) {
		$r[$l][1] .= "<li class='pag-now'>";
		$r[$l][1] .= "<a href='?controle=page&acao=open&x=" . $x . "&y=" . $y . "'>" . $p . "</a>";
		$r[$l][1] .= "</li>";
	}
}

        // $r[$l][2] .= "<div class='paginacao-itens'>" .$totallinhas . " itens</div>"; // $paginas;

if ($x < $totallinhas) {
	$x = $x + $linhas;
	$y = $y + 10;
	$r[$l][1] .= "<li class='pag-next'>&nbsp;<a href='?controle=page&acao=open&x=" . $x . "&y=" . $y . "'>...</a></li>";
}
        // and flow rows

$r[$l][1] .= "</ul>" . $r[$l][2];

if($totallinhas <= $ln)
{
	$r[$l][1] = "";
}

return $r;
}  

public function get_fornecedores() {
	$st_query = "
	SELECT id,
	nome,
	email,
	imagem
	FROM fornecedores
	ORDER BY nome";

	$r = array();   
	$i=0;

	try
	{
		$dbh=getdbh();
		$stmt = $dbh->query($st_query);
		while ($row = $stmt->fetch()) {
			$r[$i][0] = $row["id"];
			$r[$i][1] = $row["nome"];
			$r[$i][2] = $row["email"];
			$r[$i][3] = $row["imagem"];
			$i++;
		}
	}
	catch(PDOException $e)
	{}  
	return $r;
} 

public function add_fornecedor()
{
	$dma = gmdate("y/m/d G.i:", time());
	$st_query = "
	INSERT INTO	fornecedores
	(
	dma,
	nome,
	email,
	imagem
	)
	VALUES
	(
	'$dma',
	'$this->nome',
	'$this->email',
	'sem-imagem.jpg'

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

public function existeFornecedor($nome) {

	$dbh=getdbh();

	$r = current($dbh->query("select count(*) from fornecedores WHERE nome = '". $nome ."' ")->fetch());
	return $r;
}


public function delete_fornecedor($id) {

	$st_query = "
	DELETE FROM fornecedores
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

}

?>