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

<p align="center"><b><font face="Verdana">Relat�rio de obras com Operador
</font></b></p>

<p><font face="Verdana" size="1">Maquinas Ativas na obra</font></p>

<?
$anoticia = mysql_query("SELECT f.nome, o.contrato, o.cliente, o.endereco, e.nome, eo.equipamento, eo.acessorio, eo.inicio, eo.horimetro_ida, o.alojamento, o.alimentacao FROM equipamento_obra eo inner join operador e on (e.id=eo.operador) left join obra o on (o.id=eo.obra) left join equipamento e1 on (e1.id=eo.equipamento) left join familia f on (f.id=e1.familia) where (eo.operador != 'cliente' And eo.status = 'a') order by o.contrato") or die (mysql_error());
$anotician = mysql_num_rows($noticia);
if (!$anoticia){
?>Problemas na conex�o<?
}
else{
if ($anotician==0){
?>
<center>
<table border='0' width='730' cellspacing='1' cellpadding='0'>
<tr>
<td width='730' colspan='7'>&nbsp;
</td></tr>
</table>
<?
}else {
?>

<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber2">
  <tr>
    <td width="15%" align="center" style="border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="1">Equipamento</font></td>
    <td width="20%" align="center" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="1">Contrato - Cliente</font></td>
    <td width="20%" align="center" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1"><font face="Verdana" size="1">Operador</font></td>
    <td width="20%" align="center" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="1">Acess�rio</font></td>
    <td width="5%" align="center" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="1">Hor�metro Inicio</font></td>
    <td width="20%" align="center" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="1">Endere�o</font></td>
    <td width="10%" align="center" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="1">Alojamento</font></td>
    <td width="10%" align="center" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="1">Alimenta��o</font></td>
    <td width="10%" align="center" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="1">Data de Inicio</font></td>
  </tr>
  <? while ($adom = mysql_fetch_array($anoticia)){ ?>
  <tr>
    <td width="15%" align="center" style="border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="1"><?=$adom[nome]?> - <? equipamento($adom[equipamento]) ?></font></td>
    <td width="20%" align="center" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="1">

<? echo $adom[contrato] ?> - <? echo $adom[cliente] ?>

</font></td>
    <td width="20%" align="center" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1"><font face="Verdana" size="1"><? echo $adom[nome] ?></font></td>
    <td width="20%" align="center" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="1"><? if($adom[acessorio]==nda){ ?>-------------<? } else {?> <? acessorio($adom[acessorio]) ?> <? }?></font></td>
    <td width="5%" align="center" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="1"><? echo $adom[horimetro_ida] ?></font></td>
    <td width="20%" align="center" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="1">

<? echo $adom[endereco] ?>

</font></td>
<td width="10%" align="center" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="1">

<? if($adom[alojamento]=='E'){ echo 'Escad'; } else { echo 'Cliente'; } ?>

</font></td>
<td width="10%" align="center" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="1">

<? if($adom[alimentacao]=='E'){ echo 'Escad'; } else { echo 'Cliente'; } ?>

</font></td>

    <td width="20%" align="center" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="1"><? data($adom[inicio]) ?></font></td>
  </tr>
  <? } ?>
</table>
<? } } ?>

</body>

</html>