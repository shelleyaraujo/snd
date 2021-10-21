<script>

  var menu = document.getElementById("mcatalogo"); 
  var ul = menu.querySelectorAll("li");

  for (var i = 0; i < ul.length; i++) {
    ul[i].setAttribute("id", "m"+i+"");
    if (window.matchMedia("(max-width: 550px)").matches) {
      ul[i].setAttribute("onclick", "exibir('m" +i+ "')");
    } else {
      ul[i].setAttribute("onmouseover", "exibir('m" +i+ "')");
    }

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
        /*a[0].setAttribute("href", "javascript: void(0)");*/
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
