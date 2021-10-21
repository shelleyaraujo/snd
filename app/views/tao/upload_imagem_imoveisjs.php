

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
      xhr.open('POST', '<?php echo myUrl('app/views/tao/upload_imagem.php?dir=imoveis') ?>' , true);
      xhr.onload = function (e) {

        if (xhr.readyState === 4) {
          if (xhr.status === 200) {
            // OK - Do something
            // console.log(xhr.responseText);
            var info = document.getElementById("info");
            info.style.display="block";
            info.innerHTML = "Arquivo enviado com sucesso!" + " imagem: " + xhr.responseText;
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

  var idimoveis = document.getElementById("idimovel").value;

  xhr = new XMLHttpRequest();
  xhr.open('POST', '<?php echo myUrl('tao/insere_imagem_imoveis/') ?>');
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
  xhr.send(encodeURI('id=' + idimoveis + "&imagem=" + imagem));
  
}

async function SavePhoto(inp) {
   loader.style.display ="block";
   var photo = inp.files[0];      
   var xhr = new XMLHttpRequest(),
   data = new FormData();
   data.append('file-upload', photo);
      xhr.open('POST', '<?php echo myUrl('app/views/tao/upload_imagem.php?dir=imoveis') ?>' , true);
   xhr.onload = function (e) {
    if (xhr.readyState === 4) {
      if (xhr.status === 200) {
            var info = document.getElementById("info");
            info.style.display="block";
            info.innerHTML = "Arquivo enviado com sucesso!" + " imagem: " + xhr.responseText;
            add_imagem(xhr.responseText);
            loader.style.display ="none";
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