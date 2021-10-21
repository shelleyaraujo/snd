<style>

.cnt-modulo {
  width: 100%;
  max-width: 1024px;
  margin: 0 auto;
  padding: 0 15px;
}

#nav-accordion {
  width: 100%;
 display: flex;
 align-items: flex-start;
 align-content: flex-start;
 justify-content: flex-start; 
 flex-wrap: nowrap;
}

#nav-accordion  ul {
 margin: 0;
 padding: 0;
 list-style: none;
}

#nav-accordion  h2 {
 text-align: left;
 padding: 0;
 margin: 0;
}

#nav-accordion li {
  width: 100%;
  box-sizing: border-box;
}

#nav-accordion > ul {
 display: flex;
 justify-content: center; 
 align-items: center;
 align-content: center;
 flex-wrap: wrap;
}

#nav-accordion > ul ul {
 display: none;
 padding: 0;
}

#nav-accordion > ul a {
  display: block;
  width: 100%;
  background-color: white;
  box-sizing: border-box;
  padding: 10px;
}

#nav-accordion > ul ul a {
  display: block;
  background-color: black;
  box-sizing: border-box;
}

#nav-accordion > ul ul ul a {
  background-color: #5499C7;
}

#accordion li a:not(:only-child) {
  position: relative;
}

#accordion li a:not(:only-child):before {
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


#accordion  div{
  width: 100%;
  display: block;
  padding: 20px;
  background-color: #ebebeb;
  box-sizing: border-box;
  text-align: left;
}

#nav-accordion  h2{
  position: relative;
  padding-left: 20px;
  font-size: 16px;
}

#nav-accordion  h2:before {
 content: "";
 border-top: 5px solid green;
 border-bottom: 5px solid transparent;
 border-left: 5px solid transparent;
 border-right: 5px solid transparent;
 position: absolute;
 top: 50%;
 left: 0;
}

#accordion .editar {
  width: 20px!important;
  height: 20px!important;
  position: relative;
  background-color: yellow!important;
}

</style>
