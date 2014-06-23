<? include("config.php");?>
<?php header("Content-Type: text/html;  charset=ISO-8859-1",true); ?>
<html>
<head>
<meta http-equiv='content-type' content='text/html; charset=iso-8859-1'>
<link rel='StyleSheet' href='temas/include/estilos.css' type='text/css'>

</head>
<style type="text/css">
td.hover, tr.hover
{
	background-color: #E6E6E6;
}
th.hover, tfoot td.hover
{
	background-color: ivory;
}
td.hovercell, th.hovercell
{
	background-color: #abc;
}
td.hoverrow, th.hoverrow
{
	background-color: #6df;
}
</style>
<body>
<table id="tableFamilia" border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber1" height="30">
<thead>
<tr>
<td width="100%" bgcolor="#FF0000" colspan="6" height="17">&nbsp;<b><font color="#FFFFFF" face="Verdana">Visão Geral</font></b></td>
</tr>
</thead>
<?
$TOTAL = array();
$SqlGeral = mysql_query("SELECT FM.id as MASTER, FM.nome, (SELECT count(*) FROM acessorio E inner join familia_acessorio J on (J.id=E.familia) where excluido!='s' And J.master=FM.id group by J.master) as TOTAL, (SELECT count(*) FROM acessorio E inner join familia_acessorio J on (J.id=E.familia) where excluido!='s' And J.master=FM.id And E.ativo='o' group by J.master) as OBRA, (SELECT count(*) FROM acessorio E inner join familia_acessorio J on (J.id=E.familia) where excluido!='s' And J.master=FM.id And E.ativo='d' group by J.master) as DISPONIVEL, (SELECT count(*) FROM acessorio E inner join familia_acessorio J on (J.id=E.familia) where excluido!='s' And J.master=FM.id And E.ativo='m' group by J.master) as MANUTENCAO, (SELECT count(*) FROM acessorio E inner join familia_acessorio J on (J.id=E.familia) where excluido!='s' And J.master=FM.id And E.ativo='B' group by J.master) as OBS FROM familia_acessorio_master FM inner join familia_acessorio F on (FM.id=F.master) group by FM.id order by FM.nome");
?>
<tr height="20">
<td>Familia Master</td>
<td align="center">Total</td>
<td align="center">Obra</td>
<td align="center">Disponivel</td>
<td align="center">Manutenção</td>
<td align="center">Observação</td>
</tr>

<?
while ($sg = mysql_fetch_array($SqlGeral)){
$cor = ($coralternada++ %2 ? "FFFFFF" : "FFFFDC");
$TOTAL[T] += $sg[TOTAL];
$TOTAL[O] += $sg[OBRA];
$TOTAL[D] += $sg[DISPONIVEL];
$TOTAL[M] += $sg[MANUTENCAO];
$TOTAL[B] += $sg[OBS];
?>
<tr height="15" bgcolor="<?=$cor?>">
<td width="40%">&nbsp;<?=$sg[nome]?></td>
<td width="12%" align="center"><? if($sg[TOTAL]!=''){?><?=$sg[TOTAL]?><? } else { echo '0'; }?></td>
<td width="12%" align="center"><? if($sg[OBRA]!=''){?><a href="javascript:getUrl('arrayFamiliaAcessorio.php?FM=<?=$sg[MASTER]?>&Ativo=o');"><?=$sg[OBRA]?></a><? } else { echo '0'; }?></td>
<td width="12%" align="center"><? if($sg[DISPONIVEL]!=''){?><a href="javascript:getUrl('arrayFamiliaAcessorio.php?FM=<?=$sg[MASTER]?>&Ativo=d');"><?=$sg[DISPONIVEL]?></a><? } else { echo '0'; }?></td>
<td width="12%" align="center"><? if($sg[MANUTENCAO]!=''){?><a href="javascript:getUrl('arrayFamiliaAcessorio.php?FM=<?=$sg[MASTER]?>&Ativo=m');"><?=$sg[MANUTENCAO]?></a><? } else { echo '0'; }?></td>
<td width="12%" align="center"><? if($sg[OBS]!=''){?><a href="javascript:getUrl('arrayFamiliaAcessorio.php?FM=<?=$sg[MASTER]?>&Ativo=b');"><?=$sg[OBS]?></a><? } else { echo '0'; }?></td>
</tr>
<? } ?>
<tr height="20" bgcolor="#99CCFF">
<td><font class='font-10'>&nbsp;Total:</font></td>
<td align="center"><? echo $TOTAL[T] ?></td>
<td align="center"><? echo $TOTAL[O] ?></td>
<td align="center"><? echo $TOTAL[D] ?></td>
<td align="center"><? echo $TOTAL[M] ?></td>
<td align="center"><? echo $TOTAL[B] ?></td>
</tr>

</table>
<? mysql_free_result($SqlGeral);?>
<script>HoverCellTabela();</script>
</body>
</html>