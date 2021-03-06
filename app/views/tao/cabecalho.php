<style>

/****************************************/
/* HEADER */
/****************************************/

header {
  background-color: white;
}

@media (min-width: 550px) {

  header {
    background-color: white;
  }

}

/****************************************/
/* CABECALHO */
/****************************************/

.cabecalho {
  display: flex;
  align-items: flex-start;
  align-content: stretch;
  justify-content: center;
  flex-wrap: wrap;
  padding: 15px 15px;
  margin-bottom: 50px;
  width: 100%;
  max-width: 1024px;
  margin: 0 auto;
}

.cabecalho > div:nth-child(1) {
  width: 30%;
}

.cabecalho > div:nth-child(2) {
  width: 70%;
}

@media (min-width: 550px) {

  .cabecalho {
    display: flex;
    align-items: center;
    align-content: center;
    justify-content: center;
    flex-wrap: wrap;
    padding: 15px 15px;
    margin-bottom: 0;
  }

  .cabecalho > div:nth-child(1) {
    width: 20%;
  }

  .cabecalho > div:nth-child(2) {
    width: 80%;
  }

}

/****************************************/
/* TELEFONES */
/****************************************/

.htel a {
  color: #04353E;
  position: relative;
  padding-left: 25px;
}

.htel a:before {
  content: "";
  position: absolute;
  width: 15px;
  height: 15px;
  left: 0;
  top: 50%;
  margin-top: -7px;
  background-image: url("data:image/svg+xml,%3C%3Fxml version='1.0' encoding='UTF-8'%3F%3E%3C!DOCTYPE svg PUBLIC '-//W3C//DTD SVG 1.1//EN' 'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd'%3E%3Csvg xmlns='http://www.w3.org/2000/svg' xml:space='preserve' width='100%25' height='100%25' style='shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd'%0AviewBox='0 0 2.50002 2.50002' xmlns:xlink='http://www.w3.org/1999/xlink'%3E%3Cdefs%3E%3Cstyle type='text/css'%3E%3C!%5BCDATA%5B .fil0 %7Bfill:none%7D .whatsapp %7Bfill: red%7D %5D%5D%3E%3C/style%3E%3C/defs%3E%3Cg id='Capa_x0020_1'%3E%3Cmetadata id='CorelCorpID_0Corel-Layer'/%3E%3Crect class='fil0' width='2.50002' height='2.50002'/%3E%3Cpath id='WhatsApp' class='whatsapp' d='M2.44063 1.21934c0,0.64064 -0.52332,1.15996 -1.16898,1.15996 -0.20497,0 -0.39754,-0.05239 -0.56507,-0.14433l-0.64719 0.20566 0.21101 -0.62235c-0.10644,-0.17478 -0.16775,-0.37978 -0.16775,-0.59894 -1e-005,-0.64063 0.52337,-1.15995 1.169,-1.15995 0.64572,0 1.16898,0.51932 1.16898,1.15995zm-1.16898 -0.97522c-0.54197,0 -0.98282,0.43749 -0.98282,0.97523 0,0.21339 0.06956,0.411 0.18722,0.57176l-0.12279 0.36219 0.37769 -0.12004c0.15518,0.10189 0.34107,0.16132 0.54073,0.16132 0.54189,0 0.98282,-0.43744 0.98282,-0.97517 0,-0.53773 -0.4409,-0.97529 -0.98285,-0.97529zm0.59031 1.24237c-0.00722,-0.01183 -0.0263,-0.01897 -0.05493,-0.03318 -0.02868,-0.01421 -0.1696,-0.08303 -0.19579,-0.09247 -0.02627,-0.00947 -0.04543,-0.01423 -0.06451,0.01421 -0.01908,0.02847 -0.074,0.09247 -0.09075,0.11144 -0.01672,0.01902 -0.03342,0.0214 -0.0621,0.00717 -0.02863,-0.01421 -0.12094,-0.04426 -0.2304,-0.1411 -0.08517,-0.07535 -0.14269,-0.16838 -0.15941,-0.19688 -0.0167,-0.02844 -0.00175,-0.04382 0.01257,-0.05797 0.01291,-0.01275 0.02868,-0.03321 0.04299,-0.04979 0.01437,-0.01662 0.01913,-0.02844 0.02863,-0.04744 0.0096,-0.01897 0.00482,-0.03556 -0.00238,-0.04982 -0.00714,-0.01421 -0.06451,-0.15412 -0.08837,-0.21106 -0.02387,-0.05689 -0.0477,-0.04741 -0.06445,-0.04741 -0.0167,0 -0.03582,-0.00238 -0.05493,-0.00238 -0.0191,0 -0.05017,0.00712 -0.07644,0.03556 -0.02625,0.02847 -0.10025,0.09726 -0.10025,0.23715 0,0.13991 0.10263,0.27509 0.117,0.29403 0.01431,0.01894 0.19817,0.31538 0.48948,0.42923 0.29134,0.1138 0.29134,0.07583 0.34389,0.07107 0.05249,-0.00474 0.16949,-0.06877 0.19346,-0.13512 0.02381,-0.06647 0.02381,-0.12338 0.01669,-0.13524z'/%3E%3C/g%3E%3C/svg%3E%0A");  background-position: center;
  background-repeat: no-repeat;
  background-position: center;
  background-size: 100%;
}

.htel p {
  margin-bottom: 15px;
}

@media (min-width: 550px) {

  .htel {
    width: 100%;
    text-align: right;
  }

  .htel p {
   display: inline-block;
   padding-left: 20px;
 }

}

/****************************************/
/* ICONES SOCIAIS */
/****************************************/

.hsociais {
  width: auto;
  position: relative;
  display: -webkit-box;
  display: -moz-box;
  display: -ms-flexbox;
  display: -webkit-flex;
  display: flex;  
  align-items: center;
  align-content: center;
  justify-content: flex-start;
  flex-wrap: wrap;
  padding: 0;
  margin: 0;
  box-sizing: border-box;
  margin-bottom: 20px;
  margin-top: 20px;
}

.hsociais div {
  width: auto;
  padding: 0;
  background-color: transparent;
  display: block;
  text-align: center;
}

.hsociais p {  
  width: 25px;
  height: 25px;
  overflow: hidden;
  margin: 0;
  line-height: 20px;
  position: relative;
  display: inline-block;
  margin-bottom: 0;
  margin-right: 10px;
}

.hsociais a {
  position: relative;
  display: block;
  font-size: 0;
}

.hsociais a[href*="facebook"]:before {
  content: "";
  position: absolute;
  width: 25px;
  height: 25px;
  left: 0;
  top: 0;
  background-image: url("data:image/svg+xml,%3C%3Fxml version='1.0'%3F%3E%3Csvg xmlns='http://www.w3.org/2000/svg' height='512px' viewBox='0 0 485 485' width='512px'%3E%3Cg%3E%3Cpath d='m200.765625 400h65.265625v-157.585938h43.800781s4.101563-25.429687 6.101563-53.234374h-49.648438v-36.265626c0-5.417968 7.109375-12.695312 14.15625-12.695312h35.5625v-55.21875h-48.367187c-68.476563 0-66.871094 53.082031-66.871094 61.007812v43.355469h-31.769531v53.03125h31.769531zm0 0' class='active-path' fill='red'/%3E%3Cpath d='m0 0v485h485v-485zm455 455h-425v-425h425zm0 0' class='active-path' fill='red'/%3E%3C/g%3E%3C/svg%3E%0A");  background-repeat: no-repeat;
  background-position: center;
  background-size: 100%;
}

.hsociais a[href*="facebook"]:hover:before {
  background-color: red;
}

.hsociais a[href*="instagram"]:before {
  content: "";
  position: absolute;
  width: 25px;
  height: 25px;
  left: 0;
  top: 0;
  background-image: url("data:image/svg+xml,%3C%3Fxml version='1.0'%3F%3E%3Csvg xmlns='http://www.w3.org/2000/svg' height='512px' viewBox='0 0 388 388' width='512px'%3E%3Cg%3E%3Cpath d='m0 0v388h388v-388zm364 364h-340v-340h340zm0 0' data-original='%23000000' class='active-path' fill='red'/%3E%3Cpath d='m256.425781 68.035156h-124.847656c-35.050781 0-63.5625 28.515625-63.5625 63.5625v124.847656c0 35.050782 28.511719 63.558594 63.5625 63.558594h124.847656c35.050781 0 63.558594-28.507812 63.558594-63.558594v-124.847656c0-35.046875-28.507813-63.5625-63.558594-63.5625zm36.140625 188.410156c0 19.929688-16.214844 36.144532-36.140625 36.144532h-124.847656c-19.925781 0-36.140625-16.214844-36.140625-36.144532v-124.847656c0-19.925781 16.214844-36.136718 36.140625-36.136718h124.847656c19.925781 0 36.140625 16.210937 36.140625 36.136718zm0 0' class='active-path' fill='red'/%3E%3Cpath d='m260.980469 142.546875c-8.46875 0-15.359375-6.886719-15.359375-15.355469 0-8.464844 6.890625-15.351562 15.359375-15.351562s15.355469 6.886718 15.355469 15.351562c0 8.46875-6.886719 15.355469-15.355469 15.355469zm0 0' class='active-path' fill='red'/%3E%3Cpath d='m193.996094 129.128906c-35.777344 0-64.890625 29.109375-64.890625 64.890625s29.113281 64.894531 64.890625 64.894531c35.785156 0 64.898437-29.113281 64.898437-64.894531 0-35.777343-29.113281-64.890625-64.898437-64.890625zm0 102.371094c-20.652344 0-37.472656-16.816406-37.472656-37.480469 0-20.65625 16.820312-37.464843 37.472656-37.464843 20.664062 0 37.472656 16.808593 37.472656 37.464843 0 20.664063-16.808594 37.480469-37.472656 37.480469zm0 0' class='active-path' fill='red'/%3E%3C/g%3E%3C/svg%3E%0A");  background-repeat: no-repeat;
  background-position: center;
  background-size: 100%;
}

.hsociais a[href*="instagram"]:hover:before {
  background-color: red;
}

.hsociais a[href*="linkedin"]:before {
  content: "";
  position: absolute;
  width: 25px;
  height: 25px;
  left: 0;
  top: 0;
  background-image: url("data:image/svg+xml,%3C%3Fxml version='1.0'%3F%3E%3Csvg xmlns='http://www.w3.org/2000/svg' height='512px' viewBox='0 0 485 485' width='512px' class=''%3E%3Cg%3E%3Cpath d='m89.015625 189.90625h67.507813v203.097656h-67.507813zm0 0' data-original='%23000000' class='active-path' data-old_color='%23E21919' fill='red'/%3E%3Cpath d='m122.324219 162.1875h.445312c23.550781 0 38.195313-15.601562 38.195313-35.101562-.445313-19.929688-14.644532-35.089844-37.753906-35.089844-23.105469 0-38.210938 15.160156-38.210938 35.089844 0 19.5 14.679688 35.101562 37.324219 35.101562zm0 0' class='active-path' data-old_color='%23E21919' fill='red'/%3E%3Cpath d='m261.398438 393.003906v-113.429687c0-6.085938.464843-12.117188 2.242187-16.457031 4.886719-12.148438 15.976563-24.691407 34.640625-24.691407 24.4375 0 34.195312 18.628907 34.195312 45.917969v108.65625h67.523438v-116.464844c0-62.378906-33.308594-91.398437-77.742188-91.398437-35.871093 0-51.886718 19.742187-60.859374 33.546875v.664062h-.441407c.117188-.21875.308594-.441406.441407-.664062v-28.777344h-67.535157c.90625 19.050781 0 203.09375 0 203.09375h67.535157zm0 0' data-original='%23000000' class='active-path' data-old_color='%23E21919' fill='red'/%3E%3Cpath d='m0 0v485h485v-485zm455 455h-425v-425h425zm0 0' class='active-path' data-old_color='%23E21919' fill='red'/%3E%3C/g%3E%3C/svg%3E%0A");  background-position: center;
  background-color: transparent;
  background-size: 100%;
}

.hsociais a[href*="linkedin"]:hover:before {
  background-color: red;
}

.hsociais a[href*="youtube"]:before {
  content: "";
  position: absolute;
  width: 25px;
  height: 25px;
  left: 0;
  top: 0;
  background-image: url("data:image/svg+xml,%3C%3Fxml version='1.0'%3F%3E%3Csvg xmlns='http://www.w3.org/2000/svg' height='512px' viewBox='0 -78 512.00023 512' width='512px'%3E%3Cg%3E%3Cpath d='m487.757812 24.375c-15.679687-15.71875-36.546874-24.375-58.75-24.375h-346.015624c-45.761719 0-82.992188 37.230469-82.992188 82.992188v190.023437c0 45.761719 37.230469 82.992187 82.992188 82.992187h345.578124c45.65625 0 82.886719-37.144531 82.992188-82.800781l.4375-190.023437c.050781-22.203125-8.558594-43.089844-24.242188-58.808594zm-6.203124 248.761719c-.066407 29.148437-23.835938 52.859375-52.984376 52.859375h-345.578124c-29.214844 0-52.984376-23.765625-52.984376-52.980469v-190.023437c0-29.214844 23.769532-52.980469 52.984376-52.980469h346.015624c14.175782 0 27.496094 5.523437 37.507813 15.558593 10.011719 10.035157 15.507813 23.371094 15.476563 37.542969zm0 0' data-original='%23000000' class='active-path' fill='red'/%3E%3Cpath d='m193.546875 280.894531 156.015625-102.890625-156.015625-102.894531zm30.007813-150.042969 71.5 47.152344-71.5 47.152344zm0 0' class='active-path' fill='red'/%3E%3C/g%3E%3C/svg%3E%0A");  background-repeat: no-repeat;
  background-position: top;
  background-size: 100%;
}

.hsociais a[href*="youtube"]:hover:before {
  background-color: red;
}

.hsociais a[href*="blog"]:before {
  content: "";
  position: absolute;
  width: 25px;
  height: 25px;
  left: 0;
  top: 0;
  background-image: url("data:image/svg+xml,%3C%3Fxml version='1.0'%3F%3E%3Csvg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' version='1.1' id='Capa_1' x='0px' y='0px' width='512px' height='512px' viewBox='0 0 510 510' style='enable-background:new 0 0 510 510;' xml:space='preserve'%3E%3Cg%3E%3Cg%3E%3Cg id='post-blogger'%3E%3Cpath d='M459,0H51C22.95,0,0,22.95,0,51v408c0,28.05,22.95,51,51,51h408c28.05,0,51-22.95,51-51V51C510,22.95,487.05,0,459,0z M357,178.5V204c0,15.3,10.2,25.5,25.5,25.5S408,239.7,408,255v76.5c0,43.35-33.15,76.5-76.5,76.5h-153 c-43.35,0-76.5-33.15-76.5-76.5V153c0-43.35,33.15-76.5,76.5-76.5h102c43.35,0,76.5,33.15,76.5,76.5V178.5z M204,204h66.3 c15.3,0,25.5-10.2,25.5-25.5S285.6,153,270.3,153H204c-15.3,0-25.5,10.2-25.5,25.5S188.7,204,204,204z M306,280.5H204 c-15.3,0-25.5,10.2-25.5,25.5s10.2,25.5,25.5,25.5h102c15.3,0,25.5-10.2,25.5-25.5S321.3,280.5,306,280.5z' data-original='%23000000' class='active-path' data-old_color='red' fill='red'/%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/svg%3E%0A");
  background-position: top;
  background-size: 100%;
}

.hsociais a[href*="blog"]:hover:before {
  background-color: red;
}

@media (min-width: 550px) {

  .hsociais {
    width: 100%;
    position: relative;
    display: -webkit-box;
    display: -moz-box;
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;  
    align-items: center;
    align-content: center;
    justify-content: flex-end;
    flex-wrap: wrap;
    padding: 0;
    margin: 0;
  }

  .hsociais div {
    width: auto;
    padding: 0;
    background-color: transparent;
    display: block;
    text-align: center;
  }

  .hsociais p {  
    width: 25px;
    height: 25px;
    overflow: hidden;
    margin: 0;
    line-height: 20px;
    position: relative;
    display: inline-block;
    margin-bottom: 0;
    margin-right: 0;
    margin-left: 20px;
  }

}

/****************************************/
/* MINHA CONTA */
/****************************************/

.minha-conta  {
  padding: 0;
  width: 40px;
  padding-left: 20px;
  box-sizing: border-box;
  margin-top: 20px;
}

.minha-conta a {
  color: #0D7082;
  position: relative;
  font-size: 0;
  line-height: 0;
  background-color: transparent;
  border: 1px solid #0D7082;
  border-radius: 50%;
  display: block;
  padding: 10px;
  width: 20px;
  box-sizing: border-box;
}
.minha-conta a:hover {
  background-color: #1eaedb;
}
.minha-conta a:before {
  content: "x";
  position: absolute;
  padding: 3px;
  border-radius: 100%;
  background-color: transparent;
  border: 1px solid #0D7082;
  top: 2px;
  left: 6px;
}
.minha-conta a:after {
  content: "x";
  position: absolute;
  top: 5px;
  left: 0;
  padding: 8px;
  border-radius: 100%;
  background-color: transparent;
  border: 2px solid #0D7082;
  border-right: 2px solid transparent;
  border-bottom: 2px solid transparent;
  transform: rotate(45deg) scale(0.668) skew(-4deg) translate(0px);
  -webkit-transform: rotate(45deg) scale(0.668) skew(-4deg) translate(0px);
  -moz-transform: rotate(45deg) scale(0.668) skew(-4deg) translate(0px);
  -o-transform: rotate(45deg) scale(0.668) skew(-4deg) translate(0px);
  -ms-transform: rotate(45deg) scale(0.668) skew(-4deg) translate(0px);
}

@media (min-width: 550px) {

  .minha-conta  {
    padding: 0;
    width: 40px;
    padding-left: 20px;
    box-sizing: border-box;
    margin-left: 20px;
    margin-top: -8px;
  }

}

/****************************************/
/* MEU CARRINHO */
/****************************************/
.meu-carrinho {
    margin: 0 20px;
    width: 30px;
    height: 25px;
}

.meu-carrinho a {
  width: 8px;
  border: 1px solid red;
  border-left: 0;
    border-bottom: 0;
  position: relative;
  padding: 7px 1px;
  transform: skew(17deg, 1deg) ;
  -webkit-transform: skew(17deg, 1deg) ;
  -moz-transform: skew(17deg, 1deg) ;
  -o-transform: skew(17deg, 1deg) ;
  -ms-transform: skew(17deg, 1deg);
}

.meu-carrinho a:before {
  content: "";
  border: 1px solid red;
  border-left: 0;
  border-top: 0;
  padding: 4px 6px;
  position: absolute;
  left: 10px;
  top: 2px;
  transform: skew(-31deg, 1deg) ;
-webkit-transform: skew(-31deg, 1deg) ;
-moz-transform: skew(-31deg, 1deg) ;
-o-transform: skew(-31deg, 1deg) ;
-ms-transform: skew(-31deg, 1deg) ;
background: lightblue;
}

.meu-carrinho a:after {
  content: "oo";
  padding: 8px 20px;
  position: absolute;
  left: -15px;
  top: 0;
  color: red;
  font-size: 10px;
  font-weight: bold;
}

@media (min-width: 550px) {

  

}

/****************************************/
/* ICONES MENU */
/****************************************/

.icones-menus {
  display: flex; 
  align-items: center; 
  align-content: center; 
  justify-content: space-between; 
  height: 40px;
  box-sizing: border-box;
  background-color: transparent;
}

.icones-menus > div { 
  width: auto;
  padding: 0 15px;
  display: block;
  box-sizing: border-box;
  cursor: pointer;
}

.icone-inst { 
  position: relative;
  width: 25px;
  height: 20px;
  border-top: 3px solid #e9ecef; 
  box-sizing: border-box;
  padding: 5px;
  z-index: 9999;
}

.icone-inst:before { 
  content: ""; 
  position: absolute; 
  top: 6px; 
  left: 0; 
  width: 100%;
  border-bottom: 3px solid #e9ecef; 
}

.icone-inst:after { 
  content: ""; 
  position: absolute; 
  top: 15px; 
  left: 0; 
  width: 100%;
  border-bottom: 3px solid #e9ecef; 
}
.icone-inst { 
  position: relative;
  width: 25px;
  height: 20px;
  border-top: 3px solid #e9ecef; 
  box-sizing: border-box;
  padding: 5px;
  z-index: 9999;
}

.icone-inst:before { 
  content: ""; 
  position: absolute; 
  top: 6px; 
  left: 0; 
  width: 100%;
  border-bottom: 3px solid #e9ecef; 
}

.icone-inst:after { 
  content: ""; 
  position: absolute; 
  top: 15px; 
  left: 0; 
  width: 100%;
  border-bottom: 3px solid #e9ecef; 
}

.icone-catalogo { 
  position: relative;
  width: 25px;
  height: 20px;
  border-top: 3px solid #e9ecef; 
  box-sizing: border-box;
  padding: 5px;
  z-index: 9999;
}

.icone-catalogo:before { 
  content: ""; 
  position: absolute; 
  top: 6px; 
  left: 0; 
  width: 100%;
  border-bottom: 3px solid #e9ecef; 
}

.icone-catalogo:after { 
  content: ""; 
  position: absolute; 
  top: 15px; 
  left: 0; 
  width: 100%;
  border-bottom: 3px solid #e9ecef; 
}

@media (min-width: 550px) {

  .icones-menus {
    display: none; 
  }

}

/****************************************/
/* MENU INSTITUCIOANL */
/****************************************/

#menu-inst {
  width: 100%;
  display: none;
  position: absolute;
  top: 40px;
  left: 0;
}

#nav-smmenu {
  position: relative;
  background-color: #e9ecef;
}

#nav-smmenu > ul a {
  text-decoration: none;
  color: white;
}

#nav-smmenu > ul a:hover {
  background-color: #e9ecef;
  color: black;
}

#nav-smmenu > ul ul a {
  text-decoration: none;
  color: white;
}

#nav-smmenu > ul ul a:hover {
  background-color: #e9ecef;
  color: black;
}

#nav-smmenu ul {
  list-style: none;
  margin: 0;
  padding: 0;
}

#nav-smmenu > ul {
  display: block;
  justify-content: flex-start;
  align-items: flex-start;
  align-content: center;
}

#nav-smmenu > ul li {
  margin: 0;
  box-sizing: border-box;
  margin-right: 1px;
}

#nav-smmenu > ul li a {
  display: block;
  padding: 5px 20px;
  background-color: transparent;
  text-transform: uppercase;
  color: white;
}

#nav-smmenu > ul > li ul a {
  display: block;
  padding: 5px 20px;
  background-color: #04353E;
  color: white
}

#nav-smmenu > ul > li ul ul a {
  background-color: red;
}

#nav-smmenu > ul > li ul ul ul a {
  background-color: black;
}

#nav-smmenu > ul > li ul ul ul ul a {
  background-color: red;
}

#nav-smmenu > ul ul {
  display: none;
}

#nav-smmenu li {
  position: relative;
  display: block;
}

#nav-smmenu li a {
  position: relative;
}

#smmenu li > a:not(:only-child):before {
  content: "";
  border-top: 4px solid transparent;
  border-bottom: 4px solid transparent;
  border-left: 4px solid white;
  border-right: 4px solid transparent;
  position: absolute;
  top: 50%;
  right: 0;
  margin-top: -2px;
}

#mexnu li > a:not(:only-child):after {
  content: "";
  position: absolute;
  width: 0;
  height: 0;
  top: 50%;
  right: 0;
  border-left: 5px solid transparent;
  border-right: 5px solid transparent;
}
#nav-smmenu > ul ul {
  z-index: 9;
  left: 0;
} 
#nav-smmenu > ul ul ul {
  position: absolute;
  z-index: 99;
  left: 0;
}
#nav-smmenu > ul ul ul ul {
  z-index: 999;
  left: 0;
}
#nav-smmenu > ul ul ul ul ul {
  z-index: 9999;
  left: 0;
}
#nav-smmenu > ul ul ul ul ul ul {
  z-index: 99999;
  left: 0;
}

#nav-smmenu > ul ul a{
  text-transform: none;
}

#nav-smmenu > ul li:hover ul{
  animation-name: anima_smmenu;
  animation-duration: 0.5s;
  animation-timing-function: linear;
  animation-delay: 0s;
  animation-iteration-count: 1;
  animation-direction: alternate;
}

@keyframes anima_smmenu {
  from {left: -10px; opacity: 0.1}
  to {left: 10px; opacity: 0.5}
}

.anima_adicionais {
  animation-name: anima_adicionais;
  animation-duration: 0.5s;
  animation-timing-function: linear;
  animation-delay: 0s;
  animation-iteration-count: 1;
  animation-direction: alternate;
}

@keyframes anima_adicionais {
  from {top: 0; right: -30px; opacity: 0.1}
  to {top: 30px; right: 0; opacity: 1}
}

@media (min-width: 550px) {

  #menu-inst {
    width: 100%;
    display: flex;
    align-items: flex-end;
    align-content: flex-end;
    justify-content: flex-end;
    flex-wrap: nowrap;
    position: static;
  }

  #nav-smmenu {
    width: 100%;
    display: flex;
    align-items: flex-end;
    align-content: flex-end;
    justify-content: flex-end;
    flex-wrap: nowrap;
    background-color: #FF4D00;
  }

  #nav-smmenu > ul {
    display: flex;
    justify-content: flex-end;
    align-items: flex-end;
    align-content: flex-end;
    flex-wrap: wrap;
    margin-right: 0;    
  }

  #nav-smmenu > ul li a {
    color: white;
    padding: 5px 15px;
    font-size: 14px;
    margin-left: 1px;
  }

  #nav-smmenu > ul li a:hover {
    color: white;
    background-color: #0080FF;
  }


  #nav-smmenu > ul ul {
    position: absolute;
  }

  #nav-smmenu > ul ul ul {
    position: absolute;
    background-color: #04353E;
    top: 30px;
    left: 10px;
    z-index: 999;
  }

  #nav-smmenu > ul ul ul ul {
    position: absolute;
    top: 30px;
    left: 10px;
  }

  #nav-smmenu > ul ul ul ul ul {
    position: absolute;
    top: 30px;
    left: 10px;
  }

  #nav-smmenu > ul ul ul ul ul {
    position: absolute;
    top: 30px;
    left: 10px;
  }

  #nav-smmenu > ul ul ul ul ul ul {
    position: absolute;
    top: 30px;
    left: 10px;
  }

  #nav-smmenu ul ul ul a {
    position: relative;
    display: block;
    white-space: nowrap;
  }

  #nav-smmenu > ul ul {
    position: absolute;
  }

  #maisinst {
    width: 30px;
    height: 30px;
    color: white;
    text-align: center;
    line-height: 30px;
    background-color: red;
    cursor: pointer;
    display: none;
  }

  #adicionaisinst {
    display: none;
    position: absolute;
    top: 30px;
    right: 0;
    width: auto;
    padding: 0;
    background-color: red;
    z-index: 99999;
  }

  #adicionaisinst li > a:not(:only-child) {
    border-bottom: 5px solid red;
    background-color: red;
  }

  #adicionaisinst li > a:not(:only-child):before {
    content: "";
    border-top: 5px solid red;
    border-bottom: 5px solid transparent  ;
    border-left: 5px solid transparent;
    border-right: 5px solid transparent;
    position: absolute;
    bottom: -10px;
    right: 5px;
  }

  #adicionaisinst a {
    padding: 10px 15px;
    display: block;
    color: white;
  }

  #adicionaisinst ul ul a {
    color: white;
  }

  #adicionaisinst ul ul a {
    color: white;
  }

  #adicionaisinst ul a:hover {
    background-color: black;
    color: white;
  }

  #nav-smmenu ul ul  {
    width: 200px;
    min-width: 250px;
    max-width: 500px;
  }

  #nav-smmenu a {
    white-space: pre-line!important;
  }

  #naxv-smmenu ul ul li  {
    border-top: 1px solid white;
  }

}

/****************************************/
/* MENU CATALOGO */
/****************************************/

#menu-catalogo {
  width: 100%;
  display: none;
  position: absolute;
  top: 40px;
  left: 0;
}

#nav-menu {
  position: relative;
  background-color: #e9ecef;
}

#nav-menu > ul a {
  text-decoration: none;
  color: white;
}

#nav-menu > ul a:hover {
  background-color: #e9ecef;
  color: black;
}

#nav-menu > ul ul a {
  text-decoration: none;
  color: white;
}

#nav-menu > ul ul a:hover {
  background-color: #e9ecef;
  color: black;
}

#nav-menu ul {
  list-style: none;
  margin: 0;
  padding: 0;
}

#nav-menu > ul {
  display: block;
  justify-content: flex-start;
  align-items: flex-start;
  align-content: center;
}

#nav-menu > ul li {
  margin: 0;
  box-sizing: border-box;
  margin-right: 0;
}

#nav-menu > ul li a {
  display: block;
  padding: 5px 20px;
  background-color: transparent;
  text-transform: uppercase;
  color: white;
}

#nav-menu > ul > li ul a {
  display: block;
  padding: 5px 20px;
  background-color: #04353E;
  color: white
}

#nav-menu > ul > li ul ul a {
  background-color: red;
}

#nav-menu > ul > li ul ul ul a {
  background-color: black;
}

#nav-menu > ul > li ul ul ul ul a {
  background-color: red;
}

#nav-menu > ul ul {
  display: none;
}

#nav-menu li {
  position: relative;
  display: block;
}

#nav-menu li a {
  position: relative;
}

#menu li a:not(:only-child):before {
  content: "";
  position: absolute;
  border-top: 5px solid white;
  border-bottom: 5px solid transparent;
  border-left: 5px solid transparent;
  border-right: 5px solid transparent;
  position: absolute;
  top: 15px;
  right: 10px;
}

#mais {
  width: 30px;
  height: 30px;
  color: #015D8F;
  text-align: center;
  line-height: 30px;
  background-color: red;
  cursor: pointer;
  display: none;
}

#adicionais {
  display: none;
  position: absolute;
  top: 30px;
  right: 0;
  width: auto;
  padding: 0;
  background-color: rgba(000,000,000,0.5);
  z-index: 99999;
}

#adicionais li > a:not(:only-child) {
  border-bottom: 5px solid red;
  background-color: red;
}

#adicionais li > a:not(:only-child):before {
  content: "";
  border-top: 5px solid red;
  border-bottom: 5px solid transparent  ;
  border-left: 5px solid transparent;
  border-right: 5px solid transparent;
  position: absolute;
  bottom: -10px;
  right: 5px;
}

#adicionais a {
  padding: 10px 15px;
  display: block;
  color: white;
}

#adicionais ul ul a {
  color: white;
}

#adicionais ul ul a {
  color: white;
}

#adicionais ul a:hover {
  background-color: black;
  color: white;
}

@keyframes anima_menu {
  from {left: -10px; opacity: 0.1}
  to {left: 10px; opacity: 0.5}
}

.anima_adicionais {
  animation-name: anima_adicionais;
  animation-duration: 0.5s;
  animation-timing-function: linear;
  animation-delay: 0s;
  animation-iteration-count: 1;
  animation-direction: alternate;
}

@keyframes anima_adicionais {
  from {top: 0; right: -30px; opacity: 0.1}
  to {top: 30px; right: 0; opacity: 1}
}

@media (min-width: 550px) {

  #menu-catalogo {
    width: 100%;
    display: flex;
    align-items: center;
    align-content: center;
    justify-content: center;
    flex-wrap: wrap;
    position: static;
    background-color: aliceblue;
  }

  #nav-menu  {
    display: flex;
    justify-content: flex-end; 
    align-items: center;
    align-content: center;
    flex-wrap: nowrap;
    border-top: 0px solid silver;
    border-bottom: 0px solid silver;
  }

  #nav-menu > ul {
    width: 100%;
    display: flex;
    align-items: center;
    align-content: center;
    justify-content: center; 
    flex-wrap: wrap;
    position: relative;
  }

  #nav-menu > ul li {
    width: auto;
    position: relative;
  }

  #nav-menu > ul li a {
    padding: 10px 20px;
    position: relative;
    text-transform: none;
    color: black;
    background-color: white;
  }

  #nav-menu > ul ul li a:hover {
    background-color: black;
  }

  #nav-menu > ul li a:hover{
    color: #1eaedb;
    background-color: transparent;
  }

  #nav-menu > ul li a:hover:before {
    content: "";
    background-color: #e9ecef;
    border-radius: 100%;
    padding: 5px;
    top: 2px;
    left: 50%;
    position: absolute;
    margin-left: -2px;
  }

  #menu li a:not(:only-child):before {
    right: 0px;
  }

  #nav-menu a {
    /*white-space: pre-line;*/
  }

  #nav-menu > ul ul {
    position: absolute;
    z-index: 9;
    width: 300px;
    max-width: 500px;
  }

  #nav-menu > ul ul ul {
    z-index: 99;
    border: 1px solid #046194;
    left: 20%;
    top:  0;
  }

  #nav-menu > ul ul ul ul {
    z-index: 999;
  }

  #nav-menu > ul ul ul ul ul {
    z-index: 9999;
  }

  #nav-menu > ul ul ul ul ul ul{
    z-index: 99999;
  }

  #nav-menu > ul ul li {
    width: 100%;
    display: block;
  }

}


/****************************************/
/* PESQUISA */
/****************************************/

#form-busca {
margin: 0;
margin-bottom: 5px;
}


@media (min-width: 550px) {

  #form-busca {

}

}

</style>

