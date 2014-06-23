<?
# Configuracoes de banco de dados
$sql = mysql_connect("177.52.160.26", "hostplaz_daniel", "]IoK0zd9") or die (mysql_error()); 
mysql_select_db ("hostplaz_escad") or die("não foi possivel");
# Nao alterar nada abaixo

$data = date("Y-m-d");
$obra=@mysql_query("SELECT * FROM equipamento where ativo = 'o' And `excluido` != 's'");
$obran=@mysql_num_rows($obra);
$disponivel = @mysql_query("SELECT * FROM equipamento where ativo = 'd' And `excluido` != 's'");
$disponiveln=@mysql_num_rows($disponivel);
$manutencao = @mysql_query("SELECT * FROM equipamento where ativo = 'm' And `excluido` != 's'");
$manutencaon=@mysql_num_rows($manutencao);
$observacao = @mysql_query("SELECT * FROM equipamento where ativo = 'b' And `excluido` != 's'");
$observacaon=@mysql_num_rows($observacao);
$venda = @mysql_query("SELECT * FROM equipamento where ativo = 'v' And `excluido` != 's'");
$vendan=@mysql_num_rows($venda);
$aobra = @mysql_query("SELECT * FROM acessorio where ativo = 'o' And `excluido` != 's'");
$aobran=@mysql_num_rows($aobra);
$adisponivel = @mysql_query("SELECT * FROM acessorio where ativo = 'd' And `excluido` != 's'");
$adisponiveln=@mysql_num_rows($adisponivel);
$amanutencao = @mysql_query("SELECT * FROM acessorio where ativo = 'm' And `excluido` != 's'");
$amanutencaon=@mysql_num_rows($amanutencao);
$aobservacao = @mysql_query("SELECT * FROM acessorio where ativo = 'b' And `excluido` != 's'");
$aobservacaon=@mysql_num_rows($aobservacao);
$avenda = @mysql_query("SELECT * FROM acessorio where ativo = 'v' And `excluido` != 's'");
$avendan=@mysql_num_rows($avenda);
$qnoticia = mysql_query("SELECT * FROM`equipamento_obra` where status = 'a'");
$qnotician = mysql_num_rows($qnoticia);
if (!$qnoticia){
?>Problemas na conexo<?
}

else{
if ($qnotician==0){
?>
<table border='0' width='730' cellspacing='1' cellpadding='0'>
<tr>
<td width='730' validn='middle' colspan='7'>
<tr>
<td width='730' bgcolor='#FFFFFF' colspan='5'><font class=font-11><span class=font-azul><center>no existe nenhum equipamento para est consulta</center></span></font></td>
</tr>
</table>
<?
}else {
?>
<? while ($qdom = mysql_fetch_array($qnoticia)){ ?>
<? $ponto = $ponto + $qdom[ponto] ?>
<? } } } ?>
<?
$dia = date("d");
$mes = date("m");
$ano = date("Y");
$sql = mysql_query ("INSERT INTO `dip_diaria_geral` ( `id` , `dia` , `obra` , `manutencao` , `disponivel` , `aobra` , `adisponivel` , `amanutencao` , `pontos`, `mes` , `ano` , `data`, `ob`,`aob`,`venda`,`avenda` ) VALUES ('', '$data', '$obran', '$manutencaon', '$disponiveln', '$aobran', '$adisponiveln', '$amanutencaon', '$ponto', '$mes', '$ano', '$dia','$observacaon','$aobservacaon','$vendan','$avendan');");
if (!$sql){
echo "No foi possivel a consulta.";}
else{}
?>
<?
$familia = mysql_query("SELECT * FROM familia");
$familian = mysql_num_rows($familia);
if (!$familia){
echo"Problemas na conexo";
} else {
if ($familian==0){
echo"Sem Registro de familia com essa master";
}else {
while ($fam = mysql_fetch_array($familia)){
$obra = @mysql_query("SELECT * FROM equipamento where familia = '$fam[id]' And ativo = 'o' And `excluido` != 's'");
$obran=@mysql_num_rows($obra);
$disponivel = @mysql_query("SELECT * FROM equipamento where familia = '$fam[id]' And ativo = 'd' And `excluido` != 's'");
$disponiveln=@mysql_num_rows($disponivel);
$manutencao = @mysql_query("SELECT * FROM equipamento where familia = '$fam[id]' And ativo = 'm' And `excluido` != 's'");
$manutencaon=@mysql_num_rows($manutencao);
$observacao = @mysql_query("SELECT * FROM equipamento where familia = '$fam[id]' And ativo = 'b' And `excluido` != 's'");
$observacaon=@mysql_num_rows($observacao);
$venda = @mysql_query("SELECT * FROM equipamento where familia = '$fam[id]' And ativo = 'v' And `excluido` != 's'");
$vendan=@mysql_num_rows($venda);
$total = @mysql_query("SELECT * FROM equipamento where familia = '$fam[id]' And `excluido` != 's'");
$totaln=@mysql_num_rows($total);
$sql = mysql_query ("INSERT INTO `dip_diaria_familia` ( `id` , `data` , `familia` , `obra` , `manutencao` , `disponivel`, `total`, `master`, `ob`,`venda` ) VALUES ('', '$data', '$fam[id]', '$obran', '$manutencaon', '$disponiveln', '$totaln', '$fam[master]','$observacaon','$vendan');");
if (!$sql){
echo "No foi possivel a consulta.";}
else{}
} }
}
?>
<?
$familia = mysql_query("SELECT * FROM familia_acessorio");
$familian = mysql_num_rows($familia);
if (!$familia){
echo"Problemas na conexo";
} else {
if ($familian==0){
echo"Sem Registro de familia com essa master";
}else {
while ($fam = mysql_fetch_array($familia)){
$obra = @mysql_query("SELECT * FROM acessorio where familia = '$fam[id]' And ativo = 'o' And `excluido` != 's'");
$obran=@mysql_num_rows($obra);
$disponivel = @mysql_query("SELECT * FROM acessorio where familia = '$fam[id]' And ativo = 'd' And `excluido` != 's'");
$disponiveln=@mysql_num_rows($disponivel);
$manutencao = @mysql_query("SELECT * FROM acessorio where familia = '$fam[id]' And ativo = 'm' And `excluido` != 's'");
$manutencaon=@mysql_num_rows($manutencao);
$observacao = @mysql_query("SELECT * FROM acessorio where familia = '$fam[id]' And ativo = 'b' And `excluido` != 's'");
$observacaon=@mysql_num_rows($observacao);
$venda = @mysql_query("SELECT * FROM acessorio where familia = '$fam[id]' And ativo = 'v' And `excluido` != 's'");
$vendan=@mysql_num_rows($venda);
$total = @mysql_query("SELECT * FROM acessorio where familia = '$fam[id]' And `excluido` != 's'");
$totaln=@mysql_num_rows($total);
$sql = mysql_query ("INSERT INTO `dip_diaria_afamilia` ( `id` , `data` , `familia` , `obra` , `manutencao` , `disponivel`, `total`, `master`, `ob`,`venda` ) VALUES ('', '$data', '$fam[id]', '$obran', '$manutencaon', '$disponiveln', '$totaln', '$fam[master]','$observacaon','$vendan');");
if (!$sql){
echo "No foi possivel a consulta.";}
else{}
} }
}
?>
<html>
<head>
<meta http-equiv="Content-Language" content="pt-br">
<meta name="GENERATOR" content="Microsoft FrontPage 5.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Nova pagina 1</title>
</head>
<body>
<table border="1" cellpadding="3" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber1">
<tr>
<td width="100%">Grfico de Disponibilidade / Produo / Manuteno de 00/00/0000</td>
</tr>
<tr>
<td width="100%">
<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber2">
<tr>
<td width="20%" align="center"><font face="Verdana" size="2">Famlia Master</font></td>
<td width="20%" align="center"><font face="Verdana" size="2">Disponibilidade por dia (Unidade) (Mdia) </font></td>
<td width="20%" align="center"><font face="Verdana" size="2">Produtividade por ms (Porccentagem) (Mdia)</font></td>
<td width="20%" align="center"><font face="Verdana" size="2">Manuteno por ms (Porccentagem) (Mdia)</font></td>
<td width="20%" align="center"><font face="Verdana" size="2">Total da Frota</font></td>
</tr>
<?
$noticia = mysql_query("SELECT * FROM familia_master order by nome");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conexo<?
}
else{
if ($notician==0){
?>
<table border='0' width='730' cellspacing='1' cellpadding='0'>
<tr>
<td width='730' validn='middle' colspan='7'>
<img src='imagens/layout_seta.gif' width="15" height="9"><b class=font-10>Visualizar familia master</b><br>&nbsp;
</td>
</tr>
<tr>
<td width='730' bgcolor='#FFFFFF' colspan='5'><font class=font-11><span class=font-azul><center>no existe nenhuma famlia master para est consulta</center></span></font></td>
</tr>
</table>
<?
}else {
?>
<? while ($dom = mysql_fetch_array($noticia)){ ?>
<tr>
<td width="20%">&nbsp;<font face="Verdana" size="2"><? echo $dom[sigla]?> - <? echo $dom[nome]?></td>
<td width="20%" align="center">
<?
$tom_disponivel = '0';
$tom_manutencao = '0';
$tom_obra = '0';
$tom_total = '0';
$total = @mysql_query("SELECT * FROM `dip_diaria_familia` where master = $dom[id]");
$totaln=@mysql_num_rows($total);
while ($ca = mysql_fetch_array($total)){
$tom_disponivel = $tom_disponivel + $ca[disponivel];
$tom_manutencao = $tom_manutencao + $ca[manutencao];
$tom_ob = $tom_ob + $ca[ob];
$tom_v = $tom_v + $ca[venda];
$tom_obra = $tom_obra + $ca[obra];
$tom_total = $tom_total + $ca[total];
}
echo $tom_disponivel;
?>&nbsp;</td>
<td width="20%" align="center"><? echo $tom_obra; ?>&nbsp;</td>
<td width="20%" align="center"><? echo $tom_manutencao; ?>&nbsp;</td>
<td width="20%" align="center"><? echo $tom_total ?>&nbsp;</td>
</tr>
<?
$sql = mysql_query ("INSERT INTO `dip_diaria_total` ( `id` , `data` , `obra` , `manutencao` , `disponivel` , `total` , `familia`, `ob`,`venda` ) VALUES ('', '$data', '$tom_obra', '$tom_manutencao', '$tom_disponivel', '$tom_total', '$dom[id]','$tom_ob','$tom_v');");
?>
<? } } } ?>
</table>
</td>
</tr>
</table>
</body>
<?


        $SqlFMaster = mysql_query("SELECT p.ID_PATIO, (SELECT count(*) FROM `obra` WHERE status = 'a' And `patio` = p.ID_PATIO) as OBRA, (SELECT count(*) FROM `equipamento_obra` WHERE `PATIO` =p.ID_PATIO And status = 'a') as EOBRA, (Select count(*) from equipamento E inner join status S on (S.id=E.status) where E.excluido='n' And E.ativo='d' And S.ID_PATIO=p.ID_PATIO) as DISPONIVEL, (Select count(*) from equipamento E inner join status S on (S.id=E.status) where E.excluido='n' And E.ativo='m' And S.ID_PATIO=p.ID_PATIO) as MANUTENCAO FROM patio p order by p.ID_PATIO");
        while ($sM = mysql_fetch_array($SqlFMaster)){ 

			$insert = mysql_query("insert into dip_patio values ('','$sM[ID_PATIO]',NOW(),'$sM[DISPONIVEL]','$sM[MANUTENCAO]','$sM[OBRA]','$sM[EOBRA]');");
			
		}
		mysql_free_result($SqlFMaster);
		
		$SqlDipE = mysql_query("Select o.id, o.contrato, o.cliente, (Select count(*) from hostplaz_escad.equipamento_obra eo where eo.obra=o.id And eo.status='a') as qtda from hostplaz_escad.obra o where o.status='a'");
		while ($sE = mysql_fetch_array($SqlDipE)){
		
			$insert = mysql_query("insert into dip_equipamento_obra values ('',NOW(),'$sE[id]','$sE[qtda]')") or die (mysql_error());
		
		}
		mysql_free_result($SqlDipE);

$data = date("Y-m-d");
$hora = date("h:m");
$sql = mysql_query ("INSERT INTO `auto` ( `id` , `data`  , `hora`, `modo` ) VALUES ('', '$data', '$hora', 'batch');");
if (!$sql){
echo "No foi possivel a consulta.";}
else{}
?>
