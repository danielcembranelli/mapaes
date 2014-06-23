<? include("verifica.php")?>
<?
$result = explode('/',$inicio);
$resulta = explode('/',$fim);
$inicio = "$result[2]-$result[1]-$result[0]";
$fim = "$resulta[2]-$resulta[1]-$resulta[0]"
?>
<html>

<head>
<meta http-equiv="Content-Language" content="pt-br">
<meta name="GENERATOR" content="Microsoft FrontPage 5.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Emitido</title>
</head>

<body>
<?
$noticia = mysql_query("SELECT * FROM obra where inicio between '$inicio' and '$fim' order by cliente");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conexão<?
}
else{
if ($notician==0){
?>
<table border='0' width='730' cellspacing='1' cellpadding='0'>
<tr>
<td width='730' colspan='7'>
&nbsp;</td></tr>
<tr>
<td width='730' validn='middle' colspan='7'>
<img src='imagens/layout_seta.gif' width="15" height="9"><b class=font-10>Visualizar obras</b><br>&nbsp;
</td>
</tr>
<tr>
<td width='730' bgcolor='#FFFFFF' colspan='5'><font class=font-11><span class=font-azul><center>não existe nenhum obra para está consulta</center></span></font></td>
</tr>
</table>
<?
}else {
?>
<form method="POST" action="gerarelatorio5b.php">
 <table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#EFEFEF" width="100%" id="AutoNumber2">
    <tr>
      <td align="center"><font face="Verdana" size="2">Emitido</font></td>
      <td align="center"><font face="Verdana" size="2">Nota</font></td>
      <td align="center"><font face="Verdana" size="2">Empresa</font></td>
      <td align="center"><font face="Verdana" size="2">Contrato</font></td>
      <td align="center"><font face="Verdana" size="2">Equipamento</font></td>
      <td align="center"><font face="Verdana" size="2">Código</font></td>
      <td align="center"><font face="Verdana" size="2">Inicio | Fim</font></td>
      <td align="center"><font face="Verdana" size="2">Vigência da Nota</font></td>
    </tr>
<? while ($dom = mysql_fetch_array($noticia)){ 
$cor = ($coralternada++ %2 ? "FFFFFF" : "FFFFDC");?>
<?
$qnoticia = mysql_query("SELECT * FROM equipamento_obra where status_nota = 'A' And inicio between '$inicio' and '$fim'");
$qnotician = mysql_num_rows($noticia);
if (!$qnoticia){
?>Problemas na conexão<?
}
else{
if ($qnotician==0){
?>
<table border='0' width='730' cellspacing='1' cellpadding='0'>
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

<? while ($qdom = mysql_fetch_array($qnoticia)){ ?>
      </font></td>
    <tr>
<input type="hidden" name="todo[]" value="1">
      <td align="center"><font size="1"><input type="radio" value="A" name="status[<? echo $qdom[id] ?>]" checked><b><font face="Verdana" size="1">Em 
  andamento</font></b><br>
  <input type="radio" value="C" name="status[<? echo $qdom[id] ?>]"><font face="Verdana" size="1">Concluido</font>
<br>
  <input type="radio" value="N" name="status[<? echo $qdom[id] ?>]"><font face="Verdana" size="1">Não Emitir</font>
</td>

      <td align="center"><font size="1"><input type="text" name="nota[]" size="10"></font></td>


<input type="hidden" name="cliente[]" value="<? echo $dom[cliente]?>">
      <td align="center"><font face="Verdana" size="1"><? echo $dom[cliente]?></font>&nbsp;</td>
<input type="hidden" name="contrato[]" value="<? echo $dom[contrato]?>">
<input type="hidden" name="obra[]" value="<? echo $dom[id]?>">
<input type="hidden" name="eptoid[]" value="<? echo $qdom[id]?>">
      <td align="center"><font face="Verdana" size="1"><? echo $dom[contrato]?></font>&nbsp;</td>
      <td align="center"><font face="Verdana" size="1"><? 
$anoticia = mysql_query("SELECT * FROM equipamento where id = $qdom[equipamento]");
$anotician = mysql_num_rows($anoticia);
if (!$anoticia){
?>Problemas na conexão<?
}
else{
if ($anotician==0){
?>Nada Consta<? } else { ?>
<? while ($adom = mysql_fetch_array($anoticia)){ ?>
<input type="hidden" name="familia[]" value="<? familianome($adom[familia]) ?>">
<? familianome($adom[familia]) ?>
<?  } } } ?>
      </font></td>
      <td align="center"><font face="Verdana" size="1">
<? 
$anoticia = mysql_query("SELECT * FROM equipamento where id = $qdom[equipamento]");
$anotician = mysql_num_rows($anoticia);
if (!$anoticia){
?>Problemas na conexão<?
}
else{
if ($anotician==0){
?>Nada Consta<? } else { ?>
<? while ($adom = mysql_fetch_array($anoticia)){ ?>
<input type="hidden" name="codigo[]" value="<? echo $adom[codigo] ?>">
<? echo $adom[codigo] ?>
<?  } } } ?>


</font></td>
<input type="hidden" name="endereco[]" value="<? echo $dom[endereco] ?>">
<input type="hidden" name="data[]" value="<? echo $qdom[inicio] ?> | <? echo $qdom[fim] ?>">
<td align="center"><font face="Verdana" size="1"><? data($qdom[inicio]) ?> | <? data($qdom[fim]) ?></font></td>
<td align="center"><font face="Verdana" size="1"><input type="text" name="nota_ini[]" size="10"> | <input type="text" name="nota_fim[]" size="10"></font></td>
    </tr>
    <? } } } ?>
    <? } } ?>
  </table>
  <? } ?>
<br>
<center><input type="submit" value="Registrar" name="B1"></center>
</form>

</body>

</html>