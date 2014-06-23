<?
$hostname = "200.152.208.160";
$username = "Estiloramy";
$password = "3o5mpab7";
$dbName = "estiloramy";

MSSQL_CONNECT($hostname,$username,$password) or DIE("Não foi possível estabelecer conexão!");
mssql_select_db($dbName) or DIE("O Banco de Dados selecionado não foi encontrado!");
?>