<? include("config.php");?>
<?php header("Content-Type: text/html;  charset=ISO-8859-1",true); ?>
<html>
<head>
<link rel='StyleSheet' href='temas/include/estilos.css' type='text/css'>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber1" height="30">
<!--<tr>
<td width="100%" bgcolor="#FF0000" colspan="6" height="17">&nbsp;<b><font color="#FFFFFF" face="Verdana">VISO DO PTIO</font></b></td>
</tr>-->
<tr>
<td>Famlia</td>
<td align="center">Cdigo</td>
<td width="10%" align="center">ano</td>  
<td width="10%" align="center">horimetro</td>  
<? if($_REQUEST[Ativo]=='m'){?>
<td width="20%" align="center">dt. prev.</td>  
<? } ?>
</tr>
        <? 
        $SqlFMaster = mysql_query("Select E.id, F.nome, E.codigo, E.ativo, E.familia, E.status, E.ano, OBS as dt from equipamento E inner join status S on (S.id=E.status) left join familia F on (F.id=E.familia) where E.excluido='n' And E.ativo='$_REQUEST[Ativo]' And S.ID_PATIO='$_REQUEST[ID_PATIO]'");
        while ($sM = mysql_fetch_array($SqlFMaster)){ 
		$cor = ($coralternada++ %2 ? "FFFFFF" : "FFFFDC");
?>
		<tr bgcolor="<?=$cor?>">
        <td>&nbsp;<?=$sM[nome] ?></td>
        <td width="25%" align="center"><a href="maquina.php?modulo=localiza&id=<?=$sM[id] ?>&status=<?=$sM[status] ?>&codigo=<?=$sM[codigo] ?>&familia=<?=$sM[familia] ?>"><?=$sM[codigo] ?></a></td>       
        <td width="10%" align="center"><?=$sM[ano] ?></td>  
        <td width="10%" align="center"><?=UltimoHorimetro($sM[id]);?></td>
        <? if($_REQUEST[Ativo]=='m'){?>
        <td align="center"><?=$sM[dt] ?></td>  
        <? } ?>
        </tr>                
        <? } ?>
</table>
<br />
</body>
</html>