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
<?
$noticia = mysql_query("SELECT * FROM obra where id = '$obra'");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conexão<?
}
else{
if ($notician==0){
?>
<table border='0' width='730' cellspacing='1' cellpadding='0'>
<tr>
<td width='730' colspan='7'>&nbsp;
</td></tr>
<tr>
<td width='730' validn='middle' colspan='7'>
<img src='imagens/layout_seta.gif' width="15" height="9"><b class=font-10>Visualizar obras</b><br>&nbsp;
</td>
</tr>
<tr>
<td width='730' bgcolor='#FFFFFF' colspan='5'><font class=font-11><span class=font-azul><center>não existe nenhum obra para está consulta</center></span></font></td>
</tr>
</table>
<?
}else {
?>
<? 

while ($dom = mysql_fetch_array($noticia)){ 

?>

<p align="center"><b><font face="Verdana">Relação de Maquinas por Obra
</font></b></p>
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber1" height="78">
  <tr>
    <td width="30%" style="border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1" height="19">
    <font face="Verdana" size="1">Contrato</font></td>
    <td width="70%" style="border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1" height="19">
    <font face="Verdana" size="1"><? echo $dom[contrato]?></font></td>
  </tr>
  <tr>
    <td width="30%" style="border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1" height="20">
    <font face="Verdana" size="1">Cliente</font></td>
    <td width="70%" style="border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1" height="20">
    <font face="Verdana" size="1"><? echo $dom[cliente]?></font></td>
  </tr>
  <tr>
    <td width="30%" height="20" style="border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="1">Endereço da Obra</font></td>
    <td width="70%" height="20" style="border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="1"><? echo $dom[endereco]?></font></td>
  </tr>
  <tr>
    <td width="30%" height="20" style="border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="1">Inicio da Obra</font></td>
    <td width="70%" height="20" style="border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="1"><? data($dom[inicio])?></font></td>
  </tr>
  <tr>
    <td width="30%" height="19" style="border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="1">Fim da Obra</font></td>
    <td width="70%" height="19" style="border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <? if($dom[status]==a){?><font face="Verdana" size="1" color="#FF0000">Em andamento</font><? } else {?><font face="Verdana" size="1"><? data($dom[fim])?></font><? } ?></td>
  </tr>
    <? if($dom[patio]!=''){?>
	<tr>
    <td width="30%" height="19" style="border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="1">Pátio Responsavel</font></td>
    <td width="70%" height="19" style="border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="1"><? echo patio($dom[patio])?></font></td>
  </tr>
  <? } ?>
</table>
<? if($ativa==a){?>
<p><font face="Verdana" size="1">Maquinas Ativas na obra</font></p>
<?
$anoticia = mysql_query("SELECT * FROM equipamento_obra where obra = '$dom[id]' And status = 'a' order by inicio");
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

<tr>
<td width='730' bgcolor='#FFFFFF' colspan='5'><font class=font-11><span class=font-azul><center>não existe nenhum obra para está consulta</center></span></font></td>
</tr>
</table>
<?
}else {
?>

<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber2">
  <tr>
    <td width="10" align="center" style="border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="1">#</font></td>
    <td width="20%" align="center" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="1">Equipamento</font></td>
    <td width="20%" align="center" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="1">Operador</font></td>
    <td width="20%" align="center" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="1">Acessório</font></td>
    <td width="20%" align="center" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="1">Horímetro Inicio</font></td>
	<td width="20%" align="center" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="1">Frete</font></td>
    <td width="10%" align="center" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="1">Horas Estimadas</font></td>
    <td width="10%" align="center" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="1">Data de Inicio</font></td>
  </tr>
<? 
  	$a=0;
		while ($adom = mysql_fetch_array($anoticia)){
	$a++;
?>
  <tr>
    <td width="5%" align="center" style="border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="1"><?=$a?></font></td>
    <td width="20%" align="center" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="1"><? equipamento($adom[equipamento]) ?> - <? familianomeeqpto($adom[equipamento]) ?></font></td>
    <td width="20%" align="center" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="1"><? if($adom[operador]==cliente){ ?> Cliente <? } else {?> <? operador($adom[operador])?> <? }?></font></td>
    <td width="20%" align="center" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="1"><? if($adom[acessorio]==nda){ ?>-------------<? } else {?> <? acessorio($adom[acessorio]) ?> <? }?></font></td>
    <td width="10%" align="center" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="1"><? echo $adom[horimetro_ida] ?></font></td>
	<td width="10%" align="center" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
<?

$sqlfrete = mysql_query("Select B.codigo,C.nome, A.caminhao, A.motorista,A.equipamento from caminhao_obra A left join caminhao B on(A.caminhao=B.id) left join operador C on (A.motorista=C.id) where A.obra != 'volta' And A.equipamento='$adom[id]' order by A.id desc Limit 1");
$sf = mysql_fetch_array($sqlfrete);
?>
<font face="Verdana" size="1"><? if($sf[codigo]!=''){ echo $sf[codigo]; } else { echo $sf[caminhao]; }?>(<? if($sf[nome]!=''){ echo $sf[nome]; } else { echo $sf[motorista]; }?>)</font>

	</td>
    <td width="10%" align="center" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="1">
<? 

$result = explode('-',$adom[inicio]); 
$data1="$result[2]-$result[1]-$result[0]";

    // manipula data1
    $dia1=substr($data1,0,-8); // extraimos somete o dia inicial
    $mes1=substr($data1,3,-5); // extraimos somete o mes inicial
    $ano1=substr($data1,6);    // extraimos somete o ano inicial

$data_inicial=mktime("","","",$mes1, $dia1, $ano1); // obtem tempo unix para data1 no formato timestamp
$data_final=mktime("","","",date("m"), date("d"), date("Y")); // obtem tempo unix para data2 no formato timestamp
$tempo_unix= time() - $data_inicial; // acha a diferença de tempo
$periodo=floor($tempo_unix /(24*60*60)); //conversão para dias. (Para anos adicione *365)
$tot = $periodo + 1;
$total = $tot * $adom[ponto] * 9;
echo $total;
 ?>
</font></td>
    <td width="20%" align="center" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="1"><? data($adom[inicio]) ?></font></td>
  </tr>
  <? } ?>
</table>
<? } } ?>
<? } ?>
<? if($inativa==a){?>
<?
$anoticia = mysql_query("SELECT * FROM equipamento_obra where obra = '$dom[id]' And status = 'b' order by fim");
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

<tr>
<td width='730' bgcolor='#FFFFFF' colspan='5'><font class=font-11><span class=font-azul><center>não existe nenhum obra para está consulta</center></span></font></td>
</tr>
</table>
<?
}else {
?>

<p><font face="Verdana" size="1">Maquina Inativas na obra</font></p>
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber3">
  <tr>
    <td width="5" align="center" style="border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="1">#</font></td>
    <td width="20%" align="center" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="1">Equipamento</font></td>
    <td width="10%" align="center" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="1">Acessório</font></td>
    <td width="20%" align="center" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="1">Operador</font></td>
    <td width="10%" align="center" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1"><font face="Verdana" size="1">Frete Inicial </font></td>
    <td width="10%" align="center" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1"><font face="Verdana" size="1">Frete Final </font></td>
    <td width="10%" align="center" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="1">Horas Estimadas</font></td>
    <td width="10%" align="center" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="1">Horímetro Inicio</font></td>
    <td width="10%" align="center" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="1">Horímetro Final</font></td>
    <td width="10%" align="center" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="1">Data de Inicio</font></td>
    <td width="10%" align="center" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1"><font face="Verdana" size="1">Data de Final</font></td>
    <td width="10%" align="center" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1"><font face="Verdana" size="1">Motivo</font></td>
  </tr>
  <? 
  $b=0;
  while ($adom = mysql_fetch_array($anoticia)){ 
  $b++;
  ?>
  <tr>
  <td width="5%" align="center" style="border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="1"><?=$b?></font></td>
    <td width="20%" align="center" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="1"><? equipamento($adom[equipamento]) ?> - <? familianomeeqpto($adom[equipamento]) ?></font></td>
    <td width="10%" align="center" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="1"><? if($adom[acessorio]==nda){ ?>-------------<? } else {?> <? acessorio($adom[acessorio]) ?> <? }?></font></td>
    <td width="20%" align="center" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="1"><? if($adom[operador]==cliente){ ?> Cliente <? } else {?> <? operador($adom[operador])?> <? }?></font></td>
	<td width="10%" align="center" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
	<?

$sqlfrete = mysql_query("Select B.codigo,C.nome, A.caminhao, A.motorista,A.equipamento from caminhao_obra A left join caminhao B on(A.caminhao=B.id) left join operador C on (A.motorista=C.id) where A.obra != 'volta' And A.equipamento='$adom[id]' order by A.id desc Limit 1");
$sf = mysql_fetch_array($sqlfrete);
?>
<font face="Verdana" size="1"><? if($sf[codigo]!=''){ echo $sf[codigo]; } else { echo $sf[caminhao]; }?>(<? if($sf[nome]!=''){ echo $sf[nome]; } else { echo $sf[equipamento]; }?>)</font>
	</td>
	<td width="10%" align="center" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
<?

$sqlfrete = mysql_query("Select B.codigo,C.nome, A.caminhao, A.motorista,A.equipamento from caminhao_obra A left join caminhao B on(A.caminhao=B.id) left join operador C on (A.motorista=C.id) where A.obra = 'volta' And A.equipamento='$adom[id]' order by A.id desc Limit 1");
$sf = mysql_fetch_array($sqlfrete);
?>
<font face="Verdana" size="1"><? if($sf[codigo]!=''){ echo $sf[codigo]; } else { echo $sf[caminhao]; }?>(<? if($sf[nome]!=''){ echo $sf[nome]; } else { echo $sf[equipamento]; }?>)</font>

</td>
    <td width="10%" align="center" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
<font face="Verdana" size="1">
<? 

$result = explode('-',$adom[inicio]); 
$data1="$result[2]-$result[1]-$result[0]";
$result = explode('-',$adom[fim]);
$data2="$result[2]-$result[1]-$result[0]";


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
$tempo_unix=$data_final - $data_inicial; // acha a diferença de tempo
$periodo=floor($tempo_unix /(24*60*60)); //conversão para dias. (Para anos adicione *365)
$tot = $periodo + 1;
$total = $tot * $adom[ponto] * 9;
echo $total;
 ?>
</font></td>
    <td width="10%" align="center" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="1"><? echo $adom[horimetro_ida] ?></font></td>
    <td width="10%" align="center" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="1"><? echo $adom[horimetro_volta] ?></font></td>
    <td width="10%" align="center" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="1"><? data($adom[inicio]) ?></font></td>
    <td width="10%" align="center" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1"><font face="Verdana" size="1">
      <? data($adom[fim]) ?>
    </font></td>
    <td width="10%" align="center" style="border-left-style: solid; border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1"><font face="Verdana" size="1">
    <?=$adom[motivo_final] ?>
    </font></td>
  </tr>
  <? } ?>
</table>
<? } } ?>
<? } ?>
<? } } } ?>
</body>

</html>