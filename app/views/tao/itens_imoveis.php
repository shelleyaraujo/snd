<?php include_once "head.php"; ?>

<body>

 <?php include_once "header.php"; ?>
 
 <div class="painel">

   <div class="p-a">
     <?php include_once "menutao.php"; ?>
   </div>

   <div class="p-b">

    <a href="<?php 
    if(isset($_SESSION["voltar_editar_modulo"])) {
    echo $_SESSION["voltar_editar_modulo"];
  }
    ?>" class="voltar">Voltar</a>

    <h1>Imóveis</h1>

    <label>Titulo</label>
    <input type="text" id="titulo_conteudo" value="" placeholder="Titulo" style="width: 80%">

    <a href="javascript:void(0)" onclick="adicionar_item_modulo('<?php echo $_GET["idmodulo"]; ?>','<?php echo $_GET["modulo"]; ?>')" class='button'>Adicionar</a>

    <?php echo $itens ?>

  </div>

  <div class="p-c">
    
  </div>

  

</div>

</div>

</body>

<?php include_once "footer.php"; ?>

<style>

fieldset {
  padding: 15px;
  border: 1px solid #5499C7;
  box-sizing: border-box;
  margin-bottom: 20px;
}

</style>

<?php include_once "upload_imagem_conteudojs.php"; ?>

<script>

  function passarImagem(imagem) {
    var img = "<img src='../../imagens/" + imagem + "' />";
    CKEDITOR.instances.editor1.insertHtml(img);
  }   

  function carregarImagens() {

    var o_imgs = document.getElementById("galeria-imagens");
    var x = document.getElementById("x");
    var y = document.getElementById("y"),
    xhr = new XMLHttpRequest();
    xhr.open('POST', '<?php echo myUrl('tao/carregar_imagens/') ?>');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
      if (xhr.status === 200) {
       o_imgs.innerHTML = xhr.responseText + o_imgs.innerHTML;
     }
     else if (xhr.status !== 200) {
      alert(xhr.status);
    }
  };
  xhr.send(encodeURI('x=' + x.value + "&y=" + y.value));
  x.value = parseInt(x.value) + 10;
  y.value = parseInt(y.value) + 10;

}

function excluirImagem(imagem,imgx) {

  var r = confirm("Tem certeza que quer excluir esta imagem?");
  var img=document.getElementById(imgx);
  if (r == true) {

    var imagem = imagem,
    xhr = new XMLHttpRequest();
    xhr.open('POST', '<?php echo myUrl('tao/excluir_imagem/') ?>');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
      if (xhr.status === 200) {
        img.style.display="none";
      }
      else if (xhr.status !== 200) {
        alert(xhr.status);
      }
    };
    xhr.send(encodeURI('imagem=' + imagem));
  }
}


function excluir_item(id) {

  var row = document.getElementById("row" + id);

  console.log(row);

  var r = confirm("Tem certeza que quer excluir este item?");

  if (r == true) {

    var imagem = imagem,
    xhr = new XMLHttpRequest();
    xhr.open('POST', '<?php echo myUrl('tao/excluir_imovel/') ?>');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
      if (xhr.status === 200) {
        info.style.display="block";
        info.innerHTML= xhr.responseText;
        row.style.display="none";
      }
      else if (xhr.status !== 200) {
        alert(xhr.status);
      }
    };
    xhr.send(encodeURI('id=' + id));
  }
}




function adicionar_item_modulo(id_modulo, modulo) {

 var titulo = document.getElementById("titulo_conteudo").value;

  xhr = new XMLHttpRequest();
  xhr.open('POST', '<?php echo myUrl('tao/adicionar_item_modulo/') ?>');
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.onload = function() {
    if (xhr.status === 200) {
      /*info.style.display="block";
      info.innerHTML = xhr.responseText;*/
    }
    else if (xhr.status !== 200) {
      alert(xhr.status);
    }
  };

  xhr.send(encodeURI('id_modulo=' + id_modulo + '&modulo=' + modulo + '&titulo=' + titulo));

  setTimeout(function(){  
    window.location.href =  "";  
  }, 300);
}



</script>

</body>
</html>

