<style>

.cnt-modulo {
  width: 100%;
  max-width: 1024px;
  margin: 0 auto;
  padding: 0 15px;
}

.float-right{
  float: right;
}

.quantidade {
  text-align: right;
}

.pedidos {
  margin: 0;
  padding: 0;
}

.cnt-pedidos{
  width: 100%;
  margin-bottom: 20px;
}

.pedidos li{
  display: block;
  margin: 1px;
  border: 1px solid #ddd;
  text-align: left;    
}

.pedidos li:hover{
  border-bottom: 1px dashed silver;
}

.pedidos li div{
  display: inline-block;
  padding: 10px;
}

.pedidos li .itens{
  width: 40%;
  text-align: left;
}

.pedidos li .preco{
  width: 20%;
}

.pedidos li .quantidade{
  width: 10%;
}

.pedidos li .sub-total{
  width: 15%;
}

.total{
  font-weight: bold;
  color: green;
}

.pedidos-cabecalho {
  background: #ddd; 
  color: black;
  border-bottom: 1px solid #ddd;
  text-transform: uppercase;
  font-size: 14px;
}

.pedidos-rodape {
  background: #ebebeb; 
  color: green;
  border: 1px solid #ddd;
  text-transform: uppercase;
  font-size: 14px;
  font-weight: bold;  
}

.mais{
  background-color: #ebebeb;
  color: green;
  padding: 5px 10px;
}

.menos{
  background-color: #ebebeb;
  color: #ff0000;
  padding: 5px 10px;
}

.valor-total{
  text-align: right;
  font-size: 16px;
  padding-right: 20px;
  color: red;
  font-weight: bold;
  text-transform: uppercase;
}

.pedidos li .itens-orcamento{
  width: 90%;
  text-align: left;
}

.pedidos li .quantidade-orcamento{
  width: 10%;
}

#cnt-logar{
  display: none;
  top: 0;
  left: 0;
  z-index: 9999;
  background-color: rgba(000,000,000, 0.5);
}

#autenticacao{
  border: 1px solid #999;
  width: auto;
  max-width: 400px;
  margin-left: auto;
  margin-right: auto;
  text-align: left;
  color: #111;
  background-color: red;
  padding: 15px;
  display: none;
  position: relative; 
}

#fechar-autenticacao,
#fechar-cadastro{
  right: 0;
  position: absolute;
  top: 0;
  color: #ff0000;
  font-size: 20px;
  padding-right: 5px;
}

#cadastro{
  display: none;
  border: 1px solid #ED8211;
  text-align: left;
  color: #111;
  background-color: white;
  padding: 25px;
  padding-bottom: 15px;
  position: relative;
  width: auto;
  max-width: 500px;
  margin-left: auto;
  margin-right: auto;
  margin-top: 20px;
  background-color: #ebebeb;
}

#cadastro form {
  margin-bottom: 0;
}

#cadastro h2 {
  padding-left: 0;
}

[type=color], [type=date], [type=datetime-local], [type=datetime], [type=email], [type=month], [type=number], [type=password], [type=search], [type=tel], [type=text], [type=time], [type=url], [type=week], textarea {
  color: #5499C7;
  border: 1px solid silver;
  margin: 0 0 5px;
}

.info{
  background-color: #ffff00;
  padding: 20px;
  border: 5px solid #999;
}

#xnovo-cadastro{
  cursor: pointer;
  color: #ff0000;
  background-color: #ffff00;
  padding:8px;
  font-weight: bold;
  border: 1px solid #ffb76b;
  position: relative;
  padding-left: 20px;
}

#xnovo-cadastro:before{
  content: "";
  border-top: 20px solid transparent;
  border-right: 5px solid transparent;
  border-left: 10px solid #111;
  border-bottom: 20px solid transparent;
}

#autenticacao{
  border: 1px  solid #ED8211;
  width: auto;
  text-align: left;
  color: #111;
  background-color: white;
  padding: 25px;
  padding-bottom: 10px;
  margin-top: 20px;

}

@media screen and (max-width: 40em) {

  #autenticacao{
    border: 5px solid #999;
    width: 100%;
    text-align: left;
    top: 0;
    left: 0;
    color: #111;
    background-color: #fff;
    padding: 25px;
  }
  #cnt-logar, #cadastro{
    width: 100%;
  }

}

#login-cadastro {
  display: none;
}



.cnt-vazio {
  color: white;
  background-color: #FF4E06;
  padding: 20px;
}

.cnt-finalizar-compra {
  position: fixed;
  bottom: 0;
  width: 100%;
  margin: 0 auto;
  left: 0;
  right: 0;
  text-align: center;
  background-color: #e9ecef;
  background-color: rgba(0,0,0,0.8);
  z-index: 99999999999;
}

.cnt-finalizar-compra .button {
  margin: 5px;
}

@media (min-width: 550px) {

.cnt-finalizar-compra {
  position: absolute;
  top: 150px;
  bottom: 100%;
  width: 100%;
  margin: 0 auto;
  left: 0;
  right: 0;
  text-align: center;
  background-color: #e9ecef;
  background-color: rgba(0,0,0,0.8);
  z-index: 99999999999;
}


}




</style>