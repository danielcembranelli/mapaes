<? include("config.php");
header("Content-Type: text/html;  charset=ISO-8859-1",true); ?>
<table>
<tr>
	<td align="center">equipamento</td>
    <td align="center">qtda</td>
    </tr>
        <? 
		if($_REQUEST[type]=='F')
		{
		$SqlFMaster = mysql_query("SELECT count(*) as total, D.familia , D.nome FROM hostplaz_escad.equipamento E inner join hostplaz_escad.familia D on (D.id=E.familia) where excluido='n' And E.ativo='$_REQUEST[Ativo]' group by D.master order by nome");		
		} else {
		$SqlFMaster = mysql_query("SELECT count(*) as total, E.ativo, D.master, D.nome FROM hostplaz_escad.equipamento E inner join hostplaz_escad.familia D on (D.id=E.familia) where excluido='n' And E.ativo='$_REQUEST[Ativo]' group by D.master order by nome");
		}
        while ($sM = mysql_fetch_array($SqlFMaster)){ ?>
        <tr>
        <td onclick="AbreGrafico('<?=$sM[master] ?>','M');"><?=$sM[nome] ?></td>
        <td align="center"><?=$sM[total] ?></td>        
        </tr>                
        <? } ?>
</table>
<? mysql_free_result($SqlFMaster);?>