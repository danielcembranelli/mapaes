<? 
include("verifica.php");
ini_set('max_execution_time','999999999999999999999');
//ini_set("SMTP","mail.cl07.mobimail.com");
ini_set("sendmail_from","obra@mapaes.escad.com.br");?>
<html>
<head>
<title>:. HostAdmin v.2 - Tela de clientes .:</title>
<meta http-equiv='content-type' content='text/html; charset=iso-8859-1'>
<link rel='StyleSheet' href='temas/include/estilos.css' type='text/css'>
<script language='JavaScript' src='temas/include/js/coolmenus4.js'></script>
<script language='JavaScript' src='temas/include/js/stm31.js'></script>
<script language='JavaScript' src='temas/include/js/menu2.js'></script>
<script type="text/javascript" src="js/jquery-1.2.3.pack.js"></script>

<script>
function carregaContrato(){
	var contrato = document.Obra.contrato.value;
	ct = contrato.split('/');
	id = ct[0];
	$.get("infoContrato.php",{idProposta:id}, function(data){
		dt = data.split('|');
		document.Obra.cliente.value=dt[0];
		document.Obra.endereco.value=dt[1];
		
	});   
}
function reativarContrato(id){
	//var contrato = document.Obra.contrato.value;
	//ct = contrato.split('/');
	//id = ct[0];
	var r=confirm("Deseja reativar o contrato?")
	if (r==true)
  	{
		$.get("_reativaContrato.php",{id:id}, function(data){
			if(data==1){
				alert('Obra re-ativada com sucesso!!');
			} else {
				alert('Erro ao reativar a obra!\n'+data);	
			}
		
			
		});   
	}
}
</script>		
</head>
<body bgcolor='#ffffff' leftmargin='0' topmargin='0' marginwidth='0' marginheight='0'>
<center>
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
<td colspan='5'><img src='temas/imagens/topobaixo.gif' width='774' height='23' border='0' alt=''></td>
</tr>
<tr>
<td colspan='5'>
<script language='javascript' src='include/ordena.js'></script>
<script language='javascript' src='include/dataform.js'></script>
<div id='dek'></div>
<script language='javascript' src='include/hint.js'></script><br><div align='center'>
<? if($_REQUEST[modulo]==criar){?>
<form method='POST' action='obra.php' name='Obra'>
<input type='hidden' name='modulo' value='cria'>

<table border='0' width='600' cellspacing='1' cellpadding='0'>
<tr>
<td width='600' validn='middle'>
<img src='imagens/layout_seta.gif' width="15" height="9"><b class=font-10>Adicionar obra</b><br>&nbsp;
</td>
</tr>

<tr>
<td width='600'><font class=font-10><span class=font-vinho>contrato :</span></font></td>
</tr>
<tr>
<td width='600'>
<input type='text' name='contrato' size='50' maxlength='150' class=form-especial onBlur="this.className='boxnormal';carregaContrato()" onfocus=this.className='boxover'><a href="#" onClick="carregaContrato();"><img src='imagens/layout_btbuscar.gif' width='54' height='16' border='0'></a></td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>cliente :</span></font></td>
</tr>
<tr>
<td width='600'>
<input type='text' name='cliente' size='50' maxlength='150' class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover'></td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>endereo :</span></font></td>
</tr>
<tr>
<td width='600'>
<textarea class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover' rows='5' name='endereco' cols='40'></textarea></td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>quantidade de equipamento :</span></font></td>
</tr>
<tr>
<td width='600'>
<input class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover' type=text name='quantidade' size='30' maxlength='60'></td>
</tr>
<tr>
<td width='600'><font class=font-10>&nbsp;</font></td>
</tr>
<tr>
<td width='600'><input type='image' src='imagens/layout_btcadastrar.gif' <? if($Pf[addObraPm]!='S'){?> disabled<? } ?> width='54' height='16' border='0'></td>
</tr>

</table>
</form>
<? } elseif($_POST[modulo]==cria){?>
<table border='0' width='600' cellspacing='1' cellpadding='0'>
<tr>
<td width='600' validn='middle'>
<img src='imagens/layout_seta.gif' width="15" height="9"><b class=font-10>Adicionar obra</b><br>&nbsp;
</td>
</tr>
<form method='POST' action='obra.php?modulo=insere'>
<input type='hidden' name='total' value='<? echo $quantidade ?>'>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>contrato :</span></font></td>
</tr>
<tr>
<td width='600'>
<input type='text' name='contrato' size='50' maxlength='150' class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover' value='<? echo $contrato ?>' readonly></td>
</tr>
<?
$sqlContrato = mysql_query("SELECT * FROM obra where contrato = '$_POST[contrato]' Limit 1");
$sqlContraton = mysql_num_rows($sqlContrato);
if ($sqlContraton>0){
?>
<tr>
<td width='600'>
<font class="font-azul">j� existe lan�amento com esse n�mero de contrato</font>
</td>
</tr>
<? } ?>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>data de inicio da obra :</span></font></td>
</tr>
<tr>
<td width='600'>
<input type='text' name='dtInicioObra' size='12' maxlength='10' class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover' value='<?=date('d/m/Y');?>'></td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>cliente :</span></font></td>
</tr>
<tr>
<td width='600'>
<input type='text' name='cliente' size='50' maxlength='150' class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover' value='<? echo $cliente ?>'></td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>endere�o :</span></font></td>
</tr>
<tr>
<td width='600'>
<textarea class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover' rows='5' name='endereco' cols='40'><?=$_POST[endereco]?></textarea></td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>p�tio responsvel pela obra:</span></font></td>
</tr>
<tr>
<td width='600'>
<select size="1" name="patio" class=form-especial>
<?
$noticia = mysql_query("SELECT * FROM patio order by NOME_PATIO");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conexo<?
}
else{
if ($notician==0){
?>Nada Consta<? } else { ?><? while ($dom = mysql_fetch_array($noticia)){ ?>
<option  value="<? echo $dom[ID_PATIO] ?>"><? echo $dom[NOME_PATIO] ?></option>
<?  } } } ?>
</select>
</td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>mec�nico responsvel pela obra:</span></font></td>
</tr>
<tr>
<td width='600'>
<select size="1" name="idMecanico" class=form-especial>
<option value="">Selecione o mec�nico</option>
<?
$noticia = mysql_query("SELECT idMecanico, nomeMecanico FROM mecanico where statusMecanico='A' order by nomeMecanico");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conexo<?
}
else{
if ($notician==0){
?>Nada Consta<? } else { ?><? while ($dom = mysql_fetch_array($noticia)){ ?>
<option  value="<? echo $dom[idMecanico] ?>"><? echo $dom[nomeMecanico] ?></option>
<?  } } } ?>
</select>
</td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>alojamento da obra:</span></font></td>
</tr>
<tr>
<td width='600'>
<select size="1" name="alojamento" class=form-especial>
<option value="E">Escad</option>
<option value="C" selected>Cliente</option>
</select>
</td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>alimenta��o da obra:</span></font></td>
</tr>
<tr>
<td width='600'>
<select size="1" name="alimentacao" class=form-especial>
<option value="E">Escad</option>
<option value="C" selected>Cliente</option>
</select>
</td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>equipamentos destinados para obra :</span></font><br></td>
</tr>
<?  for($i=0; $i< $quantidade; $i++) { ?>
<tr>
<td width='600'>
<table width="100%">
<tr>
<td bgcolor="#CCCCCC" colspan="2">
<font class=font-10><span class=font-vinho>&nbsp;Equipamento <? echo $a++ +1 ?> :</span></font><br>
</td>
</tr>
<tr>
<td>
Equipamento:
</td>
<td>
<select size="1" name="equipamento[]" class=form-especial>
<?
$noticia = mysql_query("SELECT * FROM equipamento where ativo = 'd' And `excluido` != 's' order by codigo");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conexo<?
}
else{
if ($notician==0){
?>Nada Consta<? } else { ?><? while ($dom = mysql_fetch_array($noticia)){ ?>
<option  value="<? echo $dom[id] ?>"><? echo $dom[codigo] ?></option>
<?  } } } ?>
</select>
</td>
</tr>
<tr>
<td>
Acessrio:
</td><td><select size="1" name="acessorio[]" class=form-especial>
<option  value="nda">Sem acessrio</option>
<?
$noticia = mysql_query("SELECT * FROM acessorio where ativo = 'd' And `excluido` != 's' order by codigo");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conexo<?
}
else{
if ($notician==0){
?>Nada Consta<? } else { ?><? while ($dom = mysql_fetch_array($noticia)){ ?>
<option  value="<? echo $dom[id] ?>"><? echo $dom[codigo] ?></option>
<?  } } } ?>
</select>
</td>
</tr>
<tr>
<td>
Acessrio 2 :</td><td> <select size="1" name="acessorio2[]" class=form-especial>
<option  value="nda">Sem acessrio</option>
<?
$noticia = mysql_query("SELECT * FROM acessorio where ativo = 'd' And `excluido` != 's' order by codigo");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conexo<?
}
else{
if ($notician==0){
?>Nada Consta<? } else { ?><? while ($dom = mysql_fetch_array($noticia)){ ?>
<option  value="<? echo $dom[id] ?>"><? echo $dom[codigo] ?></option>
<?  } } } ?>
</select>
</td>
</tr>
<tr>
<td>
Ptio Responsvel pelo Eqpto:
</td>
<td>
<select size="1" name="patio_eqpto[]" class=form-especial>
<?
$noticia = mysql_query("SELECT * FROM patio order by NOME_PATIO");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conexo<?
}
else{
if ($notician==0){
?>Nada Consta<? } else { ?><? while ($dom = mysql_fetch_array($noticia)){ ?>
<option  value="<? echo $dom[ID_PATIO] ?>"><? echo $dom[NOME_PATIO] ?></option>
<?  } } } ?>
</select>
</td>
</tr>
<tr>
<td>
Operador:
</td><td>
<select size="1" name="nosso[]">
<option selected value="s">Escad</option>
<option value="n">Cliente</option>
</select>
</td>
</tr>
<tr>
<td>
Data Incio:</td><td><input class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover' type=text name='inicio[]' size='10' maxlength='10'>
</td>
</tr>
<tr>
<td>
Nome do operador:</td><td>
<select size="1" name="operador[]" class=form-especial>
<option selected value="">Escolha o operador...</option>
<?
$noticia = mysql_query("SELECT * FROM operador where statusOperador = 'A' order by nome");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conexo<?
}
else{
if ($notician==0){
?>Nada Consta<? } else { ?><? while ($dom = mysql_fetch_array($noticia)){ ?>
<option  value="<? echo $dom[id] ?>"><? echo $dom[nome] ?></option>
<?  } } } ?>
<option  value="cliente">Cliente</option>
</select>
</td>
</tr>
<tr>
<td>
Horimetro Inicio: </td><td><input class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover' type=text name='horimetro_ida[]' size='10' maxlength='60'>
</td>
</tr>
<tr>
<td>
Ponto:</td><td> <input class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover' type=text name='ponto[]' size='10' maxlength='60'>
</td>
</tr>
<tr>
<td colspan="2">
<font class=font-10><span class=font-vinho>equipamento de transporte :</span></font>
</td>
</tr>
<tr>
<td>
Operador:</td><td>
<select size="1" name="motorista[]">
<option selected value="">Escolha o motorista...</option>
<?
$noticia = mysql_query("SELECT * FROM operador where statusOperador = 'A' order by nome");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conexo<?
}
else{
if ($notician==0){
?>Nada Consta<? } else { ?>
<? while ($dom = mysql_fetch_array($noticia)){ ?>
<option  value="<? echo $dom[id] ?>"><? echo $dom[nome] ?></option>
<?  } } } ?>
<option  value="cliente">Cliente</option>
<option  value="Terceiro">Terceiro</option>
</select>
</td>
</tr>
<tr>
<td>
Transporte:
</td><td>
<select size="1" name="caminhao[]">
<option selected value="">Escolha o caminho...</option>
<?
$noticia = mysql_query("SELECT * FROM caminhao order by codigo");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conexo<?
}
else{
if ($notician==0){
?>Nada Consta<? } else { ?>
<? while ($dom = mysql_fetch_array($noticia)){ ?>
<option  value="<? echo $dom[id] ?>"><? echo $dom[codigo] ?></option>
<?  } } } ?>

<option  value="Terceiro">Terceiro</option>
<option  value="cliente">Cliente</option>
<option  value="rodando">Rodando</option>
</select>
</td>
</tr>
</table>
</td>
</tr>
<? } ?>
<tr>
<td width='600'><font class=font-10>&nbsp;</font></td>
</tr>
<tr>
<td width='600'><input type='image' src='imagens/layout_btcadastrar.gif' width='54' height='16' border='0'></td>
</tr>
</form>
</table>
<? } elseif($modulo==insere){?>
<table border='0' width='600' cellspacing='1' cellpadding='0'>
<?
$endereco=nl2br($endereco);
$data = date("Y-m-d");
$inicioa = date("Y-m-d");
$status = "a";

$pro = explode('/',$contrato);
$sql = mysql_query ("INSERT INTO `obra` (`contrato` , `cliente` , `inicio` , `fim` , `status`, `endereco`, `patio`, `idMecanico`,`idProposta`,`alojamento`,`alimentacao` )
VALUES ('$contrato','$cliente', '".dataSql($_POST[dtInicioObra])."', '', '$status', '$endereco', '$patio', '$idMecanico','$pro[0]', '$alojamento', '$alimentacao'
);");
$obra = mysql_insert_id();
///Calcula Previs�o
$Sql = mysql_query("SELECT previsaoProposta, tipoprevisaoProposta FROM proposta where idProposta='".$pro[0]."'") or die (mysql_error());
$dom = mysql_fetch_array($Sql);
	
	$dtPrevisao = CalculaDias($dom[tipoprevisaoProposta],$_POST[dtInicioObra],$dom[previsaoProposta]);
	//echo $dom[dtini].' '.CalculaDias($dom[tipoprevisaoProposta],$dom[dtini],$dom[previsaoProposta]).'<br>';
	$AlteraDataInicio = mysql_query("Update proposta set dtiniProposta='".dataSql($_POST[dtInicioObra])."', dtprevisaoProposta='".$dtPrevisao."' where idProposta='".$pro[0]."'");

if (!$sql){
echo "No foi possivel a consulta.";}
else{

?>
<tr>
<td width='600'><center><font class=font-10><b class=font-vinho><br> A obra foi adicionado com sucesso!<br><br></b>
</font></center></td>
</tr>
<? } ?>
<? for($i = 0; $i < count($equipamento); $i++){ ?>
<?
if(!$equipamento[$i]){ } else {
$status = "a";
$data = date("Y-m-d");
$status_eqpto = status_eqpto($equipamento[$i]);
$sql = mysql_query ("INSERT INTO equipamento_obra (obra,equipamento,acessorio2,acessorio,nosso,operador,status,inicio,horimetro_ida,ponto,GARAGEM_INICIO,PATIO, dtinicioRel) VALUES ('$obra','$equipamento[$i]','$acessorio2[$i]','$acessorio[$i]','$nosso[$i]','$operador[$i]','$status','$inicio[$i]','$horimetro_ida[$i]','$ponto[$i]','$status_eqpto','$patio_eqpto[$i]',NOW());");
echo $nrEqpto = mysql_insert_id();
gravaSml($equipamento[$i],'9','Inicio de Obra:'.$obra);
if (!$sql){
echo "No foi possivel a consulta.";}
else{
?>
<tr>
<td width='600'><center><font class=font-10><b class=font-vinho><br> O equipamento foi adicionado com sucesso a obra !<br><br></b>
</font></center></td>
</tr>
<? }

$sql6 = mysql_query("INSERT INTO `caminhao_obra` ( `id` , `obra` , `equipamento` , `caminhao` , `motorista` , `data` ) VALUES ('', '$obra', '$nrEqpto', '$caminhao[$i]', '$motorista[$i]', '$data');") or die ('Erro ao cadastrar o frete: '.mysql_error());
if (!$sql6){
echo "No foi possivel a consulta.";}
else{
?>
<tr>
<td width='600'><center><font class=font-10><b class=font-vinho><br> Frete adicionado com sucesso a obra !<br><br></b>
</font></center></td>
</tr>
<? }
$sql2 = mysql_query("UPDATE equipamento SET status='9', ativo='o' WHERE id='$equipamento[$i]' LIMIT 1;");
if (!$sql2){
echo "No foi possivel a consulta.";}
else{
?>
<tr>
<td width='600'><center><font class=font-10><b class=font-vinho><br> Alterado o Status do Equipamento!<br><br></b>
</font></center></td>
</tr>
<? }
$sql3 = mysql_query("UPDATE operador SET status='b' WHERE id='$operador[$i]' LIMIT 1;");
if ($sql3){
?>
<tr>

<td width='600'><center><font class=font-10><b class=font-vinho><br> Alterado o Status do Operador !<br><br></b>
</font></center></td>
</tr>
<? }
$sql4 = mysql_query("UPDATE acessorio SET status='9', ativo='o' WHERE id='$acessorio[$i]' LIMIT 1;");
if ($sql4){
?>
<tr>
<td width='600'><center><font class=font-10><b class=font-vinho><br> Alterado o Status do Acessrio !<br><br></b>
</font></center></td>
</tr>
<? }
$sql5 = mysql_query("UPDATE acessorio SET status='9', ativo='o' WHERE id='$acessorio2[$i]' LIMIT 1;");
if ($sql5){
?>
<tr>
<td width='600'><center><font class=font-10><b class=font-vinho><br> Alterado o Status do 2 Acessrio !<br><br></b>
</font></center></td>
</tr>
<? }
}
?>
<? } 

$msg = EnviaInicioDeObra($obra);
$headers = "MIME-Version: 1.0\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\n";
$headers .= "From: MAPAES <mapaes@escad.com.br>\n";
/* Enviando a mensagem */
$SqlEmail = mysql_query("SELECT emailUsuario FROM login where emailobraUsuario='S'");
while ($sq = mysql_fetch_array($SqlEmail)){

	mail($sq[emailUsuario], "MAPAES: Inicio de Obra CONTRATO: ".$contrato." CLIENTE: ".$cliente, $msg, $headers);
}

//mail("aline@escad.com.br", "MAPAES: Inicio de Obra CONTRATO: ".$contrato." CLIENTE: ".$cliente, $msg, $headers);
//mail("aline.b.lima@hotmail.com", "MAPAES: Inicio de Obra CONTRATO: ".$contrato." CLIENTE: ".$cliente, $msg, $headers); 
//mail("nadiclecio@escad.com.br", "MAPAES:  Inicio de Obra CONTRATO: ".$contrato." CLIENTE: ".$cliente, $msg, $headers);
//mail("alisson@escad.com.br", "MAPAES:  Inicio de Obra CONTRATO: ".$contrato." CLIENTE: ".$cliente, $msg, $headers);
//mail("grace@escad.com.br", "MAPAES:  Inicio de Obra CONTRATO: ".$contrato." CLIENTE: ".$cliente, $msg, $headers);
//mail("renata@escad.com.br", "MAPAES:  Inicio de Obra CONTRATO: ".$contrato." CLIENTE: ".$cliente, $msg, $headers);
//mail("barbara@escad.com.br", "MAPAES:  Inicio de Obra CONTRATO: ".$contrato." CLIENTE: ".$cliente, $msg, $headers);
//mail("jessica@escad.com.br", "MAPAES:  Inicio de Obra CONTRATO: ".$contrato." CLIENTE: ".$cliente, $msg, $headers);
//mail("edvaldo@escad.com.br", "MAPAES:  Inicio de Obra CONTRATO: ".$contrato." CLIENTE: ".$cliente, $msg, $headers);
//mail("leticia@escad.com.br", "MAPAES:  Inicio de Obra CONTRATO: ".$contrato." CLIENTE: ".$cliente, $msg, $headers);
//mail("mapaes@escad.com.br", "MAPAES: Inicio de Obra CONTRATO: ".$contrato." CLIENTE: ".$cliente, $msg, $headers); 
//mail("rodrigo.santos@escad.com.br", "MAPAES: Inicio de Obra CONTRATO: ".$contrato." CLIENTE: ".$cliente, $msg, $headers); 

?>


<script>//window.setTimeout('changeurl();',2000); function changeurl(){window.location='index.php';}</script>
</table>
<? estatitica("Insere Obra") ?>
<? } elseif($_REQUEST[modulo]=='editar'){?>
<?
if($chave!=''){
$data = date("Y-m-d");
$vari = explode('#',$chave);
$novopatio = $vari[0];
$altera_tabela = mysql_query("UPDATE `obra` SET `patio` = '$novopatio' WHERE `id` = $obra LIMIT 1 ;");
$insere_log = mysql_query("INSERT INTO `log_obra_patio` ( `ID_LOG` , `ID_OBRA` , `PATIO` , `NOVOPATIO` , `DATA` )
VALUES (
'', '$obra', '$patiovelho', '$novopatio', '$data'
);");
}
if($idMecanico!=''){
$altera_tabela = mysql_query("UPDATE `obra` SET `idMecanico` = '$idMecanico' WHERE `id` = $obra LIMIT 1 ;");
}
?>
<?
if($acao=='endereco')
{
$endereco=nl2br($endereco);
$pro = explode('/',$contrato);
$altera_tabela = mysql_query("UPDATE `obra` SET `idProposta` = '$pro[0]',`alojamento` = '$alojamento',`alimentacao` = '$alimentacao',`contrato` = '$contrato',`endereco` = '$endereco', cliente='$cliente' WHERE `id` = $obra LIMIT 1 ;");
}
$sqlobra = mysql_query("SELECT * FROM obra o left join proposta p on (o.idProposta=p.idProposta) left join clientes c on (c.Cli_ID=p.idCliente) left join login l on (l.id=p.idVendedor) where o.id = '$obra'");
$ob = mysql_fetch_array($sqlobra);
$qnoticia = mysql_query("SELECT A.*, B.codigo, C.nome As nomefamilia  FROM equipamento_obra A inner join equipamento B on (A.equipamento=B.id) left join familia C on (B.familia=C.id) where obra = '$obra'");
$qnotician = mysql_num_rows($noticia);
if (!$qnoticia){
?>Problemas na conexo<?
}
else{
if ($qnotician==0){
?>
<table border='0' width='730' cellspacing='1' cellpadding='0'>
<tr>
<td width='730' validn='middle' colspan='7'>
<img src='imagens/layout_seta.gif' width="15" height="9"><b class=font-10>Visualizar equipamento</b><br>&nbsp;
</td>
</tr>
<tr>
<td width='730' bgcolor='#FFFFFF' colspan='5'><font class=font-11><span class=font-azul><center>no existe nenhum equipamento para est consulta</center></span></font></td>
</tr>
</table>
<?
}else {
?>
<table border='0' width='600' cellspacing='1' cellpadding='0'>
<tr>
<td width='600' validn='middle'>
<img src='imagens/layout_seta.gif' width="15" height="9"><b class=font-10>Editar obra</b><br>&nbsp;
</td>
</tr>
<? if($Pf[editObraPm]!='N'){?>
<form method='POST' action='obra.php?modulo=editar&obra=<? echo $obra ?>&acao=endereco'>
<? } ?>
<script>
function altera_patio(dado){
if(confirm('Confirma alterao do P�tio ??')){
parent.top.window.location.href='obra.php?modulo=editar&obra=<? echo $obra ?>&patiovelho=<? echo $ob[patio] ?>&chave='+dado;
return true
} else {
return false
}
}
function altera_mecanico(dado){
if(confirm('Confirma alterao do Mec�nico ??')){
parent.top.window.location.href='obra.php?modulo=editar&obra=<? echo $obra ?>&idMecanico='+dado;
return true
} else {
return false
}
}
</script>
<input type='hidden' name='obra' value='<? echo $obra ?>'>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>contrato :</span></font></td>
</tr>
<tr>
<td width='600'>
<input class=form-especial onblur=this.className='boxnormal' <? if($Pf[editObraPm]=='N'){?>disabled<? } ?> onfocus=this.className='boxover' value="<? echo $ob[contrato] ?>" type=text name='contrato' size='50'></td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>cliente :</span></font></td>
</tr>
<tr>
<td width='600'>
<? if($ob[Cli_Nome]!=''){?>
<b><? echo $ob[Cli_Nome]?></b><br>
CNPJ: <? echo $ob[Cli_CGC]?><br>
I.E.: <? echo $ob[Cli_Inscricao]?><br>
<br>
<br>
<font class=font-10><span class=font-vinho>previs�o at� <?=data($ob[dtprevisaoProposta])?></span></font>
<br><br>
<input class=form-especial onblur=this.className='boxnormal' <? if($Pf[editObraPm]=='N'){?>disabled<? } ?> onfocus=this.className='boxover' value="<? echo $ob[cliente]?>" type='hidden' name='cliente' size='50'>
<? } else {?>
<input class=form-especial onblur=this.className='boxnormal' <? if($Pf[editObraPm]=='N'){?>disabled<? } ?> onfocus=this.className='boxover' value="<? echo $ob[cliente]?>" type=text name='cliente' size='50'>
<? } ?>
</td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>p�tio :</span></font></td>
</tr>
<tr>
<td width='600'>
<select size="1" <? if($ob[status]!='a'){?>DISABLED<? } ?> <? if($Pf[editObraPm]=='N'){?>disabled<? } ?> onChange="if(options[selectedIndex].value) altera_patio((options[selectedIndex].value))">
<?
$noticia = mysql_query("SELECT * FROM patio order by NOME_PATIO");
$notician = mysql_num_rows($noticia);
while ($dom = mysql_fetch_array($noticia)){
$cor = ($coralternada++ %2 ? "FFFFFF" : "FFFFDC");
?>
<option value="<? echo $dom[ID_PATIO]?>#<? echo $ob[patio]?>" <? if($ob[patio]==$dom[ID_PATIO]){?>selected<? }?>><? echo $dom[NOME_PATIO]?></option>
<? } ?>
<option <? if($ob[patio]==""){?>selected="selected"<? } ?>>Selecione um p�tio</option>
</select>
</td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>mec�nico :</span></font></td>
</tr>
<tr>
<td width='600'>
<select size="1" <? if($ob[status]!='a'){?>DISABLED<? } ?> <? if($Pf[editObraPm]=='N'){?>disabled<? } ?> onChange="if(options[selectedIndex].value) altera_mecanico((options[selectedIndex].value))">

<option value="">Selecione o mec�nico</option>
<?
$noticia = mysql_query("SELECT * FROM mecanico order by nomeMecanico");
$notician = mysql_num_rows($noticia);
while ($dom = mysql_fetch_array($noticia)){
$cor = ($coralternada++ %2 ? "FFFFFF" : "FFFFDC");
?>
<option value="<? echo $dom[idMecanico]?>" <? if($ob[idMecanico]==$dom[idMecanico]){?>selected<? }?>><? echo $dom[nomeMecanico]?></option>
<? } ?>
<option <? if($ob[idMecanico]=="0"){?>selected="selected"<? } ?>>Selecione um mec�nico</option>
</select>
</td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>vendedor :</span></font></td>
</tr>
<tr>
<td width='600'>
<font class=font-10><span class=font-azul><?=$ob[nome]?></span></font>
</td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>alojamento da obra:</span></font></td>
</tr>
<tr>
<td width='600'>
<select size="1" name="alojamento" class=form-especial>
<option value="E" <? if($ob[alojamento]=="E"){?>selected="selected"<? } ?>>Escad</option>
<option value="C" <? if($ob[alojamento]=="C"){?>selected="selected"<? } ?>>Cliente</option>
</select>
</td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>alimenta��o da obra:</span></font></td>
</tr>
<tr>
<td width='600'>
<select size="1" name="alimentacao" class=form-especial>
<option value="E" <? if($ob[alimentacao]=="E"){?>selected="selected"<? } ?>>Escad</option>
<option value="C" <? if($ob[alimentacao]=="C"){?>selected="selected"<? } ?>>Cliente</option>
</select>
</td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>endere�o :</span></font></td>
</tr>
<tr>
<td width='600'>
<textarea class=form-especial onblur=this.className='boxnormal' <? if($Pf[editObraPm]=='N'){?>disabled<? } ?> onfocus=this.className='boxover' rows='5' name='endereco' cols='80'><? echo strip_tags($ob[endereco]) ?></textarea>
<br>

<input type='image'  <? if($Pf[editObraPm]=='N'){?>disabled<? } ?> src='imagens/layout_bteditar.gif' width='54' height='16' border='0'></td>
</tr>
<tr>
<td width='600'>&nbsp;
</td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>equipamentos destinados para obra :</span></font></td>
</tr>
<? while ($qdom = mysql_fetch_array($qnoticia)){ ?>
<tr>
<td width='600'>
Equipamento: <b><?=$qdom[codigo]?> - <?=$qdom[nomefamilia]?></b><br>
Operador: <b>
<? if($qdom[operador]==cliente){?>
Cliente
<? } else {?>
<?
$noticia = mysql_query("SELECT * FROM operador where id = $qdom[operador]");
$notician = mysql_num_rows($noticia);
if ($notician==0){
?>Nada Consta
<? } else { ?>
<? while ($dom = mysql_fetch_array($noticia)){ ?>
<? echo $dom[nome] ?>
<?  }  } ?>
<? } ?>
</b>
<br>
H Inicio: <input disabled class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover' value="<? echo $qdom[horimetro_ida]?>" type=text name='horimetro_ida[]' size='10' maxlength='60'>
<? if($qdom[status]=='b'){?>&nbsp;&nbsp;H Retorno: <input disabled class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover' value="<? echo $qdom[horimetro_volta]?>" type=text name='horimetro_volta' size='10' maxlength='60'> <? } ?>
<? if($Pf[editeObraPm]=='S'){?><a href='?modulo=edita&equipamento=<? echo $qdom[id]?>'><img src='imagens/layout_bteditarepto.gif' width='60' height='16' border='0'></a><? } ?>
<? if($qdom[status]=='a'){?>
	<? if($Pf[changeeObraPm]=='S'){?><a href='?modulo=muda&equipamento=<? echo $qdom[id]?>'><img src='imagens/layout_btmudareqpto.gif' width='60' height='16' border='0'></a><? } ?>
    
    
    
    
	<? if($Pf[doneeObraPm]=='S'){?><a href='?modulo=equipamento&equipamento=<? echo $qdom[id]?>'><img src='imagens/layout_btfinalizarepto.gif' width='60' height='16' border='0'></a>
    <? } ?>
<? } ?>
    <? if($qdom[status]=='b'){?>
	<? if($Pf[excluiObraPm]=='S'){?><a href='?modulo=excluirEqpto&equipamento=<? echo $qdom[id]?>'><img src='imagens/layout_btexcluir.gif' border='0'></a><? } }?>

</td>
</tr>
<? } ?>
<tr>
<td width='600'><font class=font-10>&nbsp;</font></td>
</tr>
</form>
</table>
<? } } ?>
<? estatitica("Lista Equipamento da Obra") ?>
<? } elseif($modulo==muda){?>
<?
$qnoticia = mysql_query("SELECT * FROM equipamento_obra where id = '$equipamento'");
$qnotician = mysql_num_rows($noticia);
if (!$qnoticia){
?>Problemas na conexo<?
}
else{
if ($qnotician==0){
?>
<table border='0' width='730' cellspacing='1' cellpadding='0'>
<tr>
<td width='730' validn='middle' colspan='7'>
<img src='imagens/layout_seta.gif' width="15" height="9"><b class=font-10>Visualizar equipamento</b><br>&nbsp;
</td>
</tr>
<tr>
<td width='730' bgcolor='#FFFFFF' colspan='5'><font class=font-11><span class=font-azul><center>no existe nenhum equipamento para est consulta</center></span></font></td>
</tr>
</table>
<?
}else {
?>
<table border='0' width='600' cellspacing='1' cellpadding='0'>
<tr>
<td width='600' validn='middle'>
<img src='imagens/layout_seta.gif' width="15" height="9"><b class=font-10>Mudar equipamento de obra</b><br>&nbsp;
</td>
</tr>
<form method='POST' action='obra.php?modulo=cmuda'>
<input type='hidden' name='id' value='<? echo $equipamento ?>'>
<input type='hidden' name='operador' value='cliente'>

<? while ($qdom = mysql_fetch_array($qnoticia)){ ?>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>equipamento:</span></font></td>
</tr>
<tr>
<td width='600'>
<select size="1" name="equipamento" class=form-especial>
<?
$noticia = mysql_query("SELECT * FROM equipamento where id = $qdom[equipamento]");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conexo<?
}
else{
if ($notician==0){
?>Nada Consta<? } else { ?><? while ($dom = mysql_fetch_array($noticia)){ ?>
<option  value="<? echo $dom[id] ?>"><? echo $dom[codigo] ?></option>
<?  } } } ?>
</select>
</td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>contrato de destino:</span></font></td>
</tr>
<tr>
<td width='600'>
<select size="1" name="obravai" class=form-especial>
<?
$noticia = mysql_query("SELECT id, contrato, cliente FROM obra where status='a'");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conexo<?
}
else{
if ($notician==0){
?>Nada Consta<? } else { ?><? while ($dom = mysql_fetch_array($noticia)){ ?>
<option  value="<? echo $dom[id] ?>"><? echo $dom[contrato] ?> - <? echo $dom[cliente] ?></option>
<?  } } } ?>
</select>
</td>
<tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho><input type="checkbox" name="chMuda" value="S" id="cdMuda"><label for="cdMuda">manter data do contrato</label></span></font></td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>Data de volta:</span></font></td>
</tr>
<tr>
<td width='600'>
<input class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover' type=text name='volta' size='10' maxlength='10' onFocus="javascript:vDateType='3';this.className='boxover';" onKeyUp="DateFormat(this,this.value,event,false,'3')" onChange="DateFormat(this,this.value,event,true,'3')">
</td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>Horimetro Atual:</span></font></td>
</tr>
<tr>
<td width='600'>
<input class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover' value="<? echo $qdom[horimetro_volta]?>" type=text name='horimetro_volta' size='10' maxlength='60'>
</td>
</tr>
<tr>
<td width='600'>
<br>
<br><font class=font-10><span class=font-vinho>equipamento :</span></font><br>
Operador:
<select size="1" name="motorista">
<option selected value="">Escolha o motorista...</option>
<?
$noticia = mysql_query("SELECT * FROM operador where statusOperador = 'A' order by nome");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conexo<?
}
else{
if ($notician==0){
?>Nada Consta<? } else { ?>
<? while ($dom = mysql_fetch_array($noticia)){ ?>
<option  value="<? echo $dom[id] ?>"><? echo $dom[nome] ?></option>
<?  } } } ?>
<option  value="cliente">Cliente</option>
<option  value="Terceiro">Terceiro</option>
</select><br>
Transporte:
<select size="1" name="caminhao">
<option selected value="">Escolha o caminho...</option>
<?
$noticia = mysql_query("SELECT * FROM caminhao order by codigo");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conexo<?
}
else{
if ($notician==0){
?>Nada Consta<? } else { ?>
<? while ($dom = mysql_fetch_array($noticia)){ ?>
<option  value="<? echo $dom[id] ?>"><? echo $dom[codigo] ?></option>
<?  } } } ?>
<option  value="Terceiro">Terceiro</option>
<option  value="cliente">Cliente</option>
<option  value="rodando">Rodando</option>
</select><br>
</td>
</tr>
<? } ?>
<tr>
<td width='600'><font class=font-10>&nbsp;</font></td>
</tr>
<tr>
<td width='600'><input type='image' src='imagens/layout_bteditar.gif' width='54' height='16' border='0'></td>
</tr>
</form>
</table>
<? } } ?>
<?
} elseif($modulo=='cmuda'){
	
	if($_POST[cdMuda]=='S'){
		
		$sql = mysql_query("UPDATE equipamento_obra SET obra='$_POST[obravai]' WHERE id='$_POST[id]' LIMIT 1;");
		
		
	} else {
		
		
				
		$dt = explode("/",$_POST[volta]);
		$data = $dt[2].'-'.$dt[1].'-'.$dt[0];
		echo $_POST[id].'-'.$_POST[obravai].'-'.$_POST[horimetro_volta];
		$sql = mysql_query("UPDATE equipamento_obra SET status='b', dtvoltaRel=NOW(), fim='$data', horimetro_volta='$_POST[horimetro_volta]' WHERE id='$_POST[id]' LIMIT 1;");
		
		$sql6 = mysql_query("INSERT INTO `caminhao_obra` ( `id` , `obra` , `equipamento` , `caminhao` , `motorista` , `data` ) VALUES ('', 'volta', '$_POST[id]', '$_POST[caminhao]', '$_POST[motorista]', '$data');");
		gravaSml($equipamento,'9','Muda de Obra:'.$_POST[obravai]);
		
		
		$SqlObra = mysql_query("SELECT e.acessorio, e.acessorio2, e.operador, e.ponto, e.PATIO FROM equipamento_obra e where e.id='".$_POST[id]."';");
		$sE = mysql_fetch_array($SqlObra);
		
		
		$sql = mysql_query ("INSERT INTO equipamento_obra (obra,equipamento,inicio,horimetro_ida,status,operador, acessorio, acessorio2, ponto, PATIO) VALUES ('$_POST[obravai]','$equipamento','$data','$_POST[horimetro_volta]','a','".$sE[operador]."','".$sE[acessorio]."','".$sE[acessorio2]."','".$sE[ponto]."','".$sE[PATIO]."');");
		$key = mysql_insert_id();
		
		$sql6 = mysql_query("INSERT INTO `caminhao_obra` ( `id` , `obra` , `equipamento` , `caminhao` , `motorista` , `data` ) VALUES ('', '$_POST[obravai]', '$key', '$_POST[caminhao]', '$_POST[motorista]', '$data');") or die ('Erro ao cadastrar o frete: '.mysql_error());

	}

if($sql>0){?>
<table border='0' width='600' cellspacing='1' cellpadding='0'>
<tr>
<td width='600'><center><font class=font-10><b class=font-vinho><br> O equipamento foi movido com sucesso para a obra !<br><br></b>
</font></center></td>
</tr>
</table>
<script>window.setTimeout('changeurl();',2000); function changeurl(){window.location='index.php';}</script>
<?
}
} elseif($modulo==equipamento){?>
<?
$qnoticia = mysql_query("SELECT * FROM equipamento_obra where id = '$equipamento'");
$qnotician = mysql_num_rows($noticia);
if (!$qnoticia){
?>Problemas na conexo<?
}
else{
if ($qnotician==0){
?>
<table border='0' width='730' cellspacing='1' cellpadding='0'>
<tr>
<td width='730' validn='middle' colspan='7'>
<img src='imagens/layout_seta.gif' width="15" height="9"><b class=font-10>Visualizar equipamento</b><br>&nbsp;
</td>
</tr>
<tr>
<td width='730' bgcolor='#FFFFFF' colspan='5'><font class=font-11><span class=font-azul><center>no existe nenhum equipamento para est consulta</center></span></font></td>
</tr>
</table>
<?
}else {
?>
<table border='0' width='600' cellspacing='1' cellpadding='0'>
<tr>
<td width='600' validn='middle'>
<img src='imagens/layout_seta.gif' width="15" height="9"><b class=font-10>Inativar equipamento em obra</b><br>&nbsp;
</td>
</tr>
<form method='POST' action='obra.php?modulo=editado'>
<input type='hidden' name='id' value='<? echo $equipamento ?>'>
<? while ($qdom = mysql_fetch_array($qnoticia)){ ?>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>equipamento:</span></font></td>
</tr>
<tr>
<td width='600'>
<select size="1" name="equipamento" class=form-especial>
<?
$noticia = mysql_query("SELECT * FROM equipamento where id = $qdom[equipamento]");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conexo<?
}
else{
if ($notician==0){
?>Nada Consta<? } else { ?><? while ($dom = mysql_fetch_array($noticia)){ ?>
<option  value="<? echo $dom[id] ?>"><? echo $dom[codigo] ?></option>
<?  } } } ?>
</select>
</td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>acessrio:</span></font></td>
</tr>
<tr>
<td width='600'>
<select size="1" name="acessorio" class=form-especial>
<?
$noticia = mysql_query("SELECT * FROM acessorio where id = $qdom[acessorio]");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conexo<?
}
else{
if ($notician==0){
?>Nada Consta<? } else { ?><? while ($dom = mysql_fetch_array($noticia)){ ?>
<option  value="<? echo $dom[id] ?>"><? echo $dom[codigo] ?></option>
<?  } } } ?>
</select>
</td>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>acessrio 2:</span></font></td>
</tr>
<tr>
<td width='600'>
<select size="1" name="acessorio2" class=form-especial>
<?
$noticia = mysql_query("SELECT * FROM acessorio where id = $qdom[acessorio2]");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conexo<?
}
else{
if ($notician==0){
?>Nada Consta<? } else { ?><? while ($dom = mysql_fetch_array($noticia)){ ?>
<option  value="<? echo $dom[id] ?>"><? echo $dom[codigo] ?></option>
<?  } } } ?>
</select>
</td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>Data de volta:</span></font></td>
</tr>
<tr>
<td width='600'>
<input class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover' type=text name='volta' size='10' maxlength='10'>
</td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>Motivo da volta:</span></font></td>
</tr>
<tr>
<td width='600'>
<input class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover' type=text name='motivovolta' size='50'>
</td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>operador:</span></font></td>
</tr>
<tr>
<td width='600'>
<select size="1" name="operador" class=form-especial>
<? if($qdom[operador]==cliente){?>
<option  value="cliente">Cliente</option>
<? } else { ?>
<?
$noticia = mysql_query("SELECT * FROM operador where id=$qdom[operador]");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conexo<?
}
else{
if ($notician==0){
?>Nada Consta<? } else { ?><? while ($dom = mysql_fetch_array($noticia)){ ?>
<option  value="<? echo $dom[id] ?>"  <? if($qdom[operador]==$dom[id]){?>selected<? } else {}?>><? echo $dom[nome] ?></option>
<?  } } } ?>
<? } ?></select>
</td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>Horimetro Inicio:</span></font></td>
</tr>
<tr>
<td width='600'>
<input  disabled class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover' value="<? echo $qdom[horimetro_ida]?>" type=text name='horimetro_ida' size='10' maxlength='60'>
</td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>Horimetro Final:</span></font></td>
</tr>
<tr>
<td width='600'>
<input class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover' value="<? echo $qdom[horimetro_volta]?>" type=text name='horimetro_volta' size='10' maxlength='60'>
</td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>Status:</span></font></td>
</tr>
<tr>
<td width='600'>
<select size="1" name="status" class=form-especial>
<?
$noticia = mysql_query("SELECT * FROM status where id != 0");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conexo<?
}
else{
if ($notician==0){
?>Nada Consta<? } else { ?><? while ($dom = mysql_fetch_array($noticia)){ ?>
<option  value="<? echo $dom[id] ?>#<? echo $dom[ativo] ?>" <? if($qdom[status]==$dom[id]){?>selected<? } else {}?>><? echo $dom[nome] ?></option>
<?  } } } ?>
</select>
<br> OBS da Eqpto: <input class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover' value="" type=text name='OBS' size='20' maxlength='60'> <br>
<br><font class=font-10><span class=font-vinho>equipamento :</span></font><br>
Operador:
<select size="1" name="motorista">
<option selected value="">Escolha o motorista...</option>
<?
$noticia = mysql_query("SELECT * FROM operador where statusOperador = 'A' order by nome");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conexo<?
}
else{
if ($notician==0){
?>Nada Consta<? } else { ?>
<? while ($dom = mysql_fetch_array($noticia)){ ?>
<option  value="<? echo $dom[id] ?>"><? echo $dom[nome] ?></option>
<?  } } } ?>
<option  value="cliente">Cliente</option>
<option  value="Terceiro">Terceiro</option>
</select><br>
Transporte:
<select size="1" name="caminhao">
<option selected value="">Escolha o caminho...</option>
<?
$noticia = mysql_query("SELECT * FROM caminhao order by codigo");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conexo<?
}
else{
if ($notician==0){
?>Nada Consta<? } else { ?>
<? while ($dom = mysql_fetch_array($noticia)){ ?>
<option  value="<? echo $dom[id] ?>"><? echo $dom[codigo] ?></option>
<?  } } } ?>
<option  value="Terceiro">Terceiro</option>
<option  value="cliente">Cliente</option>
<option  value="rodando">Rodando</option>
</select><br>
</td>
</tr>
<? } ?>
<tr>
<td width='600'><font class=font-10>&nbsp;</font></td>
</tr>
<tr>
<td width='600'><input type='image' src='imagens/layout_bteditar.gif' width='54' height='16' border='0'></td>
</tr>
</form>
</table>
<? } } ?>
<? estatitica("Verifica equipamento em Obra") ?>
<? } elseif($modulo==editado){?>
<?
$data = date("Y-m-d");
$result = explode('#',$status);
$status_eqpto = status_eqpto($equipamento[$i]);
$sql = mysql_query("UPDATE equipamento_obra SET status='b', fim='$volta', motivo_final='$motivovolta', horimetro_volta='$horimetro_volta', dtvoltaRel=NOW(), GARAGEM_FINAL = '$result[0]' WHERE id='$id' LIMIT 1;");


	$SqlObra = mysql_query("SELECT f.nome as NOMEFAMILIA, e.obra,q.CODIGO as eqtoCodigo, e.motivo_final ,e.operador, o.nome as operadorNome, e.acessorio, a.CODIGO as acessorioCodigo, DATE_FORMAT(e.inicio,'%d/%m/%Y') as dtInicio, DATE_FORMAT(e.fim,'%d/%m/%Y') as dtFim, e.horimetro_ida, e.horimetro_volta FROM equipamento_obra e inner join equipamento q on (q.id=e.equipamento) left join familia f on (q.familia=f.id) left join acessorio a on (a.id=e.acessorio) left join operador o on (o.id=e.operador) where e.id='".$id."';");
	while ($sE = mysql_fetch_array($SqlObra)){
	$cor = ($coralternada++ %2 ? "FFFFFF" : "FFFFDC");
	if($sE[operadorNome]==''){
		$sE[operadorNome]=$sE[operador];
	}
	if($sE[acessorioCodigo]==''){
		$sE[acessorioCodigo]=$sE[acessorio];
	}
$Obra = $sE[obra];		
$Html .= '<tr bgcolor="#'.$cor.'" height="20">
    <td><div align="center">'.$sE[NOMEFAMILIA].'</div></td>
	<td><div align="center">'.$sE[eqtoCodigo].'</div></td>
    <td><div align="center">'.$sE[operadorNome].'</div></td>
    <td><div align="center">'.$sE[acessorioCodigo].'</div></td>
    <td><div align="center">'.$sE[dtInicio].'</div></td> 
   <td><div align="center">'.$sE[dtFim].'</div></td>
    <td><div align="center">'.$sE[horimetro_ida].'</div></td>
    <td><div align="center">'.$sE[horimetro_volta].'</div></td>
	<td><div align="center">'.$sE[motivo_final].'</div></td>
	    <td><div align="center">'.statusE($result[0]).'</div></td>
  </tr>';	
	}




$sql6 = mysql_query("INSERT INTO `caminhao_obra` ( `id` , `obra` , `equipamento` , `caminhao` , `motorista` , `data` ) VALUES ('', 'volta', '$id', '$caminhao', '$motorista', '$data');");
$sql4 = mysql_query("UPDATE acessorio SET status='$result[0]', ativo='$result[1]' WHERE id='$acessorio' LIMIT 1;");
$sql4 = mysql_query("UPDATE acessorio SET status='$result[0]', ativo='$result[1]' WHERE id='$acessorio2' LIMIT 1;");
$sql2 = mysql_query("UPDATE equipamento SET status='$result[0]', ativo='$result[1]', OBS='$OBS' WHERE id='$equipamento' LIMIT 1;");
gravaSml($equipamento,$result[0],$OBS);
if($operador==cliente){} else {
$sql3 = mysql_query("UPDATE operador SET status='a' WHERE id='$operador' LIMIT 1;");
}
if (!$sql){
echo "No foi possivel a consulta.";}
else{
?>
<table border='0' width='600' cellspacing='1' cellpadding='0'>
<tr>
<td width='600'><center><font class=font-10><b class=font-vinho><br> O equipamento foi inativado com sucesso da obra !<br><br></b>
</font></center></td>
</tr>
</table>
<script>window.setTimeout('changeurl();',2000); function changeurl(){window.location='index.php';}</script>
<? } ?>
<? estatitica("Finaliza equipamento em obra");

$Sqla = mysql_query("SELECT o.contrato, o.cliente,o.endereco, p.NOME_PATIO FROM obra o inner join patio p on (p.ID_PATIO=o.patio) where o.id='".$Obra."' Limit 1;");
$sO = mysql_fetch_array($Sqla);
$contrato = $sO[contrato];
$cliente = $sO[cliente];

$Html1 = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
<title>[MAPAES] Inclus�o de Equipamento em Obra</title>
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
    <td>Endere�o</td>
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
    <td width="15%" height="30" bgcolor="#FF0000"><div align="center" class="style1">Fam�lia</div></td>
    <td width="15%" height="30" bgcolor="#FF0000"><div align="center" class="style1">C�digo</div></td>
    <td bgcolor="#FF0000"><div align="center" class="style1">Operador</div></td>
    <td bgcolor="#FF0000"><div align="center" class="style1">Acess�rio</div></td>
    <td width="15%" bgcolor="#FF0000"><div align="center" class="style1">Inicio</div></td>
	    <td width="15%" bgcolor="#FF0000"><div align="center" class="style1">Final</div></td>
    <td width="15%" bgcolor="#FF0000"><div align="center" class="style1">Horimetro Inicio</div></td>
    <td width="15%" bgcolor="#FF0000"><div align="center" class="style1">Horimetro Final</div></td>
	<td width="15%" bgcolor="#FF0000"><div align="center" class="style1">Motivo</div></td>
	    <td width="15%" bgcolor="#FF0000"><div align="center" class="style1">Status</div></td>
  </tr>';
$Html2 ='</table></body></html>';



$msg = $Html1.$Html.$Html2;



$headers = "MIME-Version: 1.0\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\n";
$headers .= "From: MAPAES <mapaes@escad.com.br>\n";
/* Enviando a mensagem */
$SqlEmail = mysql_query("SELECT emailUsuario FROM login where emailobraUsuario='S'");
while ($sq = mysql_fetch_array($SqlEmail)){

	mail($sq[emailUsuario], "MAPAES: Conclus�o de Equipamento em Obra CONTRATO: ".$sO[contrato]." CLIENTE: ".$sO[cliente], $msg, $headers); 
}
//mail("aline.b.lima@hotmail.com", "MAPAES: Conclus�o de Equipamento em Obra CONTRATO: ".$contrato." CLIENTE: ".$cliente, $msg, $headers); 
//mail("nadiclecio@escad.com.br", "MAPAES:  Conclus�o de Equipamento em Obra CONTRATO: ".$sO[contrato]." CLIENTE: ".$sO[cliente], $msg, $headers);
//mail("alisson@escad.com.br", "MAPAES:  Conclus�o de Equipamento em Obra CONTRATO: ".$sO[contrato]." CLIENTE: ".$sO[cliente], $msg, $headers);
//mail("grace@escad.com.br", "MAPAES:  Conclus�o de Equipamento em Obra CONTRATO: ".$contrato." CLIENTE: ".$cliente, $msg, $headers);
//mail("renata@escad.com.br", "MAPAES:  Conclus�o de Equipamento em Obra CONTRATO: ".$contrato." CLIENTE: ".$cliente, $msg, $headers);
//mail("barbara@escad.com.br", "MAPAES:  Conclus�o de Equipamento em Obra CONTRATO: ".$contrato." CLIENTE: ".$cliente, $msg, $headers);
//mail("jessica@escad.com.br", "MAPAES:  Conclus�o de Equipamento em Obra CONTRATO: ".$sO[contrato]." CLIENTE: ".$sO[cliente], $msg, $headers);
//mail("edvaldo@escad.com.br", "MAPAES:  Conclus�o de Equipamento em Obra CONTRATO: ".$sO[contrato]." CLIENTE: ".$sO[cliente], $msg, $headers);
//mail("leticia@escad.com.br", "MAPAES:  Conclus�o de Equipamento em Obra CONTRATO: ".$contrato." CLIENTE: ".$cliente, $msg, $headers);
//mail("mapaes@escad.com.br", "MAPAES: Conclus�o de Equipamento em Obra CONTRATO: ".$sO[contrato]." CLIENTE: ".$sO[cliente], $msg, $headers); 
//mail("walter@escad.com.br", "MAPAES: Conclus�o de Equipamento em Obra CONTRATO: ".$sO[contrato]." CLIENTE: ".$sO[cliente], $msg, $headers); 
//mail("jurandir@escad.com.br", "MAPAES: Conclus�o de Equipamento em Obra CONTRATO: ".$sO[contrato]." CLIENTE: ".$sO[cliente], $msg, $headers); 
//mail("rodrigo.santos@escad.com.br", "MAPAES: Conclus�o de Equipamento em Obra CONTRATO: ".$sO[contrato]." CLIENTE: ".$sO[cliente], $msg, $headers); 



?>
<? } elseif($modulo==edita){?>
<?
$qnoticia = mysql_query("SELECT DATE_FORMAT(eo.inicio,'%d/%m/%Y') as dtini,DATE_FORMAT(eo.fim,'%d/%m/%Y') as dtfim, eo.* FROM equipamento_obra eo where id = '$equipamento'");
$qnotician = mysql_num_rows($noticia);
if (!$qnoticia){
?>Problemas na conexo<?
}
else{
if ($qnotician==0){
?>
<table border='0' width='730' cellspacing='1' cellpadding='0'>
<tr>
<td width='730' validn='middle' colspan='7'>
<img src='imagens/layout_seta.gif' width="15" height="9"><b class=font-10>Editar equipamento</b><br>&nbsp;
</td>
</tr>
<tr>
<td width='730' bgcolor='#FFFFFF' colspan='5'><font class=font-11><span class=font-azul><center>no existe nenhum equipamento para est consulta</center></span></font></td>
</tr>
</table>
<?
}else {
?>
<table border='0' width='600' cellspacing='1' cellpadding='0'>
<tr>
<td width='600' validn='middle'>
<img src='imagens/layout_seta.gif' width="15" height="9"><b class=font-10>Editar equipamento em obra</b><br>&nbsp;
</td>
</tr>
<form method='POST' action='obra.php?modulo=edita2'>
<input type='hidden' name='id' value='<? echo $equipamento ?>'>
<input type='hidden' name='obra' value='<? echo $qdom[obra]; ?>'>
<? $qdom = mysql_fetch_array($qnoticia); ?>
<input type='hidden' name='antigo_operador' value='<? echo $qdom[operador] ?>'>
<input type='hidden' name='antigo_acessorio' value='<? echo $qdom[acessorio] ?>'>
<input type='hidden' name='antigo_acessorio2' value='<? echo $qdom[acessorio2] ?>'>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>equipamento:</span></font></td>
</tr>
<tr>
<td width='600'>
<?
$noticia = mysql_query("SELECT * FROM equipamento where id = $qdom[equipamento]");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conexo<?
}
else{
if ($notician==0){
?>Nada Consta<? } else { ?><? while ($dom = mysql_fetch_array($noticia)){ ?>
<? echo $dom[codigo] ?>
<?  } } } ?>
</td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>operador:</span></font></td>
</tr>
<tr>
<td width='600'>
<select size="1" name="operador" class=form-especial>
<option <? if($qdom[operador]==cliente){?>selected<? } else {}?> value="cliente">Cliente</option>
<?
$noticia = mysql_query("SELECT * FROM operador where statusOperador = 'A' order by nome");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conexo<?
}
else{
if ($notician==0){
?>Nada Consta<? } else { ?><? while ($dom = mysql_fetch_array($noticia)){ ?>
<option  value="<? echo $dom[id] ?>" <? if($dom[status]==b){?>style="color: #000000; background-color: #3399FF"<? } else {}?>  <? if($qdom[operador]==$dom[id]){?>selected<? } else {}?>><? echo $dom[nome] ?></option>
<?  } } } ?>
</select>
</td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>Horimetro Inicio:</span></font></td>
</tr>
<tr>
<td width='600'>
<input class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover' value="<? echo $qdom[horimetro_ida]?>" type=text name='horimetro_ida' size='10' maxlength='60'>
</td>
</tr>
<? if($qdom[status]=='b'){?>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>Horimetro Final:</span></font></td>
</tr>
<tr>
<td width='600'>
<input class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover' value="<? echo $qdom[horimetro_volta]?>" type=text name='horimetro_volta' size='10' maxlength='60'>
</td>
</tr>
<? } ?>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>Data de Inicio:</span></font></td>
</tr>
<tr>
<td width='600'>
<input class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover' value="<? echo $qdom[dtini]?>" type=text name='dtini' size='12' maxlength='60'>
</td>
</tr>
<? if($qdom[status]=='b'){?>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>Data Final:</span></font></td>
</tr>
<tr>
<td width='600'>
<input class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover' value="<? echo $qdom[dtfim]?>" type=text name='dtfim' size='12' maxlength='60'>
</td>
</tr>
<? } ?>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>p�tio :</span></font></td>
</tr>
<tr>
<td width='600'>
<select size="1" name="patio">
<?
$noticia = mysql_query("SELECT * FROM patio order by NOME_PATIO");
$notician = mysql_num_rows($noticia);
while ($dom = mysql_fetch_array($noticia)){
$cor = ($coralternada++ %2 ? "FFFFFF" : "FFFFDC");
?>
<option value="<? echo $dom[ID_PATIO]?>" <? if($qdom[PATIO]==$dom[ID_PATIO]){?>selected<? }?>><? echo $dom[NOME_PATIO]?></option>
<? } ?>
<option <? if($qdom[PATIO]==""){?>selected="selected"<? } ?>>Selecione um p�tio</option>
</select>
</td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>Acessrio:</span></font></td>
</tr>
<tr>
<td width='600'>
<select size="1" name="acessorio" class=form-especial>
<option <? if($qdom[acessorio]==nda){?>selected<? } else {}?>  value="nda">Sem acessrio</option>
<?
$noticia = mysql_query("SELECT * FROM acessorio where `excluido` != 's'");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conexo<?
}
else{
if ($notician==0){
?>Nada Consta<? } else { ?><? while ($dom = mysql_fetch_array($noticia)){ ?>
<option  value="<? echo $dom[id] ?>" <? if($qdom[acessorio]==$dom[id]){?>selected<? } else {}?> <? if($dom[ativo]==o){ ?>style="color: #000000; background-color: #3399FF"<? } elseif($dom[ativo]==m){ ?>style="color: #000000; background-color: #FF0000"<? } else { } ?>><? echo $dom[codigo] ?></option>
<?  } } } ?>
</select>
</td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>Acessrio 2:</span></font></td>
</tr>
<tr>
<td width='600'>
<select size="1" name="acessorio2" class=form-especial>
<option <? if($qdom[acessorio2]==nda){?>selected<? } else {}?>  value="nda">Sem acessrio</option>
<?
$noticia = mysql_query("SELECT * FROM acessorio where `excluido` != 's'");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conexo<?
}
else{
if ($notician==0){
?>Nada Consta<? } else { ?><? while ($dom = mysql_fetch_array($noticia)){ ?>
<option  value="<? echo $dom[id] ?>" <? if($qdom[acessorio2]==$dom[id]){?>selected<? } else {}?> <? if($dom[ativo]==o){ ?>style="color: #000000; background-color: #3399FF"<? } elseif($dom[ativo]==m){ ?>style="color: #000000; background-color: #FF0000"<? } else { } ?>><? echo $dom[codigo] ?></option>
<?  } } } ?>
</select>
</td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>Ponto:</span></font></td>
</tr>
<tr>
<td width='600'>
<input class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover' value="<? echo $qdom[ponto]?>" type=text name='ponto' size='10' maxlength='60'>
</td>
</tr>




<tr>
<td>
<font class=font-10><span class=font-vinho>frete in�cio :</span></font>
</td>
</tr>
<tr>
<td>
<?
$sqlFi = mysql_query("SELECT co.id, co.obra, co.equipamento, co.caminhao, co.motorista, DATE_FORMAT(data,'%d/%m/%Y') as dt  FROM caminhao_obra co where co.obra='".$qdom[obra]."' And co.equipamento='".$qdom[id]."'");
$aFi = mysql_fetch_array($sqlFi);
?>
<input type="hidden" name="id_fi" value="<?=$aFi[id]?>">
<select size="1" name="motorista_fi">
<option value="">Escolha o motorista...</option>
<?
$noticia = mysql_query("SELECT * FROM operador where statusOperador = 'A' order by nome");
while ($dom = mysql_fetch_array($noticia)){ ?>
<option  value="<? echo $dom[id] ?>" <? if($aFi[motorista]==$dom[id]){?>selected<? }?>><? echo $dom[nome] ?></option>
<? } ?>
<option  value="cliente" <? if($aFi[motorista]=='cliente'){?>selected<? }?>>Cliente</option>
<option  value="Terceiro" <? if($aFi[motorista]=='Terceiro'){?>selected<? }?>>Terceiro</option>
</select>

<select size="1" name="caminhao_fi">
<option selected value="">Escolha o caminho...</option>
<?
$noticia = mysql_query("SELECT * FROM caminhao order by codigo");
while ($dom = mysql_fetch_array($noticia)){ ?>
<option  value="<? echo $dom[id] ?>" <? if($aFi[caminhao]==$dom[id]){?>selected<? }?>><? echo $dom[codigo] ?></option>
<? } ?>

<option  value="Terceiro" <? if($aFi[caminhao]=='Terceiro'){?>selected<? }?>>Terceiro</option>
<option  value="cliente" <? if($aFi[caminhao]=='cliente'){?>selected<? }?>>Cliente</option>
<option  value="rodando" <? if($aFi[caminhao]=='rodando'){?>selected<? }?>>Rodando</option>
</select><input class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover' value="<? echo $aFi[dt]?>" type=text name='dtfi' size='12' maxlength='10'>
</td>
</tr>
<? if($qdom[status]=='b'){?>
<tr>
<td>
<font class=font-10><span class=font-vinho>frete final :</span></font>
</td>
</tr>

<tr>
<td>
<?
$sqlFv = mysql_query("SELECT co.id, co.obra, co.equipamento, co.caminhao, co.motorista, DATE_FORMAT(data,'%d/%m/%Y') as dt FROM caminhao_obra co where co.obra='volta' And co.equipamento='".$qdom[id]."'");
$aFv = mysql_fetch_array($sqlFv);
?>
<input type="hidden" name="id_fv" value="<?=$aFv[id]?>">
<select size="1" name="motorista_fv">
<option value="">Escolha o motorista...</option>
<?
$noticia = mysql_query("SELECT * FROM operador where statusOperador = 'A' order by nome");
while ($dom = mysql_fetch_array($noticia)){ ?>
<option  value="<? echo $dom[id] ?>" <? if($aFv[motorista]==$dom[id]){?>selected<? }?>><? echo $dom[nome] ?></option>
<? } ?>
<option  value="cliente" <? if($aFv[motorista]=='cliente'){?>selected<? }?>>Cliente</option>
<option  value="Terceiro" <? if($aFv[motorista]=='Terceiro'){?>selected<? }?>>Terceiro</option>
</select>

<select size="1" name="caminhao_fv">
<option selected value="">Escolha o caminho...</option>
<?
$noticia = mysql_query("SELECT * FROM caminhao order by codigo");
while ($dom = mysql_fetch_array($noticia)){ ?>
<option  value="<? echo $dom[id] ?>" <? if($aFv[caminhao]==$dom[id]){?>selected<? }?>><? echo $dom[codigo] ?></option>
<? } ?>

<option  value="Terceiro" <? if($aFv[caminhao]=='Terceiro'){?>selected<? }?>>Terceiro</option>
<option  value="cliente" <? if($aFv[caminhao]=='cliente'){?>selected<? }?>>Cliente</option>
<option  value="rodando" <? if($aFv[caminhao]=='rodando'){?>selected<? }?>>Rodando</option>
</select><input class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover' value="<? echo $aFv[dt]?>" type=text name='dtfv' size='12' maxlength='10'>
</td>
</tr>


<tr>
<td width='600'><font class=font-10><span class=font-vinho>Legenda:</span></font></td>
</tr>
<tr>
<td width='600'>
<span style="background-color: #3399FF">Em obra</span>: Em obra<br>
<span style="background-color: #FF0000">Em manuteno</span>: Em manuten��o
</td>
</tr>
<? } ?>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>Motivo Final:</span></font></td>
</tr>
<tr>
<td width='600'>
<input class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover' value="<? echo $qdom[motivo_final]?>" type=text name='motivo_final' size='60'>
</td>
</tr>
<tr>
<td width='600'><font class=font-10>&nbsp;</font></td>
</tr>
<tr>
<td width='600'><input type='image' src='imagens/layout_bteditar.gif' width='54' height='16' border='0'></td>
</tr>
</form>
</table>
<? }  }?>
<? } elseif($modulo==edita2){?>
<?
$result = explode('#',$status);

$dtini = explode('/',$_POST[dtini]);
$dtfim = explode('/',$_POST[dtfim]);


$sql = mysql_query("UPDATE equipamento_obra SET operador='$operador', horimetro_ida='$horimetro_ida', horimetro_volta='$horimetro_volta', inicio='".$dtini[2]."-".$dtini[1]."-".$dtini[0]."', fim='".$dtfim[2]."-".$dtfim[1]."-".$dtfim[0]."', acessorio='$acessorio', acessorio2='$acessorio2', ponto='$ponto', PATIO='$patio', motivo_final='$motivo_final' WHERE id='$id' LIMIT 1;");
if($operador!=$antigo_operador){
$sql3 = mysql_query("UPDATE operador SET status='a' WHERE id='$antigo_operador' LIMIT 1;");
$sql6 = mysql_query("UPDATE operador SET status='b' WHERE id='$operador' LIMIT 1;");
}
if($acessorio!=$antigo_acessorio){
$sql14 = mysql_query("UPDATE acessorio SET status='1', ativo='d' WHERE id='$antigo_acessorio' LIMIT 1;");
$sql24 = mysql_query("UPDATE acessorio SET status='9', ativo='o' WHERE id='$acessorio' LIMIT 1;");
}
if($acessorio2!=$antigo_acessorio2){
$sql15 = mysql_query("UPDATE acessorio SET status='1', ativo='d' WHERE id='$antigo_acessorio2' LIMIT 1;");
$sql25 = mysql_query("UPDATE acessorio SET status='9', ativo='o' WHERE id='$acessorio2' LIMIT 1;");
}
$dtfi = explode('/',$_POST[dt_fi]);
$dtfv = explode('/',$_POST[dt_fv]);
if($_POST[id_fi]!=''){
	$sql25 = mysql_query("UPDATE caminhao_obra SET caminhao='".$_POST[caminhao_fi]."',  motorista='".$_POST[motorista_fi]."', data='".$dtfi[2]."-".$dtfi[1]."-".$dtfi[0]."' WHERE id='".$_POST[id_fi]."' LIMIT 1;");
} else {

	if($_POST[motorista_fi]!=''){
		
		$sql6 = mysql_query("INSERT INTO `caminhao_obra` ( `id` , `obra` , `equipamento` , `caminhao` , `motorista` , `data` ) VALUES ('', '".$_POST[obra]."', '".$_POST[id]."', '".$_POST[caminhao_fi]."', '".$_POST[motorista_fi]."', '".$dtfi[2]."-".$dtfi[1]."-".$dtfi[0]."');") or die ('Erro ao cadastrar o frete: '.mysql_error());	
	}
}
	
if($_POST[id_fv]!=''){
	$sql25 = mysql_query("UPDATE caminhao_obra SET caminhao='".$_POST[caminhao_fv]."',  motorista='".$_POST[motorista_fv]."' WHERE id='".$_POST[id_fv]."' LIMIT 1;");
} else {

	if($_POST[motorista_fv]!=''){
		
		$sql6 = mysql_query("INSERT INTO `caminhao_obra` ( `id` , `obra` , `equipamento` , `caminhao` , `motorista` , `data` ) VALUES ('', 'volta', '".$_POST[id]."', '".$_POST[caminhao_fv]."', '".$_POST[motorista_fv]."', '".$dtfv[2]."-".$dtfv[1]."-".$dtfv[0]."');") or die ('Erro ao cadastrar o frete: '.mysql_error());	
	}
}
if (!$sql){
echo "No foi possivel a consulta.";}
else{
?>
<table border='0' width='600' cellspacing='1' cellpadding='0'>
<tr>
<td width='600'><center><font class=font-10><b class=font-vinho><br> O equipamento foi editado com sucesso da obra !<br><br></b>
</font></center></td>
</tr>
</table>
<script>//window.setTimeout('changeurl();',2000); function changeurl(){window.location='index.php';}</script>
<? } ?>
<? } elseif($modulo==inserirmaquina){?>
<table border='0' width='600' cellspacing='1' cellpadding='0'>
<tr>
<td width='600' validn='middle'>
<img src='imagens/layout_seta.gif' width="15" height="9"><b class=font-10>Adicionar equipamento obra</b><br>&nbsp;
</td>
</tr>
<form method='POST' action='obra.php'>
<input type='hidden' name='modulo' value='criamaquina'>
<input type='hidden' name='obra' value='<? echo $obra ?>'>
<input type='hidden' name='contrato' value='<? echo $contrato?>'>
<input type='hidden' name='cliente' value='<? echo $cliente ?>'>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>contrato :</span></font></td>
</tr>
<tr>
<td width='600'>
<input type='text' disabled value="<? echo $contrato ?>" name='contrato' size='50' maxlength='150' class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover'></td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>cliente :</span></font></td>
</tr>
<tr>
<td width='600'>
<input type='text'disabled  value="<? echo $cliente ?>" name='cliente' size='50' maxlength='150' class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover'></td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>quantidade de equipamento :</span></font></td>
</tr>
<tr>
<td width='600'>
<input class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover' type=text name='quantidade' size='30' maxlength='60'></td>
</tr>
<tr>
<td width='600'><font class=font-10>&nbsp;</font></td>
</tr>
<tr>
<td width='600'><input type='image' src='imagens/layout_btcadastrar.gif' width='54' height='16' border='0'></td>
</tr>
</form>
</table>
<? } elseif($modulo==criamaquina){?>
<table border='0' width='600' cellspacing='1' cellpadding='0'>
<tr>
<td width='600' validn='middle'>
<img src='imagens/layout_seta.gif' width="15" height="9"><b class=font-10>Adicionar equipamento para obra</b><br>&nbsp;
</td>
</tr>
<form method='POST' action='obra.php?modulo=inseremaquina'>
<input type='hidden' name='obra' value='<? echo $obra ?>'>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>contrato :</span></font></td>
</tr>
<tr>
<td width='600'>
<input type='text' DISABLED name='contrato' size='50' maxlength='150' class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover' value='<? echo $contrato ?>' DISABLED></td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>cliente :</span></font></td>
</tr>
<tr>
<td width='600'>
<input type='text' DISABLED value='<? echo $cliente ?>' name='cliente' size='50' maxlength='150' class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover' value='<? echo $cliente ?>' DISABLED></td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>inserir equipamentos destinados para obra :</span></font></td>
</tr>
<?  for($i=0; $i< $quantidade; $i++) { ?>
<tr>
<td width='600'>
<table width="100%">
<tr>
<td bgcolor="#CCCCCC" colspan="2">
<font class=font-10><span class=font-vinho>&nbsp;Equipamento <? echo $a++ +1 ?> :</span></font><br>
</td>
</tr>
<tr>
<td>
Equipamento:
</td>
<td>
<select size="1" name="equipamento[]" class=form-especial>
<?
$noticia = mysql_query("SELECT * FROM equipamento where ativo = 'd' And `excluido` != 's'");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conexo<?
}
else{
if ($notician==0){
?>Nada Consta<? } else { ?><? while ($dom = mysql_fetch_array($noticia)){ ?>
<option  value="<? echo $dom[id] ?>"><? echo $dom[codigo] ?></option>
<?  } } } ?>
</select>
</td>
</tr>
<tr>
<td>
Acessrio:
</td><td><select size="1" name="acessorio[]" class=form-especial>
<option  value="nda">Sem acessrio</option>
<?
$noticia = mysql_query("SELECT * FROM acessorio where ativo = 'd' And `excluido` != 's'");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conexo<?
}
else{
if ($notician==0){
?>Nada Consta<? } else { ?><? while ($dom = mysql_fetch_array($noticia)){ ?>
<option  value="<? echo $dom[id] ?>"><? echo $dom[codigo] ?></option>
<?  } } } ?>
</select>
</td>
</tr>
<tr>
<td>
Acessrio 2 :</td><td> <select size="1" name="acessorio2[]" class=form-especial>
<option  value="nda">Sem acessrio</option>
<?
$noticia = mysql_query("SELECT * FROM acessorio where ativo = 'd' And `excluido` != 's'");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conexo<?
}
else{
if ($notician==0){
?>Nada Consta<? } else { ?><? while ($dom = mysql_fetch_array($noticia)){ ?>
<option  value="<? echo $dom[id] ?>"><? echo $dom[codigo] ?></option>
<?  } } } ?>
</select>
</td>
</tr>
<tr>
<td>
Ptio Responsvel pelo Eqpto:
</td>
<td>
<select size="1" name="patio_eqpto[]" class=form-especial>
<?
$noticia = mysql_query("SELECT * FROM patio order by NOME_PATIO");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conexo<?
}
else{
if ($notician==0){
?>Nada Consta<? } else { ?><? while ($dom = mysql_fetch_array($noticia)){ ?>
<option  value="<? echo $dom[ID_PATIO] ?>"><? echo $dom[NOME_PATIO] ?></option>
<?  } } } ?>
</select>
</td>
</tr>
<tr>
<td>
Operador:
</td><td>
<select size="1" name="nosso[]">
<option selected value="s">Escad</option>
<option value="n">Cliente</option>
</select>
</td>
</tr>
<tr>
<td>
Data Incio:</td><td><input class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover' type=text name='inicio[]' size='10' maxlength='10'>
</td>
</tr>
<tr>
<td>
Nome do operador:</td><td>
<select size="1" name="operador[]" class=form-especial>
<option selected value="">Escolha o operador...</option>
<?
$noticia = mysql_query("SELECT * FROM operador where statusOperador = 'A' order by nome");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conexo<?
}
else{
if ($notician==0){
?>Nada Consta<? } else { ?><? while ($dom = mysql_fetch_array($noticia)){ ?>
<option  value="<? echo $dom[id] ?>"><? echo $dom[nome] ?></option>
<?  } } } ?>
<option  value="cliente">Cliente</option>
</select>
</td>
</tr>
<tr>
<td>
Horimetro Inicio: </td><td><input class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover' type=text name='horimetro_ida[]' size='10' maxlength='60'>
</td>
</tr>
<tr>
<td>
Ponto:</td><td> <input class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover' type=text name='ponto[]' size='10' maxlength='60'>
</td>
</tr>
<tr>
<td colspan="2">
<font class=font-10><span class=font-vinho>equipamento de transporte :</span></font>
</td>
</tr>
<tr>
<td>
Operador:</td><td>
<select size="1" name="motorista[]">
<option selected value="">Escolha o motorista...</option>
<?
$noticia = mysql_query("SELECT * FROM operador where statusOperador = 'A' order by nome");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conexo<?
}
else{
if ($notician==0){
?>Nada Consta<? } else { ?>
<? while ($dom = mysql_fetch_array($noticia)){ ?>
<option  value="<? echo $dom[id] ?>"><? echo $dom[nome] ?></option>
<?  } } } ?>
<option  value="cliente">Cliente</option>
<option  value="Terceiro">Terceiro</option>
</select>
</td>
</tr>
<tr>
<td>
Transporte:
</td><td>
<select size="1" name="caminhao[]">
<option selected value="">Escolha o caminho...</option>
<?
$noticia = mysql_query("SELECT * FROM caminhao order by codigo");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conexo<?
}
else{
if ($notician==0){
?>Nada Consta<? } else { ?>
<? while ($dom = mysql_fetch_array($noticia)){ ?>
<option  value="<? echo $dom[id] ?>"><? echo $dom[codigo] ?></option>
<?  } } } ?>
<option  value="Terceiro">Terceiro</option>
<option  value="cliente">Cliente</option>
<option  value="rodando">Rodando</option>
</select>
</td>
</tr>
</table>
</td>
</tr>
<? } ?>
<tr>
<td width='600'><font class=font-10>&nbsp;</font></td>
</tr>
<tr>
<td width='600'><input type='image' src='imagens/layout_btcadastrar.gif' width='54' height='16' border='0'></td>
</tr>
</form>
</table>
<? } elseif($modulo==inseremaquina){?>
<table border='0' width='600' cellspacing='1' cellpadding='0'>
<?
$Html ='';
for($i = 0; $i < count($equipamento); $i++){ ?>
<?
if(!$equipamento[$i]){ } else {
$status = "a";
$data = date("Y-m-d");
$status_eqpto = status_eqpto($equipamento[$i]);
$sql = mysql_query ("INSERT INTO equipamento_obra (obra,equipamento,acessorio2,acessorio,nosso,operador,status,inicio,horimetro_ida,ponto,GARAGEM_INICIO,PATIO, dtinicioRel) VALUES ('$obra','$equipamento[$i]','$acessorio2[$i]','$acessorio[$i]','$nosso[$i]','$operador[$i]','$status','$inicio[$i]','$horimetro_ida[$i]','$ponto[$i]','$status_eqpto','$patio_eqpto[$i]',NOW());");
$new = mysql_insert_id();
$sql6 = mysql_query("INSERT INTO `caminhao_obra` ( `id` , `obra` , `equipamento` , `caminhao` , `motorista` , `data` ) VALUES ('', '$obra', '$new', '$caminhao[$i]', '$motorista[$i]', '$data');");
$sql2 = mysql_query("UPDATE equipamento SET status='9', ativo='o' WHERE id='$equipamento[$i]' LIMIT 1;");
gravaSml($equipamento[$i],'9','Inicia em Obra:'.$obra);
if($operador[$i]==cliente){} else {
$sql3 = mysql_query("UPDATE operador SET status='b' WHERE id='$operador[$i]' LIMIT 1;");
}

$sql4 = mysql_query("UPDATE acessorio SET status='9', ativo='o' WHERE id='$acessorio[$i]' LIMIT 1;");
$sql5 = mysql_query("UPDATE acessorio SET status='9', ativo='o' WHERE id='$acessorio2[$i]' LIMIT 1;");



	$SqlObra = mysql_query("SELECT f.nome as NOMEFAMILIA,q.CODIGO as eqtoCodigo ,e.operador, o.nome as operadorNome, e.acessorio, a.CODIGO as acessorioCodigo, DATE_FORMAT(e.inicio,'%d/%m/%Y') as dtInicio, e.horimetro_ida FROM equipamento_obra e inner join equipamento q on (q.id=e.equipamento) left join familia f on (q.familia=f.id) left join acessorio a on (a.id=e.acessorio) left join operador o on (o.id=e.operador) where e.id='".$new."';");
	while ($sE = mysql_fetch_array($SqlObra)){
	$cor = ($coralternada++ %2 ? "FFFFFF" : "FFFFDC");
	if($sE[operadorNome]==''){
		$sE[operadorNome]=$sE[operador];
	}
	if($sE[acessorioCodigo]==''){
		$sE[acessorioCodigo]=$sE[acessorio];
	}
		
$Html .= '<tr bgcolor="#'.$cor.'" height="20">
    <td><div align="center">'.$sE[NOMEFAMILIA].'</div></td>
    <td><div align="center">'.$sE[eqtoCodigo].'</div></td>
    <td><div align="center">'.$sE[operadorNome].'</div></td>
    <td><div align="center">'.$sE[acessorioCodigo].'</div></td>
    <td><div align="center">'.$sE[dtInicio].'</div></td>
    <td><div align="center">'.$sE[horimetro_ida].'</div></td>
  </tr>';	
	}
if (!$sql){
echo "No foi possivel a consulta.";}
else{
?>
<tr>
<td width='600'><center><font class=font-10><b class=font-vinho><br> O equipamento foi adicionado com sucesso a obra !<br><br></b>
</font></center></td>
</tr>
<? } ?>
<? } } ?>
<? estatitica("Adicione Equipamento a Obra") ?>
<?


$Sqla = mysql_query("SELECT o.contrato, o.cliente,o.endereco, p.NOME_PATIO FROM obra o inner join patio p on (p.ID_PATIO=o.patio) where o.id='".$obra."' Limit 1;");
$sO = mysql_fetch_array($Sqla);


$Html1 = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
<title>[MAPAES] Inclus�o de Equipamento em Obra</title>
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
    <td>Endere�o</td>
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
    <td width="15%" height="30" bgcolor="#1f497d"><div align="center" class="style1">Fam�lia</div></td>
    <td width="15%" height="30" bgcolor="#1f497d"><div align="center" class="style1">C�digo</div></td>
    <td bgcolor="#1f497d"><div align="center" class="style1">Operador</div></td>
    <td bgcolor="#1f497d"><div align="center" class="style1">Acess�rio</div></td>
    <td width="15%" bgcolor="#1f497d"><div align="center" class="style1">Inicio</div></td>
    <td width="15%" bgcolor="#1f497d"><div align="center" class="style1">Horimetro</div></td>
  </tr>';
$Html2 ='</table></body></html>';



$msg = $Html1.$Html.$Html2;




$headers = "MIME-Version: 1.0\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\n";
$headers .= "From: MAPAES <mapaes@escad.com.br>\n";
/* Enviando a mensagem */
$SqlEmail = mysql_query("SELECT emailUsuario FROM login where emailobraUsuario='S'");
while ($sq = mysql_fetch_array($SqlEmail)){

	mail($sq[emailUsuario], "MAPAES: Inclus�o de Equipamento em Obra CONTRATO: ".$sO[contrato]." CLIENTE: ".$sO[cliente], $msg, $headers); 
}
//mail("aline.b.lima@hotmail.com", "MAPAES: Inclus�o de Equipamento em Obra CONTRATO: ".$contrato." CLIENTE: ".$cliente, $msg, $headers); 
//mail("nadiclecio@escad.com.br", "MAPAES:  Inclus�o de Equipamento em Obra CONTRATO: ".$sO[contrato]." CLIENTE: ".$sO[cliente], $msg, $headers);
//mail("alisson@escad.com.br", "MAPAES:  Inclus�o de Equipamento em Obra CONTRATO: ".$sO[contrato]." CLIENTE: ".$sO[cliente], $msg, $headers);
//mail("grace@escad.com.br", "MAPAES:  Inclus�o de Equipamento em Obra CONTRATO: ".$contrato." CLIENTE: ".$cliente, $msg, $headers);
//mail("renata@escad.com.br", "MAPAES:  Inclus�o de Equipamento em Obra CONTRATO: ".$contrato." CLIENTE: ".$cliente, $msg, $headers);
//mail("barbara@escad.com.br", "MAPAES:  Inclus�o de Equipamento em Obra CONTRATO: ".$contrato." CLIENTE: ".$cliente, $msg, $headers);
//mail("jessica@escad.com.br", "MAPAES:  Inclus�o de Equipamento em Obra CONTRATO: ".$sO[contrato]." CLIENTE: ".$sO[cliente], $msg, $headers);
//mail("edvaldo@escad.com.br", "MAPAES:  Inclus�o de Equipamento em Obra CONTRATO: ".$sO[contrato]." CLIENTE: ".$sO[cliente], $msg, $headers);
//mail("leticia@escad.com.br", "MAPAES:  Inclus�o de Equipamento em Obra CONTRATO: ".$contrato." CLIENTE: ".$cliente, $msg, $headers);
//mail("mapaes@escad.com.br", "MAPAES: Inclus�o de Equipamento em Obra CONTRATO: ".$sO[contrato]." CLIENTE: ".$sO[cliente], $msg, $headers); 
//mail("rodrigo.santos@escad.com.br", "MAPAES: Inclus�o de Equipamento em Obra CONTRATO: ".$sO[contrato]." CLIENTE: ".$sO[cliente], $msg, $headers); 


?>
<script>window.setTimeout('changeurl();',2000); function changeurl(){window.location='index.php';}</script>
</table>
<? } elseif($modulo==finalizar){?>
<?
$qnoticia = mysql_query("SELECT * FROM equipamento_obra where obra = '$obra' And status = 'a'");
$qnotician = mysql_num_rows($noticia);
if (!$qnoticia){
?>Problemas na conexo<?
}
else{
if ($qnotician==0){
?>
<table border='0' width='730' cellspacing='1' cellpadding='0'>
<tr>
<td width='730' validn='middle' colspan='7'>
<img src='imagens/layout_seta.gif' width="15" height="9"><b class=font-10>Finalizar obra</b><br>&nbsp;
</td>
</tr>
<tr>
<td width='730' bgcolor='#FFFFFF' colspan='5'><font class=font-11><span class=font-azul><center>no existe nenhum equipamento para est consulta</center></span></font></td>
</tr>
</table>
<?
}else {
?>
<table border='0' width='600' cellspacing='1' cellpadding='0'>
<tr>
<td width='600' validn='middle'>
<img src='imagens/layout_seta.gif' width="15" height="9"><b class=font-10>Finalizar obra</b><br>&nbsp;
</td>
</tr>
<form method='POST' action='obra.php?modulo=fim'>
<input type='hidden' name='obra' value='<? echo $obra ?>'>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>contrato :</span></font></td>
</tr>
<tr>
<td width='600'>
<input type='text' name='contrato' size='50' maxlength='150' class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover' value='<? echo $contrato ?>' DISABLED></td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>equipamentos destinados para obra :</span></font></td>
</tr>
<? while ($qdom = mysql_fetch_array($qnoticia)){ ?>
<tr>
<td width='600'>
<input type='hidden' name='id[]' value='<? echo $qdom[id]?>'>
<input type='hidden' name='acessorio[]' value='<? echo $qdom[acessorio]?>'>
<input type='hidden' name='acessorio2[]' value='<? echo $qdom[acessorio2]?>'>
Equipamento <select size="1" name="equipamento[]" class=form-especial>
<?
$noticia = mysql_query("SELECT * FROM equipamento where id = $qdom[equipamento]");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conexo<?
}
else{
if ($notician==0){
?>Nada Consta<? } else { ?><? while ($dom = mysql_fetch_array($noticia)){ ?>
<option  value="<? echo $dom[id] ?>"><? echo $dom[codigo] ?></option>
<?  } } } ?>
</select><br>
Operador: <select size="1" name="operador[]" class=form-especial>
<? if($qdom[operador]==cliente){?>
<option  value="cliente">Cliente</option>
<? } else { ?>
<?
$noticia = mysql_query("SELECT * FROM operador where id = '$qdom[operador]'");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conexo<?
}
else{
if ($notician==0){
?>Nada Consta<? } else { ?><? while ($dom = mysql_fetch_array($noticia)){ ?>
<option  value="<? echo $dom[id] ?>"><? echo $dom[nome] ?></option>
<?  } } } ?>  <? } ?></select> <br>
Data de volta: <input class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover' type=text name='volta[]' size='10' maxlength='10'>  <br>
H Retorno: <input class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover' value="" type=text name='horimetro_volta[]' size='10' maxlength='60'> <br>
Status:<select size="1" name="status[]" class=form-especial>
<?
$noticia = mysql_query("SELECT * FROM status where id != 0");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conexo<?
}
else{
if ($notician==0){
?>Nada Consta<? } else { ?><? while ($dom = mysql_fetch_array($noticia)){ ?>
<option  value="<? echo $dom[id] ?>#<? echo $dom[ativo] ?>" <? if($qdom[status]==$dom[id]){?>selected<? } else {}?>><? echo $dom[nome] ?></option>
<?  } } } ?>
</select>
<br>
OBS da Eqpto: <input class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover' value="" type=text name='OBS[]' size='20' maxlength='60'> <br>
<br><font class=font-10><span class=font-vinho>equipamento :</span></font><br>
Operador:
<select size="1" name="motorista[]">
<option selected value="">Escolha o motorista...</option>
<?
$noticia = mysql_query("SELECT * FROM operador where statusOperador = 'A' order by nome");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conexo<?
}
else{
if ($notician==0){
?>Nada Consta<? } else { ?>
<? while ($dom = mysql_fetch_array($noticia)){ ?>
<option  value="<? echo $dom[id] ?>"><? echo $dom[nome] ?></option>
<?  } } } ?>
<option  value="cliente">Cliente</option>
<option  value="Terceiro">Terceiro</option>
</select><br>
Transporte:
<select size="1" name="caminhao[]">
<option selected value="">Escolha o caminho...</option>
<?
$noticia = mysql_query("SELECT * FROM caminhao order by codigo");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conexo<?
}
else{
if ($notician==0){
?>Nada Consta<? } else { ?>
<? while ($dom = mysql_fetch_array($noticia)){ ?>
<option  value="<? echo $dom[id] ?>"><? echo $dom[codigo] ?></option>
<?  } } } ?>
<option  value="Terceiro">Terceiro</option>
<option  value="cliente">Cliente</option>
<option  value="rodando">Rodando</option>
</select><br><br><br>
</td>
</tr>
<? } ?>
<? } ?>
<tr>
<td width='600'><font class=font-10>&nbsp;</font></td>
</tr>
<tr>
<td width='600'><input type='image' src='imagens/layout_btativar.gif' width='54' height='16' border='0'></td>
</tr>
</form>
</table>
<?  } ?>
<? } elseif($modulo==fim){?>
<table border='0' width='600' cellspacing='1' cellpadding='0'>
<?
$Html='';
for($i = 0; $i < count($horimetro_volta); $i++){ ?>
<?
$data = date("Y-m-d");
$result = explode('#',$status[$i]);
$sql = mysql_query("UPDATE equipamento_obra SET status='b', fim='$volta[$i]', motivo_final='Conclus�o de Obra', horimetro_volta='$horimetro_volta[$i]', dtvoltaRel=NOW(), GARAGEM_FINAL = '$result[0]' WHERE id='$id[$i]' LIMIT 1;");
$new = $id[$i];


$SqlObra = mysql_query("SELECT f.nome as NOMEFAMILIA, q.CODIGO as eqtoCodigo ,e.operador, o.nome as operadorNome, e.acessorio, a.CODIGO as acessorioCodigo, DATE_FORMAT(e.inicio,'%d/%m/%Y') as dtInicio, DATE_FORMAT(e.fim,'%d/%m/%Y') as dtFim, e.horimetro_ida, e.horimetro_volta FROM equipamento_obra e inner join equipamento q on (q.id=e.equipamento) left join familia f on (q.familia=f.id) left join acessorio a on (a.id=e.acessorio) left join operador o on (o.id=e.operador) where e.id='".$new."';");
	while ($sE = mysql_fetch_array($SqlObra)){
	$cor = ($coralternada++ %2 ? "FFFFFF" : "FFFFDC");
	if($sE[operadorNome]==''){
		$sE[operadorNome]=$sE[operador];
	}
	if($sE[acessorioCodigo]==''){
		$sE[acessorioCodigo]=$sE[acessorio];
	}
	
		
$Html .= '<tr bgcolor="#'.$cor.'" height="20">
    <td><div align="center">'.$sE[NOMEFAMILIA].'</div></td>
    <td><div align="center">'.$sE[eqtoCodigo].'</div></td>
    <td><div align="center">'.$sE[operadorNome].'</div></td>
    <td><div align="center">'.$sE[acessorioCodigo].'</div></td>
    <td><div align="center">'.$sE[dtInicio].'</div></td> 
   <td><div align="center">'.$sE[dtFim].'</div></td>
    <td><div align="center">'.$sE[horimetro_ida].'</div></td>
    <td><div align="center">'.$sE[horimetro_volta].'</div></td>
	<td><div align="center">Conclus�o de Obra</div></td>
	<td><div align="center">'.statusE($result[0]).'</div></td> 
  </tr>';	
	}



$sql6 = mysql_query("INSERT INTO `caminhao_obra` ( `id` , `obra` , `equipamento` , `caminhao` , `motorista` , `data` ) VALUES ('', 'volta', '$id[$i]', '$caminhao[$i]', '$motorista[$i]', '$data');");
$sql2 = mysql_query("UPDATE equipamento SET status='$result[0]', ativo='$result[1]', OBS='$OBS[$i]' WHERE id='$equipamento[$i]' LIMIT 1;");
gravaSml($equipamento[$i],$result[0],$OBS[$i]);
if($operador[$i]==cliente){} else {
$sql3 = mysql_query("UPDATE operador SET status='a' WHERE id='$operador[$i]' LIMIT 1;");
$sql4 = mysql_query("UPDATE acessorio SET status='$result[0]', ativo='$result[1]' WHERE id='$acessorio[$i]' LIMIT 1;");
$sql5 = mysql_query("UPDATE acessorio SET status='$result[0]', ativo='$result[1]' WHERE id='$acessorio2[$i]' LIMIT 1;");
}
if (!$sql){
echo "No foi possivel a consulta.";}
else{
?>
<tr>
<td width='600'><center><font class=font-10><b class=font-vinho><br> O equipamento foi inativado com sucesso da obra !<br><br></b>
</font></center></td>
</tr>
<? } }?>
<?
$data = date("Y-m-d");
$sql = mysql_query("UPDATE obra SET status='b', fim='$data' WHERE id='$obra' LIMIT 1;");

$Sql = mysql_query("SELECT idProposta FROM obra where id='".$obra."'") or die (mysql_error());
$dom = mysql_fetch_array($Sql);

$AlteraDataInicio = mysql_query("Update proposta set dtprevisaoProposta='".$data."' where idProposta='".$dom[idProposta]."'");
if (!$sql){
echo "No foi possivel a consulta.";}
else{
?>
<tr>
<td width='600'><center><font class=font-10><b class=font-vinho><br> A obra foi finalizada com sucesso!<br><br></b>
</font></center></td>
</tr>
<? } ?>
</table>
<? estatitica("Finaliza Obra");

$Sqla = mysql_query("SELECT o.contrato, o.cliente,o.endereco, p.NOME_PATIO FROM obra o inner join patio p on (p.ID_PATIO=o.patio) where o.id='".$_POST[obra]."' Limit 1;");
$sO = mysql_fetch_array($Sqla);
$contrato = $sO[contrato];
$cliente = $sO[cliente];

$Html1 = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
<title>[MAPAES] Inclus�o de Equipamento em Obra</title>
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
    <td>Endere�o</td>
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
    <td width="15%" height="30" bgcolor="#FF0000"><div align="center" class="style1">Fam�lia</div></td>
    <td width="15%" height="30" bgcolor="#FF0000"><div align="center" class="style1">C�digo</div></td>
    <td bgcolor="#FF0000"><div align="center" class="style1">Operador</div></td>
    <td bgcolor="#FF0000"><div align="center" class="style1">Acess�rio</div></td>
    <td width="15%" bgcolor="#FF0000"><div align="center" class="style1">Inicio</div></td>
    <td width="15%" bgcolor="#FF0000"><div align="center" class="style1">Final</div></td>
    <td width="15%" bgcolor="#FF0000"><div align="center" class="style1">Horimetro Inicio</div></td>
    <td width="10%" bgcolor="#FF0000"><div align="center" class="style1">Horimetro Final</div></td>
	<td width="10%" bgcolor="#FF0000"><div align="center" class="style1">Motivo</div></td>
    <td width="20%" bgcolor="#FF0000"><div align="center" class="style1">Status</div></td>
  </tr>';
$Html2 ='</table></body></html>';



$msg = $Html1.$Html.$Html2;



$headers = "MIME-Version: 1.0\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\n";
$headers .= "From: MAPAES <mapaes@escad.com.br>\n";
/* Enviando a mensagem */
$SqlEmail = mysql_query("SELECT emailUsuario FROM login where emailobraUsuario='S'");
while ($sq = mysql_fetch_array($SqlEmail)){

	mail($sq[emailUsuario], "MAPAES: Conclus�o de Obra CONTRATO: ".$contrato." CLIENTE: ".$cliente, $msg, $headers); 
}
//mail("aline.b.lima@hotmail.com", "MAPAES: Conclus�o de Obra CONTRATO: ".$contrato." CLIENTE: ".$cliente, $msg, $headers); 
//mail("nadiclecio@escad.com.br", "MAPAES:  Conclus�o de Obra CONTRATO: ".$contrato." CLIENTE: ".$cliente, $msg, $headers);
//mail("alisson@escad.com.br", "MAPAES:  Conclus�o de Obra CONTRATO: ".$contrato." CLIENTE: ".$cliente, $msg, $headers);
//mail("grace@escad.com.br", "MAPAES:  Conclus�o de Obra CONTRATO: ".$contrato." CLIENTE: ".$cliente, $msg, $headers);
//mail("renata@escad.com.br", "MAPAES:  Conclus�o de Obra CONTRATO: ".$contrato." CLIENTE: ".$cliente, $msg, $headers);
//mail("barbara@escad.com.br", "MAPAES:  Conclus�o de Obra CONTRATO: ".$contrato." CLIENTE: ".$cliente, $msg, $headers);
//mail("jessica@escad.com.br", "MAPAES:  Conclus�o de Obra CONTRATO: ".$contrato." CLIENTE: ".$cliente, $msg, $headers);
//mail("edvaldo@escad.com.br", "MAPAES:  Conclus�o de Obra CONTRATO: ".$contrato." CLIENTE: ".$cliente, $msg, $headers);
//mail("leticia@escad.com.br", "MAPAES:  Conclus�o de Obra CONTRATO: ".$contrato." CLIENTE: ".$cliente, $msg, $headers);
//mail("mapaes@escad.com.br", "MAPAES: Conclus�o de Obra CONTRATO: ".$contrato." CLIENTE: ".$cliente, $msg, $headers); 
//mail("walter@escad.com.br", "MAPAES: Conclus�o de Obra CONTRATO: ".$contrato." CLIENTE: ".$cliente, $msg, $headers); 
//mail("jurandir@escad.com.br", "MAPAES: Conclus�o de Obra CONTRATO: ".$contrato." CLIENTE: ".$cliente, $msg, $headers); 
//mail("rodrigo.santos@escad.com.br", "MAPAES: Conclus�o de Obra CONTRATO: ".$contrato." CLIENTE: ".$cliente, $msg, $headers); 


?>
<script>window.setTimeout('changeurl();',2000); function changeurl(){window.location='index.php';}</script>
<? } elseif($modulo==buscar){?>
<?if (empty($por_tipo)) {
$noticia = mysql_query("SELECT * FROM obra order by contrato");
} else {
$noticia = mysql_query("SELECT * FROM obra where status = '$por_tipo' order by contrato");
}
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conexo<?
}
else{
if ($notician==0){
?>
<table border='0' width='730' cellspacing='1' cellpadding='0'>
<tr>
<td width='730' colspan='7'>
Filtrar por perodo :</font> de <input class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover' type='text' name='inicio' size='11'> a <input class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover' type='text' name='fim' size='11'><input type='image' src='imagens/layout_btbuscar.gif' width='54' height='16' align='middle'></td></tr>
<tr>
<td width='730' validn='middle' colspan='7'>
<img src='imagens/layout_seta.gif' width="15" height="9"><b class=font-10>Visualizar obras</b><br>&nbsp;
</td>
</tr>
<tr>
<td width='730' bgcolor='#FFFFFF' colspan='5'><font class=font-11><span class=font-azul><center>no existe nenhum obra para est consulta</center></span></font></td>
</tr>
</table>
<?
}else {
?>

<table border='0' width='730' cellspacing='1' cellpadding='0'>
<tr>
<td width='730' colspan='8'>
Filtrar por perodo :</font> de <input class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover' type='text' name='inicio' size='11'> a <input class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover' type='text' name='fim' size='11'><input type='image' src='imagens/layout_btbuscar.gif' width='54' height='16' align='middle'></td></tr>
</tr>
<tr>
<td width='730' validn='middle' colspan='8'>
<img src='imagens/layout_seta.gif' width="15" height="9"><b class=font-10>Visualizar obra</b><br>&nbsp;
</td>
</tr>
<tr bgcolor='#EFEFEF'>
<td width='30'><b class=font-12><center><span class=font-preto>#</span></a></center></b></td>
<td width='250'><b class=font-12><span class=font-preto><center>Ao</center></span></b></td>
<td width='50'><b class=font-12>&nbsp;<span class=font-preto>Contrato</span></a></b></td>
<td width='280'><b class=font-12>&nbsp;<span class=font-preto>Cliente</span></a></b></td>
<td width='85'><b class=font-12>&nbsp;<span class=font-preto>Status</span></a></b></td>
<td width='85'><b class=font-12>&nbsp;<span class=font-preto>Inicio</span></a></b></td>
</tr>
<? while ($dom = mysql_fetch_array($noticia)){
$cor = ($coralternada++ %2 ? "FFFFFF" : "FFFFDC");?>
<tr bgcolor='<? echo $cor ?>'>
<td width='30'><font class=font-11><span class=font-cinza-1><center><? echo $dom[id]?></center></span></font></td>
<td width='250'><center>
	<? if($Pf[viewObraPm]=='S'){?><a href='?modulo=editar&obra=<? echo $dom[id]?>&contrato=<? echo $dom[contrato]?>'><img src='imagens/layout_btvisualizarobra.gif' width='60' height='16' border='0'></a><? } ?>
    
	<? if($dom[status]=='a'){?>
    	<? if($Pf[addeObraPm]=='S'){?>
    <a href='?modulo=inserirmaquina&obra=<? echo $dom[id]?>&contrato=<? echo $dom[contrato]?>&cliente=<? echo $dom[cliente]?>'><img src='imagens/layout_btadicionarepto.gif' width='60' height='16' border='0'></a><? } ?>
		<? if($Pf[doneObraPm]=='S'){?>
      <a href='?modulo=finalizar&obra=<? echo $dom[id]?>&contrato=<? echo $dom[contrato]?>'><img src='imagens/layout_btfinalizaobra.gif' width='60' height='16' border='0'></a>
        <? } ?>
	<? }?>
<? if($dom[status]=='b'){?>
	<? if($Pf[restartObraPm]=='S'){?><a href='javascript:reativarContrato("<? echo $dom[id]?>")'><img src='imagens/layout_ATIVAR.gif' width='60' height='16' border='0'></a>
    <? }?>
<? } ?>
</font></center></td>
<td align="center"><font class=font-11><span class=font-cinza-1><? echo $dom[contrato]?></span></font></td>
<td width='280'><font class=font-11><span class=font-cinza-1>&nbsp;<? echo $dom[cliente]?></span></font></td>
<td width='85'><font class=font-11><span class=font-cinza-1>&nbsp;<? if($dom[status]==a){?>Em andamento<? } elseif($dom[status]==b){?>Finalizar Obra<? }  else {}?></span></font></td>
<td width='85' <? if($dom[status]==b){?>OnMouseOver='popup_plus("Final em <? data($dom[fim]) ?>")' OnMouseOut='kill()' <? } else {} ?>><font class=font-11><span class=font-cinza-1>&nbsp;<? data($dom[inicio]) ?></span></font></td>
</tr>
<tr bgcolor='<? echo $cor ?>'>
<td width='30' colspan="3"><b class=font-12><center><span class=font-preto></span></a></center></b></td>
<td colspan="4"><b>Endereo:</b><? echo $dom[endereco]?></td></tr>
<? } ?>
<tr bgcolor='<? echo $cor ?>'>
<td width='730' colspan='5'><br><font class=font-11><center>
<p></p>
</center></table></font>
<? } } ?>
<? estatitica("Rela��o de Obra") ?>

<? } elseif($_REQUEST[modulo]=='excluirEqpto'){?>
<table border='0' width='700' cellspacing='1' cellpadding='0'>
<tr>
<td width='700'><center><font class=font-10><b class=font-vinho><br> Voc� tem certeza que desej� excluir este equipamento?<br><br></b>
<form method='POST' action='obra.php'>
<tr><td>
<p><center><input type='image' src='imagens/layout_btsim.gif' width='54' height='16'>
<a href='cobran�a.php?modulo=visualizar'><img border='0' src='imagens/layout_btnao.gif' width='54' height='16'></a></p>
<input type='hidden' name='modulo' value='delete'><input type='hidden' name='id' value='<? echo $_REQUEST[equipamento] ?>'>
</form>
</font></center></td>
</tr>
</table>
<? estatitica("Confirma Exclus�o de Equipamento: #".$_REQUEST[equipamento]) ?>
<? } elseif($modulo==delete){?>
<?
//echo "Update equipamento_obra set status='e' WHERE id='".$_POST[id]."' LIMIT 1;";
//exit;
$sql = mysql_query("Update equipamento_obra set status='e' WHERE id='".$_POST[id]."' LIMIT 1;");
estatitica("Exclus�o do Equipamento: #".$_POST[id]);
if (!$sql){
echo "N�o foi possivel a consulta.";}
else{
?>
<table border='0' width='700' cellspacing='1' cellpadding='0'>

<tr>
<td width='700'><center><font class=font-10><b class=font-vinho><br> O equipamento foi excluido com sucesso!<br><br></b>
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
<td colspan='5' height='4'><br><center><span class='font-09'> 2004-<?=date('Y');?> Web Plaza. Todos os direitos reservados.</span></center><br></td>
</tr>
<tr>
<td colspan='5' height='4' bgcolor='#B6B6B6'><img border='0' src='temas/imagens/spacer.gif' width='1' height='1'></td>
</tr>
</table>
</center>
</body>
</html>
