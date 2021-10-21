<script>
  window.addEventListener("load", function(){
  // GET THE DROP ZONE
  var uploader = document.getElementById('uploader');
  var loader = document.getElementById("loader");
  var imagem = document.getElementById("imagem");

  // STOP THE DEFAULT BROWSER ACTION FROM OPENING THE FILE
  uploader.addEventListener("dragover", function (e) {
    e.preventDefault();
    e.stopPropagation();
  });

  // ADD OUR OWN UPLOAD ACTION
  uploader.addEventListener("drop", function (e) {
    e.preventDefault();
    e.stopPropagation();

    loader.style.display ="block";

    // RUN THROUGH THE DROPPED FILES + AJAX UPLOAD
    // 
    // var 
    for (var i = 0; i < e.dataTransfer.files.length; i++) {
      var xhr = new XMLHttpRequest(),
      data = new FormData();

      data.append('file-upload', e.dataTransfer.files[i]);
      xhr.open('POST', '<?php echo myUrl('app/views/tao/upload_imagem.php?dir=catalogo') ?>' , true);
      xhr.onload = function (e) {

        if (xhr.readyState === 4) {
          if (xhr.status === 200) {
            // OK - Do something
            // console.log(xhr.responseText);
            var info = document.getElementById("info");
            info.style.display="block";
            info.innerHTML = "Arquivo enviado com sucesso!" + " imagem: " + xhr.responseText;
            alert(xhr.responseText);
            add_imagem(xhr.responseText);
            loader.style.display ="none";
          } else {
            // ERROR - Do something
            // console.error(xhr.statusText);
            alert("Upload error!");
          }
        }
      };
      xhr.onerror = function (e) {
        // ERROR - Do something
        // console.error(xhr.statusText);
        alert("Upload error!");
      };
      xhr.send(data);
    }
  });


});


  function add_imagem(imagem) {

  var idcatalogo = document.getElementById("idcatalogo").value;

  xhr = new XMLHttpRequest();
  xhr.open('POST', '<?php echo myUrl('tao/insere_imagem_catalogo/') ?>');
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.onload = function() {
    if (xhr.status === 200) {
      msg_cnt.style.display="flex";
      msg_info.innerHTML =  xhr.responseText;
    }
    else if (xhr.status !== 200) {
      alert(xhr.status);
    }
  };
  xhr.send(encodeURI('id=' + idcatalogo + "&imagem=" + imagem));
  
}

 async function SavePhoto(inp) {
   loader.style.display ="block";
   var photo = inp.files[0];      
   var xhr = new XMLHttpRequest(),
   data = new FormData();
   data.append('file-upload', photo);
   xhr.open('POST', '<?php echo myUrl('app/views/tao/upload_imagem.php?dir=catalogo') ?>', true);
   xhr.onload = function (e) {
    if (xhr.readyState === 4) {
      if (xhr.status === 200) {
            var info = document.getElementById("info");
            msg_cnt.style.display="flex";
            msg_info.innerHTML = "Arquivo enviado com sucesso!" + " imagem: " + xhr.responseText;
            add_imagem(xhr.responseText);
            loader.style.display ="none";
            upload_imagem.style.display ="none";
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


 async function SavePhotoDescricao(inp) {
  var cnt_upload_imagem_descricao = document.querySelector(".cnt-upload-imagem-descricao");
  var loader_descricao = document.getElementById("loader-descricao");
   loader_descricao.style.display ="block";
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
            info.innerHTML = "Arquivo enviado com sucesso!" + " imagem: " + xhr.responseText;
            passarImagemDescricao(xhr.responseText);
            loader_descricao.style.display ="none";
            cnt_upload_imagem_descricao.style.display ="none";
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

</script>