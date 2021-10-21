<?php include_once "_compress_code.php"; ?>
<?php include_once "head.php"; ?>

<style>


.emial_cliente {
  color: green;
  width: 100%;
  margin-bottom: 30px;
}

#formas-pagamento-disponiveis {
 text-align: center;
 padding: 5px 20px;
 margin: 0;
}

#formas-pagamento {
 display: -webkit-box;
 display: -moz-box;
 display: -ms-flexbox;
 display: -webkit-flex;
 display: flex;  
 align-items: center;
 align-content: center;
 justify-content: flex-start;
 flex-wrap: wrap;
 box-sizing: border-box;
 width: 100%;
 margin: 0 auto;
 margin-bottom: 0;
}

#formas-pagamento > div {
  background-color: white;
  width: 100%;
  max-width: 300px;
  margin-bottom: 20px;
  text-align: center;
  color: black;
  padding: 15px;
  padding-top: 100px;
  border: 1px solid silver;
  box-shadow: -3px 3px 3px -1px rgba(153,153,153,0.75);
  -webkit-box-shadow: -3px 3px 3px -1px rgba(153,153,153,0.75);
  -moz-box-shadow: -3px 3px 3px -1px rgba(153,153,153,0.75);
}


#formas-pagamento input[type="submit"] {
  cursor: pointer;
}

#forma-pagseguro {
  background-position: center top 15px;
  background-repeat: no-repeat;
  background-size: auto;
  background-image: url(<?php echo myUrl("app/views/tema_tao/imagens/b-pagseguro.png") ?>);
}

#forma-pedido-via-email {
  background-position: center top 15px;
  background-repeat: no-repeat;
  background-size: auto;
  background-image: url(<?php echo myUrl("app/views/tema_tao/imagens/b-pedido.png") ?>);
}

#forma-orcamento {
  background-position: center top 15px;
  background-repeat: no-repeat;
  background-size: 40%;
  background-image: url("data:image/svg+xml,%3C%3Fxml version='1.0' encoding='UTF-8'%3F%3E%3C!-- Created with Inkscape (http://www.inkscape.org/) --%3E%3Csvg width='573' height='500' version='1.1' viewBox='0 0 573 500' xml:space='preserve' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'%3E%3Cg transform='matrix(1.3333 0 0 -1.3333 0 1122.7)'%3E%3Cpath d='m229.17 525.25 36.245-34.241zm-8.7072-19.902a10.573 10.573 0 0 0 0-21.146h-193.29a24.498 24.498 0 0 0-17.276 7.256 24.532 24.532 0 0 0-7.2214 17.276v305.72a24.394 24.394 0 0 0 7.256 17.276 24.532 24.532 0 0 0 17.242 7.3251h292a24.532 24.532 0 0 0 17.276-7.2214l0.7256-0.79471a24.739 24.739 0 0 0 6.4958-16.585v-144.71a10.573 10.573 0 0 0-21.146 0v144.71a3.4552 3.4552 0 0 1-0.76015 2.1422l-0.27642 0.27642a3.4552 3.4552 0 0 1-2.4187 1.0366h-291.9a3.4552 3.4552 0 0 1-2.4187-1.0366 3.4552 3.4552 0 0 1-1.002-2.4187v-305.65a3.4552 3.4552 0 0 1 1.0366-2.4187 3.4552 3.4552 0 0 1 2.4187-1.002zm111.88 100.75c12.232 12.784 20.731 23.807 39.735 25.983 35.382 4.0426 67.895-32.203 49.997-67.861-5.0792-10.158-15.445-22.252-26.882-34.103-12.542-13.026-26.363-25.776-36.245-35.451l-26.571-26.363-21.975 21.146c-26.433 25.431-69.416 57.495-70.971 97.161-0.96747 27.642 20.973 45.609 46.196 45.298 22.563-0.31098 32.099-11.506 46.715-25.811zm-247.6 0a12.508 12.508 0 1 0-12.508-12.37 12.508 12.508 0 0 0 12.508 12.508zm50.827-25.12a10.884 10.884 0 0 0 0 21.388h40.772a10.884 10.884 0 0 0 0-21.388zm-50.827 99.131a12.508 12.508 0 1 0-12.508-12.473 12.508 12.508 0 0 0 12.508 12.473zm50.827-23.979a10.711 10.711 0 0 0 0 21.111h83.237a10.711 10.711 0 0 0 0-21.111zm-50.827 97.921a12.508 12.508 0 1 0-12.508-12.508 12.508 12.508 0 0 0 12.508 12.508zm50.827-22.977a9.8129 9.8129 0 0 0-8.88 10.538 9.8474 9.8474 0 0 0 8.88 10.573h117.1a9.8474 9.8474 0 0 0 9.0527-10.573 9.8129 9.8129 0 0 0-8.88-10.538z' fill='%230a4' stroke-width='.75'/%3E%3C/g%3E%3C/svg%3E%0A");
}

.botao-pagseguro {
  background: green!important;
}

#cnt-pag {
 display: -webkit-box;
 display: -moz-box;
 display: -ms-flexbox;
 display: -webkit-flex;
 display: flex;  
 align-items: center;
 align-content: center;
 justify-content: center;
 flex-wrap: wrap;
 width: 100%;
 max-width: 500px;
 margin: 0 auto;
}

#cnt-pag > div {
  width: 100%;
  display: -webkit-box;
  display: -moz-box;
  display: -ms-flexbox;
  display: -webkit-flex;
  display: flex;  
  align-items: center;
  align-content: center;
  justify-content: center;
  flex-wrap: wrap;
  padding: 20px;
  padding-bottom: 0;
}


#cnt-pag > div:first-child {
  padding: 0;
}

#cnt-pag form {
  margin-bottom: 0;
}

#cnt-pag .button-primary {
  margin-bottom: 0;
  width: 100%;
  display: block;
}


#cnt-pag  ul {
  list-style: none;
  padding: 0;
  margin: 0;
  width: 100%;
  display: block;
  color: white;
}
#cnt-pag  p {
  color: black;
}
#cnt-finalizar {
 display: -webkit-box;
 display: -moz-box;
 display: -ms-flexbox;
 display: -webkit-flex;
 display: flex;  
 align-items: stretch;
 align-content: flex-start;
 justify-content: flex-start;
 flex-wrap: wrap;
 width: 100%;
 max-width: 1200px;
 margin: 0 auto;
 margin-bottom: 50px;
 padding: 0;
}

#cnt-finalizar > div {
  width: 100%;
  border: 1px solid dodgerblue;
  background: aliceblue;
  padding: 20px;
  margin-bottom: 30px;
}

#cnt-finalizar > div:first-child {
  background: dodgerblue;
}

@media (min-width: 768px) {


  #cnt-finalizar > div {
    width: 50%;



  }

}


#loader {
  position: absolute;
  display: none;
  border: 15px solid black; 
  border-right: 15px solid red; 
  border-top: 15px solid gold; 
  border-bottom: 15px solid dodgerblue; 
  border-radius: 100%;
  width: 100px;
  height: 100px;
  animation: spin 2s linear infinite;
  top: 50%;
  margin-top: 30px;
  left: 50%;
  margin-left: -30px;
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}


#pag1, #pag2, #pag3, #pag4 {
  display: none;
  width: 100%;
  padding: 15px;
  border: 1px solid dodgerblue;
  background: white;
}

.container h1{
  text-align: left!important;
  border-bottom: 5px solid seagreen;
  margin-bottom: 50px;
  padding-bottom: 5px;
}

</style>

</head>

<body>

  <?php include_once "cabecalho_loja.php"; ?>

  <main id="maincontent">

    <div class="container">
     <h1>2 - <?php echo $conteudo_titulo; ?></h1>
   </div>


   <div class="container emial_cliente"><?php echo "Seu email: " .$_SESSION["email"]?></div>

   <div class="container">

    <div id="cnt-finalizar">
      <div>
        <h2>Meios Pagamento</h2>
        <div id="cnt-pag">
          <div>
            <ul>
              <li><input type="radio" name="pag" valor="pagseguro"  onclick="openIinfoMeioPagamento('1')"> PageSeguro
                <div id="pag1">
                  <p>PageSeguro
                  </p>
                  <a class="button button-primary" href="javascript:void(0)" onclick="pag_seguro()">Pagseguro</a>
                </div>


              

                 <li>
                   <li><input type="radio" name="pag" valor="pagseguro" onclick="openIinfoMeioPagamento('2')"> Pix
                    <div id="pag2">
                      <p>
                        Pix
                      </p>
                      <a class="button button-primary" href="javascript:void(0)" onclick="pix()">Pix</a>
                    </div>

                    <li>

                      <li><input type="radio" name="pag" valor="pagseguro" onclick="openIinfoMeioPagamento('3')">Pagar.me
                        <div id="pag3">
                         <p> Pagar.me

                         </p>
                         <form id="comprar" action="<?php echo myUrl() ?>pagamento/enviar_orcamento/?email=<?php echo $_SESSION["email"]; ?>" method="post">
                           <input class="button button-primary" type="submit" value="Enviar"/>
                         </form>
                       </div>
                       <li>
                        <li><input type="radio" name="pag" valor="pagseguro" onclick="openIinfoMeioPagamento('4')"> Transferência Bancária
                          <div id="pag4">
                            <p>     Transeferência Bncária
                            </p>
                            <a class="button button-primary" href="javascript:void(0)" onclick="pix()">Pix</a>

                          </div>
                          <li>
                          </ul>
                        </div>


                      </div>


                    </div>
                    <div>
                      <h2>Seu Pedido</h2>
                      <?php echo $pedido; ?>
                    </div>
                  </div>


                  <div id="info"></div>

                </div>

              </main>

              <?php include_once "rodape_loja.php"; ?>


              <div id="loader"></div>

            </body>

            </html>

            <?php include_once "_final.php"; ?>



<script>


function pag_seguro() {

 var o_code = document.getElementById("code");
 var o_info = document.getElementById("info");
 var o_loader = document.getElementById("loader");

 var x = '1242465656565656';

 xhr = new XMLHttpRequest();
 xhr.open('POST', '<?php  echo myUrl('app/PagSeguroLibrary/') ?>');
 xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
 xhr.onload = function() {
  if (xhr.status === 200) {
    o_loader.style.display = "block";
    o_loader.style.display = "block";
      window.location.href = xhr.responseText;
  }

  else if (xhr.status !== 200) {
    alert("erros");
  }
};
xhr.send(encodeURI('id=x'));
}

function openIinfoMeioPagamento(id) {


 var pag = document.querySelector("#pag"+id);

 if(pag.style.display === "none" || pag.style.display === ""){
   pag.style.display = "block";

 } else {
  pag.style.display = "none";
}

}


</script>