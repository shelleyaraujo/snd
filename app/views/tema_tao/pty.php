<?php include_once "_compress_code.php"; ?>
<?php include_once "head.php"; ?>

<body>

  <a class="skip-link xxx" href="#maincontent">Skip to main</a>

  <?php include_once "cabecalho.php"; ?>
  <?php //include_once "slider.php"; ?>

  <main id="maincontent">

   <div class="container">
     <h1><?php echo $titulotextomodulo; ?></h1>
   </div>

 <div class="container">
    <?php echo $textomodulo; ?>
  </div>

</main>

<div class="cnt-modulo">
 <?php echo $modulo; ?> 
</div>

<div id="full-video">
  <div id="video">
    <div id="fechar-video">
      <a href="javascript:void(0)" onclick="closeVideo()">X</a>
      <div id="v"></div>
    </div>
  </div>
</div>


<?php include_once "rodape.php"; ?>


<style>

.cnt-modulo {
  width: 100%;
  max-width: 1024px;
  margin: 0 auto;
  padding: 0 15px;
}

#fechar-video {
  width: 100%;
  color: white;
  margin-top: 20px;
}

#fechar-video a {
  color: gold;
  font-size: 30px;
  padding: 20px;
}

#full-video {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: rgba(000,000,000,0.8);
  display: none;
  align-items: center;
  align-content: center;
  justify-content: center;
  z-index: 999999;
  
}

#nav-videosyoutube {
  width: 100%;
  display: flex;
  align-items: flex-start;
  align-content: flex-start;
  justify-content: flex-start; 
  flex-wrap: nowrap;
  box-sizing: border-box;
}

#videosyoutube {
  list-style: none;
  margin: 0;
  padding: 0;
  display: flex;
  align-items: flex-start;
  align-content: flex-start;
  justify-content: center; 
  flex-wrap: wrap;
  width: 100%;
  box-sizing: border-box;
}

#videosyoutube li {
  width: 100%;
  box-sizing: border-box;
}

#videosyoutube p {
  margin-bottom: 0;
  text-align: left;
}


#videosyoutube p:empty {
 display: none;
}


#videosyoutube h2 {
 margin: 0;
}


.conteudo-texto {
  margin-bottom: 50px;
}

#row-2 {
  width: 100%;
  max-width: 1200px;
  margin: 0 auto;
}

#row-2 iframe {
  width: 100%;
}

.cnt-videosyoutube {
  width: 100%;
  display: flex;
  align-items: flex-start;
  align-content: flex-start;
  justify-content: flex-start; 
  flex-wrap: wrap;
  box-sizing: border-box;
}

.cnt-videosyoutube > div {
  padding: 15px;
  overflow: hidden;
  margin-bottom: 100px;
  box-sizing: border-box;
  box-sizing: border-box;

}

.cnt-videosyoutube img {
  width: 100%;
  height: auto!important;
  float: left;
  margin-right: 20px;
  margin-top: 7px;
  padding-bottom: 20px;
}

#videosyoutube iframe {
  width: 100%!important;
  height: 200px!important;
  max-width: 800px;
}


#video iframe {
  width: 100%;
  width: 800px;
  height: 600px;
}

.cnt-video {
  display: flex;
  align-items: flex-start;
  align-content: flex-start;
  justify-content: flex-start; 
  flex-wrap: wrap;
  box-sizing: border-box;
}

.cnt-video  img  {
  width: 100%;
  box-sizing: border-box;
}

.cnt-video div  {
  width: 100%;
  text-align: left!important;
}

.cnt-video h2  {
 text-align: left;
 font-size: 16px;
 display: flex;
 align-items: flex-start;
 align-content: flex-start;
 justify-content: flex-start; 
 flex-wrap: wrap;
 margin-bottom: 20px!important;
 color: #444;
}

@media screen and (min-width: 550px) {

  #videosyoutube li {
    width: 20%;
    padding: 10px;
    text-align: left!important;
  }



}

</style>


</body>

</html>

<?php include_once "_final.php"; ?>


<script>

  function openVideo(v) {
    var full_video = document.getElementById("full-video");
    var video_frame = document.getElementById("v");

    var iframe =  '<iframe width="600" height="400" src="https://www.youtube.com/embed/'+ v +'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';

    full_video.style.display = "flex";
    video_frame.innerHTML = iframe;
  }

  function closeVideo() {
    var full_video = document.getElementById("full-video");
    full_video.style.display = "none";

    var iframe = video.querySelector( 'iframe');
    var v = video.querySelector( 'video' );
    if ( iframe ) {
      var iframeSrc = iframe.src;
      iframe.src = iframeSrc;
    }
    if ( v ) {
      v.pause();
    } 

  }

</script>

</body>

</html>

<?php include_once "_final.php"; ?>
