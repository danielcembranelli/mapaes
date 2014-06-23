<?
session_start("autentica");
include("config.php");
$login = $_POST["txtlogin"];
$senha = $_POST["txtsenha"];
if(!(isset($login) AND isset($senha))){
echo ("Você deve preencher todos os campos");
exit;
}else{
$sql = "SELECT * FROM login WHERE login = '$login' AND senha = '$senha'";
$res = mysql_query($sql);
if(mysql_num_rows($res) > 0){

session_register("login", "senha");
$url = "principal.php";
?>
<script>window.location.replace("<?=$url?>")
</script>
<?
}else{
?>
<script>window.location.replace("index.php?invalido=true")
</script><?
}
}
?>