<? include("verifica.php")?>
<?
$result = explode('/',$inicio);
$resulta = explode('/',$fim);
$ainicio = "$result[2]-$result[1]-$result[0]";
$afim = "$resulta[2]-$resulta[1]-$resulta[0]"
?>
<html>

<head>
<meta http-equiv="Content-Language" content="pt-br">
<meta name="GENERATOR" content="Microsoft FrontPage 5.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Emitido</title>
<SCRIPT LANGUAGE="JavaScript" SRC="js/sorttable.js"></SCRIPT>
</head>

<body>
<SCRIPT LANGUAGE="JavaScript">
var t = new SortTable("t");
t.AddColumn("Nota","","center","");
t.AddColumn("Empresa","","center","");
t.AddColumn("Contrato","","","");
t.AddColumn("Codigo","","","");
t.AddColumn("Vigencia da Obras","","center","");
t.AddColumn("Vigencia da Nota","","center","");
</script>

<p align="center"><b><font face="Verdana" size="2">Relação de Notas de equipamento não concluidos</font></b>
<br> 
<br> 
 <table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#EFEFEF" width="100%" id="AutoNumber2">
    <tr>
      <td align="center"><font face="Verdana" size="2"><a href="javascript:SortRows(t,0)" class='navegacao1'>Nota</a></font></td>
      <td align="center"><font face="Verdana" size="2"><a href="javascript:SortRows(t,1)" class='navegacao1'>Empresa</a></font></td>
      <td align="center"><font face="Verdana" size="2"><a href="javascript:SortRows(t,2)" class='navegacao1'>Contrato</a></font></td>
      <td align="center"><font face="Verdana" size="2"><a href="javascript:SortRows(t,3)" class='navegacao1'>Código</font></a></td>
      <td align="center"><font face="Verdana" size="2"><a href="javascript:SortRows(t,4)" class='navegacao1'>Vigência da Obra</a></font></td>
      <td align="center"><font face="Verdana" size="2"><a href="javascript:SortRows(t,5)" class='navegacao1'>Vigência da Nota</a>/font></td>
    </tr>
<?
$relacaodeequipamentoobras = mysql_query("SELECT * FROM equipamento_obra where (inicio between '$ainicio' and '$afim') OR (fim between '$ainicio' and '$afim') OR (inicio < '$afim' And status_nota = 'A') OR (fim > '$afim' And inicio between '$ainicio' and '$afim' And status_nota = 'C') OR (fim > '$afim' And inicio between '$ainicio' and '$afim' And status_nota = 'A') OR (inicio < '$ainicio' And status_nota = 'A')");
$relacaodeequipamentoobrasn = mysql_num_rows($relacaodeequipamentoobras);


while ($eqpto = mysql_fetch_array($relacaodeequipamentoobras)){
$notaNR_NOTA = '';
$notaNOTA_INI = '';
$notaNOTA_FIM = '';
$relacliente = '';
$relacontrato = '';
?>
<?
$notasemitidas = mysql_query("SELECT * FROM notas where (EQUIP_OBRA_ID = '$eqpto[id]' And NOTA_INI between '$ainicio' and '$afim') OR (EQUIP_OBRA_ID = '$eqpto[id]' And NOTA_FIM between '$ainicio' and '$afim')");
$notasemitidasn = mysql_num_rows($notasemitidas);

if($notasemitidasn>=1){

while ($nota = mysql_fetch_array($notasemitidas)){
$notaNR_NOTA = $nota[NR_NOTA];
$notaNOTA_INI = $nota[NOTA_INI];
$notaNOTA_FIM = $nota[NOTA_FIM];


$relacaodeobras = mysql_query("SELECT * FROM obra where id = '$eqpto[obra]'");
while ($rela = mysql_fetch_array($relacaodeobras)){
$relacliente = $rela[cliente];
$relacontrato = $rela[contrato];
}
?>
<script>
t.AddLine("<font face='Verdana' size='2'><? echo $notaNR_NOTA ?></font>","<font face='Verdana' size='2'><? echo $relacliente?>","<font face='Verdana' size='2'><? echo $relacontrato ?></font>","<font face='Verdana' size='2'><? equipamento($eqpto[equipamento]) ?></font>","<font face='Verdana' size='2'><? data($eqpto[inicio]) ?> |<? data($eqpto[fim]) ?></font>","<font face='Verdana' size='2'><? data($notaNOTA_INI) ?> |<? data($notaNOTA_FIM) ?></font>");
</script>

<? } ?>



<?



} else { 
while ($nota = mysql_fetch_array($notasemitidas)){
$notaNR_NOTA = $nota[NR_NOTA];
$notaNOTA_INI = $nota[NOTA_INI];
$notaNOTA_FIM = $nota[NOTA_FIM];
}

$relacaodeobras = mysql_query("SELECT * FROM obra where id = '$eqpto[obra]'");
while ($rela = mysql_fetch_array($relacaodeobras)){
$relacliente = $rela[cliente];
$relacontrato = $rela[contrato];
}
?>
<script>
t.AddLine("<font face='Verdana' size='2'><? echo $notaNR_NOTA ?></font>","<font face='Verdana' size='2'><? echo $relacliente?>","<font face='Verdana' size='2'><? echo $relacontrato ?></font>","<font face='Verdana' size='2'><? equipamento($eqpto[equipamento]) ?></font>","<font face='Verdana' size='2'><? data($eqpto[inicio]) ?> |<? data($eqpto[fim]) ?></font>","<font face='Verdana' size='2'><? data($notaNOTA_INI) ?> |<? data($notaNOTA_FIM) ?></font>");
</script>

<? } ?>
<? } ?>


<SCRIPT>t.WriteRows()
SortRows(t,1);</SCRIPT>
</table>




</body>

</html>