<script>
  window.addEventListener("load", function(){
  // GET THE DROP ZONE
  var uploader = document.getElementById('uploader');
  var loader = document.getElementById("loader");

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
    for (var i = 0; i < e.dataTransfer.files.length; i++) {
      var xhr = new XMLHttpRequest(),
      data = new FormData();

      data.append('file-upload', e.dataTransfer.files[i]);
      xhr.open('POST', '<?php echo myUrl('app/views/tao/upload_arquivo_downloads.php?dir=downloads') ?>', true);
      xhr.onload = function (e) {

        if (xhr.readyState === 4) {
          if (xhr.status === 200) {
            var info = document.getElementById("info");
            info.style.display="block";
            info.innerHTML = "ATENÇÃO: Clique no botão Aplicar Alterações para atualizar.";
            loader.style.display ="none";
            update_arquivo_downloads(xhr.responseText);
            setTimeout(function(){  
    window.location.href =  "";  
  }, 500);

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
   xhr.open('POST', '<?php echo myUrl('app/views/tao/upload_arquivo_downloads.php?dir=downloads') ?>', true);
   xhr.onload = function (e) {
    if (xhr.readyState === 4) {
          if (xhr.status === 200) {
            var info = document.getElementById("info");
            info.style.display="block";
            info.innerHTML = "ATENÇÃO: Clique no botão Aplicar Alterações para atualizar.";
            loader.style.display ="none";
            update_arquivo_downloads(xhr.responseText);
            setTimeout(function(){  
    window.location.href =  "";  
  }, 500);

          } else {
           alert("Upload error!");
          }
    } 
  };
  xhr.onerror = function (e) {
    alert("Upload error! Apenas extensão jpg e minuscula.");
  };
  xhr.send(data);
}


function update_arquivo_downloads(arquivo) {

var id = document.getElementById("iddownload").value;

  xhr = new XMLHttpRequest();
  xhr.open('POST', '<?php echo myUrl('tao/update_arquivo_downloads/') ?>');
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.onload = function() {
    if (xhr.status === 200) {
     /*alert(xhr.responseText);*/
    }
    else if (xhr.status !== 200) {
      /*alert(xhr.status);*/
    }
  };
  xhr.send(encodeURI('id=' + id + "&arquivo=" + arquivo));
}


</script>