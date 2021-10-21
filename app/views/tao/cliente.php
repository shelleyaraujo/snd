 <?php include_once "head.php"; ?>

 <body>

 	<?php include_once "header.php"; ?>

 	<div class="painel"> 
 		<div class="p-a"> 
 			<div class="menu-tao">
 				<?php include_once "menutao.php"; ?>
 			</div>
 		</div>
 		<div class="p-b"> 
      <h1>Meu Cadastro</h1>
      <?php echo $cliente; ?>
      <form id="utualizar-cadastro" method="POST" action="<?php echo myUrl('tao/cliente/') ?>">
       <!--
        <label>Data de Nascimento:</label>
        <input type="text" name="dmanaascimento" placeholder="Data Nascimento" value="<?php echo $dmanascimento; ?>">   
      -->
      <label>Nome:</label>
      <input type="text" id="nome" name="nome" placeholder="Nome" value="<?php echo $nome; ?>">
      <label>Email:</label>
      <input type="text" id="email" name="email" placeholder="Email" value="<?php echo $email; ?>"> 
      <label>Endereço:</label>
      <input type="text" id="endereco" name="endereco" placeholder="Endereço" value="<?php echo $endereco; ?>">   
      <label>Número:</label>
      <input type="text" id="numero" name="numero" placeholder="numero" value="<?php echo $numero; ?>" maxlength="10" size="20">   
      <label>Telefone:</label>
      <input type="text" id="telefone" name="telefone" placeholder="Telefone" value="<?php echo $telefone; ?>">   
      <label>Bairro:</label>
      <input type="text" id="bairro" name="bairro" placeholder="Bairro" value="<?php echo $bairro; ?>">   
      <label>Complemento:</label>
      <input type="text" id="complemento" name="complemento" placeholder="complemento" value="<?php echo $complemento; ?>">   
      <label>Cidade:</label>
      <input type="text" id="cidade" name="cidade" placeholder="Cidade" value="<?php echo $cidade; ?>">   
      <label>Estado:</label>
      <input type="text" id="estado" name="estado" placeholder="Estado" value="<?php echo $estado;  ?>" maxlength="2">   
      <label>Cep:</label>
      <input type="text" id="cep" name="cep" placeholder="CEP" value="<?php echo $cep;  ?>" maxlength="8" onblur="pesquisacep(this.value)" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />    
     
      <label>CPF:</label>
      <input type="text" id="cpf" name="cpf" placeholder="CPF" value="<?php echo $cpf;  ?>" maxlength="11" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />      
      <label>CNPJ:</label>
      <input type="text" id="cnpj" name="cnpj" placeholder="CNPJ" value="<?php echo $cnpj;  ?>" maxlength="14" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />      
      <label>RG:</label>
      <input type="text" name="rg" placeholder="RG" value="<?php echo $rg; ?>">   
     
      <input type="hidden" name="id" value="<?php echo $id; ?>">
      
      <input type='hidden' name='update_cliente' value='update_cliente'>

      <br><br>
      <button type="submit" name="atualizar" class="button">Atualizar</button>
    </form>
  </div>
  <div class="p-c"> 

  </div>
</div>

<?php include_once "footer.php"; ?>



    <script>
    
    function limpa_formulário_cep() {
            document.getElementById('endereco').value=("");
            document.getElementById('bairro').value=("");
            document.getElementById('cidade').value=("");
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            document.getElementById('endereco').value=(conteudo.logradouro);
            document.getElementById('bairro').value=(conteudo.bairro);
            document.getElementById('cidade').value=(conteudo.localidade);
        } 
        else {
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }
        
    function pesquisacep(valor) {

        var cep = valor.replace(/\D/g, '');


        if (cep != "") {

      

            var validacep = /^[0-9]{8}$/;



            if(validacep.test(cep)) {

            

                document.getElementById('endereco').value="...";
                document.getElementById('bairro').value="...";
                document.getElementById('cidade').value="...";




              

                var script = document.createElement('script');

              

                script.src = `https://viacep.com.br/ws/`+ cep + `/json/?callback=meu_callback`;

         

                document.body.appendChild(script);

            } 

            else {
        

                limpa_formulário_cep();
            }
        } 

        else {
          

            limpa_formulário_cep();
        }
    };

    </script>

</body>
</html>

