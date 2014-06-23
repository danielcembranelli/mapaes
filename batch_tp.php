<?
# Configuracoes de banco de dados
$host ="177.52.160.33"; // Host valor padrao  localhost
$usuariodb="hostplaz_escad"; //Usuario de Conexao com  o MySQL
$senhadb="]IoK0zd9"; // Senha de Conexao com o MySQL
$db="hostplaz_escad"; //Banco de Dados MySQL
# Nao alterar nada abaixo
$conexao=mysql_connect ("$host", "$usuariodb", "$senhadb") or die ('No foi possivel conectar com o usuario: ' . mysql_error());
mysql_select_db ("$db") or die("no foi possivel");
$data = date("Y-m-d");




$tp = mysql_query("SELECT idTp FROM tipoproprietario order by nomeTp");
while ($wtp = mysql_fetch_array($tp)){
$ponto=0;	
	
$obra=@mysql_query("SELECT * FROM equipamento where ativo = 'o' And idTp='".$wtp[idTp]."' And `excluido` != 's'");
$obran=@mysql_num_rows($obra);
$disponivel = @mysql_query("SELECT * FROM equipamento where ativo = 'd' And idTp='".$wtp[idTp]."' And `excluido` != 's'");
$disponiveln=@mysql_num_rows($disponivel);
$manutencao = @mysql_query("SELECT * FROM equipamento where ativo = 'm' And idTp='".$wtp[idTp]."' And `excluido` != 's'");
$manutencaon=@mysql_num_rows($manutencao);
$observacao = @mysql_query("SELECT * FROM equipamento where ativo = 'b' And idTp='".$wtp[idTp]."' And `excluido` != 's'");
$observacaon=@mysql_num_rows($observacao);
$qnoticia = mysql_query("SELECT eo.ponto, e.idTp FROM`equipamento_obra` eo inner join equipamento e on (e.id=eo.equipamento) where eo.status = 'a' And e.idTp='".$wtp[idTp]."'");
$qnotician = mysql_num_rows($qnoticia);
if (!$qnoticia){
?>Problemas na conexo<?
}

else{
if ($qnotician==0){
?>

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
	$sql = mysql_query ("INSERT INTO `dip_diaria_geral_tp` ( `id` , `dia` , `obra` , `manutencao` , `disponivel` , `aobra` , `adisponivel` , `amanutencao` , `pontos`, `mes` , `ano` , `data`, `ob`,`aob`,`idTp` ) VALUES ('', '$data', '$obran', '$manutencaon', '$disponiveln', '$aobran', '$adisponiveln', '$amanutencaon', '$ponto', '$mes', '$ano', '$dia','$observacaon','$aobservacaon','".$wtp[idTp]."');") or die (mysql_error());


}
?>


















<?

$tp = mysql_query("SELECT idTp FROM tipoproprietario order by nomeTp");
while ($wtp = mysql_fetch_array($tp)){
	
	
$familia = mysql_query("SELECT id FROM familia");
while ($fam = mysql_fetch_array($familia)){

	$obra = @mysql_query("SELECT * FROM equipamento where familia = '$fam[id]' And idTp='".$wtp[idTp]."' And ativo = 'o' And `excluido` != 's'");
	$obran=@mysql_num_rows($obra);
	$disponivel = @mysql_query("SELECT * FROM equipamento where familia = '$fam[id]' And idTp='".$wtp[idTp]."' And ativo = 'd' And `excluido` != 's'");
	$disponiveln=@mysql_num_rows($disponivel);
	$manutencao = @mysql_query("SELECT * FROM equipamento where familia = '$fam[id]' And idTp='".$wtp[idTp]."' And ativo = 'm' And `excluido` != 's'");
	$manutencaon=@mysql_num_rows($manutencao);
	$observacao = @mysql_query("SELECT * FROM equipamento where familia = '$fam[id]' And idTp='".$wtp[idTp]."' And ativo = 'b' And `excluido` != 's'");
	$observacaon=@mysql_num_rows($observacao);
	$total = @mysql_query("SELECT * FROM equipamento where familia = '$fam[id]' And idTp='".$wtp[idTp]."' And `excluido` != 's'");
	$totaln=@mysql_num_rows($total);

	$sql = mysql_query("INSERT INTO `dip_diaria_familia_tp` ( `id` , `data` , `familia` , `obra` , `manutencao` , `disponivel`, `total`, `master`, `ob`,`idTp` ) VALUES ('', '$data', '$fam[id]', '$obran', '$manutencaon', '$disponiveln', '$totaln', '$fam[master]','$observacaon','".$wtp[idTp]."');");

	}

}
?>

<?
$data = date("Y-m-d");
$hora = date("h:m");
$sql = mysql_query ("INSERT INTO `auto` ( `id` , `data`  , `hora`, `modo` ) VALUES ('', '$data', '$hora', 'batch_tp');");
if (!$sql){
echo "No foi possivel a consulta.";}
else{}
?>
