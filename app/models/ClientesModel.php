<?php

class ClientesModel extends Model
{
private $id;
private $dma;
private $dmanascimento;
private $nome;
private $endereco;
private $numero;
private $bairro;
private $complemento;
private $telefone;
private $cidade;
private $estado;
private $cep;
private $cpf;
private $cnpj;
private $email;
private $rg;

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

public function setDma( $dma )
{
	$this->dma = $dma;
	return $this;
}

public function getDma()
{
	return $this->dma;
}	

public function setDmaNascimento( $dmanascimento )
{
	$this->dmanascimento = $dmanascimento;
	return $this;
}

public function getDmaNascimento()
{
	return $this->dmanascimento;
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

public function setNumero( $numero )
{
	$this->numero = $numero;
	return $this;
}

public function getNumero()
{
	return $this->numero;
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

public function setCpf( $cpf )
{
	$this->cpf = $cpf;
	return $this;
}

public function getCpf()
{
	return $this->cpf;
}

public function setCnpj( $cnpj )
{
	$this->cnpj = $cnpj;
	return $this;
}

public function getCnpj()
{
	return $this->cnpj;
}

public function setRg( $rg )
{
	$this->rg = $rg;
	return $this;
}

public function getRg()
{
	return $this->rg;
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


public function setStatus( $status )
{
	$this->status = $status;
	return $this;
}

public function getStatus()
{
	return $this->status;
}

public function setCredencial( $credencial )
{
	$this->credencial = $credencial;
	return $this;
}

public function getCredencial()
{
	return $this->credencial;
}

public function setSenha( $senha )
{
	$this->senha = $senha;
	return $this;
}

public function getSenha()
{
	return $this->senha;
}

public function getClienteById() {
	
	$st_query = "
	SELECT *
	FROM clientes 
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
			$dr[12] = $o_ret->cpf;	
			$dr[13] = $o_ret->rg;	
			$dr[14] = $o_ret->email;	
			$dr[15] = $o_ret->site;	
			$dr[16] = $o_ret->status;	
			$dr[17] = $o_ret->credencial;	
			$dr[18] = $o_ret->imagem;	
			$dr[19] = $o_ret->numero;	
			$dr[20] = $o_ret->cnpj;	
			$i++;
		}
	}
	catch(PDOException $e)
	{}	
	return $dr;
} 	

public function getClienteByEmail() {
	
	$st_query = "
	SELECT *
	FROM clientes 
	WHERE email = '$this->email' ";
	
	$dr = array();	
	$i=0;

	try
	{
		$dbh=getdbh();
		$stmt = $dbh->query($st_query);
		while ($row = $stmt->fetch()) {			
			$dr[0] = $row["id"];
			$dr[1] = $row["dma"];	
			$dr[2] = $row["dmanascimento"];	
			$dr["nome"] = $row["nome"];
			$dr["endereco"] = $row["endereco"];
			$dr["numero"] = $row["numero"];	
			$dr["telefone"] = $row["telefone"];		
			$dr["bairro"] = $row["bairro"];					
			$dr["complemento"] = $row["complemento"];	
			$dr["cidade"] = $row["cidade"];	
			$dr["estado"] = $row["estado"];	
			$dr["cep"] = $row["cep"];
			$dr["cpf"] = $row["cpf"];	
			$dr["cnpj"] = $row["cpf"];	
			$dr["rg"] = $row["rg"];	
			$dr["email"] = $row["email"];	
			$dr["site"] = $row["site"];	
			$dr["status"] = $row["status"];	
			$dr["credencial"] = $row["credencial"];	
			$dr["imagem"] = $row["imagem"];	
			$i++;
		}
	}
	catch(PDOException $e)
	{}	
	return $dr;
} 	


public function getCliente()
{
	$st_query = "
	SELECT *
	FROM clientes 
	WHERE id = $this -> id";
	
	$dr = array();	

	try
	{
		$o_data = $this->o_db->query($st_query);
		$r = array();
		$i=0;
		while($o_ret = $o_data->fetchObject())
		{
			$dr[$i][0] = $o_ret->id;
			$dr[$i][1] = $o_ret->email;
			$dr[$i][2] = $o_ret->categoria;
			$dr[$i][3] = $o_ret->pagina;		
			$dr[$i][4] = $o_ret->id_conteudo;		
			$dr[$i][5] = $o_ret->ordem;		

			$i++;
		}
	}
	catch(PDOException $e)
	{}	
	return $dr;
} 	

public function logar()	{

	$email = addslashes($this->email);
	$senha = addslashes($this->senha);

	$st_query = "
	SELECT id, nome, email, senha, credencial
	FROM clientes 
	WHERE email = '$email' 
	AND senha = '$senha'
	";
	
	$dr = array("id"=>"0","nome"=>"Nome","email"=>"Email","credencial"=>"10000");

	try
	{
		$dbh=getdbh();
		$stmt = $dbh->query($st_query);
		while ($row = $stmt->fetch()) {			
			$dr["id"] = $row["id"];
			$dr["nome"] = $row["nome"];
			$dr["email"] = $row["email"];
			$dr["credencial"] = $row["credencial"];
		}
	}
	catch(PDOException $e)
	{}	
	return $dr;
} 	

public function addCliente()
{
	
	$st_query = "
	INSERT INTO	clientes
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
	cpf,
	cnpj,
	email,
	senha,
	credencial,
	numero
	)
	VALUES
	(
	'$this->dma',
	'$this->dmanascimento',
	'$this->nome',
	'$this->endereco',
	'$this->telefone',
	'$this->bairro',
	'$this->complemento',
	'$this->cidade',
	'$this->estado',
	'$this->cep',
	'$this->cpf',
	'$this->cnpj',
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

public function updateCliente()
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

public function getTotalRegistrosClientes()
{
$dbh=getdbh();
$r = current($dbh->query("select count(*) from clientes")->fetch());
return $r;
}

public function getTotalRegistrosCliente()
{
$dbh=getdbh();
$totallinhas = current($dbh->query("select count(*) from clientes WHERE email=".$this->email)->fetch());
return $r;
}

public function getUltimoRegsitro()
{
$v_Textos = array();

$st_query = "SELECT id, nome, email FROM clientes WHERE id=(SELECT MAX(id) FROM clientes)";

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
FROM clientes 
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

public function readCliente()
{
$st_query = "
SELECT *
FROM clientes 
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
		$dr[2] = $row["dmanascimento"];
		$dr[3] = $row["nome"];
		$dr[4] = $row["endereco"];
		$dr[5] = $row["numero"];
		$dr[6] = $row["telefone"];	
		$dr[7] = $row["bairro"];				
		$dr[8] = $row["complemento"];
		$dr[9] = $row["cidade"];	
		$dr[10] = $row["estado"];	
		$dr[11] = $row["cep"];
		$dr[12] = $row["cpf"];	
		$dr[13] = $row["rg"];	
		$dr[14] = $row["email"];	
		$dr[15] = $row["site"];	
		$dr[16] = $row["status"];	
		$dr[17] = $row["credencial"];	
		$dr[18] = $row["imagem"];	
		$dr[19] = $row["ar"];	
		$dr[20] = $row["cnpj"];	
		$i++;
	}
}
catch(PDOException $e)
{}	
return $dr;
} 	

public function readClienteByEmail() {
$st_query = "
SELECT *
FROM clientes 
WHERE email = '$this->email'";

$dr = array();	
$i=0;
try
{
	$dbh=getdbh();
	$stmt = $dbh->query($st_query);
	while ($row = $stmt->fetch()) {
		$dr[0] = $row["id"];
		$dr[1] = $row["dma"];
		$dr[2] = $row["dmanascimento"];
		$dr[3] = $row["nome"];
		$dr[4] = $row["endereco"];
		$dr[5] = $row["numero"];
		$dr[6] = $row["telefone"];	
		$dr[7] = $row["bairro"];				
		$dr[8] = $row["complemento"];
		$dr[9] = $row["cidade"];	
		$dr[10] = $row["estado"];	
		$dr[11] = $row["cep"];
		$dr[12] = $row["cpf"];	
		$dr[13] = $row["rg"];	
		$dr[14] = $row["email"];	
		$dr[15] = $row["site"];	
		$dr[16] = $row["status"];	
		$dr[17] = $row["credencial"];	
		$dr[18] = $row["imagem"];	
		$i++;
	}
}
catch(PDOException $e)
{}	
return $dr;
} 	

public function update_cliente()
{
if(!is_null($this->id))
{
	$st_query = "
	UPDATE clientes
	SET
	nome = '$this->nome',
	numero = '$this->numero',
	telefone = '$this->telefone',
	endereco = '$this->endereco',
	bairro = '$this->bairro',
	complemento = '$this->complemento',
	cidade = '$this->cidade',
	estado = '$this->estado',
	cep = '$this->cep',
	cpf = '$this->cpf',
	cnpj = '$this->cnpj',
	email = '$this->email',
	rg = '$this->rg'
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


public function get_rows($ln, $xx, $yy, $ordem, $buscar)
{
$i = 0;
$l=0;
$totallinhas = 0;
$linhas = $ln;
$paginas = 0;
$busca = "";

$x=0;
$y=0;

if (isset($xx)) {
	$x = (int)$xx;
}

if (isset($yy)) {
	$y = (int)$yy;
}

$dbh=getdbh();

if($buscar != "") {
	$busca = " WHERE nome LIKE '%%$buscar%%' ";
}

$totallinhas = current($dbh->query("select count(*) from clientes " . $busca)->fetch());

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
cpf,
cnpj
FROM clientes
" . $busca . " ORDER BY id, $ordem";

try  {
	$dbh=getdbh();
	$stmt = $dbh->query($st_query);
	while ($row = $stmt->fetch()) {
		if ($i >= $x) {
			$r[$l][0] = $row["id"];
			$r[$l][1] = $row["dma"];
			$r[$l][2] = $row["nome"];
			$r[$l][3] = $row["email"];
			$r[$l][4] = $row["cpf"]; 
			$r[$l][5] = $row["cnpj"]; 
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
$r[$l][1] .= "<li class='pag-prev'><a href='?controle=page&acao=open&id=". $this->id ."&x=" . $a . "&y=" . $b . "'>...</a></li>";
}
for ($i = 1; $i < 11; $i++) {
$p++;
$x = $p * $linhas - $linhas;
$r[$l][0] = "#p#";
if ($x < $totallinhas) {
$r[$l][1] .= "<li class='pag-now'>";
$r[$l][1] .= "<a href='?controle=page&acao=open&id=". $this->id ."&x=" . $x . "&y=" . $y . "'>" . $p . "</a>";
$r[$l][1] .= "</li>";
}
}

  // $r[$l][2] .= "<div class='paginacao-itens'>" .$totallinhas . " itens</div>"; // $paginas;

if ($x < $totallinhas) {
$x = $x + $linhas;
$y = $y + 10;
$r[$l][1] .= "<li class='pag-next'><a href='?controle=page&acao=open&id=". $this->id ."&x=" . $x . "&y=" . $y . "'>...</a></li>";
}
  // and flow rows

$r[$l][1] .= "</ul>" . $r[$l][2];

if($totallinhas <= $ln)
{
$r[$l][1] = "";
}

return $r;
}  


public function set_credencial($id,$credencial)
{
$st_query = "
UPDATE clientes
SET
credencial = '$credencial'
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



public function add_cliente()
{
$dma = gmdate("y/m/d G.i:", time());
$st_query = "
INSERT INTO	clientes
(
dma,
nome
)
VALUES
(
'$dma',
'$this->nome'
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

public function existeCliente($nome) {

$dbh=getdbh();

$r = current($dbh->query("select count(*) from clientes WHERE nome = '". $nome ."' ")->fetch());
return $r;
}


public function delete_cliente($id)
{

$st_query = "
DELETE FROM clientes
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


public function update_senha()
{

$st_query = "
UPDATE clientes
SET
senha = '$this->senha'
WHERE
email = '$this->email'
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

public function get_cliente_by_email() {

$st_query = "
SELECT id, dma, email
FROM clientes 
WHERE email = '$this->email' ";

$dr = array();	
$i=0;
try
{
	$dbh=getdbh();
	$stmt = $dbh->query($st_query);
	while ($row = $stmt->fetch()) {
		$dr["id"] = $row["id"];
		$dr["dma"] = $row["dma"];
		$dr["email"] = $row["email"];

		$i++;
	}
}
catch(PDOException $e)
{}	
return $dr;
} 	


public function update_codigo()
{
$st_query = "
UPDATE clientes
SET
codigo = '$this->codigo'
WHERE
email = '$this->email'
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