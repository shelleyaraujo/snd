<header>

<div class="topo2 row">
    <div class="two columns a">
      <a id="logo" href="/" title="<?php echo $GLOBALS['sitename'] ?>"><img id="logo" src="<?php echo myUrl("./imagens/logo.png")?>" alt="<?php echo $GLOBALS['sitename'] ?>" width="300" height="100" title="<?php echo $GLOBALS['sitename'] ?>"></a>
  </div>
  <div class="five columns b">

<div class="descricao">
    <?php echo $destaques_fixos["descricao"]; ?>
</div>
</div>

</div>

</header>


<style>

#form-busca * {
    border: 0;
}

#form-busca input {
    border: 1px solid silver;;
}

header { 
    border-bottom: 1px solid silver;
    background:  white;
    /*background-image: linear-gradient(to right, #82d3ef, #83d1ee, #84cfec, #84cdeb, #85cbe9, #8acce8, #8fcee8, #94cfe7, #9fd4e7, #aad8e8, #b5dde9, #c0e1ea);*/
}

.descricao {
    color: dodgerblue;
    font-family: 'Kaushan Script', cursive;
    font-size: 30px;
}

/*icones topo*/

.icones-topo {
    display: block;
    display: -moz-box;
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;
    align-content: center;
    align-items: center;
    justify-content: space-between;
    flex-wrap: nowrap;
    padding: 5px 10px;
}

.icones-topo > div {
    position: relative;
    width: 20px;
    height: 30px;
    display: block;
    cursor: pointer;
}

.icones-topo a {
    color: transparent;
}

.icones-topo .i-menu:before {
    content: "";
    position: absolute;
    top: 6px;
    left: 0;
    padding: 9px;
    background-position: center;
    background-repeat: no-repeat;
    background-size: 100%;
    background-image: url("data:image/svg+xml,%3C%3Fxml version='1.0'%3F%3E%3Csvg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns:svgjs='http://svgjs.com/svgjs' version='1.1' width='512' height='512' x='0' y='0' viewBox='0 0 341.333 341.333' style='enable-background:new 0 0 512 512' xml:space='preserve' class=''%3E%3Cg%3E%3Cg xmlns='http://www.w3.org/2000/svg'%3E%3Cg%3E%3Crect y='277.333' width='341.333' height='42.667' fill='%23264653' data-original='%23000000' style='' class=''/%3E%3C/g%3E%3C/g%3E%3Cg xmlns='http://www.w3.org/2000/svg'%3E%3Cg%3E%3Crect y='149.333' width='341.333' height='42.667' fill='%23264653' data-original='%23000000' style='' class=''/%3E%3C/g%3E%3C/g%3E%3Cg xmlns='http://www.w3.org/2000/svg'%3E%3Cg%3E%3Crect y='21.333' width='341.333' height='42.667' fill='%23264653' data-original='%23000000' style='' class=''/%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/svg%3E%0A"); 	}

    .icones-topo .i-tel:before {
     content: "";
     position: absolute;
     top: 7px;
     left: 0;
     padding: 8px;
     background-position: center;
     background-repeat: no-repeat;
     background-size: 100%;
     background-image: url(data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZlcnNpb249IjEuMSIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbG5zOnN2Z2pzPSJodHRwOi8vc3ZnanMuY29tL3N2Z2pzIiB3aWR0aD0iNTEyIiBoZWlnaHQ9IjUxMiIgeD0iMCIgeT0iMCIgdmlld0JveD0iMCAwIDUxMi4wMjEgNTEyLjAyMSIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNTEyIDUxMiIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgY2xhc3M9IiI+PGc+PGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cGF0aCBkPSJtMzY3Ljk4OCA1MTIuMDIxYy0xNi41MjggMC0zMi45MTYtMi45MjItNDguOTQxLTguNzQ0LTcwLjU5OC0yNS42NDYtMTM2LjEyOC02Ny40MTYtMTg5LjUwOC0xMjAuNzk1cy05NS4xNS0xMTguOTEtMTIwLjc5NS0xODkuNTA4Yy04LjI0MS0yMi42ODgtMTAuNjczLTQ2LjEwOC03LjIyNi02OS42MTIgMy4yMjktMjIuMDE2IDExLjc1Ny00My4zODkgMjQuNjYzLTYxLjgwOSAxMi45NjMtMTguNTAxIDMwLjI0NS0zMy44ODkgNDkuOTc3LTQ0LjUgMjEuMDQyLTExLjMxNSA0NC4wMDktMTcuMDUzIDY4LjI2NS0xNy4wNTMgNy41NDQgMCAxNC4wNjQgNS4yNzEgMTUuNjQ1IDEyLjY0N2wyNS4xMTQgMTE3LjE5OWMxLjEzNyA1LjMwNy0uNDk0IDEwLjgyOS00LjMzMSAxNC42NjdsLTQyLjkxMyA0Mi45MTJjNDAuNDgyIDgwLjQ4NiAxMDYuMTcgMTQ2LjE3NCAxODYuNjU2IDE4Ni42NTZsNDIuOTEyLTQyLjkxM2MzLjgzOC0zLjgzNyA5LjM2MS01LjQ2NiAxNC42NjctNC4zMzFsMTE3LjE5OSAyNS4xMTRjNy4zNzcgMS41ODEgMTIuNjQ3IDguMTAxIDEyLjY0NyAxNS42NDUgMCAyNC4yNTYtNS43MzggNDcuMjI0LTE3LjA1NCA2OC4yNjYtMTAuNjExIDE5LjczMi0yNS45OTkgMzcuMDE0LTQ0LjUgNDkuOTc3LTE4LjQxOSAxMi45MDYtMzkuNzkyIDIxLjQzNC02MS44MDkgMjQuNjYzLTYuODk5IDEuMDEzLTEzLjc5NyAxLjUxOC0yMC42NjggMS41MTl6bS0yMzYuMzQ5LTQ3OS4zMjFjLTMxLjk5NSAzLjUzMi02MC4zOTMgMjAuMzAyLTc5LjI1MSA0Ny4yMTctMjEuMjA2IDMwLjI2NS0yNi4xNTEgNjcuNDktMTMuNTY3IDEwMi4xMzIgNDkuMzA0IDEzNS43MjYgMTU1LjQyNSAyNDEuODQ3IDI5MS4xNTEgMjkxLjE1MSAzNC42NDEgMTIuNTg0IDcxLjg2NiA3LjY0IDEwMi4xMzItMTMuNTY3IDI2LjkxNS0xOC44NTggNDMuNjg1LTQ3LjI1NiA0Ny4yMTctNzkuMjUxbC05NS4zNDEtMjAuNDMtNDQuODE2IDQ0LjgxNmMtNC43NjkgNC43NjktMTIuMDE1IDYuMDM2LTE4LjExNyAzLjE2OC05NS4xOS00NC43Mi0xNzIuMjQyLTEyMS43NzItMjE2Ljk2Mi0yMTYuOTYyLTIuODY3LTYuMTAzLTEuNjAxLTEzLjM0OSAzLjE2OC0xOC4xMTdsNDQuODE2LTQ0LjgxNnoiIGZpbGw9IiMwMDAwMDAiIGRhdGEtb3JpZ2luYWw9IiMwMDAwMDAiIHN0eWxlPSIiIGNsYXNzPSIiPjwvcGF0aD48L2c+PC9nPjwvc3ZnPg==)
 }

 .icones-topo .i-whats:before {
     content: "";
     position: absolute;
     top: 7px;
     left: 0;
     padding: 8px;
     background-position: center;
     background-repeat: no-repeat;
     background-size: 100%;
     background-image: url("data:image/svg+xml,%3C%3Fxml version='1.0'%3F%3E%3Csvg xmlns='http://www.w3.org/2000/svg' height='512px' viewBox='0 0 512 512' width='512px' class=''%3E%3Cg%3E%3Cpath d='m435.921875 74.351562c-48.097656-47.917968-112.082031-74.3242182-180.179687-74.351562-67.945313 0-132.03125 26.382812-180.445313 74.289062-48.5 47.988282-75.234375 111.761719-75.296875 179.339844v.078125.046875c.0078125 40.902344 10.753906 82.164063 31.152344 119.828125l-30.453125 138.417969 140.011719-31.847656c35.460937 17.871094 75.027343 27.292968 114.933593 27.308594h.101563c67.933594 0 132.019531-26.386719 180.441406-74.296876 48.542969-48.027343 75.289062-111.71875 75.320312-179.339843.019532-67.144531-26.820312-130.882813-75.585937-179.472657zm-180.179687 393.148438h-.089844c-35.832032-.015625-71.335938-9.011719-102.667969-26.023438l-6.621094-3.59375-93.101562 21.175782 20.222656-91.90625-3.898437-6.722656c-19.382813-33.425782-29.625-70.324219-29.625-106.71875.074218-117.800782 96.863281-213.75 215.773437-213.75 57.445313.023437 111.421875 22.292968 151.984375 62.699218 41.175781 41.03125 63.84375 94.710938 63.824219 151.152344-.046875 117.828125-96.855469 213.6875-215.800781 213.6875zm0 0' data-original='%23000000' class='active-path' data-old_color='%23000000' fill='%23555555'/%3E%3Cpath d='m186.152344 141.863281h-11.210938c-3.902344 0-10.238281 1.460938-15.597656 7.292969-5.363281 5.835938-20.476562 19.941406-20.476562 48.628906s20.964843 56.40625 23.886718 60.300782c2.925782 3.890624 40.46875 64.640624 99.929688 88.011718 49.417968 19.421875 59.476562 15.558594 70.199218 14.585938 10.726563-.96875 34.613282-14.101563 39.488282-27.714844s4.875-25.285156 3.414062-27.722656c-1.464844-2.429688-5.367187-3.886719-11.214844-6.800782-5.851562-2.917968-34.523437-17.261718-39.886718-19.210937-5.363282-1.941406-9.261719-2.914063-13.164063 2.925781-3.902343 5.828125-15.390625 19.3125-18.804687 23.203125-3.410156 3.894531-6.824219 4.382813-12.675782 1.464844-5.851562-2.925781-24.5-9.191406-46.847656-29.050781-17.394531-15.457032-29.464844-35.167969-32.878906-41.003906-3.410156-5.832032-.363281-8.988282 2.570312-11.898438 2.628907-2.609375 6.179688-6.179688 9.105469-9.582031 2.921875-3.40625 3.753907-5.835938 5.707031-9.726563 1.949219-3.890625.972657-7.296875-.488281-10.210937-1.464843-2.917969-12.691406-31.75-17.894531-43.28125h.003906c-4.382812-9.710938-8.996094-10.039063-13.164062-10.210938zm0 0' data-original='%23000000' class='active-path' data-old_color='%23000000' fill='%23555555'/%3E%3C/g%3E%3C/svg%3E%0A");
 }

 .icones-topo .i-busca:before {
     content: "";
     position: absolute;
     top: 8px;
     left: 0;
     padding: 8px;
     background-position: center;
     background-repeat: no-repeat;
     background-size: 100%;
     background-image: url("data:image/svg+xml,%3C%3Fxml version='1.0'%3F%3E%3Csvg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' version='1.1' id='Capa_1' x='0px' y='0px' viewBox='0 0 512.005 512.005' style='enable-background:new 0 0 512.005 512.005;' xml:space='preserve' width='512px' height='512px' class=''%3E%3Cg%3E%3Cg%3E%3Cg%3E%3Cpath d='M505.749,475.587l-145.6-145.6c28.203-34.837,45.184-79.104,45.184-127.317c0-111.744-90.923-202.667-202.667-202.667 S0,90.925,0,202.669s90.923,202.667,202.667,202.667c48.213,0,92.48-16.981,127.317-45.184l145.6,145.6 c4.16,4.16,9.621,6.251,15.083,6.251s10.923-2.091,15.083-6.251C514.091,497.411,514.091,483.928,505.749,475.587z M202.667,362.669c-88.235,0-160-71.765-160-160s71.765-160,160-160s160,71.765,160,160S290.901,362.669,202.667,362.669z' data-original='%23000000' class='active-path' data-old_color='%23000000' fill='%23555555'/%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/svg%3E%0A");
 }

 .icones-topo .i-contato:before {
     content: "";
     position: absolute;
     top: 8px;
     left: 0;
     padding: 8px;
     background-position: center;
     background-repeat: no-repeat;
     background-size: 100%;
     background-image: url("data:image/svg+xml,%3C%3Fxml version='1.0'%3F%3E%3Csvg xmlns='http://www.w3.org/2000/svg' id='Capa_1' enable-background='new 0 0 512 512' height='512px' viewBox='0 0 512 512' width='512px' class=''%3E%3Cg%3E%3Cpath d='m457 30.872h-402c-30.327 0-55 24.673-55 55v264c0 30.327 24.673 55 55 55h129.514c1.581 0 3.084.759 4.023 2.032l47.253 64.063c4.735 6.421 12.026 10.124 20.004 10.161h.12c7.932 0 15.209-3.632 19.979-9.977l48.325-64.284c.939-1.25 2.434-1.996 3.997-1.996h128.785c30.327 0 55-24.673 55-55v-264c0-30.327-24.673-54.999-55-54.999zm25 319c0 2.362-.336 4.645-.951 6.812l-154.105-135.088 155.056-128.678zm-25-289c4.573 0 8.86 1.24 12.551 3.393l-197.543 163.936c-9.252 7.678-22.679 7.678-31.931 0l-197.578-163.965c3.68-2.135 7.949-3.364 12.501-3.364zm-426.049 295.812c-.615-2.167-.951-4.451-.951-6.812v-257.024l155.098 128.711zm269.288 32.156-44.291 58.917-43.268-58.66c-6.568-8.908-17.099-14.226-28.167-14.226h-128.8l152.762-133.911 12.443 10.326c10.177 8.446 22.648 12.667 35.124 12.667 12.472 0 24.948-4.224 35.123-12.667l12.399-10.29 152.721 133.875h-128.07c-10.941.001-21.4 5.222-27.976 13.969z' data-original='%23000000' class='active-path' data-old_color='%23000000' fill='%23555555'/%3E%3C/g%3E%3C/svg%3E%0A");
 }

 .icones-topo .i-carrinho a:before {
     content: "";
     position: absolute;
     top: 7px;
     left: 0;
     padding: 8px;
     background-position: center;
     background-repeat: no-repeat;
     background-size: 100%;
     background-image: url(data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZlcnNpb249IjEuMSIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbG5zOnN2Z2pzPSJodHRwOi8vc3ZnanMuY29tL3N2Z2pzIiB3aWR0aD0iNTEyIiBoZWlnaHQ9IjUxMiIgeD0iMCIgeT0iMCIgdmlld0JveD0iMCAwIDQ0Ni44NTMgNDQ2Ljg1MyIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNTEyIDUxMiIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgY2xhc3M9IiI+PGc+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+Cgk8cGF0aCBkPSJNNDQ0LjI3NCw5My4zNmMtMi41NTgtMy42NjYtNi42NzQtNS45MzItMTEuMTQ1LTYuMTIzTDE1NS45NDIsNzUuMjg5Yy03Ljk1My0wLjM0OC0xNC41OTksNS43OTItMTQuOTM5LDEzLjcwOCAgIGMtMC4zMzgsNy45MTMsNS43OTIsMTQuNTk5LDEzLjcwNywxNC45MzlsMjU4LjQyMSwxMS4xNEwzNjIuMzIsMjczLjYxSDEzNi4yMDVMOTUuMzU0LDUxLjE3OSAgIGMtMC44OTgtNC44NzUtNC4yNDUtOC45NDItOC44NjEtMTAuNzUzTDE5LjU4NiwxNC4xNDFjLTcuMzc0LTIuODg3LTE1LjY5NSwwLjczNS0xOC41OTEsOC4xYy0yLjg5MSw3LjM2OSwwLjczLDE1LjY5NSw4LjEsMTguNTkxICAgbDU5LjQ5MSwyMy4zNzFsNDEuNTcyLDIyNi4zMzVjMS4yNTMsNi44MDQsNy4xODMsMTEuNzQ2LDE0LjEwNCwxMS43NDZoNi44OTZsLTE1Ljc0Nyw0My43NGMtMS4zMTgsMy42NjQtMC43NzUsNy43MzMsMS40NjgsMTAuOTE2ICAgYzIuMjQsMy4xODQsNS44ODMsNS4wNzgsOS43NzIsNS4wNzhoMTEuMDQ1Yy02Ljg0NCw3LjYxNy0xMS4wNDUsMTcuNjQ2LTExLjA0NSwyOC42NzVjMCwyMy43MTgsMTkuMjk5LDQzLjAxMiw0My4wMTIsNDMuMDEyICAgczQzLjAxMi0xOS4yOTQsNDMuMDEyLTQzLjAxMmMwLTExLjAyOC00LjIwMS0yMS4wNTgtMTEuMDQ0LTI4LjY3NWg5My43NzdjLTYuODQ3LDcuNjE3LTExLjA0NywxNy42NDYtMTEuMDQ3LDI4LjY3NSAgIGMwLDIzLjcxOCwxOS4yOTQsNDMuMDEyLDQzLjAxMiw0My4wMTJjMjMuNzE5LDAsNDMuMDEyLTE5LjI5NCw0My4wMTItNDMuMDEyYzAtMTEuMDI4LTQuMi0yMS4wNTgtMTEuMDQyLTI4LjY3NWgxMy40MzIgICBjNi42LDAsMTEuOTQ4LTUuMzQ5LDExLjk0OC0xMS45NDdjMC02LjYtNS4zNDktMTEuOTQ4LTExLjk0OC0xMS45NDhIMTQzLjY1MWwxMi45MDItMzUuODQzaDIxNi4yMjEgICBjNi4yMzUsMCwxMS43NTItNC4wMjgsMTMuNjUxLTkuOTZsNTkuNzM5LTE4Ni4zODdDNDQ3LjUzNiwxMDEuNjc5LDQ0Ni44MzIsOTcuMDI4LDQ0NC4yNzQsOTMuMzZ6IE0xNjkuNjY0LDQwOS44MTQgICBjLTEwLjU0MywwLTE5LjExNy04LjU3My0xOS4xMTctMTkuMTE2czguNTc0LTE5LjExNywxOS4xMTctMTkuMTE3czE5LjExNiw4LjU3NCwxOS4xMTYsMTkuMTE3UzE4MC4yMDcsNDA5LjgxNCwxNjkuNjY0LDQwOS44MTR6ICAgIE0zMjcuMzczLDQwOS44MTRjLTEwLjU0MywwLTE5LjExNi04LjU3My0xOS4xMTYtMTkuMTE2czguNTczLTE5LjExNywxOS4xMTYtMTkuMTE3czE5LjExNiw4LjU3NCwxOS4xMTYsMTkuMTE3ICAgUzMzNy45MTYsNDA5LjgxNCwzMjcuMzczLDQwOS44MTR6IiBmaWxsPSIjMDAwMDAwIiBkYXRhLW9yaWdpbmFsPSIjMDAwMDAwIiBzdHlsZT0iIiBjbGFzcz0iIj48L3BhdGg+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPC9nPjwvc3ZnPg==) 	
 }

 .icones-topo .i-login a:before {
     content: "";
     position: absolute;
     top: 7px;
     left: 0;
     padding: 8px;
     background-position: center;
     background-repeat: no-repeat;
     background-size: 100%;
     background-image: url(data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZlcnNpb249IjEuMSIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbG5zOnN2Z2pzPSJodHRwOi8vc3ZnanMuY29tL3N2Z2pzIiB3aWR0aD0iNTEyIiBoZWlnaHQ9IjUxMiIgeD0iMCIgeT0iMCIgdmlld0JveD0iMCAwIDUxMiA1MTIiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMiA1MTIiIHhtbDpzcGFjZT0icHJlc2VydmUiIGNsYXNzPSIiPjxnPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgoJPGc+CgkJPHBhdGggZD0iTTQzNy4wMiwzMzAuOThjLTI3Ljg4My0yNy44ODItNjEuMDcxLTQ4LjUyMy05Ny4yODEtNjEuMDE4QzM3OC41MjEsMjQzLjI1MSw0MDQsMTk4LjU0OCw0MDQsMTQ4ICAgIEM0MDQsNjYuMzkzLDMzNy42MDcsMCwyNTYsMFMxMDgsNjYuMzkzLDEwOCwxNDhjMCw1MC41NDgsMjUuNDc5LDk1LjI1MSw2NC4yNjIsMTIxLjk2MiAgICBjLTM2LjIxLDEyLjQ5NS02OS4zOTgsMzMuMTM2LTk3LjI4MSw2MS4wMThDMjYuNjI5LDM3OS4zMzMsMCw0NDMuNjIsMCw1MTJoNDBjMC0xMTkuMTAzLDk2Ljg5Ny0yMTYsMjE2LTIxNnMyMTYsOTYuODk3LDIxNiwyMTYgICAgaDQwQzUxMiw0NDMuNjIsNDg1LjM3MSwzNzkuMzMzLDQzNy4wMiwzMzAuOTh6IE0yNTYsMjU2Yy01OS41NTEsMC0xMDgtNDguNDQ4LTEwOC0xMDhTMTk2LjQ0OSw0MCwyNTYsNDAgICAgYzU5LjU1MSwwLDEwOCw0OC40NDgsMTA4LDEwOFMzMTUuNTUxLDI1NiwyNTYsMjU2eiIgZmlsbD0iIzAwMDAwMCIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgc3R5bGU9IiIgY2xhc3M9IiI+PC9wYXRoPgoJPC9nPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjwvZz48L3N2Zz4=)
 }

 /*topo*/

 .cnt-topo1 {
    background:  black;
}

.topo1  {
 display: none;
 width: 100%;
 max-width: 1200px;
 margin: 0 auto;
}

.topo2   {
 margin: 15px auto;
}

.topo4  {
 background: dodgerblue;
 margin: 0 auto;
}

.topo2 .a  {
    text-align: center;
}
.topo2 .b  {
    text-align: center;
    display: flex;
}
.topo2 .c  {
    text-align: right;
    display: none;
} 	

.topo2 .c  a {
    text-align: right;
    font-size: 0.8em;
    padding-left: 35px;
    position: relative;
} 
.topo2 .c .carrinho:before {
    content: "";
    position: absolute;
    top: -2px;
    left: 10px;
    padding: 9px;
    background-position: center;
    background-repeat: no-repeat;
    background-size: 100%;
    background-image: url(data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZlcnNpb249IjEuMSIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbG5zOnN2Z2pzPSJodHRwOi8vc3ZnanMuY29tL3N2Z2pzIiB3aWR0aD0iNTEyIiBoZWlnaHQ9IjUxMiIgeD0iMCIgeT0iMCIgdmlld0JveD0iMCAwIDQ0Ni44NTMgNDQ2Ljg1MyIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNTEyIDUxMiIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgY2xhc3M9IiI+PGc+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+Cgk8cGF0aCBkPSJNNDQ0LjI3NCw5My4zNmMtMi41NTgtMy42NjYtNi42NzQtNS45MzItMTEuMTQ1LTYuMTIzTDE1NS45NDIsNzUuMjg5Yy03Ljk1My0wLjM0OC0xNC41OTksNS43OTItMTQuOTM5LDEzLjcwOCAgIGMtMC4zMzgsNy45MTMsNS43OTIsMTQuNTk5LDEzLjcwNywxNC45MzlsMjU4LjQyMSwxMS4xNEwzNjIuMzIsMjczLjYxSDEzNi4yMDVMOTUuMzU0LDUxLjE3OSAgIGMtMC44OTgtNC44NzUtNC4yNDUtOC45NDItOC44NjEtMTAuNzUzTDE5LjU4NiwxNC4xNDFjLTcuMzc0LTIuODg3LTE1LjY5NSwwLjczNS0xOC41OTEsOC4xYy0yLjg5MSw3LjM2OSwwLjczLDE1LjY5NSw4LjEsMTguNTkxICAgbDU5LjQ5MSwyMy4zNzFsNDEuNTcyLDIyNi4zMzVjMS4yNTMsNi44MDQsNy4xODMsMTEuNzQ2LDE0LjEwNCwxMS43NDZoNi44OTZsLTE1Ljc0Nyw0My43NGMtMS4zMTgsMy42NjQtMC43NzUsNy43MzMsMS40NjgsMTAuOTE2ICAgYzIuMjQsMy4xODQsNS44ODMsNS4wNzgsOS43NzIsNS4wNzhoMTEuMDQ1Yy02Ljg0NCw3LjYxNy0xMS4wNDUsMTcuNjQ2LTExLjA0NSwyOC42NzVjMCwyMy43MTgsMTkuMjk5LDQzLjAxMiw0My4wMTIsNDMuMDEyICAgczQzLjAxMi0xOS4yOTQsNDMuMDEyLTQzLjAxMmMwLTExLjAyOC00LjIwMS0yMS4wNTgtMTEuMDQ0LTI4LjY3NWg5My43NzdjLTYuODQ3LDcuNjE3LTExLjA0NywxNy42NDYtMTEuMDQ3LDI4LjY3NSAgIGMwLDIzLjcxOCwxOS4yOTQsNDMuMDEyLDQzLjAxMiw0My4wMTJjMjMuNzE5LDAsNDMuMDEyLTE5LjI5NCw0My4wMTItNDMuMDEyYzAtMTEuMDI4LTQuMi0yMS4wNTgtMTEuMDQyLTI4LjY3NWgxMy40MzIgICBjNi42LDAsMTEuOTQ4LTUuMzQ5LDExLjk0OC0xMS45NDdjMC02LjYtNS4zNDktMTEuOTQ4LTExLjk0OC0xMS45NDhIMTQzLjY1MWwxMi45MDItMzUuODQzaDIxNi4yMjEgICBjNi4yMzUsMCwxMS43NTItNC4wMjgsMTMuNjUxLTkuOTZsNTkuNzM5LTE4Ni4zODdDNDQ3LjUzNiwxMDEuNjc5LDQ0Ni44MzIsOTcuMDI4LDQ0NC4yNzQsOTMuMzZ6IE0xNjkuNjY0LDQwOS44MTQgICBjLTEwLjU0MywwLTE5LjExNy04LjU3My0xOS4xMTctMTkuMTE2czguNTc0LTE5LjExNywxOS4xMTctMTkuMTE3czE5LjExNiw4LjU3NCwxOS4xMTYsMTkuMTE3UzE4MC4yMDcsNDA5LjgxNCwxNjkuNjY0LDQwOS44MTR6ICAgIE0zMjcuMzczLDQwOS44MTRjLTEwLjU0MywwLTE5LjExNi04LjU3My0xOS4xMTYtMTkuMTE2czguNTczLTE5LjExNywxOS4xMTYtMTkuMTE3czE5LjExNiw4LjU3NCwxOS4xMTYsMTkuMTE3ICAgUzMzNy45MTYsNDA5LjgxNCwzMjcuMzczLDQwOS44MTR6IiBmaWxsPSIjMDAwMDAwIiBkYXRhLW9yaWdpbmFsPSIjMDAwMDAwIiBzdHlsZT0iIiBjbGFzcz0iIj48L3BhdGg+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPC9nPjwvc3ZnPg==) 	
} 

.topo2 .c  .conta:before {
    content: "";
    position: absolute;
    top: -2px;
    left: 10px;
    padding: 9px;
    background-position: center;
    background-repeat: no-repeat;
    background-size: 100%;
    background-image: url(data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZlcnNpb249IjEuMSIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbG5zOnN2Z2pzPSJodHRwOi8vc3ZnanMuY29tL3N2Z2pzIiB3aWR0aD0iNTEyIiBoZWlnaHQ9IjUxMiIgeD0iMCIgeT0iMCIgdmlld0JveD0iMCAwIDUxMiA1MTIiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMiA1MTIiIHhtbDpzcGFjZT0icHJlc2VydmUiIGNsYXNzPSIiPjxnPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgoJPGc+CgkJPHBhdGggZD0iTTQzNy4wMiwzMzAuOThjLTI3Ljg4My0yNy44ODItNjEuMDcxLTQ4LjUyMy05Ny4yODEtNjEuMDE4QzM3OC41MjEsMjQzLjI1MSw0MDQsMTk4LjU0OCw0MDQsMTQ4ICAgIEM0MDQsNjYuMzkzLDMzNy42MDcsMCwyNTYsMFMxMDgsNjYuMzkzLDEwOCwxNDhjMCw1MC41NDgsMjUuNDc5LDk1LjI1MSw2NC4yNjIsMTIxLjk2MiAgICBjLTM2LjIxLDEyLjQ5NS02OS4zOTgsMzMuMTM2LTk3LjI4MSw2MS4wMThDMjYuNjI5LDM3OS4zMzMsMCw0NDMuNjIsMCw1MTJoNDBjMC0xMTkuMTAzLDk2Ljg5Ny0yMTYsMjE2LTIxNnMyMTYsOTYuODk3LDIxNiwyMTYgICAgaDQwQzUxMiw0NDMuNjIsNDg1LjM3MSwzNzkuMzMzLDQzNy4wMiwzMzAuOTh6IE0yNTYsMjU2Yy01OS41NTEsMC0xMDgtNDguNDQ4LTEwOC0xMDhTMTk2LjQ0OSw0MCwyNTYsNDAgICAgYzU5LjU1MSwwLDEwOCw0OC40NDgsMTA4LDEwOFMzMTUuNTUxLDI1NiwyNTYsMjU2eiIgZmlsbD0iIzAwMDAwMCIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgc3R5bGU9IiIgY2xhc3M9IiI+PC9wYXRoPgoJPC9nPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjwvZz48L3N2Zz4=)
} 

.topo2 .c  .fale-conosco:before {
    content: "";
    position: absolute;
    top: -3px;
    left: 10px;
    padding: 9px;
    background-position: center;
    background-repeat: no-repeat;
    background-size: 98%;
    background-image: url("data:image/svg+xml,%3C%3Fxml version='1.0' encoding='utf-8'%3F%3E%3Csvg version='1.1' id='Layer_1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px' width='115.031px' height='122.88px' viewBox='0 0 115.031 122.88' enable-background='new 0 0 115.031 122.88' xml:space='preserve'%3E%3Cg%3E%3Cpath d='M68.987,7.718H27.143c-2.73,0-5.25,0.473-7.508,1.417c-2.257,0.945-4.357,2.363-6.248,4.253 c-1.89,1.89-3.308,3.99-4.253,6.248c-0.945,2.257-1.417,4.778-1.417,7.508V67.99c0,2.73,0.472,5.25,1.417,7.508 c0.945,2.258,2.363,4.357,4.253,6.248c1.942,1.891,4.043,3.359,6.3,4.252c2.258,0.945,4.726,1.418,7.456,1.418h17.956 c2.101,0,3.833,1.732,3.833,3.832c0,0.473-0.105,0.893-0.21,1.313c-0.683,2.521-1.418,5.041-2.258,7.455 c-0.893,2.574-1.837,4.988-2.888,7.352c-0.525,1.207-1.155,2.361-1.837,3.57c3.675-1.629,7.14-3.518,10.343-5.619 c3.36-2.205,6.51-4.672,9.397-7.35c2.94-2.73,5.565-5.723,7.98-8.926c0.735-0.996,1.89-1.521,3.045-1.521H87.94 c2.73,0,5.198-0.473,7.455-1.418c2.258-0.945,4.358-2.363,6.301-4.252c1.89-1.891,3.308-3.99,4.253-6.248 c0.944-2.258,1.417-4.779,1.417-7.508V27.249c0-2.73-0.473-5.25-1.417-7.508c-0.945-2.258-2.363-4.357-4.253-6.248 s-3.99-3.308-6.248-4.252c-2.258-0.945-4.777-1.418-7.508-1.418H68.987V7.718L68.987,7.718z M61.705,55.688h-9.976V54.61 c0-1.833,0.188-3.327,0.574-4.471c0.386-1.155,0.958-2.193,1.721-3.143c0.762-0.951,2.474-2.619,5.136-5.005 c1.416-1.251,2.124-2.396,2.124-3.435c0-1.047-0.287-1.852-0.851-2.434c-0.574-0.573-1.435-0.864-2.59-0.864 c-1.247,0-2.269,0.446-3.083,1.338c-0.816,0.883-1.335,2.444-1.561,4.657l-10.191-1.368c0.349-4.054,1.711-7.314,4.078-9.787 c2.376-2.473,6.015-3.706,10.917-3.706c3.818,0,6.893,0.863,9.24,2.58c3.184,2.338,4.778,5.441,4.778,9.321 c0,1.61-0.412,3.172-1.237,4.666c-0.815,1.493-2.501,3.327-5.037,5.48c-1.766,1.523-2.887,2.735-3.353,3.657 C61.938,53.01,61.705,54.212,61.705,55.688L61.705,55.688L61.705,55.688z M51.38,58.558h10.693v8.532H51.38V58.558L51.38,58.558z M46.097,0.053H87.94c3.675,0,7.141,0.683,10.396,1.995c3.202,1.312,6.143,3.308,8.768,5.933c2.626,2.625,4.621,5.565,5.934,8.768 c1.312,3.203,1.994,6.667,1.994,10.396V67.99c0,3.729-0.683,7.193-1.994,10.396c-1.313,3.201-3.308,6.141-5.934,8.768 c-2.625,2.625-5.565,4.566-8.768,5.932c-3.202,1.313-6.668,1.996-10.396,1.996H74.395c-2.362,2.992-4.935,5.826-7.665,8.4 c-3.255,3.045-6.72,5.773-10.448,8.189c-3.728,2.467-7.718,4.621-11.971,6.457c-4.2,1.838-8.715,3.361-13.44,4.621 c-1.365,0.367-2.835-0.053-3.833-1.156c-1.417-1.574-1.26-3.988,0.315-5.406c2.205-1.943,4.095-3.938,5.618-5.934 c1.47-1.941,2.678-3.938,3.57-5.984v-0.053c0.998-2.205,1.89-4.463,2.678-6.721c0.263-0.787,0.525-1.627,0.788-2.467H27.091 c-3.675,0-7.14-0.684-10.396-1.996c-3.203-1.313-6.143-3.307-8.768-5.932c-2.625-2.625-4.62-5.566-5.933-8.768 C0.682,75.078,0,71.613,0,67.938V27.091c0-3.676,0.682-7.141,1.995-10.396c1.313-3.203,3.308-6.143,5.933-8.768 c2.625-2.625,5.565-4.62,8.768-5.933S23.363,0,27.091,0h18.953L46.097,0.053L46.097,0.053z'/%3E%3C/g%3E%3C/svg%3E");
} 

.topo2 .c  .fa:before {
    content: "";
    position: absolute;
    top: -2px;
    left: 10px;
    padding: 9px;
    background-position: center;
    background-repeat: no-repeat;
    background-size: 100%;
    background-image: url(data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZlcnNpb249IjEuMSIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbG5zOnN2Z2pzPSJodHRwOi8vc3ZnanMuY29tL3N2Z2pzIiB3aWR0aD0iNTEyIiBoZWlnaHQ9IjUxMiIgeD0iMCIgeT0iMCIgdmlld0JveD0iMCAwIDUxMiA1MTIiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMiA1MTIiIHhtbDpzcGFjZT0icHJlc2VydmUiIGNsYXNzPSIiPjxnPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgoJPGc+CgkJPHBhdGggZD0iTTQzNy4wMiwzMzAuOThjLTI3Ljg4My0yNy44ODItNjEuMDcxLTQ4LjUyMy05Ny4yODEtNjEuMDE4QzM3OC41MjEsMjQzLjI1MSw0MDQsMTk4LjU0OCw0MDQsMTQ4ICAgIEM0MDQsNjYuMzkzLDMzNy42MDcsMCwyNTYsMFMxMDgsNjYuMzkzLDEwOCwxNDhjMCw1MC41NDgsMjUuNDc5LDk1LjI1MSw2NC4yNjIsMTIxLjk2MiAgICBjLTM2LjIxLDEyLjQ5NS02OS4zOTgsMzMuMTM2LTk3LjI4MSw2MS4wMThDMjYuNjI5LDM3OS4zMzMsMCw0NDMuNjIsMCw1MTJoNDBjMC0xMTkuMTAzLDk2Ljg5Ny0yMTYsMjE2LTIxNnMyMTYsOTYuODk3LDIxNiwyMTYgICAgaDQwQzUxMiw0NDMuNjIsNDg1LjM3MSwzNzkuMzMzLDQzNy4wMiwzMzAuOTh6IE0yNTYsMjU2Yy01OS41NTEsMC0xMDgtNDguNDQ4LTEwOC0xMDhTMTk2LjQ0OSw0MCwyNTYsNDAgICAgYzU5LjU1MSwwLDEwOCw0OC40NDgsMTA4LDEwOFMzMTUuNTUxLDI1NiwyNTYsMjU2eiIgZmlsbD0iIzAwMDAwMCIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgc3R5bGU9IiIgY2xhc3M9IiI+PC9wYXRoPgoJPC9nPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjwvZz48L3N2Zz4=)
} 

.topo2 .a img {
    max-width: 150px;
    height: auto;
}

.topo2 form {
    display: flex;
    flex-wrap: nowrap;
    align-items: center;
    align-content: center;
    justify-content: center;
    margin: 0 auto;
    max-width: 300px;
    padding: 15px;
}

.topo2 label {
    width: 100%;
    margin: 0;
}
.topo2 .b input {
    width: 100%;
    margin: 0;
}
.topo2 .b button {
    margin: 0;
    position: relative;
    color: transparent;
    padding: 0 10px;
}	

.topo2 .b button:before {
    content: "";
    position: absolute;
    top: 6px;
    left: 9px;
    padding: 10px;
    background-position: center;
    background-repeat: no-repeat;
    background-size: 100%;
    background-image: url("data:image/svg+xml,%3C%3Fxml version='1.0'%3F%3E%3Csvg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' version='1.1' id='Capa_1' x='0px' y='0px' viewBox='0 0 512.005 512.005' style='enable-background:new 0 0 512.005 512.005;' xml:space='preserve' width='512px' height='512px' class=''%3E%3Cg%3E%3Cg%3E%3Cg%3E%3Cpath d='M505.749,475.587l-145.6-145.6c28.203-34.837,45.184-79.104,45.184-127.317c0-111.744-90.923-202.667-202.667-202.667 S0,90.925,0,202.669s90.923,202.667,202.667,202.667c48.213,0,92.48-16.981,127.317-45.184l145.6,145.6 c4.16,4.16,9.621,6.251,15.083,6.251s10.923-2.091,15.083-6.251C514.091,497.411,514.091,483.928,505.749,475.587z M202.667,362.669c-88.235,0-160-71.765-160-160s71.765-160,160-160s160,71.765,160,160S290.901,362.669,202.667,362.669z' data-original='%23000000' class='active-path' data-old_color='%23000000' fill='%23555555'/%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/svg%3E%0A");
}	

.topo2 .c a:hover {
 color: #00adefff;
}

.topo3 {
    text-align: center;
}

/*tels*/

.htels, .hsociais {
    display: none;
    align-items: center;
    justify-content: center;
    align-content: center;
}

.htels a {
    font-size: 0.8em;
}
.htels p {
    width: 100%;
    margin:  0;
    line-height: 0.8em;
}

.htels a {
    position: relative;
    padding-left: 20px;
    color: white;
}

.htels a:hover {
    color: #00adefff;
}




.htels a:before {
    content: "";
    position: absolute;
    top: 2px;
    left: 0;
    padding: 6px;
    background-position: center;
    background-repeat: no-repeat;
    background-size: 100%;
    background-image: url("data:image/svg+xml,%3C%3Fxml version='1.0'%3F%3E%3Csvg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' version='1.1' id='Layer_1' x='0px' y='0px' viewBox='0 0 512 512' style='enable-background:new 0 0 512 512;' xml:space='preserve' width='512px' height='512px'%3E%3Cg%3E%3Cg%3E%3Cg%3E%3Cpath d='M453.202,386.293L378.52,311.61c-15.546-15.544-40.751-15.562-56.314,0l-21.75,21.75 c-49.696-30.349-91.448-72.101-121.798-121.798l23.848-23.847c15.524-15.526,15.524-40.789-0.001-56.315l-74.682-74.682 c-15.502-15.5-40.671-15.644-56.361,0.047l-46.93,47.295C2.078,122.914-5.82,153.87,4.42,183.209 c52.546,150.577,173.814,271.844,324.39,324.39c28.33,9.884,57.422,2.492,75.919-16.565c0.267-0.236,0.528-0.48,0.783-0.736 l47.69-47.691C468.728,427.082,468.728,401.82,453.202,386.293z M429.412,418.817L382.8,465.429 c-0.569,0.472-1.107,0.985-1.613,1.535c-9.811,10.665-25.594,14.347-41.29,8.867C198.919,426.636,85.384,313.1,36.188,172.121 c-5.633-16.141-1.569-32.864,10.354-42.605c0.453-0.37,0.887-0.764,1.299-1.179l47.459-47.829 c1.573-1.574,3.412-1.809,4.367-1.809c0.956,0,2.793,0.234,4.367,1.809l74.68,74.682c2.408,2.408,2.408,6.325,0.001,8.733 l-33.043,33.043c-5.341,5.34-6.468,13.583-2.758,20.161c35.858,63.569,88.409,116.122,151.978,151.977 c6.577,3.711,14.82,2.582,20.161-2.757l30.945-30.945c2.409-2.409,6.32-2.412,8.733,0l74.682,74.682 C431.819,412.492,431.819,416.41,429.412,418.817z' data-original='%23000000' class='active-path' data-old_color='%23000000' fill='white'/%3E%3C/g%3E%3C/g%3E%3Cg%3E%3Cg%3E%3Cpath d='M268.902,131.332c-9.291,0-16.823,7.532-16.823,16.823c0,9.291,7.531,16.823,16.823,16.823 c43.086,0,78.139,35.053,78.139,78.139c0,9.291,7.532,16.823,16.823,16.823s16.823-7.532,16.823-16.823 C380.687,181.479,330.54,131.332,268.902,131.332z' data-original='%23000000' class='active-path' data-old_color='%23000000' fill='%23000000'/%3E%3C/g%3E%3C/g%3E%3Cg%3E%3Cg%3E%3Cpath d='M268.902,65.304c-9.291,0-16.823,7.532-16.823,16.823s7.531,16.823,16.823,16.823 c79.494,0,144.167,64.673,144.167,144.167c0,9.291,7.532,16.823,16.823,16.823s16.823-7.532,16.823-16.823 C446.715,145.071,366.948,65.304,268.902,65.304z' data-original='%23000000' class='active-path' data-old_color='%23000000' fill='white'/%3E%3C/g%3E%3C/g%3E%3Cg%3E%3Cg%3E%3Cpath d='M440.799,71.22C394.884,25.305,333.835,0.019,268.901,0.019c-9.291,0-16.823,7.532-16.823,16.823 c0,9.291,7.532,16.823,16.823,16.823c115.494,0,209.454,93.96,209.454,209.453c0,9.291,7.532,16.823,16.823,16.823 c9.291,0,16.823-7.532,16.823-16.823C512,178.183,486.714,117.136,440.799,71.22z' data-original='%23000000' class='active-path' data-old_color='%23000000' fill='white'/%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/svg%3E%0A");
}

.htels a[href*="whatsapp"]:before {
    background-image: url("data:image/svg+xml,%3C%3Fxml version='1.0'%3F%3E%3Csvg xmlns='http://www.w3.org/2000/svg' height='512px' viewBox='0 0 512 512' width='512px' class=''%3E%3Cg%3E%3Cpath d='m435.921875 74.351562c-48.097656-47.917968-112.082031-74.3242182-180.179687-74.351562-67.945313 0-132.03125 26.382812-180.445313 74.289062-48.5 47.988282-75.234375 111.761719-75.296875 179.339844v.078125.046875c.0078125 40.902344 10.753906 82.164063 31.152344 119.828125l-30.453125 138.417969 140.011719-31.847656c35.460937 17.871094 75.027343 27.292968 114.933593 27.308594h.101563c67.933594 0 132.019531-26.386719 180.441406-74.296876 48.542969-48.027343 75.289062-111.71875 75.320312-179.339843.019532-67.144531-26.820312-130.882813-75.585937-179.472657zm-180.179687 393.148438h-.089844c-35.832032-.015625-71.335938-9.011719-102.667969-26.023438l-6.621094-3.59375-93.101562 21.175782 20.222656-91.90625-3.898437-6.722656c-19.382813-33.425782-29.625-70.324219-29.625-106.71875.074218-117.800782 96.863281-213.75 215.773437-213.75 57.445313.023437 111.421875 22.292968 151.984375 62.699218 41.175781 41.03125 63.84375 94.710938 63.824219 151.152344-.046875 117.828125-96.855469 213.6875-215.800781 213.6875zm0 0' data-original='%23000000' class='active-path' data-old_color='%23000000' fill='lightgreen'/%3E%3Cpath d='m186.152344 141.863281h-11.210938c-3.902344 0-10.238281 1.460938-15.597656 7.292969-5.363281 5.835938-20.476562 19.941406-20.476562 48.628906s20.964843 56.40625 23.886718 60.300782c2.925782 3.890624 40.46875 64.640624 99.929688 88.011718 49.417968 19.421875 59.476562 15.558594 70.199218 14.585938 10.726563-.96875 34.613282-14.101563 39.488282-27.714844s4.875-25.285156 3.414062-27.722656c-1.464844-2.429688-5.367187-3.886719-11.214844-6.800782-5.851562-2.917968-34.523437-17.261718-39.886718-19.210937-5.363282-1.941406-9.261719-2.914063-13.164063 2.925781-3.902343 5.828125-15.390625 19.3125-18.804687 23.203125-3.410156 3.894531-6.824219 4.382813-12.675782 1.464844-5.851562-2.925781-24.5-9.191406-46.847656-29.050781-17.394531-15.457032-29.464844-35.167969-32.878906-41.003906-3.410156-5.832032-.363281-8.988282 2.570312-11.898438 2.628907-2.609375 6.179688-6.179688 9.105469-9.582031 2.921875-3.40625 3.753907-5.835938 5.707031-9.726563 1.949219-3.890625.972657-7.296875-.488281-10.210937-1.464843-2.917969-12.691406-31.75-17.894531-43.28125h.003906c-4.382812-9.710938-8.996094-10.039063-13.164062-10.210938zm0 0' data-original='%23000000' class='active-path' data-old_color='%23000000' fill='lightgreen'/%3E%3C/g%3E%3C/svg%3E%0A");
}


/*sociais*/

.hsociais a {
    color: white;
    font-size: 0.8em;
}
.hsociais p {
    width: 20px;
    margin:  0;
    line-height: 0.8em;
}

.hsociais a {
    width: 20px;
    height: 20px;
    position: relative;
    overflow: hidden;
    font-size: 0;
    display: inline-block;
}

.hsociais a:before {
    content: "";
    position: absolute;
    top: 3px;
    left: 0;
    padding: 8px;
    background-position: center;
    background-repeat: no-repeat;
    background-size: 100%;
}

.hsociais a[href*="facebook"]:before {
    background-image: url("data:image/svg+xml,%3C%3Fxml version='1.0'%3F%3E%3Csvg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' version='1.1' id='Layer_1' x='0px' y='0px' viewBox='0 0 455 455' style='enable-background:new 0 0 455 455;' xml:space='preserve' width='512px' height='512px' class=''%3E%3Cg%3E%3Cpath d='M0,0v455h455V0H0z M301.004,125.217H265.44 c-7.044,0-14.153,7.28-14.153,12.696v36.264h49.647c-1.999,27.807-6.103,53.235-6.103,53.235h-43.798V385h-65.266V227.395h-31.771 v-53.029h31.771v-43.356c0-7.928-1.606-61.009,66.872-61.009h48.366V125.217z' data-original='%23000000' class='active-path' data-old_color='%23%23%23F65C' fill='dodgerblue' /%3E%3C/g%3E%3C/svg%3E%0A");
}

.hsociais a[href*="linkedin"]:before {
    background-image: url("data:image/svg+xml,%3C%3Fxml version='1.0'%3F%3E%3Csvg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns:svgjs='http://svgjs.com/svgjs' version='1.1' width='512' height='512' x='0' y='0' viewBox='0 0 242.667 242.667' style='enable-background:new 0 0 512 512' xml:space='preserve' class=''%3E%3Cg%3E%3Cpath xmlns='http://www.w3.org/2000/svg' d='M0,0v242.667h242.667V0H0z M81.468,192.754H52.996V93.362h28.471V192.754z M67.513,82.028 c-9.55,0-17.319-7.204-17.319-16.058s7.77-16.058,17.319-16.058s17.319,7.204,17.319,16.058S77.062,82.028,67.513,82.028z M192.473,192.754h-29.172v-58.946c0.006-0.12,0.432-9.478-4.874-15.068c-2.641-2.783-6.279-4.194-10.814-4.194 c-11.408,0-17.17,8.214-19.612,13.189v65.019H99.529V93.362H128v8.397c9.32-7.561,19.787-11.55,30.335-11.55 c27.003,0,34.138,21.093,34.138,32.246V192.754z' fill='dodgerblue' data-original='%23000000' style='' class=''/%3E%3Cg xmlns='http://www.w3.org/2000/svg'%3E%3C/g%3E%3C/g%3E%3C/svg%3E%0A"); 
}

.hsociais a[href*="instagram"]:before {
    background-image: url("data:image/svg+xml,%3C%3Fxml version='1.0'%3F%3E%3Csvg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns:svgjs='http://svgjs.com/svgjs' version='1.1' width='512' height='512' x='0' y='0' viewBox='0 0 455.73 455.73' style='enable-background:new 0 0 512 512' xml:space='preserve' class=''%3E%3Cg%3E%3Cpath xmlns='http://www.w3.org/2000/svg' d='M227.86,182.55c-24.98,0-45.32,20.33-45.32,45.31c0,24.99,20.34,45.33,45.32,45.33c24.99,0,45.32-20.34,45.32-45.33 C273.18,202.88,252.85,182.55,227.86,182.55z M227.86,182.55c-24.98,0-45.32,20.33-45.32,45.31c0,24.99,20.34,45.33,45.32,45.33 c24.99,0,45.32-20.34,45.32-45.33C273.18,202.88,252.85,182.55,227.86,182.55z M303.36,108.66H152.37 c-24.1,0-43.71,19.61-43.71,43.71v150.99c0,24.1,19.61,43.71,43.71,43.71h150.99c24.1,0,43.71-19.61,43.71-43.71V152.37 C347.07,128.27,327.46,108.66,303.36,108.66z M227.86,306.35c-43.27,0-78.48-35.21-78.48-78.49c0-43.27,35.21-78.48,78.48-78.48 c43.28,0,78.49,35.21,78.49,78.48C306.35,271.14,271.14,306.35,227.86,306.35z M308.87,165.61c-10.24,0-18.57-8.33-18.57-18.57 s8.33-18.57,18.57-18.57s18.57,8.33,18.57,18.57S319.11,165.61,308.87,165.61z M227.86,182.55c-24.98,0-45.32,20.33-45.32,45.31 c0,24.99,20.34,45.33,45.32,45.33c24.99,0,45.32-20.34,45.32-45.33C273.18,202.88,252.85,182.55,227.86,182.55z M303.36,108.66 H152.37c-24.1,0-43.71,19.61-43.71,43.71v150.99c0,24.1,19.61,43.71,43.71,43.71h150.99c24.1,0,43.71-19.61,43.71-43.71V152.37 C347.07,128.27,327.46,108.66,303.36,108.66z M227.86,306.35c-43.27,0-78.48-35.21-78.48-78.49c0-43.27,35.21-78.48,78.48-78.48 c43.28,0,78.49,35.21,78.49,78.48C306.35,271.14,271.14,306.35,227.86,306.35z M308.87,165.61c-10.24,0-18.57-8.33-18.57-18.57 s8.33-18.57,18.57-18.57s18.57,8.33,18.57,18.57S319.11,165.61,308.87,165.61z M227.86,182.55c-24.98,0-45.32,20.33-45.32,45.31 c0,24.99,20.34,45.33,45.32,45.33c24.99,0,45.32-20.34,45.32-45.33C273.18,202.88,252.85,182.55,227.86,182.55z M0,0v455.73h455.73 V0H0z M380.23,303.36c0,42.39-34.48,76.87-76.87,76.87H152.37c-42.39,0-76.87-34.48-76.87-76.87V152.37 c0-42.39,34.48-76.87,76.87-76.87h150.99c42.39,0,76.87,34.48,76.87,76.87V303.36z M303.36,108.66H152.37 c-24.1,0-43.71,19.61-43.71,43.71v150.99c0,24.1,19.61,43.71,43.71,43.71h150.99c24.1,0,43.71-19.61,43.71-43.71V152.37 C347.07,128.27,327.46,108.66,303.36,108.66z M227.86,306.35c-43.27,0-78.48-35.21-78.48-78.49c0-43.27,35.21-78.48,78.48-78.48 c43.28,0,78.49,35.21,78.49,78.48C306.35,271.14,271.14,306.35,227.86,306.35z M308.87,165.61c-10.24,0-18.57-8.33-18.57-18.57 s8.33-18.57,18.57-18.57s18.57,8.33,18.57,18.57S319.11,165.61,308.87,165.61z M227.86,182.55c-24.98,0-45.32,20.33-45.32,45.31 c0,24.99,20.34,45.33,45.32,45.33c24.99,0,45.32-20.34,45.32-45.33C273.18,202.88,252.85,182.55,227.86,182.55z M227.86,182.55 c-24.98,0-45.32,20.33-45.32,45.31c0,24.99,20.34,45.33,45.32,45.33c24.99,0,45.32-20.34,45.32-45.33 C273.18,202.88,252.85,182.55,227.86,182.55z M227.86,182.55c-24.98,0-45.32,20.33-45.32,45.31c0,24.99,20.34,45.33,45.32,45.33 c24.99,0,45.32-20.34,45.32-45.33C273.18,202.88,252.85,182.55,227.86,182.55z M303.36,108.66H152.37 c-24.1,0-43.71,19.61-43.71,43.71v150.99c0,24.1,19.61,43.71,43.71,43.71h150.99c24.1,0,43.71-19.61,43.71-43.71V152.37 C347.07,128.27,327.46,108.66,303.36,108.66z M227.86,306.35c-43.27,0-78.48-35.21-78.48-78.49c0-43.27,35.21-78.48,78.48-78.48 c43.28,0,78.49,35.21,78.49,78.48C306.35,271.14,271.14,306.35,227.86,306.35z M308.87,165.61c-10.24,0-18.57-8.33-18.57-18.57 s8.33-18.57,18.57-18.57s18.57,8.33,18.57,18.57S319.11,165.61,308.87,165.61z M227.86,182.55c-24.98,0-45.32,20.33-45.32,45.31 c0,24.99,20.34,45.33,45.32,45.33c24.99,0,45.32-20.34,45.32-45.33C273.18,202.88,252.85,182.55,227.86,182.55z M227.86,182.55 c-24.98,0-45.32,20.33-45.32,45.31c0,24.99,20.34,45.33,45.32,45.33c24.99,0,45.32-20.34,45.32-45.33 C273.18,202.88,252.85,182.55,227.86,182.55z M227.86,182.55c-24.98,0-45.32,20.33-45.32,45.31c0,24.99,20.34,45.33,45.32,45.33 c24.99,0,45.32-20.34,45.32-45.33C273.18,202.88,252.85,182.55,227.86,182.55z M303.36,108.66H152.37 c-24.1,0-43.71,19.61-43.71,43.71v150.99c0,24.1,19.61,43.71,43.71,43.71h150.99c24.1,0,43.71-19.61,43.71-43.71V152.37 C347.07,128.27,327.46,108.66,303.36,108.66z M227.86,306.35c-43.27,0-78.48-35.21-78.48-78.49c0-43.27,35.21-78.48,78.48-78.48 c43.28,0,78.49,35.21,78.49,78.48C306.35,271.14,271.14,306.35,227.86,306.35z M308.87,165.61c-10.24,0-18.57-8.33-18.57-18.57 s8.33-18.57,18.57-18.57s18.57,8.33,18.57,18.57S319.11,165.61,308.87,165.61z M227.86,182.55c-24.98,0-45.32,20.33-45.32,45.31 c0,24.99,20.34,45.33,45.32,45.33c24.99,0,45.32-20.34,45.32-45.33C273.18,202.88,252.85,182.55,227.86,182.55z' fill='dodgerblue' data-original='%23000000' style='' class=''/%3E%3Cg xmlns='http://www.w3.org/2000/svg'%3E%3C/g%3E%3C/g%3E%3C/svg%3E%0A"); 
}

.hsociais a[href*="youtube"]:before {
    background-image: url("data:image/svg+xml,%3C%3Fxml version='1.0'%3F%3E%3Csvg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' version='1.1' id='Layer_1' x='0px' y='0px' viewBox='0 0 512 512' style='enable-background:new 0 0 512 512;' xml:space='preserve' width='512px' height='512px' class=''%3E%3Cg%3E%3Cpath style='fill:%23de1319' d='M506.703,145.655c0,0-5.297-37.959-20.303-54.731c-19.421-22.069-41.49-22.069-51.2-22.952 C363.697,62.676,256,61.793,256,61.793l0,0c0,0-107.697,0.883-179.2,6.179c-9.71,0.883-31.779,1.766-51.2,22.952 C9.71,107.697,5.297,145.655,5.297,145.655S0,190.676,0,235.697v41.49c0,45.021,5.297,89.159,5.297,89.159 s5.297,37.959,20.303,54.731c19.421,22.069,45.021,21.186,56.497,23.835C122.703,449.324,256,450.207,256,450.207 s107.697,0,179.2-6.179c9.71-0.883,31.779-1.766,51.2-22.952c15.007-16.772,20.303-54.731,20.303-54.731S512,321.324,512,277.186 v-41.49C512,190.676,506.703,145.655,506.703,145.655' data-original='red' class='active-path' data-old_color='red'/%3E%3Cpolygon style='fill:%23FFFFFF' points='194.207,166.841 194.207,358.4 361.931,264.828 ' data-original='%23FFFFFF' class='' data-old_color='%23FFFFFF'/%3E%3C/g%3E%3C/svg%3E%0A"); 
}

#nav-cat {
    position: absolute;
    top: 40px;
    left: -2000px;
    transition: left 0.5s ease;
}

@media (min-width: 768px) {

    .icones-topo {
      display: none;
  }

  .topo1  {
      display: flex;
  }

  .topo1 .b {
      display: flex;
      flex-wrap: nowrap;
      align-items: center;
      align-content: center;
      justify-content: flex-end;
  }

  .topo2 {
      max-width: 1200px;
  }

  .topo2  > div {
   height: 80px;
}

.topo2 .a {
  text-align: left;
}	
.topo2 .b form {
  padding: 0;
}

.topo2 .c  {
  display: flex;
  flex-wrap: nowrap;
  align-items: center;
  align-content: center;
  justify-content: flex-end;
}	

.htels {
  display: flex;
  flex-wrap: nowrap;
  align-items: flex-end;
  align-content: flex-end;
  justify-content: flex-end;
  width: auto;
}

.htels p {
  width: auto;
  display: inline-block;
  margin: 5px 0;
  line-height: 0.8em;
  margin-left: 20px;
}

.hsociais {
  display: flex;
  flex-wrap: nowrap;
  align-items: flex-end;
  align-content: flex-end;
  justify-content: flex-end;
  width: auto;
}

.hsociais p {
  width: auto;
  display: inline-block;
  margin: 5px 0;
  line-height: 0.8em;
  margin-left: 20px;
}

.topo4 nav {
  display: flex;
  align-items: center;
  align-content: center;
  justify-content: center;
}

#nav-cat {
  display: flex;
  position: static;
}


}


</style>

<script>

    /*adiciona inst no cat*/

if (window.matchMedia("(max-width: 700px)").matches) {

  var ul = document.querySelectorAll("#nav-inst > ul > li");
  var li = document.createElement("li");
  for(var i=0; i < ul.length; i++) {
   document.querySelector('.sm-cat').appendChild(ul[i]);
 }

}

   function toSubmit(){
     var s = document.querySelector("#palavra_a_buscar").value;
     if(s == "") {
       alert('Digite uma palavra!');
       return false;
   }
}

function abre_m_inst() {
    var e = document.querySelector("#nav-inst");
    if(e.style.display == "" || e.style.display=="none"){
      e.style.display="block";
  } else {
      e.style.display="none";
  }
}

function abre_m_cat() {
    var e = document.querySelector("#nav-cat");

    if(e.style.left == "-2000px" || e.style.left == "") {
      e.style.left = "0";
  } else {
      e.style.left = "-2000px";
  }
}

function abre_busca() {
    var e = document.querySelector("#form-busca");
    if(e.style.display == "" || e.style.display=="none"){
      e.style.display="block";
  } else {
      e.style.display="none";
  }
}
function fecha_busca() {
    var e = document.querySelector("#form-busca");
    if(e.style.display == "" || e.style.display=="none"){
      e.style.display="block";
  } else {
      e.style.display="none";
  }
}

</script>
