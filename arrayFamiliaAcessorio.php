<? include("config.php");?>
<?php header("Content-Type: text/html;  charset=ISO-8859-1",true); ?>
<table width="100%">
        <? 
        $SqlFMaster = mysql_query("SELECT J.nome, count(*) as total, E.status, S.letra, J.id  FROM acessorio E inner join familia_acessorio J on (J.id=E.familia) left join status S on (S.id=E.status) where E.excluido!='s' And J.master='$_REQUEST[FM]' And E.ativo='$_REQUEST[Ativo]' group by E.familia, E.status order by J.nome") or die (mysql_error());
        while ($sM = mysql_fetch_array($SqlFMaster)){ 
		$cor = ($coralternada++ %2 ? "FFFFFF" : "FFFFDC");
?>
		<tr bgcolor="<?=$cor?>">
        <td><?=$sM[nome] ?></td>
        <td width="10%"><a href="acessorio.php?modulo=acha&familia=<?=$sM[id]?>&status=<?=$sM[status]?>"><?=$sM[total] ?></a></td>  
        <td width="10%"><?=$sM[letra] ?></td>      
        </tr>                
        <? } ?>
</table>
<br />
<? mysql_free_result($SqlFMaster);?>