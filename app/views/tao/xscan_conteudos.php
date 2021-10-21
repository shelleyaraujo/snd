<?php

echo $imagens . "x";

?>

<style>

  .cnt {
    width: 100%;
    display: block;
    border-bottom: 1px solid #e9ecef;
  }

  .cnt > div  {
    border-top: 1px solid #e9ecef;
    display: -webkit-box;
    display: -moz-box;
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;
    align-items: center;
    align-content: center;
    justify-content: space-between;
    flex-wrap: nowrap;
  }

  .cnt > div:nth-child(odd)  {
    background-color: aliceblue;
  }

  .cnt > div:hover  {
    background-color: ivory;
  }

  .cnt > div div  {
    padding: 5px;
  }

#info {
  display: none;
  background-color: red;
  padding: 20px;
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  z-index: 9;
}


</style>


<div id="info"></div>


<script>

  function exclui_imagem (imagem) {

   var r = confirm("Tem certeza que deseja excluir este item?");
   if (r == true) {
     var row = document.getElementById("row"+imagem);
     var info = document.getElementById("info");

     xhr = new XMLHttpRequest();
     xhr.open('POST', '<?php echo myUrl('tao/excluir_imagem_imagens_conteudo/') ?>');
     xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
     xhr.onload = function() {
      if (xhr.status === 200) {
        info.style.display="block";
        info.innerHTML =  xhr.responseText;
        row.style.display="none";
      }
      else if (xhr.status !== 200) {
        alert(xhr.status);
      }
    };
    xhr.send(encodeURI('imagem=' + imagem));
  }
}


document.getElementById("info").addEventListener("click", addLinkedin);

function addLinkedin() {
  this.style.display = "none";
}

</script>
