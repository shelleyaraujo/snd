<?php header("HTTP/1.0 500 Internal Server Error: Uncaught Exception"); ?>
<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN">

<html>
<head>
	<title>Exception Occurred</title>
</head>
<body>

	<div class="container">

		<div  class="erro">Exception Occurred</div>

		<div class="texto">
			<p><?=isset($message) ? "<pre>$message</pre>":'Unknown uncaught exception occured.';?></p>
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
  font-size: 20px;
  text-align: center; 
} 

.texto  {
  font-size: 16px;
  text-align: center;
  word-break: break-all;
  -webkit-hyphens: auto;
  -moz-hyphens: auto;
  -ms-hyphens: auto;
  hyphens: auto;
  overflow: hidden;
}

a {
  text-decoration: none;
  color: navy;
}


pre {
  -ms-word-break: break-all;
  word-break: break-all;
  word-break: break-word;
   word-wrap: break-word;
  overflow-wrap: break-word;
  font-size: 14px;
  white-space: pre;
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
  width: 100%;
  padding: 2%;
}

.erro  {
  font-size: 30px;
  text-align: right; 
  border-right: 1px solid white; 

} 

.texto  {
  font-size: 14px;
  text-align: left;
  white-space: pre;
}

}

</style>


</body>

</html>
