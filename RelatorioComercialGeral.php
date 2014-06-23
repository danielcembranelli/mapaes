<? include("config.php");

$sqltp = mysql_query("SELECT idTp, nomeTp FROM tipoproprietario where idTp='".$_POST[idTp]."'");
$sTp= mysql_fetch_array($sqltp);
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<script type="text/javascript" src="open-flash-chart/js/swfobject.js"></script>
<title>MAPAES : Resultados Comerciais <? if($_POST[idTp]!='0'){ echo '- '.$sTp[nomeTp]; }?></title>
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
<p align="center"><b><font face="Verdana">Resultados Comerciais <? if($_POST[idTp]!='0'){ echo '- '.$sTp[nomeTp].' '; }?>- <? switch($_REQUEST[mes]) 
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
function F6266027b($V0842f867, $Vce2db5d6, $V0152807c, $V401281b0 = "e"){ if($V401281b0=="v"){ $V0842f867 = str_replace(".","",$V0842f867); 
 $V0842f867 = str_replace(",",".",$V0842f867); 
 $V0842f867 = number_format($V0842f867,2,"",""); $V0842f867 = str_replace(".","",$V0842f867); 
 $V401281b0 = "e"; } while(strlen($V0842f867)<$Vce2db5d6){ if($V401281b0=="e"){ $V0842f867 = $V0152807c . $V0842f867; }else{ $V0842f867 = $V0842f867 . $V0152807c; } } return $V0842f867; } 
$Dias = cal_days_in_month(CAL_GREGORIAN, $_REQUEST[mes], $_REQUEST[ano]); // 31
$Media["Obra"] = 0;
$Media["Manutencao"] = 0;
$Media["Disponivel"] = 0;
$Media["Ob"] = 0;
$Media["Venda"] = 0;
$Media["Frota"] = 0;
$Media["pObra"] = 0;
$Media["pManutencao"] = 0;
$Media["pDisponivel"] = 0;
$Media["pOb"] = 0;
$Media["Pontos"] = 0;
$Media["Horas"] = 0;
$i=1;

if($_POST[idTp]!='0'){
$SqlRelatorio = mysql_query("SELECT data,(obra+manutencao+disponivel+ob) as frota, obra, (100/(obra+manutencao+disponivel+ob))*obra as pobra, manutencao, (100/(obra+manutencao+disponivel+ob))*manutencao as pmanutencao, disponivel, (100/(obra+manutencao+disponivel+ob))*disponivel as pdisponivel, ob, (100/(obra+manutencao+disponivel+ob))*ob as pob, pontos, pontos*9 as horas FROM dip_diaria_geral_tp where mes = '".$_REQUEST[mes]."' And ano = '".$_REQUEST[ano]."' And idTp='".$_POST[idTp]."' order by dia") or die (mysql_error());
} else {
	
	$SqlRelatorio = mysql_query("SELECT data,(obra+manutencao+disponivel+ob) as frota, obra, (100/(obra+manutencao+disponivel+ob))*obra as pobra, manutencao, (100/(obra+manutencao+disponivel+ob))*manutencao as pmanutencao, disponivel, (100/(obra+manutencao+disponivel+ob))*disponivel as pdisponivel, ob, (100/(obra+manutencao+disponivel+ob))*ob as pob, pontos, pontos*9 as horas, venda FROM dip_diaria_geral where mes = '$_REQUEST[mes]' And ano = '$_REQUEST[ano]' order by dia") or die (mysql_error());
}

$nSqlRelatorio = mysql_num_rows($SqlRelatorio);
while ($wSql = mysql_fetch_array($SqlRelatorio)){

$Cell[$wSql[data]]["Dia"] = $wSql[data];
$Cell[$wSql[data]]["Obra"] = $wSql[obra];
$Cell[$wSql[data]]["Manutencao"] = $wSql[manutencao];
$Cell[$wSql[data]]["Disponivel"] = $wSql[disponivel];
$Cell[$wSql[data]]["Ob"] = $wSql[ob];
$Cell[$wSql[data]]["Frota"] = $wSql[frota];
$Cell[$wSql[data]]["Venda"] = $wSql[venda];

$Cell[$wSql[data]]["pObra"] = $wSql[pobra];
$Cell[$wSql[data]]["pManutencao"] = $wSql[pmanutencao];
$Cell[$wSql[data]]["pDisponivel"] = $wSql[pdisponivel];
$Cell[$wSql[data]]["pOb"] = $wSql[pob];

$Cell[$wSql[data]]["Pontos"] = $wSql[pontos];
$Cell[$wSql[data]]["Horas"] = $wSql[horas];

$Media["Obra"] += $wSql[obra];
$Media["Manutencao"] += $wSql[manutencao];
$Media["Disponivel"] += $wSql[disponivel];
$Media["Ob"] += $wSql[ob];
$Media["Frota"] += $wSql[frota];
$Media["pObra"] += $wSql[pobra];
$Media["pManutencao"] += $wSql[pmanutencao];
$Media["pDisponivel"] += $wSql[pdisponivel];
$Media["pOb"] += $wSql[pob];
$Media["Pontos"] += $wSql[pontos];
$Media["Horas"] += $wSql[horas];
}
mysql_free_result($SqlRelatorio);

$SqlFrete = mysql_query("SELECT COUNT(*) as Frete, replace(data,'$_REQUEST[ano]-$_REQUEST[mes]-','') as dia FROM `caminhao_obra` where data BETWEEN '$_REQUEST[ano]-$_REQUEST[mes]-01' and '$_REQUEST[ano]-$_REQUEST[mes]-$Dias' And (caminhao != 'cliente') And (caminhao != 'Terceiro') group by data order by data") or die (mysql_error());
$nSqlFrete = mysql_num_rows($SqlFrete);
while ($wSqlF = mysql_fetch_array($SqlFrete)){
	
	$Cell[$wSqlF[dia]]["Frete"] = $wSqlF[Frete];
	$Media["Frete"] += $wSqlF[Frete];

}
mysql_free_result($SqlFrete);

$Media["Obra"] = $Media["Obra"] / $Dias;
$Media["Manutencao"] = $Media["Manutencao"] / $Dias;
$Media["Disponivel"] = $Media["Disponivel"] / $Dias;
$Media["Ob"] = $Media["Ob"] / $Dias;
$Media["Venda"] = $Media["Venda"] / $Dias;
$Media["Frota"] = $Media["Frota"] / $Dias;
$Media["pObra"] = $Media["pObra"] / $Dias;
$Media["pManutencao"] = $Media["pManutencao"] / $Dias;
$Media["pDisponivel"] = $Media["pDisponivel"] / $Dias;
$Media["pOb"] = $Media["pOb"] / $Dias;
$Media["Pontos"] = $Media["Pontos"];
$Media["Horas"] = $Media["Horas"];
$Media["Frete"] = $Media["Frete"] / $Dias;
?>

<table bordercolor="#666666" border="1" cellpadding="3" cellspacing="0">
	<tr>
    	<th>Informações</th>
<?  for($d=1; $d<= $Dias; $d++) { ?>
	    <td><? echo $d ?></td>
<? } ?>   
        <td>Média Diária</td>
	</tr>
	<tr>
		<th>Frota Operando</th>
<? for($w=1;$w<=$Dias;$w++){?>
		<td><?=$Cell[F6266027b($w,2,"0")]["Obra"];?></td>
<? } ?>
		<td><?=number_format($Media["Obra"],2,',','.');?></td>
	</tr>
    		<th>% Frota Operando</th>
<? for($w=1;$w<=$Dias;$w++){?>
		<td><?=number_format($Cell[F6266027b($w,2,"0")]["pObra"],2,',','.');?></td>
<? } ?>
<td><?=number_format($Media["pObra"],2,',','.');?></td>
	</tr>
	<tr>
		<th>Frota em Manutenção</th>
<? for($w=1;$w<=$Dias;$w++){?>
	    <td><?=$Cell[F6266027b($w,2,"0")]["Manutencao"];?></td>
<? } ?>
<td><?=number_format($Media["Manutencao"],2,',','.');?></td>
	</tr>
    	<tr>
		<th>% Frota em Manutenção</th>
<? for($w=1;$w<=$Dias;$w++){?>
	    <td><?=number_format($Cell[F6266027b($w,2,"0")]["pManutencao"],2,',','.');?></td>
<? } ?>
<td><?=number_format($Media["pManutencao"],2,',','.');?></td>
	</tr>
	<tr>
		<th>Frota Disponivel</th>
<? for($w=1;$w<=$Dias;$w++){?>
	    <td><?=$Cell[F6266027b($w,2,"0")]["Disponivel"];?></td>
<? } ?>
<td><?=number_format($Media["Disponivel"],2,',','.');?></td>
	</tr>
    	<tr>
		<th>% Frota Disponivel</th>
<? for($w=1;$w<=$Dias;$w++){?>
	    <td><?=number_format($Cell[F6266027b($w,2,"0")]["pDisponivel"],2,',','.');?></td>
<? } ?>
<td><?=number_format($Media["pDisponivel"],2,',','.');?></td>
	</tr>
	<tr>
		<th>Frota em Observação</th>
<? for($w=1;$w<=$Dias;$w++){?>
	    <td><?=$Cell[F6266027b($w,2,"0")]["Ob"];?></td>
<? } ?>
<td><?=number_format($Media["Ob"],2,',','.');?></td>
	</tr>
    	<tr>
		<th>% Frota em Observação</th>
<? for($w=1;$w<=$Dias;$w++){?>
	    <td><?=number_format($Cell[F6266027b($w,2,"0")]["pOb"],2,',','.');?></td>
<? } ?>
<td><?=number_format($Media["pOb"],2,',','.');?></td>
	</tr>

        	<tr>
		<th>Pontos Marcados</th>
<? for($w=1;$w<=$Dias;$w++){?>
	    <td><?=$Cell[F6266027b($w,2,"0")]["Pontos"];?></td>
<? } ?>
<td><?=number_format($Media["Pontos"],0,',','.');?></td>
	</tr>
        	<tr>
		<th>Horas Vendidas</th>
<? for($w=1;$w<=$Dias;$w++){?>
	    <td><?=$Cell[F6266027b($w,2,"0")]["Horas"];?></td>
<? } ?>
<td><?=number_format($Media["Horas"],0,',','.');?></td>
	</tr>
            	<tr>
		<th>Frete</th>
<? for($w=1;$w<=$Dias;$w++){?>
	    <td><?=number_format($Cell[F6266027b($w,2,"0")]["Frete"]);?></td>
<? } ?>
<td><?=number_format($Media["Frete"],2,',','.');?></td>
	</tr>
   	<tr>
		<th>Total da Frota</th>
<? for($w=1;$w<=$Dias;$w++){?>
	    <td><?=$Cell[F6266027b($w,2,"0")]["Frota"];?></td>
<? } ?>
<td><?=number_format($Media["Frota"],2,',','.');?></td>
	</tr>     
    	<tr>
		<th>Frota para Venda</th>
<? for($w=1;$w<=$Dias;$w++){?>
	    <td><?=$Cell[F6266027b($w,2,"0")]["Venda"];?></td>
<? } ?>
<td><?=number_format($Media["Venda"],2,',','.');?></td>
	</tr>                   
</table>
<br />
<?
if($_POST[idTp]=='0'){
?>
<center>
<div id="chart1" style="width:1200px; height:250px;"></div>
<script type="text/javascript">
var so = new SWFObject("open-flash-chart/actionscript/open-flash-chart.swf", "ofc", "1200", "250", "9", "#FFFFFF");
so.addVariable("data", "Grafico_loadStatus1mes.php?Data=<?=$_REQUEST[ano]?>-<?=$_REQUEST[mes]?>");
so.addParam("allowScriptAccess", "always" );//"sameDomain");
so.write("chart1");
</script>
</center>
<? } ?>
</body>
</html>
