<? include("verifica.php");
$dtiniq= explode('/',$_POST[dtini]);
$dtfimq = explode('/',$_POST[dtfim]);
$dtini = $dtiniq[2]."-".$dtiniq[1]."-".$dtiniq[0];
$dtfim = $dtfimq[2]."-".$dtfimq[1]."-".$dtfimq[0];

$dtiniqc= explode('/',$_POST[dtinic]);
$dtfimqc = explode('/',$_POST[dtfimc]);
$dtinic = $dtiniqc[2]."-".$dtiniqc[1]."-".$dtiniqc[0];
$dtfimc = $dtfimqc[2]."-".$dtfimqc[1]."-".$dtfimqc[0];


?>
<html>
<head>
<meta http-equiv="Content-Language" content="pt-br">
<meta name="GENERATOR" content="Microsoft FrontPage 5.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Nova pagina 1</title>
<style>
.black{
color:#000000;
}
.red{
color:#FF0000;
}
.green{ color:#000099;}
</style>
</head>
<body topmargin="0" leftmargin="0">
<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber1">
<tr>
<td width="100%">
<p align="center"><font size="2" face="Verdana">FROTA E CAPACIDADE INSTALADA - <?=$_POST[dtini].' a '.$_POST[dtfim];?> <? if($_POST[dtinic]!=''){?> comparado com <?=$_POST[dtinic].' a '.$_POST[dtfimc];?><? } ?></font></td>
</tr>
<tr>
<td width="100%">
<br>
<center>
<?
$contaDias = mysql_query("SELECT count(*) FROM dip_diaria_familia d where data between '".$dtini."' and '".$dtfim."' group by data");
$dias = mysql_num_rows($contaDias);

$SqlMes = mysql_query("SELECT d.familia, AVG(d.total) as TOTAL FROM dip_diaria_familia d where d.data between '".$dtini."' and '".$dtfim."' group by d. familia");
while ($Sm = mysql_fetch_array($SqlMes)){

	$familia[$Sm[familia]]=($Sm[TOTAL]);

}

$contaDiasc = mysql_query("SELECT count(*) FROM dip_diaria_familia d where data between '".$dtinic."' and '".$dtfimc."' group by data");
$diasc = mysql_num_rows($contaDiasc);

$SqlMesc = mysql_query("SELECT d.familia, AVG(d.total) as TOTAL FROM dip_diaria_familia d where d.data between '".$dtinic."' and '".$dtfimc."' group by d. familia");
while ($Smc = mysql_fetch_array($SqlMesc)){

	$familiac[$Smc[familia]]=($Smc[TOTAL]);

}
$anoticia = mysql_query("SELECT g.sigla as letra, m.sigla, f.nome as NOME,f.id FROM familia f left join grupo g on (f.grupo=g.id) left join familia_master m on(f.master=m.id) where f.nome!='' order by f.nome");
$anotician = mysql_num_rows($noticia);
if (!$anoticia){
?>Problemas na conexo<?
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
<td width='730' bgcolor='#FFFFFF' colspan='5'><font class=font-11><span class=font-azul><center>no existe nenhum obra para est consulta</center></span></font></td>
</tr>
</table>
<?
}else {
?>
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="95%" id="AutoNumber2">
<tr>
<td width="15%" align="center" style="border-style: solid; border-width: 1">
<font face="Verdana" size="2">Grupo</font></td>
<td width="70%" align="center" style="border-style: solid; border-width: 1">
<font face="Verdana" size="2">Famlia</font></td>
<td width="15%" align="center" style="border-style: solid; border-width: 1">
<font face="Verdana" size="2">Total</font></td>
</tr>
<?
$tot = 0;
$totc = 0;
while ($adom = mysql_fetch_array($anoticia)){
$tot +=$familia[$adom[id]];
$totc +=$familiac[$adom[id]];
?>
<tr>
<td width="15%" align="center" style="border-style: solid; border-width: 1" >
<font face="Verdana" size="2">&nbsp;<?=$adom[letra]?></font></td>
<td width="70%" style="border-style: solid; border-width: 1">
<font face="Verdana" size="2"> &nbsp;<?=$adom[sigla]?> - <?=$adom[NOME]?></font></td>
<td width="15%" align="center" style="border-style: solid; border-width: 1">
<font face="Verdana" size="2">&nbsp;
<?
$soma=0;
$color = 'black';
if($_POST[dtinic]!=''){
	if($familia[$adom[id]]>$familiac[$adom[id]]){
	$color = 'green';
	$soma = $familia[$adom[id]]-$familiac[$adom[id]];
	}
	if($familia[$adom[id]]<$familiac[$adom[id]]){
	$color = 'red';
	$soma = $familiac[$adom[id]]-$familia[$adom[id]];
	}
}
?>
<span class="<?=$color?>"><?=number_format($familia[$adom[id]],0,',','.');?> <?
if($soma!='0'){
	
	echo "(".number_format($soma,0,',','.').")";
	
}
?></span>


</font></td>
</tr>
<? } ?>
<tr>
<td width="15%" align="center" style="border-left-width: 1; border-right-style: solid; border-right-width: 1; border-top-style: solid; border-top-width: 1; border-bottom-width: 1">
</td>
<td width="70%" align="center" style="border-left-style: solid; border-left-width: 1; border-top-style: solid; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
<font face="Verdana" size="2">Total de Equipamentos</font></td>
<td width="15%" align="center" style="border-left-width: 1; border-right-style: solid; border-right-width: 1; border-top-style: solid; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
<?
$color = 'black';
if($_POST[dtinic]!=''){
	if($tot>$totc){
	$color = 'green';
	}
	if($tot<$totc){
	$color = 'red';
	}
}
?>
<b><font face="Verdana" size="2" class="<?=$color?>"><?=number_format($tot,0,',','.');?></font></b>&nbsp;</td>
</tr>
<? } } ?>
<tr>
<td width="15%" align="center" >&nbsp;
</td>
<td width="70%">&nbsp;
</td>
<td width="15%" align="center">&nbsp;
</td>
</tr>
<tr>
<td width="15%" align="center" style="border-style: solid; border-width: 1" >
<font face="Verdana" size="2">Codigo</font></td>
<td width="70%" style="border-style: solid; border-width: 1">
<p align="center">
<font face="Verdana" size="2">Descrio</font></td>
<td width="15%" align="center" style="border-style: solid; border-width: 1">
<font face="Verdana" size="2">Placa</font></td>
</tr>
<?
$noticia = mysql_query("SELECT * FROM caminhao order by codigo");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conexo<?
}
else{
if ($notician==0){
?>
<table border='0' width='730' cellspacing='1' cellpadding='0'>
<tr>
<td width='730' validn='middle' colspan='7'>
<img src='imagens/layout_seta.gif' width="15" height="9"><b class=font-10>Visualizar caminho</b><br>&nbsp;
</td>
</tr>
<tr>
<td width='730' bgcolor='#FFFFFF' colspan='5'><font class=font-11><span class=font-azul><center>no existe nenhum caminho para est consulta</center></span></font></td>
</tr>
</table>
<?
}else {
?>
<? while ($dom = mysql_fetch_array($noticia)){ ?>
<tr>
<td width="15%" align="center" style="border-style: solid; border-width: 1" >
<font face="Verdana" size="2">&nbsp;<? echo $dom[codigo]?></font>&nbsp;</td>
<td width="70%" style="border-style: solid; border-width: 1">
<font face="Verdana" size="2">&nbsp;<? echo $dom[descricao]?></font>&nbsp;</td>
<td width="15%" align="center" style="border-style: solid; border-width: 1">
<font face="Verdana" size="2">&nbsp;<? echo $dom[placa]?></font>&nbsp;</td>
</tr>
<? } } } ?>
<tr>
<td width="15%" align="center" style="border-left-width: 1; border-right-style: solid; border-right-width: 1; border-bottom-width: 1">
</td>
<td width="70%" align="center" style="border-left-style: solid; border-left-width: 1; border-top-style: solid; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
<font face="Verdana" size="2">Total de Caminhes de Transporte</font></td>
<td width="15%" align="center" style="border-left-width: 1; border-right-style: solid; border-right-width: 1; border-top-style: solid; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
<b><font face="Verdana" size="2">
<?
$novo = @mysql_query("SELECT * FROM caminhao");
echo $novon=@mysql_num_rows($novo);
?>
</font></b>&nbsp;</td>
</tr>
<tr>
<td width="15%" align="center" >&nbsp;
</td>
<td width="70%">&nbsp;
</td>
<td width="15%" align="center">&nbsp;
</td>
</tr>
<tr>
<td width="15%" align="center" style="border-style: solid; border-width: 1" >
<font face="Verdana" size="2">Grupo</font></td>
<td width="70%" style="border-style: solid; border-width: 1">
<p align="center">
<font face="Verdana" size="2">Familia</font></td>
<td width="15%" align="center" style="border-style: solid; border-width: 1">
<font face="Verdana" size="2">Total</font></td>
</tr>
<?
$noticia = mysql_query("SELECT d.data as DATA,g.sigla as letra, m.sigla, f.nome as NOME, AVG(d.total) as TOTAL FROM dip_diaria_afamilia d inner join familia_acessorio f on (d.familia=f.id) left join grupo g on (f.grupo=g.id) left join familia_acessorio_master m on(f.master=m.id) where d.data between '".$dtini."' and '".$dtfim."' group by d.familia order by f.nome");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conexo<?
}
else{
if ($notician==0){
?>
<table border='0' width='730' cellspacing='1' cellpadding='0'>
<tr>
<td width='730' validn='middle' colspan='7'>
<img src='imagens/layout_seta.gif' width="15" height="9"><b class=font-10>Visualizar caminho</b><br>&nbsp;
</td>
</tr>
<tr>
<td width='730' bgcolor='#FFFFFF' colspan='5'><font class=font-11><span class=font-azul><center>no existe nenhum caminho para est consulta</center></span></font></td>
</tr>
</table>
<?
}else {
?><?
$atot = 0;
while ($dom = mysql_fetch_array($noticia)){
$atot +=$dom[TOTAL];
?>
<tr>
<td width="15%" align="center" style="border-style: solid; border-width: 1" >
<font face="Verdana" size="2">&nbsp;<?=$dom[letra]?></font></td>
<td width="70%" style="border-style: solid; border-width: 1">
<font face="Verdana" size="2"> &nbsp;<?=$dom[sigla]?> - <?=$dom[NOME]?></font></td>
<td width="15%" align="center" style="border-style: solid; border-width: 1">
<font face="Verdana" size="2">&nbsp;<?=number_format($dom[TOTAL],0,',','.');?></font></td>
</tr>
<? } } } ?>
<tr>
<td width="15%" align="center" style="border-left-width: 1; border-right-style: solid; border-right-width: 1; border-bottom-width: 1">
</td>
<td width="70%" align="center" style="border-left-style: solid; border-left-width: 1; border-top-style: solid; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
<font face="Verdana" size="2">Total de Acessrios</font></td>
<td width="15%" align="center" style="border-left-width: 1; border-right-style: solid; border-right-width: 1; border-top-style: solid; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
<b><font face="Verdana" size="2">
<?=number_format($atot,0,',','.');?>
</font></b>&nbsp;</td>
</tr>
</table>
</center>
<br>
</td>
</tr>
</table>
</center>
<br>
</td>
</tr>
</table>
</center>
<br>
</td>
</tr>
</table>
</body>
</html>
