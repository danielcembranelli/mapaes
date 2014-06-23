<?
include('Config.php');
function InfoProposta($idProposta,$Campo){
	$sqlFamilia = mysql_query("SELECT ".$Campo." from proposta where idProposta='".$idProposta."' Limit 1") or die ("Could not connect to database: ".mysql_error());
return mysql_fetch_array($sqlFamilia);
}
function StatusProposta($idProposta,$status,$texto){
	return $Sql = mysql_query("Insert into proposta_status (idProposta, idUsuario, statusPs, dtPs, textoPs) Values ('".$idProposta."','".$_SESSION[idLogin]."','".$status."',NOW(),'".nl2br($texto)."')") or die (mysql_error());
}
echo $insereFamilia = mysql_query("Update proposta set statusProposta='C', confirmaProposta=NOW() where idProposta='".$_POST[id]."' Limit 1") or die (mysql_error());
	$IP = InfoProposta($_POST[id],'idCliente');
	
	$AC = mysql_query("Update clientes set idPropostaC='".$_POST[id]."', expiraCliente='N', Cli_Status='A', dtCli_Status=NOW() where Cli_ID = '".$IP[0]."' Limit 1") or die ('ERRO AC:'.mysql_error());
	StatusProposta($_REQUEST[id],'C','Confirmacao de Proposta via MapaES');
?>