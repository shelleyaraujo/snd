<?php include_once "head.php"; ?>

<body>

 <?php include_once "header.php"; ?>

 <h1>Editar Conteudo</h1>

 <div id="info" style="color: red"></div>

 <div id="editor"> 

  <div>

    <form id="form-cabecalho" method="POST" action="<?php echo myUrl('tao/editar_destaque/?idconteudo=' . $_GET["idconteudo"]) ?>">
      <label>Titulo:</label>
      <input type="text" name="titulo" value="<?php echo $titulo ?>">
      <label>Conteudo:</label>
      <textarea name="editor1" id="editor1"><?php echo $conteudo ?></textarea>
      <input type="hidden" name="update_conteudo" value="update">
      <button type="submit">Aplicar Alterações</button>
      <script>               
        CKEDITOR.replace( 'editor1' );
      </script>
    </form> 

  </div>

  <div>

ddd
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
  max-width: 800px;
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
  height: 120px; 
  background: aliceblue; 
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

#form-cabecalho {
  display: flex;
  justify-content: flex-start;
  align-items: flex-start;
  align-content: flex-start;
  flex-wrap: wrap;
  width: 100%;
  max-width: 800px;
}

#form-cabecalho input  {
 width: 100%;
 margin-bottom: 5px;
 border: 1px solid silver;
}

#form-cabecalho textarea  {
 width: 100%;
 margin-bottom: 20px;
 border: 1px solid silver;
}

#form-descricao {
  width: 100%;
  margin-bottom: 20px;
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
  height: 500px!important;  
}

.cke_reset {
  margin: 0;
  padding: 0;
  border: 0;
  background: transparent;
  text-decoration: none;
  width: auto;
  height: 508px;
  vertical-align: baseline;
  box-sizing: content-box;
  position: static;
  transition: none;
}

#tels {
  width: 100%;
  padding: 10px;
  background-color: wheat;
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

#redes {
  width: 100%;
  padding: 10px;
  background-color: wheat;
  margin-bottom: 20px;
  position: relative;
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

<?php include_once "upload_imagem_conteudojs.php"; ?>

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
    tels.innerHTML += "<p><a href=telefone>"+telefone+"</a></p>";
    document.getElementById("telefones").value = tels.innerHTML;
  }
}

document.getElementById("add_whatsapp").addEventListener("click", adicionaWhats);
function adicionaWhats() {
  var whatsapp = prompt("Digite o numero de telefone:", "(19) 0000-0000");
  if (whatsapp != null) {
    var tels = document.getElementById("tels");
    tels.innerHTML += "<p><a href=whatsapp>"+whatsapp+"</a></p>";
    document.getElementById("telefones").value = tels.innerHTML;
  }
}

document.getElementById("add_facebook").addEventListener("click", addFacebook);
function addFacebook() {
  var link = prompt("Digite a URL do Facebook:", "http://www.facebook.com");
  if (link != null) {
    var redes = document.getElementById("redes");
    redes.innerHTML += "<p><a href="+link+" target=_blank>facebook</a></p>";
    document.getElementById("redes_sociais").value = redes.innerHTML;
  }
}

document.getElementById("add_instagram").addEventListener("click", addInstagram);
function addInstagram() {
  var link = prompt("Digite a URL do Instagram:", "http://www.instagram.com");
  if (link != null) {
    var redes = document.getElementById("redes");
    redes.innerHTML += "<p><a href="+link+">instagram</a></p>";
    document.getElementById("redes_sociais").value = redes.innerHTML;
  }
}

document.getElementById("add_linkedin").addEventListener("click", addLinkedin);
function addLinkedin() {
  var link = prompt("Digite a URL do Linkedin:", "http://www.linkedin.com");
  if (link != null) {
    var redes = document.getElementById("redes");
    redes.innerHTML += "<p><a href="+link+">linkedin</a></p>";
    document.getElementById("redes_sociais").value = redes.innerHTML;
  }
}

var links = document.querySelectorAll("#tels p");
for(var i=0; i < links.length; i++) {
  links[i].addEventListener("click", deleteTel);
}
function deleteTel() {
 this.remove();
 var tels = document.getElementById("tels");
 document.getElementById("telefones").value = tels.innerHTML;
}


var rds = document.querySelectorAll("#redes p");
for(var i=0; i < rds.length; i++) {
  rds[i].addEventListener("click", deleteRedes);
}
function deleteRedes() {
 this.remove();
 var redes = document.getElementById("redes");
 document.getElementById("redes_sociais").value = redes.innerHTML;
}
</script>

</body>
</html>

