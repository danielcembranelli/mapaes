<? 
session_start("autentica");
if(!(isset($_SESSION["login"]) AND isset($_SESSION["senha"]))){
$url = "Login.php";
?>
<script>window.location.replace("<?=$url?>")
</script>
<?
}else{
?>
<? } ?>
<?
include("config.php");
$noticia = mysql_query("SELECT * FROM login where login = '".$_SESSION[login]."'");
$notician = mysql_num_rows($noticia);
$dom = mysql_fetch_array($noticia);
$login_nome = $dom[nome];
$login_id = $dom[id];
$Perfil=$dom[idPm];
$LoginTipo=$dom[tipoUsuario]; 
$vPatio=$dom[idFilial];  


$PerfilLogin = mysql_query("SELECT * FROM perfil_mapa where idPm = '".$dom[idPm]."'");
$Pf = mysql_fetch_array($PerfilLogin);
?>
<title>.: Mapa ES :.</title>



<?
if($LoginTipo=='V'){
$acesso=1;
 if($_SERVER["SCRIPT_NAME"]=='/maquina.php'){
	$acesso=0;
 }
 if($_SERVER["SCRIPT_NAME"]=='/acessorio.php'){
	$acesso=0;
 }
 if($_SERVER["SCRIPT_NAME"]=='/caminhao.php'){
	$acesso=0;
 }
 if($_SERVER["SCRIPT_NAME"]=='/proprietario.php'){
	$acesso=0;
 }
if($_SERVER["SCRIPT_NAME"]=='/operador.php'){
	$acesso=0;
 }
if($_SERVER["SCRIPT_NAME"]=='/relatorios.php'){
	$acesso=0;
 } 
 if($_SERVER["SCRIPT_NAME"]=='/gerarelatorio9.php'){
	$acesso=0;
 }
 if($_SERVER["SCRIPT_NAME"]=='/gerarelatorio_comoperador.php'){
	$acesso=0;
 }
if($_SERVER["SCRIPT_NAME"]=='/usuario.php'){
	$acesso=0;
}
if($_SERVER["SCRIPT_NAME"]=='/RelatorioGaragem.php'){
	$acesso=0;
}     
if($_SERVER["SCRIPT_NAME"]=='/RelatorioPatioObra.php'){
	$acesso=0;
}
if($_SERVER["SCRIPT_NAME"]=='/RelatorioPatioEqpto.php'){
	//$acesso=0;
}
if($_SERVER["SCRIPT_NAME"]=='/obra.php'){
	$acesso=0;
}
if($_SERVER["SCRIPT_NAME"].'?'.$_SERVER['QUERY_STRING']=='/relatorios.php?modulo=maquinaporobra'){
	$acesso=1;
}
if($acesso==0){?>
<script>
alert('Acesso Negado!');
window.setTimeout('changeurl();',2); function changeurl(){window.location='index.php';}</script>
<? exit;} }?>

<? $_SERVER['QUERY_STRING'];?>

<?
function familia($familia,$status) {
?>
<?
$tec1 = mysql_query("SELECT * FROM equipamento where familia = '$familia' And status = '$status' And `excluido` != 's'");
$tec1n = mysql_num_rows($tec1);
if (!$tec1){
?>Problemas na conexão<?
}
else{
if ($tec1n==0){
?>
0		
<?
}else {
?>
<? echo $tec1n ?>
<? } } } ?>
<?
function familia_acessorio($familia,$status) {
?>
<?
$tec1 = mysql_query("SELECT * FROM acessorio where familia = '$familia' And status = '$status' And `excluido` != 's'");
$tec1n = mysql_num_rows($tec1);
if (!$tec1){
?>Problemas na conexão<?
}
else{
if ($tec1n==0){
?>
0		
<?
}else {
?>
<a href='acessorio.php?modulo=acha&familia=<? echo $familia ?>&status=<? echo $status ?>'><? echo $tec1n ?></a>
<? } } } ?>
<?
function familiatotal($familia) {
?>
<?
$tec1 = mysql_query("SELECT * FROM equipamento where familia = '$familia' And `excluido` != 's'");
$tec1n = mysql_num_rows($tec1);
if (!$tec1){
?>Problemas na conexão<?
}
else{
if ($tec1n==0){
?>
0		
<?
}else {
?>
<? echo $tec1n ?>
<? } } } ?>
<?
function total() {
?>
<?
$tec1 = mysql_query("SELECT * FROM equipamento where `excluido` != 's'");
$tec1n = mysql_num_rows($tec1);
if (!$tec1){
?>Problemas na conexão<?
}
else{
if ($tec1n==0){
?>
0		
<?
}else {
?>
<? echo $tec1n ?>
<? } } } ?>
<?
function totalgrupo($grupo) {
?>
<?
$anoticia = mysql_query("SELECT * FROM familia where grupo = '$grupo'");
$anotician = mysql_num_rows($anoticia);
if (!$anoticia){
?>Problemas na conexão<?
}
else{
if ($anotician==0){
?>
<?
}else {
?> 
<? while ($adom = mysql_fetch_array($anoticia)){ ?>
<?
$tec1 = mysql_query("SELECT * FROM equipamento where `familia` LIKE '$adom[familia]'");
$tec1n = mysql_num_rows($tec1);
if (!$tec1){
?>Problemas na conexão<?
}
else{
if ($tec1n==0){
?>
0		
<?
}else {
$total = $total + $tec1n;
} } } 
} } }
?>
<?
function status($id) {
?>
<?
$tec1 = mysql_query("SELECT * FROM status where id = '$id' ");
$tec1n = mysql_num_rows($tec1);
if (!$tec1){
?>Problemas na conexão<?
}
else{
if ($tec1n==0){
?>		
<?
}else {
?>
 <? while ($te1 = mysql_fetch_array($tec1)){ ?>
<? echo $te1[nome] ?>
<? } } } } 
function statusE($id) {
?>
<?
$tec1 = mysql_query("SELECT nome FROM status where id = '$id' ");
$te1 = mysql_fetch_array($tec1);
return $te1[nome];
} ?>

<?
function fami($id) {
?>
<?
$tec1 = mysql_query("SELECT * FROM familia where id = '$id' ");
$tec1n = mysql_num_rows($tec1);
if (!$tec1){
?>Problemas na conexão<?
}
else{
if ($tec1n==0){
?>		
<?
}else {
?>
 <? while ($te1 = mysql_fetch_array($tec1)){ ?>
<? echo $te1[nome] ?>
<? } } } } ?>

<?
function familia_master($id) {
?>
<?
$tec1 = mysql_query("SELECT * FROM familia_master where id = '$id' ");
$tec1n = mysql_num_rows($tec1);
if (!$tec1){
?>Problemas na conexão<?
}
else{
if ($tec1n==0){
?>		
<?
}else {
?>
 <? while ($te1 = mysql_fetch_array($tec1)){ ?>
<? echo $te1[sigla] ?>
<? } } } } ?>
<?
function familia_master_acessorio($id) {
?>
<?
$tec1 = mysql_query("SELECT * FROM familia_acessorio_master where id = '$id' ");
$tec1n = mysql_num_rows($tec1);
if (!$tec1){
?>Problemas na conexão<?
}
else{
if ($tec1n==0){
?>		
<?
}else {
?>
 <? while ($te1 = mysql_fetch_array($tec1)){ ?>
<? echo $te1[sigla] ?>
<? } } } } ?>
<?
function obranome($id) {
?>
<?
$tec1 = mysql_query("SELECT * FROM obra where id = '$id' ");
$tec1n = mysql_num_rows($tec1);
if (!$tec1){
?>Problemas na conexão<?
}
else{
if ($tec1n==0){
?>		
<?
}else {
?>
 <? while ($te1 = mysql_fetch_array($tec1)){ ?>
<? echo $te1[contrato] ?> - <? echo $te1[cliente] ?> (<? echo $te1[endereco] ?>)
<? } } } } ?>
<?
function grupoletra($id) {
?>
<?
$tec1 = mysql_query("SELECT * FROM grupo where id = '$id' ");
$tec1n = mysql_num_rows($tec1);
if (!$tec1){
?>Problemas na conexão<?
}
else{
if ($tec1n==0){
?>		
<?
}else {
?>
 <? while ($te1 = mysql_fetch_array($tec1)){ ?>
<? echo $te1[sigla] ?>
<? } } } } ?>
<?
function grupocor($id) {
?>
<?
$tec1 = mysql_query("SELECT * FROM grupo where id = '$id' ");
$tec1n = mysql_num_rows($tec1);
if (!$tec1){
?>Problemas na conexão<?
}
else{
if ($tec1n==0){
?>		
<?
}else {
?>
 <? while ($te1 = mysql_fetch_array($tec1)){ ?>
<? echo $te1[cor] ?>
<? } } } } ?>
<?
function familianome($id) {
?>
<?
$tec1 = mysql_query("SELECT * FROM familia where id = '$id' ");
$tec1n = mysql_num_rows($tec1);
if (!$tec1){
?>Problemas na conexão<?
}
else{
if ($tec1n==0){
?>		
<?
}else {
?>
 <? while ($te1 = mysql_fetch_array($tec1)){ ?>
<? echo $te1[nome] ?>
<? } } } } ?>
<?
function familiaacessorio($id) {
?>
<?
$tec1 = mysql_query("SELECT * FROM familia_acessorio where id = '$id' ");
$tec1n = mysql_num_rows($tec1);
if (!$tec1){
?>Problemas na conexão<?
}
else{
if ($tec1n==0){
?>		
<?
}else {
?>
 <? while ($te1 = mysql_fetch_array($tec1)){ ?>
<? echo $te1[nome] ?>
<? } } } } ?>

<?
function quanti($categoria) {
?>
<?
$tec2 = mysql_query("SELECT * FROM produto where categoria LIKE '$categoria'  ");
$tec2n = mysql_num_rows($tec2);
?>
<? echo $tec2n ?>
<?  } ?>
<?
function cli_total($id) {
?>
<?
$tec2 = mysql_query("SELECT * FROM cliente where vendedor LIKE '$id'  ");
$tec2n = mysql_num_rows($tec2);
?>
<? echo $tec2n ?>
<?  } ?>

<?
function data($data) {
?>
<? $result = explode('-',$data); ?><? echo $result[2] ?>/<? echo $result[1] ?>/<? echo $result[0] ?>
<?  } ?>
<?
function operador($id) {
?>
<? 
$noticia = mysql_query("SELECT * FROM operador where id=$id");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conexão<?
}
else{
if ($notician==0){
?>Nada Consta<? } else { ?><? while ($dom = mysql_fetch_array($noticia)){ ?>
<? echo $dom[nome] ?>
<?  } } } ?> 
<? } ?>
<?
function equipamento($id) {
?>
<? 
$noticia = mysql_query("SELECT * FROM equipamento where id = $id");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conexão<?
}
else{
if ($notician==0){
?>Nada Consta<? } else { ?><? while ($dom = mysql_fetch_array($noticia)){ ?>
<? echo $dom[codigo] ?>
			<?  } } } ?>
<? } ?>
<?
function acessorio($id) {
?>
<? 
$noticia = mysql_query("SELECT * FROM acessorio where id = $id");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conexão<?
}
else{
if ($notician==0){
?>Nada Consta<? } else { ?><? while ($dom = mysql_fetch_array($noticia)){ ?>
<? echo $dom[codigo] ?>
			<?  } } } ?>
<? } ?>
<?
function familianomeeqpto($id) {
?>
<?
$sql = mysql_query("SELECT * FROM equipamento where id = '$id' ");
while ($sq = mysql_fetch_array($sql)){
$tec1 = mysql_query("SELECT * FROM familia where id = '$sq[familia]' ");
$tec1n = mysql_num_rows($tec1);
if (!$tec1){
?>Problemas na conexão<?
}
else{
if ($tec1n==0){
?>		
<?
}else {
?>
 <? while ($te1 = mysql_fetch_array($tec1)){ ?>
<? echo $te1[nome] ?>
<? } } } } } ?>

<? 
function status_eqpto($id){
$status_equipamento = mysql_query("SELECT * FROM `equipamento` WHERE `id` = '$id'");
$stats = mysql_fetch_array($status_equipamento);
return $stats[status];
}
?>
<? 
function patio($id){
$status_equipamento = mysql_query("SELECT * FROM `patio` WHERE `ID_PATIO` = '$id'");
$stats = mysql_fetch_array($status_equipamento);
return $stats[NOME_PATIO];
}
?>
<? 
function dado_obra($id,$campo){
$status_equipamento = mysql_query("SELECT * FROM `obra` WHERE `id` = '$id' Limit 1");
$stats = mysql_fetch_array($status_equipamento);
return $stats[$campo];
}
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
<SCRIPT language=JavaScript src="grafico/graphs.js"></SCRIPT>


<?
function EnviaInicioDeObra($idObra){

$Sqla = mysql_query("SELECT o.contrato, o.cliente,o.endereco, p.NOME_PATIO FROM obra o inner join patio p on (p.ID_PATIO=o.patio) where o.id='".$idObra."' Limit 1;");
$sO = mysql_fetch_array($Sqla);

$Html = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
<title>[MAPAES] Inicio de Obra</title>
</head>
<style>
body{
font-family:Arial, Helvetica, sans-serif;
font-size:12px;
}
.style1 {color: #FFFFFF}
</style>
<body>
<table width="800" border="0" cellspacing="4" cellpadding="0">
  <tr>
    <td width="200">Contrato:</td>
    <td>'.$sO[contrato].'</td>
  </tr>
  <tr>
    <td>Cliente</td>
    <td>'.$sO[cliente].'</td>
  </tr>
  <tr>
    <td>Endereço</td>
    <td>'.$sO[endereco].'</td>
  </tr>
    <tr>
    <td>Patio Responsavel</td>
    <td>'.$sO[NOME_PATIO].'</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  </table>
  <table width="800" border="1" bordercolor="#000000" cellpadding="5" cellspacing="0">
  <tr>
    <td width="15%" height="30" bgcolor="#1f497d"><div align="center" class="style1">Família</div></td>
    <td width="15%" height="30" bgcolor="#1f497d"><div align="center" class="style1">Código</div></td>
    <td bgcolor="#1f497d"><div align="center" class="style1">Operador</div></td>
    <td bgcolor="#1f497d"><div align="center" class="style1">Acessório</div></td>
    <td width="15%" bgcolor="#1f497d"><div align="center" class="style1">Inicio</div></td>
    <td width="15%" bgcolor="#1f497d"><div align="center" class="style1">Horimetro</div></td>
  </tr>';
	$SqlObra = mysql_query("SELECT f.nome as NOMEFAMILIA, q.CODIGO as eqtoCodigo ,e.operador, o.nome as operadorNome, e.acessorio, a.CODIGO as acessorioCodigo, DATE_FORMAT(e.inicio,'%d/%m/%Y') as dtInicio, e.horimetro_ida FROM equipamento_obra e inner join equipamento q on (q.id=e.equipamento) left join familia f on (q.familia=f.id) left join acessorio a on (a.id=e.acessorio) left join operador o on (o.id=e.operador) where e.obra='".$idObra."';");
	while ($sE = mysql_fetch_array($SqlObra)){
	$cor = ($coralternada++ %2 ? "FFFFFF" : "FFFFDC");
	if($sE[operadorNome]==''){
		$sE[operadorNome]=$sE[operador];
	}
	if($sE[acessorioCodigo]==''){
		$sE[acessorioCodigo]=$sE[acessorio];
	}
		
$Html .= '
  <tr bgcolor="#'.$cor.'" height="20">
    <td><div align="center">'.$sE[NOMEFAMILIA].'</div></td>
	<td><div align="center">'.$sE[eqtoCodigo].'</div></td>
    <td><div align="center">'.$sE[operadorNome].'</div></td>
    <td><div align="center">'.$sE[acessorioCodigo].'</div></td>
    <td><div align="center">'.$sE[dtInicio].'</div></td>
    <td><div align="center">'.$sE[horimetro_ida].'</div></td>
  </tr>';	
	}
$Html .='</table></body></html>';
	
return $Html;
}

function gravaSml($idEqpto,$idStatus,$obs) {
$sqllog = mysql_query("INSERT INTO `statusmaquinalog` ( `idEquipamento` , `idStatus` , `obsSml` , `dtSml`) VALUES ('".$idEqpto."','".$idStatus."','".$obs."',NOW());");
}
function dataSql($data){
	$result = explode('/',$data); 
	return  $result[2]."-".$result[1]."-".$result[0];
}
function CalculaDias($tipo,$dt,$dias){

	
	$d = explode('/',$dt); 
	if($tipo=='D'){
		$Data = date("Y-m-d",mktime (0,0,0,$d[1],$d[0]+$dias,$d[2]));
	}
	if($tipo=='M'){
		$Data = date("Y-m-d",mktime (0,0,0,$d[1]+$dias,$d[0],$d[2]));
	}
	if($tipo=='A'){
		$Data = date("Y-m-d",mktime (0,0,0,$d[1],$d[0],$d[2]+$dias));
	}
	return $Data;
	
}
?>