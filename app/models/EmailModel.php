<?
class EmailModel{

######################################################################################################
########## SEND MAIL 
######################################################################################################

function SendMail($de, $para, $cc, $bcc, $assunto, $nome, $msg)
{

/* Destinatário */
$to = "$para" . ", " ;
$to .= "$para";

/* Assunto */
$subject = $assunto;

/* Mensagem */

$message = "Email: " . $de . "<br><br>" . str_replace("\r\n", "<p>", $msg);

$headers = "MIME-Version: 1.0\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\n";
$headers .= "From: contato@weltonaraujo.com\n";
$headers .= "Cc: $cc\n";
$headers .= "Bcc: $bcc\n";
$headers .= "Return-Path: $para\n"; 

/* Enviando a mensagem */ 

mail($to, $subject, $message, $headers);

return "Mensagem Enviada com Sucesso!";

} // END FUNCTIOM

} // END CLASS
?> 