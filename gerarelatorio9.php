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

<p align="center"><b><font face="Verdana">Relatório de obras sem Operador
</font></b></p>

<p><font face="Verdana" size="1">Maquinas Ativas na obra</font></p>

<?
$anoticia = mysql_query("SELECT eo.*, f.* FROM equipamento_obra eo inner join equipamento e on (e.id=eo.equipamento) left join familia f on (f.id=e.familia)  where eo.operador = 'cliente' And eo.status = 'a' order by eo.obra");
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
</table>
<?
}else {
?>

<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber2">
  <tr>
    <td width="20%" align="center" style="border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="1">Equipamento</font></td>
    <td width="20%" align="center" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="1">Contrato - Cliente</font></td>
    <td width="20%" align="center" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="1">Acessório</font></td>
    <td width="20%" align="center" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="1">Horímetro Inicio</font></td>
    <td width="10%" align="center" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="1">Endereço</font></td>
    <td width="10%" align="center" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="1">Data de Inicio</font></td>
  </tr>
  <? while ($adom = mysql_fetch_array($anoticia)){ ?>
  <tr>
    <td width="20%" align="center" style="border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="1"><?=$adom[nome]?> - <? equipamento($adom[equipamento]) ?></font></td>
    <td width="20%" align="center" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="1">
<?
$qnoticia = mysql_query("SELECT * FROM obra where id = '$adom[obra]' order by id desc LIMIT 1");
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

<? echo $qdom[contrato] ?> - <? echo $qdom[cliente] ?>

<? } } }  ?></font></td>
    <td width="20%" align="center" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="1"><? if($adom[acessorio]==nda){ ?>-------------<? } else {?> <? acessorio($adom[acessorio]) ?> <? }?></font></td>
    <td width="10%" align="center" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="1"><? echo $adom[horimetro_ida] ?></font></td>
    <td width="10%" align="center" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="1">
<?
$qnoticia = mysql_query("SELECT * FROM obra where id = '$adom[obra]' order by id desc LIMIT 1");
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

<? echo $qdom[endereco] ?>

<? } } }  ?>
</font></td>
    <td width="20%" align="center" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="1"><? data($adom[inicio]) ?></font></td>
  </tr>
  <? } ?>
</table>
<? } } ?>

</body>

</html>