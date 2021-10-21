<?php include_once "head.php"; ?>

<body>

 <?php include_once "header.php"; ?>

 <div class="painel">

   <div class="p-a">
    <?php include_once "menutao.php"; ?>
  </div>

  <div class="p-b">
    <h1>Menu - Alterar Categorias</h1>

 <div class="cnt-botoes">
    <a href="<?php echo myUrl('tao/menu_mudar_categoria/') ?>" class="button-vazado"> Institucional</a>
    <a href="<?php echo myUrl('tao/menu_mudar_categoria/?modulo=Catalogo') ?>"  class="button-vazado"> Catálogo</a>
    <a href="<?php echo myUrl('tao/menu_mudar_categoria/?modulo=Todos') ?>"  class="button-vazado ">Todos</a>
</div>

    <div class="cnt-cnt-menu">

      <div>
       <div>
        <div id='0'>
          <a href='javascript:void(0)' onclick=open_itens_categoria2('0')></a>
        </div>
        <div id='0'>
        <p>Hierarquia atual das Páginas</p>
          <br><br>
        </div>
        <?php echo $menu1 ?>
      </div>

    </div>
    <div>
    </div>
    <div>
      <div>
        <div id='0'>
        <p>Nova hierarquia</p>
          <input type='radio' name='cat' onclick=update_item(0)>&nbsp;&nbsp;&nbsp;Raiz Nivel 0
          <br><br>
        </div>
        <?php echo $menu2 ?>
      </div>
    </div>

  </div>



</div>

<div class="p-c">
  <input type="hidden" id="origem" value="0">
  <input type="hidden" id="destino" value="0">
</div>

</div>



<?php include_once "footer.php"; ?>

<style>

.cnt-cnt-menu {
  width: 100%;
  display: block;
}

.cnt-cnt-menu a {
 text-decoration: none;
}

.cnt-menu {
  border: 1px solid silver;
}

.cnt-menu > div {
  cursor: move;
  border: 1px solid #cae1ff;
  margin: 5px;
}

.cnt-menu a {
  display: block;
  padding: 5px;
  text-decoration: none;
  background-color: aliceblue;
}

.cnt-cnt-menu {
  display: flex;
  align-items: flex-start;
  align-content: stretch;
  justify-content: flex-start;
  flex-wrap: wrap;
}

.cnt-cnt-menu > div {
  width: 45%;
  box-sizing: border-box;
  text-align: center;
}

.cnt-cnt-menu > div div {
  text-align: left;
}


.cnt-cnt-menu > div:nth-child(2) {
  width: 10%;
}

.cnt-cnt-menu > div:nth-child(2) button{
 padding: 0 10px;
 background-color: transparent;
 border: 0;
 position: relative;
 margin-top: 50px;
}

.cnt-cnt-menu > div:nth-child(2) button:after {
 content: "APLICAR";
 position: absolute;
 color: #1C9D58;
 left: -10px;
 top: 20px;
}

.cnt-cnt-menu > div:nth-child(2) button:before {
 content: "";
 position: absolute;
 border-radius: 100%;
 width: 30px;
 height: 30px;
 background-color: #1C9D58;
 left: 3px;
}

.cnt-cnt-menu ul {
  background-color: white;
  margin: 0;
  padding: 0;
  list-style: none;
}

.cnt-cnt-menu ul {
  background-color: white;
  margin: 0;
  padding: 0;
  list-style: none;
}

.cnt-cnt-menu li {
  padding: 5px 0;
  border-left: 15px solid white;
  margin: 0;
  background-color: aliceblue;
  display: block;
  font-size: 12px;
}

.cnt-cnt-menu > div:nth-child(1) ul li {
  background-color: rgba(50,150,255,0.1);
  font-weight: 600;
}
.cnt-cnt-menu > div:nth-child(1) ul ul li {
  background-color: rgba(50,150,255,0.2);
  font-weight: normal;
}
.cnt-cnt-menu > div:nth-child(1) ul ul ul li {
  background-color: rgba(50,150,255,0.3);
}
.cnt-cnt-menu > div:nth-child(1) ul ul ul ul li {
  background-color: rgba(50,150,255,0.4);
  font-weight: normal;
}

.ul-main input { 
  margin-right: 10px;
}


.cnt-cnt-menu  ul li {
  background-color: rgba(100,200,100,0.1);
  font-weight: 600;
}
.cnt-cnt-menu  ul ul li {
  background-color: rgba(100,200,100,0.2);
  font-weight: normal;
}
.cnt-cnt-menu  ul ul ul li {
  background-color: rgba(100,200,100,0.3);
}
.cnt-cnt-menu  ul ul ul ul li {
  background-color: rgba(100,200,100,0.4);
  font-weight: normal;
}


</style>

<script>


  function open_itens_categoria(id) {

    var pai = document.getElementById("itens" + id);
    var origem = document.getElementById("origem");
    origem.value = id;

    xhr = new XMLHttpRequest();
    xhr.open('POST', '<?php echo myUrl('tao/menu_itens_categoria') ?>');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
      if (xhr.status === 200) {
      /*info.style.display="block";
      info.innerHTML =  xhr.responseText;*/
      if(pai.innerHTML == "") {
        pai.innerHTML =  xhr.responseText;

      } else {
        pai.innerHTML =  "";
      }
    }

    else if (xhr.status !== 200) {
      alert(xhr.status);
    }
  };
  xhr.send(encodeURI('id=' + id));


}


function open_itens_categoria2(id) {

  var pai2 = document.getElementById("itens2" + id);

  var destino = document.getElementById("destino");
  destino.value = id;

  xhr = new XMLHttpRequest();
  xhr.open('POST', '<?php echo myUrl('tao/menu_itens_categoria2') ?>');
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.onload = function() {
    if (xhr.status === 200) {
      /*info.style.display="block";
      info.innerHTML =  xhr.responseText;*/
      if(pai2.innerHTML == "") {
        pai2.innerHTML =  xhr.responseText;
      } else {
        pai2.innerHTML =  "";
      }
    }

    else if (xhr.status !== 200) {
      alert(xhr.status);
    }
  };
  xhr.send(encodeURI('id=' + id));


}


function update_item(idcategoria) {

  var r = confirm("Esta ação mudará a categoria do deste item. Tem certeza que auer continuar?");

  if (r == true) {

    var id = document.getElementById("origem").value;

    xhr = new XMLHttpRequest();
    xhr.open('POST', '<?php echo myUrl('tao/menu_update_item') ?>');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
      if (xhr.status === 200) {
       info.style.display="block";
       info.innerHTML =  xhr.responseText; 
     }

     else if (xhr.status !== 200) {
      info.innerHTML = xhr.status;
    }
  };
  xhr.send(encodeURI("id=" + id + "&idcategoria=" + idcategoria));

setTimeout(function(){  
  window.location.href =  "";  
}, 500);

}

}



function setOrigem(origem) {
 document.getElementById("origem").value = origem;
}

</script>

</body>
</html>

