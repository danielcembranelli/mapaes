<? include("verifica.php");?>
<html>
<head>
<title>:. HostAdmin v.2 - Tela de clientes .:</title>
<meta http-equiv='content-type' content='text/html; charset=iso-8859-1'>
<link rel='StyleSheet' href='temas/include/estilos.css' type='text/css'>
<script language='JavaScript' src='temas/include/js/coolmenus4.js'></script>
<script language='JavaScript' src='temas/include/js/stm31.js'></script>
<script language='JavaScript' src='temas/include/js/menu2.js'></script>
<script language='javascript' src='include/ordena.js'></script>
<script language='javascript' src='include/dataform.js'></script>
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
<br>


<div align='center'>
<? if($_REQUEST[modulo]==criar){?>
<table border='0' width='600' cellspacing='1' cellpadding='0'>
<tr>
<td width='600' validn='middle'>
<img src='imagens/layout_seta.gif' width="15" height="9"><b class=font-10>Adicionar propriet�rio</b><br>&nbsp;
</td>
</tr>
<form method='POST' action='proprietario.php'>
<input type='hidden' name='modulo' value='criado'>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>tipo :</span></font></td>
</tr>
<tr>
<td width='600'>
	<select size="1" name="TIPO" class=form-especial>
<? 
$noticia = mysql_query("SELECT idTp, nomeTp FROM tipoproprietario order by nomeTp");
while ($dom = mysql_fetch_array($noticia)){ ?>
	<option  value="<?=$dom[idTp] ?>"><?=$dom[nomeTp] ?></option>
			<? } ?>
            </select>
</td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>nome :</span></font></td>
</tr>
<tr>
<td width='600'>
<input type='text' name='NOME' size='50' maxlength='150' class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover'></td>
</tr>


<tr>
<td width='600'><font class=font-10><span class=font-vinho>cnpj/cpf :</span></font></td>
</tr>
<tr>
<td width='600'>
<input type='text' name='CNPJ' size='15' maxlength='150' class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover'></td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>contato :</span></font></td>
</tr>
<tr>
<td width='600'>
<input type='text' name='CONTATO' size='30' maxlength='150' class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover'></td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>telefone 1 :</span></font></td>
</tr>
<tr>
<td width='600'>
<input type='text' name='DDD1' size='3' maxlength='2' class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover'>&nbsp;<input type='text' name='TEL1' size='15' maxlength='9' class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover'></td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>telefone 2 :</span></font></td>
</tr>
<tr>
<td width='600'>
<input type='text' name='DDD2' size='3' maxlength='2' class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover'>&nbsp;<input type='text' name='TEL2' size='15' maxlength='9' class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover'>
</td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>e-mail :</span></font></td>
</tr>
<tr>
<td width='600'>
<input type='text' name='EMAIL' size='30' maxlength='150' class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover'></td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>site :</span></font></td>
</tr>
<tr>
<td width='600'>
<input type='text' name='SITE' size='30' maxlength='150' class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover'></td>
</tr>
<tr>
<td width='600'>&nbsp;</td>
</tr>
<tr>
<td width='600'><input type='image' src='imagens/layout_btcadastrar.gif' width='54' height='16' border='0'></td>
</tr>
</form>
</table>
<? } elseif($_POST[modulo]==criado){?>
<?
$sql = mysql_query ("INSERT INTO proprietario (tipoProprietario, nomeProprietario, cnpjProprietario, contatoProprietario, tel1Proprietario, tel2Proprietario, emailProprietario, siteProprietario, dtcadProprietario ) VALUES ('".$_POST[TIPO]."','".$_POST[NOME]."','".$_POST[CNPJ]."','".$_POST[CONTATO]."','".$_POST[DDD1]."#".$_POST[TEL1]."','".$_POST[DDD2]."#".$_POST[TEL2]."','".$_POST[EMAIL]."','".$_POST[SITE]."',NOW());");
if (!$sql){
echo "N�o foi possivel a consulta.";}
else{
?>
<table border='0' width='600' cellspacing='1' cellpadding='0'>
<tr>
<td width='600'><center><font class=font-10><b class=font-vinho><br> O propriet�rio foi adicionado com sucesso!<br><br></b>
</font></center></td>
</tr>
<script>window.setTimeout('changeurl();',2000); function changeurl(){window.location='index.php';}</script></table><? } ?>
<? } elseif($_REQUEST[modulo]==editar){?>
<?
$noticia = mysql_query("SELECT * FROM proprietario where idProprietario = '".$_REQUEST[idProprietario]."'");
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
<img src='imagens/layout_seta.gif' width="15" height="9"><b class=font-10>Visualizar fam�lia</b><br>&nbsp;
</td>
</tr>
<tr>
<td width='730' bgcolor='#FFFFFF' colspan='5'><font class=font-11><span class=font-azul><center>n�o existe nenhuma fam�lia para est� consulta</center></span></font></td>
</tr>
</table>
<?
}else {
?>
<? while ($dom = mysql_fetch_array($noticia)){ ?>
<table border='0' width='600' cellspacing='1' cellpadding='0'>
<tr>
<td width='600' validn='middle'>
<img src='imagens/layout_seta.gif' width="15" height="9"><b class=font-10>Editar propriet�rio</b><br>&nbsp;
</td>
</tr>
<form method='POST' action='proprietario.php'>
<input type='hidden' name='modulo' value='editado'>
<input type='hidden' name='idProprietario' value='<?=$dom[idProprietario] ?>'>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>tipo :</span></font></td>
</tr>
<tr>
<td width='600'>
	<select size="1" name="TIPO" class=form-especial>
<? 
$noticiaa = mysql_query("SELECT idTp, nomeTp FROM tipoproprietario order by nomeTp");
while ($do = mysql_fetch_array($noticiaa)){ ?>
	<option  value="<?=$do[idTp] ?>" <? if($do[idTp]==$dom[tipoProprietario]){?>selected<? } ?>><?=$do[nomeTp] ?></option>
			<? } ?>
            </select>
</td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>nome :</span></font></td>
</tr>
<tr>
<td width='600'>
<input type='text' name='NOME' size='50' maxlength='150' class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover' value='<?=$dom[nomeProprietario] ?>'></td>
</tr>


<tr>
<td width='600'><font class=font-10><span class=font-vinho>cnpj/cpf :</span></font></td>
</tr>
<tr>
<td width='600'>
<input type='text' name='CNPJ' size='15' maxlength='150' class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover' value='<?=$dom[cnpjProprietario] ?>'></td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>contato :</span></font></td>
</tr>
<tr>
<td width='600'>
<input value='<?=$dom[contatoProprietario] ?>' type='text' name='CONTATO' size='30' maxlength='150' class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover'></td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>telefone 1 :</span></font></td>
</tr>
<tr>
<td width='600'>

<? 
	$tel1 = explode('#',$dom[tel1Proprietario]);
	$tel2 = explode('#',$dom[tel2Proprietario]);
?>
	
<input type='text' name='DDD1' value="<?=$tel1[0]?>" size='3' maxlength='2' class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover'>&nbsp;<input type='text' name='TEL1' size='15' value="<?=$tel1[1]?>" maxlength='9' class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover'></td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>telefone 2 :</span></font></td>
</tr>
<tr>
<td width='600'>
<input type='text' name='DDD2' size='3' maxlength='2' value="<?=$tel2[0]?>" class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover'>&nbsp;<input type='text' name='TEL2' size='15' maxlength='9' value="<?=$tel2[1]?>" class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover'>
</td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>e-mail :</span></font></td>
</tr>
<tr>
<td width='600'>
<input type='text' value='<?=$dom[emailProprietario] ?>' name='EMAIL' size='30' maxlength='150' class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover'></td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>site :</span></font></td>
</tr>
<tr>
<td width='600'>
<input type='text' name='SITE' value='<?=$dom[siteProprietario] ?>' size='30' maxlength='150' class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover'></td>
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


$sql = ("Update proprietario set tipoProprietario='".$_POST[TIPO]."', nomeProprietario='".$_POST[NOME]."', cnpjProprietario='".$_POST[CNPJ]."', contatoProprietario='".$_POST[CONTATO]."', tel1Proprietario='".$_POST[DDD1]."#".$_POST[TEL1]."', tel2Proprietario='".$_POST[DDD2]."#".$_POST[TEL2]."', emailProprietario='".$_POST[EMAIL]."', siteProprietario='".$_POST[SITE]."', dtaltProprietario=NOW() where idProprietario='".$_POST[idProprietario]."' Limit 1;");
if (!$sql){
echo "N�o foi possivel a consulta.";}
else{
?>
<table border='0' width='600' cellspacing='1' cellpadding='0'>
<tr>
<td width='600'><center><font class=font-10><b class=font-vinho><br> O propriet�rio foi atualizado com sucesso!<br><br></b>
</font></center></td>
</tr>
<script>window.setTimeout('changeurl();',2000); function changeurl(){window.location='index.php';}</script></table><? } ?>

<? } elseif($_REQUEST[modulo]==buscar){?>
<?
$noticia = mysql_query("SELECT p.nomeProprietario, p.idProprietario, t.nomeTp FROM proprietario p inner join tipoproprietario t on (t.idTp=p.tipoProprietario)  where statusProprietario='A' order by nomeProprietario");
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
<img src='imagens/layout_seta.gif' width="15" height="9"><b class=font-10>Visualizar propriet�rio</b><br>&nbsp;
</td>
</tr>
<tr>
<td width='730' bgcolor='#FFFFFF' colspan='5'><font class=font-11><span class=font-azul><center>n�o existe nenhum propriet�rio para est� consulta</center></span></font></td>
</tr>
</table>
<?
}else {
?>
<table border='0' width='730' cellspacing='1' cellpadding='0'>
<td width='730' validn='middle' colspan='7'>
<img src='imagens/layout_seta.gif' width="15" height="9"><b class=font-10>Visualizar propriet�rio</b><br>&nbsp;
</td>
</tr>
<tr bgcolor='#EFEFEF'>
<td width='30'><b class=font-12><center><span class=font-preto>#</span></center></b></td>
<td width='140'><b class=font-12><span class=font-preto><center>A��o</center></span></b></td>
<td width='400'><b class=font-12>&nbsp;<span class=font-preto>Nome</span></b></td>
<td width='160'><b class=font-12>&nbsp;<span class=font-preto>Tipo</span></b></td>

</tr>
<? while ($dom = mysql_fetch_array($noticia)){
$cor = ($coralternada++ %2 ? "FFFFFF" : "FFFFDC");
?>
<tr bgcolor='<? echo $cor ?>'>
<td width='30'><font class=font-11><span class=font-cinza-1><center><? echo $dom[idProrietario]?></center></span></font></td>
<td width='140'><center><font class=font-11><a href='?modulo=confirmadel&idProprietario=<? echo $dom[idProprietario]?>'><img src='imagens/layout_btexcluir.gif' width='54' height='16' border='0'></a>&nbsp;<a href='?modulo=editar&idProprietario=<? echo $dom[idProprietario]?>'><img src='imagens/layout_bteditar.gif' width='54' height='16' border='0'></a></font></center></td>
<td width='400'><font class=font-11><span class=font-cinza-1>&nbsp;<? echo $dom[nomeProprietario]?></span></font></td>
<td width='160'><font class=font-11><span class=font-cinza-1>&nbsp;<? echo $dom[nomeTp]?></span></font></td>

</tr>
<? } ?>

<tr>
<td width='730' colspan='5'><br><font class=font-11><center>
<p></p>
</center></table>
<? } } ?>
<? } elseif($_REQUEST[modulo]==confirmadel){?>
<table border='0' width='700' cellspacing='1' cellpadding='0'>
<tr>
<td width='700'><center><font class=font-10><b class=font-vinho><br> Voc� tem certeza que desej� excluir este propriet�rio?<br><br></b>
<form method='POST' action='proprietario.php'>
<tr><td>
<p><center><input type='image' src='imagens/layout_btsim.gif' width='54' height='16'>
<a href='?modulo=visualizar'><img border='0' src='imagens/layout_btnao.gif' width='54' height='16'></a></p>
<input type='hidden' name='modulo' value='delete'><input type='hidden' name='idProprietario' value='<? echo $_REQUEST[idProprietario] ?>'>
</form>
</font></center></td>
</tr>
</table>

<? } elseif($_POST[modulo]==delete){?>
<?
$sql = mysql_query("Update proprietario set statusProprietario='E', dtaltProprietario=NOW() WHERE idProprietario='".$_POST[idProprietario]."' LIMIT 1;") or die (mysql_error());
if (!$sql){
echo "N�o foi possivel a consulta.";}
else{
?>
<table border='0' width='700' cellspacing='1' cellpadding='0'>

<tr>
<td width='700'><center><font class=font-10><b class=font-vinho><br> O propriet�rio foi excluido com sucesso!<br><br></b>
</font></center></td>
</tr>
<script>window.setTimeout('changeurl();',2000); function changeurl(){window.location='index.php';}</script></table>

<? } ?>


<? } else {?>
<script>window.setTimeout('changeurl();',1); function changeurl(){window.location='index.php';}</script>
<? } ?>
</div>

</td>
</tr>
<tr>
<td colspan='5' height='4'><br><center><span class='font-09'>� 2004 - <?=date("Y");?> Cohrion do Brasil. Todos os direitos reservados.</span></center><br></td>
</tr>
<tr>
<td colspan='5' height='4' bgcolor='#B6B6B6'><img border='0' src='temas/imagens/spacer.gif' width='1' height='1'></td>
</tr>
</table>
</center>
</body>
</html>