<?php 

$url = $_SERVER['SERVER_NAME'];

$url_edicao=""; 

if(isset($_SESSION["visualizar"])) {
	$url_edicao = $_SESSION["visualizar"];
}

if(!isset($_SESSION["logado"])){
		header('Location: ' . myUrl('tao/logar/') );

		//echo "<div class='clique-aqui-logar'><a href='" .  myUrl('tao/logar/') . "''>Clique aqui para logar no TAO System</a></div>";
	die();
}

$url = $_SERVER['SERVER_NAME'];

?>


<header>

	<div class="icones-menus">
		<div>
			<div class="icone-tao"></div> 
		</div>    
	</div>

	<div class="painel">
		<div class="p-a">
			<a href="<?php echo myUrl("tao/index")?>"><img id="logo" src="<?php echo myUrl("")?>app/views/tao/imagens/logo.png" alt="logo" width="50" height=""></a><span style="font-size: 10px; color: lightblue">05-20</span>
		</div>
		<div class="p-b">
			<div>
				Logado: <?php echo $_SESSION["email"]  ;?>				
			</div>
			<div>
				<?php echo "<a href='" . myUrl("./main/") . "' target='_blank'>". $url ."</a>"; ?>
			</div>
			<div>
				<a href="<?php echo myUrl("tao/logar/?logar=0"); ?>">Sair<span class="icone_logout"></span></a>
			</div>
		</div>
		<div class="p-c">
			<div class="tao-visualizar"><?php echo $url_edicao; ?></div>
		</div>
	</div>

</header>

<style>

.Xicone_logout {
	position: relative;
	margin-left: 10px;
	background-color: transparent;
	padding: 0 8px;
	border: 1px solid red;
	border-right: 1px solid transparent;
	border-bottom: 1px solid transparent;
	border-radius: 3px;
}

.Xicone_logout:before {
	content: "";
	position: absolute;
	border-top: 3px solid transparent;
	border-bottom: 3px solid white;
	border-left: 3px solid transparent;
	border-right: 3px solid red;
	width: 8px;
	height: 8px;
	right: -1px;
	top: 6px;
	
}

.Xicone_logout:after {
	content: "";
	position: absolute;
	border-top: 3px solid white;
	width: 15px;
	height: 3px;
	right: -1px;
	top: 11px;
	-moz-transform: rotate(45deg);
	-webkit-transform: rotate(45deg);
	-o-transform: rotate(45deg);
	-ms-transform: rotate(45deg);
	transform: rotate(45deg);

}


.icone_logout {
	position: relative;
	padding-right: 25px;
}

.icone_logout:before {
	content: "";
	position: absolute;
	color: transparent; 
	border: 1px solid red;
	width: 10px;
	height: 10px;
	padding: 8px;
	box-sizing: border-box;
	border-radius: 50%;
	line-height: 0;
	font-size: 0;
	top: 0;
	right: 0;
}

.icone_logout:after {
	content: "";
	color: black; 
	cursor: pointer;
	border-left: 2px solid red;
	width: 2px;
	height: 11px;
	position: absolute;
	top: -2px;
	right: 6px;
}


.tao-visualizar a {
	color: white!important;
	background-color: transparent;
	border: 0;    
	font-size: 10px;
	position: relative;
	box-sizing: border-box;
	padding-left: 30px;
}

.tao-visualizar .button {
	position: relative;
	color: transparent;
	border: 0px solid red;
	box-sizing: border-box;
	margin: 0;
}

.tao-visualizar .button:hover {
	position: relative;
	background-color: lightblue;
}

.tao-visualizar a:before {
	content: "";
	position: absolute;
	padding: 4px;
	border-radius: 100%;
	background-color: transparent;
	border: 2px solid #e9ecef;
	top: 15px;
	left: 8px;
}

.tao-visualizar a:after {
	content: "";
	position: absolute;
	top: 5px;
	left: -5px;
	padding: 17px;
	background-color: transparent;
	border: 2px solid #e9ecef;
	border-right: 2px solid transparent;
	border-bottom: 2px solid transparent;
	border-radius: 100%;
	transform: rotate(45deg) scale(0.668) skew(-4deg) translate(0px);
	-webkit-transform: rotate(45deg) scale(0.668) skew(-4deg) translate(0px);
	-moz-transform: rotate(45deg) scale(0.668) skew(-4deg) translate(0px);
	-o-transform: rotate(45deg) scale(0.668) skew(-4deg) translate(0px);
	-ms-transform: rotate(45deg) scale(0.668) skew(-4deg) translate(0px);

}

header .painel {
	display: flex;
	justify-content: center;
	align-items: center;
	align-items: center;
	z-index: 1;
	background-color: #2E4053;
	border-bottom: 0px solid skyblue;
	margin-bottom: 0px;
}

header .p-a  {
	display: flex;
	justify-content: flex-start;
	align-items: flex-start;
	align-items: center;
}


header .p-b  {
	display: flex;
	justify-content: flex-start;
	align-items: flex-start;
	align-items: center;
	color: black;
}

header .p-b div {
	padding-right: 15px;
	color: white;
}
header .p-a div a {
	color: white;
	text-decoration: none;
}

header .painel > div{
	padding: 0;
}


header .button{
	margin: 15px;
}

header a {
	color: white;
}

header img {
	max-width: 100px;
	height: auto!important;
	margin: 0 auto;
	margin-top: 10px;
	margin-left: 10px;
	margin-right: 5px;
}

header .p-b div a {
}
header .p-a  a {
}
header .p-b div  {
	width: 100%;
}


@media (max-width: 550px) {

	header .painel {
		position: static;
	}

	header .p-a   {
		text-align: center;
	}

	header .p-b  {
		display: flex;
		align-items: center;
		align-content: center;
		justify-content: center;
		background-color: aliceblue;
		flex-wrap: wrap;
		text-align: center;
	}
	header .p-c   {
		text-align: center;
	}

	header .p-b div  {
		width: 100%;
	}

}


</style>

<div id="info"></div>
<div id="msg"><div class="msg" onclick="closeInfo()"></div></div>

<script>
  var msg_cnt = document.querySelector("#msg");
  var msg_info = document.querySelector(".msg");

  function closeInfo(){
  	msg_cnt.style.display="none";
  }


</script>

