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
</head>

<body>
<p align="center"><b><font face="Verdana" size="2">Relação de Notas</font></b>
<br> 
<br> 
 <table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#EFEFEF" width="100%" id="AutoNumber2">
    <tr>
      <td align="center"><font face="Verdana" size="2">Nota</font></td>
      <td align="center"><font face="Verdana" size="2">Empresa</font></td>
      <td align="center"><font face="Verdana" size="2">Contrato</font></td>
      <td align="center"><font face="Verdana" size="2">Código</font></td>
      <td align="center"><font face="Verdana" size="2">Vigência da Obra</font></td>
      <td align="center"><font face="Verdana" size="2">Vigência da Nota</font></td>
    </tr>
<?
$relacaodeequipamentoobras = mysql_query("SELECT * FROM equipamento_obra where (inicio between '$ainicio' and '$afim' And status_nota = 'A') OR (fim between '$ainicio' and '$afim' And status_nota = 'A') OR (inicio < '$afim' And status_nota = 'A') ");
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
    <tr>
      <td align="center"><font face="Verdana" size="2"><? echo $notaNR_NOTA ?></font></td>
      <td align="center"><font face="Verdana" size="2"><? echo $relacliente?></font></td>
      <td align="center"><font face="Verdana" size="2"><? echo $relacontrato ?></font></td>
      <td align="center"><font face="Verdana" size="2"><? equipamento($eqpto[equipamento]) ?></font></td>
      <td align="center"><font face="Verdana" size="2"><? data($eqpto[inicio]) ?> |<? data($eqpto[fim]) ?></font></td>
      <td align="center"><font face="Verdana" size="2"><? data($notaNOTA_INI) ?> |<? data($notaNOTA_FIM) ?></font></td>
    </tr>


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
    <tr>
      <td align="center"><font face="Verdana" size="2"><? echo $notaNR_NOTA ?></font></td>
      <td align="center"><font face="Verdana" size="2"><? echo $relacliente?></font></td>
      <td align="center"><font face="Verdana" size="2"><? echo $relacontrato ?></font></td>
      <td align="center"><font face="Verdana" size="2"><? equipamento($eqpto[equipamento]) ?></font></td>
      <td align="center"><font face="Verdana" size="2"><? data($eqpto[inicio]) ?> |<? data($eqpto[fim]) ?></font></td>
      <td align="center"><font face="Verdana" size="2"><? data($notaNOTA_INI) ?> |<? data($notaNOTA_FIM) ?></font></td>
    </tr>

<? } ?>
<? } ?>

</body>

</html>