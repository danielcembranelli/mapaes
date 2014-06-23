<?php
require_once('class.phpmailer.php');
$mailer = new PHPMailer();
$mailer->IsSMTP();
$mailer->SMTPDebug = 1;
$mailer->Port = 587; //Indica a porta de conexão para a saída de e-mails
$mailer->Host = 'smtp.mapaes.escad.com.br';
$mailer->SMTPAuth = true; //define se haverá ou não autenticação no SMTP
$mailer->Username = 'testesuporte@mapaes.escad.com.br'; //Informe o e-mai o completo
$mailer->Password = 'email10#$%'; //Senha da caixa postal
$mailer->FromName = 'testesuporte@mapaes.escad.com.br'; //Nome que será exibido para o destinatário
$mailer->From = 'testesuporte@mapaes.escad.com.br'; //Obrigatório ser a mesma caixa postal indicada em "username"
$mailer->AddAddress('testesuporte@mapaes.escad.com.br'); //Destinatários
$mailer->Subject = 'Teste enviado através do PHP Mailer';
$mailer->Body = 'Este é um teste realizado com o PHP Mailer';
if(!$mailer->Send())
{
echo "Message was not sent";
echo "Mailer Error: " . $mailer->ErrorInfo; exit; }
print "E-mail enviado!"
?>
