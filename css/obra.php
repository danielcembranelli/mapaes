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
<script language='javascript' src='include/ordena.js'></script>
<script language='javascript' src='include/dataform.js'></script>
<div id='dek'></div>
<script language='javascript' src='include/hint.js'></script><br><div align='center'>
<? if($modulo==criar){?>
<table border='0' width='600' cellspacing='1' cellpadding='0'>
<tr>
<td width='600' validn='middle'>
<img src='imagens/layout_seta.gif' width="15" height="9"><b class=font-10>Adicionar obra</b><br>&nbsp;
</td>
</tr>
<form method='POST' action='obra.php'>
<input type='hidden' name='modulo' value='cria'>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>contrato :</span></font></td>
</tr>
<tr>
<td width='600'>
<input type='text' name='contrato' size='50' maxlength='150' class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover'></td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>cliente :</span></font></td>
</tr>
<tr>
<td width='600'>
<input type='text' name='cliente' size='50' maxlength='150' class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover'></td>
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
<? } elseif($modulo==cria){?>
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
<input type='text' name='contrato' size='50' maxlength='150' class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover' value='<? echo $contrato ?>' readonly="true"></td>
</tr>
<? 
$sqlContrato = mysql_query("SELECT * FROM obra where contrato = $_POST[contrato] Limit 1");
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
<textarea class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover' rows='5' name='endereco' cols='40'></textarea></td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>p�tio respons�vel pela obra:</span></font></td>
</tr>
<tr>
<td width='600'>
<select size="1" name="patio" class=form-especial>
<? 
$noticia = mysql_query("SELECT * FROM patio order by NOME_PATIO");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conex�o<?
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
$noticia = mysql_query("SELECT * FROM equipamento where ativo = 'd' And `excluido` != 's'");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conex�o<?
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
Acess�rio:
</td><td><select size="1" name="acessorio[]" class=form-especial>
<option  value="nda">Sem acess�rio</option>
<? 
$noticia = mysql_query("SELECT * FROM acessorio where ativo = 'd' And `excluido` != 's'");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conex�o<?
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
Acess�rio 2 :</td><td> <select size="1" name="acessorio2[]" class=form-especial>
<option  value="nda">Sem acess�rio</option>
<? 
$noticia = mysql_query("SELECT * FROM acessorio where ativo = 'd' And `excluido` != 's'");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conex�o<?
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
P�tio Respons�vel pelo Eqpto:
</td>
<td>
<select size="1" name="patio_eqpto[]" class=form-especial>
<? 
$noticia = mysql_query("SELECT * FROM patio order by NOME_PATIO");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conex�o<?
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
Data In�cio:</td><td><input class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover' type=text name='inicio[]' size='10' maxlength='10'>
</td>
</tr>
<tr>
<td>
Nome do operador:</td><td>
<select size="1" name="operador[]" class=form-especial>
<option selected value="">Escolha o operador...</option>
<? 
$noticia = mysql_query("SELECT * FROM operador where status = 'a'");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conex�o<?
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
$noticia = mysql_query("SELECT * FROM operador");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conex�o<?
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
<option selected value="">Escolha o caminh�o...</option>
<? 
$noticia = mysql_query("SELECT * FROM caminhao order by codigo");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conex�o<?
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
$sql = mysql_query ("INSERT INTO `obra` ( `id` , `contrato` , `cliente` , `inicio` , `fim` , `status`, `endereco`, `patio` ) 
VALUES (
'', '$contrato','$cliente', '$inicioa', '', '$status', '$endereco', '$patio'
);");
if (!$sql){
echo "N�o foi possivel a consulta.";}
else{
$obra = mysql_insert_id();
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
$sql = mysql_query ("INSERT INTO equipamento_obra (obra,equipamento,acessorio2,acessorio,nosso,operador,status,inicio,horimetro_ida,ponto,GARAGEM_INICIO,PATIO) VALUES ('$obra','$equipamento[$i]','$acessorio2[$i]','$acessorio[$i]','$nosso[$i]','$operador[$i]','$status','$inicio[$i]','$horimetro_ida[$i]','$ponto[$i]','$status_eqpto','$patio_eqpto[$i]');");

if (!$sql){
echo "N�o foi possivel a consulta.";}
else{
?>
<tr>
<td width='600'><center><font class=font-10><b class=font-vinho><br> O equipamento foi adicionado com sucesso a obra !<br><br></b>
</font></center></td>
</tr>
<? } 

$new = mysql_insert_id();
$sql6 = mysql_query("INSERT INTO `caminhao_obra` ( `id` , `obra` , `equipamento` , `caminhao` , `motorista` , `data` ) VALUES ('', '$obra', '$new', '$caminhao[$i]', '$motorista[$i]', '$data');");

if (!$sql6){
echo "N�o foi possivel a consulta.";}
else{
?>
<tr>
<td width='600'><center><font class=font-10><b class=font-vinho><br> Frete adicionado com sucesso a obra !<br><br></b>
</font></center></td>
</tr>
<? } 

$sql2 = mysql_query("UPDATE equipamento SET status='9', ativo='o' WHERE id='$equipamento[$i]' LIMIT 1;");

if (!$sql2){
echo "N�o foi possivel a consulta.";}
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
<td width='600'><center><font class=font-10><b class=font-vinho><br> Alterado o Status do Acess�rio !<br><br></b>
</font></center></td>
</tr>
<? } 

$sql5 = mysql_query("UPDATE acessorio SET status='9', ativo='o' WHERE id='$acessorio2[$i]' LIMIT 1;");
if ($sql5){
?>
<tr>
<td width='600'><center><font class=font-10><b class=font-vinho><br> Alterado o Status do 2� Acess�rio !<br><br></b>
</font></center></td>
</tr>
<? } 

}

?>
<? } ?>
<script>window.setTimeout('changeurl();',2000); function changeurl(){window.location='index.php';}</script>
</table>
<? estatitica("Insere Obra") ?>

<? } elseif($modulo==editar){?>
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
?>
<?
if($acao=='endereco')
{
$endereco=nl2br($endereco);
$altera_tabela = mysql_query("UPDATE `obra` SET `contrato` = '$contrato',`endereco` = '$endereco', cliente='$cliente' WHERE `id` = $obra LIMIT 1 ;");
}

$sqlobra = mysql_query("SELECT * FROM `obra` WHERE `id` = '$obra'");
$ob = mysql_fetch_array($sqlobra);

$qnoticia = mysql_query("SELECT A.*, B.codigo, C.nome As nomefamilia  FROM equipamento_obra A inner join equipamento B on (A.equipamento=B.id) left join familia C on (B.familia=C.id) where obra = '$obra'");
$qnotician = mysql_num_rows($noticia);
if (!$qnoticia){
?>Problemas na conex�o<?
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
<td width='730' bgcolor='#FFFFFF' colspan='5'><font class=font-11><span class=font-azul><center>n�o existe nenhum equipamento para est� consulta</center></span></font></td>
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
<form method='POST' action='obra.php?modulo=editar&obra=<? echo $obra ?>&acao=endereco'>
<script>
function altera_patio(dado){
	if(confirm('Confirma altera��o do P�tio ??')){
		parent.top.window.location.href='obra.php?modulo=editar&obra=<? echo $obra ?>&patiovelho=<? echo $ob[patio] ?>&chave='+dado;
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
<input class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover' value="<? echo $ob[contrato] ?>" type=text name='contrato' size='50'></td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>cliente :</span></font></td>
</tr>
<tr>
<td width='600'>
<input class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover' value="<? echo $ob[cliente]?>" type=text name='cliente' size='50'>
</td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>p�tio :</span></font></td>
</tr>
<tr>
<td width='600'>
<select size="1" <? if($ob[status]!='a'){?>DISABLED<? } ?> onChange="if(options[selectedIndex].value) altera_patio((options[selectedIndex].value))">
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
<td width='600'><font class=font-10><span class=font-vinho>endere�o :</span></font></td>
</tr>
<tr>
<td width='600'>
<textarea class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover' rows='5' name='endereco' cols='40'><? echo strip_tags($ob[endereco]) ?></textarea>
<br>
<input type='image' <? if($_SESSION["login"]!="nadiclecio"){?>disabled="disabled"<? } ?> src='imagens/layout_bteditar.gif' width='54' height='16' border='0'></td>
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
<? if($qdom[status]==a){?>
<a href='?modulo=edita&equipamento=<? echo $qdom[id]?>'><img src='imagens/layout_bteditarepto.gif' width='60' height='16' border='0'></a>
<a href='?modulo=muda&equipamento=<? echo $qdom[id]?>'><img src='imagens/layout_btmudareqpto.gif' width='60' height='16' border='0'></a>
<a href='?modulo=equipamento&equipamento=<? echo $qdom[id]?>'><img src='imagens/layout_btfinalizarepto.gif' width='60' height='16' border='0'></a><? } else { ?>&nbsp;&nbsp;H Retorno: <input disabled class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover' value="<? echo $qdom[horimetro_volta]?>" type=text name='horimetro_volta' size='10' maxlength='60'> <? } ?>
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
<? } elseif($modulo==equipamento){?>
<?
$qnoticia = mysql_query("SELECT * FROM equipamento_obra where id = '$equipamento'");
$qnotician = mysql_num_rows($noticia);
if (!$qnoticia){
?>Problemas na conex�o<?
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
<td width='730' bgcolor='#FFFFFF' colspan='5'><font class=font-11><span class=font-azul><center>n�o existe nenhum equipamento para est� consulta</center></span></font></td>
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
?>Problemas na conex�o<?
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
<td width='600'><font class=font-10><span class=font-vinho>acess�rio:</span></font></td>
</tr>
<tr>
<td width='600'>
<select size="1" name="acessorio" class=form-especial>
<? 
$noticia = mysql_query("SELECT * FROM acessorio where id = $qdom[acessorio]");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conex�o<?
}
else{
if ($notician==0){
?>Nada Consta<? } else { ?><? while ($dom = mysql_fetch_array($noticia)){ ?>
			<option  value="<? echo $dom[id] ?>"><? echo $dom[codigo] ?></option>
			<?  } } } ?>
          </select>
</td>
<tr>

<td width='600'><font class=font-10><span class=font-vinho>acess�rio 2:</span></font></td>
</tr>
<tr>
<td width='600'>
<select size="1" name="acessorio2" class=form-especial>
<? 
$noticia = mysql_query("SELECT * FROM acessorio where id = $qdom[acessorio2]");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conex�o<?
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
?>Problemas na conex�o<?
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
?>Problemas na conex�o<?
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
$noticia = mysql_query("SELECT * FROM operador");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conex�o<?
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
<option selected value="">Escolha o caminh�o...</option>
<? 
$noticia = mysql_query("SELECT * FROM caminhao order by codigo");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conex�o<?
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
<td width='600'><input type='image' <? if($_SESSION["login"]!="nadiclecio"){?>disabled="disabled"<? } ?> src='imagens/layout_bteditar.gif' width='54' height='16' border='0'></td>
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
$sql = mysql_query("UPDATE equipamento_obra SET status='b', fim='$volta', horimetro_volta='$horimetro_volta', GARAGEM_FINAL = '$result[0]' WHERE id='$id' LIMIT 1;");
$sql6 = mysql_query("INSERT INTO `caminhao_obra` ( `id` , `obra` , `equipamento` , `caminhao` , `motorista` , `data` ) VALUES ('', 'volta', '$id', '$caminhao', '$motorista', '$data');");
$sql4 = mysql_query("UPDATE acessorio SET status='$result[0]', ativo='$result[1]' WHERE id='$acessorio' LIMIT 1;");
$sql4 = mysql_query("UPDATE acessorio SET status='$result[0]', ativo='$result[1]' WHERE id='$acessorio2' LIMIT 1;");
$sql2 = mysql_query("UPDATE equipamento SET status='$result[0]', ativo='$result[1]', OBS='$OBS' WHERE id='$equipamento' LIMIT 1;");
if($operador==cliente){} else {
$sql3 = mysql_query("UPDATE operador SET status='a' WHERE id='$operador' LIMIT 1;");
}
if (!$sql){
echo "N�o foi possivel a consulta.";}
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
<? estatitica("Finaliza equipamento em obra") ?>
<? } elseif($modulo==edita){?>
<?
$qnoticia = mysql_query("SELECT * FROM equipamento_obra where id = '$equipamento'");
$qnotician = mysql_num_rows($noticia);
if (!$qnoticia){
?>Problemas na conex�o<?
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
<td width='730' bgcolor='#FFFFFF' colspan='5'><font class=font-11><span class=font-azul><center>n�o existe nenhum equipamento para est� consulta</center></span></font></td>
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

<? while ($qdom = mysql_fetch_array($qnoticia)){ ?>
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
?>Problemas na conex�o<?
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
$noticia = mysql_query("SELECT * FROM operador");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conex�o<?
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
<tr>
<td width='600'><font class=font-10><span class=font-vinho>Horimetro Final:</span></font></td>
</tr>
<tr>
<td width='600'>
<input class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover' value="<? echo $qdom[horimetro_volta]?>" type=text name='horimetro_volta' size='10' maxlength='60'>
</td>
</tr>
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
<td width='600'><font class=font-10><span class=font-vinho>Acess�rio:</span></font></td>
</tr>
<tr>
<td width='600'>
<select size="1" name="acessorio" class=form-especial>
<option <? if($qdom[acessorio]==nda){?>selected<? } else {}?>  value="nda">Sem acess�rio</option>
<? 
$noticia = mysql_query("SELECT * FROM acessorio where `excluido` != 's'");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conex�o<?
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
<td width='600'><font class=font-10><span class=font-vinho>Acess�rio 2:</span></font></td>
</tr>
<tr>
<td width='600'>
<select size="1" name="acessorio2" class=form-especial>
<option <? if($qdom[acessorio2]==nda){?>selected<? } else {}?>  value="nda">Sem acess�rio</option>
<? 
$noticia = mysql_query("SELECT * FROM acessorio where `excluido` != 's'");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conex�o<?
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
<td width='600'><font class=font-10><span class=font-vinho>Legenda:</span></font></td>
</tr>
<tr>
<td width='600'>
<span style="background-color: #3399FF">Em obra</span>: Em obra<br>
<span style="background-color: #FF0000">Em manuten��o</span>: Em manuten��o

</td>
</tr>

<? } ?>
<tr>
<td width='600'><font class=font-10>&nbsp;</font></td>
</tr>
<tr>
<td width='600'><input type='image' <? if($_SESSION["login"]!="nadiclecio"){?>disabled="disabled"<? } ?> src='imagens/layout_bteditar.gif' width='54' height='16' border='0'></td>
</tr>
</form>
</table>
<? }  }?>

<? } elseif($modulo==edita2){?>
<?
$result = explode('#',$status);
$sql = mysql_query("UPDATE equipamento_obra SET operador='$operador', horimetro_ida='$horimetro_ida', acessorio='$acessorio', acessorio2='$acessorio2', ponto='$ponto', PATIO='$patio' WHERE id='$id' LIMIT 1;");
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
if (!$sql){
echo "N�o foi possivel a consulta.";}
else{
?>
<table border='0' width='600' cellspacing='1' cellpadding='0'>
<tr>
<td width='600'><center><font class=font-10><b class=font-vinho><br> O equipamento foi editado com sucesso da obra !<br><br></b>
</font></center></td>
</tr>
</table>
<script>window.setTimeout('changeurl();',2000); function changeurl(){window.location='index.php';}</script>
<? } ?>




<?} elseif($modulo==inserirmaquina){?>
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
<td width='600'><input type='image' <? if($_SESSION["login"]!="nadiclecio"){?>disabled="disabled"<? } ?> src='imagens/layout_btcadastrar.gif' width='54' height='16' border='0'></td>
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
?>Problemas na conex�o<?
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
Acess�rio:
</td><td><select size="1" name="acessorio[]" class=form-especial>
<option  value="nda">Sem acess�rio</option>
<? 
$noticia = mysql_query("SELECT * FROM acessorio where ativo = 'd' And `excluido` != 's'");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conex�o<?
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
Acess�rio 2 :</td><td> <select size="1" name="acessorio2[]" class=form-especial>
<option  value="nda">Sem acess�rio</option>
<? 
$noticia = mysql_query("SELECT * FROM acessorio where ativo = 'd' And `excluido` != 's'");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conex�o<?
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
P�tio Respons�vel pelo Eqpto:
</td>
<td>
<select size="1" name="patio_eqpto[]" class=form-especial>
<? 
$noticia = mysql_query("SELECT * FROM patio order by NOME_PATIO");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conex�o<?
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
Data In�cio:</td><td><input class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover' type=text name='inicio[]' size='10' maxlength='10'>
</td>
</tr>
<tr>
<td>
Nome do operador:</td><td>
<select size="1" name="operador[]" class=form-especial>
<option selected value="">Escolha o operador...</option>
<? 
$noticia = mysql_query("SELECT * FROM operador where status = 'a'");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conex�o<?
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
$noticia = mysql_query("SELECT * FROM operador");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conex�o<?
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
<option selected value="">Escolha o caminh�o...</option>
<? 
$noticia = mysql_query("SELECT * FROM caminhao order by codigo");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conex�o<?
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
<td width='600'><input type='image' <? if($_SESSION["login"]!="nadiclecio"){?>disabled="disabled"<? } ?> src='imagens/layout_btcadastrar.gif' width='54' height='16' border='0'></td>
</tr>
</form>
</table>
<? } elseif($modulo==inseremaquina){?>
<table border='0' width='600' cellspacing='1' cellpadding='0'>
<?
for($i = 0; $i < count($equipamento); $i++){ ?>
<?
if(!$equipamento[$i]){ } else {
$status = "a";
$data = date("Y-m-d");
$status_eqpto = status_eqpto($equipamento[$i]);
$sql = mysql_query ("INSERT INTO equipamento_obra (obra,equipamento,acessorio2,acessorio,nosso,operador,status,inicio,horimetro_ida,ponto,GARAGEM_INICIO,PATIO) VALUES ('$obra','$equipamento[$i]','$acessorio2[$i]','$acessorio[$i]','$nosso[$i]','$operador[$i]','$status','$inicio[$i]','$horimetro_ida[$i]','$ponto[$i]','$status_eqpto','$patio_eqpto[$i]');");
$new = mysql_insert_id();
$sql6 = mysql_query("INSERT INTO `caminhao_obra` ( `id` , `obra` , `equipamento` , `caminhao` , `motorista` , `data` ) VALUES ('', '$obra', '$new', '$caminhao[$i]', '$motorista[$i]', '$data');");
$sql2 = mysql_query("UPDATE equipamento SET status='9', ativo='o' WHERE id='$equipamento[$i]' LIMIT 1;");
if($operador[$i]==cliente){} else {
$sql3 = mysql_query("UPDATE operador SET status='b' WHERE id='$operador[$i]' LIMIT 1;");
$sql4 = mysql_query("UPDATE acessorio SET status='9', ativo='o' WHERE id='$acessorio[$i]' LIMIT 1;");
$sql5 = mysql_query("UPDATE acessorio SET status='9', ativo='o' WHERE id='$acessorio2[$i]' LIMIT 1;");
}
if (!$sql){
echo "N�o foi possivel a consulta.";}
else{
?>
<tr>
<td width='600'><center><font class=font-10><b class=font-vinho><br> O equipamento foi adicionado com sucesso a obra !<br><br></b>
</font></center></td>
</tr>
<? } ?>
<? } } ?>
<? estatitica("Adicione Equipamento a Obra") ?>
<script>window.setTimeout('changeurl();',2000); function changeurl(){window.location='index.php';}</script>
</table>

<? } elseif($modulo==finalizar){?>
<?
$qnoticia = mysql_query("SELECT * FROM equipamento_obra where obra = '$obra' And status = 'a'");
$qnotician = mysql_num_rows($noticia);
if (!$qnoticia){
?>Problemas na conex�o<?
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
<td width='730' bgcolor='#FFFFFF' colspan='5'><font class=font-11><span class=font-azul><center>n�o existe nenhum equipamento para est� consulta</center></span></font></td>
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
?>Problemas na conex�o<?
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
?>Problemas na conex�o<?
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
?>Problemas na conex�o<?
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
$noticia = mysql_query("SELECT * FROM operador");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conex�o<?
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
<option selected value="">Escolha o caminh�o...</option>
<? 
$noticia = mysql_query("SELECT * FROM caminhao order by codigo");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conex�o<?
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
<?for($i = 0; $i < count($horimetro_volta); $i++){ ?>
<?
$data = date("Y-m-d");
$result = explode('#',$status[$i]);
$sql = mysql_query("UPDATE equipamento_obra SET status='b', fim='$volta[$i]', horimetro_volta='$horimetro_volta[$i]', GARAGEM_FINAL = '$result[0]' WHERE id='$id[$i]' LIMIT 1;");
$new = mysql_insert_id();
$sql6 = mysql_query("INSERT INTO `caminhao_obra` ( `id` , `obra` , `equipamento` , `caminhao` , `motorista` , `data` ) VALUES ('', 'volta', '$id[$i]', '$caminhao[$i]', '$motorista[$i]', '$data');");
$sql2 = mysql_query("UPDATE equipamento SET status='$result[0]', ativo='$result[1]', OBS='$OBS[$i]' WHERE id='$equipamento[$i]' LIMIT 1;");
if($operador[$i]==cliente){} else {
$sql3 = mysql_query("UPDATE operador SET status='a' WHERE id='$operador[$i]' LIMIT 1;");
$sql4 = mysql_query("UPDATE acessorio SET status='$result[0]', ativo='$result[1]' WHERE id='$acessorio[$i]' LIMIT 1;");
$sql5 = mysql_query("UPDATE acessorio SET status='$result[0]', ativo='$result[1]' WHERE id='$acessorio2[$i]' LIMIT 1;");
}
if (!$sql){
echo "N�o foi possivel a consulta.";}
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
if (!$sql){
echo "N�o foi possivel a consulta.";}
else{
?>
<tr>
<td width='600'><center><font class=font-10><b class=font-vinho><br> A obra foi finalizada com sucesso!<br><br></b>
</font></center></td>
</tr>
<? } ?>
</table>
<? estatitica("Finaliza Obra") ?>
<script>window.setTimeout('changeurl();',2000); function changeurl(){window.location='index.php';}</script>


<? } elseif($modulo==buscar){?>
<?if (empty($por_tipo)) { 
$noticia = mysql_query("SELECT * FROM obra order by contrato");
} else {
$noticia = mysql_query("SELECT * FROM obra where status = '$por_tipo' order by contrato");
}
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conex�o<?
}
else{
if ($notician==0){
?>
<table border='0' width='730' cellspacing='1' cellpadding='0'>
<tr>
<td width='730' colspan='7'>
Filtrar por per�odo :</font> de <input class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover' type='text' name='inicio' size='11'> a <input class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover' type='text' name='fim' size='11'><input type='image' src='imagens/layout_btbuscar.gif' width='54' height='16' align='middle'></td></tr>
<tr>
<td width='730' validn='middle' colspan='7'>
<img src='imagens/layout_seta.gif' width="15" height="9"><b class=font-10>Visualizar obras</b><br>&nbsp;
</td>
</tr>
<tr>
<td width='730' bgcolor='#FFFFFF' colspan='5'><font class=font-11><span class=font-azul><center>n�o existe nenhum obra para est� consulta</center></span></font></td>
</tr>
</table>
<?
}else {
?>
<table border='0' width='730' cellspacing='1' cellpadding='0'>
<tr>
<td width='730' colspan='7'>
Filtrar por per�odo :</font> de <input class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover' type='text' name='inicio' size='11'> a <input class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover' type='text' name='fim' size='11'><input type='image' src='imagens/layout_btbuscar.gif' width='54' height='16' align='middle'></td></tr>
</tr>
<tr>
<td width='730' validn='middle' colspan='7'>
<img src='imagens/layout_seta.gif' width="15" height="9"><b class=font-10>Visualizar obra</b><br>&nbsp;
</td>
</tr>
<tr bgcolor='#EFEFEF'>
<td width='30'><b class=font-12><center><span class=font-preto>#</span></a></center></b></td>
<td width='250'><b class=font-12><span class=font-preto><center>A��o</center></span></b></td>
<td width='280'><b class=font-12>&nbsp;<span class=font-preto>Contrato</span></a></b></td>
<td width='85'><b class=font-12>&nbsp;<span class=font-preto>Status</span></a></b></td>
<td width='85'><b class=font-12>&nbsp;<span class=font-preto>Inicio</span></a></b></td>
</tr>
<? while ($dom = mysql_fetch_array($noticia)){ 
$cor = ($coralternada++ %2 ? "FFFFFF" : "FFFFDC");?>
<tr bgcolor='<? echo $cor ?>'>
<td width='30'><font class=font-11><span class=font-cinza-1><center><? echo $dom[id]?></center></span></font></td>
<td width='250'><center>
<a href='?modulo=editar&obra=<? echo $dom[id]?>&contrato=<? echo $dom[contrato]?>'><img src='imagens/layout_btvisualizarobra.gif' width='60' height='16' border='0'></a>

<? if($dom[status]==a){?><a href='?modulo=inserirmaquina&obra=<? echo $dom[id]?>&contrato=<? echo $dom[contrato]?>&cliente=<? echo $dom[cliente]?>'><img src='imagens/layout_btadicionarepto.gif' width='60' height='16' border='0'><? } else {}?></a>
<? if($dom[status]==a){?><a href='?modulo=finalizar&obra=<? echo $dom[id]?>&contrato=<? echo $dom[contrato]?>'><img src='imagens/layout_btfinalizaobra.gif' width='60' height='16' border='0'><? } else {}?></a>
</font></center></td>
<td width='280'><font class=font-11><span class=font-cinza-1>&nbsp;<? echo $dom[contrato]?> - <? echo $dom[cliente]?></span></font></td>
<td width='85'><font class=font-11><span class=font-cinza-1>&nbsp;<? if($dom[status]==a){?>Em andamento<? } elseif($dom[status]==b){?>Finalizar Obra<? }  else {}?></span></font></td>
<td width='85' <? if($dom[status]==b){?>OnMouseOver='popup_plus("Final em <? data($dom[fim]) ?>")' OnMouseOut='kill()' <? } else {} ?>><font class=font-11><span class=font-cinza-1>&nbsp;<? data($dom[inicio]) ?></span></font></td>
</tr>
<tr bgcolor='<? echo $cor ?>'>
<td width='30'><b class=font-12><center><span class=font-preto></span></a></center></b></td>
<td width='250'><b class=font-12><span class=font-preto><center></center></span></b></td>
<td colspan="3"><b>Endere�o:</b><? echo $dom[endereco]?></td></tr>
<? } ?>
<tr bgcolor='<? echo $cor ?>'>
<td width='730' colspan='5'><br><font class=font-11><center>
<p></p>
</center></table></font>
<? } } ?>
<? estatitica("Rela��o de Obra") ?>
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