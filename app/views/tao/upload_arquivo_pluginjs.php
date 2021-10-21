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
      xhr.open('POST', '<?php echo myUrl('app/views/tao/upload_arquivo.php?dir=plugin') ?>', true);
      xhr.onload = function (e) {

        if (xhr.readyState === 4) {
          if (xhr.status === 200) {
            // OK - Do something
            // console.log(xhr.responseText);
            // 
            var info = document.getElementById("info");
            info.style.display="block";
            info.innerHTML = "Arquivo enviado com sucesso!";
            loader.style.display ="none";
            update_arquivo_plugin(xhr.responseText);
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

   alert(inp);



 }




 function update_arquivo_plugin(arquivo) {

  var id = document.getElementById("id").value;

  xhr = new XMLHttpRequest();
  xhr.open('POST', '<?php echo myUrl('tao/update_arquivo_plugin/') ?>');
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

async function SavePhoto(inp) {
 loader.style.display ="block";
 var photo = inp.files[0];      
 var xhr = new XMLHttpRequest(),
 data = new FormData();
 data.append('file-upload', photo);
 xhr.open('POST', '<?php echo myUrl('app/views/tao/upload_arquivo.php?dir=catalogo') ?>', true);
 xhr.onload = function (e) {
  if (xhr.readyState === 4) {
          if (xhr.status === 200) {
            // OK - Do something
            // console.log(xhr.responseText);
            // 
            var info = document.getElementById("info");
            info.style.display="block";
            info.innerHTML = "Arquivo enviado com sucesso!";
            loader.style.display ="none";
            update_arquivo_plugin(xhr.responseText);
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


</script>