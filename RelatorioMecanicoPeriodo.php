<? include("config.php");
$dtiniq= explode('/',$_POST[dtini]);
$dtfimq = explode('/',$_POST[dtfim]);
$dtini = $dtiniq[2]."-".$dtiniq[1]."-".$dtiniq[0];
$dtfim = $dtfimq[2]."-".$dtfimq[1]."-".$dtfimq[0];

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1"/>
<script type="text/javascript" src="open-flash-chart/js/swfobject.js"></script>
<title>MAPAES : Quantidade de Eqpto por mec&acirc;nico</title>
<style type="text/css">
<!--
body{
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 14px;
}

td,th {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
}
td{
text-align:center;
}
-->
</style></head>

<body>
<p align="center"><b><font face="Verdana"> Quantidade de Eqpto por mec&acirc;nico<br>
</font></b></p>
<?	
$SqlRelatorio = mysql_query("SELECT DATE_FORMAT(dtDpme,'%d/%m') as dt, idMecanico, count(*) as total FROM dip_diaria_mecanico_epto where dtDpme between '".$dtini."' and '".$dtfim."' group by dtDpme, idMecanico order by idMecanico, dtDpme;") or die (mysql_error());

while ($wSql = mysql_fetch_array($SqlRelatorio)){
	$Cell[$wSql[dt]][$wSql[idMecanico]] = $wSql[total];
}
mysql_free_result($SqlRelatorio);
$SqlRelatorio = mysql_query("SELECT DATE_FORMAT(dtDpme,'%d/%m') as dt FROM dip_diaria_mecanico_epto where dtDpme between '".$dtini."' and '".$dtfim."' group by dtDpme order by dtDpme;") or die (mysql_error());
$nDt = mysql_num_rows($SqlRelatorio);
while ($wSql = mysql_fetch_array($SqlRelatorio)){
	$Data[] = $wSql[dt];
}
mysql_free_result($SqlRelatorio);

$SqlRelatorio = mysql_query("SELECT m.idMecanico, m.nomeMecanico FROM dip_diaria_mecanico_epto e inner join mecanico m on (m.idMecanico=e.idMecanico) where e.dtDpme between '".$dtini."' and '".$dtfim."' group by e.idMecanico order by e.idMecanico;") or die (mysql_error());

while ($wSql = mysql_fetch_array($SqlRelatorio)){
	$Mec[id][] = $wSql[idMecanico];
	$Mec[nome][] = $wSql[nomeMecanico];
}
mysql_free_result($SqlRelatorio);
?>
<center>
<table bordercolor="#666666" border="1" cellpadding="3" cellspacing="0">
	<tr>
    	<th>Informa&ccedil;&otilde;es</th>
<?  for($d=0; $d<count($Data); $d++) { ?>
	    <td><?=$Data[$d]?></td>
<? } ?>   
        <td>M&eacute;dia Di&aacute;ria</td>
	</tr>
    
    <?  for($m=0; $m<count($Mec[id]); $m++) { ?>
	<tr>
		<th><?=$Mec[nome][$m]?></th>
<?  for($d=0; $d<count($Data); $d++) { 
	$tot[$Mec[id][$m]]+=$Cell[$Data[$d]][$Mec[id][$m]];

?>
		<td><?=$Cell[$Data[$d]][$Mec[id][$m]];?></td>
<? } ?>
		<td><?=number_format($tot[$Mec[id][$m]]/$nDt,2,',','.');?></td>
	</tr>
    <? } ?>
    
</table>
</center>
<br />
</body>
</html>
