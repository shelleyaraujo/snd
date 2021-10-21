<?php include_once "_compress_code.php"; ?>
<?php include_once "head.php"; ?>

<body>

	<a class="skip-link xxx" href="#maincontent">Skip to main</a>

	<?php include_once "cabecalho_loja.php"; ?>


	<main id="maincontent">


		<div class="container cnt-conteudo">
			<?php echo (isset($body) && is_array($body)) ? implode("\n",$body) : ''?>
		</div>

	</main>

	<?php include_once "rodape_loja.php"; ?>


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

<?php include_once "_final.php"; ?>
