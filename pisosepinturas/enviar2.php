<?php

require "phpmailer/class.phpmailer.php";

$PHPMailer = new PHPMailer();
 
 
// envia email HTML
$PHPMailer->isHTML( true );
 
// codificação UTF-8, a codificação mais usada recentemente
$PHPMailer->Charset = 'UTF-8';
 
 
// E-Mail do remetente (deve ser o mesmo de quem fez a autenticação
// nesse caso seu_login@gmail.com)
$PHPMailer->From = 'bernardo.cherubini@gmail.com';
 
// Nome do rementente
$PHPMailer->FromName = 'Pisos e Pinturas';
 
// assunto da mensagem
$PHPMailer->Subject = 'Contato Site';
 
// corpo da mensagem
$PHPMailer->Body = '<p>Mensagem em HTML</p>';
 
// corpo da mensagem em modo texto
$PHPMailer->AltBody = 'Mensagem em texto';
 
// adiciona destinatário (pode ser chamado inúmeras vezes)
$PHPMailer->AddAddress( 'bernardo.cherubini@gmail.com' );
 
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