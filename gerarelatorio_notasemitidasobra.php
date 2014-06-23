<? include("verifica.php")?>
<html>

<head>
<meta http-equiv="Content-Language" content="pt-br">
<meta name="GENERATOR" content="Microsoft FrontPage 5.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Emitido</title>
</head>

<body>
<p align="center"><b><font face="Verdana" size="2">Relação de Notas -  Emitidas por obra</font></b>
<br> 
<br> 
<?
$relacaodeobras = mysql_query("SELECT * FROM obra where id = '$obra'");
$relacaodeobrasn = mysql_num_rows($relacaodeobras);
?>
 <table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#EFEFEF" width="100%" id="AutoNumber2">
    <tr>
      <td align="center"><font face="Verdana" size="2">Nota</font></td>
      <td align="center"><font face="Verdana" size="2">Empresa</font></td>
      <td align="center"><font face="Verdana" size="2">Contrato</font></td>
      <td align="center"><font face="Verdana" size="2">Código</font></td>
      <td align="center"><font face="Verdana" size="2">Vigência da Obra</font></td>
      <td align="center"><font face="Verdana" size="2">Vigência da Nota</font></td>
    </tr>
<? if($relacaodeobrasn==0){ ?>
	  <tr>
        <td width="100%" colspan="5">Não a notas para essa consulta.</td>
      </tr>
<? } else { ?>

<?
while ($rela = mysql_fetch_array($relacaodeobras)){
?>
<?
$relacaodeequipamentoobras = mysql_query("SELECT * FROM equipamento_obra where obra = '$rela[id]'");
$relacaodeequipamentoobrasn = mysql_num_rows($relacaodeequipamentoobras);
while ($eqpto = mysql_fetch_array($relacaodeequipamentoobras)){
?>
<?
$notasemitidas = mysql_query("SELECT * FROM notas where EQUIP_OBRA_ID = '$eqpto[id]' order by NOTA_INI");
$notasemitidasn = mysql_num_rows($notasemitidas);


if($notasemitidasn==0){
?>
    <tr>
      <td align="center"><font face="Verdana" size="2"><? echo $notaNR_NOTA ?></font></td>
      <td align="center"><font face="Verdana" size="2"><? echo $rela[cliente] ?></font></td>
      <td align="center"><font face="Verdana" size="2"><? echo $rela[contrato] ?></font></td>
      <td align="center"><font face="Verdana" size="2"><? equipamento($eqpto[equipamento]) ?></font></td>
      <td align="center"><font face="Verdana" size="2"><? data($eqpto[inicio]) ?> |<? data($eqpto[fim]) ?></font></td>
      <td align="center"><font face="Verdana" size="2"><? data($notaNOTA_INI) ?> |<? data($notaNOTA_FIM) ?></font></td>
    </tr>

<?
}elseif($notasemitidasn==1){

while ($nota = mysql_fetch_array($notasemitidas)){
$notaNR_NOTA = $nota[NR_NOTA];
$notaNOTA_INI = $nota[NOTA_INI];
$notaNOTA_FIM = $nota[NOTA_FIM];
}
?>
    <tr>
      <td align="center"><font face="Verdana" size="2"><? echo $notaNR_NOTA ?></font></td>
      <td align="center"><font face="Verdana" size="2"><? echo $rela[cliente] ?></font></td>
      <td align="center"><font face="Verdana" size="2"><? echo $rela[contrato] ?></font></td>
      <td align="center"><font face="Verdana" size="2"><? equipamento($eqpto[equipamento]) ?></font></td>
      <td align="center"><font face="Verdana" size="2"><? data($eqpto[inicio]) ?> |<? data($eqpto[fim]) ?></font></td>
      <td align="center"><font face="Verdana" size="2"><? data($notaNOTA_INI) ?> |<? data($notaNOTA_FIM) ?></font></td>
    </tr>
<?
}else{

while ($nota = mysql_fetch_array($notasemitidas)){
$notaNR_NOTA = $nota[NR_NOTA];
$notaNOTA_INI = $nota[NOTA_INI];
$notaNOTA_FIM = $nota[NOTA_FIM];

?>
    <tr>
      <td align="center"><font face="Verdana" size="2"><? echo $nota[NR_NOTA] ?></font></td>
      <td align="center"><font face="Verdana" size="2"><? echo $rela[cliente] ?></font></td>
      <td align="center"><font face="Verdana" size="2"><? echo $rela[contrato] ?></font></td>
      <td align="center"><font face="Verdana" size="2"><? equipamento($eqpto[equipamento]) ?></font></td>
      <td align="center"><font face="Verdana" size="2"><? data($eqpto[inicio]) ?> |<? data($eqpto[fim]) ?></font></td>
      <td align="center"><font face="Verdana" size="2"><? data($nota[NOTA_INI]) ?> |<? data($nota[NOTA_FIM]) ?></font></td>
    </tr>
<? } ?>
<? } ?>
<? } ?>
<? } ?>
<? } ?>
</table>
<? echo $notasemitidasn ?>
</body>

</html>