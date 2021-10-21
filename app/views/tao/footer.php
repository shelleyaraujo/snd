<footer>
	<div class="flex">
		<div class="w100">
			TAO System - Sistema de Gerenciamento de Conteúdo Web
		</div>
	</div>
</footer>


<div id="categorias"><span class='loader-categorias'></span></div>

<div id="msg"><div></div></div>


<style>

footer {
	border-bottom: 1px solid #cae1ff;;
	padding: 10px;
	text-align: center;
}

.loader {
  position: relative;
  display: none;
}

.loader:after {
  content: "";
  position: absolute;
  border: 2px dotted green; 
  border-right: 2px dotted red; 
  border-top: 2px dotted #e9ecef; 
  border-bottom: 2px dotted lightblue; 
  width: 15px;
  height: 15px;
  border-radius: 50%;
  animation: xspin 2s linear infinite;
  top: 2px;
  left: 10px;
  box-sizing: border-box;
}


.loader-categorias {
  position: relative;
}

.loader-categorias:after {
  content: "";
  position: absolute;
  border: 5px dotted green; 
  border-right: 5px dotted red; 
  border-top: 5px dotted #e9ecef; 
  border-bottom: 5px dotted lightblue; 
  width: 50px;
  height: 50px;
  border-radius: 50%;
  animation: xspin 2s linear infinite;
  top: 2px;
  left: 10px;
  box-sizing: border-box;
}

@keyframes xspin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

#categorias {
  position: absolute;
  width: auto;
  min-width: 80px;
  max-width: 500px;
  display: none;
  background-color: lightblue;
  padding: 5px;
  padding-right: 20px;
  border: 1px solid skyblue;
  overflow: auto;
  box-sizing: border-box;
  z-index: 99999;
  left: 50%;
  top: 50%;
  min-height: 80px;
}

#categorias ol {
  margin: 0 10px;
  list-style: none;
  width: 100%;
  box-sizing: border-box;
}

#categorias ol li {
  padding: 2px;
  margin: 0;
  border-bottom: 1px solid silver;
  font-size: 14px;
  cursor: pointer;
  width: 100%;
  box-sizing: border-box;
}

#categorias ol li:hover {
 color: skyblue;
}

#categorias  ol li {
 color: black;
}
#categorias  ol ol li {
 color: #000;
}
#categorias  ol ol ol li {
 color: #5499C7;
}
#categorias  ol ol ol ol li {
 color: #777;
}

#categorias ol li ol {
  display: none;
}
#categorias li {
  position: relative;
}

#categorias a {
  float: left;
  position: relative;
  display: block;
  padding-right: 20px;
  border: 1px solid transparent;
}

#categorias a:before {
  content: "";
  position: absolute;
  top: 7px;
  left: 0;
  height: 10px;
  width: 10px;
  border: 1px solid green;
  border-radius: 50%;
  background-color: lightblue;
  display: block;
}

#categorias ol li  {
 color: black;
}

#categorias ol ol li  {
 color: skyblue;
}

#categorias ol ol ol li  {
 color: #5499C7;
}
#categorias ol ol ol ol li  {
 color: green;
}

.p-c {
  position: relative;
}
#fechar_mudar_categoria {
  width: 100%;
  display: block;
  text-align: right;
  cursor: pointer;
  font-weight: bold;
  position: relative;
}
#fechar_mudar_categoria:before {
  content: "X";
  color: white;
  background-color: red;
  border-radius: 50%;
  padding: 2px 5px;
  line-height: 0;
  font-size: 12px;
}

</style>

<!--<script src='<?php echo myUrl("app/views/tao/js/tao.js") ?>'></script>-->

<?php $_SESSION["url_tao"] = $_SERVER['REQUEST_URI'] ?>

<script>


 function fechar_mudar_categoria() {

  var categorias = document.querySelector("#categorias");

  if(categorias.style.display != "none" || categorias.style.display != "") {
    categorias.style.display = "none";
  }

}

function close_info2(info2) {
 info2.style.display = "none";
}

info.addEventListener("click", myFunction);
function myFunction() {
  this.style.display="none";
}

var url = new URL(window.location.href);
var query_string = url.search;
var search_params = new URLSearchParams(query_string); 
var param = "ativo" + search_params.get('x');
var a = document.querySelector("."+param);

console.log(param);
a.style.backgroundColor = "skyblue";
a.style.color = "white";	


function open_itens_categoria(modulo,id) {

  var pai = document.getElementById("itens" + id);
  var origem = document.getElementById("origem");
  origem.value = id;

  var loader = document.getElementById("loader"+id);
  loader.style.display="block";

  xhr = new XMLHttpRequest();
  xhr.open('POST', '<?php echo myUrl('tao/menu_editar_itens2') ?>');
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.onload = function() {
    if (xhr.status === 200) {
      loader.style.display="none";
      if(pai.innerHTML == "") {
        pai.innerHTML =  xhr.responseText;
      } else {
        pai.innerHTML =  "";
      }
    }

    else if (xhr.status !== 200) {
      alert(xhr.status);
    }
  };
  xhr.send(encodeURI('id=' + id + '&modulo=' + modulo));


}

function mudar_categoria(idcategoria) {

  e = window.event; 

  var categorias = document.querySelector("#categorias");
  categorias.style.top = e.pageY + 20 + "px";
  categorias.style.left = e.pageX - 250 + "px";

  categorias.style.display = "block";

  xhr = new XMLHttpRequest();
  xhr.open('POST', '<?php echo myUrl('tao/mudar_categoria/') ?>');
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.onload = function() {
    if (xhr.status === 200) {
      categorias.innerHTML = xhr.responseText;
      loader.style.display="none";

    }
    else if (xhr.status !== 200) {
      alert(xhr.status);
    }
  };
  xhr.send(encodeURI('idcategoria=' + idcategoria));

  
}

function passar_para_categoria(id,idcategoria) {

  if(idcategoria == id) {
    alert("Você não pode mudar para si mesmo.");
  } else {
    xhr = new XMLHttpRequest();
    xhr.open('POST', '<?php echo myUrl('tao/passar_para_categoria/') ?>');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
      if (xhr.status === 200) {
        info.style.display = "block";
        info.innerHTML = "<a href=''>" + xhr.responseText + "</a>";
      }
      else if (xhr.status !== 200) {
        alert(xhr.status);
      }
    };
    xhr.send(encodeURI("id=" + id + "&idcategoria=" + idcategoria));
  }
}

function open_filhos(id) {
  console.log("xxxx");
  var pai = document.getElementById(id);
  var filho = pai.querySelector("li > ol");
  console.log(filho);
  filho.style.display = "block";
}

function close_filhos(id) {
  console.log("xxxx");
  var pai = document.getElementById(id);
  var filho = pai.querySelector("li > ol");
  console.log(filho);
  filho.style.display = "none";
}


function abreMenus(menu) {
  var menus = document.getElementById(menu);
  menus.style.display = "block";
}

function fechaMenus(menu) {
  var menus = document.getElementById(menu);
 menus.style.display = "none";
}

function setMenu(menu, id) {

  var ativo="0";
  var checkBox = document.getElementById("m"+menu+id);

  if (checkBox.checked == true){
    ativo="1";
  } else {
    ativo="0";
  }

  xhr = new XMLHttpRequest();
  xhr.open('POST', '<?php echo myUrl('tao/ativar_modulo/') ?>');
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.onload = function() {
    if (xhr.status === 200) {
      //row.style.display="none";
    }
    else if (xhr.status !== 200) {
      alert(xhr.status);
    }
  };
  xhr.send(encodeURI('id=' + id + "&ativo=" + ativo + "&menu=" + menu));
  
}


</script>
