<div class="menutao">
	<?php echo $menutao ?>
</div>

<style>

.menutao ul {
  padding: 0;
  margin: 0;
  list-style: none;
  background-color: aliceblue;
} 

.menutao > ul a {
  background-color: #5499C7;
  border-bottom: 1px solid #cae1ff;
  color: white;
  font-weight: 400;
} 

.menutao > ul a:hover {
  background-color: #e9ecef!important;
} 

.menutao > ul a:hover {
  background-color: #5499C7;
  opacity: 0px;
} 
.menutao > ul ul a {
  font-weight: normal;
  background-color: white;
  color: black;
  text-transform: none;
  border: 0;
} 

.menutao > ul ul a:hover {
  color: #5499C7;
} 

.menutao li {
  display: block;
  margin: 0;
} 
.menutao a {
  text-decoration: none;
  color: black;
  border-bottom: 1px solid aliceblue;
  display: block;
  margin: 0;
  padding: 2px 10px;
} 

.xmenutao li:nth-child(odd) a {
  background-color: #ddd;
} 

.menutao  {
  position: relative;
  width: 100%;
  max-width: 100%;
  top: 0;
}

.icones-menus {
  display: none; 
}

.icones-menus > div { 
  width: 40px;
  display: block;
  box-sizing: border-box;
  cursor: pointer;
}

.icone-tao { 
  width: 25px;
  height: 30px;
  border-top: 3px solid red; 
  box-sizing: border-box;
  padding: 5px;
  z-index: 9999;
  position: relative;
}

.icone-tao:before { 
  content: ""; 
  position: absolute; 
  top: 6px; 
  left: 0; 
  width: 100%;
  border-bottom: 3px solid red; 
}

.icone-tao:after { 
  content: ""; 
  position: absolute; 
  top: 15px; 
  left: 0; 
  width: 100%;
  border-bottom: 3px solid red; 
}

.menutao > ul a {
position: relative;
padding-left: 27px;
} 

.menutao > ul a:before {
position: absolute;
content: "";
border: 1px solid skyblue;
background: skyblue;
padding: 5px 8px;
left: 5px;
top: 8px;
border-radius: 2px;
} 

.menutao > ul  a:after {
  position: absolute;
content: "";
border: 1px solid skyblue;
background: skyblue;
padding: 0px 4px;
left: 7px;
top: 50%;
margin-top: -8px;
border-radius: 0 3px 0 0;
} 

.menutao > ul ul  a:before {
  border: 1px solid skyblue;
background: aliceblue;
} 

.menutao > ul ul a:after {
border: 1px solid skyblue;
background: #e9ecef;
} 

@media (max-width: 550px) {

  header {
    position: relative;
  }

  .menutao  {
    display: none;
    position: absolute;
    width: 100%;
    max-width: 100%;
    top: 50px;
    left: 0;
    z-index: 99999999999999999999999;
  }

  .icones-menus {
    display: flex; 
    align-items: center; 
    align-content: center; 
    justify-content: flex-end; 
    height: 40px;
    box-sizing: border-box;
    background-color: transparent;
    width: 30px;
    position: absolute;
    top: 5px;
    right: 5px;
    z-index: 999;
  }

  .icones-menus > div { 
    width: 40px;
    display: block;
    box-sizing: border-box;
    cursor: pointer;
  }

  .icone-tao { 
    width: 25px;
    height: 30px;
    border-top: 3px solid red; 
    box-sizing: border-box;
    padding: 5px;
    z-index: 9999;
    position: relative;
  }

  .icone-tao:before { 
    content: ""; 
    position: absolute; 
    top: 6px; 
    left: 0; 
    width: 100%;
    border-bottom: 3px solid blue; 
  }

  .icone-tao:after { 
    content: ""; 
    position: absolute; 
    top: 15px; 
    left: 0; 
    width: 100%;
    border-bottom: 3px solid green; 
  }





}

</style>

<script> 

  var i_tao = document.querySelector(".icone-tao"); 
  var m_tao = document.querySelector(".menutao"); 

  i_tao.addEventListener('click', function(event) { 

    if (m_tao.style.display === "none") { 
      m_tao.style.display = "block"; 
      m_cat.style.display = "none"; 
    } else {
     m_tao.style.display = "none"; 
   }  
 });

</script>