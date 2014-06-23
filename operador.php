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
<img src='imagens/layout_seta.gif' width="15" height="9"><b class=font-10>Adicionar operador</b><br>&nbsp;
</td>
</tr>
<form method='POST' action='operador.php'>
<input type='hidden' name='modulo' value='criado'>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>empresa:</span></font></td>
</tr>
<tr>
<td width='600'>
<input type='text' name='empresa' size='50' maxlength='150' value="<? echo $dom[empresa] ?>" class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover'></td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>função:</span></font></td>
</tr>
<tr>
<td width='600'>
<input type='text' name='funcao' size='50' maxlength='150' value="<? echo $dom[funcaoOperador] ?>" class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover'></td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>sigla :</span></font></td>
</tr>
<tr>
<td width='600'>
<input type='text' name='classificacao' size='10' maxlength='20' value="<? echo $dom[classificacao] ?>" class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover'></td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>admissão:</span></font></td>
</tr>
<tr>
<td width='600'>
<input type='text' name='admissao' size='13' maxlength='10' value="<? echo $dom[admissaoOperador] ?>" class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover'></td>
</tr>
<tr>
  <td>&nbsp;</td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>nome:</span></font></td>
</tr>
<tr>
<td width='600'>
<input type='text' name='nome' size='50' maxlength='150' value="<? echo $dom[nome] ?>" class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover'></td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>endere&ccedil;o:</span></font></td>
</tr>
<tr>
<td width='600'>
<input name='endereco' type='text' class=form-especial id="endereco" onfocus=this.className='boxover' onblur=this.className='boxnormal' value="<? echo $dom[endOperador] ?>" size='50' maxlength='150'></td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>numero:</span></font></td>
</tr>
<tr>
<td width='600'>
<input name='numero' type='text' class=form-especial id="numero" onfocus=this.className='boxover' onblur=this.className='boxnormal' value="<? echo $dom[nrendOperador] ?>" size='20' maxlength='150'></td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>complemento:</span></font></td>
</tr>
<tr>
<td width='600'>
<input name='complemento' type='text' class=form-especial id="complemento" onfocus=this.className='boxover' onblur=this.className='boxnormal' value="<? echo $dom[compend] ?>" size='30' maxlength='150'></td>
</tr><tr>
<td width='600'><font class=font-10><span class=font-vinho>bairro:</span></font></td>
</tr>
<tr>
<td width='600'>
<input name='bairro' type='text' class=form-especial id="bairro" onfocus=this.className='boxover' onblur=this.className='boxnormal' value="<? echo $dom[baiendOperador] ?>" size='50' maxlength='150'></td>
</tr><tr>
<td width='600'><font class=font-10><span class=font-vinho>cidade:</span></font></td>
</tr>
<tr>
<td width='600'>
  <input name="cidade" type="text" class="form-especial" id="cidade" onFocus="this.className='boxover'" onBlur="this.className='boxnormal'" value="<? echo $dom[cidendOperador] ?>" size="50"></td>
</tr><tr>
<td width='600'><font class=font-10><span class=font-vinho>uf:</span></font></td>
</tr>
<tr>
<td width='600'>
<input name='uf' type='text' class=form-especial id="uf" onfocus=this.className='boxover' onblur=this.className='boxnormal' value="<? echo $dom[ufendOperador] ?>" size='5' maxlength='2'></td>
</tr><tr>
<td width='600'><font class=font-10><span class=font-vinho>cep:</span></font></td>
</tr>
<tr>
<td width='600'>
<input name='cep' type='text' class=form-especial id="cep" onfocus=this.className='boxover' onblur=this.className='boxnormal' value="<? echo $dom[cependOperador] ?>" size='12' maxlength='9'></td>
</tr>
<tr>
  <td>&nbsp;</td>
</tr>
<tr>
  <td class="font-laranja">Dados Pessoais</td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>cpf:</span></font></td>
</tr>
<tr>
<td width='600'>
<input name='cpf' type='text' class=form-especial id="cpf" onfocus=this.className='boxover' onblur=this.className='boxnormal' value="<? echo $dom[cpfOperador] ?>" size='50' maxlength='150'></td>
</tr><tr>
<td width='600'><font class=font-10><span class=font-vinho>rg:</span></font></td>
</tr>
<tr>
<td width='600'>
<input name='rg' type='text' class=form-especial id="rg" onfocus=this.className='boxover' onblur=this.className='boxnormal' value="<? echo $dom[rgOperador] ?>" size='20' maxlength='150'></td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>cnh:</span></font></td>
</tr>
<tr>
<td width='600'>
<input name='cnh' type='text' class=form-especial id="cnh" onfocus=this.className='boxover' onblur=this.className='boxnormal' value="<? echo $dom[cnhOperador] ?>" size='20' maxlength='150'></td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>categoria chn:</span></font></td>
</tr>
<tr>
<td width='600'>
<input name='categoria' type='text' class=form-especial id="categoria" onfocus=this.className='boxover' onblur=this.className='boxnormal' value="<? echo $dom[rgOperador] ?>" size='20' maxlength='150'></td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>telefone fixo:</span></font></td>
</tr>
<tr>
<td width='600'>
<input name='tel' type='text' class=form-especial id="tel" onfocus=this.className='boxover' onblur=this.className='boxnormal' value="<? echo $dom[telOperador] ?>" size='20' maxlength='150'></td>
</tr><tr>
<td width='600'><font class=font-10><span class=font-vinho>telefone m&oacute;vel:</span></font></td>
</tr>
<tr>
<td width='600'><input name='cel' type='text' class=form-especial id="cel" onFocus=this.className='boxover' onBlur=this.className='boxnormal' value="<? echo $dom[celOperador] ?>" size='20' maxlength='150'></td>
</tr><tr>
<td width='600'><font class=font-10><span class=font-vinho>observa&ccedil;&atilde;o:</span></font></td>
</tr>
<tr>
<td width='600'>
  <textarea name="obs" cols="50" rows="6" class="form-especial" id="obs" onFocus="this.className='boxover'" onBlur="this.className='boxnormal'"><? echo strip_tags($dom[obsOperador]); ?></textarea></td>
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
$sql = mysql_query ("INSERT INTO operador VALUES ('','$_POST[nome]','$_POST[empresa]','$_POST[classificacao]','', '$_POST[funcao]','$_POST[admissao]','$_POST[endereco]','$_POST[numero]','$_POST[complemento]','$_POST[bairro]', '$_POST[cidade]','$_POST[uf]','$_POST[cep]','$_POST[cpf]','$_POST[rg]','$_POST[cnh]','$_POST[categoria]', '$_POST[tel]','$_POST[cel]','".nl2br($_POST[obs])."','A');")or die (mysql_error());
if (!$sql){
echo "Não foi possivel a consulta.";}
else{
?>
<table border='0' width='600' cellspacing='1' cellpadding='0'>
<tr>
<td width='600'><center><font class=font-10><b class=font-vinho><br> O operador <? echo $nome ?> foi adicionado com sucesso!<br><br></b>
</font></center></td>
</tr>
<script>window.setTimeout('changeurl();',2000); function changeurl(){window.location='index.php';}</script></table><? } ?>
<? } elseif($modulo==editar){?>
<?
$noticia = mysql_query("SELECT * FROM operador where id = '$id' order by nome");
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
<img src='imagens/layout_seta.gif' width="15" height="9"><b class=font-10>Visualizar operador</b><br>&nbsp;
</td>
</tr>
<tr>
<td width='730' bgcolor='#FFFFFF' colspan='5'><font class=font-11><span class=font-azul><center>não existe nenhum operador para está consulta</center></span></font></td>
</tr>
</table>
<?
}else {
?>
<? while ($dom = mysql_fetch_array($noticia)){ ?>
<table border='0' width='600' cellspacing='1' cellpadding='0'>
<tr>
<td width='600' validn='middle'>
<img src='imagens/layout_seta.gif' width="15" height="9"><b class=font-10>Editar operador</b><br>&nbsp;</td>
</tr>
<form method='POST' action='operador.php'>
<input type='hidden' name='modulo' value='editado'>
<input type='hidden' name='id' value='<? echo $dom[id] ?>'>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>empresa:</span></font></td>
</tr>
<tr>
<td width='600'>
<input type='text' name='empresa' size='50' maxlength='150' value="<? echo $dom[empresa] ?>" class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover'></td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>função:</span></font></td>
</tr>
<tr>
<td width='600'>
<input type='text' name='funcao' size='50' maxlength='150' value="<? echo $dom[funcaoOperador] ?>" class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover'></td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>sigla :</span></font></td>
</tr>
<tr>
<td width='600'>
<input type='text' name='classificacao' size='10' maxlength='20' value="<? echo $dom[classificacao] ?>" class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover'></td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>admissão:</span></font></td>
</tr>
<tr>
<td width='600'>
<input type='text' name='admissao' size='13' maxlength='10' value="<? echo $dom[admissaoOperador] ?>" class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover'></td>
</tr>
<tr>
  <td>&nbsp;</td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>nome:</span></font></td>
</tr>
<tr>
<td width='600'>
<input type='text' name='nome' size='50' maxlength='150' value="<? echo $dom[nome] ?>" class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover'></td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>endere&ccedil;o:</span></font></td>
</tr>
<tr>
<td width='600'>
<input name='endereco' type='text' class=form-especial id="endereco" onfocus=this.className='boxover' onblur=this.className='boxnormal' value="<? echo $dom[endOperador] ?>" size='50' maxlength='150'></td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>numero:</span></font></td>
</tr>
<tr>
<td width='600'>
<input name='numero' type='text' class=form-especial id="numero" onfocus=this.className='boxover' onblur=this.className='boxnormal' value="<? echo $dom[nrendOperador] ?>" size='20' maxlength='150'></td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>complemento:</span></font></td>
</tr>
<tr>
<td width='600'>
<input name='complemento' type='text' class=form-especial id="complemento" onfocus=this.className='boxover' onblur=this.className='boxnormal' value="<? echo $dom[compend] ?>" size='30' maxlength='150'></td>
</tr><tr>
<td width='600'><font class=font-10><span class=font-vinho>bairro:</span></font></td>
</tr>
<tr>
<td width='600'>
<input name='bairro' type='text' class=form-especial id="bairro" onfocus=this.className='boxover' onblur=this.className='boxnormal' value="<? echo $dom[baiendOperador] ?>" size='50' maxlength='150'></td>
</tr><tr>
<td width='600'><font class=font-10><span class=font-vinho>cidade:</span></font></td>
</tr>
<tr>
<td width='600'>
  <input name="cidade" type="text" class="form-especial" id="cidade" onFocus="this.className='boxover'" onBlur="this.className='boxnormal'" value="<? echo $dom[cidendOperador] ?>" size="50"></td>
</tr><tr>
<td width='600'><font class=font-10><span class=font-vinho>uf:</span></font></td>
</tr>
<tr>
<td width='600'>
<input name='uf' type='text' class=form-especial id="uf" onfocus=this.className='boxover' onblur=this.className='boxnormal' value="<? echo $dom[ufendOperador] ?>" size='5' maxlength='2'></td>
</tr><tr>
<td width='600'><font class=font-10><span class=font-vinho>cep:</span></font></td>
</tr>
<tr>
<td width='600'>
<input name='cep' type='text' class=form-especial id="cep" onfocus=this.className='boxover' onblur=this.className='boxnormal' value="<? echo $dom[cependOperador] ?>" size='12' maxlength='9'></td>
</tr>
<tr>
  <td>&nbsp;</td>
</tr>
<tr>
  <td class="font-laranja">Dados Pessoais</td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>cpf:</span></font></td>
</tr>
<tr>
<td width='600'>
<input name='cpf' type='text' class=form-especial id="cpf" onfocus=this.className='boxover' onblur=this.className='boxnormal' value="<? echo $dom[cpfOperador] ?>" size='50' maxlength='150'></td>
</tr><tr>
<td width='600'><font class=font-10><span class=font-vinho>rg:</span></font></td>
</tr>
<tr>
<td width='600'>
<input name='rg' type='text' class=form-especial id="rg" onfocus=this.className='boxover' onblur=this.className='boxnormal' value="<? echo $dom[rgOperador] ?>" size='20' maxlength='150'></td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>cnh:</span></font></td>
</tr>
<tr>
<td width='600'>
<input name='cnh' type='text' class=form-especial id="cnh" onfocus=this.className='boxover' onblur=this.className='boxnormal' value="<? echo $dom[cnhOperador] ?>" size='20' maxlength='150'></td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>categoria chn:</span></font></td>
</tr>
<tr>
<td width='600'>
<input name='categoria' type='text' class=form-especial id="categoria" onfocus=this.className='boxover' onblur=this.className='boxnormal' value="<? echo $dom[rgOperador] ?>" size='20' maxlength='150'></td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>telefone fixo:</span></font></td>
</tr>
<tr>
<td width='600'>
<input name='tel' type='text' class=form-especial id="tel" onfocus=this.className='boxover' onblur=this.className='boxnormal' value="<? echo $dom[telOperador] ?>" size='20' maxlength='150'></td>
</tr><tr>
<td width='600'><font class=font-10><span class=font-vinho>telefone m&oacute;vel:</span></font></td>
</tr>
<tr>
<td width='600'><input name='cel' type='text' class=form-especial id="cel" onFocus=this.className='boxover' onBlur=this.className='boxnormal' value="<? echo $dom[celOperador] ?>" size='20' maxlength='150'></td>
</tr><tr>
<td width='600'><font class=font-10><span class=font-vinho>observa&ccedil;&atilde;o:</span></font></td>
</tr>
<tr>
<td width='600'>
  <textarea name="obs" cols="50" rows="6" class="form-especial" id="obs" onFocus="this.className='boxover'" onBlur="this.className='boxnormal'"><? echo strip_tags($dom[obsOperador]); ?></textarea></td>
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
$obs=nl2br($obs);
$sql = mysql_query("UPDATE operador SET nome='$_POST[nome]', empresa='$_POST[empresa]', classificacao='$_POST[classificacao]', funcaoOperador='$_POST[funcao]', admissaoOperador='$_POST[admissao]', endOperador='$_POST[endereco]', nrendOperador='$_POST[numero]', compendOperador='$_POST[complemento]', baiendOperador='$_POST[bairro]', cidendOperador='$_POST[cidade]', ufendOperador='$_POST[uf]', cependOperador='$_POST[cep]', cpfOperador='$_POST[cpf]', rgOperador='$_POST[rg]', cnhOperador='$_POST[cnh]', catcnhOperador='$_POST[categoria]', telOperador='$_POST[tel]', celOperador='$_POST[cel]', obsOperador='".nl2br($_POST[obs])."' WHERE id='$_POST[id]' LIMIT 1;");
if (!$sql){
echo "Não foi possivel a consulta.";}
else{
?>
<table border='0' width='600' cellspacing='1' cellpadding='0'>
<tr>
<td width='600'><center><font class=font-10><b class=font-vinho><br> O operador <? echo $nome ?> foi atualizado com sucesso!<br><br></b>
</font></center></td>
</tr>
<script>window.setTimeout('changeurl();',2000); function changeurl(){window.location='index.php';}</script></table><? } ?>

<? } elseif($modulo==buscar){?>
<?
$noticia = mysql_query("SELECT * FROM operador where statusOperador='".$_REQUEST[Status]."' order by nome");
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
<img src='imagens/layout_seta.gif' width="15" height="9"><b class=font-10>Visualizar operador</b><br>&nbsp;
</td>
</tr>
<tr>
<td width='730' bgcolor='#FFFFFF' colspan='5'><font class=font-11><span class=font-azul><center>não existe nenhum operador para está consulta</center></span></font></td>
</tr>
</table>
<?
}else {
?>
<table border='0' width='730' cellspacing='1' cellpadding='0'>
<td width='730' validn='middle' colspan='7'>
<img src='imagens/layout_seta.gif' width="15" height="9"><b class=font-10>Visualizar operador</b><br>&nbsp;
</td>
</tr>
<tr bgcolor='#EFEFEF'>
<td width='30'><b class=font-12><center><span class=font-preto>#</span></center></b></td>
<td width='140'><b class=font-12><span class=font-preto><center>Ação</center></span></b></td>
<td width='440'><b class=font-12><span class=font-preto><center>Nome</center></span></b></td>
<td width='120'><b class=font-12><span class=font-preto><center>Classicação</center></span></b></td>
</tr>
<? while ($dom = mysql_fetch_array($noticia)){ 
$cor = ($coralternada++ %2 ? "FFFFFF" : "FFFFDC");
?>
<tr bgcolor='<? echo $cor ?>'>
<td width='30'><font class=font-11><span class=font-cinza-1><center><? echo $dom[id]?></center></span></font></td>
<td width='140'><center><font class=font-11><a href='?modulo=confirmadel&id=<? echo $dom[id]?>'><img src='imagens/layout_btexcluir.gif' width='54' height='16' border='0'></a>&nbsp;<a href='?modulo=editar&id=<? echo $dom[id]?>'><img src='imagens/layout_bteditar.gif' width='54' height='16' border='0'></a></font></center></td>
<td width='440'><font class=font-11><span class=font-cinza-1>&nbsp;<? echo $dom[nome]?> - <? echo $dom[empresa]?></span></font></td>
<td width='120'><font class=font-11><span class=font-cinza-1><center><? echo $dom[classificacao] ?></center></span></font></td>
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
<td width='700'><center><font class=font-10><b class=font-vinho><br> Você tem certeza que desejá excluir este operador?<br><br></b>
<form method='POST' action='operador.php'>
<tr><td>
<p><center><input type='image' src='imagens/layout_btsim.gif' width='54' height='16'>
<a href='cobrança.php?modulo=visualizar'><img border='0' src='imagens/layout_btnao.gif' width='54' height='16'></a></p>
<input type='hidden' name='modulo' value='delete'><input type='hidden' name='id' value='<? echo $id ?>'>
</form>
</font></center></td>
</tr>
</table>

<? } elseif($modulo==delete){?>
<?
$sql = mysql_query("Update operador set statusOperador='E' WHERE id='$id' LIMIT 1;");
if (!$sql){
echo "Não foi possivel a consulta.";}
else{
?>
<table border='0' width='700' cellspacing='1' cellpadding='0'>

<tr>
<td width='700'><center><font class=font-10><b class=font-vinho><br> O operador foi excluido com sucesso!<br><br></b>
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
<td colspan='5' height='4'><br><center><span class='font-09'>© 2004 - <?=date("Y");?> Cohrion do Brasil. Todos os direitos reservados.</span></center><br></td>
</tr>
<tr>
<td colspan='5' height='4' bgcolor='#B6B6B6'><img border='0' src='temas/imagens/spacer.gif' width='1' height='1'></td>
</tr>
</table>
</center>
</body>
</html>