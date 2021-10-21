<style>

.cnt-modulo {
  width: 100%;
  max-width: 1024px;
  margin: 0 auto;
  padding: 0 15px;
}

.detalhes-preco {
  font-size: 20px;
  font-weight: bold;
  color: mediumvioletred;
}

#tire-duvidas {
  border: 1px solid skyblue;
  background-color: aliceblue;
  width: 100%;
  box-sizing: border-box;
  display: block;
  padding-top: 20px;
  margin-top: 50px;
  padding: 20px;
}

#tire-duvidas textarea {
  width: 100%;
  box-sizing: border-box;

}

#cnt-imagens {
  height: 100%;
  position: relative;
  top: 0;
  z-index: 9999999;
  left: 0;
  right: 0;
  text-align: center;
}

#xximg  { 
  line-height: 100%;
}

#ximg img { 
  width: 100%; height: auto; position: relative;
  border: 10px solid white;
}

#ximg:before {
  position: absolute; content: ""; border: 5px solid #e9d3a8; 
  border-top: 5px solid #dcbe8a; 
  border-bottom: 5px solid #dcbe8a; 
  border-radius: 50%; 
  width: 30px; height: 30px;
  animation: spin 2s linear infinite; z-index: -1; left: 50%; top: 50%;
}

@keyframes spin { 0% { transform: rotate(0deg); } 100% { transform: rotate(360deg); }}

#img-reduzida {
  display: none;
  cursor: pointer;
  padding-right: 50px;
}

#img-direita,
#img-ampliada {
  display: none;
}

.arrow-right.icon {
  color: #ff0000;
  position: absolute;
  margin-left: 2px;
  margin-top: 10px;
  width: 16px;
  height: 1px;
  background-color: transparent;
  top: 50%;
  margin-top: -20px;
  right: -18px;
  border-width: 5px 0 15px 15px;
  border-style: solid solid solid solid; 
  border-color: transparent transparent transparent transparent; 
  cursor: pointer;
}

.arrow-right.icon:after {
  content: '';
  position: absolute;
  right: 15px;
  top: -5px;
  width: 10px;
  height: 10px;
  -webkit-transform: rotate(45deg);
  transform: rotate(45deg);
  color: red;
  border-top: 1px solid red;
  border-right: 1px solid red;
}

.arrow-right.icon:before {
  content: '';
  position: absolute;
  right: 1px;
  top: -5px;
  width: 10px;
  height: 10px;
  -webkit-transform: rotate(45deg);
  transform: rotate(45deg);
}

.arrow-left.icon {
  color: #ff0000;
  position: absolute;
  margin-left: 3px;
  margin-top: 10px;
  width: 16px;
  height: 1px;
  background-color: transparent;
  top: 50%;
  margin-top: -20px;
  left: -15px;;
  border-width: 15px 0 15px 15px;
  border-style: solid solid solid solid; 
  border-color: transparent transparent transparent transparent; 
  cursor: pointer;
}

.arrow-left.icon:after {
  content: "";
  width: 12px;
  position: absolute;
  left: 0;
}

.arrow-left.icon:before {
  content: '';
  position: absolute;
  left: 1px;
  top: -5px;
  width: 10px;
  height: 10px;
  border-top: solid 1px currentColor;
  border-right: solid 1px currentColor;
  -webkit-transform: rotate(-135deg);
  transform: rotate(-135deg);
}


.zoom.icon {
  color: #000;
  position: absolute;
  margin-left: 2px;
  margin-top: 2px;
  width: 15px;
  height: 15px;
  border-radius: 1px;
  border: solid 1px currentColor;
  cursor: pointer;
  left: 50%;
}

.zoom.icon:before {
  content: '';
  position: absolute;
  left: 3px;
  top: -2px;
  width: 9px;
  height: 19px;
  color: white;
  background-color: currentColor;
  -webkit-transform-origin: center;
  transform-origin: center;
}

.zoom.icon:after {
  content: '';
  position: absolute;
  left: 3px;
  top: -2px;
  width: 9px;
  height: 19px;
  color: white;
  background-color: currentColor;
  -webkit-transform-origin: center;
  transform-origin: center;
  -webkit-transform: rotate(90deg);
  transform: rotate(90deg);
}

.zoom-.icon {
  position: relative;
  width: 20px;
  height: 20px;
  border-radius: 100%;
  top: 0;
  left: 100%;
}

.zoom-.icon:before {
  content: "";
  width: 20px;
  position: absolute;
  border-top: 1px solid white;
  -webkit-transform: rotate(45deg);
  transform: rotate(45deg);  top: 50%;
  left: 50%;
  margin-left: -5px;
}

.zoom-.icon:after {
  content: "";
  width: 20px;
  position: absolute;
  border-top: 1px solid white;
  -webkit-transform: rotate(-45deg);
  transform: rotate(-45deg);  top: 50%;
  left: 50%;
  margin-left: -5px;
}

.enlarge-img {
  position: absolute;
  background: #000;
  background: rgba(000,000,000,0.8); 
  z-index: 9999;
}

.cnt-catalogo {
  display: block;
  border: 0px solid silver;
  background-color: white;
  padding: 0;
  box-sizing: border-box;
}

.cnt-catalogo > div {
  padding: 20px;
}

.detalhes-titulo {
  padding: 0;
  text-align: left;
}

.detalhes-de:before {
  content: "DE:";
  font-size: 12px;
  color: red;
}

.detalhes-por:before {
  content: "POR:";
  font-size: 12px;
  color: tomato;
}

.detalhes-de {
  font-size: 18px;
  color: red;
  display: inline;
  width: auto;
  margin-right: 20px;
}

.detalhes-por {
  font-size: 25px;
  color: tomato;
  display: inline;
}

.cnt-catalogo fieldset {
  margin-top: 20px;
  margin-bottom: 20px;
  border: 1px solid skyblue;
  background-color: aliceblue;
}

.detalhes-modelos ul:before {
  content: "Modelo:";
  padding-top: 10px;
  padding-right: 10px;
}


.detalhes-modelos ul {
  display: flex;
  flex-wrap: wrap;
  list-style: none;
  margin: 0;
  padding: 0;
}

.detalhes-modelos li {
  cursor: pointer;
  padding: 10px;
  border: 1px solid silver;
  margin-right: 5px;
  margin-bottom: 5px;
}

.detalhes-modelos li:last-child {
  margin-right: 0;
}

.detalhes-modelos li:hover {
  cursor: pointer;
  padding: 10px;
  border: 1px solid tomato;
}

.detalhes-cores ul:before {
  content: "Cor: ";
  padding-right: 10px;
  padding-top: 1px;
}

.detalhes-cores ul {
  display: flex;
  flex-wrap: wrap;
  list-style: none;
  margin: 0;
  padding: 0;
  margin-bottom: 15px;
}

.detalhes-cores li {
  cursor: pointer;
  padding: 1px;
  border: 1px solid silver;
  margin-right: 1px;
  color: transparent;
  margin-bottom: 1px;
  width: 20px;
}

.detalhes-cores li:last-child {
  margin-right: 0;
}

.detalhes-cores li:hover {
  cursor: pointer;
  padding: 1px;
  border: 1px solid tomato;
}

.detalhes-tamanhos ul:before {
  content: "Tamanho: ";
  padding-right: 10px;
  padding-top: 10px;
}

.detalhes-tamanhos ul {
  display: flex;
  flex-wrap: wrap;
  list-style: none;
  margin: 0;
  padding: 0;
}

.detalhes-tamanhos li {
  cursor: pointer;
  padding: 10px;
  border: 1px solid silver;
  margin-right: 5px;
  color: tomato;
  margin-bottom: 5px;
}

.detalhes-tamanhos li:last-child {
  margin-right: 0;
}

.detalhes-tamanhos li:hover {
  cursor: pointer;
  padding: 10px;
  border: 1px solid tomato;
}


.lista-itens-comentarios {
  list-style: none;
  margin: 0;
  padding: 0;
}


.lista-itens-comentarios li{
  padding: 10px;
  padding-left: 0;
}

.cnt-detalhes {
  display: block;
  align-items: center;
  align-content: center;
  justify-content: center;
  box-sizing: border-box;
  width: 100%;
  max-width: 1024px;
  margin: 0 auto;
  margin-top: 25px;
}

.cnt-detalhes .button {
  display: block;
  max-width: 200px;
  text-align: center;
  margin-top: 20px;
}


#setquantidade {
  display: none;
}

@media (min-width: 550px) {

  #next {
    position: absolute; 
    top: 50%;
    right: 0;
    font-size: 0;
    margin-top: 0;
    z-index: 99999;
  }

  #prev {
    position: absolute; 
    top: 50%;
    left: 0;
    font-size: 0;
    margin-top: 0;
    z-index: 99999;
  }

  #next:before {
    content: "";
    border-top: 10px solid transparent;
    border-bottom: 10px solid transparent;
    border-left: 10px solid tomato;
    border-right: 10px solid transparent;
  }

  #prev:before {
    content: "";
    border-top: 10px solid transparent;
    border-bottom: 10px solid transparent;
    border-left: 10px solid transparent;
    border-right: 10px solid tomato;
  }

  .cnt-detalhes {
    display: grid;
    align-items: stretch;
    align-content: flex-start;
    justify-content: center;
    grid-template-columns:  50% 50%;
    box-sizing: border-box;
    width: 100%;
    max-width: 1024px;
    margin: 0 auto;
    margin-top: 25px;
  }

  .cnt-catalogo {
    display: flex;
    border: 0px solid silver;
    background-color: white;
    max-width: 1024px;
    margin-left: auto;
    margin-right: auto;
    box-sizing: border-box;
  }

  .c-imagens {
    order: 1;
    width: 50%;
  }

  .c-detalhes {
    order: 2;
    width: 50%;
  }

  #ximg img { 
    max-width: 100%;
    height: auto;
  }


  #img-direita,
  #img-ampliada {
    display: block;
  }

  .arrow-right.icon {
    right: 2px;
  }

}

/*NOVO*/

.cnt-detalhes > div {
  padding: 0;
  box-sizing: border-box;
}
.cnt-detalhes > div:nth-child(2) {
  padding: 20px;
  box-sizing: border-box;
  background-color: white;
}

#start-slider {
  display: block;
  font-size: 12px;
  text-transform: uppercase;
  cursor: pointer;
}

#stop-slider {
  display: none;
  font-size: 12px;
  text-transform: uppercase;
  cursor: pointer;
}

.slideInLeft {
  -webkit-animation-name: slideInLeft;
  animation-name: slideInLeft;
  -webkit-animation-duration: 1s;
  animation-duration: 1s;
  -webkit-animation-fill-mode: both;
  animation-fill-mode: both;

}

@-webkit-keyframes slideInLeft {
  0% {
    -webkit-transform: translateX(-100%);
    transform: translateX(-100%);
    visibility: visible;
  }
  100% {
    -webkit-transform: translateX(0);
    transform: translateX(0);
  }
}
@keyframes slideInLeft {
  0% {
    -webkit-transform: translateX(-100%);
    transform: translateX(-100%);
    visibility: visible;
  }
  100% {
    -webkit-transform: translateX(0);
    transform: translateX(0);
  }
} 

</style>


<style>


#cnt-slider {
  position: relative;
  width: 100%;
  max-width: 100%;
  min-height: auto;
}

#cnt-slider img {
  width: 100%;
  max-width: 100%;
  height: auto!important;
}

#info {
  display: none;
}

#next {
  position: absolute; 
  top: 50%;
  right: 0;
  font-size: 0;
  margin-top: 0;
}

#prev {
  position: absolute; 
  top: 50%;
  left: 0;
  font-size: 0;
  margin-top: 0;
}

#next:before {
  content: "";
  border-top: 10px solid transparent;
  border-bottom: 10px solid transparent;
  border-left: 10px solid tomato;
  border-right: 10px solid transparent;
}

#prev:before {
  content: "";
  border-top: 10px solid transparent;
  border-bottom: 10px solid transparent;
  border-left: 10px solid transparent;
  border-right: 10px solid tomato;
}

#loader {
  position: absolute;
  display: none;
  border: 5px solid transparent; 
  border-right: 5px solid red; 
  border-top: 5px solid red; 
  border-bottom: 5px solid red; 
  border-radius: 100%;
  width: 30px;
  height: 30px;
  animation: spin 2s linear infinite;
  top: 50%;
  margin-top: -15px;
  left: 50%;
  margin-left: -15px;
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
@keyframes opacidade {
  from { -webkit-filter: grayscale(0); filter: grayscale(0); }
  to { -webkit-filter: grayscale(5); filter: grayscale(5); }
}

</style>