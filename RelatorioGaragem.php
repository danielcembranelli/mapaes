<? include("config.php");
error_reporting("E_ERROR");?>
<?php header("Content-Type: text/html;  charset=ISO-8859-1",true);
function dt($dt)
{
	$dt = explode('/',$dt);
	return $dt[2].'-'.$dt[1].'-'.$dt[0];
}

$dtInicio = dt($_POST[dtInicio]);
$dtFim = dt($_POST[dtFim]);
?>

<? if($_POST[tipo]=="PRODUTIVIDADE"){?>
<html>
<head>
<title>MAPAES: Produtividade por P�tio</title>
<meta http-equiv='content-type' content='text/html; charset=iso-8859-1'>
<link rel='StyleSheet' href='temas/include/estilos.css' type='text/css'></head>
<body>
<p align="center"><b><font face="Verdana">Produtivade por P�tio - <?=$_POST[dtInicio]?> a <?=$_POST[dtFim]?><br>
</font></b></p>

<?
//echo "SELECT d.idPatio, p.NOME_PATIO, DATE_FORMAT(d.dtDip,'%d/%m') as dt, d.dtDip, d.totDisponivel, d.totManutencao, d.totObra, d.totEqpto, (100/(Select SUM(totDisponivel) from dip_patio where dtDip=d.dtDip)) as pDisponivel, (100/(Select SUM(totManutencao) from dip_patio where dtDip=d.dtDip)) as pManutencao, (100/(Select SUM(totObra) from dip_patio where dtDip=d.dtDip)) as pObra, (100/(Select SUM(totEqpto) from dip_patio where dtDip=d.dtDip)) as pEqpto FROM dip_patio d inner join patio p on (p.ID_PATIO=d.idPatio) where d.dtDip between '$dtInicio' and '$dtFim' order by d.dtDip";
		$DADO = array();
		$DATA = array();
		$DATA_U = array();
		$DATA_T = array();
		$PATIO = array();
		$PATIO_U = array();
		$PATIO_T = array();
		$PATIO_ID_U = array();
		$PATIO_ID_T = array();
		$MEDIA = array();
		$PORCEM = array();
        $SqlFMaster = mysql_query("SELECT d.idPatio, p.NOME_PATIO, DATE_FORMAT(d.dtDip,'%d/%m') as dt, d.dtDip, d.totDisponivel, d.totManutencao, d.totObra, d.totEqpto, (100/(Select SUM(totDisponivel) from dip_patio where dtDip=d.dtDip)) as pDisponivel, (100/(Select SUM(totManutencao) from dip_patio where dtDip=d.dtDip)) as pManutencao, (100/(Select SUM(totObra) from dip_patio where dtDip=d.dtDip)) as pObra, (100/(Select SUM(totEqpto) from dip_patio where dtDip=d.dtDip)) as pEqpto FROM dip_patio d inner join patio p on (p.ID_PATIO=d.idPatio) where p.statusPatio = 'A' And d.dtDip between '$dtInicio' and '$dtFim' group by dtDip, idPatio order by d.dtDip") or die (mysql_error());
        while ($sM = mysql_fetch_array($SqlFMaster)){ 
		$cor = ($coralternada++ %2 ? "FFFFFF" : "FFFFDC");
		$PATIO[NOME][] = $sM[NOME_PATIO];
		$PATIO[ID][] = $sM[idPatio];
		$DATA[] = $sM[dt];
		$DADO[$sM[dt]][$sM[idPatio]]["D"] =$sM[totDisponivel];
		$DADO[$sM[dt]][$sM[idPatio]]["M"] =$sM[totManutencao];
		$DADO[$sM[dt]][$sM[idPatio]]["O"] =$sM[totObra];
		$DADO[$sM[dt]][$sM[idPatio]]["E"] =$sM[totEqpto];
		$DADO[$sM[dt]][$sM[idPatio]]["pD"] =$sM[pDisponivel];
		$DADO[$sM[dt]][$sM[idPatio]]["pM"] =$sM[pManutencao];
		$DADO[$sM[dt]][$sM[idPatio]]["pO"] =$sM[pObra];
		$DADO[$sM[dt]][$sM[idPatio]]["pE"] =$sM[pEqpto];
		
		$MEDIA[$sM[idPatio]]["D"] += $sM[totDisponivel];
		$MEDIA[$sM[idPatio]]["M"] += $sM[totManutencao];
		$MEDIA[$sM[idPatio]]["O"] += $sM[totObra];
		$MEDIA[$sM[idPatio]]["E"] += $sM[totEqpto];
		
		$PORCEM["D"] += $sM[totDisponivel];
		$PORCEM["M"] += $sM[totManutencao];
		$PORCEM["O"] += $sM[totObra];
		$PORCEM["E"] += $sM[totEqpto];
		
		
		
		
}
mysql_free_result($SqlFMaster);
$DATA_U = array_unique($DATA);
$PATIO_U = array_unique($PATIO[NOME]);
$PATIO_ID_U = array_unique($PATIO[ID]);
$i = 0;
foreach ($DATA_U as $login) {
    if (count($DATA) > 1) {$DATA_T[$i] = $login; $i++; }
}
$i = 0;
foreach ($PATIO_U as $login) {
    if (count($PATIO) > 1) { $PATIO_T[$i] = $login; $i++; }
}
$i = 0;
foreach ($PATIO_ID_U as $login) {
    if (count($PATIO) > 1) { $PATIO_ID_T[$i] = $login; $i++; }
}

?>
<table border="1" bordercolor="#666666" cellspacing="0" cellpadding="0">

    <tr>
    	<td rowspan="2" align="center">P�tio</td>
    <? for($w=0;$w<count($DATA_T);$w++){?>
		<td align="center" height="20"><?=$DATA_T[$w];?></td>
    <? } ?>
    <td align="center" height="20">M�dia</td>
    </tr>
    <tr>
   	  <? for($w=0;$w<count($DATA_T);$w++){?>
                <td>
			<table>
				<tr>
					<td align="center" width="25">D</td>
                    <td align="center" width="25" bgcolor="#FFFFDC">M</td>
                    <td align="center" width="25">O</td>
                    <td align="center" width="25" bgcolor="#FFFFDC">E</td>
				</tr>
                <tr>
					<td align="center" width="25" bgcolor="#FFFFDC">D%</td>
                    <td align="center" width="25">M%</td>
                    <td align="center" width="25" bgcolor="#FFFFDC">O%</td>
                    <td align="center" width="25">E%</td>
				</tr>
			</table>		</td>
    <? } ?>
    <td>
			<table>
				<tr>
					<td align="center" width="25">D</td>
                    <td align="center" width="25" bgcolor="#FFFFDC">M</td>
                    <td align="center" width="25">O</td>
                    <td align="center" width="25" bgcolor="#FFFFDC">E</td>
				</tr>
                <tr>
					<td align="center" width="25" bgcolor="#FFFFDC">D%</td>
                    <td align="center" width="25">M%</td>
                    <td align="center" width="25" bgcolor="#FFFFDC">O%</td>
                    <td align="center" width="25">E%</td>
				</tr>
			</table>		</td>
    </tr>
<? for($tr=0;$tr<count($PATIO_U);$tr++){?>
    <tr>
    	<td>&nbsp;<?=$PATIO_U[$tr]?>&nbsp;&nbsp;</td>
    <? for($w=0;$w<count($DATA_T);$w++){
		
	?>
        <td>
			<table>
				<tr>
					<td align="center" width="25"><?=$DADO[$DATA_T[$w]][$PATIO_ID_T[$tr]]["D"];?><? if($DADO[$DATA_T[$w]][$PATIO_ID_T[$tr]]["D"]==''){ echo "0";}?></td>
                    <td align="center" width="25" bgcolor="#FFFFDC"><?=$DADO[$DATA_T[$w]][$PATIO_ID_T[$tr]]["M"];?><? if($DADO[$DATA_T[$w]][$PATIO_ID_T[$tr]]["M"]==''){ echo "0";}?></td>
                    <td align="center" width="25"><?=$DADO[$DATA_T[$w]][$PATIO_ID_T[$tr]]["O"];?><? if($DADO[$DATA_T[$w]][$PATIO_ID_T[$tr]]["O"]==''){ echo "0";}?></td>
                    <td align="center" width="25" bgcolor="#FFFFDC"><?=$DADO[$DATA_T[$w]][$PATIO_ID_T[$tr]]["E"];?><? if($DADO[$DATA_T[$w]][$PATIO_ID_T[$tr]]["E"]==''){ echo "0";}?></td>
				</tr>
                <tr>
					<td align="center" width="25" bgcolor="#FFFFDC"><?=number_format($DADO[$DATA_T[$w]][$PATIO_ID_T[$tr]]["D"]*$DADO[$DATA_T[$w]][$PATIO_ID_T[$tr]]["pD"],1,',','.');?></td>
                    <td align="center" width="25"><?=number_format($DADO[$DATA_T[$w]][$PATIO_ID_T[$tr]]["M"]*$DADO[$DATA_T[$w]][$PATIO_ID_T[$tr]]["pM"],1,',','.');?></td>
                    <td align="center" width="25" bgcolor="#FFFFDC"><?=number_format($DADO[$DATA_T[$w]][$PATIO_ID_T[$tr]]["O"]*$DADO[$DATA_T[$w]][$PATIO_ID_T[$tr]]["pO"],1,',','.');?></td>
                    <td align="center" width="25"><?=number_format($DADO[$DATA_T[$w]][$PATIO_ID_T[$tr]]["E"]*$DADO[$DATA_T[$w]][$PATIO_ID_T[$tr]]["pE"],1,',','.');?></td>
				</tr>
			</table>		</td>
    <? } 
	$w++;
	?>
    <td>
			<table>
				<tr>
					<td align="center" width="25"><?=number_format($MEDIA[$PATIO_ID_T[$tr]]["D"]/$w,1,',','.');?><? if($MEDIA[$PATIO_ID_T[$tr]]["D"]==''){ echo "0";}?></td>
                    <td align="center" width="25" bgcolor="#FFFFDC"><?=number_format($MEDIA[$PATIO_ID_T[$tr]]["M"]/$w,1,',','.');?><? if($MEDIA[$PATIO_ID_T[$tr]]["M"]==''){ echo "0";}?></td>
                    <td align="center" width="25"><?=number_format($MEDIA[$PATIO_ID_T[$tr]]["O"]/$w,1,',','.');?><? if($MEDIA[$PATIO_ID_T[$tr]]["O"]==''){ echo "0";}?></td>
                    <td align="center" width="25" bgcolor="#FFFFDC"><?=number_format($MEDIA[$PATIO_ID_T[$tr]]["E"]/$w,1,',','.');?><? if($MEDIA[$PATIO_ID_T[$tr]]["E"]==''){ echo "0";}?></td>
				</tr>
                <tr>
					<td align="center" width="25" bgcolor="#FFFFDC">
						<?=number_format(((100/$PORCEM["D"])*$MEDIA[$PATIO_ID_T[$tr]]["D"]),1,',','.');?></td>
                    <td align="center" width="25"><?=number_format(((100/$PORCEM["M"])*$MEDIA[$PATIO_ID_T[$tr]]["M"]),1,',','.');?></td>
                    <td align="center" width="25" bgcolor="#FFFFDC"><?=number_format(((100/$PORCEM["O"])*$MEDIA[$PATIO_ID_T[$tr]]["O"]),1,',','.');?></td>
                    <td align="center" width="25"><?=number_format(((100/$PORCEM["E"])*$MEDIA[$PATIO_ID_T[$tr]]["E"]),1,',','.');?></td>

				</tr>
			</table>		</td>
    </tr>
<? } ?>
</table>
<br>
<table cellspacing="0" cellpadding="3">
	<tr bgcolor="#FF0000">
   	  <th scope="col" width="25" align="center"><font color="#FFFFFF">#</font></th>
        <th scope="col"><font color="#FFFFFF">Legenda</font></th>
	</tr>
	<tr>
   	  <td align="center">D</td>
        <td>Qtda. de Equipamentos Dispon�veis</td>
	</tr>
	<tr bgcolor="#FFFFDC">
   	  <td align="center">M</td>
        <td>Qtda. de Equipamentos em Manuten��o</td>
	</tr>        
	<tr>
   	  <td align="center">O</td>
        <td>Qtda. de Obras</td>
	</tr>    
	<tr bgcolor="#FFFFDC">
   	  <td align="center">E</td>
        <td>Qtda. de Equipamentos em Obras</td>
	</tr>    
</table>
</body>
</html>
<? } else { ?>
<html>
<head>
<title>MAPAES: Quantidade de Equipamentos em Obra</title>
<meta http-equiv='content-type' content='text/html; charset=iso-8859-1'>
<link rel='StyleSheet' href='temas/include/estilos.css' type='text/css'>
<style type="text/css">
<!--
.style1 {
	font-size: 24px;
	color: #FF0000;
}
-->
</style>
</head>
<body>

<p align="center"><b><font face="Verdana">Produtivade por P�tio - <?=$_POST[dtInicio]?> a <?=$_POST[dtFim]?></font></b></p>

<?

		$DADO = array();
		$DATA = array();
		$DATA_U = array();
		$DATA_T = array();
		$PATIO = array();
		$PATIO_U = array();
		$PATIO_T = array();
		$PATIO_ID_U = array();
		$PATIO_ID_T = array();
		$MEDIA = array();
        $SqlFMaster = mysql_query("SELECT d.idObra, p.cliente, DATE_FORMAT(d.dtDip,'%d/%m') as dt, d.dtDip, d.qtdaDip FROM dip_equipamento_obra d inner join obra p on (p.id=d.idObra) where d.dtDip between '$dtInicio' and '$dtFim' order by d.dtDip, p.cliente");
        while ($sM = mysql_fetch_array($SqlFMaster)){ 
		$cor = ($coralternada++ %2 ? "FFFFFF" : "FFFFDC");
		$PATIO[NOME][] = $sM[cliente];
		$PATIO[ID][] = $sM[idObra];
		$DATA[] = $sM[dt];
		$DADO[$sM[dt]][$sM[idObra]]["D"] =$sM[qtdaDip];
		$MEDIA[QTDA][$sM[idObra]]+=$sM[qtdaDip];
		
		
		
}
mysql_free_result($SqlFMaster);
$DATA_U = array_unique($DATA);
$PATIO_ID_U = array_unique($PATIO[ID]);

$i = 0;
foreach ($DATA_U as $login) {
    if (count($DATA) > 1) {$DATA_T[$i] = $login; $i++; }
}
$i = 0;
foreach ($PATIO_U as $login) {
    if (count($PATIO) > 1) { $PATIO_T[$i] = $login; $i++; }
}
$i = 0;
foreach ($PATIO_ID_U as $login) {
    if (count($PATIO) > 1) { $PATIO_ID_T[$i] = $login; $i++; }
}
?>
<table border="1" bordercolor="#666666" cellspacing="0" cellpadding="3">

    <tr>
    	<td align="center">P�tio</td>
    <? for($w=0;$w<count($DATA_T);$w++){?>
		<td align="center" height="20"><?=$DATA_T[$w];?></td>
    <? } ?>
    <td align="center" height="20" colspan="3">M�dia</td>
    </tr>
    
<? for($tr=0;$tr<count($PATIO_ID_U);$tr++){?>
    <tr>
    	<td>&nbsp;<?=$PATIO[NOME][$tr]?> (<?=$PATIO_ID_U[$tr]?>)&nbsp;&nbsp;</td>
    <? for($w=0;$w<count($DATA_T);$w++){?>
        <td align="center"><?=$DADO[$DATA_T[$w]][$PATIO_ID_T[$tr]]["D"];?><? if($DADO[$DATA_T[$w]][$PATIO_ID_T[$tr]]["D"]==''){ echo "X";} else { $MEDIA[TOTAL][$PATIO_ID_T[$tr]]++;}?></td>
    <? } ?>
    <td align="center"><?=$MEDIA[QTDA][$PATIO_ID_T[$tr]]/$MEDIA[TOTAL][$PATIO_ID_T[$tr]];?></td>
    </tr>
<? } ?>
</table>

</body>
</html>
<? } ?>