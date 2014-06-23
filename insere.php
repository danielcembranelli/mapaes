<?
# Configuracoes de banco de dados
$host ="wesell.ns1.com.br"; // Host valor padrao é localhost
$usuariodb="escad25128"; //Usuario de Conexao com  o MySQL
$senhadb="GRLPwGzK"; // Senha de Conexao com o MySQL
$db="escad"; //Banco de Dados MySQL


# Nao alterar nada abaixo
$conexao=mysql_connect ("$host", "$usuariodb", "$senhadb") or die ('Não foi possivel conectar com o usuario: ' . mysql_error());
mysql_select_db ("$db") or die("não foi possivel");

$data = date("Y-m-d");

$obra=@mysql_query("SELECT * FROM equipamento where ativo = 'o' And `excluido` != 's'");
$obran=@mysql_num_rows($obra);

$disponivel = @mysql_query("SELECT * FROM equipamento where ativo = 'd' And `excluido` != 's'");
$disponiveln=@mysql_num_rows($disponivel);

$manutencao = @mysql_query("SELECT * FROM equipamento where ativo = 'm' And `excluido` != 's'");
$manutencaon=@mysql_num_rows($manutencao);

$aobra = @mysql_query("SELECT * FROM acessorio where ativo = 'o' And `excluido` != 's'");
$aobran=@mysql_num_rows($aobra);

$adisponivel = @mysql_query("SELECT * FROM acessorio where ativo = 'd' And `excluido` != 's'");
$adisponiveln=@mysql_num_rows($adisponivel);

$amanutencao = @mysql_query("SELECT * FROM acessorio where ativo = 'm' And `excluido` != 's'");
$amanutencaon=@mysql_num_rows($amanutencao);

$qnoticia = mysql_query("SELECT * FROM`equipamento_obra` where status = 'a'");
$qnotician = mysql_num_rows($qnoticia);
if (!$qnoticia){
?>Problemas na conexão<?
}
else{
if ($qnotician==0){
?>
<table border='0' width='730' cellspacing='1' cellpadding='0'>
<tr>
<td width='730' validn='middle' colspan='7'>
<img src='imagens/layout_seta.gif' width="15" height="9"><b class=font-10>Visualizar equipamento</b><br>&nbsp;
</td>
</tr>
<tr>
<td width='730' bgcolor='#FFFFFF' colspan='5'><font class=font-11><span class=font-azul><center>não existe nenhum equipamento para está consulta</center></span></font></td>
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
$sql = mysql_query ("INSERT INTO `dip_diaria_geral` ( `id` , `dia` , `obra` , `manutencao` , `disponivel` , `aobra` , `adisponivel` , `amanutencao` , `pontos`, `mes` , `ano` , `data` ) VALUES ('', '$data', '$obran', '$manutencaon', '$disponiveln', '$aobran', '$adisponiveln', '$amanutencaon', '$ponto', '$mes', '$ano', '$dia');");
if (!$sql){
echo "Não foi possivel a consulta.";}
else{}
?>
<?
$familia = mysql_query("SELECT * FROM familia");
$familian = mysql_num_rows($familia);
if (!$familia){
echo"Problemas na conexão";
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

$total = @mysql_query("SELECT * FROM equipamento where familia = '$fam[id]' And `excluido` != 's'");
$totaln=@mysql_num_rows($total);



$sql = mysql_query ("INSERT INTO `dip_diaria_familia` ( `id` , `data` , `familia` , `obra` , `manutencao` , `disponivel`, `total`, `master` ) VALUES ('', '$data', '$fam[id]', '$obran', '$manutencaon', '$disponiveln', '$totaln', '$fam[master]');");
if (!$sql){
echo "Não foi possivel a consulta.";}
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
    <td width="100%">Gráfico de Disponibilidade / Produção / Manutenção de 00/00/0000</td>
  </tr>
  <tr>
    <td width="100%">
    <table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber2">
      <tr>
        <td width="20%" align="center"><font face="Verdana" size="2">Família Master</font></td>
        <td width="20%" align="center"><font face="Verdana" size="2">Disponibilidade por dia (Unidade) (Média) </font></td>
        <td width="20%" align="center"><font face="Verdana" size="2">Produtividade por mês (Porccentagem) (Média)</font></td>
        <td width="20%" align="center"><font face="Verdana" size="2">Manutenção por mês (Porccentagem) (Média)</font></td>
        <td width="20%" align="center"><font face="Verdana" size="2">Total da Frota</font></td>
      </tr>
      <?
$noticia = mysql_query("SELECT * FROM familia_master order by nome");
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
<img src='imagens/layout_seta.gif' width="15" height="9"><b class=font-10>Visualizar familia master</b><br>&nbsp;
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
$sql = mysql_query ("INSERT INTO `dip_diaria_total` ( `id` , `data` , `obra` , `manutencao` , `disponivel` , `total` , `familia` ) VALUES ('', '$data', '$tom_obra', '$tom_manutencao', '$tom_disponivel', '$tom_total', '$dom[id]');");
?>
<? } } } ?>      
    </table>
    </td>
  </tr>
</table>

</body>