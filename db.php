<SCRIPT language=JavaScript src="grafico/graphs.js"></SCRIPT>
<?
# Configuracoes de banco de dados
$host ="177.52.160.33"; // Host valor padrao é localhost
$usuariodb="hostplaz_escad"; //Usuario de Conexao com  o MySQL
$senhadb="]IoK0zd9"; // Senha de Conexao com o MySQL
$db="hostplaz_escad"; //Banco de Dados MySQL


# Nao alterar nada abaixo
$conexao=mysql_connect ("$host", "$usuariodb", "$senhadb") or die ('Não foi possivel conectar com o usuario: ' . mysql_error());
mysql_select_db ("$db") or die("não foi possivel");
?> 

<?
function estatitica($pagina) {
$data = date("Y-m-d");
$ip = $_SERVER['REMOTE_ADDR']; 
$hora = date("H:i:s");

$sqllog = mysql_query("INSERT INTO `log` ( `id` , `acao` , `data` , `hora` , `usuario` , `ip` ) VALUES ('', '$pagina', '$data', '$hora', '$_SESSION[login]', '$ip');");
if (!$sqllog){
echo "Não foi possivel a consulta.";}
else{} 
}
?>
<? ini_set ('max_execution_time','400000000000'); ?>
