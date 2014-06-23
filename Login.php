<html>
<head>
<title>.: Mapa ES :.</title>
<meta http-equiv='content-type' content='text/html; charset=iso-8859-1'>
<link rel='StyleSheet' href='temas/include/estilos.css' type='text/css'>
</head>
<body bgcolor='#ffffff' leftmargin='0' topmargin='0' marginwidth='0' marginheight='0'>
<center>
<table border='0' cellpadding='0' cellspacing='0' width='774' background='temas/imagens/fundo.gif'>
<tr>
<td colspan='5'><img src='temas/imagens/topo.gif' width='774' height='92' border='0' alt=''></td>
</tr>
<tr>
<td colspan='5'><img src='temas/imagens/topobaixo.gif' width='774' height='23' border='0' alt=''></td>
</tr>
<tr>
<td colspan='5'>
<br><br><div align='center'>
<table border='0' width='297' cellspacing='0' cellpadding='0'>
<tr>
<td width='297'><img border='0' src='imagens/layout_login.gif' width='297' height='12'></td>
</tr>
<tr>
<td width='297' bgcolor='#F0F0F0'>
<form action='autentica.php' method='post'>
<div align='center'>
<table border='0' width='200' cellspacing='0' cellpadding='0'>
<tr>
<td width='200' colspan='2'><img border='0' src='imagens/layout_pixel.gif' width='1' height='40'></td>
</tr>
<tr>
<td width='200' colspan='2'><? if($logout==true){?><img border='0' src='imagens/layout_txtlogout.gif' width='178' height='12'><?} elseif($invalido==true){?><img border='0' src='imagens/layout_logininvalido.gif' width='117' height='12'><?} else{?><img border='0' src='imagens/layout_txtlogin.gif' width='105' height='12'><? } ?></td>
</tr>
<tr>
<td width='200' colspan='2'><img border='0' src='imagens/layout_pixel.gif' width='1' height='15'></td>
</tr>
<tr>
<td width='57'><img border='0' src='imagens/layout_usuario.gif' width='47' height='13'></td>
<td width='143'><input type='text' name='txtlogin' size='10' maxlength='10' class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover' ></td>
</tr>
<tr>
<td width='200' colspan='2'><img border='0' src='imagens/layout_pixel.gif' width='0' height='2'></td>
</tr>
<tr>
<td width='57'><img border='0' src='imagens/layout_senha.gif' width='47' height='13'></td>
<td width='143'><input type='password' name='txtsenha' size='10' class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover' ></td>
</tr>
<tr>
<td width='200' colspan='2'><img border='0' src='imagens/layout_pixel.gif' width='1' height='20'></td>
</tr>
<tr>
<td width='200' colspan='2'>
<p align='right'><input type='image' src='imagens/layout_btentrar.gif' width='39' height='16' border='0'></td>
</tr>
<tr>
<td width='200' colspan='2'>

<img border='0' src='imagens/layout_pixel.gif' width='1' height='30'></td>
</tr>
</table>
</div>
</form>
</td>
</tr>
</table>
</div><br><br>
</td>
</tr>
<tr>
<td colspan='5' height='4' bgcolor='#B6B6B6'><img border='0' src='temas/imagens/spacer.gif' width='1' height='1'></td>
</tr>
</table>
</center>
</body>
</html>