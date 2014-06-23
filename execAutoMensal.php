<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<?
$dt=date("Y-m",mktime(0,0,0,date('m')-1,date('d'),date('Y')));
$dtlabel=date("m/Y",mktime(0,0,0,date('m')-1,date('d'),date('Y')));

ini_set('max_execution_time','999999999999999999999');
ini_set("SMTP","mail.cl07.mobimail.com");
ini_set("sendmail_from","mapaes@escad.com.br");
include("config.php");
$lines = file_get_contents('http://mapaes.escad.com.br/_layRelMensal.php?dt='.$dt);
$headers = "MIME-Version: 1.0\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\n";
$headers .= "From: MapaES Escad Rental <mapaes@escad.com.br>\n";
/* Enviando a mensagem */
$SqlEmail = mysql_query("SELECT emailUsuario FROM login where emailmensalUsuario='S'");
while ($sq = mysql_fetch_array($SqlEmail)){

	mail($sq[emailUsuario], "MAPAES: Relatório Mensal de ".$dtlabel, $lines, $headers);
}
//echo mail("nadiclecio@escad.com.br", "MAPAES: Relatório Mensal de ".$dtlabel, $lines, $headers);
//echo mail("alisson@escad.com.br", "MAPAES: Relatório Mensal de ".$dtlabel, $lines, $headers);
//echo mail("grace@escad.com.br", "MAPAES: Relatório Mensal de ".$dtlabel, $lines, $headers);
//echo mail("renata@escad.com.br", "MAPAES: Relatório Mensal de ".$dtlabel, $lines, $headers);
//echo mail("rhaiza@escad.com.br", "MAPAES:  Relatório Mensal de ".$dtlabel, $msg, $headers);
//echo mail("jessica@escad.com.br", "MAPAES: Relatório Mensal de ".$dtlabel, $lines, $headers);
//echo mail("edvaldo@escad.com.br", "MAPAES: Relatório Mensal de ".$dtlabel, $lines, $headers);
//echo mail("leticia@escad.com.br", "MAPAES: Relatório Mensal de ".$dtlabel, $lines, $headers);
//echo mail("flavia@escad.com.br", "MAPAES: Relatório Mensal de ".$dtlabel, $lines, $headers);
//echo mail("mapaes@escad.com.br", "MAPAES: Relatório Mensal de ".$dtlabel, $lines, $headers);


$data = date("Y-m-d");
$hora = date("h:i");
$sql = mysql_query ("INSERT INTO `auto` ( `id` , `data`  , `hora`, `modo` ) VALUES ('', '$data', '$hora', 'rel_mapaes_mensal');");
if (!$sql){
echo "No foi possivel a consulta.";}
else{}
?>

</body>
</html>