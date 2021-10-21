<?php 
$descricao = str_replace("<p>", "\n", $descricao); 
$descricao = str_replace("</p>", "", $descricao); 


?> 

<?php include_once "head.php"; ?>

<body>

 <?php include_once "header.php"; ?>

 <div class="painel">

   <div class="p-a">
    <div class="menu-tao">
     <?php include_once "menutao.php"; ?>
   </div>
 </div>
 <div class="p-b">
   <h1>Editar Cabeçalho</h1>
   <label>Slogan do site (Chamada):</label>
  

   <form id="form-cabecalho" method="POST" action="<?php echo myUrl('tao/editar_cabecalho/') ?>">
    <input type="text" name="descricao" id="descricao" maxlength="200" value="<?php echo $descricao ?>">

    <label>Telefones: </label>
    <a href="javascript:void(0)" id="add_tel" class="button-secundario">&nbsp;Tel/Cel</a>
    <a href="javascript:void(0)" id="add_whatsapp" class="button-secundario">&nbsp;Whatsapp</a>

    <textarea name="telefones" id="telefones" maxlength="200"><?php echo $telefones ?></textarea>

    <div id="tels">
      <?php echo $telefones ?>
    </div>

    <label>Redes Sociais: </label>
    <a href="javascript:void(0)" id="add_facebook" class="button-secundario">&nbsp;Inserir Rede Social</a>
    <textarea name="redes_sociais" id="redes_sociais" maxlength="1000"><?php echo $redes_sociais ?></textarea>
    <div id="redes">
      <?php echo $redes_sociais ?>
    </div>

<!--
      <label>Emails:</label>
      <textarea name="emails" id="emails" maxlength="200"><?php echo $emails ?></textarea>
      <label>Enderços:</label>
      <textarea name="enderecos" id="enderecos" maxlength="200"><?php echo $enderecos ?></textarea>
    -->

    <input type="hidden" name="update_cabecalho" value="update">
    <button type="submit">Aplicar Alterações</button>

  </form> 
</div>
<div class="p-c">
 <div class="logotipo-topo">
  <h3>Logotipo Cabeçalho</h3>
  <div id="uploader">
    <div id="upload2">
      <br>
      <label for='image-file'>x</label>
      <input id="image-file" type="file" onchange="SavePhoto(this)" >
    </div>
    <img id="picture" src="../../imagens/logo.png" />
    <div id="loader"></div>
    <p>&nbsp;cArraste o logotipo no box ou clique na seta. 
      <br>Obs.: Extensão <strong style="color:red">PNG</strong></p>
    </div>
    <input id="favicon" type="checkbox" value="0" > Clique aqui se for um favicon.
  </div>

  <div>
  </div>
</div>

</div>
</body>

<?php include_once "footer.php"; ?>

<style>

  #editor {
    display: flex;
    justify-content: center;
    align-items: center;
    align-content: center;
    flex-wrap: wrap;
    width: 100%;
    max-width: 500px;
    margin: 0 auto;
    background-color: white;
    padding: 25px;
  }

  #editor > div{
    width: 100%;
  }

  .cabecalho label {
    display: block;
  }

  #uploader {
    width: 100%;
    height: 300px; 
    background: white; 
    padding: 20px;
    border: 1px dashed #5499C7;
    display: flex;
    justify-content: center;
    align-items: center;
    align-content: center;
    flex-wrap: wrap;
    box-sizing: border-box;
    margin-bottom: 20px;
    overflow: hidden;
  }

  #uploader p {
    text-align: center;
    width: 100%;
    margin: 0;
  }

  #uploader img {
    width: 100%;
    max-width: 200px;
  }

  #telefones,#redes_sociais {
   display: none;
 }

 #form-redes-sociais {
  width: 100%;
  margin-bottom: 20px;
}

#cke_editor1 {
  width: 100%;
  border: 1px solid #777;
}

#cke_editor1 iframe {
  width: 100%!important; 
  height: 100px!important;  
}

.cke_reset {
  margin: 0;
  padding: 0;
  border: 0;
  background: transparent;
  text-decoration: none;
  width: auto;
  height: 188px;
  vertical-align: baseline;
  box-sizing: content-box;
  position: static;
  transition: none;
}

#tels {
  width: 100%;
  padding: 10px;
  background-color: LightlightblueenrodYellow;
  margin-bottom: 20px;
}

#tels a {
  position: relative;
  padding-left: 30px;
  pointer-events: none;
}

#tels a:after {
  content: "X";
  position: absolute;
  left: 0;
  color: red;
}


#tels p {
 margin: 10px;
 cursor: pointer;
}


#tels a {
 position: relative;
 padding-left: 25px;
}

#tels p:hover a {
 color: red;
}

label {
  color: skyblue;
}

#tels a:after {
  content: "x";
  position: absolute;
  color: red;
  border: 1px solid black;
  background-color: tomato;
  padding: 6px 2px;
  left: 2px;
  top: 2px;
  font-size: 12px;
  line-height: 2px;
  color: white;
  border-radius: 3px;
}

#tels a:before {
  content: "";
  position: absolute;
  border-top: 2px dashed gray;
  padding: 3px 8px;
  left: 0px;
  position: absolute;
  top: 5px;
  z-index: 99;
}

#redes {
  width: 100%;
  padding: 10px;
  background-color: LightlightblueenrodYellow;
  margin-bottom: 20px;
  position: relative;
}

#redes p {
 margin: 10px;
 cursor: pointer;
}
#redes p:hover a {
 color: red;
}


#redes a {
 position: relative;
 padding-left: 25px;
}

#redes a {
  position: relative;
  padding-left: 30px;
  pointer-events: none;
}

#redes a:after {
  content: "X";
  position: absolute;
  left: 0;
  color: red;
}



#redes a:after {
  content: "";
  position: absolute;
  color: red;
  border: 1px solid black;
  background-color: tomato;
  padding: 6px 5px;
  left: 2px;
  top: 2px;
}

#redes a:before {
  content: "";
  position: absolute;
  border-top: 3px solid black;
  padding: 3px 8px;
  left: 0;
  position: absolute;
  top: 5px;
  z-index: 99;
}

#descricao {
  height: 50px;
  margin-bottom: 20px;
}

#emails {
  height: 50px;
}
#enderecos {
  height: 200px;
}

</style>

<?php include_once "uploadlogojs.php"; ?>

<script>

  function update_cabecalho() {

    var descricao = document.getElementById("xxx").value;
    var telefones = document.getElementById("xxx").value;
    var redes_sociais = document.getElementById("xxx").value,
    xhr = new XMLHttpRequest();
    xhr.open('POST', '<?php echo myUrl('tao/update_cabecalho/') ?>');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
      if (xhr.status === 200) {
       window.location.replace("editar_cabecalho/" + descricao);
     }
     else if (xhr.status !== 200) {
      alert(xhr.status);
    }
  };
  xhr.send(encodeURI('descricao=' + descricao + "&telefones=" + telefones + "&redes_sociais=" + redes_sociais));
}




document.getElementById("add_tel").addEventListener("click", adicionaTel);
function adicionaTel() {
  var telefone = prompt("Digite o numero de telefone:", "(19) 0000-0000");
  if (telefone != null) {
    var tels = document.getElementById("tels");
    tels.innerHTML += "<p><a href='telefone'>"+telefone+"</a></p>";
    document.getElementById("telefones").value = tels.innerHTML;
  }
}

document.getElementById("add_whatsapp").addEventListener("click", adicionaWhats);
function adicionaWhats() {
  var whatsapp = prompt("Digite o numero de telefone:", "(19) 0000-0000");
  if (whatsapp != null) {
    var tels = document.getElementById("tels");
    tels.innerHTML += "<p><a href='http://whatsapp/'>"+whatsapp+"</a></p>";
    document.getElementById("telefones").value = tels.innerHTML;
  }
}

document.getElementById("add_facebook").addEventListener("click", addFacebook);
function addFacebook() {
  var link = prompt("Digite a URL do Facebook:", "http://www.exemplo.com");
  if (link != null) {
    var redes = document.getElementById("redes");
    redes.innerHTML += "<p><a href="+link+" target=_blank>"+link+"</a></p>";
    document.getElementById("redes_sociais").value = redes.innerHTML;
  }
}

var links = document.querySelectorAll("#tels p");
for(var i=0; i < links.length; i++) {
  links[i].addEventListener("click", deleteTel);
}
function deleteTel() {
  var r = confirm("Tem certeza que quer excluir este telefone?");
  if (r == true) {
   this.remove();
 }
 var tels = document.getElementById("tels");
 document.getElementById("telefones").value = tels.innerHTML;
}

var rds = document.querySelectorAll("#redes p");
for(var i=0; i < rds.length; i++) {
  rds[i].addEventListener("click", deleteRedes);
}
function deleteRedes() {
  var r = confirm("Tem certeza que quer excluir este item?");
  if (r == true) {
   this.remove();
 }
 var redes = document.getElementById("redes");
 document.getElementById("redes_sociais").value = redes.innerHTML;
}

</script>

</body>
</html>

