<?php

$telefones = str_replace("<p>", "<p><span itemprop='telephone'>", $destaques_fixos["telefones_rodape"]);
$telefones = str_replace("</p>", "</span></p>", $telefones);

$endereco = str_replace("[nome:", "<span itemprop='name'>", $destaques_fixos["enderecos_rodape"]);
$endereco = str_replace("[endereco:", "<br><span itemprop='streetAddress'>", $endereco);
$endereco = str_replace("[cidade:", "<br><span itemprop='addressLocality'>", $endereco);
$endereco = str_replace("[estado:", " - <span itemprop='addressRegion'>", $endereco);
$endereco = str_replace("[cep:", " - <span itemprop='postalCode'>", $endereco);
$endereco = str_replace("]", "</span>", $endereco);

$cnt_endereco = "<div itemprop='address' itemscope itemtype='http://schema.org/PostalAddress'>";
$cnt_endereco .= $endereco;
$cnt_endereco .= "</div>";
?>


<footer>

  <div class="rodape row">
    <div class="three columns a">
      <a id="logo-rodape" href="/" title="<?php echo $GLOBALS['sitename'] ?>"><img id="logo-rodape" src="<?php echo myUrl("./imagens/logo_rodape.png")?>" alt="<?php echo $GLOBALS['sitename'] ?>" width="300" height="100" title="<?php echo $GLOBALS['sitename'] ?>"></a>
    </div>
    <div class="six columns b">
      <div class="descricao_rodape">
        <?php echo $destaques_fixos["descricao_rodape"] ?>
      </div>
      <div class="endereco_rodape">
        <?php echo $cnt_endereco ?>
      </div> 
    </div>
    <div class="three columns c">
      <div class="rtels" itemscope itemtype="http://schema.org/EducationalOrganization">
        <?php echo $telefones; ?>
      </div>
      <div class="rsociais">
        <?php echo $destaques_fixos["redesSociais_rodape"] ?>
      </div>
    </div>
  
 </div>


</footer>

<div id="whatsapp">
  <a href="javascript:void[0]">Whatsapp</a>
</div>


<div class="copyright">
  <?php 

  $ano = gmdate("Y");

  $copyright = "<a href='". $config_site[0]->dns  ."'>" . $config_site[0]->marca . " - " . $config_site[0]->dns . " - " . $ano . " Todos os direitos reservados</a>";

  echo $copyright;
  ?>

</div>

<style>

.descricao_rodape {
  color: white;
  font-family: 'Kaushan Script', cursive;
  font-size: 30px;
  line-height: 30px;
  margin-bottom: 20px;
}

footer {
  background: orangered;
  color: white;
  padding: 50px 15px;
}

footer a {
  color: white;
}

.rodape {
  padding: 15px;
}

.rodape .b {
  text-align: center;
}

#logo-rodape {
  max-width: 100px;
  height: auto;
}

#compartilhe {
      /*bottom: 0;
      right: 0;
      position: fixed;*/
      margin: 20px auto;
      width: 100%;
      max-width: 300px;
      text-align: center;
      display: flex;
      align-content: center;
      align-items: center;
      justify-content: center;
      flex-wrap: wrap;
    }


    #whatsapp {
      position: fixed;
      bottom: 15px;
      right: 0;
      z-index: 99999;
      display: none;
    }

    #whatsapp a {
      position: relative;
      font-size: 12px;
      color: transparent;
      text-transform: uppercase;
    }

    #whatsapp a:after {
      content: "";
      padding: 5px 10px;
      padding-right: 30px;
      position: absolute;
      color: green!important;
      background: transparent;
      top: -3px;
      right:  0;
      width: 120px;
      -webkit-animation-name: flash;
      animation-name: flash;
      -webkit-animation-duration: 2s;
      animation-duration: 2s;
      -webkit-animation-fill-mode: both;
      animation-fill-mode: both;  
      animation-iteration-count: infinite;

    }

    #whatsapp a:before {
      content: "";
      position: absolute;
      width: 30px;
      height: 30px;
      right: 0;
      top: 50%;
      margin-top: -10px;
      background-image: url("data:image/svg+xml,%3C%3Fxml version='1.0' encoding='UTF-8'%3F%3E%3C!DOCTYPE svg PUBLIC '-//W3C//DTD SVG 1.1//EN' 'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd'%3E%3Csvg xmlns='http://www.w3.org/2000/svg' xml:space='preserve' width='100%25' height='100%25' style='shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd'%0AviewBox='0 0 2.50002 2.50002' xmlns:xlink='http://www.w3.org/1999/xlink'%3E%3Cdefs%3E%3Cstyle type='text/css'%3E%3C!%5BCDATA%5B .fil0 %7Bfill:none%7D .whatsapp %7Bfill: green%7D %5D%5D%3E%3C/style%3E%3C/defs%3E%3Cg id='Capa_x0020_1'%3E%3Cmetadata id='CorelCorpID_0Corel-Layer'/%3E%3Crect class='fil0' width='2.50002' height='2.50002'/%3E%3Cpath id='WhatsApp' class='whatsapp' d='M2.44063 1.21934c0,0.64064 -0.52332,1.15996 -1.16898,1.15996 -0.20497,0 -0.39754,-0.05239 -0.56507,-0.14433l-0.64719 0.20566 0.21101 -0.62235c-0.10644,-0.17478 -0.16775,-0.37978 -0.16775,-0.59894 -1e-005,-0.64063 0.52337,-1.15995 1.169,-1.15995 0.64572,0 1.16898,0.51932 1.16898,1.15995zm-1.16898 -0.97522c-0.54197,0 -0.98282,0.43749 -0.98282,0.97523 0,0.21339 0.06956,0.411 0.18722,0.57176l-0.12279 0.36219 0.37769 -0.12004c0.15518,0.10189 0.34107,0.16132 0.54073,0.16132 0.54189,0 0.98282,-0.43744 0.98282,-0.97517 0,-0.53773 -0.4409,-0.97529 -0.98285,-0.97529zm0.59031 1.24237c-0.00722,-0.01183 -0.0263,-0.01897 -0.05493,-0.03318 -0.02868,-0.01421 -0.1696,-0.08303 -0.19579,-0.09247 -0.02627,-0.00947 -0.04543,-0.01423 -0.06451,0.01421 -0.01908,0.02847 -0.074,0.09247 -0.09075,0.11144 -0.01672,0.01902 -0.03342,0.0214 -0.0621,0.00717 -0.02863,-0.01421 -0.12094,-0.04426 -0.2304,-0.1411 -0.08517,-0.07535 -0.14269,-0.16838 -0.15941,-0.19688 -0.0167,-0.02844 -0.00175,-0.04382 0.01257,-0.05797 0.01291,-0.01275 0.02868,-0.03321 0.04299,-0.04979 0.01437,-0.01662 0.01913,-0.02844 0.02863,-0.04744 0.0096,-0.01897 0.00482,-0.03556 -0.00238,-0.04982 -0.00714,-0.01421 -0.06451,-0.15412 -0.08837,-0.21106 -0.02387,-0.05689 -0.0477,-0.04741 -0.06445,-0.04741 -0.0167,0 -0.03582,-0.00238 -0.05493,-0.00238 -0.0191,0 -0.05017,0.00712 -0.07644,0.03556 -0.02625,0.02847 -0.10025,0.09726 -0.10025,0.23715 0,0.13991 0.10263,0.27509 0.117,0.29403 0.01431,0.01894 0.19817,0.31538 0.48948,0.42923 0.29134,0.1138 0.29134,0.07583 0.34389,0.07107 0.05249,-0.00474 0.16949,-0.06877 0.19346,-0.13512 0.02381,-0.06647 0.02381,-0.12338 0.01669,-0.13524z'/%3E%3C/g%3E%3C/svg%3E%0A");  background-position: center;
      background-repeat: no-repeat;
      background-size: 100%;
      z-index: 9;
    }

    #voltar-topo {
      position: fixed;
      bottom: 0;
      right: 50px;
      cursor: pointer;
      z-index: 9999;
      display: block;
      cursor: pointer;
      font-size: 0;
    }

    #voltar-topo:before {
      content: "";
      position: absolute;
      border-top: 3px solid skyblue;
      border-bottom: 3px solid transparent;
      border-left: 3px solid transparent;
      border-right: 3px solid skyblue;
      top: 10px;
      left: 8px;
      padding: 8px;
      transform: rotate(-45deg);
    }

    .copyright {
      padding: 5px 15px;
      font-size: 12px;
      text-align: center;
    }

    .copyright a {
      font-size: 12px;
      color: black;
      text-decoration: none;
    }


    .endereco_rodape{

      margin-bottom: 10px;

    }
    /*tels*/

    .rtels, .rsociais {
      align-items: center;
      justify-content: center;
      align-content: center;
      margin-bottom: 20px;
    }

    .rtels a {
      font-size: 0.8em;
    }
    .rtels p {
      width: 100%;
      margin:  0;
      line-height: 0.8em;
      display: block;
      margin-bottom: 10px;
    }

    .rtels a {
      position: relative;
      padding-left: 20px;
      color: white;
    }

    .rtels a:before {
      content: "";
      position: absolute;
      top: 2px;
      left: 0;
      padding: 6px;
      background-position: center;
      background-repeat: no-repeat;
      background-size: 100%;
      background-image: url("data:image/svg+xml,%3C%3Fxml version='1.0'%3F%3E%3Csvg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' version='1.1' id='Layer_1' x='0px' y='0px' viewBox='0 0 512 512' style='enable-background:new 0 0 512 512;' xml:space='preserve' width='512px' height='512px'%3E%3Cg%3E%3Cg%3E%3Cg%3E%3Cpath d='M453.202,386.293L378.52,311.61c-15.546-15.544-40.751-15.562-56.314,0l-21.75,21.75 c-49.696-30.349-91.448-72.101-121.798-121.798l23.848-23.847c15.524-15.526,15.524-40.789-0.001-56.315l-74.682-74.682 c-15.502-15.5-40.671-15.644-56.361,0.047l-46.93,47.295C2.078,122.914-5.82,153.87,4.42,183.209 c52.546,150.577,173.814,271.844,324.39,324.39c28.33,9.884,57.422,2.492,75.919-16.565c0.267-0.236,0.528-0.48,0.783-0.736 l47.69-47.691C468.728,427.082,468.728,401.82,453.202,386.293z M429.412,418.817L382.8,465.429 c-0.569,0.472-1.107,0.985-1.613,1.535c-9.811,10.665-25.594,14.347-41.29,8.867C198.919,426.636,85.384,313.1,36.188,172.121 c-5.633-16.141-1.569-32.864,10.354-42.605c0.453-0.37,0.887-0.764,1.299-1.179l47.459-47.829 c1.573-1.574,3.412-1.809,4.367-1.809c0.956,0,2.793,0.234,4.367,1.809l74.68,74.682c2.408,2.408,2.408,6.325,0.001,8.733 l-33.043,33.043c-5.341,5.34-6.468,13.583-2.758,20.161c35.858,63.569,88.409,116.122,151.978,151.977 c6.577,3.711,14.82,2.582,20.161-2.757l30.945-30.945c2.409-2.409,6.32-2.412,8.733,0l74.682,74.682 C431.819,412.492,431.819,416.41,429.412,418.817z' data-original='%23000000' class='active-path' data-old_color='%23000000' fill='%23ffffff'/%3E%3C/g%3E%3C/g%3E%3Cg%3E%3Cg%3E%3Cpath d='M268.902,131.332c-9.291,0-16.823,7.532-16.823,16.823c0,9.291,7.531,16.823,16.823,16.823 c43.086,0,78.139,35.053,78.139,78.139c0,9.291,7.532,16.823,16.823,16.823s16.823-7.532,16.823-16.823 C380.687,181.479,330.54,131.332,268.902,131.332z' data-original='%23000000' class='active-path' data-old_color='%23000000' fill='%23ffffff'/%3E%3C/g%3E%3C/g%3E%3Cg%3E%3Cg%3E%3Cpath d='M268.902,65.304c-9.291,0-16.823,7.532-16.823,16.823s7.531,16.823,16.823,16.823 c79.494,0,144.167,64.673,144.167,144.167c0,9.291,7.532,16.823,16.823,16.823s16.823-7.532,16.823-16.823 C446.715,145.071,366.948,65.304,268.902,65.304z' data-original='%23000000' class='active-path' data-old_color='%23000000' fill='%23ffffff'/%3E%3C/g%3E%3C/g%3E%3Cg%3E%3Cg%3E%3Cpath d='M440.799,71.22C394.884,25.305,333.835,0.019,268.901,0.019c-9.291,0-16.823,7.532-16.823,16.823 c0,9.291,7.532,16.823,16.823,16.823c115.494,0,209.454,93.96,209.454,209.453c0,9.291,7.532,16.823,16.823,16.823 c9.291,0,16.823-7.532,16.823-16.823C512,178.183,486.714,117.136,440.799,71.22z' data-original='%23000000' class='active-path' data-old_color='%23000000' fill='%23ffffff'/%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/svg%3E%0A");
    }

    .rtels a[href*="whatsapp"]:before {
      background-image: url("data:image/svg+xml,%3C%3Fxml version='1.0'%3F%3E%3Csvg xmlns='http://www.w3.org/2000/svg' height='512px' viewBox='0 0 512 512' width='512px' class=''%3E%3Cg%3E%3Cpath d='m435.921875 74.351562c-48.097656-47.917968-112.082031-74.3242182-180.179687-74.351562-67.945313 0-132.03125 26.382812-180.445313 74.289062-48.5 47.988282-75.234375 111.761719-75.296875 179.339844v.078125.046875c.0078125 40.902344 10.753906 82.164063 31.152344 119.828125l-30.453125 138.417969 140.011719-31.847656c35.460937 17.871094 75.027343 27.292968 114.933593 27.308594h.101563c67.933594 0 132.019531-26.386719 180.441406-74.296876 48.542969-48.027343 75.289062-111.71875 75.320312-179.339843.019532-67.144531-26.820312-130.882813-75.585937-179.472657zm-180.179687 393.148438h-.089844c-35.832032-.015625-71.335938-9.011719-102.667969-26.023438l-6.621094-3.59375-93.101562 21.175782 20.222656-91.90625-3.898437-6.722656c-19.382813-33.425782-29.625-70.324219-29.625-106.71875.074218-117.800782 96.863281-213.75 215.773437-213.75 57.445313.023437 111.421875 22.292968 151.984375 62.699218 41.175781 41.03125 63.84375 94.710938 63.824219 151.152344-.046875 117.828125-96.855469 213.6875-215.800781 213.6875zm0 0' data-original='%23000000' class='active-path' data-old_color='%23000000' fill='%23ffffff'/%3E%3Cpath d='m186.152344 141.863281h-11.210938c-3.902344 0-10.238281 1.460938-15.597656 7.292969-5.363281 5.835938-20.476562 19.941406-20.476562 48.628906s20.964843 56.40625 23.886718 60.300782c2.925782 3.890624 40.46875 64.640624 99.929688 88.011718 49.417968 19.421875 59.476562 15.558594 70.199218 14.585938 10.726563-.96875 34.613282-14.101563 39.488282-27.714844s4.875-25.285156 3.414062-27.722656c-1.464844-2.429688-5.367187-3.886719-11.214844-6.800782-5.851562-2.917968-34.523437-17.261718-39.886718-19.210937-5.363282-1.941406-9.261719-2.914063-13.164063 2.925781-3.902343 5.828125-15.390625 19.3125-18.804687 23.203125-3.410156 3.894531-6.824219 4.382813-12.675782 1.464844-5.851562-2.925781-24.5-9.191406-46.847656-29.050781-17.394531-15.457032-29.464844-35.167969-32.878906-41.003906-3.410156-5.832032-.363281-8.988282 2.570312-11.898438 2.628907-2.609375 6.179688-6.179688 9.105469-9.582031 2.921875-3.40625 3.753907-5.835938 5.707031-9.726563 1.949219-3.890625.972657-7.296875-.488281-10.210937-1.464843-2.917969-12.691406-31.75-17.894531-43.28125h.003906c-4.382812-9.710938-8.996094-10.039063-13.164062-10.210938zm0 0' data-original='%23000000' class='active-path' data-old_color='%23000000' fill='%23ffffff'/%3E%3C/g%3E%3C/svg%3E%0A");
    }

    /*sociais*/

    .rsociais a {
      font-size: 0.8em;
    }
    .rsociais p {
      width: 20px;
      margin:  0;
      line-height: 0.8em;
      display: inline-block;
      margin-right: 20px;
    }

    .rsociais a {
      width: 20px;
      height: 20px;
      position: relative;
      overflow: hidden;
      font-size: 0;
      display: inline-block;
    }

    .rsociais a:before {
      content: "";
      position: absolute;
      top: 3px;
      left: 0;
      padding: 8px;
      background-position: center;
      background-repeat: no-repeat;
      background-size: 100%;
    }

    .rsociais a[href*="facebook"]:before {
      background-image: url("data:image/svg+xml,%3C%3Fxml version='1.0'%3F%3E%3Csvg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' version='1.1' id='Layer_1' x='0px' y='0px' viewBox='0 0 455 455' style='enable-background:new 0 0 455 455;' xml:space='preserve' width='512px' height='512px' class=''%3E%3Cg%3E%3Cpath d='M0,0v455h455V0H0z M301.004,125.217H265.44 c-7.044,0-14.153,7.28-14.153,12.696v36.264h49.647c-1.999,27.807-6.103,53.235-6.103,53.235h-43.798V385h-65.266V227.395h-31.771 v-53.029h31.771v-43.356c0-7.928-1.606-61.009,66.872-61.009h48.366V125.217z' data-original='%23000000' class='active-path' data-old_color='%23%23%23F65C' fill='%23ffffff' /%3E%3C/g%3E%3C/svg%3E%0A");
    }

    .rsociais a[href*="linkedin"]:before {
      background-image: url("data:image/svg+xml,%3C%3Fxml version='1.0'%3F%3E%3Csvg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns:svgjs='http://svgjs.com/svgjs' version='1.1' width='512' height='512' x='0' y='0' viewBox='0 0 242.667 242.667' style='enable-background:new 0 0 512 512' xml:space='preserve' class=''%3E%3Cg%3E%3Cpath xmlns='http://www.w3.org/2000/svg' d='M0,0v242.667h242.667V0H0z M81.468,192.754H52.996V93.362h28.471V192.754z M67.513,82.028 c-9.55,0-17.319-7.204-17.319-16.058s7.77-16.058,17.319-16.058s17.319,7.204,17.319,16.058S77.062,82.028,67.513,82.028z M192.473,192.754h-29.172v-58.946c0.006-0.12,0.432-9.478-4.874-15.068c-2.641-2.783-6.279-4.194-10.814-4.194 c-11.408,0-17.17,8.214-19.612,13.189v65.019H99.529V93.362H128v8.397c9.32-7.561,19.787-11.55,30.335-11.55 c27.003,0,34.138,21.093,34.138,32.246V192.754z' fill='%23ffffff' data-original='%23000000' style='' class=''/%3E%3Cg xmlns='http://www.w3.org/2000/svg'%3E%3C/g%3E%3C/g%3E%3C/svg%3E%0A"); 
    }

    .rsociais a[href*="instagram"]:before {
      background-image: url("data:image/svg+xml,%3C%3Fxml version='1.0'%3F%3E%3Csvg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns:svgjs='http://svgjs.com/svgjs' version='1.1' width='512' height='512' x='0' y='0' viewBox='0 0 455.73 455.73' style='enable-background:new 0 0 512 512' xml:space='preserve' class=''%3E%3Cg%3E%3Cpath xmlns='http://www.w3.org/2000/svg' d='M227.86,182.55c-24.98,0-45.32,20.33-45.32,45.31c0,24.99,20.34,45.33,45.32,45.33c24.99,0,45.32-20.34,45.32-45.33 C273.18,202.88,252.85,182.55,227.86,182.55z M227.86,182.55c-24.98,0-45.32,20.33-45.32,45.31c0,24.99,20.34,45.33,45.32,45.33 c24.99,0,45.32-20.34,45.32-45.33C273.18,202.88,252.85,182.55,227.86,182.55z M303.36,108.66H152.37 c-24.1,0-43.71,19.61-43.71,43.71v150.99c0,24.1,19.61,43.71,43.71,43.71h150.99c24.1,0,43.71-19.61,43.71-43.71V152.37 C347.07,128.27,327.46,108.66,303.36,108.66z M227.86,306.35c-43.27,0-78.48-35.21-78.48-78.49c0-43.27,35.21-78.48,78.48-78.48 c43.28,0,78.49,35.21,78.49,78.48C306.35,271.14,271.14,306.35,227.86,306.35z M308.87,165.61c-10.24,0-18.57-8.33-18.57-18.57 s8.33-18.57,18.57-18.57s18.57,8.33,18.57,18.57S319.11,165.61,308.87,165.61z M227.86,182.55c-24.98,0-45.32,20.33-45.32,45.31 c0,24.99,20.34,45.33,45.32,45.33c24.99,0,45.32-20.34,45.32-45.33C273.18,202.88,252.85,182.55,227.86,182.55z M303.36,108.66 H152.37c-24.1,0-43.71,19.61-43.71,43.71v150.99c0,24.1,19.61,43.71,43.71,43.71h150.99c24.1,0,43.71-19.61,43.71-43.71V152.37 C347.07,128.27,327.46,108.66,303.36,108.66z M227.86,306.35c-43.27,0-78.48-35.21-78.48-78.49c0-43.27,35.21-78.48,78.48-78.48 c43.28,0,78.49,35.21,78.49,78.48C306.35,271.14,271.14,306.35,227.86,306.35z M308.87,165.61c-10.24,0-18.57-8.33-18.57-18.57 s8.33-18.57,18.57-18.57s18.57,8.33,18.57,18.57S319.11,165.61,308.87,165.61z M227.86,182.55c-24.98,0-45.32,20.33-45.32,45.31 c0,24.99,20.34,45.33,45.32,45.33c24.99,0,45.32-20.34,45.32-45.33C273.18,202.88,252.85,182.55,227.86,182.55z M0,0v455.73h455.73 V0H0z M380.23,303.36c0,42.39-34.48,76.87-76.87,76.87H152.37c-42.39,0-76.87-34.48-76.87-76.87V152.37 c0-42.39,34.48-76.87,76.87-76.87h150.99c42.39,0,76.87,34.48,76.87,76.87V303.36z M303.36,108.66H152.37 c-24.1,0-43.71,19.61-43.71,43.71v150.99c0,24.1,19.61,43.71,43.71,43.71h150.99c24.1,0,43.71-19.61,43.71-43.71V152.37 C347.07,128.27,327.46,108.66,303.36,108.66z M227.86,306.35c-43.27,0-78.48-35.21-78.48-78.49c0-43.27,35.21-78.48,78.48-78.48 c43.28,0,78.49,35.21,78.49,78.48C306.35,271.14,271.14,306.35,227.86,306.35z M308.87,165.61c-10.24,0-18.57-8.33-18.57-18.57 s8.33-18.57,18.57-18.57s18.57,8.33,18.57,18.57S319.11,165.61,308.87,165.61z M227.86,182.55c-24.98,0-45.32,20.33-45.32,45.31 c0,24.99,20.34,45.33,45.32,45.33c24.99,0,45.32-20.34,45.32-45.33C273.18,202.88,252.85,182.55,227.86,182.55z M227.86,182.55 c-24.98,0-45.32,20.33-45.32,45.31c0,24.99,20.34,45.33,45.32,45.33c24.99,0,45.32-20.34,45.32-45.33 C273.18,202.88,252.85,182.55,227.86,182.55z M227.86,182.55c-24.98,0-45.32,20.33-45.32,45.31c0,24.99,20.34,45.33,45.32,45.33 c24.99,0,45.32-20.34,45.32-45.33C273.18,202.88,252.85,182.55,227.86,182.55z M303.36,108.66H152.37 c-24.1,0-43.71,19.61-43.71,43.71v150.99c0,24.1,19.61,43.71,43.71,43.71h150.99c24.1,0,43.71-19.61,43.71-43.71V152.37 C347.07,128.27,327.46,108.66,303.36,108.66z M227.86,306.35c-43.27,0-78.48-35.21-78.48-78.49c0-43.27,35.21-78.48,78.48-78.48 c43.28,0,78.49,35.21,78.49,78.48C306.35,271.14,271.14,306.35,227.86,306.35z M308.87,165.61c-10.24,0-18.57-8.33-18.57-18.57 s8.33-18.57,18.57-18.57s18.57,8.33,18.57,18.57S319.11,165.61,308.87,165.61z M227.86,182.55c-24.98,0-45.32,20.33-45.32,45.31 c0,24.99,20.34,45.33,45.32,45.33c24.99,0,45.32-20.34,45.32-45.33C273.18,202.88,252.85,182.55,227.86,182.55z M227.86,182.55 c-24.98,0-45.32,20.33-45.32,45.31c0,24.99,20.34,45.33,45.32,45.33c24.99,0,45.32-20.34,45.32-45.33 C273.18,202.88,252.85,182.55,227.86,182.55z M227.86,182.55c-24.98,0-45.32,20.33-45.32,45.31c0,24.99,20.34,45.33,45.32,45.33 c24.99,0,45.32-20.34,45.32-45.33C273.18,202.88,252.85,182.55,227.86,182.55z M303.36,108.66H152.37 c-24.1,0-43.71,19.61-43.71,43.71v150.99c0,24.1,19.61,43.71,43.71,43.71h150.99c24.1,0,43.71-19.61,43.71-43.71V152.37 C347.07,128.27,327.46,108.66,303.36,108.66z M227.86,306.35c-43.27,0-78.48-35.21-78.48-78.49c0-43.27,35.21-78.48,78.48-78.48 c43.28,0,78.49,35.21,78.49,78.48C306.35,271.14,271.14,306.35,227.86,306.35z M308.87,165.61c-10.24,0-18.57-8.33-18.57-18.57 s8.33-18.57,18.57-18.57s18.57,8.33,18.57,18.57S319.11,165.61,308.87,165.61z M227.86,182.55c-24.98,0-45.32,20.33-45.32,45.31 c0,24.99,20.34,45.33,45.32,45.33c24.99,0,45.32-20.34,45.32-45.33C273.18,202.88,252.85,182.55,227.86,182.55z' fill='%23ffffff' data-original='%23000000' style='' class=''/%3E%3Cg xmlns='http://www.w3.org/2000/svg'%3E%3C/g%3E%3C/g%3E%3C/svg%3E%0A"); 
    }

    .rsociais a[href*="youtube"]:before {
      background-image: url("data:image/svg+xml,%3C%3Fxml version='1.0'%3F%3E%3Csvg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' version='1.1' id='Layer_1' x='0px' y='0px' viewBox='0 0 512 512' style='enable-background:new 0 0 512 512;' xml:space='preserve' width='512px' height='512px' class=''%3E%3Cg%3E%3Cpath style='fill:%23de1319' d='M506.703,145.655c0,0-5.297-37.959-20.303-54.731c-19.421-22.069-41.49-22.069-51.2-22.952 C363.697,62.676,256,61.793,256,61.793l0,0c0,0-107.697,0.883-179.2,6.179c-9.71,0.883-31.779,1.766-51.2,22.952 C9.71,107.697,5.297,145.655,5.297,145.655S0,190.676,0,235.697v41.49c0,45.021,5.297,89.159,5.297,89.159 s5.297,37.959,20.303,54.731c19.421,22.069,45.021,21.186,56.497,23.835C122.703,449.324,256,450.207,256,450.207 s107.697,0,179.2-6.179c9.71-0.883,31.779-1.766,51.2-22.952c15.007-16.772,20.303-54.731,20.303-54.731S512,321.324,512,277.186 v-41.49C512,190.676,506.703,145.655,506.703,145.655' data-original='red' class='active-path' data-old_color='red'/%3E%3Cpolygon style='fill:%23FFFFFF' points='194.207,166.841 194.207,358.4 361.931,264.828 ' data-original='%23FFFFFF' class='' data-old_color='%23FFFFFF'/%3E%3C/g%3E%3C/svg%3E%0A"); 
    }

    @media (min-width: 768px) {

      .icones-topo {
        display: none;
      }

      .rtels {
        display: flex;
        flex-wrap: wrap;
        align-items: flex-end;
        align-content: flex-end;
        justify-content: flex-end;
        width: auto;
      }

      .rtels p {
        width: 100%;
        display: block;
        margin: 5px 0;
        line-height: 0.8em;
        margin-left: 20px;
        text-align: right;
      }

      .rsociais {
        display: flex;
        flex-wrap: nowrap;
        align-items: flex-end;
        align-content: flex-end;
        justify-content: flex-end;
        width: auto;
      }

      .rsociais p {
        width: auto;
        display: inline-block;
        margin: 5px 0;
        line-height: 0.8em;
        margin-left: 20px;
      }

    }

  </style>
