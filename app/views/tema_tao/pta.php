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

<?php echo $destaques; ?>

<div class="container cnt-posts">
  <div>
    <?php echo $modulo; ?>
  </div>
</div>


<?php include_once "rodape.php"; ?>

<style>

  .cnt-posts {
    display: flex;
    align-content: flex-start;
    align-items: stretch;
    justify-content: center;
    flex-wrap: wrap;
    box-sizing: border-box;
    margin: 0 auto;  background-color: transparent;
    margin: 0 auto;
    text-align: left;
  }

  .cnt-posts > div:nth-child(1) {
    width: 100%;
  }

  .cnt-posts > div:nth-child(2) {
    width: 100%;
  }

  .cnt-posts li {
    list-style: none;
  }

  .cnt-posts a {
    color: #222;
  }

  .menu-blog > p {
    background: #264653;
    color: white;
    padding: 5px 15px;
  }

  .textos-links img {
    margin-right: 25px;
    margin-top: 7px;
    margin-bottom: 5px;
    float: left;
  }

  .textos-links > div {
    border-bottom: 1px solid silver;
    margin-bottom: 25px;
    padding-bottom: 25px;
  }

  .posts-home ul {
   display: -webkit-box;
   display: -moz-box;
   display: -ms-flexbox;
   display: -webkit-flex;
   display: flex;  
   align-items: stretch;
   align-content: center;
   justify-content: center;
   flex-wrap: wrap;
   margin: 0 auto;
 }

 .posts-home li {
  width: 33.33%;
  padding: 15px;
  list-style: none;
  margin: 0;
}


.cnt-posts a {
    text-decoration: none;
  }

.cnt-posts h2 {
    margin-bottom: 0;
  }

.cnt-posts p{
    margin: 0;
  }

.cnt-posts  div {
    margin-bottom: 15px;
    border-bottom: 1px solid silver;
    overflow: hidden;
    padding-bottom: 15px;
  }

 .cnt-posts img {
    float: left;
    margin-right: 15px;
   }


</style>

<?php include_once "rodape.php"; ?>


<style>


.conteudo-vitrine {
  width: 100%;
  max-width: 1200px;
  margin: 0 auto;
  list-style: none;
  padding: 0 20px;
}

.conteudo-vitrine:empty {
  display: none;
}


.conteudo-vitrine:before {
  content: "Posts em Destaque";
  border-bottom: 1px solid silver;
  margin-bottom: 20px;
  width: 100%;
  display: block;
  text-transform: uppercase;
  font-size: 20px;
}

.conteudo-vitrine > li div {
  border-bottom: 1px solid silver;
  margin-bottom: 20px;
}






  .cnt-catalogo {

    margin: 0 auto;
    display: -webkit-box;
    display: -moz-box;
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;  
    align-items: stretch;
    align-content: center;
    justify-content: center;
    flex-wrap: wrap;
    width: 100%;
    max-width: 1200px;
  }
  .cnt-catalogo > div{
   border: 1px solid silver;
   width: 50%;
   width: calc(50% - 20px);
   overflow: hidden;
   text-align: center;
   margin: 0 10px 20px 10px;
   padding: 15px;
 }

 .cnt-catalogo img{
   width: 100%;
   max-width: 400px;
   height: auto;
 }

  .cnt-catalogo a{
   text-decoration: none;
   color: black;
 }


 @media (min-width: 768px) {

  .cnt-catalogo > div{
   width: 25%;
   width: calc(25% - 20px);
 }

}


/* Style the buttons that are used to open and close the accordion panel */
.accordion {
  background: #eee;
  color: #444;
  cursor: pointer;
  padding: 5px 15px;
  width: 100%;
  text-align: left;
  border: none;
  outline: none;
  transition: 0.4s;
  transition: 0.5s ease;
  border-bottom: 1px solid #ccc;
}

/* Add a background color to the button if it is clicked on (add the .active class with JS), and when you move the mouse over it (hover) */
.active, .accordion:hover {
  background-color: #ccc;
}

/* Style the accordion panel. Note: hidden by default */
.panel {
  padding: 0 18px;
  padding-top: 20px;
  background-color: white;
  display: none;
  overflow: hidden;
  transition: left 0.5s ease;
}

.accordion:after {
  content: '+'; 
  font-size: 13px;
  color: #777;
  float: right;
  margin-left: 5px;
}

.active:after {
  content: "-"; /* Unicode character for "minus" sign (-) */
}

</style>

<script>

  var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    /* Toggle between adding and removing the "active" class,
    to highlight the button that controls the panel */
    this.classList.toggle("active");

    /* Toggle between hiding and showing the active panel */
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}

</script>

</body>

</html>

<?php include_once "_final.php"; ?>
