<? include("verifica.php");?>
<html>
<head>
<title>:. HostAdmin v.2 - Tela de clientes .:</title>
<meta http-equiv='content-type' content='text/html; charset=iso-8859-1'>
<link rel='StyleSheet' href='temas/include/estilos.css' type='text/css'>
<script language='JavaScript' src='temas/include/js/coolmenus4.js'></script>
<script language='JavaScript' src='temas/include/js/stm31.js'></script>
<script language='JavaScript' src='temas/include/js/menu2.js'></script>
<script type="text/JavaScript">
<!--
function MM_findObj(n, d) { //v4.01
var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
if(!x && d.getElementById) x=d.getElementById(n); return x;
}
function MM_showHideLayers() { //v6.0
var i,p,v,obj,args=MM_showHideLayers.arguments;
for (i=0; i<(args.length-2); i+=3) if ((obj=MM_findObj(args[i]))!=null) { v=args[i+2];
if (obj.style) { obj=obj.style; v=(v=='show')?'visible':(v=='hide')?'hidden':v; }
obj.visibility=v; }
}
//-->
</script></head>
<body bgcolor='#ffffff' leftmargin='0' topmargin='0' marginwidth='0' marginheight='0'>
<? if($_POST[modulo]=="editado"){

	$sql = mysql_query("UPDATE login SET nome='$_POST[nome]', emailUsuario='$_POST[email]' WHERE id='$login_id' LIMIT 1;");
	
	}
?>	
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
<?
$MyDados = mysql_query("SELECT * FROM login where id = '$login_id'");
$mD = mysql_fetch_array($MyDados);
?>
<table border='0' width='600' cellspacing='1' cellpadding='0'>
<tr>
<td width='600' validn='middle'>
<img src='imagens/layout_seta.gif' width="15" height="9"><b class=font-10>Meus Dados</b><br>
&nbsp;</td>
</tr>
<form action="MeusDados.php" method="post" name="programacao" id="programacao">
<input type='hidden' name='modulo' value='editado'>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>nome:</span></font></td>
</tr>
<tr>
<td width='600'><input name='nome' type='text' value='<?=$mD[nome]?>' class=form-especial id="consultor" onfocus=this.className='boxover' onblur=this.className='boxnormal' size='40' maxlength='255'></td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>e-mail:</span></font></td>
</tr>
<tr>
<td width='600'><input name='email' type='text' value='<?=$mD[emailUsuario]?>' class=form-especial id="consultor" onfocus=this.className='boxover' onblur=this.className='boxnormal' size='40' maxlength='255'></td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>Quantidade de acessos:</span></font></td>
</tr>
<tr>
<td width='600'>
<?=$mD[nrLogUsuario]?></td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>Último acesso :</span></font></td>
</tr>
<tr>
<td width='600'><?=$mD[dtAntLogUsuario]?>
</td>
</tr>


<tr>
<td>&nbsp;</td>
</tr>
<tr>
<td width='600'><input type='image' src='imagens/layout_bteditar.gif' width='54' height='16' border='0'></td>
</tr>
</form>
</table>
</div>
</td>
</tr>
<tr>
<td colspan='5' height='4'><br><center><span class='font-09'> 2004 Cohrion do Brasil. Todos os direitos reservados.</span></center><br></td>
</tr>
<tr>
<td colspan='5' height='4' bgcolor='#B6B6B6'><img border='0' src='temas/imagens/spacer.gif' width='1' height='1'></td>
</tr>
</table>
</center>
</body>
</html>
