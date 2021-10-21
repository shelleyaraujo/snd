<?php include_once "head.php"; ?>

<?php 
$checked = "";
if($vitrine == "1") {
 $checked = "checked";
}

$checked_a = "";
if($ativo == "1") {
 $checked_a = "checked";
}

$dormitorios = itens($dormitorios);
$suites = itens($suites);
$estado = estados($estado);
$perfil = perfis($perfil);
$forma = formas($forma);

function itens ($dormitorios) {

  $r="";

  for($i=0;$i<20;$i++) {
    if($dormitorios == $i) {
      $r .= "<option value='".$i."' selected>".$i."</option>";
    } else {
      $r .= "<option value='".$i."'>".$i."</option>";
    }
  }

  return $r;
}

function estados ($estado) {

  $r="";

  $uf = array();
  $uf[0][0] = "AC";
  $uf[1][0] = "AL";
  $uf[2][0] = "AP";
  $uf[3][0] = "AM";
  $uf[4][0] = "BA";
  $uf[5][0] = "CE";
  $uf[6][0] = "DF";
  $uf[7][0] = "ES";
  $uf[8][0] = "GO";
  $uf[9][0] = "MA";
  $uf[10][0] = "MT";
  $uf[11][0] = "MS";
  $uf[12][0] = "MG";
  $uf[13][0] = "PA";
  $uf[14][0] = "PB";
  $uf[15][0] = "PR";
  $uf[16][0] = "PE";
  $uf[17][0] = "PI";
  $uf[18][0] = "RJ";
  $uf[19][0] = "RN";
  $uf[20][0] = "RS";
  $uf[21][0] = "RO";
  $uf[22][0] = "RR";
  $uf[23][0] = "SC";
  $uf[24][0] = "SP";
  $uf[25][0] = "SE";
  $uf[26][0] = "TO";

  for($i=0;$i<count($uf);$i++) {
    if($estado == $uf[$i][0]) {
      $r .= "<option value='".$uf[$i][0]."' selected>".$uf[$i][0]."</option>";
    } else {
      $r .= "<option value='".$uf[$i][0]."'>".$uf[$i][0]."</option>";
    }
  }

  return $r;
}

function perfis ($perfil) {

  $r="";

  $perfis = array();
  $uf[0][0] = "Apartamentos";
  $uf[1][0] = "Casas";
  $uf[2][0] = "Salas";
  $uf[3][0] = "Comercial";
  $uf[4][0] = "Terrenos";
  $uf[5][0] = "";
  
  for($i=0;$i<6;$i++) {

    if($perfil == $uf[$i][0]) {
      $r .= "<option value='".$uf[$i][0]."' selected>".$uf[$i][0]."</option>";
    } else {
      $r .= "<option value='".$uf[$i][0]."'>".$uf[$i][0]."</option>";
    }
  }

  return $r;
}


function formas ($forma) {

  $r="";

  $formas = array();
  $uf[0][0] = "Comprar";
  $uf[1][0] = "Alugar";


  for($i=0;$i<2;$i++) {

    if($forma == $uf[$i][0]) {
      $r .= "<option value='".$uf[$i][0]."' selected>".$uf[$i][0]."</option>";
    } else {
      $r .= "<option value='".$uf[$i][0]."'>".$uf[$i][0]."</option>";
    }
  }

  return $r;
}

?>


<body>

  <?php include_once "header.php"; ?>

  <div class="painel"> 
   <div class="p-a"> 
    <div class="menu-tao">
     <?php include_once "menutao.php"; ?>
   </div>
 </div>
 <div class="p-b">
  <a href="<?php 
  if(isset($_SESSION["voltar_itens_imovel"])) {
  echo $_SESSION["voltar_itens_imovel"];
  }
  ?>" class="voltar">Voltar</a>
  <h1>Detalhes do Imóvel</h1>

  <p><?php echo "Data do Cadastro: " . $dma; ?></p>

  <div class="id-estique-vitrine">

    <div><?php echo "Id: " . $id; ?></div>

    <div><input type="checkbox" id="checkbox-ativo" onclick="set_ativo(<?php echo $id; ?>)" <?php echo $checked_a; ?> value="<?php echo $id; ?>">Ativo
    </div>

    <div><input type="checkbox" id="checkbox-vitrine" onclick="set_vitrine(<?php echo $id; ?>)" <?php echo $checked; ?> value="<?php echo $id; ?>">Destaque
    </div>    

  </div>


  <form id="item-imovel" method="POST" onsubmit="return verificar()" action="<?php echo myUrl('tao/imoveis_detalhes/') ?>">


   <div class="cnt-tab1">


     <div class="codigo">
      <label>Código:</label>
      <input type="text" name="codigo" id="codigo" value="<?php echo $codigo; ?>" placeholder="codigo">
    </div>

    <div>
      <label>Área:</label>
      <input type="text" name="area" id="area" value="<?php echo $area; ?>" placeholder="area">
    </div>

    <div>
      <label>Valor:</label>
      <input type="text" name="preco" id="preco" value="<?php echo number_format($preco/100,2,",","."); ?>" placeholder="preco">
    </div>



  </div>

  <div class="cnt-tab2">

    <div class="perfil">
      <label>Perfil:</label>
      <select name="perfil" id="perfil"><?php echo $perfil; ?></select>
    </div>

    <div>
      <label>Forma</label>
      <select name="forma" id="forma"><?php echo $forma; ?></select>
    </div>    

    <div>
      <label>dormitorios</label>
      <select name="dormitorios" id="dormitorios"><?php echo $dormitorios; ?></select>
    </div>

    <div>
      <label>Suites</label>
      <select name="suites" id="suites"><?php echo $suites; ?></select>
    </div>

  </div>

  <div class="cnt-tab3">

    <div>
      <label>Bairro</label>
      <input type="text" name="bairro" id="bairro" value="<?php echo $bairro; ?>" placeholder="bairro">
    </div> 

    <div>
      <label>Cidade</label>
      <input type="text" name="cidade" id="cidade" value="<?php echo $cidade; ?>" placeholder="cidade">
    </div> 

    <div>
      <label>Estado</label>
      <select name="estado" id="estado"><?php echo $estado; ?></select>
    </div> 

  </div>


  <div class="descricao">
    <label>Descrição:</label>
    <textarea name="editor1" id="editor1"><?php echo $descricao ?></textarea>
    <script>  

      CKEDITOR.replace( 'editor1', {
        customConfig: '<?php echo myUrl("app/views/tao/ckeditor/config.js") ?>'
      } );             

    </script>
  </div>

  <div>
    <input type="hidden" name="idimovel" id="idimovel" value="<?php echo $id ?>">
    <input type="hidden" name="update_imovel" value="">
    <input type="text" name="imagem" id="imagem" value="imagem">
    <button type="submit">Atualizar Dados</button>
  </div>

</form>

</div>
<div class="p-c">

  <div class="cnt-botoes">
    <a class="button-vazado" href="javascript:void(0)" onclick="open_upload_imagem()">Inserir Imagem</a>
  </div>

  <div class="cnt-upload-imagem">
    <a href="javascript:void(0)" class="fechar" onclick="close_upload_imagem()">X</a>

    <label>Imagens deste Imóvel</label>
    <div id="uploader">
      <div id="upload2">
        <label for='image-file'>x</label>
        <input id="image-file" type="file" onchange="SavePhoto(this)" >
      </div>
      <img id="picture" src="../../imagens/sem-imagem.jpg" />
      <div id="loader"></div>
      <p>&nbsp;Arraste a imagem <span style="color:red">.jpg</span> aqui</p>
      <?php echo $config_site[0]->crop_imagem_w_imoveis . " x " . $config_site[0]->crop_imagem_h_imoveis . " px" ?> 
    </div>

  </div>


  <div id="cnt-imagens">
    <?php echo $imagens  ?>
  </div>
  <button onclick="getIds()">Aplicar Alterações</button>

</div>
</div>

<div id="paleta-cores">
  <p><a href="javascript:void(0)" onclick="close_cores ()()">X</a></p>
  <div id="mydiv"></div>
  <span id="textcolor"></span>
</div>

<?php include_once "footer.php"; ?>

<style>

.id-estique-vitrine {
  display: flex;
  align-items: center;
  align-content: center;
  justify-content: flex-end;
  flex-wrap: nowrap;
}

.id-estique-vitrine > div {
  background-color: aliceblue;
  margin-left: 10px;
  padding: 5px 10px;
}

.item-imovel {
  display: flex;
  align-items: center;
  align-content: center;
  justify-content: center;
  flex-wrap: wrap;
} 

.item-imovel > div {
  width: 100%;
}

.cnt-tab1 {
 display: flex;
 align-items: center;
 align-content: center;
 justify-content: flex-start;
 flex-wrap: wrap;
 margin-bottom: 20px;
}

.cnt-tab1 > div {
  width: 33.33%;
  padding-right: 10px;
  box-sizing: border-box;
}


.cnt-tab2 {
 display: flex;
 align-items: center;
 align-content: center;
 justify-content: flex-start;
 flex-wrap: wrap;
 margin-bottom: 20px;
}

.cnt-tab2 > div {
  width: 25%;
  padding-right: 10px;
  box-sizing: border-box;
}


.cnt-tab3 {
 display: flex;
 align-items: center;
 align-content: center;
 justify-content: flex-start;
 flex-wrap: wrap;
 margin-bottom: 20px;
}

.cnt-tab3 > div:nth-child(1) {
  width: 50%;
  padding-right: 10px;
  box-sizing: border-box;
}

.cnt-tab3 > div:nth-child(2) {
  width: 40%;
  padding-right: 10px;
  box-sizing: border-box;
}

.cnt-tab3 > div:nth-child(3) {
  width: 10%;
  padding-right: 10px;
  box-sizing: border-box;
}


#item-imovel input {
  background-color: aliceblue;
}

.cnt-tab1 > div:last-child {
  padding-right: 0;
}
.cnt-tab2 > div:last-child {
  padding-right: 0;
}
.cnt-tab3 > div:last-child {
  padding-right: 0;
}

.cnt-codigo {
 display: flex;
 align-items: center;
 align-content: center;
 justify-content: flex-start;
 flex-wrap: wrap;
}


.cnt-codigo > div {
  width: 33.33%;
  padding-right: 10px;
  box-sizing: border-box;
}

.cnt-codigo > div:last-child {
  padding-right: 0;
}


#cnt-imagens ul {
  margin: 0;
  padding: 0;
  list-style: none;
  display: flex;
  align-items: flex-start;
  align-content: flex-start;
  justify-content: flex-start;
  flex-wrap: wrap;
}

#cnt-imagens li {
  width: 25%;
  border: 1px solid white;
  box-sizing: border-box;
  position: relative;
}

#cnt-imagens li a {
  position: absolute;
  top: 0;
  right: 0;
  background: red;
  color: white;
  padding: 0 5px;
  display: block;
}

.cnt-mod-tam-cor {
  display: flex;
  align-items: flex-start;
  align-content: flex-start;
  justify-content: flex-start;
  flex-wrap: wrap;
}

.cnt-mod-tam-cor ul {
  list-style: none;
}

.cnt-mod-tam-cor > div {
  width: 33.33%;
  box-sizing: border-box;
}

.cnt-modelos {
  display: flex;
  align-items: flex-start;
  align-content: flex-start;
  justify-content: flex-start;
  flex-wrap: nowrap;
}

.cnt-modelos input {
  width: 70%;
  max-width: 100px;
  box-sizing: border-box;
}

.cnt-modelos button {
  width: 10%;
  max-width: 30px;
  box-sizing: border-box;
}

.cnt-tamanhos input {
  width: 70%;
  max-width: 100px;
  box-sizing: border-box;
}

.cnt-tamanhos button {
  width: 10%;
  max-width: 30px;
  box-sizing: border-box;
}
.cnt-cores input {
  width: 70%;
  max-width: 100px;
  box-sizing: border-box;
}

.cnt-cores button {
  width: 10%;
  max-width: 30px;
  box-sizing: border-box;
}

.cnt-mod-tam-cor li  {
  position: relative;
  padding-left: 20px;

}

.cnt-mod-tam-cor li a {
  position: absolute;
  top: 0;
  left: 0;
  color: red;
  padding: 0;
  display: block;
  width: 15px;
}

#textcolor {
  width: 300px;
}

#paleta-cores {
  display: none;
  position: fixed;
  bottom: 40%;
  left: 50%;
  margin-left: -250px;
}

#paleta-cores p {
  display: block;
  text-align: right;
  margin: 0;
}


#paleta-cores a {
  background-color: red;
  padding: 5px 10px;
  color: white;
  width: 20px;
  text-align: right;
}


#mydiv  {
}

#mydiv td {
  padding: 2px 2px!important;
}

#categorias {
  background-color: aliceblue;
  border: 1px solid navy;
  padding: 15px;
  box-sizing: border-box;
  margin-bottom: 20px;
  display: none;
  max-width: 200px;
  background-color: aliceblue;
  position: absolute;
  z-index: 99999!important;
}

#categorias ul{
 margin: 0;
 padding: 0;
}

#categorias li{
  font-size: 10px;
  z-index: 999999999;
  list-style: none;
}


#categorias-mudar {
  background-color: aliceblue;
  border: 1px solid navy;
  padding: 15px;
  box-sizing: border-box;
  margin-bottom: 20px;
  display: none;
  max-width: 200px;
  background-color: aliceblue;
  position: absolute;
  z-index: 99999!important;
}

#categorias-mudar ul{
 margin: 0;
 padding: 0;
}

#categorias-mudar li{
  font-size: 10px;
  z-index: 999999999;
  list-style: none;
}




#cnt-menu {
  width: 100%;
  display: flex;
  align-items: center;
  align-content: center;
  flex-wrap: wrap;
  justify-content: flex-start;
  box-sizing: border-box;
}

.column {
  -webkit-border-radius: 5px;
  -ms-border-radius: 5px;
  -moz-border-radius: 5px;
  border-radius: 5px;
  cursor: move;
  margin-bottom: 5px;
  text-align: left;
  padding: 0;
  box-sizing: border-box;
  position: relative;
  width: 33.33%;
}

.column img{
  width: 100%;
}

.column a {
  text-decoration: none;
  color: black;
  text-align: center;
  font-size: 12px;
  padding: 3px 10px;
  color: red;
  font-weight: bold;
}

.column > div {
 padding: 0;
 box-sizing: border-box;
 border: 1px solid #cae1ff ;
 background-color: aliceblue;
 height: 80px;
 background-repeat: no-repeat;
 background-position: center;
}

.column .excluir {
  background-color: red;
  color: white; 
  padding: 2px 0;
  top: 0;
  right: 0;
  font-size: 10px;
  border-radius: 100%;
}


.column header {
  color: #fff;
  text-shadow: #000 0 1px;
  box-shadow: 5px;
  padding: 5px;
  background: -moz-linear-gradient(left center, rgb(0,0,0), rgb(79,79,79), rgb(21,21,21));
  background: -webkit-gradient(linear, left top, right top,
   color-stop(0, rgb(0,0,0)),
   color-stop(0.50, rgb(79,79,79)),
   color-stop(1, rgb(21,21,21)));
  background: -webkit-linear-gradient(left center, rgb(0,0,0), rgb(79,79,79), rgb(21,21,21));
  background: -ms-linear-gradient(left center, rgb(0,0,0), rgb(79,79,79), rgb(21,21,21));
  border-bottom: 1px solid #ddd;
  -webkit-border-top-left-radius: 10px;
  -moz-border-radius-topleft: 10px;
  -ms-border-radius-topleft: 10px;
  border-top-left-radius: 10px;
  -webkit-border-top-right-radius: 10px;
  -ms-border-top-right-radius: 10px;
  -moz-border-radius-topright: 10px;
  border-top-right-radius: 10px;
}

</style>

<?php include_once "upload_imagem_imoveisjs.php"; ?>

<script>

  function verificar() {
    var codigo = document.getElementById("codigo");
    if(codigo.value == "") {
      alert("Digite o titula do Produto ou Serviço.");
      return false;
    } 
    var descr = document.getElementById("codigo");
    if(preco.value == "") {
      alert("Digite o preço");
      return false;
    } 

  }


  function set_vitrine(id) {

    var vitrine="0";
    var checkBox = document.getElementById("checkbox-vitrine");


    if (checkBox.checked == true){
      vitrine="1";
    } 

    xhr = new XMLHttpRequest();
    xhr.open('POST', '<?php echo myUrl('tao/set_vitrine_imovel/') ?>');
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
    xhr.send(encodeURI('id=' + id + "&vitrine=" + vitrine));

  }


  function set_ativo(id) {

    var ativo="0";
    var checkBox = document.getElementById("checkbox-ativo");

    if (checkBox.checked == true){
      ativo="1";
    } 

    xhr = new XMLHttpRequest();
    xhr.open('POST', '<?php echo myUrl('tao/set_ativo_imovel/') ?>');
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
    xhr.send(encodeURI('id=' + id + "&ativo=" + ativo));

  }


  function adicionar_modelo() {

    var idimovel = document.getElementById("idimovel").value;
    var modelo = document.getElementById("modelo").value; 
    var ul = document.getElementById("list-modelos");
    var li = document.createElement("li");
    li.appendChild(document.createTextNode(modelo));

    if(modelo == "") {
      alert("Digite o modelo!");
    } else {
      xhr = new XMLHttpRequest();
      xhr.open('POST', '<?php echo myUrl('tao/insere_modelo_imovel/') ?>');
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      xhr.onload = function() {
        if (xhr.status === 200) {
          info.style.display="block";
          ul.appendChild(li);
          info.innerHTML =  xhr.responseText;
        }
        else if (xhr.status !== 200) {
          alert(xhr.status);
        }
      };
      xhr.send(encodeURI('id=' + idimovel + "&modelo=" + modelo));
    }

  }

  function adicionar_tamanho() {

    var idimovel = document.getElementById("idimovel").value;
    var tamanho = document.getElementById("tamanho").value;
    var ul = document.getElementById("list-tamanhos");
    var li = document.createElement("li");
    li.appendChild(document.createTextNode(tamanho));

    if(tamanho == "") {
      alert("Digite o tamanho!");
    } else {
      xhr = new XMLHttpRequest();
      xhr.open('POST', '<?php echo myUrl('tao/insere_tamanho_imovel/') ?>');
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      xhr.onload = function() {
        if (xhr.status === 200) {
          info.style.display="block";
          ul.appendChild(li);
          info.innerHTML =  xhr.responseText;
        }
        else if (xhr.status !== 200) {
          alert(xhr.status);
        }
      };
      xhr.send(encodeURI('id=' + idimovel + "&tamanho=" + tamanho));
    }
  }

  function adicionar_cor() {
    var idimovel = document.getElementById("idimovel").value;
    var cor = document.getElementById("cor").value;
    var ul = document.getElementById("list-cores");
    var li = document.createElement("li");
    li.appendChild(document.createTextNode(cor));

    if(cor == "") {
      alert("Digite o numero da cor!");
    } else {
      xhr = new XMLHttpRequest();
      xhr.open('POST', '<?php echo myUrl('tao/insere_cor_imovel/') ?>');
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      xhr.onload = function() {
        if (xhr.status === 200) {
          info.style.display="block";
          ul.appendChild(li);
          info.innerHTML =  xhr.responseText;
        }
        else if (xhr.status !== 200) {
          alert(xhr.status);
        }
      };
      xhr.send(encodeURI('id=' + idimovel + "&cor=" +  cor.replace("#","")));
    }
  }



  function excluir_modelo(id) {

   var r = confirm("Tem certeza que quer excluir este modelo?");
   if (r == true) {
    xhr = new XMLHttpRequest();
    xhr.open('POST', '<?php echo myUrl('tao/excluir_modelo_imovel/') ?>');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
      if (xhr.status === 200) {
        info.style.display="block";
        info.innerHTML =  xhr.responseText;
      }
      else if (xhr.status !== 200) {
        alert(xhr.status);
      }
    };
    xhr.send(encodeURI('id=' + id));

  }
}



function excluir_tamanho(id) {

 var r = confirm("Tem certeza que quer excluir este tamanho?");
 if (r == true) {
  xhr = new XMLHttpRequest();
  xhr.open('POST', '<?php echo myUrl('tao/excluir_tamanho_imovel/') ?>');
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.onload = function() {
    if (xhr.status === 200) {
      info.style.display="block";
      info.innerHTML =  xhr.responseText;
    }
    else if (xhr.status !== 200) {
      alert(xhr.status);
    }
  };
  xhr.send(encodeURI('id=' + id));

}
}



function excluir_cor(id) {

 var r = confirm("Tem certeza que quer excluir esta cor?");
 if (r == true) {
  xhr = new XMLHttpRequest();
  xhr.open('POST', '<?php echo myUrl('tao/excluir_cor_imovel/') ?>');
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.onload = function() {
    if (xhr.status === 200) {
      info.style.display="block";
      info.innerHTML =  xhr.responseText;
    }
    else if (xhr.status !== 200) {
      alert(xhr.status);
    }
  };
  xhr.send(encodeURI('id=' + id));

}
}










function excluir_imagem(id, imagem) {

 var r = confirm("Tem certeza que quer excluir esta imagem?");
 if (r == true) {
  xhr = new XMLHttpRequest();
  xhr.open('POST', '<?php echo myUrl('tao/excluir_imagem_imoveis/') ?>');
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.onload = function() {
    if (xhr.status === 200) {
      info.style.display="block";
      info.innerHTML =  xhr.responseText;
    }
    else if (xhr.status !== 200) {
      alert(xhr.status);
    }
  };
  xhr.send(encodeURI('id=' + id + "&imagem=" + imagem));
}

}

</script>

<script type="text/javascript">
  function drawColorPalette(stageID, callback) {
    var listColor = ["00", "33", "66", "99", "CC", "FF"];
    var table = document.createElement("table");
    table.border = 1;
    table.cellPadding = 0;
    table.cellSpacing = 0;
    table.style.borderColor = "#666666";
    table.style.borderCollapse = "collapse";
    var tr, td;
    var color = "";
    var tbody = document.createElement("tbody");
    for (var i = 0; i < listColor.length; i++){
      tr = document.createElement("tr");
      for (var x = 0; x < listColor.length; x++) {
        for (var y = 0; y < listColor.length; y++) {
          color = "#"+listColor[i]+listColor[x]+listColor[y];
          td = document.createElement("td");
          td.style.width = "5px";
          td.style.height = "5px";
          td.style.background = color;
          td.color = color;
          td.style.borderColor = "#000";
          td.style.cursor = "pointer";

          if (typeof(callback) == "function") {
            td.onclick = function() {
              callback.apply(this, [this.color]);
            }
          }
          tr.appendChild(td); 
        }
      }
      tbody.appendChild(tr);
    }  
    table.appendChild(tbody);
    var element = document.getElementById(stageID);
    if (element) element.appendChild(table);
    return table;
  }

  window.onload = function() {
    drawColorPalette("mydiv", function(color) {
      var cor = document.getElementById("cor");
      cor.value = color;
      var paleta_cores = document.getElementById("paleta-cores");
      paleta_cores.style.display = "none";
    }); 
  }


  function open_cores () {
    var paleta_cores = document.getElementById("paleta-cores");
    paleta_cores.style.display = "block";
  }

  function close_cores () {
    var paleta_cores = document.getElementById("paleta-cores");
    paleta_cores.style.display = "none";
  }

  function get_categorias() {
   var categorias = document.getElementById("categorias");
   var idimovel = document.getElementById("idimovel").value;

   if(categorias.style.display === "none" || categorias.style.display === "") {
     categorias.style.display = "block";
   } else {
     categorias.style.display = "none";
   }

   xhr = new XMLHttpRequest();
   xhr.open('POST', '<?php echo myUrl('tao/modulos_relacionados/') ?>');
   xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
   xhr.onload = function() {
    if (xhr.status === 200) {
      categorias.innerHTML =  xhr.responseText;
    }
    else if (xhr.status !== 200) {
      alert(xhr.status);
    }
  };
  xhr.send(encodeURI("id=" + idimovel));
}

function get_categorias_mudar() {
 var categorias_mudar = document.getElementById("categorias-mudar");
 var idimovel = document.getElementById("idimovel").value;

 if(categorias_mudar.style.display === "none" || categorias_mudar.style.display === "") {
   categorias_mudar.style.display = "block";
 } else {
   categorias_mudar.style.display = "none";
 }

 xhr = new XMLHttpRequest();
 xhr.open('POST', '<?php echo myUrl('tao/modulos_trocar/') ?>');
 xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
 xhr.onload = function() {
  if (xhr.status === 200) {
    categorias_mudar.innerHTML =  xhr.responseText;
  }
  else if (xhr.status !== 200) {
    alert(xhr.status);
  }
};
xhr.send(encodeURI("id=" + idimovel));
}


function set_relacionado(idmodulo) {

 var idimovel = document.getElementById("idimovel").value;
 var relacionado = document.getElementById("relacionado" + idmodulo);

 xhr = new XMLHttpRequest();
 xhr.open('POST', '<?php echo myUrl('tao/set_relacionado/') ?>');
 xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
 xhr.onload = function() {
  if (xhr.status === 200) {
    alert(xhr.responseText);
  }
  else if (xhr.status !== 200) {
    alert(xhr.status);
  }
};
xhr.send(encodeURI("id=" + idimovel + "&idmodulo=" + idmodulo + "&relacionado=" + relacionado));
}


function trocar_modulo(idmodulo) {

 var idimovel = document.getElementById("idimovel").value;

 xhr = new XMLHttpRequest();
 xhr.open('POST', '<?php echo myUrl('tao/set_modulo_trocar/') ?>');
 xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
 xhr.onload = function() {
  if (xhr.status === 200) {
    alert(xhr.responseText);
  }
  else if (xhr.status !== 200) {
    alert(xhr.status);
  }
};
xhr.send(encodeURI("id=" + idimovel + "&idmodulo=" + idmodulo));
}

</script>





<script>


  function adicionar_item_modulo(id_modulo, modulo) {

    xhr = new XMLHttpRequest();
    xhr.open('POST', '<?php echo myUrl('tao/adicionar_item_modulo/') ?>');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
      if (xhr.status === 200) {
        info.style.display="block";
        info.innerHTML = xhr.responseText;
      }
      else if (xhr.status !== 200) {
       /* alert(xhr.status); */
     }
   };
   xhr.send(encodeURI('id_modulo=' + id_modulo + "&modulo=" + modulo));
 }

 function getElem(id, ordem) {

  xhr = new XMLHttpRequest();
  xhr.open('POST', '<?php echo myUrl('tao/ordenar_imagens_imovel/') ?>');
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

  info.innerHTML =  "Salvando..."

  xhr.onload = function() {
    if (xhr.status === 200) {
      info.style.display="block";
      info.innerHTML =  xhr.responseText;
    }
    else if (xhr.status !== 200) {
      //alert(xhr.status);// 
   }
 };
 xhr.send(encodeURI('id=' + id + "&ordem=" + ordem));

}


function allowDrop(ev)
{
  ev.preventDefault();
}

function drag(ev)
{
  ev.dataTransfer.setData("Text",ev.target.id);
}

function drop(ev)
{
  var data = ev.dataTransfer.getData("Text");
  ev.target.appendChild(document.getElementById(data));

  var x = ev.target.querySelectorAll("div");

  ev.preventDefault();
}

</script>



<style>
.column.over {
  border: 2px dashed #000;
}
</style>

<script>

  function handleDragStart(e) {
    this.style.opacity = '0.4';  
  }

  function handleDragOver(e) {
    if (e.preventDefault) {
      e.preventDefault(); 
    }

    e.dataTransfer.dropEffect = 'move';  

    return false;
  }

  function handleDragEnter(e) {
    this.classList.add('over');
  }

  function handleDragLeave(e) {
    this.classList.remove('over');  
  }

  var cols = document.querySelectorAll('#cnt-menu .column');
  [].forEach.call(cols, function(col) {
    col.addEventListener('dragstart', handleDragStart, false);
    col.addEventListener('dragenter', handleDragEnter, false);
    col.addEventListener('dragover', handleDragOver, false);
    col.addEventListener('dragleave', handleDragLeave, false);
  });

  function handleDrop(e) {
    if (e.stopPropagation) {
      e.stopPropagation(); 
    }
    return false;
  }

  function handleDragEnd(e) {
    [].forEach.call(cols, function (col) {
      col.classList.remove('over');
    });
  }

  var cols = document.querySelectorAll('#cnt-menu .column');
  [].forEach.call(cols, function(col) {
    col.addEventListener('dragstart', handleDragStart, false);
    col.addEventListener('dragenter', handleDragEnter, false)
    col.addEventListener('dragover', handleDragOver, false);
    col.addEventListener('dragleave', handleDragLeave, false);
    col.addEventListener('drop', handleDrop, false);
    col.addEventListener('dragend', handleDragEnd, false);
  });

  var dragSrcEl = null;

  function handleDragStart(e) {
    this.style.opacity = '0.4';
    dragSrcEl = this;
    e.dataTransfer.effectAllowed = 'move';
    e.dataTransfer.setData('text/html', this.innerHTML);
  }

  function handleDrop(e) {
    if (e.stopPropagation) {
    e.stopPropagation(); // Stops some browsers from redirecting.
  }
  if (dragSrcEl != this) {
    dragSrcEl.innerHTML = this.innerHTML;
    this.innerHTML = e.dataTransfer.getData('text/html');
  }
  return false;
}


function getIds() {

  var divs = document.querySelectorAll("#cnt-menu > div");
  for(var i=0; i < divs.length; i++) {
    var ids = divs[i].querySelector("div");
    var id = ids.getAttribute('id');
    getElem(id, i);
  }

}

var upload_imagem = document.querySelector(".cnt-upload-imagem");

function open_upload_imagem() {

  if(upload_imagem.style.display == "none" || upload_imagem.style.display == "" ) {
    upload_imagem.style.display = "block";
  } else {
    upload_imagem.style.display = "none";
  }
 
}

function close_upload_imagem() {
  upload_imagem.style.display = "none";
}

</script>

</body>
</html>

