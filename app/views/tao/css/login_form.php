
<style>

#loader {
  position: absolute;
  display: none;
  border: 2px dotted green; 
  border-right: 2px solid red; 
  border-top: 2px solid blue; 
  border-bottom: 2px solid lightblue; 
  border-radius: 100%;
  width: 30px;
  height: 30px;
  animation: spin 2s linear infinite;
  top: 50%;
  margin-top: 30px;
  left: 50%;
  margin-left: -30px;
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}


#info {
  display: none;
  width: 100%;
  background-color: lightblue;
  max-width: 500px;
  margin: 0 auto;
  margin-bottom: 20px;
  padding: 20px;
  box-sizing: border-box; 
}

#cnt-logar {
  width: 100%;
  max-width: 300px;
  margin: 0 auto;
  margin-bottom: 20px;
  padding: 20px;
  box-sizing: border-box; 
  display: block;
  background-color: #e9ecef;
  color: white;
}

#v_email {
  display: flex;
  flex-wrap: wrap;
  text-align: left;
  width: 100%;
  box-sizing: border-box;
}

#logar {
  display: flex;
  flex-wrap: wrap;
  text-align: left;
  width: 100%;
  box-sizing: border-box;
}

#logar {
  display: none;
}

#logar a {
  text-align: center;
  padding: 20px;
  display: block;
}

#cnt-logar label {
  width: 100%;
  margin-bottom: 5px;
}

#cnt-logar input {
  width: 100%;
  margin-bottom: 5px;
  height: 45px;
  padding: 5px;
  border: 0;
  box-sizing: border-box;
}

#cnt-logar .btn-link {
  color: white;
}

#cnt-cadastro {
  width: 100%;
  max-width: 500px;
  margin: 0 auto;
  margin-bottom: 20px;
  padding: 20px;
  box-sizing: border-box; 
  background-color: #e9ecef;
  display: none;
  color: white;
}

#cadastro form {
  width: 100%;
  box-sizing: border-box; 
  display: flex;
  flex-wrap: wrap;
}

#cadastro div {
  width: 100%;
  margin-bottom: 5px;
  box-sizing: border-box;
}

#cadastro .endereco {
  width: 70%;
  box-sizing: border-box;
  padding-right: 5px;
}

#cadastro .numero {
  width: 30%;
  box-sizing: border-box;
}

#cadastro .telefone {
  width: 50%;
  box-sizing: border-box;
  padding-right: 5px;
}

#cadastro .celular {
  width: 50%;
  box-sizing: border-box;
}

#cadastro .cidade {
  width: 80%;
  box-sizing: border-box;
  padding-right: 5px;
}

#cadastro .estado {
  width: 20%;
  box-sizing: border-box;
}

#cadastro .cep {
  width: 30%;
  box-sizing: border-box;
  padding-right: 5px;
}

#cadastro .cpfcnpj {
  width: 70%;
  box-sizing: border-box;
}

#cadastro .senha1 {
  width: 50%;
  box-sizing: border-box;
  padding-right: 5px;
}

#cadastro .senha2 {
  width: 50%;
  box-sizing: border-box;
}

#cadastro .botao {
  width: 100%;
  box-sizing: border-box;
}

#cadastro input {
  width: 100%;
  margin-bottom: 5px;
  height: 45px;
  border: 0;
  padding: 5px;
  box-sizing: border-box;
}

#titulo-cadastro {
  font-size: 20px;
  line-height: 30px;
  margin-bottom: 20px;
  width: 100%;
}


</style>
