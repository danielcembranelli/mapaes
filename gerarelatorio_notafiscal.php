<? include("verifica.php")?>
<html>

<head>
<meta http-equiv="Content-Language" content="pt-br">
<meta name="GENERATOR" content="Microsoft FrontPage 5.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Emitido</title>
<link rel='StyleSheet' href='temas/include/estilos.css' type='text/css'>
<script language='JavaScript' src='temas/include/js/coolmenus4.js'></script>
<script language='JavaScript' src='temas/include/js/stm31.js'></script>
<script language='JavaScript' src='temas/include/js/menu2.js'></script>
</head>

<body>
<script language='javascript' src='include/ordena.js'></script>
<script language='javascript' src='include/dataform.js'></script>
<div id='dek'></div>
<script language='javascript' src='include/hint.js'></script>
<form method="POST" action="gerarelatorio5b.php">
 <table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#EFEFEF" width="100%" id="AutoNumber2">
    <tr>
      <td align="center"><font face="Verdana" size="2">Emitido</font></td>
      <td align="center"><font face="Verdana" size="2">Nota</font></td>
      <td align="center"><font face="Verdana" size="2">Empresa</font></td>
      <td align="center"><font face="Verdana" size="2">Contrato</font></td>
      <td align="center"><font face="Verdana" size="2">Equipamento</font></td>
      <td align="center"><font face="Verdana" size="2">Código</font></td>
      <td align="center"><font face="Verdana" size="2">Inicio | Fim</font></td>
      <td align="center"><font face="Verdana" size="2">Vigência da Nota</font></td>
    </tr>
<?
$qnoticia = mysql_query("SELECT * FROM equipamento_obra where status_nota = 'A' And obra = '$obra'");
$qnotician = mysql_num_rows($noticia);
if (!$qnoticia){
?>Problemas na conexão<?
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
<td width='730' bgcolor='#FFFFFF' colspan='5'><font class=font-11><span class=font-azul><center>não existe nenhum equipamento para está consulta</center></span></font></td>
</tr>
</table>
<?
}else {
?>

<? while ($qdom = mysql_fetch_array($qnoticia)){ ?>
      </font></td>
    <tr>
<input type="hidden" name="todo[]" value="1">
      <td align="center"><font size="1"><input type="radio" value="A" name="status[<? echo $qdom[id] ?>]" checked><b><font face="Verdana" size="1">Em 
  andamento</font></b><br>
  <input type="radio" value="C" name="status[<? echo $qdom[id] ?>]"><font face="Verdana" size="1">Concluido</font>
<br>
  <input type="radio" value="N" name="status[<? echo $qdom[id] ?>]"><font face="Verdana" size="1">Não Emitir</font>
</td>

      <td align="center"><font size="1"><input type="text" name="nota[]" size="10" class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover'></font></td>

<? 
$anoticia = mysql_query("SELECT * FROM obra where id = $qdom[obra]");
$anotician = mysql_num_rows($anoticia);
if (!$anoticia){
?>Problemas na conexão<?
}
else{
if ($anotician==0){
?>Nada Consta<? } else { ?>
<? while ($adom = mysql_fetch_array($anoticia)){ ?>


<input type="hidden" name="cliente[]" value="<? echo $adom[cliente]?>">
      <td align="center"><font face="Verdana" size="1"><? echo $adom[cliente]?></font>&nbsp;</td>


<input type="hidden" name="contrato[]" value="<? echo $adom[contrato]?>">
<input type="hidden" name="obra[]" value="<? echo $adom[id]?>">
<input type="hidden" name="eptoid[]" value="<? echo $qdom[id]?>">
      <td align="center"><font face="Verdana" size="1"><? echo $adom[contrato]?></font>&nbsp;</td>

<? } } } ?>
      <td align="center"><font face="Verdana" size="1"><? 
$anoticia = mysql_query("SELECT * FROM equipamento where id = $qdom[equipamento]");
$anotician = mysql_num_rows($anoticia);
if (!$anoticia){
?>Problemas na conexão<?
}
else{
if ($anotician==0){
?>Nada Consta<? } else { ?>
<? while ($adom = mysql_fetch_array($anoticia)){ ?>
<input type="hidden" name="familia[]" value="<? familianome($adom[familia]) ?>">
<? familianome($adom[familia]) ?>
<?  } } } ?>
      </font></td>
      <td align="center"><font face="Verdana" size="1">
<? 
$anoticia = mysql_query("SELECT * FROM equipamento where id = $qdom[equipamento]");
$anotician = mysql_num_rows($anoticia);
if (!$anoticia){
?>Problemas na conexão<?
}
else{
if ($anotician==0){
?>Nada Consta<? } else { ?>
<? while ($adom = mysql_fetch_array($anoticia)){ ?>
<input type="hidden" name="codigo[]" value="<? echo $adom[codigo] ?>">
<? echo $adom[codigo] ?>
<?  } } } ?>


</font></td>
<input type="hidden" name="endereco[]" value="<? echo $dom[endereco] ?>">
<input type="hidden" name="dataini[]" value="<? echo $qdom[inicio] ?>">
<input type="hidden" name="datafim[]" value="<? echo $qdom[fim] ?>">
<td align="center"><font face="Verdana" size="1"><? data($qdom[inicio]) ?> | <? data($qdom[fim]) ?></font></td>
<td align="center"><font face="Verdana" size="1">
<input type="text" name="nota_ini[]" size="12" class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover' onFocus=javascript:vDateType='3' onKeyUp=DateFormat(this,this.value,event,false,'3') onChange=DateFormat(this,this.value,event,true,'3')> | <input type="text" name="nota_fim[]" size="12" class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover' onFocus=javascript:vDateType='3' onKeyUp=DateFormat(this,this.value,event,false,'3') onChange=DateFormat(this,this.value,event,true,'3')></font></td>
    </tr>
    <? } } } ?>
  </table>
<br>
<center><input type="submit" value="Registrar" name="B1" class=form-especial onblur=this.className='boxnormal' onfocus=this.className='boxover'></center>
</form>

</body>

</html>