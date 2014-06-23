<? include ("verifica.php") ?>
<html>
<head>
<title>:. HostAdmin v.2 - Tela inicial .:</title>
<meta http-equiv='content-type' content='text/html; charset=iso-8859-1'>
<link rel='StyleSheet' href='temas/include/estilos.css' type='text/css'>
<script language='JavaScript' src='temas/include/js/coolmenus4.js'></script>
<script language='JavaScript' src='temas/include/js/stm31.js'></script>
<script language='JavaScript' src='temas/include/js/menu2.js'></script>
<script type="text/javascript" src="open-flash-chart/js/swfobject.js"></script>

</head>
<body bgcolor='#ffffff' leftmargin='0' topmargin='0' marginwidth='0' marginheight='0'>
<center>
<script language='javascript' src='include/ordena.js'></script><script language='javascript' src='include/dataform.js'></script><div id='dek'></div><script language='javascript' src='include/hint.js'></script>
<table border='0' cellpadding='0' cellspacing='0' width='774' background='temas/imagens/fundo.gif'>
<tr>
<td colspan='5'>
<img src='temas/imagens/topo.gif' width='774' height='92' border='0' alt=''></td>
</tr>
<tr>
<td><img src='temas/imagens/esqbt.gif' width='5' height='53' border='0'></td>
<td><img src='temas/imagens/fundobt.gif' width='2' height='53' border='0'></td>
<td>
<script language='JavaScript' src='temas/include/js/menu.js'></script>
</td><tr>
<td colspan='5'>
<img src='temas/imagens/topobaixo.gif' width='774' height='23' border='0' alt=''></td>
</tr>
<tr>
<td colspan='5'>
<center>
<script type="text/javascript" src="http://www.ajtrichards.co.uk/heartbeat/js/jquery.js"></script>
<SCRIPT language=Javascript>
function mOvr(src,clrOver) {if (!src.contains(event.fromElement)) {src.style.cursor = 'hand';
src.bgColor = clrOver;
}}
function mOut(src,clrIn) {if (!src.contains(event.toElement)) {src.style.cursor = 'default';
src.bgColor = clrIn;

}}

function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}

var loadingImage = '<center><img src="http://www.ajtrichards.co.uk/heartbeat/images/loading.gif" border="0" /><br/>Loading Data</center>';

function getUrl(obj,type){
	$("#mainContent").empty();
	$("#mainContent").append(loadingImage);
		if(type==1)
		{
			var address = obj;
		} else {
			var address = obj.href;
		}
		
		
	$.ajax({
		url: address,
		dataType: "html",
		type: "GET",
		cache: false,
		error: function(e){
			$("#mainContent").empty();
			$("#mainContent").append("<B>Application Error</B><br/>Unfortunately a fatal error has been encountered and the script cannot continue.<br/><br/>Please try again.");
			return;
		},
		success: function(data){
			$("#mainContent").empty();
			$("#mainContent").append(data);
			return;
		}
	});
}
function ListAtivo(varAtivo)
{

	getUrl('arrayAtivo.php?Ativo='+varAtivo,'1');
}
function AbreGrafico(id,type)
{	
    tmp = findSWF("ofc");
    x = tmp.reload("Grafico_loadStatus.php?type="+type+"&id="+id);
}


function findSWF(movieName) {
  if (navigator.appName.indexOf("Microsoft")!= -1) {
    return window[movieName];
  } else {
    return document[movieName];
  }
}


</SCRIPT>


<center>
<table border='0' width='700' cellspacing='0' cellpadding='3'>
<tr>
<td width='345' validn='middle' bgcolor="#FF0000" height="17">
<b><font color="#FFFFFF" face="Verdana">&nbsp;Consulta de Equipamentos</font></b>
</td>
<td width="10"></td>
<td width='345' validn='middle' bgcolor="#FF0000" height="17">
<b><font color="#FFFFFF" face="Verdana">&nbsp;Visão geral da frota</font></b>
</td>
</tr>
<tr>
<td>
<table onDblClick="alert(this.innerHTML);">
<tr>
<td validn='middle'>
<font class=font-10><span class=font-vinho>Familia Master</span></font>
</td>
</tr>
<tr>
<td>
    <select size="1" name="FAMILIA" class="form-especial" onChange="if(options[selectedIndex].value) getUrl(options[selectedIndex],'0')">
        <? 
        $SqlFMaster = mysql_query("SELECT * FROM familia_master");
        while ($sM = mysql_fetch_array($SqlFMaster)){ ?>
                <option value="<?=$sM[id] ?>" href="arrayFamilia.php?ID=<?=$sM[id] ?>" onClick="getUrl(this);"><?=$sM[nome] ?></option>
        <? } ?>
        </select>
        <div id="mainContent" style="width:400px;">
  
  </div>
</td>
</tr>
</table>

</td>
<td></td>
<td onDblClick="alert(this.innerHTML);">
<div id="chart"></div>
<script type="text/javascript">
var so = new SWFObject("open-flash-chart/actionscript/open-flash-chart.swf", "ofc", "250", "150", "9", "#FFFFFF");
so.addVariable("data", "http://mapaes.escad.com.br/Grafico_loadStatus.php");
so.addParam("allowScriptAccess", "always" );//"sameDomain");
so.write("chart");
</script>

</td>
</table>
<br>
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="90%" id="AutoNumber1" height="30">
  <tr>
    <td width="100%" bgcolor="#FF0000" height="17">&nbsp;<b><font color="#FFFFFF" face="Verdana">Obras por Pátio</font></b></td>
  </tr>

  <tr>
    <td width="100%" height="13">
    <table border='0' width='100%'  cellpadding='0'>
  <tr>
<td bgcolor='#F0F0F0'><font class='font-10'>&nbsp;Pátio:</font></td>
<td bgcolor='#F0F0F0'><font class='font-10'><center>OBRAS EM ANDAMENTO</center></font></td>
<td bgcolor='#F0F0F0'><font class='font-10'><center>EQPTO EM OBRA</center></font></td></tr>

  <?
$noticia = mysql_query("SELECT * FROM patio order by NOME_PATIO");
$notician = mysql_num_rows($noticia);
while ($dom = mysql_fetch_array($noticia)){ 
$cor = ($coralternada++ %2 ? "FFFFFF" : "FFFFDC");
?>
<tr>
<td bgcolor='<? echo $cor ?>'><font class='font-10'>&nbsp;<? echo $dom[NOME_PATIO] ?></font></td>
<?
$novon = '';
$novo = @mysql_query("SELECT * FROM `obra` WHERE status = 'a' And `patio` = '$dom[ID_PATIO]'");
$novon=@mysql_num_rows($novo);
$total = $total + $novon;
?>
<td bgcolor='<? echo $cor ?>'><font class='font-10'><center><a target="_blank" href="RelatorioPatioObra.php?Patio=<? echo $dom[ID_PATIO] ?>"><? echo $novon ?></a></center></font></td>
<?
$Enovon = '';
$Enovo = @mysql_query("SELECT * FROM `equipamento_obra` WHERE `PATIO` = '$dom[ID_PATIO]' And status = 'a'");
$Enovon=@mysql_num_rows($Enovo);
$Etotal = $Etotal + $Enovon;
?>
<td bgcolor='<? echo $cor ?>'><font class='font-10'><center><a target="_blank" href="RelatorioPatioEqpto.php?Patio=<? echo $dom[ID_PATIO] ?>"><? echo $Enovon ?></a></center></font></td>
</tr>  
<? } ?>
<tr>
<td bgcolor='#F0F0F0'><font class='font-10'>&nbsp;Total:</font></td>
<td bgcolor='#F0F0F0' align="center"><? echo $total ?></td>
<td bgcolor='#F0F0F0' align="center"><? echo $Etotal ?></td></tr>
</table>
<br>
<center>
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="90%" id="AutoNumber1" height="30">
  <tr>
    <td width="100%" bgcolor="#FF0000" height="17">&nbsp;<b><font color="#FFFFFF" face="Verdana">Estatisticas 
    de Acessório</font></b></td>
  </tr>
  <tr>
    <td width="100%" height="13">
    <table border='0' width='100%'  cellpadding='0'>
<? 
$astatus = mysql_query("SELECT * FROM status order by ordem, nome");
$astatusn = mysql_num_rows($astatus);
if (!$astatus){
?>Problemas na conexão<?
}
else{ 
if ($astatusn==0){
?>
Nada Consta
<? } else{?>
  <tr>
<td bgcolor='#F0F0F0'><font class='font-10'>&nbsp;Família:</font></td>
<? while ($staa = mysql_fetch_array($astatus)){ ?><td bgcolor='#F0F0F0'><font class='font-10'><center><? echo $staa[letra] ?></center></font></td><? } ?>  </tr>
  <? } } ?>
<? 
$noticia = mysql_query("SELECT * FROM familia_acessorio");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conexão<?
}
else{
if ($notician==0){
?>Nada Consta<? } else { ?>
<? while ($dom = mysql_fetch_array($noticia)){ ?> 
<? $cor = ($coralternada++ %2 ? "FFFFFF" : "FFFFDC"); ?> 
<? 
$astatus = mysql_query("SELECT * FROM status order by ordem, nome");
$astatusn = mysql_num_rows($astatus);
if (!$astatus){
?>Problemas na conexão<?
}
else{ 
if ($astatusn==0){
?>
Nada Consta
<? } else{?>
  <tr>
<td onMouseOver="mOvr(this,'#00FF00');" onMouseOut="mOut(this,'<? echo $cor ?>');" bgcolor='<? echo $cor ?>'><font class='font-10'>&nbsp;<? echo $dom[nome] ?>:</font></td>
<? while ($staa = mysql_fetch_array($astatus)){ ?>
<td bgcolor='<? echo $cor ?>' onMouseOver="mOvr(this,'#00FF00');" onMouseOut="mOut(this,'<? echo $cor ?>');">
<font class='font-10'><center><? familia_acessorio($dom[id],$staa[id]) ?></font></td><? } ?>  </tr>
  <? } } ?>
<? } } } ?>
<? 
$astatus = mysql_query("SELECT * FROM status order by ordem, nome");
$astatusn = mysql_num_rows($astatus);
if (!$astatus){
?>Problemas na conexão<?
}
else{ 
if ($astatusn==0){
?>
Nada Consta
<? } else{?>
  <tr>
<td bgcolor='#F0F0F0'><font class='font-10'>&nbsp;Total:</font></td>
<? while ($staa = mysql_fetch_array($astatus)){ ?>
<td bgcolor='#F0F0F0'>
<font class='font-10'>
<center>
<?
$tudo = @mysql_query("SELECT * FROM acessorio where `excluido` != 's'");
$todon=@mysql_num_rows($tudo);
?>
<?
$novo = @mysql_query("SELECT * FROM acessorio where status = '$staa[id]' And `excluido` != 's'");
$novon=@mysql_num_rows($novo);
?>
<? echo $novon ?></center></font></td><? } ?>  </tr>
  <? } } ?>
</table>
<center>
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="200" id="AutoNumber1">
  <tr>
<?
$novo = @mysql_query("SELECT * FROM acessorio where ativo = 'o' And `excluido` != 's'");
$novon=@mysql_num_rows($novo);
?>
    <td width="100%"><font face="Verdana" size="2">Frota Operando..........: <SCRIPT language=JavaScript> <!--
document.write(bar_graph('pBar', '<? echo $novon ?>;<? echo $todon ?>'));

//--> </SCRIPT></font></td>
  </tr>
  <tr>
<?
$novo = @mysql_query("SELECT * FROM acessorio where ativo = 'd' And `excluido` != 's'");
$novon=@mysql_num_rows($novo);
?>
    <td width="100%"><font face="Verdana" size="2">Frota Disponível..........: 
    <SCRIPT language=JavaScript> <!--
document.write(bar_graph('pBar', '<? echo $novon ?>;<? echo $todon ?>'));

//--> </SCRIPT></font></td>
  </tr>
  <tr>
<?
$novo = @mysql_query("SELECT * FROM acessorio where ativo = 'm' And `excluido` != 's'");
$novon=@mysql_num_rows($novo);
?>
    <td width="100%"><font face="Verdana" size="2">Frota em Manutenção..: <SCRIPT language=JavaScript> <!--
document.write(bar_graph('pBar', '<? echo $novon ?>;<? echo $todon ?>'));

//--> </SCRIPT></font></td>
  </tr>
    <tr>
<?
$novo = @mysql_query("SELECT * FROM acessorio where ativo = 'b' And `excluido` != 's'");
$novon=@mysql_num_rows($novo);
?>
    <td width="100%"><font face="Verdana" size="2">Frota em Observação..: <SCRIPT language=JavaScript> <!--
document.write(bar_graph('pBar', '<? echo $novon ?>;<? echo $todon ?>'));

//--> </SCRIPT></font></td>
  </tr>
</table>
</center>
<br>
<center>
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="600" id="AutoNumber1">
  <tr>
    <td width="285" bgcolor="#EFEFEF" style="border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="2" color="#FF0000">&nbsp;Ação</font></td>
    <td width="179" bgcolor="#EFEFEF" style="border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="2" color="#FF0000">&nbsp;Data</font></td>
    <td width="136" bgcolor="#EFEFEF" style="border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="2" color="#FF0000">&nbsp;Hora</font></td>
  </tr>
<?
$noticia = mysql_query("SELECT * FROM log order by id desc LIMIT 5");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conexão<?
}
else{
if ($notician==0){
?>
<table border='0' width='730' cellspacing='1' cellpadding='0'>
<tr>
<td width='730' validn='middle' colspan='7'>
<img src='imagens/layout_seta.gif' width="15" height="9"><b class=font-10>Visualizar status</b><br>&nbsp;
</td>
</tr>
<tr>
<td width='730' bgcolor='#FFFFFF' colspan='5'><font class=font-11><span class=font-azul><center>não existe nenhum categoria para está consulta</center></span></font></td>
</tr>
</table>
<?
}else {
?>
<? while ($dom = mysql_fetch_array($noticia)){ 
$cor = ($coralternada++ %2 ? "FFFFFF" : "FFFFDC");
?>
  <tr>
    <td width="285" style="border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="1">&nbsp;<? echo $dom[acao] ?></font></td>
    <td width="179" style="border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="1">&nbsp;<? data($dom[data]) ?></font></td>
    <td width="136" style="border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
    <font face="Verdana" size="1">&nbsp;<? echo $dom[hora] ?></font></td>
  </tr>
<? } } } ?>
</table>
</center>
</td>
  </tr>
</table>
</center>

</td>
</tr>
<tr>
<td colspan='5' height='4'><br><center><span class='font-09'>© 2004 Cohrion do Brasil. Todos os direitos reservados.</span></center><br></td>
</tr>

</table>
</center>
</body>
</html>