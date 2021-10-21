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
if(!isset($_SESSION["cpfcnpj"])){$_SESSION["cpfcnpj"] = "";}
?>

<div id="cnt-logar">
	<div id="v_email">
		<label>Diigite seu Email:</label>
		<input type="text" id="email" name="email" value="" placeholder="Digite seu email" />
		<input type="button" name="verifica_email" value="Enviar" onclick="verificaEmail()" class="button" />
	</div>

	<div id="logar">
		<label>Diigite a Senha:</label>
		<input type="password" id="senha" name="senha" value="" placeholder="Digite sua senha" maxlength="15"/>
		<input type="button" name="logar" value="Fazer Login" onclick="logar()" class="button" />
		<a href="javascript:void(0)" onclick="esqueci_a_senha()" class="btn-link">Esqueci minha senha.</a>
		<div id="loader"></div>
	</div>
</div>

<div id="cnt-cadastro">

	<div id="titulo-cadastro">Dados Cadastrais</div>

	<div id="cadastro">

		<form id="form-cadastro" name="form-cadastro" method="POST">
      <!--
      <legenda>Data Nascimento:</legenda>
      <input type="text" id="dia" name="dia" placeholder="Dia" maxlength="2" value="<?php echo $_SESSION["dia"] ?>" style="width: 50px; display:inline;">
      <input type="text" id="mes" name="mes" placeholder="Mês" maxlength="2" value="<?php echo $_SESSION["mes"] ?>" style="width: 50px; display:inline;">
      <input type="text" id="ano" name="ano" placeholder="Ano" maxlength="4" value="<?php echo $_SESSION["ano"] ?>" style="width: 100px; display:inline;">
  -->

  <div class="email">
  	<input type="text" id="novo_email" name="novo_email" placeholder="Email" maxlength="50" value="<?php echo $_SESSION["novo_email"] ?>">
  </div>

  <div class="nome">
  	<input type="text" id="nome" name="nome" placeholder="Nome" maxlength="50" value="<?php echo $_SESSION["nome"] ?>">
  </div>

  <div class="endereco">
  	<input type="text" id="endereco" name="endereco" placeholder="Endereço" maxlength="250" value="<?php echo  $_SESSION["endereco"] ?>">   
  </div>
  <div class="numero">
  	<input type="text" id="numero" name="numero" placeholder="Número" maxlength="10" value="<?php echo $_SESSION["numero"] ?>">   
  </div>
  <div class="telefone">
  	<input type="text" id="telefone" name="telefone" placeholder="Telefone" maxlength="15" value="<?php echo  $_SESSION["telefone"] ?>">   
  </div>
  <div class="celular">
  	<input type="text" id="celular" name="celular" placeholder="Celular" maxlength="15" value="<?php echo  $_SESSION["celular"] ?>">   
  </div> 
  <div class="bairro">
  	<input type="text" id="bairro" name="bairro" placeholder="Bairro" maxlength="50" value="<?php echo  $_SESSION["bairro"] ?>">   
  </div>
  <div class="complemento">
  	<input type="text" id="complemento" name="complemento" placeholder="complemento" value="">   
  </div>
  <div class="cidade">
  	<input type="text" id="cidade" name="cidade" placeholder="Cidade" maxlength="50" value="<?php echo  $_SESSION["cidade"] ?>">   
  </div>
  <div class="estado">
  	<input type="text" id="estado" name="estado" placeholder="Estado" maxlength="2" value="<?php echo  $_SESSION["estado"] ?>">   
  </div>
  <div class="cep">
  	<input type="text" id="cep" name="cep" placeholder="CEP" maxlength="8" value="<?php echo  $_SESSION["cep"] ?>">   
  </div>
  <div class="cpfcnpj">
  	<input type="text" id="cpfcnpj"  name="cpfcnpj" placeholder="CPF/CNPJ" maxlength="11" value="<?php echo  $_SESSION["cpfcnpj"] ?>">   
  </div>
  <div class="senha1">
  	<input type='password' id='senha1' name='senha1' placeholder="Senha" maxlength="15" value=''>
  </div>
  <div class="senha2">
  	<input type='password' id='senha2' name='senha2' placeholder="Redigite a Senha" maxlength="15" value=''>
  </div>
  <div class="botao">
  	<button onclick="cadastra_usuario()" type='button' name='insere' class='button'>Cadastrar</button>
  </div>

</form>

</div>
</div>

<div class="" id="info"></div>

  <?php include_once "css/login_form.php"; ?>

<script>

	var cadastro = document.getElementById("cnt-cadastro");
	var cnt_logar = document.getElementById("cnt-logar");

	function verificaEmail() {

		var novo_email = document.getElementById("novo_email");

		var email = document.getElementById("email").value,
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
							alert("Digite um email válido!");
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

	function logar() {

		var o_info = document.getElementById("info");
		var email = document.getElementById("email").value;
		var senha = document.getElementById("senha").value,
		xhr = new XMLHttpRequest();

		xhr.open('POST', '<?php  echo myUrl('usuario/logar/') ?>');
		xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		xhr.onload = function() { 
			if (xhr.status === 200) {
				if(xhr.responseText != "0") {
					alert("Você será redirecionando para a página de pagamento.");
					setTimeout(function(){  
						window.location.href = xhr.responseText;  
					}, 300);
				} else {
					o_info.style.display = "block";
					o_info.innerHTML = "Erro ao processar a página.";
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
		var o_info =  document.getElementById("info");
		var o_email =  document.getElementById("novo_email");
		var o_nome =  document.getElementById("nome");
		var o_telefone =  document.getElementById("telefone");
		var o_celular =  document.getElementById("celular");
		var o_endereco =  document.getElementById("endereco");
		var o_numero =  document.getElementById("numero");
		var o_bairro =  document.getElementById("bairro");
		var o_complemento =  document.getElementById("complemento");
		var o_cep =  document.getElementById("cep");
		var o_cidade =  document.getElementById("cidade");
		var o_estado =  document.getElementById("estado");
		var o_cpfcnpj =  document.getElementById("cpfcnpj");
		var o_senha1 =  document.getElementById("senha1");
		var o_senha2 =  document.getElementById("senha2");

		if(o_senha2.value.length < 15) {
			info = "Senhas conferem!";
			o_info.style.display = "block";
			o_senha2.style.borderLeft = "5px solid red";
		} else {
			o_senha2.style.borderLeft = "0";
		}

		if(o_senha1.value.length < 15) {
			info = "Digite a senha! Minimo 15 caracteres.";
			o_info.style.display = "block";
			o_senha1.style.borderLeft = "5px solid red";
		} else {
			o_senha1.style.borderLeft = "0";
		}

		if(o_cpfcnpj.value.length <= 3) {
			info = "Digite o seu cpf ou cnpj!";
			o_info.style.display = "block";
			o_cpfcnpj.style.borderLeft = "5px solid red";
		} else {
			o_cpfcnpj.style.borderLeft = "0";
		}

		if(o_cep.value.length < 8) {
			info = "Digite o cep!";
			o_info.style.display = "block";
			o_cep.style.borderLeft = "5px solid red";
		} else {
			o_cep.style.borderLeft = "0";
		}

		if(o_estado.value.length != 2) {
			info = "Digite a sigla do estado!";
			o_info.style.display = "block";
			o_estado.style.borderLeft = "5px solid red";
		} else {
			o_estado.style.borderLeft = "0";
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

		o_info.innerHTML = info; 

		if(info == "") {

			xhr = new XMLHttpRequest();

			xhr.open('POST', '<?php  echo myUrl('usuario/cadastra_usuario/') ?>');
			xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
			xhr.onload = function() {
				if (xhr.status === 200) {
					if(xhr.responseText != "0" || xhr.responseText != 0) {
						alert("Você será redirecionando para a página de pagamento.");
						setTimeout(function(){  
							window.location.href = xhr.responseText;  
						}, 300);
					} else {
						document.getElementById("info").innerHTML = "Erro ao processar a página.";
					}
				}
				else if (xhr.status !== 200) {
					alert(xhr.status);
				}
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
				+ '&estado=' + o_estado.value
				+ '&cep=' + o_cep.value
				+ '&cpfcnpj=' + o_cpfcnpj.value
				+ '&senha1=' + o_senha1.value
				+ '&senha2=' + o_senha2.value
				));	
		}
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

</script>