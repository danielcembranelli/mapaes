<? include("verifica.php");?>
<?
//print_r($_POST);
$where = '';
if(count($_POST[FM])>0 && count($_POST[FAMILIA])=='0' && count($_POST[ANO])=='0' && count($_POST[STATUS])=='0'){
	for($i=0;$i<count($_POST[FM]);$i++){
	$where.= "(f.master='".$_POST[FM][$i]."' And e.excluido='n')";
	if($i<(count($_POST[FM])-1)){
		$where.= " or ";
	}
}
}
if(count($_POST[FM])>0 && count($_POST[FAMILIA])>0 && count($_POST[ANO])=='0' && count($_POST[STATUS])=='0'){
	for($i=0;$i<count($_POST[FAMILIA]);$i++){
	$where.= "(e.familia='".$_POST[FAMILIA][$i]."' And e.excluido='n')";
	if($i<(count($_POST[FAMILIA])-1)){
		$where.= " or ";
	}
	}
}
if(count($_POST[FM])>0 && count($_POST[FAMILIA])>0 && count($_POST[ANO])>0 && count($_POST[STATUS])=='0'){
	if($_POST[ANO][0]=='TODOS'){
	
		for($i=0;$i<count($_POST[FAMILIA]);$i++){
		$where.= "(e.familia='".$_POST[FAMILIA][$i]."' And e.excluido='n')";
		if($i<(count($_POST[FAMILIA])-1)){
			$where.= " or ";
		}
	}
	} else {
	
	
	for($i=0;$i<count($_POST[FAMILIA]);$i++){
		for($a=0;$a<count($_POST[ANO]);$a++){
			$where.= "(e.familia='".$_POST[FAMILIA][$i]."' And e.ano='".$_POST[ANO][$a]."' And e.excluido='n')";
			if($a<(count($_POST[ANO])-1)){
			$where.= " or ";
			}
		}
		if($i<(count($_POST[FAMILIA])-1)){
			$where.= " or ";
		}
	}
	
	
	}
}
if(count($_POST[FM])>0 && count($_POST[FAMILIA])>0 && count($_POST[ANO])>0 && count($_POST[STATUS])>0){
	if($_POST[ANO][0]=='TODOS'){
		for($s=0;$s<count($_POST[STATUS]);$s++){		
			for($i=0;$i<count($_POST[FAMILIA]);$i++){
			$where.= "(e.status='".$_POST[STATUS][$s]."' And e.familia='".$_POST[FAMILIA][$i]."' And e.excluido='n')";
			if($i<(count($_POST[FAMILIA])-1)){
				$where.= " or ";
			}
			
		}
		if($s<(count($_POST[STATUS])-1)){
				$where.= " or ";
		}
	}
	
	
	} else {
	
		for($s=0;$s<count($_POST[STATUS]);$s++){			
			for($i=0;$i<count($_POST[FAMILIA]);$i++){
				for($a=0;$a<count($_POST[ANO]);$a++){
					$where.= "(e.status='".$_POST[STATUS][$s]."' And e.familia='".$_POST[FAMILIA][$i]."' And e.ano='".$_POST[ANO][$a]."' And e.excluido='n')";
					if($a<(count($_POST[ANO])-1)){
					$where.= " or ";
					}
				}
				if($i<(count($_POST[FAMILIA])-1)){
					$where.= " or ";
				}
			}
		if($s<(count($_POST[STATUS])-1)){
				$where.= " or ";
		}
		}
	
	
	}
}
//echo $SQL;
?>
<html>
<head>
<meta http-equiv="Content-Language" content="pt-br">
<meta name="GENERATOR" content="Microsoft FrontPage 5.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Relatrio de Equipamento - Mapa</title>
</head>
<body>
<?
//echo count($_POST[STATUS]).'<br><br>';
//echo $where.'<br><br>';
$noticia = mysql_query("SELECT e.*, (SELECT s.horimetro_ida FROM equipamento_obra s where s.equipamento=e.id order by s.id desc Limit 1) as horimetro, (SELECT s.obra FROM equipamento_obra s where s.equipamento=e.id order by s.id desc Limit 1) as obra, DATE_FORMAT(e.dtManutencao,'%d/%m/%Y') as dt FROM equipamento e inner join familia f on (f.id=e.familia) where ".$where." order by e.codigo");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conexo<?
}
else{
if ($notician==0){
?><table border='0' width='730' cellspacing='1' cellpadding='0'>
<tr>
<td width='730' validn='middle' colspan='7'>
<img src='imagens/layout_seta.gif' width="15" height="9"><b class=font-10>Visualizar equipamento</b><br>&nbsp;
</td>
</tr>
<tr>
<td width='730' bgcolor='#FFFFFF' colspan='5'><font class=font-11><span class=font-azul><center>no existe nenhum equipamento para est consulta</center></span></font></td>
</tr>
</table>
<?
}else {
?>
<p align="center"><b><font face="Verdana">Relatrio de Filtro Dinamico<br>
</font></b></p>
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber1">
<tr>
<td width="20%" align="center" style="border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1"><font face="Verdana" size="1">Familia</font></td>
<td width="5%" align="center" style="border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1"><font face="Verdana" size="1">Cdigo</font></td>
<td width="5%" align="center" style="border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1"><font face="Verdana" size="1">Modelo</font></td>
<td width="5%" align="center" style="border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1"><font face="Verdana" size="1">Horimetro</font></td>
<td width="5%" align="center" style="border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1"><font face="Verdana" size="1">Ano</font></td>
<td width="14%" align="center" style="border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1"><font face="Verdana" size="1">Chassi-Srie</font></td>
<td width="10%" align="center" style="border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1"><font face="Verdana" size="1">Status</font></td>
<td width="28%" align="center" style="border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1"><font face="Verdana" size="1"></font></td>
</tr>
<? while ($dom = mysql_fetch_array($noticia)){
$cor = ($coralternada++ %2 ? "FFFFFF" : "FFFFDC");
?>
<tr bgcolor='<? echo $cor ?>'>
<td align="center" style="border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1"><font face="Verdana" size="1"><? familianome($dom[familia]) ?></font></td>
<td align="center" style="border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1"><font face="Verdana" size="1"><? echo $dom[codigo]?></font></td>
<td align="center" style="border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1"><font face="Verdana" size="1"><? echo $dom[modelo]?></font></td>
<?
$hori = mysql_query("SELECT o.cliente, o.contrato, s.obra, s.horimetro_ida, s.horimetro_volta FROM equipamento_obra s inner join obra o on (s.obra=o.id) where s.equipamento='".$dom[id]."' order by s.id desc Limit 1");
$hA = mysql_fetch_array($hori);
?>
<td align="center" style="border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1"><font face="Verdana" size="1"><? if($hA[horimetro_volta]==''){ echo $hA[horimetro_ida]; } else { echo $hA[horimetro_volta]; }?></font></td>
<td align="center" style="border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1"><font face="Verdana" size="1"><? echo $dom[ano]?></font></td>
<td align="center" style="border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1"><font face="Verdana" size="1"><? echo $dom[seriechassi]?></font></td>
<td align="center" style="border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1"><font face="Verdana" size="1"><? status($dom[status]);?>
</font></td>
<td align="center" style="border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1"><font face="Verdana" size="1"> 

<? 
if($dom[ativo]=='b'){ echo $dom[OBS];}

if($dom[ativo]=='o'){?><?=$hA[contrato]?> - <?=$hA[cliente]?><? } ?>
<? if($dom[ativo]=='m'){?>Previsão: <? echo $dom[dt]?><? }?></font></td>

</tr>
<? } ?>
</table>
<? } } ?>
</body>
</html>
