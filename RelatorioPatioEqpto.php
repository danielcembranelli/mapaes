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
<p><font face="Verdana" size="1">Maquinas Ativas em obra<br>P�tio: <b><? echo patio($_REQUEST[Patio]);?></b></font></p>
<?
$anoticia = mysql_query("SELECT * FROM equipamento_obra where patio = '".$_REQUEST[Patio]."' And status = 'a'");
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

<tr>
<td width='730' bgcolor='#FFFFFF' colspan='5'><font class=font-11><span class=font-azul><center>n�o existe nenhum obra para est� consulta</center></span></font></td>
</tr>
</table>
<?
}else {
?>

<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber2">
  <tr>
      <td colspan="3" align="center" style="border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="1">Obra</font></td>
    <td align="center" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="1">Equipamento</font></td>
    <td align="center" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="1">Operador</font></td>
    <td align="center" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="1">Acess�rio</font></td>
    <td align="center" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="1">Hor�metro Inicio</font></td>
    <td align="center" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="1">Horas Estimadas</font></td>
    <td align="center" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="1">Data de Inicio</font></td>
  </tr>
  <? while ($adom = mysql_fetch_array($anoticia)){ ?>
  <tr>
   <td align="center" style="border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="1"><? echo dado_obra($adom[obra],"contrato") ?></font></td>
    <td align="center" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="1"><? echo dado_obra($adom[obra],"cliente") ?></font></td>
	    <td align="center" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="1"><? echo dado_obra($adom[obra],"endereco") ?></font></td>		
    <td align="center" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="1"><? equipamento($adom[equipamento]) ?> - <? familianomeeqpto($adom[equipamento]) ?></font></td>
    <td align="center" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="1"><? if($adom[operador]==cliente){ ?> Cliente <? } else {?> <? operador($adom[operador])?> <? }?></font></td>
    <td align="center" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="1"><? if($adom[acessorio]==nda){ ?>-------------<? } else {?> <? acessorio($adom[acessorio]) ?> <? }?></font></td>
    <td align="center" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="1"><? echo $adom[horimetro_ida] ?></font></td>
    <td align="center" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="1">
<? 

$result = explode('-',$adom[inicio]); 
$data1="$result[2]-$result[1]-$result[0]";
$data2= date("d-m-Y");


    // manipula data1
    $dia1=substr($data1,0,-8); // extraimos somete o dia inicial
    $mes1=substr($data1,3,-5); // extraimos somete o mes inicial
    $ano1=substr($data1,6);    // extraimos somete o ano inicial

    // manipula data2
    $dia2=substr($data2,0,-8); // extraimos somete o dia final
    $mes2=substr($data2,3,-5); // extraimos somete o mes final
    $ano2=substr($data2,6);    // extraimos somete o ano final


$data_inicial=mktime("","","",$mes1, $dia1, $ano1); // obtem tempo unix para data1 no formato timestamp
$data_final=mktime("","","",$mes2, $dia2, $ano2); // obtem tempo unix para data2 no formato timestamp
$tempo_unix= time() - $data_inicial; // acha a diferen�a de tempo
$periodo=floor($tempo_unix /(24*60*60)); //convers�o para dias. (Para anos adicione *365)
$tot = $periodo + 1;
$total = $tot * $adom[ponto] * 9;
echo $total;
 ?>
</font></td>
    <td align="center" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="1"><? data($adom[inicio]) ?></font></td>
  </tr>
  <? } ?>
</table>
<? } } ?>
</body>

</html>