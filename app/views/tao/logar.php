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
			<h1><img id="logo" src="/../<?php echo myURL() ?>/imagens/logo.png" alt="logo" width="" height=""></h1>
		</div>
		<div id="logar">
			<form id="form-logar" method="POST" onsubmit="return verificar()" action="<?php echo myUrl('tao/logar/') ?>">
				<label>Email:</label>
				<input type="text" name="email" maxlength="50" id="email" value="" placeholder="email">
				<label>Senha:</label>
				<input type="password" maxlength="15" name="senha" id="senha" value="" placeholder="senha">
				<input type="hidden" name="logar" value="logar">
				<button type="submit">Logar</button>
				<br><br>
				<a href="javascript:void(0)" onclick="esqueci_a_senha()">Esqueci a senha</a>
			</form> 
			<div id="loader"></div>

		</div>
	</div>

	<div id="info" onclick="close_info()">
		loading...
	</div>

	<style>

		#logo {
			width: 100%;
			max-width: 200px;
		}

		h1 {
			color: white;
			font-size: 16px;	
		}

		#logar {
			position: relative;
			font-size: 12px;
			text-transform: uppercase;
		}

		#loader {
			position: absolute;
			display: none;

 border: 15px solid black; 
  border-right: 15px solid red; 
  border-top: 15px solid gold; 
  border-bottom: 15px solid dodgerblue; 

  			border-radius: 100%;
			width: 100px;
			height: 100px;
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
			padding: 0;
			margin: 0;
			font-family: "Raleway", "HelveticaNeue", "Helvetica Neue", Helvetica, Arial, sans-serif;
			background: #103443; /* Old browsers */
			background-image: linear-gradient(to right bottom, #103443, #1d4658, #2a596e, #386d84, #46829b);
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
			border: 0px solid skyblue;
			padding: 20px;
			box-sizing: border-box;
			background: white;
			text-align: left;
			-moz-box-shadow: 1px 9px 20px 0px rgba(0,0,0,0.75);
			box-shadow: 1px 9px 20px 0px rgba(0,0,0,0.75);
			border-radius: 5px;
		}

		#logar a {
			text-decoration: none;
			color: black;
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
			border: 1px solid silver;
			margin-bottom: 10px;
		}

		#form-logar button{
			background-color: #20B36D;
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

			if(email.value == "") {
				info.style.display = "block";
				info.innerHTML = "Digite o Email";
				return false;
			} 

			if(senha.value == "") {
				info.style.display = "block";
				info.innerHTML = "Digite a senha";
				return false;
			} 

			if(senha.value == "") {
				alert("Digite a senha");
				return false;
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

</body>

</html>

