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
<td colspan='5'><?
if($login_id=='6'){?>
<img src='temas/imagens/topo_grace.gif' width='774' height='92' border='0' alt=''>
<? } else {?>
<img src='temas/imagens/topo.gif' width='774' height='92' border='0' alt=''>
<? } ?></td>
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
<img src='imagens/layout_seta.gif' width="15" height="9"><b class=font-10>Adicionar acessorio</b><br>&nbsp;
</td>
</tr>
<form method='POST' action='acessorio.php'>
<input type='hidden' name='modulo' value='criado'>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>fam�lia :</span></font></td>
</tr>
<tr>
<td width='600'>
<select size="1" name="familia" class=form-especial>
<? 
$noticia = mysql_query("SELECT * FROM familia_acessorio");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conex�o<?
}
else{
if ($notician==0){
?>Nada Consta<? } else { ?><? while ($dom = mysql_fetch_array($noticia)){ ?>
			<option  value="<? echo $dom[id] ?>"><? echo $dom[nome] ?></option>
			<?  } } } ?>
          </select>
</td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>marca :</span></font></td>
</tr>
<tr>
<td width='600'>
<input type='text' name='marca' size='20' maxlength='30' class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover'></td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>modelo :</span></font></td>
</tr>
<tr>
<td width='600'>
<input type='text' name='modelo' size='20' maxlength='150' class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover'></td>
</tr
><tr>
<td width='600'><font class=font-10><span class=font-vinho>s�rie/chassi :</span></font></td>
</tr>
<tr>
<td width='600'>
<input type='text' name='seriechassi' size='60' maxlength='150' class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover'></td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>c�digo :</span></font></td>
</tr>
<tr>
<td width='600'>
<input type='text' name='codigo' size='40' maxlength='30' class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover'></td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>ano de fabrica��o :</span></font></td>
</tr>
<tr>
<td width='600'>
<input type='text' name='ano' size='6' maxlength='4' class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover'></td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>status inicial :</span></font></td>
</tr>
<tr>
<td width='600'>
<select size="1" name="status" class=form-especial>
<? 
$noticia = mysql_query("SELECT * FROM status");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conex�o<?
}
else{
if ($notician==0){
?>Nada Consta<? } else { ?><? while ($dom = mysql_fetch_array($noticia)){ ?>
			<option  value="<? echo $dom[id] ?>#<? echo $dom[ativo] ?>"><? echo $dom[nome] ?></option>
			<?  } } } ?>
          </select>
</td>
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
$data=("Y-m-d");
$result = explode('#',$status);
$sql = mysql_query ("INSERT INTO `acessorio` ( `id` , `familia` , `marca` , `modelo` , `seriechassi` , `codigo` , `ano` , `status` , `ativo`, `data` ) 
VALUES (
'', '$familia', '$marca', '$modelo', '$seriechassi', '$codigo', '$ano', '$result[0]', '$result[1]', '$data');");
if (!$sql){
echo "N�o foi possivel a consulta.";}
else{
?>
<table border='0' width='600' cellspacing='1' cellpadding='0'>
<tr>
<td width='600'><center><font class=font-10><b class=font-vinho><br> O acessorio <? echo $codigo ?> foi adicionado com sucesso!<br><br></b>
</font></center></td>
</tr>
<script>window.setTimeout('changeurl();',2000); function changeurl(){window.location='index.php';}</script></table><? } ?>
<? } elseif($modulo==editar){?>
<?
$noticia = mysql_query("SELECT * FROM acessorio where id = '$id'");
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
<img src='imagens/layout_seta.gif' width="15" height="9"><b class=font-10>Visualizar acessorio</b><br>&nbsp;
</td>
</tr>
<tr>
<td width='730' bgcolor='#FFFFFF' colspan='5'><font class=font-11><span class=font-azul><center>n�o existe nenhum acessorio para est� consulta</center></span></font></td>
</tr>
</table>
<?
}else {
?>
<? while ($dom = mysql_fetch_array($noticia)){ ?>
<table border='0' width='600' cellspacing='1' cellpadding='0'>
<tr>
<td width='600' validn='middle'>
<img src='imagens/layout_seta.gif' width="15" height="9"><b class=font-10>Editar acessorio</b><br>&nbsp;
</td>
</tr>
<form method='POST' action='acessorio.php'>
<input type='hidden' name='modulo' value='editado'>
<input type='hidden' name='id' value='<? echo $dom[id] ?>'>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>fam�lia :</span></font></td>
</tr>
<tr>
<td width='600'>
<select size="1" name="familia" class=form-especial>
<? 
$fnoticia = mysql_query("SELECT * FROM familia_acessorio");
$fnotician = mysql_num_rows($fnoticia);
if (!$fnoticia){
?>Problemas na conex�o<?
}
else{
if ($fnotician==0){
?>Nada Consta<? } else { ?><? while ($fdom = mysql_fetch_array($fnoticia)){ ?>
			<option  value="<? echo $fdom[id] ?>" <? if($fdom[id]==$dom[familia]){?>selected<? } else {}?>><? echo $fdom[nome] ?></option>
			<?  } } } ?>
          </select>
</td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>marca :</span></font></td>
</tr>
<tr>
<td width='600'>
<input type='text' name='marca' size='20' maxlength='30' class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover' value='<? echo $dom[marca] ?>'></td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>modelo :</span></font></td>
</tr>
<tr>
<td width='600'>
<input type='text' name='modelo' size='20' maxlength='150' class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover' value='<? echo $dom[modelo] ?>'></td>
</tr
><tr>
<td width='600'><font class=font-10><span class=font-vinho>s�rie/chassi :</span></font></td>
</tr>
<tr>
<td width='600'>
<input type='text' name='seriechassi' size='60' maxlength='150' class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover' value='<? echo $dom[seriechassi] ?>'></td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>c�digo :</span></font></td>
</tr>
<tr>
<td width='600'>
<input type='text' name='codigo' size='40' maxlength='30' class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover' value='<? echo $dom[codigo] ?>'></td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>ano :</span></font></td>
</tr>
<tr>
<td width='600'>
<input type='text' name='ano' size='6' maxlength='4' class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover' value='<? echo $dom[ano] ?>'></td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>status atual :</span></font></td>
</tr>
<tr>
<td width='600'>
<select size="1" name="status" class=form-especial>
<? 
$qnoticia = mysql_query("SELECT * FROM status");
$qnotician = mysql_num_rows($qnoticia);
if (!$qnoticia){
?>Problemas na conex�o<?
}
else{
if ($qnotician==0){
?>Nada Consta<? } else { ?><? while ($qdom = mysql_fetch_array($qnoticia)){ ?>
			<option  value="<? echo $qdom[id] ?>#<? echo $qdom[ativo] ?>" <? if($qdom[id]==$dom[status]){?>selected<? } else {}?>><? echo $qdom[nome] ?></option>
			<?  } } } ?>
          </select>
</td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>Obs :</span></font></td>
</tr>
<tr>
<td width='600'>
<input type='text' name='OBS' size='30' maxlength='90' class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover' value='<? echo $dom[OBS] ?>'></td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>Status :</span></font></td>
</tr>
<tr>
<td width='600'>
  <label>
  <input type="radio" name="Exc" <? if($dom[excluido]=='n'){?>checked<? } ?> id="radio" value="n">
  Ativa</label>&nbsp;<label>
  <input type="radio" name="Exc" <? if($dom[excluido]=='s'){?>checked<? } ?> id="radio1" value="s">
  Excluida</label></td>
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
$result = explode('#',$status);
$sql = mysql_query("UPDATE acessorio SET familia='$familia', marca='$marca', modelo='$modelo', seriechassi='$seriechassi',excluido='$Exc', codigo='$codigo', status='$result[0]', ativo='$result[1]', ano='$ano', OBS='$OBS' WHERE id='$id' LIMIT 1;");
if (!$sql){
echo "N�o foi possivel a consulta.";}
else{
?>
<table border='0' width='600' cellspacing='1' cellpadding='0'>
<tr>
<td width='600'><center><font class=font-10><b class=font-vinho><br> O equipamento <? echo $codigo ?> foi atualizado com sucesso!<br><br></b>
</font></center></td>
</tr>
<script>window.setTimeout('changeurl();',2000); function changeurl(){window.location='index.php';}</script></table><? } ?>

<? } elseif($modulo==buscar){?>


<?
$noticia = mysql_query("SELECT * FROM acessorio where `excluido` = '$_REQUEST[Status]'  order by codigo,familia");
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
<img src='imagens/layout_seta.gif' width="15" height="9"><b class=font-10>Visualizar acessorio</b><br>&nbsp;
</td>
</tr>
<tr>
<td width='730' bgcolor='#FFFFFF' colspan='5'><font class=font-11><span class=font-azul><center>n�o existe nenhum acessorio para est� consulta</center></span></font></td>
</tr>
</table>
<?
}else {
?>
<table border='0' width='730' cellspacing='1' cellpadding='0'>
<td width='730' validn='middle' colspan='7'>
<img src='imagens/layout_seta.gif' width="15" height="9"><b class=font-10>Visualizar acessorio</b><br>&nbsp;
</td>
</tr>
<tr bgcolor='#EFEFEF'>
<td width='30'><b class=font-12><center><span class=font-preto>#</span></center></b></td>
<td width='140'><b class=font-12><span class=font-preto><center>A��o</center></span></b></td>
<td width='440'><b class=font-12><span class=font-preto><center>C�digo</center></span></b></td>
<td width='120'><b class=font-12><span class=font-preto><center>Classica��o</center></span></b></td>
</tr>
<? while ($dom = mysql_fetch_array($noticia)){ 
$cor = ($coralternada++ %2 ? "FFFFFF" : "FFFFDC");
?>
<tr bgcolor='<? echo $cor ?>'>
<td width='30'><font class=font-11><span class=font-cinza-1><center><? echo $dom[id]?></center></span></font></td>
<td width='140'><center><font class=font-11><a href='?modulo=confirmadel&id=<? echo $dom[id]?>'><img src='imagens/layout_btexcluir.gif' width='54' height='16' border='0'></a>&nbsp;<a href='?modulo=editar&id=<? echo $dom[id]?>'><img src='imagens/layout_bteditar.gif' width='54' height='16' border='0'></a></font></center></td>
<td width='440'><font class=font-11><span class=font-cinza-1>&nbsp;<? echo $dom[codigo]?> - <? familiaacessorio($dom[familia]) ?></span></font></td>
<td width='120'><font class=font-11><span class=font-cinza-1><? status($dom[status]) ?></span></font></td>
</tr>
<? } ?>

<tr>
<td width='730' colspan='5'><br><font class=font-11><center>
<p></p>
</center></table></font>
<? } } ?>
<? } elseif($modulo==localiza){?>
<table border='0' width='730' cellspacing='1' cellpadding='0'>
<tr>
<td width='730' validn='middle' colspan='7'>
<img src='imagens/layout_seta.gif' width="15" height="9"><b class=font-10>Buscar equipamento </b><br>&nbsp;
</td>
</tr>
<tr>
<td width='730' bgcolor='#FFFFFF' colspan='5'><font class=font-11><span class=font-azul><center>equipamento: 
<select size="1" class=form-especial onChange="if(options[selectedIndex].value) window.location.href = (options[selectedIndex].value)">
<? 
$noticia = mysql_query("SELECT * FROM acessorio where `excluido` != 's' order by codigo");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conex�o<?
}
else{
if ($notician==0){
?>Nada Consta<? } else { ?><? while ($dom = mysql_fetch_array($noticia)){ ?>
			<option  value="acessorio.php?modulo=localiza&id=<? echo $dom[id] ?>&status=<? echo $dom[status] ?>&familia=<? echo $dom[familia] ?>&codigo=<? echo $dom[codigo] ?>"><? echo $dom[codigo] ?></option>
			<?  } } } ?>
          </select></center></span></font></td>
</tr>
</table>
<table border='0' width='730' cellspacing='1' cellpadding='0'>
<tr>
<td width='730' bgcolor='#FFFFFF' colspan='5'>
<br><font class=font-11><span class=font-azul><center>Status atual do acessorio:</span></font><? status($status) ?>
<br><font class=font-11><span class=font-azul><center>Equipamento:</span></font><? echo $codigo ?>
<br><font class=font-11><span class=font-azul><center>Familia :</span></font><? familiaacessorio($familia) ?></center></td>

</td>
</tr>
</table>
<?
$noticia = mysql_query("SELECT * FROM equipamento_obra where (`acessorio` = '$id') OR (`acessorio2` = '$id') order by id desc");
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
<img src='imagens/layout_seta.gif' width="15" height="9"><b class=font-10>Visualizar equipamento</b><br>&nbsp;
</td>
</tr>
<tr>
<td width='730' bgcolor='#FFFFFF' colspan='5'><font class=font-11><span class=font-azul><center>n�o existe nenhum equipamento para est� consulta</center></span></font></td>
</tr>
</table>
<?
}else {
?>
<table border='0' width='730' cellspacing='1' cellpadding='0'>
<td width='730' validn='middle' colspan='7'>
<br>
<img src='imagens/layout_seta.gif' width="15" height="9"><b class=font-10>Obras que este equipamento trabalho</b>&nbsp;
</td>
</tr>
<tr bgcolor='#EFEFEF'>
<td width='30'><b class=font-12><center><span class=font-preto>#</span></center></b></td>
<td width='580'><b class=font-12><span class=font-preto><center>Obra</center></span></b></td>
<td width='120'><b class=font-12><span class=font-preto><center>Data</center></span></b></td>
</tr>
<? while ($dom = mysql_fetch_array($noticia)){ 
$cor = ($coralternada++ %2 ? "FFFFFF" : "FFFFDC");
?>
<tr bgcolor='<? echo $cor ?>'>
<td width='30'><font class=font-11><span class=font-cinza-1><center><? echo $dom[id]?></center></span></font></td>
<td width='440'><font class=font-11><span class=font-cinza-1>&nbsp;<? obranome($dom[obra]) ?> - Operador: <?if($dom[operador]==cliente){?>Cliente<? } else {?><? operador($dom[operador]) ?><? } ?></span></font></td>
<td width='120'  <? if($dom[status]==b){?>OnMouseOver='popup_plus("<? data($dom[fim]) ?>")' OnMouseOut='kill()' <? } else {} ?>><font class=font-11><span class=font-cinza-1><center><? data($dom[inicio])  ?><center></span></font></td>
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
<td width='700'><center><font class=font-10><b class=font-vinho><br> Voc� tem certeza que desej� excluir este equipamento?<br><br></b>
<form method='POST' action='acessorio.php'>
<tr><td>
<p><center><input type='image' src='imagens/layout_btsim.gif' width='54' height='16'>
<a href='cobran�a.php?modulo=visualizar'><img border='0' src='imagens/layout_btnao.gif' width='54' height='16'></a></p>
<input type='hidden' name='modulo' value='delete'><input type='hidden' name='id' value='<? echo $id ?>'>
</form>
</font></center></td>
</tr>
</table>

<? } elseif($modulo==delete){?>
<?
$data=date("Y-m-d");
$sql = mysql_query("UPDATE acessorio SET dataexclusao='$data', excluido='s' WHERE id='$id' LIMIT 1;");
if (!$sql){
echo "N�o foi possivel a consulta.";}
else{
?>
<table border='0' width='700' cellspacing='1' cellpadding='0'>

<tr>
<td width='700'><center><font class=font-10><b class=font-vinho><br> O acessorio foi excluido com sucesso!<br><br></b>
</font></center></td>
</tr>
<script>window.setTimeout('changeurl();',2000); function changeurl(){window.location='index.php';}</script></table>
<? } ?>






<? } elseif($modulo==acha){?>


<?

$noticia = mysql_query("SELECT * FROM acessorio where `familia` = '$familia' And `status` = '$status' And `excluido` != 's'  order by codigo,familia");

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
<img src='imagens/layout_seta.gif' width="15" height="9"><b class=font-10>Visualizar acess�rio</b><br>&nbsp;
</td>
</tr>
<tr>
<td width='730' bgcolor='#FFFFFF' colspan='5'><font class=font-11><span class=font-azul><center>n�o existe nenhum equipamento para est� consulta</center></span></font></td>
</tr>
</table>
<?
}else {
?>
<table border='0' width='730' cellspacing='1' cellpadding='0'>
<td width='730' validn='middle' colspan='7'>
<img src='imagens/layout_seta.gif' width="15" height="9"><b class=font-10>Visualizar acess�rio</b><br>&nbsp;
</td>
</tr>
<tr bgcolor='#EFEFEF'>
<td width='30'><b class=font-12><center><span class=font-preto>#</span></center></b></td>
<td width='500'><b class=font-12><span class=font-preto><center>C�digo</center></span></b></td>
<td width='200'><b class=font-12><span class=font-preto><center>Classica��o</center></span></b></td>
</tr>
<? while ($dom = mysql_fetch_array($noticia)){ 
$cor = ($coralternada++ %2 ? "FFFFFF" : "FFFFDC");
?>
<tr bgcolor='<? echo $cor ?>'>
<td width='30'><font class=font-11><span class=font-cinza-1><center><? echo $dom[id]?></center></span></font></td>
<td width='500'><font class=font-11><span class=font-cinza-1>&nbsp;<center><? echo $dom[codigo]?> - <? familiaacessorio($dom[familia]) ?></center></span></font></td>
<td width='200'><font class=font-11><span class=font-cinza-1><center><? status($dom[status]) ?></center></span></font></td>
</tr>
<? if($dom[ativo]==o){?>
<tr bgcolor='<? echo $cor ?>'>
<td width='730'  colspan='4'><font class=font-11><span class=font-cinza-1><center><?
$anoticia = mysql_query("SELECT * FROM equipamento_obra where (`acessorio` = '$dom[id]') or (`acessorio2` = '$dom[id]') order by id desc LIMIT 1");
$anotician = mysql_num_rows($anoticia);
if (!$anoticia){
?>Problemas na conex�o<?
}
else{
if ($anotician==0){
}else {
?>
<? while ($adom = mysql_fetch_array($anoticia)){ ?>

<font class=font-11><span class=font-cinza-1>&nbsp;<? if($adom[status]==a){?><b><font color="#FF0000">Obra em andamento:</font><? } else {}?><? obranome($adom[obra]) ?> - Operador: <?if($adom[operador]==cliente){?>Cliente<? } else {?><? operador($adom[operador]) ?><? } ?><? if($adom[status]==a){?></b><? } else {}?></span></font>
<font class=font-11><span class=font-cinza-1><center>Inicio: <? data($adom[inicio])  ?> Horimetro de Inicio: <? echo $adom[horimetro_ida] ?><center></span></font>
<? } ?>

<? } } ?></center></span></font></td>
</tr>
<? } ?>
<? } ?>

<tr>
<td width='730' colspan='5'><br><font class=font-11><center>
<p></p>
</center></table></font>
<? } } ?>












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