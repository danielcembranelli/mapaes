<? include("verifica.php") ?>
<html>

<head>
<meta http-equiv="Content-Language" content="pt-br">
<meta name="GENERATOR" content="Microsoft FrontPage 5.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Nova pagina 1</title>
</head>

<body topmargin="0" leftmargin="0">

<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber1">
  <tr>
    <td width="100%">
    <p align="center"><font size="2" face="Verdana">FROTA E CAPACIDADE INSTALADA</font></td>
  </tr>
  <tr>
    <td width="100%">
    <br>
    <center>
<?
$anoticia = mysql_query("SELECT * FROM familia order by nome");
$anotician = mysql_num_rows($noticia);
if (!$anoticia){
?>Problemas na conex�o<?
}
else{
if ($anotician==0){
?>
<center>
<table border='0' width='730' cellspacing='1' cellpadding='0'>
<tr>
<td width='730' colspan='7'>
&nbsp;</td></tr>

<tr>
<td width='730' bgcolor='#FFFFFF' colspan='5'><font class=font-11><span class=font-azul><center>n�o existe nenhum obra para est� consulta</center></span></font></td>
</tr>
</table>
<?
}else {
?>    
    <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="95%" id="AutoNumber2">
      <tr>
        <td width="15%" align="center" style="border-style: solid; border-width: 1">
        <font face="Verdana" size="2">Grupo</font></td>
        <td width="70%" align="center" style="border-style: solid; border-width: 1">
        <font face="Verdana" size="2">Fam�lia</font></td>
        <td width="15%" align="center" style="border-style: solid; border-width: 1">
        <font face="Verdana" size="2">Total</font></td>
      </tr>
<? while ($adom = mysql_fetch_array($anoticia)){ ?>
      <tr>
        <td width="15%" align="center" style="border-style: solid; border-width: 1" >
        <font face="Verdana" size="2">&nbsp;<? grupoletra($adom[grupo]) ?></font></td>
        <td width="70%" style="border-style: solid; border-width: 1">
        <font face="Verdana" size="2"> &nbsp;<? familia_master($adom[master]) ?> - <? echo $adom[nome] ?></font></td>
        <td width="15%" align="center" style="border-style: solid; border-width: 1">
        <font face="Verdana" size="2">&nbsp;<? familiatotal($adom[id]) ?></font></td>
      </tr>
<? } ?>      
      <tr>
        <td width="15%" align="center" style="border-left-width: 1; border-right-style: solid; border-right-width: 1; border-top-style: solid; border-top-width: 1; border-bottom-width: 1">
        </td>
        <td width="70%" align="center" style="border-left-style: solid; border-left-width: 1; border-top-style: solid; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
        <font face="Verdana" size="2">Total de Equipamentos</font></td>
        <td width="15%" align="center" style="border-left-width: 1; border-right-style: solid; border-right-width: 1; border-top-style: solid; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
        <b><font face="Verdana" size="2"><? total() ?></font></b>&nbsp;</td>
      </tr>
      <? } } ?>
      <tr>
        <td width="15%" align="center" >
        &nbsp;</td>
        <td width="70%">
        &nbsp;</td>
        <td width="15%" align="center">
        &nbsp;</td>
      </tr>
      <tr>
        <td width="15%" align="center" style="border-style: solid; border-width: 1" >
        <font face="Verdana" size="2">Codigo</font></td>
        <td width="70%" style="border-style: solid; border-width: 1">
        <p align="center">
        <font face="Verdana" size="2">Descri��o</font></td>
        <td width="15%" align="center" style="border-style: solid; border-width: 1">
        <font face="Verdana" size="2">Placa</font></td>
      </tr>
      <?
$noticia = mysql_query("SELECT * FROM caminhao order by codigo");
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
<img src='imagens/layout_seta.gif' width="15" height="9"><b class=font-10>Visualizar caminh�o</b><br>&nbsp;
</td>
</tr>
<tr>
<td width='730' bgcolor='#FFFFFF' colspan='5'><font class=font-11><span class=font-azul><center>n�o existe nenhum caminh�o para est� consulta</center></span></font></td>
</tr>
</table>
<?
}else {
?>
<? while ($dom = mysql_fetch_array($noticia)){ ?>
            <tr>
        <td width="15%" align="center" style="border-style: solid; border-width: 1" >
        <font face="Verdana" size="2">&nbsp;<? echo $dom[codigo]?></font>&nbsp;</td>
        <td width="70%" style="border-style: solid; border-width: 1">
        <font face="Verdana" size="2">&nbsp;<? echo $dom[descricao]?></font>&nbsp;</td>
        <td width="15%" align="center" style="border-style: solid; border-width: 1">
        <font face="Verdana" size="2">&nbsp;<? echo $dom[placa]?></font>&nbsp;</td>
      </tr>
<? } } } ?>      
      <tr>
        <td width="15%" align="center" style="border-left-width: 1; border-right-style: solid; border-right-width: 1; border-bottom-width: 1">
        </td>
        <td width="70%" align="center" style="border-left-style: solid; border-left-width: 1; border-top-style: solid; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
        <font face="Verdana" size="2">Total de Caminh�es de Transporte</font></td>
        <td width="15%" align="center" style="border-left-width: 1; border-right-style: solid; border-right-width: 1; border-top-style: solid; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
        <b><font face="Verdana" size="2">
<?
$novo = @mysql_query("SELECT * FROM caminhao");
echo $novon=@mysql_num_rows($novo);
?>        
        </font></b>&nbsp;</td>
      </tr>
                  <tr>
        <td width="15%" align="center" >
        &nbsp;</td>
        <td width="70%">
        &nbsp;</td>
        <td width="15%" align="center">
        &nbsp;</td>
      </tr>
      <tr>
        <td width="15%" align="center" style="border-style: solid; border-width: 1" >
        <font face="Verdana" size="2">Grupo</font></td>
        <td width="70%" style="border-style: solid; border-width: 1">
        <p align="center">
        <font face="Verdana" size="2">Familia</font></td>
        <td width="15%" align="center" style="border-style: solid; border-width: 1">
        <font face="Verdana" size="2">Total</font></td>
      </tr>

      <?
$noticia = mysql_query("SELECT * FROM familia_acessorio order by nome");
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
<img src='imagens/layout_seta.gif' width="15" height="9"><b class=font-10>Visualizar caminh�o</b><br>&nbsp;
</td>
</tr>
<tr>
<td width='730' bgcolor='#FFFFFF' colspan='5'><font class=font-11><span class=font-azul><center>n�o existe nenhum caminh�o para est� consulta</center></span></font></td>
</tr>
</table>
<?
}else {
?><? while ($dom = mysql_fetch_array($noticia)){ ?>
            <tr>
        <td width="15%" align="center" style="border-style: solid; border-width: 1" >
        <font face="Verdana" size="2">&nbsp;<? grupoletra($dom[grupo]) ?></font>&nbsp;</td>
        <td width="70%" style="border-style: solid; border-width: 1">
        <font face="Verdana" size="2">&nbsp;<? familia_master_acessorio($adom[master]) ?> - <? echo $dom[nome]?></font>&nbsp;</td>
        <td width="15%" align="center" style="border-style: solid; border-width: 1">
        <font face="Verdana" size="2">&nbsp;
                <?
$novo = @mysql_query("SELECT * FROM acessorio where familia = $dom[id] And`excluido` != 's'");
echo $novon=@mysql_num_rows($novo);
?>
        
        </font>&nbsp;</td>
      </tr>
<? } } } ?>            
<tr>
        <td width="15%" align="center" style="border-left-width: 1; border-right-style: solid; border-right-width: 1; border-bottom-width: 1">
        </td>
        <td width="70%" align="center" style="border-left-style: solid; border-left-width: 1; border-top-style: solid; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
        <font face="Verdana" size="2">Total de Acess�rios</font></td>
        <td width="15%" align="center" style="border-left-width: 1; border-right-style: solid; border-right-width: 1; border-top-style: solid; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
        <b><font face="Verdana" size="2">
        <?
$novo = @mysql_query("SELECT * FROM acessorio where `excluido` != 's'");
echo $novon=@mysql_num_rows($novo);
?>
        </font></b>&nbsp;</td>
      </tr>

    </table>
    </center>
    <br>
    </td>
  </tr>
    </table>
    </center>
    <br>
    </td>
  </tr>
    </table>
    </center>
    <br>
    </td>
  </tr>
</table>

</body>

</html>