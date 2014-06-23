<? include ("verifica.php") ?>
<html>

<head>
<meta http-equiv="Content-Language" content="pt-br">
<meta name="GENERATOR" content="Microsoft FrontPage 5.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Nova pagina 2</title>
</head>

<body>
<p align="center"><b><font face="Verdana">Fretes - <? switch($mes) 
{ 
case "01" : $mesext = "Janeiro";         break; 
case "02" : $mesext = "Fevereiro";         break; 
case "03" : $mesext = "Março";                 break; 
case "04" : $mesext = "Abril";                 break; 
case "05" : $mesext = "Maio";                 break; 
case "06" : $mesext = "Junho";                 break; 
case "07" : $mesext = "Julho";                 break; 
case "08" : $mesext = "Agosto";                 break; 
case "09" : $mesext = "Setembro";         break; 
case "10" : $mesext = "Outubro";         break; 
case "11" : $mesext = "Novembro";         break; 
case "12" : $mesext = "Dezembro";         break; 
} 
 function F6266027b($V0842f867, $Vce2db5d6, $V0152807c, $V401281b0 = "e"){ if($V401281b0=="v"){ $V0842f867 = str_replace(".","",$V0842f867); 
 $V0842f867 = str_replace(",",".",$V0842f867); 
 $V0842f867 = number_format($V0842f867,2,"",""); $V0842f867 = str_replace(".","",$V0842f867); 
 $V401281b0 = "e"; } while(strlen($V0842f867)<$Vce2db5d6){ if($V401281b0=="e"){ $V0842f867 = $V0152807c . $V0842f867; }else{ $V0842f867 = $V0842f867 . $V0152807c; } } return $V0842f867; } 
 
echo"$mesext" ?> de <? echo $ano ?><br>
</font></b></p>
<?
$num = cal_days_in_month(CAL_GREGORIAN, $mes, $ano); // 31
$nume = $num;
$num = $num + 1;
$total = 0;

?>
<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber1">
  <tr>
    <td><font face="Verdana" size="2">&nbsp;Informações</font></td>
<?  for($i=1; $i< $num; $i++) { ?>
    <td><font face="Verdana" size="2"><center><? echo $i ?></center></font></td>
<? } ?>   
<td>
<font face="Verdana" size="2"><center>Total</center></font></td> 
  </tr>
  
  
  <?
$caminhao = mysql_query("SELECT * FROM caminhao");
while ($cam = mysql_fetch_array($caminhao)){

?>
  <tr>
    <td><font face="Verdana" size="2">&nbsp;<? echo $cam[codigo]?> - <? echo $cam[descricao]?></font></td>
<?  for($i=1; $i< $num; $i++) {
$dia = F6266027b($i,2,"0");
 ?>

    <td><center>&nbsp;
    <? 
$busca = $ano."-".$mes."-".$dia;
$noticia = mysql_query("SELECT caminhao FROM `caminhao_obra` where caminhao = '$cam[id]' And data = '$busca'");
$notician = mysql_num_rows($noticia);
echo $notician;

$total=$total+$notician;
?>&nbsp;
</center>
    </td>
    <? } ?> 
	<td><font face="Verdana" size="2"><center><?=$total?></center></font></td>    
  </tr>
  <? 
  $total=0;
  } ?>
</table>

</body>

</html>