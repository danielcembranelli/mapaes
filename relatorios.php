<? include("verifica.php");?>
<html>
<head>
<title>:. HostAdmin v.2 - Tela de Relatórios</title>
<meta http-equiv='content-type' content='text/html; charset=iso-8859-1'>
<link rel='StyleSheet' href='temas/include/estilos.css' type='text/css'>
<script language='JavaScript' src='temas/include/js/coolmenus4.js'></script>
<script language='JavaScript' src='temas/include/js/stm31.js'></script>
<script language='JavaScript' src='temas/include/js/menu2.js'></script>
<script type="text/javascript" src="open-flash-chart/js/swfobject.js"></script>
<script type="text/javascript" src="js/jquery-1.2.3.pack.js"></script>
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
			//contéudo dos campos no arquivo XML
			var codigo    =  item.getElementsByTagName("codigo")[0].firstChild.nodeValue;
			var descricao =  item.getElementsByTagName("descricao")[0].firstChild.nodeValue;
			
	        //idOpcao.innerHTML = "--Selecione uma das opções abaixo--";
			
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
<script language='javascript' src='include/dataform.js'></script><script language='javascript' src='include/imprimir_relatorio.js'></script><br><div align='center'>
<? if($_REQUEST[modulo]==maquina){?>
<!--Inicio-->
<table border='0' width='600' cellspacing='1' cellpadding='0'>
<tr>
<td width='600' validn='middle'>
<img src='imagens/layout_seta.gif' width="15" height="9"><b class=font-10>Relatório de maquinas</b>
</td>
</tr>
<tr>
<td width='600'>

<br>

<form method='POST' action='gerarelatorio1.php' target='_blank'>
<table border='0' width='450' cellspacing='0' cellpadding='0'>
<? 
$noticia = mysql_query("SELECT * FROM status order by nome");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conexão<?
}
else{
if ($notician==0){
?>Nada Consta<? } else { ?><? while ($dom = mysql_fetch_array($noticia)){ ?>
<tr>
<td width='450' class=line-height-5>
<span class=font-11><input type='radio' value='<? echo $dom[id] ?>' name='status'><? echo $dom[nome] ?><br></span>
</td>
</tr>
<? } } } ?>
<tr>
<td width='450' class=line-height-5>
<span class=font-11><input type='radio' value='todas' name='status'>Todas<br></span>
</td>
</tr>
<tr>
<td width='450' class=line-height-5>
<p align='center'>&nbsp;</p>
</td>
</tr>
<tr>
<td width='450' class=line-height-5>
<input type='image' src='imagens/layout_btenviar.gif' width="54" height="16">
</td>
</tr>
</table>
</form>
<br>
</td>
</tr>
</table>
</div>
<!--Fim-->
<? } elseif($_REQUEST[modulo]==proprietario){?>
<!--Inicio-->
<table border='0' width='600' cellspacing='1' cellpadding='0'>
<tr>
<td width='600' validn='middle'>
<img src='imagens/layout_seta.gif' width="15" height="9"><b class=font-10>Relatório de maquina por proprietario</b>
</td>
</tr>
<tr>
<td width='600'>
<br>
<form method='POST' action='gerarelatorio_maqProprietario.php' target='_blank' name="maquina">
<table border='0' width='450' cellspacing='0' cellpadding='0'>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>proprietário :</span></font></td>
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
<td width='450' class=line-height-5>
<p align='center'>&nbsp;</p>
</td>
</tr>
<tr>
<td width='450' class=line-height-5>
<input type='image' src='imagens/layout_btenviar.gif' width="54" height="16">
</td>
</tr>
</table>
</form>
<br>
</td>
</tr>
</table>
</div>
<!--Fim-->
<? } elseif($_REQUEST[modulo]==mecanico){?>
<!--Inicio-->
<table border='0' width='600' cellspacing='1' cellpadding='0'>
<tr>
<td width='600' validn='middle'>
<img src='imagens/layout_seta.gif' width="15" height="9"><b class=font-10>Relatório de Equipamentos por mecânico</b>
</td>
</tr>
<tr>
<td width='600'>
<br>
<form method='POST' action='gerarelatorio_mecanico.php' target='_blank' name="maquina">
<table border='0' width='450' cellspacing='0' cellpadding='0'>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>mecânico :</span></font></td>
</tr>
<tr>
<td width='600'>
	<select size="1" name="idMecanico" class="form-especial">
	<option  value="0">Selecione...</option>
<? 
$noticiaa = mysql_query("SELECT idMecanico, nomeMecanico FROM mecanico order by nomeMecanico");
while ($do = mysql_fetch_array($noticiaa)){ ?>

	<option  value="<?=$do[idMecanico] ?>" ><?=$do[nomeMecanico] ?></option>
			<? } ?>
            </select>
</td>
</tr>
<tr>
<td width='450' class=line-height-5>
<p align='center'>&nbsp;</p>
</td>
</tr>
<tr>
<td width='450' class=line-height-5>
<input type='image' src='imagens/layout_btenviar.gif' width="54" height="16">
</td>
</tr>
</table>
</form>
<br>

<form method='POST' action='RelatorioMecanicoPeriodo.php' target='_blank'>
<table border='0' width='450' cellspacing='0' cellpadding='0'>
<tr>
<td width='600' validn='middle'>
<img src='imagens/layout_seta.gif' width="15" height="9"><b class=font-10>Relatório de Mecânico/Periodo</b>
</td>
</tr>
<tr>
<td width='450'><font class=font-10><span class=font-vinho>data inicial :</span></font></td>
</tr>
<tr>
<td width='450' class=line-height-5>
<span class=font-11><input class='form-especial' onblur=this.className='boxnormal' onfocus=this.className='boxover' type='text' name='dtini' size='30' maxlength='10'></span>
</td>
</tr>
<tr>
<td width='450'><font class=font-10><span class=font-vinho>data final :</span></font></td>
</tr>
<tr>
<td width='450' class=line-height-5>
<span class=font-11><input class='form-especial' onblur=this.className='boxnormal' onfocus=this.className='boxover' type='text' name='dtfim' size='30' maxlength='10'></span>
</td>
</tr>
<tr>
<td width='450' class=line-height-5><br>
<input type='image' src='imagens/layout_btenviar.gif' width="54" height="16">
</td>
</tr>
</table>
</form>
</td>
</tr>
</table>
</div>
<!--Fim-->

<? } elseif($_REQUEST[modulo]==operador){?>
<!--Inicio-->
<table border='0' width='600' cellspacing='1' cellpadding='0'>
<tr>
<td width='600' validn='middle'>
<img src='imagens/layout_seta.gif' width="15" height="9"><b class=font-10>Relatório de operador</b>
</td>
</tr>
<tr>
<td width='600'>
<br>
<form method='POST' action='gerarelatorio2.php' target='_blank'>
<table border='0' width='450' cellspacing='0' cellpadding='0'>
<tr>
<td width='450' class=line-height-5>
<span class=font-11><input type='radio' value='a' name='status'>Disponiveis<br></span>
</td>
</tr>
<tr>
<td width='450' class=line-height-5>
<span class=font-11><input type='radio' value='b' name='status'>Em obra<br></span>
</td>
</tr>
<tr>
<td width='450' class=line-height-5>
<span class=font-11><input type='radio' value='todas' name='status'>Todos<br></span>
</td>
</tr>
<tr>
<td width='450' class=line-height-5>
<p align='center'>&nbsp;</p>
</td>
</tr>
<tr>
<td width='450' class=line-height-5>
<input type='image' src='imagens/layout_btenviar.gif' width="54" height="16">
</td>
</tr>
</table>
</form>
<br>
</td>
</tr>
</table>
</div>
<!--Fim-->
<? } elseif($_REQUEST[modulo]==obra){?>
<!--Inicio-->
<table border='0' width='600' cellspacing='1' cellpadding='0'>
<tr>
<td width='600' validn='middle'>
<img src='imagens/layout_seta.gif' width="15" height="9"><b class=font-10>Relatório de Obra</b>
</td>
</tr>
<tr>
<td width='600'>
<br>
<form method='POST' action='RelatorioObraTempo.php' target='_blank'>
<table border='0' width='450' cellspacing='0' cellpadding='0'>
<tr>
<td width='450'><font class=font-10><span class=font-vinho>dias ativas :</span></font></td>
</tr>
<tr>
<td width='450' class=line-height-5>
<span class=font-11><input class='form-especial' onblur=this.className='boxnormal' onfocus=this.className='boxover' type='text' name='Dias' size='30' maxlength='10'></span>
</td>
<tr>
<tr>
<td width='450' class=line-height-5>
<input type='image' src='imagens/layout_btenviar.gif' width="54" height="16">
</td>
</tr>
</table>
</form>
<br>
</td>
</tr>
</table>
</div>
<!--Fim-->
<? } elseif($_REQUEST[modulo]=='FrotaCapacidade'){?>
<!--Inicio-->
<table border='0' width='600' cellspacing='1' cellpadding='0'>
<tr>
<td width='600' validn='middle'>
<img src='imagens/layout_seta.gif' width="15" height="9"><b class=font-10>Frota e Capacidade</b>
</td>
</tr>
<tr>
<td width='600'>
<br>
<form method='POST' action='RelatorioFrotaCapacidade.php' target='_blank'>
<table border='0' width='450' cellspacing='0' cellpadding='0'>
<tr>
<td width='450'><a href="gerarelatorio4.php" target="_blank"><b>Situação Atual</b></a><br/><br/></td>
</tr>
<tr>
<td width='450'><font class=font-10><span class=font-vinho>data inicial :</span></font></td>
</tr>
<tr>
<td width='450' class=line-height-5>
<span class=font-11><input class='form-especial' onblur=this.className='boxnormal' onfocus=this.className='boxover' type='text' name='dtini' size='30' maxlength='10'></span>
</td>
</tr>
<tr>
<td width='450'><font class=font-10><span class=font-vinho>data final :</span></font></td>
</tr>
<tr>
<td width='450' class=line-height-5>
<span class=font-11><input class='form-especial' onblur=this.className='boxnormal' onfocus=this.className='boxover' type='text' name='dtfim' size='30' maxlength='10'></span>
</td>
</tr>
<tr>
<td width='450'><br/></td>
</tr>
<tr>
<td width='450'><font class=font-10><span class=font-vinho>comparar data inicial :</span></font></td>
</tr>
<tr>
<td width='450' class=line-height-5>
<span class=font-11><input class='form-especial' onblur=this.className='boxnormal' onfocus=this.className='boxover' type='text' name='dtinic' size='30' maxlength='10'></span>
</td>
</tr>
<tr>
<td width='450'><font class=font-10><span class=font-vinho>comparar data final :</span></font></td>
</tr>
<tr>
<td width='450' class=line-height-5>
<span class=font-11><input class='form-especial' onblur=this.className='boxnormal' onfocus=this.className='boxover' type='text' name='dtfimc' size='30' maxlength='10'></span>
</td>
</tr>

<tr>
<td width='450' class=line-height-5><br>
<input type='image' src='imagens/layout_btenviar.gif' width="54" height="16">
</td>
</tr>
</table>
</form>
<br>
</td>
</tr>
</table>
</div>
<!--Fim-->
<? } elseif($_REQUEST[modulo]==MaquinaStatus){?>
<!--Inicio-->
<table border='0' width='600' cellspacing='1' cellpadding='0'>
<tr>
<td width='600' validn='middle'>
<img src='imagens/layout_seta.gif' width="15" height="9"><b class=font-10>Relatório de Disponibilidade Comercial</b>
</td>
</tr>
<tr>
<td width='600'>
<br>
<form method='POST' action='RelStatusMaquina.php' target='_blank'>
<table border='0' width='450' cellspacing='0' cellpadding='0'>
<tr>
<td width='450' class=line-height-5>
<span class=font-11><input type='radio' value='d' name='status'>Disponiveis<br></span>
</td>
</tr>
<tr>
<td width='450' class=line-height-5>
<span class=font-11><input type='radio' value='o' name='status'>Em obra<br></span>
</td>
</tr>
<tr>
<td width='450' class=line-height-5>
<span class=font-11><input type='radio' value='m' name='status'>Manutenção<br></span>
</td>
</tr>
<tr>
<td width='450' class=line-height-5>
<span class=font-11><input type='radio' value='b' name='status'>Observação<br></span>
</td>
</tr>
<tr>
<td width='450' class=line-height-5>
<p align='center'>&nbsp;</p>
</td>
</tr>
<tr>
<td width='450' class=line-height-5>
<input type='image' src='imagens/layout_btenviar.gif' width="54" height="16">
</td>
</tr>
</table>
</form>
<br>
</td>
</tr>
</table>
</div>
<!--Fim-->
<? } elseif($_REQUEST[modulo]==maquinaporobra){?>
<!--Inicio-->
<table border='0' width='600' cellspacing='1' cellpadding='0'>
<tr>
<td width='600' validn='middle'>
<img src='imagens/layout_seta.gif' width="15" height="9"><b class=font-10>Relatório de Maquina por Obra Ativas</b>
</td>
</tr>
<tr>
<td width='600'>
<br>
<form method='POST' action='gerarelatorio3.php' target='_blank'>
<table border='0' width='450' cellspacing='0' cellpadding='0'>
<tr>
<td width='450'><font class=font-10><span class=font-vinho>obra :</span></font></td>
</tr>

<tr>
<td width='450' class=line-height-5>
<span class=font-11><select size="1" name="obra" class=form-especial>
<? 
if($LoginTipo=='V'){
	if($vPatio=='0'){
		$q = "SELECT o.id, o.contrato, o.cliente, l.nome as Vendedor FROM obra o left join proposta p on (o.idProposta=p.idProposta) left join login l on (p.idVendedor=l.id) where o.status='a' And p.idVendedor='".$login_id."' order by o.cliente";
	} else {
		$q = "SELECT o.id, o.contrato, o.cliente, l.nome as Vendedor FROM obra o left join proposta p on (o.idProposta=p.idProposta) left join login l on (p.idVendedor=l.id) where (o.status='a' And p.idVendedor='".$login_id."') or (o.status='a' And o.patio='".$vPatio."') order by o.cliente";
	}
} else {
	if($vPatio=='0'){
	$q = "SELECT o.id, o.contrato, o.cliente, l.nome as Vendedor FROM obra o left join proposta p on (o.idProposta=p.idProposta) left join login l on (p.idVendedor=l.id) where  o.status = 'a' order by o.cliente";
	} else {
		$q = "SELECT o.id, o.contrato, o.cliente, l.nome as Vendedor FROM obra o left join proposta p on (o.idProposta=p.idProposta) left join login l on (p.idVendedor=l.id) where  o.status = 'a' And o.patio='".$vPatio."' order by o.cliente";
	}
}
$noticia = mysql_query($q);
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conexão<?
}
else{
if ($notician==0){
?>Nada Consta<? } else { ?><? while ($dom = mysql_fetch_array($noticia)){ ?>
			<option  value="<? echo $dom[id] ?>"><? echo $dom[cliente] ?> - <? echo $dom[contrato] ?> (<?=$dom[Vendedor]?>)</option>
			<?  } } } ?>
          </select></span>
</td>
</tr>
<tr>
<td width='450'><font class=font-10><span class=font-vinho>status da maquina :</span></font></td>
</tr>
<tr>
<td width='450' class=line-height-5>
<span class=font-11><input type="checkbox" name="ativa" value="a">Ativa<br></span>
</td>
</tr>
<tr>
<td width='450' class=line-height-5>
<span class=font-11><input type="checkbox" name="inativa" value="a">Inativa<br></span>
</td>
</tr>
<tr>
<td width='450' class=line-height-5>
<p align='center'>&nbsp;</p>
</td>
</tr>
<tr>
<td width='450' class=line-height-5>
<input type='image' src='imagens/layout_btenviar.gif' width="54" height="16">
</td>
</tr>
</table>
</form>
<br>
</td>
</tr>
</table>
<!--Fim-->
<!--Inicio-->

<table border='0' width='600' cellspacing='1' cellpadding='0'>
<tr>
<td width='600' validn='middle'>
<img src='imagens/layout_seta.gif' width="15" height="9"><b class=font-10>Relatório de Maquina por Obra Inativas</b>
</td>
</tr>
<tr>
<td width='600'>
<form method='POST' action='relatorios.php'>
<input type='hidden' name='modulo' value='<? echo $modulo ?>'>
<input type='hidden' name='funcao' value='busca'>
<table border='0' width='450' cellspacing='0' cellpadding='0'>
<tr>
<td width='450'><font class=font-10><span class=font-vinho>data de inicio :</span></font></td>
</tr>
<tr>
<td width='450' class=line-height-5>
<span class=font-11><input class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover' type=text name='inicio' size='30' maxlength='10' onFocus=javascript:vDateType='3' onKeyUp=DateFormat(this,this.value,event,false,'3') onChange=DateFormat(this,this.value,event,true,'3')><font color="#000080" face="Verdana" size="1">dd/mm/aaaa</font></span>
</td>
</tr>
<tr>
<td width='450'><font class=font-10><span class=font-vinho>data de fim :</span></font></td>
</tr>
<tr>
<td width='450' class=line-height-5>
<span class=font-11><input class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover' type=text name='fim' size='30' maxlength='10' onFocus=javascript:vDateType='3' onKeyUp=DateFormat(this,this.value,event,false,'3') onChange=DateFormat(this,this.value,event,true,'3')>  <font color="#000080" face="Verdana" size="1">dd/mm/aaaa</font></span>
</td>
<tr>
<td width='450' class=line-height-5>
<p align='center'>&nbsp;</p>
</td>
</tr>
<tr>
<td width='450' class=line-height-5>
<input type='image' src='imagens/layout_btenviar.gif' width="54" height="16">
</td>
</tr>
</table>
</form>
<? if($funcao==busca) { ?>
<?
$result = explode('/',$inicio);
$resulta = explode('/',$fim);
$ainicio = "$result[2]-$result[1]-$result[0]";
$afim = "$resulta[2]-$resulta[1]-$resulta[0]"
?>
<form method='POST' action='gerarelatorio3.php' target='_blank'>
<table border='0' width='450' cellspacing='0' cellpadding='0'>
<tr>
<td width='450'><font class=font-10><span class=font-vinho>obra :</span></font></td>
</tr>

<tr>
<td width='450' class=line-height-5>
<span class=font-11><select size="1" name="obra" class=form-especial>
<? 


if($LoginTipo=='V'){
	if($vPatio=='0'){
		$q = "SELECT o.id, o.contrato, o.cliente, l.nome as Vendedor FROM obra o left join proposta p on (o.idProposta=p.idProposta) left join login l on (p.idVendedor=l.id) where (o.inicio between '$ainicio' and '$afim' And status = 'b' And o.status='b' And p.idVendedor='".$login_id."') or (o.fim between '$ainicio' and '$afim' And status = 'b' And o.status='b' And p.idVendedor='".$login_id."');";
	} else {
		$q = "SELECT o.id, o.contrato, o.cliente, l.nome as Vendedor FROM obra o left join proposta p on (o.idProposta=p.idProposta) left join login l on (p.idVendedor=l.id) where (o.inicio between '$ainicio' and '$afim' And status = 'b' And o.status='b' And p.idVendedor='".$login_id."') or (o.fim between '$ainicio' and '$afim' And status = 'b' And o.status='b' And p.idVendedor='".$login_id."') or (o.inicio between '$ainicio' and '$afim' And o.status='b' And o.patio='".$vPatio."') or (o.fim between '$ainicio' and '$afim' And o.status='b' And o.patio='".$vPatio."')";
	}
} else {
	
	$q = "SELECT o.id, o.contrato, o.cliente, l.nome as Vendedor FROM obra o left join proposta p on (o.idProposta=p.idProposta) left join login l on (p.idVendedor=l.id) where (o.fim between '$ainicio' and '$afim' And o.status = 'b') OR (o.inicio between '$ainicio' and '$afim' And o.status = 'b') order by o.cliente";
	
}

//"SELECT * FROM obra where (fim between '$ainicio' and '$afim' And status = 'b') OR (inicio between '$ainicio' and '$afim' And status = 'b') order by cliente"

$noticia = mysql_query($q);
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conexão<?
}
else{
if ($notician==0){
?>Nada Consta<? } else { ?><? while ($dom = mysql_fetch_array($noticia)){ ?>
			<option  value="<? echo $dom[id] ?>"><? echo $dom[cliente] ?> - <? echo $dom[contrato] ?> (<?=$dom[Vendedor]?>)</option>
			<?  } } } ?>
          </select></span>
</td>
</tr>
<tr>
<td width='450'><font class=font-10><span class=font-vinho>status da maquina :</span></font></td>
</tr>
<tr>
<td width='450' class=line-height-5>
<span class=font-11><input type="checkbox" name="inativa" value="a">Inativa<br></span>
</td>
</tr>
<tr>
<td width='450' class=line-height-5>
<p align='center'>&nbsp;</p>
</td>
</tr>
<tr>
<td width='450' class=line-height-5>
<input type='image' src='imagens/layout_btenviar.gif' width="54" height="16">
</td>
</tr>
</table>
</form>

<? } ?>

<br>
</td>
</tr>
</table>
</div>
<!--Fim-->
<? } elseif($_REQUEST[modulo]==notafiscal){?>
<!--Inicio-->
<table border='0' width='600' cellspacing='1' cellpadding='0'>
<tr>
<td width='600' validn='middle'>
<img src='imagens/layout_seta.gif' width="15" height="9"><b class=font-10>Lançamento de Notas por Obra</b>
</td>
</tr>
<tr>
<td width='600'>
<br>
<form method='POST' action='gerarelatorio_notafiscal.php' target='_blank'>
<table border='0' width='450' cellspacing='0' cellpadding='0'>
<tr>
<td width='450'><font class=font-10><span class=font-vinho>obra :</span></font></td>
</tr>

<tr>
<td width='450' class=line-height-5>
<span class=font-11><select size="6" name="obra" class=form-especial>
<? 
$noticia = mysql_query("SELECT * FROM obra order by contrato");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conexão<?
}
else{
if ($notician==0){
?>Nada Consta<? } else { ?><? while ($dom = mysql_fetch_array($noticia)){ ?>
			<option  value="<? echo $dom[id] ?>"><? echo $dom[contrato] ?> - <? echo $dom[cliente] ?></option>
			<?  } } } ?>
          </select></span>
</td>
</tr>
<tr>
<td width='450' class=line-height-5>
<p align='center'>&nbsp;</p>
</td>
</tr>
<tr>
<td width='450' class=line-height-5>
<input type='image' src='imagens/layout_btenviar.gif' width="54" height="16">
</td>
</tr>
</table>
</form>
<br>
</td>
</tr>
<tr>
<td width='600' validn='middle'>
<img src='imagens/layout_seta.gif' width="15" height="9"><b class=font-10>Lançamento de Notas por Equipamento</b>
</td>
</tr>
<tr>
<td width='600'>
<br>
<form method='POST' action='gerarelatorio_notafiscal2.php' target='_blank'>
<table border='0' width='450' cellspacing='0' cellpadding='0'>
<tr>
<td width='450'><font class=font-10><span class=font-vinho>equipamento :</span></font></td>
</tr>

<tr>
<td width='450' class=line-height-5>
<span class=font-11><select size="6" name="obra" class=form-especial>
<? 
$noticia = mysql_query("SELECT * FROM equipamento order by codigo");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conexão<?
}
else{
if ($notician==0){
?>Nada Consta<? } else { ?>
<? while ($dom = mysql_fetch_array($noticia)){ ?>
			<option  value="<? echo $dom[id] ?>"><? echo $dom[codigo] ?></option>
			<?  } } } ?>
          </select></span>
</td>
</tr>
<tr>
<td width='450' class=line-height-5>
<p align='center'>&nbsp;</p>
</td>
</tr>
<tr>
<td width='450' class=line-height-5>
<input type='image' src='imagens/layout_btenviar.gif' width="54" height="16">
</td>
</tr>
</table>
</form>
<br>
</td>
</tr>

<tr>
<td width='600' validn='middle'>
<img src='imagens/layout_seta.gif' width="15" height="9"><b class=font-10>Relação de Notas - Emitidas por período</b>
</td>
</tr>
<tr>
<td width='600'>
<br>
<form method='POST' action='gerarelatorio_notasemitidas.php' target='_blank'>
<table border='0' width='450' cellspacing='0' cellpadding='0'>
<tr>
<td width='450'><font class=font-10><span class=font-vinho>data de inicio :</span></font></td>
</tr>
<tr>
<td width='450' class=line-height-5>
<span class=font-11><input class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover' type=text name='inicio' size='30' maxlength='10' onFocus=javascript:vDateType='3' onKeyUp=DateFormat(this,this.value,event,false,'3') onChange=DateFormat(this,this.value,event,true,'3')><font color="#000080" face="Verdana" size="1">dd/mm/aaaa</font></span>
</td>
</tr>
<tr>
<td width='450'><font class=font-10><span class=font-vinho>data de fim :</span></font></td>
</tr>
<tr>
<td width='450' class=line-height-5>
<span class=font-11><input class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover' type=text name='fim' size='30' maxlength='10' onFocus=javascript:vDateType='3' onKeyUp=DateFormat(this,this.value,event,false,'3') onChange=DateFormat(this,this.value,event,true,'3')>  <font color="#000080" face="Verdana" size="1">dd/mm/aaaa</font></span>
</td>
<tr>
<td width='450' class=line-height-5>
<p align='center'>&nbsp;</p>
</td>
</tr>
<tr>
<td width='450' class=line-height-5>
<input type='image' src='imagens/layout_btenviar.gif' width="54" height="16">
</td>
</tr>
</table>
</form>

<form method='POST' action='gerarelatorio_notasemitidasobra.php' target='_blank'>
<table border='0' width='450' cellspacing='0' cellpadding='0'>

<tr>
<td width='600' validn='middle'>
<img src='imagens/layout_seta.gif' width="15" height="9"><b class=font-10>Relação de Notas - Emitidas por obra Ativas</b>
</td>
</tr>
<tr>
<td width='450' class=line-height-5>
<p align='center'>&nbsp;</p>
</td>
</tr>
<tr>
<td width='450'><font class=font-10><span class=font-vinho>obra :</span></font></td>
</tr>

<tr>
<td width='450' class=line-height-5>
<span class=font-11><select size="6" name="obra" class=form-especial>
<? 
$noticia = mysql_query("SELECT * FROM obra where status='a' order by contrato");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conexão<?
}
else{
if ($notician==0){
?>Nada Consta<? } else { ?><? while ($dom = mysql_fetch_array($noticia)){ ?>
			<option  value="<? echo $dom[id] ?>"><? echo $dom[contrato] ?> - <? echo $dom[cliente] ?></option>
			<?  } } } ?>
          </select></span>
</td>
</tr>
<tr>
<td width='450' class=line-height-5>
<p align='center'>&nbsp;</p>
</td>
</tr>
<tr>
<td width='450' class=line-height-5>
<input type='image' src='imagens/layout_btenviar.gif' width="54" height="16">
</td>
</tr>
</table>
</form>
<br>
</td>
</tr>
<tr>
<td width='600' validn='middle'>
<img src='imagens/layout_seta.gif' width="15" height="9"><b class=font-10>Relação de Notas - Emitidas por Equipamento</b>
</td>
</tr>
<tr>
<td width='600'>
<br>
<form method='POST' action='gerarelatorio_notasemitidaseqpto.php' target='_blank'>
<table border='0' width='450' cellspacing='0' cellpadding='0'>
<tr>
<td width='450'><font class=font-10><span class=font-vinho>equipamento :</span></font></td>
</tr>

<tr>
<td width='450' class=line-height-5>
<span class=font-11><select size="6" name="obra" class=form-especial>
<? 
$noticia = mysql_query("SELECT * FROM equipamento order by codigo");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conexão<?
}
else{
if ($notician==0){
?>Nada Consta<? } else { ?>
<? while ($dom = mysql_fetch_array($noticia)){ ?>
			<option  value="<? echo $dom[id] ?>#<? echo $dom[codigo] ?>"><? echo $dom[codigo] ?></option>
			<?  } } } ?>
          </select></span>
</td>
</tr>
<tr>
<td width='450' class=line-height-5>
<p align='center'>&nbsp;</p>
</td>
</tr>
<tr>
<td width='450' class=line-height-5>
<input type='image' src='imagens/layout_btenviar.gif' width="54" height="16">
</td>
</tr>
</table>
</form>

<tr>
<td width='600' validn='middle'>
<img src='imagens/layout_seta.gif' width="15" height="9"><b class=font-10>Consulta de notas emitidas</b>
</td>
</tr>
<tr>
<td width='600'>
<br>
<script type="text/javascript" src="js/jquery-1.2.3.pack.js"></script>
<link href="js/facebox/facebox.css" media="screen" rel="stylesheet" type="text/css"/>
<script src="js/facebox/facebox.js" type="text/javascript"></script> 
<SCRIPT language=Javascript>
jQuery(document).ready(function($) {
  $('a[rel*=facebox]').facebox() 
}) 
var loadingImage = '<center><img src="http://www.ajtrichards.co.uk/heartbeat/images/loading.gif" border="0" /><br/>Loading Data</center>';
function getUrl(obj){
$("#mainContent").empty();
$("#mainContent").append(loadingImage);
var address = obj;
$.ajax({
url: address,
dataType: "html",
type: "GET",
cache: false,
error: function(e){
$("#mainContent").empty();
$("#mainContent").append("<B>Application Error</B><br/>Unfortunately a fatal error has been encountered and the script cannot continue.<br/><br/>Please try again.");
return;
},
success: function(data){
$("#mainContent").empty();
$("#mainContent").append(data);
return;
}
});
}
function NotaFiscal(nr)
{
getUrl('NotaFiscal.php?nr='+nr,'1');
}
</SCRIPT>
<table border='0' width='650' cellspacing='0' cellpadding='0'>
<tr>
<td width='450'><font class=font-10><span class=font-vinho>nº da nota :</span></font></td>
</tr>
<tr>
<td width='450' class=line-height-5>
<input class='form-especial' onblur=this.className='boxnormal' onfocus=this.className='boxover' type=text name='nrNota' size='30'>&nbsp;<input type='image' src='imagens/icones/magnifier.png' width="16" height="16" onClick="NotaFiscal(nrNota.value);">
</td>
</tr>

<tr>
<td width='450' class=line-height-5><BR>
<div id="mainContent"></div>
</td>
</tr>
<tr>
<td width='450' class=line-height-5>

</td>
</tr>
</table>
</form>
<br>
</td>
</tr>
</table>
</div>
<!--Fim-->
<div id="info" style="display:none;"> 

<table>
<tr>
<td width='600' validn='middle'>
<img src='imagens/layout_seta.gif' width="15" height="9"><b class=font-10>Consulta de notas emitidas</b>
</td>
</tr>
</table>


</div> 

<a href="#info" rel="facebox">text</a>
<? } elseif($_REQUEST[modulo]==eqptoobra){?>

<table border='0' width='600' cellspacing='1' cellpadding='0'>
<tr>
<td width='600'>
<br>
</td>
</tr>
<tr>
<td width='600' validn='middle'>
<img src='imagens/layout_seta.gif' width="15" height="9"><b class=font-10>Lançamento de Notas por Equipamento</b>
</td>
</tr>
<tr>
<td width='600'>
<br>
<form method='POST' action='gerarelatorio_ultimaobra.php' target='_blank'>
<table border='0' width='450' cellspacing='0' cellpadding='0'>
<tr>
<td width='450'><font class=font-10><span class=font-vinho>equipamento :</span></font></td>
</tr>

<tr>
<td width='450' class=line-height-5>
<span class=font-11><select size="15" name="obra" class=form-especial>
<? 
$noticia = mysql_query("SELECT * FROM equipamento order by codigo");
$notician = mysql_num_rows($noticia);
if (!$noticia){
?>Problemas na conexão<?
}
else{
if ($notician==0){
?>Nada Consta<? } else { ?>
<? while ($dom = mysql_fetch_array($noticia)){ ?>
			<option  value="<? echo $dom[id] ?>"><? echo $dom[codigo] ?></option>
			<?  } } } ?>
          </select></span>
</td>
</tr>
<tr>
<td width='450' class=line-height-5>
<p align='center'>&nbsp;</p>
</td>
</tr>
<tr>
<td width='450' class=line-height-5>
<input type='image' src='imagens/layout_btenviar.gif' width="54" height="16">
</td>
</tr>
</table>
</form>
<br>
</td>
</tr>
<tr>
<td width='600'>
<br>

<br>
</td>
</tr>
</table>
</div>
<!--Fim-->

<? } elseif($_REQUEST[modulo]==resultadocomercialacessorio){?>
<!--Inicio-->
<table border='0' width='600' cellspacing='1' cellpadding='0'>
<tr>
<td width='600' validn='middle'>
<img src='imagens/layout_seta.gif' width="15" height="9"><b class=font-10>Resultados Comerciais de Acessório</b>
</td>
</tr>
<tr>
<td width='600'>
<br>
<form method='POST' action='gerarelatorio10.php' target='_blank'>
<table border='0' width='450' cellspacing='0' cellpadding='0'>
<tr>
<td width='450'><font class=font-10><span class=font-vinho>mês :</span></font></td>
</tr>
<tr>
<td width='450' class=line-height-5>
<span class=font-11>
  <select size="1" name="mes">
  <option>1</option>
  <option>2</option>
  <option>3</option>
  <option>4</option>
  <option>5</option>
  <option>6</option>
  <option>7</option>
  <option>8</option>
  <option>9</option>
  <option>10</option>
  <option>11</option>
  <option>12</option>
  </select>
</font></span>
</td>
</tr>
<tr>
<td width='450'><font class=font-10><span class=font-vinho>ano :</span></font></td>
</tr>
<tr>
<td width='450' class=line-height-5>
<span class=font-11><input class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover' type=text name='ano' size='10' maxlength='4'><font color="#000080" face="Verdana" size="1"></font></span>
</td>
</tr>
<tr>
<td width='450' class=line-height-5>
<p align='center'>&nbsp;</p>
</td>
</tr>
<tr>
<td width='450' class=line-height-5>
<input type='image' src='imagens/layout_btenviar.gif' width="54" height="16">
</td>
</tr>
</table>
</form>
<br>
</td>
</tr>
</table>
</div>
<!--Fim-->
<? } elseif($_REQUEST[modulo]==resultadocomercialacessoriofamilia){?>
<!--Inicio-->
<table border='0' width='600' cellspacing='1' cellpadding='0'>
<tr>
<td width='600' validn='middle'>
<img src='imagens/layout_seta.gif' width="15" height="9"><b class=font-10>Resultados Comerciais de Acessório por Família</b>
</td>
</tr>
<tr>
<td width='600'>
<br>
<form method='POST' action='gerarelatorio11.php' target='_blank'>
<table border='0' width='450' cellspacing='0' cellpadding='0'>
<tr>
<td width='450'><font class=font-10><span class=font-vinho>mês :</span></font></td>
</tr>
<tr>
<td width='450' class=line-height-5>
<span class=font-11>
  <select size="1" name="mes">
  <option>1</option>
  <option>2</option>
  <option>3</option>
  <option>4</option>
  <option>5</option>
  <option>6</option>
  <option>7</option>
  <option>8</option>
  <option>9</option>
  <option>10</option>
  <option>11</option>
  <option>12</option>
  </select>
</font></span>
</td>
</tr>
<tr>
<td width='450'><font class=font-10><span class=font-vinho>ano :</span></font></td>
</tr>
<tr>
<td width='450' class=line-height-5>
<span class=font-11><input class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover' type=text name='ano' size='10' maxlength='4'><font color="#000080" face="Verdana" size="1"></font></span>
</td>
</tr>
<tr>
<td width='450' class=line-height-5>
<p align='center'>&nbsp;</p>
</td>
</tr>
<tr>
<td width='450' class=line-height-5>
<input type='image' src='imagens/layout_btenviar.gif' width="54" height="16">
</td>
</tr>
</table>
</form>
<br>
</td>
</tr>
</table>
</div>
<!--Fim-->


<? } elseif($_REQUEST[modulo]==frete){?>
<!--Inicio-->
<table border='0' width='600' cellspacing='1' cellpadding='0'>
<tr>
<td width='600' validn='middle'>
<img src='imagens/layout_seta.gif' width="15" height="9"><b class=font-10>Fretes</b>
</td>
</tr>
<tr>
<td width='600'>
<br>
<form method='POST' action='rel_Frete.php' target='_blank'>
<table border='0' width='450' cellspacing='0' cellpadding='0'>
<tr>
<td width='450'><font class=font-10><span class=font-vinho>mês :</span></font></td>
</tr>
<tr>
<td width='450' class=line-height-5>
<span class=font-11>
  <select size="1" name="mes">
  <option>01</option>
  <option>02</option>
  <option>03</option>
  <option>04</option>
  <option>05</option>
  <option>06</option>
  <option>07</option>
  <option>08</option>
  <option>09</option>
  <option>10</option>
  <option>11</option>
  <option>12</option>
  </select>
</font></span>
</td>
</tr>
<tr>
<td width='450'><font class=font-10><span class=font-vinho>ano :</span></font></td>
</tr>
<tr>
<td width='450' class=line-height-5>
<span class=font-11><input class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover' type=text name='ano' size='10' maxlength='4'><font color="#000080" face="Verdana" size="1"></font></span>
</td>
</tr>
<tr>
<td width='450' class=line-height-5>
<p align='center'>&nbsp;</p>
</td>
</tr>
<tr>
<td width='450' class=line-height-5>
<input type='image' src='imagens/layout_btenviar.gif' width="54" height="16">
</td>
</tr>
</table>
</form>
<br>
</td>
</tr>
</table>
</div>
<!--Fim-->




<? } elseif($_REQUEST[modulo]==resultadocomercial){?>
<!--Inicio-->
<script>
function AbreRelatorio(mes)
{
	var data = mes.split('-');
	document.getElementById(data[0]).selected=true;
	document.relatorio.ano.value=data[1];
	document.relatorio.submit();
}
</script>
<table border='0' width='600' cellspacing='1' cellpadding='0'>
<tr>
<td width='600' validn='middle'>
<img src='imagens/layout_seta.gif' width="15" height="9"><b class=font-10>Resultados Comerciais</b>
</td>
</tr>
<tr>
<td width='600'>
<br>
<form name="relatorio" method='POST' action='RelatorioComercialGeral.php' target='_blank'>
<table border='0' width='450' cellspacing='0' cellpadding='0'>
<tr>
<td width='450'><font class=font-10><span class=font-vinho>mês :</span></font></td>
</tr>
<tr>
<td width='450' class=line-height-5>
<span class=font-11>
  <select size="1" name="mes">
  <option id="01" value="01">01</option>
  <option id="02" value="02">02</option>
  <option id="03" value="03">03</option>
  <option id="04" value="04">04</option>
  <option id="05" value="05">05</option>
  <option id="06" value="06">06</option>
  <option id="07" value="07">07</option>
  <option id="08" value="08">08</option>
  <option id="09" value="09">09</option>
  <option id="10" value="10">10</option>
  <option id="11" value="11">11</option>
  <option id="12" value="12">12</option>
  </select>
</font></span>
</td>
</tr>
<tr>
<td width='450'><font class=font-10><span class=font-vinho>ano :</span></font></td>
</tr>
<tr>
<td width='450' class=line-height-5>
<span class=font-11><input class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover' type=text name='ano' size='10' maxlength='4'><font color="#000080" face="Verdana" size="1"></font></span>
</td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>proprietário :</span></font></td>
</tr>
<tr>
<td width='600'>
	<select size="1" name="idTp" class="form-especial">
    <option value="0" >Todos</option>
<? 
$noticiaa = mysql_query("SELECT idTp, nomeTp FROM tipoproprietario order by nomeTp");
while ($do = mysql_fetch_array($noticiaa)){ ?>

	<option  value="<?=$do[idTp] ?>" ><?=$do[nomeTp] ?></option>
			<? } ?>
            </select>
</td>
</tr>
<tr>
<td width='450' class=line-height-5>
<p align='center'>&nbsp;</p>
</td>
</tr>
<tr>
<td width='450' class=line-height-5>
<input type='image' src='imagens/layout_btenviar.gif' width="54" height="16">
</td>
</tr>
</table>
</form>


<br>
</td>
</tr>
</table><div id="chart1" style="width:700px; height:200px;"></div>
<script type="text/javascript">
var so = new SWFObject("open-flash-chart/actionscript/open-flash-chart.swf", "ofc", "700", "200", "9", "#FFFFFF");
so.addVariable("data", "Grafico_loadStatus12meses.php");
so.addParam("allowScriptAccess", "always" );//"sameDomain");
so.write("chart1");
</script>
</div>

<!--Fim-->

<? } elseif($_REQUEST[modulo]==resultadocomercialfamilia){?>
<!--Inicio-->
<table border='0' width='600' cellspacing='1' cellpadding='0'>
<tr>
<td width='600' validn='middle'>
<img src='imagens/layout_seta.gif' width="15" height="9"><b class=font-10>Resultados Comerciais</b>
</td>
</tr>
<tr>
<td width='600'>
<br>
<form method='POST' action='gerarelatorio7.php' target='_blank'>
<table border='0' width='450' cellspacing='0' cellpadding='0'>
<tr>
<td width='450'><font class=font-10><span class=font-vinho>mês :</span></font></td>
</tr>
<tr>
<td width='450' class=line-height-5>
<span class=font-11>
  <select size="1" name="mes">
  <option>1</option>
  <option>2</option>
  <option>3</option>
  <option>4</option>
  <option>5</option>
  <option>6</option>
  <option>7</option>
  <option>8</option>
  <option>9</option>
  <option>10</option>
  <option>11</option>
  <option>12</option>
  </select>
</font></span></td>
</tr>
<tr>
<td width='450'><font class=font-10><span class=font-vinho>ano :</span></font></td>
</tr>
<tr>
<td width='450' class=line-height-5>
<span class=font-11><input class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover' type=text name='ano' size='10' maxlength='4'><font color="#000080" face="Verdana" size="1"></font></span></td>
</tr>
<tr>
<td width='600'><font class=font-10><span class=font-vinho>proprietário :</span></font></td>
</tr>
<tr>
<td width='600'>
	<select size="1" name="idTp" class="form-especial">
    <option value="0" >Todos</option>
<? 
$noticiaa = mysql_query("SELECT idTp, nomeTp FROM tipoproprietario order by nomeTp");
while ($do = mysql_fetch_array($noticiaa)){ ?>

	<option  value="<?=$do[idTp] ?>" ><?=$do[nomeTp] ?></option>
			<? } ?>
            </select>
</td>
</tr>
<tr>
  <td width='450' class=line-height-5>    <span class=font-11>
    <input name="Master" type="checkbox" id="Master" value="S">
    <label for="Master">Família Master</label>
    <font color="#000080" face="Verdana" size="1"></font></span> </td>
</tr>
<tr>
<td width='450' class=line-height-5>
<p align='center'>&nbsp;</p></td>
</tr>
<tr>
<td width='450' class=line-height-5>
<input type='image' src='imagens/layout_btenviar.gif' width="54" height="16"></td>
</tr>
</table>
</form>
<br>
</td>
</tr>
</table>
</div>
<!--Fim-->

<? } elseif($_REQUEST[modulo]==resultadocomercialgrupo){?>
<!--Inicio-->
<table border='0' width='600' cellspacing='1' cellpadding='0'>
<tr>
<td width='600' validn='middle'>
<img src='imagens/layout_seta.gif' width="15" height="9"><b class=font-10>Resultados Comerciais por Grupo</b>
</td>
</tr>
<tr>
<td width='600'>
<br>
<form method='POST' action='gerarelatorio_GrupoMedia.php' target='_blank'>
<table border='0' width='450' cellspacing='0' cellpadding='0'>

<tr>
<td width='450'><font class=font-10><span class=font-vinho>mês :</span></font></td>
</tr>
<tr>
<td width='450' class=line-height-5>
<span class=font-11>
  <select size="1" name="mes">
  <option>01</option>
  <option>02</option>
  <option>03</option>
  <option>04</option>
  <option>05</option>
  <option>06</option>
  <option>07</option>
  <option>08</option>
  <option>09</option>
  <option>10</option>
  <option>11</option>
  <option>12</option>
  </select>
</font></span>
</td>
</tr>
<tr>
<td width='450'><font class=font-10><span class=font-vinho>ano :</span></font></td>
</tr>
<tr>
<td width='450' class=line-height-5>
<span class=font-11><input class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover' type=text name='ano' size='10' maxlength='4'><font color="#000080" face="Verdana" size="1"></font></span>
</td>
</tr>
<tr>
<td width='450' class=line-height-5>
<p align='center'>&nbsp;</p>
</td>
</tr>
<tr>
<td width='450' class=line-height-5>
<input type='image' src='imagens/layout_btenviar.gif' width="54" height="16">
</td>
</tr>
</table>
</form>
<br>
</td>
</tr>
</table>
</div>
<!--Fim-->

<? } else {?>
<script>window.setTimeout('changeurl();',1); function changeurl(){window.location='index.php';}</script>
<? } ?>
</td>
</tr>
<tr>
<td colspan='5' height='4'><br><center><span class='font-09'>© 2004 - <?=date("Y");?> Cohrion do Brasil / WEB PLAZA. Todos os direitos reservados.</span></center><br></td>
</tr>
<tr>
<td colspan='5' height='4' bgcolor='#B6B6B6'><img border='0' src='temas/imagens/spacer.gif' width='1' height='1'></td>
</tr>
</table>
</center>
</body>
</html>