<? include("verifica.php") ?>
<html>

<head>
<meta http-equiv="Content-Language" content="pt-br">
<meta name="GENERATOR" content="Microsoft FrontPage 5.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Nova pagina 1</title>
</head>

<body>
<p align="center"><b><font face="Verdana">Última Obra do Equipamento
</font></b></p>
<?
$anoticia = mysql_query("SELECT * FROM `equipamento_obra` WHERE `equipamento` = '$obra' ORDER BY `id` DESC LIMIT 1 ");
$anotician = mysql_num_rows($noticia);
if (!$anoticia){
?>Problemas na conexão<?
}
else{
if ($anotician==0){
?>
<center>
<table border='0' width='730' cellspacing='1' cellpadding='0'>
<tr>
<td width='730' colspan='7'>&nbsp;
</td></tr>

<tr>
<td width='730' bgcolor='#FFFFFF' colspan='5'><font class=font-11><span class=font-azul><center>não existe nenhum obra para está consulta</center></span></font></td>
</tr>
</table>
<?
}else {
?>
<? while ($adom = mysql_fetch_array($anoticia)){ ?>
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber1" height="78">
  <tr>
    <td width="30%" style="border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1" height="19">
    <font face="Verdana" size="1">Equipamento</font></td>
    <td width="70%" style="border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1" height="19">
    <font face="Verdana" size="1"><? familianomeeqpto($adom[equipamento]) ?></font></td>
  </tr>
  <tr>
    <td width="30%" style="border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1" height="20">
    <font face="Verdana" size="1">Código</font></td>
    <td width="70%" style="border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1" height="20">
    <font face="Verdana" size="1"><? equipamento($adom[equipamento]) ?></font></td>
  </tr>
  <tr>
    <td width="30%" height="20" style="border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="1">Retorno da Obra</font></td>
    <td width="70%" height="20" style="border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="1"><? data($adom[fim]) ?></font></td>
  </tr>
  <tr>
    <td width="30%" height="20" style="border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="1">Horimetro de Chegada</font></td>
    <td width="70%" height="20" style="border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="1"><? echo $adom[horimetro_volta] ?></font></td>
  </tr>
  <tr>
    <td width="30%" height="19" style="border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="1">Status do Equipamento</font></td>
    <td width="70%" height="19" style="border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <? if($adom[status]==a){?><font face="Verdana" size="1" color="#FF0000">Em andamento</font><? } else {?><font face="Verdana" size="1">Concluido</font><? } ?></td>
  </tr>
  <?
$tec1 = mysql_query("SELECT * FROM obra where id = '$adom[obra]' ");
$tec1n = mysql_num_rows($tec1);
if (!$tec1){
?>Problemas na conexão<?
}
else{
if ($tec1n==0){
?>		
<?
}else {
?>
 <? while ($te1 = mysql_fetch_array($tec1)){ ?>
    <tr>
    <td width="30%" height="19" style="border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="1">Contrato</font></td>
    <td width="70%" height="19" style="border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="1"><? echo $te1[contrato] ?></font></td>
  </tr>
    <tr>
    <td width="30%" height="19" style="border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="1">Clientes</font></td>
    <td width="70%" height="19" style="border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="1"><? echo $te1[cliente] ?></font><? } ?></td>
  </tr>
    <tr>
    <td width="30%" height="19" style="border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="1">Endereço da Obra</font></td>
    <td width="70%" height="19" style="border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="1"><? echo $te1[endereco] ?></font></td>
  </tr>
  <? } } } ?>
</table>
<? } } ?>
</body>

</html>