<? include("verifica.php");?>
<html>
<head>
<title>:. HostAdmin v.2 - Tela de clientes .:</title>
<meta http-equiv='content-type' content='text/html; charset=iso-8859-1'>
<link rel='StyleSheet' href='temas/include/estilos.css' type='text/css'>
<link rel="stylesheet" href="js/ui.tabs.css" type="text/css" media="print, projection, screen">
<script language='JavaScript' src='temas/include/js/coolmenus4.js'></script>
<script language='JavaScript' src='temas/include/js/stm31.js'></script>
<script language='JavaScript' src='temas/include/js/menu2.js'></script>
<script type="text/javascript" src="js/jquery-1.2.3.pack.js"></script>
<script type="text/javascript" src="js/jquery-1.2.3.pack.js"></script>

<script src="js/ui.tabs.pack.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery.tablehover.js"></script>

<script>

function processXML(obj){
      //pega a tag cidade
      var dataArray   = obj.getElementsByTagName("cidade");
      document.maquina.idProprietario.options.length = 0;
	  //total de elementos contidos na tag cidade
	  if(dataArray.length > 0) {
	     //percorre o arquivo XML paara extrair os dados
         for(var i = 0 ; i < dataArray.length ; i++) {
            var item = dataArray[i];
			//cont�udo dos campos no arquivo XML
			var codigo    =  item.getElementsByTagName("codigo")[0].firstChild.nodeValue;
			var descricao =  item.getElementsByTagName("descricao")[0].firstChild.nodeValue;
			
	        //idOpcao.innerHTML = "--Selecione uma das op��es abaixo--";
			
			//cria um novo option dinamicamente  
			var novo = document.createElement("option");
			    //atribui um ID a esse elemento
			    novo.setAttribute("id", "opcoes");
				//atribui um valor
			    novo.value = codigo;
				//atribui um texto
			    novo.text  = descricao;
				//finalmente adiciona o novo elemento
				document.maquina.idProprietario.options.add(novo);
				//document.addMercadoria.products_atributo.options.add(novo);
		 }
	  }
	  else {
	    //caso o XML volte vazio, printa a mensagem abaixo
		//idOpcao.innerHTML = "--Sem complemento para o destino--";
	  }	  
   }

function listaProprietario(id){
	$.get("xmlProprietario.php",{idTp:id}, function(data){
		processXML(data)
		
		});   
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
<? if($_REQUEST[modulo]==criar){?>
<table border='0' width='600' cellspacing='1' cellpadding='0'>
<tr>
<td width='600' validn='middle'>
<img src='imagens/layout_seta.gif' width="15" height="9"><b class=font-10>Adicionar equipamento</b><br>&nbsp;
</td>
</tr>
<form method='POST' action='maquina.php' name="maquina">
<input type='hidden' name='modulo' value='criado'>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>propriet�rio :</span></font></td>
</tr>
<tr>
<td width='600'>
	<select size="1" name="idTp" class="form-especial" onChange="listaProprietario(this.value);">
	<option  value="0">Selecione...</option>
<? 
$noticiaa = mysql_query("SELECT idTp, nomeTp FROM tipoproprietario order by nomeTp");
while ($do = mysql_fetch_array($noticiaa)){ ?>

	<option  value="<?=$do[idTp] ?>" ><?=$do[nomeTp] ?></option>
			<? } ?>
            </select><select name="idProprietario"></select>
</td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>fam�lia :</span></font></td>
</tr>
<tr>
<td width='600'>
<select size="1" name="familia" class=form-especial>
<? 
$noticia = mysql_query("SELECT * FROM familia");
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
<td width='600'><font class=font-10><span class=font-vinho>horimetro atual :</span></font></td>
</tr>
<tr>
<td width='600'>
<input type='text' name='horimetro' size='6' maxlength='4' class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover'></td>
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
<td width='600'><input type='image' <? if($Pf[addEqptoPm]!='S'){?>disabled="disabled"<? } ?> src='imagens/layout_btcadastrar.gif' width='54' height='16' border='0'></td>
</tr>
</form>
</table>
<? } elseif($_POST[modulo]==criado){?>
<?
$data=date("Y-m-d");
$result = explode('#',$_POST[status]);
$sql = mysql_query ("INSERT INTO `equipamento` ( `id` , `familia` , `marca` , `modelo` , `seriechassi` , `codigo` , `ano` , `status` , `ativo`, `data`, `idTp`, `idProprietario`) 
VALUES (
'', '".$_POST[familia]."', '".$_POST[marca]."', '".$_POST[modelo]."', '".$_POST[seriechassi]."', '".$_POST[codigo]."', '".$_POST[ano]."', '".$result[0]."', '".$result[1]."', '".$data."', '".$_POST[idTp]."', '".$_POST[idProprietario]."');");
$epto = mysql_insert_id();

gravaSml($eqpto,$_POST[status],'Cadastro de Maquina');
if (!$sql){
echo "N�o foi possivel a consulta.";}
else{
?>
<table border='0' width='600' cellspacing='1' cellpadding='0'>
<tr>
<td width='600'><center><font class=font-10><b class=font-vinho><br> O equipamento <? echo $codigo ?> foi adicionado com sucesso!<br><br></b>
</font></center></td>
</tr>
<script>window.setTimeout('changeurl();',2000); function changeurl(){window.location='index.php';}</script></table><? } ?>
<? } elseif($_REQUEST[modulo]==editar){?>
<?
$noticia = mysql_query("SELECT *, OBS as dt FROM equipamento where id = '".$_REQUEST[id]."'");
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
<? while ($dom = mysql_fetch_array($noticia)){ ?>
<table border='0' width='600' cellspacing='1' cellpadding='0'>
<tr>
<td width='600' validn='middle'>
<img src='imagens/layout_seta.gif' width="15" height="9"><b class=font-10>Editar equipamento</b><br>&nbsp;
</td>
</tr>
<form method='POST' action='maquina.php' name="maquina">
<input type='hidden' name='modulo' value='editado'>
<input type='hidden' name='id' value='<? echo $dom[id] ?>'>
<input type='hidden' name='statusant' value="<?=$dom[status]?>">


<tr>
<td width='600'><font class=font-10><span class=font-vinho>propriet�rio :</span></font></td>
</tr>
<tr>
<td width='600'>
	<select size="1" name="idTp" class="form-especial" onChange="listaProprietario(this.value);">
	<option  value="0">Selecione...</option>
<? 
$noticiaa = mysql_query("SELECT idTp, nomeTp FROM tipoproprietario order by nomeTp");
while ($do = mysql_fetch_array($noticiaa)){ ?>

	<option  value="<?=$do[idTp] ?>" <? if($do[idTp]==$dom[idTp]){?>selected<? } ?>><?=$do[nomeTp] ?></option>
			<? } ?>
            </select><select name="idProprietario"class="form-especial" >
            <? 
$noticiaa = mysql_query("SELECT idProprietario, nomeProprietario FROM proprietario where statusProprietario='A' And tipoProprietario='".$dom[idTp]."' order by nomeProprietario") or die (mysql_error());
while ($do = mysql_fetch_array($noticiaa)){ ?>

	<option  value="<?=$do[idProprietario] ?>" <? if($do[idProprietario]==$dom[idProprietario]){?>selected<? } ?>><?=$do[nomeProprietario] ?></option>
			<? } ?>
            </select>
</td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>fam�lia :</span></font></td>
</tr>
<tr>
<td width='600'>
<select size="1" name="familia" class=form-especial>
<? 
$fnoticia = mysql_query("SELECT * FROM familia");
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
<!--
<tr>
<td width='600'><font class=font-10><span class=font-vinho>Data de Manuten��o :</span></font></td>
</tr>
<tr>
<td width='600'>
<input type='text' name='adtManutencao' size='30' maxlength='90' class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover' value='<? echo $dom[dt] ?>'></td>
</tr>-->
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
<td width='600'><input type='image' src='imagens/layout_bteditar.gif' width='54' height='16' border='0'></td>
</tr>
</form>
</table>
<? } } } ?>
<? } elseif($modulo==editado){?>
<?
$result = explode('#',$status);
$dt = explode('/',$_POST[dtManutencao]);
$sql = mysql_query("UPDATE equipamento SET familia='$familia', marca='$marca', modelo='$modelo', seriechassi='$seriechassi', codigo='$codigo', idTp='$idTp', idProprietario='$idProprietario', excluido='$Exc', status='$result[0]', ativo='$result[1]', ano='$ano', OBS='$OBS', dtManutencao='".$dt[2]."-".$dt[1]."-".$dt[0]."' WHERE id='$id' LIMIT 1;");
if($_POST[statusant]!=$result[0]){
	gravaSml($_POST[id],$result[0],$OBS);
}
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

<? } elseif($_REQUEST[modulo]==buscar){?>


<?
if($Perfil==15){
$noticia = mysql_query("SELECT *, OBS as dt FROM equipamento where (`ativo`='m' And `excluido` = '$Status') or (`ativo`='d' And `excluido` = '$Status')  order by codigo,familia");	
} else {
$noticia = mysql_query("SELECT *, OBS as dt FROM equipamento where `excluido` = '$Status'  order by codigo,familia");
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
<img src='imagens/layout_seta.gif' width="15" height="9"><b class=font-10>Visualizar equipamento</b><br>&nbsp;
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
<td width='140'><center><font class=font-11>
<? if($dom[excluido]!=s){?>
<? if($Pf[delEqptoPm]=='S'){?><a href='?modulo=confirmadel&id=<? echo $dom[id]?>'><img src='imagens/layout_btexcluir.gif' width='54' height='16' border='0'></a><? } ?>&nbsp;<? } ?>
<? if($Pf[editEqptoPm]=='S'){?><a href='?modulo=editar&id=<? echo $dom[id]?>'><img src='imagens/layout_bteditar.gif' width='54' height='16' border='0'></a><? } ?></font></center></td>
<td width='440'><font class=font-11><span class=font-cinza-1>&nbsp;<? echo $dom[codigo]?> - <? familianome($dom[familia]) ?></span></font></td>
<td width='120' align="center"><font class=font-11><span class=font-cinza-1>
<? if($dom[excluido]==s){?>Excluido<?} else {?><? status($dom[status]) ?> (<? echo $dom[OBS] ?>)<? } ?></span></font></td>
</tr>
<? } ?>

<tr>
<td width='730' colspan='5'><br><font class=font-11><center>
<p></p>
</center></table></font>
<? } } ?>
<? } elseif($_REQUEST[modulo]=='acha'){?>


<?

$noticia = mysql_query("SELECT *, OBS as dt FROM equipamento where `familia` = '".$_REQUEST[familia]."' And `status` = '".$_REQUEST[status]."' And `excluido` != 's'  order by codigo,familia");

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
<img src='imagens/layout_seta.gif' width="15" height="9"><b class=font-10>Visualizar equipamento</b><br>&nbsp;
</td>
</tr>
<tr bgcolor='#EFEFEF'>
<td width='30'><b class=font-12><center><span class=font-preto>#</span></center></b></td>
<td width='50'><b class=font-12><span class=font-preto><center>C�digo</center></span></b></td>
<td width='200'><b class=font-12><span class=font-preto><center>Familia</center></span></b></td>
<td width='20'><b class=font-12><span class=font-preto><center>Ano</center></span></b></td>
<td width='20'><b class=font-12><span class=font-preto><center>Horimetro</center></span></b></td>
<td width='200'><b class=font-12><span class=font-preto><center>Classica��o</center></span></b></td>
</tr>
<? while ($dom = mysql_fetch_array($noticia)){ 
$cor = ($coralternada++ %2 ? "FFFFFF" : "FFFFDC");
$anoticia = mysql_query("SELECT eo.*, DATE_FORMAT(p.dtprevisaoProposta,'%d/%m/%Y') as dtPrevisao FROM equipamento_obra eo inner join obra o on (o.id=eo.obra) left join proposta p on (p.idProposta=o.idProposta) where `equipamento` = '".$dom[id]."' order by id desc LIMIT 1");
$adom = mysql_fetch_array($anoticia);
?>
<tr bgcolor='<? echo $cor ?>'>
<td width='30'><font class=font-11><span class=font-cinza-1><center><? echo $dom[id]?></center></span></font></td>
<td width='50'><font class=font-11><span class=font-cinza-1><center><? echo $dom[codigo]?></center></span></font></td>
<td width='200'><font class=font-11><span class=font-cinza-1><center><? familianome($dom[familia]) ?></center></span></font></td>
<td width='20'><font class=font-11><span class=font-cinza-1><center><?=$dom[ano]?></center></span></font></td>
<td width='20'><font class=font-11><span class=font-cinza-1><center><? if($adom[horimetro_volta]==''){ echo $adom[horimetro_ida]; } else { echo $adom[horimetro_volta]; }?></center></span></font></td>
<td width='200'><font class=font-11><span class=font-cinza-1><center><? status($dom[status]) ?> (<? echo $dom[OBS] ?><? echo $dom[dt] ?>)</center></span></font></td>
</tr>
<? if($dom[ativo]==o){?>
<tr bgcolor='<? echo $cor ?>'>
<td width='730'  colspan='6'><font class=font-11><span class=font-cinza-1><center>
<font class=font-11><span class=font-cinza-1>&nbsp;<? if($adom[status]==a){?><b><font color="#FF0000">Obra em andamento:</font><? } else {}?><? obranome($adom[obra]) ?> - Operador: <?if($adom[operador]==cliente){?>Cliente<? } else {?><? operador($adom[operador]) ?><? } ?><? if($adom[status]==a){?></b><? } else {}?></span></font>
<font class=font-11><span class=font-cinza-1><center>Inicio: <? data($adom[inicio])  ?> Previs�o Desmobiliza��o: <?=$adom[dtPrevisao]?> <center></span></font>
</center></span></font></td>
</tr>
<? } ?>
<? } ?>

<tr>
<td width='730' colspan='5'><br><font class=font-11><center>
<p></p>
</center></table></font>
<? } } ?>

<? } elseif($_REQUEST[modulo]==localiza){?>
<table border='0' width='730' cellspacing='1' cellpadding='0'>
<tr>
<td width='730' validn='middle' colspan='7'>
<img src='imagens/layout_seta.gif' width="15" height="9"><b class=font-10>Buscar equipamento </b><br>&nbsp;
</td>
</tr>
<tr>
<td width='730' bgcolor='#FFFFFF' colspan='5'><font class=font-11><span class=font-azul><center>equipamento: 
<select size="1" class=form-especial onChange="if(options[selectedIndex].value) window.location.href = (options[selectedIndex].value)">
<option  value="#">Lista de Equipamento</option>
<? 
$noticia = mysql_query("SELECT * FROM equipamento where `excluido` != 's' order by codigo");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conex�o<?
}
else{
if ($notician==0){
?>Nada Consta<? } else { ?><? while ($dom = mysql_fetch_array($noticia)){ ?>
			<option  value="maquina.php?modulo=localiza&id=<? echo $dom[id] ?>" <? if($_REQUEST[id]==$dom[id]){?>selected<? } ?>><? echo $dom[codigo] ?></option>
			<?  } } } ?>
          </select></center></span></font></td>
</tr>
</table>
<table border='0' width='730' cellspacing='1' cellpadding='0'>
<tr>
<td width='730' bgcolor='#FFFFFF' colspan='5' align="center">
<?

if($_REQUEST[id]!=''){
	$e = mysql_query("SELECT * FROM equipamento where `id`= '".$_REQUEST[id]."' order by codigo") or die (mysql_error());
	$e = mysql_fetch_array($e);
	}
?>
<br><font class=font-11><span class=font-azul>Equipamento:</span></font><?=$e[codigo] ?>
<br><font class=font-11><span class=font-azul>Status atual do equipamento:</span></font><? status($e[status]) ?>  
<br><font class=font-11><span class=font-azul>Familia :</span></font><? fami($e[familia]) ?>
<br><font class=font-11><span class=font-azul>Observa��o :</span></font><?=$e[OBS]; ?></center><br><br></td>
</tr>
</table>


<script>
$(function() {
                $('#container-1 > ul').tabs();
			});
</script>
		
<div id="container-1" style="width:720px">
            <ul>
                <li><a href="#index"><span>Obras</span></a></li>
                <li><a href="#historico"><span>Hist�rico</span></a></li>
            </ul>
<div id="index">            
	<?
    $noticia = mysql_query("SELECT * FROM equipamento_obra where `equipamento` = '".$_REQUEST[id]."' order by inicio desc");
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
    <td width='560'><b class=font-12><span class=font-preto><center>Obra</center></span></b></td>
    <td width='140'><b class=font-12><span class=font-preto><center>Data de Inicio</center></span></b></td>
    </tr>
    <? while ($dom = mysql_fetch_array($noticia)){ 
    $cor = ($coralternada++ %2 ? "FFFFFF" : "FFFFDC");
    ?>
    <tr bgcolor='<? echo $cor ?>'>
    <td width='30'><font class=font-11><span class=font-cinza-1><center><? echo $dom[id]?></center></span></font></td>
    <td width='560'><font class=font-11><span class=font-cinza-1>&nbsp;<? if($dom[status]==a){?><b><font color="#FF0000">Obra em andamento:</font><? } else {}?><? obranome($dom[obra]) ?> - Operador: <?if($dom[operador]==cliente){?>Cliente<? } else {?><? operador($dom[operador]) ?><? } ?><? if($dom[status]==a){?></b><? } else {}?></span></font>&nbsp;Horimetro Inicial: <?=$dom[horimetro_ida];?><? if($dom[status]==b){?>&nbsp;Horimetro Final: <?=$dom[horimetro_volta];?><? } ?></td>
    <td width='140'  <? if($dom[status]==b){?>OnMouseOver='popup_plus("Data de Fim <? data($dom[fim]) ?>")' OnMouseOut='kill()' <? } else {} ?>><font class=font-11><span class=font-cinza-1><center><? data($dom[inicio])  ?><center></span></font></td>
    </tr>
    <? } ?>
    </table>
    <? } } ?>
</div>
<div id="historico">
<table border='0' width='730' cellspacing='1' cellpadding='0'>
    <td width='730' validn='middle' colspan='7'>
    <br>
    <img src='imagens/layout_seta.gif' width="15" height="9"><b class=font-10>Hist�rico da Maquina</b>&nbsp;
    </td>
    </tr>
    <tr bgcolor='#EFEFEF'>
    <td width='180'><b class=font-12><center><span class=font-preto>Data</span></center></b></td>
    <td width='200'><b class=font-12><span class=font-preto><center>Status</center></span></b></td>
    <td width='350'><b class=font-12><span class=font-preto><center>Obs</center></span></b></td>
    </tr>
    <? 
	$noticia = mysql_query("SELECT idStatus, obsSml, DATE_FORMAT(dtSml,'%d/%m/%Y %Hh%imin') as dt FROM statusmaquinalog where `idEquipamento` = '".$_REQUEST[id]."' order by idSml desc");
	while ($dom = mysql_fetch_array($noticia)){ 
    $cor = ($coralternada++ %2 ? "FFFFFF" : "FFFFDC");
    ?>
     <tr bgcolor='<?=$cor?>'>
    <td width='180' align="center"><font class=font-11><center><?=$dom[dt]?></center></font></td>
    <td width='200' align="center"><font class=font-11><? status($dom[idStatus])?></font></td>
    <td width='350' align="center"><font class=font-11><?=$dom[obsSml]?></font></td>
    </tr>
    <? } ?>
    </table>
    
</div>
</div>


	


<? } elseif($modulo==confirmadel){?>
<table border='0' width='700' cellspacing='1' cellpadding='0'>
<tr>
<td width='700'><center><font class=font-10><b class=font-vinho><br> Voc� tem certeza que desej� excluir este equipamento?<br><br></b>
<form method='POST' action='maquina.php'>
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
$sql = mysql_query("UPDATE equipamento SET dataexclusao='$data', excluido='s' WHERE id='$id' LIMIT 1;");
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
<script>window.setTimeout('changeurl();',2); function changeurl(){window.location='index.php';}</script>
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