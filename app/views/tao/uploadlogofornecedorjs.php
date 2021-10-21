<script>
  window.addEventListener("load", function(){
  // GET THE DROP ZONE
  var uploader = document.getElementById('uploader');

  // STOP THE DEFAULT BROWSER ACTION FROM OPENING THE FILE
  uploader.addEventListener("dragover", function (e) {
    e.preventDefault();
    e.stopPropagation();
  });

  // ADD OUR OWN UPLOAD ACTION
  uploader.addEventListener("drop", function (e) {
    e.preventDefault();
    e.stopPropagation();

    // RUN THROUGH THE DROPPED FILES + AJAX UPLOAD
    for (var i = 0; i < e.dataTransfer.files.length; i++) {
      var xhr = new XMLHttpRequest(),
      data = new FormData();
      data.append('file-upload', e.dataTransfer.files[i]);
      xhr.open('POST', '<?php echo myUrl('app/views/tao/upload_logo_fornecedor.php') ?>', true);
      xhr.onload = function (e) {
        if (xhr.readyState === 4) {
          if (xhr.status === 200) {
            var info = document.getElementById("info");
            info.style.display="block";
            info.innerHTML = "Arquivo enviado com sucesso! " + xhr.responseText;
            loader.style.display ="none";
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
   xhr.open('POST', '<?php echo myUrl('app/views/tao/upload_logo_fornecedor.php') ?>', true);
   xhr.onload = function (e) {
    if (xhr.readyState === 4) {
      if (xhr.status === 200) {
        var info = document.getElementById("info");
        info.style.display="block";
        info.innerHTML = "Arquivo enviado com sucesso! " + xhr.responseText;
        loader.style.display ="none";
        var picture = document.getElementById("picture");
        picture.src = "../../imagens/fornecedores/" + xhr.responseText;
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

</script>