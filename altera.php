<?
include("config.php");
$nota = mysql_query("SELECT * FROM notas where ID_NOTA >= '1641'");
while ($no = mysql_fetch_array($nota)){
$result = explode('/',$no[NOTA_FIM]);
$data = "$result[2]-$result[1]-$result[0]";

$sql = mysql_query("UPDATE `notas` SET `NOTA_FIM` = '$data' WHERE `ID_NOTA` =$no[ID_NOTA] LIMIT 1 ;");

}
?>