<?php
$headers = 'From: '. $_POST['email'] . "\r\n" .
    'Reply-To: '. $_POST['email'] . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
	
$mensagem = "Nome: ". $_POST['nome']. "\r\n \r\n". $_POST['txt'];

/*if( mail( 'bernardo.cherubini@gmail.com' , 'Formulário de Contato' , $mensagem, $headers) )
echo "deu";
else
echo "não deu"; */

require "phpmailer/class.phpmailer.php";

$PHPMailer = new PHPMailer();
 
 
// envia email HTML
$PHPMailer->isHTML( true );
 
// codificação UTF-8, a codificação mais usada recentemente
$PHPMailer->Charset = 'UTF-8';
 

$PHPMailer->From = $_POST['email'];

$PHPMailer->AddReplyTo($_POST['email'], $_POST['nome']);
 
// Nome do rementente
$PHPMailer->FromName = $_POST['nome'];
 
// assunto da mensagem
$PHPMailer->Subject = 'Formulario de Contato';
 
// corpo da mensagem
$PHPMailer->Body = "<b>". $_POST['nome']. "</b> (".$_POST['email'].")  <br><br>". $_POST['txt'];
 
// corpo da mensagem em modo texto
$PHPMailer->AltBody = "Nome: ". $_POST['nome']. "(".$_POST['email'].") \r\n \r\n". $_POST['txt'];
 
// adiciona destinatário (pode ser chamado inúmeras vezes)
$PHPMailer->AddAddress( 'bernardo.cherubini@gmail.com' );
 $PHPMailer->AddAddress( 'contato@pisosepinturas.com.br' );
// adiciona um anexo
//$PHPMailer->AddAttachment( 'arquivo.pdf' );
 
//verifica se enviou corretamente
if ( $PHPMailer->Send() )
{
	echo "Enviado com sucesso";
}
else
{
	echo 'Erro do PHPMailer: ' . $PHPMailer->ErrorInfo;
}

?>