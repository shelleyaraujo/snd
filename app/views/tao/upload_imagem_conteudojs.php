<script>
  window.addEventListener("load", function(){
    var uploader = document.getElementById('uploader');
    var loader = document.getElementById("loader");

    uploader.addEventListener("dragover", function (e) {
      e.preventDefault();
      e.stopPropagation();
    });

    uploader.addEventListener("drop", function (e) {
      e.preventDefault();
      e.stopPropagation();

      loader.style.display ="block";

      for (var i = 0; i < e.dataTransfer.files.length; i++) {
        var xhr = new XMLHttpRequest(),
        data = new FormData();

        data.append('file-upload', e.dataTransfer.files[i]);
        xhr.open('POST', '<?php echo myUrl('app/views/tao/upload_imagem.php?dir=conteudo') ?>', true);
        xhr.onload = function (e) {

          if (xhr.readyState === 4) {
            if (xhr.status === 200) {
              var info = document.getElementById("info");
              info.style.display="block";
              info.innerHTML = "Arquivo enviado com sucesso!";
              loader.style.display ="none";
              var picture = document.getElementById("picture");
              picture.src = "../../imagens/" + xhr.responseText;
              passarImagem(xhr.responseText);
            } else {
              alert("Upload error!");
            }
          }
        };
        xhr.onerror = function (e) {
          alert("Upload error!");
        };
        xhr.send(data);
      }
    });


  });


  async function SavePhoto(inp) {
   loader.style.display ="block";
   var photo = inp.files[0];      
   var xhr = new XMLHttpRequest(),
   data = new FormData();
   data.append('file-upload', photo);
   xhr.open('POST', '<?php echo myUrl('app/views/tao/upload_imagem.php?dir=conteudo') ?>', true);
   xhr.onload = function (e) {
    if (xhr.readyState === 4) {
      if (xhr.status === 200) {
var info = document.getElementById("info");
              info.style.display="block";
              info.innerHTML = "Arquivo enviado com sucesso!";
              loader.style.display ="none";
              var picture = document.getElementById("picture");
              picture.src = "../../imagens/" + xhr.responseText;
              passarImagem(xhr.responseText);
      } else {
        alert("Upload error! Apenas extensão jpg e minuscula.");
      }
    } 
  };
  xhr.onerror = function (e) {
    alert("Upload error! Apenas extensão jpg e minuscula.");
  };
  xhr.send(data);
}

</script>