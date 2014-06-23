<? include("verifica.php");?>
<html>

<head>
<meta http-equiv="Content-Language" content="pt-br">
<meta name="GENERATOR" content="Microsoft FrontPage 5.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Relatório de Operador - Mapa</title>
</head>

<body>
<?
if($status==todas){
$noticia = mysql_query("SELECT * FROM operador order by nome");
} else {
$noticia = mysql_query("SELECT * FROM operador where status = '$status' ");
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
<img src='imagens/layout_seta.gif' width="15" height="9"><b class=font-10>Visualizar operador</b><br>&nbsp;
</td>
</tr>
<tr>
<td width='730' bgcolor='#FFFFFF' colspan='5'><font class=font-11><span class=font-azul><center>não existe nenhum equipamento para está consulta</center></span></font></td>
</tr>
</table>
<?
}else {
?>
<p align="center"><b><font face="Verdana">Relação de Operadores<br>
</font></b></p>
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber1">
  <tr>
<td>

<table width="100%">
<tr>
    <td width="40%" align="center" style="border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1"><font face="Verdana" size="1">Nome</font></td>
    <td width="30%" align="center" style="border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1"><font face="Verdana" size="1">Empresa</font></td>
    <td width="20%" align="center" style="border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1"><font face="Verdana" size="1">Categoria</font></td>
    <td width="20%" align="center" style="border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1"><font face="Verdana" size="1">Status</font></td>
  </tr>
</table>
</td>
</tr>
<? while ($dom = mysql_fetch_array($noticia)){ 
$cor = ($coralternada++ %2 ? "FFFFFF" : "FFFFDC");
?>
<tr bgcolor='<? echo $cor ?>'>
<td>

<table width="100%">
<tr>
    <td width="40%" align="center" <? if($dom[status]==a){?>style="border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1"<? } ?>><font face="Verdana" size="1"><? echo $dom[nome]?></font></td>
    <td width="30%" align="center" <? if($dom[status]==a){?>style="border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1"<? } ?>><font face="Verdana" size="1"><? echo $dom[empresa]?></font></td>
    <td width="20%" align="center" <? if($dom[status]==a){?>style="border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1"<? } ?>><font face="Verdana" size="1"><? echo $dom[classificacao]?></font></td>
    <td width="20%" align="center" <? if($dom[status]==a){?>style="border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1"<? } ?>><font face="Verdana" size="1"><? if($dom[status]==a){?>Disponível<? } else {?>Em obra<? } ?></font></td>
  </td>
</tr>
</table>

</td>
</tr>

<? if($dom[status]==b){?>
<?
$qnoticia = mysql_query("SELECT * FROM equipamento_obra where operador = '$dom[id]' order by id desc LIMIT 1");
$qnotician = mysql_num_rows($noticia);
if (!$qnoticia){
?>Problemas na conexão<?
}
else{
if ($qnotician==0){
?>
<?
}else {
?>
<? while ($qdom = mysql_fetch_array($qnoticia)){ ?>
<tr bgcolor='<? echo $cor ?>'>
<td>
<table width="100%">
<tr>
<? 
$anoticia = mysql_query("SELECT * FROM obra where id = $qdom[obra]");
$anotician = mysql_num_rows($anoticia);
if (!$anoticia){
?>Problemas na conexão<?
}
else{
if ($anotician==0){
?>Nada Consta<? } else { ?><? while ($adom = mysql_fetch_array($anoticia)){ ?>
    <td width="40%" align="center" style="border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1"><font face="Verdana" size="1">Contrato: <? echo $adom[contrato] ?></font></td>
    <td width="30%" align="center" style="border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1"><font face="Verdana" size="1">Obra:<? echo $adom[cliente] ?></font></td>
<?  } } } ?>
    <td width="30%" align="center" style="border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1"><font face="Verdana" size="1">Equipamento:

<? 
$anoticia = mysql_query("SELECT * FROM equipamento where id = $qdom[equipamento]");
$anotician = mysql_num_rows($anoticia);
if (!$anoticia){
?>Problemas na conexão<?
}
else{
if ($anotician==0){
?>Nada Consta<? } else { ?><? while ($adom = mysql_fetch_array($anoticia)){ ?>
<? echo $adom[codigo] ?>
<?  } } } ?>
</font></td>
  </tr>
</table>
</td>
</tr>
<? } } } ?>
<? } ?>
  <? } ?>
</table>
<? } } ?>
</body>

</html>