<?
$hostname = "200.152.208.160";
$username = "Estiloramy";
$password = "3o5mpab7";
$dbName = "estiloramy";

MSSQL_CONNECT($hostname,$username,$password) or DIE("N�o foi poss�vel estabelecer conex�o!");
mssql_select_db($dbName) or DIE("O Banco de Dados selecionado n�o foi encontrado!");
?>