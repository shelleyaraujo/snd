<?php

class PedidosModel extends Model
{
	private $id;
	private $iditem;
	private $dma;
	private $idusuario;
	private $idcatalogo;
	private $idpedido;
	private $titulo;
	private $preco;	
	private $cor;
	private $tamanho;
	private $modelo;
	private $peso;
	private $pagamento;	
	private $codigopagamento;	
	private $frete;	 
	private $quantidade;	
	private $tipo;
	private $imagem;
	private $nome;
	private $endereco;
	private $numero;
	private $bairro;
	private $complemento;
	private $telefone;
	private $cidade;
	private $estado;
	private $cep;
	private $email;
	private $ip;
	private $fechado;

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


	public function setImagem( $imagem )
	{
		$this->imagem = $imagem;
		return $this;
	}
	
	public function getImagem()
	{
		return $this->imagem;
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
	
	public function setIditem( $iditem )
	{
		$this->iditem = $iditem;
		return $this;
	}
	
	public function getIditem()
	{
		return $this->iditem;
	}	

	public function setIdPedido( $idpedido )
	{
		$this->idpedido = $idpedido;
		return $this;
	}
	
	public function getIdPedido()
	{
		return $this->idpedido;
	}	

	public function setIdCatalogo( $idcatalogo )
	{
		$this->idcatalogo = $idcatalogo;
		return $this;
	}
	
	public function getIdCatalogo()
	{
		return $this->idcatalogo;
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


	public function setPreco( $preco )
	{
		$this->preco = $preco;
		return $this;
	}
	
	public function getPreco()
	{
		return $this->preco;
	}	

	public function setTamanho( $tamanho )
	{
		$this->tamanho = $tamanho;
		return $this;
	}
	
	public function getTamanho()
	{
		return $this->tamanho;
	}	

	public function setCor( $cor )
	{
		$this->cor = $cor;
		return $this;
	}
	
	public function getCor()
	{
		return $this->cor;
	}

	public function setModelo( $modelo )
	{
		$this->modelo = $modelo;
		return $this;
	}

	public function getModelo()
	{
		return $this->modelo;
	} 
	public function setQuantidade( $quantidade )
	{
		$this->quantidade = $quantidade;
		return $this;
	}
	
	public function getQuantidade()
	{
		return $this->quantidade;
	}	

	public function setPeso( $peso )
	{
		$this->peso = $peso;
		return $this;
	}
	
	public function getPeso()
	{
		return $this->peso;
	}

	public function setFrete( $frete )
	{
		$this->frete = $frete;
		return $this;
	}
	
	public function getFrete()
	{
		return $this->frete;
	}	

	public function setPagamento( $pagamento )
	{
		$this->pagamento = $pagamento;
		return $this;
	}
	
	public function getPagamento()
	{
		return $this->pagamento;
	}	


	public function setCodigoPagamento( $codigopagamento )
	{
		$this->codigopagamento = $codigopagamento;
		return $this;
	}

	public function codigopagamento()
	{
		return $this->codigopagamento;
	}	


	public function setIdUsuario( $idusuario )
	{
		$this->idusuario = $idusuario;
		return $this;
	}
	
	public function getIdUsuario()
	{
		return $this->idusuario;
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

	public function setIp( $ip )
	{
		$this->ip = $ip;
		return $this;
	}

	public function getIp()
	{
		return $this->ip;
	}

	public function setFechado( $fechado )
	{
		$this->fechado = $fechado;
		return $this;
	}

	public function getFechado()
	{
		return $this->fechado;
	}

	public function getPedidoById() {

		$st_query = "
		SELECT *
		FROM pedidos 
		WHERE id= $this->id";

		$r = array(); 

		try
		{
			$dbh=getdbh();
			$stmt = $dbh->query($st_query);
			while ($row = $stmt->fetch()) {
				$r[0] = $row["id"];
				$r[1] = $row["dma"];    
				$r[2] = $row["idusuario"];    
				$r[3] = $row["tipo"];
				$r[4] = $row["preco"];
				$r[5] = $row["peso"];
				$r[6] = $row["ip"];
				$r[7] = $row["pagamento"];
				$r[8] = $row["frete"];
				$r[9] = $row["objeto"];  
				$r[10] = $row["caracteristicas"];  
				$r[11] = $row["codigopagamento"];  
				$r[12] = $row["pago"];  
				$r[13] = $row["fechado"];  
				$r[14] = $row["nome"];  
				$r[15] = $row["endereco"];  
				$r[16] = $row["telefone"];  
				$r[17] = $row["bairro"];  
				$r[18] = $row["cidade"];  
				$r[19] = $row["estado"];  
				$r[20] = $row["cep"];  
			}
		}
		catch(PDOException $e)
		{}  

		return $r;
	}

	public function readPedidoItens()
	{
		$st_query = "
		SELECT id, idpedido, idcatalogo, titulo, preco, peso, quantidade, cor, tamanho, modelo, imagem
		FROM pedidositens
		WHERE idpedido = $this->idpedido  
		ORDER BY id desc";
		
		$dr = array();	
		$r = array();
		$i=0;

		try
		{
			$dbh=getdbh();
			$stmt = $dbh->query($st_query);
			while ($row = $stmt->fetch()) {	

				$dr[$i][0] = $row["id"];
				$dr[$i][1] = $row["idpedido"];
				$dr[$i][2] = $row["idcatalogo"];
				$dr[$i][3] = $row["titulo"];
				$dr[$i][4] = $row["preco"];		
				$dr[$i][5] = $row["peso"];
				$dr[$i][6] = $row["quantidade"];
				$dr[$i][7] = $row["cor"];
				$dr[$i][8] = $row["tamanho"];
				$dr[$i][9] = $row["modelo"];
				$dr[$i][10] = $row["imagem"];
				$i++;
			}
		}
		catch(PDOException $e)
		{}	
		return $dr;
	} 	

	public function addPedido()
	{
		$dma = date("Y-m-d H:i:s");

		$st_query = "
		INSERT INTO	pedidos
		(
		dma,
		tipo,
		fechado
		)
		VALUES
		(
		'$dma',
		$this->tipo,
		0
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

public function addPedidoItem()
{
		//desabilite se não quiser que cadastre item repetido
//	$existe = $this->getTotalRegistrosPedidoItem($this->idcatalogo,$this->idpedido);
	## ATENCAO A LINHA ABAIXO APENAS PARA O SITE DA ROOTSARTS ## DESATIVAR PARA OS OUTROS
	$existe = $this->getTotalRegistrosPedidoItem_modelo($this->idcatalogo,$this->idpedido,$this->modelo);

	if(!isset($existe[0][0])){
		$st_query = "
		INSERT INTO	pedidositens
		(
		idcatalogo,
		idpedido,
		titulo,
		preco,
		peso,
		imagem,
		quantidade,
		cor,
		tamanho,
		modelo
		)
		VALUES
		(
		$this->idcatalogo,
		$this->idpedido,		
		'$this->titulo',
		$this->preco,
		$this->peso,
		'$this->imagem',
		$this->quantidade,
		'$this->cor',
		'$this->tamanho',
		'$this->modelo'
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
}

$this->update_catalogo_estoque($this->idcatalogo, $this->quantidade);

return false;

}


public function getTotalRegistros()
{
	$r = current($this->o_db->query("select count(*) from pedidos")->fetch());
	return $r;
}


public function getTipoPedido()
{
	$st_query = "
	SELECT tipo
	FROM pedidos
	WHERE id = $this->idpedido";
	
	$r = "0";	

	try
	{
		$o_data = $this->o_db->query($st_query);
		$r = array();
		$i=0;
		while($o_ret = $o_data->fetchObject())
		{
			$r = $o_ret->tipo;
			$i++;
		}
	}
	catch(PDOException $e)
	{}	
	return $r;
}


public function updatePedidoItemQuantidade($acao)
{
	
	if(!is_null($this->iditem))
	{
		switch ($acao) {
			case 'remove':
			$st_query = "
			UPDATE pedidositens	SET	quantidade = quantidade - 1
			WHERE id = $this->iditem";
			break;
			default:
			$st_query = "
			UPDATE pedidositens	SET	quantidade = quantidade + 1
			WHERE id = $this->iditem";
			break;
		}

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
	}

	return "false";

}

public function updatePedidoFretePagamento()
{

	if(!is_null($this->idpedido))
	{
		$st_query = "
		UPDATE pedidos
		SET
		frete = '$this->frete',
		pagamento = '$this->pagamento'
		WHERE
		id = $this->idpedido";

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
	}

	return false;

}

public function finalizaPedido()
{
	if(!is_null($this->idpedido))
	{
		$st_query = "
		UPDATE pedidos
		SET
		idusuario = $this->idusuario,
		nome = '$this->nome',
		email = '$this->email',
		fechado = 1
		WHERE
		id = $this->idpedido";

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


public function xxxxxxxxfinalizaPedido()
{
	if(!is_null($this->idpedido))
	{
		$st_query = "
		UPDATE pedidos
		SET
		idusuario = $this->idusuario,
		nome = '$this->nome',
		endereco = '$this->endereco',
		numero = '$this->numero',
		telefone = '$this->telefone',
		bairro = '$this->bairro',
		complemento = '$this->complemento',
		cidade = '$this->cidade',
		estado = '$this->estado',
		cep = '$this->cep',
		email = '$this->email',
		ip =  '$this->ip',
		fechado = 1,
		tipo = $this->tipo,
		preco = '$this->preco',
		peso = '$this->peso'
		WHERE
		id = $this->idpedido";

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

public function finaliza_pedido() {

	if(!is_null($this->idpedido)) {
		$st_query = "
		UPDATE pedidos
		SET
		idusuario = $this->idusuario,
		nome = '$this->nome',
		telefone = '$this->telefone',
		endereco = '$this->endereco',
		numero = '$this->numero',
		bairro = '$this->bairro',
		complemento = '$this->complemento',
		cidade = '$this->cidade',
		estado = '$this->estado',
		cep = '$this->cep',
		email = '$this->email',
		codigopagamento = '$this->codigopagamento',
		pagamento = '$this->pagamento',
		fechado = 1
		WHERE
		id = $this->idpedido";
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

public function getUltimoRegsitro()
{
	$r = "0";
	$st_query = "SELECT id FROM pedidos WHERE id=(SELECT MAX(id) FROM pedidos)";

	$dbh=getdbh();

	$o_data = $dbh->query($st_query);
	$o_ret = $o_data->fetchObject();
	$dr = array();
	$r = $o_ret->id;
	return $r;
}

public function getTotalRegistrosPedidoItem($idcatalogo,$idpedido)
{
	$st_query = "
	SELECT id
	FROM pedidositens
	WHERE idcatalogo = $this->idcatalogo AND idpedido = $this->idpedido";

	$dr = array();

	$r = array();
	$i=0;

	$dbh=getdbh();

	try
	{
		$stmt = $dbh->query($st_query);
		while ($row = $stmt->fetch()) {

			$dr[$i][0] = $row["id"];

			$i++;
		}
	}
	catch(PDOException $e)
	{}	
	return $dr;
}


public function getTotalRegistrosPedidoItem_modelo($idcatalogo,$idpedido,$modelo)
{
	$st_query = "
	SELECT id
	FROM pedidositens
	WHERE idcatalogo = $this->idcatalogo 
	AND idpedido = $this->idpedido 
	AND modelo = '$this->modelo'";

	$dr = array();

	$r = array();
	$i=0;

	$dbh=getdbh();

	try
	{
		$stmt = $dbh->query($st_query);
		while ($row = $stmt->fetch()) {

			$dr[$i][0] = $row["id"];

			$i++;
		}
	}
	catch(PDOException $e)
	{}	
	return $dr;
}


public function deleteItem()
{

	$st_query = "
	DELETE FROM pedidositens
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

	return false;
}

public function readPedidos($ln, $x, $y, $ordenar, $id_usuario)
{
	$i = 0;
	$l=0;
	$totallinhas = 0;
	$linhas = $ln;
	$paginas = 0;

	$dbh=getdbh();

	if($id_usuario > 0){
		$totallinhas = current($dbh->query("select count(*) from pedidos WHERE idusuario =" . $id_usuario  . "")->fetch());
	} else {
		$totallinhas = current($dbh->query("select count(*) from pedidos")->fetch());
	}

	$paginas = $totallinhas / $linhas;

	if($id_usuario > 0){
		$st_query = "SELECT * FROM pedidos WHERE idusuario = " . $id_usuario . "  ORDER BY "	. $ordenar;
	} else {
		$st_query = "SELECT * FROM pedidos ORDER BY " . $ordenar;
	}

	$r = array();   
	$r[3][0] = "";
	$r = array();
	$i=0;
	try
	{

		$stmt = $dbh->query($st_query);
		while ($row = $stmt->fetch()) {
			if ($i >= $x) {
				$r[$l][0] = $row["id"];
				$r[$l][1] = $row["dma"];
				$r[$l][2] = $row["idusuario"];
				$r[$l][3] = $row["preco"];
				$r[$l][4] = $row["peso"];
				$r[$l][5] = $row["tipo"];
				$r[$l][6] = $row["caracteristicas"];
				$r[$l][7] = $row["id"];
				$r[$l][8] = $row["frete"];
				$r[$l][9] = $row["ip"];
				$r[$l][10] = $row["objeto"];
				$r[$l][11] = $row["nome"];                    
				$r[$l][12] = $row["telefone"];
				$r[$l][13] = $row["endereco"];
				$r[$l][14] = $row["complemento"];
				$r[$l][15] = $row["bairro"];
				$r[$l][16] = $row["cidade"];
				$r[$l][17] = $row["estado"];
				$r[$l][18] = $row["cep"];
				$r[$l][19] = $row["email"];
				$r[$l][20] = $row["pago"];
				$r[$l][21] = $row["status"];
				$r[$l][22] = $row["codigopagamento"];
				$r[$l][23] = $row["numero"];
				$r[$l][24] = $row["pagamento"];
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
		$r[$l][7] = "";
		$r[$l][8] = "";
		$r[$l][9] = "";
		$r[$l][10] = "";
		$r[$l][11] = "";                   
		$r[$l][12] = "";
		$r[$l][13] = "";
		$r[$l][14] = "";
		$r[$l][15] = "";
		$r[$l][16] = "";
		$r[$l][17] = "";
		$r[$l][18] = "";
		$r[$l][19] = "";

 $r[$l][1] .= "<ul class='paginacao'>";

// create flow rows
		$p = $y;
		if ($y > 0) {
			$a = $y * $linhas;
			$a = $a - $linhas;
			$b = $y - 10;
			$r[$l][1] .= "<ul class='paginacao'><li><a href='?controle=Pedidos&acao=open&tipo=3&idpedido=" . 
			$this->idpedido . "&x=" . $a . "&y=" . $b . "'>...</a></li>";
		}
		for ($i = 1; $i < 11; $i++) {
			$p++;
			$x = $p * $linhas - $linhas;
			$r[$l][0] = "#p#";
			if ($x < $totallinhas) {
				$r[$l][1] .= "<li class='pag-now'>";
				$r[$l][1] .= "<a href='?controle=Pedidos&acao=open&tipo=3&idpedido=" . 
				$this->idpedido . "&x=" . $x . "&y=" . $y . "'>" . $p . "</a>";
				$r[$l][1] .= "</li>";
			}
		}
        $r[$l][2] .= $totallinhas . " itens"; // $paginas;

        if ($x < $totallinhas) {
        	$x = $x + $linhas;
        	$y = $y + 10;
        	$r[$l][1] .= "<li class='pag-next'>&nbsp;<a href='?controle=Pedidos&acao=open&tipo=3&idpedido=" . 
        	$this->idpedido . "&x=" . $x . "&y=" . $y . "'>...</a></li></ul>";
        }
        // and flow rows
        // 
        $r[$l][1] .= "</ul>" . $r[$l][2];

        return $r;
    }   
    
    
    public function readPedidosItens()
    {
    	$st_query = "
    	SELECT id,
    	idpedido,
    	idcatalogo,
    	titulo,
    	imagem,
    	quantidade,
    	preco,
    	peso,
    	cor,
    	tamanho,
    	modelo
    	FROM pedidositens
    	WHERE idpedido = $this->idpedido
    	ORDER BY id desc";
    	
    	$r = array();   
    	$i=0;

    	try
    	{
    		$dbh=getdbh();
    		$stmt = $dbh->query($st_query);
    		while ($row = $stmt->fetch()) {
    			$r[$i][0] = $row["id"];
    			$r[$i][1] = $row["idpedido"];
    			$r[$i][2] = $row["idcatalogo"];
    			$r[$i][3] = $row["titulo"];
    			$r[$i][4] = $row["imagem"];                
    			$r[$i][5] = $row["quantidade"];
    			$r[$i][6] = $row["preco"];
    			$r[$i][7] = $row["peso"];
    			$r[$i][8] = $row["cor"];
    			$r[$i][9] = $row["tamanho"];
    			$r[$i][10] = $row["modelo"];               

    			$i++;
    		}
    	}
    	catch(PDOException $e) 
    	{}  
    	return $r;
    } 

    public function delete_item($id)  {

    	$st_query = "
    	DELETE FROM pedidositens
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

    public function updatePedidoUsuario() {

    	if(!is_null($this->id))
    	{
    		$st_query = "
    		UPDATE pedidos
    		SET
    		idusuario = $this->idusuario,
    		ip = '$this->ip'
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
    	}

    	return false;			
    } 

    public function set_pago($pago) {

    	if(!is_null($this->id))
    	{
    		$st_query = "
    		UPDATE pedidos
    		SET
    		pago = $pago
    		WHERE
    		id = $this->id ";
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
    	}

    	return true;			
    } 


    public function delete_pedido() {

    	$st_query = "
    	DELETE FROM pedidos
    	WHERE id = $this->id";
    	$dbh=getdbh();
    	try
    	{
    		if($dbh->exec($st_query) > 0)
    		{
    			$dbh->getAttribute(PDO::ATTR_DRIVER_NAME) === 'sqlite';
    			$this->delete_pedido_itens($this->id);
    		}
    	}
    	catch (PDOException $e)
    	{
    		throw $e;
    	}

    	return false;
    }


    public function delete_pedido_itens($id) {

    	$st_query = "
    	DELETE FROM pedidositens
    	WHERE idpedido = $id";
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



public function update_catalogo_estoque($idcatalogo,$quantidade)
{
			$st_query = "
			UPDATE catalogo	SET	estoque = estoque-$quantidade
			WHERE id = $idcatalogo";
		

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
	

	return "false";

}

public function updatePedidoPagamento($id_pedido,$codigo,$forma_pagamento)
      {
          $st_query = "
          UPDATE pedidos
          SET
          codigopagamento = '$codigo',
          pagamento = '$forma_pagamento'
          WHERE
          id = $id_pedido
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

public function updatePedidoPagamentoStatus($id_pedido,$status)
      {
          $st_query = "
          UPDATE pedidos
          SET
          status = '$status'
           WHERE
          id = $id_pedido
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