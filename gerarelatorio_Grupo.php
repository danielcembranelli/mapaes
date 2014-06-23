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
	return $RESU = $Valor*$PORC;
}

 ?>
<html>
<head>
<meta http-equiv="Content-Language" content="pt-br">
<meta name="GENERATOR" content="Microsoft FrontPage 5.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
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
$num = cal_days_in_month(CAL_GREGORIAN, $mes, $ano); // 31
$nume =  $num;
$num = $num + 1;
?>
<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" id="AutoNumber1">
  <tr>
    <td>&nbsp;</td>
<?  for($i=1; $i< $num; $i++) { ?>
    <td>
    <p align="center"><? echo $i ?></td>
    <? } ?>
<td>
    <p align="center">Média Total por Dia</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
<?  for($i=1; $i< $num; $i++) { ?>
    <td>
    <p align="center"><table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber2" height="100%">
      <tr>
        <td width="20%" align="center"><font face="Verdana" size="1" height="100%">A</font></td>
        <td width="20%" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; border-top-width: 1; border-bottom-width: 1" align="center" height="100%">
        <font face="Verdana" size="1">B</font></td>
        <td width="20%" align="center" height="100%"><font face="Verdana" size="1">C</font></td>
        <td width="20%" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-width: 1" align="center" height="100%">
        <font face="Verdana" size="1">D</font></td>
		   <td width="20%" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-width: 1" align="center" height="100%">
        <font face="Verdana" size="1">E</font></td>
      </tr>
    </table></td>
    <? } ?>
<td>
    <p align="center">    <p align="center"><table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber2" height="100%">
      <tr>
        <td width="20%" align="center"><font face="Verdana" size="1" height="100%">A</font></td>
        <td width="20%" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; border-top-width: 1; border-bottom-width: 1" align="center" height="100%">
        <font face="Verdana" size="1">B</font></td>
        <td width="20%" align="center" height="100%"><font face="Verdana" size="1">C</font></td>
        <td width="20%" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-width: 1" align="center" height="100%">
        <font face="Verdana" size="1">D</font></td>
		<td width="20%" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-width: 1" align="center" height="100%">
        <font face="Verdana" size="1">E</font></td>
      </tr>
    </table></td>
  </tr>
      <?
$noticia = mysql_query("SELECT * FROM familia where grupo = '$_POST[Grupo]' order by nome");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conexão<?
}
else{
if ($notician==0){
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
<? while ($dom = mysql_fetch_array($noticia)){ ?>  
<?
$total_tom_disponivel = '0';
$total_tom_manutencao = '0';
$total_tom_obra = '0';
$total_tom_total = '0';
$total_tom_ob = '0';
?>  
<tr>
    <td><font face="Verdana" style="font-size: 7pt"><? echo $dom[nome]?></font></td>
<?  for($i=1; $i< $num; $i++) { ?>
    <td>
<?

$tom_disponivel = '0';
$tom_manutencao = '0';
$tom_obra = '0';
$tom_total = '0';
$tom_ob = '0';
$novonumero = str_pad($mes, 2, "0", STR_PAD_LEFT);
$novonumeroi = str_pad($i, 2, "0", STR_PAD_LEFT);
$data = "$ano-$novonumero-$novonumeroi";
//SELECT `id` , `data` , `familia` , SUM(obra) As obra, SUM(manutencao) As manutencao, SUM(disponivel) , SUM(ob) , `total` , `master` FROM `dip_diaria_familia` WHERE `data` = '2007-02-01' AND `master`='12' GROUP BY master
$total = @mysql_query("SELECT `id` , `data` , `familia` , `obra` , `manutencao` , `disponivel` , `ob` , `total` , `master` FROM `dip_diaria_familia` WHERE 1 AND `data` = '$data' AND `familia` = '$dom[id]' ");
$totaln=@mysql_num_rows($total);
while ($ca = mysql_fetch_array($total)){ 
$tom_disponivel = $tom_disponivel + $ca[disponivel];
$tom_ob = $tom_ob + $ca[ob];
$tom_manutencao = $tom_manutencao + $ca[manutencao];
$tom_obra = $tom_obra + $ca[obra];
$tom_total = $tom_total + $ca[obra] + $ca[disponivel] + $ca[manutencao] + $ca[ob];
}
?>
 
 <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber2" height="100%">
      <tr>
        <td width="20%" align="center"><font face="Verdana" size="1" height="100%"><? echo PorCem($tom_disponivel,$tom_total); ?>%</font></td>
        <td width="20%" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; border-top-width: 1; border-bottom-width: 1" align="center" height="100%">
        <font face="Verdana" size="1"><? echo PorCem($tom_obra,$tom_total); ?>%</font></td>
        <td width="20%" align="center" height="100%"><font face="Verdana" size="1"><? echo PorCem($tom_manutencao,$tom_total); ?>%</font></td>
        <td width="20%" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-width: 1" align="center" height="100%">
        <font face="Verdana" size="1"><? echo PorCem($tom_ob,$tom_total) ?>%</font></td>
		<td width="20%" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-width: 1" align="center" height="100%">
        <font face="Verdana" size="1"><? echo $tom_total ?></font></td>
      </tr>
    </table>
    </td>
<?
$total_tom_ob = $total_tom_ob + $tom_ob;
$total_tom_disponivel = $total_tom_disponivel + $tom_disponivel;
$total_tom_manutencao = $total_tom_manutencao + $tom_manutencao;
$total_tom_obra = $total_tom_obra + $tom_obra;
$total_tom_total = $total_tom_total + $tom_total;
?>  
    <? } ?>
<td>
    <p align="center">    <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber2" height="100%">
      <tr>
        <td width="20%" align="center"><font face="Verdana" size="1" height="100%"><? echo number_format(PorCem($total_tom_disponivel/$nume,$total_tom_total / $nume),1,',','.'); ?> %</font></td>
        <td width="20%" style="border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; border-top-width: 1; border-bottom-width: 1" align="center" height="100%">
        <font face="Verdana" size="1"><? echo number_format(PorCem($total_tom_disponivel / $nume, $total_tom_obra / $nume),1,',','.'); ?> %<? number_format($total_tom_obra / $nume,1,',','.'); ?></font></td>
        <td width="20%" align="center" height="100%"><font face="Verdana" size="1"><? echo number_format(PorCem($total_tom_manutencao / $nume,$total_tom_total / $nume),1,',','.'); ?> <? number_format($total_tom_manutencao / $nume,2,',','.'); ?>%</font></td>
        <td width="20%" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-width: 1" align="center" height="100%">
        <font face="Verdana" size="1"><? echo number_format($total_tom_ob / $nume,1,',','.'); ?></font></td>
		 <td width="20%" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-width: 1" align="center" height="100%">
        <font face="Verdana" size="1"><? echo number_format($total_tom_total / $nume,1,',','.'); ?></font></td>
      </tr>
    </table></td>
  </tr>
  <? } } } ?> 
</table>
<p><font face="Verdana" size="2">A - Disponibilidade por dia (Unidade) (Média)<br>
B - Produtividade por mês (Porcentagem) (Média)<br>
C - Manutenção por mês (Porcentagem) (Média)<br>
D - Observação por mês (Porcentagem) (Média)<br>
E - Total da frota </font></p>


</body>

</html>