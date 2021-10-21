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

    var favicon = document.getElementById("favicon");
   if(favicon.checked) {
    logo = "favicon";
   }


    // RUN THROUGH THE DROPPED FILES + AJAX UPLOAD
    for (var i = 0; i < e.dataTransfer.files.length; i++) {
      
      var xhr = new XMLHttpRequest(),
          data = new FormData();
      data.append('file-upload', e.dataTransfer.files[i]);
      if(logo == "logo") {
      xhr.open('POST', '<?php echo myUrl('app/views/tao/upload.php?img=logo') ?>', true);
} else{
      xhr.open('POST', '<?php echo myUrl('app/views/tao/upload.php?img=favicon') ?>', true);
}      xhr.onload = function (e) {
        if (xhr.readyState === 4) {
          if (xhr.status === 200) {
            // OK - Do something
            // console.log(xhr.responseText);
            var info = document.getElementById("info");
            info.style.display="block";
            info.innerHTML = "Arquivo enviado com sucesso!";
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


  async function SavePhoto(inp) {
   loader.style.display ="block";
   var photo = inp.files[0];      
   var logo = "logo";

   var favicon = document.getElementById("favicon");
   if(favicon.checked) {
    logo = "favicon";
   }

   var xhr = new XMLHttpRequest(),
   data = new FormData();
   data.append('file-upload', photo);

if(logo == "logo") {
      xhr.open('POST', '<?php echo myUrl('app/views/tao/upload.php?img=logo') ?>', true);
} else{
      xhr.open('POST', '<?php echo myUrl('app/views/tao/upload.php?img=favicon') ?>', true);
}
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