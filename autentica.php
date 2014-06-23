<?
session_start("autentica");
include("config.php");
$login = $_POST["txtlogin"];
$senha = $_POST["txtsenha"];
if(!(isset($login) AND isset($senha))){
echo ("Voc deve preencher todos os campos");
exit;
}else{
$sql = "SELECT id, nome, emailUsuario FROM login WHERE login = '$login' AND senha = '$senha' And statusUsuario='A'";
$res = mysql_query($sql);
if(mysql_num_rows($res) > 0){
$login = $_POST["txtlogin"];
$_SESSION[login]=$login;
$_SESSION[senha]=$senha;

//session_register("login", "senha");
$_SESSION[login]=$_POST["txtlogin"];
$url = "index.php";
$sq = mysql_fetch_array($res);
$data = date("Y-m-d H:i:s");
$log = mysql_query("Update login set nrLogUsuario=nrLogUsuario+1, dtAntLogUsuario=dtLogUsuario, dtLogUsuario='$data' where id = $sq[id]");
if($sq[nome]=='' || $sq[emailUsuario]=='')
{
$url = "MeusDados.php";
?>
<script>alert("Por favor atualize seu cadastro!!")</script>
<? }?>
<script>window.location.replace("<?=$url?>")</script>
<?
}else{
?>
<script>window.location.replace("Login.php?invalido=true")
</script><?
}
}
?>
