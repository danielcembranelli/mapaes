<? 
include("config.php");
echo $altera_tabela = mysql_query("UPDATE `obra` SET `status`= 'a' WHERE `id` = '".$_REQUEST[id]."' LIMIT 1 ;") or die (mysql_error());
?>