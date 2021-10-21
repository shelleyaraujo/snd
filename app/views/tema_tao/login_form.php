<?php    
if(!isset($_SESSION["novo_email"])){$_SESSION["novo_email"] = "";}
if(!isset($_SESSION["email"])){$_SESSION["email"] = "";}
if(!isset($_SESSION["nome"])){$_SESSION["nome"] = "";}
if(!isset($_SESSION["telefone"])){$_SESSION["telefone"] = "";}
if(!isset($_SESSION["celular"])){$_SESSION["celular"] = "";}
if(!isset($_SESSION["endereco"])){$_SESSION["endereco"] = "";}
if(!isset($_SESSION["numero"])){$_SESSION["numero"] = "";}
if(!isset($_SESSION["bairro"])){$_SESSION["bairro"] = "";}
if(!isset($_SESSION["complemento"])){$_SESSION["complemento"] = "";}  
if(!isset($_SESSION["cidade"])){$_SESSION["cidade"] = "";}
if(!isset($_SESSION["estado"])){$_SESSION["estado"] = "";}
if(!isset($_SESSION["cep"])){$_SESSION["cep"] = "";}
if(!isset($_SESSION["cpf"])){$_SESSION["cpf"] = "";}
if(!isset($_SESSION["cnpj"])){$_SESSION["cnpj"] = "";}

$info = "";


if($_SESSION["total_itens_carrinho"] == "0") {

	echo "
	<style>
	#cnt-logar {display: none}
	</style>
	";
	$info = "<p style='text-align: center; color: red; font-weight: bold'>Carrinho Vazio! É necessário ter pelo menos 1 item no carrinho!</p>";
	
}

?>

<div id="titulo">
	<h1> 1 - Faça seu Login ou Cadastro</h1>
</div>

<p style="text-align: center;">Digite seu email no campo abaixo para fazer login ou criar um novo cadastro.</p>

<?php echo $info;?>

<div id="cnt-logar">
	<div id="alerta-loader"></div>
	<div id="v_email">
		<input type="text" id="email" name="email" value="" placeholder="Digite seu email" />
		<input class='button-primary' type="button" name="verifica_email" value="Enviar" onclick="verificaEmail()" class="button" />
	</div>

	<div id="logar">
		<input type="password" id="senha" name="senha" value="" placeholder="Digite sua senha" maxlength="15"/>
		<input class='button-primary' type="button" name="logar" value="Fazer Login" onclick="logar()" class="button" />
		&nbsp;<a href="javascript:void(0)" onclick="esqueci_a_senha()" class="button">Esqueci minha senha.</a>
		<div id="loader"></div>
	</div>
</div>

<div id="cnt-cadastro">

	<div id="titulo-cadastro">Dados Cadastrais <small style="color: gold">Por favor, preencha os campos abaixo, é rapidinho!</small></div>

	<div id="cadastro">
		<form id="form-cadastro" name="form-cadastro" method="POST">
      <!--
      <legenda>Data Nascimento:</legenda>
      <input type="text" id="dia" name="dia" placeholder="Dia" maxlength="2" value="<?php echo $_SESSION["dia"] ?>" style="width: 50px; display:inline;">
      <input type="text" id="mes" name="mes" placeholder="Mês" maxlength="2" value="<?php echo $_SESSION["mes"] ?>" style="width: 50px; display:inline;">
      <input type="text" id="ano" name="ano" placeholder="Ano" maxlength="4" value="<?php echo $_SESSION["ano"] ?>" style="width: 100px; display:inline;">
  -->
  <div class="row">
  	<div class="six columns">
  		<input type="radio"  name="pessoa" value="cpf" checked onclick="desabilita('cnpj','cpf')"> Pessoa Física
  		&nbsp; &nbsp; &nbsp;
  		<input type="radio"  name="pessoa" value="cnpj" onclick="desabilita('cpf','cnpj')"> Pessoa Juridica

  	</div>
  	<div id="pessoa-cpf" class="six columns">
  		<label>CPF</label>
  		<input class="u-full-width" type="text" id="cpf"  name="cpf" placeholder="CPF" maxlength="11" value="<?php echo  $_SESSION["cpf"] ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />   
  	</div>
  	<div id="pessoa-cnpj" class="six columns">
  		<label>CNPJ</label>
  		<input class="u-full-width" type="text" id="cnpj"  name="cpfcnpj" placeholder="CNPJ" maxlength="14" value="<?php echo  $_SESSION["cnpj"] ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />   
  	</div>
  </div>
  <div class="row">
  	<div class="cep two columns">
  		<label>Cep</label>
  		<input class="u-full-width" type="text" id="cep" name="cep" placeholder="CEP" maxlength="8" value="<?php echo  $_SESSION["cep"] ?>" onblur="pesquisacep(this.value)" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" /> 
  	</div>
  	<div class="email  four columns">
  		<label>Email</label>
  		<input class="u-full-width" type="text" id="novo_email" disabled name="novo_email" placeholder="Email" maxlength="50" value="<?php echo $_SESSION["novo_email"] ?>">
  	</div>
  	<div class="nome  six columns">
  		<label>Nome</label>
  		<input class="u-full-width" type="text" id="nome" name="nome" placeholder="Nome" maxlength="50" value="<?php echo $_SESSION["nome"] ?>">
  	</div>
  </div>

  <div class="row">
  	<div class="telefone six columns">
  		<label>Telefone</label>
  		<input class="u-full-width" type="text" id="telefone" name="telefone" placeholder="Telefone" maxlength="15" value="<?php echo  $_SESSION["telefone"] ?>">   
  	</div>
  	<div class="celular six columns">
  		<label>Celular</label>
  		<input class="u-full-width" type="text" id="celular" name="celular" placeholder="Celular" maxlength="15" value="<?php echo  $_SESSION["celular"] ?>">   
  	</div> 
  </div>

  <div class="row">

  	<div class="endereco ten columns">
  		<label>Endereço</label>
  		<input class="u-full-width" type="text" id="endereco" name="endereco" placeholder="Endereço" maxlength="250" value="<?php echo  $_SESSION["endereco"] ?>">   
  	</div>
  	<div class="numero two columns">
  		<label>Número</label>
  		<input class="u-full-width" type="text" id="numero" name="numero" placeholder="Número" maxlength="10" value="<?php echo $_SESSION["numero"] ?>">   
  	</div>

  </div>

  <div class="row">

  	<div class="bairro six columns">
  		<label>Bairro</label>
  		<input class="u-full-width" type="text" id="bairro" name="bairro" placeholder="Bairro" maxlength="50" value="<?php echo  $_SESSION["bairro"] ?>">   
  	</div>
  	<div class="complemento six columns">
  		<label>Complemento</label>
  		<input class="u-full-width" type="text" id="complemento" name="complemento" placeholder="complemento" value="">   
  	</div>
  </div>


  <div class="row">
  	<div class="cidade ten columns">
  		<label>Cidadde</label>
  		<input class="u-full-width" type="text" id="cidade" name="cidade" placeholder="Cidade" maxlength="50" value="<?php echo  $_SESSION["cidade"] ?>">   
  	</div>
  	<div class="estado two columns">
  		<label>Estado</label>
  		<select id="estados" name="estados">
    <option value="AC">Acre</option>
    <option value="AL">Alagoas</option>
    <option value="AP">Amapá</option>
    <option value="AM">Amazonas</option>
    <option value="BA">Bahia</option>
    <option value="CE">Ceará</option>
    <option value="DF">Distrito Federal</option>
    <option value="ES">Espírito Santo</option>
    <option value="GO">Goiás</option>
    <option value="MA">Maranhão</option>
    <option value="MT">Mato Grosso</option>
    <option value="MS">Mato Grosso do Sul</option>
    <option value="MG">Minas Gerais</option>
    <option value="PA">Pará</option>
    <option value="PB">Paraíba</option>
    <option value="PR">Paraná</option>
    <option value="PE">Pernambuco</option>
    <option value="PI">Piauí</option>
    <option value="RJ">Rio de Janeiro</option>
    <option value="RN">Rio Grande do Norte</option>
    <option value="RS">Rio Grande do Sul</option>
    <option value="RO">Rondônia</option>
    <option value="RR">Roraima</option>
    <option value="SC">Santa Catarina</option>
    <option value="SP">São Paulo</option>
    <option value="SE">Sergipe</option>
    <option value="TO">Tocantins</option>
    <option value="0" selected></option>
</select>
  		<!--<input class="u-full-width" type="text" name="uf" id="uf"  placeholder="UF" maxlength="2" value="<?php echo  $_SESSION["estado"] ?>">-->   
  	</div>

  </div>

  <div class="row">
  	<div class="senha1 six columns">
  		<label>Senha</label>
  		<input class="u-full-width" type='password' id='senha1' name='senha1' placeholder="Senha" maxlength="15" value=''>

  	</div>
  	<div class="senha2 six columns">
  		<label>Redigite a Senha</label>
  		<input class="u-full-width" type='password' id='senha2' name='senha2' placeholder="Redigite a Senha" maxlength="15" value=''>

  	</div>

  </div>

  <div class="row botao">
  	<div id="alerta-loader-cadastro"></div>
  	<button id="botao_cadastro" onclick="cadastra_usuario()" type='button' name='insere' class='button button-primary'>Cadastrar</button>
  </div>

</form>

</div>
</div>

<div id="info"></div>


<style>

#titulo h1{
	text-align: left!important;
	border-bottom: 5px solid seagreen;
	margin-bottom: 50px;
	padding-bottom: 5px;
}

#pessoa-cnpj {
	display: none;
}

#loader {
	position: absolute;
	display: none;
	border: 2px dotted green; 
	border-right: 2px solid red; 
	border-top: 2px solid blue; 
	border-bottom: 2px solid lightblue; 
	border-radius: 100%;
	width: 30px;
	height: 30px;
	animation: spin 2s linear infinite;
	top: 50%;
	margin-top: 30px;
	left: 50%;
	margin-left: -30px;
}

@keyframes spin {
	0% { transform: rotate(0deg); }
	100% { transform: rotate(360deg); }
}


#info {
	display: none;
	width: 100%;
	background: yellow;
	max-width: 500px;
	margin: 0 auto;
	margin-bottom: 20px;
	padding: 20px;
	text-align: center;
}


#cnt-cadastro, #logar {
	display: none;

}



#cnt-cadastro label {
	font-size: 10px;
	font-weight: bold;
	margin-bottom: 0;
}

#cnt-logar {
	width: 100%;
	max-width: 600px;
	margin: 0 auto;
	margin-bottom: 20px;
	padding: 20px;
	color: black;
	display: -moz-box;
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;
    align-items: stretch;
    align-content: center;
    justify-content: center;
    flex-wrap: wrap;
}


#v_email {
	width: 100%;
	max-width: 600px;
	margin: 0 auto;
	margin-bottom: 20px;
	padding: 20px;
	color: black;
	display: -moz-box;
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;
    align-items: stretch;
    align-content: center;
    justify-content: center;
    flex-wrap: wrap;
}

input {
	color: black;
}

#cnt-logar, #cnt-logar .button-primary {
	background: seagreen;
	width: 100%;
}

#cnt-logar, #cnt-logar .button {
	background: white;
	border-color: dodgerblue;
	width: 100%;
}

#cnt-logar input, #logar input {
	width: 100%;
	height: 48px;
}

#cnt-logar, #cnt-logar label {
	width: 100%;

}


#titulo-cadastro {
	font-size: 20px;
	line-height: 30px;
	padding: 10px 20px;
	margin-bottom: 30px;
	width: 100%;
	background: black;
	color: white;
}


#logar {
position: relative;
}

@media (min-width: 768px) {

#cnt-logar input, #cnt-logar .button-primary{
	width: 70%;
	height: 48px;
	margin-bottom: 0;
}

#cnt-logar .button-primary, #cnt-logar .button-primary{
	width: 30%;
	height: 48px;
	margin-bottom: 0;
	line-height: 0;
}

}


</style>

<script>

	var cadastro = document.getElementById("cnt-cadastro");
	var cnt_logar = document.getElementById("cnt-logar");
	var info = document.getElementById("info");

	function verificaEmail() {

		info.style.display = "none";
		var email = document.getElementById("email").value;
		if(validEmail(email) == false) {
			info.innerHTML = "Digite um email válido!";
			info.style.display = "block";
		} else {

			xhr = new XMLHttpRequest();
			xhr.open('POST', '<?php  echo myUrl('usuario/verifica_email/') ?>');
			xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
			xhr.onload = function() {
				if (xhr.status === 200) {
					if(xhr.responseText != "0") {
						document.getElementById("v_email").style.display = "none";
						document.getElementById("logar").style.display = "block";
					} else {
						if(xhr.responseText == "0" || xhr.responseText == 0) {
							if(email == "") {
								info.innerHTML = "Email não cadastrado!";
								info.style.display = "block";
							} else {
								novo_email.value = email;
								cadastro.style.display = "block";
								cnt_logar.style.display = "none";
							}
						} else {
							document.getElementById("cnt-logar").style.display = "none";
						}
					}
				}
				else if (xhr.status !== 200) {
					alert(xhr.status);
				}
			};
			xhr.send(encodeURI('email=' + email));
		}
		
	}

	function logar() {

		var o_info = document.getElementById("info");
		var o_alerta_loader = document.getElementById("alerta-loader");
		var email = document.getElementById("email").value;
		var senha = document.getElementById("senha").value;

		xhr = new XMLHttpRequest();
		xhr.open('POST', '<?php  echo myUrl('usuario/logar/') ?>');
		xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		xhr.onload = function() { 
			if (xhr.status === 200) {
				if(xhr.responseText != "0") {
					o_alerta_loader.style.display = "block";
										setTimeout(function(){  
						window.location.href = xhr.responseText;  
					}, 1000);
				} else {
					o_info.style.display = "block";
					o_info.innerHTML = "Senha incorreta ou usuário não cadastrado.";
				}
			}
			else if (xhr.status !== 200) {
				alert(xhr.status);
			}
		};
		xhr.send(encodeURI(
			'email=' + email 
			+ '&senha=' + senha
			));
	}

	function cadastra_usuario() {

		var info ="";
		var o_alerta_loader = document.getElementById("alerta-loader-cadastro");
		var o_info =  document.getElementById("info");
		var o_email =  document.getElementById("email");
		var o_nome =  document.getElementById("nome");
		var o_telefone =  document.getElementById("telefone");
		var o_celular =  document.getElementById("celular");
		var o_endereco =  document.getElementById("endereco");
		var o_numero =  document.getElementById("numero");
		var o_bairro =  document.getElementById("bairro");
		var o_complemento =  document.getElementById("complemento");
		var o_cep =  document.getElementById("cep");
		var o_cidade =  document.getElementById("cidade");
		var o_uf =  document.getElementById("estados");
		var o_cpf =  document.getElementById("cpf");
		var o_cnpj =  document.getElementById("cnpj");
		var o_senha1 =  document.getElementById("senha1");
		var o_senha2 =  document.getElementById("senha2");




		if(o_senha2.value.length < 8) {
			info = "Digite a senha! Minimo 8 digitos.";
			o_info.style.display = "block";
			o_senha2.style.borderLeft = "5px solid red";
		} else {
			o_senha2.style.borderLeft = "0";
		}

		if(o_senha1.value.length < 8) {
			info = "Digite a senha! Minimo 8 digitos.";
			o_info.style.display = "block";
			o_senha1.style.borderLeft = "5px solid red";
		} else {
			o_senha1.style.borderLeft = "0";
		}

		if(o_senha1.value != o_senha2.value) {
			info = "Senhas não conferem.";
			o_info.style.display = "block";
			o_senha1.style.borderLeft = "5px solid red";
		} else {
			o_senha1.style.borderLeft = "0";
		}		

		
		if(validar_estado() == false) {
			info = "Escolha o estado!";
			o_info.style.display = "block";
			o_uf.style.background = "gold";
		}

		if(o_cidade.value.length <= 3) {
			info = "Digite o nome da cidade!";
			o_info.style.display = "block";
			o_cidade.style.borderLeft = "5px solid red";
		} else {
			o_cidade.style.borderLeft = "0";
		}

		if(o_bairro.value.length <= 3) {
			info = "Digite o nome do seu bairro!";
			o_info.style.display = "block";
			o_bairro.style.borderLeft = "5px solid red";
		} else {
			o_bairro.style.borderLeft = "0";
		}	

		if(o_celular.value.length <= 3) {
			info = "Digite seu numero de celular!";
			o_info.style.display = "block";
			o_celular.style.borderLeft = "5px solid red";
		} else {
			o_celular.style.borderLeft = "0";
		}

		if(o_numero.value.length <= 0) {
			info = "Digite o numero do endereço!";
			o_info.style.display = "block";
			o_numero.style.borderLeft = "5px solid red";
		} else {
			o_numero.style.borderLeft = "0";
		}		

		if(o_endereco.value.length <= 3) {
			info = "Digite seu endereço!";
			o_info.style.display = "block";
			o_endereco.style.borderLeft = "5px solid red";
		} else {
			o_endereco.style.borderLeft = "0";
		}

		if(o_nome.value.length <= 3) {
			info = "Digite seu nome!";
			o_info.style.display = "block";
			o_nome.style.borderLeft = "5px solid red";
		} else {
			o_nome.style.borderLeft = "0";
		}

		if(validEmail(o_email.value) == false) {
			info = "Digite seu email!";
			o_info.style.display = "block";
			o_email.style.borderLeft = "5px solid red";
		} else {
			o_email.style.borderLeft = "0";
		}

		if(o_cep.value.length < 8) {
			info = "Digite o cep!";
			o_info.style.display = "block";
			o_cep.style.borderLeft = "5px solid red";
		} else {
			o_cep.style.borderLeft = "0";
		}

		var pessoa = document.getElementsByName('pessoa');
		var cadastrar_pessoa = "cpf";

		for (var p of pessoa)
		{
			if (p.checked) {
				if(p.value == "cpf") {
					if(TestaCPF(o_cpf.value) == false) {
						info = "Digite o CPF corretamente. Sem pontos, traço ou virgula.";
						o_info.style.display = "block";
					}
				} else {
					if(validarCNPJ(o_cnpj.value) == false) {
						info = "Digite corretamente o CNPJ. Sem pontos, traço ou virgula.";
						o_info.style.display = "block";
					}
				} 
			}
		}


		o_info.innerHTML = info; 

		if(info == "") {

			xhr = new XMLHttpRequest();

			xhr.open('POST', '<?php  echo myUrl('usuario/cadastra_usuario/') ?>');
			xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
			xhr.onload = function() {
				if (xhr.status === 200) {
					if(xhr.responseText != "0" || xhr.responseText != 0) {
						setTimeout(function(){  
							window.location.href = xhr.responseText;  
						}, 1000);
					} else {
						document.getElementById("info").innerHTML = "Erro ao processar a página.";
					}
				}
				else if (xhr.status !== 200) {
					alert(xhr.status);
				}
				o_alerta_loader.style.display = "block";
				document.getElementById("info").innerHTML = xhr.responseText;
			};
			xhr.send(encodeURI(
				'novo_email=' + o_email.value 
				+ '&nome=' + o_nome.value
				+ '&telefone=' + o_telefone.value
				+ '&telefone=' + o_celular.value			
				+ '&endereco=' + o_endereco.value
				+ '&numero=' + o_numero.value
				+ '&complemento=' + o_complemento.value
				+ '&bairro=' + o_bairro.value
				+ '&cidade=' + o_cidade.value
				+ '&estado=' + o_uf.options[estados.selectedIndex].value
				+ '&cep=' + o_cep.value
				+ '&cpf=' + o_cpf.value
				+ '&cnpj=' + o_cnpj.value
				+ '&senha1=' + o_senha1.value
				+ '&senha2=' + o_senha2.value
				+ '&cadastrar_pessoa=' + cadastrar_pessoa
				));	
		}
	}



	function TestaCPF(strCPF) {
		var Soma;
		var Resto;
		Soma = 0;
		if (strCPF == "00000000000") return false;

		for (i=1; i<=9; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (11 - i);
			Resto = (Soma * 10) % 11;

		if ((Resto == 10) || (Resto == 11))  Resto = 0;
		if (Resto != parseInt(strCPF.substring(9, 10)) ) return false;

		Soma = 0;
		for (i = 1; i <= 10; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (12 - i);
			Resto = (Soma * 10) % 11;

		if ((Resto == 10) || (Resto == 11))  Resto = 0;
		if (Resto != parseInt(strCPF.substring(10, 11) ) ) return false;
		return true;
	}


	function validEmail(email) {
		var filter = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
		if(!filter.test(email)) {
			return false;
		} else {
			return true;
		}

	}


	function esqueci_a_senha() {

		var loader = document.getElementById("loader");
		loader.style.display = "block";

		var email = document.getElementById("email").value;
		var info = document.getElementById("info");

		if(email == "") {
			info.style.display = "block";
			info.innerHTML = "Digite o email!";
		} else {
			xhr = new XMLHttpRequest();
			xhr.open('POST', '<?php echo myUrl('tao/logar_esqueci_senha/') ?>');
			xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
			xhr.onload = function() {
				if (xhr.status === 200) {
					loader.style.display = "none";
					info.style.display = "block";
					info.innerHTML = xhr.responseText;
				}
				else if (xhr.status !== 200) {
					/*alert(xhr.status);*/
				}
			};
			xhr.send(encodeURI('email=' + email));
		}
	}


	function desabilita(pa,pb) {

		var pa = document.querySelector("#pessoa-"+pa);
		var pb = document.querySelector("#pessoa-"+pb);
		pa.style.display = "none";
		pb.style.display = "block";

	}


	function validarCNPJ(cnpj) {

		cnpj = cnpj.replace(/[^\d]+/g,'');

		if(cnpj == '') return false;

		if (cnpj.length != 14)
			return false;

    // Elimina CNPJs invalidos conhecidos
    if (cnpj == "00000000000000" || 
    	cnpj == "11111111111111" || 
    	cnpj == "22222222222222" || 
    	cnpj == "33333333333333" || 
    	cnpj == "44444444444444" || 
    	cnpj == "55555555555555" || 
    	cnpj == "66666666666666" || 
    	cnpj == "77777777777777" || 
    	cnpj == "88888888888888" || 
    	cnpj == "99999999999999")
    	return false;

    // Valida DVs
    tamanho = cnpj.length - 2
    numeros = cnpj.substring(0,tamanho);
    digitos = cnpj.substring(tamanho);
    soma = 0;
    pos = tamanho - 7;
    for (i = tamanho; i >= 1; i--) {
    	soma += numeros.charAt(tamanho - i) * pos--;
    	if (pos < 2)
    		pos = 9;
    }
    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
    if (resultado != digitos.charAt(0))
    	return false;

    tamanho = tamanho + 1;
    numeros = cnpj.substring(0,tamanho);
    soma = 0;
    pos = tamanho - 7;
    for (i = tamanho; i >= 1; i--) {
    	soma += numeros.charAt(tamanho - i) * pos--;
    	if (pos < 2)
    		pos = 9;
    }
    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
    if (resultado != digitos.charAt(1))
    	return false;

    return true;
    
}

function validar_estado() {
  var estados = document.getElementById("estados");
    var x = estados.options[estados.selectedIndex].value;
     if (x == "0" || x == null) {
        return false;
     };
  }

</script>

