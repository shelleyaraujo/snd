<style>

.cnt-modulo {
  width: 100%;
  max-width: 1024px;
  margin: 0 auto;
  padding: 0 15px;
}







<style>

#nav-galeria {
  width: 100%;
  max-width: 1200px;
  margin: 0 auto;
}

#nav-galeria ul {
 display: flex;
 align-items: flex-end;
 align-content: flex-end;
 justify-content: center; 
 flex-wrap: wrap;
 text-align: left;
 list-style: none;
 margin: 0;
 padding: 0;
}

#nav-galeria li {
  text-align: left;
  margin: 0;
  padding: 0;
  width: 50%;
  max-height: 200px;
  box-sizing: border-box;
  margin-bottom: 0;
  line-height: 12px;
  cursor: pointer;
  overflow: hidden;
}

#nav-galeria li > div {
  border: 10px solid silver;
  text-align: center;
  padding: 0;
  margin: 0 1px;
  overflow: hidden;
  position: relative;
  margin-bottom: 50px;
}

#nav-galeria  img {
  max-width: 100%;
}

.legenda-galeria {
 display: block;
 padding: 5px;
 box-sizing: border-box;
 background: black;
 background: rgba(000,000,000,0.7);
 color: white;
 font-size: 10px;
 width: 100%;
 text-align: left;
 list-style: 14px;
 margin: 0;
}

#cnt-imagens {
  height: 100%;
  position: relative;
  top: 0;
  z-index: 9999999;
  left: 0;
  right: 0;
  text-align: center;
  display: none;
  box-sizing: border-box;
  overflow: hidden;
}

#xximg  { 
 line-height: 100%;
}

#ximg  { 
  width: 700px!important; 
  height: auto!important; 
  position: relative;
  overflow: hidden;
  margin: auto;
  border: 1px solid black;
  display: flex;
  justify-content: center;
  align-items: center;
  align-content: center;  
  line-height: 0
}

#ximg img { 
  width: 100%; 
  max-width: 1200px;
  height: auto!important;
  line-height: 0
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
  width: 95%;
  height: 50px;
  margin: auto;
  position: absolute;
  top: 20px;
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
  border-width: 15px 0 15px 15px;
  border-style: solid solid solid solid; 
  border-color: transparent transparent transparent transparent; 
  cursor: pointer;
}

.arrow-right.icon:after {
  content: '';
  position: absolute;
  right: 15px;
  top: -5px;
  width: 20px;
  height: 20px;
  -webkit-transform: rotate(45deg);
  transform: rotate(45deg);
  color: red;
  border-top: 0px solid tomato;
  border-right: 0px solid tomato;
}

.arrow-right.icon:before {
  content: '';
  position: absolute;
  right: 1px;
  top: -5px;
  width: 20px;
  height: 20px;
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
  width: 20px;
  height: 20px;
  border-top: solid 2px tomato;
  border-right: solid 2px tomato;
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
  width: 30px;
  position: absolute;
  border-top: 2px solid red;
  -webkit-transform: rotate(45deg);
  transform: rotate(45deg);  top: 50%;
  left: 50%;
  margin-left: -5px;
}

.zoom-.icon:after {
  content: "";
  width: 30px;
  position: absolute;
  border-top: 2px solid red;
  -webkit-transform: rotate(-45deg);
  transform: rotate(-45deg);  top: 50%;
  left: 50%;
  margin-left: -5px;
}

.enlarge-img {
  position: absolute;
  background: #000;
  background: rgba(255,255,255,0); 
  z-index: 9999;
}

@media (min-width: 550px) {


  #nav-galeria {
    width: 100%;
    max-width: 1200px;
    margin: 0 auto;
  }

  #nav-galeria ul {
   display: flex;
   align-items: flex-end;
   align-content: center;
   justify-content: center; 
   flex-wrap: wrap;
   text-align: left;
   list-style: none;
   margin: 0;
   padding: 0;
 }

 #nav-galeria li {
  text-align: left;
  margin: 0;
  padding: 0 50px;
  width: 25%;
  box-sizing: border-box;
  margin-bottom: 50px;
}

#nav-galeria li > div {
  border: 10px solid white;
  text-align: center;
  padding: 0;
  margin: 0 10px;
  overflow: hidden;
  position: relative;
}

#nav-galeria li > div:hover {
  border: 1px dashed #0C74A8;
}

#nav-galeria  img {
  max-width: 100%;
}

.legenda-galeria {
 position: absolute;
 bottom: 0;
 left: 0;
 display: block;
 padding: 10px;
 box-sizing: border-box;
 background: black;
 background: rgba(255,255,255,10);
 color: white;
 font-size: 12px;
 width: 100%;
 text-align: left;
}

#cnt-imagens {
  height: 100%;
  position: relative;
  top: 0;
  z-index: 9999999;
  left: 0;
  right: 0;
  text-align: center;
  display: none;
  box-sizing: border-box;
  overflow: hidden;
}

#ximg img { 
  max-width: 100%; height: auto;
}


#img-direita,
#img-ampliada {
  display: block;
}

.arrow-right.icon {
  right: 2px;
}

}


</style>


<style>


#cnt-slider {
  position: absolute;
  width: 100%;
  box-sizing: border-box;
  text-align: center;
  display: none;
  align-items: flex-end;
  align-content: flex-end;
  justify-content: center;
  top: 0;
  left: 0;
  right: 0;
  background-color: rgba(0,0,0,0.8);
  z-index: 9;
  padding-top: 15px;
}

#cnt-slider img {
  width: 100%;
  max-width: 1000px;
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
  border-top: 15px solid transparent;
  border-bottom: 15px solid transparent;
  border-left: 15px solid #FF6347;
  border-right: 15px solid transparent;
}

#prev:before {
  content: "";
  border-top: 15px solid transparent;
  border-bottom: 15px solid transparent;
  border-left: 15px solid transparent;
  border-right: 15px solid #FF6347;
}


#fechar {
  position: absolute; 
  top: 15px;
  right: 15px;;
  font-size: 30px;
  margin-top: 0;
  color: #FF6347;

}

#loader {
  position: absolute;
  display: none;
  border: 5px solid red; 
  border-right: 5px solid red; 
  border-top: 5px solid red; 
  border-bottom: 5px dotted transparent; 
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
