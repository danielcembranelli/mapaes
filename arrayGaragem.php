<?php header("Content-Type: text/html;  charset=ISO-8859-1",true); ?>
<? include("verifica.php");?>
<html>
<head>
<meta http-equiv='content-type' content='text/html; charset=iso-8859-1'>
<link rel='StyleSheet' href='temas/include/estilos.css' type='text/css'></head>
<body>
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber1" height="30">
<tr>
<td width="100%" bgcolor="#FF0000" colspan="6" height="17">&nbsp;<strong><font color="#FFFFFF" face="Verdana">Vista por p&aacute;tio</font></strong></td>
</tr>
<tr height="20">
<td>P&aacute;tio</td>
<td align="center">Eqpto Dispon&iacute;vel</td>
<td align="center">Eqpto em Manuten&ccedil;&atilde;o</td>
<td align="center">Eqpto. em Obra</td>
<td align="center">Obras</td>
</tr>
        <? 
		$TOTAL = array();
		$SqlFilial = mysql_query("Select idPatio from login_patio where idUsuario='".$login_id."'") or die (mysql_error());
		$nFilial = mysql_num_rows($SqlFilial);
		if($nFilial>0){
			while($sF = mysql_fetch_array($SqlFilial)){
				$i++;
				$montaWhere .= '(';
					$montaWhere.= "p.statusPatio='A' And p.ID_PATIO='".$sF[idPatio]."'";
				if($i!=$nFilial){
					$montaWhere .= ") or ";
				} else {
					$montaWhere .= ")";
				}
				
			}
		} else {
			$montaWhere = "p.statusPatio='A'";
		}
		if($LoginTipo=='V'){
			$montaWhere = "p.statusPatio='A'";	
		}
		$SQL = "SELECT p.ID_PATIO, p.NOME_PATIO, (SELECT count(*) FROM `obra` WHERE status = 'a' And `patio` = p.ID_PATIO) as OBRA, (SELECT count(*) FROM `equipamento_obra` WHERE `PATIO` =p.ID_PATIO And status = 'a') as EOBRA, (Select count(*) from equipamento E inner join status S on (S.id=E.status) where E.excluido='n' And E.ativo='d' And S.ID_PATIO=p.ID_PATIO) as DISPONIVEL, (Select count(*) from equipamento E inner join status S on (S.id=E.status) where E.excluido='n' And E.ativo='m' And S.ID_PATIO=p.ID_PATIO) as MANUTENCAO, (Select count(*) from equipamento E inner join status S on (S.id=E.status) where E.excluido='n' And E.ativo='v' And S.ID_PATIO=p.ID_PATIO) as VENDA FROM patio p where ".$montaWhere." order by p.NOME_PATIO";
		
        $SqlFMaster = mysql_query($SQL);
        while ($sM = mysql_fetch_array($SqlFMaster)){ 
		$cor = ($coralternada++ %2 ? "FFFFFF" : "FFFFDC");
		$TOTAL[D] += $sM[DISPONIVEL];
		$TOTAL[M] += $sM[MANUTENCAO];
		$TOTAL[E] += $sM[EOBRA];
		$TOTAL[O] += $sM[OBRA];
?>
		<tr height="15" bgcolor="<?=$cor?>">
        <td>&nbsp;<?=$sM[NOME_PATIO] ?></td>
        <td width="15%" align="center"><a href="javascript:getUrl('arrayGaragemFamilia.php?ID_PATIO=<?=$sM[ID_PATIO]?>&Ativo=d');"><?=$sM[DISPONIVEL] ?></a></td>  
        <td width="25%" align="center"><a href="javascript:getUrl('arrayGaragemFamilia.php?ID_PATIO=<?=$sM[ID_PATIO]?>&Ativo=m');"><?=$sM[MANUTENCAO] ?></a></td> 
        <td width="15%" align="center"><a target="_blank" href="RelatorioPatioEqpto.php?Patio=<?=$sM[ID_PATIO]?>"><?=$sM[EOBRA] ?></a></td>
        <td width="15%" align="center"><a target="_blank" href="RelatorioPatioObra.php?Patio=<?=$sM[ID_PATIO]?>"><?=$sM[OBRA] ?></a></td>      
        </tr>                
        <? } ?>
        <tr height="20" bgcolor="#99CCFF">
        <td><font class='font-10'>&nbsp;Total:</font></td>
        <td align="center"><? echo $TOTAL[D] ?></td>
        <td align="center"><? echo $TOTAL[M] ?></td>
        <td align="center"><? echo $TOTAL[E] ?></td>
        <td align="center"><? echo $TOTAL[O] ?></td>
        </tr>
</table>
<center>
<form action="RelatorioGaragem.php" method="post" target="_blank">
	
<table border='0' width='450' cellspacing='0' cellpadding='0'>
<tr>
<td width='200'><font class=font-10><span class=font-vinho>data de inicio :</span></font></td>
<td width='200'><font class=font-10><span class=font-vinho>data de fim :</span></font></td>
<td width='50' class=line-height-5></td>
</tr>
<tr>
<td width='200' class='line-height-5'>
<input class='form-especial' onblur=this.className='boxnormal' onfocus=this.className='boxover' type=text name='dtInicio' size='30' maxlength='10'>
</td>
<td width='200' class='line-height-5'>
<input class='form-especial' onblur=this.className='boxnormal' onfocus=this.className='boxover' type=text name='dtFim' size='30' maxlength='10'>
</td>
<td width='50' class=line-height-5>
<input type='image' src='imagens/layout_btenviar.gif' width="54" height="16">
</td>
</tr>
<tr>
<td width='200' class='line-height-5'>
<span class='font-11'><input name="tipo" type="radio" value="PRODUTIVIDADE" checked> Produtividade no mês</span>
</td>
<td width='200' class='line-height-5'>
<span class='font-11'><input name="tipo" type="radio" value="QUANTIDADE"> Quantidade de Eqpto por Obra</span></td>
<td width='50' class=line-height-5>
</td>
</tr>
<tr>
</tr>
</table>

</form>
</center>
<? mysql_free_result($SqlFMaster);?>
</body>
</html>