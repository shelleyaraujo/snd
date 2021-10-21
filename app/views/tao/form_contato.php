 <div id="cnt-form-contato">

  <form id='form-contato' action="javascript:void[0]" method='post'>

    <div class="cnt-form-contato">

     <div>

       <label>Nome</label>

       <input id='nome' type='text' name='nome' placeholder='nome'>

     </div>

     <div>

      <label>Email</label>

      <input id='email' type='text' name='email' placeholder='email'>

    </div>

    <div>

     <label>Telefone</label>

     <input id='telefone' type='text' name='telefone' placeholder='telefone'>

   </div>

   <div>

    <label>Cidade:</label>

    <input type="text" name="cidade" id="cidade" placeholder="Cidade"   maxlength="50" value="" /> 

  </div>

  <div>

   <label>Estado:</label>

   <select name="estado" id="estado">

    <option>AC</option>

    <option>AL</option>







    <option>AP</option>







    <option>AM</option>







    <option>BA</option>







    <option>CE</option>







    <option>DF</option>







    <option>ES</option>







    <option>GO</option>







    <option>MA</option>







    <option>MT</option>







    <option>MS</option>







    <option>MG</option>







    <option>PA</option>







    <option>PB</option>







    <option>PR</option>







    <option>PE</option>







    <option>PI</option>







    <option>RJ</option>







    <option>RN</option>







    <option>RS</option>







    <option>RO</option>







    <option>RR</option>







    <option>SC</option>







    <option selected>SP</option>







    <option>SE</option>







    <option>TO</option>    







  </select>







</div>



<div>



 <label>Assunto



  <input id='assunto' type='text' name='assunto' placeholder='assunto'>



</label>



</div>





<div>



 <label>Sua mensagem



   <textarea name="mensagem" id="mensagem" rows="5" cols="80"></textarea>



 </label>



</div>



<div>

  <input id="check_1" type="hidden" value="">

  <input id="check_2"  type="hidden" style="position: absolute; width: 1px; top: -5000px; left: -5000px;">

  <button class='button' onclick="enviar_email()">Enviar</button>

</div>





<div id="info">

  carregando...

</div>



</div>



</form>

</div>





































<style>









#info {

  display: none;

  background-color: red;

  padding: 15px;

  color: white;

  text-align: center;
  position: absolute;
  box-sizing: border-box;
  left: 0;
  right: 0;
  margin: 0 auto;
  background-color: rgba(255,0,0,0.8);

}

@media (min-width: 550px) {


#info {

  display: none;


  padding: 50px;

  color: white;
  box-sizing: border-box;

}



}



</style>





<script>







  function enviar_email() {







    var o_nome = document.getElementById("nome");

    var o_email = document.getElementById("email");

    var o_assunto = document.getElementById("assunto");

    var o_telefone = document.getElementById("telefone");

    var o_cidade = document.getElementById("cidade");

    var o_estado = document.getElementById("estado");

    var o_mensagem = document.getElementById("mensagem");

    var o_info = document.getElementById("info");

    var check_1 = document.getElementById("check_1").value;

    var check_2 = document.getElementById("check_2").value;

    var msg = "";



    if(o_nome.value == "") {



      msg = "Digite o nome!";



      o_nome.style.backgroundColor = "yellow";



    } else if (o_email.value == "") {



      msg = "Digite o email!";



      o_email.style.backgroundColor = "yellow";



    } else if (o_telefone.value == "") {



      msg = "Digite o telefone!";



      o_telefone.style.backgroundColor = "yellow";



    } else if (o_cidade.value == "") {



      msg = "Digite a cidade!";



      o_cidade.style.backgroundColor = "yellow";

    } else if (o_assunto.value == "") {



      msg = "Digite o assunto!";



      o_assunto.style.backgroundColor = "yellow";

    } else if (o_mensagem.value == "") {



      msg = "Digite a mensagem!";



      o_mensagem.style.backgroundColor = "yellow";

    } else if (check_1 != check_2) {



      msg = "Tu és um robô! Sai fora!!!!!!!!!!";



    }



    if(msg == "") {



      xhr = new XMLHttpRequest();



      xhr.open('POST', '/plugin/form_contato_.php');



      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');



      xhr.onload = function() {



        if (xhr.status === 200) {



          o_info.style.display="block";

          o_info.style.backgroundColor="green";

          o_info.innerHTML =  xhr.responseText;



        }



        else if (xhr.status !== 200) {



          alert(xhr.status);



        }



      };



      xhr.send(



        encodeURI('nome=' + o_nome.value 

          + "&email=" + o_email.value 

          + "&assunto=" + o_assunto.value 

          + "&telefone=" + o_telefone.value

          + "&cidade=" + o_cidade.value

          + "&estado=" + o_estado.value

          + "&mensagem=" + o_mensagem.value 



          ));



    } else {



      o_info.style.display="block";



      o_info.innerHTML =  msg;



    }



  }




    var o_info = document.getElementById("info");
    o_info.addEventListener("click", function(){
  o_info.style.display = "none";
});



</script>



