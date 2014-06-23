<? include ("verifica.php") ?>
<html>
<head>
<title>:. HostAdmin v.2 - Tela inicial .:</title>
<meta http-equiv='content-type' content='text/html; charset=iso-8859-1'>
<link rel='StyleSheet' href='temas/include/estilos.css' type='text/css'>
<link rel="stylesheet" href="js/ui.tabs.css" type="text/css" media="print, projection, screen">
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
<?
if($login_id=='6'){?>
<img src='temas/imagens/topo_grace.gif' width='774' height='92' border='0' alt=''>
<? } else {?>
<img src='temas/imagens/topo.gif' width='774' height='92' border='0' alt=''>
<? } ?>
</td>
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
<script type="text/javascript" src="js/jquery-1.2.3.pack.js"></script>

<script src="js/ui.tabs.pack.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery.tablehover.js"></script>
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
function getUrl(obj){
$("#mainContent").empty();
$("#mainContent").append(loadingImage);
var address = obj;
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
<? if($LoginTipo!='V'){?>
$('#container-1 > ul').tabs('select', 3);
<? } else {?>
$('#container-1 > ul').tabs('select', 2);
<? } ?>
return;
}
});
}
function HoverCellTabela()
{
	$('#tableFamilia').tableHover({colClass: 'hover', cellClass: 'hovercell',ignoreCols: [1]});
}
function ListAtivo(varAtivo)
{
getUrl('arrayAtivo.php?Ativo='+varAtivo,'1');
}
function ListAtivoAcessorio(varAtivo)
{
getUrl('arrayAtivoAcessorio.php?Ativo='+varAtivo,'1');
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
$(function() {
                $('#container-1 > ul').tabs();
			});
</SCRIPT>

<div id="container-1" style="width:720px">
            <ul>
                <? if($LoginTipo!='V'){?><li><a href="#index"><span>Geral</span></a></li><? } ?>
                <li><a href="arrayFamiliaMaster.php"><span>Família</span></a></li>
                <li><a href="arrayGaragem.php"><span>Garagem</span></a></li>
                <li><a href="#fragment-2"><span>Resultado</span></a></li>
                <li><a href="arrayAcessorio.php"><span>Acessório</span></a></li>
                <li><a href="Filtro.php"><span>Filtro</span></a></li>
            </ul>
        <? if($LoginTipo!='V'){?>
        <div id="index">
        <table>
        <tr>
        <td>         
        <div id="chart1"></div>
        </td><td>
        <div id="chart"></div>
        </td>
        </tr>
        <tr>
        <td>            
        <div id="chart3"></div>
        </td><td>
        <div id="chart4"></div>
        </td>
        </tr>
        </table>
        <script type="text/javascript">
        var so = new SWFObject("open-flash-chart/actionscript/open-flash-chart.swf", "ofc1", "450", "150", "9", "#FFFFFF");
        so.addVariable("data", "Grafico_loadStatus7dias.php");
        so.addParam("allowScriptAccess", "always" );//"sameDomain");
		so.addParam("wmode","transparent");
        so.write("chart1");
        
        var so = new SWFObject("open-flash-chart/actionscript/open-flash-chart.swf", "ofc", "250", "150", "9", "#FFFFFF");
        so.addVariable("data", "Grafico_loadStatus.php");
        so.addParam("allowScriptAccess", "always" );//"sameDomain");
		so.addParam("wmode","transparent");
        so.write("chart");
        
        var so = new SWFObject("open-flash-chart/actionscript/open-flash-chart.swf", "ofc1", "450", "150", "9", "#FFFFFF");
        so.addVariable("data", "Grafico_loadStatus7diasAcessorio.php");
        so.addParam("allowScriptAccess", "always" );//"sameDomain");
		so.addParam("wmode","transparent");
        so.write("chart3");
        
        var so = new SWFObject("open-flash-chart/actionscript/open-flash-chart.swf", "ofc", "250", "150", "9", "#FFFFFF");
        so.addVariable("data", "Grafico_loadStatusAcessorio.php");
        so.addParam("allowScriptAccess", "always" );//"sameDomain");
		so.addParam("wmode","transparent");
        so.write("chart4");
        </script>
        </div>
		<? } ?>

    <div id="fragment-2">
        <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber1" height="30">
        <tr>
        <td width="100%" bgcolor="#FF0000" colspan="6" height="17">&nbsp;<b><font color="#FFFFFF" face="Verdana">Visão da Famlia</font></b></td>
        </tr>
        </table>
        <div id="mainContent" style="width:100%"></div>
        </div>
</div>

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
<tr>
<td colspan='5' height='4'><br><center><span class='font-09'>© 2004 - <?=date("Y")?> Cohrion do Brasil. Todos os direitos reservados.</span></center><br></td>
</tr>
<tr>
<td colspan='5' height='4' bgcolor='#B6B6B6'><img border='0' src='temas/imagens/spacer.gif' width='1' height='1'></td>
</tr>
</table>
</center>

</body>
</html>
