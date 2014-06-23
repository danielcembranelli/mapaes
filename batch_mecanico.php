<?
# Configuracoes de banco de dados
$host ="177.52.160.26"; // Host valor padrao  localhost
$usuariodb="hostplaz_escad"; //Usuario de Conexao com  o MySQL
$senhadb="]IoK0zd9"; // Senha de Conexao com o MySQL
$db="hostplaz_escad"; //Banco de Dados MySQL
# Nao alterar nada abaixo
$conexao=mysql_connect ("$host", "$usuariodb", "$senhadb") or die ('No foi possivel conectar com o usuario: ' . mysql_error());
mysql_select_db ("$db") or die("no foi possivel");
$data = date("Y-m-d");


$tp = mysql_query("SELECT  e.id, o.idMecanico FROM equipamento_obra e inner join obra o on (o.id=e.obra) where e.status='a' And o.idMecanico!='0'");
while ($wtp = mysql_fetch_array($tp)){
	
	//echo $wtp[idMecanico];


	$sql = mysql_query("INSERT INTO `dip_diaria_mecanico_epto` ( `idMecanico` , `idEqpto` , `dtDpme`) VALUES ('".$wtp[idMecanico]."', '".$wtp[id]."', NOW());") or die (mysql_error());

}
?>

<?
$data = date("Y-m-d");
$hora = date("h:m");
$sql = mysql_query ("INSERT INTO `auto` ( `id` , `data`  , `hora`, `modo` ) VALUES ('', '$data', '$hora', 'mecanico');");
if (!$sql){
echo "No foi possivel a consulta.";}
else{}
?>
