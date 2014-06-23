<? include("config.php");?>
<?php header("Content-Type: text/html;  charset=ISO-8859-1",true); ?>
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

<p align="center"><b><font face="Verdana"><span class="style1">RELATÓRIO EM TESTE</span><br>
  Produtivade por Pátio - <? switch($_REQUEST[mes]) 
{ 
case "01" : $mesext = "Janeiro";         break; 
case "02" : $mesext = "Fevereiro";         break; 
case "03" : $mesext = "Março";                 break; 
case "04" : $mesext = "Abril";                 break; 
case "05" : $mesext = "Maio";                 break; 
case "06" : $mesext = "Junho";                 break; 
case "07" : $mesext = "Julho";                 break; 
case "08" : $mesext = "Agosto";                 break; 
case "09" : $mesext = "Setembro";         break; 
case "10" : $mesext = "Outubro";         break; 
case "11" : $mesext = "Novembro";         break; 
case "12" : $mesext = "Dezembro";         break; 
}  
echo"$mesext" ?> de <? echo $_REQUEST[ano] ?><br>
</font></b></p>

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
        $SqlFMaster = mysql_query("SELECT d.idObra, p.cliente, DATE_FORMAT(d.dtDip,'%d/%m') as dt, d.dtDip, d.qtdaDip FROM hostplaz_escad.dip_equipamento_obra d inner join hostplaz_escad.obra p on (p.id=d.idObra) order by d.dtDip");
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
    	<td align="center">Pátio</td>
    <? for($w=0;$w<count($DATA_T);$w++){?>
		<td align="center" height="20"><?=$DATA_T[$w];?></td>
    <? } ?>
    <td align="center" height="20" colspan="3">Média</td>
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