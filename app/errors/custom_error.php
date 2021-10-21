<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN">
<html>
<head>
<title>Fatal Error!</title>
</head>

<body>


	<div class="container">

		<div  class="erro">Fatal Error!...</div>

		<div class="texto">
<p style="font-weight:bold;color:#F00"><?=$msg?></p>
			
			<hr />
			<p>Powered By: <a href="http://taowebsystem.com.br"><?php echo $GLOBALS['sitename']?></a></p>

		</div>

	</div>


<style>

.container {
  background: #0F7DC2;
  font-family: "arial";

  width: 100%;
  height: 100%;
  display: -webkit-box;
  display: -moz-box;
  display: -ms-flexbox;
  display: -webkit-flex;
  display: flex;
  align-content: center;
  align-items: center;
  justify-content: center;
  flex-wrap: wrap;
  color: white;
}

.container div {
  width: 100%;
  padding: 10px;
  box-sizing: border-box;
}

.erro  {
  font-size: 50px;
  text-align: center; 
} 

.texto  {
  font-size: 16px;
  text-align: center;
}

a {
  text-decoration: none;
  color: navy;
}

a:hover {
  text-decoration: underline;
}


@media (min-width: 800px) {

.container {
  width: 100%;
  height: 100%;
  display: -webkit-box;
  display: -moz-box;
  display: -ms-flexbox;
  display: -webkit-flex;
  display: flex;
  align-content: center;
  align-items: center;
  justify-content: center;
  color: white;
}

.container div {
  width: 40%;
  padding: 2%;
}

.erro  {
  font-size: 100px;
  text-align: right; 
  border-right: 1px solid white; 

} 

.texto  {
  font-size: 20px;
  text-align: left;
}

}

</style>


</body>

</html>