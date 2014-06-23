<? include("verifica.php");

function PorCem($Valor, $Total)
{	
	if($Total!=0)
	{
	$PORC = 100/$Total;
	}
	else
	{
	$PORC = 0;
	}
	$RESU = $Valor*$PORC;
	return number_format($RESU,1,',','.');
}?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>


<body>
<p align="center"><b><font face="Verdana">Resultados Comerciais por Grupo - <? switch($mes) 
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
 
echo"$mesext" ?> de <? echo $ano ?><br>
</font></b></p>
<?
$Grupo=0;
$Dias=0;
$Sql = mysql_query("SELECT A.data, B.grupo, SUM(A.obra) as OBRA, SUM(A.manutencao) as MANUTENCAO , SUM(A.disponivel) as DISPONIVEL, SUM(A.ob) as OB,
(SUM(A.obra)+SUM(A.manutencao)+SUM(A.disponivel)+SUM(A.ob)) AS TOTAL FROM dip_diaria_familia A inner join familia B on (A.familia=B.id) WHERE  A.data between '$ano-$mes-01' and '$ano-$mes-31' group by B.grupo, A.data order by A.data, B.grupo");
$Sqln = mysql_num_rows($Sql);
if ($Sqln==0){
?>

<table border='0' width='730' cellspacing='1' cellpadding='0'>
<tr>
<td width='730' validn='middle' colspan='7'>
<img src='imagens/layout_seta.gif' width="15" height="9"><b class=font-10>Visualizar 
família master</b><br>&nbsp;
</td>
</tr>
<tr>
<td width='730' bgcolor='#FFFFFF' colspan='5'><font class=font-11><span class=font-azul><center>não existe nenhuma família master para está consulta</center></span></font></td>
</tr>
</table>
<?
}else {
?>
<center>
<table border="1" bordercolor="#000000" cellpadding="2" cellspacing="0">
<tr>
<td rowspan="2" align="center">&nbsp;</td>
<td align="center">A</td>
<td align="center">B</td>
<td align="center">C</td>
<td align="center">D</td>
</tr>
<tr>
<td align="center"> <table border="0" cellpadding="2" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber2" height="100%">
      <tr>
        <td width="40" align="center"><font face="Verdana" size="1" height="100%">OBR</font></td>
        <td width="40" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; border-top-width: 1; border-bottom-width: 1" align="center" height="100%">
        <font face="Verdana" size="1">MAN.</font></td>
        <td width="40" align="center" height="100%"><font face="Verdana" size="1">DIS</font></td>
        <td width="40" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-width: 1" align="center" height="100%">
        <font face="Verdana" size="1">OB</font></td>
		<td width="40" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-width: 1" align="center" height="100%">
        <font face="Verdana" size="1">TOT</font></td>
      </tr>
    </table>	</td>
<td align="center"><table border="0" cellpadding="2" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber2" height="100%">
      <tr>
        <td width="40" align="center"><font face="Verdana" size="1" height="100%">OBR</font></td>
        <td width="40" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; border-top-width: 1; border-bottom-width: 1" align="center" height="100%">
        <font face="Verdana" size="1">MAN.</font></td>
        <td width="40" align="center" height="100%"><font face="Verdana" size="1">DIS</font></td>
        <td width="40" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-width: 1" align="center" height="100%">
        <font face="Verdana" size="1">OB</font></td>
		<td width="40" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-width: 1" align="center" height="100%">
        <font face="Verdana" size="1">TOT</font></td>
      </tr>
    </table></td>
<td align="center"><table border="0" cellpadding="2" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber2" height="100%">
      <tr>
        <td width="40" align="center"><font face="Verdana" size="1" height="100%">OBR</font></td>
        <td width="40" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; border-top-width: 1; border-bottom-width: 1" align="center" height="100%">
        <font face="Verdana" size="1">MAN.</font></td>
        <td width="40" align="center" height="100%"><font face="Verdana" size="1">DIS</font></td>
        <td width="40" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-width: 1" align="center" height="100%">
        <font face="Verdana" size="1">OB</font></td>
		<td width="40" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-width: 1" align="center" height="100%">
        <font face="Verdana" size="1">TOT</font></td>
      </tr>
    </table></td>
    <td align="center"><table border="0" cellpadding="2" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber2" height="100%">
      <tr>
        <td width="40" align="center"><font face="Verdana" size="1" height="100%">OBR</font></td>
        <td width="40" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; border-top-width: 1; border-bottom-width: 1" align="center" height="100%">
        <font face="Verdana" size="1">MAN.</font></td>
        <td width="40" align="center" height="100%"><font face="Verdana" size="1">DIS</font></td>
        <td width="40" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-width: 1" align="center" height="100%">
        <font face="Verdana" size="1">OB</font></td>
		<td width="40" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-width: 1" align="center" height="100%">
        <font face="Verdana" size="1">TOT</font></td>
      </tr>
    </table></td>
</tr>
<?
$GrupoSoma='';
while ($Sq = mysql_fetch_array($Sql)){ 
$GrupoSoma[$Sq[grupo]][OBRA]+=$Sq[OBRA];
$GrupoSoma[$Sq[grupo]][MANU]+=$Sq[MANUTENCAO];
$GrupoSoma[$Sq[grupo]][DISP]+=$Sq[DISPONIVEL];
$GrupoSoma[$Sq[grupo]][OB]+=$Sq[OB];
$GrupoSoma[$Sq[grupo]][TOTA]+=$Sq[TOTAL];
if($Grupo!=$Sq[data])
{
	echo "<tr id=g".$Sq[grupo].">";
	$Dias++;	
	$Grupo=$Sq[data];
?>
<td>&nbsp;<? data($Sq[data]) ?>&nbsp;</td>
<?
}	
echo "<td>";
?>

 <table border="0" cellpadding="2" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber2" height="100%">
      <tr>
        <td width="40" align="center"><font face="Verdana" size="1" height="100%"><?=$Sq[OBRA]?></font></td>
        <td width="40" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; border-top-width: 1; border-bottom-width: 1" align="center" height="100%">
        <font face="Verdana" size="1"><?=$Sq[MANUTENCAO]?></font></td>
        <td width="40" align="center" height="100%"><font face="Verdana" size="1"><?=$Sq[DISPONIVEL]?></font></td>
        <td width="40" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-width: 1" align="center" height="100%">
        <font face="Verdana" size="1"><?=$Sq[OB]?></font></td>
		<td rowspan="2" width="40" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-width: 1" align="center" height="100%">
        <font face="Verdana" size="1"><?=$Sq[TOTAL]?></font></td>
      </tr>
	        <tr>
        <td width="40" align="center"><font face="Verdana" size="1" height="100%"><?=PorCem($Sq[OBRA],$Sq[TOTAL])?> %</font></td>
        <td width="40" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; border-top-width: 1; border-bottom-width: 1" align="center" height="100%">
        <font face="Verdana" size="1"><?=PorCem($Sq[MANUTENCAO],$Sq[TOTAL])?> %</font></td>
        <td width="40" align="center" height="100%"><font face="Verdana" size="1"><?=PorCem($Sq[DISPONIVEL],$Sq[TOTAL])?> %</font></td>
        <td width="40" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-width: 1" align="center" height="100%">
        <font face="Verdana" size="1"><?=PorCem($Sq[OB],$Sq[TOTAL])?> %</font></td>
		</tr>
    </table>
<? 
echo "</td>";
$Grupo=$Sq[data];
} ?>

<tr>
<td align="center">Média / Dia</td>
<? for($a=1;$a<=4;$a++){?>
<td>
 <table border="0" cellpadding="2" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber2" height="100%">
      <tr>
        <td width="40" align="center">
		<font face="Verdana" size="1" height="100%"><?=number_format($GrupoSoma[$a][OBRA]/$Dias,1,',','.');?></font></td>
        <td width="40" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; border-top-width: 1; border-bottom-width: 1" align="center" height="100%">
        <font face="Verdana" size="1"><?=number_format($GrupoSoma[$a][MANU]/$Dias,1,',','.');?></font></td>
        <td width="40" align="center" height="100%">
		<font face="Verdana" size="1"><?=number_format($GrupoSoma[$a][DISP]/$Dias,1,',','.');?></font></td>
        <td width="40" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-width: 1" align="center" height="100%">
        <font face="Verdana" size="1"><?=number_format($GrupoSoma[$a][OB]/$Dias,1,',','.');?></font></td>
		<td width="40" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-width: 1" align="center" height="100%">
        <font face="Verdana" size="1"><?=number_format($GrupoSoma[$a][TOTA]/$Dias,1,',','.');?></font></td>
      </tr>
    </table>
</td>
<? } ?>
</tr>
</table>

</center>
<? } ?>
</body>
</html>
