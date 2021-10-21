<?php header("HTTP/1.0 500 Internal Server Error: Uncaught Exception"); ?>
<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN">

<html>
<head>
	<title>Exception Occurred</title>
</head>
<body>

	<div class="container">

    <div  class="page">404</div>
    <div  class="erro">Exception Occurred</div>

    <div class="texto">
     <p><?=isset($message) ? "<pre>$message</pre>":'Unknown uncaught exception occured.';?></p>
     <hr />
     <p>Powered By: <a href="http://taowebsystem.com.br"><?php echo $GLOBALS['sitename']?></a></p>

   </div>

 </div>


 <style>

 body {
  padding: 0;
  margin: 0;
  background-color: white;
  text-align: center;
}

.container {
  font-family: "arial";
  width: 100%;
  max-width: 100%;
  height: 100%;
  display: -webkit-box;
  display: -moz-box;
  display: -ms-flexbox;
  display: -webkit-flex;
  display: flex;
  align-content: center;
  justify-content: center;
  flex-wrap: wrap;
  color: gray;
  margin-top: 50px;
}

.container div {
  width: 100%;
  padding: 20px;
  box-sizing: border-box;
}

.erro  {
  font-size: 30px;
  position: relative;
} 

.page  {
  font-size: 80px;
  position: relative;
  line-height: 120px;
  border: 0px solid black;
  padding: 0;
  width: 300px!important;
  height: 400px!important;
  border: 5px solid #e9ecef;
-webkit-animation-name: bounce;
  animation-name: bounce;
  -webkit-transform-origin: center bottom;
  -ms-transform-origin: center bottom;
  transform-origin: center bottom;
  -webkit-animation-duration: 1s;
  animation-duration: 1s;
  -webkit-animation-fill-mode: both;
  animation-fill-mode: both;
  color: red;
  background-color: aliceblue;
} 

.page:before  {
  content: "";
  border-top: 20px solid white;
  border-bottom: 20px solid #e9ecef;
  border-left: 20px solid #e9ecef;
  border-right: 20px solid white;
  padding: 0;
  top: -5px;
  right: -5px;
  position: absolute;
} 
.page:after  {
  content: "";
  position: absolute;
  border: 1px dashed black;
  padding: 5px 30px;
  border-right: 0;
  border-left:0;
  left: 20PX;
  bottom: 15px;
  } 

.texto  {
  font-size: 18px;
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


@-webkit-keyframes bounce {
  0%, 20%, 53%, 80%, 100% {
  -webkit-transition-timing-function: cubic-bezier(0.215, 0.610, 0.355, 1.000);
  transition-timing-function: cubic-bezier(0.215, 0.610, 0.355, 1.000);
  -webkit-transform: translate3d(0,0,0);
  transform: translate3d(0,0,0);
  }
  40%, 43% {
  -webkit-transition-timing-function: cubic-bezier(0.755, 0.050, 0.855, 0.060);
  transition-timing-function: cubic-bezier(0.755, 0.050, 0.855, 0.060);
  -webkit-transform: translate3d(0, -30px, 0);
  transform: translate3d(0, -30px, 0);
  }
  70% {
  -webkit-transition-timing-function: cubic-bezier(0.755, 0.050, 0.855, 0.060);
  transition-timing-function: cubic-bezier(0.755, 0.050, 0.855, 0.060);
  -webkit-transform: translate3d(0, -15px, 0);
  transform: translate3d(0, -15px, 0);
  }
  90% {
  -webkit-transform: translate3d(0,-4px,0);
  transform: translate3d(0,-4px,0);
  }
  }
  
  @keyframes bounce {
  0%, 20%, 53%, 80%, 100% {
  -webkit-transition-timing-function: cubic-bezier(0.215, 0.610, 0.355, 1.000);
  transition-timing-function: cubic-bezier(0.215, 0.610, 0.355, 1.000);
  -webkit-transform: translate3d(0,0,0);
  transform: translate3d(0,0,0);
  }
  40%, 43% {
  -webkit-transition-timing-function: cubic-bezier(0.755, 0.050, 0.855, 0.060);
  transition-timing-function: cubic-bezier(0.755, 0.050, 0.855, 0.060);
  -webkit-transform: translate3d(0, -30px, 0);
  transform: translate3d(0, -30px, 0);
  }
  70% {
  -webkit-transition-timing-function: cubic-bezier(0.755, 0.050, 0.855, 0.060);
  transition-timing-function: cubic-bezier(0.755, 0.050, 0.855, 0.060);
  -webkit-transform: translate3d(0, -15px, 0);
  transform: translate3d(0, -15px, 0);
  }
  90% { -webkit-transform: translate3d(0,-4px,0); transform: translate3d(0,-4px,0);
  }
  } 


  
@media (max-width: 550px) {

  .page  {

  width: 200px!important;
  height: 300px!important;

} 

}


</style>

</body>
</html>
