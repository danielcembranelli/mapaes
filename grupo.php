<? include("verifica.php");?>
<html>
<head>
<title>:. HostAdmin v.2 - Tela de clientes .:</title>
<meta http-equiv='content-type' content='text/html; charset=iso-8859-1'>
<link rel='StyleSheet' href='temas/include/estilos.css' type='text/css'>
<script language='JavaScript' src='temas/include/js/coolmenus4.js'></script>
<script language='JavaScript' src='temas/include/js/stm31.js'></script>
<script language='JavaScript' src='temas/include/js/menu2.js'></script>
</head>
<body bgcolor='#ffffff' leftmargin='0' topmargin='0' marginwidth='0' marginheight='0'>
<center>
<table border='0' cellpadding='0' cellspacing='0' width='774' background='temas/imagens/fundo.gif'>
<tr>
<td colspan='5'><img src='temas/imagens/topo.gif' width='774' height='92' border='0' alt=''></td>
</tr>
<tr>
<td><img src='temas/imagens/esqbt.gif' width='5' height='53' border='0'></td>
<td><img src='temas/imagens/fundobt.gif' width='2' height='53' border='0'></td>
<td>
<script language='JavaScript' src='temas/include/js/menu.js'></script>
</td><tr>
<td colspan='5'><img src='temas/imagens/topobaixo.gif' width='774' height='23' border='0' alt=''></td>
</tr>
<tr>
<td colspan='5'>
<script language='javascript' src='include/ordena.js'></script><script language='javascript' src='include/dataform.js'></script><div id='dek'></div><script language='javascript' src='include/hint.js'></script><br><div align='center'>
<? if($modulo==criar){?>
<table border='0' width='600' cellspacing='1' cellpadding='0'>
<tr>
<td width='600' validn='middle'>
<img src='imagens/layout_seta.gif' width="15" height="9"><b class=font-10>Adicionar grupo</b><br>&nbsp;
</td>
</tr>
<form method='POST' action='grupo.php'>
<input type='hidden' name='modulo' value='criado'>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>sigla :</span></font></td>
</tr>
<tr>
<td width='600'>
<input type='text' name='sigla' size='2' maxlength='1' class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover'></td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>cor :</span></font></td>
</tr>
<tr>
<td width='600'>
  <select size="1" name="cor">
  <option style="color: #000000; background-color: #3399FF">#3399FF</option>
  <option style="color: #000000; background-color: #3366CC">#3366CC</option>
  <option style="color: #000000; background-color: #000099">#000099a</option>
  <option style="color: #000000; background-color: #990099">#990099</option>
  <option style="color: #000000; background-color: #FF0033">#FF0033</option>
  
  <option style="color: #000000; background-color: #CC0000">#CC0000</option>
  <option style="color: #000000; background-color: #FF6600">#FF6600</option>
  <option style="color: #000000; background-color: #FF9900">#FF9900</option>
  <option style="color: #000000; background-color: #FFFF00">#FFFF00</option>
  <option style="color: #000000; background-color: #99FF00">#99FF00</option>
  
  <option style="color: #000000; background-color: #33CC00">#33CC00</option>
  <option style="color: #000000; background-color: #009900">#009900</option>
  <option style="color: #000000; background-color: #009999">#009999</option>  
  
  </select>
</tr>

<tr>
<td width='600'><font class=font-10>&nbsp;</font></td>
</tr>
<tr>
<td width='600'><input type='image' src='imagens/layout_btcadastrar.gif' width='54' height='16' border='0'></td>
</tr>
</form>
</table>
<? } elseif($modulo==criado){?>
<?
$sql = mysql_query ("INSERT INTO grupo (sigla,cor) VALUES ('$sigla','$cor');");
if (!$sql){
echo "N�o foi possivel a consulta.";}
else{
?>
<table border='0' width='600' cellspacing='1' cellpadding='0'>
<tr>
<td width='600'><center><font class=font-10><b class=font-vinho><br> O grupo foi adicionado com sucesso!<br><br></b>
</font></center></td>
</tr>
<script>window.setTimeout('changeurl();',2000); function changeurl(){window.location='index.php';}</script></table><? } ?>
<? } elseif($modulo==editar){?>
<?
$noticia = mysql_query("SELECT * FROM grupo where id = '$id'");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conex�o<?
}
else{
if ($notician==0){
?>
<table border='0' width='730' cellspacing='1' cellpadding='0'>
<tr>
<td width='730' validn='middle' colspan='7'>
<img src='imagens/layout_seta.gif' width="15" height="9"><b class=font-10>Visualizar grupo</b><br>&nbsp;
</td>
</tr>
<tr>
<td width='730' bgcolor='#FFFFFF' colspan='5'><font class=font-11><span class=font-azul><center>n�o existe nenhum grupo para est� consulta</center></span></font></td>
</tr>
</table>
<?
}else {
?>
<? while ($dom = mysql_fetch_array($noticia)){ ?>
<table border='0' width='600' cellspacing='1' cellpadding='0'>
<tr>
<td width='600' validn='middle'>
<img src='imagens/layout_seta.gif' width="15" height="9"><b class=font-10>Editar grupo</b><br>&nbsp;
</td>
</tr>
<form method='POST' action='familia.php'>
<input type='hidden' name='modulo' value='editado'>
<input type='hidden' name='id' value='<? echo $dom[id] ?>'>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>nome:</span></font></td>
</tr>
<tr>
<td width='600'>
<input type='text' name='nome' size='50' maxlength='150' value="<? echo $dom[nome] ?>" class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover'></td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>grupo:</span></font></td>
</tr>
<tr>
<td width='600'>
<input type='text' name='grupo' size='50' maxlength='150' value="<? echo $dom[grupo] ?>" class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover'></td>
</tr>
<tr>
<td width='600'><font class=font-10>&nbsp;</font></td>
</tr>
<tr>
<td width='600'><input type='image' src='imagens/layout_bteditar.gif' width='54' height='16' border='0'></td>
</tr>
</form>
</table>
<? } } } ?>
<? } elseif($modulo==editado){?>
<?

 
include ("config.php");
$sql = mysql_query("UPDATE familia SET nome='$nome' WHERE id='$id' LIMIT 1;");
if (!$sql){
echo "N�o foi possivel a consulta.";}
else{
?>
<table border='0' width='600' cellspacing='1' cellpadding='0'>
<tr>
<td width='600'><center><font class=font-10><b class=font-vinho><br> A fam�lia foi atualizada com sucesso!<br><br></b>
</font></center></td>
</tr>
<script>window.setTimeout('changeurl();',2000); function changeurl(){window.location='index.php';}</script></table><? } ?>

<? } elseif($modulo==buscar){?>
<?
$noticia = mysql_query("SELECT * FROM grupo order by sigla");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conex�o<?
}
else{
if ($notician==0){
?>
<table border='0' width='730' cellspacing='1' cellpadding='0'>
<tr>
<td width='730' validn='middle' colspan='7'>
<img src='imagens/layout_seta.gif' width="15" height="9"><b class=font-10>Visualizar categoria</b><br>&nbsp;
</td>
</tr>
<tr>
<td width='730' bgcolor='#FFFFFF' colspan='5'><font class=font-11><span class=font-azul><center>n�o existe nenhuma fam�lia para est� consulta</center></span></font></td>
</tr>
</table>
<?
}else {
?>
<table border='0' width='730' cellspacing='1' cellpadding='0'>
<td width='730' validn='middle' colspan='7'>
<img src='imagens/layout_seta.gif' width="15" height="9"><b class=font-10>Visualizar categoria</b><br>&nbsp;
</td>
</tr>
<tr bgcolor='#EFEFEF'>
<td width='30'><b class=font-12><center><span class=font-preto>#</span></center></b></td>
<td width='140'><b class=font-12><span class=font-preto><center>A��o</center></span></b></td>
<td width='560'><b class=font-12>&nbsp;<span class=font-preto>Nome</span></b></td>

</tr>
<? while ($dom = mysql_fetch_array($noticia)){
$cor = ($coralternada++ %2 ? "FFFFFF" : "FFFFDC");
?>
<tr bgcolor='<? echo $cor ?>'>
<td width='30'><font class=font-11><span class=font-cinza-1><center><? echo $dom[id]?></center></span></font></td>
<td width='140'><center><font class=font-11><a href='?modulo=confirmadel&id=<? echo $dom[id]?>'><img src='imagens/layout_btexcluir.gif' width='54' height='16' border='0'></a>&nbsp;<a href='?modulo=editar&id=<? echo $dom[id]?>'><img src='imagens/layout_bteditar.gif' width='54' height='16' border='0'></a></font></center></td>
<td width='560'><font class=font-11><span class=font-cinza-1>&nbsp;<? echo $dom[sigla]?></span></font></td>

</tr>
<? } ?>

<tr>
<td width='730' colspan='5'><br><font class=font-11><center>
<p></p>
</center></table></font>
<? } } ?>
<? } elseif($modulo==confirmadel){?>
<table border='0' width='700' cellspacing='1' cellpadding='0'>
<tr>
<td width='700'><center><font class=font-10><b class=font-vinho><br> Voc� tem certeza que desej� excluir esta familia?<br><br></b>
<form method='POST' action='familia.php'>
<tr><td>
<p><center><input type='image' src='imagens/layout_btsim.gif' width='54' height='16'>
<a href='?modulo=visualizar'><img border='0' src='imagens/layout_btnao.gif' width='54' height='16'></a></p>
<input type='hidden' name='modulo' value='delete'><input type='hidden' name='id' value='<? echo $id ?>'>
</form>
</font></center></td>
</tr>
</table>

<? } elseif($modulo==delete){?>
<?
$sql = mysql_query("DELETE FROM familia WHERE id='$id' LIMIT 1;");
if (!$sql){
echo "N�o foi possivel a consulta.";}
else{
?>
<table border='0' width='700' cellspacing='1' cellpadding='0'>

<tr>
<td width='700'><center><font class=font-10><b class=font-vinho><br> A fam�lia foi excluida com sucesso!<br><br></b>
</font></center></td>
</tr>
<script>window.setTimeout('changeurl();',2000); function changeurl(){window.location='index.php';}</script></table>

<? } ?>


<? } else{?>
<script>window.setTimeout('changeurl();',1); function changeurl(){window.location='index.php';}</script>
<?}?>
</div>
</td>
</tr>
<tr>
<td colspan='5' height='4'><br><center><span class='font-09'>� 2004 Cohrion do Brasil. Todos os direitos reservados.</span></center><br></td>
</tr>
<tr>
<td colspan='5' height='4' bgcolor='#B6B6B6'><img border='0' src='temas/imagens/spacer.gif' width='1' height='1'></td>
</tr>
</table>
</center>
</body>
</html>