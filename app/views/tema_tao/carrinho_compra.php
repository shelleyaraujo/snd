<?php include_once "_compress_code.php"; ?>
<?php include_once "head.php"; ?>

<body>

  <a class="skip-link xxx" href="#maincontent">Skip to main</a>

   <?php include_once "cabecalho.php"; ?>


  <main id="maincontent">

   <div class="container">
    <h1><?php echo $titulo; ?></h1>
   </div>

     <div class="container">
      <?php echo $carrinho; ?>
  </div>



</main>



<?php include_once "rodape_loja.php"; ?>


<style>

.popup {
  display: none;
}

  .icone-somar {
    padding: 5px;
    width: 20px!important;
    height: 20px!important;
    margin: 5px;
    cursor: pointer;
    color: transparent!important;
    line-height: 25px;
    position: relative;
    border-radius: 50%;
    border: 0;
  }

 .icone-somar:before {
    content: "+";
    position: absolute;
    top: -6px;
    left: 2px;
    color: green!important;
  }

  .icone-subtrair {
    border: 0;
    padding: 5px;
    width: 20px!important;
    height: 20px!important;
    margin: 9px 5px;
    cursor: pointer;
    color: transparent!important;
    line-height: 25px;
    position: relative;
    border-radius: 50%;
  }

 .icone-subtrair:before {
    content: "-";
    position: absolute;
    top: -3px;
    left: 4px;
    color: red!important;
  }

.icone-lixo {
    padding: 5px;
    width: 14px!important;
    height: 14px!important;
    margin: 5px;
    cursor: pointer;
    color: transparent!important;
    line-height: 25px;
    position: relative;
    border-radius: 50%;
    position: relative;
  }

 .icone-lixo:before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    padding: 7px;
    font-size: 0;
    color: red!important;
    background-position: center;
    background-size: 100%;
    background-repeat: no-repeat;
    background-image: url(data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZlcnNpb249IjEuMSIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbG5zOnN2Z2pzPSJodHRwOi8vc3ZnanMuY29tL3N2Z2pzIiB3aWR0aD0iNTEyIiBoZWlnaHQ9IjUxMiIgeD0iMCIgeT0iMCIgdmlld0JveD0iMCAwIDUxMiA1MTIiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMiA1MTIiIHhtbDpzcGFjZT0icHJlc2VydmUiIGNsYXNzPSIiPjxnPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgoJPGc+CgkJPHBhdGggZD0iTTQ2OS4zMzMsODUuMzMzaC00Mi42NjdoLTY0di02NEMzNjIuNjY3LDkuNTU3LDM1My4xMzEsMCwzNDEuMzMzLDBIMTcwLjY2N2MtMTEuNzk3LDAtMjEuMzMzLDkuNTU3LTIxLjMzMywyMS4zMzN2NjRoLTY0ICAgIEg0Mi42NjdjLTExLjc5NywwLTIxLjMzMyw5LjU1Ny0yMS4zMzMsMjEuMzMzUzMwLjg2OSwxMjgsNDIuNjY3LDEyOEg2NHYzMjBjMCwzNS4yODUsMjguNzE1LDY0LDY0LDY0aDI1NiAgICBjMzUuMjg1LDAsNjQtMjguNzE1LDY0LTY0VjEyOGgyMS4zMzNjMTEuNzk3LDAsMjEuMzMzLTkuNTU3LDIxLjMzMy0yMS4zMzNTNDgxLjEzMSw4NS4zMzMsNDY5LjMzMyw4NS4zMzN6IE0xOTIsNDIuNjY3aDEyOCAgICB2NDIuNjY3SDE5MlY0Mi42Njd6IE00MDUuMzMzLDQ0OGMwLDExLjc1NS05LjU1NywyMS4zMzMtMjEuMzMzLDIxLjMzM0gxMjhjLTExLjc3NiwwLTIxLjMzMy05LjU3OS0yMS4zMzMtMjEuMzMzVjEyOGg2NGgxNzAuNjY3ICAgIGg2NFY0NDh6IiBmaWxsPSIjZmYwMDAwIiBkYXRhLW9yaWdpbmFsPSIjMDAwMDAwIiBzdHlsZT0iIiBjbGFzcz0iIj48L3BhdGg+Cgk8L2c+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KCTxnPgoJCTxwYXRoIGQ9Ik0xOTIsMTcwLjY2N2MtMTEuNzk3LDAtMjEuMzMzLDkuNTU3LTIxLjMzMywyMS4zMzN2MTkyYzAsMTEuNzc2LDkuNTM2LDIxLjMzMywyMS4zMzMsMjEuMzMzczIxLjMzMy05LjU1NywyMS4zMzMtMjEuMzMzICAgIFYxOTJDMjEzLjMzMywxODAuMjI0LDIwMy43OTcsMTcwLjY2NywxOTIsMTcwLjY2N3oiIGZpbGw9IiNmZjAwMDAiIGRhdGEtb3JpZ2luYWw9IiMwMDAwMDAiIHN0eWxlPSIiIGNsYXNzPSIiPjwvcGF0aD4KCTwvZz4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgoJPGc+CgkJPHBhdGggZD0iTTMyMCwxNzAuNjY3Yy0xMS43OTcsMC0yMS4zMzMsOS41NTctMjEuMzMzLDIxLjMzM3YxOTJjMCwxMS43NzYsOS41MzYsMjEuMzMzLDIxLjMzMywyMS4zMzNzMjEuMzMzLTkuNTU3LDIxLjMzMy0yMS4zMzMgICAgVjE5MkMzNDEuMzMzLDE4MC4yMjQsMzMxLjc5NywxNzAuNjY3LDMyMCwxNzAuNjY3eiIgZmlsbD0iI2ZmMDAwMCIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgc3R5bGU9IiIgY2xhc3M9IiI+PC9wYXRoPgoJPC9nPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjwvZz48L3N2Zz4=)
  }

  .cnt-carrinho {
      background-color: #E4EFFB;
      padding: 20px;
    }



  .cnt-carrinho > div {
    padding: 2px;
    box-sizing: border-box;
    color: black;
    text-align: left;
     display: -webkit-box;
    display: -moz-box;
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;  
    align-items: center;
    align-content: center;
    justify-content: center;
  }


  .cnt-carrinho .cor {
    padding: 10px;
    line-height: 0;
    font-size: 0;
    width: 20px;
    display: inline-block;
  }

  .cnt-carrinho a {
    color: red;
  }

  .cnt-carrinho > div:nth-child(1) {
   width: 100%;
   text-align: left;
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
 }


 .cnt-carrinho > div:nth-child(1) img {
   margin-right: 10px;
 }

 .cnt-carrinho > div:nth-child(2) {
   width: 50%;
 }

 .cnt-carrinho > div:nth-child(3) {
   width: 50%;
   display: -webkit-box;
   display: -moz-box;
   display: -ms-flexbox;
   display: -webkit-flex;
   display: flex;  
   align-items: center;
   align-content: center;
   justify-content: center;
   flex-wrap: wrap;
 }

 .cnt-carrinho > div:nth-child(4) {
   width: 50%;
 }

 .cnt-carrinho > div:nth-child(5) {
   width: 50%;
 }

.cnt-carrinho button {
 background-color: transparent;
 padding: 0;
 margin-top: 10px;
 height: 0;
}

.cnt-carrinho form {
  margin-bottom: 0;
}

.span-cor {
  border: 1px solid silver;
  padding: 3px 12px;
}

  .cnt-carrinho p {
    display: block;
    width: 100%;
    margin-bottom: 5px;
  }

  .cnt-carrinho a {
    color: black;
  }


 .cnt-carrinho > div:nth-child(1) img {
   margin-right: 10px;
   float: right!important;
   border: 1px solid silver;
 }


  @media (max-width: 550px) {



 .cnt-carrinho > div:nth-child(2) {
  border: 0px solid silver;
  width: 100%;
 }

 .cnt-carrinho > div:nth-child(3) {
  border: 0px solid silver;
  width: 100%;
 }

  .cnt-carrinho > div:nth-child(4) {
  border-bottom: 1px solid silver;
  width: 100%;
  margin-bottom: 20px;
 }


}

  @media (min-width: 550px) {

  .cnt-carrinho {
    display: -webkit-box;
    display: -moz-box;
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;  
    align-items: stretch;
    align-content: stretch;
    justify-content: space-between;
    flex-wrap: wrap;
    box-sizing: border-box;
    width: 100%;
    max-width: 1024px;
    margin: 0 auto;
  }

  .cnt-carrinho > div {
    padding: 5px;
    border: 0;
    box-sizing: border-box;
    color: black;
    text-align: center;
    border-bottom: 1px solid silver;
  }


  .cnt-carrinho > div:nth-child(1) {
   width: 65%;
   text-align: left;
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
 }


 .cnt-carrinho > div:nth-child(2) {
   width: 10%;
 }

 .cnt-carrinho > div:nth-child(3) {
   width: 20%;
   display: -webkit-box;
   display: -moz-box;
   display: -ms-flexbox;
   display: -webkit-flex;
   display: flex;  
   align-items: center;
   align-content: center;
   justify-content: center;
   flex-wrap: wrap;
 }

 .cnt-carrinho > div:nth-child(4) {
   width: 5%;
 }


  }


#add-item  {
  display: -webkit-box;
  display: -moz-box;
  display: -ms-flexbox;
  display: -webkit-flex;
  display: flex;  
  align-items: center;
  align-content: center;
  justify-content: center;
  flex-wrap: wrap;
}

#add-item > div {
  margin-top: 10px;
  display: -webkit-box;
  display: -moz-box;
  display: -ms-flexbox;
  display: -webkit-flex;
  display: flex;  
  align-items: center;
  align-content: center;
  justify-content: center;
  flex-wrap: wrap;
}

.car_botoes {
  padding-top: 20px;
}

.car_botoes, .cnt-calcular-frete {
  margin: 0 auto;
  width: 100%;
  max-width: 1020px;
  text-align: center;
}

.limpar-carrinho {
  position: relative;
    background: hotpink;
  padding: 10px 20px;
  color: white;
  border: 0;
  text-transform: uppercase;
  letter-spacing: 1px;
  margin: 20px 5px;
  margin-top: -2px;
  display: inline-block;
}

.limpar-carrinho:before {
  content: "";
  position: absolute;
  width: 20px;
  height: 20px;
  left: 0;
  top: 8px;
  background-image: url("data:image/svg+xml,%3C%3Fxml version='1.0' encoding='iso-8859-1'%3F%3E%3C!-- Generator: Adobe Illustrator 19.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0) --%3E%3Csvg version='1.1' id='Layer_1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px' viewBox='0 0 512 512' style='enable-background:new 0 0 512 512;' xml:space='preserve'%3E%3Cg%3E%3Cg%3E%3Cg%3E%3Cpath d='M456.313,85.333h-55.527C386.809,36.16,341.594,0,288,0s-98.809,36.16-112.785,85.333h-69.441l-3.482-11.938 c-5.271-18.094-22.115-30.729-40.958-30.729H32c-5.896,0-10.667,4.771-10.667,10.667C21.333,59.229,26.104,64,32,64h29.333 c9.427,0,17.844,6.313,20.479,15.365L148.208,307l-34.021,42.521c-4.854,6.073-7.521,13.688-7.521,21.458 c0,18.948,15.406,34.354,34.354,34.354h296.313c5.896,0,10.667-4.771,10.667-10.667S443.229,384,437.333,384H141.021 c-7.177,0-13.021-5.844-13.021-13.021c0-2.948,1.01-5.844,2.854-8.135L165.133,320h209.221c16.448,0,31.604-9.615,38.615-24.5 l74.438-158.177c2.135-4.552,3.26-9.604,3.26-14.615v-3.021C490.667,100.74,475.26,85.333,456.313,85.333z M288,21.333 c52.938,0,96,43.063,96,96s-43.063,96-96,96s-96-43.063-96-96S235.063,21.333,288,21.333z M469.333,122.708 c0,1.906-0.427,3.823-1.24,5.542l-74.427,158.167c-3.51,7.438-11.083,12.25-19.313,12.25H168l-56.004-192h59.211 c-0.319,3.518-0.54,7.066-0.54,10.667c0,64.698,52.635,117.333,117.333,117.333s117.333-52.635,117.333-117.333 c0-3.6-0.221-7.148-0.54-10.667h51.52c7.177,0,13.021,5.844,13.021,13.021V122.708z'/%3E%3Cpath d='M149.333,426.667c-23.531,0-42.667,19.135-42.667,42.667S125.802,512,149.333,512S192,492.865,192,469.333 S172.865,426.667,149.333,426.667z M149.333,490.667c-11.76,0-21.333-9.573-21.333-21.333c0-11.76,9.573-21.333,21.333-21.333 c11.76,0,21.333,9.573,21.333,21.333C170.667,481.094,161.094,490.667,149.333,490.667z'/%3E%3Cpath d='M405.333,426.667c-23.531,0-42.667,19.135-42.667,42.667S381.802,512,405.333,512S448,492.865,448,469.333 S428.865,426.667,405.333,426.667z M405.333,490.667c-11.76,0-21.333-9.573-21.333-21.333c0-11.76,9.573-21.333,21.333-21.333 c11.76,0,21.333,9.573,21.333,21.333C426.667,481.094,417.094,490.667,405.333,490.667z'/%3E%3Cpath d='M248.458,156.875c2.083,2.083,4.813,3.125,7.542,3.125s5.458-1.042,7.542-3.125L288,132.417l24.458,24.458 c2.083,2.083,4.813,3.125,7.542,3.125s5.458-1.042,7.542-3.125c4.167-4.167,4.167-10.917,0-15.083l-24.458-24.458l24.458-24.458 c4.167-4.167,4.167-10.917,0-15.083c-4.167-4.167-10.917-4.167-15.083,0L288,102.25l-24.458-24.458 c-4.167-4.167-10.917-4.167-15.083,0c-4.167,4.167-4.167,10.917,0,15.083l24.458,24.458l-24.458,24.458 C244.292,145.958,244.292,152.708,248.458,156.875z'/%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/svg%3E%0A");
  background-position: center;
  background-size: 100%;
}

#valor_do_frete {
  padding: 10px;
  width: 100%;
  max-width: 300px;
  margin: 0 auto;
  display: none;
}


#valor_do_frete table {
  width: 100%;
  background-color: #1E90FF;
}

#valor_do_frete tr td {
background-color: white;
}

#valor_do_frete tr:nth-child(1) td{
 background-color: #1E90FF;
 color: white;
 font-weight: bold;
}

#valor_do_frete td{
 padding: 5px;
}

</style>

<script>

  /* CALCULAR FRETE */

  function calcular_frete() {

    var cep_destino = document.querySelector("#cep_destino").value;
    var valor_do_frete = document.querySelector("#valor_do_frete");
    valor_do_frete.style.display="block";
    valor_do_frete.innerHTML = "Um momento...calculando.";

    xhr = new XMLHttpRequest();
    xhr.open('POST', '<?php echo myUrl('pedidos/calcula_frete/') ?>');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function() {
      if (xhr.status === 200) {
        valor_do_frete.innerHTML = xhr.responseText;
      }
      else if (xhr.status !== 200) {
        alert(xhr.status);  
      }
    };
    xhr.send(encodeURI("cep_destino=" + cep_destino.replace("-","")));

  }


  function verifica_tipo_frete() {
    return false;
  }


</script> 

<span></span>

</body>

</html>

<?php include_once "_final.php"; ?>
