<style>
/*********************************/
/*** MENUS ***********************/
/*********************************/
.sm{box-sizing:border-box;position:relative;z-index:9999;-webkit-tap-highlight-color:rgba(0,0,0,0);}
.sm,.sm ul,.sm li{display:block;list-style:none;margin:0;padding:0;line-height:normal;direction:ltr;text-align:left;}
.sm-rtl,.sm-rtl ul,.sm-rtl li{direction:rtl;text-align:right;}
.sm>li>h1,.sm>li>h2,.sm>li>h3,.sm>li>h4,.sm>li>h5,.sm>li>h6{margin:0;padding:0;}
.sm ul{display:none;}
.sm li,.sm a{position:relative;}
.sm a{display:block;}
.sm a.disabled{cursor:default;}
.sm::after{content:"";display:block;height:0;font:0px/0 serif;clear:both;overflow:hidden;}
.sm *,.sm *::before,.sm *::after{box-sizing:inherit;}
/*m-inst*/
.sm-inst {
  background: white;
  width: 100%;
}
.sm-inst a, .sm-inst a:hover, .sm-inst a:focus, .sm-inst a:active {
  padding: 4px 20px;
  padding-right: 58px;
  font-size: 12px;
  font-weight: normal;
  line-height: 17px;
  text-decoration: none;
  text-transform: uppercase;
  color: #777;
}
.sm-inst a.current {
  color: white;
}
.sm-inst a.disabled {
  color:white;
}
.sm-inst a .sub-arrow {
  position: absolute;
  top: 50%;
  margin-top: -17px;
  left: auto;
  right: 4px;
  width: 34px;
  height: 34px;
  overflow: hidden;
  font: bold 16px/34px monospace !important;
  text-align: center;
  text-shadow: none;
  background: rgba(255, 255, 255, 0.5);
  border-radius: 5px;
}
.sm-inst a .sub-arrow::before {
  content: '+';
}
.sm-inst a.highlighted .sub-arrow::before {
  content: '-';
}
.sm-inst > li:first-child > a, .sm-inst > li:first-child > :not(ul) a {
  border-radius: 5px 5px 0 0;
}
.sm-inst > li:last-child > a, .sm-inst > li:last-child > *:not(ul) a, .sm-inst > li:last-child > ul, .sm-inst > li:last-child > ul > li:last-child > a, .sm-inst > li:last-child > ul > li:last-child > *:not(ul) a, .sm-inst > li:last-child > ul > li:last-child > ul, .sm-inst > li:last-child > ul > li:last-child > ul > li:last-child > a, .sm-inst > li:last-child > ul > li:last-child > ul > li:last-child > *:not(ul) a, .sm-inst > li:last-child > ul > li:last-child > ul > li:last-child > ul, .sm-inst > li:last-child > ul > li:last-child > ul > li:last-child > ul > li:last-child > a, .sm-inst > li:last-child > ul > li:last-child > ul > li:last-child > ul > li:last-child > *:not(ul) a, .sm-inst > li:last-child > ul > li:last-child > ul > li:last-child > ul > li:last-child > ul, .sm-inst > li:last-child > ul > li:last-child > ul > li:last-child > ul > li:last-child > ul > li:last-child > a, .sm-inst > li:last-child > ul > li:last-child > ul > li:last-child > ul > li:last-child > ul > li:last-child > *:not(ul) a, .sm-inst > li:last-child > ul > li:last-child > ul > li:last-child > ul > li:last-child > ul > li:last-child > ul {
  border-radius: 0 0 5px 5px;
}
.sm-inst > li:last-child > a.highlighted, .sm-inst > li:last-child > *:not(ul) a.highlighted, .sm-inst > li:last-child > ul > li:last-child > a.highlighted, .sm-inst > li:last-child > ul > li:last-child > *:not(ul) a.highlighted, .sm-inst > li:last-child > ul > li:last-child > ul > li:last-child > a.highlighted, .sm-inst > li:last-child > ul > li:last-child > ul > li:last-child > *:not(ul) a.highlighted, .sm-inst > li:last-child > ul > li:last-child > ul > li:last-child > ul > li:last-child > a.highlighted, .sm-inst > li:last-child > ul > li:last-child > ul > li:last-child > ul > li:last-child > *:not(ul) a.highlighted, .sm-inst > li:last-child > ul > li:last-child > ul > li:last-child > ul > li:last-child > ul > li:last-child > a.highlighted, .sm-inst > li:last-child > ul > li:last-child > ul > li:last-child > ul > li:last-child > ul > li:last-child > *:not(ul) a.highlighted {
  border-radius: 0;
}
.sm-inst li {
  border-top: 1px solid rgba(0, 0, 0, 0.05);
}
.sm-inst > li:first-child {
  border-top: 0;
}
.sm-inst ul {
  background: #052f5f;
}
.sm-inst ul a, .sm-inst ul a:hover, .sm-inst ul a:focus, .sm-inst ul a:active {
  font-size: 16px;
  border-left: 8px solid transparent;
}
.sm-inst ul ul a,
.sm-inst ul ul a:hover,
.sm-inst ul ul a:focus,
.sm-inst ul ul a:active {
  border-left: 16px solid transparent;
}
.sm-inst ul ul ul a,
.sm-inst ul ul ul a:hover,
.sm-inst ul ul ul a:focus,
.sm-inst ul ul ul a:active {
  border-left: 24px solid transparent;
}
.sm-inst ul ul ul ul a,
.sm-inst ul ul ul ul a:hover,
.sm-inst ul ul ul ul a:focus,
.sm-inst ul ul ul ul a:active {
  border-left: 32px solid transparent;
}
.sm-inst ul ul ul ul ul a,
.sm-inst ul ul ul ul ul a:hover,
.sm-inst ul ul ul ul ul a:focus,
.sm-inst ul ul ul ul ul a:active {
  border-left: 40px solid transparent;
}

@media (min-width: 768px) {

  .sm-inst {
    width: auto;
  }

  .sm-inst ul {
    position: absolute;
    width: 12em;
  }

  .sm-inst li {
    float: left;
  }

  .sm-inst.sm-rtl li {
    float: right;
  }

  .sm-inst ul li, .sm-inst.sm-rtl ul li, .sm-inst.sm-vertical li {
    float: none;
  }
  .sm-inst a {
    white-space: nowrap;
  }
  .sm-inst ul a, .sm-inst.sm-vertical a {
    white-space: normal;
  }

  .sm-inst .sm-nowrap > li > a, .sm-inst .sm-nowrap > li > :not(ul) a {
    white-space: nowrap;
  }
  .sm-inst {
    padding: 0 10px;
    background: transparent;

  }
  .sm-inst a, .sm-inst a:hover, .sm-inst a:focus, .sm-inst a:active, .sm-inst a.highlighted {
    padding: 4px 12px;
    padding-top: 6px;
    border-radius: 0 !important;
    color: white;
  }
  .sm-inst a:hover, .sm-inst a:focus, .sm-inst a:active, .sm-inst a.highlighted {
    color: #00adefff;
  }
  .sm-inst a.current {
    color: white;
  }
  .sm-inst a.disabled {
    color: white;
  }
  .sm-inst a.has-submenu {
    padding-right: 24px;
  }
  .sm-inst a .sub-arrow {
    top: 50%;
    margin-top: -2px;
    right: 12px;
    width: 0;
    height: 0;
    border-width: 4px;
    border-style: solid dashed dashed dashed;
    border-color: #555555 transparent transparent transparent;
    background: transparent;
    border-radius: 0;
  }
  .sm-inst a .sub-arrow::before {
    display: none;
  }
  .sm-inst li {
    border-top: 0;
  }
  .sm-inst > li > ul::before,
  .sm-inst > li > ul::after {
    content: '';
    position: absolute;
    top: -18px;
    left: 30px;
    width: 0;
    height: 0;
    overflow: hidden;
    border-width: 9px;
    border-style: dashed dashed solid dashed;
    border-color: transparent transparent #bbbbbb transparent;
  }
  .sm-inst > li > ul::after {
    top: -16px;
    left: 31px;
    border-width: 8px;
    border-color: transparent transparent #fff transparent;
  }
  .sm-inst ul {
    border: 1px solid #bbbbbb;
    padding: 5px 0;
    background: #fff;
    border-radius: 5px !important;
    box-shadow: 0 5px 9px rgba(0, 0, 0, 0.2);
  }
  .sm-inst ul a, .sm-inst ul a:hover, .sm-inst ul a:focus, .sm-inst ul a:active, .sm-inst ul a.highlighted {
    border: 0 !important;
    padding: 10px 20px;
    color: #555555;
  }
  .sm-inst ul a:hover, .sm-inst ul a:focus, .sm-inst ul a:active, .sm-inst ul a.highlighted {
    background: #eeeeee;
    color: #D23600;
  }
  .sm-inst ul a.current {
    color: #D23600;
  }
  .sm-inst ul a.disabled {
    background: #fff;
    color: #cccccc;
  }
  .sm-inst ul a.has-submenu {
    padding-right: 20px;
  }
  .sm-inst ul a .sub-arrow {
    right: 8px;
    top: 50%;
    margin-top: -5px;
    border-width: 5px;
    border-style: dashed dashed dashed solid;
    border-color: transparent transparent transparent #555555;
  }
  .sm-inst .scroll-up,
  .sm-inst .scroll-down {
    position: absolute;
    display: none;
    visibility: hidden;
    overflow: hidden;
    background: #fff;
    height: 20px;
  }
  .sm-inst .scroll-up:hover,
  .sm-inst .scroll-down:hover {
    background: #eeeeee;
  }
  .sm-inst .scroll-up:hover .scroll-up-arrow {
    border-color: transparent transparent #D23600 transparent;
  }
  .sm-inst .scroll-down:hover .scroll-down-arrow {
    border-color: #D23600 transparent transparent transparent;
  }
  .sm-inst .scroll-up-arrow,
  .sm-inst .scroll-down-arrow {
    position: absolute;
    top: 0;
    left: 50%;
    margin-left: -6px;
    width: 0;
    height: 0;
    overflow: hidden;
    border-width: 6px;
    border-style: dashed dashed solid dashed;
    border-color: transparent transparent #555555 transparent;
  }
  .sm-inst .scroll-down-arrow {
    top: 8px;
    border-style: solid dashed dashed dashed;
    border-color: #555555 transparent transparent transparent;
  }
}


/*m-rodape*/
.sm-rodape {
  background: transparent;
  width: 100%;
}
.sm-rodape a, .sm-rodape a:hover, .sm-rodape a:focus, .sm-rodape a:active {
  padding: 4px 20px;
  padding-left: 0;
  padding-right: 58px;
  font-size: 12px;
  font-weight: normal;
  line-height: 17px;
  text-decoration: none;
  text-transform: uppercase;
  color: white;
  background-color: transparent;
  text-align: left;
}
.sm-rodape a.current {
  color: white;
}
.sm-rodape a.disabled {
  color:white;
}
.sm-rodape a .sub-arrow {
  position: absolute;
  top: 50%;
  margin-top: -17px;
  left: auto;
  right: 4px;
  width: 34px;
  height: 34px;
  overflow: hidden;
  font: bold 16px/34px monospace !important;
  text-align: center;
  text-shadow: none;
  background: rgba(255, 255, 255, 0.5);
  border-radius: 5px;
}
.sm-rodape a .sub-arrow::before {
  content: '+';
}
.sm-rodape a.highlighted .sub-arrow::before {
  content: '-';
}
.sm-rodape > li:first-child > a, .sm-rodape > li:first-child > :not(ul) a {
  border-radius: 5px 5px 0 0;
}
.sm-rodape > li:last-child > a, .sm-rodape > li:last-child > *:not(ul) a, .sm-rodape > li:last-child > ul, .sm-rodape > li:last-child > ul > li:last-child > a, .sm-rodape > li:last-child > ul > li:last-child > *:not(ul) a, .sm-rodape > li:last-child > ul > li:last-child > ul, .sm-rodape > li:last-child > ul > li:last-child > ul > li:last-child > a, .sm-rodape > li:last-child > ul > li:last-child > ul > li:last-child > *:not(ul) a, .sm-rodape > li:last-child > ul > li:last-child > ul > li:last-child > ul, .sm-rodape > li:last-child > ul > li:last-child > ul > li:last-child > ul > li:last-child > a, .sm-rodape > li:last-child > ul > li:last-child > ul > li:last-child > ul > li:last-child > *:not(ul) a, .sm-rodape > li:last-child > ul > li:last-child > ul > li:last-child > ul > li:last-child > ul, .sm-rodape > li:last-child > ul > li:last-child > ul > li:last-child > ul > li:last-child > ul > li:last-child > a, .sm-rodape > li:last-child > ul > li:last-child > ul > li:last-child > ul > li:last-child > ul > li:last-child > *:not(ul) a, .sm-rodape > li:last-child > ul > li:last-child > ul > li:last-child > ul > li:last-child > ul > li:last-child > ul {
  border-radius: 0 0 5px 5px;
}
.sm-rodape > li:last-child > a.highlighted, .sm-rodape > li:last-child > *:not(ul) a.highlighted, .sm-rodape > li:last-child > ul > li:last-child > a.highlighted, .sm-rodape > li:last-child > ul > li:last-child > *:not(ul) a.highlighted, .sm-rodape > li:last-child > ul > li:last-child > ul > li:last-child > a.highlighted, .sm-rodape > li:last-child > ul > li:last-child > ul > li:last-child > *:not(ul) a.highlighted, .sm-rodape > li:last-child > ul > li:last-child > ul > li:last-child > ul > li:last-child > a.highlighted, .sm-rodape > li:last-child > ul > li:last-child > ul > li:last-child > ul > li:last-child > *:not(ul) a.highlighted, .sm-rodape > li:last-child > ul > li:last-child > ul > li:last-child > ul > li:last-child > ul > li:last-child > a.highlighted, .sm-rodape > li:last-child > ul > li:last-child > ul > li:last-child > ul > li:last-child > ul > li:last-child > *:not(ul) a.highlighted {
  border-radius: 0;
}
.sm-rodape li {
  border-top: 1px solid rgba(0, 0, 0, 0.05);
}
.sm-rodape > li:first-child {
  border-top: 0;
}
.sm-rodape ul {
  background: #052f5f;
}
.sm-rodape ul a, .sm-rodape ul a:hover, .sm-rodape ul a:focus, .sm-rodape ul a:active {
  font-size: 16px;
  border-left: 8px solid transparent;
}
.sm-rodape ul ul a,
.sm-rodape ul ul a:hover,
.sm-rodape ul ul a:focus,
.sm-rodape ul ul a:active {
  border-left: 16px solid transparent;
}
.sm-rodape ul ul ul a,
.sm-rodape ul ul ul a:hover,
.sm-rodape ul ul ul a:focus,
.sm-rodape ul ul ul a:active {
  border-left: 24px solid transparent;
}
.sm-rodape ul ul ul ul a,
.sm-rodape ul ul ul ul a:hover,
.sm-rodape ul ul ul ul a:focus,
.sm-rodape ul ul ul ul a:active {
  border-left: 32px solid transparent;
}
.sm-rodape ul ul ul ul ul a,
.sm-rodape ul ul ul ul ul a:hover,
.sm-rodape ul ul ul ul ul a:focus,
.sm-rodape ul ul ul ul ul a:active {
  border-left: 40px solid transparent;
}

@media (min-width: 768px) {

  .sm-rodape {
    width: auto;
  }

  .sm-rodape ul {
    position: absolute;
    width: 12em;
  }

  .sm-rodape li {
    float: left;
  }

  .sm-rodape.sm-rtl li {
    float: right;
  }

  .sm-rodape ul li, .sm-rodape.sm-rtl ul li, .sm-rodape.sm-vertical li {
    float: none;
  }
  .sm-rodape a {
    white-space: nowrap;
  }
  .sm-rodape ul a, .sm-rodape.sm-vertical a {
    white-space: normal;
  }

  .sm-rodape .sm-nowrap > li > a, .sm-rodape .sm-nowrap > li > :not(ul) a {
    white-space: nowrap;
  }
  .sm-rodape {
    padding: 0 10px;
    background: transparent;

  }
  .sm-rodape a, .sm-rodape a:hover, .sm-rodape a:focus, .sm-rodape a:active, .sm-rodape a.highlighted {
    padding: 4px 12px;
    padding-top: 6px;
    border-radius: 0 !important;
  }
  .sm-rodape a:hover, .sm-rodape a:focus, .sm-rodape a:active, .sm-rodape a.highlighted {
    color: #00adefff;
  }
  .sm-rodape a.current {
    color: white;
  }
  .sm-rodape a.disabled {
    color: white;
  }
  .sm-rodape a.has-submenu {
    padding-right: 24px;
  }
  .sm-rodape a .sub-arrow {
    top: 50%;
    margin-top: -2px;
    right: 12px;
    width: 0;
    height: 0;
    border-width: 4px;
    border-style: solid dashed dashed dashed;
    border-color: #555555 transparent transparent transparent;
    background: transparent;
    border-radius: 0;
  }
  .sm-rodape a .sub-arrow::before {
    display: none;
  }
  .sm-rodape li {
    border-top: 0;
  }
  .sm-rodape > li > ul::before,
  .sm-rodape > li > ul::after {
    content: '';
    position: absolute;
    top: -18px;
    left: 30px;
    width: 0;
    height: 0;
    overflow: hidden;
    border-width: 9px;
    border-style: dashed dashed solid dashed;
    border-color: transparent transparent #bbbbbb transparent;
  }
  .sm-rodape > li > ul::after {
    top: -16px;
    left: 31px;
    border-width: 8px;
    border-color: transparent transparent #fff transparent;
  }
  .sm-rodape ul {
    border: 1px solid #bbbbbb;
    padding: 5px 0;
    background: #fff;
    border-radius: 5px !important;
    box-shadow: 0 5px 9px rgba(0, 0, 0, 0.2);
  }
  .sm-rodape ul a, .sm-rodape ul a:hover, .sm-rodape ul a:focus, .sm-rodape ul a:active, .sm-rodape ul a.highlighted {
    border: 0 !important;
    padding: 10px 20px;
    color: #555555;
  }
  .sm-rodape ul a:hover, .sm-rodape ul a:focus, .sm-rodape ul a:active, .sm-rodape ul a.highlighted {
    background: #eeeeee;
    color: #D23600;
  }
  .sm-rodape ul a.current {
    color: #D23600;
  }
  .sm-rodape ul a.disabled {
    background: #fff;
    color: #cccccc;
  }
  .sm-rodape ul a.has-submenu {
    padding-right: 20px;
  }
  .sm-rodape ul a .sub-arrow {
    right: 8px;
    top: 50%;
    margin-top: -5px;
    border-width: 5px;
    border-style: dashed dashed dashed solid;
    border-color: transparent transparent transparent #555555;
  }
  .sm-rodape .scroll-up,
  .sm-rodape .scroll-down {
    position: absolute;
    display: none;
    visibility: hidden;
    overflow: hidden;
    background: #fff;
    height: 20px;
  }
  .sm-rodape .scroll-up:hover,
  .sm-rodape .scroll-down:hover {
    background: #eeeeee;
  }
  .sm-rodape .scroll-up:hover .scroll-up-arrow {
    border-color: transparent transparent #D23600 transparent;
  }
  .sm-rodape .scroll-down:hover .scroll-down-arrow {
    border-color: #D23600 transparent transparent transparent;
  }
  .sm-rodape .scroll-up-arrow,
  .sm-rodape .scroll-down-arrow {
    position: absolute;
    top: 0;
    left: 50%;
    margin-left: -6px;
    width: 0;
    height: 0;
    overflow: hidden;
    border-width: 6px;
    border-style: dashed dashed solid dashed;
    border-color: transparent transparent #555555 transparent;
  }
  .sm-rodape .scroll-down-arrow {
    top: 8px;
    border-style: solid dashed dashed dashed;
    border-color: #555555 transparent transparent transparent;
  }
}

/*m-cat*/
.sm-cat {
  background: white;
  width: 100%;
}
.sm-cat a, .sm-cat a:hover, .sm-cat a:focus, .sm-cat a:active {
  padding: 10px 15px;
  padding-right: 58px;
  font-weight: 700;
  line-height: 17px;
  text-decoration: none;
  background: dodgerblue;
  color: white;
  text-transform: uppercase;
}
.sm-cat a.current {
  color: #D23600;
}
.sm-cat a.disabled {
  color: #bbbbbb;
}
.sm-cat a .sub-arrow {
  position: absolute;
  top: 50%;
  margin-top: -17px;
  left: auto;
  right: 4px;
  width: 34px;
  height: 34px;
  overflow: hidden;
  font: bold 16px/34px monospace !important;
  text-align: center;
  text-shadow: none;
  background: rgba(255, 255, 255, 0.5);
  border-radius: 5px;
}
.sm-cat a .sub-arrow::before {
  content: '+';
}
.sm-cat a.highlighted .sub-arrow::before {
  content: '-';
}
.sm-cat > li:first-child > a, .sm-cat > li:first-child > :not(ul) a {
  border-radius: 5px 5px 0 0;
}
.sm-cat > li:last-child > a, .sm-cat > li:last-child > *:not(ul) a, .sm-cat > li:last-child > ul, .sm-cat > li:last-child > ul > li:last-child > a, .sm-cat > li:last-child > ul > li:last-child > *:not(ul) a, .sm-cat > li:last-child > ul > li:last-child > ul, .sm-cat > li:last-child > ul > li:last-child > ul > li:last-child > a, .sm-cat > li:last-child > ul > li:last-child > ul > li:last-child > *:not(ul) a, .sm-cat > li:last-child > ul > li:last-child > ul > li:last-child > ul, .sm-cat > li:last-child > ul > li:last-child > ul > li:last-child > ul > li:last-child > a, .sm-cat > li:last-child > ul > li:last-child > ul > li:last-child > ul > li:last-child > *:not(ul) a, .sm-cat > li:last-child > ul > li:last-child > ul > li:last-child > ul > li:last-child > ul, .sm-cat > li:last-child > ul > li:last-child > ul > li:last-child > ul > li:last-child > ul > li:last-child > a, .sm-cat > li:last-child > ul > li:last-child > ul > li:last-child > ul > li:last-child > ul > li:last-child > *:not(ul) a, .sm-cat > li:last-child > ul > li:last-child > ul > li:last-child > ul > li:last-child > ul > li:last-child > ul {
  border-radius: 0 0 5px 5px;
}
.sm-cat > li:last-child > a.highlighted, .sm-cat > li:last-child > *:not(ul) a.highlighted, .sm-cat > li:last-child > ul > li:last-child > a.highlighted, .sm-cat > li:last-child > ul > li:last-child > *:not(ul) a.highlighted, .sm-cat > li:last-child > ul > li:last-child > ul > li:last-child > a.highlighted, .sm-cat > li:last-child > ul > li:last-child > ul > li:last-child > *:not(ul) a.highlighted, .sm-cat > li:last-child > ul > li:last-child > ul > li:last-child > ul > li:last-child > a.highlighted, .sm-cat > li:last-child > ul > li:last-child > ul > li:last-child > ul > li:last-child > *:not(ul) a.highlighted, .sm-cat > li:last-child > ul > li:last-child > ul > li:last-child > ul > li:last-child > ul > li:last-child > a.highlighted, .sm-cat > li:last-child > ul > li:last-child > ul > li:last-child > ul > li:last-child > ul > li:last-child > *:not(ul) a.highlighted {
  border-radius: 0;
}
.sm-cat li {
  border-top: 1px solid rgba(0, 0, 0, 0.05);
}
.sm-cat > li:first-child {
  border-top: 0;
}
.sm-cat ul {
  background: white;
}
.sm-cat ul a, .sm-cat ul a:hover, .sm-cat ul a:focus, .sm-cat ul a:active {
  font-size: 16px;
  border-left: 8px solid transparent;
}
.sm-cat ul ul a,
.sm-cat ul ul a:hover,
.sm-cat ul ul a:focus,
.sm-cat ul ul a:active {
  border-left: 16px solid transparent;
}
.sm-cat ul ul ul a,
.sm-cat ul ul ul a:hover,
.sm-cat ul ul ul a:focus,
.sm-cat ul ul ul a:active {
  border-left: 24px solid transparent;
}
.sm-cat ul ul ul ul a,
.sm-cat ul ul ul ul a:hover,
.sm-cat ul ul ul ul a:focus,
.sm-cat ul ul ul ul a:active {
  border-left: 32px solid transparent;
}
.sm-cat ul ul ul ul ul a,
.sm-cat ul ul ul ul ul a:hover,
.sm-cat ul ul ul ul ul a:focus,
.sm-cat ul ul ul ul ul a:active {
  border-left: 40px solid transparent;
}

@media (min-width: 768px) {

  .sm-cat {
    width: auto;
    background: transparent;
  }

  .sm-cat ul {
    position: absolute;
    width: 12em;
    background: white
  }

  .sm-cat li {
    float: left;
  }

  .sm-cat.sm-rtl li {
    float: right;
  }

  .sm-cat ul li, .sm-cat.sm-rtl ul li, .sm-cat.sm-vertical li {
    float: none;
  }
  .sm-cat a {
    white-space: nowrap;
  }
  .sm-cat ul a, .sm-cat.sm-vertical a {
    white-space: normal;
  }

  .sm-cat .sm-nowrap > li > a, .sm-cat .sm-nowrap > li > :not(ul) a {
    white-space: nowrap;
  }
  .sm-cat {
    padding: 0 10px;
  }
  .sm-cat a, .sm-cat a:hover, .sm-cat a:focus, .sm-cat a:active, .sm-cat a.highlighted {
    padding: 15px 12px;
    border-radius: 0 !important;
    margin-right: 1px;
  }
  .sm-cat a:hover, .sm-cat a:focus, .sm-cat a:active, .sm-cat a.highlighted {
    color: gold;
    background: deeppink;
  }
  .sm-cat a.current {
    color: #D23600;
  }
  .sm-cat a.disabled {
    color: #bbbbbb;
  }
  .sm-cat a.has-submenu {
    padding-right: 24px;
  }
  .sm-cat a .sub-arrow {
    top: 50%;
    margin-top: -2px;
    right: 12px;
    width: 0;
    height: 0;
    border-width: 4px;
    border-style: solid dashed dashed dashed;
    border-color: white transparent transparent transparent;
    background: transparent;
    border-radius: 0;
  }
  .sm-cat a .sub-arrow::before {
    display: none;
  }
  .sm-cat li {
    border-top: 0;
  }
  .sm-cat > li > ul::before,
  .sm-cat > li > ul::after {
    content: '';
    position: absolute;
    top: -18px;
    left: 30px;
    width: 0;
    height: 0;
    overflow: hidden;
    border-width: 9px;
    border-style: dashed dashed solid dashed;
    border-color: transparent transparent #bbbbbb transparent;
  }
  .sm-cat > li > ul::after {
    top: -16px;
    left: 31px;
    border-width: 8px;
    border-color: transparent transparent #fff transparent;
  }
  .sm-cat ul {
    border: 1px solid #bbbbbb;
    padding: 5px 0;
    background: #fff;
    border-radius: 5px !important;
    box-shadow: 0 5px 9px rgba(0, 0, 0, 0.2);
  }
  .sm-cat ul a, .sm-cat ul a:hover, .sm-cat ul a:focus, .sm-cat ul a:active, .sm-cat ul a.highlighted {
    border: 0 !important;
    padding: 5px 20px;
    color: #555555;
  }
  .sm-cat ul a:hover, .sm-cat ul a:focus, .sm-cat ul a:active, .sm-cat ul a.highlighted {
    background: transparent;
    color: 00adefff;
  }
  .sm-cat ul a.current {
    color: #D23600;
  }
  .sm-cat ul a.disabled {
    background: #fff;
    color: #cccccc;
  }
  .sm-cat ul a.has-submenu {
    padding-right: 20px;
  }
  .sm-cat ul a .sub-arrow {
    right: 8px;
    top: 50%;
    margin-top: -5px;
    border-width: 5px;
    border-style: dashed dashed dashed solid;
    border-color: transparent transparent transparent #555555;
  }
  .sm-cat .scroll-up,
  .sm-cat .scroll-down {
    position: absolute;
    display: none;
    visibility: hidden;
    overflow: hidden;
    background: #fff;
    height: 20px;
  }
  .sm-cat .scroll-up:hover,
  .sm-cat .scroll-down:hover {
    background: #eeeeee;
  }
  .sm-cat .scroll-up:hover .scroll-up-arrow {
    border-color: transparent transparent #D23600 transparent;
  }
  .sm-cat .scroll-down:hover .scroll-down-arrow {
    border-color: #D23600 transparent transparent transparent;
  }
  .sm-cat .scroll-up-arrow,
  .sm-cat .scroll-down-arrow {
    position: absolute;
    top: 0;
    left: 50%;
    margin-left: -6px;
    width: 0;
    height: 0;
    overflow: hidden;
    border-width: 6px;
    border-style: dashed dashed solid dashed;
    border-color: transparent transparent #555555 transparent;
  }
  .sm-cat .scroll-down-arrow {
    top: 8px;
    border-style: solid dashed dashed dashed;
    border-color: #555555 transparent transparent transparent;
  }
  .sm-cat.sm-rtl a.has-submenu {
    padding-right: 12px;
    padding-left: 24px;
  }
  .sm-cat.sm-rtl a .sub-arrow {
    right: auto;
    left: 12px;
  }
  .sm-cat.sm-rtl.sm-vertical a.has-submenu {
    padding: 10px 20px;
  }
  .sm-cat.sm-rtl.sm-vertical a .sub-arrow {
    right: auto;
    left: 8px;
    border-style: dashed solid dashed dashed;
    border-color: transparent #555555 transparent transparent;
  }
  .sm-cat.sm-rtl > li > ul::before {
    left: auto;
    right: 30px;
  }
  .sm-cat.sm-rtl > li > ul::after {
    left: auto;
    right: 31px;
  }
  .sm-cat.sm-rtl ul a.has-submenu {
    padding: 10px 20px !important;
  }
  .sm-cat.sm-rtl ul a .sub-arrow {
    right: auto;
    left: 8px;
    border-style: dashed solid dashed dashed;
    border-color: transparent #555555 transparent transparent;
  }
  .sm-cat.sm-vertical {
    padding: 10px 0;
    border-radius: 5px;
  }
  .sm-cat.sm-vertical a {
    padding: 10px 20px;
  }
  .sm-cat.sm-vertical a:hover, .sm-cat.sm-vertical a:focus, .sm-cat.sm-vertical a:active, .sm-cat.sm-vertical a.highlighted {
    background: #fff;
  }
  .sm-cat.sm-vertical a.disabled {
    background: #eeeeee;
  }
  .sm-cat.sm-vertical a .sub-arrow {
    right: 8px;
    top: 50%;
    margin-top: -5px;
    border-width: 5px;
    border-style: dashed dashed dashed solid;
    border-color: transparent transparent transparent #555555;
  }
  .sm-cat.sm-vertical > li > ul::before,
  .sm-cat.sm-vertical > li > ul::after {
    display: none;
  }
  .sm-cat.sm-vertical ul a {
    padding: 10px 20px;
  }
  .sm-cat.sm-vertical ul a:hover, .sm-cat.sm-vertical ul a:focus, .sm-cat.sm-vertical ul a:active, .sm-cat.sm-vertical ul a.highlighted {
    background: #eeeeee;
  }
  .sm-cat.sm-vertical ul a.disabled {
    background: #fff;
  }


}
/*********************************/
/* FIM MENUS *********************/
/*********************************/
</style>