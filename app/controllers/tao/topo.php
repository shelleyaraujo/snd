<header>

 <div class="cnt-icones-menus">
  <div class="icone-menu-institucional"><div class="menu icon"></div></div>
</div>

<div class="menu-produtos">
  <div class="fechar-menu-produtos">
   <a href="#" id="fechar-menu-produtos">
    <img src="tema_casa_jardim/icones/fechar.svg" width="20" height="20" alt="Casa e Jardim" />
  </a>
  <nav id="nav-menu" class="nav-menu">
xxx
    <div id="adicionais"><ul></ul></div>
    <div id="mais"></div>
  </nav>
</div>
</div>

<div class="cnt-topo">

  <div class="col1">
    <a  href="?">
      <img id="logo-topo" src="imagens/logo.png" alt="<?php echo $config[0]->marca; ?>" title="<?php echo $meta[6]; ?>" width="300" height="65">
    </a>
    <span style='display: none'><?php echo $meta[6]; ?></span>
  </div>

  <div class="col2">

<div class="cnt-icones">
   <div class="sociais">
  xx
  </div>
    <div class="telefones">
   xx
  </div>
</div>

    <div class="xcontainer">
      <div class="menu-institucional">
        <div class="fechar-menu-institucional">
         <a href="#" id="fechar-menu-institucional">
          <img src="tema_casa_jardim/icones/fechar.svg" width="20" height="20" alt="" />
        </a>
        <nav id="nav-smmenu" class="nav-smmenu">
          <?php echo $menu_institucional; ?>
          <div id="adicionaisinst"><ul></ul></div>
          <div id="maisinst"></div>
        </nav>
      </div>
    </div> 
  </div>
  
</div>

</div>








</header>

<style>

header {
  background-color: black;
}

header p {
  color: white;
}

header a {
  color: white;
}

.pesquisa form{
  margin-left: auto;
}

.pesquisa input {
  display: block;
  width: 80%;
  height: 22px;
  display: inline-block;
}

.pesquisa .button {
  width: auto;
  height: 22px;
  padding: 0 5px;
  font-weight: normal;
}

.cnt-login {
  display: -webkit-box;
  display: -moz-box;
  display: -ms-flexbox;
  display: -webkit-flex;
  display: flex;  
  align-content: center;
  align-items: center;
  justify-content: flex-end;
  text-align: right;
  flex-wrap: wrap;
}

.cnt-login div {
  padding: 5px;
  font-size: 12px;
  border: 1px solid transparent;
  text-align: left;
  width: 100%;
  display: block;
}

.cnt-login div:hover{
  color: red;
  border: 1px solid #ED8211;
}

.cnt-login img {
  padding: 0 5px;
}

.cnt-topo {
  display: -webkit-box;
  display: -moz-box;
  display: -ms-flexbox;
  display: -webkit-flex;
  display: flex;
  align-content: center;
  align-items: center;
  justify-content: center;
  flex-wrap: wrap;
  max-width: 1200px;
  margin-left: auto;
  margin-right: auto;
  padding: 15px
   20px;
}

.cnt-topo .col1, .cnt-topo .col1 {
  width: 100%;
  display: block;
  text-align: center;
}

.cnt-topo .col1 img {
  max-width: 100%;
  height: auto!important;
}

.cnt-icones-menus {
  height: 30px;
  padding: 0;
  margin: 0;
}

.cnt-icones-menus > div{
  position: relative;
  text-align: left;
  width: 25px;
  padding: 10px;
}

.menu.icon {
  color: white;
  position: absolute;
  margin-left: relative;
  margin-top: 0;
  width: 20px;
  height: 2px;
  background-color: currentColor;
}

.menu.icon:before {
  content: '';
  position: absolute;
  top: -5px;
  left: 0;
  width: 20px;
  height: 2px;
  background-color: currentColor;
}

.menu.icon:after {
  content: '';
  position: absolute;
  top: 5px;
  left: 0;
  width: 20px;
  height: 2px;
  background-color: currentColor;
}

.magnify.icon {
  color: white;
  position: relative;
  margin-top: 2px;
  margin-left: 3px;
  width: 12px;
  height: 12px;
  border: solid 1px currentColor;
  border-radius: 100%;
  -webkit-transform: rotate(-45deg);
  transform: rotate(-45deg);
}

.magnify.icon:before {
  content: '';
  position: absolute;
  top: 12px;
  left: 5px;
  height: 6px;
  width: 1px;
  background-color: currentColor;
}

.magnify.icon i {
  position: absolute;
  left: 4px;
  top: 4px;
  -webkit-transform: rotate(45deg);
  transform: rotate(45deg);
}

.magnify.icon i:before {
  content: '';
  position: absolute;
  width: 6px;
  height: 1px;
  background-color: currentColor;
}

.magnify.icon i:after {
  content: '';
  position: absolute;
  width: 6px;
  height: 1px;
  background-color: currentColor;
  -webkit-transform: rotate(90deg);
  transform: rotate(90deg);
}

.pesquisa  {
  background-color: black;
  background: rgba(000,000,000, 0.8);
  display: none;
  text-align: center;
  top: 30px;
  position: absolute;
  padding: 0;
  width: 100%;
}

.pesquisa  form {
  padding: 15px;
}

.pesquisa  a {
  text-align: right;
  display: block;
  padding: 10px 10px 0 0;
}

.sociais {
 display: inline-block;
 text-align: right;
 padding-left: 50px;
 position: absolute;
 top: 5px;
 right: 0;
}

.sociais div {
  width: 100%;
  padding: 0;
  background-color: transparent;
}

.sociais p {  
  width: 25px;
  height: 25px;
  overflow: hidden;
  margin: 0;
  margin: 0 10px;
  text-align: right;
  line-height: 20px;
  display: inline-block;
}

.sociais a {
 position: relative;
 display: block;
 width: 100%;
 font-size: 0;
}



.sociais a[href*="facebook"]:before {
  content: "";
  position: absolute;
  width: 15px;
  height: 15px;
  left: 0;
  top: 7px;
  background-image: url("data:image/svg+xml,%3C%3Fxml version='1.0' encoding='iso-8859-1'%3F%3E%3Csvg version='1.1' id='Capa_1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px' viewBox='0 0 26 26' style='enable-background:new 0 0 26 26;' xml:space='preserve'%3E%3Cg%3E%3Cpath style='fill:white;' d='M21.125,0H4.875C2.182,0,0,2.182,0,4.875v16.25C0,23.818,2.182,26,4.875,26h16.25 C23.818,26,26,23.818,26,21.125V4.875C26,2.182,23.818,0,21.125,0z M20.464,14.002h-2.433v9.004h-4.063v-9.004h-1.576v-3.033h1.576 V9.037C13.969,6.504,15.021,5,18.006,5h3.025v3.022h-1.757c-1.162,0-1.238,0.433-1.238,1.243l-0.005,1.703h2.764L20.464,14.002z'/%3E%3C/g%3E%3C/svg%3E%0A");  background-repeat: no-repeat;
  background-position: center;
  background-size: 100%;
}
.fil0 {fill:red}

.sociais a[href*="facebook"]:hover:before {
  background-color: red;
}

.sociais a[href*="instagram"]:before {
  content: "";
  position: absolute;
  width: 15px;
  height: 15px;
  left: 0;
  top: 7px;
  background-image: url("data:image/svg+xml,%3C%3Fxml version='1.0' encoding='iso-8859-1'%3F%3E%3Csvg version='1.1' id='Capa_1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px' viewBox='0 0 26 26' style='enable-background:new 0 0 26 26;' xml:space='preserve'%3E%3Cg%3E%3Cpath style='fill:white;' d='M20,7c-0.551,0-1-0.449-1-1V4c0-0.551,0.449-1,1-1h2c0.551,0,1,0.449,1,1v2c0,0.551-0.449,1-1,1H20z '/%3E%3Cpath style='fill:white;' d='M13,9.188c-0.726,0-1.396,0.213-1.973,0.563c0.18-0.056,0.367-0.093,0.564-0.093 c1.068,0,1.933,0.865,1.933,1.934c0,1.066-0.865,1.933-1.933,1.933s-1.933-0.866-1.933-1.933c0-0.199,0.039-0.386,0.094-0.565 C9.4,11.604,9.188,12.274,9.188,13c0,2.107,1.705,3.813,3.813,3.813c2.105,0,3.813-1.705,3.813-3.813S15.105,9.188,13,9.188z'/%3E%3Cg%3E%3Cpath style='fill:white;' d='M13,7c3.313,0,6,2.686,6,6s-2.688,6-6,6c-3.313,0-6-2.686-6-6S9.687,7,13,7 M13,5 c-4.411,0-8,3.589-8,8s3.589,8,8,8s8-3.589,8-8S17.411,5,13,5L13,5z'/%3E%3C/g%3E%3Cpath style='fill:white;' d='M21.125,0H4.875C2.182,0,0,2.182,0,4.875v16.25C0,23.818,2.182,26,4.875,26h16.25 C23.818,26,26,23.818,26,21.125V4.875C26,2.182,23.818,0,21.125,0z M24,9h-6.537C18.416,10.063,19,11.461,19,13 c0,3.314-2.688,6-6,6c-3.313,0-6-2.686-6-6c0-1.539,0.584-2.938,1.537-4H2V4.875C2,3.29,3.29,2,4.875,2h16.25 C22.711,2,24,3.29,24,4.875V9z'/%3E%3C/g%3E%3Cg%3E%3C/g%3E%3Cg%3E%3C/g%3E%3Cg%3E%3C/g%3E%3Cg%3E%3C/g%3E%3Cg%3E%3C/g%3E%3Cg%3E%3C/g%3E%3Cg%3E%3C/g%3E%3Cg%3E%3C/g%3E%3Cg%3E%3C/g%3E%3Cg%3E%3C/g%3E%3Cg%3E%3C/g%3E%3Cg%3E%3C/g%3E%3Cg%3E%3C/g%3E%3Cg%3E%3C/g%3E%3Cg%3E%3C/g%3E%3C/svg%3E%0A");  background-position: center;
  background-size: 100%;
}

.sociais a[href*="instagram"]:hover:before {
  background-color: red;
}

.sociais a[href*="linkedin"]:before {
  content: "";
  position: absolute;
  width: 15px;
  height: 15px;
  left: 0;
  top: 7px;
  background-image: url("data:image/svg+xml,%3C%3Fxml version='1.0' encoding='iso-8859-1'%3F%3E%3Csvg version='1.1' id='Capa_1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px' viewBox='0 0 543.906 543.906' style='enable-background:new 0 0 543.906 543.906;' xml:space='preserve'%3E%3Cg%3E%3Cpath style='fill:white;' d='M82.163,0C36.806,0,0,36.806,0,82.163v379.576c0,45.362,36.806,82.168,82.163,82.168h379.647 c45.367,0,82.097-36.806,82.097-82.163V82.163C543.906,36.806,507.171,0,461.809,0H82.163z M148.563,67.7 c27.951,0,45.182,18.4,45.71,42.528c0,23.606-17.802,42.457-46.292,42.457h-0.506c-27.44,0-45.204-18.852-45.204-42.457 C102.271,86.1,120.584,67.7,148.563,67.7L148.563,67.7z M389.562,180.528c53.792,0,94.096,35.115,94.096,110.663v141.046h-81.733 V300.666c0-33.059-11.857-55.62-41.446-55.62c-22.578,0-35.979,15.175-41.875,29.871c-2.159,5.254-2.747,12.608-2.747,19.961 v137.358h-81.733c0,0,1.082-222.844,0-245.916h81.733v34.864C326.708,204.416,346.137,180.528,389.562,180.528z M107.117,186.315 h81.727v245.916h-81.727V186.315z'/%3E%3C/g%3E%3C/svg%3E%0A");  background-repeat: no-repeat;
  background-position: center;
  background-color: gray;
  background-size: 100%;
}

.sociais a[href*="linkedin"]:hover:before {
  background-color: transparent;
}


.sociais a[href*="youtube"]:before {
  content: "";
  position: absolute;
  width: 20px;
  height: 15px;
  left: 0;
  top: 7px;
  background-image: url("data:image/svg+xml,%3C%3Fxml version='1.0' encoding='iso-8859-1'%3F%3E%3Csvg version='1.1' id='Capa_1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px' viewBox='0 0 508.52 508.52' style='enable-background:new 0 0 508.52 508.52;' xml:space='preserve'%3E%3Cg%3E%3Cg%3E%3Cg%3E%3Cg%3E%3Cpath style='fill:white;' d='M413.172,0H95.347C42.684,0,0,42.684,0,95.347v317.825c0,52.664,42.684,95.347,95.347,95.347 h317.825c52.664,0,95.347-42.684,95.347-95.347V95.347C508.52,42.684,465.836,0,413.172,0z M410.471,311.182 c-1.716,21.167-17.798,48.182-40.268,52.091c-71.987,5.594-157.292,4.895-231.853,0c-23.265-2.924-38.552-30.956-40.268-52.091 c-3.623-44.432-3.623-69.731,0-114.163c1.716-21.135,17.385-49.009,40.268-51.551c73.704-6.198,159.485-4.863,231.853,0 c25.871,0.953,38.552,27.619,40.268,48.786C414.03,238.686,414.03,266.75,410.471,311.182z'/%3E%3Cpolygon style='fill:white;' points='222.477,317.825 317.825,254.26 222.477,190.695 '/%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/svg%3E%0A");  background-position: center;
  background-size: 100%;
}

.sociais a[href*="youtube"]:hover:before {
  background-color: transparent;
}


.telefones {
  width: auto;
  display: inline-block;
}

.telefones div {
  padding: 0;
  display: block;
}

.telefones p {  
  width: auto;
  height: 25px;
  overflow: hidden;
  margin: 0;
  margin: 0 5px;
  text-align: left;
  line-height: 32px;
  position: relative;
  display: block;
}

.telefones a {
 position: relative;
 display: block;
 width: auto;
 padding-left: 20px;
 color: lightblue;
 font-size: 12px;
}

.telefones a:hover {
 color: white;
}

.telefones a:before {
  content: "";
  position: absolute;
  width: 15px;
  height: 15px;
  left: 0;
  top: 8px;
  background-image: url("data:image/svg+xml,%3C%3Fxml version='1.0' encoding='UTF-8'%3F%3E%3C!DOCTYPE svg PUBLIC '-//W3C//DTD SVG 1.1//EN' 'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd'%3E%3Csvg xmlns='http://www.w3.org/2000/svg' xml:space='preserve' width='100%25' height='100%25' style='shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd'%0AviewBox='0 0 2.50002 2.50002' xmlns:xlink='http://www.w3.org/1999/xlink'%3E%3Cdefs%3E%3Cstyle type='text/css'%3E%3C!%5BCDATA%5B .fil0 %7Bfill:none%7D .fil1 %7Bfill: lightblue%7D %5D%5D%3E%3C/style%3E%3C/defs%3E%3Cg id='Capa_x0020_1'%3E%3Cmetadata id='CorelCorpID_0Corel-Layer'/%3E%3Crect class='fil0' width='2.50002' height='2.50002'/%3E%3Cpath class='fil1' d='M1.85227 1.18428c-0.0044,0.00659 -0.0044,0.01318 -0.0066,0.02196 -0.00219,0.02855 0.01977,0.05491 0.04833,0.05711 0.02855,0.00219 0.05491,-0.01977 0.0571,-0.04832 0,-0.00659 0,-0.01318 0.0022,-0.02416 0,-0.01098 0,-0.01758 0,-0.02416 0,-0.0637 -0.01099,-0.1252 -0.03075,-0.1845 -0.02636,-0.07686 -0.07248,-0.14495 -0.12739,-0.20205 -0.06808,-0.06809 -0.15155,-0.11641 -0.24599,-0.14276 -0.04392,-0.01099 -0.09224,-0.01757 -0.13836,-0.01757 -0.01538,0 -0.03075,0 -0.04833,0.00219 -0.01537,0.0022 -0.03075,0.00439 -0.04612,0.00659 -0.02855,0.00439 -0.04832,0.03295 -0.04173,0.0593 0.0044,0.02856 0.03295,0.04832 0.0593,0.04173 0.01318,-0.0022 0.02416,-0.00439 0.03734,-0.00439 0.0022,0 0.0044,0 0.00659,0 0.01098,0 0.02196,-0.0022 0.03295,-0.0022 0.12079,0 0.2328,0.04833 0.31187,0.12959 0.07907,0.07907 0.12739,0.18669 0.12959,0.30749l0 0.00439c0,0.00877 0,0.01537 0,0.01976zm0.19387 -0.7005c-0.20865,-0.20865 -0.49417,-0.33604 -0.81044,-0.33604 -0.03295,0 -0.06589,0.0022 -0.09884,0.0044 -0.03294,0.00219 -0.06589,0.00658 -0.09883,0.01317 -0.02856,0.00439 -0.04832,0.03295 -0.04173,0.0593 0.00439,0.02856 0.03294,0.04832 0.0593,0.04173 0.01537,-0.0022 0.02855,-0.00439 0.04393,-0.00659 0.01537,-0.00219 0.03075,-0.00439 0.04612,-0.00439 0.03074,-0.0022 0.0593,-0.00439 0.09005,-0.00439 0.28552,0 0.54468,0.1164 0.73357,0.30309 0.18669,0.18669 0.3031,0.44585 0.3031,0.73357 0,0.01538 0,0.03295 0,0.04832 0,0.01318 -0.0022,0.02636 -0.0022,0.04173 -0.0022,0.02855 0.01976,0.05491 0.04831,0.05711 0.02856,0.00219 0.05491,-0.01977 0.05711,-0.04832 0.0022,-0.03295 0.00439,-0.06589 0.00439,-0.09664 0,-0.31407 -0.12739,-0.5996 -0.33384,-0.80605zm0.25258 1.33097l-0.38875 -0.20865c-0.12959,-0.07028 -0.13398,-0.02416 -0.27015,0.1208 -0.03294,0.03514 -0.09444,0.12738 -0.16692,0.10982 -0.15154,-0.03734 -0.43487,-0.25917 -0.52711,-0.36021 -0.04393,-0.04831 -0.23282,-0.27892 -0.23501,-0.3536 -0.0044,-0.11421 0.24598,-0.17131 0.16472,-0.38875l-0.17351 -0.38875c-0.16253,-0.37337 -0.61716,0.22403 -0.57983,0.50296 0.09664,0.68745 1.30242,1.79879 1.9745,1.43201 0.14935,-0.08347 0.35141,-0.37558 0.20206,-0.46563z'/%3E%3C/g%3E%3C/svg%3E%0A");  background-repeat: no-repeat;
  background-position: center;
  background-size: 100%;
}

.telefones a:hover:before {
  background-color: transparent;
}


.telefones a[href*="whatsapp"]:before {
  content: "";
  position: absolute;
  width: 15px;
  height: 15px;
  left: 0;
  top: 8px;
background-image: url("data:image/svg+xml,%3C%3Fxml version='1.0' encoding='UTF-8'%3F%3E%3C!DOCTYPE svg PUBLIC '-//W3C//DTD SVG 1.1//EN' 'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd'%3E%3Csvg xmlns='http://www.w3.org/2000/svg' xml:space='preserve' width='100%25' height='100%25' style='shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd'%0AviewBox='0 0 2.50002 2.50002' xmlns:xlink='http://www.w3.org/1999/xlink'%3E%3Cdefs%3E%3Cstyle type='text/css'%3E%3C!%5BCDATA%5B .fil0 %7Bfill:none%7D .whatsapp %7Bfill: lightblue%7D %5D%5D%3E%3C/style%3E%3C/defs%3E%3Cg id='Capa_x0020_1'%3E%3Cmetadata id='CorelCorpID_0Corel-Layer'/%3E%3Crect class='fil0' width='2.50002' height='2.50002'/%3E%3Cpath id='WhatsApp' class='whatsapp' d='M2.44063 1.21934c0,0.64064 -0.52332,1.15996 -1.16898,1.15996 -0.20497,0 -0.39754,-0.05239 -0.56507,-0.14433l-0.64719 0.20566 0.21101 -0.62235c-0.10644,-0.17478 -0.16775,-0.37978 -0.16775,-0.59894 -1e-005,-0.64063 0.52337,-1.15995 1.169,-1.15995 0.64572,0 1.16898,0.51932 1.16898,1.15995zm-1.16898 -0.97522c-0.54197,0 -0.98282,0.43749 -0.98282,0.97523 0,0.21339 0.06956,0.411 0.18722,0.57176l-0.12279 0.36219 0.37769 -0.12004c0.15518,0.10189 0.34107,0.16132 0.54073,0.16132 0.54189,0 0.98282,-0.43744 0.98282,-0.97517 0,-0.53773 -0.4409,-0.97529 -0.98285,-0.97529zm0.59031 1.24237c-0.00722,-0.01183 -0.0263,-0.01897 -0.05493,-0.03318 -0.02868,-0.01421 -0.1696,-0.08303 -0.19579,-0.09247 -0.02627,-0.00947 -0.04543,-0.01423 -0.06451,0.01421 -0.01908,0.02847 -0.074,0.09247 -0.09075,0.11144 -0.01672,0.01902 -0.03342,0.0214 -0.0621,0.00717 -0.02863,-0.01421 -0.12094,-0.04426 -0.2304,-0.1411 -0.08517,-0.07535 -0.14269,-0.16838 -0.15941,-0.19688 -0.0167,-0.02844 -0.00175,-0.04382 0.01257,-0.05797 0.01291,-0.01275 0.02868,-0.03321 0.04299,-0.04979 0.01437,-0.01662 0.01913,-0.02844 0.02863,-0.04744 0.0096,-0.01897 0.00482,-0.03556 -0.00238,-0.04982 -0.00714,-0.01421 -0.06451,-0.15412 -0.08837,-0.21106 -0.02387,-0.05689 -0.0477,-0.04741 -0.06445,-0.04741 -0.0167,0 -0.03582,-0.00238 -0.05493,-0.00238 -0.0191,0 -0.05017,0.00712 -0.07644,0.03556 -0.02625,0.02847 -0.10025,0.09726 -0.10025,0.23715 0,0.13991 0.10263,0.27509 0.117,0.29403 0.01431,0.01894 0.19817,0.31538 0.48948,0.42923 0.29134,0.1138 0.29134,0.07583 0.34389,0.07107 0.05249,-0.00474 0.16949,-0.06877 0.19346,-0.13512 0.02381,-0.06647 0.02381,-0.12338 0.01669,-0.13524z'/%3E%3C/g%3E%3C/svg%3E%0A");  background-position: center;
  background-size: 100%;
}

.telefones a[href*="whatsapp"]:hover:before {
  background-color: transparent;
}

.cnt-icones {
 display: -webkit-box;
  display: -moz-box;
  display: -ms-flexbox;
  display: -webkit-flex;
  display: flex;
  align-content: flex-end;
  align-items: flex-end;
  justify-content: flex-end;
  flex-wrap: wrap;
}


@media (min-width: 550px) {

  .cnt-topo {
    position: relative;
    padding-left: 20px;
  }

  .xcnt-topo .col1 img {
    position: absolute;
    left: 15px;
    top: 20px;
    animation-name: a-logo;
    animation-duration: 1s;
    animation-timing-function: linear;
    animation-delay: 0;
    animation-iteration-count: 1;
    animation-direction: alternate;
    animation-direction: alternate;
    max-width: 100%;
  }

  @keyframes a-logo {
    from {left: 100%; width: 0; height: auto; transform: rotate(0deg)}
    to {left: 0; max-width: 100%; height: auto; transform: rotate(0deg)}
  }

  .cnt-topo {
    padding-right: 25px;
  }

  .cnt-topo .col1 {
    width: 20%;
  }

  .cnt-topo .col2 {
    width: 80%;
  }


  .cnt-login div {
    padding: 5px 10px 0 5px;
    font-size: 12px;
    border: 1px solid transparent;
    text-align: right;
    width: auto;
    display: inline-block;
  }

  .cnt-pesquisa  {
    position: relative;
    display: -webkit-box;
    display: -moz-box;
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;  
    align-content: center;
    align-items: center;
    justify-content: flex-end;
    flex-wrap: nowrap;
  }

  .pesquisa  {
    background-color: transparent;
    background: transparent;
    display: block;
    text-align: right;
    top: 0;
    position: relative;
    padding: 0;
    width: auto;
  }

  .pesquisa  input {
    margin-bottom: 0;
  }

  .pesquisa  a {
    display: none;
  }

  .sociais {
    width: auto;
    justify-content: flex-end;
    top: 40px;
    position: static;
  }

  .telefones p {  
    overflow: hidden;
    text-align: right;
    display: inline-block;
  }

  .telefones a {
   position: relative;
   display: block;
   width: auto;
   padding-left: 20px;
 }

 .telefones {
  width: auto;
  justify-content: flex-end;
}

}

</style>

<style>

#nav-menu {
 display: flex;
 justify-content: center; 
 align-items: center;
 align-content: center;
 flex-wrap: wrap;
}

#nav-menu  ul {
 margin: 0;
 padding: 0;
 list-style: none;
}

#nav-menu a {
  color: white;
}

#nav-menu li {
  display: block;
  width: 100%;
}

#nav-menu > ul {
 display: flex;
 justify-content: center; 
 align-items: center;
 align-content: center;
 flex-wrap: wrap;
}

#nav-menu > ul ul {
 display: none;
}


#nav-menu > ul a {
  display: block;
  width: 100%;
  padding: 5px 15px;
  background-color: skyblue;
  box-sizing: border-box;
}

#nav-menu > ul ul a {
  display: block;
  width: 100%;
  padding: 5px 15px;
  background-color: black;
  box-sizing: border-box;
}

#nav-menu > ul ul ul a {
  background-color: #264653;
}

#menu li a:not(:only-child) {
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


@media (min-width: 550px) {

  #nav-menu  {
   display: flex;
   justify-content: flex-end; 
   align-items: center;
   align-content: center;
   flex-wrap: nowrap;
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

 #menu li a:not(:only-child):before {
  right: 0px;
}

#nav-menu a {
  xwhite-space: pre-line;
}

#nav-menu > ul ul {
  position: absolute;
  z-index: 9;
  width: 300px;
  max-width: 500px;
}

#nav-menu > ul ul ul {
  z-index: 99;
  border: 1px solid black;
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












#mais {
  width: 30px;
  height: 30px;
  color: white;
  text-align: center;
  line-height: 30px;
  background-color: green;
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
  background-color: skyblue;
  z-index: 99999;
}

#adicionais li > a:not(:only-child) {
  border-bottom: 5px solid skyblue;
  background-color: green;
}

#adicionais li > a:not(:only-child):before {
  content: "";
  border-top: 5px solid green;
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

}

@keyframes anima_menu {
  from {left: -10px; opacity: 0.1}
  to {left: 10px; opacity: 0.5}
}

.anima_adicionais {
  animation-name: anima_adicionais;
  animation-duration: 0.5s;
  animation-timing-function: linear;
  animation-delay: 0;
  animation-iteration-count: 1;
  animation-direction: alternate;
}

@keyframes anima_adicionais {
  from {top: 0; right: -30px; opacity: 0.1}
  to {top: 30px; right: 0; opacity: 1}
}

</style>

<script>

  var menu = document.getElementById("menu"); 
  var ul = menu.querySelectorAll("li");

  for (var i = 0; i < ul.length; i++) {
    ul[i].setAttribute("id", "m"+i+"");
    ul[i].setAttribute("onclick", "exibir('m" +i+ "')");
  }

  /* VIEW LIs HIDDEN */
  function exibir(id) {
    var m = document.getElementById(id);
    var x = m.querySelectorAll("ul");

    var ulul = m.querySelectorAll("ul ul");
    for (var i = ulul.length - 1; i >= 0; i--) {

      if(i>=0) {
        if(ulul[0].style.display === '' || ulul[0].style.display === 'none')  { 
          ulul[0].style.display="block";
        } 
        var a = m.querySelectorAll("a");
        a[0].setAttribute("href", "javascript: void(0)");
        a[0].setAttribute("ondblclick", "ocultar('" +id+ "')");
      }
    }
  }
  /* HIDE LIs */
  function ocultar(id) {
    var y = document.getElementById(id);
    var xx = y.querySelectorAll("ul");
    xx[0].style.display = "";
  }

  var info = document.getElementById("info");
  var tela = window.matchMedia("(max-width: 550px)");
  var wtela = window.innerWidth - 100;
  var outerWidth = 0;
  var topo = 40;
  var count = 0;
  var xxxxx=0;

  /* CALC WIDTH LIs AND HIDDEN THEN */
  if (!tela.matches) {
    var ul = document.querySelectorAll("#nav-menu > ul > li");
    for (var i = 0; i < ul.length; i++) {
      outerWidth += ul[i].clientWidth;
      if(outerWidth > wtela) {
        count++;
        var fragment = document.createDocumentFragment();
        document.querySelector('#adicionais ul').appendChild(ul[i]);
      }

      if(outerWidth > wtela/2) {
        getLargura(ul[i].getAttribute("id"))
      }

    }

    if(count>0) {
     document.querySelector('#mais').style.display="block";
     document.querySelector('#mais').innerHTML = "+ " + count;
   }

   /* CLOSE  ULs OPENED */
   var ss = document.querySelectorAll("#nav-menu ul ul");
   var sss = document.querySelectorAll("#nav-menu > ul li");

   for(var o = 0; o < ss.length; o++) {
     ss[o].onmouseleave = function() {
      ss[o].style.display = "none";
    }
  }

  for(var oo = 0; oo < sss.length; oo++) {
   sss[oo].onmouseleave = function() {
    var f = this.querySelectorAll("ul");
    f[0].style.display = "none";
  }
}

}

document.getElementById("mais").onclick = function() {
  var ad = document.getElementById('adicionais');
  if (ad.style.display === "" || ad.style.display === "none") {
    ad.style.display = "block";
  } else {
    ad.style.display = "none";
  }

  document.getElementById("adicionais").classList.add("anima_adicionais");

};

function getLargura(id) {
  var mmmm = document.getElementById(id);

  var liOut = mmmm.querySelectorAll("ul");

  for (var i=0; i< liOut.length; i++) {
    liOut[i].style.right = "0";
  }

}

</script>

<style>

#nav-smmenu {
 position: relative;
 background-color: skyblue;
}

#nav-smmenu > ul a {
  text-decoration: none;
  color: white;
  border-right: 0px dotted lightblue;
}

#nav-smmenu > ul a:hover {
  background-color: transparent;
  color: lightblue;
}

#nav-smmenu > ul ul a {
  text-decoration: none;
  color: white;
}

#nav-smmenu > ul ul a:hover {
  font-style: italic;
  background-color: transparent;
  color: lightblue;
}

#nav-smmenu ul {
  list-style: none;
  margin: 0;
  padding: 0;
}

#nav-smmenu > ul {
  display: block;
  justify-content: center;
  align-items: center;
  align-content: center;
}

#nav-smmenu > ul li {
  margin: 0;
  box-sizing: border-box;
  margin-right: 1px;
}

#nav-smmenu > ul  li a {
  display: block;
  padding: 10px;
  background-color: transparent;
  text-transform: uppercase;
  color: white;
}

#nav-smmenu > ul > li ul a {
  display: block;
  padding: 5px 20px;
  background-color: black;
  color: white
}

#nav-smmenu > ul > li ul ul a {
  background-color: skyblue;
}

#nav-smmenu > ul > li ul ul ul a {
  background-color: black;
}

#nav-smmenu > ul > li ul ul ul ul a {
  background-color: skyblue;
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
  border-left: 4px solid lightblue;
  border-right: 4px solid transparent;
  position: absolute;
  top: 4px;
  right: 2px;
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

@media (min-width: 550px) {

  #nav-smmenu {
    background-color: black;
    padding: 20;
    padding-top: 25px;
    margin-bottom: 10px;
    margin-right: 0;
  }

  #nav-smmenu > ul {
  display: flex;
    align-items: flex-end;
    align-content: flex-end;
    justify-content: flex-end;
    flex-wrap: wrap;
    margin: 0 auto;
  }

  #nav-smmenu > ul li a {
    color: white;
    border-right: 0px solid gray;
    line-height: 12px;
    padding: 0 15px;
  }

  #nav-smmenu ul ul li a {
    padding: 10px 15px;
    color: lightblue;
    border: 0;
  }

  #nav-smmenu ul ul li a:hover {
    padding: 10px 15px;
    background-color: #222;
    color: white;
  }

#smmenu > li > a:not(:only-child):before {
  content: "";
  border-top: 3px solid transparent;
  border-bottom: 3px solid transparent;
  border-left: 3px solid lightblue;
  border-right: 3px solid transparent;
  position: absolute;
  top: 5px;
  right: 1px;
}

  #nav-smmenu > ul ul {
    position: absolute;
  }

  #nav-smmenu > ul ul ul {
    position: absolute;
    background-color: black;
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
  background-color: skyblue;
  z-index: 99999;
}

#adicionaisinst li > a:not(:only-child) {
  border-bottom: 4px solid skyblue;
  background-color: green;
}

#adicionaisinst li > a:not(:only-child):before {
  content: "";
  border-top: 4px solid lightblue;
  border-bottom: 4px solid transparent  ;
  border-left: 4px solid transparent;
  border-right: 4px solid transparent;
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
  direction: block;
  white-space: pre-line!important;
}

#nav-smmenu ul ul li  {
  border-top: 0px solid white;
}

}

#nav-smmenu > ul li:hover ul{
  animation-name: anima_smmenu;
  animation-duration: 0.5s;
  animation-timing-function: linear;
  animation-delay: 0;
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
  animation-delay: 0;
  animation-iteration-count: 1;
  animation-direction: alternate;
}

@keyframes anima_adicionais {
  from {top: 0; right: -30px; opacity: 0.1}
  to {top: 30px; right: 0; opacity: 1}
}

</style>

<script>

  var smmenu = document.getElementById("smmenu"); 
  var ul = smmenu.querySelectorAll("li");

  for (var i = 0; i < ul.length; i++) {
    ul[i].setAttribute("id", "minst"+i+"");

    if(window.matchMedia("(min-width: 550px)").matches) {
      ul[i].setAttribute("onmouseover", "exibirinst('minst" +i+ "')");
    } else {
      ul[i].setAttribute("onclick", "exibirinst('minst" +i+ "')");
    }

  }

  /* VIEW LIs HIDDEN */
  function exibirinst(id) {
    var m = document.getElementById(id);
    var x = m.querySelectorAll("ul");

    var ulul = m.querySelectorAll("ul ul");
    for (var i = ulul.length - 1; i >= 0; i--) {

      if(i>=0) {
        if(ulul[0].style.display === '' || ulul[0].style.display === 'none')  { 
          ulul[0].style.display="block";
        } 
        var a = m.querySelectorAll("a");

if(window.matchMedia("(max-width: 550px)").matches) {
        a[0].setAttribute("href", "javascript: void(0)");
      }

        a[0].setAttribute("ondblclick", "ocultar1('" +id+ "')");
      }
    }
  }
  /* HIDE LIs */
  function ocultar1(id) {
    var y = document.getElementById(id);
    var xx = y.querySelectorAll("ul");
    xx[0].style.display = "";
  }

  var tela = window.matchMedia("(max-width: 550px)");
  var wtela = window.innerWidth - 100;
  var outerWidth = 0;
  var topo = 40;
  var countinst = 0;
  var xxxxx=0;

  /* CALC WIDTH LIs AND HIDDEN THEN */
  if (!tela.matches) {
    var ul = document.querySelectorAll("#nav-smmenu > ul > li");
    for (var i = 0; i < ul.length; i++) {
      outerWidth += ul[i].clientWidth;
      if(outerWidth > wtela) {
        countinst++;
        var fragment = document.createDocumentFragment();
        document.querySelector('#adicionaisinst ul').appendChild(ul[i]);
      }
    }

    if(countinst>0) {
     document.querySelector('#maisinst').style.display="block";
     document.querySelector('#maisinst').innerHTML = "+ " + countinst;
   }

   /* CLOSE  ULs OPENED */
   var ss = document.querySelectorAll("#nav-smmenu ul ul");
   var sss = document.querySelectorAll("#nav-smmenu > ul li");

   for(var o = 0; o < ss.length; o++) {
     ss[o].onmouseleave = function() {
      ss[o].style.display = "none";
    }
  }

  for(var oo = 0; oo < sss.length; oo++) {
   sss[oo].onmouseleave = function() {
    var f = this.querySelectorAll("ul");
    f[0].style.display = "none";
  }
}

}

document.getElementById("maisinst").onclick = function() {

  var ad = document.getElementById('adicionaisinst');
  if (ad.style.display === "" || ad.style.display === "none") {
    ad.style.display = "block";
  } else {
    ad.style.display = "none";
  }

  document.getElementById("adicionaisinst").classList.add("anima_adicionaisinst");

};

</script>
