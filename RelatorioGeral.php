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
<?





$noticia = mysql_query("SELECT * FROM obra o left join proposta p on (o.idProposta=p.idProposta) left join clientes c on (c.Cli_ID=p.idCliente) where o.status='a'");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conexão<?
}
else{
if ($notician>0){
while ($dom = mysql_fetch_array($noticia)){ 
?>

<table border="1" cellpadding="4" cellspacing="0" bordercolor="#111111" width="100%" id="AutoNumber2">
  <tr>
    <td colspan="2" align="center" bgcolor="#999999"><font face="Verdana" size="1">Cliente / Contrato</font></td>
    <td colspan="3" align="center" bgcolor="#999999"><font face="Verdana" size="1">Local</font></td>
    <td align="center" bgcolor="#999999"><font face="Verdana" size="1">Inicio</font></td>
    <td align="center" bgcolor="#999999"><font face="Verdana" size="1">Previs&atilde;o</font></td>
  </tr>
  <tr>
    <td align="center" colspan="2"><font face="Verdana" size="1"><? echo $dom[contrato]?>&nbsp;<? echo $dom[cliente]?></font></td>
    <td align="center" colspan="3"><font face="Verdana" size="1"><? echo $dom[endereco]?></font></td>
    <td align="center"><font face="Verdana" size="1"><? data($dom[inicio])?></font></td>
    <td align="center"><font face="Verdana" size="1"><?=data($dom[dtprevisaoProposta])?></font></td>
</tr>
<?
$anoticia = mysql_query("SELECT * FROM equipamento_obra where obra = '$dom[id]' And status = 'a' order by inicio");
$anotician = mysql_num_rows($anoticia);
if (!$anoticia){
?>Problemas na conexão<?
}
else{
if ($anotician>0){
?>

  <tr>
    <td width="10" align="center" bgcolor="#CCCCCC">
    <font face="Verdana" size="1">#</font></td>
    <td width="40%" align="center" bgcolor="#CCCCCC">
    <font face="Verdana" size="1">Equipamento Ativo</font></td>
    <td width="10%" align="center" bgcolor="#CCCCCC"><font face="Verdana" size="1">Codigo Interno</font></td>
    <td width="20%" align="center" bgcolor="#CCCCCC">
    <font face="Verdana" size="1">Operador</font></td>
    <td width="20%" align="center" bgcolor="#CCCCCC">
    <font face="Verdana" size="1">Acessório</font></td>
    <td width="20%" align="center" bgcolor="#CCCCCC">
    <font face="Verdana" size="1">Horímetro Inicio</font></td>

    <td width="20%" align="center" bgcolor="#CCCCCC">
    <font face="Verdana" size="1">Data de Inicio</font></td>
  </tr>
<? 
  	$a=0;
		while ($adom = mysql_fetch_array($anoticia)){
	$a++;
?>
  <tr>
    <td width="10" align="center">
    <font face="Verdana" size="1"><?=$a?></font></td>
    <td width="40%" align="center">
    <font face="Verdana" size="1"><? familianomeeqpto($adom[equipamento]) ?></font></td>
    <td width="10%" align="center"><font face="Verdana" size="1">
      <? equipamento($adom[equipamento]) ?>
    </font></td>
    <td width="20%" align="center">
    <font face="Verdana" size="1"><? if($adom[operador]==cliente){ ?> Cliente <? } else {?> <? operador($adom[operador])?> <? }?></font></td>
    <td width="20%" align="center">
    <font face="Verdana" size="1"><? if($adom[acessorio]==nda){ ?>-------------<? } else {?> <? acessorio($adom[acessorio]) ?> <? }?></font></td>
    <td width="20%" align="center">
    <font face="Verdana" size="1"><? echo $adom[horimetro_ida] ?></font></td>
    <td width="20%" align="center">
    <font face="Verdana" size="1"><? data($adom[inicio]) ?></font></td>
  </tr>
  <? } ?>

<? } } ?>
<?
$anoticia = mysql_query("SELECT * FROM equipamento_obra where obra = '$dom[id]' And status = 'b' order by fim");
$anotician = mysql_num_rows($anoticia);
if (!$anoticia){
?>Problemas na conexão<?
}
else{
if ($anotician>0){
?>

<tr>
    <td width="10" align="center" bgcolor="#CCCCCC"><font face="Verdana" size="1">#</font></td>
    <td width="40%" align="center" bgcolor="#CCCCCC"><font face="Verdana" size="1">Equipamento Inativos</font></td>
    <td width="10%" align="center" bgcolor="#CCCCCC"><font face="Verdana" size="1">Codigo Interno</font></td>
    <td width="20%" align="center" bgcolor="#CCCCCC"><font face="Verdana" size="1">Operador</font></td>
    <td width="20%" align="center" bgcolor="#CCCCCC"><font face="Verdana" size="1">Acessório</font></td>
    <td width="20%" align="center" bgcolor="#CCCCCC"><font face="Verdana" size="1">Horímetro Final</font></td>
    <td width="20%" align="center" bgcolor="#CCCCCC"><font face="Verdana" size="1">Data de Final</font></td>
  </tr>
  <? 
  $b=0;
  while ($adom = mysql_fetch_array($anoticia)){ 
  $b++;
  ?>
  <tr>
  <td width="10" align="center">
    <font face="Verdana" size="1"><?=$b?></font></td>
    <td width="40%" align="center">
    <font face="Verdana" size="1"><? familianomeeqpto($adom[equipamento]) ?></font></td>
    <td width="10%" align="center"><font face="Verdana" size="1">
      <? equipamento($adom[equipamento]) ?>
    </font></td>
    <td width="20%" align="center">
    <font face="Verdana" size="1"><? if($adom[operador]==cliente){ ?> Cliente <? } else {?> <? operador($adom[operador])?> <? }?></font></td>
    <td width="20%" align="center">
    <font face="Verdana" size="1"><? if($adom[acessorio]==nda){ ?>-------------<? } else {?> <? acessorio($adom[acessorio]) ?> <? }?></font></td>
	<td width="20%" align="center">
    <font face="Verdana" size="1"><? echo $adom[horimetro_volta] ?></font></td>
    <td width="20%" align="center"><font face="Verdana" size="1">
      <? data($adom[fim]) ?>
    </font></td>
  </tr>
  <? } ?>
</table>
<? } } ?>

<? } } } ?>
</body>

</html>