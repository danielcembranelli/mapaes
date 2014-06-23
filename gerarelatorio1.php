<? include("verifica.php");?>
<html>

<head>
<meta http-equiv="Content-Language" content="pt-br">
<meta name="GENERATOR" content="Microsoft FrontPage 5.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Relatório de Equipamento - Mapa</title>
</head>

<body>
<?
if($status==todas){
$noticia = mysql_query("SELECT * FROM equipamento where `excluido` != 's' order by codigo");
} else {
$noticia = mysql_query("SELECT * FROM equipamento where status = $status And `excluido` != 's' order by codigo");
}
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conexão<?
}
else{
if ($notician==0){
?><table border='0' width='730' cellspacing='1' cellpadding='0'>
<tr>
<td width='730' validn='middle' colspan='7'>
<img src='imagens/layout_seta.gif' width="15" height="9"><b class=font-10>Visualizar equipamento</b><br>&nbsp;
</td>
</tr>
<tr>
<td width='730' bgcolor='#FFFFFF' colspan='5'><font class=font-11><span class=font-azul><center>não existe nenhum equipamento para está consulta</center></span></font></td>
</tr>
</table>
<?
}else {
?>
<p align="center"><b><font face="Verdana">Relação de Maquinas<br>
</font></b></p>
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber1">
  <tr>
    <td width="25%" align="center" style="border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1"><font face="Verdana" size="1">Equipamento</font></td>
    <td width="14%" align="center" style="border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1"><font face="Verdana" size="1">Código</font></td>
    <td width="43%" align="center" style="border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1"><font face="Verdana" size="1">Familia</font></td>
    <td width="18%" align="center" style="border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1"><font face="Verdana" size="1">Status</font></td>
  </tr>
<? while ($dom = mysql_fetch_array($noticia)){ 
$cor = ($coralternada++ %2 ? "FFFFFF" : "FFFFDC");
?>
<tr bgcolor='<? echo $cor ?>'>
    <td width="25%" align="center" style="border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1"><font face="Verdana" size="1"><? echo $dom[modelo]?></font></td>
    <td width="14%" align="center" style="border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1"><font face="Verdana" size="1"><? echo $dom[codigo]?></font></td>
    <td width="43%" align="center" style="border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1"><font face="Verdana" size="1"><? familianome($dom[familia]) ?></font></td>
    <td width="18%" align="center" style="border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1"><font face="Verdana" size="1"><? status($dom[status]) ?></font></td>
  </tr>
  <? } ?>
</table>
<? } } ?>
</body>

</html>