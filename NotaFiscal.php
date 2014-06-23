<? include("config.php");?>
<?php header("Content-Type: text/html;  charset=ISO-8859-1",true); ?>
<? include("lib.php");?>
<table width="650">
<tr>
<th>NOTA</th>
<th>Contrato</th>
<th>Início</th>
<th>Final</th>
<th>Eqpto</th>
<th>Cliente</th>
<th>#</th>
</tr>
        <? 
        $SqlFMaster = mysql_query("SELECT n.ID_NOTA,n.NR_NOTA, n.CONTRATO, n.NOTA_INI, n.NOTA_FIM, n.EQPTO, n.CLIENTE, n.TIPO_NOTA  FROM notas n WHERE NR_NOTA = '".$_REQUEST[nr]."' ORDER BY ID_NOTA;");
        while ($sM = mysql_fetch_array($SqlFMaster)){ 
		$cor = ($coralternada++ %2 ? "FFFFFF" : "FFFFDC");
?>
		<tr bgcolor="<?=$cor?>" align="center">
        <td><?=$sM[NR_NOTA] ?></td>
        <td width="10%"><?=$sM[CONTRATO]; ?></td> 
		<td width="10%"><?=data($sM[NOTA_INI]); ?></td>
        <td width="10%"><?=data($sM[NOTA_FIM]); ?></td>
        <td width="10%"><?=$sM[EQPTO] ?></td>
        <td><?=$sM[CLIENTE] ?></td>
        <td width="10%"><?=$sM[TIPO_NOTA] ?></td>      
        </tr>                
        <? } ?>
</table>
<br />
<? mysql_free_result($SqlFMaster);?>