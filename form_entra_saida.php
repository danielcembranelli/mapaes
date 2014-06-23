<? include("verifica.php");
ini_set('max_execution_time','999999999999999999999');
//ini_set("SMTP","mail.ita.locamail.com.br");
ini_set("sendmail_from","mapaes@mapaes.escad.com.br");
if($_GET['send'] == "1"){
$Data = $_POST['para_a']."-".$_POST['para_m']."-".$_POST['para_d'];
$addProgramacao = mysql_query("insert into programacao (`dtProg`,`idLogin`,`agendarProg`,`tipoProg`,`eqptoProg`,`clienteProg`,`contatoProg`,`obraProg`,`freteProg`,`operadorProg`,`dieselProg`,`estruturaProg`,`obsProg`,`statusProg`,`duracaoProg`) values (NOW(),'$login_id','$Data','".$_POST['programar']."','".$_POST['equipamento']."','".$_POST['cliente']."','".$_POST['contrato']."','".$_POST['obra']."','".$_POST['frete']."','".$_POST['operador']."','".$_POST['diesel']."','".$_POST['estrutura']."','".$_POST['observacoes']."','F','".$_POST['duracao']."');");
$idProg = mysql_insert_id();

if($_POST[nCliente]=='1'){
	$nCliente = 'Sim';
} else {
	$nCliente = 'Não';
}
if($_POST[nNota]=='1'){
	$nNota = 'Sim';
} else {
	$nNota = 'Não';
}	

$msg = "<html>";
$msg .="<head>";
$msg .="<title></title>";
$msg .="<meta http-equiv='content-type' content='text/html; charset=iso-8859-1'>";
$msg.="<style type='text/css'>";
$msg.="body{margin:0;font-family:verdana,arial,helvetica;font-size:10px;color:#666666}";
$msg.="input,select,textarea{font-family:verdana,arial,helvetica;font-size:10px;}";
$msg.=".boxnormal {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 10px; border-style: solid;border-width: 1;color:#666666; background-color: White;}";
$msg.=".boxover {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 10px; border-style: solid;border-width: 1;color:#666666; background-color: #F0F0F0;}";
$msg.=".font-preto{color:#000000}";
$msg.=".font-cinza-1{color:#000000}";
$msg.=".font-cinza-2{color:#000000}";
$msg.=".font-vinho{color:#CC3300}";
$msg.=".font-laranja{color:#FFA629}";
$msg.=".font-azul{color: #00008B;}";
$msg.=".font-branco{color:#FFFFFF}";
$msg.=".font-09{font-size:12px}";
$msg.=".font-10{font-size:12px}";
$msg.=".font-11{font-size:12px}";
$msg.=".font-12{font-size:12px}";
$msg.=".font-13{font-size:13px}";
$msg.=".font-14{font-size:14px}";
$msg.=".form-especial {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12px; border-style: solid;border-width: 1;color:#666666}";
$msg.=".form-busca {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 10px; color: #666666; border: 1px inset #999999;}";
$msg.=".line-height-0{line-height:9px}";
$msg.=".line-height-1{line-height:10px}";
$msg.=".line-height-2{line-height:13px}";
$msg.=".line-height-3{line-height:16px}";
$msg.=".line-height-4{line-height:18px}";
$msg.=".line-height-5{line-height:24px}";
$msg.=".bg-preto{background:#000000}";
$msg.=".bg-cinza{background:#CCCCCC}";
$msg.=".bg-cinza-gelo{background: #F5F5F5}";
$msg.=".bg-branco{background:#FFFFFF}";
$msg.=".menu a:link{font-family:tahoma, arial, helvetica;font-size:11px;color:#666666;text-decoration:none}";
$msg.=".menu a:active{font-family:tahoma, arial, helvetica;font-size:11px;color:#666666;text-decoration:none}";
$msg.=".menu a:visited{font-family:tahoma, arial, helvetica;font-size:11px;color:#666666;text-decoration:none}";
$msg.=".menu a:hover{font-family:tahoma, arial, helvetica;font-size:11px;color: #FFFFFF;text-decoration: none}";
$msg.="a:link{color:#666666;text-decoration:none}";
$msg.="a:active{color:#666666;text-decoration:none}";
$msg.="a:visited{color:#666666;text-decoration:none}";
$msg.="a:hover{color: Red;text-decoration: none}";
$msg.="#dek {POSITION:absolute;VISIBILITY:hidden;Z-INDEX:200;}";
$msg.="TD {";
$msg.="	FONT-SIZE: 13px; FONT-FAMILY: MS Sans Serif, sans-serif, Arial, Helvetica";
$msg.="}";
$msg.="TH {";
$msg.="	FONT-SIZE: 13px; FONT-FAMILY: MS Sans Serif, sans-serif, Arial, Helvetica";
$msg.="}";
$msg.="P {";
$msg.="	FONT-SIZE: 13px; FONT-FAMILY: MS Sans Serif, sans-serif, Arial, Helvetica";
$msg.="}";
$msg.="SPAN {";
$msg.="	FONT-SIZE: 13px; FONT-FAMILY: MS Sans Serif, sans-serif, Arial, Helvetica";
$msg.="}";
$msg.="DIV {";
$msg.="	FONT-SIZE: 13px; FONT-FAMILY: MS Sans Serif, sans-serif, Arial, Helvetica";
$msg.="}";
$msg.="</style>";
$msg .="</head><body bgcolor='#ffffff' leftmargin='0' topmargin='0' marginwidth='0' marginheight='0'><img src='http://mapaes.escad.com.br/imagens/logoEscad.jpg'>";
$msg .="<center>";
$msg.="<table width='600' cellspacing='0' cellpadding='4' border='1' bordercolor='#000000'>";
$msg.="    <tr>";
$msg.="      <td colspan='2'><font class=font-10><span class=font-vinho><strong>Programacao :</strong></span><span class=font-preto>#".$idProg."</span></font></td>";
$msg.="    <tr>";
$msg.="      <td width='200'><font class=font-10><span class=font-vinho><strong>Data :</strong></span><span class=font-preto>".$_POST['data_d']."/".$_POST['data_m']."/".$_POST['data_a']."</span></font></td>";
$msg.="      <td width='400'><font class=font-10><span class=font-vinho><strong>Consultor :</strong></span> <span class=font-preto>".$_POST['consultor']."</span></font></td>";
$msg.="    </tr>";
$msg.="    <tr>";
$msg.="      <td width='600' colspan='2'><font class=font-10><span class=font-vinho><strong>Programar: </strong></span><span class=font-preto>".$_POST['programar']."</span></font></td>";
$msg.="    </tr>";
$msg.="    <tr>";
$msg.="      <td width='600' colspan='2'><font class=font-10><span class=font-vinho><strong>Para dia: </strong></span><span class=font-preto>".$_POST['para_d']."/".$_POST['para_m']."/".$_POST['para_a']."</span></font></td>";
$msg.="    </tr>";
$msg.="    <tr>";
$msg.="      <td width='600' colspan='2'><font class=font-10><span class=font-vinho><strong>Equipamento: </strong></span><span class=font-preto>".$_POST['equipamento']."</span></font></td>";
$msg.="    </tr>";
$msg.="    <tr>";
$msg.="      <td width='600' colspan='2'><font class=font-10><span class=font-vinho><strong>Cliente: </strong></span><span class=font-preto>".$_POST['cliente']."</span></font></td>";
$msg.="    </tr>";
$msg.="    <tr>";
$msg.="      <td width='600' colspan='2'><font class=font-10><span class=font-vinho><strong>Contrato: </strong></span><span class=font-preto>".$_POST['contrato']."</span></font></td>";
$msg.="    </tr>";
$msg.="    <tr>";
$msg.="      <td width='600' colspan='2'><font class=font-10><span class=font-vinho><strong>Obra: </strong></span><span class=font-preto>".$_POST['obra']."</span></font></td>";
$msg.="    </tr>";
$msg.="    <tr>";
$msg.="      <td width='600' colspan='2'><font class=font-10><span class=font-vinho><strong>Alojamento: </strong></span><span class=font-preto>".$_POST['alojamento']."</span></font></td>";
$msg.="    </tr>";
$msg.="    <tr>";
$msg.="      <td width='600' colspan='2'><font class=font-10><span class=font-vinho><strong>Alimentação: </strong></span><span class=font-preto>".$_POST['alimentacao']."</span></font></td>";
$msg.="    </tr>";
$msg.="    <tr>";
$msg.="      <td width='600' colspan='2'><font class=font-10><span class=font-vinho><strong>Frete: </strong></span><span class=font-preto>".$_POST['frete']."</span></font></td>";
$msg.="    </tr>";
$msg.="    <tr>";
$msg.="      <td colspan='2'><font class=font-10><span class=font-vinho><strong>Operador :</strong></span><span class=font-preto>".$_POST['operador']."</span></font></td>";
$msg.="    </tr>";
$msg.="    <tr>";
$msg.="      <td colspan='2'><font class=font-10><span class=font-vinho><strong>Empresa: </strong></span><span class=font-preto>".$_POST['operador_select']."</span></font></td>";
$msg.="    </tr>";
$msg.="    <tr>";
$msg.="      <td colspan='2'><font class=font-vinho><strong>Diesel:</strong> </font><span class=font-preto>".$_POST['diesel']."</span></td>";
$msg.="    </tr>";
$msg.="    <tr>";
$msg.="      <td colspan='2'><font class=font-vinho><strong>Previsão de Obra</strong> </font><span class=font-preto>".$_POST['duracao']."</span></td>";
$msg.="    </tr>";
$msg.="    <tr>";
$msg.="      <td colspan='2'><font class=font-vinho><strong>Estrutura F&iacute;sica de atendimento:</strong> <span class=font-preto>".$_POST['estrutura']."</span></font></td>";
$msg.="    </tr>";
$msg.="    <tr>";
$msg.="      <td colspan='2'><font class=font-vinho><strong>Observa&ccedil;&otilde;es: </strong></font></td>";
$msg.="    </tr>";
$msg.="    <tr>";
$msg.="      <td width='600' colspan='2'><span class=font-preto>".$_POST['observacoes']."</span></td>";
$msg.="    </tr>";
$msg.="  </form>";
$msg.="</table>";
$msg.="</center>";
$msg.="</body>";
$msg.="</html>";
$headers = "MIME-Version: 1.0\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\n";
$headers .= "From: MAPAES <mapaes@escad.com.br>\n";
/* Enviando a mensagem */
require_once('lib/Mail/class.phpmailer.php');
$mail             = new PHPMailer();
			$mail->IsSMTP(); // telling the class to use SMTP
			$mail->Host       = "smtp.escad.com.br"; // SMTP server
			$mail->SMTPDebug  = 1;                     // enables SMTP debug information (for testing)
													   // 1 = errors and messages
													   // 2 = messages only
			$mail->Timeout = 160;
			$mail->SMTPAuth   = true;                  // enable SMTP authentication
			$mail->Host       = "smtp.escad.com.br"; // sets the SMTP server
			$mail->Port       = 587;                    // set the SMTP port for the GMAIL server
			$mail->Username   = "mapaes@escad.com.br"; // SMTP account username
			$mail->Password   = "3sc@dr3nt@l";        // SMTP account password
			$mail->From       = "mapaes@escad.com.br";
			$mail->FromName   = "MAPAES - Escad Rental";			
			$mail->Subject    = "[MapaES] Programação de ". $_POST['programar'] ." de Equipamento";
			$mail->AltBody    = $msg;
			$mail->MsgHTML($msg);
			
/* Enviando a mensagem */
	$SqlEmail = mysql_query("SELECT emailUsuario, nome FROM login where emailformUsuario='S'");
	while ($sq = mysql_fetch_array($SqlEmail)){
			$mail->AddAddress($sq[emailUsuario],$sq[nome]);
	}

			if(!$mail->Send()) {
			  echo "Mailer Error: " . $mail->ErrorInfo;
			} else {
			  echo "Message sent!";
			}
echo "<script>alert('E-mail enviado com sucesso.');</script>";
}
?>
<html>
<head>
<title>:. HostAdmin v.2 - Tela de clientes .:</title>
<meta http-equiv='content-type' content='text/html; charset=iso-8859-1'>
<link rel='StyleSheet' href='temas/include/estilos.css' type='text/css'>
<script language='JavaScript' src='temas/include/js/coolmenus4.js'></script>
<script language='JavaScript' src='temas/include/js/stm31.js'></script>
<script language='JavaScript' src='temas/include/js/menu2.js'></script>
<script type="text/javascript" src="js/jquery-1.2.3.pack.js"></script>
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
<script>
function carregaContrato(){
	var contrato = document.programacao.contrato.value;
	ct = contrato.split('/');
	id = ct[0];
	$.get("infoContrato.php",{idProposta:id}, function(data){
		dt = data.split('|');
		document.programacao.cliente.value=dt[0];
		document.programacao.obra.value=dt[1];
		if(dt[2]=='N'){
			//if(confirm('ATENÇÃO\n Esta obra não encontra-se confirmada no Ecom!\nPara Confirmar aperte OK, Caso deseje manter o Status atual aperte Cancelar\nObrigado!')==true){
				$.post("ConfirmaPropostaMapaES.php",{id:id}, function(data){ alert(data);});  
			//}
		}
		
	});   
}
</script>
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
<table border='0' width='600' cellspacing='1' cellpadding='0'>
<tr>
<td width='600' validn='middle'>
<img src='imagens/layout_seta.gif' width="15" height="9"><b class=font-10>Programa&ccedil;&atilde;o de Entrada e Sa&iacute;da de Equipametos </b><br>
&nbsp;</td>
</tr>
<form action="form_entra_saida.php?send=1" method="post" name="programacao" id="programacao">
<input type='hidden' name='modulo' value='criado'>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>Consultor:</span></font></td>
</tr>
<tr>
<td width='600'><input name='consultor' type='text' value='<?=$login_nome?>' readonly class=form-especial id="consultor" onfocus=this.className='boxover' onblur=this.className='boxnormal' size='40' maxlength='255'></td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>Data: :</span></font></td>
</tr>
<tr>
<td width='600'><input name='data_d' type='text' class=form-especial id="data_d" onfocus=this.className='boxover' onblur=this.className='boxnormal' size='3' maxlength='2'>
/
<input name='data_m' type='text' class=form-especial id="data_m" onfocus=this.className='boxover' onblur=this.className='boxnormal' size='3' maxlength='2'>
/
<input name='data_a' type='text' class=form-especial id="data_a" onfocus=this.className='boxover' onblur=this.className='boxnormal' size='5' maxlength='4'>
dd/mm/aaaa </td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>Programar :</span></font></td>
</tr>
<tr>
<td width='600'><table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="16%"><input name="programar" type="radio" value="Sa&iacute;da">
Sada</td>
<td width="26%"><input name="programar" type="radio" value="Entrada">
Entrada</td>
<td width="58%"><span class="font-vinho">Para dia:
</span>
<input name='para_d' type='text' class=form-especial id="para_d" onfocus=this.className='boxover' onblur=this.className='boxnormal' size='3' maxlength='2'>
/
<input name='para_m' type='text' class=form-especial id="para_m" onfocus=this.className='boxover' onblur=this.className='boxnormal' size='3' maxlength='2'>
/
<input name='para_a' type='text' class=form-especial id="para_a" onfocus=this.className='boxover' onblur=this.className='boxnormal' size='5' maxlength='4'>
dd/mm/aaaa </td>
</tr>
</table></td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>Previsão de Obra :</span></font></td>
</tr>
<tr>
<td width='600'>
<input name='duracao' type='text' class=form-especial id="equipamento" onfocus=this.className='boxover' onblur=this.className='boxnormal' size='40' maxlength='255'></td>
</tr
><tr>
<td width='600'><font class=font-10><span class=font-vinho>Equipamento :</span></font></td>
</tr>
<tr>
<td width='600'>
<input name='equipamento' type='text' class=form-especial id="equipamento" onfocus=this.className='boxover' onblur=this.className='boxnormal' size='40' maxlength='255'></td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>Contrato :</span></font></td>
</tr>
<tr>
<td width='600'>
<input name='contrato' type='text' class=form-especial id="contrato" onfocus=this.className='boxover' onBlur="this.className='boxnormal';carregaContrato();" size='40' maxlength='30'></td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>Cliente :</span></font></td>
</tr>
<tr>
<td width='600'>
<input name='cliente' type='text' class=form-especial id="cliente" onfocus=this.className='boxover' onblur=this.className='boxnormal' size='40' maxlength='255'></td>
</tr>

<tr>
<td width='600'><font class=font-10><span class=font-vinho>Obra :</span></font></td>
</tr>
<tr>
<td width='600'><textarea name="obra" cols="40" rows="6" class=form-especial id="obra" onfocus=this.className='boxover' onblur=this.className='boxnormal'></textarea></td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>Alojamento :</span></font></td>
</tr>
<tr>
<td width='600'>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="16%"><input name="alojamento" type="radio" value="Escad">
Escad</td>
<td width="26%"><input name="alojamento" type="radio" value="Cliente">
Cliente</td>
<td width="58%">&nbsp;</td>
</tr>
</table>
</td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>Alimentação :</span></font></td>
</tr>
<tr>
<td width='600'><table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="16%"><input name="alimentacao" type="radio" value="Escad">
Escad</td>
<td width="26%"><input name="alimentacao" type="radio" value="Cliente">
Cliente</td>
<td width="58%">&nbsp;</td>
</tr>
</table>
</td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>Frete :</span></font></td>
</tr>
<tr>
<td width='600'><table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="16%"><input name="frete" type="radio" value="Escad">
Escad</td>
<td width="26%"><input name="frete" type="radio" value="Cliente">
Cliente</td>
<td width="58%">&nbsp;</td>
</tr>
</table></td>
</tr>
<tr>
<td><font class=font-10><span class=font-vinho>Operador :</span></font></td>
</tr>
<tr>
<td><table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="16%"><input name="operador" type="radio" value="Escad" onClick="MM_showHideLayers('empresadiv','','show')">
Escad</td>
<td width="26%"><input name="operador" type="radio" value="Cliente" onClick="MM_showHideLayers('empresadiv','','hide')">
Cliente</td>
<td width="58%"><div id="empresadiv" style="visibility:hidden"><span class="font-vinho">Empresa:</span> <select name="operador_select" class="form-especial" id="operador_select">
<option>Selecione uma empresa</option>
<option value="Escad">Escad</option>
<option value="SMG">SMG</option>
</select></div></td>
</tr>
</table></td>
</tr>
<tr>
<td><font class=font-vinho>Diesel : </font></td>
</tr>
<tr>
<td><table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="16%"><input name="diesel" type="radio" value="Escad">
Escad</td>
<td width="26%"><input name="diesel" type="radio" value="Cliente">
Cliente</td>
<td width="58%">&nbsp;</td>
</tr>
</table></td>
</tr>
<tr>
<td><font class=font-vinho>Estrutura F&iacute;sica de atendimento : </font></td>
</tr>
<tr>
<td width='600'><font class=font-10>
<input name='estrutura' type='text' class=form-especial id="estrutura" onfocus=this.className='boxover' onblur=this.className='boxnormal' size='60' maxlength='30'>
</font></td>
</tr>
<tr>
<td><font class=font-vinho>Observa&ccedil;&otilde;es : </font></td>
</tr>
<tr>
<td width='600'><textarea name="observacoes" cols="60" rows="6" class=form-especial id="observacoes" onfocus=this.className='boxover' onblur=this.className='boxnormal'></textarea></td>
</tr>
<tr>
<td>&nbsp;</td>
</tr>
<tr>
<td width='600'><input type='image' src='imagens/layout_btenviar.gif' width='54' height='16' border='0'></td>
</tr>
</form>
</table>
</div>
</td>
</tr>
<tr>
<td colspan='5' height='4'><br><center><span class='font-09'> 2004 - <?=date('Y');?> WEBPLAZA INTERNET. Todos os direitos reservados.</span></center><br></td>
</tr>
<tr>
<td colspan='5' height='4' bgcolor='#B6B6B6'><img border='0' src='temas/imagens/spacer.gif' width='1' height='1'></td>
</tr>
</table>
</center>
</body>
</html>
