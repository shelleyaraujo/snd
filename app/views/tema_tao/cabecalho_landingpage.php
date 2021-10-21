<?php
 if(isset($_SESSION["credencial"])) {
 	if($_SESSION["credencial"] == "0" || $_SESSION["credencial"] == "1") {
 		echo "<a href='". myUrl("tao/editar_cabecalho/") ."' class='editar'>Editar</a>";
 	}
 }


 ?>



 <header>



 	<div class="topo2 row">
 		<div class="twelve columns a">
 			<a id="logo" href="/" title="<?php echo $GLOBALS['sitename'] ?>"><img id="logo" src="<?php echo myUrl("./imagens/logo.png")?>" alt="<?php echo $GLOBALS['sitename'] ?>" width="300" height="100" title="<?php echo $GLOBALS['sitename'] ?>"></a>
 		</div>


 	</div>


 </header>

 <style>

 



 	.topo2   {
 		margin: 15px auto;
 	}

 	.topo2  > div {
 		height: 50px;
 	}

 	.topo4  {
 		background: #264653;
 	}

 	.topo2 .a  {
 		text-align: center;
 	}
 	.topo2 .b  {
 		text-align: center;
 		display: flex;
 	}
 	.topo2 .c  {
 		text-align: right;
 		display: none;
 	} 	

 	.topo2 .c  a {
 		text-align: right;
 		font-size: 0.8em;
 		padding-left: 35px;
 		position: relative;
 	} 
 	.topo2 .c .carrinho:before {
 		content: "";
 		position: absolute;
 		top: -2px;
 		left: 10px;
 		padding: 9px;
 		background-position: center;
 		background-repeat: no-repeat;
 		background-size: 100%;
 		background-image: url(data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZlcnNpb249IjEuMSIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbG5zOnN2Z2pzPSJodHRwOi8vc3ZnanMuY29tL3N2Z2pzIiB3aWR0aD0iNTEyIiBoZWlnaHQ9IjUxMiIgeD0iMCIgeT0iMCIgdmlld0JveD0iMCAwIDQ0Ni44NTMgNDQ2Ljg1MyIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNTEyIDUxMiIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgY2xhc3M9IiI+PGc+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+Cgk8cGF0aCBkPSJNNDQ0LjI3NCw5My4zNmMtMi41NTgtMy42NjYtNi42NzQtNS45MzItMTEuMTQ1LTYuMTIzTDE1NS45NDIsNzUuMjg5Yy03Ljk1My0wLjM0OC0xNC41OTksNS43OTItMTQuOTM5LDEzLjcwOCAgIGMtMC4zMzgsNy45MTMsNS43OTIsMTQuNTk5LDEzLjcwNywxNC45MzlsMjU4LjQyMSwxMS4xNEwzNjIuMzIsMjczLjYxSDEzNi4yMDVMOTUuMzU0LDUxLjE3OSAgIGMtMC44OTgtNC44NzUtNC4yNDUtOC45NDItOC44NjEtMTAuNzUzTDE5LjU4NiwxNC4xNDFjLTcuMzc0LTIuODg3LTE1LjY5NSwwLjczNS0xOC41OTEsOC4xYy0yLjg5MSw3LjM2OSwwLjczLDE1LjY5NSw4LjEsMTguNTkxICAgbDU5LjQ5MSwyMy4zNzFsNDEuNTcyLDIyNi4zMzVjMS4yNTMsNi44MDQsNy4xODMsMTEuNzQ2LDE0LjEwNCwxMS43NDZoNi44OTZsLTE1Ljc0Nyw0My43NGMtMS4zMTgsMy42NjQtMC43NzUsNy43MzMsMS40NjgsMTAuOTE2ICAgYzIuMjQsMy4xODQsNS44ODMsNS4wNzgsOS43NzIsNS4wNzhoMTEuMDQ1Yy02Ljg0NCw3LjYxNy0xMS4wNDUsMTcuNjQ2LTExLjA0NSwyOC42NzVjMCwyMy43MTgsMTkuMjk5LDQzLjAxMiw0My4wMTIsNDMuMDEyICAgczQzLjAxMi0xOS4yOTQsNDMuMDEyLTQzLjAxMmMwLTExLjAyOC00LjIwMS0yMS4wNTgtMTEuMDQ0LTI4LjY3NWg5My43NzdjLTYuODQ3LDcuNjE3LTExLjA0NywxNy42NDYtMTEuMDQ3LDI4LjY3NSAgIGMwLDIzLjcxOCwxOS4yOTQsNDMuMDEyLDQzLjAxMiw0My4wMTJjMjMuNzE5LDAsNDMuMDEyLTE5LjI5NCw0My4wMTItNDMuMDEyYzAtMTEuMDI4LTQuMi0yMS4wNTgtMTEuMDQyLTI4LjY3NWgxMy40MzIgICBjNi42LDAsMTEuOTQ4LTUuMzQ5LDExLjk0OC0xMS45NDdjMC02LjYtNS4zNDktMTEuOTQ4LTExLjk0OC0xMS45NDhIMTQzLjY1MWwxMi45MDItMzUuODQzaDIxNi4yMjEgICBjNi4yMzUsMCwxMS43NTItNC4wMjgsMTMuNjUxLTkuOTZsNTkuNzM5LTE4Ni4zODdDNDQ3LjUzNiwxMDEuNjc5LDQ0Ni44MzIsOTcuMDI4LDQ0NC4yNzQsOTMuMzZ6IE0xNjkuNjY0LDQwOS44MTQgICBjLTEwLjU0MywwLTE5LjExNy04LjU3My0xOS4xMTctMTkuMTE2czguNTc0LTE5LjExNywxOS4xMTctMTkuMTE3czE5LjExNiw4LjU3NCwxOS4xMTYsMTkuMTE3UzE4MC4yMDcsNDA5LjgxNCwxNjkuNjY0LDQwOS44MTR6ICAgIE0zMjcuMzczLDQwOS44MTRjLTEwLjU0MywwLTE5LjExNi04LjU3My0xOS4xMTYtMTkuMTE2czguNTczLTE5LjExNywxOS4xMTYtMTkuMTE3czE5LjExNiw4LjU3NCwxOS4xMTYsMTkuMTE3ICAgUzMzNy45MTYsNDA5LjgxNCwzMjcuMzczLDQwOS44MTR6IiBmaWxsPSIjMDAwMDAwIiBkYXRhLW9yaWdpbmFsPSIjMDAwMDAwIiBzdHlsZT0iIiBjbGFzcz0iIj48L3BhdGg+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPC9nPjwvc3ZnPg==) 	
 	} 

 	.topo2 .c  .conta:before {
 		content: "";
 		position: absolute;
 		top: -2px;
 		left: 10px;
 		padding: 9px;
 		background-position: center;
 		background-repeat: no-repeat;
 		background-size: 100%;
 		background-image: url(data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZlcnNpb249IjEuMSIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbG5zOnN2Z2pzPSJodHRwOi8vc3ZnanMuY29tL3N2Z2pzIiB3aWR0aD0iNTEyIiBoZWlnaHQ9IjUxMiIgeD0iMCIgeT0iMCIgdmlld0JveD0iMCAwIDUxMiA1MTIiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMiA1MTIiIHhtbDpzcGFjZT0icHJlc2VydmUiIGNsYXNzPSIiPjxnPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgoJPGc+CgkJPHBhdGggZD0iTTQzNy4wMiwzMzAuOThjLTI3Ljg4My0yNy44ODItNjEuMDcxLTQ4LjUyMy05Ny4yODEtNjEuMDE4QzM3OC41MjEsMjQzLjI1MSw0MDQsMTk4LjU0OCw0MDQsMTQ4ICAgIEM0MDQsNjYuMzkzLDMzNy42MDcsMCwyNTYsMFMxMDgsNjYuMzkzLDEwOCwxNDhjMCw1MC41NDgsMjUuNDc5LDk1LjI1MSw2NC4yNjIsMTIxLjk2MiAgICBjLTM2LjIxLDEyLjQ5NS02OS4zOTgsMzMuMTM2LTk3LjI4MSw2MS4wMThDMjYuNjI5LDM3OS4zMzMsMCw0NDMuNjIsMCw1MTJoNDBjMC0xMTkuMTAzLDk2Ljg5Ny0yMTYsMjE2LTIxNnMyMTYsOTYuODk3LDIxNiwyMTYgICAgaDQwQzUxMiw0NDMuNjIsNDg1LjM3MSwzNzkuMzMzLDQzNy4wMiwzMzAuOTh6IE0yNTYsMjU2Yy01OS41NTEsMC0xMDgtNDguNDQ4LTEwOC0xMDhTMTk2LjQ0OSw0MCwyNTYsNDAgICAgYzU5LjU1MSwwLDEwOCw0OC40NDgsMTA4LDEwOFMzMTUuNTUxLDI1NiwyNTYsMjU2eiIgZmlsbD0iIzAwMDAwMCIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgc3R5bGU9IiIgY2xhc3M9IiI+PC9wYXRoPgoJPC9nPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjwvZz48L3N2Zz4=)
 	} 


 	.topo2 .a img {
 		max-width: 150px;
 		height: auto;
 	}

 	.topo2 form {
 		display: flex;
 		flex-wrap: nowrap;
 		align-items: center;
 		align-content: center;
 		justify-content: center;
 		margin: 0 auto;
 		max-width: 300px;
 		padding: 15px;
 	}

 	.topo2 label {
 		width: 100%;
 		margin: 0;
 	}
 	.topo2 .b input {
 		width: 100%;
 		margin: 0;
 	}
 	.topo2 .b button {
 		margin: 0;
 		position: relative;
 		color: transparent;
 		padding: 0 10px;
 	}	

 	.topo2 .b button:before {
 		content: "";
 		position: absolute;
 		top: 6px;
 		left: 9px;
 		padding: 10px;
 		background-position: center;
 		background-repeat: no-repeat;
 		background-size: 100%;
 		background-image: url("data:image/svg+xml,%3C%3Fxml version='1.0'%3F%3E%3Csvg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' version='1.1' id='Capa_1' x='0px' y='0px' viewBox='0 0 512.005 512.005' style='enable-background:new 0 0 512.005 512.005;' xml:space='preserve' width='512px' height='512px' class=''%3E%3Cg%3E%3Cg%3E%3Cg%3E%3Cpath d='M505.749,475.587l-145.6-145.6c28.203-34.837,45.184-79.104,45.184-127.317c0-111.744-90.923-202.667-202.667-202.667 S0,90.925,0,202.669s90.923,202.667,202.667,202.667c48.213,0,92.48-16.981,127.317-45.184l145.6,145.6 c4.16,4.16,9.621,6.251,15.083,6.251s10.923-2.091,15.083-6.251C514.091,497.411,514.091,483.928,505.749,475.587z M202.667,362.669c-88.235,0-160-71.765-160-160s71.765-160,160-160s160,71.765,160,160S290.901,362.669,202.667,362.669z' data-original='%23000000' class='active-path' data-old_color='%23000000' fill='%23555555'/%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/svg%3E%0A");

 	}	




 	



 	@media (min-width: 768px) {

 	

 		.topo2 {
 			max-width: 1200px;
 		}

 		.topo2 .a {
 			text-align: center;
 		}	
 		.topo2 .b form {
 			padding: 0;
 		}

 		.topo2 .c  {
 			display: flex;
 			flex-wrap: nowrap;
 			align-items: center;
 			align-content: center;
 			justify-content: flex-end;
 		}	

 	



 	}

 </style>

