<style>

  /*
* Skeleton V2.0.4
* Copyright 2014, Dave Gamache
* www.getskeleton.com
* Free to use under the MIT license.
* http://www.opensource.org/licenses/mit-license.php
* 12/29/2014
*/


/* Table of contents
––––––––––––––––––––––––––––––––––––––––––––––––––
- Grid
- Base Styles
- Typography
- Links
- Buttons
- Forms
- Lists
- Code
- Tables
- Spacing
- Utilities
- Clearing
- Media Queries
*/


/* Grid
–––––––––––––––––––––––––––––––––––––––––––––––––– */
.container {
  position: relative;
  width: 100%;
  max-width: 960px;
  margin: 0 auto;
  padding: 0 20px;
  box-sizing: border-box; }
  .column,
  .columns {
    width: 100%;
    float: left;
    box-sizing: border-box; }

    /* For devices larger than 400px */
    @media (min-width: 400px) {
      .container {
        width: 85%;
        padding: 0; }
      }

      /* For devices larger than 550px */
      @media (min-width: 550px) {
        .container {
          width: 95%; }
          .column,
          .columns {
            margin-left: 4%; }
            .column:first-child,
            .columns:first-child {
              margin-left: 0; }

              .one.column,
              .one.columns                    { width: 4.66666666667%; }
              .two.columns                    { width: 13.3333333333%; }
              .three.columns                  { width: 22%;            }
              .four.columns                   { width: 30.6666666667%; }
              .five.columns                   { width: 39.3333333333%; }
              .six.columns                    { width: 48%;            }
              .seven.columns                  { width: 56.6666666667%; }
              .eight.columns                  { width: 65.3333333333%; }
              .nine.columns                   { width: 74.0%;          }
              .ten.columns                    { width: 82.6666666667%; }
              .eleven.columns                 { width: 91.3333333333%; }
              .twelve.columns                 { width: 100%; margin-left: 0; }

              .one-third.column               { width: 30.6666666667%; }
              .two-thirds.column              { width: 65.3333333333%; }

              .one-half.column                { width: 48%; }

              /* Offsets */
              .offset-by-one.column,
              .offset-by-one.columns          { margin-left: 8.66666666667%; }
              .offset-by-two.column,
              .offset-by-two.columns          { margin-left: 17.3333333333%; }
              .offset-by-three.column,
              .offset-by-three.columns        { margin-left: 26%;            }
              .offset-by-four.column,
              .offset-by-four.columns         { margin-left: 34.6666666667%; }
              .offset-by-five.column,
              .offset-by-five.columns         { margin-left: 43.3333333333%; }
              .offset-by-six.column,
              .offset-by-six.columns          { margin-left: 52%;            }
              .offset-by-seven.column,
              .offset-by-seven.columns        { margin-left: 60.6666666667%; }
              .offset-by-eight.column,
              .offset-by-eight.columns        { margin-left: 69.3333333333%; }
              .offset-by-nine.column,
              .offset-by-nine.columns         { margin-left: 78.0%;          }
              .offset-by-ten.column,
              .offset-by-ten.columns          { margin-left: 86.6666666667%; }
              .offset-by-eleven.column,
              .offset-by-eleven.columns       { margin-left: 95.3333333333%; }

              .offset-by-one-third.column,
              .offset-by-one-third.columns    { margin-left: 34.6666666667%; }
              .offset-by-two-thirds.column,
              .offset-by-two-thirds.columns   { margin-left: 69.3333333333%; }

              .offset-by-one-half.column,
              .offset-by-one-half.columns     { margin-left: 52%; }

            }

            * {
              box-sizing: border-box;
            }

/* Base Styles
–––––––––––––––––––––––––––––––––––––––––––––––––– */
/* NOTE
html is set to 62.5% so that all the REM measurements throughout Skeleton
are based on 10px sizing. So basically 1.5rem = 15px :) */
html {
  font-size: 62.5%; }
  body {
    font-size: 1.5em; /* currently ems cause chrome bug misinterpreting rems on body element */
    line-height: 1.6;
    font-weight: 300;
    font-family: "Inter", "HelveticaNeue", "Helvetica Neue", Helvetica, Arial, sans-serif;
    color: #222; }


/* Typography
–––––––––––––––––––––––––––––––––––––––––––––––––– */
h1, h2, h3, h4, h5, h6 {
  margin-top: 0;
  margin-bottom: 2rem;
  font-weight: 700; }
  h1 { font-size: 2.6rem; line-height: 1.2; letter-spacing: 0.01rem;  margin-top: 3rem; text-align: center;}
  h2 { font-size: 1.8rem; line-height: 1.25; letter-spacing: 0.01rem;  }
  h3 { font-size: 2rem; line-height: 1.3;  letter-spacing: 0.01rem;  }
  h4 { font-size: 1.8rem; line-height: 1.35; letter-spacing: 0.01rem;  }
  h5 { font-size: 1.6rem; line-height: 1.5;  letter-spacing: 0.01rem;  }
  h6 { font-size: 1.2rem; line-height: 1.6;  letter-spacing: 0; }

  /* Larger than phablet */
  @media (min-width: 550px) {
    h1 { font-size: 2.6rem; }
    h2 { font-size: 1.8rem; }
    h3 { font-size: 2rem; }
    h4 { font-size: 1.8rem; }
    h5 { font-size: 1.6rem; }
    h6 { font-size: 1.2rem; }
  }

  p {
    margin-top: 0; }


/* Links
–––––––––––––––––––––––––––––––––––––––––––––––––– */
a {
  color: #777;
  text-decoration: none;}
  a:hover {
    color: #00adefff;}


/* Buttons
–––––––––––––––––––––––––––––––––––––––––––––––––– */
.button,
button,
input[type="submit"],
input[type="reset"],
input[type="button"] {
  display: inline-block;
  padding: 10px 30px;
  color: #555;
  text-align: center;
  font-weight: 600;
  line-height: 34px;
  letter-spacing: .1rem;
  text-decoration: none;
  white-space: nowrap;
  background-color: transparent;
  border-radius: 4px;
  border: 1px solid #bbb;
  cursor: pointer;
  box-sizing: border-box; }
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
    color: #333;
    border-color: #888;
    outline: 0; }
    .button.button-primary,
    button.button-primary,
    input[type="submit"].button-primary,
    input[type="reset"].button-primary,
    input[type="button"].button-primary {
      color: #FFF;
      background: dodgerblue;
      border-color: dodgerblue; }
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
        background: skyblue;
        border-color: skyblue; }


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
  height: 34px;
  padding: 6px 10px; /* The 6px vertically centers text on FF, ignored by Webkit */
  background-color: #fff;
  border: 1px solid #D1D1D1;
  border-radius: 4px;
  box-shadow: none;
  box-sizing: border-box; }
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
        border: 1px solid #264653;
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
  padding: 12px 15px;
  text-align: left;
  border-bottom: 1px solid #E1E1E1; }
  th:first-child,
  td:first-child {
    padding-left: 0; }
    th:last-child,
    td:last-child {
      padding-right: 0; }


/* Spacing
–––––––––––––––––––––––––––––––––––––––––––––––––– */
button,
.button {
  margin-bottom: 1rem; }
  input,
  textarea,
  select,
  fieldset {
    margin-bottom: 1.5rem; }
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


/* Media Queries
–––––––––––––––––––––––––––––––––––––––––––––––––– */
/*
Note: The best way to structure the use of media queries is to create the queries
near the relevant code. For example, if you wanted to change the styles for buttons
on small devices, paste the mobile query code up in the buttons section and style it
there.
*/



.flex-center {
  display: -webkit-box;
  display: -moz-box;
  display: -ms-flexbox;
  display: -webkit-flex;
  display: flex;  
  align-items: stretch;
  align-content: center;
  justify-content: center;
  flex-wrap: wrap;
}

.editar {
  font-size: 8px;
  text-transform: uppercase;
  text-decoration: none;
  color: black;
  background: lightgreen;
  padding: 2px;
  padding-bottom: 1px;
  letter-spacing: 1px;
  font-weight: 700;
}
.editar:hover {
  background: green;
  color: white;
}
.skip-link { 
  position: absolute;  
  top: -50px;  
  left: 0;  
  color: white; 
  background: red;
  padding: 8px; 
  z-index: 100;
}
.skip-link:focus {top:0;}

#sm-categorias a {
  color: #333;
}

@font-face{font-family:swiper-icons;src:url('data:application/font-woff;charset=utf-8;base64, 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') format('woff');font-weight:400;font-style:normal}:root{--swiper-theme-color:#264653}.swiper-container{margin-left:auto;margin-right:auto;position:relative;overflow:hidden;list-style:none;padding:0;z-index:1}.swiper-container-vertical>.swiper-wrapper{flex-direction:column}.swiper-wrapper{position:relative;width:100%;height:100%;z-index:1;display:flex;transition-property:transform;box-sizing:content-box}.swiper-container-android .swiper-slide,.swiper-wrapper{transform:translate3d(0px,0,0)}.swiper-container-multirow>.swiper-wrapper{flex-wrap:wrap}.swiper-container-multirow-column>.swiper-wrapper{flex-wrap:wrap;flex-direction:column}.swiper-container-free-mode>.swiper-wrapper{transition-timing-function:ease-out;margin:0 auto}.swiper-slide{flex-shrink:0;width:100%;height:100%;position:relative;transition-property:transform}.swiper-slide-invisible-blank{visibility:hidden}.swiper-container-autoheight,.swiper-container-autoheight .swiper-slide{height:auto}.swiper-container-autoheight .swiper-wrapper{align-items:flex-start;transition-property:transform,height}.swiper-container-3d{perspective:1200px}.swiper-container-3d .swiper-cube-shadow,.swiper-container-3d .swiper-slide,.swiper-container-3d .swiper-slide-shadow-bottom,.swiper-container-3d .swiper-slide-shadow-left,.swiper-container-3d .swiper-slide-shadow-right,.swiper-container-3d .swiper-slide-shadow-top,.swiper-container-3d .swiper-wrapper{transform-style:preserve-3d}.swiper-container-3d .swiper-slide-shadow-bottom,.swiper-container-3d .swiper-slide-shadow-left,.swiper-container-3d .swiper-slide-shadow-right,.swiper-container-3d .swiper-slide-shadow-top{position:absolute;left:0;top:0;width:100%;height:100%;pointer-events:none;z-index:10}.swiper-container-3d .swiper-slide-shadow-left{background-image:linear-gradient(to left,rgba(0,0,0,.5),rgba(0,0,0,0))}.swiper-container-3d .swiper-slide-shadow-right{background-image:linear-gradient(to right,rgba(0,0,0,.5),rgba(0,0,0,0))}.swiper-container-3d .swiper-slide-shadow-top{background-image:linear-gradient(to top,rgba(0,0,0,.5),rgba(0,0,0,0))}.swiper-container-3d .swiper-slide-shadow-bottom{background-image:linear-gradient(to bottom,rgba(0,0,0,.5),rgba(0,0,0,0))}.swiper-container-css-mode>.swiper-wrapper{overflow:auto;scrollbar-width:none;-ms-overflow-style:none}.swiper-container-css-mode>.swiper-wrapper::-webkit-scrollbar{display:none}.swiper-container-css-mode>.swiper-wrapper>.swiper-slide{scroll-snap-align:start start}.swiper-container-horizontal.swiper-container-css-mode>.swiper-wrapper{scroll-snap-type:x mandatory}.swiper-container-vertical.swiper-container-css-mode>.swiper-wrapper{scroll-snap-type:y mandatory}:root{--swiper-navigation-size:44px}.swiper-button-next,.swiper-button-prev{position:absolute;top:50%;width:calc(var(--swiper-navigation-size)/ 44 * 27);height:var(--swiper-navigation-size);margin-top:calc(-1 * var(--swiper-navigation-size)/ 2);z-index:10;cursor:pointer;display:flex;align-items:center;justify-content:center;color:var(--swiper-navigation-color,var(--swiper-theme-color))}.swiper-button-next.swiper-button-disabled,.swiper-button-prev.swiper-button-disabled{opacity:.35;cursor:auto;pointer-events:none}.swiper-button-next:after,.swiper-button-prev:after{font-family:swiper-icons;font-size:var(--swiper-navigation-size);text-transform:none!important;letter-spacing:0;text-transform:none;font-variant:initial}.swiper-button-prev,.swiper-container-rtl .swiper-button-next{left:10px;right:auto}.swiper-button-prev:after,.swiper-container-rtl .swiper-button-next:after{content:'prev'}.swiper-button-next,.swiper-container-rtl .swiper-button-prev{right:10px;left:auto}.swiper-button-next:after,.swiper-container-rtl .swiper-button-prev:after{content:'next'}.swiper-button-next.swiper-button-white,.swiper-button-prev.swiper-button-white{--swiper-navigation-color:#ffffff}.swiper-button-next.swiper-button-black,.swiper-button-prev.swiper-button-black{--swiper-navigation-color:#000000}.swiper-button-lock{display:none}.swiper-pagination{position:absolute;text-align:center;transition:.3s opacity;transform:translate3d(0,0,0);z-index:10}.swiper-pagination.swiper-pagination-hidden{opacity:0}.swiper-container-horizontal>.swiper-pagination-bullets,.swiper-pagination-custom,.swiper-pagination-fraction{bottom:10px;left:0;width:100%}.swiper-pagination-bullets-dynamic{overflow:hidden;font-size:0}.swiper-pagination-bullets-dynamic .swiper-pagination-bullet{transform:scale(.33);position:relative}.swiper-pagination-bullets-dynamic .swiper-pagination-bullet-active{transform:scale(1)}.swiper-pagination-bullets-dynamic .swiper-pagination-bullet-active-main{transform:scale(1)}.swiper-pagination-bullets-dynamic .swiper-pagination-bullet-active-prev{transform:scale(.66)}.swiper-pagination-bullets-dynamic .swiper-pagination-bullet-active-prev-prev{transform:scale(.33)}.swiper-pagination-bullets-dynamic .swiper-pagination-bullet-active-next{transform:scale(.66)}.swiper-pagination-bullets-dynamic .swiper-pagination-bullet-active-next-next{transform:scale(.33)}.swiper-pagination-bullet{width:8px;height:8px;display:inline-block;border-radius:100%;background:#000;opacity:.2}button.swiper-pagination-bullet{border:none;margin:0;padding:0;box-shadow:none;-webkit-appearance:none;-moz-appearance:none;appearance:none}.swiper-pagination-clickable .swiper-pagination-bullet{cursor:pointer}.swiper-pagination-bullet-active{opacity:1;background:var(--swiper-pagination-color,var(--swiper-theme-color))}.swiper-container-vertical>.swiper-pagination-bullets{right:10px;top:50%;transform:translate3d(0px,-50%,0)}.swiper-container-vertical>.swiper-pagination-bullets .swiper-pagination-bullet{margin:6px 0;display:block}.swiper-container-vertical>.swiper-pagination-bullets.swiper-pagination-bullets-dynamic{top:50%;transform:translateY(-50%);width:8px}.swiper-container-vertical>.swiper-pagination-bullets.swiper-pagination-bullets-dynamic .swiper-pagination-bullet{display:inline-block;transition:.2s transform,.2s top}.swiper-container-horizontal>.swiper-pagination-bullets .swiper-pagination-bullet{margin:0 4px}.swiper-container-horizontal>.swiper-pagination-bullets.swiper-pagination-bullets-dynamic{left:50%;transform:translateX(-50%);white-space:nowrap}.swiper-container-horizontal>.swiper-pagination-bullets.swiper-pagination-bullets-dynamic .swiper-pagination-bullet{transition:.2s transform,.2s left}.swiper-container-horizontal.swiper-container-rtl>.swiper-pagination-bullets-dynamic .swiper-pagination-bullet{transition:.2s transform,.2s right}.swiper-pagination-progressbar{background:rgba(0,0,0,.25);position:absolute}.swiper-pagination-progressbar .swiper-pagination-progressbar-fill{background:var(--swiper-pagination-color,var(--swiper-theme-color));position:absolute;left:0;top:0;width:100%;height:100%;transform:scale(0);transform-origin:left top}.swiper-container-rtl .swiper-pagination-progressbar .swiper-pagination-progressbar-fill{transform-origin:right top}.swiper-container-horizontal>.swiper-pagination-progressbar,.swiper-container-vertical>.swiper-pagination-progressbar.swiper-pagination-progressbar-opposite{width:100%;height:4px;left:0;top:0}.swiper-container-horizontal>.swiper-pagination-progressbar.swiper-pagination-progressbar-opposite,.swiper-container-vertical>.swiper-pagination-progressbar{width:4px;height:100%;left:0;top:0}.swiper-pagination-white{--swiper-pagination-color:#ffffff}.swiper-pagination-black{--swiper-pagination-color:#000000}.swiper-pagination-lock{display:none}.swiper-scrollbar{border-radius:10px;position:relative;-ms-touch-action:none;background:rgba(0,0,0,.1)}.swiper-container-horizontal>.swiper-scrollbar{position:absolute;left:1%;bottom:3px;z-index:50;height:5px;width:98%}.swiper-container-vertical>.swiper-scrollbar{position:absolute;right:3px;top:1%;z-index:50;width:5px;height:98%}.swiper-scrollbar-drag{height:100%;width:100%;position:relative;background:rgba(0,0,0,.5);border-radius:10px;left:0;top:0}.swiper-scrollbar-cursor-drag{cursor:move}.swiper-scrollbar-lock{display:none}.swiper-zoom-container{width:100%;height:100%;display:flex;justify-content:center;align-items:center;text-align:center}.swiper-zoom-container>canvas,.swiper-zoom-container>img,.swiper-zoom-container>svg{max-width:100%;max-height:100%;object-fit:contain}.swiper-slide-zoomed{cursor:move}.swiper-lazy-preloader{width:42px;height:42px;position:absolute;left:50%;top:50%;margin-left:-21px;margin-top:-21px;z-index:10;transform-origin:50%;animation:swiper-preloader-spin 1s infinite linear;box-sizing:border-box;border:4px solid var(--swiper-preloader-color,var(--swiper-theme-color));border-radius:50%;border-top-color:transparent}.swiper-lazy-preloader-white{--swiper-preloader-color:#fff}.swiper-lazy-preloader-black{--swiper-preloader-color:#000}@keyframes swiper-preloader-spin{100%{transform:rotate(360deg)}}.swiper-container .swiper-notification{position:absolute;left:0;top:0;pointer-events:none;opacity:0;z-index:-1000}.swiper-container-fade.swiper-container-free-mode .swiper-slide{transition-timing-function:ease-out}.swiper-container-fade .swiper-slide{pointer-events:none;transition-property:opacity}.swiper-container-fade .swiper-slide .swiper-slide{pointer-events:none}.swiper-container-fade .swiper-slide-active,.swiper-container-fade .swiper-slide-active .swiper-slide-active{pointer-events:auto}.swiper-container-cube{overflow:visible}.swiper-container-cube .swiper-slide{pointer-events:none;-webkit-backface-visibility:hidden;backface-visibility:hidden;z-index:1;visibility:hidden;transform-origin:0 0;width:100%;height:100%}.swiper-container-cube .swiper-slide .swiper-slide{pointer-events:none}.swiper-container-cube.swiper-container-rtl .swiper-slide{transform-origin:100% 0}.swiper-container-cube .swiper-slide-active,.swiper-container-cube .swiper-slide-active .swiper-slide-active{pointer-events:auto}.swiper-container-cube .swiper-slide-active,.swiper-container-cube .swiper-slide-next,.swiper-container-cube .swiper-slide-next+.swiper-slide,.swiper-container-cube .swiper-slide-prev{pointer-events:auto;visibility:visible}.swiper-container-cube .swiper-slide-shadow-bottom,.swiper-container-cube .swiper-slide-shadow-left,.swiper-container-cube .swiper-slide-shadow-right,.swiper-container-cube .swiper-slide-shadow-top{z-index:0;-webkit-backface-visibility:hidden;backface-visibility:hidden}.swiper-container-cube .swiper-cube-shadow{position:absolute;left:0;bottom:0px;width:100%;height:100%;background:#000;opacity:.6;-webkit-filter:blur(50px);filter:blur(50px);z-index:0}.swiper-container-flip{overflow:visible}.swiper-container-flip .swiper-slide{pointer-events:none;-webkit-backface-visibility:hidden;backface-visibility:hidden;z-index:1}.swiper-container-flip .swiper-slide .swiper-slide{pointer-events:none}.swiper-container-flip .swiper-slide-active,.swiper-container-flip .swiper-slide-active .swiper-slide-active{pointer-events:auto}.swiper-container-flip .swiper-slide-shadow-bottom,.swiper-container-flip .swiper-slide-shadow-left,.swiper-container-flip .swiper-slide-shadow-right,.swiper-container-flip .swiper-slide-shadow-top{z-index:0;-webkit-backface-visibility:hidden;backface-visibility:hidden}


#popup h2 {
display: none;
}

.popup {
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.5);
  z-index: 9999999999999999;
  display: -webkit-box;
  display: -moz-box;
  display: -ms-flexbox;
  display: -webkit-flex;
  display: flex;  
  align-items: center;
  align-content: center;
  justify-content: center;
}

.popup > div  {
  background: white;
  max-width: 500px;
  margin: auto;
  padding: 40px;
  position: relative;
}

.popup > div img {
  width: 100%;
  max-width: 100%;
  height: auto;
}

.popup .fechar-popup {
  position: absolute;
  top: -15px;
  right: -15px;
  width: 30px;
  height: 30px;
  background: red;
  border-radius: 50%;
  text-align: center;
  color: white;
  cursor: pointer;
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

</style>

