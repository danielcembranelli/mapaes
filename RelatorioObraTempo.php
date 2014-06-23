<? include("config.php");?>
<?php header("Content-Type: text/html;  charset=ISO-8859-1",true); ?>
<html>
<head>
<title>MAPAES: Obras Ativas</title>
<meta http-equiv='content-type' content='text/html; charset=iso-8859-1'>
<link rel='StyleSheet' href='temas/include/estilos.css' type='text/css'></head>
<body>
<p align="center"><b><font face="Verdana">Obras Ativas - <?=$_POST[Dias]?> dias<br>
</font></b></p>

		
		

<table border="1" bordercolor="#666666" cellspacing="0" cellpadding="1">

    <tr>
    <td align="center">CONTRATO</td>
	<td align="center" height="20">CLIENTE</td>
    <td align="center" height="20">ENDEREÇO</td>
    <td align="center" width="15%" height="20">INÍCIO</td>
    </tr>
    
 <?
 $Data=date ("Y-m-d",mktime (0,0,0,date("m"),date("d")-$_POST[Dias], date("Y")));
       $SqlFMaster = mysql_query("SELECT o.contrato, o.cliente, DATE_FORMAT(o.inicio,'%d/%m/%Y') as inicio, o.endereco FROM hostplaz_escad.obra o where status='a' And o.inicio <= '$Data' order by contrato");
        while ($sM = mysql_fetch_array($SqlFMaster)){ 
		$cor = ($coralternada++ %2 ? "FFFFFF" : "FFFFDC");
?>   
    <tr>
		<td  align="center"><?=$sM[contrato]?></td>
		<td align="center" height="20"><?=$sM[cliente]?></td>
    <td align="center" height="20"><?=$sM[endereco]?></td>
    <td align="center" height="20"><?=$sM[inicio]?></td>
    </tr>
<?
}
mysql_free_result($SqlFMaster);
?>
</table>
</body>
</html>