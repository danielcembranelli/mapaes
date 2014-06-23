<?
# Configuracoes de banco de dados
$host ="177.52.160.26"; // Host valor padrao é localhost
$usuariodb="hostplaz_escad"; //Usuario de Conexao com  o MySQL
$senhadb="]IoK0zd9"; // Senha de Conexao com o MySQL
$db="hostplaz_escad"; //Banco de Dados MySQL


# Nao alterar nada abaixo
$conexao=mysql_connect ("$host", "$usuariodb", "$senhadb") or die ('Não foi possivel conectar com o usuario: ' . mysql_error());
mysql_select_db ("$db") or die("não foi possivel");

function UltimoHorimetro($Id){
	$hori = mysql_query("SELECT s.horimetro_ida, s.horimetro_volta FROM equipamento_obra s where s.equipamento='$Id' order by s.id desc Limit 1");
	$hA = mysql_fetch_array($hori);
	if($hA[horimetro_volta]==''){
		$retorno = $hA[horimetro_ida];
	} else {
		$retorno = $hA[horimetro_volta];
	}
	mysql_free_result($hori);
	return $retorno;
	
	
	
}	?>