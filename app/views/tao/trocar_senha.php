<!doctype html>
<html lang="pt-BR" dir="ltr">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="TAO Shelley Araujo">
	<link rel="icon" type="image/png" href="imagens/favicon.png">
</head>

<body>

	<div id="cnt-logar">
		<div>
			<p><span>TAO</span>Web System</p>
		</div>
		<div id="logar">
			<div id="loader"></div>
			<div id="form-logar">
				<label>Email:</label>
				<input type="text" name="email" maxlength="50" id="email" value="<?php echo $email ?>" placeholder="email">
				<label>Senha:</label>
				<input type="password" maxlength="15" name="senha" id="senha" value="" placeholder="senha">
				<input type="password" maxlength="15" name="senha2" id="senha2" value="" placeholder="Redigite a senha">
				<input type="hidden" name="logar" value="logar">
				<input type="hidden" name="codigo" id="codigo" value="<?php echo $codigo ?>" placeholder="email">
				<button onclick="verificar()">Trocar Senha</button>
			</div> 
		</div>
	</div>

	<div id="info" onclick="close_info()">
		loading...
	</div>

	<style>

	h1 {
		color: white;
		font-size: 16px;	
	}

	#logar {
		position: relative;
	}

	#loader {
		position: absolute;
		display: none;
		border: 2px dashed mediumvioletred; 
		border-right: 2px dashed mediumvioletred; 
		border-top: 2px dashed mediumvioletred; 
		border-bottom: 2px dashed mediumvioletred; 
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
		position: absolute;
		top: 50%;
		left: 50%;
		margin-left: -175px;
		width: 300px;
		background-color: lightblue;
		padding: 25px;
		text-align: center;
	}

	body {
		background-color: aliceblue;
		padding: 0;
		margin: 0;
		font-family: "Raleway", "HelveticaNeue", "Helvetica Neue", Helvetica, Arial, sans-serif;
	}

	#cnt-logar {
		position: absolute;
		width: 100%;
		height: 100%;
		display: flex;
		justify-content: center;
		align-items: flex-start;
		align-content: center;
		flex-wrap: wrap;
		background-image: linear-gradient(to right, #0b407a, #0f4f8a, #135e99, #196da8, #207db7, #1388be, #0492c4, #009dc9, #00a4c5, #00aabe, #1fb0b7, #3cb5ae);	

	}

	#cnt-logar > div {
		width: 100%;
		box-sizing: border-box;
		text-align: center;
	}

	#cnt-logar > div p {
		width: 300px;
		margin: auto;
		text-align: left;
	}

	#cnt-logar > div span {
		font-size: 50px;
		font-weight: bold;
		margin-right: 10px;
		color: lightblue;
	}


	#logar {
		display: block;
		width: 100%;
		max-width: 300px;
		border: 0px solid #cae1ff;
		padding: 20px;
		box-sizing: border-box;
		background-color: #cae1ff;
		text-align: left;
		background-image: linear-gradient(to right top, #ffea00, #ffd300, #ffbc00, #ffa400, #ff8d00);
		-webkit-box-shadow: 1px 9px 20px 0px rgba(0,0,0,0.75);
		-moz-box-shadow: 1px 9px 20px 0px rgba(0,0,0,0.75);
		box-shadow: 1px 9px 20px 0px rgba(0,0,0,0.75);
	}

	#form-logar label{
		width: 100%;
		box-sizing: border-box;
		text-align: left;
		display: block;
	}

	#form-logar input{
		width: 100%;
		padding: 5px;
		height: 40px;
		box-sizing: border-box;
		border: 1px solid #cae1ff;
		margin-bottom: 10px;
	}

	#form-logar button{
		background-color: #1E8FFF;
		border: 0;
		padding: 5px 20px;
		height: 40px;
		color: white;
		width: 100%;
		margin-top: 10px;
	}

</style>

<script>

	function verificar() {

		var email = document.getElementById("email");
		var senha = document.getElementById("senha");
		var senha2 = document.getElementById("senha2");
		var info = "1";

		if(email.value == "") {
			info.style.display = "block";
			info.innerHTML = "Digite o Email";
			info = "0";
			return false;
		} 

		if(senha.value == "") {
			info.style.display = "block";
			info.innerHTML = "Digite a senha!";
			info = "0";
			return false;
		} 

		if(senha.value == "") {
			alert("Digite a senha!");
			info = "0";
			return false;
		} 

		if(senha.value != senha2.value) {
			alert("Senhas não conferem!");
			info = "0";
			return false;
		}

		if(info == "1") {
			esqueci_a_senha();
		}
	}

	function close_info() {
		var info = document.getElementById("info");
		info.style.display = "none";
	}

	function esqueci_a_senha() {

		var loader = document.getElementById("loader");
		loader.style.display = "block";

		var email = document.getElementById("email").value;
		var senha = document.getElementById("senha").value;
		var codigo = document.getElementById("codigo").value;
		var info = document.getElementById("info");

		xhr = new XMLHttpRequest();
		xhr.open('POST', '<?php echo myUrl('tao/logar_update_senha/') ?>');
		xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		xhr.onload = function() {
			if (xhr.status === 200) {
				loader.style.display = "none";
				info.style.display = "block";
				info.innerHTML = xhr.responseText;
				window.location.href = "/tao"; 
			}
			else if (xhr.status !== 200) {
				/*alert(xhr.status);*/
			}
		};
		xhr.send(encodeURI('email=' + email + "&senha=" + senha + "&codigo=" + codigo));
	}


</script>

</body>

</html>

