<style>

@font-face {
  font-family: 'Barlow';
  font-style: normal;
  font-weight: 400;
  src: url('<?php echo myurl("app/views/tao")?>/fonts/barlow-v3-latin-regular.eot'); /* IE9 Compat Modes */
  src: local('Barlow Regular'), local('Barlow-Regular'),
  url('<?php echo myurl("app/views/tao")?>/fonts/barlow-v3-latin-regular.eot?#iefix') format('embedded-opentype'), /* IE6-IE8 */
  url('<?php echo myurl("app/views/tao")?>/fonts/barlow-v3-latin-regular.woff2') format('woff2'), /* Super Modern Browsers */
  url('<?php echo myurl("app/views/tao")?>/fonts/barlow-v3-latin-regular.woff') format('woff'), /* Modern Browsers */
  url('<?php echo myurl("app/views/tao")?>/fonts/barlow-v3-latin-regular.ttf') format('truetype'), /* Safari, Andr</styoid, iOS */
  url('<?php echo myurl("app/views/tao")?>/fonts/barlow-v3-latin-regular.svg#Barlow') format('svg'); /* Legacy iOS */
}

@font-face {
  font-family: 'Barlow';
  font-style: normal;
  font-weight: 600;
  src: url('<?php echo myurl("app/views/tao")?>/fonts/barlow-v3-latin-600.eot'); /* IE9 Compat Modes */
  src: local('Barlow SemiBold'), local('Barlow-SemiBold'),
  url('<?php echo myurl("app/views/tao")?>/fonts/barlow-v3-latin-600.eot?#iefix') format('embedded-opentype'), /* IE6-IE8 */
  url('<?php echo myurl("app/views/tao")?>/fonts/barlow-v3-latin-600.woff2') format('woff2'), /* Super Modern Browsers */
  url('<?php echo myurl("app/views/tao")?>/fonts/barlow-v3-latin-600.woff') format('woff'), /* Modern Browsers */
  url('<?php echo myurl("app/views/tao")?>/fonts/barlow-v3-latin-600.ttf') format('truetype'), /* Safari, Android, iOS */
  url('<?php echo myurl("app/views/tao")?>/fonts/barlow-v3-latin-600.svg#Barlow') format('svg'); /* Legacy iOS */
}

@font-face {
  font-family: 'Barlow';
  font-style: normal;
  font-weight: 800;
  src: url('<?php echo myurl("app/views/tao")?>/fonts/barlow-v3-latin-800.eot'); /* IE9 Compat Modes */
  src: local('Barlow ExtraBold'), local('Barlow-ExtraBold'),
  url('<?php echo myurl("app/views/tao")?>/fonts/barlow-v3-latin-800.eot?#iefix') format('embedded-opentype'), /* IE6-IE8 */
  url('<?php echo myurl("app/views/tao")?>/fonts/barlow-v3-latin-800.woff2') format('woff2'), /* Super Modern Browsers */
  url('<?php echo myurl("app/views/tao")?>/fonts/barlow-v3-latin-800.woff') format('woff'), /* Modern Browsers */
  url('<?php echo myurl("app/views/tao")?>/fonts/barlow-v3-latin-800.ttf') format('truetype'), /* Safari, Android, iOS */
  url('<?php echo myurl("app/views/tao")?>/fonts/barlow-v3-latin-800.svg#Barlow') format('svg'); /* Legacy iOS */
}

html {
  font-size: 52.5%; }
  body {
    font-size: 1.5em; 
    line-height: 1.6em;
    font-family: 'Barlow';   
    font-weight: 400;
    color: #333; 
    padding: 0;
    margin: 0;
  }

  p {
    margin-top: 0; }

    * {
      box-sizing: border-box;
    }

/* Links
–––––––––––––––––––––––––––––––––––––––––––––––––– */
a {
  color: black;
  text-decoration: none; }
  a:hover {
    color: #0FA0CE; }

    h1 {font-size: 1.6em;font-weight: normal; padding-bottom: 5px; border-bottom: 1px solid skyblue;}
    h2 {font-size: 1.4em;font-weight: normal;color: dimgray}
    h3 {font-size: 1.2em;font-weight: normal;color: dimgray}
/* Buttons
–––––––––––––––––––––––––––––––––––––––––––––––––– */
.button,
button,
input[type="submit"],
input[type="reset"],
input[type="button"] {
  display: inline-block;
  text-align: center;
  padding: 0 10px;
  height: 30px;
  border-radius: 4px;
  background: #5499C7;
  border: 1px solid #5499C7;
  margin: 0 2px;
  font-size: 12px;
  letter-spacing: 1px;
  color: white;
  text-transform: uppercase;
  line-height: 30px;
}

.button:hover,
button:hover,
input[type="submit"]:hover,
input[type="reset"]:hover,
input[type="button"]:hover,
.button:focus,
button:focus,
input[type="submit"]:focus,
input[type="reset"]:focus,
input[type="button"]:focus {
  color: white;
  border-color: #888;
  background-color: black!important;
  outline: 0; }
  .button.button-primary,
  button.button-primary,
  input[type="submit"].button-primary,
  input[type="reset"].button-primary,
  input[type="button"].button-primary {
    color: #FFF;
    background-color: #33C3F0;
    border-color: #33C3F0; }
    .button.button-primary:hover,
    button.button-primary:hover,
    input[type="submit"].button-primary:hover,
    input[type="reset"].button-primary:hover,
    input[type="button"].button-primary:hover,
    .button.button-primary:focus,
    button.button-primary:focus,
    input[type="submit"].button-primary:focus,
    input[type="reset"].button-primary:focus,
    input[type="button"].button-primary:focus {
      color: #FFF;
      background-color: #1EAEDB;
      border-color: #1EAEDB; }

      .success {
        background: #1C9D58;
      }

      .button-excluir {
        padding: 10px;
        border: 1px solid red;
        border-radius: 4px;
        background-color: aliceblue;
        margin: 0 2px;
        font-size: 12px;
        text-transform: uppercase;
        color: red;
      }
      .button-excluir:hover {
        padding: 10px;
        border: 1px solid red;
        border-radius: 4px;
        background-color: red;
        margin: 0 2px;
        font-size: 12px;
        text-transform: uppercase;
        color: white;
      }

      .cnt-botoes {
        display: block;
        width: 100%;
        margin: 5px 0;
        display: flex;
        align-items: center;
        align-content: center;
        justify-content: flex-start;
        flex-wrap: wrap;
        padding: 0 5px;
        border: 1px solid lightblue;
      }

      .button-vazado {
        padding: 2px 15px;
        border: 1px solid skyblue;
        border-radius: 4px;
        background-color: lightblue;
        margin: 0 2px;
        font-size: 12px;
        text-transform: uppercase;
        display: inline-block;
        margin: 1px;
        border: 5px solid skyblue;  
      }

      .button-vazado:hover {
        border: 5px solid #cae1ff;
        background-color: white!important;
      }

      .button-secundario {
        border: 1px solid skyblue;
        border-radius: 4px;
        background-color: lightblue;
        margin: 0 1px;
        padding: 2px 15px;
        font-size: 12px;
        text-transform: uppercase;
        display: inline-block;
        margin: 1px;
        border: 5px solid skyblue;  
        color: black;
      }

      .button-secundario:hover {
        border: 5px solid #cae1ff;
        background-color: white!important;
      }

      .button-link {
        padding: 0;
        margin: 0 10px;
        font-size: 12px;
        width: auto;
        color: #5499C7;
      }


/* Forms
–––––––––––––––––––––––––––––––––––––––––––––––––– */
input[type="email"],
input[type="number"],
input[type="search"],
input[type="text"],
input[type="tel"],
input[type="url"],
input[type="password"],
textarea,
select {
  width: 100%;
  height: 28px;
  padding: 0;
  background-color: white;
  border:  1px solid transparent;  
  box-shadow: none;
  box-sizing: border-box; 
  border-radius: 4px;
  color: blue;
}

input[type="email"]:hover,
input[type="number"]:hover,
input[type="search"]:hover,
input[type="text"]:hover,
input[type="tel"]:hover,
input[type="url"]:hover,
input[type="password"]:hover,
textarea:hover,
select:hover {
  border: 1px solid skyblue;
}


/* Removes awkward default styles on some inputs for iOS */
input[type="email"],
input[type="number"],
input[type="search"],
input[type="text"],
input[type="tel"],
input[type="url"],
input[type="password"],
textarea {
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none; }
  textarea {
    width: 100%;
    min-height: 65px;
    padding-top: 6px;
    padding-bottom: 6px; }
    input[type="email"]:focus,
    input[type="number"]:focus,
    input[type="search"]:focus,
    input[type="text"]:focus,
    input[type="tel"]:focus,
    input[type="url"]:focus,
    input[type="password"]:focus,
    textarea:focus,
    select:focus {
      border: 1px solid #33C3F0;
      outline: 0; }
      label,
      legend {
        display: block;
        margin-bottom: .5rem;
        font-weight: 400; }
        fieldset {
          padding: 0;
          border-width: 0; }
          input[type="checkbox"],
          input[type="radio"] {
            display: inline; }
            label > .label-body {
              display: inline-block;
              margin-left: .5rem;
              font-weight: normal; }

              fieldset {
                background-color: transparent;
                padding: 15px;
                border: 1px solid silver;
              }

              select {
                background: aliceblue;
              }

              label {
                color: #5499C7;
                font-weight: 400;
                font-size: 10px;
                line-height: 10px;
                margin-top: 10px;
                width: 100%;
              }



/* Lists
–––––––––––––––––––––––––––––––––––––––––––––––––– */
ul {
  list-style: circle inside; }
  ol {
    list-style: decimal inside; }
    ol, ul {
      padding-left: 0;
      margin-top: 0; }
      ul ul,
      ul ol,
      ol ol,
      ol ul {
        margin: 1.5rem 0 1.5rem 3rem;
        font-size: 90%; }
        li {
          margin-bottom: 1rem; }


/* Code
–––––––––––––––––––––––––––––––––––––––––––––––––– */
code {
  padding: .2rem .5rem;
  margin: 0 .2rem;
  font-size: 90%;
  white-space: nowrap;
  background: #F1F1F1;
  border: 1px solid #E1E1E1;
  border-radius: 4px; }
  pre > code {
    display: block;
    padding: 1rem 1.5rem;
    white-space: pre; }


/* Tables
–––––––––––––––––––––––––––––––––––––––––––––––––– */
th,
td {
  padding: 5px 10px;
  text-align: left;
  border-bottom: 1px solid lightblue}
  th:first-child,
  td:first-child {
    borderleft: 1px dotted lightblue;
  }
}
th:last-child,
td:last-child {
  padding-right: 0; }

  th {
    background-color: white;
    text-align: center;
    font-weight: normal;
    text-transform: uppercase;
    font-size: 12px;
    font-weight: 600;
    border-top: 1px solid #5499C7;
    border-bottom: 1px solid #5499C7;
  }


/* Spacing
–––––––––––––––––––––––––––––––––––––––––––––––––– */
button,
.button {
  margin-bottom: 1rem; }
  input,
  textarea,
  select,
  fieldset {
    margin-bottom: 1px; }
    pre,
    blockquote,
    dl,
    figure,
    table,
    p,
    ul,
    ol,
    form {
      margin-bottom: 2.5rem; }


      thead th {
        border: 1px solid silver;
        background:  aliceblue;
      }

            table td {
        border: 1px solid silver;
      }

/* Utilities
–––––––––––––––––––––––––––––––––––––––––––––––––– */
.u-full-width {
  width: 100%;
  box-sizing: border-box; }
  .u-max-full-width {
    max-width: 100%;
    box-sizing: border-box; }
    .u-pull-right {
      float: right; }
      .u-pull-left {
        float: left; }


/* Misc
–––––––––––––––––––––––––––––––––––––––––––––––––– */
hr {
  margin-top: 3rem;
  margin-bottom: 3.5rem;
  border-width: 0;
  border-top: 1px solid #E1E1E1; }


/* Clearing
–––––––––––––––––––––––––––––––––––––––––––––––––– */

/* Self Clearing Goodness */
.container:after,
.row:after,
.u-cf {
  content: "";
  display: table;
  clear: both; }

  table {
    width: 100%;
  }
  table {
   border-spacing: 0;
 }

 .painel {
  width: 100%;
  display: flex;
  align-items: center;
  align-content: center;
  justify-content: center;
  background-color: aliceblue;
  margin-top: 0;
  flex-wrap: wrap;
}
.painel .p-a {
  width: 100%;
  padding: 0;
  background-color: aliceblue;
}

.painel .p-b {
  width: 100%;
  background-color: white;
}


header .painel {
  border: 0;
  position: fixed;
  width: 100%;
  z-index: 1;
  top: 0;
  padding-top: 0;
}

.painel {
  padding-top: 44px;
}

header .painel .p-a {
  border: 0;
  background-color: transparent;
}

header .painel .p-b {
  border: 0;
  background-color: transparent;
}

header .painel .p-c {
  border: 0;
}

.painel .p-c {
  width: 100%;
  border-left: 1px solid #cae1ff;
}

.painel > div{
  padding: 10px;
  box-sizing: border-box;
}

header .painel > div{
  padding: 0;
  box-sizing: border-box;
}


.painel {
  width: 100%;
  display: flex;
  align-items: stretch;
  align-content: stretch;
  justify-content: center;
  background-color: aliceblue;
  margin-top: 0;
  flex-wrap: wrap;
}

.painel .p-a {
  width: 100%;
  padding: 0;
  background-color: aliceblue;

}

.painel .p-b {
  width: 100%;
  background-color: white;
}

header .painel {
  border: 0;
}

header .painel .p-a {
  border: 0;
  background-color: transparent;
}

header .painel .p-b {
  border: 0;
  background-color: transparent;
  color: white;
}

header .painel .p-c {
  border: 0;
}

.painel .p-c {
  width: 100%;
  border-left: 1px solid #cae1ff;
}

.cnt-upload-imagem {
  position: fixed;
  background-color: #5499C7;
  z-index: 99999;
  width: 100%;
  max-width: 250px;
  left: 50%;
  top: 60px;
  margin-left: -125px;
  border: 1px solid #5499C7;
  padding: 20px;
  color: white;
  display: none;
  box-shadow: -3px 3px 3px -1px rgba(153,153,153,0.75);
  -webkit-box-shadow: -3px 3px 3px -1px rgba(153,153,153,0.75);
  -moz-box-shadow: -3px 3px 3px -1px rgba(153,153,153,0.75);

}

.cnt-upload-imagem h3 {
  color: white;
}

.cnt-upload-imagem a {
  color: white;
}
.cnt-upload-imagem p {
  color: white;
}
.cnt-upload-imagem label {
  color: white;
}

.cnt-upload-imagem #picture {
  min-height: 100px;
  background-image: url(../../imagens/semimagem.jpg);
}

#uploader {
  width: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  align-content: center;
  flex-wrap: wrap;
  box-sizing: border-box;
  margin-bottom: 20px;
  overflow: hidden;
}

#uploader p {
  text-align: center;
  width: 100%;
  margin: 0;
}

#uploader img {
  width: 100%;
  margin: 0 auto;
  display: block;
  height: auto!important;
  border: 1px solid silver;
}

#uploader-descricao {
  width: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  align-content: center;
  flex-wrap: wrap;
  box-sizing: border-box;
  margin-bottom: 20px;
  overflow: hidden;
}

#uploader-descricao p {
  text-align: center;
  width: 100%;
  margin: 0;
}

#uploader-descricao img {
  width: 100%;
  margin: 0 auto;
  display: block;
  height: auto!important;
  border: 1px solid silver;
}

#upload2 {
  width: 100%;
}

#uploader {
  position: relative;
}

#loader {
  position: absolute;
  display: none;
 border: 15px solid black; 
  border-right: 15px solid red; 
  border-top: 15px solid gold; 
  border-bottom: 15px solid dodgerblue; 
  width: 100px;
  height: 100px;
  border-radius: 50%;
  animation: spin 2s linear infinite;
  bottom: 50px;
  box-sizing: border-box;
}

#upload2-descricao {
  width: 100%;
}

#uploader-descricao {
  position: relative;
}

#loader-descricao {
  position: absolute;
  display: none;

 border: 15px solid black; 
  border-right: 15px solid red; 
  border-top: 15px solid gold; 
  border-bottom: 15px solid dodgerblue; 

  width: 100px;
  height: 100px;
  border-radius: 50%;
  animation: spin 2s linear infinite;
  bottom: 50px;
  box-sizing: border-box;
}


@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}


@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}


@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}


.fechar {
  font-size: 20px;  
  text-align: right;
  display: block;
}

.xxxxcnt-cnt-videos {
  display: none;
  position: absolute;
  top: 50%;
  left: 0;
  width: 100%;
  margin: 0 auto;
  background-color: #5499C7;
  color: white;
  z-index: 999999;
  box-sizing: border-box;
  border: 0;
  padding: 10px;
  padding-bottom: 30px;
}

.cnt-cnt-videos a {
  color: white;
  box-sizing: border-box;
}

#cnt-videos {
  width: 100%;
  overflow: hidden;
  box-sizing: border-box;
  text-align: center;
}

#cnt-videos input {
  width: 100%;
  max-width: 200px;
  box-sizing: border-box;
  display: block;
  font-size: 12px;
  margin: 0 auto;
}

#xcnt-videos .button {
  width: 100%;
  max-width: 200px;
  display: block;
  margin: 0 auto;
  color: black;
}

#form-ordem select {
  width: 100%;
  max-width: 150px;
}

.tabela-config td:first-child {
  text-align: center;
}

.tabela-modulos td:first-child {
  text-align: center;
}

.tabela-paginacao td:first-child {
  text-align: center;
}
.tabela-paginacao td:last-child {
  text-align: center;
}

.tabela-registros td:first-child {
  text-align: center;
}
.tabela-registros td:last-child {
  text-align: center;
}
/* min 550 */

@media (min-width: 550px) {

  html {
    font-size: 62.5%; }
    body {
      font-size: 1.5em; /* currently ems cause chrome bug misinterpreting rems on body element */
      line-height: 1.6em;
      font-family: 'Barlow';   
      font-weight: 400;
      color: #333; 
      padding: 0;
      margin: 0;
    }

    .painel {
      width: 100%;
      display: flex;
      align-items: stretch;
      align-content: stretch;
      justify-content: center;
      background-color: aliceblue;
    }

    .painel .p-a {
      width: 15%;
      border-right: 1px solid #cae1ff;
      padding: 0;
      background-color: aliceblue;

    }

    .painel .p-b {
      width: 65%;
      background-color: white;
    }

    header .painel {
      border: 0;
    }

    header .painel .p-a {
      border: 0;
      background-color: transparent;
    }

    header .painel .p-b {
      border: 0;
      background-color: transparent;
      color: white;
    }

    header .painel .p-c {
      border: 0;
    }

    .painel .p-c {
      width: 20%;
      border-left: 1px solid #cae1ff;
    }

    .cnt-cnt-videos {
      display: none;
      position: fixed;
      top: 50%;
      left: 50%;
      width: 100%;
      max-width: 300px;
      margin-left: -150px;
      background-color: #5499C7;
      color: white;
      z-index: 999999;
      box-sizing: border-box;
      border: 0;
      padding: 20px;
      margin-top: -100px;
    }

    #cnt-videos input {
      width: 100%;
      max-width: 100%;
      box-sizing: border-box;
      display: block;
      font-size: 12px;
      margin: 0 auto;
      margin-bottom: 5px;
    }

    #cnt-videos .button {
      width: 100%;
      max-width: 100%;
      display: block;
      margin: 0 auto;
    }


  }



  /*CARREGADOR DE IMAGENS*/

  .imagens {
    margin: 0;
    padding: 0;
    list-style: none;
    display: flex;
    align-content: center;
    align-items: stretch;
    justify-content: center;
    flex-wrap: wrap;
    box-sizing: border-box;
  }

  .imagens li {
    width: 33.33%;
    height: 60px;
    box-sizing: border-box;
    border: 1px solid white;
    overflow: hidden;
    position: relative;
  }

  .imagens li:last-child {
    display: none;
  }

  .imagens li img {
    height: 100%;
    width: 100%;
    max-height: 100px;
  }

  .imagens a {
    position: absolute;
    background-color: red;
    color: white;
    padding: 2px 5px;
    display: block;
    right: 0;
    border-radius: 100%;
  }

  /*INFO*/

  #info {
    background: #5499C7;
    display: none;
    position: fixed;
    left: 0;
    bottom: 0;
    right: 0;
    padding: 0 15px;
    padding-bottom: 20px;
    z-index: 99999999999;
    margin: auto;
    background-color: rgba(255, 215, 50, 0.9);
    text-align: center;
  }

  #info:before {
    content: "X";
    width: 100¨;
    display: block;
    text-align: right;
  }

  #msg {
    background: #5499C7;
    display: none;
    position: fixed;
    left: 0;
    top: 0;
    right: 0;
    bottom: 0;
    padding: 20px;
    z-index: 99999999999;
    color: white;
    margin: auto;
     display: -webkit-box;
    display: -moz-box;
    display: -ms-flexbox;
    display: -webkit-flex;
    display: none;
    align-items: center;
    align-content: center;
    justify-content: center;
    background-color: rgba(0, 0, 0, 0.8);
  }


  #msg > div {
    background-color: orangered;
    color: white;
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
    height: 100px;
    margin: auto;
    position: relative;
  }

  .msg:before {
    content: "X";
    position: absolute;
    top: 5px;
    right: 10px;
  }

  #info2 {
    background: lightblue;
    display: black;
    position: fixed;
    width: 500px;
    left: 50%;
    top: 50%;
    margin-top: -50px;
    margin-left: -250px;
    padding: 20px;
    box-sizing: border-box;
    z-index: 999999999999999999999999;
    color: red;
    font-weight: bold;
    text-align: center;
    border: 10px solid  red;
    cursor: pointer;
  }

  .quem-e-o-pai {
    position: relative;
  }

  .quem-e-o-pai:before {
    content: "?";
    position: absolute;
    background-color: #5499C7;
    color: white;
    padding: 0 5px;
    border-radius: 50%;
    line-height: 16px;
    top: 20px;
  }

  .paginacao {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    align-content: stretch;
    justify-content: center;
    list-style: none;
  }

  .paginacao li {
    fill: 1;
    padding: 0;
    margin:  0 5px;
    border: 1px solid skyblue;
  }

  .paginacao li:hover {
    border: 1px solid black;
  }

  .paginacao li a {
    display: block;
    width: 100%;
    padding: 5px 10px;
    line-height: 0
    text-align: center;
  }

  .paginacao li:hover {
    background-color: skyblue;
  }

  .catalogo   {
    display: flex;
    align-content: center;
    align-items: center;
    justify-content: center;
    flex-wrap: wrap;
    box-sizing: border-box;
  }

  .catalogo > div:nth-child(1) {
    width: 10%;
    box-sizing: border-box;
  }

  .catalogo > div:nth-child(2) {
    width: 90%;
    box-sizing: border-box;

  }

  .catalogo img {
    width: 100%;
    max-width: 50px;
  }

  .catalogo   {
    display: flex;
    align-content: center;
    align-items: center;
    justify-content: center;
    flex-wrap: wrap;
    box-sizing: border-box;
  }

  .catalogo > div:nth-child(1) {
    width: 10%;
    box-sizing: border-box;
  }

  .catalogo > div:nth-child(2) {
    width: 90%;
    box-sizing: border-box;

  }

  .catalogo img {
    width: 100%;
    max-width: 50px;
  }


  .conteudo   {
    display: flex;
    align-content: center;
    align-items: center;
    justify-content: center;
    flex-wrap: wrap;
    box-sizing: border-box;
    width: 
    100%;
  }

  .voltar {
    position: relative;
    font-size: 0;
  }

  .voltar:hover {
    color: transparent;
  }

  .voltar:before {
    content: "";
    border: 2px solid skyblue;
    border-right: 0;
    border-bottom: 0;
    position: absolute;
    padding: 5px;
    top: 0;
    left: 0px;
    -moz-transform: rotate(-45deg);
    -webkit-transform: rotate(-45deg);
    -o-transform: rotate(-45deg);
    -ms-transform: rotate(-45deg);
    transform: rotate(-45deg);
  }

  .voltar:after {
    content: "";
    border-top: 2px solid skyblue;
    position: absolute;
    width: 10px;
    top: 5px;
    left: 0;
  }

  fieldset {
    border: 1px solid silver;
  }


  input[type="checkbox"] {
    height: 10px;
    padding: 5px;
    margin: 0;
    position: relative;
    padding-right: 20px;
    border: 5px solid #555;
    background-color: red;
    padding: 5px;
  }

  input:not(:checked):before {
    content: "x";
    color: transparent;
    background-color: red;
    padding: 0 4px;
    border-radius: 100%;
    border: 1px solid #555;
    position: absolute;
    top: -4px;
    left: -5px;
  }

  input[type="checkbox"]:checked:before {
    content: "xx";
    color: transparent;
    background-color: #66CC00;
    padding: 0;
    border-radius: 100%;
    border: 1px solid #555;
    position: absolute;
    top: -4px;
    left: 0;
  }

  input[type="radio"] {
    height: 10px;
    padding: 5px;
    margin: 0;
    position: relative;
    padding-right: 20px;
    border: 5px solid red;
    background-color: #5499C7;
    padding: 5px;
  }

  input:not(:checked):before {
    content: "x";
    color: transparent;
    background-color: lightblue;
    padding: 0 4px;
    border-radius: 100%;
    border: 1px solid #555;
    position: absolute;
    top: -4px;
    left: -5px;
  }

  input[type="radio"]:checked:before {
    content: "xx";
    color: transparent;
    background-color: #66CC00;
    padding: 0 0;
    border-radius: 50%;
    border: 1px solid #555;
    position: absolute;
    top: -4px;
    left: -5px;
  }
  .temas  {
    display: flex;
    align-items: center;
    align-content: center;
    justify-content: space-between;
    padding: 5px;
  }

  .temas .button  {
    margin-bottom: 0;
  }

  .temas > div {
    width: auto;
    display: inline-block;
  }

  .temas:hover{
   background: #D0EDE3!important;
   border: 1px solid aliceblue;
 }

 .cnt-dst-flex .w {
  width: 25%;
}


.w1{width: 100%}
.w2{width: 100%}
.w3{width: 100%}
.w4{width: 100%}
.w5{width: 100%}
.w6{width: 100%}
.w7{width: 100%}
.w8{width: 100%}
.w9{width: 100%}
.w10{width: 100%}
.w11{width: 100%}
.w12{width: 100%}
.w13{width: 100%}
.w14{width: 100%}
.w15{width: 100%}
.w16{width: 100%}
.w17{width: 100%}
.w18{width: 100%}
.w19{width: 100%}
.w20{width: 100%}
.w21{width: 100%}
.w22{width: 100%}
.w23{width: 100%}
.w24{width: 100%}
.w25{width: 100%}
.w26{width: 100%}
.w27{width: 100%}
.w28{width: 100%}
.w29{width: 100%}
.w30{width: 100%}
.w31{width: 100%}
.w32{width: 100%}
.w33{width: 100%}
.w34{width: 100%}
.w35{width: 100%}
.w36{width: 100%}
.w37{width: 100%}
.w38{width: 100%}
.w39{width: 100%}
.w40{width: 100%}
.w41{width: 100%}
.w42{width: 100%}
.w43{width: 100%}
.w44{width: 100%}
.w45{width: 100%}
.w46{width: 100%}
.w47{width: 100%}
.w48{width: 100%}
.w49{width: 100%}
.w50{width: 100%}
.w51{width: 100%}
.w52{width: 100%}
.w53{width: 100%}
.w54{width: 100%}
.w55{width: 100%} 
.w56{width: 100%}
.w57{width: 100%}
.w58{width: 100%}
.w59{width: 100%}
.w60{width: 100%}
.w61{width: 100%}
.w62{width: 100%}
.w63{width: 100%}
.w64{width: 100%}
.w65{width: 100%}
.w66{width: 100%}
.w67{width: 100%}
.w68{width: 100%}
.w69{width: 100%}
.w70{width: 100%}
.w71{width: 100%}
.w72{width: 100%}
.w73{width: 100%}
.w74{width: 100%}
.w75{width: 100%}
.w76{width: 100%}
.w77{width: 100%}
.w78{width: 100%}
.w79{width: 100%}
.w80{width: 100%}
.w81{width: 100%}
.w82{width: 100%}
.w83{width: 100%}
.w84{width: 100%}
.w85{width: 100%}
.w86{width: 100%}
.w87{width: 100%}
.w88{width: 100%}
.w89{width: 100%}
.w90{width: 100%}
.w91{width: 100%}
.w92{width: 100%}   
.w93{width: 100%}
.w94{width: 100%}
.w95{width: 100%}  
.w96{width: 100%}
.w97{width: 100%}
.w98{width: 100%}
.w99 100%;}
.w100 {100%;}


@media (min-width: 550px) {

  .w1 {width: 1%;}
  .w2 {width: 2%;}
  .w3 {width: 3%;}
  .w4 {width: 4%;}
  .w5 {width: 5%;}
  .w6 {width: 6%;}
  .w7 {width: 7%;}
  .w8 {width: 8%;}
  .w9 {width: 9%;}
  .w10 {width: 10%;}
  .w11 {width: 11%;}
  .w12 {width: 12%;}
  .w13 {width: 13%;}
  .w14 {width: 14%;}
  .w15 {width: 15%;}
  .w16 {width: 16%;}
  .w17 {width: 17%;}
  .w18 {width: 18%;}
  .w19 {width: 19%;}
  .w20 {width: 20%;}
  .w21 {width: 21%;}
  .w22 {width: 22%;}
  .w23 {width: 23%;}
  .w24 {width: 24%;}
  .w25 {width: 25%;}
  .w26 {width: 26%;}
  .w27 {width: 27%;}
  .w28 {width: 28%;}
  .w29 {width: 29%;}
  .w30 {width: 30%;}
  .w31 {width: 31%;}
  .w32 {width: 32%;}
  .w33 {width: 33%;}
  .w34 {width: 34%;}
  .w35 {width: 35%;}
  .w36 {width: 36%;}
  .w37 {width: 37%;}
  .w38 {width: 38%;}
  .w39 {width: 39%;}
  .w40 {width: 40%;}
  .w41 {width: 41%;}
  .w42 {width: 42%;}
  .w43 {width: 43%;}
  .w44 {width: 44%;}
  .w45 {width: 45%;}
  .w46 {width: 46%;}
  .w47 {width: 47%;}
  .w48 {width: 48%;}
  .w49 {width: 49%;}
  .w50 {width: 50%;}
  .w51 {width: 51%;}
  .w52 {width: 52%;}
  .w53 {width: 53%;}
  .w54 {width: 54%;}
  .w55 {width: 55%;}  
  .w56 {width: 56%;}
  .w57 {width: 57%;}
  .w58 {width: 58%;}
  .w59 {width: 59%;}
  .w60 {width: 60%;}
  .w61 {width: 61%;}
  .w62 {width: 62%;}
  .w63 {width: 63%;}
  .w64 {width: 64%;}
  .w65 {width: 65%;}
  .w66 {width: 66%;}
  .w67 {width: 67%;}
  .w68 {width: 68%;}
  .w69 {width: 69%;}
  .w70 {width: 70%;}
  .w71 {width: 71%;}
  .w72 {width: 72%;}
  .w73 {width: 73%;}
  .w74 {width: 74%;}
  .w75 {width: 75%;}
  .w76 {width: 76%;}
  .w77 {width: 77%;}
  .w78 {width: 78%;}
  .w79 {width: 79%;}
  .w80 {width: 80%;}
  .w81 {width: 81%;}
  .w82 {width: 82%;}
  .w83 {width: 83%;}
  .w84 {width: 84%;}
  .w85 {width: 85%;}
  .w86 {width: 86%;}
  .w87 {width: 87%;}
  .w88 {width: 88%;}
  .w89 {width: 89%;}
  .w90 {width: 90%;}
  .w91 {width: 91%;}  
  .w92 {width: 92%;}   
  .w93 {width: 93%;}   
  .w94 {width: 94%;}   
  .w95 {width: 95%;}   
  .w96 {width: 96%;}   
  .w97 {width: 97%;}   
  .w98 {width: 98%;}   
  .w99 {width: 99%;}   
  .w100 {width: 100%;}
}



.tabela-flex {
  display: -webkit-box;
  display: -moz-box;
  display: -ms-flexbox;
  display: -webkit-flex;
  display: flex;
  align-content: center;
  align-items: center;
  justify-content: center;
  flex-wrap: nowrap;
  width: 100%;
}


.trash.icon {
  padding: 5px 4px;
  position: relative;
  margin-left: -5px;
  line-height: 0;
  font-size: 0;
  border-radius: 2px;

}

.trash.icon:hover {
  background-color: lightblue;
  border: lightblue;
}

.trash.icon:before {
  content: '';
  position: absolute;
  left: 0;
  top: -10px;
  width: 10px;
  height: 10px;
  color: red;
  border: 1px solid red;
  border-radius: 50%;
  padding: 5px 5px;
  background-repeat: no-repeat;
  background-size: 50%;
  background-position: center;
  background-image: url("data:image/svg+xml,%3C%3Fxml version='1.0'%3F%3E%3Csvg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' version='1.1' id='Capa_1' x='0px' y='0px' viewBox='0 0 220.889 220.889' style='enable-background:new 0 0 220.889 220.889;' xml:space='preserve' width='512px' height='512px'%3E%3Cg%3E%3Cg%3E%3Cpath d='M206.43,22.883h-19.196h-30.893V7.5c0-4.143-3.357-7.5-7.5-7.5H72.053c-4.143,0-7.5,3.357-7.5,7.5v15.383H33.66H14.459 c-4.143,0-7.5,3.357-7.5,7.5s3.357,7.5,7.5,7.5h12.219l12.578,176.04c0.28,3.925,3.546,6.966,7.481,6.966h127.42 c3.935,0,7.2-3.041,7.48-6.966l12.579-176.04h12.214c4.143,0,7.5-3.357,7.5-7.5S210.572,22.883,206.43,22.883z M79.553,15h61.788 v7.883H79.553V15z M167.173,205.889H53.72L41.715,37.883h30.338h76.788h30.338L167.173,205.889z' data-original='%23000000' class='active-path' data-old_color='%23000000' fill='%23FF0000'/%3E%3Cpath d='M110.445,62.907c-4.143,0-7.5,3.357-7.5,7.5v102.945c0,4.143,3.357,7.5,7.5,7.5s7.5-3.357,7.5-7.5V70.407 C117.945,66.265,114.588,62.907,110.445,62.907z' data-original='%23000000' class='active-path' data-old_color='%23000000' fill='%23FF0000'/%3E%3Cpath d='M77.209,69.873c-0.294-4.132-3.898-7.262-8.015-6.946c-4.132,0.295-7.242,3.884-6.946,8.015l7.354,102.945 c0.281,3.95,3.573,6.966,7.473,6.966c0.18,0,0.36-0.006,0.542-0.02c4.132-0.295,7.242-3.884,6.946-8.015L77.209,69.873z' data-original='%23000000' class='active-path' data-old_color='%23000000' fill='%23FF0000'/%3E%3Cpath d='M143.693,69.873l-7.357,102.945c-0.296,4.131,2.814,7.72,6.946,8.015c0.182,0.014,0.362,0.02,0.542,0.02 c3.898,0,7.19-3.016,7.473-6.966l7.357-102.945c0.296-4.131-2.814-7.72-6.946-8.015C147.593,62.614,143.988,65.741,143.693,69.873z ' data-original='%23000000' class='active-path' data-old_color='%23000000' fill='%23FF0000'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E%0A");
}

.trash.icon:hover:before {
  border: 1px solid skyblue;
}

.xtrash.icon:after {
  content: '';
  position: absolute;
  left: -2px;
  top: 0px;
  width: 12px;
  height: 1px;
  color: red;
  border-top: 2px solid gray;
  border-bottom: 1px solid white;
}

#form-config{
  position: relative;
}
label.checkbox input[type="checkbox"] {display:none;}
label.checkbox span {
  display:inline-block;
  border:2px solid #BBB;
  border-radius:10px;
  width:25px;
  height:25px;
  background:#C33;
  vertical-align:middle;
  margin:3px;
  position: relative;
  transition:width 0.1s, height 0.1s, margin 0.1s;
}

label.checkbox :checked + span {
  background:#6F6;
  width:27px;
  height:27px;
  margin: 2px;
}

label.checkbox :checked + span:after {
  content: '\2714';
  font-size: 20px;
  position: absolute;
  top: -2px;
  left: 5px;
  color: #99a1a7;
}



/* Larger than mobile */
@media (min-width: 400px) {}

/* Larger than phablet (also point when grid becomes active) */
@media (min-width: 550px) {}

/* Larger than tablet */
@media (min-width: 750px) {}

/* Larger than desktop */
@media (min-width: 1000px) {}

/* Larger than Desktop HD */
@media (min-width: 1200px) {}


a:hover {
  color: black;
  background-color: transparent!important;
}

.clique-aqui-logar {
  width: 100%;
  height: 100%;
  background-color: aliceblue;
  text-align: center;
  color: red;
  padding: 50px;
  box-sizing: border-box;
  display: flex;
  align-items: center;
  align-content: center;
  justify-content: center;
  flex-wrap: wrap;
  height: 100%;
  position: absolute;
}

.clique-aqui-logar a {
  text-decoration: none;
  background-color: skyblue;
  color: white;
  padding: 10px;
  display: block;
}

.clique-aqui-logar a:hover {
  text-decoration: none;
  background-color: skyblue!important;
  color: white;
  padding: 10px;
}

#lista-classes {
  position: absolute;
  z-index: 99999;   
  display: none;
  background-color: #048AC1;
  border: 0px solid #e9ecef;
  padding: 10px;
  box-sizing: border-box;
  width: 100%;
  max-width: 300px;
  top: 0;
  right: 0;
}

#lista-classes p {
  margin: 0;
  font-size: 12px;
  color: white;
  cursor: pointer;
}

#lista-classes p:hover {
  background-color: #5499C7;
  color: black;
}

#lista-classes hr {
  height: 1px;
  margin: 0;
  padding: 0;
  background-color: #e9ecef;
}



#lista-classes-box {
  position: absolute;
  z-index: 99999;   
  display: none;
  background-color: #048AC1;
  border: 0px solid #e9ecef;
  padding: 10px;
  box-sizing: border-box;
  width: 100%;
  max-width: 300px;
  top: 0;
  right: 0;
}

#lista-classes-box p {
  margin: 0;
  font-size: 12px;
  color: white;
  cursor: pointer;
}

#lista-classes-box p:hover {
  background-color: #5499C7;
  color: black;
}

#lista-classes-box hr {
  height: 1px;
  margin: 0;
  padding: 0;
  background-color: #e9ecef;
}

#btn-classes {
  cursor: pointer;
  position: relative;
}
.add-classes {
  position: relative;
  margin-left: 10px;
  background-color: lightblue;
  padding: 1px 30px;
  border-left: 15px solid blue;
}
.add-classes:after {
  content: "";
  position: absolute;
  border-right: 15px dashed red;
  padding: 10px;
  top: 0px;
  right: 15px;
}
.add-classes:before {
  content: "";
  position: absolute;
  border-right: 20px dashed green;
  padding: 10px;
  top: 0px;
  left: -5px;
}


.icone-editar {
  position: relative;
  padding-left: 20px;
}

.icone-editar:before {
  content: "";
  padding: 5px 1px;
  border: 1px solid blue;
  position: absolute;
  left: 3px;
  top: 0;
  background-color: lightblue;
}

.icone-editar:after {
  content: "";
  padding: 0;
  border-top: 6px solid black;
  border-bottom: 6px solid transparent;
  border-left: 2px solid transparent;
  border-right: 2px solid transparent;
  position: absolute;
  left: 3px;
  bottom: -5px;
}


.icone_edit_page {
  position: relative;
  margin-right: 5px;
  background-color: aliceblue;
  padding: 0 8px;
  border: 1px solid #5499C7;
  border-radius: 3px;
}

.icone_edit_page:hover {
  background-color: lightblue;
}
.icone_edit_page:before {
  content: "";
  position: absolute;
  border-top: 2px dotted black;
  border-left: 0;
  border-bottom: 2px dotted black;
  border-right: 0;
  width: 10px;
  height: 2px;
  left: 3px;
  top: 5px;
}

.icone_edit_page:after {
  content: "";
  position: absolute;
  border-top: 2px dotted black;
  border-left: 0;
  border-bottom: 0px solid black;
  border-right: 0;
  width: 10px;
  height: 3px;
  left: 3px;
  top: 13px;
}

.icone_edit_page {
  position: relative;
  margin-right: 5px;
  background-color: aliceblue;
  padding: 0 8px;
  border: 1px solid #5499C7;
  border-radius: 3px;
}

.icone_edit_page:hover {
  background-color: lightblue;
}
.icone_edit_page:before {
  content: "";
  position: absolute;
  border-top: 2px solid silver;
  border-left: 0;
  border-bottom: 2px solid silver;
  border-right: 0;
  width: 10px;
  height: 2px;
  left: 3px;
  top: 5px;
}

.icone_edit_page:after {
  content: "";
  position: absolute;
  border-top: 2px solid silver;
  border-left: 0;
  border-bottom: 0px solid black;
  border-right: 0;
  width: 10px;
  height: 3px;
  left: 3px;
  top: 13px;
}

.icone_edit_itens {
  position: relative;
  margin-right: 5px;
  background-color: white;
  padding: 0 8px;
  border: 1px solid gray;
  border-radius: 3px;
}

.icone_edit_itens:hover {
  background-color: white;
}
.icone_edit_itens:before {
  content: "";
  position: absolute;
  border-top: 2px dotted gray;
  border-left: 0;
  border-bottom: 2px dotted gray;
  border-right: 0;
  width: 10px;
  height: 2px;
  left: 3px;
  top: 5px;
}

.icone_edit_itens:after {
  content: "";
  position: absolute;
  border-top: 2px dotted black;
  border-left: 0;
  border-bottom: 0px solid black;
  border-right: 0;
  width: 10px;
  height: 3px;
  left: 3px;
  top: 13px;
}

.icone_lapis {
  position: relative;
  margin-right: 5px;
  background-color: white;
  padding: 0 8px;
  border-radius: 4px;
}

.icone_lapis:before {
  content: "";
  position: absolute;
  top: 0px;
  left: 50%;
  margin-left: 0px;
  border: 1px solid gray;
  border-top: 5px solid #5499C7;
  width: 4px;
  height: 10px;
  background: silver;
  z-index: 9;
  -moz-transform: rotate(25deg);
  -webkit-transform: rotate(25deg);
  -o-transform: rotate(25deg);
  -ms-transform: rotate(25deg);
  transform: rotate(25deg);
}

.icone_lapis:after {
  content: "";
  position: absolute;
  bottom: -3px;
  left: 50%;
  margin-left: -5px;
  width: 0;
  height: 0;
  border-top: 3px solid black;
  border-left: 3px solid transparent;
  border-right: 3px solid transparent;
  border-bottom: 3px solid transparent;
  z-index: 99999;
  -moz-transform: rotate(25deg);
  -webkit-transform: rotate(25deg);
  -o-transform: rotate(25deg);
  -ms-transform: rotate(25deg);
  transform: rotate(25deg);
}

.link-total-itens {
  background-color: skyblue;
  color: white;
  padding-right: 5px;
}

.link-total-itens:hover {
  background-color: red;
  color: sea  green;
}


#image-file {
  display: none
}
#image-file-descricao {
  display: none
}

#upload2 label {
  color: transparent; 
  position: relative;
  padding:  0 8px;
  width: 10px;
  height: 5px;
  box-sizing: border-box; 
  margin: 0 auto;
  cursor: pointer;
}

#upload2 label:before {
  content: "";
  color: black; 
  cursor: pointer;
  border-top: 10px solid transparent;
  border-left: 10px solid transparent;
  border-right: 10px solid red;
  border-bottom: 10px solid red;
  position: absolute;
  top: 15px;
  left: -5px;
  -webkit-transform: rotate(45deg);
  -moz-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  -o-transform: rotate(45deg);
  filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=45);
}

#upload2 label:after {
  content: "";
  color: black; 
  padding: 10px 8px;
  border-top: 10px solid red;
  position: absolute;
  top: 20px;
  left: -3px;
}



#upload2-descricao label {
  color: transparent; 
  position: relative;
  padding:  0 8px;
  width: 10px;
  height: 5px;
  box-sizing: border-box; 
  margin: 0 auto;
  cursor: pointer;
}

#upload2-descricao label:before {
  content: "";
  color: black; 
  cursor: pointer;
  border-top: 10px solid transparent;
  border-left: 10px solid transparent;
  border-right: 10px solid red;
  border-bottom: 10px solid red;
  position: absolute;
  top: 15px;
  left: -5px;
  -webkit-transform: rotate(45deg);
  -moz-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  -o-transform: rotate(45deg);
  filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=45);
}

#upload2-descricao label:after {
  content: "";
  color: black; 
  padding: 10px 8px;
  border-top: 10px solid red;
  position: absolute;
  top: 20px;
  left: -3px;
}


.xxxxx .cnt-edicao  {
  display: flex;
  align-items: stretch;
  align-content: stretch;
  justify-content: center;
  flex-wrap: nowrap;  
  width: 100%;
  box-sizing: border-box;
}

.xxxxx .cnt-edicao a  {
  box-sizing: border-box;
  display: block;
  border-bottom: 1px solid #e9ecef;
}

.xxxxx .cnt-edicao div {
  box-sizing: border-box;
  padding: 10px 0;
  background-color: aliceblue;
  margin-bottom: 1px;
  text-align: center;
}

.xxxxx .cnt-edicao.gravata div {
  background-color: transparent;
  border-bottom: 2px solid skyblue;
  font-weight: 600;
}

.xxxxx .cnt-edicao  div:nth-child(1) {
  width: 60%;
  text-align: left;
}

.xxxxx label {
  margin: 0;
}

.xxxxx .cnt-edicao  div:nth-child(2) {
  width: 15%;
}

.xxxxx .cnt-edicao  div:nth-child(3) {
  width: 10%;
}

.xxxxx .cnt-edicao  div:nth-child(4) {
  width: 10%;
}

.xxxxx .cnt-edicao  div:nth-child(5) {
  width:5%;
}

.xxxxx .cnt-edicao  .itens {
  border: 1px solid skyblue;
  padding: 0 5px;
  color: #5499C7;
}

.xxxxx .cnt-edicao  .itens:hover {
  background-color: lightblue;
}

.xxxxx ul    {
 list-style: none;
}

.xxxxx ul li  {
  padding: 0;
  margin: 0
}

.mais-filhos {
  color: #5499C7;
  position: relative;
  padding-left: 20px;
}

.mais-filhos:before {
  content: "";
  position: absolute;
  top: 8px;
  left: 5px;
  border: 5px solid transparent;
  border-top: 5px solid skyblue;
  border-bottom: 5px solid transparent;
}


/* ONDE ESTOU */

.onde-estou {
 display: flex;
 align-items: center;
 align-content: center;
 justify-content: center;
 flex-wrap: wrap;
 width: 100%;
 max-width: 1024px;
 margin: 0 auto;
}

.onde-estou li {
 width: 100%;
 padding: 0 20px;
 position: relative;
 list-style: none;
}

.onde-estou li:before {
  content: "";
  position: absolute;
  top: 8px;
  left: 0;
  padding: 2px;
  border: 2px solid green;
  -moz-transform: rotate(45deg);
  -webkit-transform: rotate(45deg);
  -o-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
  border-left: 2px solid transparent;
  border-bottom: 2px solid transparent;
}

.onde-estou li:nth-child(1):before {
  display: none;
}

@media (min-width: 550px) {

  .onde-estou {
   display: flex;
   align-items: center;
   align-content: center;
   justify-content: center;
   flex-wrap: wrap;
   width: 100%;
   max-width: 1024px;
   margin: 0 auto;
 }

 .onde-estou li {
   width: auto;
 }

}

.cnt-dados-do-cliente {
  display: none;
  background-color: aliceblue;
  border: 1px solid #33C3F0;
  padding: 15px;
  margin-bottom: 20px;
}

.icone-lixo {
  position: relative;
  font-size: 8px;
  color: transparent;
}

.icone-lixo:before {
  content: "";
  top: -5px;
  left: 0;
  padding: 7px;
  position: absolute;
  background-repeat: no-repeat;
  background-size: 100%;
  background-position: center;
  background-image: url("data:image/svg+xml,%3C%3Fxml version='1.0'%3F%3E%3Csvg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' version='1.1' id='Capa_1' x='0px' y='0px' viewBox='0 0 220.889 220.889' style='enable-background:new 0 0 220.889 220.889;' xml:space='preserve' width='512px' height='512px'%3E%3Cg%3E%3Cg%3E%3Cpath d='M206.43,22.883h-19.196h-30.893V7.5c0-4.143-3.357-7.5-7.5-7.5H72.053c-4.143,0-7.5,3.357-7.5,7.5v15.383H33.66H14.459 c-4.143,0-7.5,3.357-7.5,7.5s3.357,7.5,7.5,7.5h12.219l12.578,176.04c0.28,3.925,3.546,6.966,7.481,6.966h127.42 c3.935,0,7.2-3.041,7.48-6.966l12.579-176.04h12.214c4.143,0,7.5-3.357,7.5-7.5S210.572,22.883,206.43,22.883z M79.553,15h61.788 v7.883H79.553V15z M167.173,205.889H53.72L41.715,37.883h30.338h76.788h30.338L167.173,205.889z' data-original='%23000000' class='active-path' data-old_color='%23000000' fill='%23FF0000'/%3E%3Cpath d='M110.445,62.907c-4.143,0-7.5,3.357-7.5,7.5v102.945c0,4.143,3.357,7.5,7.5,7.5s7.5-3.357,7.5-7.5V70.407 C117.945,66.265,114.588,62.907,110.445,62.907z' data-original='%23000000' class='active-path' data-old_color='%23000000' fill='%23FF0000'/%3E%3Cpath d='M77.209,69.873c-0.294-4.132-3.898-7.262-8.015-6.946c-4.132,0.295-7.242,3.884-6.946,8.015l7.354,102.945 c0.281,3.95,3.573,6.966,7.473,6.966c0.18,0,0.36-0.006,0.542-0.02c4.132-0.295,7.242-3.884,6.946-8.015L77.209,69.873z' data-original='%23000000' class='active-path' data-old_color='%23000000' fill='%23FF0000'/%3E%3Cpath d='M143.693,69.873l-7.357,102.945c-0.296,4.131,2.814,7.72,6.946,8.015c0.182,0.014,0.362,0.02,0.542,0.02 c3.898,0,7.19-3.016,7.473-6.966l7.357-102.945c0.296-4.131-2.814-7.72-6.946-8.015C147.593,62.614,143.988,65.741,143.693,69.873z ' data-original='%23000000' class='active-path' data-old_color='%23000000' fill='%23FF0000'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E%0A");
}

.cnt-dados-usuario  {
  color: #4582B4;
  font-size: 12px;
  line-height: 14px;
}


.meta-tags {
  position: fixed;
  background-color: #5499C7;
  z-index: 99999;
  width: 100%;
  max-width: 250px;
  left: 50%;
  top: 60px;
  margin-left: -125px;
  border: 1px solid #5499C7;
  padding: 20px;
  color: white;
  display: none;
  box-shadow: -3px 3px 3px -1px rgba(153,153,153,0.75);
  -webkit-box-shadow: -3px 3px 3px -1px rgba(153,153,153,0.75);
  -moz-box-shadow: -3px 3px 3px -1px rgba(153,153,153,0.75);

}



.meta-tags h3 {
  color: white;
}

.meta-tags a {
  color: white;
}
.meta-tags p {
  color: white;
}
.meta-tags label {
  color: white;
}

.cke_chrome {
  border: 1px solid lightblue!important;
  width: 100%!important;
}


.ativar-menus {
  position: absolute;
  padding: 0 5px!important;
  padding-bottom: 10px!important;
  z-index: 999;
  width: 150px!important;
  display: none;
  right: 0;
  top: 0;
  text-align: left;
  background: #ccc!important;
}

.ativar-menus a {
 width: block;
 text-align: right;
 padding-right: 10px;
}

.ativar-menus label {
 width: block;
 text-align: left;
 padding-left: 30px;
 line-height: 35px;
 position: relative;
}

.ativar-menus  input[type="checkbox"] {
 width: 20px!important;
 position: absolute;
 top: 12px;
 left: 10px;
 cursor: crosshair;
}


</style>