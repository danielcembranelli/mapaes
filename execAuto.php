<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<?


$lines = file_get_contents('http://mapaes.escad.com.br/_layRelDiario.php?dt='.date("Y-m-d"));
require_once('lib/Mail/class.phpmailer.php');
$mail             = new PHPMailer();
			$mail->IsSMTP(); // telling the class to use SMTP
			$mail->Host       = "smtp.escad.com.br"; // SMTP server
			$mail->SMTPDebug  = 1;                     // enables SMTP debug information (for testing)
													   // 1 = errors and messages
													   // 2 = messages only
			$mail->Timeout = 160;
			$mail->SMTPAuth   = true;                  // enable SMTP authentication
			$mail->Host       = "smtp.escad.com.br"; // sets the SMTP server
			$mail->Port       = 587;                    // set the SMTP port for the GMAIL server
			$mail->Username   = "mapaes@escad.com.br"; // SMTP account username
			$mail->Password   = "3sc@dr3nt@l";        // SMTP account password
			$mail->From       = "mapaes@escad.com.br";
			$mail->FromName   = "MAPAES - Escad Rental";			
			$mail->Subject    = "[MapaES] Relatório Diario de ".date("d/m/Y");
			$mail->AltBody    = $lines;
			$mail->MsgHTML($lines);
/* Enviando a mensagem */
include("config.php");
$SqlEmail = mysql_query("SELECT emailUsuario FROM login where emaildiarioUsuario='S'");
	while ($sq = mysql_fetch_array($SqlEmail)){
			$mail->AddAddress($sq[emailUsuario],$sq[nome]);
	}

			if(!$mail->Send()) {
			  echo "Mailer Error: " . $mail->ErrorInfo;
			} else {
			  echo "Message sent!";
			}

$data = date("Y-m-d");
$hora = date("h:i");
$sql = mysql_query ("INSERT INTO `auto` ( `id` , `data`  , `hora`, `modo` ) VALUES ('', '$data', '$hora', 'rel_mapaes');");
if (!$sql){
echo "No foi possivel a consulta.";}
else{}
?>

</body>
</html>