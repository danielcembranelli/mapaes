<?
session_start("autentica");

if(!(isset($_SESSION["login"]) AND isset($_SESSION["senha"]))){
$url = "Login.php";
?>
<script>window.location.replace("<?=$url?>")
</script>
<?
}else{
session_unregister("login");
session_unregister("senha");
$url = "Login.php?logout=true";
?>
<script>window.location.replace("<?=$url?>")
</script>
<?
}

?>